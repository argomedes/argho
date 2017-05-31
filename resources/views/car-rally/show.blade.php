@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
                <h2>{{ $carRally->alias }}</h2>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{ $carRally->description }}
                    <img src="{{ asset('storage/'.$carRally->cover) }}" />
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
