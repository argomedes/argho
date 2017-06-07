@extends('layouts.simple')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s8 offset-s2">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Utwórz zlot</span>
                    <div class="divider"></div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('utworz-zlot') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col s6">
                                <div class="input-field{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Nazwa zlotu *</label>

                                    <input id="name" type="text"  name="name" value="{{ old('name') }}" required autofocus data-length="60">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="input-field{{ $errors->has('alias') ? ' has-error' : '' }}">
                                    <label for="alias">Alias *</label>

                                    <input id="alias" type="text"  name="alias" value="{{ old('alias') }}" required data-length="30">

                                    @if ($errors->has('alias'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('alias') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="input-field{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description">Opis *</label>

                                    <textarea id="description" class="materialize-textarea" name="description" required data-length="300">{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="input-field{{ $errors->has('starts_at') ? ' has-error' : '' }}">
                                    <label for="starts_at">Początek zlotu *</label>

                                    <input id="starts_at" type="date" class="datepicker" name="starts_at" value="{{ old('starts_at') }}">

                                    @if ($errors->has('starts_at'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('starts_at') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="input-field{{ $errors->has('ends_at') ? ' has-error' : '' }}">
                                    <label for="ends_at">Koniec zlotu</label>

                                    <input id="ends_at" type="date" class="datepicker" name="ends_at" value="{{ old('ends_at') }}">

                                    @if ($errors->has('ends_at'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ends_at') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="input-field{{ $errors->has('cover') ? ' has-error' : '' }}">
                                    <span class="grey-text">Zdjęcie w tle zlotu</span>

                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Plik</span>
                                            <input id="cover" type="file" name="cover">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                    @if ($errors->has('cover'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cover') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <div class="col s6">
                                <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">E-Mail *</label>

                                    <input id="email" type="email"  name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="input-field{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username">Nazwa użytkownika *</label>

                                    <input id="username" type="text"  name="username" value="{{ old('username') }}" required data-length="30">

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="input-field{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password">Hasło *</label>

                                    <input id="password" type="password" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="input-field">
                                    <label for="password-confirm">Powtórz hasło *</label>

                                    <input id="password-confirm" type="password"  name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="col s12 center-align">
                                <button type="submit" class="waves-effect waves-light btn">
                                    Utwórz zlot
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
