<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "services";
    protected $fillable = [
        'name',
        'position',
        'mobile_no',
        'society_id',
    ];
    public function society()
    {
        return $this->belongsTo('App\Models\Society');
    }
}
