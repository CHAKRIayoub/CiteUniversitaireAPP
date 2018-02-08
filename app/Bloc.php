<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloc extends Model
{
    //
    protected $fillable = [
         'titre', 'genre',
    ];

    public function chamberes()
    {
        return $this->hasMany('App\Chambre');
    }
}
