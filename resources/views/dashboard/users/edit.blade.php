@extends('layouts.dashboard')

@section('content')
    <div class="container main">
        <div class="row">
            <div class="col s8 offset-s2">
                <h4 class="center-align">Edytuj użytkownika</h4>

                <div class="card">
                    <div class="card-content">
                        <form method="POST" action="{{ route('dashboard.users.update', ['carRally' => $carRally, 'user' => $user]) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <input name="car_rally_id" type="hidden" value="{{ $user->car_rally_id }}">

                            <div class="input-field">
                                <label for="username">Nazwa wyświetlana *</label>
                                <input type="text" class="validate" value="{{ $user->username }}" id="username" name="username" data-length="60" required>
                            </div>

                            <div class="input-field">
                                <label for="email">E-mail *</label>
                                <input type="email" class="validate" value="{{ $user->email }}" id="email" name="email" required>
                            </div>

                            <div class="input-field">
                                <label for="creator">Główny organizator(0/1) *</label>
                                <input type="number" class="validate" value="{{ $user->creator }}" id="creator" name="creator" data-length="1" required>
                            </div>

                            <div class="input-field">
                                <label for="admin">Administrator(0/1) *</label>
                                <input type="number" class="validate" value="{{ $user->admin }}" id="admin" name="admin" data-length="1" required>
                            </div>

                            <div class="input-field">
                                <label for="active">Aktywowany(0/1) *</label>
                                <input type="number" class="validate" value="{{ $user->active }}" id="active" name="active" data-length="1" required>
                            </div>

                            <div class="input-field">
                                <label for="blocked">Zablokowany(0/1) *</label>
                                <input type="number" class="validate" value="{{ $user->blocked }}" id="blocked" name="blocked" data-length="1" required>
                            </div>

                            <div class="center-align">
                                <button type="submit" class="btn btn-primary">Zapisz użytkownika</button>
                            </div>

                        </form>
                        @include('layouts.errors')
                    </div>
                </div>
                <a class="grey-text right" href="/administrator/uzytkownicy">&larr; Powrót do użytkowników</a>
            </div>
        </div>
    </div>
</div>
@endsection
