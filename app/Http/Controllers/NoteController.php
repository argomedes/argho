<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\CarRally;

class NoteController extends Controller
{
    public function index(CarRally $carRally)
    {
        $notes = Note::latest()
            ->paginate(6);

        return view('dashboard.notes.index', compact('carRally', 'notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CarRally $carRally)
    {
        return view('dashboard.notes.create', compact('carRally'));
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
            'title' => 'required|max:60',
            'body' => 'required'
        ]);

        auth()->user()->publishNote(
            new Note(request(['car_rally_id', 'title', 'body']))
        );

        return redirect()->route('dashboard.notes.index', ['carRally'=> $carRally->alias]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CarRally $carRally, Note $note)
    {
        return view('dashboard.notes.show', compact('carRally', 'note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CarRally $carRally, Note $note)
    {
        return view('dashboard.notes.edit', compact('carRally', 'note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarRally $carRally, Note $note)
    {
        $note->update($request->all());

        return redirect()->route('dashboard.notes.index', ['carRally'=> $carRally->alias]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarRally $carRally, Note $note)
    {
        $note->delete();

        return redirect()->route('dashboard.notes.index', ['carRally'=> $carRally->alias]);
    }
}
