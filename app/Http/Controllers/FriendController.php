<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Chatty\Models\User;

class FriendController extends Controller
{
	public function index($username)
	{
		$guestUser = User::where('username', $username)->first();
		if(!$guestUser) {
			abort(404);
		}
		return View('friends.index')->with('guestUser', $guestUser);
	}
}
