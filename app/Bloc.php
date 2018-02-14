<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloc extends Model
{
    //
    protected $fillable = [
         'titre', 'genre',
    ];

    public function chambres()
    {
        return $this->hasMany('App\Chambre');
    }
}
