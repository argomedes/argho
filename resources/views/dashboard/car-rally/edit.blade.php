@extends('layouts.dashboard')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s8 offset-s2">
            <h4 class="center-align">Edytuj zlot</h4>

            <div class="card">
                <div class="card-content">
                    <form method="POST" action="{{ route('aktualizuj-zlot', ['carRally' => $carRally]) }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="input-field{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Nazwa zlotu *</label>

                            <input id="name" type="text" class="validate{{ $errors->has('name') ? ' invalid' : '' }}" name="name" value="{{ $carRally->name }}" required autofocus data-length="60">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-field{{ $errors->has('alias') ? ' has-error' : '' }}">
                            <label for="alias">Alias *</label>

                            <input id="alias" type="text"  name="alias" value="{{ $carRally->alias }}" required disabled data-length="30">

                            @if ($errors->has('alias'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alias') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-field">
                            <label for="description">Opis *</label>

                            <textarea id="description" class="materialize-textarea{{ $errors->has('description') ? ' invalid' : '' }}" name="description" required data-length="300">{{ $carRally->description }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col s9">
                                <div class="input-field">
                                    <label for="starts_at" class="active">Data początku zlotu *</label>

                                    <input id="starts_at" type="date" class="datepicker{{ $errors->has('starts_at') ? ' invalid' : '' }}" name="starts_at" value="{{ $carRally->starts_at}}" required>

                                    @if ($errors->has('starts_at'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('starts_at') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col s3">
                                <div class="input-field">
                                    <label for="starts_at_hour" class="active">Godzina końca zlotu</label>

                                    <input id="starts_at_hour" type="time" class="{{ $errors->has('starts_at_hour') ? ' invalid' : '' }}" name="starts_at_hour" value="{{ $carRally->starts_at_hour }}" required>

                                    @if ($errors->has('starts_at_hour'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('starts_at_hour') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col s9">
                                <div class="input-field">
                                    <label for="ends_at" class="active">Data końca zlotu</label>

                                    <input id="ends_at" type="date" class="datepicker{{ $errors->has('ends_at') ? ' invalid' : '' }}" name="ends_at" value="{{ $carRally->ends_at }}">

                                    @if ($errors->has('ends_at'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ends_at') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col s3">
                                <div class="input-field">
                                    <label for="ends_at_hour" class="active">Godzina końca zlotu</label>

                                    <input id="ends_at_hour" type="time" class="{{ $errors->has('ends_at_hour') ? ' invalid' : '' }}" name="ends_at_hour" value="{{ $carRally->ends_at_hour }}">

                                    @if ($errors->has('ends_at_hour'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ends_at_hour') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="input-field">
                            <label for="place" class="active">Miejce odbywania się zlotu *</label>

                            <input id="place" type="text" class="{{ $errors->has('place') ? ' invalid' : '' }}" name="place" value="{{ $carRally->place }}" required>

                            @if ($errors->has('place'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('place') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col s9">
                                <div class="input-field">
                                    <span class="grey-text">Zdjęcie zlotu</span>

                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Plik</span>
                                            <input id="cover" type="file" name="cover">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate{{ $errors->has('cover') ? ' invalid' : '' }}" type="text" value="{{ $carRally->cover }}">
                                        </div>
                                    </div>
                                    @if ($errors->has('cover'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cover') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col s3">
                                <img class="responsive-img" src="{{ asset('storage/'.$carRally->cover) }}" />
                            </div>
                        </div>


                        <button type="submit" class="waves-effect waves-light btn">
                            Aktualizuj zlot
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
