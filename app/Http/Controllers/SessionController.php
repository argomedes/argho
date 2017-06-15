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

    public function dashboardCreate(\App\CarRally $carRally)
    {
        return view('auth.login', compact('carRally'));
    }

    public function store(\App\CarRally $carRally, Request $request)
    {
         $remember = ($request->has('remember')) ? true : false;

        if(! auth()->attempt(request(['car_rally_id', 'email', 'password']), $remember)) {
    		return back()->withErrors([
    			'email_or_password' => 'Podany email lub hasło jest nieprawidłowe. Proszę spróbować ponownie.'
    		]);
    	}

        return redirect()->route('dashboard', ['carRally'=> $carRally->alias]);
    }

    public function destroy(\App\CarRally $carRally)
    {
        auth()->logout();

        return redirect()->route('zlot.index', ['carRally'=> $carRally->alias]);;
    }
}
