<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\CarRally;

class PostController extends Controller
{
    public function index(CarRally $carRally)
    {
        return view('posts.index')->with('carRally', $carRally);
    }

    public function dashboardIndex(CarRally $carRally)
    {
        return view('dashboard.posts.index')->with('carRally', $carRally);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CarRally $carRally)
    {
        return view('dashboard.posts.create')->with('carRally', $carRally);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'car_rally_id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['car_rally_id', 'title', 'body']))
        );

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CarRally $carRally, Post $post)
    {
        return view('posts.show')->with('post', $post);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
