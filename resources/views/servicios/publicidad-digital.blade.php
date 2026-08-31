@extends('layouts.app')

@section('title', '🎯 Campañas en Google Ads & Meta Ads que Sí Convierten Clics en Dinero Real | REW')
@section('meta_description', '💥 Deja de quemar presupuesto publicitario. Diseñamos pauta en Google y Meta con segmentación láser y embudos de alta conversión.')

@section('og_title', '🎯 Publicidad Digital en Chile: Google & Meta Ads Orientados a ROAS | REW')
@section('og_description', '💥 Deja de quemar presupuesto. Optimizamos tus campañas con embudos de venta y medición precisa para rentabilizar cada peso invertido.')
@section('og_image', asset('images/services/ads_hero.webp'))

@section('content')
<!-- ==========================================================================
     HERO SECTION (PUBLICIDAD DIGITAL EN CHILE)
     ========================================================================== -->
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-alt) 100%); padding: 3.5rem 0 5rem; border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}" style="color: var(--text-muted); text-decoration: none;">Inicio</a>
            <span style="margin: 0 8px;">/</span>
            <a href="{{ route('servicios.index') }}" style="color: var(--text-muted); text-decoration: none;">Servicios</a>
            <span style="margin: 0 8px;">/</span>
            <span style="color: var(--primary); font-weight: 700;">Publicidad Digital</span>
        </nav>

        <div class="service-hero-grid">
            <!-- Left: Hero Copy -->
            <div>
                <div style="margin-bottom: 1.25rem;">
                    <span class="badge badge-pill-glow">
                        <span style="color: var(--accent-gold);">🚀</span> Google Ads & Meta Ads • Tráfico que Convierte
                    </span>
                </div>

                <h1 style="font-size: clamp(2.3rem, 3.8vw, 3.3rem); font-weight: 900; line-height: 1.15; color: var(--text-dark); margin-bottom: 1.25rem;">
                    Publicidad Digital en Chile: <span class="gradient-text">Google Ads & Meta Ads</span>
                </h1>

                <p style="font-size: 1.15rem; color: var(--text-body); line-height: 1.7; margin-bottom: 1.5rem;">
                    En <strong>REW somos tu agencia de publicidad digital en Chile</strong>. Diseñamos y gestionamos campañas estratégicas de <strong>Google Ads</strong> y <strong>Meta Ads</strong> (Facebook e Instagram) para que tu negocio atraiga tráfico cualificado, aumente conversiones y maximice el retorno de cada peso invertido.
                </p>

                <!-- Value Highlights Grid -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 0.75rem; margin-bottom: 2.25rem;">
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Alcance inmediato:</strong> Llega a tu cliente cuando busca tus servicios</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Segmentación avanzada:</strong> Demografía, intereses y Lookalike</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Medición precisa:</strong> Indicadores claros (CPC, CPA, ROAS)</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Escalabilidad:</strong> Presupuesto adaptable a tu ritmo de ventas</span>
                    </div>
                </div>

                <!-- CTA Group -->
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>🚀 Cotizar Campaña Publicitaria</span>
                    </a>
                    <a href="https://calendly.com/satorisatorchile/rew?hide_event_type_details=1&hide_gdpr_banner=1" target="_blank" rel="noopener noreferrer" class="btn btn-gold btn-lg">
                        <span>📅 Agendar Asesoría 20 min</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, me gustaría potenciar mi negocio con campañas de Publicidad Digital en REW.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 WhatsApp Directo</span>
                    </a>
                </div>
            </div>

            <!-- Right: Hero Media Spotlight -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/ads_hero.webp') }}" alt="Publicidad digital en Chile Google Ads y Meta Ads" class="service-media-img" loading="eager" width="2000" height="1174">
                    
                    <div style="position: absolute; bottom: 1.5rem; left: 1.5rem; right: 1.5rem; background: rgba(15, 23, 42, 0.92); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.15); border-radius: 12px; padding: 1rem 1.25rem; color: #ffffff; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 700;">Rentabilidad Comprobada</div>
                            <div style="font-size: 1.05rem; font-weight: 800; color: #38bdf8;">Hasta 200% Retorno Medio</div>
                        </div>
                        <div style="text-align: right;">
                            <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 700;">Crecimiento de Leads</div>
                            <div style="font-size: 1.05rem; font-weight: 800; color: var(--accent-gold);">+150% Conversiones 🎯</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     TICKER MARQUEE / CONCEPTOS CLAVE
     ========================================================================== -->
<section style="background: #0f172a; padding: 1rem 0; border-top: 1px solid rgba(255,255,255,0.1); border-bottom: 1px solid rgba(255,255,255,0.1); overflow: hidden;">
    <div class="container" style="text-align: center;">
        <p style="margin: 0; font-size: 0.85rem; font-weight: 700; letter-spacing: 0.05em; color: #94a3b8; text-transform: uppercase; line-height: 1.8;">
            <span style="color: var(--accent-gold);">INBOUND MARKETING:</span> Atrae, convierte y fideliza &nbsp;|&nbsp; 
            <span style="color: #38bdf8;">DISEÑO WEB:</span> Creatividad y funcionalidad &nbsp;|&nbsp; 
            <span style="color: #10b981;">SEO:</span> Optimiza tu visibilidad orgánica &nbsp;|&nbsp; 
            <span style="color: #f43f5e;">GOOGLE ADS:</span> Búsquedas de alta intención &nbsp;|&nbsp; 
            <span style="color: #a855f7;">META ADS:</span> Creatividades impactantes &nbsp;|&nbsp; 
            <span style="color: #eab308;">MÁXIMA RENTABILIDAD:</span> Resultados medibles
        </p>
    </div>
</section>

<!-- ==========================================================================
     SERVICIOS PRINCIPALES: GOOGLE ADS & META ADS
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div style="max-width: 860px; margin: 0 auto 3.5rem; text-align: center;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Canales de Adquisición</span>
            <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                Servicios Especializados de Publicidad Digital
            </h2>
            <p style="font-size: 1.15rem; color: var(--text-body); line-height: 1.7;">
                Combinamos la intención de compra directa de <strong>Google Ads</strong> con el alcance masivo y visual de <strong>Meta Ads</strong> para construir un embudo de adquisición completo y rentable.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem;">
            <!-- Google Ads Card -->
            <div class="card spotlight-card" style="padding: 2.5rem; border-radius: var(--radius-xl); border: 1px solid var(--border-light); background: var(--bg-alt); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
                        <div style="width: 54px; height: 54px; border-radius: 14px; background: #ffffff; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0,0,0,0.06); padding: 8px;">
                            <img src="{{ asset('images/services/ads_google.webp') }}" alt="Google Ads Partner" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                        </div>
                        <span class="badge badge-gold">Alta Intención</span>
                    </div>

                    <h3 style="font-size: 1.45rem; color: var(--text-dark); margin-bottom: 1rem;">1. Google Ads (Search, Display & Shopping)</h3>
                    
                    <p style="font-size: 1rem; color: var(--text-body); line-height: 1.7; margin-bottom: 1.25rem;">
                        Creamos campañas de <strong>Google Ads</strong> orientadas a búsquedas con alta intención de compra (“cotizar software chile”, “agencia seo santiago”). Optimizamos anuncios, palabras clave negativas y subastas automáticas para obtener el mejor CPC y maximizar el ratio de conversión.
                    </p>

                    <div style="display: flex; flex-direction: column; gap: 0.65rem; margin-bottom: 1.5rem; font-size: 0.92rem; color: var(--text-muted);">
                        <div>✓ <strong>Campañas de Búsqueda (Search):</strong> Aparece en el primer resultado cuando te buscan.</div>
                        <div>✓ <strong>Google Shopping & Performance Max:</strong> Vende directamente productos de tu ecommerce.</div>
                        <div>✓ <strong>Red de Display & Remarketing:</strong> Mantén tu marca presente en los principales portales de noticias.</div>
                    </div>
                </div>

                <a href="{{ route('contacto') }}" class="btn btn-outline" style="width: 100%; text-align: center;">
                    <span>Cotizar Campaña Google Ads →</span>
                </a>
            </div>

            <!-- Meta Ads Card -->
            <div class="card spotlight-card" style="padding: 2.5rem; border-radius: var(--radius-xl); border: 1px solid var(--border-light); background: var(--bg-alt); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
                        <div style="width: 54px; height: 54px; border-radius: 14px; background: #ffffff; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0,0,0,0.06); padding: 8px;">
                            <img src="{{ asset('images/services/ads_meta.webp') }}" alt="Meta Ads Facebook Instagram" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                        </div>
                        <span class="badge badge-primary">Alcance & Branding</span>
                    </div>

                    <h3 style="font-size: 1.45rem; color: var(--text-dark); margin-bottom: 1rem;">2. Meta Ads (Facebook & Instagram)</h3>
                    
                    <p style="font-size: 1rem; color: var(--text-body); line-height: 1.7; margin-bottom: 1.25rem;">
                        Diseñamos estrategias de <strong>Meta Ads</strong> para Facebook e Instagram combinando creatividades visuales de alto impacto y segmentaciones hiperprecisas. Captamos a tu público ideal con anuncios en Feed, Stories, Reels y formatos interactivos de Carrusel.
                    </p>

                    <div style="display: flex; flex-direction: column; gap: 0.65rem; margin-bottom: 1.5rem; font-size: 0.92rem; color: var(--text-muted);">
                        <div>✓ <strong>Generación de Leads (Lead Ads):</strong> Formularios instantáneos dentro de Instagram y Facebook.</div>
                        <div>✓ <strong>Campañas de Retargeting:</strong> Recupera a los usuarios que visitaron tu web pero no compraron.</div>
                        <div>✓ <strong>Anuncios a WhatsApp Directo:</strong> Conversaciones inmediatas con prospectos interesados.</div>
                    </div>
                </div>

                <a href="{{ route('contacto') }}" class="btn btn-outline" style="width: 100%; text-align: center;">
                    <span>Cotizar Campaña Meta Ads →</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     ¿CÓMO TRABAJAMOS? (METODOLOGÍA EN 5 PASOS)
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div class="service-split-row">
            <!-- Left: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/ads_process.webp') }}" alt="Cómo trabajamos en publicidad digital REW" class="service-media-img" loading="lazy">
                </div>
            </div>

            <!-- Right: 5 Steps -->
            <div>
                <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Metodología Probada</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    ¿Cómo Trabajamos en REW?
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.75rem;">
                    Nuestra gestión publicitaria sigue un ciclo continuo de optimización basado en datos para garantizar que cada campaña genere un retorno positivo y medible:
                </p>

                <div style="display: flex; flex-direction: column; gap: 1.1rem;">
                    <div style="background: #ffffff; padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid var(--primary); box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                        <strong style="color: var(--text-dark); display: block; font-size: 1.05rem; margin-bottom: 2px;">1. Brief Estratégico & Objetivos</strong>
                        <span style="font-size: 0.9rem; color: var(--text-muted);">Definimos metas claras, perfil del cliente ideal, propuesta de valor y presupuesto mensual recomendado.</span>
                    </div>

                    <div style="background: #ffffff; padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid var(--accent-gold); box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                        <strong style="color: var(--text-dark); display: block; font-size: 1.05rem; margin-bottom: 2px;">2. Creatividad & Copywriting Persuasivo</strong>
                        <span style="font-size: 0.9rem; color: var(--text-muted);">Desarrollamos piezas gráficas, videos y textos persuasivos orientados a la acción y al clic.</span>
                    </div>

                    <div style="background: #ffffff; padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid #10b981; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                        <strong style="color: var(--text-dark); display: block; font-size: 1.05rem; margin-bottom: 2px;">3. Segmentación Avanzada & Pixels de Conversión</strong>
                        <span style="font-size: 0.9rem; color: var(--text-muted);">Configuración técnica de eventos de conversión, Pixel de Meta y Google Tag Manager para una trazabilidad perfecta.</span>
                    </div>

                    <div style="background: #ffffff; padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid #8b5cf6; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                        <strong style="color: var(--text-dark); display: block; font-size: 1.05rem; margin-bottom: 2px;">4. Optimización Continua & Pruebas A/B</strong>
                        <span style="font-size: 0.9rem; color: var(--text-muted);">Ajuste diario de pujas, eliminación de términos no rentables y testeo continuo de audiencias ganadoras.</span>
                    </div>

                    <div style="background: #ffffff; padding: 1.15rem 1.35rem; border-radius: 12px; border-left: 4px solid #ec4899; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                        <strong style="color: var(--text-dark); display: block; font-size: 1.05rem; margin-bottom: 2px;">5. Reporting Transparente con Métricas Reales</strong>
                        <span style="font-size: 0.9rem; color: var(--text-muted);">Informes periódicos con KPIs de negocio: cantidad de leads, costo por adquisición (CPA) y ROAS alcanzado.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     IMPACTO COMPROBADO & TENDENCIAS GOOGLE/META
     ========================================================================== -->
<section class="section" style="background: #0f172a; color: #ffffff;">
    <div class="container">
        <div style="max-width: 860px; margin: 0 auto 3.5rem; text-align: center;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Ciencia de Datos & Rentabilidad</span>
            <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: #ffffff;">
                Impacto Comprobado de la Publicidad Digital
            </h2>
            <p style="color: #cbd5e1; font-size: 1.15rem; line-height: 1.7;">
                Según estudios de la industria (eMarketer), las empresas que invierten de manera estratégica en PPC obtienen un retorno medio superior al 200%. En REW aplicamos tecnología de optimización continua logrando aumentos de hasta un <strong>150% en conversiones en menos de 3 meses</strong>.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 16px; padding: 2.25rem;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🤖</div>
                <h3 style="font-size: 1.35rem; color: #ffffff; margin-bottom: 0.75rem;">Subastas con Inteligencia Artificial</h3>
                <p style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.25rem;">
                    Implementamos <a href="https://support.google.com/google-ads/answer/2375413" target="_blank" rel="noopener noreferrer" style="color: #38bdf8; text-decoration: underline;">Subastas Automáticas de Google (Smart Bidding)</a> para ajustar las pujas en tiempo real por cada usuario en base a su probabilidad de compra.
                </p>
            </div>

            <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 16px; padding: 2.25rem;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🎯</div>
                <h3 style="font-size: 1.35rem; color: #ffffff; margin-bottom: 0.75rem;">Segmentación Avanzada de Meta</h3>
                <p style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.25rem;">
                    Aprovechamos las herramientas de <a href="https://www.facebook.com/business/ads" target="_blank" rel="noopener noreferrer" style="color: #38bdf8; text-decoration: underline;">Segmentación Avanzada y Advantage+ de Meta</a> para encontrar audiencias de alto valor que conecten con tu propuesta comercial.
                </p>
            </div>

            <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 16px; padding: 2.25rem;">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">💼</div>
                <h3 style="font-size: 1.35rem; color: #ffffff; margin-bottom: 0.75rem;">Casos de Éxito en Empresas Chilenas</h3>
                <p style="color: #94a3b8; font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.25rem;">
                    Descubre cómo hemos transformado clicks en clientes para <a href="{{ route('portafolio.index') }}" style="color: var(--accent-gold); text-decoration: underline; font-weight: 700;">empresas chilenas</a> de distintos sectores, optimizando costos por lead.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     PREGUNTAS FRECUENTES (FAQ INTERACTIVO)
     ========================================================================== -->
<section class="section" style="background: #ffffff; border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div class="service-split-row reverse-mobile" style="align-items: flex-start;">
            <!-- Left: FAQs Accordion -->
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Resolución de Dudas</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1rem; color: var(--text-dark);">
                    Preguntas Frecuentes sobre Publicidad Digital
                </h2>
                <p style="color: var(--text-muted); font-size: 1.05rem; margin-bottom: 2rem;">
                    Respuestas directas para que tomes decisiones informadas sobre tu inversión en pauta:
                </p>

                <div class="faq-accordion-list">
                    <!-- FAQ 1 -->
                    <div class="faq-card-item is-open">
                        <button type="button" class="faq-header-btn">
                            <span>¿Qué inversión inicial necesito para empezar con Google Ads?</span>
                            <span class="faq-icon-chevron">▾</span>
                        </button>
                        <div class="faq-content-body">
                            Recomendamos un presupuesto inicial de al menos USD 300–500 (o $300.000–$500.000 CLP) al mes directo a la plataforma publicitaria para probar keywords clave, generar volumen de datos y optimizar las campañas de forma estadísticamente significativa.
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="faq-card-item">
                        <button type="button" class="faq-header-btn">
                            <span>¿Cuál es la diferencia entre Google Ads y Meta Ads?</span>
                            <span class="faq-icon-chevron">▾</span>
                        </button>
                        <div class="faq-content-body">
                            Google Ads captura usuarios con alta intención de búsqueda activa (personas que ya necesitan tu servicio y lo escriben en Google). Meta Ads (Facebook e Instagram) permite generar demanda visual, alcanzando usuarios específicos por intereses, estilo de vida y comportamiento social.
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="faq-card-item">
                        <button type="button" class="faq-header-btn">
                            <span>¿Cómo miden el éxito de una campaña de publicidad digital?</span>
                            <span class="faq-icon-chevron">▾</span>
                        </button>
                        <div class="faq-content-body">
                            Monitoreamos métricas clave de rendimiento como CPC (Costo por Clic), CTR (Tasa de Clics), CPA (Costo por Adquisición / Lead) y ROAS (Retorno sobre el Gasto Publicitario), asegurando que cada campaña sea rentable para tu modelo de negocio.
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="faq-card-item">
                        <button type="button" class="faq-header-btn">
                            <span>¿Puedo pausar o aumentar mi presupuesto en cualquier momento?</span>
                            <span class="faq-icon-chevron">▾</span>
                        </button>
                        <div class="faq-content-body">
                            Sí, tienes control total y flexibilidad absoluta. Ajustamos la inversión diaria o mensual según tus temporadas comerciales, capacidad operativa y objetivos de crecimiento.
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="faq-card-item">
                        <button type="button" class="faq-header-btn">
                            <span>¿Ofrecen creación de anuncios y diseño de landing pages?</span>
                            <span class="faq-icon-chevron">▾</span>
                        </button>
                        <div class="faq-content-body">
                            Absolutamente. Desarrollamos la estrategia completa: diseño de piezas gráficas, redacción persuasiva de copies publicitarios y landing pages ultra-rápidas optimizadas para la conversión en WordPress, Laravel o HTML.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/ads_faq.webp') }}" alt="Preguntas frecuentes publicidad digital Chile" class="service-media-img" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     CTA: ¿LISTO PARA POTENCIAR TU TRÁFICO? & CALENDLY
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt);">
    <div class="container">
        <div class="grid-2col-cta" style="align-items: center;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 1rem;">Atracción & Retorno</span>
                <h2 style="font-size: 2.4rem; color: var(--text-dark); margin-bottom: 1.25rem; line-height: 1.2;">
                    ¿Listo para Potenciar tu Tráfico y Ventas? 📈
                </h2>
                <p style="color: var(--text-body); font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.75rem;">
                    Comienza hoy mismo a captar prospectos calificados con la mejor <strong>publicidad digital</strong> en Chile. Agenda una sesión diagnóstica gratuita para evaluar tus campañas actuales o diseñar una nueva estrategia desde cero.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-bottom: 2rem; font-size: 0.95rem; color: var(--text-muted);">
                    <div>✓ Auditoría rápida de cuentas publicitarias existentes</div>
                    <div>✓ Plan de inversión recomendado por canal (Google / Meta)</div>
                    <div>✓ Asesoría personalizada con el Ingeniero Álvaro Valenzuela Valdés</div>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="https://calendly.com/satorisatorchile/rew?hide_event_type_details=1&hide_gdpr_banner=1" target="_blank" rel="noopener noreferrer" class="btn btn-gold btn-lg">
                        <span>📅 Agendar en Calendly</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, quiero una cotización de publicidad digital con REW.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 Hablar por WhatsApp</span>
                    </a>
                </div>
            </div>

            <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-xl); padding: 2.25rem; text-align: center; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                <img src="{{ asset('images/services/ads_cta.webp') }}" alt="Publicidad digital y redes sociales en Chile" style="width: 100%; max-height: 240px; object-fit: cover; border-radius: 12px; margin-bottom: 1.5rem;" loading="lazy">
                <h3 style="color: var(--text-dark); font-size: 1.35rem; margin-bottom: 0.5rem;">Álvaro Valenzuela Valdés</h3>
                <div style="color: var(--primary); font-size: 0.9rem; font-weight: 700; margin-bottom: 1.25rem;">Estratega Digital & Fundador de REW</div>
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

<!-- Schema JSON-LD Structured Data for Publicidad Digital Service -->
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
        "jobTitle": "Ingeniero Informático & Estratega Digital"
      }
    },
    {
      "@type": "WebPage",
      "@id": "https://rew.cl/publicidad-digital/#webpage",
      "url": "https://rew.cl/publicidad-digital/",
      "name": "PUBLICIDAD DIGITAL | REW",
      "description": "Potencia tu tráfico web con campañas de Google Ads y Meta Ads en Chile. En REW diseñamos estrategias de publicidad digital que convierten clicks en clientes.",
      "isPartOf": {
        "@type": "WebSite",
        "@id": "https://rew.cl/#website"
      }
    },
    {
      "@type": "Service",
      "@id": "https://rew.cl/publicidad-digital/#service",
      "name": "Publicidad Digital para Empresas en Chile",
      "serviceType": "Google Ads, Meta Ads, Publicidad Digital, Campañas SEM, Performance Marketing",
      "description": "Servicio de publicidad digital en Chile para empresas. Estrategias de anuncios online orientadas a resultados, leads y ventas con Google Ads y Meta Ads.",
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
      "@id": "https://rew.cl/publicidad-digital/#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "¿Qué inversión inicial necesito para empezar con Google Ads?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Recomendamos un presupuesto inicial de USD 300–500 al mes para probar keywords clave y optimizar la campaña de forma rentable."
          }
        },
        {
          "@type": "Question",
          "name": "¿Cuál es la diferencia entre Google Ads y Meta Ads?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Google Ads captura búsquedas con alta intención de compra, mientras que Meta Ads permite impactar audiencias basadas en intereses y comportamiento social."
          }
        },
        {
          "@type": "Question",
          "name": "¿Cómo miden el éxito de una campaña de publicidad digital?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Monitoreamos métricas como CPC, CTR, CPA y ROAS para garantizar que tu inversión sea rentable."
          }
        },
        {
          "@type": "Question",
          "name": "¿Puedo pausar o aumentar mi presupuesto en cualquier momento?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Sí, tienes control total y flexibilidad. Ajustamos la inversión diaria o mensual según tu estrategia comercial."
          }
        }
      ]
    }
  ]
}
</script>
@endverbatim
@endsection
