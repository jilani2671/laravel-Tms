<?php

// Registration.php (Model)
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'full_name', 'email', 'phone_number', 'date_of_birth', 'course', 'enquiries', 'agree_terms'
    ];
}

