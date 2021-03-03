<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parking extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'vehicle_no',
        'entry_time',
        'exit_time',
        'entry_date',
        'exit_date',
        'user_id',
    ];
}
