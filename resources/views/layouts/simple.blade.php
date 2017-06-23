<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AutoZloty.pl') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {!! MaterializeCSS::include_full() !!}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @yield('head-end')
</head>
<body class="layout-dashboard">

    <div class="navbar-fixed">
        <nav class="teal">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="nav-wrapper">
                            <div class="brand-logo">
                                <a href="{{ url('/') }}">
                                    {{ config('app.name', 'AutoZloty.pl') }}
                                </a>
                            </div>

                            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                            <ul class="right hide-on-med-and-down">
                                @if (Auth::guest())
                                    <li><a href="{{ route('login.step-one') }}">Logowanie</a></li>
                                    <li><a href="{{ route('utworz-zlot') }}">Utwórz własny zlot</a></li>
                                @else
                                    <li><a href="{{ route('dashboard', ['carRally'=> $carRally->alias ]) }}">Panel organizatora</a></li>

                                    <!-- Dropdown Trigger -->
                                    <li>
                                        <a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->username }}<i class="material-icons right">arrow_drop_down</i></a>
                                    </li>
                                    <li class="dropdown">

                                    <!-- Dropdown Structure -->
                                    <ul id="dropdown1" class="dropdown-content">
                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{ route('logout', ['carRally'=> $carRally->alias ]) }}"
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

    <main>
        @yield('content')
    </main>

    <footer class="page-footer teal">
        <div class="footer-copyright">
            <div class="container">
                © 2017 {{ config('app.name', 'AutoZloty.pl') }}
                <a class="grey-text text-lighten-4 right" href="#!">Kontakt</a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('body-end')
</body>
</html>
