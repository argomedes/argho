@extends('layouts.admin')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Aktualności</h4>
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
                                    @foreach ($posts as $post)
                                        <tr style="cursor:pointer;" onclick="parent.location='/administrator/wpisy/{{ $post->id }}'">
                                            <td>{{ (($posts->currentPage() - 1 ) * $posts->perPage() ) + ++$count }}</td>
                                            <td>{{ $post->id }}</td>
                                            <td><a href="/{{\App\CarRally::where('id', $post->car_rally_id)->first()->alias}}">{{\App\CarRally::where('id', $post->car_rally_id)->first()->alias}}</a></td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>{{ $post->updated_at }}</td>
                                            <td>
                                                <a href="/administrator/wpisy/{{ $post->id }}"><i class="material-icons">remove_red_eye</i></a>

                                                <a href="/administrator/wpisy/{{ $post->id }}/edytuj"><i class="material-icons">edit</i></a>

                                                <form method="POST" action="{{ route('admin.posts.destroy', ['post' => $post]) }}" class="delete">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}

                                                    <input type="submit" onclick="return confirm('Czy na pewno chcesz usnąć wpis?')">
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
            {{ $posts->links() }}
        </div>
    </div>
</div>
{{-- <div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="/administrator/uzytkownicy/dodaj">
      <i class="large material-icons">add</i>
    </a>
</div> --}}
@endsection
