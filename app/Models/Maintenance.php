<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maintenance extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'bill_date',
        'charges',
        'category',
        'due_dates',
        'paid_status',
        'user_id',
    ];

}
