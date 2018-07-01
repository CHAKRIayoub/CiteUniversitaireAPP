<?php

namespace App\Http\Controllers\employe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Chambre;
use App\Bloc;
use App\Hebergement;
use Session;
use \Auth;



class ChambresController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $droits = explode(",",Auth::user()->droits);
            if (in_array("gestion des chambres", $droits) || 
                Auth::user()->role == 'admin'){
                return $next($request);
            }else{
                return redirect('/employe');
            }
        }); 
    }


     public function index()
    {
        //

        $chambres = Chambre::all();
        $blocs = Bloc::all();

        return view('employe.chambres.index', ['chambres' => $chambres,'blocs'=>$blocs] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $blocs = Bloc::all();
         return view('employe.chambres.create',['blocs' => $blocs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

          $this->validate($request, [
            'capacite' => 'required|numeric',
            'bloc' => 'required|string',
        ]);
        
        $chambre = new Chambre();
        $chambre->capacite = $request->capacite;
        $chambre->bloc_id = $request->bloc;

        $chambre->save();

        Session::flash('success', 'Chambre Ajoutée avec succées ');

        return redirect('/chambres');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


            $chambre = Chambre::findOrFail($id);
            $hebergements = Hebergement::where('chambre_id', '=', $id)->get();
            $hebergementsCount = $hebergements->count();

           return view('employe.chambres.show',
            ['chambre' => $chambre ,
            'hebergs' => $hebergements , 
            'hebergementsCount' =>  $hebergementsCount]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $chambre = Chambre::findOrFail($id);
         $blocs = Bloc::all();

        return view('employe.chambres.edit', ['chambre' => $chambre,'blocs' => $blocs] );

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
        //
          $this->validate($request, [
            'capacite' => 'required|numeric',
            'bloc' => 'required|string',
        ]);
        
        $chambre = Chambre::findOrFail($id);
        $chambre->capacite = $request->capacite;
        $chambre->bloc_id = $request->bloc;

        $chambre->update();

        Session::flash('success', 'Chambre  Modifiée avec succées ');

        return redirect('/chambres');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $chambre = Chambre::findOrFail($id);
        
        if($chambre->hebergements->count() > 0){
            Session::flash('danger', 
                'vous ne pouvez pas supprimer la chambre "
                '.$chambre->id.','.$chambre->bloc->titre.'"
                , il existe des Résidents dans cette chambres');
            return redirect('/chambres');
        }
        Chambre::destroy($id);
        Session::flash('success', 'Chambre "'.$chambre->id.',
            '.$chambre->bloc->titre.'"  supprimée avec succées ');

        return redirect('/chambres');
    }
}
