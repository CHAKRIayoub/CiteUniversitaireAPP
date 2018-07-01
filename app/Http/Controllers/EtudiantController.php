<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\User;
use App\Ville;
use App\Hebergement;
use App\Chambre;
use App\Dossier;
use Session;
use App\Application;
use PDF;

class EtudiantController extends Controller
{
    public function __construct()
    {
        
    	$this->middleware('auth');
    	$this->middleware('ChekRole:etudiant');
        
    }

    public function resultat(){

        $app = Application::where('id', 1)->first();
        $user = User::find( Auth::user()->id );

        $dated = strtotime($app->date_d);
        $datef = strtotime($app->date_f);
        $datec = strtotime(date('y-m-d')); 

        if($user->hebergement){  
            $c = Chambre::where('id','=',$user->hebergement->chambre_id )->first();
            return view('etudiant.resultat',['chambre'=>$c ,'hebergement' => $user->hebergement ] );
        }else{
            if ( ($datec >= $dated) && ($datef >= $datec ) ){
                Session::flash('ll', 'vous ne pouvez pas acceder, période d\'inscription en cours !');

                return view('etudiant.resultat' );
            }else{
                if($user->dossier){
                    $l=Dossier::list_accpt(Auth::user()->dossier->genre);
                    $list=[];
                    for ($i = 0; $i < $l['disp']; $i++){
                      if ($i > count($l['list']) - 1) break; 
                      $list[] = $l['list'][$i];
                    }
                    $exist = false;
                    foreach ($list as $key => $value) {
                        if ($value->user_id == Auth::user()->id ) {
                            $exist = true; break;
                        }
                    }
                    if ($exist) {
                        Session::flash('lp', 'félicitation vous étes sélectioné parmi les résident, nous vous invitons à payé les droits de Logement ');

                        return view('etudiant.resultat' );
                        
                    }else{
                        Session::flash('la', 'Désolé, vous etes en liste d\'attente');
                        return view('etudiant.resultat');
                    }
                }else{
                    Session::flash('lr', 'on n\'a pas trouver votre dossier !' );
                    return view('etudiant.resultat');
                }
            }
        }
    }

    public function index()
    {

        $app = Application::where('id', 1)->first();
        $user = User::find( Auth::user()->id );

        $dated = strtotime($app->date_d);
        $datef = strtotime($app->date_f);
        $datec = strtotime(date('y-m-d')); 

        if($user->dossier){        
            return view('etudiant.dossier.index');
        }else{
            if ( ($datec >= $dated) && ($datef >= $datec ) ){
                $villes = Ville::all();
                return view('etudiant.dossier.inscription',['villes'=>$villes]);
            }else{
                return view('employe.inscriptions.dateinv');
            }
        }
    	
    }


    public function recu_admission(){

        $this->middleware('ChekRole:etudiant');
        $pdf = PDF::loadView('etudiant.admission');
        return $pdf->download('attestation_admission' . Auth::user()->id . '.pdf');

    }

    public function recu_inscription()
    {
        
        $this->middleware('ChekRole:etudiant');
        $pdf = PDF::loadView('etudiant.dossier.recu');
        return $pdf->download('recu_inscription' . Auth::user()->id . '.pdf');

    }

     public function recu_residence()
    {
        
        $this->middleware('ChekRole:etudiant');
        $pdf = PDF::loadView('etudiant.residence');
        return $pdf->download('attestation_residence' . Auth::user()->id . '.pdf');

    }
}
