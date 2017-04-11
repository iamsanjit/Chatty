<?php

namespace Chatty\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{	
	use Authenticatable;
	protected $fillable = [
		'username',
		'email',
		'password',
		'first_name',
		'last_name',
		'location'
	];

	
}
