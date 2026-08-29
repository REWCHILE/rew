<!-- 1. Floating WhatsApp Button (Bottom Left) -->
<a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('¡Hola Álvaro! Vengo desde rew.cl y me gustaría cotizar un proyecto.') }}" 
   class="floating-whatsapp-btn" 
   target="_blank" 
   rel="noopener noreferrer" 
   title="Escríbenos a WhatsApp (+56 9 8726 1127)" 
   aria-label="Contacto directo por WhatsApp">
    <svg width="34" height="34" viewBox="0 0 24 24" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.472 14.382c-.301-.15-1.782-.879-2.057-.979-.276-.1-.476-.15-.676.15s-.777.979-.952 1.18c-.176.2-.351.226-.652.075-.301-.15-1.272-.469-2.423-1.496-.896-.799-1.501-1.786-1.677-2.087-.175-.301-.019-.464.132-.614.136-.135.301-.351.451-.527.151-.175.201-.301.301-.501.1-.2.05-.376-.025-.526-.075-.15-.677-1.631-.928-2.234-.244-.587-.492-.508-.676-.517l-.577-.01c-.2 0-.527.075-.802.376s-1.053 1.028-1.053 2.508 1.078 2.909 1.229 3.109c.15.2 2.122 3.24 5.141 4.544.718.31 1.279.495 1.716.634.721.23 1.377.198 1.896.12.578-.087 1.782-.727 2.032-1.429.251-.702.251-1.304.176-1.43-.075-.125-.276-.201-.577-.351z"/>
        <path d="M12.004 2c-5.523 0-10 4.477-10 10 0 1.765.459 3.424 1.264 4.871l-1.343 4.908 5.035-1.321c1.401.763 3.003 1.2 4.704 1.2 5.523 0 10-4.477 10-10s-4.477-10-10-10zm0 18.25c-1.536 0-2.977-.417-4.223-1.144l-.303-.178-3.136.822.837-3.056-.195-.31c-.799-1.272-1.23-2.753-1.23-4.384 0-4.549 3.701-8.25 8.25-8.25s8.25 3.701 8.25 8.25-3.701 8.25-8.25 8.25z"/>
    </svg>
</a>

<!-- 2. Floating Multi-Language & Multi-Currency Switcher (Bottom Right) -->
<div class="floating-lang-currency-widget">
    <!-- Trigger Button -->
    <button type="button" class="lang-currency-toggle-btn" aria-label="Seleccionar Idioma y Moneda">
        <span class="active-flag-icon">🇨🇱</span>
        <span class="active-lang-currency-text">ES / CLP</span>
        <span class="chevron-icon">▲</span>
    </button>

    <!-- Dropdown Menu matching exact user design -->
    <div class="lang-currency-popup">
        <!-- Language Section -->
        <div class="popup-section-header">SELECCIONAR IDIOMA</div>
        <div class="lang-options-list">
            <button type="button" class="lang-option-btn active" data-lang="es" data-flag="🇨🇱" data-name="ES">
                <span class="flag">🇨🇱</span>
                <span class="name">Español</span>
            </button>
            <button type="button" class="lang-option-btn" data-lang="en" data-flag="🇺🇸" data-name="EN">
                <span class="flag">🇺🇸</span>
                <span class="name">English</span>
            </button>
            <button type="button" class="lang-option-btn" data-lang="pt" data-flag="🇧🇷" data-name="PT">
                <span class="flag">🇧🇷</span>
                <span class="name">Português</span>
            </button>
            <button type="button" class="lang-option-btn" data-lang="fr" data-flag="🇫🇷" data-name="FR">
                <span class="flag">🇫🇷</span>
                <span class="name">Français</span>
            </button>
            <button type="button" class="lang-option-btn" data-lang="de" data-flag="🇩🇪" data-name="DE">
                <span class="flag">🇩🇪</span>
                <span class="name">Deutsch</span>
            </button>
            <button type="button" class="lang-option-btn" data-lang="it" data-flag="🇮🇹" data-name="IT">
                <span class="flag">🇮🇹</span>
                <span class="name">Italiano</span>
            </button>
            <button type="button" class="lang-option-btn" data-lang="zh-CN" data-flag="🇨🇳" data-name="ZH">
                <span class="flag">🇨🇳</span>
                <span class="name">简体中文</span>
            </button>
            <button type="button" class="lang-option-btn" data-lang="ja" data-flag="🇯🇵" data-name="JA">
                <span class="flag">🇯🇵</span>
                <span class="name">日本語</span>
            </button>
        </div>

        <!-- Currency Section -->
        <div class="popup-section-header" style="margin-top: 10px;">SELECCIONAR MONEDA</div>
        <div class="currency-options-list">
            <button type="button" class="currency-option-btn active" data-currency="CLP" data-flag="🇨🇱" data-code="CLP">
                <span class="flag">🇨🇱</span>
                <span class="name">CLP ($)</span>
            </button>
            <button type="button" class="currency-option-btn" data-currency="USD" data-flag="🇺🇸" data-code="USD">
                <span class="flag">🇺🇸</span>
                <span class="name">USD ($)</span>
            </button>
        </div>
    </div>
</div>


<!-- 3. Rich-E AI Chatbot Agent (Exact User Match) -->
<div class="floating-riche-bot">
    <!-- Toggle Button -->
    <button type="button" class="riche-toggle-btn" aria-label="Abrir asistente de IA Rich-E">
        <img src="{{ asset('images/riche-avatar.png') }}" alt="Rich-E" class="riche-btn-avatar">
        <span class="riche-status-dot"></span>
    </button>

    <!-- Chat Window Container -->
    <div class="riche-chat-window">
        <!-- Golden Yellow Header -->
        <div class="riche-header-custom">
            <div class="riche-header-left">
                <div class="riche-avatar-wrapper">
                    <img src="{{ asset('images/riche-avatar.png') }}" alt="Rich-E" class="riche-header-img">
                    <span class="avatar-online-dot"></span>
                </div>
                <div class="riche-header-titles">
                    <div class="riche-title-text">Rich-E</div>
                    <div class="riche-subtitle-text">Asistente virtual activo</div>
                </div>
            </div>
            
            <div class="riche-header-actions">
                <button type="button" class="riche-action-icon sound-toggle-btn" title="Activar/Desactivar Sonido">🔊</button>
                <button type="button" class="riche-action-icon export-chat-btn" title="Descargar Conversación">📥</button>
                <button type="button" class="riche-action-icon email-chat-btn" title="Enviar por Correo">✉️</button>
                <button type="button" class="riche-action-icon reset-chat-btn" title="Reiniciar Chat">🔄</button>
                <button type="button" class="riche-action-icon close-chat-btn" title="Cerrar">✕</button>
            </div>
        </div>

        <!-- Chat Messages Container -->
        <div class="riche-chat-messages" id="richeMessagesContainer">
            <div class="chat-bubble chat-bubble-bot">
                <div class="bubble-text">
                    ¡Hola! Soy <strong>Rich-E</strong>, tu asistente virtual inteligente. ¿En qué te puedo ayudar hoy?
                </div>
                <div class="bubble-time">{{ now()->format('H:i') }}</div>
            </div>
        </div>

        <!-- Suggested Chips -->
        <div class="riche-quick-chips">
            <button type="button" class="chip-btn" data-query="¿Cómo es el proceso de desarrollo de software en rew?">
                ¿Cómo es el proceso de desarrollo de software en rew?
            </button>
            <button type="button" class="chip-btn" data-query="¿Qué plugins de WordPress y WooCommerce ofrecen?">
                ¿Qué plugins de WordPress y WooCommerce ofrecen?
            </button>
            <button type="button" class="chip-btn" data-query="¿Cómo puedo cotizar un proyecto web a medida?">
                ¿Cómo puedo cotizar un proyecto web a medida?
            </button>
            <button type="button" class="chip-btn" data-query="Quiero hablar directamente con Álvaro Valenzuela por WhatsApp">
                Hablar con Álvaro por WhatsApp 📱
            </button>
        </div>

        <!-- Input Bar with Yellow Send Button -->
        <div class="riche-input-bar">
            <input type="text" class="riche-input" id="richeChatInput" placeholder="Escribe tu mensaje..." aria-label="Escribe tu mensaje">
            <button type="button" class="riche-send-btn-yellow" id="richeSendBtn" aria-label="Enviar mensaje">
                <span>➔</span>
            </button>
        </div>
    </div>
</div>
