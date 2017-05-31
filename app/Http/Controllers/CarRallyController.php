<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CarRally;

class CarRallyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $carRallies = CarRally::all();

        return view('car-rally.index')
            ->with('carRallies', $carRallies);

    }

    public function create()
    {
        return view('car-rally.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|string|max:100',
            'alias' => 'required|max:30|unique:car_rallies|regex:/^[a-zA-Z0-9-]+$/',
            'description' => 'required|string|max:600',
            'username' => 'required|string|max:30',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $carRally = CarRally::create([
            'name' => request('name'),
            'alias' => request('alias'),
            'description' => request('description'),
            'starts_at' => request('starts_at'),
            'ends_at' => request('ends_at'),
        ]);

        $user = \App\User::create([
            'car_rally_id' => $carRally->id,
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        auth()->login($user);

        return redirect()->route('zlot', ['carRally'=> $carRally->alias]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(CarRally $carRally)
    {
        return view('car-rally.show', compact('carRally'));
    }
    public function dashboard(CarRally $carRally)
    {
        return view('car-rally.show', compact('carRally'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
