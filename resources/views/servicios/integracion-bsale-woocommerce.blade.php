@extends('layouts.app')

@section('title', 'Integración Bsale con WooCommerce en Chile | Sincronización Automática & DTE | REW')
@section('meta_description', 'Conecta tu tienda WooCommerce con el ERP Bsale en Chile. Sincronización automática de stock en tiempo real, catálogo de productos y emisión de boletas y facturas electrónicas.')

@section('og_type', 'service')
@section('og_title', 'Integración Bsale con WooCommerce en Chile | REW')
@section('og_description', 'Sincroniza inventario, precios y boletas/facturas electrónicas automáticas entre Bsale y WooCommerce sin errores.')
@section('og_image', asset('images/logo.webp'))

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
                <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 2.5rem;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>🚀 Cotizar Integración Bsale</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, me interesa cotizar la integración de Bsale con WooCommerce para mi tienda.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 Hablar por WhatsApp</span>
                    </a>
                </div>
                <div style="display: flex; gap: 1.5rem; flex-wrap: wrap; font-size: 0.9rem; color: var(--text-muted);">
                    <div>✓ API REST Oficial Bsale</div>
                    <div>✓ Boleta y Factura DTE Automática</div>
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
            <p style="color: var(--text-body); font-size: 1.1rem;">Desarrollamos soluciones personalizadas que respetan tus listas de precios, bodegas y reglas de negocio sin depender de plugins de terceros lentos.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            <div class="card" style="padding: 2rem;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">📦</div>
                <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem;">Sincronización de Stock Multibodega</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                    Elige qué sucursal o bodega de Bsale alimenta tu tienda online. Si vendes en tu local físico, el stock web se actualiza automáticamente para evitar sobreventas.
                </p>
            </div>

            <div class="card" style="padding: 2rem;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🧾</div>
                <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem;">Emisión Automática de Boleta y Factura DTE</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                    Generación de Documentos Tributarios Electrónicos válidos ante el SII en Chile, adjuntando el PDF de la boleta directamente en el correo de confirmación de WooCommerce.
                </p>
            </div>

            <div class="card" style="padding: 2rem;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🏷️</div>
                <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem;">Listas de Precios & Variaciones</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6;">
                    Soporte para productos simples y variables (tallas, colores, SKUs) con sincronización bidireccional de precios normales y de oferta.
                </p>
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
                <h3 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.5rem;">¿Cuánto tarda la puesta en marcha?</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    La integración estándar toma entre 3 y 5 días hábiles, incluyendo pruebas en entorno sandbox, homologación de SKUs y validación de emisión de DTEs reales.
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
        }
      ]
    }
  ]
}
</script>
@endverbatim
@endsection
