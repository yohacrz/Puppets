// resources/views/errors/500.blade.php

<!DOCTYPE html>
<html lang="es">

<head>
    <title>PUPPETS | Error del Servidor</title>
    {{-- ... (Incluye todo el Head de tu 404.blade.php para mantener el estilo) ... --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('user-template/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user-template/style.css') }}">
    {{-- ... (Fuentes y otros links) ... --}}
</head>

<body>
    {{-- Incluye tu Header aquí --}}
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

    {{-- CONTENIDO PRINCIPAL DEL ERROR 500 --}}
    <main>
        <section id="error-500" class="py-5" style="min-height: 70vh;">
            <div class="container my-5">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-md-8 col-lg-6">
                        
                        <h1 class="display-1 fw-bold text-danger">500</h1>
                        <h2 class="display-5 fw-normal mb-4">Error Interno del Servidor</h2>

                        <p class="fs-5 text-muted mb-5">
                            Lo sentimos, hubo un problema inesperado con el servidor que impidió completar tu solicitud. 
                            Estamos trabajando para solucionarlo. Inténtalo de nuevo más tarde.
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

    {{-- Incluye tu Footer aquí --}}
    <footer id="footer" class="my-5">
        {{-- ... (Copia el código de tu Footer) ... --}}
    </footer>

    {{-- Scripts --}}
    {{-- ... (Copia el código de tus Scripts) ... --}}

</body>

</html>