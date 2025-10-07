<!DOCTYPE html>
<html lang="es">

<head>
    <title>PUPPETS | Error 404</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="error 404, página no encontrada, mascotas, puppets">
    <meta name="description" content="Página de error 404 de PUPPETS.">

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

    {{-- Aquí solo incluimos el código SVG básico, omitiendo símbolos complejos no necesarios para el 404 --}}
</head>

<body>
    {{-- Para simplificar el código, puedes crear un archivo layout (por ejemplo, layouts/user.blade.php) 
        y extenderlo. Por ahora, pegaremos el header y footer directamente como lo pediste. --}}

    {{-- Aquí iría la definición de símbolos SVG y el preloader si los necesitas --}}
    {{-- ... (Omitido por brevedad, usa tu código SVG aquí) ... --}}


    {{-- 1. HEADER (Copiado de tu código) --}}
    <header>
        <div class="container py-2">
            <div class="row py-4 pb-0 pb-sm-4 align-items-center ">

                <div class="col-sm-4 col-lg-3 text-center text-sm-start">
                    <div class="main-logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('user-template/images/puppets/logoo.png') }}" alt="logo"
                                class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">

                </div>

                <div
                    class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
                    <div class="support-box text-end d-none d-xl-block">
                        <span class="fs-6 secondary-font text-muted">Número Telefónico</span>
                        <h5 class="mb-0">+503-6000-5222</h5>
                    </div>
                    <div class="support-box text-end d-none d-xl-block">
                        <span class="fs-6 secondary-font text-muted">Email</span>
                        <h5 class="mb-0">puppets@gmail.com</h5>
                    </div>



                </div>
            </div>
        </div>

        <div class="container-fluid">
            <hr class="m-0">
        </div>

        <div class="container">
            <nav class="main-menu d-flex navbar navbar-expand-lg">


                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header justify-content-center">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Cerrar"></button>
                    </div>

                    <div class="offcanvas-body justify-content-between">


                        <ul class="navbar-nav menu-list list-unstyled d-flex gap-md-3 mb-0">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link active">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.articulos') }}" class="nav-link">Tienda</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/blog') }}" class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/contact') }}" class="nav-link">Contacto</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-flex align-items-end">
                            <ul class="d-flex justify-content-end list-unstyled m-0">

                                @guest
                                    {{-- Icono de cuenta para visitantes --}}
                                    <li>
                                        {{-- CORREGIDO: Apunta a la ruta '/account' --}}
                                        <a href="{{ url('/account') }}" class="mx-3">
                                            <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
                                        </a>
                                    </li>
                                @endguest

                                @auth
                                    {{-- Icono de cuenta para usuarios logueados (VISTA ESCRITORIO) --}}
                                    <li>
                                        <a href="{{ route('profile') }}" class="mx-3">
                                            <iconify-icon icon="mdi:account-circle" class="fs-4"></iconify-icon>
                                        </a>
                                    </li>
                                @endauth

                                {{-- Iconos de Wishlist y Carrito (siempre visibles) --}}

                                <li class="">
                                    <a href="#" class="mx-3" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                                        <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                                        <span
                                            class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                                            {{ $cartSummary['count'] }} {{-- Contador Dinámico Escritorio --}}
                                        </span>
                                    </a>
                                </li>

                                @auth
                                    {{-- Icono de logout solo para usuarios logueados --}}
                                    <li>
                                        <a href="{{ route('logout') }}" class="mx-3"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <iconify-icon icon="mdi:logout" class="fs-4"></iconify-icon>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endauth

                            </ul>
                        </div>
                    </div>
                </div>
            </nav>


        </div>
    </header>

    ---

    {{-- 2. CONTENIDO PRINCIPAL DEL ERROR 404 --}}
    <main>
        <section id="error-404" class="py-5" style="min-height: 70vh;">
            <div class="container my-5">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-md-8 col-lg-6">
                        
                        <h1 class="display-1 fw-bold text-primary">404</h1>
                        <h2 class="display-5 fw-normal mb-4">¡Vaya! La página se ha perdido.</h2>

                        <p class="fs-5 text-muted mb-5">
                            Lo sentimos, no pudimos encontrar la página que buscas. Parece que nuestro perrito se comió la ruta.
                        </p>

                        {{-- Botón para regresar al inicio --}}
                        <a href="{{ url('/') }}" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                            Volver a la Tienda
                            <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                <use xlink:href="#arrow-right"></use>
                            </svg>
                        </a>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>

    ---

    {{-- 3. FOOTER (Copiado de tu código) --}}
    <hr class="m-0">
    <footer id="footer" class="my-5">
        {{-- ... TODO EL CÓDIGO DEL FOOTER ... --}}
        <div class="container py-5 my-5">
             <div class="row">
                 {{-- ... (Contenido del footer omitido por brevedad) ... --}}
             </div>
        </div>
    </footer>


    {{-- Scripts --}}
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