<?php

namespace Chatty\Http\Controllers;

use Chatty\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{

        public function __construct() {
              $this->middleware('guest');  
        }
        public function create()
        {
                return View('auth.registration');
        }

        public function store(Request $request) 
        {

        	$this->validate($request, [
        		'email' => 'required|unique:users|email|max:255',
        		'username' => 'required|unique:users|alpha_dash|max:20',
        		'password' => 'required|min:6|confirmed',
        	]);

                User::create([
                        'email' => request('email'),
                        'username' => request('username'),
                        'password' => bcrypt(request('password'))
                ]);

                return redirect()->home()->with('info', 'Your account has been created.');


        }
           
}
