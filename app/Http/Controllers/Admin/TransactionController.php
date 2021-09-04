<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Cart;
use App\Models\Setting;
use App\Models\checkout;
use App\Mail\SendOrderEmail;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data['transaction'] = Transaction::find($id);
        return view('admin.transaction.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $transaction->status = 'DIKEMAS';
        $transaction->update();

        alert()->success('Data berhasil diubah' , 'Success');
        return redirect('administrator/transaction');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

    public function laporanPengeluaran()
    {
        
    }
}
