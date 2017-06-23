<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarRally;
use App\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(CarRally $carRally)
     {
         $questions = Question::latest()
            ->where('car_rally_id', $carRally->id)
             ->paginate(10);

         return view('dashboard.questions.index', compact('carRally', 'questions'));
     }

     public function adminIndex()
     {
         $questions = Question::latest()
             ->paginate(10);

         return view('admin.questions.index', compact('questions'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CarRally $carRally)
    {
        return view('questions.index', compact('carRally'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CarRally $carRally)
    {
        $this->validate(request(), [
            'car_rally_id' => 'required',
            'name' => 'required|string|max:60',
            'email' => 'required|email|max:255',
            'topic' => 'required|string|max:60',
            'body' => 'required|string'
        ]);

        Question::create([
            'car_rally_id' => request('car_rally_id'),
            'name' => request('name'),
            'email' => request('email'),
            'topic' => request('topic'),
            'body' => request('body')
        ]);

        return redirect()->route('questions.create', ['carRally'=> $carRally->alias]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function adminShow(Question $question)
    {
        return view('admin.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function adminEdit(Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    public function adminUpdate(Request $request, Question $question)
    {
        $question->update($request->all());

        return redirect()->route('admin.questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(CarRally $carRally, Question $question)
     {
         $question->delete();

         return redirect()->route('dashboard.questions.index', ['carRally'=> $carRally->alias]);
     }
}
