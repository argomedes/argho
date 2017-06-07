@extends('layouts.app')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s8 offset-s2">
            <h4 class="center-align">Logowanie</h4>

            <div class="card">
                <div class="card-content">
                    <form method="POST" action=" {{ route('login', ['carRally'=> $carRally->alias ]) }}">
                        {{ csrf_field() }}

                        <input name="car_rally_id" type="hidden" value="{{ $carRally->id }}">

                        <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-mail</label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-field{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Hasło</label>

                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="center-align">
                            <input class="filled-in" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Zapamiętaj mnie</label>
                        </div>

                        <div class="center-align">
                            <button type="submit" class="waves-effect waves-light btn">
                                Zaloguj się
                            </button>

                            <a class="waves-effect waves-light btn" href="{{ route('password.request') }}">
                                Nie pamiętsz hasła?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
