<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductosExport;
use Illuminate\Support\Str; // Importa la clase Str para usar Str::limit()

class ProductController extends Controller
{
    // Método para mostrar todos los productos en una tabla
    public function index()
    {
         $products = Product::all();
        return view('admin.gestion.productos.index', compact('products'));
    }



   public function show(Product $product)
    {
        return view('admin.gestion.productos.show', compact('product'));
    }
    // Método para mostrar el formulario de creación de productos
    public function create()
    {
        // Se asume que esta vista se encuentra en resources/views/admin/products/create.blade.php
        return view('admin.gestion.productos.create');
    }

    // Método para guardar un nuevo producto en la base de datos
    public function store(Request $request)
    {
        // 1. Validar los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imagePath = null;
        
        // 2. Manejar la carga de la imagen
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->extension();
            $imageFile->move(public_path('images/products'), $imageName);
            $imagePath = 'images/products/' . $imageName;
        }

        // 3. LÓGICA DE ESTADO: Determinar el estado basado en el stock
        // Si el stock es 0, el estado es 0 (deshabilitado); de lo contrario, es 1 (habilitado)
        $estado = ($validated['stock'] == 0) ? 0 : 1;

        // 4. Crear el nuevo producto
        Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'image' => $imagePath,
            'estado' => $estado, // <-- CAMBIO: Agregamos el estado
        ]);

        return redirect()->route('admin.gestion.productos.index')->with('success', 'Producto agregado exitosamente!');
    }
    
    // Método para mostrar el formulario de edición de un producto
    public function edit(Product $product)
    {
        return view('admin.gestion.productos.edit', compact('product'));
    }

     // Método para actualizar un producto en la base de datos
    public function update(Request $request, Product $product)
    {
        // 1. Validar los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        
        // 2. LÓGICA DE ESTADO: Determinar el nuevo estado basado en el stock
        $validated['estado'] = ($validated['stock'] == 0) ? 0 : 1; // <-- CAMBIO: Agregamos el estado al array $validated

        // 3. Lógica para manejar la imagen
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Eliminar la imagen antigua si existe
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->extension();
            $imageFile->move(public_path('images/products'), $imageName);
            $validated['image'] = 'images/products/' . $imageName;
        }

        // 4. Actualizar el producto (incluyendo el nuevo valor de 'estado')
        $product->update($validated);

        return redirect()->route('admin.gestion.productos.index')->with('success', 'Producto actualizado exitosamente!');
    }

   // Método para eliminar un producto de la base de datos (EXISTENTE)
    public function destroy(Product $product)
    {
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        $product->delete();
        return redirect()->back()->with('success', 'Producto eliminado exitosamente!');
    }

     // Método para alternar el estado (activo/inactivo) del producto
     public function toggleEstado(Product $product)
    {
        // 1. Alterna el valor del estado: si es 1, lo cambia a 0; si es 0, lo cambia a 1.
        $newEstado = $product->estado == 1 ? 0 : 1;
        
        // 2. Si el producto se está activando (newEstado es 1) pero su stock es 0, 
        //    podrías agregar una verificación aquí si lo deseas, pero por ahora solo alternamos el estado.
        
        $product->update(['estado' => $newEstado]);

        $mensaje = $newEstado == 1 
            ? 'Producto activado exitosamente (Visible en la tienda).' 
            : 'Producto deshabilitado exitosamente (Oculto de la tienda).';

        // Redirigimos a la misma página (back) con un mensaje de éxito.
        return redirect()->back()->with('success', $mensaje);
    }


    public function exportExcel()
    {
        // En productos, por ahora, exportamos todos.
        // Si tienes filtro de estado, añadirías la lógica aquí.
        return Excel::download(new ProductosExport, 'productos_inventario.xlsx');
    }
}