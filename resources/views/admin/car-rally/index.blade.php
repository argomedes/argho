@extends('layouts.admin')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Zloty</h4>
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">
                        <div style="overflow-x: auto;">
                            <table class="highlight responsive-table">
                                <thead>
                                    <tr>
                                        <th>Lp.</th>
                                        <th>ID</th>
                                        <th>Nazwa</th>
                                        <th>Alias</th>
                                        <th>Opis</th>
                                        <th>Dodano</th>
                                        <th>Edytowano</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $count=0
                                    @endphp
                                    @foreach ($carRallies as $carRally)
                                        <tr style="cursor:pointer;" onclick="parent.location='/{{ $carRally->alias }}'">
                                            <td>{{ (($carRallies->currentPage() - 1 ) * $carRallies->perPage() ) + ++$count }}</td>
                                            <td>{{ $carRally->id }}</td>
                                            <td>{{ $carRally->name }}</td>
                                            <td>{{ $carRally->alias }}</td>

                                            <td>{{ substr(strip_tags($carRally->description), 0, 50) }}@if (strlen($carRally->description) > 50) ... @endif</td>
                                            <td>{{ $carRally->created_at }}</td>
                                            <td>{{ $carRally->updated_at }}</td>
                                            <td>
                                                <a href="/{{ $carRally->alias }}"><i class="material-icons">remove_red_eye</i></a>

                                                <a href="/administrator/zloty/{{ $carRally->alias }}/edytuj"><i class="material-icons">edit</i></a>

                                                <form method="POST" action="{{ route('admin.car-rally.block', ['carRally' => $carRally]) }}" class="delete">
                                                    {{ method_field('PUT') }}
                                                    {{ csrf_field() }}

                                                    @if ($carRally->blocked)
                                                        <input type="submit" onclick="return confirm('Czy na pewno oblokować zlot?')">
                                                        <a href="#!"><i class="material-icons">lock</i></a>
                                                    @else
                                                        <input type="submit" onclick="return confirm('Czy na pewno zablokować zlot?')">
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
            {{ $carRallies->links() }}
        </div>
    </div>
</div>
{{-- <div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="/{{ $carRally->alias }}/panel/notatki/dodaj">
      <i class="large material-icons">add</i>
    </a>
</div> --}}
@endsection
