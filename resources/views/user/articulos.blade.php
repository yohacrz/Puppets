<!DOCTYPE html>
<html lang="en">

<head>
    <title>PUPPETS</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

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

</head>

<body>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <defs>
            <symbol xmlns="http://www.w3.org/2000/svg" id="link" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M12 19a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0-4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm-5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3Zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16Zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1ZM7 15a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0 4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Z" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="category" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M19 5.5h-6.28l-.32-1a3 3 0 0 0-2.84-2H5a3 3 0 0 0-3 3v13a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1h4.56a1 1 0 0 1 .95.68l.54 1.64a1 1 0 0 0 .95.68h7a1 1 0 0 1 1 1Z" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="check" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M18.71 7.21a1 1 0 0 0-1.42 0l-7.45 7.46l-3.13-3.14A1 1 0 1 0 5.29 13l3.84 3.84a1 1 0 0 0 1.42 0l8.16-8.16a1 1 0 0 0 0-1.47Z" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="trash" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M10 18a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1ZM20 6h-4V5a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8h1a1 1 0 0 0 0-2ZM10 5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1h-4Zm7 14a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8h10Zm-3-1a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1Z" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="star-outline" viewBox="0 0 15 15">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="star-solid" viewBox="0 0 15 15">
                <path fill="currentColor"
                    d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 15 15">
                <path fill="currentColor"
                    d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
            </symbol>

        </defs>
    </svg>

    <div class="preloader-wrapper">
        <div class="preloader">
        </div>
    </div>
    @php
        // Esta inicialización es crucial para la carga inicial del contador y del @include
        $cartSummary = \App\Http\Controllers\CartController::getCartSummary();
    @endphp

    {{-- 1. OFFCANVAS DEL CARRITO --}}
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart"
        aria-labelledby="My Cart">
        <div class="offcanvas-header justify-content-center">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            {{-- CONTENEDOR PRINCIPAL DONDE INYECTAREMOS EL HTML DE AJAX --}}
            {{-- ¡IMPORTANTE! Este ID es usado por el script AJAX para la actualización fluida --}}
            <div id="cart-offcanvas-content">

                {{-- RENDERIZACIÓN INICIAL DEL CONTENIDO --}}
                @include('partials.offcanvas_cart_content', ['cartSummary' => $cartSummary])

            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch"
        aria-labelledby="Search">
        <div class="offcanvas-header justify-content-center">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <div class="order-md-last">
                <h4 class="text-primary text-uppercase mb-3">
                    Search
                </h4>
                <div class="search-bar border rounded-2 border-dark-subtle">
                    <form id="search-form" class="text-center d-flex align-items-center" action=""
                        method="">
                        <input type="text" class="form-control border-0 bg-transparent"
                            placeholder="Search Here" />
                        <iconify-icon icon="tabler:search" class="fs-4 me-3"></iconify-icon>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                        <span class="fs-6 secondary-font text-muted">Phone</span>
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
            @php
                // Obtenemos el resumen del carrito al inicio del Offcanvas
                // Asegúrate de que CartController esté importado en la vista o usa la ruta completa
                $cartSummary = \App\Http\Controllers\CartController::getCartSummary();
            @endphp

            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart"
                aria-labelledby="My Cart">
                <div class="offcanvas-header justify-content-center">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Your Cart</span>
                            {{-- Contador de ítems dinámico --}}
                            <span class="badge bg-primary rounded-circle pt-2">{{ $cartSummary['count'] }}</span>
                        </h4>

                        {{-- LISTA DINÁMICA DE PRODUCTOS (ESTILO MINIMIZADO) --}}
                        <ul class="list-group mb-3">
                            @forelse ($cartSummary['items'] as $item)
                                <li class="list-group-item d-flex justify-content-between lh-sm align-items-start">

                                    {{-- CONTENIDO DE LA FILA --}}
                                    <div class="d-flex w-100">
                                        {{-- 1. IMAGEN (Mini-Thumbnail) --}}
                                        <div class="flex-shrink-0 me-3" style="width: 50px; height: 50px;">
                                            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}"
                                                class="img-fluid rounded-1" style="max-height: 100%;">
                                        </div>

                                        {{-- 2. NOMBRE y CANTIDAD --}}
                                        <div class="flex-grow-1">
                                            <h6 class="my-0">{{ $item['name'] }}</h6>

                                            {{-- Descripción Breve/Cantidad/Talla --}}
                                            <small class="text-body-secondary">
                                                {{-- Cantidad --}}
                                                Qty: {{ $item['quantity'] }}

                                                {{-- Talla (Si aplica) --}}
                                                @if (isset($item['size']) && $item['size'] != 'N/A')
                                                    | Size: {{ $item['size'] }}
                                                @endif
                                            </small>
                                        </div>
                                    </div>

                                    {{-- 3. PRECIO TOTAL DE LA LÍNEA --}}
                                    <span
                                        class="text-body-secondary">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                </li>
                            @empty
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="text-muted">No items in cart.</span>
                                </li>
                            @endforelse

                            {{-- TOTAL DEL CARRITO --}}
                            <li class="list-group-item d-flex justify-content-between pt-3">
                                <span class="fw-bold">Total (USD)</span>
                                <strong>${{ number_format($cartSummary['total'], 2) }}</strong>
                            </li>
                        </ul>

                        {{-- BOTÓN DE CHECKOUT: Redirige a la vista completa del carrito --}}
                        <a href="{{ route('cart.index') }}"
                            class="w-100 btn btn-primary btn-lg {{ $cartSummary['count'] == 0 ? 'disabled' : '' }}"
                            type="button">
                            Continue to checkout
                        </a>
                    </div>
                </div>
            </div>

            {{-- 2. OFFCANVAS DE BÚSQUEDA (Mantenido estático) --}}
            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch"
                aria-labelledby="Search">
                <div class="offcanvas-header justify-content-center">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <div class="order-md-last">
                        <h4 class="text-primary text-uppercase mb-3">
                            Search
                        </h4>
                        <div class="search-bar border rounded-2 border-dark-subtle">
                            <form id="search-form" class="text-center d-flex align-items-center" action=""
                                method="">
                                <input type="text" class="form-control border-0 bg-transparent"
                                    placeholder="Search Here" />
                                <iconify-icon icon="tabler:search" class="fs-4 me-3"></iconify-icon>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3. NAVEGACIÓN PRINCIPAL (Botones de menú y carritos) --}}
            <nav class="main-menu d-flex navbar navbar-expand-lg ">

                <div class="d-flex d-lg-none align-items-end mt-3">
                    <ul class="d-flex justify-content-end list-unstyled m-0">
                        <li>
                            <a href="{{ url('account') }}" class="mx-3">
                                <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
                            </a>
                        </li>
                        {{-- ELIMINADO: Elemento Wishlist en móvil --}}

                        <li>
                            <a href="#" class="mx-3" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                                <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                                <span class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                                    {{ $cartSummary['count'] }} {{-- Contador Dinámico Móvil --}}
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="mx-3" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
                                <iconify-icon icon="tabler:search" class="fs-4"></iconify-icon>
                                </span>
                            </a>
                        </li>
                    </ul>

                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">

                    <div class="offcanvas-header justify-content-center">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body justify-content-between">


                        <ul class="navbar-nav menu-list list-unstyled d-flex gap-md-3 mb-0">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link active">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.articulos') }}" class="nav-link">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/blog') }}" class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/contact') }}" class="nav-link">Contact</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-flex align-items-end">
                            <ul class="d-flex justify-content-end list-unstyled m-0">
                                <li>
                                    <a href="{{ url('/account') }}" class="mx-3">
                                        <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
                                    </a>
                                </li>
                                {{-- ELIMINADO: Elemento Wishlist en escritorio --}}

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
                            </ul>

                        </div>

                    </div>

                </div>

            </nav>





        </div>
    </header>

    <section id="banner" class="py-3" style="background: #F9F3EC;">
        <div class="container">
            <div class="hero-content py-5 my-3">
                <h2 class="display-1 mt-3 mb-0">Shop</h2>
                <nav class="breadcrumb">
                    <a class="breadcrumb-item nav-link" href="#">Home</a>
                    <a class="breadcrumb-item nav-link" href="#">Pages</a>
                    <span class="breadcrumb-item active" aria-current="page">Shop</span>
                </nav>
            </div>
        </div>
    </section>

    <div class="shopify-grid">
        <div class="container py-5 my-5">
            <div class="row flex-md-row-reverse g-md-5 mb-5">

                <main class="col-md-9">
                    <div class="filter-shop d-md-flex justify-content-between align-items-center">
                        <div class="showing-product">
                            <p class="m-0">Showing {{ $productos->firstItem() }}–{{ $productos->lastItem() }} of
                                {{ $productos->total() }} results</p>
                        </div>
                        <div class="sort-by">
                            {{-- Añadimos un ID para enganchar el JavaScript --}}
                            <select class="filter-categories border-0 m-0" id="sort-selector">

                                {{-- Ordenar por Precio (Low-High) --}}
                                <option
                                    value="{{ route('user.articulos', array_merge(request()->query(), ['sort' => 'price_asc', 'page' => 1])) }}"
                                    {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price (Low-High)</option>

                                {{-- Ordenar por Precio (High-Low) --}}
                                <option
                                    value="{{ route('user.articulos', array_merge(request()->query(), ['sort' => 'price_desc', 'page' => 1])) }}"
                                    {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price (High-Low)</option>

                            </select>
                        </div>
                    </div>

                    <div class="product-grid row ">
                        {{-- BUCLE DINÁMICO DE PRODUCTOS --}}

                        @forelse ($productos as $producto)
                            <div class="col-md-4 my-4">
                                <div class="card position-relative product-card-dynamic">

                                    {{-- Etiqueta 'New' si el producto es reciente (ej: creado hace menos de 10 días) --}}
                                    @if ($producto->created_at->diffInDays(now()) < 10)
                                        <div
                                            class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle product-tag-new">
                                            New
                                        </div>
                                    @endif

                                    {{-- IMAGEN del Producto --}}
                                    <a href="{{ route('user.single-product', $producto) }}">
                                        <img src="{{ asset($producto->image) }}"
                                            class="img-fluid rounded-4 product-image-dynamic"
                                            alt="{{ $producto->name }}">
                                    </a>

                                    <div class="card-body p-0">
                                        <a href="{{ route('user.single-product', $producto) }}">
                                            {{-- NOMBRE del Producto --}}
                                            <h3 class="card-title pt-4 m-0 product-name-dynamic">{{ $producto->name }}
                                            </h3>
                                        </a>

                                        <div class="card-text">
                                            {{-- DESCRIPCIÓN CORTA (Usamos Str::limit para un resumen) --}}
                                            <p class="product-description-dynamic text-muted my-1"
                                                style="font-size: 0.9em;">
                                                {{ \Illuminate\Support\Str::limit($producto->description, 30, '...') }}
                                            </p>

                                            {{-- Rating Estático --}}
                                            <span class="rating secondary-font d-block my-2">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <iconify-icon icon="clarity:star-solid"
                                                        class="text-primary"></iconify-icon>
                                                @endfor
                                                5.0
                                            </span>

                                            {{-- PRECIO del Producto --}}
                                            <h3 class="secondary-font text-primary product-price-dynamic">
                                                ${{ number_format($producto->price, 2) }}</h3>

                                            <div class="d-flex flex-wrap mt-3">
                                                {{-- BOTÓN AGREGAR AL CARRITO --}}
                                                {{-- Agregamos la clase 'ajax-add-to-cart-form' para que JS lo intercepte --}}
                                                <form action="{{ route('cart.add', $producto->id) }}" method="POST"
                                                    class="d-inline w-100 ajax-add-to-cart-form">
                                                    @csrf

                                                    {{-- CAMPO OCULTO DE CANTIDAD (SIEMPRE 1 EN LA VISTA DE CUADRÍCULA) --}}
                                                    <input type="hidden" name="quantity" value="1">

                                                    {{-- CAMPO OCULTO DE TALLA (Necesario para el CartController) --}}
                                                    <input type="hidden" name="size" value="N/A">

                                                    <button type="submit"
                                                        class="btn-cart px-4 pt-3 pb-3 add-to-cart-btn w-100">
                                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center my-5">
                                <p class="fs-4 text-muted">No se encontraron productos disponibles en la tienda en este
                                    momento.</p>
                            </div>
                        @endforelse
                    </div>

                    {{-- PAGINACIÓN DINÁMICA --}}
                    <nav class="navigation paging-navigation text-center mt-5" role="navigation">
                        <div class="pagination loop-pagination d-flex justify-content-center align-items-center">
                            {{ $productos->links() }}
                        </div>
                    </nav>

                </main>
                <aside class="col-md-3 mt-5">
                    <div class="sidebar">
                        {{-- FORMULARIO PRINCIPAL DE FILTROS (MÉTODO GET) --}}
                        <form id="filter-form" action="{{ route('user.articulos') }}" method="GET">

                            {{-- 1. CAMPO DE BÚSQUEDA --}}
                            <div class="widget-search-bar">
                                <div class="search-bar border rounded-2 border-dark-subtle pe-3">
                                    <div class="text-center d-flex align-items-center">
                                        <input type="text" name="search"
                                            class="form-control border-0 bg-transparent"
                                            placeholder="Search for products" value="{{ request('search') }}" />
                                        <button type="submit" class="btn p-0 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- 2. FILTRO POR CATEGORÍAS (DINÁMICO) --}}
                            <div class="widget-product-categories pt-5">
                                <h4 class="widget-title">Categories</h4>
                                <ul class="product-categories sidebar-list list-unstyled">
                                    {{-- Opción "All" --}}
                                    <li class="cat-item">
                                        <a href="{{ route('user.articulos', ['search' => request('search'), 'sort' => request('sort'), 'brand' => request('brand')]) }}"
                                            class="{{ !request()->has('category') ? 'active' : '' }} nav-link">All</a>
                                    </li>

                                    {{-- BUCLE SOBRE LAS CATEGORÍAS REALES (Añadimos isset() para evitar errores) --}}
                                    @if (isset($categorias_unicas) && is_array($categorias_unicas))
                                        @foreach ($categorias_unicas as $cat)
                                            <li class="cat-item">
                                                <a href="{{ route('user.articulos', array_merge(request()->query(), ['category' => $cat, 'page' => 1])) }}"
                                                    class="{{ request('category') == $cat ? 'active' : '' }} nav-link">
                                                    {{ $cat }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>

                            {{-- 3. FILTRO POR MARCAS (DINÁMICO, también con isset) --}}
                            <div class="widget-product-brands pt-5">
                                <h4 class="widget-title">Brands</h4>
                                <ul class="product-categories sidebar-list list-unstyled">
                                    {{-- Opción "All" para marcas --}}
                                    <li class="cat-item">
                                        <a href="{{ route('user.articulos', ['search' => request('search'), 'sort' => request('sort'), 'category' => request('category')]) }}"
                                            class="{{ !request()->has('brand') ? 'active' : '' }} nav-link">All</a>
                                    </li>

                                    @if (isset($marcas_unicas) && is_array($marcas_unicas))
                                        @foreach ($marcas_unicas as $brand)
                                            <li class="cat-item">
                                                <a href="{{ route('user.articulos', array_merge(request()->query(), ['brand' => $brand, 'page' => 1])) }}"
                                                    class="{{ request('brand') == $brand ? 'active' : '' }} nav-link">
                                                    {{ $brand }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>


                            {{-- 4. FILTRO POR PRECIO (Rango) --}}
                            <div class="widget-price-filter pt-3">
                                <h4 class="widget-titlewidget-title">Filter By Price</h4>
                                <ul class="product-tags sidebar-list list-unstyled">
                                    @php
                                        $priceRanges = [
                                            [0, 9.99, 'Less than $10'],
                                            [10, 20, '$10 - $20'],
                                            [20, 30, '$20 - $30'],
                                            [30, 40, '$30 - $40'],
                                            [40, 50, '$40 - $50'],
                                            [50, 9999, 'Over $50'], // Rango abierto, termina en un número alto
                                        ];
                                    @endphp

                                    @foreach ($priceRanges as $range)
                                        @php
                                            $params = array_merge(request()->query(), [
                                                'min_price' => $range[0],
                                                'max_price' => $range[1],
                                                'page' => 1,
                                            ]);
                                            $isActive =
                                                request('min_price') == $range[0] && request('max_price') == $range[1];
                                        @endphp
                                        <li class="tags-item">
                                            <a href="{{ route('user.articulos', $params) }}"
                                                class="{{ $isActive ? 'active' : '' }} nav-link">
                                                {{ $range[2] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </form>
                    </div>
                </aside>

            </div>
        </div>
    </div>


    <footer id="footer" class="my-5">
        <div class="container py-5 my-5">
            <div class="row">

                <div class="col-md-3">
                    <div class="footer-menu">
                        <img src="images/puppets/logoo.png" alt="logo">
                        <p class="blog-paragraph fs-6 mt-3">Subscribe to our newsletter to get updates about our grand
                            offers.</p>
                        <div class="social-links">
                            <ul class="d-flex list-unstyled gap-2">
                                <li class="social">
                                    <a href="#">
                                        <iconify-icon class="social-icon" icon="ri:facebook-fill"></iconify-icon>
                                    </a>
                                </li>
                                <li class="social">
                                    <a href="#">
                                        <iconify-icon class="social-icon" icon="ri:twitter-fill"></iconify-icon>
                                    </a>
                                </li>
                                <li class="social">
                                    <a href="#">
                                        <iconify-icon class="social-icon" icon="ri:pinterest-fill"></iconify-icon>
                                    </a>
                                </li>
                                <li class="social">
                                    <a href="#">
                                        <iconify-icon class="social-icon" icon="ri:instagram-fill"></iconify-icon>
                                    </a>
                                </li>
                                <li class="social">
                                    <a href="#">
                                        <iconify-icon class="social-icon" icon="ri:youtube-fill"></iconify-icon>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-menu">
                        <h3>Quick Links</h3>
                        <ul class="menu-list list-unstyled">
                            <li class="menu-item">
                                <a href="#" class="nav-link">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="nav-link">About us</a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="nav-link">Offer </a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="nav-link">Services</a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="nav-link">Conatct Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-menu">
                        <h3>Help Center</h5>
                            <ul class="menu-list list-unstyled">
                                <li class="menu-item">
                                    <a href="#" class="nav-link">FAQs</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#" class="nav-link">Payment</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#" class="nav-link">Returns & Refunds</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#" class="nav-link">Checkout</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#" class="nav-link">Delivery Information</a>
                                </li>
                            </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div>
                        <h3>Our Newsletter</h3>
                        <p class="blog-paragraph fs-6">Subscribe to our newsletter to get updates about our grand
                            offers.</p>
                        <div class="search-bar border rounded-pill border-dark-subtle px-2">
                            <form class="text-center d-flex align-items-center" action="" method="">
                                <input type="text" class="form-control border-0 bg-transparent"
                                    placeholder="Enter your email here" />
                                <iconify-icon class="send-icon" icon="tabler:location-filled"></iconify-icon>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>




    {{-- Scripts locales adaptados con el helper asset() --}}
    <script src="{{ asset('user-template/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="{{ asset('user-template/js/plugins.js') }}"></script>
    <script src="{{ asset('user-template/js/script.js') }}"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>
<script>
    $(document).ready(function() {

        // ====================================================================
        // 1. LÓGICA AJAX PRINCIPAL: AGREGAR AL CARRITO (Previene duplicados)
        // ====================================================================

        // Usamos .off('submit').on('submit') para asegurar que el evento se engancha una sola vez.
        $('.ajax-add-to-cart-form').off('submit').on('submit', function(e) {
            e.preventDefault();

            const $form = $(this);
            const $button = $form.find('button[type="submit"]');
            const $h5 = $button.find('h5'); // Referencia al texto 'Add to Cart'

            // Deshabilitar el botón y mostrar estado de carga
            $button.prop('disabled', true);
            $h5.text('AÑADIENDO...');

            // Ejecutar la petición AJAX
            $.ajax({
                url: $form.attr('action'),
                method: 'POST',
                data: $form.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {

                        // 3. INYECTAR EL CONTENIDO ACTUALIZADO EN EL OFFCANVAS
                        $('#cart-offcanvas-content').html(response.cart_html);

                        // 4. ACTUALIZAR EL CONTADOR DEL ÍCONO EN EL HEADER
                        $('.badge.bg-primary').text(response.cart_count);

                        // 5. Mostrar el offcanvas automáticamente (Usando Bootstrap JS)
                        const offcanvasElement = document.getElementById('offcanvasCart');
                        if (offcanvasElement) {
                            // Usar getOrCreateInstance para compatibilidad y seguridad
                            const offcanvas = bootstrap.Offcanvas.getOrCreateInstance(
                                offcanvasElement);
                            offcanvas.show();
                        }

                        // Reversión del feedback
                        $h5.text('¡AÑADIDO!');
                        setTimeout(function() {
                            $h5.text('ADD TO CART');
                            $button.prop('disabled', false);
                        }, 1500);

                    } else {
                        // Manejar errores de validación del servidor
                        console.error('Error al añadir producto:', response.message);
                        $h5.text('ERROR');
                        setTimeout(function() {
                            $h5.text('ADD TO CART');
                            $button.prop('disabled', false);
                        }, 1500);
                    }
                },
                error: function(xhr) {
                    // Manejar errores de conexión
                    console.error("AJAX Error:", xhr.responseText);
                    $h5.text('FALLÓ');
                    setTimeout(function() {
                        $h5.text('ADD TO CART');
                        $button.prop('disabled', false);
                    }, 1500);
                }
            });
        });


        // ====================================================================
        // 2. LÓGICA DE ORDENAMIENTO (SELECTOR)
        // ====================================================================

        // Detecta el cambio en el selector y redirige a la URL completa.
        $('#sort-selector').on('change', function() {
            var selectedUrl = $(this).val();
            if (selectedUrl) {
                window.location.href = selectedUrl; // Redirige con el parámetro 'sort'
            }
        });

        // NOTA: Aquí iría la lógica para los contadores +/- del cart.blade.php
        // Si esa lógica está en user-template/js/script.js, no necesitas incluirla aquí.

    });
</script>

</html>
