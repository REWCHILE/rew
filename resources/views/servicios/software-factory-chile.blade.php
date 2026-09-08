@extends('layouts.app')

@section('title', 'Software Factory en Chile | Desarrollo de Software | REW')
@section('meta_description', 'Software Factory en Chile para crear, modernizar y escalar productos digitales. Equipos ágiles en Laravel, React e IA. Conversemos sobre tu proyecto.')

@section('og_type', 'service')
@section('og_title', 'Software Factory en Chile | Desarrollo de Software | REW')
@section('og_description', 'Software Factory en Chile para crear, modernizar y escalar productos digitales. Equipos ágiles en Laravel, React e IA. Conversemos sobre tu proyecto.')
@section('og_image', asset('images/services/software_fabrica.webp'))

@section('content')
<!-- ==========================================================================
     HERO SECTION
     ========================================================================== -->
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%); padding-top: 4.5rem; padding-bottom: 4.5rem;">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}" style="color: var(--text-muted); text-decoration: none;">Inicio</a>
            <span style="margin: 0 8px;">/</span>
            <a href="{{ route('servicios.index') }}" style="color: var(--text-muted); text-decoration: none;">Servicios</a>
            <span style="margin: 0 8px;">/</span>
            <span style="color: var(--primary); font-weight: 700;">Software Factory Chile</span>
        </nav>

        <div class="service-hero-grid">
            <div>
                <div style="margin-bottom: 1.25rem;">
                    <span class="badge badge-pill-glow">
                        <span style="color: var(--accent-gold);">🏭</span> Software Factory • Células Ágiles • Chile
                    </span>
                </div>

                <h1 style="font-size: clamp(2.3rem, 4vw, 3.3rem); font-weight: 900; line-height: 1.15; color: var(--text-dark); margin-bottom: 1.25rem;">
                    <span class="gradient-text">Software Factory en Chile</span>: Creamos y Escalamos tus Productos Digitales
                </h1>

                <p style="font-size: 1.18rem; color: var(--text-body); line-height: 1.7; margin-bottom: 2rem;">
                    Equipos de desarrollo dedicados para construir, modernizar y escalar SaaS, plataformas web, APIs y sistemas empresariales. Trabajamos directamente con ingeniería, <strong>sin subcontratación opaca ni intermediarios comerciales</strong>.
                </p>

                <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 2.25rem;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>🚀 Cotizar Proyecto de Software</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, quiero conversar sobre contratar servicios de Software Factory y células de desarrollo para mi empresa.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 Hablar con Ingeniería</span>
                    </a>
                </div>

                <div style="display: flex; flex-direction: column; gap: 0.6rem; font-size: 0.95rem; color: var(--text-dark); font-weight: 600;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="color: #10b981; font-size: 1.1rem;">✓</span>
                        <span>Equipos de ingeniería dedicados y asignados a tu producto</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="color: #10b981; font-size: 1.1rem;">✓</span>
                        <span>Desarrollo full-stack con arquitectura limpia, escalable y código propio</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="color: #10b981; font-size: 1.1rem;">✓</span>
                        <span>Trato directo con ingeniería senior: sin ejecutivos de cuentas ni burocracia</span>
                    </div>
                </div>
            </div>

            <!-- Right Hero Card: Modalidades de Contratación -->
            <div class="card" style="padding: 2.5rem; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #ffffff; border-radius: var(--radius-xl); box-shadow: var(--shadow-2xl); border: 1px solid rgba(255,255,255,0.08);">
                <div style="font-size: 0.85rem; font-weight: 800; color: var(--accent-gold); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 0.75rem;">
                    Modelos de Trabajo Flexibles
                </div>
                <h3 style="color: #ffffff; font-size: 1.5rem; font-weight: 800; margin-bottom: 1.5rem;">
                    ¿Cómo trabajamos como Software Factory?
                </h3>
                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <div style="border-left: 3px solid var(--primary); padding-left: 1rem;">
                        <strong style="color: #ffffff; font-size: 1.05rem; display: block; margin-bottom: 0.25rem;">1. Células de Desarrollo Dedicadas</strong>
                        <span style="color: #94a3b8; font-size: 0.9rem; line-height: 1.5; display: block;">Ingenieros full-stack asignados a tu empresa con metodología Scrum/Kanban y entregas continuas en sprints de 1 a 2 semanas.</span>
                    </div>
                    <div style="border-left: 3px solid #10b981; padding-left: 1rem;">
                        <strong style="color: #ffffff; font-size: 1.05rem; display: block; margin-bottom: 0.25rem;">2. Proyecto Llave en Mano (Alcance Cerrado)</strong>
                        <span style="color: #94a3b8; font-size: 0.9rem; line-height: 1.5; display: block;">Ideal para empresas con requerimientos claros, entregables definidos, presupuesto fijo y fecha de lanzamiento comprometida.</span>
                    </div>
                    <div style="border-left: 3px solid var(--accent-gold); padding-left: 1rem;">
                        <strong style="color: #ffffff; font-size: 1.05rem; display: block; margin-bottom: 0.25rem;">3. Staff Augmentation & Soporte Crítico</strong>
                        <span style="color: #94a3b8; font-size: 0.9rem; line-height: 1.5; display: block;">Inyección inmediata de capacidad técnica senior para resolver cuellos de botella, modernizar arquitecturas legacy y escalar sistemas.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     CORE VALUE PROPOSITION: INGENIERÍA DIRECTA VS SUB-CONTRATACIÓN
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto 3.5rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Propuesta de Valor Diferencial</span>
            <h2 style="font-size: 2.3rem; color: var(--text-dark); margin-bottom: 1rem; font-weight: 800;">
                Ingeniería Directa: Cero Subcontratación Opaca ni Intermediarios
            </h2>
            <p style="color: var(--text-body); font-size: 1.1rem; line-height: 1.7;">
                Muchas fábricas de software funcionan como meras agencias comerciales: venden a precio corporativo y delegan el desarrollo a terceros o desarrolladores junior sin supervisión. En <strong>REW</strong> rompemos ese modelo.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem; align-items: stretch;">
            <!-- Card 1: Modelo Tradicional -->
            <div class="card" style="padding: 2.5rem; background: #ffffff; border: 1px solid #fed7aa; border-radius: var(--radius-xl); box-shadow: var(--shadow-md);">
                <div style="font-size: 0.85rem; font-weight: 800; color: #dc2626; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.75rem;">
                    El Riesgo Habitual
                </div>
                <h3 style="font-size: 1.35rem; color: var(--text-dark); margin-bottom: 1.25rem;">
                    Software Factory Tradicional
                </h3>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem;">
                    <li style="display: flex; gap: 10px; font-size: 0.95rem; color: var(--text-body); line-height: 1.5;">
                        <span style="color: #ef4444; font-weight: 800;">✕</span>
                        <span><strong>Intermediarios comerciales:</strong> Hablas con ejecutivos de ventas que no entienden de arquitectura técnica ni código.</span>
                    </li>
                    <li style="display: flex; gap: 10px; font-size: 0.95rem; color: var(--text-body); line-height: 1.5;">
                        <span style="color: #ef4444; font-weight: 800;">✕</span>
                        <span><strong>Subcontratación opaca:</strong> Revenden el desarrollo a terceros o juniors no declarados, triplicando tiempos de respuesta.</span>
                    </li>
                    <li style="display: flex; gap: 10px; font-size: 0.95rem; color: var(--text-body); line-height: 1.5;">
                        <span style="color: #ef4444; font-weight: 800;">✕</span>
                        <span><strong>Rotación constante de equipo:</strong> Cada mes un desarrollador diferente toma tu sistema y nadie asume responsabilidad integral.</span>
                    </li>
                    <li style="display: flex; gap: 10px; font-size: 0.95rem; color: var(--text-body); line-height: 1.5;">
                        <span style="color: #ef4444; font-weight: 800;">✕</span>
                        <span><strong>Deuda técnica y código cautivo:</strong> Software difícil de mantener, sin documentación clara y atado a su infraestructura.</span>
                    </li>
                </ul>
            </div>

            <!-- Card 2: Modelo REW -->
            <div class="card" style="padding: 2.5rem; background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%); color: #ffffff; border-radius: var(--radius-xl); box-shadow: var(--shadow-xl); border: 2px solid var(--primary);">
                <div style="font-size: 0.85rem; font-weight: 800; color: #38bdf8; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.75rem;">
                    La Ventaja REW
                </div>
                <h3 style="font-size: 1.35rem; color: #ffffff; margin-bottom: 1.25rem;">
                    Ingeniería Directa con REW
                </h3>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem;">
                    <li style="display: flex; gap: 10px; font-size: 0.95rem; color: #cbd5e1; line-height: 1.5;">
                        <span style="color: #10b981; font-weight: 800;">✓</span>
                        <span><strong style="color: #ffffff;">Trato directo con el Ingeniero:</strong> Conversas y planificas directamente con Álvaro Valenzuela Valdés y equipo senior.</span>
                    </li>
                    <li style="display: flex; gap: 10px; font-size: 0.95rem; color: #cbd5e1; line-height: 1.5;">
                        <span style="color: #10b981; font-weight: 800;">✓</span>
                        <span><strong style="color: #ffffff;">Cero subcontratación opaca:</strong> Todo el código se produce internamente con estándares profesionales de ingeniería.</span>
                    </li>
                    <li style="display: flex; gap: 10px; font-size: 0.95rem; color: #cbd5e1; line-height: 1.5;">
                        <span style="color: #10b981; font-weight: 800;">✓</span>
                        <span><strong style="color: #ffffff;">Propiedad 100% tuya:</strong> Repositorio Git, código fuente, documentación y bases de datos pertenecen por contrato a tu empresa.</span>
                    </li>
                    <li style="display: flex; gap: 10px; font-size: 0.95rem; color: #cbd5e1; line-height: 1.5;">
                        <span style="color: #10b981; font-weight: 800;">✓</span>
                        <span><strong style="color: #ffffff;">Entregas iterativas en Sprints:</strong> Demostraciones en ambientes de staging cada 1 o 2 semanas para validar avances en vivo.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     STACK TECNOLÓGICO ORGANIZADO POR CAPACIDADES FULL-STACK
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto 3.5rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Capacidad Técnica Full-Stack</span>
            <h2 style="font-size: 2.3rem; color: var(--text-dark); margin-bottom: 1rem; font-weight: 800;">
                Stack Tecnológico Organizado por Capacidades
            </h2>
            <p style="color: var(--text-body); font-size: 1.1rem; line-height: 1.7;">
                No nos encasillamos en un solo framework. Diseñamos y desarrollamos con herramientas probadas de nivel de producción según la criticidad, concurrencia y necesidades de tu empresa.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; margin-bottom: 2.5rem;">
            <!-- Pilar 1: Backend & APIs -->
            <div class="card" style="padding: 2.25rem; background: var(--bg-alt); border-radius: var(--radius-xl); border: 1px solid var(--border-light); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 1rem;">
                        <div style="font-size: 1.8rem; width: 48px; height: 48px; border-radius: 12px; background: rgba(79, 70, 229, 0.1); display: flex; align-items: center; justify-content: center;">
                            ⚙️
                        </div>
                        <div>
                            <h3 style="font-size: 1.25rem; color: var(--text-dark); margin: 0; font-weight: 800;">Backend & APIs</h3>
                            <span style="font-size: 0.82rem; color: var(--primary); font-weight: 700; text-transform: uppercase;">Alto Rendimiento</span>
                        </div>
                    </div>
                    <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin-bottom: 1.5rem;">
                        Arquitectura limpia MVC y microservicios, autenticación robusta JWT/OAuth, colas asíncronas de trabajo y endpoints diseñados para alta concurrencia.
                    </p>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Laravel (PHP 8.3)</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Node.js</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Python</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Django</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">APIs RESTful</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">GraphQL</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Redis Cache</span>
                </div>
            </div>

            <!-- Pilar 2: Frontend & UX -->
            <div class="card" style="padding: 2.25rem; background: var(--bg-alt); border-radius: var(--radius-xl); border: 1px solid var(--border-light); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 1rem;">
                        <div style="font-size: 1.8rem; width: 48px; height: 48px; border-radius: 12px; background: rgba(59, 130, 246, 0.1); display: flex; align-items: center; justify-content: center;">
                            ⚡
                        </div>
                        <div>
                            <h3 style="font-size: 1.25rem; color: var(--text-dark); margin: 0; font-weight: 800;">Frontend & Web Apps</h3>
                            <span style="font-size: 0.82rem; color: #2563eb; font-weight: 700; text-transform: uppercase;">UX Reactiva</span>
                        </div>
                    </div>
                    <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin-bottom: 1.5rem;">
                        Interfaces de usuario modernas, responsivas y optimizadas para Core Web Vitals, tiempos de carga mínimos y alta conversión visual.
                    </p>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">React</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Next.js</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Vue.js</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Tailwind CSS</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Bootstrap</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Vanilla JavaScript</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">TypeScript</span>
                </div>
            </div>

            <!-- Pilar 3: IA & Agentes -->
            <div class="card" style="padding: 2.25rem; background: var(--bg-alt); border-radius: var(--radius-xl); border: 1px solid var(--border-light); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 1rem;">
                        <div style="font-size: 1.8rem; width: 48px; height: 48px; border-radius: 12px; background: rgba(245, 158, 11, 0.1); display: flex; align-items: center; justify-content: center;">
                            🤖
                        </div>
                        <div>
                            <h3 style="font-size: 1.25rem; color: var(--text-dark); margin: 0; font-weight: 800;">IA, RAG & Agentes</h3>
                            <span style="font-size: 0.82rem; color: #d97706; font-weight: 700; text-transform: uppercase;">Automatización Cognitiva</span>
                        </div>
                    </div>
                    <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin-bottom: 1.5rem;">
                        Integración de modelos LLM conectados a datos reales de tu empresa con arquitectura RAG, bases vectoriales y agentes autónomos orientados a resultados.
                    </p>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">LLMs (OpenAI, Claude, Gemini)</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">DeepSeek & Groq</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Arquitectura RAG</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Bases Vectoriales</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Agentes de IA</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Embeddings</span>
                </div>
            </div>

            <!-- Pilar 4: Cloud & DevOps -->
            <div class="card" style="padding: 2.25rem; background: var(--bg-alt); border-radius: var(--radius-xl); border: 1px solid var(--border-light); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 1rem;">
                        <div style="font-size: 1.8rem; width: 48px; height: 48px; border-radius: 12px; background: rgba(16, 185, 129, 0.1); display: flex; align-items: center; justify-content: center;">
                            ☁️
                        </div>
                        <div>
                            <h3 style="font-size: 1.25rem; color: var(--text-dark); margin: 0; font-weight: 800;">Cloud & DevOps</h3>
                            <span style="font-size: 0.82rem; color: #059669; font-weight: 700; text-transform: uppercase;">Infraestructura Segura</span>
                        </div>
                    </div>
                    <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin-bottom: 1.5rem;">
                        Despliegues continuos sin interrupciones operativas, servidores optimizados para alta disponibilidad y resguardos automáticos de datos.
                    </p>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">MySQL & PostgreSQL</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Docker</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">AWS & DigitalOcean</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">CI/CD GitHub Actions</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Nginx & SSL</span>
                    <span class="badge" style="background: #ffffff; border: 1px solid var(--border-light); color: var(--text-dark); font-size: 0.82rem; font-weight: 700;">Backups Automatizados</span>
                </div>
            </div>
        </div>

        <!-- Banner de Flexibilidad Tecnológica -->
        <div style="background: linear-gradient(135deg, rgba(79, 70, 229, 0.06) 0%, rgba(245, 158, 11, 0.06) 100%); border: 1px solid rgba(79, 70, 229, 0.2); border-radius: var(--radius-xl); padding: 1.5rem 2rem; text-align: center;">
            <p style="margin: 0; font-size: 1.05rem; color: var(--text-dark); font-weight: 600;">
                💡 <strong>¿Tu empresa trabaja con un stack específico o sistemas preexistentes?</strong> Nos adaptamos e integramos con total flexibilidad a la tecnología, arquitectura y base de datos que tu proyecto requiera.
            </p>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SOLUCIONES Y PRODUCTOS QUE DESARROLLAMOS
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt);">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto 3.5rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Soluciones de Software</span>
            <h2 style="font-size: 2.3rem; color: var(--text-dark); margin-bottom: 1rem; font-weight: 800;">
                ¿Qué Soluciones Construye Nuestra Software Factory?
            </h2>
            <p style="color: var(--text-body); font-size: 1.1rem; line-height: 1.7;">
                Desarrollamos tecnología diseñada para integrarse con la operación real de tu negocio y resolver cuellos de botella de crecimiento.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(270px, 1fr)); gap: 2rem;">
            <div class="card" style="padding: 2.25rem; background: #ffffff; border-radius: var(--radius-xl); border: 1px solid var(--border-light);">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🚀</div>
                <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.75rem; font-weight: 800;">
                    Plataformas SaaS & Sistemas Web
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    Software as a Service con modelos multi-tenant, suscripciones recurrentes, paneles de métricas y perfiles de acceso avanzados.
                </p>
            </div>

            <div class="card" style="padding: 2.25rem; background: #ffffff; border-radius: var(--radius-xl); border: 1px solid var(--border-light);">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🏢</div>
                <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.75rem; font-weight: 800;">
                    ERPs, CRMs & Gestión Operativa
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    Sistemas a medida para digitalizar operaciones internas, inventarios, flujos de cobranza y reportería gerencial sin pagar licencias abusivas.
                </p>
            </div>

            <div class="card" style="padding: 2.25rem; background: #ffffff; border-radius: var(--radius-xl); border: 1px solid var(--border-light);">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">🔗</div>
                <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.75rem; font-weight: 800;">
                    Integraciones de APIs & Pasarelas
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    Conexión de sistemas con Webpay Plus, Mercado Pago, Bsale, Odoo, SAP y servicios logísticos con arquitectura tolerante a fallos.
                </p>
            </div>

            <div class="card" style="padding: 2.25rem; background: #ffffff; border-radius: var(--radius-xl); border: 1px solid var(--border-light);">
                <div style="font-size: 2.2rem; margin-bottom: 1rem;">👥</div>
                <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.75rem; font-weight: 800;">
                    Células Ágiles & Staff Augmentation
                </h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    Acelera tu roadmap integrando ingenieros senior a tu equipo actual sin fricciones contractuales ni tiempos largos de contratación.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     PROCESO DE TRABAJO ÁGIL (SPRINTS & ENTREGAS ITERATIVAS)
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto 3.5rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Metodología de Entrega</span>
            <h2 style="font-size: 2.3rem; color: var(--text-dark); margin-bottom: 1rem; font-weight: 800;">
                Proceso Ágil en 4 Fases Estructuradas
            </h2>
            <p style="color: var(--text-body); font-size: 1.1rem; line-height: 1.7;">
                Garantizamos visibilidad total en cada avance con entregables funcionales en ambientes de prueba desde las primeras semanas.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem;">
            <div style="background: var(--bg-alt); padding: 2rem; border-radius: var(--radius-xl); border-top: 4px solid var(--primary);">
                <div style="font-size: 1.8rem; font-weight: 900; color: var(--primary); margin-bottom: 0.75rem;">01</div>
                <h3 style="font-size: 1.2rem; color: var(--text-dark); margin-bottom: 0.5rem; font-weight: 800;">Discovery & Arquitectura</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin: 0;">
                    Definición de requerimientos técnicos, modelo de base de datos, diagrama de infraestructura y priorización del MVP.
                </p>
            </div>

            <div style="background: var(--bg-alt); padding: 2rem; border-radius: var(--radius-xl); border-top: 4px solid #10b981;">
                <div style="font-size: 1.8rem; font-weight: 900; color: #10b981; margin-bottom: 0.75rem;">02</div>
                <h3 style="font-size: 1.2rem; color: var(--text-dark); margin-bottom: 0.5rem; font-weight: 800;">Sprints Iterativos</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin: 0;">
                    Ciclos de desarrollo quincenales. Construcción de funcionalidades modulares con revisiones periódicas del cliente.
                </p>
            </div>

            <div style="background: var(--bg-alt); padding: 2rem; border-radius: var(--radius-xl); border-top: 4px solid #3b82f6;">
                <div style="font-size: 1.8rem; font-weight: 900; color: #3b82f6; margin-bottom: 0.75rem;">03</div>
                <h3 style="font-size: 1.2rem; color: var(--text-dark); margin-bottom: 0.5rem; font-weight: 800;">QA & Pruebas Rigurosas</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin: 0;">
                    Pruebas automatizadas, auditorías de seguridad, pruebas de carga y verificación en staging previo al despliegue.
                </p>
            </div>

            <div style="background: var(--bg-alt); padding: 2rem; border-radius: var(--radius-xl); border-top: 4px solid var(--accent-gold);">
                <div style="font-size: 1.8rem; font-weight: 900; color: var(--accent-gold); margin-bottom: 0.75rem;">04</div>
                <h3 style="font-size: 1.2rem; color: var(--text-dark); margin-bottom: 0.5rem; font-weight: 800;">Despliegue & Evolución</h3>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin: 0;">
                    Puesta en producción sin downtime, monitoreo de métricas, backups y acompañamiento continuo para escalar.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     PREGUNTAS FRECUENTES (FAQ INTERACTIVO)
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt);">
    <div class="container">
        <div style="text-align: center; max-width: 750px; margin: 0 auto 3rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Dudas Frecuentes</span>
            <h2 style="font-size: 2.3rem; color: var(--text-dark); margin-bottom: 1rem; font-weight: 800;">
                Preguntas Frecuentes sobre Nuestra Software Factory
            </h2>
            <p style="color: var(--text-body); font-size: 1.05rem;">
                Respuestas directas sobre propiedad intelectual, modalidades de pago y cómo gestionamos los proyectos.
            </p>
        </div>

        <div style="max-width: 860px; margin: 0 auto;">
            <div class="faq-accordion-list">
                <!-- FAQ 1 -->
                <div class="faq-card-item is-open">
                    <button type="button" class="faq-header-btn">
                        <span>¿Quién es el dueño del código fuente y la propiedad intelectual?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        Tu empresa es la dueña del 100% del código fuente, arquitectura, repositorios Git, bases de datos y propiedad intelectual. En REW no aplicamos licencias cautivas ni retención de accesos: todo el desarrollo te pertenece por contrato desde el primer sprint.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-card-item">
                    <button type="button" class="faq-header-btn">
                        <span>¿Cómo se cotiza un proyecto o célula de desarrollo en REW?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        Ofrecemos dos esquemas transparentes: para proyectos con alcance claro y cerrado (Llave en Mano), cotizamos presupuesto fijo con hitos verificables de entrega. Para células dedicadas o soporte continuo, cotizamos por sprints quincenales o mensuales según el perfil de ingeniería asignado.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-card-item">
                    <button type="button" class="faq-header-btn">
                        <span>¿Qué diferencia a REW de otras fábricas de software o freelancers?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        La ingeniería directa y el cero intermediarios: hablas y coordinas directamente con Álvaro Valenzuela Valdés (Ingeniero Informático y Fundador), sin ejecutivos de cuentas comerciales ni subcontratación oculta. Cuentas con el respaldo contractual de una empresa constituida en Chile con facturación y soporte técnico senior.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="faq-card-item">
                    <button type="button" class="faq-header-btn">
                        <span>¿Pueden intervenir, modernizar o rescatar un sistema ya existente?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        Sí. Realizamos auditorías técnicas de repositorios existentes, corrección de deuda técnica, optimización de consultas en base de datos y migración de versiones legacy (por ejemplo, PHP antiguo a PHP 8.3/Laravel o frontends obsoletos a React/Tailwind).
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="faq-card-item">
                    <button type="button" class="faq-header-btn">
                        <span>¿Cómo iniciamos el trabajo en conjunto?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        El primer paso es agendar una sesión de diagnóstico de 30 minutos (vía videollamada o WhatsApp) con Álvaro Valenzuela Valdés para entender tus requerimientos y restricciones. En un plazo de 24 a 48 horas hábiles te entregamos una propuesta técnica y económica formal.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     DIRECT CONTACT & LEADERSHIP SECTION
     ========================================================================== -->
<section class="section" style="background: #ffffff; border-top: 1px solid var(--border-light);">
    <div class="container">
        <div class="grid-2col-cta" style="align-items: center;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 1rem;">Liderazgo Técnico Senior</span>
                <h2 style="font-size: 2.4rem; color: var(--text-dark); margin-bottom: 1.25rem; line-height: 1.2; font-weight: 800;">
                    ¿Tienes un desafío de software en mente? Conversemos 🚀
                </h2>
                <p style="color: var(--text-body); font-size: 1.12rem; line-height: 1.7; margin-bottom: 1.75rem;">
                    Agenda una videollamada técnica directa con <strong>Álvaro Valenzuela Valdés</strong>. Analizaremos tu arquitectura requerida, plazos y elaboraremos una propuesta técnica y económica adaptada a tus objetivos de negocio.
                </p>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>📋 Solicitar Propuesta Técnica</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, quiero conversar sobre un desarrollo de software y células ágiles para mi empresa.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 WhatsApp Directo</span>
                    </a>
                </div>
            </div>

            <div style="background: var(--bg-alt); border: 1px solid var(--border-light); border-radius: var(--radius-xl); padding: 2.5rem; text-align: center; box-shadow: var(--shadow-lg);">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, var(--primary) 0%, #312e81 100%); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 1.25rem; font-weight: 800; box-shadow: 0 8px 20px rgba(79, 70, 229, 0.25);">
                    AV
                </div>
                <h3 style="color: var(--text-dark); font-size: 1.35rem; margin-bottom: 0.35rem; font-weight: 800;">Álvaro Valenzuela Valdés</h3>
                <div style="color: var(--primary); font-size: 0.92rem; font-weight: 700; margin-bottom: 1.25rem;">Ingeniero Informático & Fundador de REW</div>
                <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin-bottom: 1.5rem;">
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

<!-- ==========================================================================
     SCHEMA JSON-LD STRUCTURED DATA (SERVICE + FAQPAGE)
     ========================================================================== -->
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Service",
      "@id": "https://rew.cl/servicios/software-factory-chile#service",
      "name": "Software Factory en Chile",
      "serviceType": "Fábrica de Software, Células de Desarrollo Ágil y Staff Augmentation",
      "provider": {
        "@type": "ProfessionalService",
        "name": "REW",
        "url": "https://rew.cl",
        "telephone": "+56987261127",
        "email": "alvaro@rew.cl",
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
          "jobTitle": "Ingeniero Informático"
        }
      },
      "areaServed": "CL",
      "description": "Software Factory en Chile para crear, modernizar y escalar productos digitales con equipos ágiles especializados en Laravel, React, Node.js, Python e Inteligencia Artificial.",
      "offers": {
        "@type": "Offer",
        "availability": "https://schema.org/InStock"
      }
    },
    {
      "@type": "FAQPage",
      "@id": "https://rew.cl/servicios/software-factory-chile#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "¿Quién es el dueño del código fuente y la propiedad intelectual?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Tu empresa es la dueña del 100% del código fuente, arquitectura, repositorios Git, bases de datos y propiedad intelectual. En REW no aplicamos licencias cautivas ni retención de accesos."
          }
        },
        {
          "@type": "Question",
          "name": "¿Cómo se cotiza un proyecto o célula de desarrollo en REW?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Ofrecemos dos esquemas transparentes: presupuesto fijo para proyectos con alcance cerrado (Llave en Mano), y cotización por sprints quincenales o mensuales para células dedicadas o soporte crítico."
          }
        },
        {
          "@type": "Question",
          "name": "¿Qué diferencia a REW de otras fábricas de software o freelancers?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "El trato directo con ingeniería senior, la ausencia total de subcontratación opaca y la solidez contractual de una empresa legalmente constituida en Chile con facturación y soporte técnico senior."
          }
        },
        {
          "@type": "Question",
          "name": "¿Pueden intervenir, modernizar o rescatar un sistema ya existente?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Sí. Realizamos auditorías técnicas de repositorios existentes, corrección de deuda técnica, optimización de consultas en base de datos y migración de versiones legacy."
          }
        },
        {
          "@type": "Question",
          "name": "¿Cómo iniciamos el trabajo en conjunto?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "El primer paso es agendar una sesión de diagnóstico de 30 minutos con Álvaro Valenzuela Valdés para entender tus requerimientos y restricciones. En un plazo de 24 a 48 horas hábiles te entregamos una propuesta detallada."
          }
        }
      ]
    }
  ]
}
</script>
@endverbatim
@endsection

