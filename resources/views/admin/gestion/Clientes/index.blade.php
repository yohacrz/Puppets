@extends('layouts.admin')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Gestión de Clientes (Usuarios Registrados)</h3>
        </div>
        <div class="panel-body">
            @if (session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                {{-- Añade esta sección --}}
                <div class="alert alert-danger mt-3">{{ session('error') }}</div>
            @endif

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Usuario</th>
                        <th>Registrado desde</th>
                        <th>Rol</th> {{-- NUEVA COLUMNA DE ROL --}}
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->username }}</td>
                            <td>{{ $client->created_at->format('d/m/Y H:i') }}</td>

                            {{-- COLUMNA ROL --}}
                            <td>
                                @if ($client->role == 1)
                                    <span class="badge bg-primary"
                                        style="background-color: #007bff; color: white;">ADMINISTRADOR</span>
                                @else
                                    <span class="badge bg-secondary"
                                        style="background-color: #6c757d; color: white;">CLIENTE</span>
                                @endif
                            </td>

                            {{-- COLUMNA ESTADO --}}
                            <td>
                                @if ($client->status == 1)
                                    <span class="badge bg-success"
                                        style="background-color: #28a745; color: white;">ACTIVO</span>
                                @else
                                    <span class="badge bg-danger"
                                        style="background-color: #dc3545; color: white;">DESACTIVADO</span>
                                @endif
                            </td>

                            {{-- COLUMNA ACCIONES --}}
                            <td>
                                {{-- 1. Botón para editar --}}
                                <a href="{{ route('admin.gestion.clientes.edit', $client->id) }}"
                                    class="btn btn-pastel-info btn-sm mb-1">
                                    <i class="fas fa-edit"></i> Editar
                                </a>

                                {{-- 2. Formulario para Activar/Desactivar --}}
                                <form action="{{ route('admin.gestion.clientes.toggle_status', $client->id) }}"
                                    method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('PUT')

                                    @if ($client->status == 1)
                                        {{-- Si está ACTIVO (1), mostramos el botón de DESACTIVAR --}}
                                        <button type="submit" class="btn btn-warning btn-sm mb-1"
                                            title="Desactivar cuenta">
                                            <i class="fas fa-user-slash"></i> Desactivar
                                        </button>
                                    @else
                                        {{-- Si está DESACTIVADO (0), mostramos el botón de ACTIVAR --}}
                                        <button type="submit" class="btn btn-success btn-sm mb-1" title="Activar cuenta">
                                            <i class="fas fa-user-check"></i> Activar
                                        </button>
                                    @endif
                                </form>

                                {{-- 3. Formulario para eliminar --}}
                                <form action="{{ route('admin.gestion.clientes.destroy', $client->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-pastel-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de que deseas ELIMINAR permanentemente a este usuario?');">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
