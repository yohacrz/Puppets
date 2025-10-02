<!DOCTYPE html>
<html lang="en">

<head>
    <title>PUPPETS - Mi Perfil</title>
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

    {{-- Archivos CSS locales --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('user-template/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user-template/style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chilanka&family=Montserrat:wght@300;400;500&display=swap"
        rel="stylesheet">

    <style>
        .info-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 15px;
            /* Bordes más redondeados */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .info-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        .info-card .card-body p {
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: #555;
        }

        .pet-card-title {
            font-family: 'Chilanka', cursive;
            color: var(--bs-primary);
            /* Usa el color primario de Bootstrap */
            font-size: 1.8rem;
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

    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart"
        aria-labelledby="My Cart">
        <div class="offcanvas-header justify-content-center">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <span class="badge bg-primary rounded-circle pt-2">3</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Grey Hoodie</h6>
                            <small class="text-body-secondary">Brief description</small>
                        </div>
                        <span class="text-body-secondary">$12</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Dog Food</h6>
                            <small class="text-body-secondary">Brief description</small>
                        </div>
                        <span class="text-body-secondary">$8</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Soft Toy</h6>
                            <small class="text-body-secondary">Brief description</small>
                        </div>
                        <span class="text-body-secondary">$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="fw-bold">Total (USD)</span>
                        <strong>$20</strong>
                    </li>
                </ul>

                <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
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
            <nav class="main-menu d-flex navbar navbar-expand-lg ">

                <div class="d-flex d-lg-none align-items-end mt-3">
                    <ul class="d-flex justify-content-end list-unstyled m-0">
                        <li>
                            <a href="{{ url('account') }}" class="mx-3">
                                <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('wishlist') }}" class="mx-3">
                                <iconify-icon icon="mdi:heart" class="fs-4"></iconify-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="mx-3" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                                <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                                <span class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                                    03
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
                                <a href="{{ url('/') }}" class="nav-link">Home</a>
                            </li>
                                
                            <li class="nav-item">
                                <a href="{{ url('shop') }}" class="nav-link">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('blog') }}" class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('contact') }}" class="nav-link">Contact</a>
                            </li>
                        </ul>

                        <div class="d-none d-lg-flex align-items-end">
                            <ul class="d-flex justify-content-end list-unstyled m-0">
                                <li>
                                    <a href="{{ url('account') }}" class="mx-3">
                                        <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('wishlist') }}" class="mx-3">
                                        <iconify-icon icon="mdi:heart" class="fs-4"></iconify-icon>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#" class="mx-3" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                                        <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                                        <span
                                            class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                                            03
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
            <div class="hero-content py-5 my-3 text-center">
                <h2 class="display-3 mt-3 mb-0">Hi, {{ $user->username }}!</h2>
                <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="profile-tabs padding-large">
        <div class="container my-5 py-5">
            <div class="row">
                <div class="tabs-listing">
                    <nav>
                        <div class="nav nav-tabs d-flex justify-content-center border-dark-subtle mb-3" id="nav-tab"
                            role="tablist">
                            <button
                                class="nav-link mx-3 fs-3 border-bottom border-dark-subtle border-0 text-uppercase active"
                                id="nav-datos-tab" data-bs-toggle="tab" data-bs-target="#nav-datos" type="button"
                                role="tab" aria-controls="nav-datos" aria-selected="true">
                                My Information
                            </button>
                            <button class="nav-link mx-3 fs-3 border-bottom border-dark-subtle border-0 text-uppercase"
                                id="nav-mascotas-tab" data-bs-toggle="tab" data-bs-target="#nav-mascotas"
                                type="button" role="tab" aria-controls="nav-mascotas" aria-selected="false">
                                My Pets
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade active show" id="nav-datos" role="tabpanel"
                            aria-labelledby="nav-datos-tab">
                            <div class="col-lg-8 offset-lg-2 mt-5 text-center">

                                <div class="card info-card p-4">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Your Account Information</h4>
                                        <p><iconify-icon icon="mdi:user-circle" class="fs-4"></iconify-icon>
                                            <strong>Username:</strong> {{ $user->username }}</p>
                                        <p><iconify-icon icon="mdi:email" class="fs-4"></iconify-icon>
                                            <strong>Email:</strong> {{ $user->email }}</p>
                                        <p><iconify-icon icon="mdi:calendar-check" class="fs-4"></iconify-icon>
                                            <strong>Member since:</strong> {{ $user->created_at->format('d/m/Y') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <h3 class="text-center">Upcoming Appointments  </h3>

                                    @if ($citas->isEmpty())
                                        <div class="alert alert-light mt-3 text-center">
                                            You have no scheduled appointments.
                                        </div>
                                    @else
                                        @foreach ($citas as $cita)
                                            <div class="card info-card text-center mb-4">
                                                <div class="card-header bg-primary text-white">
                                                    <h5 class="mb-0">UPCOMING APPOINTMENT</h5>
                                                </div>
                                                <div class="card-body">
                                                    {{-- Gracias a las relaciones, podemos hacer esto: --}}
                                                    <h4 class="card-title pet-card-title">{{ $cita->pet->nombre }}
                                                    </h4>
                                                    <p class="mb-1">
                                                        <iconify-icon icon="mdi:calendar"></iconify-icon>
                                                        <strong>Date:</strong>
                                                        {{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}
                                                    </p>
                                                    <p class="mb-0">
                                                        <iconify-icon
                                                            icon="mdi:clock-time-four-outline"></iconify-icon>
                                                        <strong>Hour:</strong>
                                                        {{ \Carbon\Carbon::parse($cita->hora)->format('h:i A') }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-mascotas" role="tabpanel"
                            aria-labelledby="nav-mascotas-tab">
                            <div class="col-lg-10 offset-lg-1 mt-5">
                                <h3 class="text-center">Your Furry Friends 🐾</h3>
                                @if ($mascotas->isEmpty())
                                    <div class="alert alert-info mt-4 text-center" role="alert">
                                        You haven't registered any pets yet. Feel free to add your first one!   
                                    </div>
                                @else
                                    <div class="row mt-4">
                                        @foreach ($mascotas as $mascota)
                                            <div class="col-md-6">
                                                <div class="card info-card text-center mb-4" style="cursor: pointer;"
                                                    data-bs-toggle="modal" data-bs-target="#petGreetingModal"
                                                    data-pet-name="{{ $mascota->nombre }}"
                                                    data-pet-species="{{ $mascota->especie }}"
                                                    data-pet-id="{{ $mascota->id }}">
                                                    <div class="card-body">
                                                        @if (strtolower($mascota->especie) == 'gato')
                                                            <iconify-icon icon="ph:cat-fill"
                                                                class="display-3 text-secondary mb-2"></iconify-icon>
                                                        @else
                                                            <iconify-icon icon="ph:dog-fill"
                                                                class="display-3 text-secondary mb-2"></iconify-icon>
                                                        @endif

                                                        <h4 class="card-title pet-card-title">{{ $mascota->nombre }}
                                                        </h4>
                                                        <p class="mb-1"><iconify-icon icon="mdi:paw"></iconify-icon>
                                                            <strong>Species:</strong> {{ $mascota->especie }}</p>
                                                        <p class="mb-1"><iconify-icon
                                                                icon="mdi:tag-outline"></iconify-icon>
                                                            <strong>Breed:</strong> {{ $mascota->raza }}</p>
                                                        <p class="mb-1"><iconify-icon
                                                                icon="mdi:palette"></iconify-icon>
                                                            <strong>Color:</strong> {{ $mascota->color }}</p>
                                                        <p class="mb-0"><iconify-icon
                                                                icon="mdi:cake-variant"></iconify-icon>
                                                            <strong>Birthdate:</strong>
                                                            {{ \Carbon\Carbon::parse($mascota->fecha_nacimiento)->format('d/m/Y') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="d-grid mt-4">
                                    <button type="button" class="btn btn-dark btn-lg rounded-1"
                                        data-bs-toggle="modal" data-bs-target="#addPetModal">
                                        <iconify-icon icon="mdi:plus-circle" class="me-1"></iconify-icon> Register
                                        New Pet
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <a href="{{ route('home') }}" class="btn btn-outline-primary">Back to Home</a>
            </div>
        </div>
    </section>

    <hr class="m-0">

    <footer id="footer" class="my-5">
        <div class="container py-5 my-5">
            <div class="row">

                <div class="col-md-3">
                    <div class="footer-menu">
                        <img src="{{ asset('user-template/images/puppets/logoo.png') }}" alt="logo">
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

    <div class="modal fade" id="addPetModal" tabindex="-1" aria-labelledby="addPetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPetModalLabel">Registrar una Nueva Mascota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ route('addPet.store') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="especie" class="form-label">Especie</label>
                            <select name="especie" id="especie" class="form-control form-select"
                                onchange="actualizarRazas()" required>
                                <option value="">Elige una especie</option>
                                <option value="Perro">Perro</option>
                                <option value="Gato">Gato</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="raza" class="form-label">Raza</label>
                            <select name="raza" id="raza" class="form-control form-select" required>
                                <option value="">Selecciona primero una especie</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input class="form-control" type="text" id="nombre" name="nombre"
                                placeholder="Nombre de tu mascota" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input class="form-control" type="text" id="color" name="color"
                                placeholder="Ej: Blanco, Negro con manchas" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                                required>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button class="btn btn-primary" type="submit">Añadir Mascota</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="petGreetingModal" tabindex="-1" aria-labelledby="petGreetingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header border-0">
                    <h2 class="modal-title w-100" id="petGreetingModalLabel">
                        <span id="modalPetName">¡Hola, Mascota!</span>
                    </h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="lead mb-4">Te extrañamos en Puppets Grooming</p>
                    <div id="modalPetIcon" class="mb-4">
                    </div>
                </div>
                <div class="modal-footer border-0 d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a href="#" id="modalScheduleLink" class="btn btn-primary">Agendar una Cita</a>
                </div>
            </div>
        </div>
    </div>


    {{-- Scripts locales --}}
    <script src="{{ asset('user-template/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="{{ asset('user-template/js/plugins.js') }}"></script>
    <script src="{{ asset('user-template/js/script.js') }}"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <script>
        function actualizarRazas() {
            const especieSeleccionada = document.getElementById('especie').value;
            const selectRaza = document.getElementById('raza');

            selectRaza.innerHTML = '<option value="">Selecciona una raza</option>';

            const razasPerro = ["Labrador", "Bulldog", "Pastor Alemán", "Golden Retriever", "Poodle", "Beagle", "Mestizo",
                "Otro"
            ];
            const razasGato = ["Siamés", "Persa", "Maine Coon", "Ragdoll", "Bengala", "Abisinio", "Mestizo", "Otro"];

            let razas = [];
            if (especieSeleccionada === 'Perro') {
                razas = razasPerro;
            } else if (especieSeleccionada === 'Gato') {
                razas = razasGato;
            }

            razas.forEach(raza => {
                const option = document.createElement('option');
                option.value = raza;
                option.textContent = raza;
                selectRaza.appendChild(option);
            });
        }
    </script>
    <script>
        const petGreetingModal = document.getElementById('petGreetingModal');
        if (petGreetingModal) {
            petGreetingModal.addEventListener('show.bs.modal', event => {
                // Tarjeta de la mascota que activó el modal
                const card = event.relatedTarget;

                // Extraer información de los atributos data-*
                const petName = card.getAttribute('data-pet-name');
                const petSpecies = card.getAttribute('data-pet-species');
                const petId = card.getAttribute('data-pet-id');

                // Seleccionar los elementos del modal para actualizarlos
                const modalTitle = petGreetingModal.querySelector('#modalPetName');
                const modalIconContainer = petGreetingModal.querySelector('#modalPetIcon');
                const scheduleButton = petGreetingModal.querySelector('#modalScheduleLink');

                // Actualizar el título del modal
                modalTitle.textContent = `¡Hola, ${petName}!`;

                // Cambiar el ícono según la especie
                let iconHtml =
                    '<iconify-icon class="display-1 text-primary" icon="ph:paw-print-fill"></iconify-icon>'; // Icono por defecto
                if (petSpecies.toLowerCase() === 'perro') {
                    iconHtml = '<iconify-icon class="display-1 text-primary" icon="ph:dog-fill"></iconify-icon>';
                } else if (petSpecies.toLowerCase() === 'gato') {
                    iconHtml = '<iconify-icon class="display-1 text-primary" icon="ph:cat-fill"></iconify-icon>';
                }
                modalIconContainer.innerHTML = iconHtml;

                // ==========================================================
                // LÍNEA CORREGIDA PARA CONSTRUIR LA URL CORRECTAMENTE
                // ==========================================================
                const scheduleUrl = `{{ route('citas.create', ['pet' => ':petId']) }}`.replace(':petId', petId);
                scheduleButton.setAttribute('href', scheduleUrl);
            });
        }
    </script>
</body>

</html>
