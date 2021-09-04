<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name_product','slug','category_id','buy_price','sell_price','weight','description','image'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id')->withDefault(['name_category'=>'kosong']);
    }
}
