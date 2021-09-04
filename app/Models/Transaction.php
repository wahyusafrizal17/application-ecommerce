<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = ['nota', 'checkout_id', 'total', 'status'];
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id')->withDefault(['name'=>'kosong']);
    }

    public function checkout()
    {
        return $this->belongsTo('App\Models\Checkout','checkout_id','id')->withDefault(['address'=>'kosong']);
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product','user_id','id')->withDefault(['name'=>'kosong']);
    }

    public function transfer()
    {
        return $this->belongsTo('App\Models\Transfer','user_id','id')->withDefault(['name'=>'kosong']);
    }

    public function cart()
    {
        return $this->belongsTo('App\Models\Cart','user_id','id')->withDefault(['name'=>'kosong']);
    }

}
