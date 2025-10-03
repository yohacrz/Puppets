<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use Illuminate\Http\Request;

class ShopController extends Controller 
{
    public function articulos(Request $request)
    {
        // 1. INICIALIZAR LA CONSULTA
        $query = Product::query();

        // 2. OBTENER VALORES ÚNICOS PARA EL FILTRO DEL SIDEBAR
        // Se hace al principio para asegurar que la lista de filtros sea completa.
        $allProducts = Product::all();
        
        // CORREGIDO: Usamos la columna 'categoria' de tu BD para ambas listas
        $categorias_unicas = $allProducts->pluck('categoria')->unique()->filter()->values()->toArray();
        $marcas_unicas = $allProducts->pluck('categoria')->unique()->filter()->values()->toArray();


        // 3. APLICAR FILTRO DE BÚSQUEDA (Columna 'name' y 'description')
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // 4. APLICAR FILTRO DE CATEGORÍA
        if ($request->filled('category')) {
            $category = $request->input('category');
            $query->where('categoria', $category); // Usando la columna 'categoria'
        }
        
        // 5. APLICAR FILTRO DE MARCA (Usando 'categoria' como marcador de posición)
        if ($request->filled('brand')) {
            $brand = $request->input('brand');
            $query->where('categoria', $brand); 
        }

        // 6. APLICAR FILTRO DE PRECIO (RANGO)
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $min = $request->input('min_price');
            $max = $request->input('max_price');
            $query->whereBetween('price', [(float)$min, (float)$max]);
        }
        
        // 7. APLICAR ORDENAMIENTO
        if ($request->filled('sort')) {
            $sort = $request->input('sort');
            
            switch ($sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'rating_asc':
                case 'rating_desc':
                    $query->orderBy('price', $sort === 'rating_desc' ? 'desc' : 'asc'); 
                    break;
                case 'latest':
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        // 8. PAGINACIÓN Y EJECUCIÓN
        $productos = $query->paginate(12)->withQueryString(); 
        
        // 9. RETURN FINAL: DEBE ENVIAR TODAS LAS VARIABLES
        return view('user.articulos', compact('productos', 'categorias_unicas', 'marcas_unicas'));
    }
}