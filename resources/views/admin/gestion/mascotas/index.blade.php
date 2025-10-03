@extends('layouts.admin')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Mascotas Registradas</h3>
            <div class="right d-flex align-items-center">
                {{-- INICIO: EXPORTAR A EXCEL --}}
                <a href="{{ route('admin.gestion.mascotas.export.excel', ['especie' => request('especie')]) }}"
                    class="btn btn-success mr-2">
                    <i class="fas fa-file-excel"></i> Exportar a Excel
                </a>
                {{-- FIN: EXPORTAR A EXCEL --}}

                <a href="{{ route('admin.gestion.mascotas.index') }}" class="btn btn-primary">
                    <i class="fas fa-sync-alt"></i> Actualizar
                </a>
            </div>
        </div>
        <div class="panel-body">
            {{-- INICIO: FILTRO POR ESPECIE --}}
            <form action="{{ route('admin.gestion.mascotas.index') }}" method="GET" class="mb-4">
                <div class="d-flex align-items-center">
                    <label for="especie_filter" class="mr-2 mb-0">Filtrar por Especie:</label>
                    {{-- Usaremos un campo de texto simple para filtrar por la especie ingresada --}}
                    <input type="text" name="especie" id="especie_filter" class="form-control" 
                        placeholder="Ej: Perro o Gato" value="{{ request('especie') }}"
                        style="width: 200px; display: inline-block;">

                    <button type="submit" class="btn btn-info ml-2">Filtrar</button>
                    
                    {{-- Botón para resetear el filtro --}}
                    @if (request()->has('especie') && request('especie') !== null && request('especie') !== '')
                        <a href="{{ route('admin.gestion.mascotas.index') }}" class="btn btn-secondary ml-2">Limpiar Filtro</a>
                    @endif
                </div>
            </form>
            {{-- FIN: FILTRO POR ESPECIE --}}


            <table class="table table-striped mt-3 text-center">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Especie</th>
                        <th class="text-center">Raza</th>
                        <th class="text-center">Dueño</th>
                        <th class="text-center">Fecha de Registro</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mascotas as $mascota)
                        <tr>
                            <td>#{{ $mascota->id }}</td>
                            <td>{{ $mascota->nombre }}</td>
                            <td>{{ $mascota->especie }}</td>
                            <td>{{ $mascota->raza }}</td>
                            {{-- Usamos la relación para obtener el nombre del dueño --}}
                            <td>{{ $mascota->user->username ?? 'N/A' }}</td>
                            <td>{{ $mascota->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay mascotas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection