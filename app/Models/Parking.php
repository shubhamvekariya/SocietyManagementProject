<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parking extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'parking_details';
    protected $fillable = [
        'vehicle_no',
        'type',
        'spot',
        'visitor_id',
    ];
    public function visitor()
    {
        return $this->belongsTo('App\Models\Visitor');
    }
}
