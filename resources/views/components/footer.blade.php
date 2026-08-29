<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Brand Column -->
            <div class="footer-col">
                <a href="{{ route('home') }}" class="logo-link" style="margin-bottom: 1.25rem;">
                    <div class="logo-badge-container" style="background: rgba(255,255,255,0.08);">
                        <img src="{{ asset('images/logo.webp') }}" alt="REW" class="logo-img">
                    </div>
                </a>
                <p style="font-size: 0.92rem; line-height: 1.6; margin-bottom: 1.5rem; color: #94a3b8;">
                    Agencia de software, desarrollo web y posicionamiento SEO en Chile. Liderada por <strong>Álvaro Valenzuela Valdés</strong> (Ingeniero Informático), transformando ideas en plataformas digitales de alto impacto comercial y tecnología de Inteligencia Artificial.
                </p>
                <div style="display: flex; gap: 12px;">
                    <a href="https://api.whatsapp.com/send?phone=56987261127" target="_blank" rel="noopener" class="btn btn-sm btn-whatsapp" style="padding: 0.4rem 0.85rem; font-size: 0.8rem;">
                        <span>💬 WhatsApp: +56 9 8726 1127</span>
                    </a>
                </div>
            </div>

            <!-- Servicios Column -->
            <div class="footer-col">
                <h4>Servicios</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('servicios.desarrollo-web') }}">Desarrollo Web</a></li>
                    <li><a href="{{ route('servicios.software-chile') }}">Desarrollo de Software</a></li>
                    <li><a href="{{ route('servicios.seo') }}">Optimización SEO & GEO</a></li>
                    <li><a href="{{ route('servicios.publicidad') }}">Publicidad Digital</a></li>
                    <li><a href="{{ route('servicios.mantenimiento') }}">Mantenimiento Web</a></li>
                    <li><a href="{{ route('servicios.soporte-wordpress') }}">Soporte WordPress</a></li>
                    <li><a href="{{ route('servicios.diseno-ux-ui') }}">Diseño UX/UI</a></li>
                </ul>
            </div>

            <!-- Ecosistema Column -->
            <div class="footer-col">
                <h4>Ecosistema REW</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('tienda.index') }}">Tienda de Plugins WordPress</a></li>
                    <li><a href="{{ route('tienda.show', 'rich-e-chatbot-assistant') }}">Rich-E Chatbot Assistant</a></li>
                    <li><a href="{{ route('tienda.show', 'addon-woocommerce-premium-sync') }}">WooCommerce Premium Sync</a></li>
                    <li><a href="{{ route('tienda.show', 'rew-multi-currency-translator-pro') }}">REW Multi-Currency Pro</a></li>
                    <li><a href="{{ route('portafolio.index') }}">Portafolio Web</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog & Artículos</a></li>
                </ul>
            </div>

            <!-- Contacto Column -->
            <div class="footer-col">
                <h4>Contacto Directo</h4>
                <p style="font-size: 0.9rem; margin-bottom: 0.75rem;">
                    📍 Santiago, Región Metropolitana, Chile<br>
                    ✉️ <a href="mailto:alvaro@rew.cl" style="color: var(--accent-gold);">alvaro@rew.cl</a><br>
                    📱 <a href="https://api.whatsapp.com/send?phone=56987261127" target="_blank" rel="noopener" style="color: #25d366;">+56 9 8726 1127</a>
                </p>
                <div style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 10px; border: 1px solid rgba(255,255,255,0.1); margin-top: 1rem;">
                    <div style="font-size: 0.8rem; font-weight: 700; color: #ffffff; margin-bottom: 4px;">🚀 ¿Listo para despegar?</div>
                    <div style="font-size: 0.78rem; color: #94a3b8; margin-bottom: 8px;">Obtén una cotización personalizada en menos de 2 minutos.</div>
                    <a href="{{ route('contacto') }}" class="btn btn-gold btn-sm" style="width: 100%;">Cotizador en Línea</a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div>
                &copy; {{ date('Y') }} <strong>REW Chile</strong>. Todos los derechos reservados. Liderado por <strong>Álvaro Valenzuela Valdés</strong>.
            </div>
            <div style="display: flex; gap: 1rem; font-size: 0.8rem;">
                <a href="{{ url('/sitemap.xml') }}" style="color: #94a3b8;">Sitemap XML</a>
                <span>•</span>
                <a href="{{ url('/llms.txt') }}" style="color: #94a3b8;">Protocolo LLMs.txt</a>
                <span>•</span>
                <a href="{{ route('contacto') }}" style="color: #94a3b8;">Cotizaciones</a>
            </div>
        </div>
    </div>
</footer>
