<!DOCTYPE html>
<html lang="en">

<head>
    <title>PUPPETS - Cart</title>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                                <a href="{{ url('/') }}" class="nav-link">Home</a>
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
                <h2 class="display-1 mt-3 mb-0">Cart</h2>
                <nav class="breadcrumb">
                    <a class="breadcrumb-item nav-link" href="{{ url('/') }}">Home</a>
                    <a class="breadcrumb-item nav-link" href="{{ route('user.articulos') }}">Shop</a>
                    <span class="breadcrumb-item active" aria-current="page">Cart</span>
                </nav>
            </div>
        </div>
    </section>

    <section id="cart" class="my-5 py-5">
        <div class="container">
            <div class="row g-md-5">
                <div class="col-md-8 pe-md-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="card-title text-uppercase">Product</th>
                                <th scope="col" class="card-title text-uppercase">Price</th>
                                <th scope="col" class="card-title text-uppercase">Quantity</th>
                                <th scope="col" class="card-title text-uppercase">Subtotal</th>
                                <th scope="col" class="card-title text-uppercase"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total_general = 0; @endphp

                            {{-- BUCLE DINÁMICO SOBRE LOS PRODUCTOS EN EL CARRITO --}}
                            @forelse ($cart as $item_key => $item)
                                @php
                                    $subtotal = $item['price'] * $item['quantity'];
                                    $total_general += $subtotal;
                                    // Stock máximo simulado (reemplazar 99 con el stock real si es posible)
                                    $max_stock = 99;
                                @endphp

                                <tr data-item-key="{{ $item_key }}">
                                    <td scope="row" class="py-4">
                                        <div class="cart-info d-flex flex-wrap align-items-center ">
                                            <div class="col-lg-3">
                                                <div class="card-image">
                                                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="card-detail ps-3">
                                                    <h5 class="card-title">
                                                        {{-- Enlace del producto (Verificación segura) --}}
                                                        <a href="{{ isset($item['id']) ? route('user.single-product', $item['id']) : '#' }}"
                                                            class="text-decoration-none">{{ $item['name'] }}</a>
                                                    </h5>
                                                    {{-- Verificación segura de la Talla --}}
                                                    @if (isset($item['size']) && $item['size'] != 'N/A')
                                                        <small class="text-muted d-block">Size:
                                                            {{ $item['size'] }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="py-4 align-middle">
                                        <span
                                            class="secondary-font fw-medium total-unit-price">${{ number_format($item['price'], 2) }}</span>
                                    </td>

                                    <td class="py-4 align-middle">
                                        {{-- CONTADOR DE CANTIDAD DINÁMICO ARREGLADO (DISEÑO: - 1 +) --}}
                                        <form action="{{ route('cart.update') }}" method="POST"
                                            class="update-form d-inline-flex" id="update-{{ $item_key }}">
                                            @csrf
                                            <input type="hidden" name="item_key" value="{{ $item_key }}">

                                            {{-- CAMBIO CLAVE AQUÍ: Asegurar la estructura para tu diseño apilado/separado --}}
                                            <div class="input-group product-qty align-items-center w-50">

                                                
                                                {{-- 1. CAMPO DE TEXTO DE CANTIDAD (CENTRO) --}}
                                                <input type="text" id="qty-{{ $item_key }}" name="quantity"
                                                    class="form-control input-number text-center p-2 mx-0"
                                                    value="{{ $item['quantity'] }}" min="1"
                                                    data-max-stock="{{ $max_stock }}">

                                                
                                            </div>
                                        </form>
                                    </td>

                                    <td class="py-4 align-middle">
                                        {{-- SUBTOTAL DE LA FILA --}}
                                        <div class="total-price">
                                            <span
                                                class="secondary-font fw-medium total-item-price-{{ $item_key }}">${{ number_format($subtotal, 2) }}</span>
                                        </div>
                                    </td>

                                    {{-- En cart.blade.php, dentro del @forelse --}}
                                    <td class="py-4 align-middle">
                                        <div class="cart-remove">
                                            {{-- ¡USAMOS urlencode() PARA PASAR LA CLAVE CORRECTAMENTE! --}}
                                            <a href="{{ route('cart.remove', ['item_key' => urlencode($item_key)]) }}"
                                                class="remove-item-link">
                                                <svg width="24" height="24">
                                                    <use xlink:href="#trash"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <p class="fs-4 text-muted">¡Tu carrito está vacío! 🐶</p>
                                        <a href="{{ route('user.articulos') }}"
                                            class="btn btn-primary p-3 rounded-1">Ir a la Tienda</a>
                                    </td>
                                </tr>
                            @endforelse
                            {{-- FIN DEL BUCLE DINÁMICO --}}

                        </tbody>
                    </table>
                </div>

                {{-- Resumen del Carrito --}}
                <div class="col-md-4">
                    <div class="cart-totals">
                        <h2 class="pb-4">Cart Total</h2>
                        <div class="total-price pb-4">
                            <table cellspacing="0" class="table text-uppercase">
                                <tbody>
                                    <tr class="subtotal pt-2 pb-2 border-top border-bottom">
                                        <th>Subtotal</th>
                                        <td data-title="Subtotal">
                                            <span class="price-amount amount text-dark ps-5" id="cart-subtotal">
                                                <bdi>
                                                    <span
                                                        class="price-currency-symbol">$</span>{{ number_format($total_general, 2) }}
                                                </bdi>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="order-total pt-2 pb-2 border-bottom">
                                        <th>Total</th>
                                        <td data-title="Total">
                                            <span class="price-amount amount text-dark ps-5" id="cart-total">
                                                <bdi>
                                                    <span
                                                        class="price-currency-symbol">$</span>{{ number_format($total_general, 2) }}</bdi>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="button-wrap row g-2">
                            {{-- Estos botones ya no son necesarios porque AJAX actualiza automáticamente --}}
                            <div class="col-md-6"><button class="btn btn-dark btn-lg rounded-1 fs-6 p-3 w-100"
                                    disabled>Update Cart</button></div>
                            <div class="col-md-6"><a href="{{ route('user.articulos') }}"
                                    class="btn btn-dark btn-lg rounded-1 fs-6 p-3 w-100">Continue To Shop</a></div>
                            <div class="col-md-12">
                                <a href="{{ url('checkout') }}"
                                    class="btn btn-primary p-3 text-uppercase rounded-1 w-100 {{ empty($cart) ? 'disabled' : '' }}">Proceed
                                    to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="register"
        style="background: url('{{ asset('user-template/images/background-img.png') }}') no-repeat;">
        {{-- Contenido de la Sección Register --}}
    </section>

    <section id="service">
        {{-- Contenido de la Sección Service --}}
    </section>


    <footer id="footer" class="my-5">
        {{-- Contenido del Footer --}}
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


    {{-- LÓGICA JAVASCRIPT ACTUALIZADA PARA SWEETALERT2 Y EL CONTADOR AJAX --}}
    <script>
        $(document).ready(function() {
            // FUNCIÓN AUXILIAR PARA DAR FORMATO DE MONEDA
            function formatCurrency(amount) {
                return '$' + parseFloat(amount).toFixed(2);
            }

            // FUNCIÓN AJAX PRINCIPAL PARA ENVIAR ACTUALIZACIÓN
            function updateCartViaAjax($input) {
                const $form = $input.closest('form');
                const itemKey = $form.find('input[name="item_key"]').val();
                // La validación en el servidor asegura que sea >= 1, forzamos aquí por precaución
                const newQuantity = Math.max(1, parseInt($input.val()));
                const csrfToken = $form.find('input[name="_token"]').val();

                // Deshabilitar la interfaz mientras se procesa la solicitud
                $input.prop('disabled', true);
                $form.find('button').prop('disabled', true);

                $.ajax({
                    url: '{{ route('cart.update') }}',
                    method: 'POST',
                    data: {
                        _token: csrfToken,
                        item_key: itemKey,
                        quantity: newQuantity
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            // 1. Actualizar el Subtotal de la línea
                            $(`.total-item-price-${itemKey}`).text(formatCurrency(response
                                .item_subtotal));

                            // 2. Actualizar el Total General (Subtotal y Total en el resumen)
                            $('#cart-subtotal bdi').html(
                                '<span class="price-currency-symbol">$</span>' + response.total);
                            $('#cart-total bdi').html('<span class="price-currency-symbol">$</span>' +
                                response.total);
                        } else {
                            // Si hay un error, lo más seguro es recargar.
                            window.location.reload();
                        }

                        // Re-habilitar la interfaz
                        $input.prop('disabled', false);
                        $form.find('button').prop('disabled', false);
                    },
                    error: function(xhr) {
                        console.error("Error al actualizar el carrito:", xhr.responseText);
                        Swal.fire({
                            title: 'Error de Actualización',
                            text: 'Hubo un error al actualizar el carrito. Por favor, recargue la página.',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        }).then(() => {
                            $input.prop('disabled', false);
                            $form.find('button').prop('disabled', false);
                        });
                    }
                });
            }

            // MANEJADOR DE CLIC para botones PLUS/MINUS (AJAX)
            $('.quantity-left-minus, .quantity-right-plus').on('click', function(e) {
                e.preventDefault();

                const type = $(this).data('type');
                const targetId = $(this).data('target');
                const $input = $(targetId);
                let currentQty = parseInt($input.val());
                const minVal = parseInt($input.attr('min')) || 1;
                const maxStock = parseInt($input.data('max-stock'));
                let newQty = currentQty;

                if ($input.prop('disabled')) return;

                if (type === 'minus') {
                    if (currentQty > minVal) {
                        newQty = currentQty - 1;
                    }
                } else if (type === 'plus') {
                    if (currentQty < maxStock) {
                        newQty = currentQty + 1;
                    }
                }

                if (newQty !== currentQty) {
                    $input.val(newQty);
                    updateCartViaAjax($input);
                }
            });

            // MANEJADOR DE CAMBIO MANUAL (al teclear la cantidad y presionar enter/cambiar foco)
            $('.input-number').on('change', function() {
                let $input = $(this);
                let qty = parseInt($input.val());
                const minVal = parseInt($input.attr('min')) || 1;
                const maxVal = parseInt($input.data('max-stock'));

                if ($input.prop('disabled')) return;

                // Aplicar validaciones de mínimo y máximo
                if (isNaN(qty) || qty < minVal) {
                    qty = minVal;
                } else if (qty > maxVal) {
                    qty = maxVal;
                }

                $input.val(qty);
                updateCartViaAjax($input);
            });

            // MANEJADOR DE ELIMINACIÓN RÁPIDA (Ícono de basurero con SweetAlert2)
            $('.remove-item-link').on('click', function(e) {
                e.preventDefault(); // Detenemos la acción por defecto
                const removeUrl = $(this).attr('href');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡El artículo será eliminado de tu carrito!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminarlo',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si el usuario confirma, redirigimos (el controlador manejará la eliminación y la recarga a la vista principal)
                        window.location.href = removeUrl;
                    }
                });
            });

            // RESTRICCIÓN ADICIONAL: Solo permitir números y evitar el negativo en el input
            $('.input-number').on('keydown', function(e) {
                // Permitir: backspace(8), delete(46), tab(9), escape(27), enter(13)
                if ($.inArray(e.keyCode, [8, 9, 27, 13, 46]) !== -1 ||
                    // Permitir: Ctrl+A (65), Ctrl+C (67), Ctrl+X (88)
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    (e.keyCode == 67 && e.ctrlKey === true) ||
                    (e.keyCode == 88 && e.ctrlKey === true) ||
                    // Permitir: home(36), end(35), left(37), right(39)
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    return;
                }
                // Bloquear el guión (-) y solo permitir números 0-9
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode >
                        105)) {
                    e.preventDefault();
                }
            });

        });
    </script>
</body>

</html>
