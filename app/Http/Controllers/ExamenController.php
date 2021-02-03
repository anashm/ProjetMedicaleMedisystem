<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeExamen;


class ExamenController extends Controller
{
    public function configExamen(Request $req){

    	return view('configuration.configuration_examen');
    }

    public function createExamen(Request $req){

    	$file = $req->file('thumbnail'); 

        $extension = $file->getClientOriginalExtension();
        $name=$file->getClientOriginalName();
       

          $fileNameToStore = $name.time().'.'.$extension;

         
          $path = $file->storeAs('public/thumbnails', $fileNameToStore);


    	$examen = new TypeExamen();
    	$examen->nom_examen = $req->examen;
    	$examen->montant =  $req->montant;
    	$examen->id_salle =  $req->salle;
    	$examen->compte_rendu = 'storage/thumbnails/'. $fileNameToStore;

    	$examen->save();

    	return 'succes';
    }


    public function getInfosFromExamenId(Request $req){

    	$examen = TypeExamen::where('id',$req->id)->first();

    	return $examen;
    }


    public function updateExamen(Request $req){
    	if($req->file('thumbnail_modif')){
    		$file = $req->file('thumbnail_modif'); 

        	$extension = $file->getClientOriginalExtension();
        	$name=$file->getClientOriginalName();
       

          $fileNameToStore = $name.time().'.'.$extension;

         
          $path = $file->storeAs('public/thumbnails', $fileNameToStore);
    	}

    	if($req->file('thumbnail_modif')){
    		$examen = TypeExamen::where('id',$req->id_exam)
    						  ->update(['nom_examen' => $req->nom_exam , 'montant' => $req->montant , 'compte_rendu' => 'storage/thumbnails/'. $fileNameToStore  ]);
    	}
    	
    	else{
    		$examen = TypeExamen::where('id',$req->id_exam)
    						  ->update(['nom_examen' => $req->nom_exam , 'montant' => $req->montant ]);
    	}


    	return 'succes';
    }


    public function deleteExamen(Request $req){

    	$examen = TypeExamen::where('id',$req->id_exam)
    						  ->delete();

    	return 'succes';
    }



}
