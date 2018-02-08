<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
	protected $fillable = [
         'bloc_id', 'capacite',
    ];


    public function bloc()
    {
        return $this->belongsTo('App\Bloc');
    }

}
