<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $product->name ?? 'Producto' }} - PUPPETS</title>
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

    {{-- ESTILO EXTRA PARA SIMULAR EL COLOR ROSA/GRIS BASADO EN STOCK --}}
    <style>
        .size-selector {
            border: 1px solid #ccc;
            padding: 5px 15px;
            margin-right: 10px;
            text-decoration: none;
            color: #333;
            border-radius: 5px;
            transition: all 0.2s;
            display: block;
        }

        /* Color Rosa para Disponible (Clase 'active' o sin 'disabled') */
        .size-selector:not(.disabled) {
            background-color: #f7e0e8;
            border-color: #ff69b4;
            color: #ff69b4;
            font-weight: bold;
        }

        /* Color Gris para Agotado */
        .size-selector.disabled {
            background-color: #f8f9fa;
            color: #ccc;
            cursor: not-allowed;
            pointer-events: none;
            border-style: dashed;
            opacity: 0.6;
        }
    </style>
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
    // Obtenemos el resumen del carrito, crucial para inicializar el contador y el contenido.
    $cartSummary = \App\Http\Controllers\CartController::getCartSummary();
    @endphp

    {{-- 1. OFFCANVAS DEL CARRITO (DEFINICIÓN GLOBAL ÚNICA) --}}
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart"
        aria-labelledby="My Cart">
        <div class="offcanvas-header justify-content-center">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            {{-- CONTENEDOR DE INYECCIÓN DE AJAX --}}
            <div id="cart-offcanvas-content">

                {{-- RENDERIZACIÓN INICIAL DEL CONTENIDO (Usa la vista parcial que creaste) --}}
                @include('partials.offcanvas_cart_content', ['cartSummary' => $cartSummary])

            </div>
        </div>
    </div>

    {{-- Header (Mantener) --}}
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
            <nav class="main-menu d-flex navbar navbar-expand-lg">

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

                                @guest
                                <li>
                                    <a href="{{ url('/account') }}" class="mx-3">
                                        <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
                                    </a>
                                </li>
                                @endguest

                                @auth
                                <li>
                                    <a href="{{ route('profile') }}" class="mx-3">
                                        <iconify-icon icon="mdi:account-circle" class="fs-4"></iconify-icon>
                                    </a>
                                </li>
                                @endauth

                                <li class="">
                                    <a href="#" class="mx-3" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                                        <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                                        <span
                                            class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                                            {{ $cartSummary['count'] }}
                                        </span>
                                    </a>
                                </li>

                                @auth
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

    <section id="banner" class="py-3" style="background: #F9F3EC;">
        <div class="container">
            <div class="hero-content py-5 my-3">
                <h2 class="display-1 mt-3 mb-0">{{ $product->name ?? 'Producto' }}</h2>
                <nav class="breadcrumb">
                    <a class="breadcrumb-item nav-link" href="{{ url('/') }}">Home</a>
                    <a class="breadcrumb-item nav-link" href="{{ route('user.articulos') }}">Shop</a>
                    <span class="breadcrumb-item active" aria-current="page">{{ $product->name ?? 'Detalle' }}</span>
                </nav>
            </div>
        </div>
    </section>

    <section id="selling-product">
        <div class="container my-md-5 py-5">
            <div class="row g-md-5">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="swiper product-large-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset($product->image) }}" class="img-fluid"
                                            alt="{{ $product->name }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-5 ">
                    <div class="product-info">
                        <div class="element-header">
                            <h2 itemprop="name" class="display-6">{{ $product->name }}</h2>
                            <div class="rating-container d-flex gap-0 align-items-center">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0</span>
                            </div>
                        </div>

                        <div class="product-price pt-3 pb-3">
                            <strong
                                class="text-primary display-6 fw-bold">${{ number_format($product->price, 2) }}</strong>
                        </div>

                        <p>{{ $product->description }}</p>

                        <div class="cart-wrap">

                            {{-- LÓGICA PARA STOCK POR TALLA --}}
                            @php
                            $tallas = ['S', 'M', 'L', 'XL'];
                            $has_stock_general = $product->stock > 0;
                            $stocks = [
                            'S' => $product->stock_S ?? 0,
                            'M' => $product->stock_M ?? 0,
                            'L' => $product->stock_L ?? 0,
                            'XL' => $product->stock_XL ?? 0,
                            ];
                            $max_stock = max($stocks);
                            @endphp

                            {{-- APARTADO DE COLOR DINÁMICO --}}
                            @if (!empty($product->color))
                            <div class="color-options product-select">
                                <div class="color-toggle pt-2" data-option-index="0">
                                    <h6 class="item-title fw-bold">Color:</h6>
                                    <ul class="select-list list-unstyled d-flex">
                                        <li class="select-item pe-3" title="{{ $product->color }}">
                                            <span class="btn btn-light active">{{ $product->color }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endif

                            {{-- APARTADO DE TALLAS DINÁMICO --}}
                            <div class="swatch product-select pt-3" data-option-index="1">
                                <h6 class="item-title fw-bold">Size:</h6>
                                <ul class="select-list list-unstyled d-flex">
                                    @foreach ($tallas as $talla)
                                    @php
                                    $stock_disponible = $stocks[$talla];
                                    $is_disabled = $stock_disponible <= 0;
                                        $class_state=$is_disabled ? 'disabled' : 'active' ;
                                        @endphp
                                        <li data-value="{{ $talla }}" class="select-item pe-3">
                                        <a href="#" class="size-selector {{ $class_state }}"
                                            data-stock="{{ $stock_disponible }}"
                                            data-talla="{{ $talla }}">
                                            {{ $talla }}
                                        </a>
                                        </li>
                                        @endforeach
                                </ul>
                            </div>

                            

                            {{-- FORMULARIO Y BOTONES (ESTRUCTURA CORREGIDA PARA AJAX) --}}
                            <div class="stock-button-wrap mt-4">

                                {{-- La clase "ajax-add-to-cart-form" es crucial para que JavaScript lo encuentre --}}
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="ajax-add-to-cart-form">
                                    @csrf

                                    <input type="hidden" name="size" id="selected-size-input" value="">

                                    
                                    <div class="d-flex flex-wrap pt-4 align-items-center gap-3">
                                        <a href="{{ route('user.articulos') }}" class="btn btn-light me-3 px-4 pt-3 pb-3 border rounded-1">
                                            <h5 class="text-uppercase m-0">Go Back</h5>
                                        </a>

                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="meta-product pt-4">
                            <div class="meta-item d-flex align-items-baseline">
                            </div>
                            <div class="meta-item d-flex align-items-baseline">
                                <h6 class="item-title fw-bold no-margin pe-2">Category:</h6>
                                <ul class="select-list list-unstyled d-flex">
                                    <li class="select-item">
                                        <a href="#">{{ $product->categoria ?? 'N/A' }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('user-template/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="{{ asset('user-template/js/plugins.js') }}"></script>
    <script src="{{ asset('user-template/js/script.js') }}"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <script>
    $(document).ready(function() {
        
        // ... (Aquí puede ir tu código para seleccionar tallas y cantidad) ...

        // ASEGÚRATE DE QUE ESTE BLOQUE EXACTO EXISTA Y NO ESTÉ COMENTADO
        $('.ajax-add-to-cart-form').on('submit', function(e) {
            e.preventDefault(); 

            const $form = $(this);
            const url = $form.attr('action');
            const formData = $form.serialize(); 
            const $button = $form.find('button[type="submit"]');
            const $h5 = $button.find('h5'); 

            $button.prop('disabled', true);
            $h5.text('AÑADIENDO...');

            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        $('.badge.bg-primary').text(response.cart_count); 
                        $('#cart-offcanvas-content').html(response.cart_html);
                        const offcanvas = bootstrap.Offcanvas.getOrCreateInstance(document.getElementById('offcanvasCart'));
                        offcanvas.show();
                        
                        $h5.text('¡AÑADIDO!');
                        setTimeout(function() {
                            $h5.text('ADD TO CART');
                            $button.prop('disabled', false);
                        }, 1500);
                    }
                },
                error: function(xhr) {
                    console.error("AJAX Error:", xhr.responseText);
                    $h5.text('FALLÓ');
                    setTimeout(function() {
                        $h5.text('ADD TO CART');
                        $button.prop('disabled', false);
                    }, 1500);
                }
            });
        });
    });
</script>
</body>

</html>