<?php

namespace App;
use App\Hebergement;


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

    public function hebergements()
    {
        return $this->hasMany('App\Hebergement');
    }

    public function placeDispo(){

        $hebergements = Hebergement::where('chambre_id', '=',$this->id)->get();
        $countDisp = $hebergements->count();
        if($this->capacite - $countDisp > 0) return true;
        else return false;
        
    }



}
