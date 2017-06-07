@extends('layouts.app')

@section('head-end')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Regulamin zlotu</h4>
            <div class="card">
                <div class="card-content">
                    @if ($carRally->rules)
                        {!! $carRally->rules !!}
                    @else
                        {!! 'Organizator nie udostępnił jeszcze regulaminu zlotu. W razie pytań, zachęcamy do skorzystania z <a href="/'.$carRally->alias.'/kontakt">formularza kontaktowego</a>.' !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
