@extends('errors.layout')

@section('code', '503')

@section('content')
<section id="error-503" class="py-5" style="min-height: 70vh;">
    <div class="container my-5">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-8 col-lg-6">
                
                <h1 class="display-1 fw-bold text-primary">503</h1>
                <h2 class="display-5 fw-normal mb-4">Mantenimiento Temporal</h2>

                <p class="fs-5 text-muted mb-5">
                    Estamos mejorando la tienda **PUPPETS** y volveremos en breve. Disculpa las molestias.
                </p>

                <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1 disabled">
                    Volveremos Pronto
                </a>
                
            </div>
        </div>
    </div>
</section>
@endsection