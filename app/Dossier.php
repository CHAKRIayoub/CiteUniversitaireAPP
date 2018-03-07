<?php

namespace App;
use App\Regle;
use App\User;
use App\Bloc;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    public static function list_accpt($genre){

        $blocs = Bloc::where('genre', '=', $genre)->get();
        $somme = 0;

        foreach ($blocs as $key => $bloc) {
            $chamberes = $bloc->chambres;
            foreach ($chamberes as $key => $chambere) {
                $somme += $chambere->capacite;
            }
        }



        $var1 = User::has('hebergement')->get();
        $tab = array();
        foreach ($var1 as $key => $value) {
            if($value->role == "etudiant" && $value->dossier != null ){
                if ($value->dossier->genre == $genre) {
                    $tab[] = $value;
                }
            }
        }
        $somme -= count($tab);

        $var2 = User::doesntHave('hebergement')->get();
        $var = array();
        foreach ($var2 as $key => $value) {
            if($value->role == "etudiant" && $value->dossier != null ){
                if ($value->dossier->genre == $genre) {
                    $var[] = $value;
                }
            }
        }


        $etudiants = array();
        $dossiers = array();

        foreach ($var as $key => $user) {
                $etudiants[] = $user;
                $dossiers[] = $user->dossier;
        }

        $pos1 = 0;
        $pos2 = 0;

        while($pos1 <= count($dossiers) - 1 ){
            
            $max = $dossiers[$pos1];
            $pos_max = $pos1;
            
            for ($i = $pos1 + 1; $i <= count($dossiers) - 1; $i++){
                if ($max['note_dossier'] < $dossiers[$i]['note_dossier']){
                    $pos_max =  $i;
                    $max = $dossiers[$i];
                }
            }

            $pos2 = $pos_max;
            $aide = $dossiers[$pos2];
            $dossiers[$pos2] = $dossiers[$pos1];
            $dossiers[$pos1] = $aide;
            $pos1++;
        }

        $selected_dossiers = array();
        for ($i=0; $i < $somme ; $i++) {
            if($i > count($dossiers) - 1){ break;  }
            $selected_dossiers[] = $dossiers[$i];   
        }

        return $selected_dossiers;

    }

    public static function list_accpt_boy(){



    }

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


   

}