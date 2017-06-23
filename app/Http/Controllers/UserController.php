<?php

namespace App\Http\Controllers;

use App\User;
use App\CarRally;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(CarRally $carRally)
    {
        $users = User::where('car_rally_id', $carRally->id)->latest()
            ->paginate(10);

        return view('dashboard.users.index', compact('users', 'carRally'));
    }

    public function adminIndex()
    {
        $users = User::latest()
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function adminCreate()
    {
        return view('admin.users.create');
    }

    public function create(CarRally $carRally)
    {
        return view('dashboard.users.create', compact('carRally'));
    }

    protected function store(CarRally $carRally)
    {
        $this->validate(request(), [
            'username' => 'required|string|max:30',
            'email' => 'required|string|email|max:255'
        ]);

        $check = \App\User::where('car_rally_id', request('car_rally_id'))->where('email', request('email'))->first();

        if ($check) {
            return back()->withErrors([
    			'email' => 'Podany istniejący adres e-mail.'
    		]);
        }


        $password = str_random(20);

        $user = \App\User::create([
            'car_rally_id' => request('car_rally_id'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt($password),
            'creator' => false,
            'active' => true,
            'admin' => false
        ]);

        $alias = \App\CarRally::where('id', request('car_rally_id'))->first()->alias;

        \Mail::send('email.activate', ['alias' => $alias], function($message) {
            $message->to(request('email'))
                ->subject('Aktywacja konta');
        });

        return redirect()->route('dashboard.users.index', compact('carRally'));


    }

    protected function adminStore()
    {
        $this->validate(request(), [
            'username' => 'required|string|max:30',
            'email' => 'required|string|email|max:255'
        ]);

        $check = \App\User::where('car_rally_id', request('car_rally_id'))->where('email', request('email'))->first();

        if ($check) {
            return back()->withErrors([
    			'email' => 'Podany istniejący adres e-mail.'
    		]);
        }


        $password = str_random(20);

        $user = \App\User::create([
            'car_rally_id' => request('car_rally_id'),
            'car_rally_id' => request('car_rally_id'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt($password),
            'creator' => false,
            'active' => true,
            'admin' => true
        ]);

        $alias = \App\CarRally::where('id', request('car_rally_id'))->first()->alias;

        \Mail::send('email.activate', ['alias' => $alias], function($message) {
            $message->to(request('email'))
                ->subject('Aktywacja konta');
        });

        return redirect()->route('admin.users.index');

    }

    public function show(CarRally $carRally, User $user)
    {
        return view('dashboard.users.show', compact('carRally', 'user'));
    }

    public function adminShow(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(CarRally $carRally, User $user)
    {
        return view('dashboard.users.edit', compact('carRally', 'user'));
    }

    public function adminEdit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, CarRally $carRally, User $user)
    {
        $this->validate(request(), [
            'username' => 'required|string|max:30',
            'email' => 'required|string|email|max:255',
            'creator' => 'required|boolean',
            'admin' => 'required|boolean',
            'active' => 'required|boolean',
            'blocked' => 'required|boolean'
        ]);


        $check = \App\User::where('car_rally_id', request('car_rally_id'))->where('email', request('email'))->first();

        if ($check->id != $user->id) {
            return back()->withErrors([
    			'email' => 'Podano istniejący adres e-mail.'
    		]);
        }

        $user->update($request->all());

        return redirect()->route('dashboard.users.index', compact('carRally'));
    }

    public function adminUpdate(Request $request, User $user)
    {
        $this->validate(request(), [
            'username' => 'required|string|max:30',
            'email' => 'required|string|email|max:255',
            'creator' => 'required|boolean',
            'admin' => 'required|boolean',
            'active' => 'required|boolean',
            'blocked' => 'required|boolean'
        ]);


        $check = \App\User::where('car_rally_id', request('car_rally_id'))->where('email', request('email'))->first();

        if ($check->id != $user->id) {
            return back()->withErrors([
    			'email' => 'Podano istniejący adres e-mail.'
    		]);
        }

        $user->update($request->all());

        return redirect()->route('admin.users.index');
    }

    public function block(CarRally $carRally, User $user)
    {
        $user->blocked = !$user->blocked;

        $user->save();

        return redirect()->route('dashboard.users.index', compact('carRally'));
    }
}
