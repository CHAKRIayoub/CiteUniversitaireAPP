<?php


// ---------------------------------------------------------------Authentification Routes

Auth::routes();



// ----------------------------------------------------------------Public Routes

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@index')->name('test');
Route::get('/', function () {return view('welcome'); });


// Route::middleware(['auth'])->group(function ()
// {


	// ----------------------------------------------------------------Admin Routes
	
	Route::middleware(['auth','ChekRole:admin'])->group(function () {
	    
	    Route::get('/admin', 'AdminController@index' );

	    Route::resource(	'/regles',
	    					'admin\\RegleController',
	    					['except' => ['destroy','show','create']]);
	   
	});





	// ----------------------------------------------------------Employée and admin Routes

	Route::middleware(['auth','ChekRole:employe,admin'])->group(function () {
	    
	    Route::get('/employe', 'EmployeController@index' );

	    Route::resource('/blocs', 'employe\\BlocController', ['except' => ['show']]);
	    
	});





	// ----------------------------------------------------------------Etudiant Routes

	Route::middleware(['auth','ChekRole:etudiant'])->group(function () {
	    
		Route::get('/etudiant', 'EtudiantController@index' );
		 
		Route::resource(	'/dossier',
		 				 	'etudiant\\DossierController', 
		 				 	['except' => ['destroy','show','create']]
		);
		 
		Route::get("/recu","HomeController@downloadrRECU");

	});


// });


