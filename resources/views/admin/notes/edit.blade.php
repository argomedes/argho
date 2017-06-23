@extends('layouts.admin')

@section('head-end')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'link code lists wordcount table'
        });
    </script>
@endsection
@section('content')
    <div class="container main">
        <div class="row">
            <div class="col s8 offset-s2">
                <h4 class="center-align">Edytuj notatkę</h4>

                <div class="card">
                    <div class="card-content">
                        <form method="POST" action="{{ route('admin.notes.update', ['note' => $note]) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="input-field">
                                <label for="title">Tytuł *</label>
                                <input type="text" class="validate" value="{{ $note->title }}" id="title" name="title" data-length="60" required>
                            </div>

                            <span class="grey-text">Treść wpisu *</span>

                            <div class="row">
                                <div class="col s12">
                                    <textarea id="body" name="body">{{ $note->body }}</textarea>
                                </div>
                            </div>

                            <div class="center-align">
                                <button type="submit" class="btn btn-primary">Zapisz notatkę</button>
                            </div>

                            @include ('layouts.errors')
                        </form>
                    </div>
                </div>
                <a class="grey-text right" href="/administrator/notatki">&larr; Powrót do notatek</a>
            </div>
        </div>
    </div>
</div>
@endsection
