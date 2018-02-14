<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\User;
use App\Ville;


class EtudiantController extends Controller
{
    public function __construct()
    {
        
    	$this->middleware('auth');
    	$this->middleware('ChekRole:etudiant');
        
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
