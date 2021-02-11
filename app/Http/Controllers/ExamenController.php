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

        
       // return $req->compte_rendu;
        
          
          $examen = new TypeExamen();
            $examen->nom_examen = $req->examen;
            $examen->montant =  $req->montant;
            $examen->id_salle =  $req->salle;
            $examen->compte_rendu = mb_convert_encoding($req->compte_rendu,"UTF-8","UTF-8");
            //$examen->compte_rendu = htmlentities($req->compte_rendu);
            $examen->save();
       


    	

    	return 'succes';
    }


    public function getInfosFromExamenId(Request $req){

    	$examen = TypeExamen::where('id',$req->id)->first();

    	return $examen;
    }


    public function updateExamen(Request $req){
    	
    	
    		$examen = TypeExamen::where('id',$req->id_exam)
    						  ->update(['nom_examen' => $req->nom_exam , 'montant' => $req->montant , 
                                'compte_rendu' => mb_convert_encoding($req->compte_rendu,"UTF-8","UTF-8") ]);
    	
    	
    	


    	return 'succes';
    }


    public function deleteExamen(Request $req){

    	$examen = TypeExamen::where('id',$req->id_exam)
    						  ->delete();

    	return 'succes';
    }


    public function GetMontantExamen(Request $req){

        $examen = TypeExamen::where('id',$req->id_examen)
                            ->select('montant' , 'nom_examen')
                            ->first();

        return $examen;
    }

}
