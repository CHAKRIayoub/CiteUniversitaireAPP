<?php

namespace App\Http\Controllers\employe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hebergement;
use App\Chambre;
use App\User;
use Session;

class PermutationController extends Controller
{
	

	public function index(Request $request)
    {

    	$h1 = Hebergement::where('user_id','=', $_GET['id1'])->first();
        $h2 = Hebergement::where('user_id','=',$_GET['id2'] )->first();
        $help = $h1->chambre_id;
        $h1->chambre_id = $h2->chambre_id;
        $h2->chambre_id = $help;
        $h1->save();
        $h2->save();

        Session::flash('success', 'Permutation efféctué avec succées ');
        return redirect('/internes');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$user = User::findOrFail($id);
    	$users = User::has('hebergement')->get();
        $dossiers = array();
        foreach ($users as $key => $value) {
        	if($user->id == $value->id) continue;
            $h = Hebergement::where('user_id', '=', $value->id)->get();
            $c = Chambre::where('id','=',$h[0]->chambre_id )->first();
            $value->dossier->chambre = $c;
 			
 		if($user->dossier->genre == $value->dossier->genre ) 
 				$dossiers[] = $value->dossier;
        }
        return view('employe.internes.permutation',[ 'dossiers'=> $dossiers,'id' => $id ]);
    }



   
}
