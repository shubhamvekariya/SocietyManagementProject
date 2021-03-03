<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'contact_no',
        'email',
        'age',
        'gender',
        'user_id',
    ];
}
