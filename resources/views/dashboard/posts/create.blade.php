@extends('layouts.dashboard')

@section('head-end')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection
@section('content')
    <h1>Publlish a post</h1>
    <hr>
    <form method="POST" action="/{{ $carRally->alias }}/posts">
        {{ csrf_field() }}

        <input name="car_rally_id" type="hidden" value="{{ $carRally->id }}">

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea type="text" class="form-control" id="body" name="body" placeholder="Body"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="bt btn-primary">Publish</button>
        </div>

        @include ('layouts.errors')
    </form>
@endsection
