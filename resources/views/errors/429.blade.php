@extends('errors.layout')

@section('code', '429')

@section('content')
<section id="error-429" class="py-5" style="min-height: 70vh;">
    <div class="container my-5">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-8 col-lg-6">
                
                <h1 class="display-1 fw-bold text-danger">429</h1>
                <h2 class="display-5 fw-normal mb-4">Espera un Momento</h2>

                <p class="fs-5 text-muted mb-5">
                    Estás haciendo demasiadas peticiones en poco tiempo. Por favor, espera unos segundos antes de volver a intentarlo.
                </p>

                <a href="{{ url('/') }}" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                    Volver al Inicio
                </a>
                
            </div>
        </div>
    </div>
</section>
@endsection