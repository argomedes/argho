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

    public function store(\App\CarRally $carRally)
    {
        if(! auth()->attempt(request(['car_rally_id', 'email', 'password']))) {
    		return back()->withErrors([
    			'email' => 'Podany email lub hasło jest nieprawidłowe. Proszę spróbowa ponownie.'
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
