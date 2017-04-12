<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Chatty\Models\Status;
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

	public function storeReply(Request $request, $statusId) {
		$this->validate($request, [
			'reply-'. $statusId => 'required|max:1000'
		], [
			'required' => 'The reply field is required.',
			'max' => 'The reply cannot contain more than 1000 chracters.'
		]);

		$status = Status::notReply()->find($statusId);

		if(!$status) {
			return redirect()->home();
		}

		if (!Auth::user()->isFriendWith($status->user) && Auth::user() != $status->user) {
			return redirect()->home();
		}

		$reply = Auth::user()->statuses()->create([
			'body' => request('reply-' . $statusId),
		]);

		$status->replies()->save($reply);

		return redirect()->back();

	}

}
