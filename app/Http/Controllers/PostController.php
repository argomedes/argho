<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\CarRally;

class PostController extends Controller
{
    public function index(CarRally $carRally)
    {
        $posts = Post::latest()
            ->paginate(6);

        return view('posts.index', compact('carRally', 'posts'));
    }

    public function dashboardIndex(CarRally $carRally)
    {
        $posts = Post::latest()
            ->paginate(6);

        return view('dashboard.posts.index', compact('carRally', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CarRally $carRally)
    {
        return view('dashboard.posts.create', compact('carRally'));
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

        auth()->user()->publish(
            new Post(request(['car_rally_id', 'title', 'body']))
        );

        return redirect()->route('dashboard.posts.index', ['carRally'=> $carRally->alias]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CarRally $carRally, Post $post)
    {
        return view('posts.show', compact('carRally', 'post'));
    }

    public function dashboardShow(CarRally $carRally, Post $post)
    {
        return view('dashboard.posts.show', compact('carRally', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CarRally $carRally, Post $post)
    {
        return view('dashboard.posts.edit', compact('carRally', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarRally $carRally, Post $post)
    {
        $post->update($request->all());

        return redirect()->route('dashboard.posts.index', ['carRally'=> $carRally->alias]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarRally $carRally, Post $post)
    {
        $post->delete();

        return redirect()->route('dashboard.posts.index', ['carRally'=> $carRally->alias]);
    }
}
