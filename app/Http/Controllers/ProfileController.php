<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Chatty\Models\User;
use Auth;

class ProfileController extends Controller
{

        public function __construct() {
                $this->middleware('auth')->only('edit', 'update');   
        }

       	public function show($username)
       	{	
       		$user = User::where('username', $username)->first();
       		return $user ? View ('user.profile', compact('user')) : abort(404);
       	}

       	public function edit()
       	{
       		return View('user.edit');
       	}

       	public function update(Request $request) 
       	{	
       		$this->validate($request, [
                            'first_name' => 'alpha|max:30|nullable',
                            'last_name' => 'alpha|max:30|nullable',
                            'location' => 'max:50|nullable'
                    ]);

                    Auth::user()->update([
                            'first_name' => request('first_name'),
                            'last_name' => request('last_name'),
                            'location' => request('location')
                    ]);

                    return redirect()->home()->with('info', 'Your profile has been updated.');
       	}
}
