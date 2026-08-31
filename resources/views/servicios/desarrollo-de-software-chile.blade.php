@extends('layouts.app')

@section('title', '⚡ Software Factory en Chile: Desarrollos en Laravel & Sistemas que Escalan tu Negocio | REW')
@section('meta_description', '🛠️ Automatiza tus operaciones y digitaliza tu empresa con plataformas SaaS, APIs bancarias y sistemas a medida programados por ingenieros de software.')

@section('og_title', '⚡ Software Factory en Chile: Sistemas a Medida & SaaS con Laravel | REW')
@section('og_description', '🛠️ Diseñamos plataformas web robustas, automatización de procesos y software escalable con trato directo de ingenieros informáticos.')
@section('og_image', asset('images/services/software_hero.webp'))

@section('content')
<!-- ==========================================================================
     HERO SECTION (DESARROLLO DE SOFTWARE CHILE)
     ========================================================================== -->
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-alt) 100%); padding: 3.5rem 0 5rem; border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}" style="color: var(--text-muted); text-decoration: none;">Inicio</a>
            <span style="margin: 0 8px;">/</span>
            <a href="{{ route('servicios.index') }}" style="color: var(--text-muted); text-decoration: none;">Servicios</a>
            <span style="margin: 0 8px;">/</span>
            <span style="color: var(--primary); font-weight: 700;">Desarrollo de Software Chile</span>
        </nav>

        <div class="service-hero-grid">
            <!-- Left: Hero Copy -->
            <div>
                <div style="margin-bottom: 1.25rem;">
                    <span class="badge badge-pill-glow">
                        <span style="color: var(--accent-gold);">⚡</span> Ingeniería de Software & SaaS • Chile
                    </span>
                </div>

                <h1 style="font-size: clamp(2.4rem, 4vw, 3.4rem); font-weight: 900; line-height: 1.15; color: var(--text-dark); margin-bottom: 1.25rem;">
                    Empresa de Desarrollo de Software en Chile: <span class="gradient-text">Soluciones a Medida</span>
                </h1>

                <p style="font-size: 1.15rem; color: var(--text-body); line-height: 1.7; margin-bottom: 2rem;">
                    En <strong>REW</strong> somos una empresa de desarrollo de software que crea plataformas y herramientas tecnológicas a la medida para empresas y pymes. Combinamos arquitectura de vanguardia en Laravel & PHP 8.3, diseño UX intuitivo y prácticas ágiles para impulsar resultados de negocio reales.
                </p>

                <!-- Value Highlights Grid -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 0.75rem; margin-bottom: 2.25rem;">
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Arquitectura 100% escalable y código limpio</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Integraciones vía APIs robustas y seguras</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Metodología ágil con entregas por sprints</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span>Trato directo con el Ingeniero Álvaro Valenzuela Valdés</span>
                    </div>
                </div>

                <!-- CTA Group -->
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>🚀 Solicitar Cotización de Software</span>
                    </a>
                    <a href="https://calendly.com/satorisatorchile/rew?hide_event_type_details=1&hide_gdpr_banner=1" target="_blank" rel="noopener noreferrer" class="btn btn-gold btn-lg">
                        <span>📅 Agendar Sesión 20 min</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, me interesa cotizar un desarrollo de software a medida.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 WhatsApp Directo</span>
                    </a>
                </div>
            </div>

            <!-- Right: Hero Media Spotlight -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/software_hero.webp') }}" alt="Empresa de desarrollo de software en Chile" class="service-media-img" loading="eager" width="1600" height="1066">
                    
                    <div style="position: absolute; bottom: 1.5rem; left: 1.5rem; right: 1.5rem; background: rgba(15, 23, 42, 0.9); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.15); border-radius: 12px; padding: 1rem 1.25rem; color: #ffffff; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 700;">Stack de Ingeniería</div>
                            <div style="font-size: 1.05rem; font-weight: 800; color: #38bdf8;">Laravel 11 • PHP 8.3 • MySQL</div>
                        </div>
                        <div style="text-align: right;">
                            <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 700;">Seguridad & SLA</div>
                            <div style="font-size: 1.05rem; font-weight: 800; color: var(--accent-gold);">Uptime 99.9% 🛡️</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SERVICIOS DE SOFTWARE A MEDIDA & FÁBRICA
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div class="service-split-row">
            <!-- Left: Visual Media -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/software_fabrica.webp') }}" alt="Fábrica de software en Chile" class="service-media-img" loading="lazy">
                </div>
            </div>

            <!-- Right: Software Pillars -->
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Capacidades Técnicas</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    Servicios de Software a Medida
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.75rem;">
                    Nuestro equipo diseña, construye e integra plataformas escalables. Como <strong>empresa de software en Chile</strong>, abordamos el ciclo de vida completo: desde el descubrimiento hasta el soporte continuo posterior al lanzamiento.
                </p>

                <div style="display: grid; grid-template-columns: 1fr; gap: 1.25rem;">
                    <div style="background: var(--bg-alt); padding: 1.25rem 1.5rem; border-radius: 12px; border-left: 4px solid var(--primary);">
                        <h3 style="font-size: 1.2rem; margin-bottom: 0.35rem; color: var(--text-dark);">💻 Desarrollo de Software a Medida</h3>
                        <p style="font-size: 0.92rem; color: var(--text-muted); line-height: 1.6; margin: 0;">
                            Aplicaciones y sistemas hechos exactamente para tu proceso operativo: ERPs, CRMs, portales internos, intranets y flujos automatizados. Priorizamos seguridad, rendimiento y mantenibilidad a largo plazo.
                        </p>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1.25rem 1.5rem; border-radius: 12px; border-left: 4px solid var(--accent-gold);">
                        <h3 style="font-size: 1.2rem; margin-bottom: 0.35rem; color: var(--text-dark);">📱 Aplicaciones Web & Back-Office</h3>
                        <p style="font-size: 0.92rem; color: var(--text-muted); line-height: 1.6; margin: 0;">
                            Apps web responsivas y paneles de administración con integraciones a pasarelas de pago, facturación electrónica, logística, Business Intelligence y marketing automation.
                        </p>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1.25rem 1.5rem; border-radius: 12px; border-left: 4px solid #10b981;">
                        <h3 style="font-size: 1.2rem; margin-bottom: 0.35rem; color: var(--text-dark);">🔗 Integraciones y APIs Robustas</h3>
                        <p style="font-size: 0.92rem; color: var(--text-muted); line-height: 1.6; margin: 0;">
                            Conectamos tus plataformas existentes mediante APIs RESTful seguras, webhooks y documentación técnica clara para facilitar la evolución continua del producto.
                        </p>
                    </div>

                    <div style="background: var(--bg-alt); padding: 1.25rem 1.5rem; border-radius: 12px; border-left: 4px solid #8b5cf6;">
                        <h3 style="font-size: 1.2rem; margin-bottom: 0.35rem; color: var(--text-dark);">🏭 Fábrica de Software (Software Factory)</h3>
                        <p style="font-size: 0.92rem; color: var(--text-muted); line-height: 1.6; margin: 0;">
                            Equipo de ingeniería dedicado bajo metodología ágil (Scrum/Kanban) para ampliar la capacidad de entrega de tu empresa sin incurrir en costos fijos de contratación interna.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     POR QUÉ ELEGIR REW
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div class="service-split-row reverse-mobile">
            <!-- Left: Why Choose REW -->
            <div>
                <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Ventaja Competitiva</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    Por Qué Elegir a REW para tu Software
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    Combinamos la disciplina de la ingeniería informática con una visión pragmática de negocio. No sobrediseñamos ni usamos soluciones genéricas; creamos software que resuelve cuellos de botella y ahorra cientos de horas hombre a tu equipo.
                </p>

                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div style="display: flex; gap: 12px; align-items: flex-start;">
                        <div style="width: 32px; height: 32px; border-radius: 8px; background: rgba(79, 70, 229, 0.1); color: var(--primary); display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">⚡</div>
                        <div>
                            <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">Metodología ágil con entregas frecuentes</strong>
                            <span style="font-size: 0.92rem; color: var(--text-muted);">Sprints cortos, control de calidad automatizado y visibilidad total en cada avance.</span>
                        </div>
                    </div>

                    <div style="display: flex; gap: 12px; align-items: flex-start;">
                        <div style="width: 32px; height: 32px; border-radius: 8px; background: rgba(16, 185, 129, 0.1); color: #10b981; display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">🎨</div>
                        <div>
                            <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">UX y accesibilidad desde el primer día</strong>
                            <span style="font-size: 0.92rem; color: var(--text-muted);">Diseñamos interfaces intuitivas para maximizar la adopción de los usuarios y evitar fricciones.</span>
                        </div>
                    </div>

                    <div style="display: flex; gap: 12px; align-items: flex-start;">
                        <div style="width: 32px; height: 32px; border-radius: 8px; background: rgba(59, 130, 246, 0.1); color: #3b82f6; display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">🏗️</div>
                        <div>
                            <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">Arquitectura escalable y pruebas automatizadas</strong>
                            <span style="font-size: 0.92rem; color: var(--text-muted);">Estructura basada en buenas prácticas de software (SOLID, Clean Architecture, CI/CD).</span>
                        </div>
                    </div>

                    <div style="display: flex; gap: 12px; align-items: flex-start;">
                        <div style="width: 32px; height: 32px; border-radius: 8px; background: rgba(245, 158, 11, 0.1); color: #f59e0b; display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">📊</div>
                        <div>
                            <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">Soporte y mejora continua con métricas de negocio</strong>
                            <span style="font-size: 0.92rem; color: var(--text-muted);">Monitoreo de rendimiento, backups preventivos y evolución constante de la plataforma.</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Media Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/software_a_medida.webp') }}" alt="Software a medida en Chile" class="service-media-img" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     PROCESO DE TRABAJO & SEO TÉCNICO INCLUIDO
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div class="service-split-row">
            <!-- Left: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/software_proceso.webp') }}" alt="Proceso de desarrollo de software" class="service-media-img" loading="lazy">
                </div>
            </div>

            <!-- Right: 5 Step Process -->
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Flujo de Entrega</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    Proceso de Trabajo Estructurado
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    Este flujo garantiza que el <strong>desarrollo de software en Chile</strong> entregue valor desde las primeras iteraciones, reduciendo la incertidumbre y manteniendo los plazos controlados.
                </p>

                <div style="display: flex; flex-direction: column; gap: 1rem; margin-bottom: 2rem;">
                    <div style="background: var(--bg-alt); padding: 0.85rem 1.25rem; border-radius: 10px;">
                        <strong style="color: var(--primary);">1. Descubrimiento (Discovery):</strong>
                        <span style="color: var(--text-muted); font-size: 0.92rem;">Entendemos a fondo los objetivos de negocio, usuarios finales y restricciones técnicas.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 0.85rem 1.25rem; border-radius: 10px;">
                        <strong style="color: var(--primary);">2. Diseño de Solución & Arquitectura:</strong>
                        <span style="color: var(--text-muted); font-size: 0.92rem;">Definimos el roadmap del MVP, modelo de base de datos y prototipos UX interactivos.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 0.85rem 1.25rem; border-radius: 10px;">
                        <strong style="color: var(--primary);">3. Desarrollo Iterativo (Sprints):</strong>
                        <span style="color: var(--text-muted); font-size: 0.92rem;">Programación por bloques con control de calidad riguroso y demostraciones periódicas.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 0.85rem 1.25rem; border-radius: 10px;">
                        <strong style="color: var(--primary);">4. Go-Live & Despliegue en Producción:</strong>
                        <span style="color: var(--text-muted); font-size: 0.92rem;">Hardening de seguridad, configuración de servidores VPS/Cloud y plan de continuidad.</span>
                    </div>

                    <div style="background: var(--bg-alt); padding: 0.85rem 1.25rem; border-radius: 10px;">
                        <strong style="color: var(--primary);">5. Optimización Basada en Datos:</strong>
                        <span style="color: var(--text-muted); font-size: 0.92rem;">Monitoreo de logs, mejoras de rendimiento y nuevas funciones según el feedback real.</span>
                    </div>
                </div>

                <div style="background: linear-gradient(135deg, rgba(79, 70, 229, 0.08) 0%, rgba(245, 158, 11, 0.08) 100%); border: 1px solid rgba(79, 70, 229, 0.2); border-radius: 12px; padding: 1.25rem;">
                    <h4 style="font-size: 1.05rem; margin-bottom: 0.35rem; color: var(--text-dark);">🚀 SEO Técnico y Rendimiento Incluidos</h4>
                    <p style="font-size: 0.9rem; color: var(--text-body); line-height: 1.6; margin: 0;">
                        Cada software web incorpora de serie buenas prácticas de seguridad perimetral, indexabilidad, rendimiento y marcado estructurado para maximizar el retorno de inversión.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     CASOS DE USO FRECUENTES
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div class="service-split-row reverse-mobile">
            <!-- Left: Use Cases -->
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Soluciones Reales</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    Casos de Uso Frecuentes en Empresas Chilenas
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.75rem;">
                    Diseñamos sistemas que se adaptan con precisión a la realidad de tu industria, permitiendo que tu operación escale sin fricciones:
                </p>

                <div style="display: flex; flex-direction: column; gap: 0.85rem; margin-bottom: 2rem;">
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Digitalización y automatización operativa:</strong> Eliminación de tareas repetitivas y reducción de errores humanos.</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Portales B2B/B2C y plataformas de autoservicio:</strong> Acceso a clientes para cotizar, gestionar pedidos y descargar facturas.</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Integraciones complejas:</strong> Conexión con ERPs (SAP, Softland, Defontana), logística y pasarelas de pago.</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Dashboards y analítica en tiempo real:</strong> Paneles ejecutivos de toma de decisiones con métricas clave.</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Migración desde Excel a bases de datos relacionales:</strong> Centralización segura de datos con roles y permisos de acceso.</span>
                    </div>
                </div>

                <a href="{{ route('contacto') }}" class="btn btn-primary">
                    <span>Solicitar Evaluación de Factibilidad Técnica →</span>
                </a>
            </div>

            <!-- Right: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/software_casos_uso.webp') }}" alt="Casos de uso desarrollo de software a medida" class="service-media-img" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     RECURSOS RELACIONADOS / SERVICIOS COMPLEMENTARIOS
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div style="text-align: center; max-width: 750px; margin: 0 auto 3rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Ecosistema Integral</span>
            <h2 style="font-size: 2.3rem; margin-bottom: 1rem;">Potencia tu Proyecto Combinando Servicios</h2>
            <p style="color: var(--text-muted); font-size: 1.05rem;">
                Un software robusto requiere un entorno digital completo. Conoce cómo complementamos tu desarrollo:
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem;">
            <a href="{{ route('servicios.desarrollo-web') }}" class="card spotlight-card" style="padding: 1.75rem; text-decoration: none; color: inherit; display: block; border: 1px solid var(--border-light); transition: all 0.25s ease;">
                <div style="font-size: 2rem; margin-bottom: 0.75rem;">🌐</div>
                <h3 style="font-size: 1.2rem; color: var(--text-dark); margin-bottom: 0.5rem;">Desarrollo Web Profesional</h3>
                <p style="font-size: 0.88rem; color: var(--text-muted); line-height: 1.5;">Sitios corporativos y tiendas e-commerce optimizadas para captación y ventas.</p>
            </a>

            <a href="{{ route('servicios.seo') }}" class="card spotlight-card" style="padding: 1.75rem; text-decoration: none; color: inherit; display: block; border: 1px solid var(--border-light); transition: all 0.25s ease;">
                <div style="font-size: 2rem; margin-bottom: 0.75rem;">📈</div>
                <h3 style="font-size: 1.2rem; color: var(--text-dark); margin-bottom: 0.5rem;">Posicionamiento SEO Técnico</h3>
                <p style="font-size: 0.88rem; color: var(--text-muted); line-height: 1.5;">Estrategias orgánicas para liderar los resultados en Google y motores de IA.</p>
            </a>

            <a href="{{ route('servicios.publicidad') }}" class="card spotlight-card" style="padding: 1.75rem; text-decoration: none; color: inherit; display: block; border: 1px solid var(--border-light); transition: all 0.25s ease;">
                <div style="font-size: 2rem; margin-bottom: 0.75rem;">🎯</div>
                <h3 style="font-size: 1.2rem; color: var(--text-dark); margin-bottom: 0.5rem;">Publicidad Digital (Ads)</h3>
                <p style="font-size: 0.88rem; color: var(--text-muted); line-height: 1.5;">Campañas de alta precisión en Google Ads y Meta Ads para acelerar leads.</p>
            </a>

            <a href="{{ route('servicios.mantenimiento') }}" class="card spotlight-card" style="padding: 1.75rem; text-decoration: none; color: inherit; display: block; border: 1px solid var(--border-light); transition: all 0.25s ease;">
                <div style="font-size: 2rem; margin-bottom: 0.75rem;">🛡️</div>
                <h3 style="font-size: 1.2rem; color: var(--text-dark); margin-bottom: 0.5rem;">Mantenimiento y Soporte</h3>
                <p style="font-size: 0.88rem; color: var(--text-muted); line-height: 1.5;">Uptime 24/7, blindaje perimetral y respaldos automáticos continuos.</p>
            </a>
        </div>
    </div>
</section>

<!-- ==========================================================================
     PREGUNTAS FRECUENTES (FAQ)
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div class="service-split-row">
            <!-- Left: FAQ Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/software_faq.webp') }}" alt="Preguntas frecuentes desarrollo de software Chile" class="service-media-img" loading="lazy">
                </div>
            </div>

            <!-- Right: FAQ Accordion -->
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Resolución de Dudas</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    Preguntas Frecuentes
                </h2>
                <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.6; margin-bottom: 1.75rem;">
                    Respondemos las consultas más habituales sobre nuestro servicio de desarrollo de software a medida en Chile:
                </p>

                <div class="faq-accordion-list">
                    <!-- FAQ 1 -->
                    <div class="faq-card-item is-open">
                        <button type="button" class="faq-header-btn">
                            <span>¿Cuánto tarda un proyecto de software a medida?</span>
                            <span class="faq-icon-chevron">▾</span>
                        </button>
                        <div class="faq-content-body">
                            Depende del alcance del proyecto. En REW iniciamos con una fase breve de <em>Discovery</em> para definir un MVP funcional y plazos realistas. Trabajamos con metodología ágil por sprints de 2 semanas, entregando módulos funcionales y testeables desde el inicio.
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="faq-card-item">
                        <button type="button" class="faq-header-btn">
                            <span>¿Pueden integrarse a mis sistemas actuales?</span>
                            <span class="faq-icon-chevron">▾</span>
                        </button>
                        <div class="faq-content-body">
                            Sí. Diseñamos integraciones y APIs robustas con ERPs (SAP, Softland, Defontana), CRMs (HubSpot, Salesforce), pasarelas de pago (Transbank, Flow, Mercado Pago) y sistemas logísticos, garantizando la continuidad operativa y la sincronización en tiempo real.
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="faq-card-item">
                        <button type="button" class="faq-header-btn">
                            <span>¿Qué diferencia a REW de otra empresa de software en Chile?</span>
                            <span class="faq-icon-chevron">▾</span>
                        </button>
                        <div class="faq-content-body">
                            Nuestra combinación única de estrategia de producto, desarrollo en código limpio (Laravel/PHP 8.3), diseño UX centrado en el usuario y trato directo con el Ingeniero Informático Álvaro Valenzuela Valdés. No tercerizamos ni subcontratamos; cuidamos cada línea de código de tu proyecto.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     AGENDAMIENTO CALENDLY & CONTACTO DIRECTO
     ========================================================================== -->
<section class="section" style="background: #0f172a; color: #ffffff;">
    <div class="container">
        <div class="grid-2col-cta" style="align-items: center;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 1rem;">Sesión Técnica de 20 Minutos</span>
                <h2 style="font-size: 2.4rem; color: #ffffff; margin-bottom: 1.25rem; line-height: 1.2;">
                    ¿Listo para Transformar tu Empresa con Software a Medida? 🚀
                </h2>
                <p style="color: #cbd5e1; font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.75rem;">
                    Agenda una videollamada directa con <strong>Álvaro Valenzuela Valdés</strong>. Revisaremos los requerimientos de tu sistema, evaluaremos la arquitectura recomendada y trazaremos un plan de desarrollo ajustado a tu presupuesto.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-bottom: 2rem; font-size: 0.95rem; color: #e2e8f0;">
                    <div>✓ Evaluación de factibilidad técnica y arquitectura sin costo</div>
                    <div>✓ Propuesta con cronograma y entregables por contrato</div>
                    <div>✓ Trato directo sin intermediarios comerciales</div>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="https://calendly.com/satorisatorchile/rew?hide_event_type_details=1&hide_gdpr_banner=1" target="_blank" rel="noopener noreferrer" class="btn btn-gold btn-lg">
                        <span>📅 Agendar en Calendly</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, quiero coordinar una reunión técnica para cotizar desarrollo de software.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 Hablar por WhatsApp</span>
                    </a>
                </div>
            </div>

            <div style="background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: var(--radius-xl); padding: 2.25rem; text-align: center;">
                <img src="{{ asset('images/services/desarrollo_web_cta.webp') }}" alt="Asesoría y desarrollo software Chile" style="width: 100%; max-height: 240px; object-fit: cover; border-radius: 12px; margin-bottom: 1.5rem;" loading="lazy">
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

<!-- Schema JSON-LD Structured Data for Software Service -->
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
      "@id": "https://rew.cl/desarrollo-de-software-chile/#webpage",
      "url": "https://rew.cl/desarrollo-de-software-chile",
      "name": "Empresa Desarrollo De Software | Soluciones A Medida CL",
      "description": "Somos una empresa desarrollo de software en Chile. Creamos soluciones tecnológicas a medida para empresas, integrando innovación, diseño UX y SEO técnico.",
      "isPartOf": {
        "@type": "WebSite",
        "@id": "https://rew.cl/#website"
      }
    },
    {
      "@type": "Service",
      "@id": "https://rew.cl/desarrollo-de-software-chile/#service",
      "name": "Desarrollo de Software a Medida en Chile",
      "serviceType": "Desarrollo de software a medida, Integraciones, Apps web, SaaS",
      "description": "Somos una empresa de desarrollo de software en Chile. Creamos plataformas web, sistemas a medida, APIs e integraciones robustas con arquitectura escalable.",
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
      "@id": "https://rew.cl/desarrollo-de-software-chile/#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "¿Cuánto tarda un proyecto de software a medida?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Depende del alcance. En REW realizamos un discovery inicial para definir un MVP y entregamos valor desde los primeros sprints mediante metodologías ágiles."
          }
        },
        {
          "@type": "Question",
          "name": "¿Pueden integrarse a mis sistemas actuales?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Sí, diseñamos integraciones y APIs seguras con ERP, CRM, pasarelas de pago y sistemas logísticos para asegurar la continuidad operativa."
          }
        },
        {
          "@type": "Question",
          "name": "¿Qué diferencia a REW de otras empresas de software en Chile?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Combinamos estrategia digital, desarrollo de software a medida, diseño UX y optimización SEO técnico para construir soluciones escalables y sostenibles."
          }
        }
      ]
    }
  ]
}
</script>
@endverbatim
@endsection
