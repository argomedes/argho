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
                    @if ($carRally->posts()->count() > 0)
                        <span class="grey-text">Najnowszy dodano: <a href="/{{ $carRally->alias }}/panel/wpisy/{{$carRally->posts()->orderBy('created_at', 'desc')->first()->id}}">{{ $carRally->posts()->orderBy('created_at', 'desc')->first()->created_at }}</a></span>
                    @else
                        <span>&nbsp;</span>
                    @endif

                </div>
            </div>
        </div>

        <div class="col s4">
            <div class="card">
                <div class="card-content center-align">
                    <h5>Liczba zgłoszeń</h5>
                    <span class="big-text">{{ $carRally->registrations()->count() }}</span>
                    @if ($carRally->registrations()->count() > 0)
                        <span class="grey-text">Najnowsze wysłano: <a href="/{{ $carRally->alias }}/panel/zgloszenia">{{ $carRally->registrations()->orderBy('created_at', 'desc')->first()->created_at }}</a></span>
                    @else
                        <span>&nbsp;</span>
                    @endif

                </div>
            </div>
        </div>

        <div class="col s4">
            <div class="card">
                <div class="card-content center-align">
                    <h5>Liczba zapytań</h5>
                    <span class="big-text">{{ $carRally->questions()->count() }}</span>
                    @if ($carRally->questions()->count() > 0)
                        <span class="grey-text">Najnowsze wysłano: <a href="/{{ $carRally->alias }}/panel/zapytania">{{ $carRally->questions()->orderBy('created_at', 'desc')->first()->created_at }}</a></span>
                    @else
                        <span>&nbsp;</span>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
