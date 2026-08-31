{{-- 
    REW Official 3D Animated Founder Avatar Component
    Theme: Cyber-Ocean Engineering, 3D Pixar/Octane Aesthetic, Holographic Logistics & Software Telemetry
--}}

<div class="founder-pro-stage" id="founderProStage">
    <!-- 1. Deep Sea Marine Ambient Glow & Caustics -->
    <div class="pro-ocean-glow"></div>
    <div class="pro-water-caustics"></div>

    <!-- 2. Minimalist Telemetry Top Badges -->
    <div class="pro-telemetry-header">
        <div class="telemetry-badge-brand">
            <span class="telemetry-dot"></span>
            <span>REW TECH LABS</span>
        </div>
        <div class="telemetry-badge-status">
            <span>AI & LOGISTICS</span>
        </div>
    </div>

    <!-- 3. Main 3D Illustrated Stage -->
    <div class="pro-avatar-frame">
        <!-- 3D High-End Render of Álvaro Valenzuela -->
        <picture>
            <source srcset="{{ asset('images/alvaro-developer-3d.webp') }}?v={{ time() }}" type="image/webp">
            <img src="{{ asset('images/alvaro-developer-3d.png') }}?v={{ time() }}" 
                 alt="Álvaro Valenzuela Valdés - Ingeniero Informático & Fundador REW" 
                 class="pro-avatar-img" 
                 loading="eager" 
                 width="600" 
                 height="600">
        </picture>

        <!-- Floating Holographic Neon Light Layer -->
        <div class="holo-glow-plane"></div>
        <div class="holo-glow-ship"></div>
        <div class="holo-glow-truck"></div>
        <div class="holo-glow-box"></div>
        <div class="holo-glow-neural"></div>

        <!-- Laser Code Rays & Keyboard Particle Stream -->
        <div class="laptop-laser-stream">
            <span class="laser-beam beam-1"></span>
            <span class="laser-beam beam-2"></span>
            <span class="laser-beam beam-3"></span>
        </div>

        <!-- Floating Micro Code Snippets -->
        <div class="holo-code-stream">
            <span class="code-pill pill-1">&lt;AI.Engine/&gt;</span>
            <span class="code-pill pill-2">Laravel 11</span>
            <span class="code-pill pill-3">fast_dispatch()</span>
        </div>
    </div>

    <!-- 4. Sleek Status Telemetry Pill -->
    <div class="pro-status-pill" id="proStatusPill">
        <span class="pro-live-indicator"></span>
        <span class="pro-status-text" id="proStatusText">⚡ INGENIERÍA DE SOFTWARE & SOLUCIONES GLOBALES</span>
    </div>
</div>

<style>
/* ==========================================================
   FOUNDER 3D PRO STAGE - HIGH-END TECH AGENCY AESTHETIC
   ========================================================== */
.founder-pro-stage {
    position: relative;
    width: 100%;
    max-width: 320px;
    margin: 0 auto 1.25rem;
    border-radius: 20px;
    background: radial-gradient(circle at 50% 10%, #0d233a 0%, #081326 50%, #030712 100%);
    border: 1px solid rgba(56, 189, 248, 0.25);
    box-shadow: 0 20px 40px -15px rgba(3, 7, 18, 0.9), 0 0 25px rgba(56, 189, 248, 0.15);
    padding: 0.85rem 0.85rem 1rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    user-select: none;
}

.founder-pro-stage:hover {
    transform: translateY(-4px);
    border-color: rgba(56, 189, 248, 0.5);
    box-shadow: 0 25px 50px -12px rgba(3, 7, 18, 0.95), 0 0 35px rgba(56, 189, 248, 0.3);
}

/* Background Cyber-Ocean Caustics & Glow */
.pro-ocean-glow {
    position: absolute;
    top: -50px;
    left: 50%;
    transform: translateX(-50%);
    width: 250px;
    height: 180px;
    background: radial-gradient(circle, rgba(56, 189, 248, 0.2) 0%, rgba(14, 116, 144, 0.08) 50%, transparent 80%);
    pointer-events: none;
    z-index: 1;
}

.pro-water-caustics {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 80% 20%, rgba(45, 212, 191, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 20% 80%, rgba(99, 102, 241, 0.08) 0%, transparent 40%);
    pointer-events: none;
    z-index: 1;
}

/* Top Telemetry Badges */
.pro-telemetry-header {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    z-index: 5;
    margin-bottom: 0.65rem;
    padding: 0 4px;
}

.telemetry-badge-brand {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.68rem;
    font-weight: 800;
    letter-spacing: 0.08em;
    color: #38bdf8;
    background: rgba(15, 23, 42, 0.7);
    padding: 3px 8px;
    border-radius: 6px;
    border: 1px solid rgba(56, 189, 248, 0.25);
    backdrop-filter: blur(8px);
}

.telemetry-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #38bdf8;
    box-shadow: 0 0 8px #38bdf8;
    animation: proDotPulse 2s infinite ease-in-out;
}

@keyframes proDotPulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.4; transform: scale(0.85); }
}

.telemetry-badge-status {
    font-size: 0.62rem;
    font-weight: 700;
    letter-spacing: 0.06em;
    color: #94a3b8;
    background: rgba(255, 255, 255, 0.05);
    padding: 3px 8px;
    border-radius: 6px;
    border: 1px solid rgba(255, 255, 255, 0.08);
}

/* 3. Main 3D Avatar Image & Animated Overlays */
.pro-avatar-frame {
    position: relative;
    width: 100%;
    border-radius: 14px;
    overflow: hidden;
    background: #060e1a;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
}

.pro-avatar-img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: cover;
    transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    border-radius: 12px;
}

.founder-pro-stage:hover .pro-avatar-img {
    transform: scale(1.03);
}

/* Subtle Neon Pulses over the generated holographic icons */
.holo-glow-plane {
    position: absolute;
    top: 16%;
    left: 23%;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(56, 189, 248, 0.3) 0%, transparent 70%);
    pointer-events: none;
    animation: holoGlowPulse 3s infinite ease-in-out;
}

.holo-glow-ship {
    position: absolute;
    top: 38%;
    left: 14%;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(45, 212, 191, 0.3) 0%, transparent 70%);
    pointer-events: none;
    animation: holoGlowPulse 3.5s infinite ease-in-out 0.5s;
}

.holo-glow-truck {
    position: absolute;
    top: 18%;
    right: 18%;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(56, 189, 248, 0.3) 0%, transparent 70%);
    pointer-events: none;
    animation: holoGlowPulse 3.2s infinite ease-in-out 1s;
}

.holo-glow-box {
    position: absolute;
    top: 38%;
    right: 12%;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(251, 191, 36, 0.3) 0%, transparent 70%);
    pointer-events: none;
    animation: holoGlowPulse 2.8s infinite ease-in-out 1.5s;
}

.holo-glow-neural {
    position: absolute;
    bottom: 25%;
    right: 25%;
    width: 90px;
    height: 50px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(56, 189, 248, 0.25) 0%, transparent 75%);
    pointer-events: none;
    animation: holoGlowPulse 2.5s infinite ease-in-out 0.8s;
}

@keyframes holoGlowPulse {
    0%, 100% { transform: scale(0.9); opacity: 0.4; }
    50% { transform: scale(1.2); opacity: 0.9; }
}

/* Laser Code Rays shooting up from keyboard */
.laptop-laser-stream {
    position: absolute;
    bottom: 12%;
    right: 32%;
    width: 50px;
    height: 40px;
    pointer-events: none;
}

.laser-beam {
    position: absolute;
    bottom: 0;
    width: 2px;
    height: 25px;
    background: linear-gradient(180deg, rgba(56, 189, 248, 0.9), transparent);
    border-radius: 2px;
    opacity: 0;
    animation: beamLaser 1.5s infinite ease-out;
}
.beam-1 { left: 10px; animation-delay: 0.1s; }
.beam-2 { left: 25px; animation-delay: 0.6s; height: 32px; }
.beam-3 { left: 40px; animation-delay: 1.1s; height: 20px; }

@keyframes beamLaser {
    0% { transform: translateY(0) scaleY(0.3); opacity: 0; }
    50% { opacity: 0.8; filter: drop-shadow(0 0 4px #38bdf8); }
    100% { transform: translateY(-30px) scaleY(1.2); opacity: 0; }
}

/* Floating Micro Code Snippets */
.holo-code-stream {
    position: absolute;
    inset: 0;
    pointer-events: none;
}

.code-pill {
    position: absolute;
    font-size: 0.58rem;
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
    font-weight: 700;
    color: #e0f2fe;
    background: rgba(8, 22, 40, 0.75);
    border: 1px solid rgba(56, 189, 248, 0.4);
    padding: 2px 6px;
    border-radius: 4px;
    backdrop-filter: blur(6px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
    animation: codeFloat 4s infinite ease-in-out alternate;
}

.pill-1 { top: 28%; left: 8%; animation-delay: 0s; color: #38bdf8; }
.pill-2 { bottom: 35%; left: 8%; animation-delay: 1.2s; color: #34d399; }
.pill-3 { bottom: 22%; right: 12%; animation-delay: 2s; color: #fbbf24; }

@keyframes codeFloat {
    0% { transform: translateY(0); opacity: 0.7; }
    100% { transform: translateY(-6px); opacity: 1; border-color: rgba(56, 189, 248, 0.8); }
}

/* 4. Sleek Status Telemetry Pill */
.pro-status-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(15, 23, 42, 0.9);
    border: 1px solid rgba(56, 189, 248, 0.35);
    padding: 5px 12px;
    border-radius: 9999px;
    margin-top: 0.75rem;
    position: relative;
    z-index: 5;
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
    transition: all 0.25s ease;
    cursor: default;
}

.founder-pro-stage:hover .pro-status-pill {
    border-color: rgba(56, 189, 248, 0.7);
    box-shadow: 0 0 15px rgba(56, 189, 248, 0.4);
}

.pro-live-indicator {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #10b981;
    box-shadow: 0 0 8px #10b981;
    animation: livePulsing 1.4s infinite ease-in-out;
}

@keyframes livePulsing {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.5; transform: scale(1.3); }
}

.pro-status-text {
    font-size: 0.65rem;
    font-weight: 800;
    letter-spacing: 0.05em;
    color: #38bdf8;
    white-space: nowrap;
    transition: opacity 0.25s ease;
}

@media (max-width: 480px) {
    .founder-pro-stage {
        max-width: 290px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const statusText = document.getElementById('proStatusText');
    if (!statusText) return;

    const phrases = [
        '⚡ INGENIERÍA DE SOFTWARE & SOLUCIONES GLOBALES',
        '🚀 DESPACHO LOGÍSTICO & E-COMMERCE API',
        '🤖 AGENTES DE INTELIGENCIA ARTIFICIAL & RAG',
        '🌐 PLATAFORMAS WEB EN LARAVEL & WORDPRESS',
        '✈️📦 INTEGRACIONES AEROMARÍTIMAS & ERP'
    ];
    let idx = 0;

    setInterval(() => {
        idx = (idx + 1) % phrases.length;
        statusText.style.opacity = '0';
        setTimeout(() => {
            statusText.textContent = phrases[idx];
            statusText.style.opacity = '1';
        }, 250);
    }, 3600);
});
</script>
