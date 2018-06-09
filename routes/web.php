<?php

// -------------------------------------------------------Authentification Routes

Auth::routes();

// ----------------------------------------------------------------Public Routes

Route::get('/home', 'HomeController@index')->name('home');

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
    Route::resource('/regles', 'admin\\RegleController', ['except' => ['destroy','show','create','store','edit']]);
    Route::resource('/app', 'admin\\AppController', ['except' => ['destroy','show','create','store','edit']]);
    Route::resource('/utilisateurs','admin\\UtilisateursController');
   
});

// --------------------------------------------------Employée and admin Routes

Route::middleware(['auth','ChekRole:employe,admin'])->group(function () {
    
    Route::get('/employe', 'EmployeController@index' );
    Route::resource('/blocs', 'employe\\BlocController', ['except' => ['show']]);
  	Route::resource('/inscriptions', 'employe\\InscriptionsController');
  	Route::resource('/internes', 'employe\\InternesController');
	Route::resource('/chambres','employe\\ChambresController');
	Route::get('/reserver/{id}','employe\\InscriptionsController@reserver');

});

// ----------------------------------------------------------------Etudiant Routes

Route::middleware(['auth','ChekRole:etudiant'])->group(function () {
    
	Route::get('/etudiant', 'EtudiantController@index' );
	Route::resource('/dossier','etudiant\\DossierController',['except' => ['destroy','show','create']]);
	Route::get("/recu","EtudiantController@recu_inscription");
	Route::get("/attestation/admission","EtudiantController@recu_admission");
	Route::get("/attestation/residence","EtudiantController@recu_residence");
	Route::get("/resultat","EtudiantController@resultat");
	Route::resource("/changement","etudiant\\ChangementController@resultat");
	
});