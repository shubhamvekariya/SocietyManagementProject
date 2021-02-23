<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Society extends Authenticatable
{
    use HasFactory,Notifiable;

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

}
