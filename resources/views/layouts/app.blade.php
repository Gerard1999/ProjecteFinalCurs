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
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}" /><script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-gpx/1.4.0/gpx.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('estilsSass/estils.css') }}" rel="stylesheet">

    <!-- Icones -->
    <link href="{{ asset('iconesFontawesome/css/all.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav>
            <div class="logo">
                <h4><a href="/">Trail Races</a></h4>
            </div>
            
            <ul class="nav-links">
                <li><a href="{{ route('races') }}">Curses</a></li>
                <li><a href="{{ route('products') }}">Botiga</a></li>
                <li><a href="{{ route('gallery') }}">Galeria</a></li>
            </ul>
            <ul class="user-links">

                <!-- Shopping Cart-->
                <div class="dropdown">
                    <button class="dropdown-toggle icona-carro" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-shopping-cart "></i>
                        @if($shopping_cart->quantityProducts() != 0)
                        <span class="badge">{{$shopping_cart->quantityProducts()}}</span>
                        @endif
                    </button>
                    <div class="dropdown-menu carro-compra" aria-labelledby="dropdownMenuButton">
                       <!-- DIV detalls Carro de la Compra -->
                       <div class="header-carro">
                           <h3>Cistella ({{$shopping_cart->quantityProducts()}})</h3>
                       </div>
                        <div class="detalls-carro">
                            <ul class="shopping-cart-items">
                                @if($shopping_cart->cartDetails)
                                    @foreach($shopping_cart->cartDetails as $cartDetail)
                                        <li>
                                            <img src="{{asset($cartDetail->product->get_image)}}" width="32px" alt="">
                                            {{$cartDetail->product->name}} 
                                            @if($cartDetail->size)-{{$cartDetail->size}}-@endif 
                                            ({{$cartDetail->quantity}})
                                        </li>
                                    @endforeach
                                @else
                                        <h4>No hi ha productes</h4>
                                @endif
                            </ul>
                            <div class="total-carro">
                                <h4>Total: {{$shopping_cart->priceCart()}}???</h4>
                            </div>
                            <a href="{{route('runner.shoppingcart')}}" class="boto boto-petit boto-blau">Realitzar Comanda</a>
                        </div>
                    </div>
                  </div>
                
                <!--end shopping-cart -->

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
                    <!-- Comprova els tipus d'usuaris i mostra un enlla?? o un altre -->
                    @if(Auth::user()->user_type == 'organizer')
                        <li>
                            <a href="{{ route('organizer.organizerzone')}}">Espai Organizador</a>
                        </li>
                    @elseif(Auth::user()->user_type == 'runner')
                        <li >
                            <a href="{{ route('runner.privatezone')}}">Espai Corredor</a>
                        </li>
                    @elseif(Auth::user()->user_type == 'superadmin')
                    <li >
                        <a href="{{ route('superadmin.superadminzone')}}">Zona Admin</a>
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
                                Tancar Sessi??
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


        
    </div>
    <main>
        @yield('content')
    </main>
    @include('footer')
    @yield('scripts')
    <script data-turbolinks-suppress-warning src="http://unpkg.com/turbolinks"></script>
</body>
</html>
