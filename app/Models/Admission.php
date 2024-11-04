<?php
// In app/Models/Admission.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $table = 'admissions';

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'course',
        'installment1',
        'installment2',
        'total_fees',
    ];
}
