<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{	
	public function index()
	{
		if (Auth::check()) {
			return View('timeline.index');
		}
		return view('home');
	}
}
