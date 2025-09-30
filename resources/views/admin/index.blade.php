@extends('layouts.admin')

@section('content')

    {{-- Aquí va solo el contenido específico de esta página: las tarjetas del dashboard --}}
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="panel widget">
                <div class="widget-header bg-success">
                    <h3 class="widget-title">Productos</h3>
                </div>
                <div class="widget-body text-center">
                    {{-- Esta variable sigue funcionando perfectamente --}}
                    <h1 class="text-success">{{ $totalProducts }}</h1>
                    <p>Total de productos</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="panel widget">
                <div class="widget-header bg-info">
                    <h3 class="widget-title">Pedidos</h3>
                </div>
                <div class="widget-body text-center">
                    <h1 class="text-info">15</h1>
                    <p>Pedidos en espera</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="panel widget">
                <div class="widget-header bg-warning">
                    <h3 class="widget-title">Ingresos</h3>
                </div>
                <div class="widget-body text-center">
                    <h1 class="text-warning">$1,250</h1>
                    <p>Total de ingresos</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="panel widget">
                <div class="widget-header bg-purple">
                    <h3 class="widget-title">Clientes</h3>
                </div>
                <div class="widget-body text-center">
                     {{-- Esta variable también sigue funcionando --}}
                    <h1 class="text-purple">{{ $totalClients }}</h1>
                    <p>Clientes registrados</p>
                </div>
            </div>
        </div>
    </div>

@endsection