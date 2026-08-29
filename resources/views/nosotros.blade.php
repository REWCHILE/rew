@extends('layouts.app')

@section('title', 'Nosotros | Álvaro Valenzuela Valdés & REW Chile')
@section('meta_description', 'Conoce la historia, visión y metodología de REW y su fundador Álvaro Valenzuela Valdés, Ingeniero Informático y especialista en desarrollo de software e inbound marketing.')

@section('og_title', 'Nosotros | Álvaro Valenzuela Valdés & REW Chile')
@section('og_description', 'Ingeniería de software a medida, desarrollo web y estrategias de inbound marketing para impulsar los objetivos clave de tu empresa.')
@section('og_image', asset('images/logo.webp'))

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%);">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto 4rem; text-align: center;">
            <span class="badge badge-pill-glow" style="margin-bottom: 1rem;">Perfil Profesional & Filosofía</span>
            <h1 style="font-size: 3rem; margin-bottom: 1.5rem;">Innovación, Código & Estrategia Digital</h1>
            <p style="font-size: 1.2rem; color: var(--text-body); line-height: 1.6;">
                En <strong>REW</strong> combinamos la precisión de la ingeniería de software con la visión estratégica del inbound marketing para construir plataformas que venden y perduran.
            </p>
        </div>

        <!-- Founder Profile Card -->
        <div class="card" style="margin-bottom: 4rem; border-color: rgba(79, 70, 229, 0.2); box-shadow: var(--shadow-xl);">
            <div style="display: grid; grid-template-columns: 300px 1fr; gap: 3rem; align-items: center;">
                <div style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); border-radius: var(--radius-lg); padding: 2rem; text-align: center; color: #ffffff;">
                    <div style="font-size: 4.5rem; margin-bottom: 1rem;">👨‍💻</div>
                    <h3 style="color: #ffffff; font-size: 1.4rem; margin-bottom: 0.25rem;">Álvaro Valenzuela Valdés</h3>
                    <div style="color: var(--accent-gold); font-size: 0.9rem; font-weight: 700; margin-bottom: 1.25rem;">Ingeniero Informático</div>
                    <div style="font-size: 0.85rem; color: #cbd5e1; line-height: 1.5; margin-bottom: 1.5rem;">
                        Especialista en Arquitectura Web, IA Conversacional (RAG) e Inbound Marketing.
                    </div>
                    <a href="https://api.whatsapp.com/send?phone=56987261127" target="_blank" rel="noopener" class="btn btn-whatsapp btn-sm" style="width: 100%;">
                        <span>+56 9 8726 1127</span>
                    </a>
                </div>

                <div>
                    <h2 style="font-size: 2rem; margin-bottom: 1.25rem;">Más que una agencia: tu socio tecnológico estratégico</h2>
                    <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.25rem;">
                        "Mi nombre es <strong>Álvaro Valenzuela Valdés</strong>. Como <strong>Ingeniero Informático</strong>, me dedico apasionadamente al desarrollo de software y a la creación de estrategias de <strong>inbound marketing</strong> para ayudar a mis clientes a potenciar y conquistar los objetivos principales de sus negocios."
                    </p>
                    <p style="color: var(--text-muted); font-size: 1rem; line-height: 1.7; margin-bottom: 1.5rem;">
                        Entendemos que un sitio web o un software no debe ser solo visualmente impactante, sino una máquina perfectamente sincronizada con los motores de búsqueda (Google y motores de IA) que resuelva necesidades reales, reduzca la fricción de los clientes y maximice la rentabilidad.
                    </p>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1rem;">
                        <div style="background: var(--bg-alt); padding: 1rem; border-radius: 10px; border: 1px solid var(--border-light);">
                            <div style="font-weight: 800; font-size: 1.1rem; color: var(--primary);">Desarrollo Laravel</div>
                            <div style="font-size: 0.82rem; color: var(--text-muted);">SaaS, APIs y ERPs a medida</div>
                        </div>
                        <div style="background: var(--bg-alt); padding: 1rem; border-radius: 10px; border: 1px solid var(--border-light);">
                            <div style="font-weight: 800; font-size: 1.1rem; color: var(--accent-gold);">Inteligencia Artificial</div>
                            <div style="font-size: 0.82rem; color: var(--text-muted);">Chatbots RAG sin alucinaciones</div>
                        </div>
                        <div style="background: var(--bg-alt); padding: 1rem; border-radius: 10px; border: 1px solid var(--border-light);">
                            <div style="font-weight: 800; font-size: 1.1rem; color: var(--accent-emerald);">SEO & Inbound</div>
                            <div style="font-size: 0.82rem; color: var(--text-muted);">Posicionamiento transaccional</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Metodología de Trabajo -->
        <div style="text-align: center; max-width: 700px; margin: 0 auto 3rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.5rem;">Nuestra Metodología</span>
            <h2 style="font-size: 2.2rem;">Cómo Trabajamos en REW</h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem; margin-bottom: 4rem;">
            <div class="card">
                <div style="font-size: 2rem; margin-bottom: 1rem; color: var(--primary); font-weight: 900;">01</div>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Descubrimiento Profundo</h3>
                <p style="font-size: 0.9rem; color: var(--text-muted);">Analizamos tu industria, competencia, clientes y puntos de fricción para diseñar una propuesta con retorno claro.</p>
            </div>
            <div class="card">
                <div style="font-size: 2rem; margin-bottom: 1rem; color: var(--primary); font-weight: 900;">02</div>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Arquitectura & UX/UI</h3>
                <p style="font-size: 0.9rem; color: var(--text-muted);">Creamos prototipos en Figma y diseñamos la base de datos para garantizar escalabilidad y máxima usabilidad.</p>
            </div>
            <div class="card">
                <div style="font-size: 2rem; margin-bottom: 1rem; color: var(--primary); font-weight: 900;">03</div>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Desarrollo Ágil</h3>
                <p style="font-size: 0.9rem; color: var(--text-muted);">Programación en sprints con entregas constantes, pruebas de rendimiento y optimización de velocidad.</p>
            </div>
            <div class="card">
                <div style="font-size: 2rem; margin-bottom: 1rem; color: var(--primary); font-weight: 900;">04</div>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Lanzamiento & Crecimiento</h3>
                <p style="font-size: 0.9rem; color: var(--text-muted);">Despliegue en servidores optimizados, monitoreo continuo y campañas inbound para traccionar clientes.</p>
            </div>
        </div>

        <!-- CTA Box -->
        <div class="card" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #ffffff; text-align: center; padding: 3.5rem 2rem;">
            <h2 style="color: #ffffff; font-size: 2.2rem; margin-bottom: 1rem;">¿Listo para iniciar tu próximo gran proyecto?</h2>
            <p style="color: #cbd5e1; font-size: 1.1rem; max-width: 600px; margin: 0 auto 2rem;">
                Agenda una consulta directa con Álvaro Valenzuela o solicita tu cotización en línea.
            </p>
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <a href="{{ route('contacto') }}" class="btn btn-gold btn-lg">Cotizar Proyecto</a>
                <a href="https://api.whatsapp.com/send?phone=56987261127" target="_blank" rel="noopener" class="btn btn-whatsapp btn-lg">Conversar por WhatsApp</a>
            </div>
        </div>
    </div>
</section>
@endsection
