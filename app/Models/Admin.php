<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'login_admin'; // Specify the table name

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Directly set the password without hashing
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $value;
    }

    // Custom method for validating plain text password
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
