<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Cart;
use App\Models\Setting;
use App\Models\checkout;
use App\Models\Stock;
use App\Mail\SendOrderEmail;
use App\Mail\TolakPesananEmail;
use Illuminate\Support\Facades\Mail;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        if($request->status)
        {
            $status = $request->status;
        }else{
            $status = 'DIPROSES';
        }
        
        $data['transactions'] = Transaction::where('status', $status)->get();
        return view('admin.transaction.index',$data);
    }

    public function preview($nota)
    {   
        $data['transaction'] = Transaction::where('nota',$nota)->first();
        return view('admin.transaction.preview',$data);
    }

    public function proses(Request $request, $nota)
    {
        $transaction = Transaction::where('nota',$nota)->first();
        $transaction->status = 'DIKEMAS';
        $transaction->update();

        $cart        = \DB::SELECT('select * from carts where id IN ('.implode(',', unserialize($transaction->checkout->cart_id)).')');
        foreach($cart as $row){
            $stock = new Stock();
            $stock->product_id = $row->product_id;
            $stock->qty = $row->qty;
            $stock->status = "PENGELUARAN";
            $stock->save();
        }

        alert()->success('Pesanan berhasil diproses' , 'Success');
        return redirect('administrator/transaction?status=DIKEMAS');
    }

    public function tolak(Request $request)
    {
        $setting = Setting::find(1);
        $model         = Transaction::find($request->id);
        $model->status = 'DITOLAK';
        if($model->save()){
            Mail::to($model->checkout->user->email)->send(new TolakPesananEmail(['tanggal' => $model->created_at, 'name_app' => $setting->name, 'email_app' => $setting->email, 'checkout' => $model->checkout_id]));
        }
    }

    public function sendId(Request $request)
    {
        return $request->id;
    }

    public function saveResi(Request $request)
    {
        $setting = Setting::find(1);
        $model         = Transaction::find($request->id);
        $model->resi   = $request->resi;
        $model->status = "DIKIRIM";
        $model->updated_at = date('Y-m-d H:i:s');

        $courier = Checkout::where('id', $model->checkout_id)->first();
        $courier->courier = $request->courier;
        $courier->save();
        
        if($model->update()){
            Mail::to($model->checkout->user->email)->send(new SendOrderEmail(['resi' => $model->resi,'tanggal' => $model->updated_at, 'name_app' => $setting->name, 'email_app' => $setting->email, 'checkout' => $model->checkout_id]));
        }
        return 'success';
    }

    public function laporanIndex()
    {
        $data['model'] = \DB::select('select p.id, p.name_product, c.name_category, p.sell_price, p.buy_price
        from stocks as s
        join products as p ON s.product_id = p.id
        join categories as c ON p.category_id = c.id
        where s.status = "PEMASUKAN" GROUP BY p.id');
        return view('admin.laporan.index', $data);
    }

    public function laporanExport()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Nama produk');
        $sheet->setCellValue('B1', 'Harga beli');
        $sheet->setCellValue('C1', 'Harga jual');
        $sheet->setCellValue('D1', 'Pengeluaran');
        $sheet->setCellValue('E1', 'Pemasukan');
        $sheet->setCellValue('F1', 'Keuntungan');
        $data = \DB::select('select p.id, p.name_product, c.name_category, p.sell_price, p.buy_price
        from stocks as s
        join products as p ON s.product_id = p.id
        join categories as c ON p.category_id = c.id
        where s.status = "PEMASUKAN" GROUP BY p.id');

        $cell = 2;
        foreach($data as $row){
            $sheet->setCellValue('A'.$cell, $row->name_product);
            $sheet->setCellValue('B'.$cell, $row->buy_price);
            $sheet->setCellValue('C'.$cell, $row->sell_price);
            $sheet->setCellValue('D'.$cell, total_perhitungan_keuangan_pemasukan($row->id)[0]->total);
            $sheet->setCellValue('E'.$cell, total_perhitungan_keuangan_pengeluaran($row->id)[0]->total);
            $sheet->setCellValue('F'.$cell, total_keuntungan_penjualan($row->id)[0]->total);
            $cell++;
        }
        $writer = new Xlsx($spreadsheet);        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Jogjatech-export.xlsx"');
        $writer->save('php://output');
    }
}
