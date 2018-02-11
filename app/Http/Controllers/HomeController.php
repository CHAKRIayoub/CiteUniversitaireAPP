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

            return redirect('/etudiant');

        }else if(Auth::user()->role == 'admin') {
            
            return redirect('/admin');

        }else if(Auth::user()->role == 'employe') {
            
            return redirect('/employe');
            
        }

    }

    public function downloadrRECU()
    {
        
        $this->middleware('ChekRole:etudiant');
        $pdf = PDF::loadView('etudiant.dossier.recu');
        return $pdf->download('recu_' . Auth::user()->id . '.pdf');

    }
}
