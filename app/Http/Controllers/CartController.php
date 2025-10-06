<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth; // Ya debe estar ahí
use Illuminate\Support\Facades\DB;   // Ya debe estar ahí
use Carbon\Carbon;                   // Ya debe estar ahí
use App\Models\Pago;

class CartController extends Controller
{
    
    /**
     * Agrega un producto (con talla y cantidad) al carrito de la sesión.
     * Devuelve JSON para la actualización AJAX del Offcanvas.
     */
    public function add(Request $request, Product $product)
    {
        // 1. Validar la solicitud
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'size' => 'nullable|string', 
        ]);
        
        $quantity = $request->input('quantity');
        $size = $request->input('size', 'N/A');
        $cart = session()->get('cart', []);
        
        // Clave única para el producto + talla
        $item_key = $product->id . '-' . $size;

        if (isset($cart[$item_key])) {
            // El producto ya está en el carrito, solo actualiza la cantidad
            $cart[$item_key]['quantity'] += $quantity;
        } else {
            // Agrega el nuevo producto al carrito
            $cart[$item_key] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image,
                "size" => $size,
            ];
        }

        // 2. Almacena el carrito actualizado en la sesión
        session()->put('cart', $cart);

        // 3. Obtener el nuevo resumen
        $cartSummary = self::getCartSummary();

        // 4. RENDERIZAR LA VISTA PARCIAL con los datos del carrito
        // Asegúrate de que 'partials.offcanvas_cart_content' existe en resources/views/partials/
        $cartHtml = view('partials.offcanvas_cart_content', compact('cartSummary'))->render();

        // 5. DEVOLVER RESPUESTA JSON para AJAX
        return response()->json([
            'status' => 'success',
            'message' => 'Producto agregado sin recarga.',
            'cart_count' => $cartSummary['count'],
            'cart_html' => $cartHtml // <-- ¡AQUÍ ESTÁ EL HTML PARA INYECTAR!
        ]);
    }
    
    /**
     * Muestra el contenido del carrito de la sesión.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('user.cart', compact('cart'));
    }

    /**
     * Remueve un item del carrito (basado en la clave única).
     */
    public function remove(Request $request, $item_key)
{
    // *** DECODIFICAR LA CLAVE ANTES DE USARLA EN LA SESIÓN ***
    $decoded_item_key = urldecode($item_key); 

    $cart = session()->get('cart');

    // Usamos la clave decodificada para la eliminación
    if(isset($cart[$decoded_item_key])) {
        unset($cart[$decoded_item_key]);
        session()->put('cart', $cart);
    }

    // Se redirige al carrito principal 
    return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito.');
}

    /**
     * Actualiza la cantidad de un producto específico en el carrito (Usado por el AJAX en cart.blade.php).
     * Nota: Cambiamos la redirección por una respuesta JSON para la fluidez en cart.blade.php.
     */
    public function update(Request $request)
{
    // Aseguramos que la cantidad sea al menos 1 para no dejar en 0
    $request->validate([
        'item_key' => 'required|string',
        'quantity' => 'required|integer|min:1',
    ]);

    $item_key = $request->input('item_key');
    $quantity = $request->input('quantity');
    $cart = session()->get('cart', []);

    if (isset($cart[$item_key])) {
        $cart[$item_key]['quantity'] = $quantity;
        
        // No verificamos $quantity == 0 porque la validación con 'min:1' lo evita.

        session()->put('cart', $cart);

        // Obtener el resumen actualizado para devolver al frontend
        $cartSummary = self::getCartSummary();
        
        // Calcular el subtotal de la línea actualizado
        $itemSubtotal = $cart[$item_key]['price'] * $cart[$item_key]['quantity'];

        // DEVOLVER JSON para que JavaScript pueda actualizar los totales
        return response()->json([
            'status' => 'success',
            // CLAVE: Devolvemos números puros (FLOAT) sin formato de moneda
            'total' => $cartSummary['total'], 
            'item_subtotal' => $itemSubtotal, 
            'item_key' => $item_key
        ]);
    }

    // Devolvemos 404 si el ítem ya no existe para que JS lo maneje.
    return response()->json(['status' => 'removed', 'message' => 'Producto no encontrado.'], 404);
}
    
    /**
     * Retorna un resumen del carrito (total de ítems y total en dinero).
     */
    public static function getCartSummary()
    {
        $cart = session()->get('cart', []);
        $itemCount = 0;
        $totalAmount = 0;

        foreach ($cart as $item) {
            $itemCount += $item['quantity'] ?? 0; 
            $totalAmount += ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
        }

        return [
            'count' => $itemCount,
            'total' => $totalAmount,
            'items' => $cart,
        ];
    }





    public function checkout(Request $request)
{
    $cart = session()->get('cart', []);
    $cartSummary = self::getCartSummary();
    $user = Auth::user();

    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'El carrito está vacío.');
    }

    try {
        DB::beginTransaction();

        $productos_json = json_encode($cart);

        // 2. Crear el registro en la tabla 'pagos'
        $pago = Pago::create([
            'id_user' => $user->id,
            'productos' => $productos_json,
            'total' => $cartSummary['total'],
            'fecha_hora' => Carbon::now()->format('Y-m-d H:i:s'),
            'estado' => 1, // <--- CAMBIO CLAVE: Establecido en 1 (Pendiente)
        ]);

        // 3. Limpiar el carrito de la sesión
        session()->forget('cart');

        DB::commit();

        // 4. Redirigir a la vista del ticket/confirmación, pasando el ID del pago/orden.
        return redirect()->route('checkout.receipt', $pago->id);

    } catch (\Exception $e) {
        DB::rollBack();
        // Log the error: \Log::error("Error processing checkout: " . $e->getMessage());
        return redirect()->route('cart.index')->with('error', 'Error al procesar el pago. Intente de nuevo.');
    }
}

/**
 * Muestra el ticket/comprobante de la orden.
 */
public function showReceipt($pago_id)
{
    // Cargar la orden de la base de datos
    $pago = Pago::findOrFail($pago_id);

    // Asegurar que el usuario solo vea sus propios pagos (si está logueado)
    if (Auth::check() && Auth::id() !== $pago->id_user) {
        abort(403);
    }
    
    // Deserializar la lista de productos para la vista
    $items = json_decode($pago->productos, true);
    
    // Asumimos que $pago contiene la relación al usuario (si no, cargar el usuario manualmente)
    $comprador = $pago->user; // Asumiendo que Pago tiene una relación 'user'

    return view('user.checkout', compact('pago', 'items', 'comprador'));
//---------------------------------------------------------------------------------
}
//---------------------------------------------------------------------------------
}