@extends('layouts.app')

@section('head-end')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s8">
            <h4 class="center-align">Zadaj pytanie organizatorowi</h4>
            <div class="card">
                <div class="card-content">
                    <form method="POST" action="/zloty">
                        {{ csrf_field() }}

                        <div class="input-field{{ $errors->has('name') ? ' has-error' : '' }}">
                            <i class="material-icons prefix">person</i>

                            <label for="name">Imię i nazwisko *</label>

                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="validate">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <i class="material-icons prefix">email</i>

                            <label for="email">Adres e-mail *</label>

                            <input id="email" type="email" name="email" value="{{ old('email') }}" required class="validate">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-field{{ $errors->has('topic') ? ' has-error' : '' }}">
                            <i class="material-icons prefix">chat</i>

                            <label for="topic">Temat *</label>

                            <input id="topic" type="text" name="topic" value="{{ old('topic') }}" required class="validate">

                            @if ($errors->has('topic'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('topic') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-field{{ $errors->has('body') ? ' has-error' : '' }}">
                            <i class="material-icons prefix">create</i>

                            <label for="body">Wiadomość *</label>

                            <textarea id="body" class="validate materialize-textarea" name="body" required >{{ old('body') }}</textarea>

                            @if ($errors->has('body'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="center-align">
                            <button type="submit" class="waves-effect waves-light btn" class="g-recaptcha" data-sitekey="6LdWByQUAAAAAGaDIf60iNcjAhrypkiz6e2_lUYb" data-callback="YourOnSubmitFn">
                                Wyślij wiadomość
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col s4">
            <h4 class="center-align">Informacje kontaktowe</h4>
            <div class="card">
                <div class="card-content">


                    {{-- {{  $carRally->contact->email }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
