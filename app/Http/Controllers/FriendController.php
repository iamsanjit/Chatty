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

		if (Auth::user() == $user) {
			return redirect()->home();
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

	public function update($username) {
		$user = User::where('username', $username)->first();
		if (!$user) {
			return redirect()
				->home()
				->with('info', 'That user could not be found.');
		}

		if (!Auth::user()->hasFriendRequestReceivedFrom($user)) {
			return redirect()
				->home();
		}

		Auth::user()->acceptFriendRequest($user);

		return redirect()
			->route('profile.show', $user->username)
			->with('info', 'You and ' . $user->getFirstnameOrUsername() . ' are now friends.');

	}

	public function delete($username) {
		$user = User::where('username', $username)->first();
		if (!$user) {
			return redirect()
				->home()
				->with('info', 'That user could not be found.');
		}

		if (!Auth::user()->isFriendWith($user)) {
			return redirect()->home();
		}

		Auth::user()->removeFriend($user);
		return redirect()->back();
	}
}














