<?php

namespace App\Models;
use Eloquent;


class MedecinTraitant extends Eloquent
{
    protected $table = 'medecin_traitants';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $guarded = [];
}
