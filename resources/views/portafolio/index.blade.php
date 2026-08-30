@extends('layouts.app')

@section('title', 'Portafolio de Proyectos Web, E-Commerce & Software | REW Chile')
@section('meta_description', 'Explora nuestros proyectos reales de desarrollo web, tiendas online de merchandising para artistas internacionales, plataformas educativas y software a medida.')

@section('og_title', 'Portafolio Web & Casos de Éxito | REW Chile')
@section('og_description', 'Descubre los casos de éxito de REW: Artífices TV, Código 25, Cuarteto de Nos, Auténticos Decadentes, Sotemono, Academiaflix y más.')
@section('og_image', asset('images/logo.webp'))

@section('content')
<style>
/* Modern Cognitive Cleanliness & Segmented Navigation */
.portfolio-segmented-wrap {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 2rem;
}

.portfolio-segmented-nav {
    display: inline-flex;
    background: #ffffff;
    padding: 6px;
    border-radius: 9999px;
    box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.08), 0 0 0 1px rgba(15, 23, 42, 0.05);
    gap: 6px;
    max-width: 100%;
    overflow-x: auto;
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.portfolio-segmented-nav::-webkit-scrollbar {
    display: none;
}

.segmented-tab {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    border-radius: 9999px;
    font-size: 0.92rem;
    font-weight: 600;
    color: #475569;
    text-decoration: none;
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    white-space: nowrap;
}

.segmented-tab:hover {
    color: var(--primary);
    background: #f8fafc;
}

.segmented-tab.active {
    background: var(--gradient-primary, linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%));
    color: #ffffff !important;
    box-shadow: 0 4px 12px rgba(79, 70, 229, 0.35);
}

.segmented-tab .tab-count {
    display: inline-block;
    padding: 2px 7px;
    font-size: 0.75rem;
    border-radius: 9999px;
    background: rgba(15, 23, 42, 0.07);
    color: inherit;
    font-weight: 700;
}

.segmented-tab.active .tab-count {
    background: rgba(255, 255, 255, 0.25);
    color: #ffffff;
}

/* Search Box Minimalist */
.portfolio-search-wrap {
    max-width: 480px;
    margin: 0 auto 3rem auto;
    position: relative;
}

.portfolio-search-input {
    width: 100%;
    padding: 12px 18px 12px 42px;
    border-radius: 9999px;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    font-size: 0.92rem;
    color: var(--text-dark);
    box-shadow: 0 2px 8px rgba(0,0,0,0.03);
    outline: none;
    transition: all 0.2s ease;
}

.portfolio-search-input:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
}

.portfolio-search-icon {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    pointer-events: none;
}

/* Card Visual Polish */
.portfolio-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
    gap: 2.25rem;
    margin-bottom: 4.5rem;
}

.portfolio-card-premium {
    background: #ffffff;
    border-radius: 20px;
    border: 1px solid rgba(226, 232, 240, 0.8);
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1), border-color 0.3s ease;
    display: flex;
    flex-direction: column;
}

.portfolio-card-premium:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 25px -5px rgba(15, 23, 42, 0.1), 0 8px 10px -6px rgba(15, 23, 42, 0.05);
    border-color: rgba(79, 70, 229, 0.3);
}

.portfolio-card-img-box {
    position: relative;
    width: 100%;
    height: 230px;
    background: #0f172a;
    overflow: hidden;
}

.portfolio-card-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.portfolio-card-premium:hover .portfolio-card-img-box img {
    transform: scale(1.04);
}

.portfolio-card-tag {
    position: absolute;
    top: 14px;
    left: 14px;
    background: rgba(15, 23, 42, 0.85);
    backdrop-filter: blur(8px);
    color: #ffffff;
    padding: 4px 12px;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.03em;
    border: 1px solid rgba(255, 255, 255, 0.15);
}

.portfolio-card-content {
    padding: 1.75rem;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    justify-content: space-between;
}

.portfolio-client-title {
    font-size: 0.8rem;
    font-weight: 800;
    color: var(--accent-gold, #d97706);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.35rem;
}

.portfolio-project-title {
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--text-dark, #0f172a);
    margin-bottom: 0.75rem;
    line-height: 1.3;
}

.portfolio-project-desc {
    font-size: 0.9rem;
    color: var(--text-muted, #64748b);
    line-height: 1.6;
    margin-bottom: 1.25rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.portfolio-tech-list {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 1.5rem;
}

.portfolio-tech-item {
    font-size: 0.76rem;
    font-weight: 600;
    color: #475569;
    background: #f1f5f9;
    padding: 4px 10px;
    border-radius: 6px;
}

@media (max-width: 768px) {
    .portfolio-grid {
        grid-template-columns: 1fr;
    }
    .portfolio-segmented-wrap {
        justify-content: flex-start;
    }
}
</style>

<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%);">
    <div class="container">
        <!-- Header -->
        <div style="text-align: center; max-width: 800px; margin: 0 auto 2.5rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Casos de Estudio Seleccionados</span>
            <h1 style="font-size: 3rem; margin-bottom: 1rem; letter-spacing: -0.02em;">Portafolio Web & Casos de Éxito</h1>
            <p style="font-size: 1.15rem; color: var(--text-body); line-height: 1.6;">
                Plataformas de alta demanda para artistas internacionales, comercio electrónico escalable y arquitectura de software desarrollada con excelencia.
            </p>
        </div>

        <!-- 1. Limpieza Visual Cognitiva: Macro-Filtros Segmentados -->
        <div class="portfolio-segmented-wrap">
            <nav class="portfolio-segmented-nav" aria-label="Filtros de Portafolio">
                @foreach($macroCategories as $slug => $cat)
                    <a href="{{ route('portafolio.index', ['categoria' => $slug]) }}" 
                       class="segmented-tab {{ $selectedCategory === $slug ? 'active' : '' }}">
                        <span>{{ $cat['icon'] }} {{ $cat['name'] }}</span>
                        <span class="tab-count">{{ $cat['count'] }}</span>
                    </a>
                @endforeach
            </nav>
        </div>

        <!-- 2. Barra de Búsqueda Minimalista -->
        <div class="portfolio-search-wrap">
            <form action="{{ route('portafolio.index') }}" method="GET">
                @if($selectedCategory && $selectedCategory !== 'todos')
                    <input type="hidden" name="categoria" value="{{ $selectedCategory }}">
                @endif
                <span class="portfolio-search-icon">🔍</span>
                <input type="text" 
                       name="buscar" 
                       value="{{ $search ?? '' }}" 
                       placeholder="Buscar por cliente, tecnología o palabra clave..." 
                       class="portfolio-search-input"
                       autocomplete="off">
            </form>
        </div>

        <!-- 3. Grilla de Proyectos Premium -->
        @if($projects->isEmpty())
            <div class="card" style="text-align: center; padding: 4rem 2rem; margin-bottom: 4rem;">
                <span style="font-size: 3rem; display: block; margin-bottom: 1rem;">🔍</span>
                <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem;">No se encontraron proyectos</h3>
                <p style="color: var(--text-muted); margin-bottom: 1.5rem;">Intenta con otro término de búsqueda o selecciona otra categoría.</p>
                <a href="{{ route('portafolio.index') }}" class="btn btn-outline">Ver Todos los Proyectos</a>
            </div>
        @else
            <div class="portfolio-grid">
                @foreach($projects as $proj)
                    <article class="portfolio-card-premium">
                        <div class="portfolio-card-img-box">
                            <img src="{{ Str::startsWith($proj->featured_image, 'http') ? $proj->featured_image : asset(ltrim($proj->featured_image, '/')) }}" 
                                 alt="{{ $proj->title }}" 
                                 loading="lazy">
                            <div class="portfolio-card-tag">{{ $proj->category }}</div>
                        </div>
                        
                        <div class="portfolio-card-content">
                            <div>
                                <div class="portfolio-client-title">{{ $proj->client }}</div>
                                <h2 class="portfolio-project-title">{{ $proj->title }}</h2>
                                <p class="portfolio-project-desc">{{ $proj->summary }}</p>
                            </div>

                            <div>
                                <div class="portfolio-tech-list">
                                    @foreach(array_slice(explode(',', $proj->technologies), 0, 3) as $tech)
                                        <span class="portfolio-tech-item">{{ trim($tech) }}</span>
                                    @endforeach
                                </div>

                                <a href="{{ route('portafolio.show', $proj->slug) }}" class="btn btn-outline" style="width: 100%; text-align: center;">
                                    <span>Explorar Caso de Estudio →</span>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif

        <!-- CTA Box -->
        <div class="card" style="background: linear-gradient(135deg, var(--primary) 0%, #312e81 100%); color: #ffffff; text-align: center; padding: 3.5rem 2rem; border-radius: 24px;">
            <h2 style="color: #ffffff; font-size: 2.2rem; margin-bottom: 1rem;">¿Quieres un sitio web o e-commerce de este nivel?</h2>
            <p style="color: #e0e7ff; font-size: 1.1rem; max-width: 600px; margin: 0 auto 2rem;">
                Hablemos sobre tu proyecto y desarrollemos una solución que supere las expectativas de tus clientes.
            </p>
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <a href="{{ route('contacto') }}" class="btn btn-gold btn-lg">Solicitar Presupuesto</a>
                <a href="https://api.whatsapp.com/send?phone=56987261127" target="_blank" rel="noopener" class="btn btn-whatsapp btn-lg">WhatsApp Directo</a>
            </div>
        </div>
    </div>
</section>

<!-- Schema.org JSON-LD Structured Data for Portfolio Collection -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "CollectionPage",
      "@@id": "{{ route('portafolio.index') }}#webpage",
      "url": "{{ route('portafolio.index') }}",
      "name": "Portafolio de Proyectos Web & Software | REW Chile",
      "description": "Explora nuestros proyectos reales de desarrollo web, tiendas online de merchandising para artistas internacionales y plataformas a medida.",
      "breadcrumb": {
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
          }
        ]
      },
      "mainEntity": {
        "@@type": "ItemList",
        "itemListElement": [
          @foreach($projects as $index => $proj)
          {
            "@@type": "ListItem",
            "position": {{ $index + 1 }},
            "name": "{{ addslashes($proj->title) }}",
            "url": "{{ route('portafolio.show', $proj->slug) }}"
          }{{ !$loop->last ? ',' : '' }}
          @endforeach
        ]
      }
    }
  ]
}
</script>
@endsection
