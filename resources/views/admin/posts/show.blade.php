@extends('layouts.admin')

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
                        <h6 class="grey-text">Dodano: {{ $post->created_at }}</h6>
                        <div>
                            {!! $post->body !!}
                        </div>
                    </div>
                </div>
            </div>
            <a class="grey-text right" href="/administrator/wpisy">&larr; Powrót do wpisów</a>
        </div>
    </div>
</div>
@endsection
