<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'name', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationships for Student role
    public function studentEvents(){
        return $this->hasMany('App\Event');
    }

    // Relationships for Company role
    public function grants(){
        return $this->hasMany('App\Grant');
    }

    public function companyFundedEvents(){
        return $this->belongsToMany('App\Event');
    }

    public function studentIndividual(){
        return $this->hasOne('App\StudentIndividual');
    }

    public function studentOrganization(){
        return $this->hasOne('App\StudentOrganization');
    }

    public function company(){
        return $this->hasOne('App\Company');
    }
}
