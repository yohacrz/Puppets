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

        // 2. APLICAR FILTRO DE BÚSQUEDA (El único filtro restante)
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        }

        // 3. OBTENER Y AGRUPAR LOS PRODUCTOS FILTRADOS POR CATEGORÍA
        // Obtenemos todos los productos (sin paginación aquí, para agrupar por categoría)
        $productos_filtrados = $query->get();

        // Agrupamos la colección por la columna 'categoria' de tu BD.
        // Esto genera una colección donde la clave es el nombre de la categoría.
        $productos_agrupados = $productos_filtrados->groupBy('categoria');
        
        // El buscador lo mantendremos como una variable separada si se usa para el input
        $searchQuery = $request->input('search', '');

        // 4. Devolver la vista. Solo enviamos los productos agrupados y la query de búsqueda.
        return view('user.articulos', compact('productos_agrupados', 'searchQuery'));
    }
}