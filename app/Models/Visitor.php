<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitor extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'visitors_details';
    protected $fillable = [
        'name',
        'phoneno',
        'address',
        'reason_to_meet',
        'entry_time',
        'exit_time',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function parking()
    {
        return $this->hasOne(Parking::class);
    }
}
