<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\Checkout;
use App\Models\Courier;
use App\Models\Province;
use App\Models\City;
use App\Models\Card;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use GuzzleHttp\Client;
use Auth;

class CheckoutController extends Controller
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
        $data['checkout']       = Checkout::where('user_id',$auth)->where('is_active', 1)->first();
        if(empty($data['checkout']))
        {
            return redirect('lacak-order');
        }
        $data['transaction']    = Transaction::where('checkout_id', $data['checkout']->id)->first();

        $data['address'] = \DB::select('SELECT p.province_name, c.city_name, s.subdistrict_name
        FROM tb_ro_provinces as p
        JOIN tb_ro_cities as c ON p.province_id = c.province_id
        JOIN tb_ro_subdistricts as s ON c.city_id = s.city_id
        WHERE s.subdistrict_id = '.$data['checkout']->district_id.'');
        
        return view('frontend.checkout.index',$data);
    }

    public function Proses(Request $request)
    {
        $data = Cart::where('user_id', Auth::user()->id)->where('is_active', 1)->get();
        foreach($data as $cart){
            $ar[] =  $cart->id;
            $c = serialize($ar);
        }
        $service = explode('-',$request->cost);

        $input = $request->all();
        $input['service']   = $service[0];
        $input['ongkir']    = $service[1];
        $input['cart_id']    = $c;
        $input['is_active'] = 1;
        
        Checkout::create($input);

        alert()->success('Berhasil' , 'Success');
        return redirect('checkout');
    }

    public function updateShippping()
    {
        $id = $_GET['id'];

        $checkout = Checkout::find($id);
        $checkout->delete();
        
        echo 'success';

    }

    public function Transaction(Request $request)
    {

        $transaction = New Transaction;
        $transaction->nota    = "EC".date('is').Auth::user()->id.date('h').$request->checkout_id;
        $transaction->checkout_id = $request->checkout_id;
        $transaction->total   = $request->total;
        $transaction->status  = "MENUNGGU PEMBAYARAN";
        $transaction->save();

        $data  = Cart::where('user_id',Auth::User()->id)->where('is_active', 1)->get();
            foreach($data as $row){
                $c = Cart::where('id', $row->id)->first();
                $c->is_active = 0;
                $c->save();
            }

            $model = Checkout::where('id', $request->checkout_id)->first();
            $model->is_active = 0;
            $model->save();

        return redirect('/payment?nota='.$transaction->nota.'');
    }
}
