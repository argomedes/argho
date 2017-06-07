@extends('layouts.app')

@section('content')
    {{-- @include('posts.post') --}}
    <h1>{{ $post->title }}</h1>

    {!! $post->body !!}

@endsection
