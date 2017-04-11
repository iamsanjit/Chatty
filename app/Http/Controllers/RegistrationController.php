<?php

namespace Chatty\Http\Controllers;

use Chatty\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{

        public function create()
        {
                return View('registration');
        }

        public function store(Request $request) 
        {

        	// validate the user
        	$this->validate($request, [
        		'email' => 'required|unique:users|email|max:255',
        		'username' => 'required|unique:users|alpha_dash|max:20',
        		'password' => 'required|min:6|confirmed',
        	]);

        	// Store user
                User::create([
                        'email' => request('email'),
                        'username' => request('username'),
                        'password' => bcrypt(request('password'))
                ]);

        	// Redirect to home page
                return redirect()->home()->with('info', 'Your account has been created.');


        }
           
}
