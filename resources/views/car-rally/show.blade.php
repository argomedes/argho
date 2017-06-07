@extends('layouts.dashboard')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s3">
        </div>
        <div class="col s9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{ $carRally->description }}
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
