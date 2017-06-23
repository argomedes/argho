@extends('layouts.admin')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s8 offset-s2">
            <h4 class="center-align">Utwórz konto administratora</h4>

            <div class="card">
                <div class="card-content">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        {{ csrf_field() }}

                        <input name="car_rally_id" type="hidden" value="{{ 0 }}">

                        <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-mail *</label>

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

                        <div class="center-align">
                            <button type="submit" class="waves-effect waves-light btn">
                                Utwórz konto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
