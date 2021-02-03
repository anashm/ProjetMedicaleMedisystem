<?php

namespace App\Models;
use Eloquent;


class User extends Eloquent
{
    protected $table = 'users';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $guarded = [];
}
