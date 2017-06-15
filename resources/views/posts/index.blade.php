@extends('layouts.app')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Aktualności</h4>
            <div class="row">

                @if (sizeof($posts)==0)
                    <div class="col s12">
                        <div class="card-panel">
                            {!! 'Organizator nie udostępnił jeszcze żadnych aktualności. W razie pytań, zachęcamy do skorzystania z <a href="/'.$carRally->alias.'/kontakt">formularza kontaktowego</a>.' !!}
                        </div>
                    </div>
                @endif
                @foreach ($posts as $post)
                    <div class="col s6">
                        <div class="card-panel">
                            <h4><a class="red-text" href="/{{ $carRally->alias }}/wpisy/{{ $post->id }}">{{ $post->title }}</a></h4>
                            <div class="divider"></div>
                            <h6 class="grey-text">Dodano: {{ $post->created_at }}</h6>
                            <p>
                                @php
                                    if (strlen($post->body) > 300) {
                                        echo substr((strip_tags($post->body)), 0, 300).'...';

                                    }
                                    else {
                                        echo strip_tags($post->body);
                                    }
                                @endphp
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @if ($posts->count() > 6)
        <div class="row">
            <div class="col s12">
                {{ $posts->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
