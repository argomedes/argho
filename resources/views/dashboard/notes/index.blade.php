@extends('layouts.dashboard')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Notatki</h4>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">
                        <div style="overflow-x: auto;">
                            <table class="highlight responsive-table">
                                <thead>
                                    <tr>
                                        <th>L.p.</th>
                                        <th>Tytuł</th>
                                        <th>Treść</th>
                                        <th>Dodano</th>
                                        <th>Edytowano</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if (sizeof($notes)==0)
                                        <tr colspan="7">
                                            {!! 'Nie dodano żadnych aktualności, <a href="/'.$carRally->alias.'/panel/notatki/dodaj">dodaj nową</a>.' !!}
                                        </tr>
                                    @endif
                                    @php
                                        $count=0
                                    @endphp
                                    @foreach ($notes as $note)
                                        <tr style="cursor:pointer;" onclick="parent.location='/{{ $carRally->alias }}/panel/notatki/{{ $note->id }}'">
                                            <td>{{ (($notes->currentPage() - 1 ) * $notes->perPage() ) + ++$count }}</td>
                                            <td>{{ $note->title }}</td>
                                            <td>{{ substr(strip_tags($note->body), 0, 300) }}@if (strlen($note->body) > 300) ... @endif</td>
                                            <td>{{ $note->created_at }}</td>
                                            <td>{{ $note->updated_at }}</td>
                                            <td>
                                                <a href="/{{ $carRally->alias }}/panel/notatki/{{ $note->id }}"><i class="material-icons">remove_red_eye</i></a>

                                                <a href="/{{ $carRally->alias }}/panel/notatki/{{ $note->id }}/edytuj"><i class="material-icons">edit</i></a>

                                                <form method="POST" action="{{ route('dashboard.notes.destroy', ['carRally' => $carRally, 'note' => $note]) }}">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <input type="submit" onclick="return confirm('Czy na pewno chcesz usnąć wpis?')">
                                                    <i class="material-icons">delete</i></input>
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
        <div class="col s12">
            {{ $notes->links() }}
        </div>
    </div>
</div>
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="/{{ $carRally->alias }}/panel/notatki/dodaj">
      <i class="large material-icons">add</i>
    </a>
</div>
@endsection
