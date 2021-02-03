<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class WelcomeController extends Controller
{
     public function welcome(){
    	Auth::logout();
    	//Session::flush();

    	return view('welcome');
    }
   
}
