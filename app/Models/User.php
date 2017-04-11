<?php

namespace Chatty\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{	
	protected $fillable = [
		'username',
		'email',
		'password',
		'first_name',
		'last_name',
		'location'
	];
}
