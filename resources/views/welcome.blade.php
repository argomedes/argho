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
                                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                                    <ul class="right hide-on-med-and-down">
                                        @if (Auth::guest())
                                            <li><a href="{{ route('login.step-one') }}">Logowanie</a></li>
                                            <li><a href="{{ route('utworz-zlot') }}">Utwórz własny zlot</a></li>
                                        @elseif (Auth::user()->admin == 1)
                                            <li><a href="{{ route('admin.dashboard') }}">Panel administratora</a></li>
                                            <!-- Dropdown Trigger -->
                                            <li>
                                                <a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->username }}<i class="material-icons right">arrow_drop_down</i></a>
                                            </li>
                                            <li class="dropdown">

                                            <!-- Dropdown Structure -->
                                            <ul id="dropdown1" class="dropdown-content">
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                        Wyloguj się
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>

                                            </li>
                                        @else
                                            <li><a href="{{ route('dashboard', ['carRally'=> App\CarRally::where('id', Auth::user()->car_rally_id)->first()->alias ]) }}">Panel organizatora</a></li>
                                            <!-- Dropdown Trigger -->
                                            <li>
                                                <a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->username }}<i class="material-icons right">arrow_drop_down</i></a>
                                            </li>
                                            <li class="dropdown">

                                            <!-- Dropdown Structure -->
                                            <ul id="dropdown1" class="dropdown-content">
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                        Wyloguj się
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>

                                            </li>
                                        @endif
                                    </ul>
                                    <ul class="side-nav" id="mobile-demo">
                                        <li><a href="sass.html">Sass</a></li>
                                        <li><a href="badges.html">Components</a></li>
                                        <li><a href="collapsible.html">Javascript</a></li>
                                        <li><a href="mobile.html">Mobile</a></li>
                                    </ul>
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
                            AutoZloty.pl
                        </h1>
                        <p style="padding: 30px 0;">
                            Jesteś organizatorem zlotów samochodowych? Szukasz narzędzia, które ułatwi Ci pracę? Witamy na stronie <strong>AutoZloty.pl</strong> - jedynym takim miejscu w sieci, gdzie w łatwy i przyjemny sposób pozbędziesz się problemów organizacyjnych. Dziel się informacjami z uczestnikami! Zarządzaj zgłoszeniami! Dziel się notatkami ze swoim zespołem!
                        </p>
                        <div>
                            @if (Auth::guest())
                                <a href="{{ route('login.step-one') }}" class="btn red waves-effect waves-light">Zaloguj się</a> <a href="{{ route('utworz-zlot') }}" class="btn red waves-effect waves-light">Utwórz zlot</a>
                            @elseif (Auth::user()->admin == 0)
                                <a href="{{ route('dashboard', ['carRally'=> App\CarRally::where('id', Auth::user()->car_rally_id)->first()->alias ]) }}" class="btn red waves-effect waves-light">Panel organizatora</a>
                            @else
                                <a href="{{ route('admin.dashboard') }}" class="btn red waves-effect waves-light">Panel administratora</a>
                            @endif
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
