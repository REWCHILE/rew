@extends('layouts.app')

@section('title', Str::contains($project->meta_title ?? $project->title, 'REW') ? ($project->meta_title ?? $project->title) : ($project->meta_title ?? $project->title) . ' | REW')
@section('meta_description', $project->meta_description ?? $project->summary)

@section('og_type', 'article')
@section('og_title', '🔥 ' . ($project->meta_title ?? $project->title . ' - Caso de Éxito | REW Chile'))
@section('og_description', $project->meta_description ?? $project->summary)
@section('og_image', !empty($project->featured_image) ? (Str::startsWith($project->featured_image, 'http') ? $project->featured_image : asset(ltrim($project->featured_image, '/'))) : asset('images/rew_og_card.png'))
@section('article_published_time', $project->project_date ? \Carbon\Carbon::parse($project->project_date)->toIso8601String() : now()->toIso8601String())

@section('content')
<style>
/* Interactive High-End Browser Mockup */
.browser-mockup-frame {
    background: #0f172a !important;
    border-radius: 16px !important;
    border: 1px solid #334155 !important;
    box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.05) !important;
    overflow: hidden !important;
    display: flex !important;
    flex-direction: column !important;
    width: 100% !important;
}

.browser-frame-header {
    background: #1e293b !important;
    padding: 12px 18px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    gap: 12px !important;
    border-bottom: 1px solid #334155 !important;
}

.browser-dots {
    display: flex !important;
    align-items: center !important;
    gap: 7px !important;
}

.browser-dots .dot {
    width: 12px !important;
    height: 12px !important;
    border-radius: 50% !important;
    display: inline-block !important;
}

.dot-red { background: #ef4444 !important; }
.dot-yellow { background: #f59e0b !important; }
.dot-green { background: #10b981 !important; }

.browser-address-bar {
    flex-grow: 1 !important;
    max-width: 550px !important;
    background: #0f172a !important;
    border: 1px solid #334155 !important;
    border-radius: 9999px !important;
    padding: 6px 14px !important;
    display: flex !important;
    align-items: center !important;
    gap: 8px !important;
    font-size: 0.82rem !important;
    color: #94a3b8 !important;
    overflow: hidden !important;
    white-space: nowrap !important;
    text-overflow: ellipsis !important;
}

.browser-address-bar .url-text {
    overflow: hidden !important;
    text-overflow: ellipsis !important;
    color: #cbd5e1 !important;
    font-family: monospace !important;
}

.browser-actions {
    display: flex !important;
    align-items: center !important;
}

.btn-browser-action {
    background: #334155 !important;
    border: none !important;
    color: #ffffff !important;
    padding: 5px 10px !important;
    border-radius: 6px !important;
    cursor: pointer !important;
    font-size: 0.85rem !important;
    transition: background 0.2s ease !important;
}

.btn-browser-action:hover {
    background: #475569 !important;
}

.grid-2col-sidebar {
    display: grid !important;
    grid-template-columns: minmax(0, 1.85fr) minmax(0, 1fr) !important;
    gap: 2.5rem !important;
    align-items: start !important;
}

@media (max-width: 992px) {
    .grid-2col-sidebar {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
    }
}

/* Scrollable Viewport (Full Width, Natural Aspect Ratio) */
.browser-viewport-container {
    width: 100% !important;
    height: 560px !important;
    max-height: 70vh !important;
    overflow-y: auto !important;
    overflow-x: hidden !important;
    background: #0f172a !important;
    position: relative !important;
    scroll-behavior: smooth !important;
}

/* Custom Scrollbar for Viewport */
.browser-viewport-container::-webkit-scrollbar {
    width: 8px;
}
.browser-viewport-container::-webkit-scrollbar-track {
    background: #1e293b;
}
.browser-viewport-container::-webkit-scrollbar-thumb {
    background: #475569;
    border-radius: 4px;
}
.browser-viewport-container::-webkit-scrollbar-thumb:hover {
    background: #64748b;
}

.browser-long-image {
    width: 100% !important;
    min-width: 100% !important;
    max-width: 100% !important;
    height: auto !important;
    display: block !important;
}

.browser-frame-footer {
    background: #1e293b !important;
    padding: 10px 18px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    font-size: 0.82rem !important;
    color: #94a3b8 !important;
    border-top: 1px solid #334155 !important;
    flex-wrap: wrap !important;
    gap: 8px !important;
}

@media (max-width: 768px) {
    .browser-viewport-container {
        height: 380px !important;
    }
}
</style>
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%);">
    <div class="container">
        <!-- Breadcrumb -->
        <div style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}">Inicio</a> &nbsp;/&nbsp;
            <a href="{{ route('portafolio.index') }}">Portafolio Web</a> &nbsp;/&nbsp;
            <span style="color: var(--text-dark); font-weight: 600;">{{ $project->title }}</span>
        </div>

        <!-- Project Header -->
        <div style="margin-bottom: 3rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">{{ $project->category }}</span>
            <h1 style="font-size: 3.2rem; margin-bottom: 1rem; line-height: 1.15;">{{ $project->title }}</h1>
            <p style="font-size: 1.25rem; color: var(--text-body); max-width: 850px; line-height: 1.6;">
                {{ $project->summary }}
            </p>
        </div>

        <!-- Quotes Marquee Ticker -->
        <div class="portfolio-quotes-marquee" style="margin-bottom: 3.5rem;">
            <div class="marquee-track">
                <span>💡 Las mejores ideas nacen del código y la creatividad. ¡Lleva tu web al siguiente nivel!</span>
                <span>•</span>
                <span>🚀 No es solo una página web, es la puerta de entrada a tu éxito digital.</span>
                <span>•</span>
                <span>⚡ Cada línea de código es un paso más hacia la innovación.</span>
                <span>•</span>
                <span>🛡️ Tu negocio necesita una web rápida, segura y poderosa. Nosotros la hacemos realidad.</span>
                <span>•</span>
                <span>✨ Diseñamos experiencias, no solo sitios web. Conéctate con tu audiencia de forma única.</span>
                <span>•</span>
                <span>💡 Las mejores ideas nacen del código y la creatividad. ¡Lleva tu web al siguiente nivel!</span>
            </div>
        </div>

        <!-- Main Project Layout -->
        <div class="grid-2col-sidebar" style="margin-bottom: 4rem;">
            <!-- Left: Interactive Browser Mockup Window with Hover Scroll & Controls -->
            <div>
                <div class="browser-mockup-frame">
                    <!-- Browser Window Header -->
                    <div class="browser-frame-header">
                        <div class="browser-dots">
                            <span class="dot dot-red"></span>
                            <span class="dot dot-yellow"></span>
                            <span class="dot dot-green"></span>
                        </div>
                        <div class="browser-address-bar">
                            <span class="lock-icon">🔒</span>
                            <span class="url-text">{{ $project->project_url ?? 'https://rew.cl/portafolio/' . $project->slug }}</span>
                        </div>
                        <div class="browser-actions">
                            <button type="button" class="btn-browser-action zoom-fullscreen-btn" title="Ver Pantalla Completa HD">🔍</button>
                        </div>
                    </div>

                    <!-- Scrollable Viewport -->
                    <div class="browser-viewport-container" id="browserViewport">
                        <img src="{{ Str::startsWith($project->featured_image, 'http') ? $project->featured_image : asset(ltrim($project->featured_image, '/')) }}" alt="{{ $project->title }} - Captura Completa" class="browser-long-image" id="browserLongImg">
                    </div>

                    <!-- Floating Helper Hint -->
                    <div class="browser-frame-footer">
                        <span>↕️ Mueve el cursor o haz scroll sobre la ventana para recorrer el sitio web completo</span>
                        @if($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" rel="noopener" class="badge badge-primary">
                                Visitar Web en Vivo ↗
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Case Study Technical Details -->
                <div class="card" style="padding: 2.5rem; margin-top: 2.5rem;">
                    <h2 style="font-size: 1.8rem; margin-bottom: 1.25rem;">Descripción del Proyecto</h2>
                    <div style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body); margin-bottom: 2rem;">
                        {!! nl2br(e($project->full_description ?? $project->summary)) !!}
                    </div>

                    @if($project->results)
                        <h3 style="font-size: 1.3rem; margin-bottom: 1rem; color: var(--text-dark);">Resultados Obtenidos</h3>
                        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                            @foreach($project->results as $res)
                                <div style="display: flex; align-items: center; gap: 10px; background: #ecfdf5; border: 1px solid rgba(16, 185, 129, 0.25); padding: 1rem 1.25rem; border-radius: 10px;">
                                    <span style="color: #059669; font-size: 1.3rem; font-weight: 900;">✓</span>
                                    <span style="font-weight: 700; color: #065f46; font-size: 0.95rem;">{{ $res }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right: Specs Table & "Proyecto Similar" Form -->
            <div style="position: sticky; top: 100px;">
                <!-- Specifications Card -->
                <div class="card" style="padding: 2rem; margin-bottom: 2rem; box-shadow: var(--shadow-lg); border-color: rgba(79, 70, 229, 0.2);">
                    <h3 style="font-size: 1.25rem; margin-bottom: 1.25rem; padding-bottom: 0.75rem; border-bottom: 1px solid var(--border-light);">
                        Ficha Técnica del Proyecto
                    </h3>

                    <div style="display: flex; flex-direction: column; gap: 1rem; font-size: 0.92rem;">
                        <div>
                            <span style="font-size: 0.78rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; display: block;">Cliente</span>
                            <strong style="font-size: 1rem; color: var(--text-dark);">{{ $project->client }}</strong>
                        </div>

                        @if($project->project_date)
                            <div>
                                <span style="font-size: 0.78rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; display: block;">Fecha de Realización</span>
                                <span style="color: var(--text-body);">{{ $project->project_date }}</span>
                            </div>
                        @endif

                        <div>
                            <span style="font-size: 0.78rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; display: block;">Tipo de Proyecto</span>
                            <span style="color: var(--primary); font-weight: 600;">{{ $project->category }}</span>
                        </div>

                        <div>
                            <span style="font-size: 0.78rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; display: block;">Estado del Proyecto</span>
                            <span class="badge badge-emerald" style="margin-top: 4px;">{{ $project->status }}</span>
                        </div>

                        <div>
                            <span style="font-size: 0.78rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; display: block;">Tecnologías Usadas</span>
                            <div style="display: flex; flex-wrap: wrap; gap: 6px; margin-top: 4px;">
                                @foreach(explode(',', $project->technologies) as $tech)
                                    <span class="tech-tag">{{ trim($tech) }}</span>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <span style="font-size: 0.78rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; display: block;">Rol en el Proyecto</span>
                            <span style="color: var(--text-body); line-height: 1.4;">{{ $project->role }}</span>
                        </div>

                        @if($project->project_url)
                            <div style="margin-top: 0.5rem;">
                                <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline" style="width: 100%; text-align: center;">
                                    <span>Visitar {{ $project->project_url }} ↗</span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- "¿Te interesa un proyecto similar? ¡Contáctanos!" Form -->
                <div class="card" style="padding: 2.25rem; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #ffffff; box-shadow: var(--shadow-xl);">
                    <div style="margin-bottom: 1.25rem;">
                        <span class="badge badge-gold" style="margin-bottom: 0.5rem;">Propuesta a Medida</span>
                        <h3 style="color: #ffffff; font-size: 1.4rem; margin-bottom: 0.75rem;">¿Te interesa un proyecto similar?</h3>
                        <p style="font-size: 0.88rem; color: #cbd5e1; line-height: 1.5; margin-bottom: 1rem;">
                            En <strong>REW</strong>, no solo creamos páginas web, potenciamos negocios con un enfoque cercano y personalizado. Llevamos más de 6 años ayudando a emprendedores y empresas a construir su presencia digital con transparencia, estrategia y diseño a medida.
                        </p>
                        
                        <div style="font-size: 0.82rem; color: #94a3b8; line-height: 1.5; margin-bottom: 1.25rem; display: flex; flex-direction: column; gap: 6px;">
                            <div>🔹 <strong>Analizamos tu negocio</strong> con herramientas como Clarity para entender a tus usuarios.</div>
                            <div>🔹 <strong>Diseñamos y desarrollamos</strong> con un equipo de expertos: diseñador gráfico, community manager, programador senior y más.</div>
                            <div>🔹 <strong>Aplicamos inbound marketing</strong> para atraer clientes sin ser invasivos.</div>
                        </div>

                        <div style="font-size: 0.88rem; color: var(--accent-gold); font-weight: 700; margin-bottom: 1.25rem;">
                            🚀 Tu visión es nuestra misión. Llena el formulario y hablemos sobre cómo llevar tu negocio al siguiente nivel.
                        </div>
                    </div>

                    <form action="{{ route('cotizar.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="source" value="portfolio_{{ $project->slug }}">

                        <div style="margin-bottom: 0.75rem;">
                            <label style="font-size: 0.8rem; font-weight: 700; color: #cbd5e1; display: block; margin-bottom: 2px;">Nombre y Apellido *</label>
                            <input type="text" name="name" required placeholder="Tu nombre" 
                                   style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid rgba(255,255,255,0.2); background: rgba(255,255,255,0.08); color: #ffffff; font-size: 0.9rem; outline: none;">
                        </div>

                        <div style="margin-bottom: 0.75rem;">
                            <label style="font-size: 0.8rem; font-weight: 700; color: #cbd5e1; display: block; margin-bottom: 2px;">Correo Electrónico *</label>
                            <input type="email" name="email" required placeholder="tu@correo.cl" 
                                   style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid rgba(255,255,255,0.2); background: rgba(255,255,255,0.08); color: #ffffff; font-size: 0.9rem; outline: none;">
                        </div>

                        <div style="margin-bottom: 0.75rem;">
                            <label style="font-size: 0.8rem; font-weight: 700; color: #cbd5e1; display: block; margin-bottom: 2px;">Teléfono *</label>
                            <input type="tel" name="phone" required placeholder="+56 9 8726 1127" 
                                   style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid rgba(255,255,255,0.2); background: rgba(255,255,255,0.08); color: #ffffff; font-size: 0.9rem; outline: none;">
                        </div>

                        <div style="margin-bottom: 0.75rem;">
                            <label style="font-size: 0.8rem; font-weight: 700; color: #cbd5e1; display: block; margin-bottom: 2px;">📌 ¿Qué tipo de servicio necesitas?</label>
                            <select name="service_type" style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid rgba(255,255,255,0.2); background: #1e293b; color: #ffffff; font-size: 0.88rem; outline: none;">
                                <option value="1️⃣ Desarrollo Web 🖥️">1️⃣ Desarrollo Web 🖥️</option>
                                <option value="2️⃣ E-commerce 🛒">2️⃣ E-commerce 🛒</option>
                                <option value="3️⃣ Optimización Web 📈">3️⃣ Optimización Web 📈</option>
                                <option value="4️⃣ Mantenimiento Web 🔧">4️⃣ Mantenimiento Web 🔧</option>
                                <option value="5️⃣ Otro ❓">5️⃣ Otro ❓</option>
                            </select>
                        </div>

                        <div style="margin-bottom: 1.25rem;">
                            <label style="font-size: 0.8rem; font-weight: 700; color: #cbd5e1; display: block; margin-bottom: 2px;">📝 Cuéntanos sobre tu proyecto</label>
                            <textarea name="project_description" rows="2" placeholder="Detalles de tu idea, requerimientos o plazos..." 
                                      style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 8px; border: 1px solid rgba(255,255,255,0.2); background: rgba(255,255,255,0.08); color: #ffffff; font-size: 0.88rem; outline: none; font-family: inherit;"></textarea>
                        </div>

                        <button type="submit" class="btn btn-gold btn-lg" style="width: 100%; font-size: 1.05rem;">
                            <span>Hablemos sobre tu proyecto ➔</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Fullscreen HD Zoom Modal -->
        <div class="portfolio-zoom-modal" id="portfolioZoomModal">
            <div class="zoom-modal-header">
                <span style="color: #ffffff; font-weight: 700;">{{ $project->title }} - Vista Fullscreen HD</span>
                <button type="button" class="close-zoom-btn" id="closeZoomBtn">✕</button>
            </div>
            <div class="zoom-modal-body">
                <img src="{{ Str::startsWith($project->featured_image, 'http') ? $project->featured_image : asset(ltrim($project->featured_image, '/')) }}" alt="{{ $project->title }}" class="zoom-modal-img">
            </div>
        </div>
    </div>
</section>

<!-- Schema.org JSON-LD Structured Data for Portfolio Case Study -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@@type": "ListItem",
          "position": 1,
          "name": "Inicio",
          "item": "{{ route('home') }}"
        },
        {
          "@@type": "ListItem",
          "position": 2,
          "name": "Portafolio Web",
          "item": "{{ route('portafolio.index') }}"
        },
        {
          "@@type": "ListItem",
          "position": 3,
          "name": "{{ addslashes($project->title) }}",
          "item": "{{ route('portafolio.show', $project->slug) }}"
        }
      ]
    },
    {
      "@@type": "CreativeWork",
      "@@id": "{{ route('portafolio.show', $project->slug) }}#project",
      "name": "{{ addslashes($project->title) }}",
      "headline": "{{ addslashes($project->meta_title ?? $project->title) }}",
      "description": "{{ addslashes($project->summary) }}",
      "image": "{{ Str::startsWith($project->featured_image, 'http') ? $project->featured_image : asset(ltrim($project->featured_image, '/')) }}",
      "creator": {
        "@@type": "Organization",
        "name": "REW",
        "url": "https://rew.cl"
      },
      "author": {
        "@@type": "Person",
        "name": "Álvaro Valenzuela Valdés",
        "jobTitle": "Ingeniero Informático"
      },
      "provider": {
        "@@type": "Organization",
        "name": "REW",
        "url": "https://rew.cl"
      },
      "genre": "{{ addslashes($project->category) }}",
      "keywords": "{{ addslashes($project->technologies) }}",
      "url": "{{ route('portafolio.show', $project->slug) }}"
    }
  ]
}
</script>
@endsection
