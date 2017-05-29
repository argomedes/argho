@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @foreach ($carRallies as $carRally)
                <h2>{{ $carRally->alias }}</h2>
            @endforeach
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <a href="zloty/create">Dodaj zlot</a>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
