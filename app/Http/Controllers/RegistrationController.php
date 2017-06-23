<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarRally;
use App\Registration;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(CarRally $carRally)
     {
         $registrations = Registration::latest()
            ->where('car_rally_id', $carRally->id)
             ->paginate(10);

         return view('dashboard.registrations.index', compact('carRally', 'registrations'));
     }

     public function adminIndex()
     {
         $registrations = Registration::latest()
             ->paginate(10);

         return view('admin.registrations.index', compact('registrations'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CarRally $carRally)
    {
        return view('registrations.create')->with('carRally', $carRally);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRally $carRally)
    {
        $this->validate(request(), [
            'car_rally_id' => 'required',
            'vehicle' => 'required|string|max:60',
            'year' => 'required|digits:4',
            'photo' => 'required',
            'driver' => 'required|string|max:30',
            'email' => 'required|string|email|max:255',
            'phone_number' => 'nullable|string|min:7|max:30',
            'pilot' => 'nullable|string|max:30',
            'additional_crew' => 'nullable|string|max:90',
            'numb_of_kids' => 'nullable|integer|digits:1',
            'additional_text' => 'nullable|string|max:300'
        ]);

        $photo = str_replace('public/', '', request()->file('photo')->store('public/vehicle-photos/'.request('car_rally_id')));

        $crew_size = 1 + ((request('pilot'))?1:0) + count(explode(",", request('additional_crew')));

        $registration = Registration::create([
            'car_rally_id' => request('car_rally_id'),
            'vehicle' => request('vehicle'),
            'year' => request('year'),
            'photo' => $photo,
            'driver' => request('driver'),
            'email' => request('email'),
            'phone_number' => request('phone_number'),
            'pilot' => request('pilot'),
            'additional_crew' => request('additional_crew'),
            'numb_of_kids' => request('numb_of_kids'),
            'numb_of_all' => $crew_size,
            'additional_text' => request('additional_text'),
        ]);

        return redirect()->route('zlot.index', ['carRally'=> $carRally->alias]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(CarRally $carRally, Registration $registration)
     {
         return view('dashboard.registrations.show', compact('carRally', 'registration'));
     }

     public function adminShow(Registration $registration)
     {
         return view('admin.registrations.show', compact('registration'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(CarRally $carRally, Registration $registration)
     {
         return view('dashboard.registrations.edit', compact('carRally', 'registration'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, CarRally $carRally, Registration $registration)
     {
         $registration->update($request->all());

         return redirect()->route('dashboard.registrations.index', ['carRally'=> $carRally->alias]);
     }

     public function adminEdit(Registration $registration)
     {
         return view('admin.registrations.edit', compact('registration'));
     }

     public function adminUpdate(Request $request, Registration $registration)
     {
         $registration->update($request->all());

         return redirect()->route('admin.registrations.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(CarRally $carRally, Registration $registration)
     {
         $registration->delete();

         return redirect()->route('dashboard.registrations.index', ['carRally'=> $carRally->alias]);
     }
}
