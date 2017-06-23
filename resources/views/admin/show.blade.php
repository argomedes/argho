@extends('layouts.admin')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Statystyki serwisu</h5>

        </div>
        <div class="col s6">
            <div class="card">
                <div class="card-content center-align">
                    <h5>Liczba zlotów</h5>
                    <span class="big-text">{{ $carRallies->count() }}</span>
                    @if ($carRallies->count() > 0)
                        <span class="grey-text">Najnowszy dodano: <a href="/{{ $carRallies->last()->alias }}">{{ $carRallies->last()->created_at }}</a></span>
                    @endif

                </div>
            </div>
        </div>

        <div class="col s6">
            <div class="card">
                <div class="card-content center-align">
                    <h5>Liczba użytkowników</h5>
                    <span class="big-text">{{ $users->count() }}</span>
                    @if ($users->count() > 0)
                        <span class="grey-text">Najnowszy dodano: <a href="/administrator/uzytkownicy/{{ $users->last()->id }}">{{ $users->last()->created_at }}</a></span>
                    @endif

                </div>
            </div>
        </div>

        {{-- <div class="col s4">
            <div class="card">
                <div class="card-content center-align">
                    <h5>Liczba zgłoszeń</h5>
                    <span class="big-text">
                        @php
                            $count = 0;
                            foreach ($carRallies as $carRally) {
                                $count += $carRally->registrations->count();
                            }
                        @endphp{{ $count }}</span>
                    @if ($carRallies->count() > 0)
                        <span class="grey-text">Najnowszy dodano: <a href="/{{ $carRallies->first()->alias }}">{{ $carRallies->first()->created_at }}</a></span>
                    @endif

                </div>
            </div>
        </div> --}}


    </div>
</div>
@endsection
