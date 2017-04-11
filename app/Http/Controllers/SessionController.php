<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionController extends Controller
{

	public function __construct()
	{
		// Only guest can access methods of this call, except destroy
		$this->middleware('guest', ['except' => 'destroy']);
	}

	public function create()
	{	
		return View('login');
	}

	public function store(Request $request)
	{

		$this->validate($request, [
			'email' => 'required',
			'password' => 'required'
		]);

		if ( !Auth::attempt($request->only('email', 'password'), $request->has('remember'))) {
			return redirect()->back()->with('info', 'Invalid credentials. Please try again.');
		}

		return redirect()->home();
	}

	public function destroy() {
		Auth::logout();
		return redirect()->home();
	}
}
