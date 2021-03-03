<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'date_of_booking',
        'start_time',
        'end_time',
        'assets',
        'func_details',
        'charges',
        'user_id',
        
    ];

    
}
