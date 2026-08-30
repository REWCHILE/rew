@extends('layouts.app')

@section('title', 'Auditoría SEO Gratuita en Chile | Diagnóstico de Velocidad & Google | REW')
@section('meta_description', 'Solicita una auditoría SEO técnica y de velocidad Core Web Vitals gratuita para tu sitio web en Chile. Descubre qué frena tus ventas en Google y cómo rankear en el Top 1.')

@section('og_type', 'website')
@section('og_title', 'Auditoría SEO Gratuita en Chile | REW')
@section('og_description', 'Evalúa la velocidad y el SEO técnico de tu página web en segundos. Diagnóstico profesional y plan de acción.')
@section('og_image', asset('images/logo.webp'))

@section('content')
<!-- Hero Section with Interactive Audit Box -->
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%); padding-top: 5rem; padding-bottom: 4rem;">
    <div class="container">
        <!-- Breadcrumb -->
        <div style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}">Inicio</a> &nbsp;/&nbsp;
            <span style="color: var(--text-dark); font-weight: 600;">Auditoría SEO Gratuita</span>
        </div>

        <div style="text-align: center; max-width: 850px; margin: 0 auto 3rem;">
            <span class="badge badge-gold" style="margin-bottom: 1rem;">Herramienta de Diagnóstico en Vivo</span>
            <h1 style="font-size: 3.4rem; margin-bottom: 1.25rem; line-height: 1.15; color: var(--text-dark);">
                Auditoría <span class="gradient-text">SEO & Velocidad</span> Gratuita 🚀🔍
            </h1>
            <p style="font-size: 1.25rem; color: var(--text-body); line-height: 1.6;">
                Descubre el estado real de tu sitio web frente al algoritmo de <strong>Google</strong>. Analizamos tu velocidad <strong>Core Web Vitals</strong>, tiempo de respuesta de servidor (TTFB), indexación y arquitectura técnica.
            </p>
        </div>

        <!-- Live Scanner Card -->
        <div class="card" style="max-width: 720px; margin: 0 auto; padding: 2.5rem; box-shadow: var(--shadow-2xl); border: 2px solid rgba(79, 70, 229, 0.25); border-radius: 20px;">
            <h3 style="font-size: 1.35rem; margin-bottom: 0.5rem; text-align: center; color: var(--text-dark);">
                Ingresa la URL de tu Sitio Web
            </h3>
            <p style="font-size: 0.9rem; color: var(--text-muted); text-align: center; margin-bottom: 1.75rem;">
                Recibe un informe inmediato con puntaje móvil, desktop y recomendaciones técnicas directas.
            </p>

            <form id="landingAuditForm" style="display: flex; flex-direction: column; gap: 1rem;">
                @csrf
                <input type="text" name="b_field_check_hp" style="display:none !important;" tabindex="-1" autocomplete="off">
                
                <div>
                    <label style="font-size: 0.85rem; font-weight: 700; color: var(--text-dark); margin-bottom: 4px; display: block;">Dirección Web a Analizar</label>
                    <input type="url" name="website_url" required placeholder="https://tuempresa.cl" style="width: 100%; padding: 0.85rem 1.25rem; border: 1px solid var(--border-light); border-radius: 10px; font-size: 1rem;">
                </div>

                <div class="grid-form-2col">
                    <div>
                        <label style="font-size: 0.85rem; font-weight: 700; color: var(--text-dark); margin-bottom: 4px; display: block;">Tu Nombre</label>
                        <input type="text" name="name" required placeholder="Ej: Álvaro Valenzuela" style="width: 100%; padding: 0.85rem 1.25rem; border: 1px solid var(--border-light); border-radius: 10px; font-size: 0.95rem;">
                    </div>
                    <div>
                        <label style="font-size: 0.85rem; font-weight: 700; color: var(--text-dark); margin-bottom: 4px; display: block;">Correo Electrónico</label>
                        <input type="email" name="email" required placeholder="alvaro@empresa.cl" style="width: 100%; padding: 0.85rem 1.25rem; border: 1px solid var(--border-light); border-radius: 10px; font-size: 0.95rem;">
                    </div>
                </div>

                <div class="grid-form-2col">
                    <div>
                        <label style="font-size: 0.85rem; font-weight: 700; color: var(--text-dark); margin-bottom: 4px; display: block;">Teléfono / WhatsApp</label>
                        <input type="tel" name="phone" required placeholder="+56 9 8726 1127" style="width: 100%; padding: 0.85rem 1.25rem; border: 1px solid var(--border-light); border-radius: 10px; font-size: 0.95rem;">
                    </div>
                    <div>
                        <label style="font-size: 0.85rem; font-weight: 700; color: var(--text-dark); margin-bottom: 4px; display: block;">Nombre de tu Empresa (Opcional)</label>
                        <input type="text" name="company" placeholder="Ej: Mi Empresa SpA" style="width: 100%; padding: 0.85rem 1.25rem; border: 1px solid var(--border-light); border-radius: 10px; font-size: 0.95rem;">
                    </div>
                </div>

                <button type="submit" id="landingAuditSubmitBtn" class="btn btn-primary btn-lg" style="width: 100%; justify-content: center; margin-top: 0.5rem;">
                    <span>⚡ Analizar Mi Sitio Web Ahora</span>
                </button>
            </form>

            <!-- Results Display Container -->
            <div id="landingAuditResults" style="display: none; margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border-light);">
                <div style="text-align: center; margin-bottom: 1.5rem;">
                    <span class="badge badge-emerald" style="font-size: 0.9rem; padding: 6px 14px;">✅ Diagnóstico Completado con Éxito</span>
                    <h4 style="font-size: 1.3rem; margin-top: 0.75rem;" id="resDomain"></h4>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                    <div style="background: var(--bg-alt); padding: 1.25rem; border-radius: 12px; text-align: center;">
                        <div style="font-size: 0.82rem; color: var(--text-muted); font-weight: 700; text-transform: uppercase;">Puntaje Móvil</div>
                        <div id="resMobileScore" style="font-size: 2.4rem; font-weight: 900; color: #f59e0b;">--</div>
                    </div>
                    <div style="background: var(--bg-alt); padding: 1.25rem; border-radius: 12px; text-align: center;">
                        <div style="font-size: 0.82rem; color: var(--text-muted); font-weight: 700; text-transform: uppercase;">Puntaje Desktop</div>
                        <div id="resDesktopScore" style="font-size: 2.4rem; font-weight: 900; color: #10b981;">--</div>
                    </div>
                </div>

                <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1.25rem; margin-bottom: 1.5rem;">
                    <strong style="color: var(--text-dark); font-size: 0.95rem; display: block; margin-bottom: 0.5rem;">💡 Oportunidades Clave Detectadas:</strong>
                    <ul id="resRecList" style="margin: 0; padding-left: 1.25rem; font-size: 0.88rem; color: var(--text-body); line-height: 1.6;"></ul>
                </div>

                <a href="#" id="resWaBtn" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg" style="width: 100%; justify-content: center;">
                    <span>💬 Coordinar Plan de Optimización por WhatsApp</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ¿Qué analiza esta auditoría? -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div style="text-align: center; max-width: 750px; margin: 0 auto 3.5rem;">
            <h2 style="font-size: 2.4rem; color: var(--text-dark); margin-bottom: 1rem;">¿Qué Factores Evaluamos en tu Web?</h2>
            <p style="color: var(--text-body); font-size: 1.1rem;">Google prioriza sitios rápidos, estructurados y optimizados para la experiencia en teléfonos móviles.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
            <div class="card" style="padding: 2rem;">
                <div style="font-size: 2rem; margin-bottom: 0.75rem;">⚡</div>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Core Web Vitals & TTFB</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6;">
                    Medimos el tiempo de respuesta del servidor (TTFB), la velocidad de renderizado del contenido visual (LCP) y la estabilidad de los elementos en pantalla (CLS).
                </p>
            </div>

            <div class="card" style="padding: 2rem;">
                <div style="font-size: 2rem; margin-bottom: 0.75rem;">📊</div>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Estructura Schema JSON-LD</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6;">
                    Revisamos si tu página comunica correctamente sus datos estructurados a Google y a los nuevos motores de búsqueda de Inteligencia Artificial (GEO / ChatGPT).
                </p>
            </div>

            <div class="card" style="padding: 2rem;">
                <div style="font-size: 2rem; margin-bottom: 0.75rem;">📱</div>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Experiencia Móvil & Código</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6;">
                    Detectamos bloqueos de JavaScript, imágenes sobredimensionadas sin formato WebP y recursos que ralentizan la conversión de usuarios en clientes.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Direct Contact Section -->
<section class="section" style="background: var(--bg-alt);">
    <div class="container">
        <div class="grid-2col-cta" style="align-items: center;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 1rem;">Sesión Técnica Personalizada</span>
                <h2 style="font-size: 2.4rem; color: var(--text-dark); margin-bottom: 1.25rem; line-height: 1.2;">
                    ¿Quieres Llevar tu Sitio al Top 1 de Google? 🚀
                </h2>
                <p style="color: var(--text-body); font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.75rem;">
                    Agenda una videollamada de 20 minutos con <strong>Álvaro Valenzuela Valdés</strong>. Revisaremos los errores de tu sitio web y diseñaremos una estrategia para multiplicar tu tráfico y ventas.
                </p>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="{{ route('servicios.seo') }}" class="btn btn-primary btn-lg">
                        <span>📈 Conocer Planes de Posicionamiento SEO</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, realicé la auditoría de mi sitio web y me gustaría revisar los resultados.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 WhatsApp Directo</span>
                    </a>
                </div>
            </div>

            <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-xl); padding: 2.25rem; text-align: center; box-shadow: var(--shadow-lg);">
                <h3 style="color: var(--text-dark); font-size: 1.35rem; margin-bottom: 0.5rem;">Álvaro Valenzuela Valdés</h3>
                <div style="color: var(--primary); font-size: 0.9rem; font-weight: 700; margin-bottom: 1.25rem;">Consultor SEO & Fundador de REW</div>
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; margin-bottom: 1.5rem;">
                    📍 Santiago, Providencia, Chile<br>
                    ✉️ <a href="mailto:alvaro@rew.cl" style="color: var(--text-dark); text-decoration: underline;">alvaro@rew.cl</a><br>
                    📱 <a href="tel:+56987261127" style="color: #25d366; font-weight: 700;">+56 9 8726 1127</a>
                </p>
                <a href="{{ route('contacto') }}" class="btn btn-outline" style="width: 100%;">
                    <span>Ir al Formulario de Contacto</span>
                </a>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('landingAuditForm');
    const submitBtn = document.getElementById('landingAuditSubmitBtn');
    const resultsDiv = document.getElementById('landingAuditResults');

    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span>⏳ Analizando velocidad y métricas SEO...</span>';

        const formData = new FormData(form);

        try {
            const res = await fetch('{{ route("auditoria.analyze") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await res.json();

            if (data.success) {
                document.getElementById('resDomain').textContent = data.website_url;
                document.getElementById('resMobileScore').textContent = data.mobile_score + '/100';
                document.getElementById('resDesktopScore').textContent = data.desktop_score + '/100';

                const list = document.getElementById('resRecList');
                list.innerHTML = '';
                (data.recommendations || []).forEach(r => {
                    const li = document.createElement('li');
                    li.textContent = r;
                    list.appendChild(li);
                });

                if (data.whatsapp_url) {
                    document.getElementById('resWaBtn').href = data.whatsapp_url;
                }

                resultsDiv.style.display = 'block';
                resultsDiv.scrollIntoView({ behavior: 'smooth' });
            } else {
                alert(data.message || 'Ocurrió un error al procesar el análisis.');
            }
        } catch (err) {
            alert('No pudimos conectar con el servidor de análisis. Por favor intenta nuevamente.');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<span>⚡ Analizar Mi Sitio Web Ahora</span>';
        }
    });
});
</script>
@endpush
@endsection
