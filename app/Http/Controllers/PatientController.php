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
        $patient->id_medecin_traitant = $req->medecin_traitants;

    	$patient->save();

    	$array_salles = $req->salles;
    	$array_examen = $req->examens;
        $array_prix_cotes = $req->array_prix_cotes;
    	for ($i=0; $i <count($array_salles) ; $i++) { 
    		 
    		$visite = new Visite();
    		$visite->id_patient = $patient->id;
    		$visite->id_salle = $array_salles[$i];
    		$visite->id_examen = $array_examen[$i];
            $visite->prix_cote = $array_prix_cotes[$i];

            $compte_rendu = TypeExamen::where('id',$array_examen[$i])->select('compte_rendu')->first();

            if($compte_rendu->compte_rendu)
                $visite->compte_rendu_patient = $compte_rendu->compte_rendu;
            else{
                $visite->compte_rendu_patient = '<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><em><span style="font-size:14.0pt"><span style="color:black">Kenitra le ,</span></span></em> <em><span style="font-size:14.0pt"><span style="color:black">date_examen</span></span></em></span></span></p>

                    <p><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><em><span style="font-size:14.0pt"><span style="color:black">Nom&nbsp; Patient&nbsp;: name_patient</span></span></em></span></span></p>

                    <p><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><em><span style="font-size:14.0pt"><span style="color:black">Prenom Patient&nbsp;: prenom_patient</span></span></em></span></span></p>

                    <p><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><em><span style="font-size:14.0pt"><span style="color:black">Age Patient&nbsp;: age_patient</span></span></em></span></span></p>

                    <p><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><em><span style="font-size:14.0pt"><span style="color:black">Medecin traitant&nbsp;: Dr medecin_traitant</span></span></em></span></span></p>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <p style="text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><em><span style="font-size:14.0pt"><span style="color:black">examen_patient</span></span></em></span></span></p>';
            }


    		$visite->save();
    	}
    	return 'succes';

    	
    }


    public function getAllPatients(Request $req){
    	
         $array_patient = array();

        $patients = Patient::join("visite" , 'visite.id_patient' , '=' ,'patients.id')
                            ->join('type_examens','type_examens.id','=','visite.id_examen')
                            ->join('salles','salles.id','=','visite.id_salle')
                            ->leftjoin('medecin_traitants','medecin_traitants.id','=','patients.id_medecin_traitant')
                            ->select('patients.nom',
                                     'patients.prenom',
                                     'type_examens.nom_examen',
                                     'salles.nom_salle',
                                     'type_examens.montant',
                                     'medecin_traitants.nom_medecin',
                                     'patients.adresse',
                                     'visite.id as id_visite',
                                     'visite.prix_cote',
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
