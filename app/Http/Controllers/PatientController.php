<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Visite;
use Carbon\Carbon;
use ZipArchive;
use App\Models\TypeExamen;

class PatientController extends Controller
{
    public function createPatient(Request $req){

    	

    	$patient = new Patient();
    	$patient->cin = $req->cin;
    	$patient->nom = $req->nom_patient;
    	$patient->prenom = $req->prenom_patient;
    	$patient->date_naissance = Carbon::createFromFormat('d/m/Y',$req->date_naissance);
    	$patient->sexe = $req->sexe_patient;
    	$patient->civilite = $req->civilite_patient;
    	$patient->tel = $req->tel_patient;
    	$patient->adresse = $req->adresse_patient;
    	$patient->mutuelle = $req->mutuelle;
        $patient->date_creation = Carbon::now();
        $patient->allergie = $req->allergie;

    	$patient->save();

    	$array_salles = $req->salles;
    	$array_examen = $req->examens;
    	for ($i=0; $i <count($array_salles) ; $i++) { 
    		 
    		$visite = new Visite();
    		$visite->id_patient = $patient->id;
    		$visite->id_salle = $array_salles[$i];
    		$visite->id_examen = $array_examen[$i];

            $compte_rendu = TypeExamen::where('id',$array_examen[$i])->select('compte_rendu')->first();

            $visite->compte_rendu_patient = $compte_rendu->compte_rendu;
    		$visite->save();
    	}
    	return 'succes';

    	
    }


    public function getAllPatients(Request $req){
    	
         $array_patient = array();

        $patients = Patient::join("visite" , 'visite.id_patient' , '=' ,'patients.id')
                            ->join('type_examens','type_examens.id','=','visite.id_examen')
                            ->join('salles','salles.id','=','visite.id_salle')
                            ->select('patients.nom',
                                     'patients.prenom',
                                     'type_examens.nom_examen',
                                     'salles.nom_salle',
                                     'type_examens.montant',
                                     'type_examens.compte_rendu',
                                     'patients.adresse',
                                     'visite.id as id_visite',
                                     'patients.date_naissance',
                                     'patients.date_creation',
                                     'visite.updated_compte_rendu'
                                    )
                            ->get();

     
        


        


       
        return view('patient.tablePatients',compact('patients'));
    }

    public function downloadWordFile(Request $req){
       
        $visite = Visite::where('id',$req->idVisite)->first();

        return $visite->compte_rendu_patient;

    }

    public function SaveCompteRendu(Request $req){

       

        Visite::where('id',$req->idVisite)
                ->update(['compte_rendu_patient' => mb_convert_encoding($req->compte_rendu,"UTF-8","UTF-8"),
                        'updated_compte_rendu' => 1]);

        return 'succes';
    }


}
