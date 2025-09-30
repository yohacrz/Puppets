@extends('layouts.admin') {{-- Asume que tienes un layout principal para tu admin --}}

@section('content')
<div class="container">
    <h1>Agregar Nuevo Producto</h1>

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

    {{-- El 'action' apunta a la ruta que procesa el guardado (método 'store') --}}
    {{-- El 'enctype' es VITAL para poder subir archivos/imágenes --}}
    <form action="{{ route('admin.gestion.productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf {{-- Token de seguridad OBLIGATORIO en Laravel --}}

        <div class="form-group">
            <label for="name">Nombre del Producto:</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Ej: Shampoo para perro" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Descripción breve del producto">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Precio:</label>
            <input type="number" name="price" class="form-control" id="price" placeholder="Ej: 12.50" step="0.01" value="{{ old('price') }}" required>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="stock">Stock (Cantidad disponible):</label>
            <input type="number" name="stock" class="form-control" id="stock" placeholder="Ej: 100" value="{{ old('stock') }}" required>
            @error('stock')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Imagen del Producto:</label>
            <input type="file" name="image" class="form-control-file" id="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar Producto</button>
        <a href="{{ route('admin.gestion.productos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection