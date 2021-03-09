<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parking extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'vehicle_no',
        'type',
        'spot',
        'Visitor_id',
    ];
}
