@extends('layouts.app')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Aktualności</h4>

            @if (sizeof($carRally->posts)==0)
                <div class="card-panel">
                    {!! 'Organizator nie udostępnił jeszcze żdanych aktualności. W razie pytań, zachęcamy do skorzystania z <a href="/'.$carRally->alias.'/kontakt">formularza kontaktowego</a>.' !!}
                </div>
            @endif
            @foreach ($carRally->posts as $post)
                <div class="card-panel">
                    <h4>{{ $post->title }}</h4>
                    <p>
                        {{ $post->body }}
                    </p>
                </div>
            @endforeach

        </div>
        <div class="col s4">
        </div>
    </div>
</div>
@endsection
