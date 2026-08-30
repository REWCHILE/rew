@extends('layouts.app')

@section('title', 'Finalizar Compra / Checkout | REW Tienda')
@section('meta_description', 'Completa tus datos para activar tus licencias de plugins WordPress y asistentes de IA.')

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%);">
    <div class="container">
        <!-- Breadcrumb -->
        <div style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}">Inicio</a> &nbsp;/&nbsp;
            <a href="{{ route('tienda.index') }}">Tienda</a> &nbsp;/&nbsp;
            <a href="{{ route('cart.index') }}">Carrito</a> &nbsp;/&nbsp;
            <span style="color: var(--text-dark); font-weight: 600;">Checkout</span>
        </div>

        <h1 style="font-size: 2.6rem; margin-bottom: 2rem;">Finalizar Compra</h1>

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="grid-2col-sidebar">
                <!-- Billing Details Form -->
                <div class="card" style="padding: clamp(1.25rem, 3vw, 2.5rem);">
                    <h3 style="font-size: 1.3rem; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 1px solid var(--border-light);">
                        1. Datos del Comprador y Licencia
                    </h3>

                    <div class="grid-form-2col" style="margin-bottom: 1rem;">
                        <div>
                            <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 4px;">Nombre Completo *</label>
                            <input type="text" name="name" required placeholder="Tu nombre" 
                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-size: 0.95rem; outline: none;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 4px;">Correo Electrónico (para entrega) *</label>
                            <input type="email" name="email" required placeholder="correo@empresa.cl" 
                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-size: 0.95rem; outline: none;">
                        </div>
                    </div>

                    <div class="grid-form-2col" style="margin-bottom: 1.5rem;">
                        <div>
                            <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 4px;">Teléfono / WhatsApp *</label>
                            <input type="tel" name="phone" required placeholder="+56 9 8726 1127" 
                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-size: 0.95rem; outline: none;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 4px;">Empresa / Sitio Web (Opcional)</label>
                            <input type="text" name="company" placeholder="https://misitio.cl" 
                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-size: 0.95rem; outline: none;">
                        </div>
                    </div>

                    <h3 style="font-size: 1.3rem; margin-bottom: 1.25rem; padding-bottom: 0.75rem; border-bottom: 1px solid var(--border-light);">
                        2. Método de Pago Preferido
                    </h3>

                    <div style="display: flex; flex-direction: column; gap: 1rem; margin-bottom: 1.5rem;">
                        <label class="option-card selected" style="width: 100%;">
                            <input type="radio" name="payment_method" value="Webpay Plus / Tarjeta de Débito o Crédito (CLP)" checked>
                            <span class="option-title">🇨🇱 Webpay Plus / Tarjetas Chilenas (CLP $)</span>
                            <span style="font-size: 0.82rem; color: var(--text-muted);">Pago seguro a través de Transbank Webpay Plus.</span>
                        </label>

                        <label class="option-card" style="width: 100%;">
                            <input type="radio" name="payment_method" value="Transferencia Bancaria Directa (Chile)">
                            <span class="option-title">🏦 Transferencia Bancaria (Chile)</span>
                            <span style="font-size: 0.82rem; color: var(--text-muted);">Envío inmediato de datos bancarios para depósito o transferencia.</span>
                        </label>

                        <label class="option-card" style="width: 100%;">
                            <input type="radio" name="payment_method" value="PayPal / Tarjeta Internacional (USD)">
                            <span class="option-title">🌎 PayPal / Tarjeta Internacional (USD $)</span>
                            <span style="font-size: 0.82rem; color: var(--text-muted);">Ideal para clientes internacionales en dólares estadounidenses.</span>
                        </label>
                    </div>

                    <div>
                        <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 4px;">Notas o Requerimientos Especiales (Opcional)</label>
                        <textarea name="notes" rows="2" placeholder="Dominio donde instalarás el plugin o dudas de configuración..." 
                                  style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-size: 0.95rem; outline: none; font-family: inherit;"></textarea>
                    </div>
                </div>

                <!-- Order Sidebar -->
                <div style="position: sticky; top: 110px;">
                    <div class="card" style="padding: 2rem; background: #ffffff; box-shadow: var(--shadow-xl);">
                        <h3 style="font-size: 1.25rem; margin-bottom: 1.25rem; padding-bottom: 0.75rem; border-bottom: 1px solid var(--border-light);">
                            Tu Pedido
                        </h3>

                        <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-bottom: 1.5rem;">
                            @foreach($cart as $item)
                                <div style="display: flex; justify-content: space-between; font-size: 0.9rem;">
                                    <span>{{ $item['name'] }} (x{{ $item['quantity'] }})</span>
                                    <span class="price-tag-dynamic" data-usd="{{ $item['price_usd'] * $item['quantity'] }}" data-clp="{{ $item['price_clp'] * $item['quantity'] }}" style="font-weight: 700;">
                                        ${{ number_format($item['price_usd'] * $item['quantity'], 0) }} USD
                                    </span>
                                </div>
                            @endforeach
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: baseline; padding-top: 1rem; border-top: 2px solid var(--border-light); margin-bottom: 1.5rem;">
                            <span style="font-weight: 800; font-size: 1.1rem;">Total:</span>
                            <span class="price-tag-dynamic" style="font-size: 1.6rem; font-weight: 900; color: var(--primary);"
                                  data-usd="{{ collect($cart)->sum(fn($i) => $i['price_usd'] * $i['quantity']) }}" 
                                  data-clp="{{ collect($cart)->sum(fn($i) => $i['price_clp'] * $i['quantity']) }}">
                                ${{ number_format(collect($cart)->sum(fn($i) => $i['price_usd'] * $i['quantity']), 0) }} USD
                            </span>
                        </div>

                        <button type="submit" class="btn btn-gold btn-lg" style="width: 100%; font-size: 1.1rem; margin-bottom: 1rem;">
                            <span>Confirmar y Enviar Pedido →</span>
                        </button>

                        <div style="font-size: 0.78rem; color: var(--text-muted); text-align: center; line-height: 1.4;">
                            Al confirmar, serás redirigido para coordinar el pago de forma segura por WhatsApp (+56987261127) y recibirás tu comprobante en tu correo.
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
