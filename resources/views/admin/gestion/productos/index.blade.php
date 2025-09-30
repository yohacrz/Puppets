@extends('layouts.admin')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Gestión de Productos</h3>
        </div>
        <div class="panel-body">
            {{-- El botón para ir al formulario de creación --}}
            <a href="{{ route('admin.gestion.productos.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus-circle"></i> Agregar Nuevo Producto
            </a>

            {{-- NUEVO BOTÓN DE EXPORTACIÓN --}}
            <a href="{{ route('admin.gestion.productos.export.excel') }}" class="btn btn-success mb-3 ml-2">
                <i class="fas fa-file-excel"></i> Exportar Inventario
            </a>

            {{-- Bloque para mostrar mensajes de éxito (ej: "Producto guardado!") --}}
            @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif

            {{-- La tabla que muestra todos los productos --}}
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th> {{-- NUEVA COLUMNA PARA VER EL ESTADO --}}
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Bucle para recorrer y mostrar cada producto --}}
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="50"
                                        class="img-thumbnail">
                                @else
                                    <span class="text-muted">Sin imagen</span>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ Str::limit($product->description, 50) }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->stock }}</td>
                            {{-- Muestra el estado actual con una etiqueta visual --}}
                            <td>
                                @if ($product->estado == 1)
                                    <span class="badge bg-success"
                                        style="background-color: #28a745; color: white;">ACTIVO</span>
                                @else
                                    <span class="badge bg-danger"
                                        style="background-color: #dc3545; color: white;">INACTIVO</span>
                                @endif
                            </td>
                            <td>
                                {{-- Botón para editar el producto (EXISTENTE) --}}
                                <a href="{{ route('admin.gestion.productos.edit', $product->id) }}"
                                    class="btn btn-pastel-info btn-sm mb-1">
                                    <i class="fas fa-edit"></i> Editar
                                </a>

                                {{-- INICIO: Botón para cambiar estado (NUEVO) --}}
                                <form action="{{ route('admin.gestion.productos.toggle_estado', $product->id) }}"
                                    method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('PUT')

                                    @if ($product->estado == 1)
                                        {{-- Si está activo (1), mostramos el botón de DESHABILITAR (Amarillo/Warning) --}}
                                        <button type="submit" class="btn btn-warning btn-sm mb-1"
                                            title="Deshabilitar para ocultar de la tienda">
                                            <i class="fas fa-eye-slash"></i> Deshabilitar
                                        </button>
                                    @else
                                        {{-- Si está inactivo (0), mostramos el botón de ACTIVAR (Verde/Success) --}}
                                        <button type="submit" class="btn btn-success btn-sm mb-1"
                                            title="Activar para mostrar en la tienda">
                                            <i class="fas fa-eye"></i> Activar
                                        </button>
                                    @endif
                                </form>
                                {{-- FIN: Botón para cambiar estado --}}

                                {{-- Formulario para eliminar el producto (EXISTENTE) --}}
                                <form action="{{ route('admin.gestion.productos.destroy', $product->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-pastel-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
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
