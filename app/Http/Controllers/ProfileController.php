<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Chatty\Models\User;

class ProfileController extends Controller
{
   	public function show($username)
   	{	
   		$user = User::where('username', $username)->first();
   		return $user ? View ('user.profile', compact('user')) : abort(404);
   	}
}
