<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductosExport;
use Illuminate\Support\Str;

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
        return view('admin.gestion.productos.create');
    }

    // Método para guardar un nuevo producto en la base de datos
    public function store(Request $request)
    {
        // 1. Validar los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'color' => 'nullable|string|max:50', 
            'stock_S' => 'nullable|integer|min:0',
            'stock_M' => 'nullable|integer|min:0',
            'stock_L' => 'nullable|integer|min:0',
            'stock_XL' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            
            // ✅ Se añade la regla de validación para la categoría
            'categoria' => 'nullable|string|max:100', 
        ]);

        $imagePath = null;
        
        // 2. Manejar la carga de la imagen
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->extension();
            $imageFile->move(public_path('images/products'), $imageName);
            $imagePath = 'images/products/' . $imageName;
        }

        // 3. LÓGICA DE ASIGNACIÓN Y ESTADO
        
        // 🔥 CORRECCIÓN CRÍTICA: Asigna un valor seguro si 'categoria' es nula.
        $validated['categoria'] = $request->input('categoria') ?? $validated['color'] ?? 'Miscelanea';
        
        $validated['estado'] = ($validated['stock'] == 0) ? 0 : 1;

        // 4. Preparar datos finales
        $validated['image'] = $imagePath;
        
        // Asegurar stocks por talla como 0 si vienen vacíos
        $validated['stock_S'] = $validated['stock_S'] ?? 0;
        $validated['stock_M'] = $validated['stock_M'] ?? 0;
        $validated['stock_L'] = $validated['stock_L'] ?? 0;
        $validated['stock_XL'] = $validated['stock_XL'] ?? 0;

        // 5. Crear el nuevo producto
        Product::create($validated);

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
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'color' => 'nullable|string|max:50', 
            'stock_S' => 'nullable|integer|min:0',
            'stock_M' => 'nullable|integer|min:0',
            'stock_L' => 'nullable|integer|min:0',
            'stock_XL' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'categoria' => 'nullable|string|max:100', // Se añade la regla
        ]);
        
        // 2. LÓGICA DE ASIGNACIÓN Y ESTADO
        
        // 🔥 CORRECCIÓN CRÍTICA: Asignar la categoría aquí también.
        $validated['categoria'] = $request->input('categoria') ?? $validated['color'] ?? 'Miscelanea';
        
        $validated['estado'] = ($validated['stock'] == 0) ? 0 : 1; 

        // Asegurar stocks por talla como 0 si vienen vacíos
        $validated['stock_S'] = $validated['stock_S'] ?? 0;
        $validated['stock_M'] = $validated['stock_M'] ?? 0;
        $validated['stock_L'] = $validated['stock_L'] ?? 0;
        $validated['stock_XL'] = $validated['stock_XL'] ?? 0;

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

        // 4. Actualizar el producto
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
        $newEstado = $product->estado == 1 ? 0 : 1;
        
        $product->update(['estado' => $newEstado]);

        $mensaje = $newEstado == 1 
            ? 'Producto activado exitosamente (Visible en la tienda).' 
            : 'Producto deshabilitado exitosamente (Oculto de la tienda).';

        return redirect()->back()->with('success', $mensaje);
    }


    public function exportExcel()
    {
        return Excel::download(new ProductosExport, 'productos_inventario.xlsx');
    }
}