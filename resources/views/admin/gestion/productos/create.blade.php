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

        <div class="form-group mb-3">
            <label for="name">Nombre del Producto:</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Ej: Shampoo para perro" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description">Descripción:</label>
            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Descripción breve del producto">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="price">Precio:</label>
            <input type="number" name="price" class="form-control" id="price" placeholder="Ej: 12.50" step="0.01" value="{{ old('price') }}" required>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group mb-3">
            <label for="color">Color:</label>
            <select name="color" class="form-control" id="color" required>
                <option value="">-- Seleccione un Color --</option>
                @php
                    $colores = ['Rosa', 'Verde', 'Azul', 'Rojo', 'Amarillo', 'Negro', 'Blanco', 'Multicolor', 'Único'];
                @endphp
                @foreach ($colores as $c)
                    <option value="{{ strtolower($c) }}" {{ old('color') == strtolower($c) ? 'selected' : '' }}>{{ $c }}</option>
                @endforeach
            </select>
            @error('color')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="stock">Stock Total (Requerido para validación y productos sin talla):</label>
            <input type="number" name="stock" class="form-control" id="stock" placeholder="Ej: 100" value="{{ old('stock') }}" required>
            @error('stock')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <h4 class="mt-4">Stock por Talla (Opcional, dejar en 0 si no aplica)</h4>
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="stock_S">Stock Talla S:</label>
                <input type="number" name="stock_S" class="form-control" id="stock_S" placeholder="Ej: 50" value="{{ old('stock_S', 0) }}">
                @error('stock_S')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="stock_M">Stock Talla M:</label>
                <input type="number" name="stock_M" class="form-control" id="stock_M" placeholder="Ej: 50" value="{{ old('stock_M', 0) }}">
                @error('stock_M')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="stock_L">Stock Talla L:</label>
                <input type="number" name="stock_L" class="form-control" id="stock_L" placeholder="Ej: 50" value="{{ old('stock_L', 0) }}">
                @error('stock_L')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="stock_XL">Stock Talla XL:</label>
                <input type="number" name="stock_XL" class="form-control" id="stock_XL" placeholder="Ej: 50" value="{{ old('stock_XL', 0) }}">
                @error('stock_XL')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="form-group mb-3">
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