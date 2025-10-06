<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Articulo; // Ahora esta línea funcionará
use App\Http\Controllers\CartController; 

class HomeController extends Controller
{
    public function index()
    {
        // Obtiene los 4 productos más recientes de la tabla 'products'
        $latestProducts = Articulo::orderBy('created_at', 'desc')
                                    ->limit(4)
                                    ->get();

        // Obtiene el resumen del carrito (necesario para el header)
        $cartSummary = CartController::getCartSummary();


        // Pasa las variables a la vista 'user.index'
        return view('user.index', [
            'latestProducts' => $latestProducts, 
            'cartSummary' => $cartSummary,
        ]);
    }
}