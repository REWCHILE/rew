<header class="site-header">
    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="logo-link" aria-label="REW - Inicio">
                <div class="logo-badge-container">
                    <img src="{{ asset('images/logo.webp') }}" alt="REW" class="logo-img">
                </div>
            </a>

            <!-- Navigation Links -->
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
                    <a href="#" class="nav-link {{ request()->routeIs('servicios.*') ? 'active' : '' }}">
                        Servicios <span style="font-size: 0.75rem;">▾</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('servicios.desarrollo-web') }}" class="dropdown-item">
                                <div class="dropdown-icon">🌐</div>
                                <div>
                                    <div class="dropdown-title">Desarrollo Web</div>
                                    <div class="dropdown-desc">Sitios corporativos y WooCommerce</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('servicios.software-chile') }}" class="dropdown-item">
                                <div class="dropdown-icon">💻</div>
                                <div>
                                    <div class="dropdown-title">Desarrollo de Software</div>
                                    <div class="dropdown-desc">SaaS y sistemas Laravel a medida</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('servicios.seo') }}" class="dropdown-item">
                                <div class="dropdown-icon">📈</div>
                                <div>
                                    <div class="dropdown-title">SEO & GEO en Google</div>
                                    <div class="dropdown-desc">Posicionamiento en buscadores e IA</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('servicios.publicidad') }}" class="dropdown-item">
                                <div class="dropdown-icon">🎯</div>
                                <div>
                                    <div class="dropdown-title">Publicidad Digital</div>
                                    <div class="dropdown-desc">Google Ads y Meta Ads de alto ROAS</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('servicios.mantenimiento') }}" class="dropdown-item">
                                <div class="dropdown-icon">🛡️</div>
                                <div>
                                    <div class="dropdown-title">Mantenimiento Web</div>
                                    <div class="dropdown-desc">Seguridad, velocidad y uptime 24/7</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('servicios.soporte-wordpress') }}" class="dropdown-item">
                                <div class="dropdown-icon">⚡</div>
                                <div>
                                    <div class="dropdown-title">Soporte WordPress</div>
                                    <div class="dropdown-desc">Solución de errores y migraciones</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('servicios.diseno-ux-ui') }}" class="dropdown-item">
                                <div class="dropdown-icon">✨</div>
                                <div>
                                    <div class="dropdown-title">Diseño UX / UI</div>
                                    <div class="dropdown-desc">Prototipado en Figma para conversión</div>
                                </div>
                            </a>
                        </li>
                    </ul>
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
                <!-- Cart Trigger -->
                <button type="button" class="btn btn-outline btn-sm open-cart-drawer" style="padding: 0.5rem 0.85rem; display: flex; align-items: center; gap: 6px;" aria-label="Ver Carrito">
                    <span>🛒</span>
                    <span class="cart-count-badge badge badge-primary" style="padding: 2px 7px; font-size: 0.75rem; {{ count(session('cart', [])) > 0 ? '' : 'display:none;' }}">
                        {{ count(session('cart', [])) }}
                    </span>
                </button>

                <!-- Cotizar Button -->
                <a href="{{ route('contacto') }}" class="btn btn-primary btn-sm">
                    <span>Cotizar Proyecto</span>
                </a>

                <!-- Mobile Nav Toggle -->
                <button class="mobile-nav-toggle" aria-label="Abrir menú">☰</button>
            </div>
        </div>
    </div>
</header>
