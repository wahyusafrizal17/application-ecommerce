<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    protected $fillable = ['user_id', 'phone', 'address', 'image'];
}
