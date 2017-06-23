@extends('layouts.admin')

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
                        <h6 class="grey-text">Dodano: {{ $note->created_at }}</h6>
                        <div>
                            {!! $note->body !!}
                        </div>
                    </div>
                </div>
            </div>
            <a class="grey-text right" href="/administrator/notatki">&larr; Powrót do notatek</a>
        </div>
    </div>
</div>
@endsection
