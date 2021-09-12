<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Artikel;
use App\Models\Setting;
use App\Models\Cart;
use App\Models\Card;
use App\User;
use App\Models\Courier;
use App\Models\Checkout;
use App\Models\Province;
use App\Models\City;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use GuzzleHttp\Client;
use Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $auth = Auth::User()->id;
        $data['setting']        = Setting::find(1);
        $data['all']            = Product::paginate(3);
        $data['card']           = Card::pluck('name_card','number_card');
        $data['cart']           = \DB::SELECT("select c.id, c.user_id, p.image, p.name_product, c.qty, p.sell_price
        from carts as c
        join products as p ON c.product_id = p.id
        where user_id = $auth and is_active = 1");
        $data['checkout']       = Checkout::where('user_id',$auth)->where('is_active', 1)->first();
        $data['provinces']      = \DB::table('tb_ro_provinces')->pluck('province_name','province_id');

        return view('frontend.cart.index',$data);
    }

    public function insertCart(Request $request)
    {
        $stok = hitung_stok_product($request->product_id)[0]->qty - hitung_stok_product_keluar($request->product_id)[0]->qty;

        if($request->qty > $stok){
            alert()->warning('Stok produk tidak cukup' , 'Opsss');
            return redirect()->back();
        }else{
            $input = $request->all();
            $input['user_id'] = Auth::user()->id;
            $input['is_active'] = 1;
            $input['qty'] = $request->quant[1];

            $data = Cart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->where('is_active', 1)->first();

            if(!empty($data)){
                $data->qty = $data->qty + $request->qty;
                $data->save();
            }else{
                Cart::create($input);
            }

            alert()->success('Berhasil ditambahkan ke keranjang' , 'Success');
            return redirect('cart');   
        }
    }

    public function destroy($id)
    {
        $data = Cart::find($id);

        if($data->qty > 1){
            $data->qty = $data->qty - 1;
            $data->save();
        }else{
            $data->delete();
        }

        alert()->success('Berhasil dihapus' , 'Success');
        return redirect('cart');
    }
}
