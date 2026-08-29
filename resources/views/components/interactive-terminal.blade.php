<!-- Interactive Live Terminal Showcase Component -->
<section class="section terminal-showcase-section" style="background: #0b1329; color: #ffffff; padding: 5rem 0; position: relative; overflow: hidden;">
    <!-- Background Ambient Glow -->
    <div style="position: absolute; top: -20%; left: 50%; transform: translateX(-50%); width: 700px; height: 500px; background: radial-gradient(circle, rgba(79, 70, 229, 0.25) 0%, rgba(255, 200, 0, 0.08) 50%, transparent 80%); pointer-events: none;"></div>

    <div class="container" style="position: relative; z-index: 2;">
        <div style="text-align: center; max-width: 760px; margin: 0 auto 3rem;">
            <div class="badge badge-primary" style="margin-bottom: 0.75rem; background: rgba(79, 70, 229, 0.3); border-color: rgba(99, 102, 241, 0.4);">
                💻 INGENIERÍA EN ACCIÓN
            </div>
            <h2 style="font-size: 2.2rem; color: #ffffff; margin-bottom: 0.75rem; font-weight: 800;">
                Arquitectura de Software <span class="gradient-text">Sin Cuellos de Botella</span>
            </h2>
            <p style="color: #94a3b8; font-size: 1rem; line-height: 1.6;">
                Observa cómo desplegamos plataformas de alto rendimiento con optimización de base de datos a nivel de microsegundos y motores de Inteligencia Artificial conectados.
            </p>
        </div>

        <!-- Terminal Window Mockup -->
        <div class="terminal-window spotlight-card">
            <!-- Window Header -->
            <div class="terminal-header">
                <div class="terminal-dots">
                    <span class="dot dot-red"></span>
                    <span class="dot dot-yellow"></span>
                    <span class="dot dot-green"></span>
                </div>
                <div class="terminal-title">bash — rew-deploy-engine ~ laravel@v11.x</div>
                <div style="display: flex; gap: 8px;">
                    <button type="button" class="terminal-btn-action" id="rerunTerminalBtn" title="Reiniciar simulación">
                        ▶ Re-ejecutar
                    </button>
                </div>
            </div>

            <!-- Terminal Body -->
            <div class="terminal-body" id="terminalOutput">
                <div class="terminal-line"><span class="t-prompt">$</span> <span class="t-command" id="typedCommand">rew deploy --client="Empresa" --stack="laravel-ai-ecommerce"</span></div>
                <div class="terminal-step step-1" style="display: none;"><span class="t-cyan">[1/4]</span> <span class="t-icon">⚡</span> Optimizando consultas y esquemas de base de datos... <span class="t-success">(0.02ms query time)</span></div>
                <div class="terminal-step step-2" style="display: none;"><span class="t-cyan">[2/4]</span> <span class="t-icon">🚀</span> Compilando Vite y Assets con Core Web Vitals... <span class="t-success">(Score: 100/100 Verde)</span></div>
                <div class="terminal-step step-3" style="display: none;"><span class="t-cyan">[3/4]</span> <span class="t-icon">🤖</span> Inicializando motor RAG con Rich-E AI Agent... <span class="t-success">(Groq 300 t/s Activo)</span></div>
                <div class="terminal-step step-4" style="display: none;"><span class="t-cyan">[4/4]</span> <span class="t-icon">🔒</span> Aplicando blindaje anti-bots, Webpay Plus y Stripe... <span class="t-success">(Listo)</span></div>
                <div class="terminal-summary" style="display: none;">
                    <div style="color: #ffc800; font-weight: 800; margin: 12px 0 6px;">✔ Despliegue completado con éxito — Status: 200 OK</div>
                    <div style="color: #94a3b8; font-size: 0.85rem;">Infraestructura escalable lista para soportar +100.000 visitas concurrentes sin caídas.</div>
                </div>
            </div>

            <!-- Terminal Footer CTA -->
            <div class="terminal-footer">
                <div style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
                    <span style="font-size: 0.85rem; color: #cbd5e1;">⚡ ¿Quieres que tu web cargue a esta velocidad?</span>
                    <a href="{{ route('contacto') }}" class="btn btn-gold btn-sm">
                        <span>Cotizar Mi Proyecto Ahora →</span>
                    </a>
                </div>
                <span style="font-size: 0.78rem; color: #64748b;">Trato directo con el Ingeniero Desarrollador</span>
            </div>
        </div>
    </div>
</section>
