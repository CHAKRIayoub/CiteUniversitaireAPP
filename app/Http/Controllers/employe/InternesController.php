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
use \Auth;


class InternesController extends Controller
{
     public function __construct()
        {
            $this->middleware(function ($request, $next) {
                $droits = explode(",",Auth::user()->droits);
                if (in_array("gestion des residents", $droits) || 
                    Auth::user()->role == 'admin'){
                    return $next($request);
                }else{
                    return redirect('/employe');
                }
            }); 
        }
    
    public function index()
    {
            
        $users = User::has('hebergement')->get();
        $dossiers = array();
        foreach ($users as $key => $value) {
            $h = Hebergement::where('user_id', '=', $value->id)->get();
            $c = Chambre::where('id','=',$h[0]->chambre_id )->first();
            $value->dossier->chambre = $c;
            $dossiers[] = $value->dossier;
        }
        return view('employe.internes.index',[ 'dossiers'=> $dossiers ]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        $h = Hebergement::where('user_id','=',$id )->get();
        $d = Dossier::where('user_id','=',$id )->first();
        $c = Chambre::where('id','=',$h[0]->chambre_id )->first();

        return view('employe.internes.show',['chambre'=>$c,'dossier'=>$d ] );
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
        $h = Hebergement::where('user_id', '=', $dossier->user_id)->first();
        Hebergement::destroy($h->id);
        Dossier::destroy($id);
        Session::flash('success', 'Dossier supprimée avec succées ');
        return redirect('/internes');
    }
}
