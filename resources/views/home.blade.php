@extends('layouts.app')

@section('title', '⚡ ¿Tu web no vende o es lenta? | Desarrollo de Software, SEO & Plugins IA - REW')
@section('meta_description', '🔥 Dejamos tu sitio cargando en menos de 1 segundo y rankeando #1 en Google. Desarrollamos software a medida en Laravel, WooCommerce de alta conversión y Chatbots de IA en Chile.')

@section('og_title', '⚡ ¿Tu web no vende o es lenta? | Desarrollo de Software & SEO en Chile - REW')
@section('og_description', '🔥 Multiplica tus ventas con sitios web ultra veloces, software a medida en Laravel y Chatbots de IA para WooCommerce. ¡Pide tu auditoría gratuita hoy!')
@section('og_image', asset('images/rew_og_card.png'))

@section('content')
<!-- ==========================================================================
     HERO SECTION (High-End Light Theme)
     ========================================================================== -->
<section class="hero-section">
    <div class="container">
        <!-- Live Status Pill -->
        @include('components.live-status-badge')

        <div class="hero-grid">
            <!-- Left: Hero Content -->
            <div class="hero-content">
                <div style="margin-bottom: 1.25rem;">
                    <span class="badge badge-pill-glow">
                        <span style="color: var(--accent-gold);">⚡</span> Software Engineering & Inbound Marketing • Chile
                    </span>
                </div>

                <h1 class="hero-title">
                    Desarrollo de Software, <span class="gradient-text">Plugins con IA</span> y Posicionamiento SEO.
                </h1>

                <p class="hero-subtitle">
                    Creamos plataformas escalables en <strong>Laravel</strong>, tiendas <strong>WooCommerce</strong> de alta conversión y <strong>asistentes de IA con arquitectura RAG</strong> que automatizan las ventas y potencian los objetivos comerciales de tu empresa.
                </p>

                <div class="hero-cta-group">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>🚀 Cotizar Proyecto</span>
                    </a>
                    <a href="{{ route('tienda.index') }}" class="btn btn-outline btn-lg">
                        <span>🛒 Ver Plugins WordPress</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, quiero consultar por desarrollo de software para mi empresa.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 WhatsApp Directo</span>
                    </a>
                </div>

                <!-- Stats Row with Dynamic Counting Animation -->
                <div class="hero-stats-row">
                    <div class="stat-item">
                        <h4 data-counter="6" data-counter-prefix="+">+6</h4>
                        <p>Años liderando ingeniería</p>
                    </div>
                    <div class="stat-item">
                        <h4 data-counter="150" data-counter-prefix="+" data-counter-suffix="K">+150K</h4>
                        <p>Usuarios mensuales impactados</p>
                    </div>
                    <div class="stat-item">
                        <h4 data-counter="100" data-counter-suffix="%">100%</h4>
                        <p>Código limpio & rendimiento SEO</p>
                    </div>
                </div>
            </div>

            <!-- Right: Interactive Hero Visual -->
            <div class="hero-visual">
                <!-- Floating Badge 1 -->
                <div class="hero-floating-badge">
                    <div style="font-size: 1.6rem;">🤖</div>
                    <div>
                        <div style="font-weight: 800; font-size: 0.85rem; color: var(--text-dark);">Rich-E AI Engine</div>
                        <div style="font-size: 0.75rem; color: #10b981; font-weight: 700;">Tecnología RAG Activa</div>
                    </div>
                </div>

                <!-- Main Glass Card -->
                <div class="hero-main-card spotlight-card">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem; padding-bottom: 1rem; border-bottom: 1px solid var(--border-light);">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <div style="width: 12px; height: 12px; border-radius: 50%; background: #ef4444;"></div>
                            <div style="width: 12px; height: 12px; border-radius: 50%; background: #f59e0b;"></div>
                            <div style="width: 12px; height: 12px; border-radius: 50%; background: #10b981;"></div>
                        </div>
                        <span class="badge badge-primary" style="font-size: 0.72rem;">REW Architecture v2.4</span>
                    </div>

                    <!-- Code / Tech Simulation -->
                    <div style="background: #0f172a; border-radius: 12px; padding: 1.25rem; font-family: var(--font-mono); font-size: 0.82rem; color: #cbd5e1; line-height: 1.6; margin-bottom: 1.25rem;">
                        <span style="color: #64748b;">// Iniciando motor de crecimiento REW</span><br>
                        <span style="color: #f43f5e;">const</span> clientSuccess = <span style="color: #f43f5e;">await</span> REW.<span style="color: #38bdf8;">deploySolution</span>({<br>
                        &nbsp;&nbsp;architecture: <span style="color: #a7f3d0;">'Laravel 11 + High-Speed Blade'</span>,<br>
                        &nbsp;&nbsp;aiAssistant: <span style="color: #a7f3d0;">'Rich-E RAG Engine'</span>,<br>
                        &nbsp;&nbsp;seoStatus: <span style="color: #fde047;">'Top 3 en Google Chile'</span>,<br>
                        &nbsp;&nbsp;conversionRate: <span style="color: #34d399;">'+240% Ventas'</span><br>
                        });
                    </div>

                    <div style="display: flex; align-items: center; justify-content: space-between; padding: 0.75rem 1rem; background: var(--bg-alt); border-radius: 10px;">
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <span style="font-size: 1.2rem;">👨‍💻</span>
                            <span style="font-size: 0.85rem; font-weight: 700; color: var(--text-dark);">Álvaro Valenzuela Valdés</span>
                        </div>
                        <span class="badge badge-gold" style="font-size: 0.7rem;">Ingeniero Informático</span>
                    </div>
                </div>

                <!-- Floating Badge 2 -->
                <div class="hero-floating-badge-2">
                    <div style="font-size: 1.6rem;">⚡</div>
                    <div>
                        <div style="font-weight: 800; font-size: 0.85rem; color: var(--text-dark);">Core Web Vitals</div>
                        <div style="font-size: 0.75rem; color: var(--primary); font-weight: 700;">Score: 99/100 (Verde)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dual Tech Marquee -->
@include('components.tech-marquee')

<!-- ==========================================================================
     SERVICIOS PROFESIONALES REW
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div style="text-align: center; max-width: 750px; margin: 0 auto 4rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Soluciones Integrales</span>
            <h2 style="font-size: 2.4rem; margin-bottom: 1rem;">Servicios Diseñados para Escalar Negocios</h2>
            <p style="color: var(--text-muted); font-size: 1.1rem;">
                Desde desarrollo de software en Laravel hasta estrategias de inbound marketing y SEO avanzado en Chile.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem;">
            @foreach($services as $srv)
                <div class="card service-card spotlight-card">
                    <div class="service-icon-box">
                        @if($srv->slug === 'desarrollo-web') 🌐
                        @elseif($srv->slug === 'desarrollo-de-software-chile') 💻
                        @elseif($srv->slug === 'optimizacion-seo') 📈
                        @elseif($srv->slug === 'publicidad-digital') 🎯
                        @elseif($srv->slug === 'mantenimiento-web') 🛡️
                        @elseif($srv->slug === 'soporte-wordpress') ⚡
                        @else ✨
                        @endif
                    </div>
                    <h3>{{ $srv->name }}</h3>
                    <p>{{ $srv->tagline }}</p>
                    <div>
                        <a href="{{ url('/' . $srv->slug) }}" class="btn btn-outline btn-sm" style="font-weight: 700;">
                            <span>Conoce este Servicio →</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Interactive macOS Terminal Showcase -->
@include('components.interactive-terminal')

<!-- ==========================================================================
     PORTAFOLIO WEB PREVIEW
     ========================================================================== -->
<section class="section">
    <div class="container">
        <div style="display: flex; flex-wrap: wrap; align-items: flex-end; justify-content: space-between; margin-bottom: 3.5rem; gap: 1.5rem;">
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.5rem;">Casos de Éxito</span>
                <h2 style="font-size: 2.3rem;">Proyectos que Impulsan Marcas</h2>
                <p style="color: var(--text-muted); font-size: 1.05rem; max-width: 600px;">
                    Conoce cómo ayudamos a marcas internacionales, empresas e-commerce y plataformas de streaming a triunfar en internet.
                </p>
            </div>
            <a href="{{ route('portafolio.index') }}" class="btn btn-primary">
                <span>Ver Portafolio Completo →</span>
            </a>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem;">
            @foreach($featuredProjects as $project)
                <article class="card portfolio-card spotlight-card" style="position: relative; overflow: hidden; cursor: pointer;">
                    <a href="{{ route('portafolio.show', $project->slug) }}" class="portfolio-card-stretched-link" aria-label="Ver caso de estudio de {{ $project->title }}"></a>
                    
                    <div class="portfolio-img-wrap">
                        <img src="{{ Str::startsWith($project->featured_image, 'http') ? $project->featured_image : asset(ltrim($project->featured_image, '/')) }}" alt="{{ $project->title }}" class="portfolio-img" loading="lazy">
                        <div class="portfolio-overlay">
                            <div class="portfolio-meta-pill">{{ $project->category }}</div>
                            <h3 style="color: #ffffff; font-size: 1.3rem;">{{ $project->title }}</h3>
                        </div>
                    </div>
                    <div class="portfolio-body">
                        <p class="portfolio-summary">{{ $project->summary }}</p>
                        <div class="portfolio-tech-tags">
                            @foreach(array_slice(explode(',', $project->technologies), 0, 3) as $tech)
                                <span class="tech-tag">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                        <div class="btn btn-outline btn-sm" style="width: 100%; text-align: center; pointer-events: none;">
                            <span>Ver Caso de Estudio →</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<!-- Interactive Speed Benchmark Simulator -->
@include('components.speed-benchmark')

<!-- ==========================================================================
     PLUGINS DESTACADOS / TIENDA SHOWCASE (Ubicada estratégicamente tras la comparativa)
     ========================================================================== -->
<section class="section" style="background: linear-gradient(180deg, var(--bg-main) 0%, #ffffff 100%);">
    <div class="container">
        <div style="display: flex; flex-wrap: wrap; align-items: flex-end; justify-content: space-between; margin-bottom: 3.5rem; gap: 1.5rem;">
            <div>
                <div style="margin-bottom: 0.5rem;">
                    <span class="badge badge-gold">Ecosistema WordPress & IA</span>
                </div>
                <h2 style="font-size: 2.3rem;">Plugins Oficiales de Alta Gama</h2>
                <p style="color: var(--text-muted); font-size: 1.05rem; max-width: 600px;">
                    Desarrollados bajo estrictos estándares de ingeniería para aumentar conversiones y automatizar soporte.
                </p>
            </div>
            <a href="{{ route('tienda.index') }}" class="btn btn-outline">
                <span>Ver Catálogo Completo ({{ \App\Models\Product::count() }}) →</span>
            </a>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(290px, 1fr)); gap: 2rem;">
            @foreach($featuredProducts as $prod)
                @php
                    $prodUrl = ($prod->slug === 'plugin-integracion-bsale-woocommerce') 
                        ? route('servicios.bsale-woocommerce') 
                        : route('tienda.show', $prod->slug);
                @endphp
                <div class="card product-card spotlight-card">
                    <div class="product-img-wrap">
                        @if($prod->badge)
                            <div class="product-badge-top">
                                <span class="badge {{ (str_contains($prod->badge, 'OFERTA') || str_contains($prod->badge, 'LIFETIME') || str_contains($prod->badge, 'PAGO ÚNICO')) ? 'badge-gold' : 'badge-primary' }}">
                                    {{ $prod->badge }}
                                </span>
                            </div>
                        @endif
                        <a href="{{ $prodUrl }}">
                            <img src="{{ Str::startsWith($prod->featured_image, 'http') ? $prod->featured_image : asset(ltrim($prod->featured_image, '/')) }}" alt="{{ $prod->name }}" class="product-img" loading="lazy">
                        </a>
                    </div>
                    <div class="product-content">
                        <div class="product-category">{{ str_replace('-', ' ', Str::title($prod->category_slug)) }}</div>
                        <h3 class="product-title">
                            <a href="{{ $prodUrl }}" style="color: inherit;">
                                {{ $prod->name }}
                            </a>
                        </h3>
                        <p class="product-desc">{{ $prod->short_description }}</p>

                        <div class="product-pricing">
                            <span class="price-current price-tag-dynamic" data-usd="{{ $prod->price_usd }}" data-clp="{{ $prod->price_clp }}">
                                ${{ number_format($prod->price_usd, 0) }} USD
                            </span>
                            @if($prod->original_price_usd)
                                <span class="price-original price-tag-dynamic" data-usd="{{ $prod->original_price_usd }}" data-clp="{{ $prod->original_price_clp }}">
                                    ${{ number_format($prod->original_price_usd, 0) }} USD
                                </span>
                            @endif
                        </div>

                        <div class="product-actions">
                            <form action="{{ route('cart.add') }}" method="POST" class="ajax-add-to-cart-form" style="display: block;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $prod->id }}">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">
                                    <span>Añadir al Carrito</span>
                                </button>
                            </form>
                            <a href="{{ $prodUrl }}" class="btn btn-outline" title="Ver Detalles">
                                <span>Detalles</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ==========================================================================
     PROCESO DE DESARROLLO EN 4 ETAPAS
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div style="text-align: center; max-width: 750px; margin: 0 auto 3.5rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Metodología Probada</span>
            <h2 style="font-size: 2.4rem; margin-bottom: 1rem;">Nuestro Proceso de Desarrollo Web & Software</h2>
            <p style="color: var(--text-muted); font-size: 1.1rem;">
                Un flujo de ingeniería claro, transparente y sin sorpresas, desde la concepción estratégica hasta el soporte continuo.
            </p>
        </div>

        <div class="process-grid-4">
            <div class="process-step-card">
                <div class="process-number-badge">1</div>
                <h3 class="process-step-title">Análisis y Planificación</h3>
                <p class="process-step-desc">
                    Comprendemos tus necesidades y objetivos de negocio. Realizamos un levantamiento de requerimientos, definimos el alcance técnico y diseñamos la arquitectura ideal para tu plataforma.
                </p>
            </div>

            <div class="process-step-card">
                <div class="process-number-badge">2</div>
                <h3 class="process-step-title">Diseño UX/UI & Desarrollo</h3>
                <p class="process-step-desc">
                    Construimos tu sitio y software con base en los mejores estándares. Aplicamos diseño UX/UI en Figma, desarrollo ágil en Laravel y programación ultra rápida optimizada para conversión.
                </p>
            </div>

            <div class="process-step-card">
                <div class="process-number-badge">3</div>
                <h3 class="process-step-title">Pruebas & Optimización</h3>
                <p class="process-step-desc">
                    Antes del lanzamiento, ejecutamos rigurosas pruebas de carga, compatibilidad multiplataforma y seguridad. Ajustamos Core Web Vitals para asegurar métricas en verde en Google.
                </p>
            </div>

            <div class="process-step-card">
                <div class="process-number-badge">4</div>
                <h3 class="process-step-title">Lanzamiento & Soporte</h3>
                <p class="process-step-desc">
                    Tu sitio se pone en marcha sin tiempo de inactividad. Nos aseguramos de que todo opere a la perfección y brindamos mantenimiento continuo 24/7 y evolución técnica de por vida.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     TESTIMONIOS & OPINIONES REALES EN GOOGLE (5.0 STARS)
     ========================================================================== -->
<section class="section">
    <div class="container">
        <div style="display: flex; flex-wrap: wrap; align-items: flex-end; justify-content: space-between; margin-bottom: 3rem; gap: 1.5rem;">
            <div>
                <div class="google-reviews-header-badge">
                    <span style="font-size: 1.1rem;">⭐</span>
                    <strong style="color: var(--text-dark); font-size: 0.9rem;">EXCELENTE 5.0 / 5.0</strong>
                    <span style="color: var(--text-muted); font-size: 0.85rem;">• En base a 11 reseñas verificadas en Google</span>
                </div>
                <h2 style="font-size: 2.3rem;">Lo que Dicen Quienes Confían en REW</h2>
                <p style="color: var(--text-muted); font-size: 1.05rem; max-width: 650px;">
                    Opiniones 100% reales de clientes y emprendedores que han escalado sus negocios digitales con nosotros.
                </p>
            </div>
            <a href="https://maps.google.com" target="_blank" rel="noopener noreferrer" class="btn btn-outline">
                <span>Ver Reseñas en Google Maps →</span>
            </a>
        </div>

        <div class="google-reviews-grid">
            <!-- Review 1: Luis Loyola -->
            <div class="google-review-card spotlight-card">
                <div>
                    <div class="review-author-wrap">
                        <div class="review-avatar">LL</div>
                        <div>
                            <div class="review-author-name">Luis Loyola</div>
                            <div class="review-date">14 Marzo 2024</div>
                        </div>
                    </div>
                    <div class="review-stars">★★★★★</div>
                    <p class="review-body-text">
                        "Excelente servicio, te avisan de avances y acompañan en el proceso, 100% recomendables para quienes quieran darle un toque profesional a su plataforma."
                    </p>
                </div>
                <div class="review-google-pill">
                    <span>✓ Reseña verificada en Google</span>
                </div>
            </div>

            <!-- Review 2: Katy Saez -->
            <div class="google-review-card spotlight-card">
                <div>
                    <div class="review-author-wrap">
                        <div class="review-avatar" style="background: linear-gradient(135deg, #ec4899 0%, #f43f5e 100%);">KS</div>
                        <div>
                            <div class="review-author-name">Katy Saez</div>
                            <div class="review-date">9 Marzo 2024 • Sabor a Sur Lonquimay</div>
                        </div>
                    </div>
                    <div class="review-stars">★★★★★</div>
                    <p class="review-body-text">
                        "Muchas gracias por los trabajos realizados a mi empresa gastronómica, fue una grata experiencia, un profesionalismo impecable, una paciencia genial. Apoyo desde el principio hasta el final, los recomiendo 100%."
                    </p>
                </div>
                <div class="review-google-pill">
                    <span>✓ Reseña verificada en Google</span>
                </div>
            </div>

            <!-- Review 3: Joaquin Rodriguez -->
            <div class="google-review-card spotlight-card">
                <div>
                    <div class="review-author-wrap">
                        <div class="review-avatar" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);">JR</div>
                        <div>
                            <div class="review-author-name">Joaquin Rodriguez</div>
                            <div class="review-date">1 Marzo 2024</div>
                        </div>
                    </div>
                    <div class="review-stars">★★★★★</div>
                    <p class="review-body-text">
                        "Profesionales 100%. Te acompañan de principio a fin escuchando y entendiendo tus ideas. Además, apoyan a nuevos emprendedores con precios super razonables. Voy trabajando con el segundo pedido con ellos. 100% recomendado."
                    </p>
                </div>
                <div class="review-google-pill">
                    <span>✓ Reseña verificada en Google</span>
                </div>
            </div>

            <!-- Review 4: Daniel Alejandro Toro Ponce -->
            <div class="google-review-card spotlight-card">
                <div>
                    <div class="review-author-wrap">
                        <div class="review-avatar" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">DT</div>
                        <div>
                            <div class="review-author-name">Daniel Alejandro Toro Ponce</div>
                            <div class="review-date">9 Febrero 2024</div>
                        </div>
                    </div>
                    <div class="review-stars">★★★★★</div>
                    <p class="review-body-text">
                        "Rew Chile desde el momento que los contacté, me dieron confianza y no me equivoqué, su trato fue genial, siempre dispuestos a avanzar y ayudar en los desarrollos que tenía pendientes, involucrándose al 100%."
                    </p>
                </div>
                <div class="review-google-pill">
                    <span>✓ Reseña verificada en Google</span>
                </div>
            </div>

            <!-- Review 5: Mauricio Aguirre -->
            <div class="google-review-card spotlight-card">
                <div>
                    <div class="review-author-wrap">
                        <div class="review-avatar" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);">MA</div>
                        <div>
                            <div class="review-author-name">Mauricio Aguirre</div>
                            <div class="review-date">12 Enero 2023</div>
                        </div>
                    </div>
                    <div class="review-stars">★★★★★</div>
                    <p class="review-body-text">
                        "Álvaro es un excelente profesional. Cada vez que he necesitado sus servicios me ha respondido con prontitud y eficiencia, y me ha cobrado precios absolutamente razonables. Lo recomiendo totalmente."
                    </p>
                </div>
                <div class="review-google-pill">
                    <span>✓ Reseña verificada en Google</span>
                </div>
            </div>

            <!-- Review 6: Rodrigo Valenzuela -->
            <div class="google-review-card spotlight-card">
                <div>
                    <div class="review-author-wrap">
                        <div class="review-avatar" style="background: linear-gradient(135deg, #6366f1 0%, #4338ca 100%);">RV</div>
                        <div>
                            <div class="review-author-name">Rodrigo Valenzuela</div>
                            <div class="review-date">23 Diciembre 2022</div>
                        </div>
                    </div>
                    <div class="review-stars">★★★★★</div>
                    <p class="review-body-text">
                        "Excelente servicio, son un equipo muy comprometido, rápidos, profesionales y de una excelente calidad humana. Sin duda los recomendaría al 100% en cualquier tipo de proyecto."
                    </p>
                </div>
                <div class="review-google-pill">
                    <span>✓ Reseña verificada en Google</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     PREGUNTAS FRECUENTES (13 FAQs OFICIALES)
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div style="text-align: center; max-width: 750px; margin: 0 auto 3.5rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Respuestas Claras</span>
            <h2 style="font-size: 2.4rem; margin-bottom: 1rem;">Preguntas Frecuentes sobre Nuestros Servicios</h2>
            <p style="color: var(--text-muted); font-size: 1.1rem;">
                Todo lo que necesitas saber antes de iniciar tu desarrollo web, software a medida o estrategia SEO en Chile.
            </p>
        </div>

        <div class="faq-accordion-wrap">
            <!-- FAQ 1: Definición Canónica de Entidad REW para Google & AI Overviews -->
            <div class="faq-card-item is-open">
                <button type="button" class="faq-header-btn">
                    <span>1. ¿Qué es REW y a qué se dedica?</span>
                    <span class="faq-icon-chevron">▼</span>
                </button>
                <div class="faq-content-body">
                    <strong>REW</strong> (<a href="https://rew.cl" style="color: var(--primary); font-weight: 700;">rew.cl</a>) es una <strong>agencia de ingeniería digital y software factory en Chile</strong> fundada y dirigida por el Ingeniero Informático <strong>Álvaro Valenzuela Valdés</strong>. Nos especializamos en desarrollo de software a medida en <strong>Laravel</strong>, creación de tiendas online en <strong>WooCommerce</strong> de alto impacto, integraciones ERP en tiempo real (<strong>Bsale</strong> con DTE SII y <strong>Odoo</strong>), asistentes de Inteligencia Artificial con arquitectura <strong>RAG y Machine Learning</strong>, y <strong>posicionamiento SEO</strong> avanzado. Además, brindamos una solución digital 360° que incluye <strong>gestión y creación de contenido en Redes Sociales</strong>, administración de <strong>publicidad digital en Google Ads y Meta Ads</strong>, <strong>limpieza de virus y desinfección de malware en WordPress</strong>, y configuración avanzada de <strong>servidores Linux</strong> para potenciar integralmente el crecimiento de nuestros clientes.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="faq-card-item">
                <button type="button" class="faq-header-btn">
                    <span>2. ¿Por qué contratar una agencia de desarrollo y diseño web en Chile como REW?</span>
                    <span class="faq-icon-chevron">▼</span>
                </button>
                <div class="faq-content-body">
                    Contratar una agencia especializada y con liderazgo de ingeniería como REW garantiza resultados profesionales, código limpio y ultra rápido optimizado para Google. Además, obtienes asesoría directa sin intermediarios con el Ingeniero Álvaro Valenzuela Valdés para asegurar que tu plataforma convierta visitas en clientes reales.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="faq-card-item">
                <button type="button" class="faq-header-btn">
                    <span>2. ¿Cuánto tiempo tarda el diseño y desarrollo de un sitio web o software?</span>
                    <span class="faq-icon-chevron">▼</span>
                </button>
                <div class="faq-content-body">
                    Generalmente, un sitio web corporativo o tienda e-commerce estándar toma entre 2 y 4 semanas. Plataformas de software SaaS o sistemas a medida en Laravel toman de 4 a 8 semanas según la complejidad y módulos integrados. Siempre establecemos un cronograma de entregas fijas por contrato.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="faq-card-item">
                <button type="button" class="faq-header-btn">
                    <span>3. ¿Qué diferencia hay entre diseño web y desarrollo de software?</span>
                    <span class="faq-icon-chevron">▼</span>
                </button>
                <div class="faq-content-body">
                    El <strong>diseño web (UX/UI)</strong> se centra en la estética visual, la experiencia del usuario, wireframes y flujos interactivos en Figma. El <strong>desarrollo de software</strong> es la arquitectura técnica profunda: lógica en Laravel/PHP, bases de datos SQL optimizadas, APIs RESTful, seguridad perimetral e integración con Inteligencia Artificial.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="faq-card-item">
                <button type="button" class="faq-header-btn">
                    <span>4. ¿Mi sitio web estará optimizado para SEO desde el primer día?</span>
                    <span class="faq-icon-chevron">▼</span>
                </button>
                <div class="faq-content-body">
                    Sí, absolutamente. En REW todos los proyectos incluyen optimización SEO técnica on-page: estructura semántica HTML5, Schema JSON-LD para Google Rich Snippets, sitemap XML automatizado, URLs canónicas, compresión WebP y tiempos de carga con métricas Core Web Vitals en verde (95+ puntos).
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="faq-card-item">
                <button type="button" class="faq-header-btn">
                    <span>5. ¿Puedo actualizar y administrar mi sitio web fácilmente tras el lanzamiento?</span>
                    <span class="faq-icon-chevron">▼</span>
                </button>
                <div class="faq-content-body">
                    Sí. Desarrollamos paneles de administración intuitivos y modernos, ya sea en WordPress/WooCommerce o dashboards a medida, para que puedas editar textos, precios, imágenes y productos en segundos sin requerir conocimientos de programación.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="faq-card-item">
                <button type="button" class="faq-header-btn">
                    <span>6. ¿Realizan rediseños y migraciones de sitios web antiguos?</span>
                    <span class="faq-icon-chevron">▼</span>
                </button>
                <div class="faq-content-body">
                    Sí, somos especialistas en rescate y rediseño de plataformas obsoletas. Transformamos sitios lentos o vulnerables en experiencias de alto rendimiento, cuidando el posicionamiento orgánico previo mediante redirecciones 301 para no perder tráfico de Google.
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="faq-card-item">
                <button type="button" class="faq-header-btn">
                    <span>7. ¿Qué tipo de soporte y garantía brindan tras la entrega?</span>
                    <span class="faq-icon-chevron">▼</span>
                </button>
                <div class="faq-content-body">
                    Todos nuestros proyectos cuentan con garantía técnica contra errores de código, copias de respaldo continuas y planes de mantenimiento preventivo mensual con soporte prioritario vía WhatsApp directo.
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="faq-card-item">
                <button type="button" class="faq-header-btn">
                    <span>8. ¿El sitio web se verá perfecto en teléfonos móviles y tablets?</span>
                    <span class="faq-icon-chevron">▼</span>
                </button>
                <div class="faq-content-body">
                    Sí, aplicamos diseño Mobile-First y Responsive estricto. Cada interfaz es probada en dispositivos iOS, Android y pantallas de escritorio de distintas resoluciones para asegurar fluidez y botones táctiles optimizados.
                </div>
            </div>

            <!-- FAQ 9 -->
            <div class="faq-card-item">
                <button type="button" class="faq-header-btn">
                    <span>9. ¿Qué información necesitan para comenzar a trabajar en mi proyecto?</span>
                    <span class="faq-icon-chevron">▼</span>
                </button>
                <div class="faq-content-body">
                    Para iniciar, realizamos una sesión de análisis técnico donde revisamos tu modelo de negocio, objetivos, referencias visuales y funciones clave. Te acompañamos redactando la estructura y proponiendo la mejor solución tecnológica.
                </div>
            </div>

            <!-- FAQ 10 -->
            <div class="faq-card-item">
                <button type="button" class="faq-header-btn">
                    <span>10. ¿Pueden ayudarme con publicidad digital en Google Ads y Meta Ads?</span>
                    <span class="faq-icon-chevron">▼</span>
                </button>
                <div class="faq-content-body">
                    Sí, gestionamos campañas científicas de alto ROAS con seguimiento de conversiones API (CAPI), píxeles avanzados y segmentación de prospectos calificados para asegurar el máximo retorno de inversión.
                </div>
            </div>

            <!-- FAQ 11 -->
            <div class="faq-card-item">
                <button type="button" class="faq-header-btn">
                    <span>11. ¿Cuánto cuesta un sitio web profesional o software en Chile?</span>
                    <span class="faq-icon-chevron">▼</span>
                </button>
                <div class="faq-content-body">
                    El valor depende de los requerimientos y escala del proyecto. Puedes usar nuestro <a href="{{ route('contacto') }}" style="color: var(--primary); font-weight: 700; text-decoration: underline;">Cotizador en Línea</a> para recibir un presupuesto estimado instantáneo o agendar una sesión sin costo con nosotros.
                </div>
            </div>

            <!-- FAQ 12 -->
            <div class="faq-card-item">
                <button type="button" class="faq-header-btn">
                    <span>12. ¿Qué tecnologías utilizan en los desarrollos?</span>
                    <span class="faq-icon-chevron">▼</span>
                </button>
                <div class="faq-content-body">
                    Trabajamos con el stack tecnológico más moderno y seguro: PHP 8.3+, Laravel 11, WordPress/WooCommerce de alto rendimiento, MySQL/PostgreSQL, TailwindCSS, JavaScript moderno, Vite, Redis y modelos de Inteligencia Artificial (OpenAI, Claude, RAG).
                </div>
            </div>

            <!-- FAQ 13 -->
            <div class="faq-card-item">
                <button type="button" class="faq-header-btn">
                    <span>13. ¿Pueden integrarse pasarelas de pago chilenas y CRMs?</span>
                    <span class="faq-icon-chevron">▼</span>
                </button>
                <div class="faq-content-body">
                    Sí. Integramos Webpay Plus (Transbank), Mercado Pago, Flow, PayPal, Stripe, facturación electrónica automática (SII), WhatsApp Business API, HubSpot y cualquier CRM que utilice tu empresa.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     AGENDAMIENTO DIRECTO CALENDLY & SESIÓN TÉCNICA
     ========================================================================== -->
<section class="section" style="background: #0f172a; color: #ffffff;">
    <div class="container">
        <div class="grid-2col-cta" style="align-items: center;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 1rem;">Sesión Estratégica Sin Costo</span>
                <h2 style="font-size: 2.5rem; color: #ffffff; margin-bottom: 1.25rem; line-height: 1.2;">
                    Hagamos Crecer tu Negocio Juntos 🚀
                </h2>
                <p style="color: #cbd5e1; font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.75rem;">
                    Agenda una videollamada directa de 20 minutos con <strong>Álvaro Valenzuela Valdés</strong>. Revisaremos tus dudas técnicas, evaluaremos tu sitio actual y definiremos la mejor estrategia de software o marketing.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-bottom: 2rem; font-size: 0.95rem; color: #e2e8f0;">
                    <div>✓ Revisión técnica y análisis de Core Web Vitals en vivo</div>
                    <div>✓ Propuesta de arquitectura escalable adaptada a tu presupuesto</div>
                    <div>✓ Trato 100% directo, honesto y personalizado</div>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="https://calendly.com/satorisatorchile/rew?hide_event_type_details=1&hide_gdpr_banner=1" target="_blank" rel="noopener noreferrer" class="btn btn-gold btn-lg">
                        <span>📅 Agendar en Calendly</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, me gustaría coordinar una sesión estratégica para mi proyecto.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 Hablar por WhatsApp</span>
                    </a>
                </div>
            </div>

            <div style="background: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: var(--radius-xl); padding: 2.25rem; text-align: center;">
                <x-founder-animated-avatar />
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

<!-- Schema JSON-LD FAQPage & Organization -->
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "https://rew.cl/#organization",
      "name": "REW",
      "alternateName": ["REW Chile", "Agencia REW", "REW Software & SEO", "rew.cl", "REW SpA"],
      "legalName": "REW SpA",
      "disambiguatingDescription": "Software factory y agencia tecnológica chilena especializada en desarrollo de software a medida en Laravel, tiendas WooCommerce, integraciones ERP en tiempo real y posicionamiento SEO.",
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
        "jobTitle": "Ingeniero Informático & Fundador de REW",
        "url": "https://rew.cl/nosotros"
      }
    },
    {
      "@type": "FAQPage",
      "@id": "https://rew.cl/#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "¿Qué es REW y a qué se dedica?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "REW (rew.cl) es una agencia de ingeniería digital y software factory en Chile fundada y dirigida por el Ingeniero Informático Álvaro Valenzuela Valdés. Nos especializamos en desarrollo de software a medida en Laravel, creación de tiendas online WooCommerce de alto impacto, integraciones ERP en tiempo real (Bsale con DTE SII y Odoo), desarrollo de asistentes de Inteligencia Artificial (RAG y Machine Learning), posicionamiento SEO avanzado, gestión y creación de contenido en Redes Sociales, administración de publicidad en Google Ads y Meta Ads, desinfección y limpieza de virus en WordPress, y configuración de servidores Linux para potenciar el crecimiento de empresas y marcas."
          }
        },
        {
          "@type": "Question",
          "name": "¿Por qué contratar una agencia de desarrollo y diseño web en Chile como REW?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Contratar una agencia especializada y con liderazgo de ingeniería como REW garantiza resultados profesionales, código limpio y ultra rápido optimizado para Google. Además, obtienes asesoría directa sin intermediarios con el Ingeniero Álvaro Valenzuela Valdés para asegurar que tu plataforma convierta visitas en clientes reales."
          }
        },
        {
          "@type": "Question",
          "name": "¿Cuánto tiempo tarda el diseño y desarrollo de un sitio web o software?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Generalmente, un sitio web corporativo o tienda e-commerce estándar toma entre 2 y 4 semanas. Plataformas de software SaaS o sistemas a medida en Laravel toman de 4 a 8 semanas según la complejidad y módulos integrados. Siempre establecemos un cronograma de entregas fijas por contrato."
          }
        },
        {
          "@type": "Question",
          "name": "¿Mi sitio web estará optimizado para SEO desde el primer día?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Sí. Todos nuestros proyectos incluyen optimización SEO técnica on-page: estructura semántica HTML5, Schema JSON-LD para Google Rich Snippets, sitemap XML automatizado, URLs canónicas, compresión WebP y tiempos de carga con métricas Core Web Vitals en verde (95+ puntos)."
          }
        },
        {
          "@type": "Question",
          "name": "¿Cómo puedo cotizar o contactar a REW?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Puedes solicitar una cotización formal a través de nuestro sitio web en https://rew.cl/contacto o comunicarte de inmediato por WhatsApp al +56 9 8726 1127 para recibir atención directa con el Ingeniero Álvaro Valenzuela Valdés."
          }
        }
      ]
    }
  ]
}
</script>
@endverbatim
@endsection
