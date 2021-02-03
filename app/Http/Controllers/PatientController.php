<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\LignePatientSalle;
use Carbon\Carbon;


class PatientController extends Controller
{
    public function createPatient(Request $req){

    	//return $req->date_naissance;

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

    	$patient->save();

    	$array_salles = $req->salles;
    	$array_examen = $req->examens;
    	for ($i=0; $i <count($array_salles) ; $i++) { 
    		 
    		$ligne_patient_examen = new LignePatientSalle();
    		$ligne_patient_examen->id_patient = $patient->id;
    		$ligne_patient_examen->id_salle = $array_salles[$i];
    		$ligne_patient_examen->id_examen = $array_examen[$i];

    		$ligne_patient_examen->save();
    	}
    	return 'succes';

    	
    }


    public function getAllPatients(Request $req){
    	
        $patients = Patient::join("ligne_patient_salle" , 'ligne_patient_salle.id_patient' , '=' ,'patients.id')
                            ->join('type_examens','type_examens.id','=','ligne_patient_salle.id_examen')
                            ->join('salles','salles.id','=','ligne_patient_salle.id_salle')
                            ->select('patients.nom',
                                     'patients.prenom',
                                     'type_examens.nom_examen',
                                     'salles.nom_salle',
                                     'type_examens.montant'
                                    )
                            ->get();

     

        return view('patient.tablePatients',compact('patients'));
    }
}
