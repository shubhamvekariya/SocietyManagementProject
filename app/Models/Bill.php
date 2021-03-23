<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Bill extends Model
{
    use HasFactory;
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'month',
        'year',
        'sum',
        'count',
        'due_date',
        'society_id',
    ];
}
