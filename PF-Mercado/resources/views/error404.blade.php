<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>El Mercado</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/51f8fb14ab.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="error-404">
	<div class="container ">
		<div class="row ">
			<div class="text-center">
				<img class="error" src="{{ asset('/img/api.jpg') }}" />
			</div>
        </div>
        <div class="row">
            <div class="center">
                <a href="https://www.freepik.es/fotos-vectores-gratis/fondo">
                    Vector de Fondo creado por freepik - www.freepik.es
                </a>
            </div>
        </div>
    </div>
</body>
</html>