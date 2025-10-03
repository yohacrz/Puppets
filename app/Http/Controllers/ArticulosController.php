<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Asegúrate de que tu modelo Product está en App\Models
use Illuminate\Support\Str; 

class ArticulosController extends Controller
{
    /**
     * Muestra la página de la tienda (/shop) con la cuadrícula de productos dinámica.
     */
    public function articulos()
    {
        // Obtiene productos que están activos (estado = 1) y tienen stock (> 0).
        $productos = Product::where('estado', 1)
                            ->where('stock', '>', 0)
                            ->paginate(9); // Pagina 9 resultados por página

        // Pasa la colección de productos a la vista 'articulos.blade.php'
       return view('user.articulos', compact('productos'));
    }

    /**
     * Muestra la página de un producto individual.
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