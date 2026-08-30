<!-- Google PageSpeed & Core Web Vitals Live Audit Modal -->
<div class="audit-modal-overlay" id="auditModalOverlay">
    <div class="audit-modal-container">
        <!-- Modal Header -->
        <div class="audit-modal-header">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div class="audit-header-icon">🔍</div>
                <div>
                    <h3 style="margin: 0; font-size: 1.25rem; font-weight: 800; color: #ffffff;">
                        Auditoría Técnica de Velocidad
                    </h3>
                    <p style="margin: 2px 0 0 0; font-size: 0.8rem; color: #94a3b8;">
                        Diagnóstico de Core Web Vitals y Rendimiento con Google PageSpeed
                    </p>
                </div>
            </div>
            <button type="button" class="close-audit-modal-btn" id="closeAuditModalBtn" title="Cerrar ventana">✕</button>
        </div>

        <!-- Modal Body -->
        <div class="audit-modal-body">
            <!-- STEP 1: Form Input -->
            <form id="auditAnalysisForm" class="audit-step-active">
                <input type="text" name="b_field_check_hp" style="display:none !important;" tabindex="-1" autocomplete="off">

                <div style="margin-bottom: 1.25rem;">
                    <label style="display: block; font-size: 0.88rem; font-weight: 700; color: #1e293b; margin-bottom: 6px;">
                        🌐 URL de tu Sitio Web o Tienda Online *
                    </label>
                    <input type="text" name="website_url" required placeholder="Ej: https://tuempresa.cl" 
                           style="width: 100%; padding: 0.75rem 1rem; border: 2px solid var(--primary); border-radius: 10px; font-size: 1rem; outline: none; font-weight: 600; background: #ffffff;">
                </div>

                <div class="grid-form-2col" style="margin-bottom: 1rem;">
                    <div>
                        <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #475569; margin-bottom: 4px;">Tu Nombre *</label>
                        <input type="text" name="name" required placeholder="Ej: Juan Pérez" 
                               style="width: 100%; padding: 0.65rem 0.85rem; border: 1px solid var(--border-light); border-radius: 8px; font-size: 0.9rem; outline: none;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #475569; margin-bottom: 4px;">Teléfono / WhatsApp *</label>
                        <input type="tel" name="phone" required placeholder="+56 9 1234 5678" 
                               style="width: 100%; padding: 0.65rem 0.85rem; border: 1px solid var(--border-light); border-radius: 8px; font-size: 0.9rem; outline: none;">
                    </div>
                </div>

                <div class="grid-form-2col" style="margin-bottom: 1.5rem;">
                    <div>
                        <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #475569; margin-bottom: 4px;">Correo Electrónico *</label>
                        <input type="email" name="email" required placeholder="tu@correo.cl" 
                               style="width: 100%; padding: 0.65rem 0.85rem; border: 1px solid var(--border-light); border-radius: 8px; font-size: 0.9rem; outline: none;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.82rem; font-weight: 700; color: #475569; margin-bottom: 4px;">Empresa (Opcional)</label>
                        <input type="text" name="company" placeholder="Nombre de tu marca" 
                               style="width: 100%; padding: 0.65rem 0.85rem; border: 1px solid var(--border-light); border-radius: 8px; font-size: 0.9rem; outline: none;">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; justify-content: center;" id="auditSubmitBtn">
                    <span>⚡ Iniciar Análisis en Vivo Gratis →</span>
                </button>
                <div style="text-align: center; margin-top: 10px; font-size: 0.75rem; color: #64748b;">
                    🔒 Análisis 100% seguro y confidencial realizado por el equipo de ingeniería REW
                </div>
            </form>

            <!-- STEP 2: Loading State -->
            <div id="auditLoadingState" style="display: none; text-align: center; padding: 3rem 1.5rem;">
                <div class="audit-spinner"></div>
                <h4 style="font-size: 1.2rem; color: #0f172a; margin: 1.5rem 0 0.5rem 0; font-weight: 800;">
                    Analizando Core Web Vitals en Vivo...
                </h4>
                <p id="auditLoadingMsg" style="font-size: 0.88rem; color: #64748b; margin: 0;">
                    Conectando con los servidores de tu sitio web...
                </p>
            </div>

            <!-- STEP 3: Results Display -->
            <div id="auditResultsState" style="display: none;">
                <div style="background: #f8fafc; border: 1px solid var(--border-light); border-radius: 12px; padding: 1rem; margin-bottom: 1.5rem; text-align: center;">
                    <div style="font-size: 0.8rem; color: #64748b;">Resultados obtenidos para:</div>
                    <div style="font-size: 1rem; font-weight: 800; color: #0f172a;" id="auditTargetUrl">https://...</div>
                </div>

                <!-- Score Gauges -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                    <!-- Mobile Score -->
                    <div class="audit-score-card">
                        <div class="score-circle-wrap" id="mobileScoreCircle">
                            <span class="score-number" id="mobileScoreNum">45</span>
                            <span class="score-max">/100</span>
                        </div>
                        <div class="score-device-label">📱 Rendimiento Móvil</div>
                    </div>

                    <!-- Desktop Score -->
                    <div class="audit-score-card">
                        <div class="score-circle-wrap" id="desktopScoreCircle">
                            <span class="score-number" id="desktopScoreNum">72</span>
                            <span class="score-max">/100</span>
                        </div>
                        <div class="score-device-label">💻 Rendimiento Desktop</div>
                    </div>
                </div>

                <!-- Key Metrics Grid -->
                <div class="audit-metrics-row">
                    <div class="metric-mini-box">
                        <div class="mini-label">⚡ LCP (Carga Visual)</div>
                        <div class="mini-val" id="metricLcpVal">3.8s</div>
                    </div>
                    <div class="metric-mini-box">
                        <div class="mini-label">⏱️ TTFB (Respuesta Servidor)</div>
                        <div class="mini-val" id="metricTtfbVal">950ms</div>
                    </div>
                    <div class="metric-mini-box">
                        <div class="mini-label">📐 CLS (Estabilidad Visual)</div>
                        <div class="mini-val" id="metricClsVal">0.18</div>
                    </div>
                </div>

                <!-- Recommendations Box -->
                <div style="background: #fffbeb; border: 1px solid #fde68a; border-radius: 12px; padding: 1.25rem; margin-bottom: 1.5rem;">
                    <h5 style="color: #92400e; font-size: 0.92rem; font-weight: 800; margin: 0 0 0.5rem 0;">
                        💡 Oportunidades de Optimización Detectadas:
                    </h5>
                    <ul id="auditRecommendationsList" style="margin: 0; padding-left: 1.2rem; font-size: 0.82rem; color: #78350f; line-height: 1.6;">
                    </ul>
                </div>

                <!-- CTA Action Button -->
                <a href="#" id="auditWhatsappCtaBtn" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp btn-lg" style="width: 100%; justify-content: center; font-size: 1.05rem;">
                    <span>⚡ ¡Quiero Optimizar Mi Sitio Web con REW! →</span>
                </a>
                <div style="text-align: center; margin-top: 10px; font-size: 0.78rem; color: #64748b;">
                    Trato directo con el Ingeniero Desarrollador • Garantía de Core Web Vitals en Verde
                </div>
            </div>
        </div>
    </div>
</div>
