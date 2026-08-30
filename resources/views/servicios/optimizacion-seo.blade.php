@extends('layouts.app')

@section('title', 'Agencia SEO Chile | Posicionamiento Web Rápido 2025 REW')
@section('meta_description', 'Agencia SEO Chile especializada en posicionamiento web. Aumenta tu visibilidad, tráfico y ventas con estrategias SEO personalizadas. Cotiza hoy.')

@section('og_title', 'Agencia SEO Chile | Posicionamiento Web Rápido 2025 REW')
@section('og_description', 'Agencia SEO en Chile especializada en posicionamiento web para empresas. Aumenta tráfico orgánico y conversiones con SEO técnico y estrategias a medida.')
@section('og_image', asset('images/services/seo_hero.webp'))

@section('content')
<!-- ==========================================================================
     HERO SECTION (AGENCIA SEO CHILE)
     ========================================================================== -->
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-alt) 100%); padding: 3.5rem 0 5rem; border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}" style="color: var(--text-muted); text-decoration: none;">Inicio</a>
            <span style="margin: 0 8px;">/</span>
            <a href="{{ route('servicios.index') }}" style="color: var(--text-muted); text-decoration: none;">Servicios</a>
            <span style="margin: 0 8px;">/</span>
            <span style="color: var(--primary); font-weight: 700;">Agencia SEO Chile</span>
        </nav>

        <div class="service-hero-grid">
            <!-- Left: Hero Copy -->
            <div>
                <div style="margin-bottom: 1.25rem;">
                    <span class="badge badge-pill-glow">
                        <span style="color: var(--accent-gold);">📈</span> Posicionamiento Orgánico • Google & Motores IA
                    </span>
                </div>

                <h1 style="font-size: clamp(2.3rem, 3.8vw, 3.3rem); font-weight: 900; line-height: 1.15; color: var(--text-dark); margin-bottom: 1.25rem;">
                    Agencia SEO en Chile: <span class="gradient-text">Posicionamiento Web para Empresas</span>
                </h1>

                <p style="font-size: 1.15rem; color: var(--text-body); line-height: 1.7; margin-bottom: 1.5rem;">
                    En <strong>REW somos una agencia SEO en Chile enfocada en resultados medibles</strong>, no en promesas genéricas. Ayudamos a empresas, pymes y ecommerce a liderar los primeros lugares de búsqueda en Google, aumentar tráfico orgánico calificado y generar más oportunidades reales de venta mediante estrategias sostenibles.
                </p>

                <!-- Value Highlights Grid -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 0.75rem; margin-bottom: 2.25rem;">
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Aparece frente a clientes con intención de compra</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Reduce la dependencia de publicidad pagada</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Optimización Core Web Vitals y Schema JSON-LD</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Visibilidad en Google y motores de IA (SearchGPT, Gemini)</span>
                    </div>
                </div>

                <!-- CTA Group -->
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>📈 Solicitar Auditoría SEO Gratuita</span>
                    </a>
                    <a href="https://calendly.com/satorisatorchile/rew?hide_event_type_details=1&hide_gdpr_banner=1" target="_blank" rel="noopener noreferrer" class="btn btn-gold btn-lg">
                        <span>📅 Agendar Sesión 20 min</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, me gustaría auditar el SEO de mi sitio web con REW.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 WhatsApp Directo</span>
                    </a>
                </div>
            </div>

            <!-- Right: Hero Media Spotlight -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/seo_hero.webp') }}" alt="Agencia SEO en Chile especializada en posicionamiento web" class="service-media-img" loading="eager" width="1404" height="1265">
                    
                    <div style="position: absolute; bottom: 1.5rem; left: 1.5rem; right: 1.5rem; background: rgba(15, 23, 42, 0.92); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.15); border-radius: 12px; padding: 1rem 1.25rem; color: #ffffff; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 700;">Impacto de Negocio</div>
                            <div style="font-size: 1.05rem; font-weight: 800; color: #38bdf8;">+180% Tráfico Orgánico</div>
                        </div>
                        <div style="text-align: right;">
                            <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 700;">Visibilidad Google</div>
                            <div style="font-size: 1.05rem; font-weight: 800; color: var(--accent-gold);">Top 1 Rankings ⭐</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     ¿POR QUÉ CONTRATAR UNA AGENCIA SEO EN CHILE?
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div style="max-width: 860px; margin: 0 auto 3.5rem; text-align: center;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Intención de Búsqueda</span>
            <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                ¿Por Qué Contratar una Agencia SEO en Chile?
            </h2>
            <p style="font-size: 1.15rem; color: var(--text-body); line-height: 1.7;">
                Hoy, <strong>más del 90% de las búsquedas de productos y servicios en Chile comienzan en Google</strong>. Si tu empresa no aparece en los primeros resultados orgánicos, estás perdiendo clientes calificados frente a tu competencia todos los días.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.75rem;">
            <div class="card spotlight-card" style="padding: 2rem; border-radius: var(--radius-xl); border: 1px solid var(--border-light); background: var(--bg-alt);">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🎯</div>
                <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.75rem;">Aparecer con Intención de Compra</h3>
                <p style="font-size: 0.95rem; color: var(--text-muted); line-height: 1.6; margin: 0;">
                    Posicionamos tu sitio frente a personas que buscan activamente tus servicios con necesidad inmediata, multiplicando la tasa de conversión en cotizaciones y ventas.
                </p>
            </div>

            <div class="card spotlight-card" style="padding: 2rem; border-radius: var(--radius-xl); border: 1px solid var(--border-light); background: var(--bg-alt);">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">📉</div>
                <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.75rem;">Bajar Dependencia de Anuncios</h3>
                <p style="font-size: 0.95rem; color: var(--text-muted); line-height: 1.6; margin: 0;">
                    El tráfico pagado cesa cuando se agota el presupuesto. El SEO genera un activo digital rentable que sigue trayendo visitas y prospectos 24/7 sin pagar por clic.
                </p>
            </div>

            <div class="card spotlight-card" style="padding: 2rem; border-radius: var(--radius-xl); border: 1px solid var(--border-light); background: var(--bg-alt);">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🏛️</div>
                <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.75rem;">Autoridad de Marca Sostenible</h3>
                <p style="font-size: 0.95rem; color: var(--text-muted); line-height: 1.6; margin: 0;">
                    Los usuarios confían significativamente más en los resultados orgánicos que en los anuncios publicitarios, consolidando la reputación de tu empresa como líder del rubro.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SERVICIOS SEO QUE OFRECEMOS EN CHILE
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div class="service-split-row">
            <!-- Left: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/seo_servicios.webp') }}" alt="Servicios SEO profesionales en Chile" class="service-media-img" loading="lazy">
                </div>
            </div>

            <!-- Right: 6 SEO Pillars -->
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Especialidades Técnicas</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    Servicios SEO que Ofrecemos en Chile
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.75rem;">
                    Ofrecemos servicios SEO profesionales adaptados a empresas de distintos tamaños y sectores industriales, siempre con foco en crecimiento orgánico y retorno de inversión.
                </p>

                <div style="display: grid; grid-template-columns: 1fr; gap: 1.15rem;">
                    <div style="background: #ffffff; padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid var(--primary); box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                        <h3 style="font-size: 1.12rem; margin-bottom: 0.35rem; color: var(--text-dark);">1. Auditoría SEO Profesional en Chile</h3>
                        <p style="font-size: 0.9rem; color: var(--text-muted); line-height: 1.6; margin: 0;">
                            Auditoría exhaustiva para detectar errores técnicos de rastreo, indexación, canibalización de palabras clave y mejoras rápidas de alto impacto en tu ranking.
                        </p>
                    </div>

                    <div style="background: #ffffff; padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid var(--accent-gold); box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                        <h3 style="font-size: 1.12rem; margin-bottom: 0.35rem; color: var(--text-dark);">2. SEO Técnico & Optimización Web</h3>
                        <p style="font-size: 0.9rem; color: var(--text-muted); line-height: 1.6; margin: 0;">
                            Aceleración de velocidad de carga, optimización de Core Web Vitals (LCP, INP, CLS), datos estructurados Schema JSON-LD y arquitectura limpia para Google.
                        </p>
                    </div>

                    <div style="background: #ffffff; padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid #10b981; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                        <h3 style="font-size: 1.12rem; margin-bottom: 0.35rem; color: var(--text-dark);">3. SEO On-Page & Contenido Optimizado</h3>
                        <p style="font-size: 0.9rem; color: var(--text-muted); line-height: 1.6; margin: 0;">
                            Redacción persuasiva, encabezados semánticos, intención de búsqueda e interlinking estratégico para posicionar términos como <em>servicio SEO Chile</em> y <em>posicionamiento web profesional</em>.
                        </p>
                    </div>

                    <div style="background: #ffffff; padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid #8b5cf6; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                        <h3 style="font-size: 1.12rem; margin-bottom: 0.35rem; color: var(--text-dark);">4. Link Building & Autoridad Off-Page</h3>
                        <p style="font-size: 0.9rem; color: var(--text-muted); line-height: 1.6; margin: 0;">
                            Estrategias de link building ético (White Hat) en medios de comunicación, blogs y sitios de alta autoridad de Chile y Latinoamérica para transferir confianza a tu dominio.
                        </p>
                    </div>

                    <div style="background: #ffffff; padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid #ec4899; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                        <h3 style="font-size: 1.12rem; margin-bottom: 0.35rem; color: var(--text-dark);">5. SEO Local en Chile & Santiago (Google Maps)</h3>
                        <p style="font-size: 0.9rem; color: var(--text-muted); line-height: 1.6; margin: 0;">
                            Optimización de tu ficha de Google Business Profile, reseñas y coherencia NAP para liderar el Local Pack de Google Maps y búsquedas geolocalizadas.
                        </p>
                    </div>

                    <div style="background: #ffffff; padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid #06b6d4; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                        <h3 style="font-size: 1.12rem; margin-bottom: 0.35rem; color: var(--text-dark);">6. SEO para Ecommerce & WooCommerce</h3>
                        <p style="font-size: 0.9rem; color: var(--text-muted); line-height: 1.6; margin: 0;">
                            Optimización de fichas de producto, categorías transaccionales, canonical tags y arquitectura de faceted navigation para incrementar ventas orgánicas sin gastar en anuncios.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     BENEFICIOS DE TRABAJAR CON REW
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div class="service-split-row reverse-mobile">
            <!-- Left: Value Points -->
            <div>
                <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Ventaja Competitiva</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    Beneficios de Trabajar con REW en Chile
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    Nos distinguimos por un modelo de trabajo 100% transparente y basado en ciencia de datos. No usamos trucos riesgosos que pongan en peligro tu dominio:
                </p>

                <div style="display: flex; flex-direction: column; gap: 1.15rem;">
                    <div style="display: flex; gap: 12px; align-items: flex-start;">
                        <div style="width: 34px; height: 34px; border-radius: 8px; background: rgba(79, 70, 229, 0.1); color: var(--primary); display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">📊</div>
                        <div>
                            <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">Resultados medibles con reportes ejecutivos claros</strong>
                            <span style="font-size: 0.92rem; color: var(--text-muted);">Informes mensuales de posiciones, impresiones, clics orgánicos y conversiones reales de negocio.</span>
                        </div>
                    </div>

                    <div style="display: flex; gap: 12px; align-items: flex-start;">
                        <div style="width: 34px; height: 34px; border-radius: 8px; background: rgba(16, 185, 129, 0.1); color: #10b981; display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">🔍</div>
                        <div>
                            <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">Transparencia total en métricas y accesos</strong>
                            <span style="font-size: 0.92rem; color: var(--text-muted);">Acceso directo a tus herramientas de analítica (Search Console, GA4, Semrush) con visibilidad completa.</span>
                        </div>
                    </div>

                    <div style="display: flex; gap: 12px; align-items: flex-start;">
                        <div style="width: 34px; height: 34px; border-radius: 8px; background: rgba(59, 130, 246, 0.1); color: #3b82f6; display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">⚡</div>
                        <div>
                            <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">Optimización continua según los algoritmos de Google</strong>
                            <span style="font-size: 0.92rem; color: var(--text-muted);">Alineamos continuamente tu sitio web a los últimos Core Updates y cambios en el algoritmo de búsqueda.</span>
                        </div>
                    </div>

                    <div style="display: flex; gap: 12px; align-items: flex-start;">
                        <div style="width: 34px; height: 34px; border-radius: 8px; background: rgba(245, 158, 11, 0.1); color: #f59e0b; display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">🧠</div>
                        <div>
                            <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">Ingeniería de software + Consultoría SEO avanzada</strong>
                            <span style="font-size: 0.92rem; color: var(--text-muted);">Trato directo con el Ingeniero Álvaro Valenzuela para resolver problemas de código a nivel raíz sin demoras.</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/seo_beneficios.webp') }}" alt="Beneficios de posicionamiento web con REW Chile" class="service-media-img" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SEO PARA EMPRESAS, PYMES & B2B
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div class="service-split-row">
            <!-- Left: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/seo_ai.webp') }}" alt="SEO para empresas y pymes con IA" class="service-media-img" loading="lazy">
                </div>
            </div>

            <!-- Right: Segments -->
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Segmentos Objetivo</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    SEO para Empresas y Pymes en Chile
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    Entendemos las necesidades de las empresas y pymes chilenas que buscan crecer sin depender exclusivamente de anuncios pagados. Aplicamos estrategias de SEO que generan tráfico calificado y fortalecen la marca a largo plazo:
                </p>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
                    <div style="background: #ffffff; padding: 1.25rem; border-radius: 10px; border: 1px solid var(--border-light);">
                        <strong style="color: var(--primary); display: block; font-size: 1.05rem; margin-bottom: 4px;">🏢 Empresas B2B</strong>
                        <span style="font-size: 0.88rem; color: var(--text-muted);">Generación de leads calificados y atracción de directores de compras corporativas.</span>
                    </div>

                    <div style="background: #ffffff; padding: 1.25rem; border-radius: 10px; border: 1px solid var(--border-light);">
                        <strong style="color: var(--primary); display: block; font-size: 1.05rem; margin-bottom: 4px;">📍 Negocios Locales</strong>
                        <span style="font-size: 0.88rem; color: var(--text-muted);">Posicionamiento en Santiago y regiones para captar clientes en su zona geográfica.</span>
                    </div>

                    <div style="background: #ffffff; padding: 1.25rem; border-radius: 10px; border: 1px solid var(--border-light);">
                        <strong style="color: var(--primary); display: block; font-size: 1.05rem; margin-bottom: 4px;">🛍️ Ecommerce</strong>
                        <span style="font-size: 0.88rem; color: var(--text-muted);">Captación de compradores para productos específicos en tiendas online y catálogos.</span>
                    </div>

                    <div style="background: #ffffff; padding: 1.25rem; border-radius: 10px; border: 1px solid var(--border-light);">
                        <strong style="color: var(--primary); display: block; font-size: 1.05rem; margin-bottom: 4px;">🚀 Pymes Competitivas</strong>
                        <span style="font-size: 0.88rem; color: var(--text-muted);">Estrategias de nicho y long-tail para competir exitosamente frente a grandes marcas.</span>
                    </div>
                </div>

                <a href="{{ route('contacto') }}" class="btn btn-primary">
                    <span>Cotizar Plan SEO para mi Empresa →</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     PROCESO DE POSICIONAMIENTO WEB (4 PILARES)
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div class="service-split-row reverse-mobile">
            <!-- Left: 4 Pillars Process -->
            <div>
                <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Metodología Probada</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    Nuestro Proceso de Posicionamiento Web
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.75rem;">
                    Nuestra metodología SEO se basa en cuatro pilares de ejecución continua que garantizan un crecimiento orgánico sostenido y una mejor rentabilidad:
                </p>

                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div style="background: var(--bg-alt); padding: 1rem 1.25rem; border-radius: 10px; border-left: 4px solid var(--primary);">
                        <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">1. Investigación de Palabras Clave (Keyword Research)</strong>
                        <span style="color: var(--text-muted); font-size: 0.92rem;">Detectamos las búsquedas más rentables con alta intención transaccional y volumen real.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1rem 1.25rem; border-radius: 10px; border-left: 4px solid var(--accent-gold);">
                        <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">2. Optimización Técnica & Core Web Vitals</strong>
                        <span style="color: var(--text-muted); font-size: 0.92rem;">Mejoramos la estructura de URLs, velocidad de renderizado, seguridad SSL y marcado Schema.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1rem 1.25rem; border-radius: 10px; border-left: 4px solid #10b981);">
                        <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">3. Contenido Estratégico & Optimización On-Page</strong>
                        <span style="color: var(--text-muted); font-size: 0.92rem;">Generamos textos y páginas de destino optimizadas que informan, educan y convierten visitas en leads.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1rem 1.25rem; border-radius: 10px; border-left: 4px solid #8b5cf6);">
                        <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">4. Link Building & Autoridad de Dominio</strong>
                        <span style="color: var(--text-muted); font-size: 0.92rem;">Potenciamos la autoridad de tu marca mediante enlaces de confianza en portales chilenos.</span>
                    </div>
                </div>
            </div>

            <!-- Right: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/seo_proceso.webp') }}" alt="Proceso de posicionamiento web en Google" class="service-media-img" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     CASOS DE ÉXITO & RECURSOS SEO PROFESIONAL
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div class="service-split-row">
            <!-- Left: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/seo_casos_exito.webp') }}" alt="Casos de éxito SEO en Chile" class="service-media-img" loading="lazy">
                </div>
            </div>

            <!-- Right: Success Cases -->
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Casos Reales</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    Casos de Éxito en Posicionamiento SEO en Chile
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    Hemos trabajado con empresas, ecommerce y negocios locales en Chile logrando incrementos consistentes de tráfico orgánico y ventas:
                </p>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
                    <div style="background: #ffffff; padding: 1.25rem; border-radius: 12px; text-align: center; border: 1px solid var(--border-light);">
                        <div style="font-size: 2rem; font-weight: 900; color: var(--primary);">+180%</div>
                        <div style="font-size: 0.88rem; color: var(--text-muted); font-weight: 600;">Incremento de Tráfico Orgánico</div>
                    </div>
                    <div style="background: #ffffff; padding: 1.25rem; border-radius: 12px; text-align: center; border: 1px solid var(--border-light);">
                        <div style="font-size: 2rem; font-weight: 900; color: #10b981;">Top 3</div>
                        <div style="font-size: 0.88rem; color: var(--text-muted); font-weight: 600;">En Palabras Clave Estratégicas</div>
                    </div>
                    <div style="background: #ffffff; padding: 1.25rem; border-radius: 12px; text-align: center; border: 1px solid var(--border-light);">
                        <div style="font-size: 2rem; font-weight: 900; color: var(--accent-gold);">+65%</div>
                        <div style="font-size: 0.88rem; color: var(--text-muted); font-weight: 600;">Aumento en Conversiones de Leads</div>
                    </div>
                </div>

                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    Combinamos analítica web, tecnología de código limpio y seguimiento diario de rankings para que los resultados sean estables frente a cualquier cambio algorítmico.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     GUÍA & RECURSOS DE SEO OFICIALES DE GOOGLE
     ========================================================================== -->
<section class="section" style="background: #0f172a; color: #ffffff;">
    <div class="container">
        <div class="service-split-row" style="align-items: center;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Estándares Internacionales</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: #ffffff;">
                    Recursos y Guía sobre SEO Profesional en Chile
                </h2>
                <p style="color: #cbd5e1; font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    En <strong>REW</strong> nos basamos estrictamente en las directrices oficiales de la <em>Guía SEO para Principiantes de Google</em> y en los estándares de rastreo e indexación de motores de búsqueda.
                </p>

                <div style="display: flex; flex-direction: column; gap: 0.85rem; margin-bottom: 2rem; font-size: 0.95rem; color: #e2e8f0;">
                    <div>✓ Auditoría técnica de indexación, robots.txt y sitemaps XML</div>
                    <div>✓ Optimización de velocidad bajo métricas Core Web Vitals (LCP, INP, CLS)</div>
                    <div>✓ Marcado estructurado Schema JSON-LD para resultados enriquecidos (Rich Snippets)</div>
                    <div>✓ Interlinking semántico con <a href="{{ route('servicios.desarrollo-web') }}" style="color: #38bdf8; text-decoration: underline;">desarrollo web</a>, <a href="{{ route('servicios.publicidad') }}" style="color: #38bdf8; text-decoration: underline;">publicidad digital</a> y <a href="{{ route('contacto') }}" style="color: #38bdf8; text-decoration: underline;">contacto</a></div>
                </div>

                <a href="https://developers.google.com/search/docs/fundamentals/seo-starter-guide" target="_blank" rel="nofollow noopener noreferrer" class="btn btn-outline" style="color: #ffffff; border-color: rgba(255,255,255,0.3);">
                    <span>📖 Consultar Guía Oficial de Google Developers ↗</span>
                </a>
            </div>

            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/seo_equipo.webp') }}" alt="Equipo de consultoría SEO en Chile" class="service-media-img" loading="lazy">
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
                    Preguntas Frecuentes sobre SEO en Chile
                </h2>
                <p style="color: var(--text-muted); font-size: 1.05rem;">
                    Todo lo que necesitas saber antes de iniciar una estrategia de posicionamiento web con REW:
                </p>
            </div>

            <div class="faq-accordion-list">
                <!-- FAQ 1 -->
                <div class="faq-card-item is-open">
                    <button type="button" class="faq-header-btn">
                        <span>¿En cuánto tiempo se ven los primeros resultados del SEO?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        El SEO es una inversión estratégica progresiva. Generalmente, las mejoras técnicas y correcciones de indexación impactan entre los primeros 30 a 60 días, mientras que el posicionamiento de palabras clave competitivas y el crecimiento sustancial de tráfico orgánico maduran entre los 3 y 6 meses.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-card-item">
                    <button type="button" class="faq-header-btn">
                        <span>¿Qué diferencia al SEO de la Publicidad en Google Ads?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        Google Ads requiere pagar por cada clic recibido y el tráfico desaparece al pausar la inversión. El SEO construye un activo orgánico duradero que sigue atrayendo clientes calificados sin costo por clic, logrando el menor Costo de Adquisición de Clientes (CAC) a mediano y largo plazo.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-card-item">
                    <button type="button" class="faq-header-btn">
                        <span>¿Hacen SEO técnico para WordPress, WooCommerce y Laravel?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        Sí. Al ser una agencia de ingeniería informática, optimizamos el código fuente directamente en Laravel, PHP, WordPress, WooCommerce, Shopify y plataformas a medida, resolviendo cuellos de botella de velocidad (Core Web Vitals), renderizado JS y Schema JSON-LD.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="faq-card-item">
                    <button type="button" class="faq-header-btn">
                        <span>¿Qué tipo de informes y reportes entrega REW?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        Entregamos informes mensuales claros y transparentes con evolución de rankings en Google, crecimiento de impresiones y clics en Search Console, comparativa de tráfico orgánico en GA4 y conversiones de leads generadas.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     AUDITORÍA SEO GRATUITA & AGENDAMIENTO CALENDLY
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div class="grid-2col-cta" style="align-items: center;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 1rem;">Diagnóstico Inicial Sin Costo</span>
                <h2 style="font-size: 2.4rem; color: var(--text-dark); margin-bottom: 1.25rem; line-height: 1.2;">
                    Solicita tu Auditoría SEO Gratuita 🚀
                </h2>
                <p style="color: var(--text-body); font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.75rem;">
                    Descubre el estado real de tu sitio web frente a Google y recibe un diagnóstico profesional con oportunidades claras de mejora técnica, palabras clave y contenido.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-bottom: 2rem; font-size: 0.95rem; color: var(--text-muted);">
                    <div>✓ Revisión de indexación y errores en Google Search Console</div>
                    <div>✓ Diagnóstico de velocidad Core Web Vitals en móviles y desktop</div>
                    <div>✓ Sesión de 20 minutos con el Ingeniero Álvaro Valenzuela</div>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="https://calendly.com/satorisatorchile/rew?hide_event_type_details=1&hide_gdpr_banner=1" target="_blank" rel="noopener noreferrer" class="btn btn-gold btn-lg">
                        <span>📅 Agendar en Calendly</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, quiero solicitar la auditoría SEO gratuita para mi sitio web.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 Hablar por WhatsApp</span>
                    </a>
                </div>
            </div>

            <div style="background: var(--bg-alt); border: 1px solid var(--border-light); border-radius: var(--radius-xl); padding: 2.25rem; text-align: center;">
                <img src="{{ asset('images/services/seo_auditoria.webp') }}" alt="Auditoría SEO profesional en Chile" style="width: 100%; max-height: 240px; object-fit: cover; border-radius: 12px; margin-bottom: 1.5rem;" loading="lazy">
                <h3 style="color: var(--text-dark); font-size: 1.35rem; margin-bottom: 0.5rem;">Álvaro Valenzuela Valdés</h3>
                <div style="color: var(--primary); font-size: 0.9rem; font-weight: 700; margin-bottom: 1.25rem;">Consultor SEO & Fundador de REW</div>
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

<!-- Schema JSON-LD Structured Data for SEO Service -->
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
        "jobTitle": "Ingeniero Informático & Consultor SEO"
      }
    },
    {
      "@type": "WebPage",
      "@id": "https://rew.cl/optimizacion-seo/#webpage",
      "url": "https://rew.cl/optimizacion-seo/",
      "name": "Agencia SEO Chile | Posicionamiento Web Rápido 2025 REW",
      "description": "Agencia SEO Chile especializada en posicionamiento web. Aumenta tu visibilidad, tráfico y ventas con estrategias SEO personalizadas. Cotiza hoy.",
      "isPartOf": {
        "@type": "WebSite",
        "@id": "https://rew.cl/#website"
      }
    },
    {
      "@type": "Service",
      "@id": "https://rew.cl/optimizacion-seo/#service",
      "name": "Agencia SEO en Chile",
      "serviceType": "Posicionamiento Web, SEO Técnico, SEO Local, SEO Ecommerce, Link Building",
      "description": "Agencia SEO en Chile especializada en posicionamiento web, SEO técnico, ecommerce y SEO local. Estrategias reales y medibles para empresas.",
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
      "@id": "https://rew.cl/optimizacion-seo/#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "¿En cuánto tiempo se ven los primeros resultados del SEO?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Generalmente, las optimizaciones técnicas impactan entre los primeros 30 a 60 días, mientras que el posicionamiento orgánico sustancial madura entre 3 y 6 meses."
          }
        },
        {
          "@type": "Question",
          "name": "¿Qué diferencia al SEO de la Publicidad en Google Ads?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Google Ads requiere pago por cada clic y se detiene al pausar el presupuesto. El SEO genera un activo digital propio que atrae visitas 24/7 sin pagar por clic."
          }
        },
        {
          "@type": "Question",
          "name": "¿Hacen SEO técnico para WordPress, WooCommerce y Laravel?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Sí, optimizamos directamente el código fuente en Laravel, WordPress, WooCommerce, Shopify y plataformas a medida, mejorando Core Web Vitals y Schema JSON-LD."
          }
        }
      ]
    }
  ]
}
</script>
@endverbatim
@endsection
