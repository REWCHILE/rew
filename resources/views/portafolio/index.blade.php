@extends('layouts.app')

@section('title', 'Portafolio de Proyectos Web & Software | REW Chile')
@section('meta_description', 'Explora nuestros proyectos reales de desarrollo web, tiendas online de merchandising para artistas internacionales y plataformas a medida.')

@section('og_title', 'Portafolio Web & Casos de Éxito | REW Chile')
@section('og_description', 'Descubre los casos de éxito de REW: Artífices TV, Código 25, Cuarteto de Nos, Auténticos Decadentes, Sotemono y más.')
@section('og_image', asset('images/logo.webp'))

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%);">
    <div class="container">
        <!-- Header -->
        <div style="text-align: center; max-width: 800px; margin: 0 auto 3rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Trabajos Seleccionados</span>
            <h1 style="font-size: 3rem; margin-bottom: 1rem;">Portafolio Web & Casos de Éxito</h1>
            <p style="font-size: 1.15rem; color: var(--text-body);">
                Plataformas de comercio electrónico para artistas internacionales, sitios de streaming y soluciones digitales creadas con pasión y excelencia técnica.
            </p>
        </div>

        <!-- Filter Pills -->
        <div class="card" style="padding: 1.25rem; margin-bottom: 3.5rem; box-shadow: var(--shadow-sm);">
            <div style="display: flex; flex-wrap: wrap; gap: 8px; justify-content: center;">
                <a href="{{ route('portafolio.index') }}" 
                   class="badge {{ empty($selectedCategory) || $selectedCategory === 'todos' ? 'badge-primary' : 'badge-pill-glow' }}"
                   style="text-decoration: none; padding: 6px 14px; font-size: 0.85rem;">
                    Todos los Proyectos ({{ \App\Models\PortfolioProject::count() }})
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('portafolio.index', ['categoria' => $cat]) }}" 
                       class="badge {{ $selectedCategory === $cat ? 'badge-primary' : 'badge-pill-glow' }}"
                       style="text-decoration: none; padding: 6px 14px; font-size: 0.85rem;">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Projects Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 2.5rem; margin-bottom: 4rem;">
            @foreach($projects as $proj)
                <div class="card portfolio-card">
                    <div class="portfolio-img-wrap">
                        <img src="{{ $proj->featured_image }}" alt="{{ $proj->title }}" class="portfolio-img" loading="lazy">
                        <div class="portfolio-overlay">
                            <div class="portfolio-meta-pill">{{ $proj->category }}</div>
                            <h3 style="color: #ffffff; font-size: 1.35rem; margin: 0;">{{ $proj->title }}</h3>
                        </div>
                    </div>
                    <div class="portfolio-body">
                        <div style="font-size: 0.82rem; color: var(--accent-gold); font-weight: 700; margin-bottom: 0.35rem;">
                            Cliente: {{ $proj->client }}
                        </div>
                        <p class="portfolio-summary">{{ $proj->summary }}</p>
                        
                        <div class="portfolio-tech-tags">
                            @foreach(array_slice(explode(',', $proj->technologies), 0, 3) as $tech)
                                <span class="tech-tag">{{ trim($tech) }}</span>
                            @endforeach
                        </div>

                        <a href="{{ route('portafolio.show', $proj->slug) }}" class="btn btn-outline" style="width: 100%; text-align: center;">
                            <span>Explorar Ficha del Proyecto →</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- CTA Box -->
        <div class="card" style="background: linear-gradient(135deg, var(--primary) 0%, #312e81 100%); color: #ffffff; text-align: center; padding: 3.5rem 2rem;">
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
@endsection
