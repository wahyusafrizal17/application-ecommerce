<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles; // Ganti dengan Spatie
use Hash;

class User extends Authenticatable
{
    use Notifiable, HasRoles; // Ganti EntrustUserTrait jadi HasRoles

    protected $fillable = [
        'name', 'email', 'password', 'level'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function detail()
    {
        return $this->belongsTo('App\Models\DetailUser', 'id', 'user_id');
    }
}