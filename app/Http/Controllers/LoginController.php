<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;


class LoginController extends Controller
{
    
    public function loginUser(Request $req){

    	

    	$user = User::where('login',$req->login)
    				//->where('password',bcrypt($req->password))
    				->count();


    	
    	if($user != 0) {
               


             if (Auth::attempt(['login' => $req->login, 'password' => $req->password])) {

                Session::put('login','loggedIn');

                 return 'good';
            }
     
            else 
            {
                return "not loogged in lawla";
            }
                   
                   
        }
        else 
        {
            return "not loogged in";
          
        }				

    }
}
