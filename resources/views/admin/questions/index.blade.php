@extends('layouts.admin')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Zapytania</h4>
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
                                        <th>E-mail</th>
                                        <th>Tytuł</th>
                                        <th>Dodano</th>
                                        <th>Edytowano</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $count=0
                                    @endphp
                                    @foreach ($questions as $question)
                                        <tr style="cursor:pointer;" onclick="parent.location='/administrator/zapytania/{{ $question->id }}'">
                                            <td>{{ (($questions->currentPage() - 1 ) * $questions->perPage() ) + ++$count }}</td>
                                            <td>{{ $question->id }}</td>
                                            <td><a href="/{{\App\CarRally::where('id', $question->car_rally_id)->first()->alias}}">{{\App\CarRally::where('id', $question->car_rally_id)->first()->alias}}</a></td>
                                            <td>{{ $question->email }}</td>
                                            <td>{{ $question->topic }}</td>
                                            <td>{{ $question->created_at }}</td>
                                            <td>{{ $question->updated_at }}</td>
                                            <td>
                                                <a href="/administrator/zapytania/{{ $question->id }}"><i class="material-icons">remove_red_eye</i></a>

                                                <a href="/administrator/zapytania/{{ $question->id }}/edytuj"><i class="material-icons">edit</i></a>

                                                <form method="POST" action="" class="delete">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <input type="submit" onclick="return confirm('Czy na pewno chcesz usnąć zlot?')">
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
            {{ $questions->links() }}
        </div>
    </div>
</div>
{{-- <div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="/{{ $carRally->alias }}/panel/notatki/dodaj">
      <i class="large material-icons">add</i>
    </a>
</div> --}}
@endsection
