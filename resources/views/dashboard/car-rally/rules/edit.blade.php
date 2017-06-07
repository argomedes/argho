@extends('layouts.dashboard')

@section('head-end')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea#rules',
            plugins: 'link code lists wordcount table'
        });
    </script>
@endsection

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s8 offset-s2">
            <h4 class="center-align">Regulamin zlotu</h4>

            <div class="card">
                <div class="card-content">
                    <form method="POST" action="{{ route('panel.regulamin.update', ['carRally' => $carRally]) }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="{{ $errors->has('rules') ? ' has-error' : '' }}">
                            <textarea id="rules" class="materialize-textarea" name="rules">{{ $carRally->rules }}</textarea>

                            @if ($errors->has('rules'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rules') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="center-align">
                            <p>&nbsp;</p>
                            <button type="submit" class="waves-effect waves-light btn">
                                Zapisz
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
