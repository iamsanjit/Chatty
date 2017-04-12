<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class StatusController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}
	public function store(Request $request)
	{
		$this->validate($request, [
			'status' => 'required|max:1000'
		]);

		Auth::user()->statuses()->create([
			'body' => request('status'),
		]);

		return redirect()->home()->with('info', "Status has been updated.");
	}

}
