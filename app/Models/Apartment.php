<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_or_number',
        'BHK',
        'floor_no',
        'price',
        'society_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function society()
    {
        return $this->belongsTo('App\Models\Society');
    }

}
