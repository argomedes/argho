@extends('layouts.app')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Informacje o zlocie</h4>
            <div class="card">
                <div class="card-content">
                    @if ($carRally->info)
                        {!! $carRally->info !!}
                    @else
                        {!! 'Organizator nie udostępnił jeszcze informacji o zlocie. W razie pytań, zachęcamy do skorzystania z <a href="/'.$carRally->alias.'/kontakt">formularza kontaktowego</a>.' !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
