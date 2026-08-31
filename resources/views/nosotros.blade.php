@extends('layouts.app')

@section('title', 'Nosotros | Álvaro Valenzuela Valdés & REW Chile')
@section('meta_description', 'Conoce la historia, visión y metodología de REW y su fundador Álvaro Valenzuela Valdés, Ingeniero Informático, especialista en desarrollo de software, IA y estrategias de Inbound Marketing.')

@section('og_title', 'Nosotros | Álvaro Valenzuela Valdés & REW Chile')
@section('og_description', 'Ingeniería de software a medida, desarrollo web, plataformas LMS, IA con agentes autónomos y estrategias de inbound marketing.')
@section('og_image', asset('images/logo.webp'))

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%);">
    <div class="container">
        <div style="max-width: 850px; margin: 0 auto 3.5rem; text-align: center;">
            <span class="badge badge-pill-glow" style="margin-bottom: 1rem;">Perfil Profesional & Filosofía</span>
            <h1 style="font-size: 3rem; margin-bottom: 1.25rem; line-height: 1.15;">Innovación, Código & Estrategia Digital</h1>
            <p style="font-size: 1.15rem; color: var(--text-body); line-height: 1.6;">
                En <strong>REW</strong> combinamos la precisión de la ingeniería de software con la visión estratégica del inbound marketing para construir plataformas que venden, escalan y perduran.
            </p>
        </div>

        <!-- Founder Profile Card -->
        <div class="card" style="margin-bottom: 4rem; border-color: rgba(79, 70, 229, 0.2); box-shadow: var(--shadow-xl);">
            <div class="grid-2col-profile">
                <!-- Left: Profile Badge -->
                <div style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); border-radius: var(--radius-lg); padding: 2.25rem 2rem; text-align: center; color: #ffffff; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <x-founder-animated-avatar />

                        <h3 style="color: #ffffff; font-size: 1.45rem; margin-bottom: 0.25rem; font-weight: 800; letter-spacing: -0.01em;">Álvaro Valenzuela Valdés</h3>
                        <div style="color: var(--accent-gold); font-size: 0.92rem; font-weight: 700; margin-bottom: 1rem;">Ingeniero Informático & Fundador</div>
                        <p style="font-size: 0.85rem; color: #cbd5e1; line-height: 1.55; margin-bottom: 1.5rem;">
                            Especialista en Ingeniería de Software, Inteligencia Artificial, E-Commerce, Sistemas LMS e Inbound Marketing Estratégico.
                        </p>
                    </div>

                    <!-- Sleek Direct Action Buttons -->
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <a href="https://www.linkedin.com/in/%C3%A1lvaro-valenzuela-vald%C3%A9s-584065281/" target="_blank" rel="noopener noreferrer" 
                           style="display: flex; align-items: center; justify-content: center; gap: 8px; background: #0a66c2; color: #ffffff; padding: 0.7rem 1.25rem; border-radius: 8px; font-weight: 700; text-decoration: none; font-size: 0.9rem; transition: all 0.2s ease; box-shadow: 0 4px 14px rgba(10, 102, 194, 0.4); border: 1px solid rgba(255,255,255,0.15);">
                            <svg style="width: 18px; height: 18px; fill: currentColor; flex-shrink: 0;" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                            <span>Conectar en LinkedIn</span>
                        </a>

                        <a href="https://api.whatsapp.com/send?phone=56987261127" target="_blank" rel="noopener noreferrer" 
                           style="display: flex; align-items: center; justify-content: center; gap: 8px; background: #25d366; color: #ffffff; padding: 0.7rem 1.25rem; border-radius: 8px; font-weight: 700; text-decoration: none; font-size: 0.9rem; transition: all 0.2s ease; box-shadow: 0 4px 14px rgba(37, 211, 102, 0.4); border: 1px solid rgba(255,255,255,0.15);">
                            <svg style="width: 18px; height: 18px; fill: currentColor; flex-shrink: 0;" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                            <span>WhatsApp Directo</span>
                        </a>
                    </div>
                </div>

                <!-- Right: Bio & Full Expertise -->
                <div>
                    <h2 style="font-size: 2rem; margin-bottom: 1.25rem; line-height: 1.25;">Más que una agencia: tu socio tecnológico y de crecimiento</h2>
                    <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.25rem;">
                        "Mi nombre es <strong>Álvaro Valenzuela Valdés</strong>. Como <strong>Ingeniero Informático</strong>, me dedico apasionadamente al desarrollo de soluciones tecnológicas de alto impacto y a la creación de estrategias de <strong>inbound marketing</strong> para posicionar a las empresas, conectar con sus audiencias y acelerar sus ventas."
                    </p>
                    <p style="color: var(--text-muted); font-size: 0.98rem; line-height: 1.7; margin-bottom: 1.75rem;">
                        Contamos con un abanico integral de servicios especializados para cada etapa del ciclo de vida digital de tu negocio:
                    </p>

                    <!-- Core Areas Grid (7 Specific Areas with Clean Symmetry) -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem;">
                        <!-- 1. Inbound Marketing -->
                        <div style="background: var(--bg-alt); padding: 1.1rem; border-radius: 10px; border: 1px solid var(--border-light);">
                            <div style="font-weight: 800; font-size: 1.02rem; color: var(--primary); margin-bottom: 4px; display: flex; align-items: center; gap: 6px;">
                                <span>🚀</span> <span>Inbound Marketing</span>
                            </div>
                            <div style="font-size: 0.82rem; color: var(--text-muted);">Estudios de mercado y embudos de atracción que convierten visitas en clientes.</div>
                        </div>

                        <!-- 2. Gestión de Redes Sociales -->
                        <div style="background: var(--bg-alt); padding: 1.1rem; border-radius: 10px; border: 1px solid var(--border-light);">
                            <div style="font-weight: 800; font-size: 1.02rem; color: #8b5cf6; margin-bottom: 4px; display: flex; align-items: center; gap: 6px;">
                                <span>📱</span> <span>Gestión de Redes Sociales</span>
                            </div>
                            <div style="font-size: 0.82rem; color: var(--text-muted);">Estrategia de contenidos, diseño y publicaciones coherentes con tu marca.</div>
                        </div>

                        <!-- 3. Desarrollo de Software -->
                        <div style="background: var(--bg-alt); padding: 1.1rem; border-radius: 10px; border: 1px solid var(--border-light);">
                            <div style="font-weight: 800; font-size: 1.02rem; color: var(--accent-gold); margin-bottom: 4px; display: flex; align-items: center; gap: 6px;">
                                <span>💻</span> <span>Desarrollo de Software</span>
                            </div>
                            <div style="font-size: 0.82rem; color: var(--text-muted);">Plataformas SaaS, arquitecturas a medida, APIs y sistemas empresariales.</div>
                        </div>

                        <!-- 4. Desarrollo de E-Commerce y LMS -->
                        <div style="background: var(--bg-alt); padding: 1.1rem; border-radius: 10px; border: 1px solid var(--border-light);">
                            <div style="font-weight: 800; font-size: 1.02rem; color: var(--accent-emerald); margin-bottom: 4px; display: flex; align-items: center; gap: 6px;">
                                <span>🛒</span> <span>Desarrollo de E-Commerce y LMS</span>
                            </div>
                            <div style="font-size: 0.82rem; color: var(--text-muted);">Tiendas online con Webpay y plataformas de cursos y academias online.</div>
                        </div>

                        <!-- 5. Seguridad y Desinfección de Sitios Web -->
                        <div style="background: var(--bg-alt); padding: 1.1rem; border-radius: 10px; border: 1px solid var(--border-light);">
                            <div style="font-weight: 800; font-size: 1.02rem; color: #dc2626; margin-bottom: 4px; display: flex; align-items: center; gap: 6px;">
                                <span>🛡️</span> <span>Seguridad y Desinfección de Sitios Web</span>
                            </div>
                            <div style="font-size: 0.82rem; color: var(--text-muted);">Limpieza profunda de malware, recuperación de caídas y blindaje técnico.</div>
                        </div>

                        <!-- 6. Desarrollo WordPress -->
                        <div style="background: var(--bg-alt); padding: 1.1rem; border-radius: 10px; border: 1px solid var(--border-light);">
                            <div style="font-weight: 800; font-size: 1.02rem; color: #0284c7; margin-bottom: 4px; display: flex; align-items: center; gap: 6px;">
                                <span>⚙️</span> <span>Desarrollo WordPress</span>
                            </div>
                            <div style="font-size: 0.82rem; color: var(--text-muted);">Desarrollo de plugins a medida, sitios corporativos y optimización de velocidad.</div>
                        </div>

                        <!-- 7. SEO -->
                        <div style="background: var(--bg-alt); padding: 1.1rem; border-radius: 10px; border: 1px solid var(--border-light); grid-column: 1 / -1;">
                            <div style="font-weight: 800; font-size: 1.02rem; color: #059669; margin-bottom: 4px; display: flex; align-items: center; gap: 6px;">
                                <span>📈</span> <span>SEO (Posicionamiento en Motores de Búsqueda)</span>
                            </div>
                            <div style="font-size: 0.82rem; color: var(--text-muted);">Optimización técnica on-page, SEO transaccional, GEO y visibilidad destacada en los primeros resultados de Google.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- AMD AI Hackathon Showcase: AndesOps-AI -->
        <div class="card" style="background: linear-gradient(135deg, #090d16 0%, #111827 50%, #1e1b4b 100%); color: #ffffff; padding: 3rem; margin-top: 4.5rem; margin-bottom: 4.5rem; border: 1px solid rgba(99, 102, 241, 0.35); box-shadow: 0 20px 40px -15px rgba(0,0,0,0.5); border-radius: 24px;">
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-start; gap: 1.5rem; margin-bottom: 2rem;">
                <div style="max-width: 700px;">
                    <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 0.75rem;">
                        <span class="badge" style="background: linear-gradient(135deg, #ef4444 0%, #b91c1c 100%); color: #ffffff; font-weight: 800; font-size: 0.8rem; padding: 4px 12px; border-radius: 6px;">
                            🏆 AMD AI Hackathon (LabLab.ai)
                        </span>
                        <span class="badge" style="background: rgba(255, 200, 0, 0.2); color: #fef08a; border: 1px solid rgba(255, 200, 0, 0.4); font-size: 0.8rem; padding: 4px 12px; border-radius: 6px;">
                            🤗 Hugging Face Space Activo
                        </span>
                    </div>
                    <h2 style="color: #ffffff; font-size: 2.3rem; margin-bottom: 0.75rem; line-height: 1.2;">
                        AndesOps-AI: Inteligencia Artificial para Licitaciones Públicas
                    </h2>
                    <p style="color: #cbd5e1; font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.25rem;">
                        Software de vanguardia desarrollado por <strong>Álvaro Valenzuela Valdés (REW Chile)</strong> para la hackatón global de <strong>AMD y LabLab.ai</strong>. AndesOps-AI utiliza agentes autónomos de Inteligencia Artificial para rastrear, analizar y predecir oportunidades en licitaciones del Estado de Chile (Mercado Público), evaluando tendencias de mercado y redactando esquemas de propuestas técnicas en minutos.
                    </p>
                    <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                        <span class="tech-tag" style="background: rgba(255,255,255,0.1); color: #e2e8f0; border-color: rgba(255,255,255,0.2);">AMD ROCm AI</span>
                        <span class="tech-tag" style="background: rgba(255,255,255,0.1); color: #e2e8f0; border-color: rgba(255,255,255,0.2);">Python & PyTorch</span>
                        <span class="tech-tag" style="background: rgba(255,255,255,0.1); color: #e2e8f0; border-color: rgba(255,255,255,0.2);">Agentes Autónomos LLM</span>
                        <span class="tech-tag" style="background: rgba(255,255,255,0.1); color: #e2e8f0; border-color: rgba(255,255,255,0.2);">Mercado Público API</span>
                        <span class="tech-tag" style="background: rgba(255,255,255,0.1); color: #e2e8f0; border-color: rgba(255,255,255,0.2);">FastAPI & Gradio</span>
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 10px; min-width: 220px;">
                    <a href="https://huggingface.co/spaces/REWCHILE/AndesOps-AI" target="_blank" rel="noopener noreferrer" 
                       class="btn btn-gold btn-lg" style="text-align: center; font-size: 0.95rem; font-weight: 800; box-shadow: 0 4px 15px rgba(234, 179, 8, 0.4);">
                        <span>🚀 Probar AndesOps-AI ↗</span>
                    </a>
                    <a href="https://huggingface.co/REWCHILE" target="_blank" rel="noopener noreferrer" 
                       class="btn btn-outline" style="text-align: center; font-size: 0.85rem; border-color: rgba(255,255,255,0.3); color: #ffffff;">
                        <span>Ver Perfil Hugging Face 🤗</span>
                    </a>
                </div>
            </div>

            <!-- Interactive Embed / Preview Container -->
            <div style="background: #000000; border-radius: 12px; border: 1px solid rgba(255,255,255,0.15); overflow: hidden; position: relative;">
                <div style="background: #1f2937; padding: 10px 16px; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid rgba(255,255,255,0.1);">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background: #ef4444;"></span>
                        <span style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background: #eab308;"></span>
                        <span style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background: #22c55e;"></span>
                        <span style="font-size: 0.8rem; color: #9ca3af; margin-left: 8px; font-family: monospace;">huggingface.co/spaces/REWCHILE/AndesOps-AI</span>
                    </div>
                    <span style="font-size: 0.75rem; color: #4ade80; font-weight: 700;">● Live Container</span>
                </div>
                <div style="height: 520px; width: 100%; position: relative; background: #0b0f19;">
                    <iframe src="https://rewchile-andesops-ai.hf.space" 
                            frameborder="0" 
                            width="100%" 
                            height="100%" 
                            style="border: none; display: block;" 
                            loading="lazy" 
                            allow="accelerometer; ambient-light-sensor; camera; encrypted-media; geolocation; gyroscope; hid; microphone; midi; payment; usb; vr; xr-spatial-tracking" 
                            sandbox="allow-forms allow-modals allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-downloads">
                    </iframe>
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
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Descubrimiento & Estudio de Mercado</h3>
                <p style="font-size: 0.9rem; color: var(--text-muted);">Analizamos tu industria, competencia, clientes y puntos de fricción para diseñar una propuesta con retorno claro.</p>
            </div>
            <div class="card">
                <div style="font-size: 2rem; margin-bottom: 1rem; color: var(--primary); font-weight: 900;">02</div>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Arquitectura & UX/UI</h3>
                <p style="font-size: 0.9rem; color: var(--text-muted);">Creamos prototipos en Figma y diseñamos la base de datos para garantizar escalabilidad y máxima usabilidad.</p>
            </div>
            <div class="card">
                <div style="font-size: 2rem; margin-bottom: 1rem; color: var(--primary); font-weight: 900;">03</div>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Desarrollo Ágil & Seguridad</h3>
                <p style="font-size: 0.9rem; color: var(--text-muted);">Programación en sprints con entregas constantes, pruebas de rendimiento, desinfección y blindaje de código.</p>
            </div>
            <div class="card">
                <div style="font-size: 2rem; margin-bottom: 1rem; color: var(--primary); font-weight: 900;">04</div>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.5rem;">Lanzamiento & Inbound Growth</h3>
                <p style="font-size: 0.9rem; color: var(--text-muted);">Despliegue en servidores optimizados, monitoreo continuo y campañas inbound para traccionar clientes.</p>
            </div>
        </div>

        <!-- Carousel: Últimos Sitios Web Desarrollados por Álvaro Valenzuela (Portafolio Reciente) -->
        <div style="margin-top: 1rem; margin-bottom: 3.5rem;">
            <div style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 1rem; margin-bottom: 2rem;">
                <div>
                    <span class="badge badge-primary" style="margin-bottom: 0.5rem;">Portafolio Reciente</span>
                    <h2 style="font-size: 2.2rem; margin: 0; line-height: 1.2;">Últimos Sitios Web & Software Desarrollados</h2>
                    <p style="color: var(--text-muted); font-size: 1rem; margin-top: 0.5rem; margin-bottom: 0;">
                        Proyectos reales desarrollados por <strong>Álvaro Valenzuela Valdés</strong> en Laravel, PHP 8, WordPress, E-Commerce e Inteligencia Artificial.
                    </p>
                </div>

                <!-- Carousel Navigation Controls -->
                <div style="display: flex; gap: 10px; align-items: center;">
                    <button type="button" id="nosotrosCarouselPrev" class="btn btn-outline" style="width: 44px; height: 44px; padding: 0; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; cursor: pointer;" title="Anterior">
                        ❮
                    </button>
                    <button type="button" id="nosotrosCarouselNext" class="btn btn-outline" style="width: 44px; height: 44px; padding: 0; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; cursor: pointer;" title="Siguiente">
                        ❯
                    </button>
                    <a href="{{ route('portafolio.index') }}" class="btn btn-gold btn-sm" style="margin-left: 8px;">
                        <span>Ver Portafolio Completo ➔</span>
                    </a>
                </div>
            </div>

            <!-- Carousel Viewport & Track -->
            @php
                $carouselProjects = ($recentProjects ?? \App\Models\PortfolioProject::orderBy('order', 'asc')->get());
            @endphp

            <div class="nosotros-carousel-wrapper" style="position: relative; overflow: hidden; border-radius: 20px;">
                <div class="nosotros-carousel-track" id="nosotrosCarouselTrack" style="display: flex; gap: 1.5rem; overflow-x: auto; scroll-snap-type: x mandatory; scroll-behavior: smooth; padding: 10px 4px 20px; -webkit-overflow-scrolling: touch; scrollbar-width: none;">
                    @foreach($carouselProjects as $proj)
                        <article class="card portfolio-card spotlight-card nosotros-carousel-card" style="flex: 0 0 340px; scroll-snap-align: start; display: flex; flex-direction: column; overflow: hidden; padding: 0; position: relative; cursor: pointer; border-color: rgba(79, 70, 229, 0.2); box-shadow: var(--shadow-md);">
                            
                            <!-- Stretched Link to make entire card clickable -->
                            <a href="{{ route('portafolio.show', $proj->slug) }}" class="portfolio-card-stretched-link" aria-label="Ver caso de estudio de {{ $proj->title }}"></a>

                            <!-- Browser Window Header Mockup -->
                            <div style="background: #0f172a; padding: 8px 12px; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid rgba(255,255,255,0.1); position: relative; z-index: 6;">
                                <div style="display: flex; gap: 6px;">
                                    <span style="width: 8px; height: 8px; border-radius: 50%; background: #ef4444; display: inline-block;"></span>
                                    <span style="width: 8px; height: 8px; border-radius: 50%; background: #eab308; display: inline-block;"></span>
                                    <span style="width: 8px; height: 8px; border-radius: 50%; background: #22c55e; display: inline-block;"></span>
                                </div>
                                <div style="color: #94a3b8; font-size: 0.72rem; font-family: monospace; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px;">
                                    {{ $proj->project_url ? parse_url($proj->project_url, PHP_URL_HOST) : $proj->slug . '.cl' }}
                                </div>
                                <span style="font-size: 0.7rem; color: #4ade80;">🔒</span>
                            </div>

                            <!-- Image Container with Luxurious Hover Auto-Scroll -->
                            <div class="portfolio-img-wrap" style="height: 220px; background: #0b0f19; overflow: hidden; position: relative;">
                                <img src="{{ Str::startsWith($proj->featured_image, 'http') ? $proj->featured_image : asset(ltrim($proj->featured_image, '/')) }}" 
                                     alt="{{ $proj->title }}" 
                                     loading="lazy">
                                <div class="portfolio-overlay" style="background: linear-gradient(to top, rgba(15, 23, 42, 0.95) 0%, rgba(15, 23, 42, 0.2) 60%, transparent 100%);">
                                    <div class="portfolio-meta-pill" style="font-size: 0.75rem;">{{ $proj->category }}</div>
                                    <h4 style="color: #ffffff; font-size: 1.15rem; margin: 0; line-height: 1.3;">{{ $proj->title }}</h4>
                                </div>
                            </div>

                            <!-- Card Body Info -->
                            <div style="padding: 1.25rem; display: flex; flex-direction: column; flex-grow: 1; justify-content: space-between; position: relative; z-index: 6;">
                                <div>
                                    <div style="font-size: 0.8rem; color: var(--accent-gold); font-weight: 700; margin-bottom: 0.35rem;">
                                        Cliente: {{ $proj->client }}
                                    </div>
                                    <p style="font-size: 0.86rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 1rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ $proj->summary }}
                                    </p>

                                    <!-- Tech Tags -->
                                    <div style="display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 1.25rem;">
                                        @foreach(array_slice(explode(',', $proj->technologies), 0, 3) as $tech)
                                            <span class="tech-tag" style="font-size: 0.72rem; padding: 2px 8px;">{{ trim($tech) }}</span>
                                        @endforeach
                                    </div>
                                </div>

                                <div style="display: flex; gap: 8px;">
                                    <div class="btn btn-outline btn-sm" style="flex: 1; text-align: center; font-size: 0.82rem; pointer-events: none;">
                                        <span>Ficha Técnica ➔</span>
                                    </div>
                                    @if($proj->project_url)
                                        <a href="{{ $proj->project_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline btn-sm" style="padding: 0.4rem 0.65rem; border-color: rgba(79, 70, 229, 0.3); position: relative; z-index: 7;" title="Visitar Web en Vivo">
                                            <span>↗</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- CTA Box con fondo de Cyber-Océano Digital de REW con Partículas y Formas Marinas en Movimiento -->
        <div class="card spotlight-card ocean-cta-container" style="background: radial-gradient(circle at 10% 20%, rgba(79, 70, 229, 0.35) 0%, transparent 40%), radial-gradient(circle at 90% 80%, rgba(16, 185, 129, 0.2) 0%, transparent 40%), linear-gradient(135deg, #090d16 0%, #0f172a 50%, #1e1b4b 100%); color: #ffffff; text-align: center; padding: 4.5rem 2rem; border-radius: 24px; border: 1px solid rgba(255, 255, 255, 0.15); box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.5); position: relative; overflow: hidden; margin-top: 2.5rem; margin-bottom: 2rem;">
            <!-- Canvas Interactivo de Océano (Partículas, Constelaciones, Medusas y Ondas Marinas) -->
            <canvas id="nosotrosOceanCanvas" data-ocean-canvas data-bubbles="50" data-shapes="7" data-waves="true" style="position: absolute; inset: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1;"></canvas>

            <!-- Glow background orb -->
            <div style="position: absolute; top: -60px; left: 50%; transform: translateX(-50%); width: 400px; height: 120px; background: radial-gradient(circle, rgba(79,70,229,0.4) 0%, transparent 70%); pointer-events: none; z-index: 1;"></div>
            
            <div style="position: relative; z-index: 2;">
                <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.15); padding: 5px 16px; border-radius: 9999px; font-size: 0.82rem; font-weight: 700; color: #38bdf8; margin-bottom: 1.25rem; backdrop-filter: blur(8px);">
                    <span>🌊</span> ECOSISTEMA DIGITAL REW
                </div>

                <h2 style="color: #ffffff; font-size: 2.3rem; margin-bottom: 1rem; font-weight: 900; letter-spacing: -0.02em;">
                    ¿Listo para iniciar tu próximo gran proyecto?
                </h2>
                <p style="color: #cbd5e1; font-size: 1.15rem; max-width: 650px; margin: 0 auto 2.25rem; line-height: 1.7;">
                    Agenda una consulta técnica directa con el Ingeniero <strong>Álvaro Valenzuela Valdés</strong> o solicita tu cotización formal en línea.
                </p>
                <div style="display: flex; justify-content: center; gap: 1.25rem; flex-wrap: wrap;">
                    <a href="{{ route('contacto') }}" class="btn btn-gold btn-lg" style="font-weight: 800; font-size: 1.05rem; padding: 1rem 2rem; box-shadow: 0 4px 20px rgba(245, 158, 11, 0.35);">
                        🚀 Cotizar Proyecto Online
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, quiero consultar por un proyecto para mi empresa.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg" style="font-weight: 800; font-size: 1.05rem; padding: 1rem 2rem;">
                        💬 Conversar por WhatsApp (+56 9 8726 1127)
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('nosotrosCarouselTrack');
    const prevBtn = document.getElementById('nosotrosCarouselPrev');
    const nextBtn = document.getElementById('nosotrosCarouselNext');

    if (!track || !prevBtn || !nextBtn) return;

    const scrollAmount = 360;

    nextBtn.addEventListener('click', () => {
        if (track.scrollLeft + track.clientWidth >= track.scrollWidth - 10) {
            track.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            track.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        }
    });

    prevBtn.addEventListener('click', () => {
        if (track.scrollLeft <= 10) {
            track.scrollTo({ left: track.scrollWidth, behavior: 'smooth' });
        } else {
            track.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        }
    });

    // Auto-scroll loop every 4.5 seconds (pauses when hovering track)
    let autoScrollInterval = setInterval(() => {
        if (track.scrollLeft + track.clientWidth >= track.scrollWidth - 10) {
            track.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            track.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        }
    }, 4500);

    track.addEventListener('mouseenter', () => clearInterval(autoScrollInterval));
    track.addEventListener('mouseleave', () => {
        clearInterval(autoScrollInterval);
        autoScrollInterval = setInterval(() => {
            if (track.scrollLeft + track.clientWidth >= track.scrollWidth - 10) {
                track.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                track.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            }
        }, 4500);
    });

    // Initialize Cyber-Ocean Marine Particles
    if (typeof window.initOceanParticles === 'function') {
        window.initOceanParticles('nosotrosOceanCanvas', {
            bubbleCount: 50,
            shapeCount: 7,
            showWaves: true,
            showShapes: true,
            interactive: true
        });
    }
});
</script>
@endpush
@endsection
