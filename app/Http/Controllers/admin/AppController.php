<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Session;
use App\User;
use App\Application;
use App\Dossier;
use \Auth;


class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $droits = explode(",",Auth::user()->droits);
            if (in_array("gestion des dates", $droits) || 
                Auth::user()->role == 'admin'){
                return $next($request);
            }else{
                return redirect('/employe');
            }
        }); 
    }

    public function index()
    {

    	$app = Application::where('id', 1)->first();
    	return view('admin.app.index', ['app' => $app] );

    }

    public function update(Request $request, $id){

        if($request->todo == 'new'){
            $boy = Dossier::list_accpt('masculin')['list'];
            $girl = Dossier::list_accpt('feminin')['list'];
            foreach (array_merge($boy,$girl) as $key => $value) {
                User::destroy($value->user_id);
                Dossier::destroy($value->$id);
            }
            $users = User::doesntHave('hebergement')->get();
            foreach ($users as $key => $value) {
                if ($value->role == 'etudiant') {
                    User::destroy($value->id);
                }
            }
       
        }
        $app = Application::where('id', 1)->first();
        $app->date_d = $request->ddi;
        $app->date_f = $request->dfi;
        $app->save();
 
    	Session::flash('success', 'Dates Modifiés avec succées ');

     	return redirect('/app');

    }

}