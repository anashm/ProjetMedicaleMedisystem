<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedecinTraitant;


class MedecinTraintantController extends Controller
{
    public function configMedecinTraitant(){

    	return view('configuration.medecin_traitant');
    }

    public function createMedecin(Request $req){

    	$medecin = new MedecinTraitant();
    	$medecin->nom_medecin = $req->nom_medecin;

    	$medecin->save();

    	return $medecin;
    }

    public function getAllMedecinTraitants(Request $req){

    	$medecins = MedecinTraitant::all();

    	return $medecins;

    }

    public function updateMedecin(Request $req){

    	MedecinTraitant::where('id',$req->id_medecin)->update(['nom_medecin' => $req->nom_medecin]);

    	return 'succes';
    }


    public function deleteMedecin(Request $req){

    	MedecinTraitant::where('id',$req->id)->delete();


    	return 'succes';
    }


}
