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


class EtudiantController extends Controller
{
    public function __construct()
    {
        
    	$this->middleware('auth');
    	$this->middleware('ChekRole:etudiant');
        
    }

    public function resultat(){
        $app = Application::where('id', 1)->first();
        $dated = strtotime($app->date_d);
        $datef = strtotime($app->date_f);
        $datec = strtotime(date('y-m-d'));

        if ( ($datec >= $dated) && ($datef >= $datec ) ){

            return view('employe.inscriptions.dateinv');

        }else{

            $h = Hebergement::where('user_id','=',Auth::user()->id )->get();
            if($h->count() >= 1){
                $c = Chambre::where('id','=',$h[0]->chambre_id )->first();
                return view('etudiant.resultat',['chambre'=>$c ,'hebergement'=>$h[0] ] );
            }else{
                $list=Dossier::list_accpt(Auth::user()->dossier->genre);
                $exist = false;
                foreach ($list as $key => $value) {
                    if ($value->user_id == Auth::user()->id ) {
                        $exist = true; break;
                    }
                }
                if ($exist) {
                    $res = 'félicitation vous étes sélectioné parmi les résident, nous vous invitons à payé les droits de Logement ';

                    return view('etudiant.resultat',['res'=>$res  ] );
                    
                }else{
                    
                    $res = 'Désolé, votre demande est refusé ';

                    return view('etudiant.resultat',['res'=>$res  ]

                    );
                }
            }
        }
    }

    public function index()
    {

    	$user = User::find( Auth::user()->id );
        if($user->dossier){

            return view('etudiant.index');

        }
        else{
        	
            $villes = Ville::all();
            return view('etudiant.dossier.inscription',['villes' => $villes]);
        
        }
    	
    }
}
