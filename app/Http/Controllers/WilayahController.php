<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Setting;
use Auth;

class WilayahController extends Controller
{
    public function kabupaten(Request $request)
    {
        if ($request->has('regency_id')) {
            $selected = $request->regency_id;
        } else {
            $selected = null;
        }

        $regencies = \DB::table('tb_ro_cities')
        ->where('province_id', $request->province)
        ->pluck('city_name', 'city_id');
        return \Form::select('city_id', $regencies, $selected, ['class'=>'form-control','id'=>'kabupaten','onChange'=>'loadkecamatan()']);
    }

    public function kecamatan(Request $request)
    {
        if ($request->has('district_id')) {
            $selected = $request->district_id;
        } else {
            $selected = null;
        }

        $district = \DB::table('tb_ro_subdistricts')
        ->where('city_id', $request->kabupaten)
        ->pluck('subdistrict_name', 'subdistrict_id');
        return \Form::select('district_id', $district, $selected, ['class'=>'form-control','id'=>'kecamatan']);
    }

    public function cost(Request $request)
    {
        $setting = Setting::find(1);

        $total_weight = \DB::select('select SUM(p.weight) as weight
        from carts as c
        join products as p ON c.product_id = p.id
        where c.is_active = 1 and c.user_id = '.Auth::user()->id.'');

        $apikey         = $setting->apikey_rajaongkir;
        $origin         = $setting->city_id;
        $destination    = $request->destination;
        $weight         = $total_weight[0]->weight;
        $courier        = $request->courier;

        $result = cekongkir($apikey,$origin,$destination,$weight,$courier);

        $data['costs'] = $result->rajaongkir->results;
        return view('frontend.cart.cost',$data);
    }
}
