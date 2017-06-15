@extends('layouts.dashboard')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Notatki</h4>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">
                        <h4>{{ $note->title }}</h4>
                        <div class="divider"></div>
                        <h6 class="grey-text">Dodano: {{ $note->created_at }} <span class="right"><a href="/{{ $carRally->alias }}/panel/notatki/{{ $note->id }}/edytuj">Edytuj</a> | <a href="/{{ $carRally->alias }}/panel/notatki/{{ $note->id }}/usun" onclick="return confirm('Czy na pewno chcesz usnąć notatkę?')">Usuń</a></span></h6>
                        <div>
                            {!! $note->body !!}
                        </div>
                    </div>
                </div>
            </div>
            <a class="grey-text right" href="/{{ $carRally->alias }}/panel/notatki">&larr; Powrót do notatek</a>
        </div>
    </div>
</div>
@endsection
