<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['destroy']);
    }

    public function create(\App\CarRally $carRally)
    {
        return view('auth.login', compact('carRally'));
    }

    public function store()
    {
        if(! auth()->attempt(request(['car_rally_id', 'email', 'password']))) {
    		return back()->withErrors([
    			'message' => 'Please check your credentials and try again.'
    		]);
    	}

        return redirect()->intended('/home');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }
}
