<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\TypeExamen;


class SalleController extends Controller
{

    public function getSalles(Request $req){

    	$salles = Salle::all();

    	return $salles;
    }

    public function getExamenFromSalle(Request $req){

    	$examens = TypeExamen::where('id_salle',$req->id)
    							->get();


    	return $examens;
    }

    public function configSalle(Request $req){

    	return view('configuration.configuration_salle');
    }

    public function createSalle(Request $req){

    	$salle = new Salle();
    	$salle->nom_salle = $req->nom_salle;

    	$salle->save();

    	return 'succes';
    }


    public function updateSalle(Request $req){

    	$salle = Salle::where('id',$req->id_salle)
    					->update(['nom_salle' => $req->nom_salle ]);


    	return 'succes';

    }


    public function deleteSalle(Request $req){

    	$salle = Salle::where('id',$req->id)
    					->delete();


    	return 'succes';

    }




}

