@extends('layouts.admin')

@section('content')
    <div class="container main">
        <div class="row">
            <div class="col s8 offset-s2">
                <h4 class="center-align">Edytuj zapytanie</h4>

                <div class="card">
                    <div class="card-content">
                        <form method="POST" action="{{ route('admin.questions.update', ['question' => $question]) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="input-field">
                                <label for="name">Imię i nazwisko *</label>
                                <input type="text" class="validate" value="{{ $question->name }}" id="name" name="name" data-length="60" required>
                            </div>

                            <div class="input-field">
                                <label for="email">E-mail *</label>
                                <input type="email" class="validate" value="{{ $question->email }}" id="email" name="email" required>
                            </div>

                            <div class="in put-field">
                                <label for="topic">Temat *</label>
                                <input type="text" class="validate" value="{{ $question->topic }}" id="topic" name="topic" data-length="60" required>
                            </div>

                            <div class="input-field">
                                <label for="body">Treść wpisu *</label>
                                <textarea id="body" name="body" class="materialize-textarea">{{ $question->body }}</textarea>
                            </div>

                            <div class="center-align">
                                <button type="submit" class="btn btn-primary">Zapisz wpis</button>
                            </div>

                        </form>
                    </div>
                </div>
                <a class="grey-text right" href="/administrator/zapytania">&larr; Powrót do zapytań</a>
            </div>
        </div>
    </div>
</div>
@endsection
