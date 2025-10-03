@extends('layouts.admin')

@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Gestión de Clientes (Usuarios Registrados)</h3>
    </div>
    <div class="panel-body">

        {{-- INICIO: EXPORTAR A EXCEL --}}
        <div class="mb-3 d-flex justify-content-end">
            {{-- Excel: Pasamos el estado actual para que se aplique el filtro. Asume que la ruta se llamará 'admin.gestion.clientes.export.excel' y recibirá un parámetro 'estado'. --}}
            <a href="{{ route('admin.gestion.clientes.export.excel', ['estado' => request('estado')]) }}"
                class="btn btn-success mr-2">
                <i class="fas fa-file-excel"></i> Exportar a Excel
            </a>
        </div>
        {{-- FIN: EXPORTAR A EXCEL --}}

        @if (session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
        @endif

        {{-- INICIO: FILTRO POR ESTADO (ACTIVO/DESACTIVADO) --}}
        {{-- La ruta de acción debe ser la del índice de clientes. Asume que se llama 'admin.gestion.clientes.index' --}}
        <form action="{{ route('admin.gestion.clientes.index') }}" method="GET" class="mb-4">
            <div class="d-flex align-items-center">
                <label for="estado_filter" class="mr-2 mb-0">Filtrar por Estado:</label>
                <select name="estado" id="estado_filter" class="form-control"
                    style="width: 200px; display: inline-block;">
                    {{-- value="" es para "Mostrar Todos" --}}
                    <option value="">Mostrar Todos</option>
                    {{-- 1 es ACTIVO (estado=1), 0 es DESACTIVADO (estado=0) --}}
                    <option value="1" {{ request('estado') == '1' ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ request('estado') == '0' ? 'selected' : '' }}>Desactivado</option>
                </select>
                <button type="submit" class="btn btn-info ml-2">Filtrar</button>
                {{-- Botón para resetear el filtro --}}
                @if (request()->has('estado') && request('estado') !== null && request('estado') !== '')
                    <a href="{{ route('admin.gestion.clientes.index') }}" class="btn btn-secondary ml-2">Limpiar Filtro</a>
                @endif
            </div>
        </form>
        {{-- FIN: FILTRO POR ESTADO --}}

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Usuario</th>
                    <th>Registrado desde</th>
                    <th>Rol</th>
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
                        <span class="badge"
                            style="background-color: #7952b3; color: white;">ADMINISTRADOR</span>
                        @else
                        <span class="badge"
                            style="background-color: #0d6efd; color: white;">CLIENTE</span>
                        @endif
                    </td>

                    {{-- COLUMNA ESTADO (CORREGIDO) --}}
                    <td>
                        @if ($client->estado == 1)
                        <span class="badge"
                            style="background-color: #198754; color: white;">ACTIVO</span>
                        @else
                        <span class="badge"
                            style="background-color: #dc3545; color: white;">DESACTIVADO</span>
                        @endif
                    </td>

                    {{-- COLUMNA ACCIONES (CORREGIDO) --}}
                    <td>
                        {{-- 1. Botón para editar --}}
                        <a href="{{ route('admin.gestion.clientes.edit', $client->id) }}"
                            class="btn btn-sm mb-1" style="background-color: #ffc107; color: #212529;">
                            <i class="fas fa-edit"></i> Editar
                        </a>

                        {{-- 2. Formulario para Activar/Desactivar --}}
                        <form action="{{ route('admin.gestion.clientes.toggle_status', $client->id) }}"
                            method="POST" style="display:inline-block;">
                            @csrf
                            @method('PUT')

                            @if ($client->estado == 1)
                            <button type="submit" class="btn btn-warning btn-sm mb-1"
                                title="Desactivar cuenta">
                                <i class="fas fa-user-slash"></i> Desactivar
                            </button>
                            @else
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
                            <button type="submit" class="btn btn-sm"
                                style="background-color: #dc3545; color: white;"
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