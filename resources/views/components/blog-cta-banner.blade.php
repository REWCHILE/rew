@props(['post'])

@php
    $isMarketing = in_array($post->category, ['Marketing & Redes Sociales', 'Marketing Digital', 'Publicidad']);
    $bannerImage = $isMarketing 
        ? asset('images/services/ads_hero.webp') 
        : asset('images/services/software_fabrica.webp');
    $bannerAlt = $isMarketing 
        ? 'Agencia de Marketing Digital y Publicidad en Chile - REW' 
        : 'Software Factory y Desarrollo Web en Chile - REW';
@endphp

<!-- High-Converting Commercial Banner Box -->
<div class="blog-conversion-banner" style="margin: 3.5rem 0 2rem; background: linear-gradient(135deg, #090d16 0%, #0f172a 50%, #1e1b4b 100%); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: var(--radius-xl); overflow: hidden; box-shadow: var(--shadow-2xl); position: relative;">
    <!-- Visual Image Header with Overlay -->
    <div style="position: relative; width: 100%; max-height: 280px; overflow: hidden; background: #090d16;">
        <img src="{{ $bannerImage }}" 
             alt="{{ $bannerAlt }}" 
             loading="lazy"
             style="width: 100%; max-height: 280px; object-fit: cover; display: block; opacity: 0.92; transition: transform 0.6s ease;"
             onmouseover="this.style.transform='scale(1.03)'"
             onmouseout="this.style.transform='scale(1)'">
        <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(9, 13, 22, 0.15) 0%, rgba(9, 13, 22, 0.9) 100%); pointer-events: none;"></div>
    </div>

    <!-- Banner Content & Action Box -->
    <div style="padding: 2.5rem 2.25rem; color: #ffffff;">
        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 1rem; flex-wrap: wrap;">
            @if($isMarketing)
                <span class="badge" style="background: rgba(245, 158, 11, 0.2); color: #fbbf24; border: 1px solid #f59e0b; font-size: 0.82rem; font-weight: 800; letter-spacing: 0.5px; text-transform: uppercase;">
                    🚀 Escala tus Ventas en Chile
                </span>
                <span style="font-size: 0.82rem; color: #94a3b8;">• Estrategia & Conversión Digital</span>
            @else
                <span class="badge" style="background: rgba(79, 70, 229, 0.25); color: #a5b4fc; border: 1px solid var(--primary); font-size: 0.82rem; font-weight: 800; letter-spacing: 0.5px; text-transform: uppercase;">
                    💻 Ingeniería & Desarrollo Web
                </span>
                <span style="font-size: 0.82rem; color: #94a3b8;">• Código Propio & Alto Rendimiento</span>
            @endif
        </div>

        @if($isMarketing)
            <h3 style="color: #ffffff; font-size: clamp(1.4rem, 2.5vw, 1.85rem); font-weight: 900; line-height: 1.25; margin-bottom: 1rem; letter-spacing: -0.01em;">
                ¿Quieres convertir el alcance de tus redes sociales en clientes reales para tu negocio?
            </h3>
            <p style="color: #cbd5e1; font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.75rem; max-width: 820px;">
                Publicar en los mejores horarios es solo el inicio. En <strong>REW</strong> combinamos <strong>Publicidad Digital orientada a ROAS (Meta Ads, TikTok Ads)</strong> con <strong>Sitios Web de Alta Conversión</strong> para que cada visita se transforme en una cotización y no en una métrica vacía.
            </p>

            <!-- Value Checkpoints -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 0.85rem; margin-bottom: 2rem;">
                <div style="display: flex; align-items: flex-start; gap: 8px; font-size: 0.92rem; color: #e2e8f0;">
                    <span style="color: #10b981; font-size: 1.1rem; line-height: 1;">✓</span>
                    <span><strong>Publicidad con Retorno Real:</strong> Campañas optimizadas para venta directa y generación de leads.</span>
                </div>
                <div style="display: flex; align-items: flex-start; gap: 8px; font-size: 0.92rem; color: #e2e8f0;">
                    <span style="color: #10b981; font-size: 1.1rem; line-height: 1;">✓</span>
                    <span><strong>Desarrollo Web Veloz:</strong> Páginas y tiendas que cargan en menos de 1 segundo y retienen al comprador.</span>
                </div>
                <div style="display: flex; align-items: flex-start; gap: 8px; font-size: 0.92rem; color: #e2e8f0;">
                    <span style="color: #10b981; font-size: 1.1rem; line-height: 1;">✓</span>
                    <span><strong>Trato Directo con Ingeniería:</strong> Diagnóstico técnico honesto sin intermediarios comerciales.</span>
                </div>
            </div>

            <!-- Call to Actions -->
            <div style="display: flex; gap: 1rem; flex-wrap: wrap; align-items: center;">
                <a href="{{ route('servicios.publicidad') }}" class="btn btn-primary btn-lg" style="font-weight: 800; font-size: 0.98rem; padding: 0.85rem 1.6rem;">
                    <span>📈 Cotizar Marketing & Publicidad Digital</span>
                </a>
                <a href="{{ route('servicios.desarrollo-web') }}" class="btn btn-outline" style="border-color: rgba(255,255,255,0.4); color: #ffffff; font-weight: 700; font-size: 0.98rem; padding: 0.85rem 1.6rem;">
                    <span>💻 Cotizar Sitio Web a Medida</span>
                </a>
                <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, leí tu artículo en REW.cl sobre redes sociales y me gustaría cotizar una estrategia de Marketing Digital / Desarrollo Web para mi empresa.') }}" 
                   target="_blank" 
                   rel="noopener" 
                   class="btn btn-whatsapp" 
                   style="font-weight: 800; font-size: 0.98rem; padding: 0.85rem 1.4rem;">
                    <span>💬 WhatsApp Directo</span>
                </a>
            </div>
        @else
            <h3 style="color: #ffffff; font-size: clamp(1.4rem, 2.5vw, 1.85rem); font-weight: 900; line-height: 1.25; margin-bottom: 1rem; letter-spacing: -0.01em;">
                ¿Necesitas un Sitio Web de Alto Rendimiento o Software a Medida para tu Empresa?
            </h3>
            <p style="color: #cbd5e1; font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.75rem; max-width: 820px;">
                En <strong>REW</strong> construimos plataformas web ultra rápidas, tiendas WooCommerce escalables y aplicaciones a medida en Laravel y PHP 8.3 con arquitectura limpia y trato directo de ingeniería senior.
            </p>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 0.85rem; margin-bottom: 2rem;">
                <div style="display: flex; align-items: flex-start; gap: 8px; font-size: 0.92rem; color: #e2e8f0;">
                    <span style="color: #10b981; font-size: 1.1rem; line-height: 1;">✓</span>
                    <span><strong>100% Velocidad y SEO:</strong> Sitios optimizados para Core Web Vitals y primeros lugares en Google.</span>
                </div>
                <div style="display: flex; align-items: flex-start; gap: 8px; font-size: 0.92rem; color: #e2e8f0;">
                    <span style="color: #10b981; font-size: 1.1rem; line-height: 1;">✓</span>
                    <span><strong>Software Factory Propia:</strong> Desarrollo a la medida sin dependencias frágiles ni subcontratación opaca.</span>
                </div>
                <div style="display: flex; align-items: flex-start; gap: 8px; font-size: 0.92rem; color: #e2e8f0;">
                    <span style="color: #10b981; font-size: 1.1rem; line-height: 1;">✓</span>
                    <span><strong>Garantía de Código:</strong> Todo el repositorio y propiedad intelectual pertenecen a tu empresa.</span>
                </div>
            </div>

            <div style="display: flex; gap: 1rem; flex-wrap: wrap; align-items: center;">
                <a href="{{ route('servicios.desarrollo-web') }}" class="btn btn-primary btn-lg" style="font-weight: 800; font-size: 0.98rem; padding: 0.85rem 1.6rem;">
                    <span>🚀 Cotizar Desarrollo Web a Medida</span>
                </a>
                <a href="{{ route('servicios.software-factory') }}" class="btn btn-outline" style="border-color: rgba(255,255,255,0.4); color: #ffffff; font-weight: 700; font-size: 0.98rem; padding: 0.85rem 1.6rem;">
                    <span>🏭 Conocer Software Factory</span>
                </a>
                <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, leí tu blog en REW.cl y me gustaría cotizar un proyecto de Desarrollo Web / Software a medida.') }}" 
                   target="_blank" 
                   rel="noopener" 
                   class="btn btn-whatsapp" 
                   style="font-weight: 800; font-size: 0.98rem; padding: 0.85rem 1.4rem;">
                    <span>💬 WhatsApp Directo</span>
                </a>
            </div>
        @endif
    </div>
</div>
