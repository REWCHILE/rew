<!-- Interactive Speed & Conversion Live Race Benchmark Simulator -->
<section class="section speed-benchmark-section" id="speedRaceBenchmarkSection" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%); padding: 5rem 0; border-top: 1px solid var(--border-light);">
    <div class="container">
        <!-- Header -->
        <div style="text-align: center; max-width: 800px; margin: 0 auto 2.5rem;">
            <div class="badge badge-primary" style="margin-bottom: 0.75rem;">
                ⚡ IMPACTO DIRECTO EN VENTAS & POSICIONAMIENTO
            </div>
            <h2 style="font-size: 2.3rem; color: var(--text-dark); margin-bottom: 0.75rem; font-weight: 900; letter-spacing: -0.02em;">
                Carrera de Velocidad en Vivo: <span class="gradient-text">Velocidad es Dinero</span>
            </h2>
            <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.6;">
                Un retraso de solo 1 segundo en la carga reduce las conversiones en un 7%. Mira la simulación en tiempo real entre un sitio web genérico y la arquitectura REW.
            </p>
        </div>

        <!-- Race Control Bar -->
        <div class="speed-race-control-bar" style="display: flex; justify-content: center; align-items: center; gap: 15px; margin-bottom: 2.5rem; flex-wrap: wrap;">
            <div class="race-status-pill" id="speedRaceStatusPill">
                <span class="pulse-dot"></span>
                <span id="speedRaceStatusText">🏁 Preparando carrera de carga en vivo...</span>
            </div>
            <button type="button" id="replaySpeedRaceBtn" class="btn btn-outline btn-sm" style="border-radius: 9999px; padding: 6px 16px; font-weight: 700; display: inline-flex; align-items: center; gap: 6px;">
                <span>🔄 Repetir Carrera ⚡</span>
            </button>
        </div>

        <!-- Benchmark Dual Grid -->
        <div class="benchmark-grid">
            <!-- Card 1: Traditional Slow Website (Snail) -->
            <div class="benchmark-card benchmark-slow spotlight-card" id="benchmarkCardSlow">
                <div class="benchmark-card-top-status">
                    <span class="badge" style="background: #fee2e2; color: #dc2626; font-weight: 800;">
                        🐌 SITIO WEB ESTÁNDAR
                    </span>
                    <span class="race-live-timer timer-slow" id="timerSlowVal">0.00s</span>
                </div>

                <h3 style="font-size: 1.3rem; margin: 12px 0 1rem 0; color: #1e293b; font-weight: 800;">
                    Plantilla Genérica / No Optimizada
                </h3>

                <!-- Live Race Simulation Progress -->
                <div class="race-track-box">
                    <div class="race-track-header">
                        <span>Progreso de Carga en Navegador</span>
                        <span id="slowLoadPercent" style="font-weight: 800; color: #dc2626;">0%</span>
                    </div>
                    <div class="metric-bar-bg" style="height: 10px; background: #e2e8f0;">
                        <div class="metric-bar-fill fill-danger" id="raceBarSlow" style="width: 0%; transition: none;"></div>
                    </div>
                    <div class="race-step-msg" id="slowStepMsg" style="font-size: 0.78rem; color: #991b1b; margin-top: 6px; min-height: 18px; font-weight: 600;">
                        Iniciando petición HTTP...
                    </div>
                </div>

                <div class="benchmark-metric">
                    <div class="metric-label">Tiempo de Carga (LCP)</div>
                    <div class="metric-val text-danger" id="metricLcpSlow">3.8 a 4.5 segundos</div>
                </div>

                <div class="benchmark-metric">
                    <div class="metric-label">Tasa de Rebote (Usuarios que abandonan)</div>
                    <div class="metric-val text-danger">65% de abandono</div>
                    <div class="metric-bar-bg">
                        <div class="metric-bar-fill fill-danger" style="width: 65%;"></div>
                    </div>
                </div>

                <div class="benchmark-metric">
                    <div class="metric-label">Google Core Web Vitals</div>
                    <div class="metric-val text-danger">Score: 35/100 (Rojo)</div>
                </div>

                <div class="benchmark-result-box slow-box" id="slowResultBox">
                    <strong>📉 Consecuencia Comercial:</strong> El 65% de los visitantes abandona antes de ver tu producto o cotizar. Pérdida masiva de inversión publicitaria.
                </div>
            </div>

            <!-- Card 2: Ultra-Fast REW Engineering (Rocket) -->
            <div class="benchmark-card benchmark-fast spotlight-card" id="benchmarkCardFast">
                <div class="fast-ribbon">🏆 GANADOR: 11.4x MÁS RÁPIDO</div>
                
                <div class="benchmark-card-top-status">
                    <span class="badge badge-primary" style="font-weight: 800;">
                        🚀 ARQUITECTURA REW
                    </span>
                    <span class="race-live-timer timer-fast" id="timerFastVal">0.00s</span>
                </div>

                <h3 style="font-size: 1.3rem; margin: 12px 0 1rem 0; color: #1e293b; font-weight: 800;">
                    Laravel + Servidores VPS Optimizados + IA
                </h3>

                <!-- Live Race Simulation Progress -->
                <div class="race-track-box">
                    <div class="race-track-header">
                        <span>Progreso de Carga en Navegador</span>
                        <span id="fastLoadPercent" style="font-weight: 800; color: #059669;">0%</span>
                    </div>
                    <div class="metric-bar-bg" style="height: 10px; background: #d1fae5;">
                        <div class="metric-bar-fill fill-success" id="raceBarFast" style="width: 0%; transition: none;"></div>
                    </div>
                    <div class="race-step-msg" id="fastStepMsg" style="font-size: 0.78rem; color: #065f46; margin-top: 6px; min-height: 18px; font-weight: 700;">
                        Caché perimetral lista...
                    </div>
                </div>

                <div class="benchmark-metric">
                    <div class="metric-label">Tiempo de Carga (LCP)</div>
                    <div class="metric-val text-success" id="metricLcpFast">0.3 a 0.5 segundos ⚡</div>
                </div>

                <div class="benchmark-metric">
                    <div class="metric-label">Tasa de Rebote (Usuarios que abandonan)</div>
                    <div class="metric-val text-success">Menos del 12% (Máxima Retención)</div>
                    <div class="metric-bar-bg">
                        <div class="metric-bar-fill fill-success" style="width: 12%;"></div>
                    </div>
                </div>

                <div class="benchmark-metric">
                    <div class="metric-label">Google Core Web Vitals</div>
                    <div class="metric-val text-success">Score: 98 - 100/100 (Verde Perfecto)</div>
                </div>

                <div class="benchmark-result-box fast-box" id="fastResultBox">
                    <strong>📈 Victoria Comercial:</strong> +300% en tasa de conversión, máximo puntaje en Google SEO y clientes que compran de inmediato.
                </div>

                <div style="margin-top: 1.5rem; text-align: center;">
                    <button type="button" class="btn btn-primary open-audit-modal-btn" style="width: 100%; justify-content: center; font-weight: 800;">
                        <span>🔍 Auditar la Velocidad de Mi Sitio Web →</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
