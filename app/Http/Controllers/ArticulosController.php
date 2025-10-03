<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str; 

class ArticulosController extends Controller
{
    /**
     * Muestra la página de la tienda (/shop) con la cuadrícula de productos dinámica,
     * implementando búsqueda, filtro por categoría y ordenamiento por precio.
     */
    public function articulos(Request $request)
    {
        // 1. CONSTRUIR LA CONSULTA BASE (Productos activos y con stock)
        $query = Product::where('estado', 1)->where('stock', '>', 0);
        
        // 2. APLICAR FILTROS DE BÚSQUEDA
        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // 3. APLICAR FILTRO POR CATEGORÍA
        if ($category = $request->get('category')) {
            $query->where('categoria', $category);
        }

        // 4. APLICAR ORDENAMIENTO (Sorting por precio)
        if ($sort = $request->get('sort')) {
            switch ($sort) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    // Orden por defecto (más nuevos primero, si no se especifica)
                    $query->latest('id'); 
                    break;
            }
        } else {
             // Si no hay ordenamiento, mostrar por ID más reciente
             $query->latest('id'); 
        }

        // 5. PAGINACIÓN Y EJECUCIÓN
        // Usamos withQueryString() para mantener los filtros de búsqueda y categoría al cambiar de página.
        $productos = $query->paginate(8)->withQueryString();
        
        // 6. OBTENER CATEGORÍAS ÚNICAS (Necesario para los SELECTS y filtros)
        // Obtenemos las categorías de TODOS los productos activos para que la lista de filtros sea completa.
        $categorias_unicas = Product::where('estado', 1)
                                    ->where('stock', '>', 0)
                                    ->pluck('categoria')
                                    ->unique()
                                    ->sort()
                                    ->toArray();
        
        // 7. PASAR DATOS A LA VISTA
        return view('user.articulos', compact('productos', 'categorias_unicas'));
    }
    
    /**
     * Muestra la página de un producto individual. (Mantenida sin cambios)
     */
    public function singleProduct(Product $product)
    {
        // Verifica que el producto esté disponible para el público
        if ($product->estado != 1 || $product->stock <= 0) {
            abort(404);
        }
        
        return view('user.single-product', compact('product'));
    }
}