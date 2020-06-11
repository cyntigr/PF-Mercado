<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="http://elmercado.eu-west-3.elasticbeanstalk.com/"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>El Mercado</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @section('head')@show
    <script src="https://kit.fontawesome.com/51f8fb14ab.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div>
        <nav class="nav-mercado navbar navbar-expand-md navbar-light bg-black">
            <a class="d-inline small" href="{{ route('home') }}">
                <img class="logo" src="{{ asset('img/mercadocirculo.svg') }}"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
            aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
		    </button>
            @Auth

		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
				    <li class="nav-item">
					    <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                    </li>
                    
                    @if(Auth::user()->idTipo == 3)
                    <li class="nav-item">
					    <a class="nav-link" href="{{ route('pedidos') }}">Mis Pedidos</a>
				    </li>
                    
                    <li class="nav-item">
					    <a class="nav-link" href="{{ route('favourites') }}">Favoritos</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pedido.cesta') }}">
                            <img class="cart" src="{{ asset('img/carro.png') }}"/>
                            <span class="count">{{ $cesta }}</span>
                        </a>
                    </li>
                    
                    @endif
                    @if(Auth::user()->idTipo == 2)
                    <li class="nav-item">
					    <a class="nav-link" href="{{ route('puestos.view') }}">Puesto</a>
                    </li>

                    <li class="nav-item">
					    <a class="nav-link" href="{{ route('pedidos.view') }}">Pedidos</a>
                    </li>

                    <li class="nav-item">
					    <a class="nav-link" href="{{ route('pedidos.send') }}">Pedidos Enviados</a>
                    </li>

                    <li class="nav-item">
					    <a class="nav-link" href="{{ route('help') }}">Ayuda</a>
                    </li>
                    @endif

                    @if(Auth::user()->idTipo == 1)
                    <li class="nav-item">
					    <a class="nav-link" href="{{ route('usuarios') }}">Usuarios</a>
                    </li>

                    <li class="nav-item">
					    <a class="nav-link" href="{{ route('productos') }}">Productos</a>
                    </li>

                    <li class="nav-item">
					    <a class="nav-link" href="{{ route('puestos') }}">Puestos</a>
                    </li>
                    @endif

                </ul>
            @endauth
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                        </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                        </li>
                    @endif
                    @else
                        <li class="nav-item imgPerfil watch">
                            <img src="{{ asset('storage/'.Auth::user()->foto) }}">
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" 
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="watch">{{ Auth::user()->nombre }}</span> 
                            <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('perfil') }}">Perfil</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" 
                                style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

		    </div> <!-- end-collapse -->

        </nav>
        @section('secondNav') @show
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
