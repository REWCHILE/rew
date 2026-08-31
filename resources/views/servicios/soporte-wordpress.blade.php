@extends('layouts.app')

@section('title', 'Soporte WordPress En Chile | Solución De Errores, Caídas Y Seguridad')
@section('meta_description', 'Soporte WordPress en Chile para empresas y ecommerce. Solucionamos errores críticos, caídas, plugins, seguridad y velocidad. Respuesta rápida por WhatsApp.')

@section('og_title', 'Soporte WordPress En Chile | Solución De Errores, Caídas Y Seguridad')
@section('og_description', 'Soporte WordPress en Chile para empresas y ecommerce. Solucionamos errores críticos, caídas, plugins, seguridad y velocidad. Respuesta rápida por WhatsApp.')
@section('og_image', asset('images/services/soporte_wp_hero.webp'))

@section('content')
<!-- ==========================================================================
     HERO SECTION (SOPORTE WORDPRESS CHILE)
     ========================================================================== -->
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-alt) 100%); padding: 3.5rem 0 5rem; border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}" style="color: var(--text-muted); text-decoration: none;">Inicio</a>
            <span style="margin: 0 8px;">/</span>
            <a href="{{ route('servicios.index') }}" style="color: var(--text-muted); text-decoration: none;">Servicios</a>
            <span style="margin: 0 8px;">/</span>
            <span style="color: var(--primary); font-weight: 700;">Soporte WordPress</span>
        </nav>

        <div class="service-hero-grid">
            <!-- Left: Hero Copy -->
            <div>
                <div style="margin-bottom: 1.25rem;">
                    <span class="badge badge-pill-glow">
                        <span style="color: var(--accent-gold);">⚡</span> Soporte WordPress Especializado • Respuesta Urgente
                    </span>
                </div>

                <h1 style="font-size: clamp(2.3rem, 3.8vw, 3.3rem); font-weight: 900; line-height: 1.15; color: var(--text-dark); margin-bottom: 1.25rem;">
                    Soporte WordPress en Chile: <span class="gradient-text">Solución Rápida y Profesional</span>
                </h1>

                <p style="font-size: 1.15rem; color: var(--text-body); line-height: 1.7; margin-bottom: 1.5rem;">
                    En <strong>REW entregamos soporte WordPress de alto nivel</strong> para empresas, pymes y tiendas ecommerce en Chile. Si tu sitio está caído, lento, arrojando errores 500, pantalla blanca o fue infectado por malware, te ayudamos a recuperar la estabilidad, la seguridad y tus ventas de inmediato.
                </p>

                <!-- Value Highlights Grid -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 0.75rem; margin-bottom: 2.25rem;">
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Respuesta de Emergencia:</strong> Rescate de sitios caídos y errores críticos</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>WooCommerce & Webpay:</strong> Solución de pagos fallidos y checkout</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Desinfección de Malware:</strong> Limpieza profunda y blindaje WAF</span>
                    </div>
                    <div class="service-feature-item">
                        <span class="service-feature-check">✓</span>
                        <span><strong>Trato Directo con Ingeniero:</strong> Atención personalizada vía WhatsApp</span>
                    </div>
                </div>

                <!-- CTA Group -->
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-lg">
                        <span>🚨 Solicitar Soporte Inmediato</span>
                    </a>
                    <a href="https://calendly.com/satorisatorchile/rew?hide_event_type_details=1&hide_gdpr_banner=1" target="_blank" rel="noopener noreferrer" class="btn btn-gold btn-lg">
                        <span>📅 Agendar Diagnóstico 20 min</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, tengo una urgencia con mi sitio WordPress y necesito soporte técnico.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 WhatsApp Urgencias</span>
                    </a>
                </div>
            </div>

            <!-- Right: Hero Media Spotlight -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/soporte_wp_hero.webp') }}" alt="Soporte WordPress profesional en Chile" class="service-media-img" loading="eager" width="1404" height="1265">
                    
                    <div style="position: absolute; bottom: 1.5rem; left: 1.5rem; right: 1.5rem; background: rgba(15, 23, 42, 0.92); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.15); border-radius: 12px; padding: 1rem 1.25rem; color: #ffffff; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 700;">Atención Técnica</div>
                            <div style="font-size: 1.05rem; font-weight: 800; color: #10b981;">Diagnóstico & Resolución Rápida</div>
                        </div>
                        <div style="text-align: right;">
                            <div style="font-size: 0.8rem; color: #94a3b8; text-transform: uppercase; font-weight: 700;">Especialidad</div>
                            <div style="font-size: 1.05rem; font-weight: 800; color: var(--accent-gold);">WordPress & WooCommerce 🛒</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     PROBLEMAS FRECUENTES DE WORDPRESS QUE SOLUCIONAMOS
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto 3.5rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Resolución de Incidentes</span>
            <h2 style="font-size: 2.3rem; margin-bottom: 1rem; color: var(--text-dark);">
                Problemas Frecuentes de WordPress que Solucionamos
            </h2>
            <p style="color: var(--text-muted); font-size: 1.05rem;">
                No dejes que los fallos técnicos detengan la actividad comercial de tu empresa. Atendemos todo tipo de incidentes:
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1.5rem;">
            <!-- Problem 1 -->
            <div style="background: var(--bg-alt); padding: 1.75rem; border-radius: 16px; border: 1px solid var(--border-light); transition: all 0.3s ease;">
                <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(239, 68, 68, 0.1); color: #ef4444; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 1.25rem;">💥</div>
                <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.5rem;">Pantalla Blanca (WSOD) y Error 500</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    Conflictos provocados tras actualizar plugins, el tema o versiones de PHP. Localizamos el archivo culpable mediante logs y restauramos el sitio sin pérdida de información.
                </p>
            </div>

            <!-- Problem 2 -->
            <div style="background: var(--bg-alt); padding: 1.75rem; border-radius: 16px; border: 1px solid var(--border-light); transition: all 0.3s ease;">
                <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(245, 158, 11, 0.1); color: #f59e0b; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 1.25rem;">🦠</div>
                <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.5rem;">Infecciones de Malware y Hackeos</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    Eliminación completa de scripts maliciosos, puertas traseras (backdoors) y avisos rojos de Google Search Console ("Sitio engañoso"). Blindaje preventivo.
                </p>
            </div>

            <!-- Problem 3 -->
            <div style="background: var(--bg-alt); padding: 1.75rem; border-radius: 16px; border: 1px solid var(--border-light); transition: all 0.3s ease;">
                <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(16, 185, 129, 0.1); color: #10b981; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 1.25rem;">💳</div>
                <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.5rem;">Fallos en WooCommerce & Webpay</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    Errores en el checkout, problemas con la pasarela de Webpay Plus (Transbank), Mercado Pago o Flow, cálculos erróneos de envíos y carritos congelados.
                </p>
            </div>

            <!-- Problem 4 -->
            <div style="background: var(--bg-alt); padding: 1.75rem; border-radius: 16px; border: 1px solid var(--border-light); transition: all 0.3s ease;">
                <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(79, 70, 229, 0.1); color: #4f46e5; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 1.25rem;">⚡</div>
                <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.5rem;">Lentitud Excesiva & Core Web Vitals</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    Optimización de consultas a la base de datos MySQL, reducción de CSS/JS innecesario, configuración de caché Redis/LSCache y conversión masiva a WebP.
                </p>
            </div>

            <!-- Problem 5 -->
            <div style="background: var(--bg-alt); padding: 1.75rem; border-radius: 16px; border: 1px solid var(--border-light); transition: all 0.3s ease;">
                <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(236, 72, 153, 0.1); color: #ec4899; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 1.25rem;">🗄️</div>
                <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.5rem;">Error Establishing Database Connection</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    Tablas corruptas, saturación de conexiones en el servidor o problemas con credenciales en `wp-config.php`. Reparación y optimización de base de datos.
                </p>
            </div>

            <!-- Problem 6 -->
            <div style="background: var(--bg-alt); padding: 1.75rem; border-radius: 16px; border: 1px solid var(--border-light); transition: all 0.3s ease;">
                <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(6, 182, 212, 0.1); color: #06b6d4; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 1.25rem;">🔒</div>
                <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.5rem;">Problemas SSL y Migración de Servidor</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6;">
                    Corrección de errores de contenido mixto (HTTP/HTTPS), renovación de certificados SSL y migraciones limpias de hosting sin caídas (Zero-Downtime).
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     METODOLOGÍA DE RESOLUCIÓN DE URGENCIAS
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div class="service-split-row">
            <!-- Left: Methodology Content -->
            <div>
                <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Proceso Seguro</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1.25rem; color: var(--text-dark);">
                    ¿Cómo Resolvemos las Urgencias Técnicas?
                </h2>
                <p style="color: var(--text-body); font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.75rem;">
                    Seguimos un protocolo de ingeniería estricto para evitar pérdidas de información o nuevos errores durante la intervención:
                </p>

                <div style="display: flex; flex-direction: column; gap: 1.25rem; margin-bottom: 2rem;">
                    <div style="display: flex; gap: 14px;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--primary); color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0; font-size: 0.9rem;">1</div>
                        <div>
                            <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">Diagnóstico de Logs & Auditoría de Errores</strong>
                            <span style="font-size: 0.92rem; color: var(--text-muted);">Revisión inmediata del `debug.log`, registros del servidor Apache/Nginx y consultas lentas a MySQL.</span>
                        </div>
                    </div>

                    <div style="display: flex; gap: 14px;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--primary); color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0; font-size: 0.9rem;">2</div>
                        <div>
                            <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">Copia de Seguridad Preventiva</strong>
                            <span style="font-size: 0.92rem; color: var(--text-muted);">Generamos un respaldo completo de la base de datos y archivos antes de tocar cualquier línea de código.</span>
                        </div>
                    </div>

                    <div style="display: flex; gap: 14px;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--primary); color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0; font-size: 0.9rem;">3</div>
                        <div>
                            <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">Solución Quirúrgica de la Causa Raíz</strong>
                            <span style="font-size: 0.92rem; color: var(--text-muted);">Reparación limpia sin soluciones temporales que puedan volver a fallar al actualizar plugins en el futuro.</span>
                        </div>
                    </div>

                    <div style="display: flex; gap: 14px;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background: var(--primary); color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0; font-size: 0.9rem;">4</div>
                        <div>
                            <strong style="color: var(--text-dark); display: block; margin-bottom: 2px;">Pruebas Funcionales & Blindaje</strong>
                            <span style="font-size: 0.92rem; color: var(--text-muted);">Verificación de checkout, envíos, formularios y reporte detallado con recomendaciones de seguridad.</span>
                        </div>
                    </div>
                </div>

                <a href="{{ route('contacto') }}" class="btn btn-primary">
                    <span>Contactar con un Ingeniero WordPress →</span>
                </a>
            </div>

            <!-- Right: Graphic -->
            <div>
                <div class="service-media-card spotlight-card">
                    <img src="{{ asset('images/services/soporte_wp_errors.webp') }}" alt="Metodología de soporte técnico WordPress en Chile" class="service-media-img" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     MODALIDADES DE SOPORTE WORDPRESS
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto 3.5rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Opciones Flexibles</span>
            <h2 style="font-size: 2.3rem; margin-bottom: 1rem; color: var(--text-dark);">
                Modalidades de Soporte Técnico WordPress
            </h2>
            <p style="color: var(--text-muted); font-size: 1.05rem;">
                Elige la opción que mejor se adapte a las necesidades puntuales o continuas de tu empresa:
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
            <!-- Option 1 -->
            <div style="background: var(--bg-alt); padding: 2rem; border-radius: 16px; border: 1px solid var(--border-light); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Por Incidente</span>
                    <h3 style="font-size: 1.35rem; color: var(--text-dark); margin-bottom: 0.75rem;">Soporte de Emergencia</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;">
                        Ideal si tienes una caída puntual, error de pasarela de pago o necesitas limpiar un sitio infectado por virus de inmediato.
                    </p>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; font-size: 0.9rem; color: var(--text-body); display: flex; flex-direction: column; gap: 0.5rem;">
                        <li>✓ Diagnóstico inicial rápido</li>
                        <li>✓ Reparación de error específico</li>
                        <li>✓ Respaldo de seguridad previo</li>
                        <li>✓ Garantía de solución</li>
                    </ul>
                </div>
                <a href="{{ route('contacto') }}" class="btn btn-outline" style="width: 100%;">
                    <span>Cotizar Reparación Puntual</span>
                </a>
            </div>

            <!-- Option 2 -->
            <div style="background: #ffffff; padding: 2rem; border-radius: 16px; border: 2px solid var(--primary); box-shadow: 0 10px 30px rgba(79, 70, 229, 0.08); display: flex; flex-direction: column; justify-content: space-between; position: relative;">
                <div style="position: absolute; top: -12px; right: 24px; background: var(--primary); color: #ffffff; font-size: 0.75rem; font-weight: 800; padding: 4px 12px; border-radius: 9999px; text-transform: uppercase;">Más Demandado</div>
                <div>
                    <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Continuidad Total</span>
                    <h3 style="font-size: 1.35rem; color: var(--text-dark); margin-bottom: 0.75rem;">Plan Mantenimiento Mensual</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;">
                        Para empresas y tiendas WooCommerce que buscan cero caídas, actualizaciones continuas, copias diarias y soporte preferente.
                    </p>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; font-size: 0.9rem; color: var(--text-body); display: flex; flex-direction: column; gap: 0.5rem;">
                        <li>✓ Monitoreo y protección 24/7</li>
                        <li>✓ Actualizaciones seguras mensuales</li>
                        <li>✓ Backups diarios en la nube</li>
                        <li>✓ Horas mensuales para cambios y soporte</li>
                    </ul>
                </div>
                <a href="{{ route('servicios.mantenimiento') }}" class="btn btn-primary" style="width: 100%;">
                    <span>Ver Planes de Mantenimiento</span>
                </a>
            </div>

            <!-- Option 3 -->
            <div style="background: var(--bg-alt); padding: 2rem; border-radius: 16px; border: 1px solid var(--border-light); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Desarrollo & Ajustes</span>
                    <h3 style="font-size: 1.35rem; color: var(--text-dark); margin-bottom: 0.75rem;">Bolsa de Horas</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;">
                        Para proyectos que requieren desarrollo constante, nuevas secciones con Elementor, integración de APIs o mejoras visuales.
                    </p>
                    <ul style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; font-size: 0.9rem; color: var(--text-body); display: flex; flex-direction: column; gap: 0.5rem;">
                        <li>✓ Horas flexibles sin vencimiento rígido</li>
                        <li>✓ Maquetación y personalizaciones</li>
                        <li>✓ Integraciones de formularios y APIs</li>
                        <li>✓ Asesoría técnica directa</li>
                    </ul>
                </div>
                <a href="{{ route('contacto') }}" class="btn btn-outline" style="width: 100%;">
                    <span>Consultar Bolsa de Horas</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     PREGUNTAS FRECUENTES (FAQ INTERACTIVO)
     ========================================================================== -->
<section class="section" style="background: var(--bg-alt); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Preguntas Habituales</span>
                <h2 style="font-size: 2.3rem; margin-bottom: 1rem; color: var(--text-dark);">
                    Preguntas Frecuentes sobre Soporte WordPress
                </h2>
                <p style="color: var(--text-muted); font-size: 1.05rem;">
                    Aclaramos las dudas más comunes sobre la atención y resolución de errores:
                </p>
            </div>

            <div class="faq-accordion-list">
                <!-- FAQ 1 -->
                <div class="faq-card-item is-open">
                    <button type="button" class="faq-header-btn">
                        <span>¿Cuánto tiempo tardan en diagnosticar y solucionar una urgencia?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        Para situaciones críticas (sitio caído, pagos deshabilitados o hackeos), iniciamos el diagnóstico en menos de 1 a 2 horas hábiles. En la gran mayoría de casos, los errores comunes quedan resueltos el mismo día.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-card-item">
                    <button type="button" class="faq-header-btn">
                        <span>¿Qué accesos necesitan para intervenir mi sitio web?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        Requerimos un usuario Administrador temporal de WordPress y, de ser necesario para caídas graves o base de datos, acceso al panel de Hosting (cPanel, Plesk, Cloudflare o SSH/FTP). Todos los accesos se manejan bajo estricto acuerdo de confidencialidad.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-card-item">
                    <button type="button" class="faq-header-btn">
                        <span>¿Ofrecen soporte para tiendas WooCommerce con muchas ventas?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        Sí, somos especialistas en WooCommerce. Solucionamos problemas de pasarelas de pago (Transbank Webpay Plus, Mercado Pago), sincronización de inventario, lentitud en el carrito y errores con pasarelas de despacho.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="faq-card-item">
                    <button type="button" class="faq-header-btn">
                        <span>¿Tienen planes de soporte mensual para despreocuparme de la web?</span>
                        <span class="faq-icon-chevron">▾</span>
                    </button>
                    <div class="faq-content-body">
                        Sí, disponemos de planes de mantenimiento preventivo mensual que incluyen monitoreo de caídas 24/7, parches de seguridad, copias de seguridad automáticas y horas para cambios de contenido.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     EVALUACIÓN GRATUITA & CONTACTO DIRECTO
     ========================================================================== -->
<section class="section" style="background: #ffffff;">
    <div class="container">
        <div class="grid-2col-cta" style="align-items: center;">
            <div>
                <span class="badge badge-gold" style="margin-bottom: 1rem;">Atención Profesional</span>
                <h2 style="font-size: 2.4rem; color: var(--text-dark); margin-bottom: 1.25rem; line-height: 1.2;">
                    ¿Tienes Problemas con tu WordPress? 🛠️
                </h2>
                <p style="color: var(--text-body); font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.75rem;">
                    Recupera el control total y la velocidad de tu sitio web con el respaldo de <strong>REW</strong>. Atención directa con ingenieros especialistas en WordPress.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-bottom: 2rem; font-size: 0.95rem; color: var(--text-muted);">
                    <div>✓ Diagnóstico técnico de errores y conflictos de plugins</div>
                    <div>✓ Revisión de seguridad y escaneo de vulnerabilidades</div>
                    <div>✓ Sesión de 20 minutos con el Ingeniero Álvaro Valenzuela Valdés</div>
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="https://calendly.com/satorisatorchile/rew?hide_event_type_details=1&hide_gdpr_banner=1" target="_blank" rel="noopener noreferrer" class="btn btn-gold btn-lg">
                        <span>📅 Agendar en Calendly</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('Hola Álvaro, necesito soporte técnico especializado para mi sitio WordPress.') }}" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg">
                        <span>💬 Hablar por WhatsApp</span>
                    </a>
                </div>
            </div>

            <div style="background: var(--bg-alt); border: 1px solid var(--border-light); border-radius: var(--radius-xl); padding: 2.25rem; text-align: center; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                <img src="{{ asset('images/services/soporte_wp_cta.webp') }}" alt="Soporte WordPress profesional REW" style="width: 100%; max-height: 240px; object-fit: cover; border-radius: 12px; margin-bottom: 1.5rem;" loading="lazy">
                <h3 style="color: var(--text-dark); font-size: 1.35rem; margin-bottom: 0.5rem;">Álvaro Valenzuela Valdés</h3>
                <div style="color: var(--primary); font-size: 0.9rem; font-weight: 700; margin-bottom: 1.25rem;">Ingeniero Informático & Fundador de REW</div>
                <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; margin-bottom: 1.5rem;">
                    📍 Santiago, Providencia, Chile<br>
                    ✉️ <a href="mailto:alvaro@rew.cl" style="color: var(--text-dark); text-decoration: underline;">alvaro@rew.cl</a><br>
                    📱 <a href="tel:+56987261127" style="color: #25d366; font-weight: 700;">+56 9 8726 1127</a>
                </p>
                <a href="{{ route('contacto') }}" class="btn btn-primary" style="width: 100%;">
                    <span>Ir al Formulario de Contacto & Cotizador</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Schema JSON-LD Structured Data for Soporte WordPress Service -->
@verbatim
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Place",
      "@id": "https://rew.cl/#place",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Villagra 070",
        "addressLocality": "Providencia",
        "addressRegion": "Metropolitana",
        "addressCountry": "CL"
      }
    },
    {
      "@type": "Organization",
      "@id": "https://rew.cl/#organization",
      "name": "REW",
      "url": "https://rew.cl",
      "email": "alvaro@rew.cl",
      "telephone": "+56987261127",
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
    {
      "@type": "WebPage",
      "@id": "https://rew.cl/soporte-wordpress/#webpage",
      "url": "https://rew.cl/soporte-wordpress/",
      "name": "Soporte WordPress En Chile | Solución De Errores, Caídas Y Seguridad",
      "description": "Soporte WordPress en Chile para empresas y ecommerce. Solucionamos errores críticos, caídas, plugins, seguridad y velocidad. Respuesta rápida por WhatsApp.",
      "isPartOf": {
        "@type": "WebSite",
        "@id": "https://rew.cl/#website"
      }
    },
    {
      "@type": "Service",
      "@id": "https://rew.cl/soporte-wordpress/#service",
      "name": "Soporte WordPress Profesional en Chile",
      "serviceType": "Soporte técnico y solución de errores para WordPress y WooCommerce",
      "description": "Servicio de soporte WordPress en Chile. Solución de errores críticos, caídas, pantallas blancas, desinfección de malware y soporte WooCommerce.",
      "provider": {
        "@id": "https://rew.cl/#organization"
      },
      "areaServed": "Chile",
      "offers": {
        "@type": "Offer",
        "availability": "https://schema.org/InStock"
      }
    },
    {
      "@type": "FAQPage",
      "@id": "https://rew.cl/soporte-wordpress/#faq",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "¿Cuánto tiempo tardan en diagnosticar y solucionar una urgencia?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Para situaciones críticas, iniciamos el diagnóstico en menos de 1 a 2 horas hábiles. En la gran mayoría de casos, los errores comunes quedan resueltos el mismo día."
          }
        },
        {
          "@type": "Question",
          "name": "¿Qué accesos necesitan para intervenir mi sitio web?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Requerimos un usuario Administrador temporal de WordPress y, si es necesario por caídas graves o base de datos, acceso al Hosting o cPanel."
          }
        }
      ]
    }
  ]
}
</script>
@endverbatim
@endsection
