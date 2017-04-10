<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{	
	public function index()
	{
		return View('home');
	}
}
