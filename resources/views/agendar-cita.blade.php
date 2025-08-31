{{-- resources/views/agendar-cita.blade.php --}}
@extends('layouts.app')

@section('title', 'Agendar Cita')

@section('content')

<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-start">
            <div class="col-lg-8 text-center text-lg-start">
                <h1 class="display-1 text-uppercase text-dark mb-lg-4">Agendar Cita</h1>
                <h1 class="text-uppercase text-white mb-lg-4">Completa tus datos</h1>
                <p class="fs-4 text-white mb-lg-4">
                    Elige tu fecha y hora preferida para el servicio de tu mascota.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase">Agendar cita</h6>
            <h1 class="display-5 text-uppercase mb-0">Rellena el formulario</h1>
        </div>

        {{-- NUEVA SECCIÓN: Muestra el paquete seleccionado desde la sesión --}}
        @if (session('paquete_seleccionado'))
            @php
                $paquete = session('paquete_seleccionado');
            @endphp
            <div class="alert alert-info text-center" role="alert">
                <h5 class="alert-heading">Paquete Seleccionado</h5>
                <p class="mb-0">
                    <strong>Servicio:</strong> {{ $paquete['servicio'] }} |
                    <strong>Tamaño:</strong> {{ $paquete['tamanio'] }} |
                    <strong>Costo:</strong> ${{ number_format($paquete['precio'], 2) }}
                </p>
            </div>
        @endif

        {{-- Mensaje de éxito o error --}}
        @if (session('success'))
            <div class="alert alert-success mt-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row g-5">
            <div class="col-lg-7">
                <form action="{{ route('agendar.cita.store') }}" method="POST">
                    @csrf

                    {{-- CAMPOS OCULTOS: para enviar los datos del paquete --}}
                    @if (session('paquete_seleccionado'))
                        <input type="hidden" name="servicio_seleccionado" value="{{ $paquete['servicio'] }}">
                        <input type="hidden" name="tamanio_seleccionado" value="{{ $paquete['tamanio'] }}">
                        <input type="hidden" name="precio_seleccionado" value="{{ $paquete['precio'] }}">
                    @endif

                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <input type="text" name="nombre" class="form-control bg-light border-0" placeholder="Nombre completo" style="height: 55px;" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="email" name="email" class="form-control bg-light border-0" placeholder="Correo electrónico" style="height: 55px;" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="text" name="telefono" class="form-control bg-light border-0" placeholder="Número de teléfono" style="height: 55px;" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <select id="petType" name="mascota" class="form-select bg-light border-0" style="height: 55px;" required>
                                <option selected disabled>Tipo de mascota</option>
                                <option value="perro">Perro</option>
                                <option value="gato">Gato</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="date" name="fecha" class="form-control bg-light border-0" style="height: 55px;" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="time" name="hora" class="form-control bg-light border-0" style="height: 55px;" required>
                        </div>
                        <div class="col-12">
                            <textarea id="specialMessage" name="mensaje" class="form-control bg-light border-0" rows="5" placeholder="Tratamientos especiales de la mascota (opcional)"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Agendar Cita</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-5" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid w-100 h-100 rounded" src="img/appointment.jpg" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection