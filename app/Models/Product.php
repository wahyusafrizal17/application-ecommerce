<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name_product','slug','category_id','buy_price','sell_price','weight','description','image'];

    public function setNameProductAttribute($value)
    {
        $this->attributes['name_product'] = $value;
        $this->attributes['slug'] = $this->uniqueSlug($value);
    }

    private function uniqueSlug($value)
    {
        $slug = str_slug($value);
        $count = Product::where('slug', $slug)->count();
        $newCount = $count > 0 ? ++$count : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id')->withDefault(['name_category'=>'kosong']);
    }
}
