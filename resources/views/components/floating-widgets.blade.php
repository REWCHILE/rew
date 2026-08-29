<!-- 1. Floating WhatsApp Button (Bottom Left) -->
<a href="https://api.whatsapp.com/send?phone=56987261127&text={{ urlencode('¡Hola Álvaro! Vengo desde rew.cl y me gustaría cotizar un proyecto.') }}" 
   class="floating-whatsapp-btn" 
   target="_blank" 
   rel="noopener" 
   title="Escríbenos a WhatsApp (+56987261127)" 
   aria-label="Contacto directo por WhatsApp">
    <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.275.058.376-.058c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.159.57 4.184 1.564 5.946l-1.564 5.714 5.861-1.537c1.716.94 3.676 1.477 5.763 1.477 6.627 0 12-5.373 12-12 0-6.627-5.373-12-12-12z"/>
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
