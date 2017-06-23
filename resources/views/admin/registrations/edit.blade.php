@extends('layouts.admin')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Edutuj zgłoszenie</h4>

            <div class="card">
                <div class="card-content">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.registrations.update', ['registration' => $registration]) }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col s6">
                                <h5 class="center-align">Informacje o pojeździe i kierowcy</h5>
                                <div class="divider"></div>

                                <div class="row">
                                    <div class="col s8">
                                        <div class="input-field{{ $errors->has('vehicle') ? ' has-error' : '' }}">
                                            <label for="vehicle">Marka i model pojazdu *</label>

                                            <input id="vehicle" type="text"  name="vehicle" value="{{ $registration->vehicle }}" class="validate" required autofocus data-length="60">

                                            @if ($errors->has('vehicle'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('vehicle') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field{{ $errors->has('year') ? ' has-error' : '' }}">
                                            <label for="year">Rok produkcji pojazdu *</label>

                                            <input id="year" type="number"  name="year" value="{{ $registration->year }}" class="validate" required data-length="4">

                                            @if ($errors->has('year'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('year') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s9">
                                        <div class="input-field{{ $errors->has('photo') ? ' has-error' : '' }}">
                                            <span class="grey-text">Zdjęcie pojazdu *</span>

                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>Plik</span>
                                                    <input id="photo" type="file" name="photo">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text" value="{{ $registration->photo }}">
                                                </div>
                                            </div>
                                            @if ($errors->has('photo'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('photo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col s3">
                                        <img class="responsive-img" src="{{ asset('storage/'.$registration->photo) }}" />
                                    </div>
                                </div>

                                <div class="input-field{{ $errors->has('driver') ? ' has-error' : '' }}">
                                    <label for="driver">Imię i nazwisko kierowcy *</label>

                                    <input id="driver" type="text"  name="driver" value="{{ $registration->driver }}" class="validate" required data-length="30">

                                    @if ($errors->has('driver'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('driver') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col s6">
                                        <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">

                                            <input id="email" type="email"  name="email" value="{{ $registration->email }}" class="validate" required>
                                            <label for="email" data-error="Podaj prawidłowy adres e-mail">Adres e-mail *</label>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col s6">
                                        <div class="input-field{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                            <label for="phone_number">Numer telefonu</label>

                                            <input id="phone_number" type="number"  name="phone_number" value="{{ $registration->phone_number }}" class="validate">

                                            @if ($errors->has('phone_number'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col s6">
                                <h5 class="center-align">Informacje o załodze</h5>
                                <div class="divider"></div>

                                <div class="input-field{{ $errors->has('pilot') ? ' has-error' : '' }}">
                                    <label for="pilot">Imię i nazwisko pilota</label>

                                    <input id="pilot" type="text"  name="pilot" value="{{ $registration->pilot }}" class="validate" data-length="30">

                                    @if ($errors->has('pilot'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pilot') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col s8">
                                        <div class="input-field{{ $errors->has('additional_crew') ? ' has-error' : '' }}">
                                            <label for="additional_crew">Inni członkowie załogi (oddzieleni przecinkiem)</label>

                                            <input id="additional_crew" type="text"  name="additional_crew" value="{{ $registration->additional_crew }}" class="validate" data-length="90">

                                            @if ($errors->has('additional_crew'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('additional_crew') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field{{ $errors->has('numb_of_kids') ? ' has-error' : '' }}">
                                            <label for="numb_of_kids">Liczba dzieci w załodze</label>

                                            <input id="numb_of_kids" type="number"  name="numb_of_kids" value="{{ $registration->numb_of_kids }}" class="validate" data-length="1">

                                            @if ($errors->has('numb_of_kids'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('numb_of_kids') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="input-field{{ $errors->has('additional_text') ? ' has-error' : '' }}">
                                    <label for="additional_text">Dodatkowe informacje dla organizatora</label>

                                    <textarea id="additional_text" class="materialize-textarea validate" name="additional_text" data-length="300">{{ $registration->additional_text }}</textarea>

                                    @if ($errors->has('additional_text'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('additional_text') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col s12 center-align">
                                <button type="submit" class="waves-effect waves-light btn">
                                    Aktualizuj zgłoszenie
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <a class="grey-text right" href="/administrator/zgloszenia">&larr; Powrót do zgłoszeń</a>
        </div>
    </div>
</div>
@endsection
