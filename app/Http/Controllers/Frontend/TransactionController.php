<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Setting;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\Checkout;
use App\Mail\OrderEmail;
use Illuminate\Support\Facades\Mail;
use Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $auth = Auth::User()->id;

        $data['setting']        = Setting::find(1);
        $data['cart']           = Cart::where('user_id',$auth)->where('is_active', 1)->get();

        $data['transaction']    = Transaction::where('nota', $request->nota)->first();
        if(empty($data['transaction']))
        {
            return view('frontend.404');
        }

        $data['checkout']       = Checkout::where('user_id',$auth)->where('id', $data['transaction']->checkout_id)->first();

        $data['address'] = \DB::select('SELECT p.province_name, c.city_name, s.subdistrict_name
        FROM tb_ro_provinces as p
        JOIN tb_ro_cities as c ON p.province_id = c.province_id
        JOIN tb_ro_subdistricts as s ON c.city_id = s.city_id
        WHERE s.subdistrict_id = '.$data['checkout']->district_id.'');
        return view('frontend.payment.index',$data);
    }

    public function Cancel()
    {
        $id = $_GET['id'];
        $transaction = Transaction::find($id);
        $transaction->delete();

        echo 'success';
    }

    public function UploadBuktiTransfer(Request $request)
    {
        $transfer = Transaction::find($request->id);
        $setting  = Setting::find(1);

        $file = $request->file('bukti_transfer');
        $fileName = $file->getClientOriginalName();    
        $destinationPath = 'assets/img/bukti-transfer';
        $file->move($destinationPath,$file->getClientOriginalName());

        $transfer->bukti_transfer = $fileName;
        $transfer->status = 'DIPROSES';
        

        if($transfer->save()){
            Mail::to($setting->email)->send(new OrderEmail(['tanggal' => $transfer->created_at, 'name_app' => $setting->name, 'email_app' => $setting->email, 'checkout' => $request->checkout_id]));
        }

        alert()->success('Pesanan anda sedang di proses' , 'Success');
        return redirect('/lacak-order');
    }

}
