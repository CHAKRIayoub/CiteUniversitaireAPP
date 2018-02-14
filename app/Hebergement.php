<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hebergement extends Model
{
    protected $table = 'hebergement';
    protected $fillable = [
		'user_id',
		'chambre_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function chambre()
    {
        return $this->hasOne('App\Chambre');
    }


}
