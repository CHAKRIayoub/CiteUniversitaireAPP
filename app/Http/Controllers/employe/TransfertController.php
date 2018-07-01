<?php

namespace App\Http\Controllers\employe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hebergement;
use App\Dossier;
use App\Chambre;
use App\Bloc;
use Session;

class TransfertController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    	$h = Hebergement::where('user_id','=',$id)->get();
        $dossier = Dossier::where('user_id','=',$id)->first();
        $chambre = Chambre::where('id','=',$h[0]->chambre_id)->first();
        $blocs = Bloc::where('genre','=',$dossier->genre)->get();
        foreach ($blocs as $e){
        	$cs = Chambre::where('bloc_id','=',$e['id'])->get();
        	$csToAdd = array();
        	foreach ($cs as $c){
        		if($c->placeDispo()) $csToAdd[] = $c; 
        	}
        	$e['chambres'] = $csToAdd;
        }

        return view('employe.internes.transfert', ['blocs'=>$blocs,'chambre'=>$chambre,'dossier'=>$dossier ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$ch = Chambre::where('id','=',$request->chambre)->first();
    	if($ch->placeDispo()){
    		$hebergement = Hebergement::where('user_id','=',$id)->first();
            $hebergement->chambre_id = $request->chambre;
            $hebergement->save();
    	}

    	Session::flash('success', 'Transfert efféctué avec succées ');
        return redirect('/internes');
    }

  
}
