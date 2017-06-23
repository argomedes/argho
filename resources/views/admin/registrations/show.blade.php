@extends('layouts.admin')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Zgłoszenia</h4>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Pojazd</th>
                                    <th>Rok produkcji</th>
                                    <th>Zdjęcie pojazdu</th>
                                    <th>Kierowca</th>
                                    <th>Pilot</th>
                                    <th>Dodatkowa załoga</th>
                                    <th>Liczba dzieci w załodze</th>
                                    <th>Liczba osób w załodze</th>
                                    <th>E-mail</th>
                                    <th>Numer telfonu</th>
                                    <th>Dodatkowy tekst</th>
                                    <th>Dodano</th>
                                    <th>Edytowano</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>{{ $registration->vehicle }}</td>
                                    <td>{{ $registration->year }}</td>
                                    <td><img class="responsive-img" src="{{ asset('storage/'.$registration->photo) }}" /></td>
                                    <td>{{ $registration->driver }}</td>
                                    <td>{{ $registration->pilot }}</td>
                                    <td>{{ $registration->additional_crew }}</td>
                                    <td>{{ $registration->numb_of_kids }}</td>
                                    <td>{{ $registration->numb_of_all }}</td>
                                    <td>{{ $registration->email }}</td>
                                    <td>{{ $registration->phone_number }}</td>
                                    <td>{{ $registration->additional_text }}</td>
                                    <td>{{ $registration->created_at }}</td>
                                    <td>{{ $registration->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a class="grey-text right" href="/administrator/zgloszenia">&larr; Powrót do zgłoszeń</a>
        </div>
    </div>
</div>
@endsection
