@extends('layouts.dashboard')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Statystyki zlotu</h5>

        </div>
        <div class="col s4">
            <div class="card">
                <div class="card-content center-align">
                    <h5>Liczba wpisów</h5>
                    <span class="big-text">{{ $carRally->posts()->count() }}</span>
                    <span class="grey-text">Najnowszy dodano: <a href="/{{ $carRally->alias }}/panel/wpisy/{{$carRally->posts()->orderBy('created_at', 'desc')->first()->id}}">{{ $carRally->posts()->orderBy('created_at', 'desc')->first()->created_at }}</a></span>
                </div>
            </div>
        </div>

        <div class="col s4">
            <div class="card">
                <div class="card-content center-align">
                    <h5>Liczba zgłoszeń</h5>
                    <span class="big-text">{{ $carRally->registrations()->count() }}</span>
                    <span class="grey-text">Najnowsze wysłano: <a href="/{{ $carRally->alias }}/panel/zgloszenia">{{ $carRally->posts()->orderBy('created_at', 'desc')->first()->created_at }}</a></span>
                </div>
            </div>
        </div>

        <div class="col s4">
            <div class="card">
                <div class="card-content center-align">
                    <h5>Liczba zapytań</h5>
                    <span class="big-text">{{ $carRally->questions()->count() }}</span>
                    <span class="grey-text">Najnowsze wysłano: <a href="/{{ $carRally->alias }}/panel/zapytania">{{ $carRally->posts()->orderBy('created_at', 'desc')->first()->created_at }}</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
