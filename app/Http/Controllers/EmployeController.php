<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeController extends Controller
{
    
    public function __construct()
    {
    	$this->middleware('auth');
    	$this->middleware('ChekRole:employe');  
    }

    public function index()
    {
        return view('employe.index');
    }
}
