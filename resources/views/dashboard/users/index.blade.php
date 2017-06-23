@extends('layouts.dashboard')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Użytkownicy</h4>
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
                                        <th>Nazwa wyświetlana</th>
                                        <th>Dodano</th>
                                        <th>Edytowano</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $count=0
                                    @endphp
                                    @foreach ($users as $user)
                                        <tr style="cursor:pointer;" onclick="parent.location='/{{ $carRally->alias }}/panel/organizatorzy/{{ $user->id }}'">
                                            <td>{{ (($users->currentPage() - 1 ) * $users->perPage() ) + ++$count }}</td>
                                            <td>{{ $user->id }}</td>
                                            <td><a href="/{{\App\CarRally::where('id', $user->car_rally_id)->first()->alias}}">{{\App\CarRally::where('id', $user->car_rally_id)->first()->alias}}</a></td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td>
                                                <a href="/{{ $carRally->alias }}/panel/organizatorzy/{{ $user->id }}"><i class="material-icons">remove_red_eye</i></a>

                                                <a href="/{{ $carRally->alias }}/panel/organizatorzy/{{ $user->id }}/edytuj"><i class="material-icons">edit</i></a>

                                                <form method="POST" action="{{ route('dashboard.users.block', ['carRally' => $carRally, 'user' => $user]) }}" class="delete">
                                                    {{ method_field('PUT') }}
                                                    {{ csrf_field() }}

                                                    @if ($user->blocked)
                                                        <input type="submit" onclick="return confirm('Czy na pewno oblokować użytkownika?')">
                                                        <a href="#!"><i class="material-icons">lock</i></a>
                                                    @else
                                                        <input type="submit" onclick="return confirm('Czy na pewno zablokować użytkownika?')">
                                                        <a href="#!"><i class="material-icons">lock_outline</i></a>
                                                    @endif
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
            {{ $users->links() }}
        </div>
    </div>
</div>
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="/{{ $carRally->alias }}/panel/organizatorzy/dodaj">
      <i class="large material-icons">add</i>
    </a>
</div>
@endsection
