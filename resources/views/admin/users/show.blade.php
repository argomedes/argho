@extends('layouts.admin')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Użytkownicy</h4>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Zlot</th>
                                    <th>Nazwa wyświetlana</th>
                                    <th>E-mail</th>
                                    <th>Główny organizator</th>
                                    <th>Administrator</th>
                                    <th>Aktywowany</th>
                                    <th>Zablokowany</th>
                                    <th>Dodano</th>
                                    <th>Edytowano</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><a href="/{{\App\CarRally::where('id', $user->car_rally_id)->first()->alias}}">{{\App\CarRally::where('id', $user->car_rally_id)->first()->alias}}</a></td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->creator }}</td>
                                    <td>{{ $user->admin }}</td>
                                    <td>{{ $user->active }}</td>
                                    <td>{{ $user->blocked }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a class="grey-text right" href="/administrator/uzytkownicy">&larr; Powrót do użytkowników</a>
        </div>
    </div>
</div>
@endsection
