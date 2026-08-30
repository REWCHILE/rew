<style>
/* ==========================================================================
   COMPLETE EMBEDDED MEGA MENU & MOBILE DRAWER STYLES
   ========================================================================== */
@media (min-width: 992px) {
    .mobile-nav-drawer,
    .mobile-nav-backdrop,
    .mobile-nav-toggle {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        pointer-events: none !important;
    }
    .nav-item-dropdown {
        position: relative;
    }
    .mega-menu-container {
        position: absolute;
        top: calc(100% + 12px);
        left: 50%;
        transform: translateX(-50%) translateY(12px);
        width: 1160px;
        max-width: 96vw;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25), 0 0 0 1px rgba(226, 232, 240, 0.9);
        padding: 1.75rem 2rem 1.25rem;
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        z-index: 10000;
    }
    .nav-item-dropdown:hover .mega-menu-container,
    .nav-item-dropdown.is-open .mega-menu-container {
        opacity: 1 !important;
        visibility: visible !important;
        pointer-events: auto !important;
        transform: translateX(-50%) translateY(0) !important;
        display: block !important;
    }
    .mega-menu-full-grid {
        display: grid !important;
        grid-template-columns: 1fr 1fr 340px !important;
        gap: 1.75rem !important;
        align-items: stretch !important;
    }
}

@media (max-width: 991px) {
    .mega-menu-container {
        display: none !important;
    }
    .mobile-nav-toggle {
        display: flex !important;
    }
}

/* Mega Menu Internal Structure & Typography */
.mega-category-title {
    font-size: 0.76rem;
    font-weight: 800;
    color: #64748b;
    letter-spacing: 0.08em;
    margin-bottom: 0.85rem;
    padding-bottom: 0.4rem;
    border-bottom: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    gap: 6px;
}

.mega-col-links {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.mega-service-card-v2 {
    display: flex !important;
    align-items: flex-start !important;
    gap: 12px !important;
    padding: 0.75rem 0.9rem !important;
    border-radius: 12px !important;
    background: #ffffff !important;
    border: 1px solid transparent !important;
    text-decoration: none !important;
    color: inherit !important;
    transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1) !important;
    cursor: pointer;
}

.mega-service-card-v2:hover,
.mega-service-card-v2.active {
    background: #f8fafc !important;
    border-color: #e2e8f0 !important;
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04) !important;
    transform: translateX(4px);
}

.mega-icon-box {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.15rem;
    flex-shrink: 0;
    background: #f1f5f9;
    transition: transform 0.2s ease;
}

.mega-service-card-v2:hover .mega-icon-box {
    transform: scale(1.1);
}

.mega-info {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.mega-title {
    font-size: 0.92rem !important;
    font-weight: 700 !important;
    color: #0f172a !important;
    display: flex !important;
    align-items: center !important;
    gap: 6px !important;
    line-height: 1.3 !important;
    text-decoration: none !important;
}

.mega-desc {
    font-size: 0.78rem !important;
    color: #64748b !important;
    line-height: 1.4 !important;
    margin: 0 !important;
}

/* Badges Inside Menu */
.badge-mini {
    font-size: 0.65rem;
    padding: 2px 7px;
    border-radius: 9999px;
    font-weight: 800;
    letter-spacing: 0.02em;
    display: inline-block;
}

.badge-purple { background: rgba(124, 58, 237, 0.12); color: #7c3aed; }
.badge-blue { background: rgba(37, 99, 235, 0.12); color: #2563eb; }
.badge-pink { background: rgba(236, 72, 153, 0.12); color: #ec4899; }
.badge-green { background: rgba(16, 185, 129, 0.12); color: #059669; }
.badge-gold { background: rgba(245, 158, 11, 0.15); color: #d97706; }
.badge-teal { background: rgba(13, 148, 136, 0.12); color: #0d9488; }
.badge-amber { background: rgba(217, 119, 6, 0.12); color: #d97706; }

.badge-active-dot {
    color: #10b981;
    font-size: 0.72rem;
    font-weight: 800;
    margin-left: auto;
}

/* Spotlight Card in Mega Menu (Refined Modern Aesthetic) */
.mega-col-spotlight,
.mega-featured-card-v2,
#megaSpotlightCard {
    background: linear-gradient(180deg, #f8fafc 0%, #eef2ff 100%) !important;
    border: 1px solid #e0e7ff !important;
    border-radius: 16px !important;
    padding: 0 !important;
    color: #0f172a !important;
    display: flex !important;
    flex-direction: column !important;
    justify-content: space-between !important;
    box-shadow: 0 4px 15px rgba(79, 70, 229, 0.06) !important;
    overflow: hidden !important;
}

.mega-spotlight-body {
    padding: 1.25rem !important;
    background: transparent !important;
    display: flex !important;
    flex-direction: column !important;
    flex-grow: 1 !important;
}


.mega-spotlight-img-wrap {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 0.85rem;
    border: 1px solid #cbd5e1;
    background: #0f172a;
}

.mega-spotlight-img {
    width: 100%;
    height: 135px;
    object-fit: cover;
    display: block;
    transition: transform 0.3s ease;
}

.mega-spotlight-badge {
    position: absolute;
    top: 8px;
    left: 8px;
    background: rgba(15, 23, 42, 0.85);
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
    color: #fbbf24;
    font-size: 0.68rem;
    font-weight: 800;
    padding: 3px 8px;
    border-radius: 6px;
    border: 1px solid rgba(251, 191, 36, 0.3);
    letter-spacing: 0.03em;
}

.mega-spotlight-title {
    font-size: 1.1rem !important;
    font-weight: 800 !important;
    color: #0f172a !important;
    margin-bottom: 0.4rem !important;
    line-height: 1.3 !important;
    font-family: inherit !important;
}

.mega-spotlight-desc {
    font-size: 0.82rem !important;
    color: #475569 !important;
    line-height: 1.45 !important;
    margin-bottom: 0.75rem !important;
}

.mega-spotlight-bullets {
    display: flex !important;
    flex-direction: column !important;
    gap: 0.35rem !important;
    font-size: 0.8rem !important;
    color: #334155 !important;
    margin-bottom: 1rem !important;
    font-weight: 600 !important;
}

.mega-spotlight-bullets div {
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Mega Menu Bottom Strip */
.mega-bottom-strip {
    margin-top: 1.25rem;
    padding-top: 1rem;
    border-top: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 0.84rem;
}

.mega-bottom-left {
    display: flex;
    align-items: center;
    gap: 8px;
}

.mega-wa-link {
    color: #059669 !important;
    font-weight: 700 !important;
    text-decoration: none !important;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: transform 0.2s ease;
}

.mega-wa-link:hover {
    transform: translateX(4px);
    text-decoration: underline !important;
}
</style>

<header class="header-main" id="siteHeader">

    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="logo-link" aria-label="REW - Inicio">
                <div class="logo-badge-container">
                    <img src="{{ asset('images/logo.webp') }}" alt="REW" class="logo-img">
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            @php
                $activeService = null;
                if (request()->routeIs('servicios.software-chile')) $activeService = 'software';
                elseif (request()->routeIs('servicios.desarrollo-web')) $activeService = 'web';
                elseif (request()->routeIs('servicios.diseno-ux-ui')) $activeService = 'ux';
                elseif (request()->routeIs('servicios.seo')) $activeService = 'seo';
                elseif (request()->routeIs('servicios.publicidad')) $activeService = 'ads';
                elseif (request()->routeIs('servicios.mantenimiento')) $activeService = 'maintenance';
                elseif (request()->routeIs('servicios.soporte-wordpress')) $activeService = 'wordpress';
            @endphp
            <ul class="nav-menu">
                <li>
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Inicio</a>
                </li>
                <li>
                    <a href="{{ route('nosotros') }}" class="nav-link {{ request()->routeIs('nosotros') ? 'active' : '' }}">Nosotros</a>
                </li>
                <li>
                    <a href="{{ route('tienda.index') }}" class="nav-link {{ request()->routeIs('tienda.*') ? 'active' : '' }}">
                        Tienda <span class="badge badge-gold" style="font-size: 0.65rem; padding: 2px 6px;">IA & WP</span>
                    </a>
                </li>
                <li class="nav-item-dropdown">
                    <a href="{{ route('servicios.index') }}" class="nav-link {{ request()->routeIs('servicios.*') ? 'active' : '' }}">
                        Servicios <span style="font-size: 0.75rem;">▾</span>
                    </a>
                    
                    <!-- Full-Width Desktop Mega Menu Panel -->
                    <div class="dropdown-menu mega-menu-container">
                        <div class="container">
                            <div class="mega-menu-full-grid">
                                <!-- Column 1: Desarrollo & Arquitectura de Software -->
                                <div class="mega-col">
                                    <div class="mega-category-title">
                                        <span>💻 DESARROLLO & ARQUITECTURA</span>
                                    </div>
                                    <div class="mega-col-links">
                                        <a href="{{ route('servicios.software-chile') }}" 
                                           class="mega-service-card-v2 {{ $activeService === 'software' ? 'active current-page' : (!$activeService ? 'active' : '') }}"
                                           data-service="software"
                                           data-badge="⭐ ARQUITECTURA DE VANGUARDIA"
                                           data-title="Software a Medida & Asistentes IA"
                                           data-desc="Impulsa tu negocio con tecnología propietaria: desde CRMs y APIs hasta bots RAG entrenados con tus documentos."
                                           data-bullets="✓ 100% Código Limpio en Laravel & PHP 8.3|✓ Trato directo con Ingeniero Álvaro Valenzuela"
                                           data-img="{{ asset('images/megamenu_software_ai.webp') }}"
                                           data-cta-url="{{ route('servicios.software-chile') }}"
                                           data-cta-text="🚀 Cotizar Software a Medida">
                                            <div class="mega-icon-box icon-software">💻</div>
                                            <div class="mega-info">
                                                <div class="mega-title">
                                                    Software a Medida & SaaS
                                                    <span class="badge-mini badge-purple">Laravel</span>
                                                    @if($activeService === 'software')
                                                        <span class="badge-active-dot" title="Página Actual">● Actual</span>
                                                    @endif
                                                </div>
                                                <p class="mega-desc">Plataformas SaaS, ERPs, APIs y sistemas empresariales a medida con arquitectura escalable.</p>
                                            </div>
                                        </a>
                                        
                                        <a href="{{ route('servicios.desarrollo-web') }}" 
                                           class="mega-service-card-v2 {{ $activeService === 'web' ? 'active current-page' : '' }}"
                                           data-service="web"
                                           data-badge="🌐 DESARROLLO WEB & E-COMMERCE"
                                           data-title="Desarrollo Web & Tiendas WooCommerce"
                                           data-desc="Sitios corporativos de alto impacto y tiendas online con pasarelas de pago chilenas y métricas Core Web Vitals en verde."
                                           data-bullets="✓ Carga ultra rápida optimizada para Google|✓ Integración Webpay Plus, Mercado Pago y Flow"
                                           data-img="{{ asset('images/megamenu_web_dev.webp') }}"
                                           data-cta-url="{{ route('servicios.desarrollo-web') }}"
                                           data-cta-text="🌐 Ver Planes de Desarrollo Web">
                                            <div class="mega-icon-box icon-web">🌐</div>
                                            <div class="mega-info">
                                                <div class="mega-title">
                                                    Desarrollo Web & E-Commerce
                                                    <span class="badge-mini badge-blue">WooCommerce</span>
                                                    @if($activeService === 'web')
                                                        <span class="badge-active-dot" title="Página Actual">● Actual</span>
                                                    @endif
                                                </div>
                                                <p class="mega-desc">Sitios corporativos y tiendas online con carga ultra rápida y Core Web Vitals en verde.</p>
                                            </div>
                                        </a>

                                        <a href="{{ route('servicios.diseno-ux-ui') }}" 
                                           class="mega-service-card-v2 {{ $activeService === 'ux' ? 'active current-page' : '' }}"
                                           data-service="ux"
                                           data-badge="✨ DISEÑO UX / UI PROFESIONAL"
                                           data-title="Diseño UX / UI & Prototipado en Figma"
                                           data-desc="Interfaces intuitivas, funcionales y atractivas pensadas exclusivamente para maximizar la tasa de conversión y deleite del usuario."
                                           data-bullets="✓ Prototipos interactivos testeables en Figma|✓ Sistemas de diseño escalables y coherentes"
                                           data-img="{{ asset('images/megamenu_ux_ui_design.webp') }}"
                                           data-cta-url="{{ route('servicios.diseno-ux-ui') }}"
                                           data-cta-text="✨ Conocer Diseño UX / UI">
                                            <div class="mega-icon-box icon-ux">✨</div>
                                            <div class="mega-info">
                                                <div class="mega-title">
                                                    Diseño UX / UI en Figma
                                                    <span class="badge-mini badge-pink">Conversión</span>
                                                    @if($activeService === 'ux')
                                                        <span class="badge-active-dot" title="Página Actual">● Actual</span>
                                                    @endif
                                                </div>
                                                <p class="mega-desc">Interfaces intuitivas, prototipos en Figma y flujos orientados a la conversión de clientes.</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <!-- Column 2: Crecimiento, SEO & Infraestructura -->
                                <div class="mega-col">
                                    <div class="mega-category-title">
                                        <span>📈 CRECIMIENTO, SEO & SOPORTE</span>
                                    </div>
                                    <div class="mega-col-links">
                                        <a href="{{ route('servicios.seo') }}" 
                                           class="mega-service-card-v2 {{ $activeService === 'seo' ? 'active current-page' : '' }}"
                                           data-service="seo"
                                           data-badge="📈 POSICIONAMIENTO SEO & SEARCH IA"
                                           data-title="SEO Técnico & Posicionamiento en Google"
                                           data-desc="Estrategias de posicionamiento orgánico técnico para rankear en el Top 1 de Google y en respuestas de motores de IA generativa."
                                           data-bullets="✓ Optimización Schema JSON-LD y rastreo|✓ Auditoría técnica de velocidad y arquitectura"
                                           data-img="{{ asset('images/megamenu_seo_geo.webp') }}"
                                           data-cta-url="{{ route('servicios.seo') }}"
                                           data-cta-text="📈 Auditar mi Posicionamiento SEO">
                                            <div class="mega-icon-box icon-seo">📈</div>
                                            <div class="mega-info">
                                                <div class="mega-title">
                                                    SEO & GEO en Google e IA
                                                    <span class="badge-mini badge-green">Top 1</span>
                                                    @if($activeService === 'seo')
                                                        <span class="badge-active-dot" title="Página Actual">● Actual</span>
                                                    @endif
                                                </div>
                                                <p class="mega-desc">Posicionamiento orgánico técnico, Schema JSON-LD y visibilidad en Google y motores de IA.</p>
                                            </div>
                                        </a>

                                        <a href="{{ route('servicios.publicidad') }}" 
                                           class="mega-service-card-v2 {{ $activeService === 'ads' ? 'active current-page' : '' }}"
                                           data-service="ads"
                                           data-badge="🎯 PUBLICIDAD DIGITAL GOOGLE & META"
                                           data-title="Publicidad Digital de Alto Retorno (ROAS)"
                                           data-desc="Gestión científica de campañas en Google Ads y Meta Ads para captar prospectos calificados con el menor costo por adquisición."
                                           data-bullets="✓ Campañas de Search, Display y Retargeting|✓ Seguimiento avanzado con Conversions API (CAPI)"
                                           data-img="{{ asset('images/megamenu_ads_marketing.webp') }}"
                                           data-cta-url="{{ route('servicios.publicidad') }}"
                                           data-cta-text="🎯 Maximizar mi Retorno en Ads">
                                            <div class="mega-icon-box icon-ads">🎯</div>
                                            <div class="mega-info">
                                                <div class="mega-title">
                                                    Publicidad Digital de Alto ROAS
                                                    <span class="badge-mini badge-gold">Google & Meta</span>
                                                    @if($activeService === 'ads')
                                                        <span class="badge-active-dot" title="Página Actual">● Actual</span>
                                                    @endif
                                                </div>
                                                <p class="mega-desc">Gestión estratégica de campañas en Google Ads y Meta Ads con maximización de retorno.</p>
                                            </div>
                                        </a>

                                        <a href="{{ route('servicios.mantenimiento') }}" 
                                           class="mega-service-card-v2 {{ $activeService === 'maintenance' ? 'active current-page' : '' }}"
                                           data-service="maintenance"
                                           data-badge="🛡️ MANTENIMIENTO & SEGURIDAD WEB"
                                           data-title="Mantenimiento Preventivo & Uptime 24/7"
                                           data-desc="Cuidamos tu plataforma para que nunca se caiga ni sufra ataques, aplicando copias de respaldo continuas y parches de seguridad periódicos."
                                           data-bullets="✓ Monitoreo continuo de uptime 24/7|✓ Backups diarios en nube externa y blindaje"
                                           data-img="{{ asset('images/megamenu_maintenance_security.webp') }}"
                                           data-cta-url="{{ route('servicios.mantenimiento') }}"
                                           data-cta-text="🛡️ Proteger mi Sitio Web 24/7">
                                            <div class="mega-icon-box icon-security">🛡️</div>
                                            <div class="mega-info">
                                                <div class="mega-title">
                                                    Mantenimiento & Seguridad
                                                    <span class="badge-mini badge-teal">24/7 SLA</span>
                                                    @if($activeService === 'maintenance')
                                                        <span class="badge-active-dot" title="Página Actual">● Actual</span>
                                                    @endif
                                                </div>
                                                <p class="mega-desc">Protección perimetral, parches de seguridad, backups diarios y monitoreo continuo.</p>
                                            </div>
                                        </a>

                                        <a href="{{ route('servicios.soporte-wordpress') }}" 
                                           class="mega-service-card-v2 {{ $activeService === 'wordpress' ? 'active current-page' : '' }}"
                                           data-service="wordpress"
                                           data-badge="⚡ SOPORTE & RESCATE WORDPRESS"
                                           data-title="Soporte Técnico & Rescate WordPress"
                                           data-desc="Solución rápida y definitiva a pantallas blancas, caídas de base de datos, conflictos de plugins, infecciones y migraciones."
                                           data-bullets="✓ Respuesta prioritaria ante caídas críticas|✓ Limpieza profesional de malware y listas negras"
                                           data-img="{{ asset('images/megamenu_wordpress_support.webp') }}"
                                           data-cta-url="{{ route('servicios.soporte-wordpress') }}"
                                           data-cta-text="⚡ Solicitar Soporte WordPress">
                                            <div class="mega-icon-box icon-support">⚡</div>
                                            <div class="mega-info">
                                                <div class="mega-title">
                                                    Soporte & Rescate WordPress
                                                    <span class="badge-mini badge-amber">Urgencias</span>
                                                    @if($activeService === 'wordpress')
                                                        <span class="badge-active-dot" title="Página Actual">● Actual</span>
                                                    @endif
                                                </div>
                                                <p class="mega-desc">Corrección de errores críticos, limpieza de malware, aceleración y migraciones de hosting.</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <!-- Column 3: Featured Dynamic Spotlight Card -->
                                <div class="mega-col mega-col-spotlight">
                                    @php
                                        $initialBadge = '⭐ ARQUITECTURA DE VANGUARDIA';
                                        $initialTitle = 'Software a Medida & Asistentes IA';
                                        $initialDesc = 'Impulsa tu negocio con tecnología propietaria: desde CRMs y APIs hasta bots RAG entrenados con tus documentos.';
                                        $initialBullets = ['✓ 100% Código Limpio en Laravel & PHP 8.3', '✓ Trato directo con Ingeniero Álvaro Valenzuela'];
                                        $initialImg = asset('images/megamenu_software_ai.webp');
                                        $initialCtaUrl = route('servicios.software-chile');
                                        $initialCtaText = '🚀 Cotizar Software a Medida';

                                        if ($activeService === 'web') {
                                            $initialBadge = '🌐 DESARROLLO WEB & E-COMMERCE';
                                            $initialTitle = 'Desarrollo Web & Tiendas WooCommerce';
                                            $initialDesc = 'Sitios corporativos de alto impacto y tiendas online con pasarelas de pago chilenas y métricas Core Web Vitals en verde.';
                                            $initialBullets = ['✓ Carga ultra rápida optimizada para Google', '✓ Integración Webpay Plus, Mercado Pago y Flow'];
                                            $initialImg = asset('images/megamenu_web_dev.webp');
                                            $initialCtaUrl = route('servicios.desarrollo-web');
                                            $initialCtaText = '🌐 Ver Planes de Desarrollo Web';
                                        } elseif ($activeService === 'ux') {
                                            $initialBadge = '✨ DISEÑO UX / UI PROFESIONAL';
                                            $initialTitle = 'Diseño UX / UI & Prototipado en Figma';
                                            $initialDesc = 'Interfaces intuitivas, funcionales y atractivas pensadas exclusivamente para maximizar la tasa de conversión y deleite del usuario.';
                                            $initialBullets = ['✓ Prototipos interactivos testeables en Figma', '✓ Sistemas de diseño escalables y coherentes'];
                                            $initialImg = asset('images/megamenu_ux_ui_design.webp');
                                            $initialCtaUrl = route('servicios.diseno-ux-ui');
                                            $initialCtaText = '✨ Conocer Diseño UX / UI';
                                        } elseif ($activeService === 'seo') {
                                            $initialBadge = '📈 POSICIONAMIENTO SEO & SEARCH IA';
                                            $initialTitle = 'SEO Técnico & Posicionamiento en Google';
                                            $initialDesc = 'Estrategias de posicionamiento orgánico técnico para rankear en el Top 1 de Google y en respuestas de motores de IA generativa.';
                                            $initialBullets = ['✓ Optimización Schema JSON-LD y rastreo', '✓ Auditoría técnica de velocidad y arquitectura'];
                                            $initialImg = asset('images/megamenu_seo_geo.webp');
                                            $initialCtaUrl = route('servicios.seo');
                                            $initialCtaText = '📈 Auditar mi Posicionamiento SEO';
                                        } elseif ($activeService === 'ads') {
                                            $initialBadge = '🎯 PUBLICIDAD DIGITAL GOOGLE & META';
                                            $initialTitle = 'Publicidad Digital de Alto Retorno (ROAS)';
                                            $initialDesc = 'Gestión científica de campañas en Google Ads y Meta Ads para captar prospectos calificados con el menor costo por adquisición.';
                                            $initialBullets = ['✓ Campañas de Search, Display y Retargeting', '✓ Seguimiento avanzado con Conversions API (CAPI)'];
                                            $initialImg = asset('images/megamenu_ads_marketing.webp');
                                            $initialCtaUrl = route('servicios.publicidad');
                                            $initialCtaText = '🎯 Maximizar mi Retorno en Ads';
                                        } elseif ($activeService === 'maintenance') {
                                            $initialBadge = '🛡️ MANTENIMIENTO & SEGURIDAD WEB';
                                            $initialTitle = 'Mantenimiento Preventivo & Uptime 24/7';
                                            $initialDesc = 'Cuidamos tu plataforma para que nunca se caiga ni sufra ataques, aplicando copias de respaldo continuas y parches de seguridad periódicos.';
                                            $initialBullets = ['✓ Monitoreo continuo de uptime 24/7', '✓ Backups diarios en nube externa y blindaje'];
                                            $initialImg = asset('images/megamenu_maintenance_security.webp');
                                            $initialCtaUrl = route('servicios.mantenimiento');
                                            $initialCtaText = '🛡️ Proteger mi Sitio Web 24/7';
                                        } elseif ($activeService === 'wordpress') {
                                            $initialBadge = '⚡ SOPORTE & RESCATE WORDPRESS';
                                            $initialTitle = 'Soporte Técnico & Rescate WordPress';
                                            $initialDesc = 'Solución rápida y definitiva a pantallas blancas, caídas de base de datos, conflictos de plugins, infecciones y migraciones.';
                                            $initialBullets = ['✓ Respuesta prioritaria ante caídas críticas', '✓ Limpieza profesional de malware y listas negras'];
                                            $initialImg = asset('images/megamenu_wordpress_support.webp');
                                            $initialCtaUrl = route('servicios.soporte-wordpress');
                                            $initialCtaText = '⚡ Solicitar Soporte WordPress';
                                        }
                                    @endphp
                                    <div class="mega-featured-card-v2" id="megaSpotlightCard">
                                        <div class="mega-spotlight-img-wrap">
                                            <img src="{{ $initialImg }}" alt="Ingeniería y Software REW" class="mega-spotlight-img" id="megaSpotlightImg" loading="lazy">
                                            <div class="mega-spotlight-badge" id="megaSpotlightBadge">{{ $initialBadge }}</div>
                                        </div>
                                        <div class="mega-spotlight-body">
                                            <h4 class="mega-spotlight-title" id="megaSpotlightTitle">{{ $initialTitle }}</h4>
                                            <p class="mega-spotlight-desc" id="megaSpotlightDesc">{{ $initialDesc }}</p>
                                            <div class="mega-spotlight-bullets" id="megaSpotlightBullets">
                                                @foreach($initialBullets as $b)
                                                    <div>{{ $b }}</div>
                                                @endforeach
                                            </div>
                                            <a href="{{ $initialCtaUrl }}" class="btn btn-primary btn-sm btn-block" id="megaSpotlightCta" style="width: 100%; justify-content: center; margin-top: 4px;">
                                                <span>{{ $initialCtaText }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Full-Width Mega Menu Bottom Bar -->
                            <div class="mega-bottom-strip">
                                <div class="mega-bottom-left">
                                    <span style="font-weight: 700; color: var(--text-dark);">💡 ¿Necesitas una arquitectura o desarrollo especial?</span>
                                    <span style="color: var(--text-muted);">Coordinamos una sesión técnica inicial sin costo.</span>
                                </div>
                                <div class="mega-bottom-right">
                                    <a href="https://api.whatsapp.com/send?phone=56987261127&text=Hola%20Álvaro,%20necesito%20asesoría%20sobre%20los%20servicios%20de%20REW" target="_blank" rel="noopener" class="mega-wa-link">
                                        <span>💬 Hablar Directo con Álvaro Valenzuela (+56 9 8726 1127) ➔</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('portafolio.index') }}" class="nav-link {{ request()->routeIs('portafolio.*') ? 'active' : '' }}">Portafolio</a>
                </li>
                <li>
                    <a href="{{ route('blog.index') }}" class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a>
                </li>
                <li>
                    <a href="{{ route('contacto') }}" class="nav-link {{ request()->routeIs('contacto') ? 'active' : '' }}">Contacto</a>
                </li>
            </ul>

            <!-- Header Action Buttons -->
            <div class="header-actions">
                @auth
                    <!-- Botón Acceso Rápido a Mi Portal (Desktop Only) -->
                    <a href="{{ route('admin.leads.index') }}" class="btn btn-sm nav-action-desktop" style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%); color: #ffc800; border: 1px solid rgba(255, 200, 0, 0.4); font-weight: 800; display: inline-flex; align-items: center; gap: 6px; box-shadow: 0 2px 10px rgba(79, 70, 229, 0.25); text-decoration: none;" title="Ir a mi Panel de Administración REW CRM">
                        <span>⚡</span> Mi Portal
                    </a>
                @endauth

                <!-- Cart Trigger (Visible on all devices) -->
                <button type="button" class="btn btn-outline btn-sm open-cart-drawer" style="padding: 0.5rem 0.85rem; display: flex; align-items: center; gap: 6px;" aria-label="Ver Carrito">
                    <span>🛒</span>
                    <span class="cart-count-badge badge badge-primary" style="padding: 2px 7px; font-size: 0.75rem; {{ count(session('cart', [])) > 0 ? '' : 'display:none;' }}">
                        {{ count(session('cart', [])) }}
                    </span>
                </button>

                <!-- Cotizar Button (Desktop Only) -->
                <a href="{{ route('contacto') }}" class="btn btn-primary btn-sm nav-action-desktop">
                    <span>Cotizar Proyecto</span>
                </a>

                <!-- Mobile Nav Toggle (Mobile Only) -->
                <button type="button" class="mobile-nav-toggle" id="mobileNavOpenBtn" aria-label="Abrir menú de navegación">
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                </button>
            </div>
        </div>
    </div>
    <!-- Modern Dynamic Reading Scroll Progress Bar -->
    <div class="header-scroll-progress" id="headerScrollProgress"></div>
</header>

<!-- Mobile Navigation Drawer (Bottom-to-Top Sheet) -->
<div class="mobile-nav-backdrop" id="mobileNavBackdrop"></div>
<aside class="mobile-nav-drawer" id="mobileNavDrawer" aria-label="Menú Móvil">
    <!-- Drag indicator handle -->
    <div class="mobile-drawer-handle-bar">
        <div class="mobile-drawer-handle"></div>
    </div>

    <!-- Drawer Header -->
    <div class="mobile-drawer-header">
        <a href="{{ route('home') }}" class="logo-link" style="text-decoration: none;">
            <div class="logo-badge-container" style="padding: 6px 14px; background: #0f172a;">
                <img src="{{ asset('images/logo.webp') }}" alt="REW" style="height: 30px; width: auto;">
            </div>
        </a>
        <button type="button" class="mobile-drawer-close" id="mobileNavCloseBtn" aria-label="Cerrar menú">
            ✕
        </button>
    </div>

    <!-- Drawer Scrollable Body -->
    <div class="mobile-drawer-body">
        <nav class="mobile-menu-nav">
            <a href="{{ route('home') }}" class="mobile-menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <span class="mobile-item-icon">🏠</span>
                <span class="mobile-item-text">Inicio</span>
            </a>
            
            <a href="{{ route('nosotros') }}" class="mobile-menu-item {{ request()->routeIs('nosotros') ? 'active' : '' }}">
                <span class="mobile-item-icon">👥</span>
                <span class="mobile-item-text">Nosotros</span>
            </a>

            <a href="{{ route('tienda.index') }}" class="mobile-menu-item {{ request()->routeIs('tienda.*') ? 'active' : '' }}">
                <span class="mobile-item-icon">🛍️</span>
                <span class="mobile-item-text">Tienda de Plugins</span>
                <span class="badge badge-gold" style="font-size: 0.65rem; padding: 2px 6px; margin-left: auto;">IA & WP</span>
            </a>

            <!-- Dropdown Servicios Mobile -->
            <div class="mobile-accordion-item">
                <button type="button" class="mobile-accordion-header {{ request()->routeIs('servicios.*') ? 'active' : '' }}" id="mobileServicesToggle">
                    <span class="mobile-item-icon">🌐</span>
                    <span class="mobile-item-text">Servicios de Ingeniería</span>
                    <span class="mobile-accordion-chevron">▾</span>
                </button>
                <div class="mobile-accordion-content {{ request()->routeIs('servicios.*') ? 'is-open' : '' }}" id="mobileServicesMenu">
                    <a href="{{ route('servicios.desarrollo-web') }}" class="mobile-sub-link {{ request()->routeIs('servicios.desarrollo-web') ? 'active' : '' }}">
                        <span class="sub-icon">🌐</span>
                        <div>
                            <div class="sub-title">Desarrollo Web</div>
                            <div class="sub-desc">Sitios corporativos y WooCommerce</div>
                        </div>
                    </a>
                    <a href="{{ route('servicios.software-chile') }}" class="mobile-sub-link {{ request()->routeIs('servicios.software-chile') ? 'active' : '' }}">
                        <span class="sub-icon">💻</span>
                        <div>
                            <div class="sub-title">Desarrollo de Software</div>
                            <div class="sub-desc">SaaS y sistemas Laravel a medida</div>
                        </div>
                    </a>
                    <a href="{{ route('servicios.software-factory') }}" class="mobile-sub-link {{ request()->routeIs('servicios.software-factory') ? 'active' : '' }}">
                        <span class="sub-icon">🏭</span>
                        <div>
                            <div class="sub-title">Software Factory Chile</div>
                            <div class="sub-desc">Células ágiles de ingeniería</div>
                        </div>
                    </a>
                    <a href="{{ route('servicios.bsale-woocommerce') }}" class="mobile-sub-link {{ request()->routeIs('servicios.bsale-woocommerce') ? 'active' : '' }}">
                        <span class="sub-icon">🛒</span>
                        <div>
                            <div class="sub-title">Integración Bsale WooCommerce</div>
                            <div class="sub-desc">Sincronización de stock y boletas DTE</div>
                        </div>
                    </a>
                    <a href="{{ route('servicios.odoo-chile') }}" class="mobile-sub-link {{ request()->routeIs('servicios.odoo-chile') ? 'active' : '' }}">
                        <span class="sub-icon">⚙️</span>
                        <div>
                            <div class="sub-title">Implementación Odoo ERP</div>
                            <div class="sub-desc">Facturación SII, CRM y bodegas</div>
                        </div>
                    </a>
                    <a href="{{ route('servicios.seo') }}" class="mobile-sub-link {{ request()->routeIs('servicios.seo') ? 'active' : '' }}">
                        <span class="sub-icon">📈</span>
                        <div>
                            <div class="sub-title">SEO & GEO en Google</div>
                            <div class="sub-desc">Posicionamiento en buscadores e IA</div>
                        </div>
                    </a>
                    <a href="{{ route('auditoria.landing') }}" class="mobile-sub-link {{ request()->routeIs('auditoria.landing') ? 'active' : '' }}">
                        <span class="sub-icon">🔍</span>
                        <div>
                            <div class="sub-title">Auditoría SEO Gratuita</div>
                            <div class="sub-desc">Diagnóstico de velocidad y Core Web Vitals</div>
                        </div>
                    </a>
                    <a href="{{ route('servicios.publicidad') }}" class="mobile-sub-link {{ request()->routeIs('servicios.publicidad') ? 'active' : '' }}">
                        <span class="sub-icon">🎯</span>
                        <div>
                            <div class="sub-title">Publicidad Digital</div>
                            <div class="sub-desc">Google Ads y Meta Ads de alto ROAS</div>
                        </div>
                    </a>
                    <a href="{{ route('servicios.mantenimiento') }}" class="mobile-sub-link {{ request()->routeIs('servicios.mantenimiento') ? 'active' : '' }}">
                        <span class="sub-icon">🛡️</span>
                        <div>
                            <div class="sub-title">Mantenimiento Web</div>
                            <div class="sub-desc">Seguridad, velocidad y uptime 24/7</div>
                        </div>
                    </a>
                    <a href="{{ route('servicios.soporte-wordpress') }}" class="mobile-sub-link {{ request()->routeIs('servicios.soporte-wordpress') ? 'active' : '' }}">
                        <span class="sub-icon">⚡</span>
                        <div>
                            <div class="sub-title">Soporte WordPress</div>
                            <div class="sub-desc">Solución de errores y migraciones</div>
                        </div>
                    </a>
                    <a href="{{ route('servicios.diseno-ux-ui') }}" class="mobile-sub-link {{ request()->routeIs('servicios.diseno-ux-ui') ? 'active' : '' }}">
                        <span class="sub-icon">✨</span>
                        <div>
                            <div class="sub-title">Diseño UX / UI</div>
                            <div class="sub-desc">Prototipado en Figma para conversión</div>
                        </div>
                    </a>
                </div>
            </div>

            <a href="{{ route('portafolio.index') }}" class="mobile-menu-item {{ request()->routeIs('portafolio.*') ? 'active' : '' }}">
                <span class="mobile-item-icon">💼</span>
                <span class="mobile-item-text">Portafolio</span>
            </a>

            <a href="{{ route('blog.index') }}" class="mobile-menu-item {{ request()->routeIs('blog.*') ? 'active' : '' }}">
                <span class="mobile-item-icon">📝</span>
                <span class="mobile-item-text">Blog & Guías</span>
            </a>

            <a href="{{ route('contacto') }}" class="mobile-menu-item {{ request()->routeIs('contacto') ? 'active' : '' }}">
                <span class="mobile-item-icon">✉️</span>
                <span class="mobile-item-text">Contacto</span>
            </a>
        </nav>

        <!-- CTAs Section inside Mobile Drawer -->
        <div class="mobile-drawer-footer">
            @auth
                <a href="{{ route('admin.leads.index') }}" class="btn btn-mobile-portal">
                    <span>⚡</span> Acceder a Mi Portal CRM
                </a>
            @endauth

            <a href="{{ route('contacto') }}" class="btn btn-primary btn-mobile-quote">
                <span>🚀</span> Cotizar Proyecto
            </a>

            <a href="https://api.whatsapp.com/send?phone=56987261127" target="_blank" rel="noopener" class="mobile-wa-support">
                <span>💬</span> WhatsApp Directo con Ingeniero (+56 9 8726 1127)
            </a>
        </div>
    </div>
</aside>
