<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Chatty\Models\User;


class SearchController extends Controller
{
	public function index(Request $request)
	{
		$searchQuery = request('query');

		if (!request('query')) {
			return redirect()->home();
		}

		$users = User::search($searchQuery)->get();

		return View('search.results', compact('users'));
	}
}
