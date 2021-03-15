<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Authenticatable
{
    use HasFactory,Notifiable,HasRoles,SoftDeletes;

    protected $guard = 'staff_security';
    protected $table = 'staff_security';
    protected $fillable = [
        'name',
        'position',
        'work',
        'society_id',
        'email',
        'password',
        'age',
        'phoneno',
        'salary',
        'nonworkingday',
        'gender',
        'user_id',
    ];

    protected $hidden = [
        'password'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function society()
    {
        return $this->belongsTo('App\Models\Society');
    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
