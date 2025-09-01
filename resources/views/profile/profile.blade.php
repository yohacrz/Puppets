@extends('layouts.app') {{-- o el layout que estés usando --}}

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Perfil del Usuario</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Fecha de registro:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
        </div>
    </div>
    <div class="mt-5">
    <h4>Mascotas registradas</h4>

    @if($mascotas->isEmpty())
        <p class="text-muted">No has registrado ninguna mascota aún.</p>
    @else
        <div class="row">
            @foreach($mascotas as $mascota)
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <p><strong>Nombre:</strong> {{ $mascota->nombre }}</p>
                            <p><strong>Especie:</strong> {{ $mascota->especie }}</p>
                            <p><strong>Raza:</strong> {{ $mascota->raza }}</p>
                            <p><strong>Color:</strong> {{ $mascota->color }}</p>
                            <p><strong>Fecha de nacimiento:</strong> {{ \Carbon\Carbon::parse($mascota->fecha_nacimiento)->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>


    <div class="mt-4">
        <a href="{{ route('home') }}" class="btn btn-primary btn-block waves-effect waves-light">Volver a Home</a>
    </div>
    <div class="mt-4">
        <a href="{{ route('addPet') }}" class="btn btn-primary btn-block waves-effect waves-light">Agregar Mascotas</a>
    </div>
    
</div>
@endsection