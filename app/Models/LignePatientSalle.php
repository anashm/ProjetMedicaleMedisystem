<?php

namespace App\Models;
use Eloquent;


class LignePatientSalle extends Eloquent
{
    protected $table = 'ligne_patient_salle';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $guarded = [];
}
