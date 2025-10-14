
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