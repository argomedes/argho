@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h2>Dashboard</h2>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <a href="zloty/create">Dodaj zlot</a>

                    @if (count(Auth::user()->carRallies))
                        @foreach (Auth::user()->carRallies as $carRally)
                            <p>
                                {{ @carRally }}
                            </p>
                        @endforeach
                    @endif
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
