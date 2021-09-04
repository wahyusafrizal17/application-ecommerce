<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{

    protected $fillable = ['user_id','cart_id', 'province_id', 'city_id', 'district_id', 'village_id','name', 'phone', 'address','courier','subtotal','ongkir','service','payment','is_active'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id')->withDefault(['name'=>'kosong']);
    }

    public function card()
    {
        return $this->belongsTo('App\Models\Card','payment','number_card');
    }
}
