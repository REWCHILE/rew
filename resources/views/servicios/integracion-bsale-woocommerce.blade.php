@extends('layouts.app')

@section('title', '🔄 Sincroniza Bsale con WooCommerce en Tiempo Real: Stock, Precios y Boletas SII Automáticas | REW')
@section('meta_description', '⚙️ Elimina el trabajo manual y los errores de stock. Facturación electrónica DTE automática y sincronización bidireccional entre Bsale y tu tienda online.')

@section('og_type', 'service')
@section('og_title', '🔄 Integración Bsale con WooCommerce en Chile: Stock y Facturas SII Automáticas | REW')
@section('og_description', '⚙️ Sincroniza inventario, precios y emisión de boletas/facturas electrónicas automáticas sin errores entre Bsale y WooCommerce.')
@section('og_image', asset('images/services/desarrollo_web_tecnologias.webp'))

@section('content')
<!-- Hero Section -->
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%); padding-top: 5rem; padding-bottom: 4rem;">
    <div class="container">
        <!-- Breadcrumb -->
        <div style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}">Inicio</a> &nbsp;/&nbsp;
            <a href="{{ route('servicios.index') }}">Servicios</a> &nbsp;/&nbsp;
            <span style="color: var(--text-dark); font-weight: 600;">Integración Bsale WooCommerce</span>
        </div>

        <div class="service-hero-grid">
            <div>
                <span class="badge badge-primary" style="margin-bottom: 1rem;">Conectividad E-Commerce & ERP Chile</span>
                <h1 style="font-size: 3.2rem; margin-bottom: 1.25rem; line-height: 1.15; color: var(--text-dark);">
                    Integración <span class="gradient-text">Bsale con WooCommerce</span> en Tiempo Real 🛒⚡
                </h1>
                <p style="font-size: 1.2rem; color: var(--text-body); line-height: 1.65; margin-bottom: 2rem;">
                    Automatiza tus ventas, inventario y facturación electrónica. Conectamos tu tienda <strong>WooCommerce</strong> con <strong>Bsale</strong> mediante API REST oficial para que el stock de tus sucursales físicas y web esté 100% sincronizado, emitiendo boletas y facturas DTE automáticamente.
                </p>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 2rem;">
                    <a href="#comprar-plugin" class="btn btn-primary btn-lg" style="background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%); box-shadow: 0 10px 25px -5px rgba(2, 132, 199, 0.4);">
                        <span>🛒 Adquirir Plugin Lifetime ($350.000 CLP)</span>
                    </a>
                    <a href="{{ route('contacto') }}" class="btn btn-outline btn-lg">
                        <span>📋 Cotizar Integración</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, me interesa comprar o cotizar la integración del Plugin Bsale con WooCommerce.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 Hablar por WhatsApp</span>
                    </a>
                </div>
                <div style="display: flex; gap: 1.5rem; flex-wrap: wrap; font-size: 0.9rem; color: var(--text-muted);">
                    <div>✓ Licencia Vitalicia (Pago Único)</div>
                    <div>✓ Boleta y Factura DTE Automática SII</div>
                    <div>✓ Sin sobreventas por stock desfasado</div>
                </div>
            </div>

            <div class="card" style="padding: 2.5rem; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #ffffff; border-radius: var(--radius-xl); box-shadow: var(--shadow-2xl);">
                <div style="font-size: 0.85rem; font-weight: 800; color: var(--accent-gold); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.75rem;">
                    Flujo de Automatización
                </div>
                <h3 style="color: #ffffff; font-size: 1.5rem; margin-bottom: 1.5rem; line-height: 1.3;">
                    ¿Cómo funciona la sincronización?
                </h3>
                <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                    <div style="display: flex; gap: 12px; align-items: flex-start;">
                        <span style="background: rgba(79, 70, 229, 0.3); border: 1px solid rgba(79, 70, 229, 0.5); width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 900; color: #818cf8; flex-shrink: 0;">1</span>
                        <div>
                            <strong style="color: #ffffff; font-size: 1rem; display: block;">Venta en WooCommerce</strong>
                            <span style="color: #94a3b8; font-size: 0.88rem;">El cliente paga con Webpay Plus o Mercado Pago en tu web.</span>
                        </div>
                    </div>
                    <div style="display: flex; gap: 12px; align-items: flex-start;">
                        <span style="background: rgba(16, 185, 129, 0.3); border: 1px solid rgba(16, 185, 129, 0.5); width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 900; color: #34d399; flex-shrink: 0;">2</span>
                        <div>
                            <strong style="color: #ffffff; font-size: 1rem; display: block;">Envío de Pedido a Bsale</strong>
                            <span style="color: #94a3b8; font-size: 0.88rem;">El webhook transmite los productos, cantidades y datos de facturación al instante.</span>
                        </div>
                    </div>
                    <div style="display: flex; gap: 12px; align-items: flex-start;">
                        <span style="background: rgba(245, 158, 11, 0.3); border: 1px solid rgba(245, 158, 11, 0.5); width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 900; color: #fbbf24; flex-shrink: 0;">3</span>
                        <div>
                            <strong style="color: #ffffff; font-size: 1rem; display: block;">Descuento de Stock & DTE</strong>
                            <span style="color: #94a3b8; font-size: 0.88rem;">Bsale descuenta el inventario de la sucursal asignada y emite el DTE ante el SII.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ventajas Clave -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div style="text-align: center; max-width: 750px; margin: 0 auto 3.5rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Cero Errores Manuales</span>
            <h2 style="font-size: 2.4rem; color: var(--text-dark); margin-bottom: 1rem;">Beneficios de Conectar Bsale con REW</h2>
            <p style="color: var(--text-body); font-size: 1.1rem;">Desarrollamos soluciones de alta ingeniería que respetan tus listas de precios, bodegas y reglas de negocio sin depender de plugins de terceros lentos.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
            <div class="card" style="padding: 2rem;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">📦</div>
                <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem;">Sincronización de Stock Multibodega</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                    Elige qué sucursal o bodega de Bsale alimenta tu tienda online. Si vendes en tu local físico a través del POS, el stock web se actualiza al instante para evitar sobreventas.
                </p>
            </div>

            <div class="card" style="padding: 2rem;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🧾</div>
                <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem;">Emisión Automática de Boleta y Factura DTE</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                    Generación de Documentos Tributarios Electrónicos válidos ante el SII en Chile, adjuntando el PDF de la boleta o factura directamente en el correo de confirmación de WooCommerce.
                </p>
            </div>

            <div class="card" style="padding: 2rem; border-top: 3px solid #0284c7;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🎨</div>
                <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem;">Productos Variables en Automático</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                    Soporte nativo y automático para todas las variaciones (tallas, colores, atributos y SKUs hijos). A diferencia de otras integraciones del mercado que fallan o cobran extra, REW lo incluye al 100%.
                </p>
            </div>

            <div class="card" style="padding: 2rem; border-top: 3px solid #f59e0b;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🔗</div>
                <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem;">Integración con Otros Sistemas & ERPs</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                    ¿Tienes tu catálogo o contabilidad en otros sistemas (Softland, Odoo, SAP, Defontana, CRM o bases de datos propias)? Desarrollamos conectores a medida para centralizar toda tu operación.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Compra Directa del Plugin (Antes de Preguntas Frecuentes) -->
@php
    $plugin = $pluginProduct ?? \App\Models\Product::where('slug', 'plugin-integracion-bsale-woocommerce')->first();
    $productId = $plugin->id ?? 9;
    $priceClp = $plugin->price_clp ?? 350000;
    $priceUsd = $plugin->price_usd ?? 380;
    $originalClp = $plugin->original_price_clp ?? 450000;
    $originalUsd = $plugin->original_price_usd ?? 480;
    $waBuyMsg = "¡Hola Álvaro! Quiero comprar la licencia vitalicia del Plugin Bsale WooCommerce Sync Pro ($350.000 CLP / Lifetime). ¿Cuáles son los datos de transferencia para coordinar la instalación?";

    $pluginImgPath = public_path('images/products/plugin_bsale_woocommerce.webp');
    $basePathImg = base_path('public/images/products/plugin_bsale_woocommerce.webp');
    $imgSrc = asset('images/products/plugin_bsale_woocommerce.webp');
    if (file_exists($pluginImgPath)) {
        $imgSrc = 'data:image/webp;base64,' . base64_encode(file_get_contents($pluginImgPath));
    } elseif (file_exists($basePathImg)) {
        $imgSrc = 'data:image/webp;base64,' . base64_encode(file_get_contents($basePathImg));
    }
@endphp

<section id="comprar-plugin" class="section" style="background: linear-gradient(180deg, #070d19 0%, #0b1329 100%); padding-top: 5rem; padding-bottom: 5.5rem; color: #ffffff;">
    <div class="container">
        <div style="text-align: center; max-width: 820px; margin: 0 auto 3rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem; text-transform: uppercase; letter-spacing: 1px;">
                ⚡ Software Oficial REW • Licencia Vitalicia
            </span>
            <h2 style="font-size: clamp(2rem, 4vw, 2.7rem); color: #ffffff; margin-bottom: 1rem; line-height: 1.2;">
                Adquiere el <span class="gradient-text">Plugin Bsale WooCommerce Sync Pro</span>
            </h2>
            <p style="color: #94a3b8; font-size: 1.15rem; line-height: 1.6;">
                La solución definitiva para automatizar stock multibodega, productos variables y facturación DTE electrónica sin intermediarios. Un solo pago de por vida, sin comisiones por boleta ni mensualidades.
            </p>
        </div>

        <div class="card" style="background: linear-gradient(145deg, #090e17 0%, #0f172a 60%, #172554 100%); border: 1px solid rgba(56, 189, 248, 0.25); border-radius: var(--radius-xl); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7); padding: clamp(1.75rem, 4vw, 3rem); color: #ffffff;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: clamp(2rem, 4vw, 3.5rem); align-items: center;">
                
                <!-- Columna Izquierda: Imagen Mockup 3D y Sellos de Confianza -->
                <div style="text-align: center;">
                    <div style="position: relative; display: inline-block; width: 100%; max-width: 440px;">
                        <span class="badge badge-gold" style="position: absolute; top: 15px; left: 15px; z-index: 2; font-weight: 800; box-shadow: 0 4px 15px rgba(0,0,0,0.5);">
                            ⭐ PAGO ÚNICO • LIFETIME
                        </span>
                        <img src="{{ $imgSrc }}" 
                             alt="Plugin Bsale WooCommerce Sync Pro REW" 
                             style="width: 100%; height: auto; border-radius: var(--radius-lg); box-shadow: 0 20px 40px -15px rgba(2, 132, 199, 0.4); border: 1px solid rgba(56, 189, 248, 0.3); transition: transform 0.3s ease; display: block;"
                             onmouseover="this.style.transform='scale(1.02)'"
                             onmouseout="this.style.transform='scale(1)'">
                    </div>

                    <div style="display: flex; justify-content: center; gap: 0.75rem; flex-wrap: wrap; margin-top: 1.5rem; font-size: 0.82rem; color: #94a3b8;">
                        <span style="background: rgba(255,255,255,0.06); padding: 4px 12px; border-radius: 9999px; border: 1px solid rgba(255,255,255,0.1);">✓ WordPress 5.8+ a 6.x</span>
                        <span style="background: rgba(255,255,255,0.06); padding: 4px 12px; border-radius: 9999px; border: 1px solid rgba(255,255,255,0.1);">✓ WooCommerce 6.x a 9.x</span>
                        <span style="background: rgba(255,255,255,0.06); padding: 4px 12px; border-radius: 9999px; border: 1px solid rgba(255,255,255,0.1);">✓ PHP 7.4 a 8.3</span>
                        <span style="background: rgba(255,255,255,0.06); padding: 4px 12px; border-radius: 9999px; border: 1px solid rgba(255,255,255,0.1);">✓ API REST Oficial Bsale</span>
                    </div>
                </div>

                <!-- Columna Derecha: Detalles del Producto, Precios y Formulario de Compra -->
                <div>
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem; flex-wrap: wrap;">
                        <span class="badge badge-primary" style="background: rgba(14, 165, 233, 0.2); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.3);">
                            Plugin WordPress & WooCommerce
                        </span>
                        <span style="color: #fbbf24; font-size: 0.9rem; font-weight: 700;">
                            ⭐⭐⭐⭐⭐ 5.0 (Clientes Satisfechos)
                        </span>
                    </div>

                    <h3 style="font-size: clamp(1.8rem, 3.5vw, 2.3rem); color: #ffffff; margin-bottom: 1rem; line-height: 1.2;">
                        Plugin Bsale WooCommerce Sync Pro
                    </h3>

                    <!-- Bloque de Precios -->
                    <div style="background: rgba(15, 23, 42, 0.7); border: 1px solid rgba(56, 189, 248, 0.2); border-radius: var(--radius-md); padding: 1.25rem 1.5rem; margin-bottom: 1.75rem;">
                        <div style="display: flex; align-items: baseline; gap: 1rem; flex-wrap: wrap;">
                            <span class="price-current price-tag-dynamic" 
                                  data-usd="{{ $priceUsd }}" 
                                  data-clp="{{ $priceClp }}" 
                                  style="font-size: clamp(2.2rem, 4vw, 2.8rem); font-weight: 900; color: #38bdf8; letter-spacing: -0.5px;">
                                ${{ number_format($priceClp, 0, ',', '.') }} CLP
                            </span>
                            <span class="price-original price-tag-dynamic" 
                                  data-usd="{{ $originalUsd }}" 
                                  data-clp="{{ $originalClp }}" 
                                  style="font-size: 1.35rem; color: #64748b; text-decoration: line-through;">
                                ${{ number_format($originalClp, 0, ',', '.') }} CLP
                            </span>
                            <span class="badge badge-gold" style="font-size: 0.82rem; font-weight: 800;">
                                AHORRA $100.000 CLP
                            </span>
                        </div>
                        <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cbd5e1; display: flex; align-items: center; gap: 8px;">
                            <span style="color: #34d399; font-weight: 700;">✓ Pago Único de por Vida (Lifetime)</span> • Sin suscripciones mensuales ni costos por documento.
                        </div>
                    </div>

                    <!-- Lista de Beneficios Exclusivos -->
                    <div style="display: flex; flex-direction: column; gap: 0.85rem; margin-bottom: 2rem; font-size: 0.95rem; color: #e2e8f0;">
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <span style="color: #38bdf8; font-weight: 900; font-size: 1.1rem;">✓</span>
                            <div><strong>Sincronización Multibodega en Tiempo Real:</strong> Descuenta automáticamente stock de la sucursal que elijas evitando sobreventas físicas y web.</div>
                        </div>
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <span style="color: #38bdf8; font-weight: 900; font-size: 1.1rem;">✓</span>
                            <div><strong>Emisión Automática de Boletas y Facturas SII:</strong> DTE electrónico oficial generado al pagar y adjuntado en PDF al correo del cliente.</div>
                        </div>
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <span style="color: #38bdf8; font-weight: 900; font-size: 1.1rem;">✓</span>
                            <div><strong>Productos Variables en Automático:</strong> Soporte nativo para tallas, colores, atributos y SKUs hijos sin plugins adicionales ni fallos.</div>
                        </div>
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <span style="color: #38bdf8; font-weight: 900; font-size: 1.1rem;">✓</span>
                            <div><strong>Integración con Otros Sistemas & ERPs:</strong> Conectividad abierta con SAP, Softland, Odoo, Defontana o bases de datos a medida.</div>
                        </div>
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <span style="color: #38bdf8; font-weight: 900; font-size: 1.1rem;">✓</span>
                            <div><strong>Arquitectura Asíncrona Ultra Rápida:</strong> Sin demoras en el checkout ni consumo excesivo de servidor gracias a workers en segundo plano.</div>
                        </div>
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <span style="color: #38bdf8; font-weight: 900; font-size: 1.1rem;">✓</span>
                            <div><strong>Instalación Asistida con Álvaro Valenzuela:</strong> Ingeniero Informático a cargo para homologar catálogos y validar DTEs en vivo.</div>
                        </div>
                    </div>

                    <!-- Formulario de Compra Online + Botón WhatsApp -->
                    <div style="display: flex; flex-direction: column; gap: 1rem; background: rgba(0,0,0,0.25); padding: 1.5rem; border-radius: var(--radius-lg); border: 1px solid rgba(255,255,255,0.08);">
                        <form action="{{ route('cart.add') }}" method="POST" class="ajax-add-to-cart-form" style="margin: 0;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $productId }}">
                            <div style="display: flex; gap: 0.75rem; align-items: stretch; flex-wrap: wrap;">
                                <div style="width: 75px;">
                                    <input type="number" name="quantity" value="1" min="1" max="10" 
                                           style="width: 100%; height: 100%; padding: 0.75rem; border: 1px solid rgba(56,189,248,0.4); border-radius: var(--radius-sm); font-size: 1.1rem; text-align: center; background: #0f172a; color: #ffffff; font-weight: 700;">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg" style="flex: 1; min-width: 220px; background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%); font-size: 1.05rem; padding: 0.85rem 1.5rem; justify-content: center; box-shadow: 0 10px 20px -5px rgba(2, 132, 199, 0.5);">
                                    <span>🛒 Añadir al Carrito y Comprar</span>
                                </button>
                            </div>
                        </form>

                        <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode($waBuyMsg) }}" 
                           target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg" style="width: 100%; justify-content: center; font-size: 1rem;">
                            <span>💬 Comprar Directo por WhatsApp (+56 9 8726 1127)</span>
                        </a>

                        @if($plugin)
                        <div style="text-align: center; margin-top: 0.25rem;">
                            <a href="{{ route('tienda.show', $plugin->slug) }}" style="font-size: 0.88rem; color: #38bdf8; text-decoration: underline;">
                                Ver ficha técnica completa en la Tienda Oficial REW →
                            </a>
                        </div>
                        @endif
                    </div>

                    <!-- Garantías y Soporte Directo -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 1rem; margin-top: 1.5rem; padding-top: 1.25rem; border-top: 1px solid rgba(255,255,255,0.08); font-size: 0.82rem; color: #94a3b8; text-align: center;">
                        <div>🔒 <strong>Pago 100% Seguro</strong><br>Webpay Plus / Transferencia</div>
                        <div>📄 <strong>Factura DTE</strong><br>Emitimos factura para empresas</div>
                        <div>⚡ <strong>Garantía REW</strong><br>Soporte directo con el fundador</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- FAQ Accordion -->
<section class="section" style="background: var(--bg-alt);">
    <div class="container">
        <div style="text-align: center; max-width: 750px; margin: 0 auto 3rem;">
            <h2 style="font-size: 2.2rem; color: var(--text-dark); margin-bottom: 0.75rem;">Preguntas Frecuentes sobre la Integración Bsale</h2>
            <p style="color: var(--text-muted);">Respuestas técnicas y comerciales a las dudas más comunes.</p>
        </div>

        <div style="max-width: 850px; margin: 0 auto; display: flex; flex-direction: column; gap: 1.25rem;">
            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">¿Qué necesito para integrar Bsale con mi WooCommerce?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    Solo necesitas un plan activo de Bsale que tenga habilitada la API REST (token de acceso) y tu tienda WooCommerce corriendo en WordPress 6.x con PHP 8+. Nosotros nos encargamos de toda la configuración técnica.
                </p>
            </div>

            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">¿Soporta productos variables (tallas, colores, atributos) automáticamente?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    <strong>Sí, 100% en automático.</strong> A diferencia de la mayoría de soluciones del mercado que solo soportan productos simples o cobran suscripciones caras por gestionar atributos, nuestro plugin maneja productos variables completos con sus variaciones, SKUs hijos, precios normales, ofertas y stock por bodega sin costos adicionales.
                </p>
            </div>

            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">¿Podemos integrar Bsale y WooCommerce con otros sistemas o ERPs de la empresa?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    <strong>Totalmente.</strong> Como agencia y software factory experta en desarrollo en Chile, creamos conectores, webhooks y APIs a medida si necesitas comunicar Bsale o tu tienda con otros ERPs (como Softland, Odoo, SAP, Defontana), CRMs o bases de datos propietarias.
                </p>
            </div>

            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">¿Cuánto tarda la puesta en marcha?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    La integración estándar toma entre 3 y 5 días hábiles, incluyendo pruebas en entorno sandbox, homologación de SKUs y validación de emisión de DTEs reales ante el SII.
                </p>
            </div>

            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">¿Tiene costos mensuales o pagos por cada boleta emitida?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    <strong>Cero costos mensuales.</strong> Es una licencia vitalicia (Lifetime) de pago único de $350.000 CLP. Pagas una sola vez y usas el plugin sin mensualidades ni cobros por documento emitido.
                </p>
            </div>

            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">¿Afecta la velocidad de carga de mi tienda web?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    No. Nuestras integraciones se procesan de forma asíncrona mediante colas de trabajo (background workers), lo que garantiza que tu cliente experimente un checkout ultra rápido sin tiempos de espera.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Direct CTA -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div class="grid-2col-cta" style="align-items: center;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 1rem;">Atención Directa con Ingeniero</span>
                <h2 style="font-size: 2.4rem; color: var(--text-dark); margin-bottom: 1.25rem; line-height: 1.2;">
                    ¿Listo para automatizar Bsale y WooCommerce? 🚀
                </h2>
                <p style="color: var(--text-body); font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.75rem;">
                    Agenda una llamada técnica con <strong>Álvaro Valenzuela Valdés</strong>. Revisaremos tu catálogo, bodegas y configuraremos la integración perfecta para tu empresa.
                </p>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>📋 Solicitar Cotización de Integración</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, quiero consultar por la integración Bsale WooCommerce para mi negocio.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 WhatsApp Directo</span>
                    </a>
                </div>
            </div>

            <div style="background: var(--bg-alt); border: 1px solid var(--border-light); border-radius: var(--radius-xl); padding: 2.25rem; text-align: center;">
                <h3 style="color: var(--text-dark); font-size: 1.35rem; margin-bottom: 0.5rem;">Álvaro Valenzuela Valdés</h3>
                <div style="color: var(--primary); font-size: 0.9rem; font-weight: 700; margin-bottom: 1.25rem;">Ingeniero Informático & Fundador de REW</div>
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; margin-bottom: 1.5rem;">
                    📍 Santiago, Providencia, Chile<br>
                    ✉️ <a href="mailto:alvaro@rew.cl" style="color: var(--text-dark); text-decoration: underline;">alvaro@rew.cl</a><br>
                    📱 <a href="tel:+56987261127" style="color: #25d366; font-weight: 700;">+56 9 8726 1127</a>
                </p>
                <a href="{{ route('contacto') }}" class="btn btn-outline" style="width: 100%;">
                    <span>Ir al Formulario de Contacto</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Schema JSON-LD Structured Data for Bsale WooCommerce Integration -->
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Service",
      "@id": "https://rew.cl/servicios/integracion-bsale-woocommerce#service",
      "name": "Integración Bsale con WooCommerce en Chile",
      "serviceType": "Integración ERP E-Commerce",
      "provider": {
        "@type": "ProfessionalService",
        "name": "REW",
        "url": "https://rew.cl",
        "telephone": "+56987261127",
        "email": "alvaro@rew.cl"
      },
      "areaServed": "CL",
      "description": "Sincronización automática de inventario en tiempo real, catálogo y boleta/factura electrónica DTE entre Bsale y tiendas WooCommerce en Chile."
    },
    {
      "@type": "Product",
      "@id": "https://rew.cl/servicios/integracion-bsale-woocommerce#product",
      "name": "Plugin Bsale WooCommerce Sync Pro (Licencia Vitalicia)",
      "image": "https://rew.cl/images/products/plugin_bsale_woocommerce.webp",
      "description": "Plugin oficial de integración en tiempo real entre Bsale y WooCommerce. Stock multibodega, precios y emisión automática de boletas/facturas DTE ante el SII. Licencia vitalicia de pago único.",
      "sku": "rew-bsale-woo-lifetime",
      "brand": {
        "@type": "Brand",
        "name": "REW"
      },
      "offers": {
        "@type": "Offer",
        "url": "https://rew.cl/servicios/integracion-bsale-woocommerce#comprar-plugin",
        "priceCurrency": "CLP",
        "price": "350000",
        "availability": "https://schema.org/InStock",
        "seller": {
          "@type": "Organization",
          "name": "REW"
        }
      }
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "¿Qué necesito para integrar Bsale con mi WooCommerce?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Se requiere un plan de Bsale con acceso a API REST y una tienda WooCommerce sobre WordPress 6.x."
          }
        },
        {
          "@type": "Question",
          "name": "¿Cuánto tarda la puesta en marcha de la integración Bsale?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "La integración estándar toma entre 3 y 5 días hábiles, incluyendo homologación de productos y pruebas DTE."
          }
        },
        {
          "@type": "Question",
          "name": "¿Tiene costos mensuales la licencia del plugin?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "No. La licencia del Plugin Bsale WooCommerce Sync Pro es vitalicia (Lifetime) de pago único de $350.000 CLP, sin mensualidades ni cobros por boleta emitida."
          }
        }
      ]
    }
  ]
}
</script>
@endverbatim
@endsection
