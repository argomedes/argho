@extends('layouts.admin')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Zapytania</h4>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">
                        <h4>{{ $question->topic }}</h4>
                        <div class="divider"></div>
                        <h6 class="grey-text">Wysłano: {{ $question->created_at }} <br />Autor: {{ $question->name }} ({{ $question->email }})</h6>
                        <div>
                            {!! $question->body !!}
                        </div>
                    </div>
                </div>
            </div>
            <a class="grey-text right" href="/administrator/zapytania">&larr; Powrót do zapytań</a>
        </div>
    </div>
</div>
@endsection
