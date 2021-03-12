<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'phoneno',
        'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function apartment()
    {
        return $this->hasOne(Apartment::class);
    }
    public function staff()
    {
        return $this->hasMany(Staff::class);
    }
    public function family()
    {
        return $this->hasMany(Family::class);
    }
    public function rule()
    {
        return $this->hasMany(Rule::class);
    }
    public function asset()
    {
        return $this->hasMany(Asset::class);
    }
    public function complaint()
    {
        return $this->hasMany(Complaint::class);
    }
}
