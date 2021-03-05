<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class Society extends Authenticatable
{
    use HasFactory,Notifiable,HasRoles,SoftDeletes;

    protected $guard = 'society';

    protected $fillable = [
        'society_name',
        'address',
        'country',
        'state',
        'city',
        'secretary_name',
        'email',
        'phoneno',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function apartment()
    {
        return $this->hasMany(Apartment::class);
    }
    public function staff()
    {
        return $this->hasMany(Staff::class);
    }
}
