@extends('errors.layout')

@section('code', '419')

@section('content')
<section id="error-419" class="py-5" style="min-height: 70vh;">
    <div class="container my-5">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-8 col-lg-6">
                
                <h1 class="display-1 fw-bold text-danger">419</h1>
                <h2 class="display-5 fw-normal mb-4">La Página Expiró</h2>

                <p class="fs-5 text-muted mb-5">
                    Tu sesión ha expirado o el formulario no es válido. Esto sucede por inactividad. Por favor, recarga la página e intenta de nuevo.
                </p>

                <a href="{{ url()->previous() }}" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                    Recargar Página
                </a>
                
            </div>
        </div>
    </div>
</section>
@endsection