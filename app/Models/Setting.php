<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['description','name','email','phone','address','logo','link_instagram','link_facebook','apikey_rajaongkir','apikey_cekresi','province_id','city_id','district_id'];
}