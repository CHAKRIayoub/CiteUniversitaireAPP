<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'role', 'password','droits'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRole()
    {
        return $this->role;
    }

    public function droits()
    {
        return $this->droits;
    }

    public function dossier()
    {
        return $this->hasOne('App\Dossier');
    }

    public function hebergement()
    {
        return $this->hasOne('App\Hebergement');
    }

   
}
