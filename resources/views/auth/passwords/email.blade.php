@extends('layouts.simple')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s8 offset-s2">
            <h4 class="center-align">Resetuj hasło</h4>

            <div class="card">
                <div class="card-content">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email', ['carRally'=> $carRally->alias ]) }}">
                        {{ csrf_field() }}

                        <input name="car_rally_id" type="hidden" value="{{ $carRally->id }}">

                        <div class="input-field">
                            <input id="email" type="email" class="validate{{ $errors->has('email') ? ' invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            <label for="email" data-error="@if ($errors->has('email'))
                                {{ $errors->first('email') }} @endif">E-mail</label>
                        </div>

                        <div class="center-align">
                            <button type="submit" class="btn btn-primary">
                                Wyślij link do resetowania hasła
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
