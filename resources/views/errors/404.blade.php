<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AutoZloty.pl</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {!! MaterializeCSS::include_full() !!}
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>
    <body class="homepage">
        @if (Route::has('login'))
            <div class="navbar-fixed">
                <nav>
                    <div class="container">
                        <div class="row">
                            <div class="col s12">
                                <div class="nav-wrapper">
                                    <div class="brand-logo">
                                        <a href="{{ url('/') }}">
                                            {{ config('app.name', 'Laravel') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        @endif

        <main class="valign-wrapper">
            <div class="container">
                <div class="row center-align">
                    <div class="col s6 offset-s3 ">
                        <h1>
                            Nie znaleziono podanej strony.
                        </h1>

                        <div>
                                <a href="{{ route('homepage') }}" class="btn red waves-effect waves-light">Powrót na stonę główną</a>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container">
                    © 2017 {{ config('app.name', 'AutoZloty.pl') }}
                    <a class="grey-text text-lighten-4 right" href="#!">Kontakt</a>
                </div>
            </div>
        </footer>
    </body>
</html>
