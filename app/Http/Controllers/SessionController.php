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

    public function adminCreate()
    {
        return view('admin.login');
    }

    public function store(\App\CarRally $carRally, Request $request)
    {
         $remember = ($request->has('remember')) ? true : false;


        if(! auth()->attempt(['car_rally_id' => $request->car_rally_id, 'email' => $request->email, 'password' => $request->password, 'active' => 1], $remember)) {
    		return back()->withErrors([
    			'email_or_password' => 'Podany email lub hasło jest nieprawidłowe lub konto jest niezweryfikowane.'
    		]);
    	}

        return redirect()->route('dashboard', ['carRally'=> $carRally->alias]);
    }

    public function adminStore(Request $request)
    {
         $remember = ($request->has('remember')) ? true : false;
         $email = $request->email;
         $password = $request->password;

        if(! auth()->attempt(['email' => $email, 'password' => $password, 'admin' => 1], $remember)) {
    		return back()->withErrors([
    			'email_or_password' => 'Podany email lub hasło jest nieprawidłowe. Proszę spróbować ponownie.'
    		]);
    	}

        return redirect()->route('admin.dashboard');
    }

    public function destroy(\App\CarRally $carRally)
    {
        auth()->logout();

        return redirect()->route('zlot.index', ['carRally'=> $carRally->alias]);;
    }

    public function stepOne()
    {
        return view('auth.step-one');
    }
}
