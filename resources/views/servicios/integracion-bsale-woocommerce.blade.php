@extends('layouts.app')

@section('title', 'Integración Bsale con WooCommerce | Stock, Precios y DTE en Chile | REW')
@section('meta_description', 'Integra Bsale con WooCommerce y sincroniza stock multibodega, productos, precios y variaciones en tiempo real. Boletas y facturas DTE ante el SII. Implementación en Chile.')
@section('canonical', 'https://rew.cl/servicios/integracion-bsale-woocommerce')

@section('og_type', 'service')
@section('og_title', 'Integración Bsale con WooCommerce | Stock, Precios y DTE | REW')
@section('og_description', 'Conecta WooCommerce con Bsale mediante API REST oficial. Sincroniza stock multibodega, catálogos con productos variables y automatiza la emisión de boletas y facturas SII en Chile.')
@section('og_image', asset('images/products/plugin_bsale_woocommerce.webp'))

@section('content')
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

<style>
/* Estilos Específicos para Landing Bsale WooCommerce */
.bsale-table-container {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    border-radius: var(--radius-lg, 12px);
    border: 1px solid var(--border-light, #e2e8f0);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
    background: #ffffff;
    margin: 2rem 0;
}
.bsale-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.95rem;
    text-align: left;
    min-width: 650px;
}
.bsale-table th {
    background: #0f172a;
    color: #ffffff;
    font-weight: 700;
    padding: 1rem 1.25rem;
    border-bottom: 2px solid #0284c7;
    font-size: 0.9rem;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}
.bsale-table td {
    padding: 1.1rem 1.25rem;
    border-bottom: 1px solid #f1f5f9;
    color: var(--text-dark, #1e293b);
    line-height: 1.5;
}
.bsale-table tr:last-child td {
    border-bottom: none;
}
.bsale-table tr:hover td {
    background: #f8fafc;
}
.bsale-badge-truth {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 10px;
    border-radius: 9999px;
    font-size: 0.8rem;
    font-weight: 700;
    background: rgba(2, 132, 199, 0.1);
    color: #0284c7;
    border: 1px solid rgba(2, 132, 199, 0.25);
}
.step-number-pill {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 900;
    font-size: 1.1rem;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(2, 132, 199, 0.35);
}
.comparison-card {
    border-radius: var(--radius-xl, 16px);
    padding: 2.25rem;
    background: #ffffff;
    border: 1px solid var(--border-light, #e2e8f0);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}
.comparison-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl, 0 20px 35px rgba(0, 0, 0, 0.08));
}
.comparison-card.highlight {
    border: 2px solid #0284c7;
    box-shadow: 0 15px 35px rgba(2, 132, 199, 0.12);
    position: relative;
}
.comparison-card.highlight::before {
    content: "RECOMENDADO PARA EMPRESAS CON ERP";
    position: absolute;
    top: -13px;
    left: 50%;
    transform: translateX(-50%);
    background: #0284c7;
    color: #ffffff;
    font-size: 0.72rem;
    font-weight: 800;
    padding: 4px 14px;
    border-radius: 9999px;
    letter-spacing: 0.5px;
    white-space: nowrap;
}
</style>

<!-- 1. Hero Section -->
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%); padding-top: 5rem; padding-bottom: 4rem;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="Breadcrumb" style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}">Inicio</a> &nbsp;/&nbsp;
            <a href="{{ route('servicios.index') }}">Servicios</a> &nbsp;/&nbsp;
            <span style="color: var(--text-dark); font-weight: 600;">Integración Bsale WooCommerce</span>
        </nav>

        <div class="service-hero-grid">
            <div>
                <span class="badge badge-primary" style="margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 0.5px;">
                    Conectividad E-Commerce & ERP · Chile
                </span>
                <h1 style="font-size: clamp(2.3rem, 5vw, 3.4rem); margin-bottom: 1.25rem; line-height: 1.15; color: var(--text-dark);">
                    Integración Bsale con WooCommerce en Chile
                </h1>
                <p style="font-size: 1.25rem; color: var(--primary); font-weight: 700; line-height: 1.4; margin-bottom: 1.25rem;">
                    Conecta tu tienda WooCommerce con Bsale para sincronizar stock, productos, precios y bodegas, y automatizar la emisión de boletas y facturas electrónicas.
                </p>
                <p style="font-size: 1.1rem; color: var(--text-body); line-height: 1.7; margin-bottom: 2rem;">
                    ¿Necesitas conectar Bsale con WooCommerce? En <strong>REW</strong> desarrollamos integraciones a medida y proveemos soluciones oficiales para conectar tu tienda online con Bsale mediante API REST oficial. Sincronizamos stock multibodega en tiempo real, soportamos productos simples y variables (tallas y colores), homologamos listas de precios y automatizamos la emisión de boletas y facturas DTE válidas ante el SII. Ideal para empresas en Chile que necesitan mantener su catálogo online y sus sucursales físicas operando sin desfases ni sobreventas.
                </p>
                
                <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 2.25rem;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg" style="background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%); box-shadow: 0 10px 25px -5px rgba(2, 132, 199, 0.4);">
                        <span>📋 Solicitar Integración a Medida</span>
                    </a>
                    <a href="#comprar-plugin" class="btn btn-outline btn-lg">
                        <span>🛒 Ver Plugin Lifetime (<span class="price-tag-dynamic" data-usd="{{ $priceUsd }}" data-clp="{{ $priceClp }}">${{ number_format($priceClp, 0, ',', '.') }} CLP</span>)</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, me interesa consultar por la integración de Bsale con WooCommerce para mi empresa.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 Hablar por WhatsApp</span>
                    </a>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 0.85rem; font-size: 0.92rem; color: var(--text-dark); font-weight: 600;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="color: #10b981; font-weight: 800;">✓</span> Stock multibodega en tiempo real
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="color: #10b981; font-weight: 800;">✓</span> Productos simples y variables (tallas)
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="color: #10b981; font-weight: 800;">✓</span> Boletas y facturas DTE ante el SII
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="color: #10b981; font-weight: 800;">✓</span> Opción de pago único (sin mensualidad)
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="color: #10b981; font-weight: 800;">✓</span> Soporte directo con Ingeniero
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Tarjeta Flujo Rápido -->
            <div class="card" style="padding: 2.5rem; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #ffffff; border-radius: var(--radius-xl); box-shadow: var(--shadow-2xl); height: fit-content;">
                <div style="font-size: 0.85rem; font-weight: 800; color: var(--accent-gold); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.75rem;">
                    Automatización en Tiempo Real
                </div>
                <h3 style="color: #ffffff; font-size: 1.5rem; margin-bottom: 1.5rem; line-height: 1.3;">
                    Flujo de Conexión Bsale + WooCommerce
                </h3>
                <div style="display: flex; flex-direction: column; gap: 1.35rem;">
                    <div style="display: flex; gap: 14px; align-items: flex-start;">
                        <span style="background: rgba(79, 70, 229, 0.3); border: 1px solid rgba(79, 70, 229, 0.5); width: 34px; height: 34px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 900; color: #818cf8; flex-shrink: 0;">1</span>
                        <div>
                            <strong style="color: #ffffff; font-size: 1.05rem; display: block;">Venta en WooCommerce</strong>
                            <span style="color: #94a3b8; font-size: 0.9rem;">El cliente finaliza su compra online mediante Webpay Plus, Mercado Pago o transferencia.</span>
                        </div>
                    </div>
                    <div style="display: flex; gap: 14px; align-items: flex-start;">
                        <span style="background: rgba(16, 185, 129, 0.3); border: 1px solid rgba(16, 185, 129, 0.5); width: 34px; height: 34px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 900; color: #34d399; flex-shrink: 0;">2</span>
                        <div>
                            <strong style="color: #ffffff; font-size: 1.05rem; display: block;">Transmisión Asíncrona a Bsale</strong>
                            <span style="color: #94a3b8; font-size: 0.9rem;">El webhook transmite productos, cantidades, descuentos y datos tributarios al instante sin ralentizar el checkout.</span>
                        </div>
                    </div>
                    <div style="display: flex; gap: 14px; align-items: flex-start;">
                        <span style="background: rgba(245, 158, 11, 0.3); border: 1px solid rgba(245, 158, 11, 0.5); width: 34px; height: 34px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 900; color: #fbbf24; flex-shrink: 0;">3</span>
                        <div>
                            <strong style="color: #ffffff; font-size: 1.05rem; display: block;">Descuento de Stock & Timbrado DTE</strong>
                            <span style="color: #94a3b8; font-size: 0.9rem;">Bsale descuenta el inventario de la bodega asignada, emite el DTE ante el SII y se adjunta el PDF al correo de confirmación.</span>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: space-between; font-size: 0.85rem; color: #cbd5e1;">
                    <span>Conexión mediante API REST oficial</span>
                    <span style="color: #38bdf8; font-weight: 700;">100% Homologado</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Sección: ¿Qué permite hacer la integración Bsale + WooCommerce? -->
<section class="section" style="background: #ffffff; padding-top: 5rem; padding-bottom: 5rem;">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto 3.5rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Capacidades Técnicas & Operativas</span>
            <h2 style="font-size: clamp(2rem, 4vw, 2.7rem); color: var(--text-dark); margin-bottom: 1rem; line-height: 1.2;">
                ¿Qué permite hacer la integración Bsale + WooCommerce?
            </h2>
            <p style="color: var(--text-body); font-size: 1.15rem; line-height: 1.6;">
                Diseñamos e implementamos conexiones de software de alta disponibilidad que eliminan la doble digitación y resguardan tu inventario físico y digital.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem;">
            <!-- Card 1: Stock -->
            <div class="card" style="padding: 2.25rem;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">📦</div>
                <h3 style="font-size: 1.35rem; margin-bottom: 0.75rem; color: var(--text-dark);">Sincronización de Stock en Tiempo Real</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.65; margin-bottom: 1rem;">
                    Mantén actualizado el inventario de tu tienda WooCommerce utilizando el stock disponible en Bsale. Si vendes un producto en tu local físico a través del punto de venta (POS) de Bsale, el stock web se actualiza al instante, reduciendo a cero el riesgo de sobreventas o cancelaciones de pedidos.
                </p>
                <div style="font-size: 0.88rem; color: var(--primary); font-weight: 700;">
                    ✓ Disminución inmediata en Bsale tras compra online
                </div>
            </div>

            <!-- Card 2: Multibodega -->
            <div class="card" style="padding: 2.25rem; border-top: 3px solid #0284c7;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🏬</div>
                <h3 style="font-size: 1.35rem; margin-bottom: 0.75rem; color: var(--text-dark);">Soporte de Stock Multibodega</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.65; margin-bottom: 1rem;">
                    ¿Tienes una bodega central, bodegas en tiendas físicas y un centro de distribución para e-commerce? Puedes seleccionar con precisión qué sucursal o bodega de Bsale alimenta tu tienda web, o consolidar el stock disponible según las reglas comerciales de tu empresa.
                </p>
                <div style="font-size: 0.88rem; color: var(--primary); font-weight: 700;">
                    ✓ Asignación específica de sucursal web
                </div>
            </div>

            <!-- Card 3: Productos y SKU -->
            <div class="card" style="padding: 2.25rem;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🏷️</div>
                <h3 style="font-size: 1.35rem; margin-bottom: 0.75rem; color: var(--text-dark);">Sincronización de Catálogo y Códigos SKU</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.65; margin-bottom: 1rem;">
                    Vinculamos los productos de WooCommerce con sus registros correspondientes en Bsale mediante SKU o código de producto interno. Esto garantiza una homologación transparente para productos simples y evita duplicidades en los reportes de inventario y ventas.
                </p>
                <div style="font-size: 0.88rem; color: var(--primary); font-weight: 700;">
                    ✓ Mapeo unívoco por código de barra o SKU
                </div>
            </div>

            <!-- Card 4: Variables -->
            <div class="card" style="padding: 2.25rem; border-top: 3px solid #10b981;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🎨</div>
                <h3 style="font-size: 1.35rem; margin-bottom: 0.75rem; color: var(--text-dark);">Productos Variables y Atributos (Tallas & Colores)</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.65; margin-bottom: 1rem;">
                    A diferencia de soluciones genéricas que solo manejan productos simples o cobran suscripciones mensuales extra por gestionar variaciones, nuestra integración soporta nativamente productos variables completos, asociando cada SKU hijo a su stock exacto en Bsale.
                </p>
                <div style="font-size: 0.88rem; color: #10b981; font-weight: 700;">
                    ✓ Tallas, colores y atributos con stock independiente
                </div>
            </div>

            <!-- Card 5: Precios -->
            <div class="card" style="padding: 2.25rem;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">💲</div>
                <h3 style="font-size: 1.35rem; margin-bottom: 0.75rem; color: var(--text-dark);">Sincronización de Listas de Precios</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.65; margin-bottom: 1rem;">
                    Configura qué lista de precios de Bsale (con IVA incluido o neto) utilizará WooCommerce. Si actualizas los precios en Bsale para tus tiendas físicas o campañas, la tienda online puede reflejar los cambios automáticamente respetando ofertas programadas.
                </p>
                <div style="font-size: 0.88rem; color: var(--primary); font-weight: 700;">
                    ✓ Compatibilidad con precios normales y precios de oferta
                </div>
            </div>

            <!-- Card 6: DTE SII -->
            <div class="card" style="padding: 2.25rem; border-top: 3px solid #f59e0b;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🧾</div>
                <h3 style="font-size: 1.35rem; margin-bottom: 0.75rem; color: var(--text-dark);">Emisión Automática de Boletas y Facturas DTE</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.65; margin-bottom: 1rem;">
                    Genera automáticamente Documentos Tributarios Electrónicos válidos ante el Servicio de Impuestos Internos (SII) en Chile. Al completarse el pedido, Bsale timbra la boleta o factura y el PDF queda disponible en el panel de WooCommerce y adjunto en el correo al cliente.
                </p>
                <div style="font-size: 0.88rem; color: #d97706; font-weight: 700;">
                    ✓ Campos de RUT, Razón Social, Giro y Dirección en checkout
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Sección Estratégica: ¿Qué sistema controla cada dato? (Fuente de Verdad) -->
<section class="section" style="background: var(--bg-alt); padding-top: 5rem; padding-bottom: 5rem;">
    <div class="container">
        <div style="text-align: center; max-width: 820px; margin: 0 auto 3rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Arquitectura de Datos Sin Conflictos</span>
            <h2 style="font-size: clamp(2rem, 4vw, 2.6rem); color: var(--text-dark); margin-bottom: 1rem; line-height: 1.2;">
                ¿Qué sistema controla cada dato? (Fuente de Verdad)
            </h2>
            <p style="color: var(--text-body); font-size: 1.15rem; line-height: 1.6;">
                El principal error de las integraciones deficientes es intentar sincronizar todo en ambas direcciones sin definir un sistema maestro. En REW definimos la <strong>Fuente de Verdad (Single Source of Truth)</strong> para garantizar coherencia contable y de stock.
            </p>
        </div>

        <div class="bsale-table-container">
            <table class="bsale-table">
                <thead>
                    <tr>
                        <th>Tipo de Información</th>
                        <th>Sistema Fuente de Verdad</th>
                        <th>Dirección del Flujo</th>
                        <th>Método & Frecuencia</th>
                        <th>Regla de Negocio REW</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Stock / Inventario</strong></td>
                        <td><span class="bsale-badge-truth">Bsale (Maestro)</span></td>
                        <td>Bsale ➔ WooCommerce</td>
                        <td>Webhooks en tiempo real / Cron</td>
                        <td>El POS físico y bodega mandan sobre las existencias reales.</td>
                    </tr>
                    <tr>
                        <td><strong>Precios de Venta</strong></td>
                        <td><span class="bsale-badge-truth">Bsale o WooCommerce*</span></td>
                        <td>Bsale ➔ WooCommerce</td>
                        <td>Sincronización por lista</td>
                        <td>Se define si manda la lista de Bsale o si WooCommerce maneja ofertas online.</td>
                    </tr>
                    <tr>
                        <td><strong>Catálogo & Fichas</strong></td>
                        <td><span class="bsale-badge-truth">WooCommerce / Bsale</span></td>
                        <td>Homologación por SKU</td>
                        <td>Validación al crear producto</td>
                        <td>WooCommerce gestiona fotos SEO y descripciones; Bsale gestiona códigos internos.</td>
                    </tr>
                    <tr>
                        <td><strong>Pedidos & Compras Web</strong></td>
                        <td><span class="bsale-badge-truth">WooCommerce (Origen)</span></td>
                        <td>WooCommerce ➔ Bsale</td>
                        <td>API REST asíncrona inmediata</td>
                        <td>Al confirmarse el pago, se transmite el detalle completo a Bsale.</td>
                    </tr>
                    <tr>
                        <td><strong>Documento Tributario (DTE)</strong></td>
                        <td><span class="bsale-badge-truth">Bsale (Emisión SII)</span></td>
                        <td>Bsale ➔ WooCommerce</td>
                        <td>Timbrado directo SII</td>
                        <td>Bsale emite la boleta/factura legal y devuelve el PDF y folio a WooCommerce.</td>
                    </tr>
                    <tr>
                        <td><strong>Datos de Clientes & Empresas</strong></td>
                        <td><span class="bsale-badge-truth">WooCommerce ➔ Bsale</span></td>
                        <td>Envío en el checkout</td>
                        <td>Por pedido</td>
                        <td>Se recopila RUT, Razón Social y Giro comercial para facturas B2B en Chile.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="background: #ffffff; border-radius: var(--radius-lg); padding: 1.5rem 2rem; border-left: 4px solid #0284c7; box-shadow: 0 4px 15px rgba(0,0,0,0.03); max-width: 900px; margin: 0 auto;">
            <p style="margin: 0; color: var(--text-body); font-size: 0.95rem; line-height: 1.6;">
                💡 <em>*Nota técnica: Antes de poner en marcha la integración, realizamos una sesión de arquitectura con tu equipo para fijar las reglas de precedencia de datos. Esto elimina discrepancias de inventario, errores de facturación ante el SII y precios duplicados.</em>
            </p>
        </div>
    </div>
</section>

<!-- 4. Sección: ¿Cómo funciona la integración Bsale con WooCommerce? (7 Pasos) -->
<section class="section" style="background: #ffffff; padding-top: 5rem; padding-bottom: 5rem;">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto 3.5rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Metodología de Puesta en Marcha</span>
            <h2 style="font-size: clamp(2rem, 4vw, 2.7rem); color: var(--text-dark); margin-bottom: 1rem; line-height: 1.2;">
                ¿Cómo funciona la integración Bsale con WooCommerce?
            </h2>
            <p style="color: var(--text-body); font-size: 1.15rem; line-height: 1.6;">
                Proceso paso a paso estructurado por ingenieros para conectar tu tienda sin tiempos de inactividad ni desajustes operativos.
            </p>
        </div>

        <div style="display: flex; flex-direction: column; gap: 1.75rem; max-width: 920px; margin: 0 auto;">
            <!-- Paso 1 -->
            <div class="card" style="padding: 1.75rem 2rem; display: flex; gap: 1.5rem; align-items: flex-start;">
                <div class="step-number-pill">1</div>
                <div>
                    <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.4rem;">Conexión Segura mediante API REST de Bsale</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                        Generamos el token de autenticación en Bsale y configuramos las credenciales en WooCommerce con cifrado de datos. Establecemos la comunicación de red verificando latencias y respuestas del servidor.
                    </p>
                </div>
            </div>

            <!-- Paso 2 -->
            <div class="card" style="padding: 1.75rem 2rem; display: flex; gap: 1.5rem; align-items: flex-start;">
                <div class="step-number-pill">2</div>
                <div>
                    <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.4rem;">Homologación de Catálogo y Mapeo de Códigos SKU</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                        Auditamos la correspondencia entre los códigos SKU de Bsale y WooCommerce. Si existen productos sin código o con discrepancias, los normalizamos para asegurar que cada venta descuente del artículo correcto.
                    </p>
                </div>
            </div>

            <!-- Paso 3 -->
            <div class="card" style="padding: 1.75rem 2rem; display: flex; gap: 1.5rem; align-items: flex-start;">
                <div class="step-number-pill">3</div>
                <div>
                    <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.4rem;">Configuración de Sucursales y Bodegas de Despacho</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                        Mapeamos la sucursal de Bsale que alimenta la tienda web. Si operas con retiro en tienda o múltiples depósitos, definimos las prioridades de inventario para que el cliente online solo compre lo que realmente hay disponible.
                    </p>
                </div>
            </div>

            <!-- Paso 4 -->
            <div class="card" style="padding: 1.75rem 2rem; display: flex; gap: 1.5rem; align-items: flex-start;">
                <div class="step-number-pill">4</div>
                <div>
                    <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.4rem;">Definición de Reglas Comerciales y Listas de Precios</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                        Seleccionamos la lista de precios oficial (general, mayorista o web). Determinamos si los impuestos se desglosan o se calculan brutos según la configuración tributaria de tu comercio en Chile.
                    </p>
                </div>
            </div>

            <!-- Paso 5 -->
            <div class="card" style="padding: 1.75rem 2rem; display: flex; gap: 1.5rem; align-items: flex-start;">
                <div class="step-number-pill">5</div>
                <div>
                    <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.4rem;">Procesamiento de Pedidos en Segundo Plano (Asíncrono)</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                        Implementamos colas de ejecución asíncronas para que el envío del pedido a Bsale no bloquee el navegador del comprador. El cliente completa su pago en segundos y el pedido se procesa de forma transparente.
                    </p>
                </div>
            </div>

            <!-- Paso 6 -->
            <div class="card" style="padding: 1.75rem 2rem; display: flex; gap: 1.5rem; align-items: flex-start;">
                <div class="step-number-pill">6</div>
                <div>
                    <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.4rem;">Emisión Automática de Documentos DTE ante el SII</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                        Al activarse el estado del pedido, Bsale genera el documento tributario electrónico (Boleta o Factura con RUT empresa) y WooCommerce adjunta el comprobante oficial en PDF directamente en el correo de confirmación.
                    </p>
                </div>
            </div>

            <!-- Paso 7 -->
            <div class="card" style="padding: 1.75rem 2rem; display: flex; gap: 1.5rem; align-items: flex-start;">
                <div class="step-number-pill">7</div>
                <div>
                    <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.4rem;">Pruebas en Staging & Puesta en Producción Asistida</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                        Simulamos compras de prueba con productos simples y variables, validamos el descuento de inventario en Bsale y probamos la emisión de boletas reales antes de encender la sincronización definitiva.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Sección de Decisión: ¿Plugin Estándar o Integración a Medida? -->
<section class="section" style="background: var(--bg-alt); padding-top: 5rem; padding-bottom: 5rem;">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto 3.5rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Modelos de Solución REW</span>
            <h2 style="font-size: clamp(2rem, 4vw, 2.7rem); color: var(--text-dark); margin-bottom: 1rem; line-height: 1.2;">
                ¿Plugin Estándar o Integración Personalizada con Bsale?
            </h2>
            <p style="color: var(--text-body); font-size: 1.15rem; line-height: 1.6;">
                No todas las tiendas WooCommerce tienen la misma complejidad operativa. En REW ofrecemos ambas opciones para adaptarnos a la escala de tu negocio.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2.5rem; max-width: 1050px; margin: 0 auto;">
            <!-- Opción 1: Plugin Estándar -->
            <div class="comparison-card">
                <span class="badge badge-primary" style="margin-bottom: 1rem; width: fit-content;">Plugin Embalado Oficial</span>
                <h3 style="font-size: 1.6rem; color: var(--text-dark); margin-bottom: 0.75rem;">Plugin Bsale WooCommerce Sync Pro</h3>
                <div style="font-size: 2.2rem; font-weight: 900; color: #0284c7; margin-bottom: 1.25rem;">
                    ${{ number_format($priceClp, 0, ',', '.') }} CLP <span style="font-size: 0.9rem; color: var(--text-muted); font-weight: 500;">/ Pago Único</span>
                </div>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;">
                    Ideal para tiendas de e-commerce con procesos de venta tradicionales que buscan una solución probada, rápida de instalar y sin cuotas mensuales recurrentes.
                </p>
                <ul style="list-style: none; padding: 0; margin: 0 0 2rem 0; display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.92rem; color: var(--text-dark);">
                    <li>✓ Sincronización de stock en tiempo real</li>
                    <li>✓ Selección de 1 sucursal/bodega web</li>
                    <li>✓ Productos simples y productos variables nativos</li>
                    <li>✓ Emisión automática de boletas y facturas DTE ante el SII</li>
                    <li>✓ Sin mensualidades ni comisiones por documento</li>
                    <li>✓ Puesta en marcha rápida (3 a 5 días hábiles)</li>
                    <li>✓ Instalación asistida y soporte directo por WhatsApp</li>
                </ul>
                <div style="margin-top: auto;">
                    <a href="#comprar-plugin" class="btn btn-outline" style="width: 100%; text-align: center;">
                        <span>Ver Detalles del Plugin</span>
                    </a>
                </div>
            </div>

            <!-- Opción 2: Integración a Medida -->
            <div class="comparison-card highlight">
                <span class="badge badge-gold" style="margin-bottom: 1rem; width: fit-content;">Software Factory & Consultoría</span>
                <h3 style="font-size: 1.6rem; color: var(--text-dark); margin-bottom: 0.75rem;">Desarrollo e Integración a Medida REW</h3>
                <div style="font-size: 2.2rem; font-weight: 900; color: var(--text-dark); margin-bottom: 1.25rem;">
                    Cotización por Proyecto
                </div>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;">
                    Diseñado para medianas y grandes empresas con requerimientos operativos especiales, múltiples centros de distribución, sincronización con otros ERPs o reglas complejas de facturación.
                </p>
                <ul style="list-style: none; padding: 0; margin: 0 0 2rem 0; display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.92rem; color: var(--text-dark);">
                    <li>✓ Múltiples bodegas con reglas dinámicas de despacho</li>
                    <li>✓ Conexión híbrida con otros ERPs (SAP, Softland, Odoo, Defontana)</li>
                    <li>✓ Lógica B2B personalizada con listas de precios segmentadas</li>
                    <li>✓ Automatizaciones complejas de notas de crédito y devoluciones</li>
                    <li>✓ Integración con APIs de transporte y couriers en Chile</li>
                    <li>✓ Arquitectura de microservicios o webhooks de alto tráfico</li>
                    <li>✓ Consultoría técnica y SLA de soporte dedicado con Álvaro Valenzuela</li>
                </ul>
                <div style="margin-top: auto;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary" style="width: 100%; text-align: center;">
                        <span>Solicitar Cotización de Integración</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. Bloque de Compra del Plugin Bsale WooCommerce Sync Pro -->
<section id="comprar-plugin" class="section" style="background: linear-gradient(180deg, #070d19 0%, #0b1329 100%); padding-top: 5.5rem; padding-bottom: 5.5rem; color: #ffffff;">
    <div class="container">
        <div style="text-align: center; max-width: 820px; margin: 0 auto 3rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem; text-transform: uppercase; letter-spacing: 1px;">
                ⚡ Licencia Vitalicia Oficial REW
            </span>
            <h2 style="font-size: clamp(2rem, 4vw, 2.7rem); color: #ffffff; margin-bottom: 1rem; line-height: 1.2;">
                Adquiere el Plugin Bsale WooCommerce Sync Pro
            </h2>
            <p style="color: #94a3b8; font-size: 1.15rem; line-height: 1.6;">
                La alternativa desarrollada en Chile para tiendas WooCommerce que necesitan sincronizar Bsale sin pagos mensuales ni comisiones por venta. Un solo pago de por vida con instalación asistida.
            </p>
        </div>

        <div class="card" style="background: linear-gradient(145deg, #090e17 0%, #0f172a 60%, #172554 100%); border: 1px solid rgba(56, 189, 248, 0.25); border-radius: var(--radius-xl); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7); padding: clamp(1.75rem, 4vw, 3rem); color: #ffffff;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: clamp(2rem, 4vw, 3.5rem); align-items: center;">
                
                <!-- Columna Izquierda: Imagen Mockup y Compatibilidad -->
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

                <!-- Columna Derecha: Precios, Beneficios y Botones -->
                <div>
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem; flex-wrap: wrap;">
                        <span class="badge badge-primary" style="background: rgba(14, 165, 233, 0.2); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.3);">
                            Software de Integración Certificado REW
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
                            <span class="badge badge-gold price-save-dynamic" data-usd="{{ $originalUsd - $priceUsd }}" data-clp="{{ $originalClp - $priceClp }}" style="font-size: 0.82rem; font-weight: 800;">
                                AHORRA ${{ number_format($originalClp - $priceClp, 0, ',', '.') }} CLP
                            </span>
                        </div>
                        <div style="margin-top: 0.5rem; font-size: 0.9rem; color: #cbd5e1; display: flex; align-items: center; gap: 8px;">
                            <span style="color: #34d399; font-weight: 700;">✓ Pago Único de por Vida (Lifetime)</span> • Sin suscripciones mensuales ni cobros por boleta.
                        </div>
                    </div>

                    <!-- Lista de Beneficios -->
                    <div style="display: flex; flex-direction: column; gap: 0.85rem; margin-bottom: 2rem; font-size: 0.95rem; color: #e2e8f0;">
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <span style="color: #38bdf8; font-weight: 900; font-size: 1.1rem;">✓</span>
                            <div><strong>Sincronización Multibodega en Tiempo Real:</strong> Descuenta automáticamente stock de la sucursal asignada evitando sobreventas.</div>
                        </div>
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <span style="color: #38bdf8; font-weight: 900; font-size: 1.1rem;">✓</span>
                            <div><strong>Emisión Automática de Boletas y Facturas SII:</strong> DTE electrónico generado al pagar y adjuntado en PDF al correo del cliente.</div>
                        </div>
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <span style="color: #38bdf8; font-weight: 900; font-size: 1.1rem;">✓</span>
                            <div><strong>Productos Variables en Automático:</strong> Soporte nativo para tallas, colores, atributos y SKUs hijos sin complementos de pago.</div>
                        </div>
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <span style="color: #38bdf8; font-weight: 900; font-size: 1.1rem;">✓</span>
                            <div><strong>Arquitectura Asíncrona Ultra Rápida:</strong> Sin demoras en el checkout ni caídas de servidor gracias a webhooks en segundo plano.</div>
                        </div>
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <span style="color: #38bdf8; font-weight: 900; font-size: 1.1rem;">✓</span>
                            <div><strong>Instalación Asistida con Álvaro Valenzuela:</strong> Ingeniero Informático a cargo para homologar catálogos y validar DTEs en vivo.</div>
                        </div>
                    </div>

                    <!-- Formulario de Compra -->
                    <div style="display: flex; flex-direction: column; gap: 1rem; background: rgba(0,0,0,0.25); padding: 1.5rem; border-radius: var(--radius-lg); border: 1px solid rgba(255,255,255,0.08);">
                        <form action="{{ route('cart.add') }}" method="POST" class="ajax-add-to-cart-form" style="margin: 0;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $productId }}">
                            <input type="hidden" name="product_slug" value="plugin-integracion-bsale-woocommerce">
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

                    <!-- Sellos de Seguridad -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 1rem; margin-top: 1.5rem; padding-top: 1.25rem; border-top: 1px solid rgba(255,255,255,0.08); font-size: 0.82rem; color: #94a3b8; text-align: center;">
                        <div>🔒 <strong>Pago Seguro</strong><br>Webpay Plus / Transferencia</div>
                        <div>📄 <strong>Factura DTE</strong><br>Emitimos factura para empresas</div>
                        <div>⚡ <strong>Garantía REW</strong><br>Soporte directo con el fundador</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- 7. Sección: ¿Para qué empresas sirve esta integración? -->
<section class="section" style="background: #ffffff; padding-top: 5rem; padding-bottom: 5rem;">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto 3.5rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Casos de Uso Empresarial</span>
            <h2 style="font-size: clamp(2rem, 4vw, 2.6rem); color: var(--text-dark); margin-bottom: 1rem; line-height: 1.2;">
                ¿Para qué empresas sirve esta integración?
            </h2>
            <p style="color: var(--text-body); font-size: 1.15rem; line-height: 1.6;">
                La integración Bsale + WooCommerce está diseñada para organizaciones chilenas que venden por internet y necesitan mantener sincronizada su operación comercial.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.75rem;">
            <div class="card" style="padding: 2rem;">
                <div style="font-size: 2rem; margin-bottom: 1rem;">🏬</div>
                <h3 style="font-size: 1.2rem; color: var(--text-dark); margin-bottom: 0.6rem;">Tiendas con Sucursales Físicas (POS)</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin: 0;">
                    Negocios que atienden en sala de ventas con Bsale POS y al mismo tiempo reciben pedidos online. Evita vender en la web el último producto que un cliente presencial acaba de llevarse.
                </p>
            </div>

            <div class="card" style="padding: 2rem;">
                <div style="font-size: 2rem; margin-bottom: 1rem;">⚡</div>
                <h3 style="font-size: 1.2rem; color: var(--text-dark); margin-bottom: 0.6rem;">E-Commerce con Alto Volumen de Pedidos</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin: 0;">
                    Comercios que ya no pueden digitar boletas a mano ni actualizar inventarios en planillas Excel. La automatización total ahorra decenas de horas administrativas cada semana.
                </p>
            </div>

            <div class="card" style="padding: 2rem;">
                <div style="font-size: 2rem; margin-bottom: 1rem;">👗</div>
                <h3 style="font-size: 1.2rem; color: var(--text-dark); margin-bottom: 0.6rem;">Comercios con Productos Variables</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin: 0;">
                    Marcas de vestuario, calzado, repuestos o tecnología con múltiples tallas, colores y SKUs hijos que requieren descuento exacto de bodega por variación.
                </p>
            </div>

            <div class="card" style="padding: 2rem;">
                <div style="font-size: 2rem; margin-bottom: 1rem;">🏢</div>
                <h3 style="font-size: 1.2rem; color: var(--text-dark); margin-bottom: 0.6rem;">Empresas B2B con Venta Mayorista</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin: 0;">
                    Distribuidoras que necesitan capturar datos tributarios (RUT, Razón Social, Giro Comercial) en el checkout para emitir automáticamente Facturas Electrónicas ante el SII.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 8. Sección Técnica: Arquitectura API & Rendimiento Asíncrono -->
<section class="section" style="background: var(--bg-alt); padding-top: 5rem; padding-bottom: 5rem;">
    <div class="container">
        <div class="grid-2col-cta" style="align-items: center;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Ingeniería de Software REW</span>
                <h2 style="font-size: clamp(2rem, 4vw, 2.5rem); color: var(--text-dark); margin-bottom: 1.25rem; line-height: 1.25;">
                    Arquitectura Técnica Oficial API REST de Bsale
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    Nuestra solución se comunica directamente con los endpoints oficiales de Bsale sin servidores intermediarios desconocidos. Empleamos procesamiento asíncrono y webhooks protegidos con tokens criptográficos para garantizar máxima velocidad y seguridad.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.85rem; font-size: 0.95rem; color: var(--text-dark);">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span style="color: #0284c7; font-weight: 800;">✓</span> <strong>Webhooks Asíncronos:</strong> Las notificaciones de venta no detienen el hilo de ejecución de PHP.
                    </div>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span style="color: #0284c7; font-weight: 800;">✓</span> <strong>Manejo de Reintentos (Exponential Backoff):</strong> Si Bsale presenta microcortes, el sistema reintenta el envío sin perder pedidos.
                    </div>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span style="color: #0284c7; font-weight: 800;">✓</span> <strong>Compatibilidad con Servidores en Chile:</strong> Funciona en LiteSpeed, Nginx, Apache, cPanel y Cloud Hosting.
                    </div>
                </div>
            </div>

            <div class="card" style="padding: 2.25rem; background: #ffffff; border-radius: var(--radius-xl); border: 1px solid var(--border-light);">
                <h3 style="font-size: 1.3rem; margin-bottom: 1rem; color: var(--text-dark);">Ecosistema y Conectividad Extendida</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin-bottom: 1.5rem;">
                    ¿Tu empresa utiliza otros sistemas de gestión? Como <a href="{{ route('servicios.software-chile') }}" style="color: var(--primary); text-decoration: underline;">software factory en Chile</a>, desarrollamos conectores para enlazar tu e-commerce con:
                </p>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; font-size: 0.88rem; font-weight: 600; color: var(--text-dark);">
                    <div style="background: var(--bg-alt); padding: 8px 12px; border-radius: 6px;">• ERP Softland</div>
                    <div style="background: var(--bg-alt); padding: 8px 12px; border-radius: 6px;">• ERP Odoo Chile</div>
                    <div style="background: var(--bg-alt); padding: 8px 12px; border-radius: 6px;">• SAP Business One</div>
                    <div style="background: var(--bg-alt); padding: 8px 12px; border-radius: 6px;">• Defontana ERP</div>
                    <div style="background: var(--bg-alt); padding: 8px 12px; border-radius: 6px;">• Shipit / Blue Express</div>
                    <div style="background: var(--bg-alt); padding: 8px 12px; border-radius: 6px;">• Bases de datos SQL a medida</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 9. Sección E-E-A-T & Confianza: ¿Quién desarrolla y respalda la integración? -->
<section class="section" style="background: #ffffff; padding-top: 5rem; padding-bottom: 5rem;">
    <div class="container">
        <div class="grid-2col-cta" style="align-items: center;">
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Respaldo Profesional & Experiencia Técnica</span>
                <h2 style="font-size: clamp(2rem, 4vw, 2.5rem); color: var(--text-dark); margin-bottom: 1.25rem; line-height: 1.25;">
                    ¿Quién desarrolla y respalda la integración?
                </h2>
                <p style="color: var(--text-body); font-size: 1.1rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    <strong>REW</strong> es una agencia y software factory chilena de desarrollo de software, comercio electrónico y posicionamiento SEO liderada por <strong>Álvaro Valenzuela Valdés</strong>, Ingeniero Informático.
                </p>
                <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.7; margin-bottom: 2rem;">
                    A diferencia de agencias que revenden plugins extranjeros o servicios que dependen de intermediarios lejanos, en REW la integración Bsale + WooCommerce es desarrollada, mantenida y soportada directamente en Chile con atención personalizada por teléfono y WhatsApp.
                </p>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="{{ route('nosotros') }}" class="btn btn-outline">
                        <span>Conocer sobre REW</span>
                    </a>
                    <a href="{{ route('portafolio.index') }}" class="btn btn-outline">
                        <span>Ver Casos de Estudio en Portafolio</span>
                    </a>
                </div>
            </div>

            <div style="background: var(--bg-alt); border: 1px solid var(--border-light); border-radius: var(--radius-xl); padding: 2.5rem; text-align: center;">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 2.2rem; font-weight: 900; margin: 0 auto 1.25rem; box-shadow: 0 8px 20px rgba(2,132,199,0.3);">
                    AV
                </div>
                <h3 style="color: var(--text-dark); font-size: 1.4rem; margin-bottom: 0.4rem;">Álvaro Valenzuela Valdés</h3>
                <div style="color: var(--primary); font-size: 0.95rem; font-weight: 700; margin-bottom: 1.25rem;">Ingeniero Informático & Fundador de REW</div>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin-bottom: 1.5rem;">
                    📍 Santiago, Providencia, Chile<br>
                    ✉️ <a href="mailto:alvaro@rew.cl" style="color: var(--text-dark); text-decoration: underline;">alvaro@rew.cl</a><br>
                    📱 <a href="tel:+56987261127" style="color: #25d366; font-weight: 700;">+56 9 8726 1127</a>
                </p>
                <div style="font-size: 0.85rem; color: #64748b; background: #ffffff; padding: 10px; border-radius: 8px; border: 1px solid var(--border-light);">
                    Asesoría técnica directa para tiendas <a href="{{ route('servicios.desarrollo-web') }}" style="color: var(--primary); font-weight: 600;">WooCommerce</a> y desarrollo de integraciones en Chile.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 10. Preguntas Frecuentes (FAQ) -->
<section class="section" style="background: var(--bg-alt); padding-top: 5rem; padding-bottom: 5rem;">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto 3.5rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Resolviendo Dudas Técnicas & Comerciales</span>
            <h2 style="font-size: clamp(2rem, 4vw, 2.5rem); color: var(--text-dark); margin-bottom: 0.75rem;">
                Preguntas Frecuentes sobre Bsale y WooCommerce
            </h2>
            <p style="color: var(--text-muted); font-size: 1.1rem;">
                Todo lo que necesitas saber sobre compatibilidad, sincronización de stock, facturación DTE y licenciamiento en Chile.
            </p>
        </div>

        <div style="max-width: 920px; margin: 0 auto; display: flex; flex-direction: column; gap: 1.25rem;">
            <!-- FAQ 1 -->
            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">1. ¿Se puede integrar Bsale con WooCommerce?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    <strong>Sí.</strong> WooCommerce puede conectarse con Bsale mediante una integración basada en la API REST oficial. Esto permite automatizar en tiempo real procesos críticos como el inventario multibodega, la creación de pedidos y la emisión de documentos tributarios (boletas y facturas DTE) según la configuración de cada tienda.
                </p>
            </div>

            <!-- FAQ 2 -->
            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">2. ¿Qué necesito para integrar Bsale con mi tienda WooCommerce?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    Necesitas una cuenta activa en Bsale con acceso a la API (token de acceso oficial) y una tienda WooCommerce operativa en WordPress 5.8+ o 6.x con PHP 7.4 a 8.3. En REW nos encargamos de la configuración técnica, mapeo de bodegas, homologación de catálogo y pruebas antes de pasar a producción.
                </p>
            </div>

            <!-- FAQ 3 -->
            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">3. ¿La integración sincroniza el stock en tiempo real?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    <strong>Sí, de forma inmediata.</strong> Si concretas una venta en tu local físico a través del punto de venta (POS) de Bsale, el stock de la tienda web se actualiza al instante. Del mismo modo, cuando un cliente compra online en WooCommerce, el inventario de Bsale se descuenta en el acto, eliminando compras de artículos agotados.
                </p>
            </div>

            <!-- FAQ 4 -->
            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">4. ¿Puedo utilizar varias bodegas de Bsale o elegir una sucursal específica?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    <strong>Sí.</strong> La integración permite asociar la tienda online a una bodega específica (por ejemplo, "Bodega Web" o "Casa Matriz"). También podemos configurar lógicas multibodega para consolidar stock de varias sucursales o gestionar retiro en tienda según los requerimientos de tu empresa.
                </p>
            </div>

            <!-- FAQ 5 -->
            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">5. ¿Funciona con productos variables (tallas, colores y modelos) de WooCommerce?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    <strong>Sí, 100% nativo y automático.</strong> Cada variación (por ejemplo: Polera Azul Talla M) se vincula a su SKU correspondiente en Bsale, descontando existencias de forma independiente y precisa sin necesidad de plugins complementarios ni cobros extra.
                </p>
            </div>

            <!-- FAQ 6 -->
            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">6. ¿WooCommerce puede emitir boletas electrónicas con Bsale?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    <strong>Sí.</strong> Al confirmarse el pago de la orden en WooCommerce, la integración envía los datos de la compra a Bsale, emitiendo la Boleta Electrónica legal timbrada ante el SII y adjuntando el PDF generado en el correo de confirmación de compra enviado al cliente.
                </p>
            </div>

            <!-- FAQ 7 -->
            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">7. ¿Permite emitir facturas electrónicas para empresas con RUT?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    <strong>Totalmente.</strong> El checkout de WooCommerce se adapta para solicitar los campos requeridos por el SII en Chile: RUT de empresa, Razón Social, Giro Comercial y Dirección Tributaria. Si el cliente elige factura, Bsale emite el DTE de factura afecto o exento de forma 100% automática.
                </p>
            </div>

            <!-- FAQ 8 -->
            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">8. ¿Cuánto cuesta integrar Bsale con WooCommerce?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    La solución empaquetada mediante el <strong>Plugin Bsale WooCommerce Sync Pro</strong> tiene un valor de <strong>$350.000 CLP como pago único (licencia vitalicia)</strong>. Las implementaciones personalizadas para empresas con ERPs externos o reglas multibodega complejas se cotizan a medida según los requerimientos técnicos del proyecto.
                </p>
            </div>

            <!-- FAQ 9 -->
            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">9. ¿Cuánto demora la implementación y puesta en marcha?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    Para una implementación estándar, el plazo promedio es de <strong>3 a 5 días hábiles</strong>, sujeto a la disponibilidad de credenciales API, homologación del catálogo y validación de documentos tributarios en ambiente de pruebas.
                </p>
            </div>

            <!-- FAQ 10 -->
            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">10. ¿La integración tiene cobros mensuales o costos por boleta?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    <strong>No. Cero costos mensuales ni cobros por documento emitido.</strong> La licencia del plugin es de pago único de por vida. Esto representa un ahorro de cientos de miles de pesos al año en comparación con plataformas SaaS que cobran mensualidades crecientes o comisiones por transacción.
                </p>
            </div>

            <!-- FAQ 11 -->
            <div class="card" style="padding: 1.75rem;">
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">11. ¿Puedo conectar Bsale y WooCommerce con otros sistemas o ERPs?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    <strong>Sí.</strong> Como especialistas en desarrollo e integración de software en Chile, podemos interconectar Bsale y WooCommerce con sistemas como Softland, Odoo, SAP, Defontana, CRMs propietarios y servicios de logística como Blue Express o Shipit.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 11. CTA Final de Contacto -->
<section class="section" style="background: #ffffff; padding-top: 5rem; padding-bottom: 5.5rem;">
    <div class="container">
        <div class="grid-2col-cta" style="align-items: center;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 1rem;">Atención Directa con Ingeniero</span>
                <h2 style="font-size: clamp(2rem, 4vw, 2.6rem); color: var(--text-dark); margin-bottom: 1.25rem; line-height: 1.2;">
                    ¿Listo para automatizar Bsale y WooCommerce? 🚀
                </h2>
                <p style="color: var(--text-body); font-size: 1.1rem; line-height: 1.7; margin-bottom: 1.75rem;">
                    Agenda una llamada técnica con <strong>Álvaro Valenzuela Valdés</strong>. Revisaremos tu catálogo, bodegas y configuraremos la integración perfecta para tu empresa en Chile.
                </p>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>📋 Solicitar Cotización de Integración</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, quiero consultar por la integración Bsale WooCommerce para mi negocio.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 WhatsApp Directo (+56 9 8726 1127)</span>
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

<!-- 12. Schema JSON-LD Structured Data for Bsale WooCommerce Integration -->
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "https://rew.cl/servicios/integracion-bsale-woocommerce",
      "url": "https://rew.cl/servicios/integracion-bsale-woocommerce",
      "name": "Integración Bsale con WooCommerce | Stock, Precios y DTE en Chile | REW",
      "description": "Integra Bsale con WooCommerce y sincroniza stock multibodega, productos, precios y variaciones en tiempo real. Boletas y facturas DTE ante el SII. Implementación en Chile.",
      "inLanguage": "es-CL",
      "breadcrumb": {
        "@id": "https://rew.cl/servicios/integracion-bsale-woocommerce#breadcrumb"
      },
      "mainEntity": {
        "@id": "https://rew.cl/servicios/integracion-bsale-woocommerce#service"
      }
    },
    {
      "@type": "BreadcrumbList",
      "@id": "https://rew.cl/servicios/integracion-bsale-woocommerce#breadcrumb",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Inicio",
          "item": "https://rew.cl"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Servicios",
          "item": "https://rew.cl/servicios"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "Integración Bsale WooCommerce",
          "item": "https://rew.cl/servicios/integracion-bsale-woocommerce"
        }
      ]
    },
    {
      "@type": "Service",
      "@id": "https://rew.cl/servicios/integracion-bsale-woocommerce#service",
      "name": "Integración Bsale con WooCommerce en Chile",
      "serviceType": "Integración ERP E-Commerce",
      "provider": {
        "@type": "ProfessionalService",
        "@id": "https://rew.cl/#organization",
        "name": "REW",
        "url": "https://rew.cl",
        "telephone": "+56987261127",
        "email": "alvaro@rew.cl"
      },
      "areaServed": {
        "@type": "Country",
        "name": "Chile"
      },
      "description": "Sincronización automática de inventario en tiempo real, catálogo con productos variables y boletas o facturas electrónicas DTE ante el SII entre Bsale y tiendas WooCommerce en Chile."
    },
    {
      "@type": "Product",
      "@id": "https://rew.cl/servicios/integracion-bsale-woocommerce#product",
      "name": "Plugin Bsale WooCommerce Sync Pro (Licencia Vitalicia)",
      "image": "https://rew.cl/images/products/plugin_bsale_woocommerce.webp",
      "description": "Plugin oficial de integración en tiempo real entre Bsale y WooCommerce. Stock multibodega, productos variables en automático y emisión automática de boletas/facturas DTE ante el SII. Licencia vitalicia de pago único.",
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
        "priceValidUntil": "2027-12-31",
        "itemCondition": "https://schema.org/NewCondition",
        "availability": "https://schema.org/InStock",
        "seller": {
          "@type": "Organization",
          "@id": "https://rew.cl/#organization",
          "name": "REW"
        }
      }
    },
    {
      "@type": "FAQPage",
      "@id": "https://rew.cl/servicios/integracion-bsale-woocommerce#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "¿Se puede integrar Bsale con WooCommerce?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Sí. WooCommerce puede conectarse con Bsale mediante una integración basada en la API REST oficial, permitiendo automatizar en tiempo real el inventario multibodega, los pedidos y la emisión de documentos tributarios DTE ante el SII."
          }
        },
        {
          "@type": "Question",
          "name": "¿Qué necesito para integrar Bsale con mi tienda WooCommerce?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Necesitas una cuenta activa en Bsale con acceso a la API (token oficial) y una tienda WooCommerce en WordPress 5.8+ con PHP 7.4 a 8.3. REW se encarga de la configuración técnica, mapeo de bodegas y homologación de catálogo."
          }
        },
        {
          "@type": "Question",
          "name": "¿La integración sincroniza el stock en tiempo real?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Sí, de forma inmediata. Si concretas una venta física en el POS de Bsale, el stock web se actualiza al instante. Del mismo modo, al comprar online en WooCommerce se descuenta el inventario en Bsale sin sobreventas."
          }
        },
        {
          "@type": "Question",
          "name": "¿Puedo utilizar varias bodegas de Bsale o elegir una sucursal específica?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Sí. Puedes asociar la tienda web a una bodega específica o configurar lógicas avanzadas para consolidar inventario de varias sucursales o retiro en tienda."
          }
        },
        {
          "@type": "Question",
          "name": "¿Funciona con productos variables (tallas, colores y modelos) de WooCommerce?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Sí, 100% nativo y automático. Cada variación se vincula a su SKU correspondiente en Bsale, descontando stock de forma independiente sin plugins adicionales."
          }
        },
        {
          "@type": "Question",
          "name": "¿WooCommerce puede emitir boletas electrónicas con Bsale?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Sí. Al confirmarse el pago del pedido en WooCommerce, la integración envía los datos a Bsale, timbra la Boleta Electrónica ante el SII y adjunta el PDF al correo del cliente."
          }
        },
        {
          "@type": "Question",
          "name": "¿Permite emitir facturas electrónicas para empresas con RUT?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Totalmente. El checkout recopila RUT, Razón Social, Giro Comercial y Dirección Tributaria para emitir automáticamente Facturas Electrónicas válidas ante el SII."
          }
        },
        {
          "@type": "Question",
          "name": "¿Cuánto cuesta integrar Bsale con WooCommerce?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "El Plugin Bsale WooCommerce Sync Pro tiene un valor de $350.000 CLP como pago único (licencia vitalicia). Los desarrollos personalizados a medida se cotizan según los requerimientos técnicos."
          }
        },
        {
          "@type": "Question",
          "name": "¿Cuánto demora la implementación y puesta en marcha?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "El plazo promedio de implementación estándar es de 3 a 5 días hábiles, incluyendo homologación de catálogo, mapeo y pruebas en ambiente de pruebas."
          }
        },
        {
          "@type": "Question",
          "name": "¿La integración tiene cobros mensuales o costos por boleta?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "No. Cero cobros mensuales ni pagos por documento emitido. La licencia es de pago único de por vida."
          }
        },
        {
          "@type": "Question",
          "name": "¿Puedo conectar Bsale y WooCommerce con otros sistemas o ERPs?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Sí. En REW desarrollamos conectores para enlazar Bsale y WooCommerce con ERPs como Softland, Odoo, SAP, Defontana o servicios de logística como Blue Express y Shipit."
          }
        }
      ]
    }
  ]
}
</script>
@endverbatim
@endsection
