<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\User;
use App\Dossier;
use PDF;
use App\Ville;
use Validator;
use Session;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editCompte(){
         return view('auth.editpass');
    }

    public function messagePer(){
          return [
            'required' => 'l\'attribut :attribute est obligatoire',
            'string' => 'l\'attribut :attribute doit etre une chaine des caractéres',
            'unique' => 'email déja attribué',
            'email' => 'email invalide',
            'min' => 'le mot de passe doit contenir au moin 5 caractéres'
        ];
    }

    public function saveEditCompte(Request $request){
         $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:5',
        ] ,$this->messagePer());
        if ($validator->fails()) {
            return redirect('/parametres')
                         ->withErrors($validator)
                         ->withInput();
        }else {
            $user = User::findOrFail(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            Session::flash('success', 'Compte" ' .$request->email. ' "  Modifiée avec succées ');
            return redirect('/parametres');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'etudiant'){

            return redirect('/etudiant');

        }else if(Auth::user()->role == 'admin') {
            
            return redirect('/admin');

        }else if(Auth::user()->role == 'employe') {
            
            return redirect('/employe');
            
        }

    }

    public function downloadrRECU()
    {
        
        $this->middleware('ChekRole:etudiant');
        $pdf = PDF::loadView('etudiant.dossier.recu');
        return $pdf->download('recu_' . Auth::user()->id . '.pdf');

    }
}
