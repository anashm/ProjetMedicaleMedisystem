<?php

namespace App\Models;
use Eloquent;


class Visite extends Eloquent
{
    protected $table = 'visite';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $guarded = [];
}
