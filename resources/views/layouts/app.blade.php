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
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('estilsSass/estils.css') }}" rel="stylesheet">

    <!-- Icones -->
    <link href="{{ asset('iconesFontawesome/css/all.css') }}" rel="stylesheet">

    <!-- Maps -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />

</head>
<body>
    <div id="app">
        <nav>
            <div class="logo">
                <h4><a href="/">Trail Races</a></h4>
                <!--<img src="images/logo.png" alt="">-->
            </div>
            
            <ul class="nav-links">
                <li><a href="/#races">Curses</a></li>
                <li><a href="{{ route('products') }}">Botiga</a></li>
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
                            <a href="{{ route('organizer.organizerzone')}}">Espai Organizador</a>
                        </li>
                    @elseif(Auth::user()->user_type == 'runner')
                        <li >
                            <a href="{{ route('runner.privatezone')}}">Espai Corredor</a>
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

        </nav>

        <main>
            @yield('content')
        </main>
        
    </div>
    @yield('scripts')
    <script src="http://unpkg.com/turbolinks"></script>
</body>
</html>
