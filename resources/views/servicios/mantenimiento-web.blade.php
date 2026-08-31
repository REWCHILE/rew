@extends('layouts.app')

@section('title', '🛡️ Tu Web Blindada, Ultrarrápida y 100% Operativa 24/7 | Mantenimiento Web Profesional REW')
@section('meta_description', '🔒 Respaldos diarios en la nube, optimización de velocidad continua y protección contra hackeos para que tu empresa nunca pierda una venta.')

@section('og_title', '🛡️ Mantenimiento Web Profesional en Chile: Seguridad & Rendimiento 24/7 | REW')
@section('og_description', '🔒 Tu web segura, actualizada y rápida: Respaldos automáticos en la nube, monitoreo de caídas y soporte técnico prioritario.')
@section('og_image', asset('images/services/mantenimiento_hero.webp'))

@section('content')
<!-- ==========================================================================
     HERO SECTION (MANTENIMIENTO WEB CHILE)
     ========================================================================== -->
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-alt) 100%); padding: 3.5rem 0 5rem; border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}" style="color: var(--text-muted); text-decoration: none;">Inicio</a>
            <span style="margin: 0 8px;">/</span>
            <a href="{{ route('servicios.index') }}" style="color: var(--text-muted); text-decoration: none;">Servicios</a>
            <span style="margin: 0 8px;">/</span>
            <span style="color: var(--primary); font-weight: 700;">Mantenimiento Web</span>
        </nav>

        <div class="service-hero-grid">
            <!-- Left: Hero Copy -->
            <div>
                <div style="margin-bottom: 1.25rem;">
                    <span class="badge badge-pill-glow">
                        <span style="color: var(--accent-gold);">🛡️</span> Continuidad Operativa • Soporte Técnico & Ciberseguridad
                    </span>
                </div>

                <h1 style="font-size: clamp(2.3rem, 3.8vw, 3.3rem); font-weight: 900; line-height: 1.15; color: var(--text-dark); margin-bottom: 1.25rem;">
                    Mantenimiento Web Profesional en Chile: <span class="gradient-text">Seguridad y Soporte 24/7</span>
                </h1>

                <p style="font-size: 1.15rem; color: var(--text-body); line-height: 1.7; margin-bottom: 1.5rem;">
                    En <strong>REW cuidamos la infraestructura digital de tu empresa</strong>. Nuestro servicio de mantenimiento web en Chile está diseñado para que tu sitio corporativo, tienda online o plataforma Laravel funcione siempre rápida, segura y sin interrupciones ni caídas inesperadas.
                </p>

                <!-- Value Highlights Grid -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 0.75rem; margin-bottom: 2.25rem;">
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Actualizaciones Seguras:</strong> WordPress, PHP 8.3, plugins y temas sin errores</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Monitoreo y Antimalware:</strong> Protección activa contra ataques y hackeos</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Backups Diarios en la Nube:</strong> Copias externas con restauración en minutos</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Soporte Directo con Ingeniero:</strong> Atención rápida por WhatsApp y correo</span>
                    </div>
                </div>

                <!-- CTA Group -->
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>🛡️ Contratar Plan de Mantenimiento</span>
                    </a>
                    <a href="https://calendly.com/satorisatorchile/rew?hide_event_type_details=1&hide_gdpr_banner=1" target="_blank" rel="noopener noreferrer" class="btn btn-gold btn-lg">
                        <span>📅 Agendar Diagnóstico 20 min</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, necesito soporte y mantenimiento para mi sitio web con REW.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 WhatsApp Soporte</span>
                    </a>
                </div>
            </div>

            <!-- Right: Hero Media Spotlight -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/mantenimiento_hero.webp') }}" alt="Mantenimiento web profesional en Chile" class="service-media-img" loading="eager" width="1404" height="1265">
                    
                    <div style="position: absolute; bottom: 1.5rem; left: 1.5rem; right: 1.5rem; background: rgba(15, 23, 42, 0.92); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.15); border-radius: 12px; padding: 1rem 1.25rem; color: #ffffff; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 700;">Disponibilidad Garantizada</div>
                            <div style="font-size: 1.05rem; font-weight: 800; color: #10b981;">99.9% Uptime Monitoreado</div>
                        </div>
                        <div style="text-align: right;">
                            <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 700;">Copias de Seguridad</div>
                            <div style="font-size: 1.05rem; font-weight: 800; color: var(--accent-gold);">Backups Diarios Cloud ☁️</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     ¿QUÉ INCLUYE NUESTRO SERVICIO DE MANTENIMIENTO WEB?
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div class="service-split-row reverse-mobile">
            <!-- Left: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/mantenimiento_servicios.webp') }}" alt="Servicios de mantenimiento web WordPress y servidores" class="service-media-img" loading="lazy">
                </div>
            </div>

            <!-- Right: Feature List -->
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Cobertura Integral</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    ¿Qué Incluye Nuestro Servicio de Mantenimiento Web?
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.75rem;">
                    Nos encargamos de toda la gestión técnica y preventiva de tu sitio web para que nunca pierdas clientes por lentitud, errores de código o problemas de seguridad:
                </p>

                <div style="display: grid; grid-template-columns: 1fr; gap: 1.15rem;">
                    <div style="background: var(--bg-alt); padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid var(--primary); box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                        <strong style="color: var(--text-dark); display: block; font-size: 1.05rem; margin-bottom: 2px;">1. Actualizaciones de WordPress, Plugins y Temas</strong>
                        <span style="font-size: 0.9rem; color: var(--text-muted);">Actualización segura y supervisada con entornos de prueba (staging) para prevenir incompatibilidades o caídas.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid #10b981; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                        <strong style="color: var(--text-dark); display: block; font-size: 1.05rem; margin-bottom: 2px;">2. Monitoreo de Seguridad & Protección Anti-Malware</strong>
                        <span style="font-size: 0.9rem; color: var(--text-muted);">Escaneo continuo de vulnerabilidades, configuración de WAF (Firewall), protección contra fuerza bruta y parches SSL.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid var(--accent-gold); box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                        <strong style="color: var(--text-dark); display: block; font-size: 1.05rem; margin-bottom: 2px;">3. Copias de Seguridad Automáticas Diarias</strong>
                        <span style="font-size: 0.9rem; color: var(--text-muted);">Respaldos completos cifrados en servidores cloud externos (AWS / Google Cloud) listos para restauración inmediata.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid #8b5cf6; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                        <strong style="color: var(--text-dark); display: block; font-size: 1.05rem; margin-bottom: 2px;">4. Optimización de Rendimiento & Core Web Vitals</strong>
                        <span style="font-size: 0.9rem; color: var(--text-muted);">Limpieza de base de datos, optimización de caché, compresión de imágenes WebP y aceleración de carga para Google.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid #06b6d4; box-shadow: 0 2px 8px rgba(0,0,0,0.02);">
                        <strong style="color: var(--text-dark); display: block; font-size: 1.05rem; margin-bottom: 2px;">5. Soporte Técnico Ante Errores, Caídas o Ajustes</strong>
                        <span style="font-size: 0.9rem; color: var(--text-muted);">Tiempo de respuesta prioritario ante incidentes, resolución de bugs de código y soporte directo con el Ingeniero Álvaro Valenzuela Valdés.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     ¿POR QUÉ ES IMPORTANTE EL MANTENIMIENTO WEB?
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div class="service-split-row">
            <!-- Left: Why it matters -->
            <div>
                <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Prevención & Continuidad</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    ¿Por Qué es Crucial el Mantenimiento Web Preventivo?
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    Trabajamos con empresas, pymes y ecommerce en Chile que necesitan estabilidad operativa, soporte técnico y protección de datos. Un sitio web desatendido representa riesgos graves para el negocio:
                </p>

                <div style="display: flex; flex-direction: column; gap: 1rem; margin-bottom: 2rem;">
                    <div style="display: flex; gap: 14px; align-items: flex-start;">
                        <div style="width: 36px; height: 36px; border-radius: 8px; background: rgba(239, 68, 68, 0.1); color: #ef4444; display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">⚠️</div>
                        <div>
                            <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">Vulnerabilidades y Hackeos</strong>
                            <span style="font-size: 0.92rem; color: var(--text-muted);">El 80% de los ataques a sitios web ocurren por plugins o versiones de CMS desactualizadas con fallos conocidos.</span>
                        </div>
                    </div>

                    <div style="display: flex; gap: 14px; align-items: flex-start;">
                        <div style="width: 36px; height: 36px; border-radius: 8px; background: rgba(245, 158, 11, 0.1); color: #f59e0b; display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">📉</div>
                        <div>
                            <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">Pérdida de Posicionamiento SEO en Google</strong>
                            <span style="font-size: 0.92rem; color: var(--text-muted);">Google penaliza sitios con caídas recurrentes, enlaces rotos o lentitud excesiva, degradando el ranking orgánico.</span>
                        </div>
                    </div>

                    <div style="display: flex; gap: 14px; align-items: flex-start;">
                        <div style="width: 36px; height: 36px; border-radius: 8px; background: rgba(16, 185, 129, 0.1); color: #10b981; display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">🛡️</div>
                        <div>
                            <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">Tranquilidad y Respaldo Total</strong>
                            <span style="font-size: 0.92rem; color: var(--text-muted);">Saber que ante cualquier problema imprevisto, tu equipo cuenta con ingenieros listos para restaurar la operación en minutos.</span>
                        </div>
                    </div>
                </div>

                <a href="{{ route('contacto') }}" class="btn btn-primary">
                    <span>Solicitar Diagnóstico de Mi Sitio Web →</span>
                </a>
            </div>

            <!-- Right: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/mantenimiento_importancia.webp') }}" alt="Importancia del mantenimiento web preventivo" class="service-media-img" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     MANTENIMIENTO WEB PARA EMPRESAS EN CHILE (SEGMENTOS)
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div class="service-split-row reverse-mobile">
            <!-- Left: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/mantenimiento_empresas.webp') }}" alt="Mantenimiento web para empresas en Chile" class="service-media-img" loading="lazy">
                </div>
            </div>

            <!-- Right: Enterprise Segments -->
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Soluciones Adaptadas</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    Mantenimiento Web para Empresas y Pymes en Chile
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.75rem;">
                    Brindamos planes a la medida según la complejidad de la plataforma tecnológica de tu negocio:
                </p>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
                    <div style="background: var(--bg-alt); padding: 1.25rem; border-radius: 12px; border: 1px solid var(--border-light);">
                        <strong style="color: var(--primary); display: block; font-size: 1.05rem; margin-bottom: 4px;">🏢 Sitios Corporativos</strong>
                        <span style="font-size: 0.88rem; color: var(--text-muted);">WordPress y Elementor con formularios de contacto protegidos contra spam y alta disponibilidad.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1.25rem; border-radius: 12px; border: 1px solid var(--border-light);">
                        <strong style="color: var(--primary); display: block; font-size: 1.05rem; margin-bottom: 4px;">🛍️ Tiendas WooCommerce</strong>
                        <span style="font-size: 0.88rem; color: var(--text-muted);">Mantenimiento de pasarelas de pago (Webpay, Mercado Pago), base de datos de pedidos y catálogo.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1.25rem; border-radius: 12px; border: 1px solid var(--border-light);">
                        <strong style="color: var(--primary); display: block; font-size: 1.05rem; margin-bottom: 4px;">⚙️ Plataformas Laravel & SaaS</strong>
                        <span style="font-size: 0.88rem; color: var(--text-muted);">Mantenimiento de bases de datos MySQL/PostgreSQL, colas de trabajo (queues) y APIs REST.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1.25rem; border-radius: 12px; border: 1px solid var(--border-light);">
                        <strong style="color: var(--primary); display: block; font-size: 1.05rem; margin-bottom: 4px;">🖥️ Servidores Linux & VPS</strong>
                        <span style="font-size: 0.88rem; color: var(--text-muted);">Administración de servidores Ubuntu/Debian, configuración Nginx/Apache, SSL y parches del kernel.</span>
                    </div>
                </div>

                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary">
                        <span>Cotizar Mantenimiento Mensual</span>
                    </a>
                    <a href="{{ route('servicios.soporte-wordpress') }}" class="btn btn-outline">
                        <span>Ver Soporte WordPress Especializado →</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     PREGUNTAS FRECUENTES (FAQ INTERACTIVO)
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Resolución de Dudas</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1rem; color: var(--text-dark);">
                    Preguntas Frecuentes sobre Mantenimiento Web
                </h2>
                <p style="color: var(--text-muted); font-size: 1.05rem;">
                    Conoce cómo cuidamos y protegemos la presencia online de tu empresa:
                </p>
            </div>

            <div class="faq-accordion-list">
                <!-- FAQ 1 -->
                <div class="faq-card-item is-open">
                    <button type="button" class="faq-header-btn">
                        <span>¿Hacen mantenimiento a sitios web creados por otros desarrolladores?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        Sí. Realizamos una auditoría inicial del código y el servidor para verificar el estado de los plugins, temas y base de datos, solucionando errores heredados antes de integrar el sitio a nuestro sistema de monitoreo continuo.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-card-item">
                    <button type="button" class="faq-header-btn">
                        <span>¿Qué sucede si mi sitio sufre una caída o un ataque informático?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        Nuestro sistema de monitoreo nos alerta al instante. Contamos con copias de seguridad externas diarias para restaurar la web a su estado óptimo en minutos, aislar la vulnerabilidad y aplicar los parches de seguridad requeridos.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-card-item">
                    <button type="button" class="faq-header-btn">
                        <span>¿El plan de mantenimiento incluye horas para cambios de contenido?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        Sí, nuestros planes incluyen horas mensuales dedicadas para actualización de textos, subida de nuevos productos o imágenes, creación de banners y ajustes menores que tu negocio requiera.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="faq-card-item">
                    <button type="button" class="faq-header-btn">
                        <span>¿Cómo es la comunicación ante urgencias técnicas?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        Tienes canal directo vía WhatsApp y correo con el Ingeniero Álvaro Valenzuela Valdés y nuestro equipo técnico, garantizando tiempos de respuesta prioritarios para emergencias críticas.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     EVALUACIÓN GRATUITA & AGENDAMIENTO CALENDLY
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div class="grid-2col-cta" style="align-items: center;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 1rem;">Evaluación Sin Costo</span>
                <h2 style="font-size: 2.4rem; color: var(--text-dark); margin-bottom: 1.25rem; line-height: 1.2;">
                    ¿Necesitas Mantenimiento Web Profesional? 🚀
                </h2>
                <p style="color: var(--text-body); font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.75rem;">
                    Solicita una evaluación gratuita y mantén tu sitio web seguro, actualizado y optimizado todo el año con <strong>REW</strong>.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-bottom: 2rem; font-size: 0.95rem; color: var(--text-muted);">
                    <div>✓ Auditoría técnica de seguridad y versiones desactualizadas</div>
                    <div>✓ Diagnóstico de velocidad y estado del hosting / servidor</div>
                    <div>✓ Sesión de 20 minutos con el Ingeniero Álvaro Valenzuela Valdés</div>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="https://calendly.com/satorisatorchile/rew?hide_event_type_details=1&hide_gdpr_banner=1" target="_blank" rel="noopener noreferrer" class="btn btn-gold btn-lg">
                        <span>📅 Agendar en Calendly</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, quiero una evaluación gratuita de mantenimiento web para mi empresa.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 Hablar por WhatsApp</span>
                    </a>
                </div>
            </div>

            <div style="background: var(--bg-alt); border: 1px solid var(--border-light); border-radius: var(--radius-xl); padding: 2.25rem; text-align: center; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                <img src="{{ asset('images/services/mantenimiento_cta.webp') }}" alt="Mantenimiento web y soporte técnico REW" style="width: 100%; max-height: 240px; object-fit: cover; border-radius: 12px; margin-bottom: 1.5rem;" loading="lazy">
                <h3 style="color: var(--text-dark); font-size: 1.35rem; margin-bottom: 0.5rem;">Álvaro Valenzuela Valdés</h3>
                <div style="color: var(--primary); font-size: 0.9rem; font-weight: 700; margin-bottom: 1.25rem;">Ingeniero Informático & Fundador de REW</div>
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; margin-bottom: 1.5rem;">
                    📍 Santiago, Providencia, Chile<br>
                    ✉️ <a href="mailto:alvaro@rew.cl" style="color: var(--text-dark); text-decoration: underline;">alvaro@rew.cl</a><br>
                    📱 <a href="tel:+56987261127" style="color: #25d366; font-weight: 700;">+56 9 8726 1127</a>
                </p>
                <a href="{{ route('contacto') }}" class="btn btn-primary" style="width: 100%;">
                    <span>Ir al Formulario de Contacto & Cotizador</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Schema JSON-LD Structured Data for Mantenimiento Web Service -->
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Place",
      "@id": "https://rew.cl/#place",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Villagra 070",
        "addressLocality": "Providencia",
        "addressRegion": "Metropolitana",
        "addressCountry": "CL"
      }
    },
    {
      "@type": "Organization",
      "@id": "https://rew.cl/#organization",
      "name": "REW",
      "url": "https://rew.cl",
      "email": "alvaro@rew.cl",
      "telephone": "+56987261127",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Villagra 070",
        "addressLocality": "Providencia",
        "addressRegion": "Metropolitana",
        "addressCountry": "CL"
      },
      "founder": {
        "@type": "Person",
        "name": "Álvaro Valenzuela Valdés",
        "jobTitle": "Ingeniero Informático"
      }
    },
    {
      "@type": "WebPage",
      "@id": "https://rew.cl/mantenimiento-web/#webpage",
      "url": "https://rew.cl/mantenimiento-web/",
      "name": "Mantenimiento Web Profesional En Chile | WordPress Y Soporte Técnico",
      "description": "Servicio de mantenimiento web en Chile. Actualizaciones, seguridad, respaldos y soporte técnico para sitios WordPress empresariales y Servidores Linux.",
      "isPartOf": {
        "@type": "WebSite",
        "@id": "https://rew.cl/#website"
      }
    },
    {
      "@type": "Service",
      "@id": "https://rew.cl/mantenimiento-web/#service",
      "name": "Mantenimiento Web Profesional en Chile",
      "serviceType": "Mantenimiento y soporte técnico de sitios web, WordPress, Laravel y Servidores Linux",
      "description": "Servicio de mantenimiento web en Chile para empresas. Actualizaciones seguras, parches de seguridad, respaldos diarios y optimización continua.",
      "provider": {
        "@id": "https://rew.cl/#organization"
      },
      "areaServed": "Chile",
      "offers": {
        "@type": "Offer",
        "availability": "https://schema.org/InStock"
      }
    },
    {
      "@type": "FAQPage",
      "@id": "https://rew.cl/mantenimiento-web/#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "¿Hacen mantenimiento a sitios web creados por otros desarrolladores?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Sí. Realizamos una auditoría inicial del código y servidor para solucionar errores heredados antes de integrarlo a nuestro monitoreo."
          }
        },
        {
          "@type": "Question",
          "name": "¿Qué sucede si mi sitio sufre una caída o un ataque informático?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Nuestro monitoreo alerta al instante. Contamos con copias de seguridad cloud diarias para restaurar la web en minutos y aplicar los parches necesarios."
          }
        }
      ]
    }
  ]
}
</script>
@endverbatim
@endsection
