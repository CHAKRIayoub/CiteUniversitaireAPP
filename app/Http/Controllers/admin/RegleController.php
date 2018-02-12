<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Regle;
use Session;

class RegleController extends Controller
{
    public function index()
    {
    	$regles = Regle::all();
        return view('admin.regles.edit', ['regles' => $regles] );
    }
  
    public function update(Request $request, $id)
    {
        
        for($i = 0; $i < 6; $i++){
        	$regle = Regle::where('id', $i+1)->first();
        	if ($request->etat[$i] == 0) 
        		$regle->factor = 0;
        	else $regle->factor = $request->factor[$i];
        	$regle->save();
        }
        

        Session::flash('success', 'Regles appliqué avec succées ');

        return redirect('/regles');
    }
    
}
