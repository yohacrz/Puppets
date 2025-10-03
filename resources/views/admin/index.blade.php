@extends('layouts.admin')

@section('content')

    {{-- FILA 1: WIDGETS SIMPLIFICADOS (3 METRICAS CLAVE) --}}
    <div class="row">
        
        {{-- Clientes Registrados --}}
        <div class="col-md-4">
            <div class="panel widget">
                <div class="widget-header bg-purple">
                    <h3 class="widget-title">Clientes Registrados</h3>
                </div>
                <div class="widget-body text-center">
                    <h1 class="text-purple">{{ $totalClients }}</h1>
                    <p>Clientes Activos (Role 0)</p>
                </div>
            </div>
        </div>

        {{-- Mascotas Registradas --}}
        <div class="col-md-4">
            <div class="panel widget">
                <div class="widget-header bg-danger">
                    <h3 class="widget-title">Mascotas Registradas</h3>
                </div>
                <div class="widget-body text-center">
                    <h1 class="text-danger">{{ $mascotasRegistradas }}</h1>
                    <p>Total de Mascotas en DB</p>
                </div>
            </div>
        </div>

        {{-- Productos Activos --}}
        <div class="col-md-4">
            <div class="panel widget">
                <div class="widget-header bg-success">
                    <h3 class="widget-title">Productos Activos</h3>
                </div>
                <div class="widget-body text-center">
                    <h1 class="text-success">{{ $productosActivos }}</h1>
                    <p>Productos Disponibles</p>
                </div>
            </div>
        </div>
    </div>

    <hr>

    {{-- FILA 2: GRÁFICOS (Ganancias y Mascotas por Raza) --}}
    <div class="row">
        
        {{-- Gráfico 1: Tendencia de Ingresos (Línea, más dinámico para ganancias) --}}
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Tendencia de Ingresos Mensuales (Total: ${{ number_format($totalIngresos, 2) }})</h3>
                </div>
                <div class="panel-body" style="height: 350px;">
                    <canvas id="ingresosChart"></canvas>
                </div>
            </div>
        </div>

        {{-- Gráfico 2: Clasificación de Mascotas por Raza (Pastel/Dona) --}}
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Clasificación de Mascotas por Raza</h3>
                </div>
                <div class="panel-body" style="height: 350px;">
                    <canvas id="razasChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    {{-- FILA 3: GRÁFICOS (Pedidos y Citas por Estado) --}}
    <div class="row">
        
        {{-- Gráfico 3: Pedidos por Estado (Pastel/Dona) --}}
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Pedidos por Estado</h3>
                </div>
                <div class="panel-body" style="height: 350px;">
                    <canvas id="pedidosChart"></canvas>
                </div>
            </div>
        </div>

        {{-- Gráfico 4: Citas por Estado (Pastel/Dona) --}}
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Citas por Estado</h3>
                </div>
                <div class="panel-body" style="height: 350px;">
                    <canvas id="citasChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- FILA 4: TABLA DE STOCK BAJO --}}
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">⚠️ Productos con Stock Más Bajo (Top 5)</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Stock Actual</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stockData as $item)
                                {{-- Resaltamos si el stock es crítico (menor o igual a 10) --}}
                                <tr class="{{ $item->stock <= 10 ? 'table-danger' : '' }}"> 
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <strong>{{ $item->stock }}</strong> 
                                        @if ($item->stock <= 10)
                                            <span class="badge bg-danger">¡Pedir!</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">No hay productos con stock para mostrar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- 🚨 SCRIPTS Y LIBRERÍA DE GRÁFICOS (La solución a las áreas en blanco) --}}
@section('scripts')
{{-- 1. Incluimos la librería Chart.js (CDN) --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // Función para generar un color único basado en un índice
        const COLORS = ['#4dc9f6', '#f67019', '#f53794', '#537bc4', '#acc236', '#166a56', '#8d4793', '#e4665c'];
        function getBackgroundColor(index) {
             return COLORS[index % COLORS.length];
        }

        // =======================================================================
        // GRÁFICO 1: INGRESOS MENSUALES (Línea)
        // =======================================================================
        const ingresosCtx = document.getElementById('ingresosChart');
        const ingresosData = @json($ingresosPorMes);
        const monthNames = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
        const meses = ingresosData.map(item => monthNames[item.month - 1] || 'N/A');
        const totales = ingresosData.map(item => item.total);
        
        new Chart(ingresosCtx, {
            type: 'line',
            data: {
                labels: meses,
                datasets: [{
                    label: 'Ganancia ($)',
                    data: totales,
                    backgroundColor: 'rgba(255, 193, 7, 0.5)', 
                    borderColor: 'rgba(255, 193, 7, 1)',
                    borderWidth: 2,
                    tension: 0.3, 
                    fill: true
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });

        // =======================================================================
        // GRÁFICO 2: CLASIFICACIÓN DE RAZAS (Dona)
        // =======================================================================
        const razasCtx = document.getElementById('razasChart');
        const razasData = @json($razasData);
        
        const razas = razasData.map(item => item.raza);
        const conteosRazas = razasData.map(item => item.count);
        
        new Chart(razasCtx, {
            type: 'doughnut', 
            data: {
                labels: razas,
                datasets: [{
                    data: conteosRazas,
                    backgroundColor: razasData.map((_, i) => getBackgroundColor(i)),
                    hoverOffset: 10
                }]
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'right' } } }
        });

        // =======================================================================
        // GRÁFICO 3: PEDIDOS POR ESTADO (Pastel)
        // =======================================================================
        const pedidosCtx = document.getElementById('pedidosChart');
        const pedidosData = @json($pedidosEstadoData);
        
        const pedidosLabels = pedidosData.map(item => item.estado == 1 ? 'PENDIENTE' : 'COMPLETADO');
        const pedidosCounts = pedidosData.map(item => item.count);
        
        new Chart(pedidosCtx, {
            type: 'pie', 
            data: {
                labels: pedidosLabels,
                datasets: [{
                    data: pedidosCounts,
                    backgroundColor: ['#ffc107', '#28a745'], // Amarillo/Verde
                    hoverOffset: 10
                }]
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'right' } } }
        });

        // =======================================================================
        // GRÁFICO 4: CITAS POR ESTADO (Pastel)
        // =======================================================================
        const citasCtx = document.getElementById('citasChart');
        const citasData = @json($citasEstadoData);
        
        // Mapeo de estados de citas: 0=Completada, 1=Pendiente, 2=Cancelada, 3=En Proceso
        const estadoMap = { 0: 'Completada', 1: 'Pendiente', 2: 'Cancelada', 3: 'En Proceso' };
        
        const citasLabels = citasData.map(item => estadoMap[item.estado] || 'Desconocido');
        const citasCounts = citasData.map(item => item.count);
        
        new Chart(citasCtx, {
            type: 'pie', 
            data: {
                labels: citasLabels,
                datasets: [{
                    data: citasCounts,
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545', '#17a2b8'], // Verde, Amarillo, Rojo, Azul
                    hoverOffset: 10
                }]
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'right' } } }
        });
    });
</script>
@endsection