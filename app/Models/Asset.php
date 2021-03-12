<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
        'start_time',
        'end_time',
        'assets',
        'func_details',
        'charges',
        'user_id',

    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}
