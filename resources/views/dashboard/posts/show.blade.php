@extends('layouts.dashboard')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Aktualności</h4>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">
                        <h4>{{ $post->title }}</h4>
                        <div class="divider"></div>
                        <h6 class="grey-text">Dodano: {{ $post->created_at }} <span class="right"><a href="/{{ $carRally->alias }}/panel/wpisy/{{ $post->id }}/edytuj">Edytuj</a> | <a href="/{{ $carRally->alias }}/panel/wpisy/{{ $post->id }}/usun" onclick="return confirm('Czy na pewno chcesz usnąć wpis?')">Usuń</a></span></h6>
                        <div>
                            {!! $post->body !!}
                        </div>
                    </div>
                </div>
            </div>
            <a class="grey-text right" href="/{{ $carRally->alias }}/panel/wpisy">&larr; Powrót do wpisów</a>
        </div>
    </div>
</div>
@endsection
