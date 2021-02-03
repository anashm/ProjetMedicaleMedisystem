<?php

namespace App\Models;
use Eloquent;


class Salle extends Eloquent
{
    protected $table = 'salles';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $guarded = [];
}
