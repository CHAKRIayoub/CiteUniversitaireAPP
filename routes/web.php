<?php

use Illuminate\Http\Request;

use App\User;
// ------------------------------------------------------Authentification Routes

Auth::routes();

// ----------------------------------------------------------------Public Routes

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/parametres', 'HomeController@editCompte' );
Route::patch('/parametres', 'HomeController@saveEditCompte' )->name('parametres');

Route::get('/', function () {
	return view('welcome');
});

// ----------------------------------------------------------------Public Routes

Route::get('/test', 'TestController@index')->name('test');
Route::post('/upl', 'TestController@upl');
// Route::middleware(['auth'])->group(function ()

// ----------------------------------------------------------------Admin Routes
	
Route::middleware(['auth','ChekRole:admin'])->group(function () {
  Route::get('/admin', 'AdminController@index' );
  Route::resource('/utilisateurs','admin\\UtilisateursController');
  Route::resource('/import','admin\\ExportController', ['except' => ['destroy', 'create','edit', 'update']]);

});

// --------------------------------------------------Employée and admin Routes

Route::middleware(['auth','ChekRole:employe,admin'])->group(function () {   
  Route::get('/employe', 'EmployeController@index' );
  Route::resource('/blocs', 'employe\\BlocController', ['except' => ['show']]);
  Route::resource('/inscriptions', 'employe\\InscriptionsController');
  Route::resource('/internes', 'employe\\InternesController');
  Route::resource('/chambres','employe\\ChambresController');
  Route::resource('/transfert','employe\\TransfertController' , ['except' => ['index','destroy','store', 'create','edit']]);
  Route::resource('/permutation','employe\\PermutationController', ['except' => ['update','destroy','store', 'create','edit']]);
  Route::get('/reserver/{id}','employe\\InscriptionsController@reserver');
  Route::resource('/regles', 'admin\\RegleController',['except' => ['destroy','show','create','store','edit']]);
  Route::resource('/app', 'admin\\AppController', ['except' => ['destroy','show','create','store','edit']]);
});

// --------------------------------------------------------------Etudiant Routes

Route::middleware(['auth','ChekRole:etudiant'])->group(function () {  
	Route::get('/etudiant', 'EtudiantController@index' );
	Route::resource('/dossier','etudiant\\DossierController',
								 ['except' => ['destroy','show','create']]);
	Route::get("/recu","EtudiantController@recu_inscription");
	Route::get("/attestation/admission","EtudiantController@recu_admission");
	Route::get("/attestation/residence","EtudiantController@recu_residence");
	Route::get("/resultat","EtudiantController@resultat");
	Route::resource("/changement","etudiant\\ChangementController@resultat");
});