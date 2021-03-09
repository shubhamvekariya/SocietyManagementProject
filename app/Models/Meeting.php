<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meeting extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'meeting_details';
    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'place',
        'society_id',
    ];
    public function society()
    {
        return $this->belongsTo('App\Models\Society');
    }
}
