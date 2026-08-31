@extends('layouts.app')

@section('title', '⚡ Software Factory en Chile: Células Ágiles & Desarrollo a Medida | REW')
@section('meta_description', '🛠️ Células de desarrollo ágil en Laravel, PHP 8.3, APIs y microservicios con entregas por sprints y trato directo con ingenieros.')

@section('og_type', 'service')
@section('og_title', '⚡ Software Factory en Chile: Células Ágiles & Desarrollo a Medida | REW')
@section('og_description', '🛠️ Externaliza tu desarrollo tecnológico con ingenieros expertos en Laravel, arquitectura cloud y plataformas de alta demanda en Chile.')
@section('og_image', asset('images/services/software_fabrica.webp'))

@section('content')
<!-- Hero Section -->
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%); padding-top: 5rem; padding-bottom: 4rem;">
    <div class="container">
        <!-- Breadcrumb -->
        <div style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}">Inicio</a> &nbsp;/&nbsp;
            <a href="{{ route('servicios.index') }}">Servicios</a> &nbsp;/&nbsp;
            <span style="color: var(--text-dark); font-weight: 600;">Software Factory Chile</span>
        </div>

        <div class="service-hero-grid">
            <div>
                <span class="badge badge-primary" style="margin-bottom: 1rem;">Ingeniería de Software & Células Ágiles</span>
                <h1 style="font-size: 3.2rem; margin-bottom: 1.25rem; line-height: 1.15; color: var(--text-dark);">
                    <span class="gradient-text">Software Factory</span> en Chile con Código Propio y Escalable 🏭⚡
                </h1>
                <p style="font-size: 1.2rem; color: var(--text-body); line-height: 1.65; margin-bottom: 2rem;">
                    Desarrollamos soluciones tecnológicas robustas para empresas que no pueden permitirse fallas ni dependencias frágiles. En <strong>REW</strong> construimos sistemas SaaS, CRMs, plataformas web a medida y APIs de alto rendimiento con arquitectura limpia y soporte directo de ingeniería.
                </p>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 2.5rem;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>🚀 Cotizar Proyecto de Software</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, busco contratar servicios de Software Factory y desarrollo a medida para mi empresa.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 Hablar por WhatsApp</span>
                    </a>
                </div>
                <div style="display: flex; gap: 1.5rem; flex-wrap: wrap; font-size: 0.9rem; color: var(--text-muted);">
                    <div>✓ Laravel & PHP 8.3 de Alto Rendimiento</div>
                    <div>✓ Cero Subcontratación Opaca</div>
                    <div>✓ Entregas Iterativas en Sprints</div>
                </div>
            </div>

            <div class="card" style="padding: 2.5rem; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #ffffff; border-radius: var(--radius-xl); box-shadow: var(--shadow-2xl);">
                <div style="font-size: 0.85rem; font-weight: 800; color: var(--accent-gold); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.75rem;">
                    Modalidades de Contratación
                </div>
                <h3 style="color: #ffffff; font-size: 1.4rem; margin-bottom: 1.25rem;">
                    ¿Cómo trabajamos como Software Factory?
                </h3>
                <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                    <div>
                        <strong style="color: #ffffff; font-size: 1rem; display: block;">1. Proyecto Llave en Mano (Alcance Cerrado)</strong>
                        <span style="color: #94a3b8; font-size: 0.88rem;">Ideal para startups y empresas con requerimientos claros, presupuesto definido y fecha límite de lanzamiento.</span>
                    </div>
                    <div>
                        <strong style="color: #ffffff; font-size: 1rem; display: block;">2. Célula de Desarrollo Dedicada</strong>
                        <span style="color: #94a3b8; font-size: 0.88rem;">Ingenieros full stack asignados a tu producto para iterar rápidamente con metodología Scrum/Kanban.</span>
                    </div>
                    <div>
                        <strong style="color: #ffffff; font-size: 1rem; display: block;">3. Staff Augmentation & Soporte Crítico</strong>
                        <span style="color: #94a3b8; font-size: 0.88rem;">Refuerzo de ingeniería senior para resolver cuellos de botella técnicos, migraciones y escalabilidad.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stack Tecnológico -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div style="text-align: center; max-width: 750px; margin: 0 auto 3.5rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Tecnología de Vanguardia</span>
            <h2 style="font-size: 2.4rem; color: var(--text-dark); margin-bottom: 1rem;">Stack Tecnológico de Nuestra Fábrica de Software</h2>
            <p style="color: var(--text-body); font-size: 1.1rem;">Seleccionamos herramientas probadas en la industria para garantizar velocidad, mantenibilidad y seguridad a largo plazo.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
            <div class="card" style="padding: 2rem;">
                <div style="font-size: 2rem; margin-bottom: 0.75rem;">🐘</div>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Backend: Laravel & PHP 8.3</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6;">
                    Arquitectura MVC limpia, colas asíncronas Redis, autenticación robusta y APIs RESTful de alto rendimiento.
                </p>
            </div>

            <div class="card" style="padding: 2rem;">
                <div style="font-size: 2rem; margin-bottom: 0.75rem;">⚡</div>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Frontend: React, Vue & Tailwind</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6;">
                    Interfaces de usuario modernas, responsivas y ultra rápidas orientadas a la mejor experiencia del usuario (UX).
                </p>
            </div>

            <div class="card" style="padding: 2rem;">
                <div style="font-size: 2rem; margin-bottom: 0.75rem;">🤖</div>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Inteligencia Artificial & RAG</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6;">
                    Integración de modelos LLM (OpenAI, Claude, Gemini, DeepSeek, Groq) conectados a bases de datos vectoriales propias.
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
                <span class="badge badge-gold" style="margin-bottom: 1rem;">Liderazgo Técnico Senior</span>
                <h2 style="font-size: 2.4rem; color: var(--text-dark); margin-bottom: 1.25rem; line-height: 1.2;">
                    ¿Tienes un desafío de software en mente? 🚀
                </h2>
                <p style="color: var(--text-body); font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.75rem;">
                    Agenda una videollamada directa con <strong>Álvaro Valenzuela Valdés</strong>. Analizaremos tu arquitectura requerida y elaboraremos una propuesta técnica y económica adaptada a tus objetivos.
                </p>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>📋 Solicitar Propuesta Técnica</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, quiero conversar sobre un desarrollo de software a medida para mi empresa.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 WhatsApp Directo</span>
                    </a>
                </div>
            </div>

            <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-xl); padding: 2.25rem; text-align: center; box-shadow: var(--shadow-lg);">
                <h3 style="color: var(--text-dark); font-size: 1.35rem; margin-bottom: 0.5rem;">Álvaro Valenzuela Valdés</h3>
                <div style="color: var(--primary); font-size: 0.9rem; font-weight: 700; margin-bottom: 1.25rem;">Ingeniero Informático & Fundador de REW</div>
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

<!-- Schema JSON-LD Structured Data for Software Factory -->
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Service",
      "@id": "https://rew.cl/servicios/software-factory-chile#service",
      "name": "Software Factory en Chile",
      "serviceType": "Fábrica de Software y Desarrollo a Medida",
      "provider": {
        "@type": "ProfessionalService",
        "name": "REW",
        "url": "https://rew.cl",
        "telephone": "+56987261127",
        "email": "alvaro@rew.cl"
      },
      "areaServed": "CL",
      "description": "Fábrica de software y células de desarrollo ágil en Laravel, PHP 8.3, React y arquitectura cloud en Chile."
    }
  ]
}
</script>
@endverbatim
@endsection
