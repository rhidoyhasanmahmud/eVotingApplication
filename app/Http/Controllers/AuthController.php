<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
     // Login form
    public function index()
    {

    	return view('custom_auth.login_form');
    }

    public function signup_page(){
        return view('custom_auth.signup_form');
    }

    public function forget_password_page(){
        return view('custom_auth.forget_password_form');
    }

    public function authenticate(Request $request)
    {

    	// Validation Rules
    	$validator = Validator::make($request->all(), [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	// if validator fails
    	if($validator->fails())
    	{
    		return redirect()->back()->WithErrors($validator)->withInput();
    	}

    	if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'active' => 1
        ], $request->input('remember'))
        ) {
            session()->flash('message', 'Welcome to dashboard.');

           return redirect()->intended('dashboard');
        }
        
        // authentication failed...
        session()->flash('message', 'Invalid login credentials.');
        return redirect()->back();

    }
}
