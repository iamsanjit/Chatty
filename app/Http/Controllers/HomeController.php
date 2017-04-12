<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Chatty\Models\Status;
use Auth;

class HomeController extends Controller
{	
	public function index()
	{
		if (Auth::check()) {

			$statuses = Status::notReply()->where( function($query) {
				return $query->where('user_id', Auth::user()->id)
					->orWhereIn('user_id', Auth::user()->friends()->pluck('id'));
			}) 
			->orderBy('created_at', 'desc')
			->paginate(5);
			
			return View('timeline.index', compact('statuses'));
		}
		return view('home');
	}
}
