<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dossier;
use App\User;
use App\Ville;
use App\Application;
use App\Bloc;
use App\Chambre;

class TestController extends Controller
{

     public function index()
    {
    	$genre = 'feminin';

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

}
