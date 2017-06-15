@extends('layouts.simple')

@section('content')
    <div class="container main">
        <div class="row">
            <div class="col s8 offset-s2">
                <h4 class="center-align">Ustaw nowe hasło</h4>

                <div class="card">
                    <div class="card-content">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request', ['carRally'=> $carRally->alias ]) }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="input-field">
                            <label for="email" class="col-md-4 control-label">E-mail</label>

                            <input id="email" type="email" class="validate" name="email" value="{{ $email or old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-field">
                            <label for="password" class="col-md-4 control-label">Nowe hasło</label>

                            <input id="password" type="password" class="validate" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-field">
                            <label for="password-confirm" class="col-md-4 control-label">Powtórz nowe hasło</label>

                            <input id="password-confirm" type="password" class="validate" name="password_confirmation" required>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="center-align">
                            <button type="submit" class="btn btn-primary">
                                Ustaw nowe hasło
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
