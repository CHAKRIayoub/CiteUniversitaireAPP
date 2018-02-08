<?php

namespace App\Http\Controllers\employe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bloc;
use Session;

class BlocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocs = Bloc::withCount('chamberes')->get();
        return view('employe.blocs.index', ['blocs' => $blocs] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employe.blocs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'titre' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
        ]);
        
        $bloc = new Bloc();
        $bloc->titre = $request->titre;
        $bloc->genre = $request->genre;

        $bloc->save();

        Session::flash('success', 'Bloc " ' .$bloc->titre. ' " Ajoutée avec succées ');

        return redirect('/blocs');


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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bloc = Bloc::findOrFail($id);
        return view('employe.blocs.edit', ['bloc' => $bloc] );
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bloc = Bloc::findOrFail($id);
        Bloc::destroy($id);

        Session::flash('success', 'Bloc"'. $bloc->titre .'" supprimée avec succées ');

        return redirect('/blocs');
    }
}
