<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'complaint_no',
        'category',
        'complaint_title',
        'reg_date',
        'status',
        'remarks',
        'user_id',
    ];
}
