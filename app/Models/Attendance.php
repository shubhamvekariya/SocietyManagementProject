<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory,Notifiable,SoftDeletes;

    protected $table = 'staff_attendance';
    protected $fillable = [
        'entry_time',
        'exit_time',
        'staff_id',
    ];
    public function staff()
    {
        return $this->belongsTo('App\Models\Staff');
    }
}
