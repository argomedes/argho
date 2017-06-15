@extends('layouts.dashboard')

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Aktualności</h4>
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <div style="overflow-x: auto;">
                                <table class="highlight responsive-table">
                                    <thead>
                                        <tr>
                                            <th>L.p.</th>
                                            <th>Tytuł</th>
                                            <th>Treść</th>
                                            <th>Wysłano</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (sizeof($posts)==0)
                                            <tr colspan="7">
                                                {!! 'Nie dodano żadnych aktualności, <a href="/'.$carRally->alias.'/panel/wpisy/dodaj">dodaj nową</a>.' !!}
                                            </tr>
                                        @endif
                                        @php
                                            $count=0
                                        @endphp
                                        @foreach ($posts as $post)
                                            <tr style="cursor:pointer;" onclick="parent.location='/{{ $carRally->alias }}/panel/wpisy/{{ $post->id }}'">
                                                <td>{{ ++$count }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ substr(strip_tags($post->body), 0, 300) }}@if (strlen($post->body) > 300) ... @endif</td>
                                                <td>{{ $post->created_at }}</td>
                                                <td><a href="/{{ $carRally->alias }}/panel/wpisy/{{ $post->id }}"><i class="material-icons">remove_red_eye</i></a> <a href="/{{ $carRally->alias }}/panel/wpisy/{{ $post->id }}/edytuj"><i class="material-icons">edit</i></a>  <a href="/{{ $carRally->alias }}/panel/wpisy/{{ $post->id }}/usun" onclick="return confirm('Czy na pewno chcesz usnąć wpis?')"><i class="material-icons">delete</i></a></td>
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
            {{ $posts->links() }}
        </div>
    </div>
</div>
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red" href="/{{ $carRally->alias }}/panel/wpisy/dodaj">
      <i class="large material-icons">add</i>
    </a>
</div>
@endsection
