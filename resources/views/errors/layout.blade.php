<!DOCTYPE html>
<html lang="es">

<head>
    <title>PUPPETS | @yield('code') Error</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="mascotas, perros, accesorios, blog canino, error, @yield('code')">
    <meta name="description" content="Página de error @yield('code') de PUPPETS.">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    {{-- Archivos CSS locales adaptados con el helper asset() --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('user-template/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user-template/style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chilanka&family=Montserrat:wght@300;400;500&display=swap"
        rel="stylesheet">
    
    {{-- Aquí iría la definición de símbolos SVG si se usa en el header/footer --}}
</head>

<body>
    {{-- INICIO: CÓDIGO DEL HEADER --}}
    <header>
        <div class="container py-2">
            <div class="row py-4 pb-0 pb-sm-4 align-items-center ">
                <div class="col-sm-4 col-lg-3 text-center text-sm-start">
                    <div class="main-logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('user-template/images/puppets/logoo.png') }}" alt="logo" class="img-fluid">
                        </a>
                    </div>
                </div>
                {{-- ... (Resto del contenido del header) ... --}}
            </div>
        </div>
        <div class="container-fluid"><hr class="m-0"></div>
        <div class="container">
            {{-- ... CÓDIGO DEL NAV/MENÚ ... --}}
        </div>
    </header>
    {{-- FIN: CÓDIGO DEL HEADER --}}

    <main>
        {{-- Aquí se inyectará el contenido específico del error --}}
        @yield('content')
    </main>

    <hr class="m-0">
    
    {{-- INICIO: CÓDIGO DEL FOOTER --}}
    <footer id="footer" class="my-5">
        <div class="container py-5 my-5">
            <div class="row">
                {{-- ... (Contenido de tu footer) ... --}}
            </div>
        </div>
    </footer>
    {{-- FIN: CÓDIGO DEL FOOTER --}}

    {{-- SCRIPTS --}}
    <script src="{{ asset('user-template/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="{{ asset('user-template/js/plugins.js') }}"></script>
    <script src="{{ asset('user-template/js/script.js') }}"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

</body>

</html>