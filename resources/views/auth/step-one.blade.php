@extends('layouts.simple')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s8 offset-s2">
            <h4 class="center-align">Logowanie</h4>

            <div class="card">
                <div class="card-content">
                    <form onSubmit=" location.href = 'http://autozloty.dev/' + document.getElementById('alias').value + '/logowanie'; return false; ">
                        {{ csrf_field() }}

                        <div class="input-field">
                            <input id="alias" type="text" class="validate{{ $errors->has('alias') ? ' invalid' : '' }}" name="alias" value="{{ old('alias') }}" required autofocus>
                            <label for="alias" data-error="@if ($errors->has('alias'))
                                {{ $errors->first('email_or_password') }} @endif">Alias zlotu</label>
                        </div>

                        <div class="center-align">
                            <button type="submit" class="waves-effect waves-light btn">
                                Przejdź do logowania
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
