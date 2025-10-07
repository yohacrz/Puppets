@php
    // Define variables para el mensaje
    $errorCode = '403';
    $errorTitle = 'Acceso Denegado (Forbidden)';
    $errorMessage = 'No tienes permiso para ver esta página o realizar esta acción. Verifica tu rol o intenta iniciar sesión con una cuenta diferente.';
@endphp

<!DOCTYPE html>
<html lang="es">

<head>
    <title>PUPPETS | Error {{ $errorCode }}</title>
    {{-- ... (Incluye todo el Head de tu 404/500.blade.php) ... --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('user-template/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user-template/style.css') }}">
</head>

<body>
    <header>
        {{-- ... CÓDIGO DE TU HEADER COMPLETO ... --}}
    </header>

    ---
    
    <main>
        <section id="error-{{ $errorCode }}" class="py-5" style="min-height: 70vh;">
            <div class="container my-5">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-md-8 col-lg-6">
                        
                        <h1 class="display-1 fw-bold text-danger">{{ $errorCode }}</h1>
                        <h2 class="display-5 fw-normal mb-4">{{ $errorTitle }}</h2>

                        <p class="fs-5 text-muted mb-5">{{ $errorMessage }}</p>

                        {{-- Botón para regresar al inicio --}}
                        <a href="{{ url('/') }}" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                            Ir a la Página Principal
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

    <footer>
        {{-- ... CÓDIGO DE TU FOOTER COMPLETO ... --}}
    </footer>
    
    {{-- ... SCRIPTS ... --}}
</body>
</html>