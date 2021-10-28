<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name_category','slug'];

    public function setNameCategoryAttribute($value)
    {
        $this->attributes['name_category'] = $value;
        $this->attributes['slug'] = $this->uniqueSlug($value);
    }

    private function uniqueSlug($value)
    {
        $slug = str_slug($value);
        $count = Category::where('slug', $slug)->count();
        $newCount = $count > 0 ? ++$count : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }
}
