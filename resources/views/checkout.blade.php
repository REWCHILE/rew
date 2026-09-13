@extends('layouts.app')

@section('title', '💳 Finalizar Compra Segura | REW Tienda')
@section('meta_description', 'Pago 100% seguro con Webpay Plus o Mercado Pago. Activación instantánea de licencias y soporte técnico de ingenieros REW.')

@section('og_title', '💳 Finalizar Compra Segura | REW Tienda de Plugins')
@section('og_description', 'Pago seguro con Webpay Plus y Mercado Pago. Activación inmediata de licencias para WordPress y WooCommerce.')
@section('og_image', asset('images/rew_og_card.png'))

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

                    @php
                        $currentCur = $currency ?? session('currency', (app()->getLocale() === 'es' ? 'CLP' : 'USD'));
                    @endphp

                    <h3 style="font-size: 1.3rem; margin-bottom: 1.25rem; padding-bottom: 0.75rem; border-bottom: 1px solid var(--border-light);">
                        2. Método de Pago
                    </h3>

                    <div style="margin-bottom: 1.5rem;">
                        <label class="selected" style="display: flex; align-items: flex-start; gap: 1rem; width: 100%; padding: 1.25rem; border: 2px solid #10b981; background: #f0fdf4; border-radius: var(--radius-md); cursor: pointer; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.08); transition: all 0.2s ease;">
                            <div style="margin-top: 2px; position: relative; display: flex; align-items: center; justify-content: center; width: 22px; height: 22px; border-radius: 50%; border: 2px solid #059669; background: #ffffff; flex-shrink: 0;">
                                <input type="radio" name="payment_method" value="Transferencia Bancaria Directa (Chile)" checked style="position: absolute; opacity: 0; width: 100%; height: 100%; cursor: pointer;">
                                <div style="width: 12px; height: 12px; border-radius: 50%; background: #059669;"></div>
                            </div>
                            <div style="flex: 1;">
                                <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 4px;">
                                    <span style="font-weight: 800; font-size: 1.05rem; color: #0f172a;">
                                        🏦 Transferencia Bancaria (Chile)
                                    </span>
                                    <span style="background: #10b981; color: #ffffff; font-size: 0.72rem; font-weight: 800; padding: 2px 8px; border-radius: 4px; text-transform: uppercase; letter-spacing: 0.05em;">
                                        Método Activo
                                    </span>
                                </div>
                                <p style="font-size: 0.88rem; color: #475569; margin: 0 0 6px 0; line-height: 1.4;">
                                    Envío inmediato de datos bancarios para transferencia electrónica o depósito en CLP ($).
                                </p>
                                <div style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.8rem; color: #047857; font-weight: 700; background: rgba(16, 185, 129, 0.15); padding: 4px 10px; border-radius: 6px;">
                                    <span>✓</span> Activación rápida por WhatsApp (+56987261127) y comprobante al correo
                                </div>
                            </div>
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
                                        @if($currentCur === 'CLP')
                                            ${{ number_format($item['price_clp'] * $item['quantity'], 0, ',', '.') }} CLP
                                        @else
                                            ${{ number_format($item['price_usd'] * $item['quantity'], 0) }} USD
                                        @endif
                                    </span>
                                </div>
                            @endforeach
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: baseline; padding-top: 1rem; border-top: 2px solid var(--border-light); margin-bottom: 1.5rem;">
                            <span style="font-weight: 800; font-size: 1.1rem;">Total:</span>
                            <span class="price-tag-dynamic" style="font-size: 1.6rem; font-weight: 900; color: var(--primary);"
                                  data-usd="{{ collect($cart)->sum(fn($i) => $i['price_usd'] * $i['quantity']) }}" 
                                  data-clp="{{ collect($cart)->sum(fn($i) => $i['price_clp'] * $i['quantity']) }}">
                                @if($currentCur === 'CLP')
                                    ${{ number_format(collect($cart)->sum(fn($i) => $i['price_clp'] * $i['quantity']), 0, ',', '.') }} CLP
                                @else
                                    ${{ number_format(collect($cart)->sum(fn($i) => $i['price_usd'] * $i['quantity']), 0) }} USD
                                @endif
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
