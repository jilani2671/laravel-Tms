<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserRegis extends Authenticatable
{
    protected $table = 'user_regis';

    protected $fillable = [
        'name', 'email', 'phone_no', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
