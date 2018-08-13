<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use \Auth;
use DB;
use App\User;
use App\Ville;

class ExportController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if ( Auth::user()->role == 'admin' ){
                return $next($request);
            }else{
                return redirect('/home');
            }
        }); 
    }

    public function index()
    {
        return view('admin.import');
    }
  
    public function store(Request $request)
    {
        //import the new Database
        $baseName = 'base.db';
        request()->papers->move(public_path('export'), $baseName);

        //remplire les tableaux nécessaires
        $etudiants = DB::connection("sqlite")->table("ETUDIANT")->get();
        $blocs = DB::connection("sqlite")->table("PAVILLON")->get();
        $chambres = DB::connection("sqlite")->table("CHAMBRE")->get();
        $reservations = DB::connection("sqlite")->table("RESERVATION")->get();
        
        //importer la liste des blocs
        //importer la liste des chambres
        Bloc::truncate();
        Chambre::truncate();
        foreach ($blocs as $key => $bloc) {
            $b = new Bloc();
            $b->titre = $bloc->PAVILLON;
            $b->genre = ($bloc->TYPE == 'Garçon')?'masculin':'feminin';
            $b->save();
            //importer la liste des chambres 
            foreach ($chambres as $key => $chambre) {

                if($chambre->PAVILLON ==  $bloc->PAVILLON){
                    $c = new Chambre();
                    $c->capacite = $chambre->CAPACITE;
                    $c->bloc_id = $b->id;
                    $c->id = $chambre->ID_CHAMBRE
                    $c->save();
                }
            }
        } 
       

        //importer les dossiers
        Dossier::truncate();

        foreach ($etudiants as $key_etudiant => $etudiant) {
            // structure dossier

            $user = new User();
            $user->name = $etudiant->NOM_ETUDIANT;
            $user->email = $etudiant->EMAIL_ETUDIANT
            $user->password = bcrypt($etudiant->CNE_ETUDIANT);
            $user->save();
           
            $dossier = new Dossier([
                'cne' => (int)$etudiant->CNE_ETUDIANT ,
                'cin' => $etudiant->CIN_ETUDIANT,
                'lieu_naissance' => ' ',
                'date_naissance' =>gmdate("Y-m-d",($etudiant->DATE_NAISSANCE_ETUDIANT - 2440587.5) * 86400),
                'genre' => ($etudiant->SEXE_ETUDIANT=='Garçon')?'masculin':'feminin',
                'nom' => $etudiant->NOM_ETUDIANT,
                'prenom' => $etudiant->PRENOM_ETUDIANT,
                'adresse' => $etudiant->ADRESSE_ETUDIANT,
                'telephone' => $etudiant->TEL_ETUDIANT,
                //'annee_bac' => '',
                'cycle' => $etudiant->NIVEAU_ETUDE,
                'etablissement' => (string)$etudiant->ETABLISMENT,
                'handicape' => '',
                'maladie' => '',
                'nom_pere' => '',
                'cin_pere' => '',
                'nom_mere' => '',
                'cin_mere' => '',
                'revenue' => (float)$etudiant->REVENU_DES_PARENTS,
                'nb_enfants' => (int)$etudiant->NOMBRE_DES_FRERES_SOEURS,
            ]);

            //utilisateur <===> dossier
            User::where('role', 'etudiant')->delete();
            $user = new User();
            $user->name = $etudiant->NOM_ETUDIANT;
            $user->email = $etudiant->EMAIL_ETUDIANT;
            $user->role = 'etudiant';
            $user->password = bcrypt($etudiant->CNE_ETUDIANT);
            $user->save();
            $dossier->user_id = $user->id;
            
            // ville <===> dossier 
            $villeId = 0;
            $villes = Ville::get();
            
            foreach ($villes as $key => $ville) {
                if($ville->ville == $etudiant->VILLE_ETUDIANT){
                    $villeId = $ville->id;
                    break;
                }
            }

            if($villeId==0){
                $newVille = new Ville([
                    'ville' => $etudiant->VILLE_ETUDIANT,
                    'distance' => $etudiant->DISTANCE * 1,
                ]);
                $newVille->save();
                $villeId = $newVille->id;
            }
            $dossier->ville_id = $villeId;
            
            //   mention  <===> dossier
            $mention = '';
            if($etudiant->EXCELLENCE > 16) $mention = 'tres bien';
            else if($etudiant->EXCELLENCE > 14) $mention = 'bien';
            else if($etudiant->EXCELLENCE > 12) $mention = 'assez bien';
            else if($etudiant->EXCELLENCE < 12) $mention = 'passable';
            $dossier->mention = $mention;

            // note_dossier & hebergement <===> dossier
            switch ($etudiant->ETAT_ETUDIANT) {

                //liste principale
                case 'éligible':
                    $dossier->note_dossier = 20;
                    break;

                //liste d'attente
                case 'en attente':
                    $dossier->note_dossier = 0;
                    break;

                //résidant    
                case 'résidant':
                    $dossier->note_dossier = 20;
                    //initier hebergement
                    $ch = Chambre::where('id','=',$etudiant->CHAMBRE)->first();
                    if($ch->placeDispo()){
                        $hebergement = new Hebergement();
                        $hebergement->user_id = $user->id;
                        $hebergement->chambre_id = $ch->id;
                        $hebergement->save();
                    }else{
                        $chs = Chambre::get();
                        foreach ($chs as $key => $chm) {
            ;
                            if ($chm->placeDispo()) {
                                $hebergement = new Hebergement();
                                $hebergement->user_id = $user->id;
                                $hebergement->chambre_id = $chm->id;
                                $hebergement->save();
                                break;
                            }
                        }
                    }
                    break;
                
                case 'non résidant':
                    $dossier->note_dossier = 20;
                    break;
                
                default:
                    
                    break;
            }
                
            if ($etudiant->COMPORTEMENT != ''){
                $dossier->note_dossier = 20;
                break;
            }

            $dossier->save();

        }

        
        //hebergement
        foreach ($reservations as $key => $reservation) {

        }


        return redirect('/home');
       
    }
    
}
