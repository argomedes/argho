@extends('layouts.dashboard')

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

                        <div class="input-field">
                            <input id="email" type="email" class="validate{{ $errors->has('email_or_password') ? ' invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            <label for="email" data-error="@if ($errors->has('email_or_password'))
                                {{ $errors->first('email_or_password') }} @endif">E-mail</label>
                        </div>

                        <div class="input-field">
                            <input id="password" type="password" class="validate{{ $errors->has('email_or_password') ? ' invalid' : '' }}" name="password" required>
                            <label for="password" data-error="@if ($errors->has('email_or_password'))
                                {{ $errors->first('email_or_password') }} @endif">Hasło</label>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <div class="center-align">
                                    <input class="filled-in" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">Zapamiętaj mnie</label>
                                </div>
                            </div>
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
