@extends('layouts.app')

@section('title', 'Carrito de Compras | REW Tienda')
@section('meta_description', 'Revisa tus licencias de plugins WordPress y asistentes de IA en tu carrito de compras de REW.')

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%);">
    <div class="container">
        <!-- Breadcrumb -->
        <div style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}">Inicio</a> &nbsp;/&nbsp;
            <a href="{{ route('tienda.index') }}">Tienda</a> &nbsp;/&nbsp;
            <span style="color: var(--text-dark); font-weight: 600;">Carrito de Compras</span>
        </div>

        <h1 style="font-size: 2.6rem; margin-bottom: 2rem;">Carrito de Compras</h1>

        @if(empty($cart))
            <div class="card text-center py-5" style="text-align: center; padding: 4rem 2rem;">
                <div style="font-size: 3.5rem; margin-bottom: 1rem;">🛒</div>
                <h2 style="font-size: 1.5rem; margin-bottom: 0.5rem;">Tu carrito está vacío</h2>
                <p style="color: var(--text-muted); margin-bottom: 1.5rem;">Explora nuestra tienda para adquirir licencias oficiales de Rich-E Chatbot y complementos.</p>
                <a href="{{ route('tienda.index') }}" class="btn btn-primary">Ir a la Tienda de Plugins</a>
            </div>
        @else
            <div style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 3rem; align-items: flex-start;">
                <!-- Cart Items Table -->
                <div class="card" style="padding: 1.5rem;">
                    <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                        @foreach($cart as $item)
                            <div style="display: flex; gap: 1.25rem; align-items: center; padding-bottom: 1.25rem; border-bottom: 1px solid var(--border-light);">
                                <img src="{{ $item['image'] ?? asset('images/logo.webp') }}" alt="{{ $item['name'] }}" style="width: 70px; height: 70px; object-fit: contain; background: var(--bg-alt); padding: 8px; border-radius: 10px;">
                                <div style="flex-grow: 1;">
                                    <h4 style="font-size: 1.05rem; margin-bottom: 4px;">{{ $item['name'] }}</h4>
                                    <div class="price-tag-dynamic" style="font-size: 0.95rem; font-weight: 700; color: var(--primary);" 
                                         data-usd="{{ $item['price_usd'] * $item['quantity'] }}" data-clp="{{ $item['price_clp'] * $item['quantity'] }}">
                                        ${{ number_format($item['price_usd'] * $item['quantity'], 0) }} USD
                                    </div>
                                    <div style="font-size: 0.8rem; color: var(--text-muted);">Cantidad: {{ $item['quantity'] }}</div>
                                </div>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                    <button type="submit" class="btn btn-sm btn-outline" title="Eliminar del carrito">✕ Eliminar</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="card" style="padding: 2rem; background: #ffffff; box-shadow: var(--shadow-lg);">
                    <h3 style="font-size: 1.3rem; margin-bottom: 1.25rem; padding-bottom: 0.75rem; border-bottom: 1px solid var(--border-light);">Resumen de la Orden</h3>

                    <div style="display: flex; justify-content: space-between; margin-bottom: 1rem; font-size: 1.05rem;">
                        <span>Total:</span>
                        <span class="price-tag-dynamic" style="font-size: 1.4rem; font-weight: 900; color: var(--primary);"
                              data-usd="{{ collect($cart)->sum(fn($i) => $i['price_usd'] * $i['quantity']) }}" 
                              data-clp="{{ collect($cart)->sum(fn($i) => $i['price_clp'] * $i['quantity']) }}">
                            ${{ number_format(collect($cart)->sum(fn($i) => $i['price_usd'] * $i['quantity']), 0) }} USD
                        </span>
                    </div>

                    <p style="font-size: 0.82rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 1.5rem;">
                        El proceso de compra te permitirá seleccionar tu método de pago preferido (Webpay, Transferencia o PayPal) y gestionar la activación instantánea.
                    </p>

                    <a href="{{ route('checkout.index') }}" class="btn btn-gold btn-lg" style="width: 100%; text-align: center; margin-bottom: 1rem;">
                        <span>Proceder al Checkout →</span>
                    </a>

                    <a href="{{ route('tienda.index') }}" class="btn btn-outline btn-sm" style="width: 100%; text-align: center;">
                        Seguir Comprando
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
