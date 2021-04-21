<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Trail Races</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('estilsSass/estils.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav>
            <div class="logo">
                <h4><a href="/">Trail Races</a></h4>
            </div>
            
            <ul class="nav-links">
                <li><a href="/#races">Curses</a></li>
                <li><a href="">Botiga</a></li>
                <li><a href="">Galeria</a></li>
            </ul>
            <ul class="user-links">
                @guest
                    <li>
                        <a href="{{ route('login') }}">Entrar</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a class="register" href="{{ route('register') }}">Registrar-se</a>
                        </li>
                    @endif
                    @else
                    <!-- Comprova els tipus d'usuaris i mostra un enllaç o un altre -->
                    @if(Auth::user()->user_type == 'organizer')
                        <li>
                            <a href="{{ route('races.index')}}">Espai Organizador</a>
                        </li>
                    @elseif(Auth::user()->user_type == 'corredor')
                        <li >
                            <a href="{{ route('races.index')}}">Espai Corredor</a>
                        </li>
                    @endif
                    <li>
                        <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                Tancar Sessió
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
            </ul>

            <div class="linies">
                <div class="linia1"></div>
                <div class="linia2"></div>
                <div class="linia3"></div>
            </div>

            <!--<div class="collapse navbar-collapse" id="navbarSupportedContent">
                 Left Side Of Navbar
                <ul class="navbar-nav mr-auto">

                </ul>

                Right Side Of Navbar
                <ul class="navbar-nav ml-auto">
                    Authentication Links 
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else-->
                    <!-- Comprova els tipus d'usuaris i mostra un enllaç o un altre -->
                        <!--@if(Auth::user()->user_type == 'organizer')
                            <li class="nav-item">
                                <a href="{{ route('races.index')}}" class="nav-link">Espai Organizador</a>
                            </li>
                        @elseif(Auth::user()->user_type == 'corredor')
                            <li class="nav-item">
                                <a href="{{ route('races.index')}}" class="nav-link">Espai Corredor</a>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Tancar Sessió
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>-->
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/animacioHeader.js') }}"></script>
</body>
</html>
