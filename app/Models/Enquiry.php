<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    // Specify the table name
    protected $table = 'enquiry';

    // Allow mass assignment for these fields
    protected $fillable = ['name', 'email', 'subject', 'message'];
}
