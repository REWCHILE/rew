@extends('layouts.app')

@section('title', '📊 Implementación Odoo ERP en Chile: Facturación SII, Inventario & CRM | REW')
@section('meta_description', '🚀 Centraliza toda la gestión de tu empresa en una sola plataforma robusta, ágil y adaptada a la legislación chilena con consultores expertos.')

@section('og_type', 'service')
@section('og_title', '📊 Implementación Odoo ERP en Chile: Facturación Electrónica SII & Gestión | REW')
@section('og_description', '🚀 Consultoría e implantación de Odoo ERP con localización chilena: Facturación SII, inventario, CRM y contabilidad automatizada.')
@section('og_image', asset('images/services/software_casos_uso.webp'))

@section('content')
<!-- Hero Section -->
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%); padding-top: 5rem; padding-bottom: 4rem;">
    <div class="container">
        <!-- Breadcrumb -->
        <div style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}">Inicio</a> &nbsp;/&nbsp;
            <a href="{{ route('servicios.index') }}">Servicios</a> &nbsp;/&nbsp;
            <span style="color: var(--text-dark); font-weight: 600;">Implementación Odoo ERP Chile</span>
        </div>

        <div class="service-hero-grid">
            <div>
                <span class="badge badge-primary" style="margin-bottom: 1rem;">ERP & Transformación Digital</span>
                <h1 style="font-size: 3.2rem; margin-bottom: 1.25rem; line-height: 1.15; color: var(--text-dark);">
                    Implementación & Consultoría <span class="gradient-text">Odoo ERP en Chile</span> 🏢💼
                </h1>
                <p style="font-size: 1.2rem; color: var(--text-body); line-height: 1.65; margin-bottom: 2rem;">
                    Centraliza la gestión de tu empresa en un solo sistema modular y escalable. En <strong>REW</strong> implementamos <strong>Odoo Community y Enterprise</strong> con localización chilena completa: Facturación Electrónica SII, inventarios avanzados, compras, ventas, CRM y contabilidad automatizada.
                </p>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 2.5rem;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>🚀 Cotizar Implementación Odoo</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, me interesa consultar por la consultoría e implementación de Odoo ERP para mi empresa en Chile.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 Hablar por WhatsApp</span>
                    </a>
                </div>
                <div style="display: flex; gap: 1.5rem; flex-wrap: wrap; font-size: 0.9rem; color: var(--text-muted);">
                    <div>✓ Facturación Electrónica SII Chile</div>
                    <div>✓ Odoo Community & Enterprise</div>
                    <div>✓ Migración de Datos y Capacitación</div>
                </div>
            </div>

            <div class="card" style="padding: 2.5rem; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #ffffff; border-radius: var(--radius-xl); box-shadow: var(--shadow-2xl);">
                <div style="font-size: 0.85rem; font-weight: 800; color: var(--accent-gold); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.75rem;">
                    Módulos Especializados
                </div>
                <h3 style="color: #ffffff; font-size: 1.4rem; margin-bottom: 1.25rem;">
                    ¿Qué módulos implementamos en Odoo?
                </h3>
                <div style="display: flex; flex-direction: column; gap: 1rem; font-size: 0.92rem; color: #cbd5e1;">
                    <div style="display: flex; gap: 10px;">
                        <span style="color: var(--accent-gold); font-weight: bold;">✓</span>
                        <span><strong>Ventas & CRM:</strong> Pipeline comercial, cotizaciones y seguimiento de prospectos.</span>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <span style="color: var(--accent-gold); font-weight: bold;">✓</span>
                        <span><strong>Inventario & Bodegas:</strong> Trazabilidad por lotes, números de serie y transferencias internas.</span>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <span style="color: var(--accent-gold); font-weight: bold;">✓</span>
                        <span><strong>Facturación Electrónica SII:</strong> Emisión DTE, libros de compra/venta y cesión de facturas.</span>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <span style="color: var(--accent-gold); font-weight: bold;">✓</span>
                        <span><strong>E-Commerce & Pasarelas:</strong> Conexión con tiendas online y pasarelas chilenas (Webpay Plus).</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Proceso de Implementación -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div style="text-align: center; max-width: 750px; margin: 0 auto 3.5rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Metodología Probada</span>
            <h2 style="font-size: 2.4rem; color: var(--text-dark); margin-bottom: 1rem;">Nuestra Metodología de Implementación Odoo</h2>
            <p style="color: var(--text-body); font-size: 1.1rem;">Evitamos implementaciones eternas. Trabajamos con sprints ágiles para que tu equipo esté operando en tiempo récord.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem;">
            <div class="card" style="padding: 2rem;">
                <div style="font-size: 1.8rem; font-weight: 900; color: var(--primary); margin-bottom: 0.5rem;">01</div>
                <h3 style="font-size: 1.15rem; margin-bottom: 0.5rem;">Levantamiento & Alcance</h3>
                <p style="color: var(--text-muted); font-size: 0.88rem; line-height: 1.5;">
                    Mapeamos tus procesos actuales, flujos de aprobación y requerimientos de reportabilidad.
                </p>
            </div>

            <div class="card" style="padding: 2rem;">
                <div style="font-size: 1.8rem; font-weight: 900; color: var(--primary); margin-bottom: 0.5rem;">02</div>
                <h3 style="font-size: 1.15rem; margin-bottom: 0.5rem;">Parametrización & DTE</h3>
                <p style="color: var(--text-muted); font-size: 0.88rem; line-height: 1.5;">
                    Configuración de servidores en la nube, módulos, roles de usuario y conexión con el SII.
                </p>
            </div>

            <div class="card" style="padding: 2rem;">
                <div style="font-size: 1.8rem; font-weight: 900; color: var(--primary); margin-bottom: 0.5rem;">03</div>
                <h3 style="font-size: 1.15rem; margin-bottom: 0.5rem;">Migración de Datos</h3>
                <p style="color: var(--text-muted); font-size: 0.88rem; line-height: 1.5;">
                    Importación limpia de clientes, proveedores, catálogo con variantes y saldos de apertura.
                </p>
            </div>

            <div class="card" style="padding: 2rem;">
                <div style="font-size: 1.8rem; font-weight: 900; color: var(--primary); margin-bottom: 0.5rem;">04</div>
                <h3 style="font-size: 1.15rem; margin-bottom: 0.5rem;">Capacitación & Salida en Vivo</h3>
                <p style="color: var(--text-muted); font-size: 0.88rem; line-height: 1.5;">
                    Entrenamiento práctico a tus colaboradores y acompañamiento en el lanzamiento en producción.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Direct Contact Section -->
<section class="section" style="background: var(--bg-alt);">
    <div class="container">
        <div class="grid-2col-cta" style="align-items: center;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 1rem;">Consultoría de Ingeniería</span>
                <h2 style="font-size: 2.4rem; color: var(--text-dark); margin-bottom: 1.25rem; line-height: 1.2;">
                    ¿Buscas Asesoría para Implementar Odoo en Chile? 🚀
                </h2>
                <p style="color: var(--text-body); font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.75rem;">
                    Agenda una sesión estratégica con <strong>Álvaro Valenzuela Valdés</strong>. Evaluaremos si tu empresa necesita Odoo Community (cero costo de licencia) o Enterprise, y trazaremos un plan a tu medida.
                </p>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>📋 Solicitar Evaluación Odoo</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, quiero evaluar la implementación de Odoo ERP para mi empresa.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 WhatsApp Directo</span>
                    </a>
                </div>
            </div>

            <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-xl); padding: 2.25rem; text-align: center; box-shadow: var(--shadow-lg);">
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

<!-- Schema JSON-LD Structured Data for Odoo Service -->
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Service",
      "@id": "https://rew.cl/servicios/implementacion-odoo-chile#service",
      "name": "Implementación y Consultoría Odoo ERP en Chile",
      "serviceType": "Consultoría e Implementación ERP",
      "provider": {
        "@type": "ProfessionalService",
        "name": "REW",
        "url": "https://rew.cl",
        "telephone": "+56987261127",
        "email": "alvaro@rew.cl"
      },
      "areaServed": "CL",
      "description": "Consultoría e implementación de Odoo ERP en Chile con Facturación Electrónica SII, inventario, CRM y contabilidad para pymes y empresas."
    }
  ]
}
</script>
@endverbatim
@endsection
