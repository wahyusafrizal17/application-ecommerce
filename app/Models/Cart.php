<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'qty', 'is_active'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id')->withDefault(['name_product'=>'kosong']);
    }
}
