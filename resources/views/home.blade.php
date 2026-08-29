@extends('layouts.app')

@section('title', 'REW | Agencia de Software, SEO y Tienda de Plugins en Chile')
@section('meta_description', 'Agencia de desarrollo de software a medida, sitios web de alta velocidad, SEO en Chile y plugins WordPress con IA. Liderada por Álvaro Valenzuela Valdés.')

@section('og_title', 'REW | Agencia de Desarrollo de Software, SEO y Tienda de Plugins en Chile')
@section('og_description', 'Transformamos negocios con software a medida en Laravel, tiendas WooCommerce, posicionamiento SEO técnico y asistentes virtuales de Inteligencia Artificial.')
@section('og_image', asset('images/logo.webp'))

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

                <!-- Stats Row -->
                <div class="hero-stats-row">
                    <div class="stat-item">
                        <h4>+6 Años</h4>
                        <p>Liderando proyectos digitales</p>
                    </div>
                    <div class="stat-item">
                        <h4>+150K</h4>
                        <p>Usuarios mensuales impactados</p>
                    </div>
                    <div class="stat-item">
                        <h4>100%</h4>
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
     PLUGINS DESTACADOS / TIENDA SHOWCASE
     ========================================================================== -->
<section class="section">
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
                <div class="card product-card spotlight-card">
                    <div class="product-img-wrap">
                        @if($prod->badge)
                            <div class="product-badge-top">
                                <span class="badge {{ str_contains($prod->badge, 'OFERTA') ? 'badge-gold' : 'badge-primary' }}">
                                    {{ $prod->badge }}
                                </span>
                            </div>
                        @endif
                        <a href="{{ route('tienda.show', $prod->slug) }}">
                            <img src="{{ Str::startsWith($prod->featured_image, 'http') ? $prod->featured_image : asset(ltrim($prod->featured_image, '/')) }}" alt="{{ $prod->name }}" class="product-img" loading="lazy">
                        </a>
                    </div>
                    <div class="product-content">
                        <div class="product-category">{{ $prod->category_slug }}</div>
                        <h3 class="product-title">
                            <a href="{{ route('tienda.show', $prod->slug) }}" style="color: inherit;">
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
                            <a href="{{ route('tienda.show', $prod->slug) }}" class="btn btn-outline" title="Ver Detalles">
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
                        <div class="portfolio-tech-tags">
                            @foreach(array_slice(explode(',', $project->technologies), 0, 3) as $tech)
                                <span class="tech-tag">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                        <a href="{{ route('portafolio.show', $project->slug) }}" class="btn btn-outline btn-sm" style="width: 100%; text-align: center;">
                            <span>Ver Caso de Estudio →</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Interactive Speed Benchmark Simulator -->
@include('components.speed-benchmark')

<!-- ==========================================================================
     COTIZADOR INTELIGENTE EXPRESS TEASER
     ========================================================================== -->
<section class="section" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #ffffff;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 3.5rem; align-items: center;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 1rem;">Cotización Inmediata</span>
                <h2 style="font-size: 2.6rem; color: #ffffff; margin-bottom: 1.25rem; line-height: 1.2;">
                    ¿Tienes una idea o necesitas rediseñar tu software?
                </h2>
                <p style="color: #cbd5e1; font-size: 1.15rem; line-height: 1.6; margin-bottom: 2rem;">
                    Usa nuestro cotizador interactivo multi-canal. Calculamos tu presupuesto estimado en tiempo real y te enviamos la propuesta directamente a tu WhatsApp o correo electrónico.
                </p>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="{{ route('contacto') }}" class="btn btn-gold btn-lg">
                        <span>⚡ Iniciar Cotizador en Línea</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127" target="_blank" rel="noopener" class="btn btn-whatsapp btn-lg">
                        <span>💬 Hablar por WhatsApp</span>
                    </a>
                </div>
            </div>

            <div style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.15); border-radius: var(--radius-xl); padding: 2.25rem; backdrop-filter: blur(10px);">
                <h3 style="color: #ffffff; font-size: 1.3rem; margin-bottom: 1.5rem;">Beneficios de Trabajar con REW</h3>
                <div style="display: flex; flex-direction: column; gap: 1.2rem;">
                    <div style="display: flex; align-items: flex-start; gap: 12px;">
                        <span style="font-size: 1.3rem; color: var(--accent-gold);">✓</span>
                        <div>
                            <strong style="color: #ffffff; display: block; font-size: 1rem;">Trato Directo con Ingeniero Líder</strong>
                            <span style="color: #94a3b8; font-size: 0.9rem;">Sin intermediarios. Álvaro Valenzuela gestiona y lidera la arquitectura.</span>
                        </div>
                    </div>
                    <div style="display: flex; align-items: flex-start; gap: 12px;">
                        <span style="font-size: 1.3rem; color: var(--accent-gold);">✓</span>
                        <div>
                            <strong style="color: #ffffff; display: block; font-size: 1rem;">Código Propio, Limpio y Escalable</strong>
                            <span style="color: #94a3b8; font-size: 0.9rem;">Estándares de seguridad y rendimiento listos para soportar alto tráfico.</span>
                        </div>
                    </div>
                    <div style="display: flex; align-items: flex-start; gap: 12px;">
                        <span style="font-size: 1.3rem; color: var(--accent-gold);">✓</span>
                        <div>
                            <strong style="color: #ffffff; display: block; font-size: 1rem;">Integración con IA de Vanguardia</strong>
                            <span style="color: #94a3b8; font-size: 0.9rem;">Modelos RAG y asistentes entrenados exclusivamente para tu negocio.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
