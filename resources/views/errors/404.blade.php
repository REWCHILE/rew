@extends('layouts.app')

@section('title', '404 - ¡Naufragio en el Océano Digital! | REW Chile')
@section('meta_description', 'Página no encontrada. Parece que las corrientes del océano digital te llevaron a una coordenada inexplorada. Vuelve a navegar a puerto seguro.')

@section('og_title', '404 - Naufragio en el Océano Digital | REW Chile')
@section('og_description', 'En REW nos movemos con la fuerza y fluidez de las olas del mar, pero esta página se la llevó la marea digital.')
@section('og_image', asset('images/rew_404_naufrago.webp'))

@section('content')
<style>
.ocean-404-container {
    position: relative;
    background: radial-gradient(circle at 50% 30%, #1e1b4b 0%, #0b0f19 70%, #030712 100%);
    min-height: 85vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 4rem 1.5rem 6rem;
    overflow: hidden;
    color: #ffffff;
}

.ocean-particles-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
}

.ocean-404-card {
    position: relative;
    z-index: 2;
    background: rgba(15, 23, 42, 0.75);
    backdrop-filter: blur(16px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 28px;
    box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.7), 0 0 40px rgba(56, 189, 248, 0.15);
    max-width: 1080px;
    width: 100%;
    padding: 3rem;
    display: grid;
    grid-template-columns: 1.15fr 1fr;
    gap: 3rem;
    align-items: center;
}

.ocean-artwork-box {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(56, 189, 248, 0.3);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5), 0 0 25px rgba(56, 189, 248, 0.2);
}

.ocean-artwork-img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.ocean-artwork-box:hover .ocean-artwork-img {
    transform: scale(1.03);
}

.ocean-artwork-badge {
    position: absolute;
    bottom: 14px;
    left: 14px;
    background: rgba(15, 23, 42, 0.88);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(245, 158, 11, 0.4);
    padding: 6px 14px;
    border-radius: 9999px;
    font-size: 0.8rem;
    font-weight: 700;
    color: #fbbf24;
    display: flex;
    align-items: center;
    gap: 6px;
}

.ocean-badge-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 16px;
    background: rgba(56, 189, 248, 0.15);
    border: 1px solid rgba(56, 189, 248, 0.35);
    border-radius: 9999px;
    color: #38bdf8;
    font-size: 0.85rem;
    font-weight: 700;
    margin-bottom: 1.25rem;
}

.ocean-title {
    font-size: 2.75rem;
    font-weight: 900;
    line-height: 1.15;
    margin-bottom: 1.25rem;
    background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 50%, #38bdf8 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.ocean-desc {
    font-size: 1.05rem;
    line-height: 1.7;
    color: #94a3b8;
    margin-bottom: 2rem;
}

.ocean-links-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 2rem;
}

.ocean-action-btn {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 16px;
    background: rgba(30, 41, 59, 0.8);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 12px;
    color: #e2e8f0;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    transition: all 0.2s ease;
}

.ocean-action-btn:hover {
    background: rgba(79, 70, 229, 0.3);
    border-color: rgba(99, 102, 241, 0.5);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(79, 70, 229, 0.25);
}

.ocean-action-btn .btn-icon {
    font-size: 1.2rem;
}

.ocean-brand-origin-note {
    background: rgba(245, 158, 11, 0.1);
    border-left: 3px solid #f59e0b;
    padding: 10px 14px;
    border-radius: 0 10px 10px 0;
    font-size: 0.82rem;
    color: #cbd5e1;
    line-height: 1.5;
}

@media (max-width: 900px) {
    .ocean-404-card {
        grid-template-columns: 1fr;
        padding: 2rem 1.5rem;
        gap: 2rem;
    }
    .ocean-title {
        font-size: 2.2rem;
    }
    .ocean-links-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="ocean-404-container">
    <!-- Animated Ocean Waves & Bioluminescent Bubbles Canvas -->
    <canvas id="oceanCanvas404" class="ocean-particles-bg" data-ocean-canvas data-bubbles="50"></canvas>

    <div class="ocean-404-card">
        <!-- 3D Castaway Artwork (Robinson Crusoe + Wilson 2.0 + Rich-E) -->
        <div class="ocean-artwork-box">
            <img src="{{ asset('images/rew_404_naufrago.webp') }}" 
                 alt="Náufrago digital 404 en el océano REW" 
                 class="ocean-artwork-img">
            <div class="ocean-artwork-badge">
                <span>🏐 Wilson 2.0 & Rich-E en guardia</span>
            </div>
        </div>

        <!-- Copy & Navigation Routes -->
        <div>
            <div class="ocean-badge-pill">
                <span>🌊 Coordenada Perdida en Alta Mar</span>
            </div>

            <h1 class="ocean-title">¡Naufragio Digital! <span style="color: #f59e0b;">(404)</span></h1>

            <p class="ocean-desc">
                En <strong>REW</strong> nos movemos con la energía y fluidez de las olas del mar, pero esta coordenada digital se la llevó la marea hacia aguas inexploradas.
            </p>

            <div class="ocean-links-grid">
                <a href="{{ route('home') }}" class="ocean-action-btn">
                    <span class="btn-icon">⚓</span>
                    <span>Puerto Seguro (Inicio)</span>
                </a>
                <a href="{{ route('tienda.index') }}" class="ocean-action-btn">
                    <span class="btn-icon">🛍️</span>
                    <span>Tienda de Plugins</span>
                </a>
                <a href="{{ route('portafolio.index') }}" class="ocean-action-btn">
                    <span class="btn-icon">💼</span>
                    <span>Portafolio de Proyectos</span>
                </a>
                <a href="{{ route('servicios.desarrollo-web') }}" class="ocean-action-btn">
                    <span class="btn-icon">⚡</span>
                    <span>Servicios de Software</span>
                </a>
            </div>

            <!-- WhatsApp Direct SOS -->
            <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ urlencode('¡Hola Álvaro! Estaba navegando en REW y encontré un error 404 en la web.') }}" 
               target="_blank" rel="noopener" class="btn btn-whatsapp" style="width: 100%; text-align: center; margin-bottom: 1.25rem; font-weight: 700;">
                <span>💬 Enviar Señal de SOS por WhatsApp</span>
            </a>

            <div class="ocean-brand-origin-note">
                💡 <strong>El significado de REW:</strong> Nuestra marca nace del flujo inagotable de las olas del mar, transformando corrientes de datos y tecnología en soluciones digitales de alto impacto.
            </div>
        </div>
    </div>
</div>

<!-- Load Ocean Particles Engine -->
<script src="{{ asset('js/ocean-waves-particles.js') }}"></script>
@endsection
