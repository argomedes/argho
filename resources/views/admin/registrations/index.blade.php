@extends('layouts.admin')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Zgłoszenia</h4>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">
                        <div style="overflow-x: auto;">
                            <table class="highlight responsive-table">
                                <thead>
                                    <tr>
                                        <th>Lp.</th>
                                        <th>ID</th>
                                        <th>Zlot</th>
                                        <th>Kierowca</th>
                                        <th>Pojazd</th>
                                        <th>Dodano</th>
                                        <th>Edytowano</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $count=0
                                    @endphp
                                    @foreach ($registrations as $registration)
                                        <tr style="cursor:pointer;" onclick="parent.location='/administrator/zgloszenia/{{ $registration->id }}'">
                                            <td>{{ (($registrations->currentPage() - 1 ) * $registrations->perPage() ) + ++$count }}</td>
                                            <td>{{ $registration->id }}</td>
                                            <td><a href="/{{\App\CarRally::where('id', $registration->car_rally_id)->first()->alias}}">{{\App\CarRally::where('id', $registration->car_rally_id)->first()->alias}}</a></td>
                                            <td>{{ $registration->driver }}</td>
                                            <td>{{ $registration->vehicle }}</td>
                                            <td>{{ $registration->created_at }}</td>
                                            <td>{{ $registration->updated_at }}</td>
                                            <td>
                                                <a href="/administrator/zgloszenia/{{ $registration->id }}"><i class="material-icons">remove_red_eye</i></a>

                                                <a href="/administrator/zgloszenia/{{ $registration->id }}/edytuj"><i class="material-icons">edit</i></a>

                                                <form method="POST" action="{{ route('admin.registrations.destroy', ['registration' => $registration]) }}" class="delete">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}

                                                    <input type="submit" onclick="return confirm('Czy na pewno chcesz usnąć zgłoszenie?')">
                                                    <a href="#!"><i class="material-icons">delete</i></a>
                                                </form>
                                            </td>
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
    <div class="row">
        <div class="col s12 center-align">
            {{ $registrations->links() }}
        </div>
    </div>
</div>
{{-- <div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="/{{ $carRally->alias }}/panel/notatki/dodaj">
      <i class="large material-icons">add</i>
    </a>
</div> --}}
@endsection
