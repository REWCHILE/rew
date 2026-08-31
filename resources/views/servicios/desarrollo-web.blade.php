@extends('layouts.app')

@section('title', '💻 Sitios Web que Facturan de Verdad | Desarrollo Web Ultraligero & High-Conversion en Chile')
@section('meta_description', '🚀 Deja atrás los sitios lentos y genéricos. Diseñamos webs optimizadas para posicionar en Google, cargar en menos de 1s y multiplicar tus clientes.')

@section('og_title', '💻 Sitios Web que Facturan de Verdad | Desarrollo Web en Chile - REW')
@section('og_description', '🚀 Deja atrás las plantillas lentas. Creamos sitios optimizados para posicionar en Google y convertir visitas en clientes con Core Web Vitals en verde.')
@section('og_image', asset('images/services/desarrollo_web_hero.webp'))

@section('content')
<!-- ==========================================================================
     HERO SECTION (DESARROLLO WEB CHILE)
     ========================================================================== -->
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-alt) 100%); padding: 3.5rem 0 5rem; border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}" style="color: var(--text-muted); text-decoration: none;">Inicio</a>
            <span style="margin: 0 8px;">/</span>
            <a href="{{ route('servicios.index') }}" style="color: var(--text-muted); text-decoration: none;">Servicios</a>
            <span style="margin: 0 8px;">/</span>
            <span style="color: var(--primary); font-weight: 700;">Desarrollo Web Chile</span>
        </nav>

        <div class="service-hero-grid">
            <!-- Left: Value Proposition -->
            <div>
                <div style="margin-bottom: 1.25rem;">
                    <span class="badge badge-pill-glow">
                        <span style="color: var(--accent-gold);">⚡</span> Ingeniería Web & Posicionamiento en Google • Chile
                    </span>
                </div>

                <h1 style="font-size: clamp(2.4rem, 4vw, 3.4rem); font-weight: 900; line-height: 1.15; color: var(--text-dark); margin-bottom: 1.25rem;">
                    Desarrollo Web Chile: Sitios Rápidos, Modernos y <span class="gradient-text">Optimizados para Ventas</span>
                </h1>

                <p style="font-size: 1.15rem; color: var(--text-body); line-height: 1.7; margin-bottom: 2rem;">
                    ¿Listo para potenciar tu presencia en línea? En <strong>REW</strong> desarrollamos sitios web y aplicaciones web a medida con arquitectura limpia, velocidad de carga instantánea y optimización SEO técnica on-page para asegurar los primeros lugares en Google.
                </p>

                <!-- Value Highlights -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 0.75rem; margin-bottom: 2.25rem;">
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Diseño UX/UI 100% personalizado</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Optimización SEO técnica con Rank Math</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Integración con WhatsApp & Redes</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Hosting VPS, mantenimiento y soporte</span>
                    </div>
                </div>

                <!-- CTA Group -->
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>🚀 Cotizar Desarrollo Web</span>
                    </a>
                    <a href="https://calendly.com/satorisatorchile/rew?hide_event_type_details=1&hide_gdpr_banner=1" target="_blank" rel="noopener noreferrer" class="btn btn-gold btn-lg">
                        <span>📅 Agendar Sesión 20 min</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, quiero consultar por el servicio de Desarrollo Web para mi empresa.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 WhatsApp</span>
                    </a>
                </div>
            </div>

            <!-- Right: Hero Visual Media -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/desarrollo_web_hero.webp') }}" alt="Desarrollo web chile profesional" class="service-media-img" loading="eager" width="1600" height="1280">
                    
                    <div style="position: absolute; bottom: 1.5rem; left: 1.5rem; right: 1.5rem; background: rgba(15, 23, 42, 0.88); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.15); border-radius: 12px; padding: 1rem 1.25rem; color: #ffffff; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 700;">Google Core Web Vitals</div>
                            <div style="font-size: 1.1rem; font-weight: 800; color: #34d399;">Score 99/100 (Verde)</div>
                        </div>
                        <div style="text-align: right;">
                            <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 700;">Tiempo de Carga</div>
                            <div style="font-size: 1.1rem; font-weight: 800; color: var(--accent-gold);">&lt; 0.5s ⚡</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     PROCESO METODOLÓGICO DE DESARROLLO WEB
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div class="service-split-row">
            <!-- Left: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/desarrollo_web_proceso.webp') }}" alt="Proceso de desarrollo web en Chile" class="service-media-img" loading="lazy">
                </div>
            </div>

            <!-- Right: Content -->
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Metodología Probada</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    Nuestro Proceso de Desarrollo Web
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    Trabajamos con un flujo claro y estructurado para asegurar resultados medibles: análisis profundo del modelo de negocio, arquitectura de la información, diseño UI contemporáneo, programación limpia, optimización extrema de rendimiento y SEO técnico.
                </p>

                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div style="background: var(--bg-alt); padding: 1rem 1.25rem; border-radius: 12px; border-left: 4px solid var(--primary);">
                        <strong style="color: var(--text-dark); display: block; margin-bottom: 4px;">1. Brief y Objetivos Comerciales</strong>
                        <span style="font-size: 0.92rem; color: var(--text-muted);">Levantamiento exhaustivo de requerimientos, propuesta de valor y público objetivo.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1rem 1.25rem; border-radius: 12px; border-left: 4px solid var(--accent-gold);">
                        <strong style="color: var(--text-dark); display: block; margin-bottom: 4px;">2. Mapa del Sitio y Copywriting SEO</strong>
                        <span style="font-size: 0.92rem; color: var(--text-muted);">Estructura semántica de URLs, palabras clave transaccionales y textos persuasivos.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1rem 1.25rem; border-radius: 12px; border-left: 4px solid #10b981;">
                        <strong style="color: var(--text-dark); display: block; margin-bottom: 4px;">3. Diseño UX/UI Mobile-First</strong>
                        <span style="font-size: 0.92rem; color: var(--text-muted);">Prototipado en Figma adaptado a móviles, tablets y pantallas de escritorio.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1rem 1.25rem; border-radius: 12px; border-left: 4px solid #3b82f6;">
                        <strong style="color: var(--text-dark); display: block; margin-bottom: 4px;">4. Desarrollo Limpio y Escalable</strong>
                        <span style="font-size: 0.92rem; color: var(--text-muted);">Programación en Laravel / WordPress con estándares de ingeniería modernos.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1rem 1.25rem; border-radius: 12px; border-left: 4px solid #8b5cf6;">
                        <strong style="color: var(--text-dark); display: block; margin-bottom: 4px;">5. Core Web Vitals y Analítica</strong>
                        <span style="font-size: 0.92rem; color: var(--text-muted);">Métricas en verde en Google PageSpeed, GA4 y seguimiento de conversiones listo.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     PLANES Y PRECIOS TRANSPARENTES
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div style="text-align: center; max-width: 750px; margin: 0 auto 3rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Inversión Transparente</span>
            <h2 style="font-size: 2.4rem; margin-bottom: 1rem;">Planes y Precios de Desarrollo Web</h2>
            <p style="color: var(--text-muted); font-size: 1.1rem;">
                Ofrecemos alternativas ajustadas según el alcance, nivel de personalización y tiempos de entrega de tu proyecto.
            </p>
        </div>

        <div class="service-plans-grid">
            <!-- Plan 1: Emprende -->
            <div class="service-plan-card spotlight-card">
                <div>
                    <h3 style="font-size: 1.4rem; margin-bottom: 0.5rem; color: var(--text-dark);">Plan Emprende</h3>
                    <p style="color: var(--text-muted); font-size: 0.92rem; min-height: 44px;">
                        Landing page de alta conversión para validar servicios, captar prospectos y vender rápidamente.
                    </p>
                    <hr style="border: 0; border-top: 1px solid var(--border-light); margin: 1.5rem 0;">
                    
                    <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-bottom: 2rem;">
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Landing Page One-Page de Alto Impacto</span>
                        </div>
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Diseño 100% Adaptable a Móviles</span>
                        </div>
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Botón flotante de WhatsApp y llamada directa</span>
                        </div>
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Formulario con aviso automático al correo</span>
                        </div>
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Optimización SEO básica y Google Indexación</span>
                        </div>
                    </div>
                </div>

                <a href="{{ route('contacto') }}?plan=emprende" class="btn btn-outline" style="width: 100%; text-align: center;">
                    <span>Cotizar Plan Emprende →</span>
                </a>
            </div>

            <!-- Plan 2: Empresa (Destacado) -->
            <div class="service-plan-card featured spotlight-card">
                <span class="service-plan-badge">MÁS POPULAR</span>
                <div>
                    <h3 style="font-size: 1.4rem; margin-bottom: 0.5rem; color: var(--text-dark);">Plan Empresa</h3>
                    <p style="color: var(--text-muted); font-size: 0.92rem; min-height: 44px;">
                        Sitio web corporativo completo, diseñado para posicionar la autoridad de tu marca en Google.
                    </p>
                    <hr style="border: 0; border-top: 1px solid var(--border-light); margin: 1.5rem 0;">

                    <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-bottom: 2rem;">
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Hasta 6 a 8 Secciones Institucionales</span>
                        </div>
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Módulo de Blog / Noticias con SEO On-Page</span>
                        </div>
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Optimización Avanzada con Rank Math & Schema</span>
                        </div>
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Velocidad Ultra Rápida con Cacheo y WebP</span>
                        </div>
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Capacitación en video para administrar contenidos</span>
                        </div>
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Soporte prioritario post-lanzamiento</span>
                        </div>
                    </div>
                </div>

                <a href="{{ route('contacto') }}?plan=empresa" class="btn btn-primary" style="width: 100%; text-align: center;">
                    <span>Cotizar Plan Empresa →</span>
                </a>
            </div>

            <!-- Plan 3: eCommerce -->
            <div class="service-plan-card spotlight-card">
                <div>
                    <h3 style="font-size: 1.4rem; margin-bottom: 0.5rem; color: var(--text-dark);">Plan eCommerce</h3>
                    <p style="color: var(--text-muted); font-size: 0.92rem; min-height: 44px;">
                        Tienda online potente con catálogo autogestionable y pasarelas de pago chilenas integradas.
                    </p>
                    <hr style="border: 0; border-top: 1px solid var(--border-light); margin: 1.5rem 0;">

                    <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-bottom: 2rem;">
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Tienda WooCommerce o Laravel Commerce</span>
                        </div>
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Integración Webpay Plus (Transbank), Mercado Pago o Flow</span>
                        </div>
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Cálculo automático de envíos (Starken, Blue Express)</span>
                        </div>
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Carrito de compras lateral optimizado para conversión</span>
                        </div>
                        <div class="service-feature-item">
                            <span class="service-feature-check">✓</span>
                            <span>Control de inventario, cupones y variantes</span>
                        </div>
                    </div>
                </div>

                <a href="{{ route('contacto') }}?plan=ecommerce" class="btn btn-outline" style="width: 100%; text-align: center;">
                    <span>Cotizar Plan eCommerce →</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     TECNOLOGÍAS & BUENAS PRÁCTICAS
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div class="service-split-row reverse-mobile">
            <!-- Left: Content -->
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Ingeniería de Software</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    Tecnologías y Buenas Prácticas de Ingeniería
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    Combinamos la flexibilidad de WordPress y Elementor Pro con la potencia de arquitecturas modernas en Laravel para garantizar velocidad, seguridad perimetral y un SEO técnico impecable.
                </p>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.25rem;">
                    <div style="background: var(--bg-alt); padding: 1.25rem; border-radius: 12px;">
                        <div style="font-size: 1.5rem; margin-bottom: 0.5rem;">⚡</div>
                        <h4 style="margin-bottom: 0.35rem;">Imágenes WebP Livianas</h4>
                        <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.5;">Compresión inteligente que reduce hasta un 80% el peso sin pérdida de nitidez.</p>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1.25rem; border-radius: 12px;">
                        <div style="font-size: 1.5rem; margin-bottom: 0.5rem;">🛡️</div>
                        <h4 style="margin-bottom: 0.35rem;">Seguridad y SSL</h4>
                        <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.5;">Protección contra inyecciones SQL, firewall activo y certificados HTTPS automáticos.</p>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1.25rem; border-radius: 12px;">
                        <div style="font-size: 1.5rem; margin-bottom: 0.5rem;">📈</div>
                        <h4 style="margin-bottom: 0.35rem;">Estructura Semántica</h4>
                        <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.5;">Jerarquía estricta de encabezados H1-H6, Schema JSON-LD y datos estructurados.</p>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1.25rem; border-radius: 12px;">
                        <div style="font-size: 1.5rem; margin-bottom: 0.5rem;">📱</div>
                        <h4 style="margin-bottom: 0.35rem;">Responsive Total</h4>
                        <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.5;">Adaptación perfecta a iPhones, Android, tablets y monitores 4K ultra-wide.</p>
                    </div>
                </div>
            </div>

            <!-- Right: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/desarrollo_web_tecnologias.webp') }}" alt="Tecnologías de desarrollo web en Chile" class="service-media-img" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     VENTAJAS DE TRABAJAR CON REW
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div class="service-split-row">
            <!-- Left: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/desarrollo_web_ventajas.webp') }}" alt="Ventajas desarrollo web REW" class="service-media-img" loading="lazy">
                </div>
            </div>

            <!-- Right: Content -->
            <div>
                <span class="badge badge-gold" style="margin-bottom: 0.75rem;">¿Por qué Elegirnos?</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    Ventajas de Trabajar con REW para tu Desarrollo Web en Chile
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    Desarrollar tu sitio web con REW significa contar con un aliado estratégico que entiende la tecnología y los objetivos comerciales de tu empresa. Entregamos plataformas rápidas, seguras y fáciles de administrar.
                </p>

                <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                    <div>
                        <h4 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.35rem;">🎯 Diseño Web Enfocado en Resultados</h4>
                        <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                            Cada proyecto incluye un diseño orientado a la conversión y una arquitectura clara para que los usuarios encuentren lo que buscan en pocos clics.
                        </p>
                    </div>

                    <div>
                        <h4 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.35rem;">🛠️ Soporte Continuo y Mantenimiento Técnico</h4>
                        <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                            Realizamos respaldos periódicos, actualizaciones de seguridad y optimizaciones continuas para que tu sitio nunca quede desprotegido ni obsoleto.
                        </p>
                    </div>

                    <div>
                        <h4 style="font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.35rem;">🔍 Directrices Oficiales de Google Search Central</h4>
                        <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                            Seguimos estrictamente los estándares de Google para garantizar una indexación rápida, títulos optimizados y una experiencia de usuario sobresaliente.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     INBOUND MARKETING & EMBUDOS DE VENTA
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div class="service-split-row reverse-mobile">
            <!-- Left: Content -->
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Ecosistema Digital</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    Diseño Web Orientado a Estrategias de Inbound Marketing
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    En REW entendemos que un sitio web no es solo diseño gráfico, sino una pieza clave dentro de una estrategia integral de <a href="{{ route('servicios.publicidad') }}" style="color: var(--primary); font-weight: 700; text-decoration: underline;">Inbound Marketing</a> y ventas.
                </p>
                <p style="color: var(--text-muted); font-size: 0.98rem; line-height: 1.6; margin-bottom: 1.75rem;">
                    Combinamos el diseño UX/UI con herramientas de conversión, SEO técnico y campañas de publicidad digital para lograr resultados medibles. Cada sitio está preparado para integrarse con tu embudo de ventas, CRM y estrategias de remarketing.
                </p>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 0.85rem; margin-bottom: 2rem;">
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Estructura de contenido optimizada para inbound</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Landing pages con formularios y automatización</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Integración con plataformas de email y CRM</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Analítica y mapas de calor (Hotjar/Clarity)</span>
                    </div>
                </div>

                <a href="{{ route('contacto') }}" class="btn btn-primary">
                    <span>Solicitar Asesoría de Inbound Marketing →</span>
                </a>
            </div>

            <!-- Right: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/desarrollo_web_inbound.webp') }}" alt="Inbound Marketing y desarrollo web Chile" class="service-media-img" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     PROYECTOS Y CASOS DE ÉXITO RELACIONADOS
     ========================================================================== -->
@if($relatedProjects->isNotEmpty())
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 3rem; flex-wrap: wrap; gap: 1rem;">
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.5rem;">Casos de Éxito</span>
                <h2 style="font-size: 2.2rem; color: var(--text-dark);">Sitios Web Desarrollados por REW</h2>
            </div>
            <a href="{{ route('portafolio.index') }}" class="btn btn-outline">
                <span>Ver Portafolio Completo →</span>
            </a>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem;">
            @foreach($relatedProjects as $project)
                <div class="card portfolio-card spotlight-card">
                    <div class="portfolio-img-wrap">
                        <img src="{{ Str::startsWith($project->featured_image, 'http') ? $project->featured_image : asset(ltrim($project->featured_image, '/')) }}" alt="{{ $project->title }}" class="portfolio-img" loading="lazy">
                        <div class="portfolio-overlay">
                            <div class="portfolio-meta-pill">{{ $project->category }}</div>
                            <h3 style="color: #ffffff; font-size: 1.3rem;">{{ $project->title }}</h3>
                        </div>
                    </div>
                    <div class="portfolio-body">
                        <p class="portfolio-summary">{{ $project->summary }}</p>
                        <a href="{{ route('portafolio.show', $project->slug) }}" class="btn btn-outline btn-sm" style="width: 100%; text-align: center;">
                            <span>Ver Caso de Estudio →</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ==========================================================================
     AGENDAMIENTO DIRECTO CALENDLY & CONTACTO
     ========================================================================== -->
<section class="section" style="background: #0f172a; color: #ffffff;">
    <div class="container">
        <div class="grid-2col-cta" style="align-items: center;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 1rem;">Sesión Técnica de 20 Minutos</span>
                <h2 style="font-size: 2.4rem; color: #ffffff; margin-bottom: 1.25rem; line-height: 1.2;">
                    Hablemos de tu Próximo Sitio Web 🚀
                </h2>
                <p style="color: #cbd5e1; font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.75rem;">
                    Agenda una videollamada directa con <strong>Álvaro Valenzuela Valdés</strong>. Revisaremos tus objetivos, evaluaremos tu sitio actual y prepararemos una propuesta técnica adaptada a tu presupuesto.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-bottom: 2rem; font-size: 0.95rem; color: #e2e8f0;">
                    <div>✓ Análisis de Core Web Vitals y SEO en vivo</div>
                    <div>✓ Cotización cerrada y cronograma de entrega por contrato</div>
                    <div>✓ Trato directo sin intermediarios ni ejecutivos comerciales</div>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="https://calendly.com/satorisatorchile/rew?hide_event_type_details=1&hide_gdpr_banner=1" target="_blank" rel="noopener noreferrer" class="btn btn-gold btn-lg">
                        <span>📅 Agendar en Calendly</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, quiero coordinar una reunión para cotizar un desarrollo web.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 Hablar por WhatsApp</span>
                    </a>
                </div>
            </div>

            <div style="background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: var(--radius-xl); padding: 2.25rem; text-align: center;">
                <img src="{{ asset('images/services/desarrollo_web_cta.webp') }}" alt="Asesoría y desarrollo web Chile" style="width: 100%; max-height: 240px; object-fit: cover; border-radius: 12px; margin-bottom: 1.5rem;" loading="lazy">
                <h3 style="color: #ffffff; font-size: 1.35rem; margin-bottom: 0.5rem;">Álvaro Valenzuela Valdés</h3>
                <div style="color: var(--accent-gold); font-size: 0.9rem; font-weight: 700; margin-bottom: 1.25rem;">Ingeniero Informático • Fundador de REW</div>
                <p style="color: #94a3b8; font-size: 0.9rem; line-height: 1.6; margin-bottom: 1.5rem;">
                    📍 Santiago, Providencia, Chile<br>
                    ✉️ <a href="mailto:alvaro@rew.cl" style="color: #ffffff; text-decoration: underline;">alvaro@rew.cl</a><br>
                    📱 <a href="tel:+56987261127" style="color: #25d366;">+56 9 8726 1127</a>
                </p>
                <a href="{{ route('contacto') }}" class="btn btn-primary" style="width: 100%;">
                    <span>Ir al Formulario de Contacto & Cotizador</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Schema JSON-LD Structured Data for Service -->
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
      "@id": "https://rew.cl/desarrollo-web/#webpage",
      "url": "https://rew.cl/desarrollo-web",
      "name": "Desarrollo Web Chile 2025 | Sitios Profesionales",
      "description": "Servicio de desarrollo web en Chile. Creamos sitios rápidos, modernos y optimizados para tu negocio.",
      "isPartOf": {
        "@type": "WebSite",
        "@id": "https://rew.cl/#website"
      }
    },
    {
      "@type": "Service",
      "@id": "https://rew.cl/desarrollo-web/#service",
      "name": "Desarrollo Web Profesional en Chile",
      "description": "Servicio de desarrollo web profesional en Chile para empresas y pymes. Creamos sitios web rápidos, seguros y optimizados para SEO y conversión.",
      "provider": {
        "@id": "https://rew.cl/#organization"
      },
      "areaServed": "Chile",
      "offers": {
        "@type": "Offer",
        "availability": "https://schema.org/InStock"
      }
    }
  ]
}
</script>
@endverbatim
@endsection
