@extends('layouts.admin') {{-- Asume que tienes un layout principal para tu admin --}}

@section('content')
<div class="container">
    {{-- El h1 incluye el nombre del producto que se está editando --}}
    <h1>Editar Producto: {{ $product->name }}</h1>

    <hr>

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

    {{-- 
        ACCIÓN CORREGIDA: Apunta a 'admin.gestion.productos.update' con el ID del producto.
        @method('PUT') simula la solicitud PUT/PATCH que el recurso espera.
    --}}
    <form action="{{ route('admin.gestion.productos.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf {{-- Token de seguridad OBLIGATORIO en Laravel --}}
        @method('PUT') {{-- Indica que esta solicitud es para actualizar un recurso --}}

        <div class="form-group">
            <label for="name">Nombre del Producto:</label>
            {{-- Rellenar el valor con el dato actual del producto o el valor antiguo si hay error --}}
            <input type="text" name="name" class="form-control" id="name" placeholder="Ej: Shampoo para perro" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            {{-- Rellenar el área de texto con el dato actual del producto --}}
            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Descripción breve del producto">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Precio:</label>
            <input type="number" name="price" class="form-control" id="price" placeholder="Ej: 12.50" step="0.01" value="{{ old('price', $product->price) }}" required>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="stock">Stock (Cantidad disponible):</label>
            <input type="number" name="stock" class="form-control" id="stock" placeholder="Ej: 100" value="{{ old('stock', $product->stock) }}" required>
            @error('stock')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Imagen del Producto (Dejar vacío para no cambiar):</label>
            
            {{-- Muestra la imagen actual si existe --}}
            @if ($product->image)
                <div class="mb-2">
                    <p>Imagen actual:</p>
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="100" class="img-thumbnail">
                </div>
            @endif

            <input type="file" name="image" class="form-control-file" id="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Producto</button>
        {{-- Ruta de Cancelar corregida --}}
        <a href="{{ route('admin.gestion.productos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection