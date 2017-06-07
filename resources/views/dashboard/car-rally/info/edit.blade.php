@extends('layouts.dashboard')

@section('head-end')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea#info',
            plugins: 'link code lists wordcount table'
        });
    </script>
@endsection

@section('content')
<div class="container main">
    <div class="row">
        <div class="col s8 offset-s2">
            <h4 class="center-align">Informacje o zlocie</h4>

            <div class="card">
                <div class="card-content">
                    <form method="POST" action="{{ route('panel.informacje.update', ['carRally' => $carRally]) }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="{{ $errors->has('info') ? ' has-error' : '' }}">

                            <textarea id="info" class="materialize-textarea" name="info">{{ $carRally->info }}</textarea>

                            @if ($errors->has('info'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('info') }}</strong>
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
