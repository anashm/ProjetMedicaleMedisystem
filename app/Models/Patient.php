<?php

namespace App\Models;
use Eloquent;


class Patient extends Eloquent
{
    protected $table = 'patients';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $guarded = [];
}
