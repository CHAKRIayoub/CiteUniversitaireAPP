<?php

namespace App\Http\Controllers\employe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bloc;
use Session;
use App\Chambre;
use \Auth;
use App\User;
use App\Hebergement;


class BlocController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $droits = explode(",",Auth::user()->droits);
            if (in_array("gestion des blocs", $droits) || 
                Auth::user()->role == 'admin'){
                return $next($request);
            }else{
                return redirect('/employe');
            }
        }); 
    }
   
    public function index()
    {
        $blocs = Bloc::withCount('chambres')->get();
        return view('employe.blocs.index', ['blocs' => $blocs] );
    }

  
    public function create()
    {
        return view('employe.blocs.create');
    }

   
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'titre' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'cpch' => 'required|integer',
            'nbch' => 'required|integer',
        ]);

        $bloc = new Bloc();
        $bloc->titre = $request->titre;
        $bloc->genre = $request->genre;

        $bloc->save();

        for ($i=0; $i < $request->nbch ; $i++) { 
             $chambre = new Chambre();
             $chambre->capacite = $request->cpch;
             $chambre->bloc_id = $bloc->id;
             $chambre->save();
        }
        
       

        Session::flash('success', 'Bloc " ' .$bloc->titre. ' " Ajoutée avec succées ');

        return redirect('/blocs');


    }

  
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $bloc = Bloc::findOrFail($id);
        return view('employe.blocs.edit', ['bloc' => $bloc] );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titre' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
        ]);
        
        $bloc = Bloc::findOrFail($id);
        $bloc->titre = $request->titre;
        $bloc->genre = $request->genre;

        $bloc->update();

        Session::flash('success', 'Bloc "'. $request->titre .'" Modifiée avec succées ');

        return redirect('/blocs');
    }

   
    public function destroy($id)
    {
        $bloc = Bloc::findOrFail($id);
        foreach ($bloc->chambres as $key => $chambre) {
            if($chambre->hebergements->count() > 0){
                Session::flash('danger', 
                    'vous ne pouvez pas supprimer le bloc "'.$bloc->titre.'"
                    , il existe des Résidents dans les chambres du bloc');
                return redirect('/blocs');
            }
        }
       
        foreach ($bloc->chambres as $key => $value) {
            Chambre::destroy($value->id);
        }
        Bloc::destroy($id);
        


        Session::flash('success', 'Bloc"'. $bloc->titre .'" supprimée avec succées ');
        return redirect('/blocs');
    }
}
