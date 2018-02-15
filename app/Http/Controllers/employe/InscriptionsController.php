<?php

namespace App\Http\Controllers\employe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Application;
use App\Dossier;
use App\Hebergement;
use App\Chambre;
use App\Bloc;
use Session;

class InscriptionsController extends Controller
{
    public function reserver($id){

        $user = User::findOrFail($id);
        $blocs = Bloc::where('genre', '=', $user->dossier->genre)->get();
        $chambres = array();
        foreach ($blocs as $key => $bloc) {
            foreach ($bloc->chambres as $key => $chambre) {
                $chambres[] = $chambre;
            }
        }

        
        foreach ($chambres as $key => $chambre) {
            
                $hbrgms = Hebergement::where('chambre_id', '=', $chambre->id)->get();
                $hebergementsCount = $hbrgms->count();
                $plcedispo = $chambre->capacite - $hebergementsCount;
                if ($plcedispo >= 1) {
                    $hebergement = new Hebergement();
                    $hebergement->user_id = $user->id;
                    $hebergement->chambre_id = $chambre->id;
                    $hebergement->save();
                    break;
                }
        }

        Session::flash('success', 'Réservation effectué avec succées ');
        return redirect('/inscriptions');


     


    }
    
    public function index()
    {
        $app = Application::where('id', 1)->first();
        $dated = strtotime($app->date_d);
        $datef = strtotime($app->date_f);
        $datec = strtotime(date('y-m-d'));
        
        if ( ($datec >= $dated) && ($datef >= $datec ) ){

            return view('employe.inscriptions.dateinv');

        }else{

            $selected_dossiers_boy = Dossier::list_accpt('masculin');
            $selected_dossiers_girls = Dossier::list_accpt('feminin');

        return view('employe.inscriptions.index',[ 'dossiers_b'=> $selected_dossiers_boy ,'dossiers_g'=> $selected_dossiers_girls ]);

      }

    }





    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
    }

   
    public function show($id)
    {
        $dossier = Dossier::findOrFail($id);
        return view('employe.inscriptions.show',[ 'dossier'=> $dossier]);
       
        
    }

    
    public function edit($id)
    {
        
    }

   
    public function update(Request $request, $id)
    {
        
    }

   
    public function destroy($id)
    {

        $dossier = Dossier::findOrFail($id);
        User::destroy($dossier->user_id);
        Dossier::destroy($id);

        Session::flash('success', 'Dossier supprimée avec succées ');
        return redirect('/inscriptions');
        
    }
     


}
