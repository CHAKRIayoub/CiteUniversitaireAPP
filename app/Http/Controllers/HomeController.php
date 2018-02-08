<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\User;
use App\Dossier;
use PDF;
use App\Ville;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'etudiant'){
            $user = User::find( Auth::user()->id );
            if($user->dossier){

                

                return view('etudiant.index');

            }
            else{
                $villes = Ville::all();
                return view('etudiant.inscription',['villes' => $villes]);
            
            }
        }else{
            return view('home');
        }
    }

    public function downloadrRECU()
    {

        $pdf = PDF::loadView('etudiant.recu');

        return $pdf->download('recu.pdf');

    }
}
