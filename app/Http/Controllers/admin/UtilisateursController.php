<?php

namespace App\Http\Controllers\admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
class UtilisateursController extends Controller
{ 
    
    /**
     * Display a listing of the resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

            $Utilisateurs = User::where('role', '!=', 'etudiant')->get();
            return view('admin.utilisateurs.index', ['utilisateurs' => $Utilisateurs] );

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

          return view('admin.utilisateurs.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        $validator = Validator::make($request->all(),$this->validation() ,$this->messagePer());

        if ($validator->fails()) {
            return redirect('utilisateurs/create')
                         ->withErrors($validator)
                         ->withInput();
            
        }else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = 'employe';
            $user->droits = implode(",", $request->droits);
            $user->password = bcrypt($request->password);
            $user->save();
            Session::flash('success', 'Employé " ' .$request->name. ' " Ajoutée avec succées ');
            return redirect('/utilisateurs');
        }

           
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
        //


        $user = User::findOrFail($id);

        return view('admin.utilisateurs.edit',['user' => $user] );
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'droits' => 'required'
        ] ,$this->messagePer());
        if ($validator->fails()) {
            return redirect('utilisateurs/'.$id.'/edit')
                         ->withErrors($validator)
                         ->withInput();
        }else {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->droits = implode(",", $request->droits);
            $user->save();
            Session::flash('success', 'Employé" ' .$request->name. ' "  Modifiée avec succées ');
            return redirect('/utilisateurs');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $user = User::findOrFail($id);
        User::destroy($id);

        Session::flash('success', 'Employé supprimée avec succées ');

        return redirect('/utilisateurs');
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

    public function validation(){
        return [
            'name' => 'required|string',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:5',
            'droits' => 'required'
        ];
    }
}
