<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Chatty\Models\User;

class FriendsController extends Controller
{
	public function index($username)
	{
		$user = User::where('username', $username)->first();

		if(!$user) {
			abort(404);
		}
		return View('friends.index')->with('user', $user);
	}
}
