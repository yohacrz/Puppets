@extends('layouts.admin')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Detalle de la Orden #{{ $pago->id }}</h3>
        </div>
        <div class="panel-body">
            
            <div class="row">
                <div class="col-md-6">
                    <h4>Información del Cliente y Orden</h4>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item"><strong>Comprador:</strong> {{ $pago->user->name ?? $pago->user->username ?? 'Invitado' }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $pago->user->email ?? 'N/A' }}</li>
                        <li class="list-group-item"><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($pago->fecha_hora)->format('d/m/Y H:i A') }}</li>
                        <li class="list-group-item"><strong>Estado Actual:</strong> 
                            @php
                                $is_pending = $pago->estado == 1;
                                $estado_color = $is_pending ? 'bg-warning text-dark' : 'bg-success text-white';
                                $estado_texto = $is_pending ? 'PENDIENTE DE VERIFICACIÓN' : 'COMPLETADO';
                            @endphp
                            <span class="badge {{ $estado_color }} rounded-pill p-1">{{ $estado_texto }}</span>
                        </li>
                    </ul>
                </div>
                
                <div class="col-md-6">
                    <h4>Resumen Financiero</h4>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item"><strong>Monto Total:</strong> ${{ number_format($pago->total, 2) }}</li>
                        <li class="list-group-item text-danger">
                            **Nota:** Este pago se realizó por Transferencia Bancaria (verificar comprobante).
                        </li>
                    </ul>
                </div>
            </div>

            <hr>

            <h4>Productos Adquiridos (Ticket Detallado)</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Imagen</th>
                        <th>Producto (ID/Talla)</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td class="text-center" style="width: 80px;">
                                <img src="{{ asset($item['image'] ?? 'path/default.jpg') }}" alt="{{ $item['name'] }}" style="max-height: 50px;">
                            </td>
                            <td>
                                <strong>{{ $item['name'] }}</strong><br>
                                <small class="text-muted">ID: {{ $item['id'] }} | Talla: {{ $item['size'] }}</small>
                            </td>
                            <td class="text-center">{{ $item['quantity'] }}</td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right mt-4">
                <a href="{{ route('admin.gestion.pagos.index') }}" class="btn btn-default">
                    <i class="fas fa-arrow-left"></i> Volver a Órdenes
                </a>
            </div>

        </div>
    </div>
@endsection