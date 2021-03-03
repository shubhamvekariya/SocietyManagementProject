<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meeting extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'date',
        'start_time',
        'end_time',
        'place',
        'society_id',
    ];
}
