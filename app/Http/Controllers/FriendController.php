<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Chatty\Models\User;
use Auth;

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

	public function store($username) {
		$user = User::where('username', $username)->first();
		if (!$user) {
			return redirect()
				->home()
				->with('info', 'That user could not be found.');
		}

		if (Auth::user()->hasPendingFriendRequestOf($user) ||
			$user->hasPendingFriendRequestOf(Auth::user())) {
			return redirect()
				->route('profile.show', $user->username)
				->with('info', 'Friend request already pending.');
		}

		if (Auth::user()->isFriendWith($user)) {
			return redirect()
				->route('profile.show', $user->username)
				->with('info', 'You are already friends');
		}

		Auth::user()->addFriend($user);

		return redirect()
				->route('profile.show', $user->username)
				->with('info', 'Friend request has been sent.');
	}
}














