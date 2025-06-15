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
use PDF;

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
        $data['model'] = \DB::select('
                            select t.id, t.created_at, t.nota, t.total, u.name, c.ongkir, c.subtotal
                            from transactions as t
                            join checkouts as c ON c.id = t.checkout_id
                            join users as u ON u.id = c.user_id
                            ORDER BY t.created_at DESC
                        ');

        return view('admin.laporan.index', $data);
    }

    public function laporanExport(Request $request)
    {
        $data['from'] = $request->from;
        $data['to'] = $request->to;

        $data['laporan'] = \DB::select("select t.created_at, t.nota, t.total, u.name, c.ongkir, c.subtotal
        from transactions as t
        join checkouts as c ON c.id = t.checkout_id
        join users as u ON u.id = c.user_id
		where t.created_at >= '$data[from]' and t.created_at <= '$data[to]' GROUP BY t.created_at DESC");

        $data['setting'] = Setting::find(1);

        $pdf = PDF::loadview('admin.laporan.export', $data);
        return $pdf->stream();
    }

    public function laporanPrint(Request $request, $id)
    {
        $data['from'] = $request->from;
        $data['to'] = $request->to;

        $data['laporan'] = \DB::select("select t.created_at, t.nota, t.total, u.name, c.cart_id, c.ongkir, c.subtotal
        from transactions as t
        join checkouts as c ON c.id = t.checkout_id
        join users as u ON u.id = c.user_id
		where t.id = '$id'");

        $data['setting'] = Setting::find(1);

        $pdf = PDF::loadview('admin.laporan.print', $data);
        return $pdf->stream();
    }
}
