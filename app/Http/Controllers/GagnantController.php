<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gagnant;
use Carbon\Carbon;

class GagnantController extends Controller
{
     public function add_gagnant(Request $req){
    	
    	$resultats = Gagnant::all();


    	return $resultats;
    }

    public function liste_gagnants(){

    	$gagants=Gagnant::all();

    	return $gagants;
    }
}
