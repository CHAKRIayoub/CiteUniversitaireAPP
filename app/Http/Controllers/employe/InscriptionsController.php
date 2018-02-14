<?php

namespace App\Http\Controllers\employe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Application;
use App\Bloc;
use App\Dossier;

class InscriptionsController extends Controller
{
    
    public function index()
    {
        $app = Application::where('id', 1)->first();
        $dated = strtotime($app->date_d);
        $datef = strtotime($app->date_f);
        $datec = strtotime(date('y-m-d'));
        
        if ( ($datec >= $dated) && ($datef >= $datec ) ){

            dd('inscription en cours');

        }else{

            $selected_dossiers = Dossier::list_accpt();

        return view('employe.inscriptions.index',[ 'dossiers'=> $selected_dossiers]);

      }

    }





    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
    }

   
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        
    }

   
    public function update(Request $request, $id)
    {
        
    }

   
    public function destroy($id)
    {
        
    }
     


}
