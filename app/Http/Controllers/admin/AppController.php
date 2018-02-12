<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Session;

class AppController extends Controller
{

    public function index()
    {

    	$dates = Config::get('AppDates.dates');
    	return view('admin.app.index', ['dates' => $dates] );

    }

    public function update(Request $request, $id){


    	Config::set('AppDates.dates.debut_inscription',$request->ddi);
    	Config::set('AppDates.dates.fin_inscription',$request->dfi);

 

    	Session::flash('success', 'Dates Modifiés avec succées ');

        return redirect('/app');

    }

}