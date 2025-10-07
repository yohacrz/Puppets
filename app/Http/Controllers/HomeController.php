<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Articulo; // Asegúrate de que este es tu modelo de productos
use App\Http\Controllers\CartController; 

class HomeController extends Controller
{
    public function index()
    {
        // 1. Obtiene los 4 productos más recientes de la tabla 'products'
        // Esta línea define la variable $latestProducts que tu vista necesita
        $latestProducts = Articulo::orderBy('created_at', 'desc')
                                    ->limit(4)
                                    ->get();

        // 2. Obtiene el resumen del carrito (necesario para el header)
        $cartSummary = CartController::getCartSummary();


        // 3. Pasa las variables a la vista 'user.index'.
        // Al pasarlas en el array (el segundo argumento de view()), 
        // estas variables SOLO existen dentro de 'user.index.blade.php'.
        return view('user.index', [
            'latestProducts' => $latestProducts, 
            'cartSummary' => $cartSummary,
        ]);
    }
}