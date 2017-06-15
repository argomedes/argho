@extends('layouts.dashboard')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Zapytania</h4>
            <div class="row">
                <div class="col s12">

                    <div class="card">
                        <div class="card-content">
                            <div style="overflow-x: auto;">
                                <table class="highlight responsive-table">
                                    <thead>
                                        <tr>
                                            <th>L.p.</th>
                                            <th>Imię i nazwisko</th>
                                            <th>E-mail</th>
                                            <th>Temat</th>
                                            <th>Treść</th>
                                            <th>Wysłano</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (sizeof($questions)==0)
                                            <tr colspan="7">
                                                Brak zapytań.
                                            </tr>
                                        @endif
                                        @php
                                            $count=0
                                        @endphp
                                        @foreach ($questions as $q)
                                            <tr>
                                                <td>{{ ++$count }}</td>
                                                <td>{{ $q->name }}</td>
                                                <td>{{ $q->email }}</td>
                                                <td>{{ $q->topic }}</td>
                                                <td>{{ $q->body }}</td>
                                                <td>{{ $q->created_at }}</td>
                                                <td><a href="mailto:{{ $q->email }}?subject=Odpowiedź: {{ $q->topic }}">Odpowiedz</a> <a href="/{{ $carRally->alias }}/panel/zapytania/{{ $q->id }}/usun" onclick="return confirm('Czy na pewno chcesz usnąć zapytanie?')">Usuń</a></td>
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
            {{ $questions->links() }}
        </div>
    </div>
</div>
@endsection
