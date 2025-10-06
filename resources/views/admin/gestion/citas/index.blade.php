@extends('layouts.admin')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Gestión de Las citas pendientes</h3>
        </div>
        <div class="panel-body">


            <div class="mb-3 d-flex justify-content-end">
                {{-- Excel: Pasamos el estado actual para que se aplique el filtro --}}
                <a href="{{ route('admin.gestion.citas.export.excel', ['estado' => request('estado')]) }}"
                    class="btn btn-success mr-2">
                    <i class="fas fa-file-excel"></i> Exportar a Excel
                </a>
                
            </div>
            {{-- Mensaje de éxito --}}
            @if (session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

            {{-- INICIO: FILTRO POR ESTADO --}}
            <form action="{{ route('admin.gestion.citas.index') }}" method="GET" class="mb-4">
                <div class="d-flex align-items-center">
                    <label for="estado_filter" class="mr-2 mb-0">Filtrar por Estado:</label>
                    <select name="estado" id="estado_filter" class="form-control"
                        style="width: 200px; display: inline-block;">
                        {{-- La opción 'selected' se usa para mantener el estado seleccionado después de filtrar --}}
                        <option value="">Mostrar Todos</option>
                        <option value="1" {{ request('estado') == '1' ? 'selected' : '' }}>Pendiente</option>
                        <option value="3" {{ request('estado') == '3' ? 'selected' : '' }}>En Proceso</option>
                        <option value="0" {{ request('estado') == '0' ? 'selected' : '' }}>Completada</option>
                        <option value="2" {{ request('estado') == '2' ? 'selected' : '' }}>Cancelada</option>
                    </select>
                    <button type="submit" class="btn btn-info ml-2">Filtrar</button>
                    {{-- Botón para resetear el filtro --}}
                    @if (request()->has('estado') && request('estado') !== null)
                        <a href="{{ route('admin.gestion.citas.index') }}" class="btn btn-secondary ml-2">Limpiar Filtro</a>
                    @endif
                </div>
            </form>
            {{-- FIN: FILTRO POR ESTADO --}}

            <table class="table table-striped mt-3">
                <thead>
                    {{-- 8 ENCABEZADOS --}}
                    <tr>
                        <th>ID Cita</th>
                        <th>Dueño</th>
                        <th>Nombre de la mascota</th>
                        <th>Fecha de la cita</th>
                        <th>Hora de la cita</th>
                        <th>Descripcion de la cita</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $cita)
                        <tr>
                            <td>{{ $cita->id }}</td>
                            <td>{{ $cita->user->username ?? 'Usuario no encontrado' }}</td>
                            <td>{{ $cita->pet->nombre ?? 'Mascota no encontrada' }}</td>
                            <td>{{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>{{ Str::limit($cita->mensaje, 50) }}</td>

                            {{-- Columna de ESTADO --}}
                            <td>
                                @php
                                    $estados = [
                                        0 => ['texto' => 'Completada', 'clase' => 'success'],
                                        1 => ['texto' => 'Pendiente', 'clase' => 'warning'],
                                        2 => ['texto' => 'Cancelada', 'clase' => 'danger'],
                                        3 => ['texto' => 'En Proceso', 'clase' => 'info'],
                                    ];
                                    $estadoActual = $estados[$cita->estado] ?? [
                                        'texto' => 'Desconocido',
                                        'clase' => 'secondary',
                                    ];
                                @endphp
                                <span class="badge bg-{{ $estadoActual['clase'] }}"
                                    style="background-color: #{{ $estadoActual['clase'] == 'success' ? '28a745' : ($estadoActual['clase'] == 'danger' ? 'dc3545' : ($estadoActual['clase'] == 'info' ? '17a2b8' : 'ffc107')) }}; color: white;">
                                    {{ $estadoActual['texto'] }}
                                </span>
                            </td>

                            {{-- Columna de ACCIONES (Sin cambios, usa el código de tu respuesta anterior) --}}
                            <td>
                                {{-- Formulario para CAMBIAR ESTADO --}}
                                <form action="{{ route('admin.gestion.citas.updateEstado', $cita->id) }}" method="POST"
                                    class="d-inline-block">
                                    @csrf
                                    @method('PUT')

                                    <div class="input-group mb-2">
                                        <select name="estado" class="form-control form-control-sm"
                                            style="width: 120px; display: inline-block;">
                                            <option value="">Cambiar a...</option>
                                            <option value="1" {{ $cita->estado == 1 ? 'disabled' : '' }}>Pendiente
                                            </option>
                                            <option value="3" {{ $cita->estado == 3 ? 'disabled' : '' }}>En Proceso
                                            </option>
                                            <option value="0" {{ $cita->estado == 0 ? 'disabled' : '' }}>Completada
                                            </option>
                                            <option value="2" {{ $cita->estado == 2 ? 'disabled' : '' }}>Cancelada
                                            </option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-sm ml-1">Actualizar</button>
                                    </div>
                                </form>

                                <div style="margin-bottom: 5px;"></div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
