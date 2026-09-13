<style>
/* ==========================================================================
   FLOATING WIDGETS BULLETPROOF POSITIONING & STYLES (FORCE INLINE OVERRIDES)
   ========================================================================== */
/* 1. WhatsApp CTA: Bottom-Left */
.floating-whatsapp-btn {
  position: fixed !important;
  bottom: 25px !important;
  left: 25px !important;
  right: auto !important;
  top: auto !important;
  width: 60px !important;
  height: 60px !important;
  background: #25d366 !important;
  color: #ffffff !important;
  border-radius: 50% !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  box-shadow: 0 6px 20px rgba(37, 211, 102, 0.45) !important;
  z-index: 9990 !important;
  transition: transform 0.3s ease, box-shadow 0.3s ease !important;
  text-decoration: none !important;
}

.floating-whatsapp-btn:hover {
  transform: scale(1.08) !important;
  box-shadow: 0 10px 25px rgba(37, 211, 102, 0.6) !important;
}

/* 2. Rich-E AI Bot: Strictly STACKED DIRECTLY ABOVE WHATSAPP CTA on Bottom-Left */
.floating-riche-bot {
  position: fixed !important;
  left: 25px !important;
  bottom: 96px !important; /* Stacked right on top of WhatsApp button */
  right: auto !important;
  top: auto !important;
  width: 60px !important;
  height: 60px !important;
  z-index: 9995 !important;
  display: block !important;
}

.floating-riche-bot .riche-toggle-btn {
  width: 60px !important;
  height: 60px !important;
  border-radius: 50% !important;
  background: linear-gradient(135deg, #ffc800 0%, #ff9e00 100%) !important;
  border: 3px solid #ffffff !important;
  box-shadow: 0 6px 24px rgba(255, 184, 0, 0.5) !important;
  cursor: pointer !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  position: relative !important;
  transition: transform 0.3s ease, box-shadow 0.3s ease !important;
  padding: 0 !important;
  margin: 0 !important;
  outline: none !important;
}

.floating-riche-bot .riche-toggle-btn:hover {
  transform: scale(1.08) !important;
  box-shadow: 0 10px 32px rgba(255, 184, 0, 0.7) !important;
}

.floating-riche-bot .riche-btn-avatar {
  width: 48px !important;
  height: 48px !important;
  border-radius: 50% !important;
  object-fit: cover !important;
  background: #ffffff !important;
  padding: 2px !important;
  display: block !important;
}

.floating-riche-bot .riche-status-dot {
  position: absolute !important;
  top: 0 !important;
  right: 0 !important;
  width: 16px !important;
  height: 16px !important;
  border-radius: 50% !important;
  background: #10b981 !important;
  border: 2.5px solid #ffffff !important;
}

/* Rich-E Chat Window: Expands to the right of the stacked left buttons */
.floating-riche-bot .riche-chat-window {
  position: fixed !important;
  bottom: 25px !important;
  left: 98px !important;
  right: auto !important;
  top: auto !important;
  width: 380px !important;
  max-width: calc(100vw - 120px) !important;
  height: 540px !important;
  max-height: calc(100vh - 40px) !important;
  background: #ffffff !important;
  border-radius: 20px !important;
  box-shadow: 0 20px 60px rgba(15, 23, 42, 0.25) !important;
  border: 1px solid rgba(226, 232, 240, 0.9) !important;
  overflow: hidden !important;
  z-index: 10005 !important;
  display: none !important;
  flex-direction: column !important;
}

.floating-riche-bot.open .riche-chat-window {
  display: flex !important;
}

/* 3. Floating Multi-Language & Multi-Currency Switcher: Bottom-Right */
.floating-lang-currency-widget {
  position: fixed !important;
  right: 25px !important;
  bottom: 25px !important;
  left: auto !important;
  top: auto !important;
  z-index: 9980 !important;
  display: block !important;
}

.floating-lang-currency-widget .lang-currency-toggle-btn {
  display: flex !important;
  align-items: center !important;
  gap: 8px !important;
  padding: 8px 14px !important;
  background: rgba(255, 255, 255, 0.96) !important;
  backdrop-filter: blur(12px) !important;
  -webkit-backdrop-filter: blur(12px) !important;
  border: 1px solid rgba(226, 232, 240, 0.9) !important;
  border-radius: 30px !important;
  box-shadow: 0 6px 20px rgba(15, 23, 42, 0.12) !important;
  cursor: pointer !important;
  font-size: 0.82rem !important;
  font-weight: 700 !important;
  color: #0f172a !important;
  transition: all 0.25s ease !important;
  outline: none !important;
}

.floating-lang-currency-widget .lang-currency-toggle-btn:hover {
  background: #ffffff !important;
  box-shadow: 0 8px 24px rgba(15, 23, 42, 0.18) !important;
  transform: translateY(-2px) !important;
}

.floating-lang-currency-widget .lang-currency-popup {
  position: absolute !important;
  bottom: 52px !important;
  right: 0 !important;
  left: auto !important;
  top: auto !important;
  width: 255px !important;
  background: #ffffff !important;
  border-radius: 16px !important;
  box-shadow: 0 15px 40px rgba(15, 23, 42, 0.2) !important;
  border: 1px solid rgba(226, 232, 240, 0.9) !important;
  padding: 12px !important;
  display: none !important;
  z-index: 10010 !important;
  max-height: 80vh !important;
  overflow-y: auto !important;
}

.floating-lang-currency-widget.active .lang-currency-popup {
  display: block !important;
}

/* Inline SVG Flags Vector Styling */
.flag-svg-icon {
  width: 22px !important;
  height: 15px !important;
  border-radius: 3px !important;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.18) !important;
  display: inline-block !important;
  vertical-align: middle !important;
  flex-shrink: 0 !important;
  overflow: hidden !important;
}

.active-flag-icon {
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
}

.active-flag-icon .flag-svg-icon {
  width: 20px !important;
  height: 14px !important;
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
  .floating-whatsapp-btn {
    left: 18px !important;
    bottom: 18px !important;
    width: 54px !important;
    height: 54px !important;
  }
  .floating-riche-bot {
    left: 18px !important;
    bottom: 82px !important;
    width: 54px !important;
    height: 54px !important;
  }
  .floating-riche-bot .riche-toggle-btn {
    width: 54px !important;
    height: 54px !important;
  }
  .floating-riche-bot .riche-btn-avatar {
    width: 42px !important;
    height: 42px !important;
  }
  .floating-riche-bot .riche-chat-window {
    left: 10px !important;
    right: 10px !important;
    bottom: 80px !important;
    width: calc(100vw - 20px) !important;
    max-width: 100% !important;
  }
  .floating-lang-currency-widget {
    right: 18px !important;
    bottom: 18px !important;
  }
}

/* Headless Google Translate (Completely Invisible Off-Screen) */
body {
  top: 0 !important;
  position: static !important;
}
.goog-te-banner-frame,
.goog-te-balloon-frame,
#goog-gt-tt,
.goog-te-spinner-pos,
.VIpgJd-ZVi9od-aZ2wEe-wOHMyf,
.VIpgJd-ZVi9od-aZ2wEe-OiiCO,
.VIpgJd-ZVi9od-aZ2wEe,
.VIpgJd-yAWNEb-VIpgJd-fmcmS-sn54Q,
.skiptranslate iframe,
iframe.skiptranslate,
.goog-te-gadget-simple,
.goog-te-gadget {
  display: none !important;
  visibility: hidden !important;
  opacity: 0 !important;
  height: 0 !important;
  width: 0 !important;
  pointer-events: none !important;
}
#google_translate_element {
  position: absolute !important;
  left: -9999px !important;
  top: -9999px !important;
  width: 1px !important;
  height: 1px !important;
  overflow: hidden !important;
  opacity: 0 !important;
  pointer-events: none !important;
}
.goog-text-highlight {
  background: transparent !important;
  box-shadow: none !important;
}
font[style] {
  background: transparent !important;
  box-shadow: none !important;
}
</style>

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

<!-- 2. Rich-E AI Chatbot Agent (Stacked DIRECTLY ABOVE WhatsApp on Bottom Left) -->
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

<!-- 3. Floating Multi-Language & Multi-Currency Switcher (Bottom Right) -->
<script>
(function() {
    try {
        localStorage.removeItem('rew_flag');
        var l = localStorage.getItem('rew_lang');
        if (!l || l === 'null' || l === 'undefined') {
            localStorage.setItem('rew_lang', 'es');
            localStorage.setItem('rew_currency', 'CLP');
        }
        if (localStorage.getItem('rew_lang') === 'es') {
            localStorage.setItem('rew_currency', 'CLP');
        }
    } catch (e) {}

    var clSvg = '<svg class="flag-svg-icon" viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg"><rect width="300" height="100" fill="#ffffff"/><rect y="100" width="300" height="100" fill="#d52b1e"/><rect width="100" height="100" fill="#0039a6"/><polygon points="50,22 59,50 88,50 65,67 74,95 50,78 26,95 35,67 12,50 41,50" fill="#ffffff"/></svg>';

    function purgeNullFlag() {
        var el = document.querySelector('.active-flag-icon');
        if (el) {
            var txt = el.textContent ? el.textContent.trim() : '';
            if (txt === 'null' || txt === 'undefined' || el.innerHTML.indexOf('null') !== -1 || (!el.querySelector('svg') && !el.querySelector('img') && txt !== '🇨🇱')) {
                el.innerHTML = clSvg;
            }
        }
    }

    if (window.MutationObserver) {
        document.addEventListener('DOMContentLoaded', function() {
            var target = document.querySelector('.active-flag-icon');
            if (target) {
                new MutationObserver(purgeNullFlag).observe(target, { childList: true, characterData: true, subtree: true });
            }
            purgeNullFlag();
        });
    }

    var counter = 0;
    var timer = setInterval(function() {
        purgeNullFlag();
        counter++;
        if (counter > 30) clearInterval(timer);
    }, 50);
})();
</script>
<div class="floating-lang-currency-widget notranslate" translate="no">
    <!-- Trigger Button -->
    <button type="button" class="lang-currency-toggle-btn notranslate" translate="no" aria-label="Seleccionar Idioma y Moneda">
        <span class="active-flag-icon notranslate" translate="no">
            <svg class="flag-svg-icon" viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                <rect width="300" height="100" fill="#ffffff"/>
                <rect y="100" width="300" height="100" fill="#d52b1e"/>
                <rect width="100" height="100" fill="#0039a6"/>
                <polygon points="50,22 59,50 88,50 65,67 74,95 50,78 26,95 35,67 12,50 41,50" fill="#ffffff"/>
            </svg>
        </span>
        <span class="active-lang-currency-text notranslate" translate="no">ES / CLP</span>
        <span class="chevron-icon notranslate" translate="no">▲</span>
    </button>

    <!-- Dropdown Menu with SVG Flags and Strict Currency Association -->
    <div class="lang-currency-popup">
        <div class="popup-section-header">SELECCIONAR IDIOMA & MONEDA</div>
        <div class="lang-options-list">
            <!-- Chile (CLP) -->
            <button type="button" class="lang-option-btn active" data-lang="es" data-name="ES" data-currency="CLP">
                <svg class="flag-svg-icon" viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                    <rect width="300" height="100" fill="#ffffff"/>
                    <rect y="100" width="300" height="100" fill="#d52b1e"/>
                    <rect width="100" height="100" fill="#0039a6"/>
                    <polygon points="50,22 59,50 88,50 65,67 74,95 50,78 26,95 35,67 12,50 41,50" fill="#ffffff"/>
                </svg>
                <span class="name">Español</span>
                <span class="currency-tag">CLP</span>
            </button>

            <!-- English (USD) -->
            <button type="button" class="lang-option-btn" data-lang="en" data-name="EN" data-currency="USD">
                <svg class="flag-svg-icon" viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                    <rect width="300" height="200" fill="#b22234"/>
                    <path d="M0,15.38h300M0,46.15h300M0,76.92h300M0,107.69h300M0,138.46h300M0,169.23h300" stroke="#ffffff" stroke-width="15.38"/>
                    <rect width="120" height="107.69" fill="#3c3b6e"/>
                    <circle cx="20" cy="20" r="4" fill="#ffffff"/><circle cx="40" cy="20" r="4" fill="#ffffff"/><circle cx="60" cy="20" r="4" fill="#ffffff"/><circle cx="80" cy="20" r="4" fill="#ffffff"/><circle cx="100" cy="20" r="4" fill="#ffffff"/>
                    <circle cx="30" cy="38" r="4" fill="#ffffff"/><circle cx="50" cy="38" r="4" fill="#ffffff"/><circle cx="70" cy="38" r="4" fill="#ffffff"/><circle cx="90" cy="38" r="4" fill="#ffffff"/>
                    <circle cx="20" cy="56" r="4" fill="#ffffff"/><circle cx="40" cy="56" r="4" fill="#ffffff"/><circle cx="60" cy="56" r="4" fill="#ffffff"/><circle cx="80" cy="56" r="4" fill="#ffffff"/><circle cx="100" cy="56" r="4" fill="#ffffff"/>
                    <circle cx="30" cy="74" r="4" fill="#ffffff"/><circle cx="50" cy="74" r="4" fill="#ffffff"/><circle cx="70" cy="74" r="4" fill="#ffffff"/><circle cx="90" cy="74" r="4" fill="#ffffff"/>
                    <circle cx="20" cy="92" r="4" fill="#ffffff"/><circle cx="40" cy="92" r="4" fill="#ffffff"/><circle cx="60" cy="92" r="4" fill="#ffffff"/><circle cx="80" cy="92" r="4" fill="#ffffff"/><circle cx="100" cy="92" r="4" fill="#ffffff"/>
                </svg>
                <span class="name">English</span>
                <span class="currency-tag">USD</span>
            </button>

            <!-- Português Brasil (USD) -->
            <button type="button" class="lang-option-btn" data-lang="pt" data-name="PT" data-currency="USD">
                <svg class="flag-svg-icon" viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                    <rect width="300" height="200" fill="#009c3b"/>
                    <polygon points="150,20 280,100 150,180 20,100" fill="#ffdf00"/>
                    <circle cx="150" cy="100" r="46" fill="#002776"/>
                    <path d="M106,108 Q150,88 194,106" fill="none" stroke="#ffffff" stroke-width="7"/>
                </svg>
                <span class="name">Português (Brasil)</span>
                <span class="currency-tag">USD</span>
            </button>

            <!-- Português Portugal (USD) -->
            <button type="button" class="lang-option-btn" data-lang="pt-PT" data-name="PT" data-currency="USD">
                <svg class="flag-svg-icon" viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                    <rect width="120" height="200" fill="#006600"/>
                    <rect x="120" width="180" height="200" fill="#d52b1e"/>
                    <circle cx="120" cy="100" r="42" fill="#ffcc00" stroke="#000000" stroke-width="2"/>
                    <rect x="106" y="85" width="28" height="30" rx="3" fill="#ffffff" stroke="#000000" stroke-width="1.5"/>
                    <rect x="112" y="90" width="16" height="20" fill="#003399"/>
                </svg>
                <span class="name">Português (Portugal)</span>
                <span class="currency-tag">USD</span>
            </button>

            <!-- Français (USD) -->
            <button type="button" class="lang-option-btn" data-lang="fr" data-name="FR" data-currency="USD">
                <svg class="flag-svg-icon" viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                    <rect width="100" height="200" fill="#002395"/>
                    <rect x="100" width="100" height="200" fill="#ffffff"/>
                    <rect x="200" width="100" height="200" fill="#ed2939"/>
                </svg>
                <span class="name">Français</span>
                <span class="currency-tag">USD</span>
            </button>

            <!-- Deutsch (USD) -->
            <button type="button" class="lang-option-btn" data-lang="de" data-name="DE" data-currency="USD">
                <svg class="flag-svg-icon" viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                    <rect width="300" height="66.67" fill="#000000"/>
                    <rect y="66.67" width="300" height="66.67" fill="#dd0000"/>
                    <rect y="133.34" width="300" height="66.67" fill="#ffce00"/>
                </svg>
                <span class="name">Deutsch</span>
                <span class="currency-tag">USD</span>
            </button>

            <!-- Italiano (USD) -->
            <button type="button" class="lang-option-btn" data-lang="it" data-name="IT" data-currency="USD">
                <svg class="flag-svg-icon" viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                    <rect width="100" height="200" fill="#009246"/>
                    <rect x="100" width="100" height="200" fill="#ffffff"/>
                    <rect x="200" width="100" height="200" fill="#ce2b37"/>
                </svg>
                <span class="name">Italiano</span>
                <span class="currency-tag">USD</span>
            </button>

            <!-- 简体中文 (USD) -->
            <button type="button" class="lang-option-btn" data-lang="zh-CN" data-name="ZH" data-currency="USD">
                <svg class="flag-svg-icon" viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                    <rect width="300" height="200" fill="#ee1c25"/>
                    <polygon points="50,25 57,48 80,48 61,62 68,85 50,71 32,85 39,62 20,48 43,48" fill="#ffff00"/>
                    <circle cx="100" cy="30" r="7" fill="#ffff00"/>
                    <circle cx="120" cy="50" r="7" fill="#ffff00"/>
                    <circle cx="120" cy="80" r="7" fill="#ffff00"/>
                    <circle cx="100" cy="100" r="7" fill="#ffff00"/>
                </svg>
                <span class="name">简体中文</span>
                <span class="currency-tag">USD</span>
            </button>

            <!-- 日本語 (USD) -->
            <button type="button" class="lang-option-btn" data-lang="ja" data-name="JA" data-currency="USD">
                <svg class="flag-svg-icon" viewBox="0 0 300 200" xmlns="http://www.w3.org/2000/svg">
                    <rect width="300" height="200" fill="#ffffff" stroke="#e2e8f0" stroke-width="2"/>
                    <circle cx="150" cy="100" r="60" fill="#bc002d"/>
                </svg>
                <span class="name">日本語</span>
                <span class="currency-tag">USD</span>
            </button>
        </div>

        <div class="popup-section-header" style="margin-top: 10px;">CONDICIÓN MONETARIA</div>
        <div style="font-size: 0.74rem; color: #64748b; padding: 4px 6px 2px; line-height: 1.4;">
            🇨🇱 Chile opera en <strong>CLP ($)</strong>. Todos los demás idiomas operan en <strong>USD ($)</strong>.
        </div>
    </div>
</div>

<!-- 4. Headless Google Translate Element (Completely Invisible Off-Screen) -->
<div id="google_translate_element" aria-hidden="true"></div>
<script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'es',
        includedLanguages: 'es,en,pt,fr,de,it,zh-CN,ja',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
        autoDisplay: false
    }, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
