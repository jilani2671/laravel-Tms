<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BAwork extends Model
{
    use HasFactory;

    protected $table = 'bawork'; // Ensure this matches your actual table name

    protected $fillable = [
        'project_name',
        'tech',
        'status',
        'dev_team',
        'start_date',
        'end_date',
        'business_analyst_name',
    ];
}
