<?php

namespace App\Models;
use Eloquent;


class TypeExamen extends Eloquent
{
    protected $table = 'type_examens';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $guarded = [];
}
