<?php

namespace Chatty\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use DB;

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

	public function scopeSearch($query, $search)
	{
		return $query->where(DB::raw('CONCAT(first_name, \' \', last_name)'), 'LIKE', '%' . $search . '%')
			->orWhere('username', 'LIKE', '%' . $search . '%');
	}

	public function getName()
	{
		if ($this->first_name && $this->last_name) {
			return $this->first_name . ' ' . $this->last_name;
		}
		if ($this->first_name) {
			return $this->first_name;
		}
		return  null;
	}

	public function getNameOrUsername () {
		return $this->getName() ?: $this->username;
	}
	
}
