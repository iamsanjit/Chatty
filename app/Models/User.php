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

	public function friends() {
		return $this->friendsOfMine()->get()->merge(
			$this->friendOf()->get()
			);
	}

	public function friendsOfMine() {
		return $this->belongsToMany('\Chatty\Models\User', 'friends', 'user_id', 'friend_id')
			->wherePivot('accepted', true);
	}

	public function friendOf() {
		return $this->belongsToMany('\Chatty\Models\User', 'friends', 'friend_id', 'user_id')
			->wherePivot('accepted', true);
	}

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

	public function getFirstnameOrUsername() {
		return $this->first_name ?: $this->username;
	}

	public function getNameOrUsername () {
		return $this->getName() ?: $this->username;
	}

	public function getAvatarUrl($size) {
		// Use Gravatar for now, Later change it to get url of stroed images
		return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?s=' . $size . '&d=mm';
	}
	
}
