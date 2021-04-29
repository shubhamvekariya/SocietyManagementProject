<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualSession extends Model
{
    use HasFactory;
    protected $table = 'virtual_sessions';
    protected $fillable = [
        'name',
        'session_id',
        'society_id',
    ];

    public function society()
    {
        return $this->belongsTo('App\Models\Society');
    }
}
