@extends('layouts.app')

@section('title', $service->meta_title ?? $service->name . ' | REW Chile')
@section('meta_description', $service->meta_description ?? $service->tagline)

@section('og_title', $service->meta_title ?? $service->name . ' | REW Chile')
@section('og_description', $service->meta_description ?? $service->tagline)
@section('og_image', asset('images/logo.webp'))

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%);">
    <div class="container">
        <!-- Breadcrumb -->
        <div style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}">Inicio</a> &nbsp;/&nbsp;
            <span>Servicios</span> &nbsp;/&nbsp;
            <span style="color: var(--text-dark); font-weight: 600;">{{ $service->name }}</span>
        </div>

        <!-- Service Hero -->
        <div style="max-width: 850px; margin-bottom: 4rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Servicio Especializado</span>
            <h1 style="font-size: 3.2rem; margin-bottom: 1.25rem; line-height: 1.15;">{{ $service->name }}</h1>
            <p style="font-size: 1.3rem; color: var(--text-body); line-height: 1.6; margin-bottom: 2rem;">
                {{ $service->tagline }}
            </p>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">Cotizar este Servicio</a>
                <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ urlencode('Hola Álvaro, me interesa cotizar el servicio de ' . $service->name) }}" target="_blank" rel="noopener" class="btn btn-whatsapp btn-lg">
                    <span>💬 Consultar por WhatsApp</span>
                </a>
            </div>
        </div>

        <!-- Detailed Description & Deliverables -->
        <div class="grid-2col-sidebar" style="margin-bottom: 4rem;">
            <div>
                <div class="card" style="padding: 2.5rem; margin-bottom: 3rem;">
                    <h2 style="font-size: 1.8rem; margin-bottom: 1.25rem;">Propuesta de Valor & Metodología</h2>
                    <div style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body); margin-bottom: 2rem;">
                        {!! nl2br(e($service->description)) !!}
                    </div>

                    @if($service->features)
                        <h3 style="font-size: 1.3rem; margin-bottom: 1.25rem;">Entregables y Capacidades Clave</h3>
                        <div style="display: flex; flex-direction: column; gap: 0.85rem;">
                            @foreach($service->features as $feat)
                                <div style="display: flex; align-items: flex-start; gap: 12px; background: var(--bg-alt); padding: 1rem 1.25rem; border-radius: 10px;">
                                    <span style="color: var(--primary); font-size: 1.2rem; font-weight: 800;">✓</span>
                                    <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">{{ $feat }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Process Steps -->
                @if($service->process_steps)
                    <div class="card" style="padding: 2.5rem;">
                        <h2 style="font-size: 1.8rem; margin-bottom: 1.5rem;">Paso a Paso de la Ejecución</h2>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.25rem;">
                            @foreach($service->process_steps as $step)
                                <div style="background: var(--bg-alt); padding: 1.25rem; border-radius: 12px; border: 1px solid var(--border-light);">
                                    <div style="font-size: 1.6rem; font-weight: 900; color: var(--accent-gold); margin-bottom: 0.5rem;">
                                        0{{ $step['step'] }}
                                    </div>
                                    <h4 style="font-size: 1.05rem; margin-bottom: 0.35rem;">{{ $step['title'] }}</h4>
                                    <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.4;">{{ $step['desc'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar: Why Choose REW & Direct Quote -->
            <div style="position: sticky; top: 110px;">
                <div class="card" style="padding: 2rem; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #ffffff; margin-bottom: 2rem; box-shadow: var(--shadow-xl);">
                    <h3 style="color: #ffffff; font-size: 1.3rem; margin-bottom: 1rem;">¿Por qué elegir a REW?</h3>
                    <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 1rem; font-size: 0.92rem; color: #cbd5e1; margin-bottom: 2rem;">
                        <li style="display: flex; gap: 8px;">
                            <span style="color: var(--accent-gold);">⚡</span>
                            <span>Liderado por Álvaro Valenzuela Valdés (Ingeniero Informático).</span>
                        </li>
                        <li style="display: flex; gap: 8px;">
                            <span style="color: var(--accent-gold);">⚡</span>
                            <span>Enfoque en métricas de negocio y velocidad extrema.</span>
                        </li>
                        <li style="display: flex; gap: 8px;">
                            <span style="color: var(--accent-gold);">⚡</span>
                            <span>Garantía de soporte técnico y código limpio.</span>
                        </li>
                    </ul>
                    <a href="{{ route('contacto') }}" class="btn btn-gold" style="width: 100%; text-align: center;">
                        <span>Solicitar Cotización Formal</span>
                    </a>
                </div>

                @if($relatedProducts->isNotEmpty())
                    <div class="card" style="padding: 1.75rem;">
                        <h4 style="font-size: 1.1rem; margin-bottom: 1rem;">Plugins Relacionados</h4>
                        <div style="display: flex; flex-direction: column; gap: 1rem;">
                            @foreach($relatedProducts as $rel)
                                <div style="display: flex; gap: 10px; align-items: center;">
                                    <img src="{{ $rel->featured_image }}" alt="{{ $rel->name }}" style="width: 45px; height: 45px; object-fit: contain; background: var(--bg-alt); padding: 4px; border-radius: 6px;">
                                    <div>
                                        <a href="{{ route('tienda.show', $rel->slug) }}" style="font-size: 0.88rem; font-weight: 700; color: var(--text-dark); display: block; line-height: 1.3;">
                                            {{ $rel->name }}
                                        </a>
                                        <span style="font-size: 0.8rem; color: var(--primary); font-weight: 700;">${{ number_format($rel->price_usd, 0) }} USD</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Related Projects from Portfolio -->
        @if($relatedProjects->isNotEmpty())
            <div>
                <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem;">Proyectos Desarrollados con esta Tecnología</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                    @foreach($relatedProjects as $proj)
                        <div class="card portfolio-card">
                            <div class="portfolio-img-wrap" style="height: 180px;">
                                <img src="{{ $proj->featured_image }}" alt="{{ $proj->title }}" class="portfolio-img">
                                <div class="portfolio-overlay">
                                    <h4 style="color: #ffffff; font-size: 1.15rem; margin: 0;">{{ $proj->title }}</h4>
                                </div>
                            </div>
                            <div class="portfolio-body">
                                <p class="portfolio-summary" style="font-size: 0.85rem;">{{ $proj->summary }}</p>
                                <a href="{{ route('portafolio.show', $proj->slug) }}" class="btn btn-outline btn-sm" style="width: 100%; text-align: center;">
                                    Ver Caso de Estudio
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
