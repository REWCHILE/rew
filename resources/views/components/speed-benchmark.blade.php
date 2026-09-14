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
        <div class="speed-race-control-bar" style="display: flex; justify-content: center; align-items: center; gap: 15px; margin-bottom: 1.75rem; flex-wrap: wrap;">
            <div class="race-status-pill" id="speedRaceStatusPill">
                <span class="pulse-dot"></span>
                <span id="speedRaceStatusText">🏁 Preparando carrera de carga en vivo...</span>
            </div>
            <button type="button" id="replaySpeedRaceBtn" class="btn btn-outline btn-sm" style="border-radius: 9999px; padding: 6px 16px; font-weight: 700; display: inline-flex; align-items: center; gap: 6px;">
                <span>🔄 Repetir Carrera ⚡</span>
            </button>
        </div>

        <!-- Live Race Track Arena (Dual-Track visible on Mobile & Desktop simultaneously) -->
        <div class="speed-race-arena" id="speedRaceArena" aria-label="Carrera en tiempo real">
            <div class="arena-header">
                <span class="arena-header-title">⚡ PISTA DE VELOCIDAD EN VIVO</span>
                <span class="arena-header-sub">Simulación sincrónica a 100 Mbps</span>
            </div>

            <!-- Fast Runner Track: REW -->
            <div class="arena-track-row arena-row-fast">
                <div class="arena-runner-info">
                    <span class="arena-runner-badge badge-fast">🚀 REW</span>
                    <span class="arena-runner-timer timer-fast" id="arenaTimerFast">0.00s</span>
                </div>
                <div class="arena-lane-wrapper">
                    <div class="arena-lane-progress fill-success" id="arenaBarFast" style="width: 0%;">
                        <span class="arena-runner-avatar" title="Arquitectura REW">🚀</span>
                    </div>
                    <div class="arena-finish-flag" title="Meta (100%)">🏁</div>
                </div>
                <span class="arena-load-percent" id="arenaPercentFast" style="color: #059669;">0%</span>
            </div>

            <!-- Slow Runner Track: Standard Site -->
            <div class="arena-track-row arena-row-slow">
                <div class="arena-runner-info">
                    <span class="arena-runner-badge badge-slow">🐌 Estándar</span>
                    <span class="arena-runner-timer timer-slow" id="arenaTimerSlow">0.00s</span>
                </div>
                <div class="arena-lane-wrapper">
                    <div class="arena-lane-progress fill-danger" id="arenaBarSlow" style="width: 0%;">
                        <span class="arena-runner-avatar" title="Sitio Estándar">🐌</span>
                    </div>
                    <div class="arena-finish-flag" title="Meta (100%)">🏁</div>
                </div>
                <span class="arena-load-percent" id="arenaPercentSlow" style="color: #dc2626;">0%</span>
            </div>
        </div>

        <!-- Mobile Segmented Tabs (Visible on mobile <= 768px to switch between cards) -->
        <div class="mobile-benchmark-tabs" id="mobileBenchmarkTabs" role="tablist">
            <button type="button" class="benchmark-tab-btn active" data-tab="fast" role="tab" aria-selected="true">
                <span>🚀 REW (0.38s) 🏆</span>
            </button>
            <button type="button" class="benchmark-tab-btn" data-tab="slow" role="tab" aria-selected="false">
                <span>🐌 Estándar (4.35s)</span>
            </button>
            <button type="button" class="benchmark-tab-btn" data-tab="both" role="tab" aria-selected="false">
                <span>📊 Comparar Ambas</span>
            </button>
        </div>

        <!-- Benchmark Dual Grid -->
        <div class="benchmark-grid" id="benchmarkGrid" data-active="fast">
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

                <!-- Google Search Console Style Audit Search Bar (Card 1) -->
                <div class="benchmark-search-wrap">
                    <div class="benchmark-search-label">
                        <span>⚠️ ¿Tu sitio web carga lento? Compruébalo:</span>
                    </div>
                    <form class="google-audit-search-box" autocomplete="off">
                        <div class="google-search-pill">
                            <span class="google-search-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </span>
                            <input type="text" class="google-search-input" name="target_url" placeholder="Ingresa tu web para conocer la velocidad..." aria-label="Ingresa tu web para conocer la velocidad" spellcheck="false" autocomplete="url" required>
                            <button type="button" class="google-search-clear-btn" title="Borrar" aria-label="Borrar texto" style="display: none;">
                                ✕
                            </button>
                            <div class="google-search-divider" aria-hidden="true"></div>
                            <button type="submit" class="google-search-submit-btn" title="Auditar velocidad con Google PageSpeed">
                                <span class="google-search-btn-label">Auditar</span>
                                <svg class="google-lens-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                                    <circle cx="12" cy="13" r="4"></circle>
                                </svg>
                                <span class="google-enter-hint">↵ Enter</span>
                            </button>
                        </div>
                        <div class="google-search-subtext">
                            <span class="google-g-badge">G</span> Auditoría en vivo con motor Google PageSpeed
                        </div>
                    </form>
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

                <!-- Google Search Console Style Audit Search Bar (Card 2) -->
                <div class="benchmark-search-wrap">
                    <div class="benchmark-search-label">
                        <span>⚡ ¿Quieres que tu web vuele a 100/100? Audita tu velocidad:</span>
                    </div>
                    <form class="google-audit-search-box" autocomplete="off">
                        <div class="google-search-pill">
                            <span class="google-search-icon" aria-hidden="true">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </span>
                            <input type="text" class="google-search-input" name="target_url" placeholder="Ingresa tu web para conocer la velocidad..." aria-label="Ingresa tu web para conocer la velocidad" spellcheck="false" autocomplete="url" required>
                            <button type="button" class="google-search-clear-btn" title="Borrar" aria-label="Borrar texto" style="display: none;">
                                ✕
                            </button>
                            <div class="google-search-divider" aria-hidden="true"></div>
                            <button type="submit" class="google-search-submit-btn" title="Auditar velocidad con Google PageSpeed">
                                <span class="google-search-btn-label">Auditar</span>
                                <svg class="google-lens-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                                    <circle cx="12" cy="13" r="4"></circle>
                                </svg>
                                <span class="google-enter-hint">↵ Enter</span>
                            </button>
                        </div>
                        <div class="google-search-subtext">
                            <span class="google-g-badge">G</span> Diagnóstico gratuito con Google PageSpeed & Core Web Vitals
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Full-Width Bottom Google PageSpeed Audit Banner -->
        <div class="benchmark-bottom-audit-banner">
            <div class="bottom-banner-grid">
                <div class="bottom-banner-info">
                    <div class="bottom-banner-badge">
                        <span class="google-dot-group">
                            <span class="g-dot g-blue"></span>
                            <span class="g-dot g-red"></span>
                            <span class="g-dot g-yellow"></span>
                            <span class="g-dot g-green"></span>
                        </span>
                        <span>Motor Oficial Google PageSpeed Insights</span>
                    </div>
                    <h3 class="bottom-banner-title">
                        ¿Tu sitio web pierde clientes por velocidad lenta?
                    </h3>
                    <p class="bottom-banner-desc">
                        Ingresa el dominio de tu negocio y obtén un diagnóstico técnico instantáneo: LCP, TTFB, optimización para móviles y oportunidades directas para multiplicar tus ventas.
                    </p>
                </div>
                <div class="bottom-banner-action">
                    <form class="google-audit-search-box google-audit-search-lg" autocomplete="off">
                        <div class="google-search-pill">
                            <span class="google-search-icon" aria-hidden="true">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </span>
                            <input type="text" class="google-search-input" name="target_url" placeholder="Ingresa tu web para conocer la velocidad..." aria-label="Ingresa tu web para conocer la velocidad" spellcheck="false" autocomplete="url" required>
                            <button type="button" class="google-search-clear-btn" title="Borrar" aria-label="Borrar texto" style="display: none;">
                                ✕
                            </button>
                            <div class="google-search-divider" aria-hidden="true"></div>
                            <button type="submit" class="google-search-submit-btn" title="Auditar velocidad con Google PageSpeed">
                                <span class="google-search-btn-label">Auditar Gratis</span>
                                <svg class="google-lens-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                                    <circle cx="12" cy="13" r="4"></circle>
                                </svg>
                                <span class="google-enter-hint">↵ Enter</span>
                            </button>
                        </div>
                        <div class="bottom-banner-features">
                            <span>✓ Sin tarjeta de crédito</span>
                            <span>✓ Análisis móvil y escritorio</span>
                            <span>✓ Reporte en tiempo real</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
