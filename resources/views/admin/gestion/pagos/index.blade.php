@extends('layouts.admin')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Gestión de Órdenes de Pago</h3>
            <div class="right d-flex align-items-center">
                {{-- INICIO: EXPORTAR A EXCEL --}}
                <a href="{{ route('admin.gestion.pagos.export.excel', ['estado' => request('estado')]) }}"
                    class="btn btn-success mr-2">
                    <i class="fas fa-file-excel"></i> Exportar a Excel
                </a>
                {{-- FIN: EXPORTAR A EXCEL --}}

                <a href="{{ route('admin.gestion.pagos.index') }}" class="btn btn-primary">
                    <i class="fas fa-sync-alt"></i> Actualizar
                </a>
            </div>
        </div>
        <div class="panel-body">
            @if (session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger mt-3">{{ session('error') }}</div>
            @endif

            {{-- INICIO: FILTRO POR ESTADO --}}
            <form action="{{ route('admin.gestion.pagos.index') }}" method="GET" class="mb-4">
                <div class="d-flex align-items-center">
                    <label for="estado_filter" class="mr-2 mb-0">Filtrar por Estado:</label>
                    <select name="estado" id="estado_filter" class="form-control"
                        style="width: 200px; display: inline-block;">
                        {{-- Opciones: PENDIENTE (1), COMPLETADO (0) --}}
                        <option value="">Mostrar Todos</option>
                        <option value="1" {{ request('estado') == '1' ? 'selected' : '' }}>Pendiente</option>
                        <option value="0" {{ request('estado') == '0' ? 'selected' : '' }}>Completado</option>
                    </select>
                    <button type="submit" class="btn btn-info ml-2">Filtrar</button>
                    {{-- Botón para resetear el filtro --}}
                    @if (request()->has('estado') && request('estado') !== null && request('estado') !== '')
                        <a href="{{ route('admin.gestion.pagos.index') }}" class="btn btn-secondary ml-2">Limpiar Filtro</a>
                    @endif
                </div>
            </form>
            {{-- FIN: FILTRO POR ESTADO --}}


            <table class="table table-striped mt-3 text-center"> {{-- CENTRAMOS EL TEXTO DE LA TABLA --}}
                <thead>
                    <tr>
                        <th class="text-center">Orden ID</th>
                        <th class="text-center">Comprador</th>
                        <th class="text-center">Fecha y Hora</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Ítems</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pagos as $pago)
                        @php
                            $comprador = $pago->user->name ?? $pago->user->username ?? 'Invitado';
                            
                            // 0 = Completado (Success), 1 = Pendiente (Warning)
                            $is_pending = $pago->estado == 1;
                            
                            $estado_color = $is_pending ? 'bg-warning text-dark' : 'bg-success text-white';
                            $estado_texto = $is_pending ? 'PENDIENTE' : 'COMPLETADO';
                            
                            // ==================================================================
                            $items = $pago->productos;

                            if (is_string($items)) {
                                $items = json_decode($items, true);
                            }

                            if (!is_array($items)) {
                                $items = [];
                            }
                            // ==================================================================

                            $item_count = collect($items)->sum('quantity'); // Sumamos las cantidades de items
                        @endphp
                        <tr>
                            <td>#{{ $pago->id }}</td>
                            <td>{{ $comprador }}</td>
                            <td>{{ \Carbon\Carbon::parse($pago->fecha_hora)->format('d/m/Y H:i A') }}</td>
                            <td>${{ number_format($pago->total, 2) }}</td>
                            <td>{{ $item_count }} artículo{{ $item_count != 1 ? 's' : '' }}</td>

                            {{-- COLUMNA ESTADO (Badge) --}}
                            <td>
                                <span class="badge {{ $estado_color }} rounded-pill p-2">
                                    {{ $estado_texto }}
                                </span>
                            </td>

                            {{-- COLUMNA ACCIONES --}}
                            <td>
                                {{-- 1. Botón VER DETALLE --}}
                                <a href="{{ route('admin.gestion.pagos.show', $pago->id) }}"
                                    class="btn btn-info btn-sm mb-1" title="Ver Detalle">
                                    <i class="fas fa-eye"></i> Ver
                                </a>

                                {{-- 2. Formulario para Alternar Estado --}}
                                <form action="{{ route('admin.gestion.pagos.toggle_estado', $pago->id) }}"
                                    method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('PUT')
                                    
                                    @if ($is_pending)
                                        <button type="submit" class="btn btn-success btn-sm mb-1" 
                                            title="Marcar como COMPLETADA">
                                            <i class="fas fa-check"></i> Marcar Completado
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-secondary btn-sm mb-1" 
                                            title="Revertir a PENDIENTE">
                                            <i class="fas fa-history"></i> Revertir
                                        </button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No hay órdenes de pago registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection