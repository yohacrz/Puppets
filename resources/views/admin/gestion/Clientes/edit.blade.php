@extends('layouts.admin')

@section('content')
<div class="container">
    {{-- $client se pasa desde el controlador --}}
    <h1>Editar Cliente: {{ $client->username }}</h1>

    {{-- Bloque para mostrar errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups! Hubo algunos problemas con tu entrada.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    {{-- Regla de restricción visual para administradores --}}
    @if ($client->role == 1)
        <div class="alert alert-danger">
            <i class="fas fa-lock"></i> **Acceso Restringido:** No se puede editar la información de un ADMINISTRADOR por motivos de seguridad.
        </div>
        <a href="{{ route('admin.gestion.clientes.index') }}" class="btn btn-secondary mt-3">Volver a Clientes</a>
    @else
        {{-- Solo se muestra el formulario si el rol NO es administrador (role === 0) --}}

        {{-- El 'action' apunta a la ruta de actualización (método 'update') --}}
        <form action="{{ route('admin.gestion.clientes.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Usa el método PUT para actualizar --}}

            <div class="row">
                {{-- Columna para el Email y Usuario --}}
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" 
                               value="{{ old('email', $client->email) }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="username">Nombre de Usuario:</label>
                        <input type="text" name="username" class="form-control" id="username" 
                               value="{{ old('username', $client->username) }}" required>
                        @error('username')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Columna para Info (No Editable) --}}
                <div class="col-md-6">
                    <h4>Información de Cuenta</h4>
                    <p>
                        <strong>Rol:</strong> 
                        @if ($client->role == 1)
                            <span class="badge bg-primary" style="background-color: #007bff; color: white;">ADMINISTRADOR</span>
                        @else
                            <span class="badge bg-secondary" style="background-color: #6c757d; color: white;">CLIENTE</span>
                        @endif
                    </p>
                    <p>
                        <strong>Estado:</strong> 
                        @if ($client->status == 1)
                            <span class="badge bg-success" style="background-color: #28a745; color: white;">ACTIVO</span>
                        @else
                            <span class="badge bg-danger" style="background-color: #dc3545; color: white;">DESACTIVADO</span>
                        @endif
                    </p>
                    {{-- Si quieres permitir cambiar la contraseña, puedes añadir un campo aquí --}}
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
            <a href="{{ route('admin.gestion.clientes.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    @endif
</div>
@endsection