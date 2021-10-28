<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\TermsAndConditions;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data['transaction'] = Transaction::all();
        $data['user'] = User::all();
        $data['product'] = Product::all();
        
        $data['pemasukan'] = \DB::select('select SUM(p.buy_price * s.qty) as total
        from stocks as s
        join products as p ON s.product_id = p.id
        where s.status = "PEMASUKAN"');

        $data['pengeluaran'] = \DB::select('select SUM(p.sell_price * s.qty) as total
        from stocks as s
        join products as p ON s.product_id = p.id
        where s.status = "PENGELUARAN"');

        return view('admin.dashboard',$data);
    }

    public function syaratDanKetentuan()
    {
        $data['tem']            = TermsAndConditions::find(1);
        return view('admin.syarat-dan-ketentuan.index',$data);
    }

    public function syaratDanKetentuanUpdate(Request $request)
    {
        $data            = TermsAndConditions::find(1);
        $data->update($request->all());

        alert()->success('Data berhasil diubah' , 'Success');
        return redirect('administrator/syarat-dan-ketentuan');
    }
}
