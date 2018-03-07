<?php

namespace App\Http\Controllers\etudiant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Auth;
use App\User;
use App\Dossier;
use Session;
use App\Ville; 


class DossierController extends Controller
{
       
    public function index()
    {
        // $dossier = Dossier::where('user_id', Auth::user()->id)->first();
        return view('etudiant.dossier.index');
        // , ['dossier' => $blocs] );
    }
   
    public function store(Request $request)
    {
        // calcule_note();
        
        $this->validate($request, [
            'cne' => 'required|numeric',
            'cin' => 'required|String',
            'lieu_naissance' => 'required|String',
            'date_naissance' => 'required|Date',
            'genre' => 'required|String',
            'nom' => 'required|String',
            'prenom' => 'required|String',
            'adresse' => 'required|String',
            'ville_id' => 'required|Integer',
            'telephone' => 'required|numeric',
            'annee_bac' => 'required|String',
            'mention' => 'required|String',
            'cycle' => 'required|String',
            'etablissement' => 'required|String',
            'handicape' => 'required|String',
            'maladie' => 'required|String',
            'nom_pere' => 'required|String',
            'cin_pere' => 'required|String',
            'nom_mere' => 'required|String',
            'cin_mere' => 'required|String',
            'revenue' => 'required|numeric',
            'nb_enfants' => 'required|integer'
        ]);
        $dossier = new Dossier([
            'user_id' => Auth::user()->id,
            'cne' => $request->cne,
            'cin' => $request->cin,
            'lieu_naissance' => $request->lieu_naissance,
            'date_naissance' => $request->date_naissance,
            'genre' => $request->genre,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'ville_id' => $request->ville_id,
            'telephone' => $request->telephone,
            'annee_bac' => $request->annee_bac,
            'mention' => $request->mention,
            'cycle' => $request->cycle,
            'etablissement' => $request->etablissement,
            'handicape' => $request->handicape,
            'maladie' => $request->maladie,
            'nom_pere' => $request->nom_pere,
            'cin_pere' => $request->cin_pere,
            'nom_mere' => $request->nom_mere,
            'cin_mere' => $request->cin_mere,
            'revenue' => $request->revenue,
            'nb_enfants' => $request->nb_enfants,
            'note_dossier' => 0
        ]);
        $dossier->CalculNote();
        $dossier->save();

        $imageName = Auth::user()->id.'.'.request()->papers->getClientOriginalExtension();
        request()->papers->move(public_path('papers'), $imageName);

        Session::flash('success', 'vous avez terminez votre inscription avec succées');
        return redirect('/dossier');
    }


 
    public function edit($id)
    {
        $villes = Ville::all();
        return view('etudiant.dossier.edit',['villes' => $villes]);
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'cne' => 'required|numeric',
            'cin' => 'required|String',
            'lieu_naissance' => 'required|String',
            'date_naissance' => 'required|Date',
            'genre' => 'required|String',
            'nom' => 'required|String',
            'prenom' => 'required|String',
            'adresse' => 'required|String',
            'ville_id' => 'required|Integer',
            'telephone' => 'required|numeric',
            'annee_bac' => 'required|String',
            'mention' => 'required|String',
            'cycle' => 'required|String',
            'etablissement' => 'required|String',
            'handicape' => 'required|String',
            'maladie' => 'required|String',
            'nom_pere' => 'required|String',
            'cin_pere' => 'required|String',
            'nom_mere' => 'required|String',
            'cin_mere' => 'required|String',
            'revenue' => 'required|numeric',
            'nb_enfants' => 'required|integer'
        ]);

        $dossier = Dossier::where('id', $id)->first();

        $dossier->user_id = Auth::user()->id;
        $dossier->cne = $request->cne;
        $dossier->cin = $request->cin;
        $dossier->lieu_naissance = $request->lieu_naissance;
        $dossier->date_naissance = $request->date_naissance;
        $dossier->genre = $request->genre;
        $dossier->nom = $request->nom;
        $dossier->prenom = $request->prenom;
        $dossier->adresse = $request->adresse;
        $dossier->ville_id = $request->ville_id;
        $dossier->telephone = $request->telephone;
        $dossier->annee_bac = $request->annee_bac;
        $dossier->mention = $request->mention;
        $dossier->cycle = $request->cycle;
        $dossier->etablissement = $request->etablissement;
        $dossier->handicape = $request->handicape;
        $dossier->maladie = $request->maladie;
        $dossier->nom_pere = $request->nom_pere;
        $dossier->cin_pere = $request->cin_pere;
        $dossier->nom_mere = $request->nom_mere;
        $dossier->cin_mere = $request->cin_mere;
        $dossier->revenue = $request->revenue;
        $dossier->nb_enfants = $request->nb_enfants;
        $dossier->note_dossier = Auth::user()->dossier->note_dossier;

        $dossier->CalculNote();
        $dossier->save();
        Session::flash('success', 'votre dossier est modifié avec succées');
        return redirect('/dossier');
    }

   
  
}
