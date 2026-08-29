/**
 * REW.cl - Interactive Core Application Script
 * Featuring Rich-E AI Agent, Multi-Language & Multi-Currency Switcher, and Portfolio Interactive Mockups
 */

document.addEventListener('DOMContentLoaded', () => {
    initHeaderScroll();
    initMobileNav();
    initLangCurrencySwitcher();
    initCartDrawer();
    initInteractiveQuoteCalculator();
    initRicheChatbot();
    initPortfolioMockup();
});

/* ==========================================================================
   Header Scroll Behavior
   ========================================================================== */
function initHeaderScroll() {
    const header = document.querySelector('.site-header');
    if (!header) return;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
}

/* ==========================================================================
   Mobile Navigation Toggle
   ========================================================================== */
function initMobileNav() {
    const toggleBtn = document.querySelector('.mobile-nav-toggle');
    const navMenu = document.querySelector('.nav-menu');
    if (!toggleBtn || !navMenu) return;

    toggleBtn.addEventListener('click', () => {
        navMenu.classList.toggle('open');
        toggleBtn.innerHTML = navMenu.classList.contains('open') ? '✕' : '☰';
    });
}

/* ==========================================================================
   Multi-Language & Multi-Currency Switcher (Exact User Design)
   ========================================================================== */
function initLangCurrencySwitcher() {
    const widget = document.querySelector('.floating-lang-currency-widget');
    const toggleBtn = document.querySelector('.lang-currency-toggle-btn');
    const flagIcon = document.querySelector('.active-flag-icon');
    const triggerText = document.querySelector('.active-lang-currency-text');

    const langBtns = document.querySelectorAll('.lang-option-btn');
    const currencyBtns = document.querySelectorAll('.currency-option-btn');

    let currentLang = localStorage.getItem('rew_lang') || 'es';
    let currentCurrency = localStorage.getItem('rew_currency') || 'CLP';
    let currentFlag = localStorage.getItem('rew_flag') || '🇨🇱';

    // Init Google Translate
    loadGoogleTranslate();

    // Toggle Dropdown
    if (toggleBtn && widget) {
        toggleBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            widget.classList.toggle('active');
        });

        document.addEventListener('click', (e) => {
            if (!widget.contains(e.target)) {
                widget.classList.remove('active');
            }
        });
    }

    // Language Selection
    langBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const lang = this.getAttribute('data-lang');
            const flag = this.getAttribute('data-flag');
            const name = this.getAttribute('data-name');

            langBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            currentLang = lang;
            currentFlag = flag;
            localStorage.setItem('rew_lang', lang);
            localStorage.setItem('rew_flag', flag);

            updateTriggerLabel();
            translatePage(lang);
        });
    });

    // Currency Selection
    currencyBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const currency = this.getAttribute('data-currency');

            currencyBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            currentCurrency = currency;
            localStorage.setItem('rew_currency', currency);

            updateTriggerLabel();
            applyCurrencyPrices(currency);

            // Sync with Laravel session
            fetch('/currency', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': getCsrfToken()
                },
                body: JSON.stringify({ currency: currency })
            }).catch(() => {});
        });
    });

    function updateTriggerLabel() {
        if (flagIcon) flagIcon.textContent = currentFlag;
        if (triggerText) {
            const langCode = (currentLang === 'zh-CN' ? 'ZH' : currentLang.toUpperCase()).slice(0, 2);
            triggerText.textContent = `${langCode} / ${currentCurrency}`;
        }
    }

    function applyCurrencyPrices(currency) {
        document.querySelectorAll('.price-tag-dynamic').forEach(el => {
            const usd = el.getAttribute('data-usd');
            const clp = el.getAttribute('data-clp');
            if (currency === 'CLP' && clp) {
                el.textContent = '$' + parseInt(clp).toLocaleString('es-CL') + ' CLP';
            } else if (usd) {
                el.textContent = '$' + parseInt(usd).toLocaleString('en-US') + ' USD';
            }
        });

        window.dispatchEvent(new CustomEvent('currencyChanged', { detail: { currency } }));
    }

    function translatePage(lang) {
        if (lang === 'es') {
            // Restore original
            const select = document.querySelector('.goog-te-combo');
            if (select) {
                select.value = '';
                select.dispatchEvent(new Event('change'));
            }
            return;
        }

        const select = document.querySelector('.goog-te-combo');
        if (select) {
            select.value = lang;
            select.dispatchEvent(new Event('change'));
        }
    }

    // Apply initial states
    updateTriggerLabel();
    applyCurrencyPrices(currentCurrency);

    // Set active buttons
    langBtns.forEach(b => {
        if (b.getAttribute('data-lang') === currentLang) b.classList.add('active');
        else b.classList.remove('active');
    });
    currencyBtns.forEach(b => {
        if (b.getAttribute('data-currency') === currentCurrency) b.classList.add('active');
        else b.classList.remove('active');
    });
}

function loadGoogleTranslate() {
    window.googleTranslateElementInit = function() {
        new google.translate.TranslateElement({
            pageLanguage: 'es',
            includedLanguages: 'es,en,pt,fr,de,it,zh-CN,ja',
            autoDisplay: false
        }, 'google_translate_element');
    };

    const script = document.createElement('script');
    script.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
    script.async = true;
    document.body.appendChild(script);
}

/* ==========================================================================
   Shopping Cart Drawer
   ========================================================================== */
function initCartDrawer() {
    const overlay = document.querySelector('.cart-drawer-overlay');
    const openBtns = document.querySelectorAll('.open-cart-drawer');
    const closeBtns = document.querySelectorAll('.close-cart-drawer');

    openBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            if (overlay) overlay.classList.add('open');
        });
    });

    closeBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            if (overlay) overlay.classList.remove('open');
        });
    });

    if (overlay) {
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                overlay.classList.remove('open');
            }
        });
    }

    document.querySelectorAll('.ajax-add-to-cart-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn ? submitBtn.innerHTML : '';
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span>Agregando...</span>';
            }

            const formData = new FormData(this);

            fetch('/carrito/agregar', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': getCsrfToken()
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    updateCartCount(data.cart_count);
                    if (submitBtn) {
                        submitBtn.innerHTML = '<span>✓ ¡Añadido!</span>';
                        setTimeout(() => {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalText;
                        }, 2000);
                    }
                    if (overlay) {
                        overlay.classList.add('open');
                        renderCartItems(data.cart, data.cart_total_usd, data.cart_total_clp);
                    }
                }
            })
            .catch(() => {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            });
        });
    });
}

function updateCartCount(count) {
    document.querySelectorAll('.cart-count-badge').forEach(el => {
        el.textContent = count;
        el.style.display = count > 0 ? 'inline-flex' : 'none';
    });
}

function renderCartItems(cart, totalUsd, totalClp) {
    const container = document.querySelector('.cart-drawer-items');
    const totalEl = document.querySelector('.cart-drawer-total-amount');
    if (!container) return;

    const currency = localStorage.getItem('rew_currency') || 'USD';
    const items = Object.values(cart);

    if (items.length === 0) {
        container.innerHTML = '<div class="text-center py-5 text-muted"><p>Tu carrito está vacío</p></div>';
        if (totalEl) totalEl.textContent = '$0';
        return;
    }

    let html = '';
    items.forEach(item => {
        const price = currency === 'CLP' 
            ? '$' + parseInt(item.price_clp).toLocaleString('es-CL') + ' CLP'
            : '$' + parseInt(item.price_usd).toLocaleString('en-US') + ' USD';

        html += `
            <div class="cart-item">
                <img src="${item.image || '/images/logo.webp'}" alt="${item.name}" class="cart-item-img">
                <div class="cart-item-info">
                    <h5 class="cart-item-title">${item.name}</h5>
                    <div class="cart-item-price">${price} (x${item.quantity})</div>
                </div>
                <button type="button" class="btn btn-sm btn-outline remove-from-cart-btn" data-id="${item.id}" title="Eliminar">✕</button>
            </div>
        `;
    });

    container.innerHTML = html;

    if (totalEl) {
        totalEl.textContent = currency === 'CLP' 
            ? '$' + parseInt(totalClp).toLocaleString('es-CL') + ' CLP'
            : '$' + parseInt(totalUsd).toLocaleString('en-US') + ' USD';
    }

    container.querySelectorAll('.remove-from-cart-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const prodId = this.getAttribute('data-id');
            const fd = new FormData();
            fd.append('product_id', prodId);

            fetch('/carrito/eliminar', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': getCsrfToken()
                },
                body: fd
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    updateCartCount(data.cart_count);
                    renderCartItems(data.cart, data.cart_total_usd, data.cart_total_clp);
                }
            });
        });
    });
}

/* ==========================================================================
   Interactive Step-by-Step Quote Calculator
   ========================================================================== */
function initInteractiveQuoteCalculator() {
    const form = document.querySelector('#quoteCalculatorForm');
    if (!form) return;

    const baseCostEl = document.querySelector('#calcEstimatedCost');

    function recalculate() {
        let totalUSD = 0;
        let totalCLP = 0;

        const selectedService = form.querySelector('input[name="service_type"]:checked');
        if (selectedService) {
            totalUSD += parseFloat(selectedService.getAttribute('data-base-usd') || 0);
            totalCLP += parseInt(selectedService.getAttribute('data-base-clp') || 0);
        }

        form.querySelectorAll('input[name="features[]"]:checked').forEach(feat => {
            totalUSD += parseFloat(feat.getAttribute('data-price-usd') || 0);
            totalCLP += parseInt(feat.getAttribute('data-price-clp') || 0);
        });

        const usdInput = form.querySelector('input[name="estimated_budget_usd"]');
        const clpInput = form.querySelector('input[name="estimated_budget_clp"]');
        if (usdInput) usdInput.value = totalUSD;
        if (clpInput) clpInput.value = totalCLP;

        if (baseCostEl) {
            const cur = localStorage.getItem('rew_currency') || 'CLP';
            if (cur === 'CLP') {
                baseCostEl.textContent = '$' + totalCLP.toLocaleString('es-CL') + ' CLP';
            } else {
                baseCostEl.textContent = '$' + totalUSD.toLocaleString('en-US') + ' USD';
            }
        }
    }

    form.querySelectorAll('input').forEach(input => {
        input.addEventListener('change', () => {
            if (input.type === 'radio') {
                form.querySelectorAll(`input[name="${input.name}"]`).forEach(r => {
                    const card = r.closest('.option-card');
                    if (card) card.classList.remove('selected');
                });
            }
            const card = input.closest('.option-card');
            if (card) {
                if (input.checked) card.classList.add('selected');
                else card.classList.remove('selected');
            }

            recalculate();
        });
    });

    window.addEventListener('currencyChanged', recalculate);
    recalculate();

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const submitBtn = this.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span>Generando cotización...</span>';
        }

        const formData = new FormData(this);

        fetch('/cotizar', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': getCsrfToken()
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success && data.whatsapp_url) {
                window.location.href = data.whatsapp_url;
            }
        })
        .catch(() => {
            form.submit();
        });
    });
}

/* ==========================================================================
   Rich-E AI Chatbot Engine (Connected to Laravel / Groq / RAG)
   ========================================================================== */
function initRicheChatbot() {
    const botWidget = document.querySelector('.floating-riche-bot');
    const toggleBtn = document.querySelector('.riche-toggle-btn');
    const closeBtn = document.querySelector('.close-chat-btn');
    const resetBtn = document.querySelector('.reset-chat-btn');
    const soundBtn = document.querySelector('.sound-toggle-btn');
    const exportBtn = document.querySelector('.export-chat-btn');
    const emailBtn = document.querySelector('.email-chat-btn');

    const msgContainer = document.querySelector('#richeMessagesContainer');
    const input = document.querySelector('#richeChatInput');
    const sendBtn = document.querySelector('#richeSendBtn');
    const chips = document.querySelectorAll('.chip-btn');

    let soundEnabled = true;

    if (!botWidget || !toggleBtn) return;

    toggleBtn.addEventListener('click', () => {
        botWidget.classList.toggle('open');
        if (botWidget.classList.contains('open') && input) {
            input.focus();
        }
    });

    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            botWidget.classList.remove('open');
        });
    }

    if (resetBtn) {
        resetBtn.addEventListener('click', () => {
            if (msgContainer) {
                msgContainer.innerHTML = `
                    <div class="chat-bubble chat-bubble-bot">
                        <div class="bubble-text">
                            ¡Chat reiniciado! Soy <strong>Rich-E</strong>, ¿en qué te puedo asesorar?
                        </div>
                        <div class="bubble-time">${getCurrentTime()}</div>
                    </div>
                `;
            }
        });
    }

    if (soundBtn) {
        soundBtn.addEventListener('click', () => {
            soundEnabled = !soundEnabled;
            soundBtn.textContent = soundEnabled ? '🔊' : '🔇';
        });
    }

    if (exportBtn) {
        exportBtn.addEventListener('click', () => {
            if (!msgContainer) return;
            const text = msgContainer.innerText;
            const blob = new Blob([text], { type: 'text/plain;charset=utf-8' });
            const a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = `conversacion-riche-${Date.now()}.txt`;
            a.click();
        });
    }

    if (emailBtn) {
        emailBtn.addEventListener('click', () => {
            const subject = encodeURIComponent('Consulta desde chat Rich-E REW.cl');
            const body = encodeURIComponent(msgContainer ? msgContainer.innerText : '');
            window.location.href = `mailto:alvaro@rew.cl?subject=${subject}&body=${body}`;
        });
    }

    function playMessageSound() {
        if (!soundEnabled) return;
        try {
            const ctx = new (window.AudioContext || window.webkitAudioContext)();
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();
            osc.connect(gain);
            gain.connect(ctx.destination);
            osc.frequency.setValueAtTime(587.33, ctx.currentTime); // D5
            osc.frequency.exponentialRampToValueAtTime(880, ctx.currentTime + 0.15); // A5
            gain.gain.setValueAtTime(0.08, ctx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.2);
            osc.start();
            osc.stop(ctx.currentTime + 0.2);
        } catch (_) {}
    }

    function appendMessage(text, isUser = false, time = null) {
        if (!msgContainer) return;
        const bubble = document.createElement('div');
        bubble.className = isUser ? 'chat-bubble chat-bubble-user' : 'chat-bubble chat-bubble-bot';

        const formatted = text
            .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
            .replace(/\n/g, '<br>')
            .replace(/\[(.*?)\]\((.*?)\)/g, '<a href="$2" target="_blank" style="color:var(--accent-gold); font-weight:700;">$1</a>');

        bubble.innerHTML = `
            <div class="bubble-text">${formatted}</div>
            <div class="bubble-time">${time || getCurrentTime()}</div>
        `;
        msgContainer.appendChild(bubble);
        msgContainer.scrollTop = msgContainer.scrollHeight;

        if (!isUser) {
            playMessageSound();
        }
    }

    function sendChatMessage(msg) {
        if (!msg.trim()) return;
        appendMessage(msg, true);
        if (input) input.value = '';

        // Typing indicator bubble
        const typingBubble = document.createElement('div');
        typingBubble.className = 'chat-bubble chat-bubble-bot';
        typingBubble.id = 'typingIndicator';
        typingBubble.innerHTML = '<div class="bubble-text" style="color:#64748b;"><em>Rich-E está escribiendo...</em></div>';
        msgContainer.appendChild(typingBubble);
        msgContainer.scrollTop = msgContainer.scrollHeight;

        fetch('/api/riche/chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': getCsrfToken()
            },
            body: JSON.stringify({ message: msg })
        })
        .then(res => res.json())
        .then(data => {
            const typ = document.getElementById('typingIndicator');
            if (typ) typ.remove();

            if (data.reply) {
                appendMessage(data.reply, false, data.time);
            }
        })
        .catch(() => {
            const typ = document.getElementById('typingIndicator');
            if (typ) typ.remove();
            appendMessage('¡Hola! Puedes comunicarte directamente con Álvaro Valenzuela al WhatsApp +56 9 8726 1127 o correo alvaro@rew.cl.', false);
        });
    }

    if (sendBtn && input) {
        sendBtn.addEventListener('click', () => sendChatMessage(input.value));
        input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendChatMessage(input.value);
        });
    }

    chips.forEach(chip => {
        chip.addEventListener('click', function() {
            const query = this.getAttribute('data-query') || this.textContent.trim();
            sendChatMessage(query);
        });
    });
}

function getCurrentTime() {
    const now = new Date();
    return now.getHours().toString().padStart(2, '0') + ':' + now.getMinutes().toString().padStart(2, '0');
}

/* ==========================================================================
   Portfolio Browser Mockup Interactive Hover & Zoom
   ========================================================================== */
function initPortfolioMockup() {
    const viewport = document.getElementById('browserViewport');
    const img = document.getElementById('browserLongImg');
    const zoomModal = document.getElementById('portfolioZoomModal');
    const zoomBtn = document.querySelector('.zoom-fullscreen-btn');
    const closeZoomBtn = document.getElementById('closeZoomBtn');

    if (viewport && img) {
        // Smooth hover scroll effect
        viewport.addEventListener('mouseenter', () => {
            const scrollDistance = img.offsetHeight - viewport.offsetHeight;
            if (scrollDistance > 0) {
                viewport.scrollTo({ top: scrollDistance, behavior: 'smooth' });
            }
        });

        viewport.addEventListener('mouseleave', () => {
            viewport.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    if (zoomBtn && zoomModal) {
        zoomBtn.addEventListener('click', () => {
            zoomModal.classList.add('open');
        });
    }

    if (closeZoomBtn && zoomModal) {
        closeZoomBtn.addEventListener('click', () => {
            zoomModal.classList.remove('open');
        });
        zoomModal.addEventListener('click', (e) => {
            if (e.target === zoomModal) zoomModal.classList.remove('open');
        });
    }
}

function getCsrfToken() {
    const meta = document.querySelector('meta[name="csrf-token"]');
    return meta ? meta.getAttribute('content') : '';
}
