{{-- NOTA: ESTA VISTA SOLO DEBE SER RENDERIZADA POR EL CartController --}}
<div class="order-md-last">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-primary">Your Cart</span>
        <span class="badge bg-primary rounded-circle pt-2">{{ $cartSummary['count'] }}</span>
    </h4>

    {{-- LISTA DINÁMICA DE PRODUCTOS --}}
    <ul class="list-group mb-3">
        @forelse ($cartSummary['items'] as $item)
            <li class="list-group-item d-flex justify-content-between lh-sm align-items-center">
                
                <div class="d-flex w-100">
                    {{-- 1. IMAGEN (Mini-Thumbnail) --}}
                    <div class="flex-shrink-0 me-3" style="width: 50px; height: 50px;">
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid rounded-1" style="max-height: 100%;">
                    </div>

                    {{-- 2. NOMBRE y CANTIDAD --}}
                    <div class="flex-grow-1">
                        <h6 class="my-0">{{ $item['name'] }}</h6>
                        <small class="text-body-secondary">
                            Qty: {{ $item['quantity'] ?? 0 }} 
                            @if (isset($item['size']) && $item['size'] != 'N/A')
                                | Size: {{ $item['size'] }}
                            @endif
                        </small>
                    </div>
                </div>
                
                {{-- 3. PRECIO TOTAL DE LA LÍNEA --}}
                <span class="text-body-secondary">${{ number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 0), 2) }}</span>
            </li>
        @empty
            <li class="list-group-item d-flex justify-content-between">
                <span class="text-muted">No items in cart.</span>
            </li>
        @endforelse
        
        {{-- TOTAL DEL CARRITO --}}
        <li class="list-group-item d-flex justify-content-between pt-3">
            <span class="fw-bold">Total (USD)</span>
            <strong>${{ number_format($cartSummary['total'], 2) }}</strong>
        </li>
    </ul>

    {{-- BOTÓN DE CHECKOUT: Redirige a la vista completa del carrito --}}
    <a href="{{ route('cart.index') }}"
        class="w-100 btn btn-primary btn-lg {{ $cartSummary['count'] == 0 ? 'disabled' : '' }}"
        type="button">
        Continue to checkout
    </a>
</div>