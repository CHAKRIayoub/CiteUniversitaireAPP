<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Session;
use App\Application;

class AppController extends Controller
{

    public function index()
    {

    	$app = Application::where('id', 1)->first();
    	return view('admin.app.index', ['app' => $app] );

    }

    public function update(Request $request, $id){

        $app = Application::where('id', 1)->first();
        $app->date_d = $request->ddi;
        $app->date_f = $request->dfi;
        $app->save();
 
    	Session::flash('success', 'Dates Modifiés avec succées ');

     	return redirect('/app');

    }

}