<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\Checkout;
use App\Models\Product;
use App\Models\Cart;
use App\User;
use Auth;
use GuzzleHttp\Client;

class LacakOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $data['setting']        = Setting::find(1);
        $data['transactions']   = \DB::select("select t.id, t.nota, t.total, t.status, c.name, c.cart_id
        from transactions as t
        JOIN checkouts as c ON t.checkout_id = c.id
        JOIN users as u ON c.user_id = u.id
        where c.user_id = ".Auth::User()->id."");
       
        return view('frontend.lacak-order.index',$data);
    }

    public function Konfirmasi()
    {
        $id = $_GET['id'];

        $registration = Transaction::find($id);
        $registration->status = "DITERIMA";
        $registration->update();
        
        echo 'success';
    }

    public function lacakPaket($slug)
    {
        $setting = Setting::find(1);
        $info = Transaction::where('nota', base64_decode($slug))->first();

        $apikey  = $setting->apikey_cekresi;
        $courier = $info->checkout->courier;
        $awb     = $info->resi;

        $result = cekresi($apikey, $courier, $awb);

        $data['track'] = $result->data;

        if(empty($data['track']))
        {
            return redirect('lacak-order');
        }

        return view('frontend.lacak-order.lacak', $data);
    }

}
