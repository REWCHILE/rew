{{-- 
    REW Cyber-Ocean Animated Founder Avatar Component
    Features:
    - Deep Sea Marine Background with Bioluminescent Waves, Bubbles & Diatoms
    - REW Brand Stamp & Tech Badges
    - Vector Character (Álvaro Valenzuela) with Waving & Hyper-Speed "Light-Speed" Typing
    - Neural Mindstream: Floating Ideas (💡), Code (<code/>, { AI }, Laravel), and Logistics (✈️ Avión, 🚢 Barco, 🚚 Camión, 🛵 Delivery, 📦 Paquetes)
--}}

<div class="founder-avatar-stage" id="founderAvatarStage">
    <!-- 1. Fondo Marino Cibernético & Branding REW -->
    <div class="ocean-backdrop">
        <!-- REW Official Branding Watermark -->
        <div class="ocean-rew-brand">
            <span class="brand-rew-text">REW</span>
            <span class="brand-rew-sub">ENGINEERING & LABS</span>
        </div>

        <!-- Bioluminescent Marine Bubbles & Diatoms -->
        <div class="ocean-bubble bubble-1"></div>
        <div class="ocean-bubble bubble-2"></div>
        <div class="ocean-bubble bubble-3"></div>
        <div class="ocean-bubble bubble-4"></div>
        <div class="ocean-bubble bubble-5"></div>
        <div class="ocean-bubble bubble-6"></div>

        <!-- Floating Geometric Marine Diatom Shapes -->
        <div class="marine-shape shape-hex"></div>
        <div class="marine-shape shape-tri"></div>
        <div class="marine-shape shape-jelly">
            <svg viewBox="0 0 32 32" class="jelly-svg">
                <path d="M16 4 C9 4 6 10 6 15 C6 18 8 20 11 20 C13 20 14 18 16 18 C18 18 19 20 21 20 C24 20 26 18 26 15 C26 10 23 4 16 4 Z" fill="rgba(56, 189, 248, 0.35)"/>
                <path d="M9 20 C9 25 10 28 11 30 M13 20 C13 26 14 28 14 30 M18 20 C18 26 17 28 17 30 M22 20 C22 25 21 28 20 30" stroke="rgba(56, 189, 248, 0.4)" stroke-width="1.2" stroke-linecap="round" fill="none"/>
            </svg>
        </div>

        <!-- Layered Aquatic Ocean Waves at Bottom -->
        <div class="ocean-waves-wrapper">
            <svg class="ocean-wave-svg wave-back" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0 C150,50 350,-40 500,20 C650,80 900,-30 1200,10 L1200,120 L0,120 Z" fill="rgba(14, 116, 144, 0.25)"></path>
            </svg>
            <svg class="ocean-wave-svg wave-mid" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,20 C200,-20 400,60 600,10 C800,-40 1000,50 1200,20 L1200,120 L0,120 Z" fill="rgba(6, 182, 212, 0.35)"></path>
            </svg>
            <svg class="ocean-wave-svg wave-front" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,40 C300,10 600,70 900,20 C1050,-10 1150,30 1200,40 L1200,120 L0,120 Z" fill="rgba(56, 189, 248, 0.2)"></path>
            </svg>
        </div>
    </div>

    <!-- 2. Nube de Ideas, Código, Envíos y Logística en su cabeza -->
    <div class="thought-matrix-cloud">
        <!-- 💡 Idea Brillante -->
        <div class="mind-item item-idea" title="Innovación e Ideas">
            <div class="mind-bubble-inner glow-gold">
                <svg viewBox="0 0 24 24" class="mind-icon">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 2.38 1.19 4.47 3 5.74V17c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-2.26c1.81-1.27 3-3.36 3-5.74 0-3.87-3.13-7-7-7zm-2 18h4v1c0 .55-.45 1-1 1h-2c-.55 0-1-.45-1-1v-1z" fill="#fcd34d"/>
                    <path d="M12 6c-1.66 0-3 1.34-3 3h2c0-.55.45-1 1-1s1 .45 1 1c0 1-1.5 1.5-1.5 3h1c0-.85 1.5-1.35 1.5-3 0-1.66-1.34-3-3-3z" fill="#fbbf24"/>
                </svg>
                <span class="mind-ray ray-1"></span>
                <span class="mind-ray ray-2"></span>
                <span class="mind-ray ray-3"></span>
            </div>
            <span class="mind-label">IDEAS</span>
        </div>

        <!-- 💻 Código & Software -->
        <div class="mind-item item-code" title="Desarrollo de Software">
            <div class="mind-bubble-inner glow-cyan">
                <span class="code-text">&lt;code/&gt;</span>
            </div>
            <span class="mind-label">{ AI }</span>
        </div>

        <!-- ✈️ Avión de Carga Express -->
        <div class="mind-item item-plane" title="Envíos por Avión">
            <div class="mind-bubble-inner glow-blue">
                <svg viewBox="0 0 24 24" class="mind-icon">
                    <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5l8 2.5z" fill="#38bdf8"/>
                </svg>
                <div class="plane-trail"></div>
            </div>
            <span class="mind-label">AÉREO ✈️</span>
        </div>

        <!-- 🚢 Barco de Envíos Marítimos -->
        <div class="mind-item item-ship" title="Transporte Marítimo Internacional">
            <div class="mind-bubble-inner glow-teal">
                <svg viewBox="0 0 24 24" class="mind-icon">
                    <path d="M20 21c-1.39 0-2.78-.47-4-1.32-2.44 1.71-5.56 1.71-8 0-1.22.85-2.61 1.32-4 1.32H2v2h2c1.38 0 2.74-.35 4-.99 2.52 1.29 5.48 1.29 8 0 1.26.65 2.62.99 4 .99h2v-2h-2zM3.95 16.51l1.52-6.51h13.06l1.52 6.51c-.69.31-1.42.49-2.19.49-1.93 0-3.69-.97-4.86-2.45-1.17 1.48-2.93 2.45-4.86 2.45-.77 0-1.5-.18-2.19-.49zM6 8l1-4h10l1 4H6zm3-2h6v1H9V6z" fill="#2dd4bf"/>
                </svg>
            </div>
            <span class="mind-label">BARCO 🚢</span>
        </div>

        <!-- 🚚 Camión Logístico -->
        <div class="mind-item item-truck" title="Distribución Terrestre">
            <div class="mind-bubble-inner glow-emerald">
                <svg viewBox="0 0 24 24" class="mind-icon">
                    <path d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4zM6 18.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm13.5-9l1.96 2.5H17V9.5h2.5zm-1.5 9c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" fill="#34d399"/>
                </svg>
            </div>
            <span class="mind-label">CAMIÓN 🚚</span>
        </div>

        <!-- 🛵 Delivery / Última Milla -->
        <div class="mind-item item-delivery" title="Delivery Express Última Milla">
            <div class="mind-bubble-inner glow-purple">
                <svg viewBox="0 0 24 24" class="mind-icon">
                    <path d="M19 7c0-1.1-.9-2-2-2h-3v2h3v2.65L13.52 14H10V9H6c-2.21 0-4 1.79-4 4v3h2c0 1.66 1.34 3 3 3s3-1.34 3-3h4.18c.41 1.16 1.51 2 2.82 2 1.66 0 3-1.34 3-3v-5l-4-5zm-12 9c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm11 0c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z" fill="#c084fc"/>
                    <rect x="2" y="7" width="5" height="5" rx="1" fill="#f59e0b"/>
                </svg>
            </div>
            <span class="mind-label">DELIVERY 🛵</span>
        </div>

        <!-- 📦 Paquetes & E-Commerce -->
        <div class="mind-item item-package" title="Paquetería & E-Commerce">
            <div class="mind-bubble-inner glow-amber">
                <svg viewBox="0 0 24 24" class="mind-icon">
                    <path d="M12 3L2 8l10 5 10-5-10-5zm-8.8 7.3L11 14.2v6.5L3.2 16.3V10.3zm17.6 0v6l-7.8 4.4v-6.5l7.8-3.9z" fill="#fbbf24"/>
                    <path d="M12 8.5L7 6l5-2.5L17 6l-5 2.5z" fill="#d97706"/>
                </svg>
            </div>
            <span class="mind-label">ENVÍOS 📦</span>
        </div>
    </div>

    <!-- 3. Avatar Vectorial del Programador (Álvaro Valenzuela) -->
    <div class="programmer-avatar-wrapper">
        <svg class="programmer-svg" viewBox="0 0 240 220" width="100%" height="100%">
            <defs>
                <!-- Skin Gradients -->
                <linearGradient id="skinGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#fed777"/>
                    <stop offset="60%" stop-color="#fbc02d"/>
                    <stop offset="100%" stop-color="#f59e0b"/>
                </linearGradient>
                <linearGradient id="hairGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#ffe082"/>
                    <stop offset="40%" stop-color="#ffca28"/>
                    <stop offset="100%" stop-color="#f57f17"/>
                </linearGradient>
                <linearGradient id="laptopBodyGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#d8b4fe"/>
                    <stop offset="50%" stop-color="#a855f7"/>
                    <stop offset="100%" stop-color="#7e22ce"/>
                </linearGradient>
                <linearGradient id="screenBeamGrad" x1="0%" y1="100%" x2="0%" y2="0%">
                    <stop offset="0%" stop-color="rgba(168, 85, 247, 0.4)"/>
                    <stop offset="70%" stop-color="rgba(56, 189, 248, 0.25)"/>
                    <stop offset="100%" stop-color="rgba(255, 255, 255, 0)"/>
                </linearGradient>
                <linearGradient id="shirtGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#1e293b"/>
                    <stop offset="100%" stop-color="#0f172a"/>
                </linearGradient>
                <filter id="avatarGlow" x="-20%" y="-20%" width="140%" height="140%">
                    <feGaussianBlur stdDeviation="4" result="blur" />
                    <feComposite in="SourceGraphic" in2="blur" operator="over" />
                </filter>
                <filter id="lightSpeedSparks" x="-30%" y="-30%" width="160%" height="160%">
                    <feGaussianBlur stdDeviation="2" result="blur" />
                    <feColorMatrix type="matrix" values="1 0 0 0 0  0 1 0 0 0.8  0 0 1 0 1  0 0 0 2 0"/>
                </filter>
            </defs>

            <!-- Holographic Screen Light Projecting upwards onto Developer -->
            <polygon points="70,165 170,165 195,50 45,50" fill="url(#screenBeamGrad)" class="screen-beam-glow"/>

            <!-- Torso / Shoulders -->
            <path d="M60 215 C60 175 80 160 120 160 C160 160 180 175 180 215 Z" fill="url(#shirtGrad)"/>
            <!-- Collar / Tech Accent -->
            <path d="M105 160 L120 175 L135 160" stroke="#38bdf8" stroke-width="2" fill="none" stroke-linecap="round"/>

            <!-- Neck -->
            <rect x="110" y="130" width="20" height="24" rx="4" fill="#f59e0b"/>

            <!-- HEAD GROUP -->
            <g class="dev-head-group">
                <!-- Hair Back / Volume -->
                <path d="M85 70 C75 55 85 25 120 25 C155 25 165 55 155 70 C165 85 162 105 155 110 C145 125 95 125 85 110 C78 105 75 85 85 70 Z" fill="url(#hairGrad)"/>

                <!-- Ears -->
                <ellipse cx="86" cy="88" rx="6" ry="9" fill="#fbc02d"/>
                <ellipse cx="154" cy="88" rx="6" ry="9" fill="#fbc02d"/>

                <!-- Face Base -->
                <path d="M90 70 C90 55 100 48 120 48 C140 48 150 55 150 70 C150 100 145 125 120 125 C95 125 90 100 90 70 Z" fill="url(#skinGrad)"/>

                <!-- Hair Front Wave / Stylish Fringe -->
                <path d="M88 56 C95 38 115 32 120 42 C125 32 145 38 152 56 C155 64 148 68 142 62 C135 56 128 58 120 64 C112 58 105 56 98 62 C92 68 85 64 88 56 Z" fill="url(#hairGrad)"/>
                <path d="M96 46 C105 38 115 38 122 46" stroke="#ffe082" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                <path d="M125 44 C135 38 145 42 148 48" stroke="#ffe082" stroke-width="2" stroke-linecap="round" fill="none"/>

                <!-- Eyebrows -->
                <path d="M98 72 Q106 68 113 72" stroke="#8d4b00" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                <path d="M127 72 Q134 68 142 72" stroke="#8d4b00" stroke-width="2.5" stroke-linecap="round" fill="none"/>

                <!-- Eyes (Blinking Animation) -->
                <g class="dev-eyes">
                    <ellipse cx="106" cy="82" rx="4.5" ry="5.5" fill="#1e293b"/>
                    <circle cx="104.5" cy="80" r="1.8" fill="#ffffff"/>
                    
                    <ellipse cx="134" cy="82" rx="4.5" ry="5.5" fill="#1e293b"/>
                    <circle cx="132.5" cy="80" r="1.8" fill="#ffffff"/>
                </g>

                <!-- Nose -->
                <path d="M120 82 L118 92 L122 92" stroke="#d97706" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>

                <!-- Cheeks / Glow -->
                <circle cx="98" cy="94" r="5" fill="rgba(239, 68, 68, 0.25)"/>
                <circle cx="142" cy="94" r="5" fill="rgba(239, 68, 68, 0.25)"/>

                <!-- Smiling Mouth -->
                <path d="M109 102 Q120 114 131 102" stroke="#991b1b" stroke-width="3" stroke-linecap="round" fill="#be123c"/>
                <path d="M112 103 Q120 108 128 103" fill="#ffffff"/>
            </g>

            <!-- WAVING HAND (Right Arm / Hand: Saludando 👋) -->
            <g class="arm-waving" id="devWavingArm">
                <!-- Upper arm & Forearm lifting up to wave -->
                <path d="M165 170 Q195 140 190 100" stroke="#fbc02d" stroke-width="16" stroke-linecap="round" fill="none"/>
                <!-- Waving Palm & Fingers -->
                <g class="waving-palm" transform="translate(190, 85)">
                    <circle cx="0" cy="0" r="9" fill="#fbc02d"/>
                    <!-- Fingers waving -->
                    <rect x="-7" y="-14" width="3.5" height="10" rx="1.7" fill="#fbc02d"/>
                    <rect x="-3" y="-17" width="3.5" height="13" rx="1.7" fill="#fbc02d"/>
                    <rect x="1" y="-16" width="3.5" height="12" rx="1.7" fill="#fbc02d"/>
                    <rect x="5" y="-12" width="3.5" height="9" rx="1.7" fill="#fbc02d"/>
                    <!-- Thumb -->
                    <path d="M-6 -2 Q-12 -2 -10 4 Q-8 8 -4 4 Z" fill="#fbc02d"/>
                    <!-- Friendly Motion Sparks -->
                    <path d="M-12 -18 Q-8 -22 -4 -20" stroke="#fcd34d" stroke-width="1.8" stroke-linecap="round" fill="none" class="wave-spark spark-1"/>
                    <path d="M2 -23 Q8 -25 12 -20" stroke="#fcd34d" stroke-width="1.8" stroke-linecap="round" fill="none" class="wave-spark spark-2"/>
                </g>
            </g>

            <!-- SPEED OF LIGHT TYPING SPARKS & LASER CODE BEAMS -->
            <g class="lightspeed-particles">
                <!-- Laser Keystroke Rays shooting upwards -->
                <line x1="90" y1="165" x2="80" y2="135" stroke="#38bdf8" stroke-width="2" stroke-linecap="round" class="spark-ray ray-l1"/>
                <line x1="105" y1="165" x2="100" y2="128" stroke="#a855f7" stroke-width="2.5" stroke-linecap="round" class="spark-ray ray-l2"/>
                <line x1="120" y1="165" x2="120" y2="120" stroke="#fcd34d" stroke-width="2" stroke-linecap="round" class="spark-ray ray-l3"/>
                <line x1="135" y1="165" x2="140" y2="128" stroke="#34d399" stroke-width="2.5" stroke-linecap="round" class="spark-ray ray-l4"/>
                <line x1="150" y1="165" x2="160" y2="135" stroke="#38bdf8" stroke-width="2" stroke-linecap="round" class="spark-ray ray-l5"/>

                <!-- Micro Code Sparks -->
                <text x="82" y="145" fill="#38bdf8" font-size="8" font-family="monospace" font-weight="bold" class="spark-code code-1">01</text>
                <text x="145" y="140" fill="#a855f7" font-size="8" font-family="monospace" font-weight="bold" class="spark-code code-2">&lt;/&gt;</text>
                <text x="115" y="130" fill="#fcd34d" font-size="9" font-family="monospace" font-weight="bold" class="spark-code code-3">⚡</text>
                <text x="95" y="125" fill="#34d399" font-size="7" font-family="monospace" font-weight="bold" class="spark-code code-4">AI</text>
                <text x="132" y="122" fill="#38bdf8" font-size="7" font-family="monospace" font-weight="bold" class="spark-code code-5">{}</text>
            </g>

            <!-- LAPTOP BASE & SCREEN -->
            <!-- Laptop Display Lid (Facing Front) -->
            <rect x="75" y="135" width="90" height="60" rx="7" fill="url(#laptopBodyGrad)" stroke="rgba(255,255,255,0.4)" stroke-width="1.2" class="laptop-lid"/>
            
            <!-- REW / Tech Monogram on Laptop Lid -->
            <g class="laptop-logo" transform="translate(120, 163)">
                <circle cx="0" cy="0" r="9" fill="rgba(15, 23, 42, 0.4)" stroke="rgba(255,255,255,0.2)" stroke-width="0.8"/>
                <!-- Windows/Tech 4-Square Style + REW Innovation -->
                <rect x="-5" y="-5" width="4.2" height="4.2" rx="0.8" fill="#38bdf8" class="logo-sq sq-1"/>
                <rect x="0.8" y="-5" width="4.2" height="4.2" rx="0.8" fill="#a855f7" class="logo-sq sq-2"/>
                <rect x="-5" y="0.8" width="4.2" height="4.2" rx="0.8" fill="#34d399" class="logo-sq sq-3"/>
                <rect x="0.8" y="0.8" width="4.2" height="4.2" rx="0.8" fill="#f59e0b" class="logo-sq sq-4"/>
            </g>

            <!-- Laptop Keyboard Surface (Front Bevel) -->
            <path d="M65 195 L175 195 L185 208 L55 208 Z" fill="#475569" stroke="#334155" stroke-width="1"/>
            <rect x="80" y="197" width="80" height="7" rx="1.5" fill="#1e293b" class="keyboard-glow"/>

            <!-- HYPER-SPEED TYPING HANDS (Teclando a la velocidad de la luz) -->
            <!-- Left Hand (Typing at light-speed) -->
            <g class="hand-typing-left">
                <!-- Arm -->
                <path d="M68 185 Q75 195 86 195" stroke="#fbc02d" stroke-width="13" stroke-linecap="round" fill="none"/>
                <!-- Hand / Fingers tapping -->
                <ellipse cx="88" cy="195" rx="8" ry="6" fill="#fbc02d"/>
                <circle cx="83" cy="194" r="2.5" fill="#fed777"/>
                <circle cx="88" cy="193" r="2.5" fill="#fed777"/>
                <circle cx="93" cy="194" r="2.5" fill="#fed777"/>
            </g>

            <!-- Right Hand (Typing at light-speed during hyper-mode) -->
            <g class="hand-typing-right" id="devTypingHandRight">
                <!-- Arm -->
                <path d="M172 185 Q165 195 154 195" stroke="#fbc02d" stroke-width="13" stroke-linecap="round" fill="none"/>
                <!-- Hand / Fingers tapping -->
                <ellipse cx="152" cy="195" rx="8" ry="6" fill="#fbc02d"/>
                <circle cx="147" cy="194" r="2.5" fill="#fed777"/>
                <circle cx="152" cy="193" r="2.5" fill="#fed777"/>
                <circle cx="157" cy="194" r="2.5" fill="#fed777"/>
            </g>
        </svg>
    </div>

    <!-- 4. Interactive Live Status Badge -->
    <div class="avatar-status-pill" id="avatarStatusPill">
        <span class="status-pulse-dot"></span>
        <span class="status-text" id="avatarStatusText">⚡ CODIFICANDO A LA VELOCIDAD DE LA LUZ</span>
    </div>
</div>

<style>
/* ==========================================================
   FOUNDER ANIMATED AVATAR: CYBER-OCEAN & HYPER-SPEED TYPING
   ========================================================== */
.founder-avatar-stage {
    position: relative;
    width: 100%;
    max-width: 320px;
    margin: 0 auto 1.25rem;
    border-radius: 20px;
    background: radial-gradient(circle at 50% 20%, #1e3a8a 0%, #0f172a 60%, #060d19 100%);
    border: 1px solid rgba(56, 189, 248, 0.3);
    box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.8), 0 0 25px rgba(56, 189, 248, 0.2);
    overflow: visible;
    padding: 1.25rem 0.75rem 1rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.3s ease;
    user-select: none;
}

.founder-avatar-stage:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 45px -10px rgba(15, 23, 42, 0.9), 0 0 35px rgba(56, 189, 248, 0.35);
    border-color: rgba(56, 189, 248, 0.6);
}

/* 1. Cyber-Ocean Backdrop & Branding */
.ocean-backdrop {
    position: absolute;
    inset: 0;
    border-radius: 20px;
    overflow: hidden;
    pointer-events: none;
    z-index: 1;
}

.ocean-rew-brand {
    position: absolute;
    top: 10px;
    left: 14px;
    display: flex;
    flex-direction: column;
    line-height: 1;
    opacity: 0.65;
    transition: opacity 0.3s ease;
}
.founder-avatar-stage:hover .ocean-rew-brand {
    opacity: 0.95;
}
.brand-rew-text {
    font-size: 0.82rem;
    font-weight: 900;
    letter-spacing: 0.12em;
    color: #38bdf8;
    text-shadow: 0 0 10px rgba(56, 189, 248, 0.6);
}
.brand-rew-sub {
    font-size: 0.45rem;
    font-weight: 700;
    letter-spacing: 0.15em;
    color: #94a3b8;
}

/* Marine Bubbles */
.ocean-bubble {
    position: absolute;
    border-radius: 50%;
    background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.8), rgba(56, 189, 248, 0.3));
    box-shadow: 0 0 8px rgba(56, 189, 248, 0.5);
    pointer-events: none;
    animation: bubbleRise 6s infinite linear;
}
.bubble-1 { width: 8px; height: 8px; left: 15%; bottom: -10px; animation-duration: 5s; animation-delay: 0s; }
.bubble-2 { width: 5px; height: 5px; left: 80%; bottom: -10px; animation-duration: 7s; animation-delay: 1.5s; }
.bubble-3 { width: 10px; height: 10px; left: 45%; bottom: -10px; animation-duration: 6.5s; animation-delay: 3s; }
.bubble-4 { width: 6px; height: 6px; left: 25%; bottom: -10px; animation-duration: 8s; animation-delay: 2s; }
.bubble-5 { width: 7px; height: 7px; left: 70%; bottom: -10px; animation-duration: 5.5s; animation-delay: 0.8s; }
.bubble-6 { width: 4px; height: 4px; left: 90%; bottom: -10px; animation-duration: 6.8s; animation-delay: 2.7s; }

@keyframes bubbleRise {
    0% { transform: translateY(0) translateX(0); opacity: 0; }
    20% { opacity: 0.7; }
    80% { opacity: 0.7; }
    100% { transform: translateY(-240px) translateX(15px); opacity: 0; }
}

/* Floating Diatom & Jelly Shapes */
.marine-shape {
    position: absolute;
    pointer-events: none;
    opacity: 0.4;
    animation: marineDrift 10s infinite ease-in-out alternate;
}
.shape-hex {
    width: 14px;
    height: 14px;
    top: 25%;
    left: 8%;
    border: 1px dashed rgba(56, 189, 248, 0.6);
    transform: rotate(45deg);
    animation-duration: 8s;
}
.shape-tri {
    width: 12px;
    height: 12px;
    top: 35%;
    right: 8%;
    border: 1px solid rgba(45, 212, 191, 0.5);
    border-radius: 2px;
    animation-duration: 12s;
    animation-delay: -3s;
}
.shape-jelly {
    width: 24px;
    height: 24px;
    bottom: 25%;
    left: 6%;
    animation: jellyFloat 6s infinite ease-in-out;
}
.jelly-svg {
    width: 100%;
    height: 100%;
    filter: drop-shadow(0 0 6px rgba(56, 189, 248, 0.4));
}

@keyframes marineDrift {
    0% { transform: translateY(0) rotate(0deg); }
    100% { transform: translateY(-25px) rotate(180deg); }
}
@keyframes jellyFloat {
    0%, 100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-12px) scale(1.08, 0.92); }
}

/* Ocean Waves at Bottom */
.ocean-waves-wrapper {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 60px;
    overflow: hidden;
    pointer-events: none;
}
.ocean-wave-svg {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 200%;
    height: 100%;
}
.wave-back {
    animation: waveScroll 10s linear infinite;
    opacity: 0.6;
}
.wave-mid {
    animation: waveScroll 7s linear infinite reverse;
    opacity: 0.7;
}
.wave-front {
    animation: waveScroll 5s linear infinite;
    opacity: 0.8;
}
@keyframes waveScroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

/* ==========================================================
   2. THOUGHT MATRIX & LOGISTICS CLOUD (IDEAS, SHIP, PLANE, ETC)
   ========================================================== */
.thought-matrix-cloud {
    position: absolute;
    top: -24px;
    left: 50%;
    transform: translateX(-50%);
    width: 310px;
    height: 110px;
    pointer-events: none;
    z-index: 10;
}

.mind-item {
    position: absolute;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 2px;
    pointer-events: auto;
    cursor: pointer;
    transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
}
.mind-item:hover {
    transform: scale(1.25) !important;
    z-index: 20;
}

.mind-bubble-inner {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(15, 23, 42, 0.85);
    border: 1.5px solid rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    backdrop-filter: blur(6px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
}
.mind-icon {
    width: 18px;
    height: 18px;
    filter: drop-shadow(0 0 4px currentColor);
}
.mind-label {
    font-size: 0.55rem;
    font-weight: 800;
    letter-spacing: 0.05em;
    color: #e2e8f0;
    background: rgba(15, 23, 42, 0.8);
    padding: 1px 5px;
    border-radius: 4px;
    border: 1px solid rgba(255,255,255,0.1);
    white-space: nowrap;
    text-shadow: 0 1px 3px rgba(0,0,0,0.8);
}

/* Individual Mind Bubble Glowing Borders */
.glow-gold { border-color: #f59e0b; box-shadow: 0 0 12px rgba(245, 158, 11, 0.5); }
.glow-cyan { border-color: #38bdf8; box-shadow: 0 0 12px rgba(56, 189, 248, 0.5); }
.glow-blue { border-color: #0284c7; box-shadow: 0 0 12px rgba(2, 132, 199, 0.5); }
.glow-teal { border-color: #2dd4bf; box-shadow: 0 0 12px rgba(45, 212, 191, 0.5); }
.glow-emerald { border-color: #34d399; box-shadow: 0 0 12px rgba(52, 211, 153, 0.5); }
.glow-purple { border-color: #c084fc; box-shadow: 0 0 12px rgba(192, 132, 252, 0.5); }
.glow-amber { border-color: #fbbf24; box-shadow: 0 0 12px rgba(251, 191, 36, 0.5); }

.code-text {
    font-size: 0.58rem;
    font-family: monospace;
    font-weight: 900;
    color: #38bdf8;
    text-shadow: 0 0 6px rgba(56, 189, 248, 0.8);
}

/* Coordinates & Floating Animations for Mind Elements */
/* 1. 💡 Idea (Center Top) */
.item-idea {
    top: -12px;
    left: 45%;
    animation: orbitFloatCenter 3.8s ease-in-out infinite alternate;
}
.mind-ray {
    position: absolute;
    background: #fcd34d;
    border-radius: 2px;
    animation: rayPulse 1.5s infinite alternate;
}
.ray-1 { width: 2px; height: 6px; top: -6px; left: 15px; }
.ray-2 { width: 5px; height: 2px; top: 15px; left: -6px; }
.ray-3 { width: 5px; height: 2px; top: 15px; right: -6px; }
@keyframes rayPulse {
    0% { transform: scale(0.6); opacity: 0.3; }
    100% { transform: scale(1.3); opacity: 1; filter: drop-shadow(0 0 4px #fbbf24); }
}

/* 2. 💻 Code (Top Left) */
.item-code {
    top: 6px;
    left: 18%;
    animation: orbitFloatLeft 4.2s ease-in-out infinite alternate;
}

/* 3. ✈️ Avión (Top Right Flying Trajectory) */
.item-plane {
    top: 2px;
    right: 14%;
    animation: orbitFloatRight 3.6s ease-in-out infinite alternate;
}
.plane-trail {
    position: absolute;
    bottom: -2px;
    left: -8px;
    width: 14px;
    height: 2px;
    background: linear-gradient(90deg, transparent, #38bdf8);
    animation: jetTrail 1s infinite alternate;
}
@keyframes jetTrail {
    0% { width: 6px; opacity: 0.4; }
    100% { width: 16px; opacity: 1; }
}

/* 4. 🚢 Barco (Far Left Lower) */
.item-ship {
    top: 50px;
    left: 0%;
    animation: shipSailing 4.6s ease-in-out infinite alternate;
}

/* 5. 🚚 Camión (Far Right Lower) */
.item-truck {
    top: 48px;
    right: 0%;
    animation: truckDrive 4.4s ease-in-out infinite alternate;
}

/* 6. 🛵 Delivery (Bottom Left Near Avatar) */
.item-delivery {
    top: 85px;
    left: 8%;
    animation: deliveryBounce 3.2s ease-in-out infinite alternate;
}

/* 7. 📦 Paquete (Bottom Right Near Avatar) */
.item-package {
    top: 85px;
    right: 8%;
    animation: packagePop 3.5s ease-in-out infinite alternate;
}

/* Keyframes for Neural Matrix Stream */
@keyframes orbitFloatCenter {
    0% { transform: translateY(0) scale(1); }
    100% { transform: translateY(-8px) scale(1.08); }
}
@keyframes orbitFloatLeft {
    0% { transform: translateY(0) translateX(0) rotate(-3deg); }
    100% { transform: translateY(-6px) translateX(-4px) rotate(4deg); }
}
@keyframes orbitFloatRight {
    0% { transform: translateY(0) translateX(0) rotate(4deg); }
    100% { transform: translateY(-8px) translateX(5px) rotate(-3deg); }
}
@keyframes shipSailing {
    0% { transform: translateY(0) rotate(-2deg); }
    50% { transform: translateY(-4px) rotate(3deg); }
    100% { transform: translateY(2px) rotate(-1deg); }
}
@keyframes truckDrive {
    0% { transform: translateX(0) translateY(0); }
    100% { transform: translateX(4px) translateY(-5px); }
}
@keyframes deliveryBounce {
    0% { transform: translateY(0) scale(0.95); }
    100% { transform: translateY(-5px) scale(1.05); }
}
@keyframes packagePop {
    0% { transform: translateY(0) rotate(0deg); }
    100% { transform: translateY(-6px) rotate(8deg); }
}

/* ==========================================================
   3. AVATAR VECTORIAL DEL PROGRAMADOR (ÁLVARO) & ANIMACIONES
   ========================================================== */
.programmer-avatar-wrapper {
    position: relative;
    width: 210px;
    height: 190px;
    z-index: 5;
    margin-top: 2.2rem;
    margin-bottom: 0.25rem;
}
.programmer-svg {
    overflow: visible;
}

/* Head gentle thinking nod & breathing */
.dev-head-group {
    transform-origin: 120px 120px;
    animation: devThinking 4s ease-in-out infinite;
}
@keyframes devThinking {
    0%, 100% { transform: rotate(0deg) translateY(0); }
    25% { transform: rotate(-2deg) translateY(-1px); }
    75% { transform: rotate(2deg) translateY(1px); }
}

/* Eye Blinking */
.dev-eyes {
    transform-origin: 120px 82px;
    animation: devBlink 5s infinite;
}
@keyframes devBlink {
    0%, 46%, 50%, 100% { transform: scaleY(1); }
    48% { transform: scaleY(0.1); }
}

/* Screen Light Beam onto Developer */
.screen-beam-glow {
    animation: screenPulse 1.8s infinite alternate ease-in-out;
}
@keyframes screenPulse {
    0% { opacity: 0.35; }
    100% { opacity: 0.85; }
}

/* REW 4-Square Tech Logo Glow on Laptop */
.logo-sq {
    animation: logoSquareGlow 2s infinite alternate ease-in-out;
}
.sq-1 { animation-delay: 0s; }
.sq-2 { animation-delay: 0.5s; }
.sq-3 { animation-delay: 1s; }
.sq-4 { animation-delay: 1.5s; }
@keyframes logoSquareGlow {
    0% { opacity: 0.7; filter: drop-shadow(0 0 1px currentColor); }
    100% { opacity: 1; filter: drop-shadow(0 0 6px currentColor); }
}

/* Keyboard Glow Base */
.keyboard-glow {
    animation: kbFlash 0.2s infinite alternate;
}
@keyframes kbFlash {
    0% { fill: #1e293b; }
    100% { fill: #38bdf8; filter: drop-shadow(0 0 6px #38bdf8); }
}

/* ==========================================================
   ANIMACIÓN: WAVING ARM (SALUDANDO 👋)
   ========================================================== */
.arm-waving {
    transform-origin: 165px 170px;
    animation: waveSequence 7s infinite ease-in-out;
}
.waving-palm {
    transform-origin: 0 0;
    animation: handWaveSwing 0.6s infinite alternate ease-in-out;
}
.wave-spark {
    animation: sparkFlash 0.5s infinite alternate;
}
.spark-1 { animation-delay: 0.1s; }
.spark-2 { animation-delay: 0.3s; }

@keyframes waveSequence {
    /* 0% to 35%: SALUDANDO ACTIVAMENTE */
    0% { transform: scale(1) translateY(0); opacity: 1; pointer-events: auto; }
    5% { transform: translateY(-5px) rotate(6deg); opacity: 1; }
    25% { transform: translateY(-8px) rotate(-4deg); opacity: 1; }
    35% { transform: translateY(0) rotate(0deg); opacity: 1; }
    /* 40% to 90%: BAJA EL BRAZO PARA TECLEAR A TODA VELOCIDAD */
    42% { transform: translateY(22px) rotate(-35deg) scale(0.85); opacity: 0; pointer-events: none; }
    92% { transform: translateY(22px) rotate(-35deg) scale(0.85); opacity: 0; pointer-events: none; }
    96% { transform: translateY(0) rotate(0deg); opacity: 1; }
    100% { transform: translateY(0) rotate(0deg); opacity: 1; }
}

@keyframes handWaveSwing {
    0% { transform: rotate(-18deg); }
    100% { transform: rotate(22deg); }
}

@keyframes sparkFlash {
    0% { opacity: 0.2; transform: scale(0.8); }
    100% { opacity: 1; transform: scale(1.2); }
}

/* ==========================================================
   ANIMACIÓN: TYPING AT LIGHT SPEED (TECLEANDO A LA VELOCIDAD DE LA LUZ ⚡)
   ========================================================== */
.hand-typing-left {
    transform-origin: 88px 195px;
    animation: hyperTypeLeft 0.12s infinite alternate ease-in-out;
}
@keyframes hyperTypeLeft {
    0% { transform: translateY(0) translateX(0) scale(1); }
    50% { transform: translateY(-4px) translateX(2px) scale(1.05); }
    100% { transform: translateY(3px) translateX(-2px) scale(0.96); }
}

.hand-typing-right {
    transform-origin: 152px 195px;
    animation: hyperTypeRightSync 7s infinite ease-in-out;
}
@keyframes hyperTypeRightSync {
    /* When waving (0-38%), hide the right typing hand */
    0%, 38% { opacity: 0; transform: translateY(10px) scale(0.8); }
    /* When coding in hyper-mode (42-92%), type at hyper speed */
    42%, 92% { opacity: 1; transform: translateY(0) scale(1); }
    96%, 100% { opacity: 0; transform: translateY(10px) scale(0.8); }
}

/* Continuous lightspeed jitter on right hand when active */
.founder-avatar-stage:hover .hand-typing-right,
.founder-avatar-stage.force-typing .hand-typing-right {
    animation: hyperTypeRight 0.11s infinite alternate ease-in-out !important;
    opacity: 1 !important;
}
.founder-avatar-stage:hover .arm-waving,
.founder-avatar-stage.force-typing .arm-waving {
    opacity: 0 !important;
}

@keyframes hyperTypeRight {
    0% { transform: translateY(3px) translateX(-2px) scale(0.96); }
    50% { transform: translateY(-4px) translateX(2px) scale(1.05); }
    100% { transform: translateY(0) translateX(0) scale(1); }
}

/* Speed of Light Particles & Laser Rays */
.spark-ray {
    animation: laserShoot 0.4s infinite ease-out;
}
.ray-l1 { animation-delay: 0.05s; }
.ray-l2 { animation-delay: 0.15s; }
.ray-l3 { animation-delay: 0.25s; }
.ray-l4 { animation-delay: 0.35s; }
.ray-l5 { animation-delay: 0.1s; }

@keyframes laserShoot {
    0% { stroke-dasharray: 2 10; stroke-dashoffset: 0; opacity: 0; }
    50% { opacity: 1; }
    100% { stroke-dasharray: 10 2; stroke-dashoffset: -30; opacity: 0; }
}

.spark-code {
    animation: codeSparksBurst 1.2s infinite ease-out;
}
.code-1 { animation-delay: 0.1s; }
.code-2 { animation-delay: 0.4s; }
.code-3 { animation-delay: 0.7s; }
.code-4 { animation-delay: 0.9s; }
.code-5 { animation-delay: 0.3s; }

@keyframes codeSparksBurst {
    0% { transform: translateY(0) scale(0.5); opacity: 0; }
    40% { opacity: 1; filter: drop-shadow(0 0 5px currentColor); }
    100% { transform: translateY(-35px) scale(1.2); opacity: 0; }
}

/* ==========================================================
   4. INTERACTIVE LIVE STATUS BADGE
   ========================================================== */
.avatar-status-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(15, 23, 42, 0.85);
    border: 1px solid rgba(56, 189, 248, 0.4);
    padding: 4px 12px;
    border-radius: 9999px;
    font-size: 0.65rem;
    font-weight: 800;
    letter-spacing: 0.04em;
    color: #38bdf8;
    backdrop-filter: blur(8px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
    position: relative;
    z-index: 8;
    margin-top: 4px;
    cursor: pointer;
    transition: all 0.25s ease;
}
.avatar-status-pill:hover {
    background: rgba(56, 189, 248, 0.2);
    border-color: #38bdf8;
    box-shadow: 0 0 15px rgba(56, 189, 248, 0.6);
    color: #ffffff;
}
.status-pulse-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #22c55e;
    box-shadow: 0 0 8px #22c55e;
    animation: statusPulse 1.2s infinite ease-in-out;
}
@keyframes statusPulse {
    0%, 100% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.4); opacity: 0.6; }
}

/* Mobile responsive adjustments */
@media (max-width: 480px) {
    .founder-avatar-stage {
        max-width: 290px;
    }
    .thought-matrix-cloud {
        width: 280px;
    }
    .mind-bubble-inner {
        width: 28px;
        height: 28px;
    }
    .mind-icon {
        width: 15px;
        height: 15px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const stage = document.getElementById('founderAvatarStage');
    const statusText = document.getElementById('avatarStatusText');
    const statusPill = document.getElementById('avatarStatusPill');

    if (!stage || !statusText) return;

    const statusPhrases = [
        '⚡ CODIFICANDO A LA VELOCIDAD DE LA LUZ',
        '👋 ¡HOLA! CONECTEMOS TU PROYECTO',
        '💡 ARQUITECTURA DE SOFTWARE & IA',
        '✈️📦 DESPACHANDO SOLUCIONES GLOBALES',
        '🚢 E-COMMERCE & LOGÍSTICA ESCALABLE'
    ];
    let phraseIndex = 0;

    // Cycle status phrases smoothly
    setInterval(() => {
        phraseIndex = (phraseIndex + 1) % statusPhrases.length;
        statusText.style.opacity = '0';
        setTimeout(() => {
            statusText.textContent = statusPhrases[phraseIndex];
            statusText.style.opacity = '1';
        }, 300);
    }, 3800);

    // Interactive Boost on Click
    if (statusPill) {
        statusPill.addEventListener('click', () => {
            stage.classList.toggle('force-typing');
            if (stage.classList.contains('force-typing')) {
                statusText.textContent = '🚀 MODO HIPER-VELOCIDAD ACTIVADO';
            } else {
                statusText.textContent = statusPhrases[phraseIndex];
            }
        });
    }
});
</script>
