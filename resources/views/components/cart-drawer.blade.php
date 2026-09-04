<div class="cart-drawer-overlay">
    <div class="cart-drawer">
        <div class="cart-drawer-header" style="display: flex; align-items: center; justify-content: space-between; padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--border-light); background: #ffffff; flex-shrink: 0;">
            <div style="display: flex; align-items: center; gap: 8px;">
                <span style="font-size: 1.3rem;">🛒</span>
                <h3 style="font-size: 1.15rem; font-weight: 800; margin: 0; color: #0f172a;">Tu Carrito de Plugins</h3>
            </div>
            <button type="button" class="btn btn-sm btn-outline close-cart-drawer" style="padding: 6px 12px; font-size: 1.15rem; font-weight: 700; border-radius: 8px; cursor: pointer; line-height: 1; border: 1px solid #cbd5e1; background: #f8fafc; color: #334155; transition: all 0.2s ease;" title="Cerrar Carrito" aria-label="Cerrar Carrito">✕</button>
        </div>

        <div class="cart-drawer-items">
            @php 
                $cart = session('cart', []); 
                $cartCurrency = session('currency', (app()->getLocale() === 'es') ? 'CLP' : 'USD');
            @endphp
            @if(empty($cart))
                <div class="text-center py-5" style="text-align: center; padding: 3rem 1rem; color: #64748b;">
                    <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">🛒</div>
                    <p style="font-weight: 600;">Tu carrito está vacío</p>
                    <a href="{{ route('tienda.index') }}" class="btn btn-primary btn-sm close-cart-drawer" style="margin-top: 1rem;">Explorar Tienda</a>
                </div>
            @else
                @foreach($cart as $item)
                    <div class="cart-item">
                        <img src="{{ !empty($item['image']) ? (Str::startsWith($item['image'], 'http') || Str::startsWith($item['image'], 'data:') ? $item['image'] : asset(ltrim($item['image'], '/'))) : asset('images/logo.webp') }}" alt="{{ $item['name'] }}" class="cart-item-img">
                        <div class="cart-item-info">
                            <h5 class="cart-item-title">{{ $item['name'] }}</h5>
                            <div class="cart-item-price price-tag-dynamic" data-usd="{{ $item['price_usd'] * $item['quantity'] }}" data-clp="{{ $item['price_clp'] * $item['quantity'] }}">
                                @if($cartCurrency === 'CLP')
                                    ${{ number_format($item['price_clp'] * $item['quantity'], 0, ',', '.') }} CLP <span style="color: #64748b; font-weight: 500;">(x{{ $item['quantity'] }})</span>
                                @else
                                    ${{ number_format($item['price_usd'] * $item['quantity'], 0) }} USD <span style="color: #64748b; font-weight: 500;">(x{{ $item['quantity'] }})</span>
                                @endif
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline remove-from-cart-btn" data-id="{{ $item['id'] }}" title="Eliminar">✕</button>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="cart-drawer-footer">
            <div class="cart-drawer-total">
                <span>Total Estimado:</span>
                <span class="cart-drawer-total-amount price-tag-dynamic" 
                      data-usd="{{ collect($cart)->sum(fn($i) => $i['price_usd'] * $i['quantity']) }}" 
                      data-clp="{{ collect($cart)->sum(fn($i) => $i['price_clp'] * $i['quantity']) }}">
                    @if($cartCurrency === 'CLP')
                        ${{ number_format(collect($cart)->sum(fn($i) => $i['price_clp'] * $i['quantity']), 0, ',', '.') }} CLP
                    @else
                        ${{ number_format(collect($cart)->sum(fn($i) => $i['price_usd'] * $i['quantity']), 0) }} USD
                    @endif
                </span>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem;">
                <a href="{{ route('cart.index') }}" class="btn btn-outline" style="text-align: center;">Ver Carrito</a>
                <a href="{{ route('checkout.index') }}" class="btn btn-primary" style="text-align: center;">Comprar / Cotizar</a>
            </div>
        </div>
    </div>
</div>
