<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dossier;
use App\User;
use App\Ville;
use App\Application;
use App\Bloc;
use App\Chambre;

class TestController extends Controller
{
    public function upl(request $request)
    {
         request()->validate([

            'papers' => 'required|mimes:pdf',

        ]);



        $imageName = time().'.'.request()->img->getClientOriginalExtension();

        request()->img->move(public_path('images'), $imageName);
    }

     public function index()
    {

        return view('test') ;

    }

}
