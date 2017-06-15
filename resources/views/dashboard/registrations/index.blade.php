@extends('layouts.dashboard')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Zgłoszenia</h4>
            <div class="row">
                <div class="col s12">

                    <div class="card">
                        <div class="card-content">
                            <div style="overflow-x: auto;">
                                <table class="highlight responsive-table">
                                    <thead>
                                        <tr>
                                            <th>L.p.</th>
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
                                            <th>Wysłano</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (sizeof($registrations)==0)
                                            <tr colspan="12">
                                                Brak zgłoszeń.
                                            </tr>
                                        @endif
                                        @php
                                            $count=0
                                        @endphp
                                        @foreach ($registrations as $reg)
                                            <tr>
                                                <td>{{ ++$count }}</td>
                                                <td>{{ $reg->vehicle }}</td>
                                                <td>{{ $reg->year }}</td>
                                                <td><img class="responsive-img" src="{{ asset('storage/'.$reg->photo) }}" /></td>
                                                <td>{{ $reg->driver }}</td>
                                                <td>{{ $reg->pilot }}</td>
                                                <td>{{ $reg->additional_crew }}</td>
                                                <td>{{ $reg->numb_of_kids }}</td>
                                                <td>{{ $reg->numb_of_all }}</td>
                                                <td>{{ $reg->email }}</td>
                                                <td>{{ $reg->phone_number }}</td>
                                                <td>{{ $reg->additional_text }}</td>
                                                <td>{{ $reg->created_at }}</td>
                                                <td><a href="/{{ $carRally->alias }}/panel/zgloszenia/{{ $reg->id }}/edytuj"><i class="material-icons">edit</i></a> <a href="/{{ $carRally->alias }}/panel/zgloszenia/{{ $reg->id }}/usun" onclick="return confirm('Czy na pewno chcesz usnąć zgłoszenie?')"><i class="material-icons">delete</i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            {{ $registrations->links() }}
        </div>
    </div>
</div>
@endsection
