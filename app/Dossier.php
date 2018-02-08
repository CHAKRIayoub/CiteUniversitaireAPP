<?php


namespace App;
use App\Regle;



use Illuminate\Database\Eloquent\Model;


class Dossier extends Model
{


	protected $fillable = [
			'user_id',
			'cne',
			'cin',
			'lieu_naissance',
			'date_naissance',
			'genre',
			'nom',
			'prenom',
			'adresse',
			'ville_id',
			'telephone',
			'annee_bac',
			'mention',
			'cycle',
			'etablissement',
			'handicape',
			'maladie',
			'nom_pere',
			'cin_pere',
			'nom_mere',
			'cin_mere',
			'revenue',
			'nb_enfants',
			'note_dossier'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function ville()
    {
        return $this->belongsTo('App\Ville');
    }


    public function CalculNote()
    {

        $note = 1 * Regle::where('nom', 'revenue')->first()->factor / $this->revenue ;
       
        $note += 1 * Regle::where('nom', 'nb_enfants')->first()->factor / $this->nb_enfants ;
       
        if($this->maladie == "oui") 
        	$note += Regle::where('nom', 'maladie')->first()->factor;
       
        if($this->handicape == "oui") 
        	$note += Regle::where('nom', 'handicape')->first()->factor;
       
        $mentionfact = Regle::where('nom', 'mention')->first()->factor;
        if ($this->mention == "passable" ) $note += 1 * $mentionfact;
        else if ($this->mention == "assez bien" ) $note += 2 * $mentionfact;
        else if ($this->mention == "bien" ) $note += 3 * $mentionfact;
        else if ($this->mention == "tres bien" ) $note += 4 * $mentionfact;

        $note += ($this->ville->distance / 1000) * Regle::where('nom', 'distance')->first()->factor;

        $this->note_dossier = $note;
           
    }


}