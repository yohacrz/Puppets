<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; 

class CartController extends Controller
{
    /**
     * Muestra la vista del carrito.
     */
    public function index()
    {
        // Pasa los productos del carrito a la vista para que puedan ser mostrados.
        // Aquí puedes usar la sesión para obtener los datos.
        $cartItems = session()->get('cart', []);
        return view('user.cart', compact('cartItems'));
    }

    /**
     * Agrega un producto al carrito.
     */
    public function add(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Producto agregado al carrito!');
    }
    
    // Puedes agregar más métodos aquí, como 'remove' para eliminar un producto
    // y 'update' para cambiar la cantidad.
}
