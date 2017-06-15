<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Image;

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
            'name' => 'required|string|max:60',
            'alias' => 'required|max:30|unique:car_rallies|regex:/^[a-zA-Z0-9-]+$/',
            'description' => 'required|string|max:300',
            'starts_at' => 'required',
            'starts_at_hour' => 'required',
            'place' => 'required|string',
            'contact_email' => 'required|string|email',
            'contact_phone_number' => 'required|string|min:7',
            'ends_at' => 'nullable|after_or_equal:starts_at',

            'username' => 'required|string|max:30',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if (request()->hasFile('cover')) {
            $cover = str_replace('public/', '', request()->file('cover')->store('public/covers'));
        }
        else {
            $cover = 'default.jpg';
        }


        $carRally = CarRally::create([
            'name' => request('name'),
            'alias' => request('alias'),
            'description' => request('description'),
            'starts_at' => request('starts_at'),
            'ends_at' => request('ends_at'),
            'starts_at_hour' => request('starts_at_hour'),
            'ends_at_hour' => request('ends_at_hour'),
            'place' => request('place'),
            'contact_email' => request('contact_email'),
            'contact_phone_number' => request('contact_phone_number'),
            'cover' => $cover
        ]);


        $user = \App\User::create([
            'car_rally_id' => $carRally->id,
            'username' => request('username'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'creator' => true
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

    public function dashboardShow(CarRally $carRally)
    {
        return view('dashboard.show', compact('carRally'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(CarRally $carRally)
    {
         return view('dashboard.car-rally.edit', compact('carRally'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, CarRally $carRally)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:60',
            'description' => 'required|string|max:300',
            'starts_at' => 'required',
            'starts_at_hour' => 'required',
            'ends_at' => 'nullable|after_or_equal:starts_at',
            'place' => 'required|string',
            'contact_email' => 'required|string|email',
            'contact_phone_number' => 'required|string|min:7'
        ]);

        $input = $request->all(); /* Request all inputs */
        $input['cover'] = str_replace('public/', '', request()->file('cover')->store('public/covers'));

        $carRally->fill($input); /* Fill the inputs with new values */

        $carRally->save(); /* Save the new values in database */

        // $request['cover'] = str_replace('public/', '', request()->file('cover')->store('public/covers'));
        // $carRally->update($request->only('cover'));
        //
        // $carRally->update($request->except(['alias', 'cover']));


        return back();

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
