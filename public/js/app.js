/**
 * REW.cl - Interactive Core Application Script
 * Featuring Rich-E AI Agent, 100% Native Multi-Language & Multi-Currency Switcher, and Portfolio Interactive Mockups
 */

document.addEventListener('DOMContentLoaded', () => {
    initHeaderScroll();
    initMobileNav();
    initLangCurrencySwitcher();
    initCartDrawer();
    initInteractiveQuoteCalculator();
    initRicheChatbot();
    initPortfolioMockup();
    initInstagramFeed();
    initInteractiveTerminal();
    initSpotlightCards();
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
   Multi-Language & Multi-Currency Switcher (100% Native - No Google Banners)
   ========================================================================== */
const UI_TRANSLATIONS = {
    es: {
        inicio: 'Inicio',
        nosotros: 'Nosotros',
        tienda: 'Tienda',
        servicios: 'Servicios',
        portafolio: 'Portafolio',
        blog: 'Blog',
        contacto: 'Contacto',
        cotizar: 'Cotizar Proyecto',
        anadir_carrito: 'Añadir al Carrito',
        agregando: 'Agregando...',
        anadido: '✓ ¡Añadido!',
        detalles: 'Detalles',
        comprar_ahora: 'Comprar por WhatsApp ➔',
        carrito_titulo: 'Tu Carrito de Plugins',
        carrito_vacio: 'Tu carrito está vacío',
        total_estimado: 'Total Estimado:',
        proceder_pago: 'Proceder al Pago ➔',
        seguir_comprando: 'Seguir Comprando'
    },
    en: {
        inicio: 'Home',
        nosotros: 'About Us',
        tienda: 'Store',
        servicios: 'Services',
        portafolio: 'Portfolio',
        blog: 'Blog',
        contacto: 'Contact',
        cotizar: 'Get a Quote',
        anadir_carrito: 'Add to Cart',
        agregando: 'Adding...',
        anadido: '✓ Added!',
        detalles: 'Details',
        comprar_ahora: 'Buy via WhatsApp ➔',
        carrito_titulo: 'Your Plugin Cart',
        carrito_vacio: 'Your cart is currently empty',
        total_estimado: 'Estimated Total:',
        proceder_pago: 'Proceed to Checkout ➔',
        seguir_comprando: 'Continue Shopping'
    },
    pt: {
        inicio: 'Início',
        nosotros: 'Sobre Nós',
        tienda: 'Loja',
        servicios: 'Serviços',
        portafolio: 'Portfólio',
        blog: 'Blog',
        contacto: 'Contato',
        cotizar: 'Solicitar Orçamento',
        anadir_carrito: 'Adicionar ao Carrinho',
        agregando: 'Adicionando...',
        anadido: '✓ Adicionado!',
        detalles: 'Detalhes',
        comprar_ahora: 'Comprar pelo WhatsApp ➔',
        carrito_titulo: 'Seu Carrinho de Plugins',
        carrito_vacio: 'Seu carrinho está vazio',
        total_estimado: 'Total Estimado:',
        proceder_pago: 'Finalizar Compra ➔',
        seguir_comprando: 'Continuar Comprando'
    },
    fr: {
        inicio: 'Accueil',
        nosotros: 'À Propos',
        tienda: 'Boutique',
        servicios: 'Services',
        portafolio: 'Portfolio',
        blog: 'Blog',
        contacto: 'Contact',
        cotizar: 'Demander un Devis',
        anadir_carrito: 'Ajouter au Panier',
        agregando: 'Ajout en cours...',
        anadido: '✓ Ajouté !',
        detalles: 'Détails',
        comprar_ahora: 'Acheter via WhatsApp ➔',
        carrito_titulo: 'Votre Panier',
        carrito_vacio: 'Votre panier est vide',
        total_estimado: 'Total Estimé :',
        proceder_pago: 'Passer la Commande ➔',
        seguir_comprando: 'Continuer vos Achats'
    },
    de: {
        inicio: 'Startseite',
        nosotros: 'Über Uns',
        tienda: 'Shop',
        servicios: 'Dienstleistungen',
        portafolio: 'Portfolio',
        blog: 'Blog',
        contacto: 'Kontakt',
        cotizar: 'Angebot Anfordern',
        anadir_carrito: 'In den Warenkorb',
        agregando: 'Wird hinzugefügt...',
        anadido: '✓ Hinzugefügt!',
        detalles: 'Details',
        comprar_ahora: 'Über WhatsApp kaufen ➔',
        carrito_titulo: 'Ihr Warenkorb',
        carrito_vacio: 'Ihr Warenkorb ist leer',
        total_estimado: 'Geschätzte Gesamtsumme:',
        proceder_pago: 'Zur Kasse ➔',
        seguir_comprando: 'Weiter einkaufen'
    },
    it: {
        inicio: 'Home',
        nosotros: 'Chi Siamo',
        tienda: 'Negozio',
        servicios: 'Servizi',
        portafolio: 'Portfolio',
        blog: 'Blog',
        contacto: 'Contatto',
        cotizar: 'Richiedi Preventivo',
        anadir_carrito: 'Aggiungi al Carrello',
        agregando: 'Aggiunta in corso...',
        anadido: '✓ Aggiunto!',
        detalles: 'Dettagli',
        comprar_ahora: 'Acquista su WhatsApp ➔',
        carrito_titulo: 'Il tuo Carrello',
        carrito_vacio: 'Il tuo carrello è vuoto',
        total_estimado: 'Totale Stimato:',
        proceder_pago: 'Procedi all’Acquisto ➔',
        seguir_comprando: 'Continua lo Shopping'
    },
    'zh-CN': {
        inicio: '首页',
        nosotros: '关于我们',
        tienda: '商城',
        servicios: '核心服务',
        portafolio: '成功案例',
        blog: '技术博客',
        contacto: '联系我们',
        cotizar: '项目报价',
        anadir_carrito: '加入购物车',
        agregando: '正在添加...',
        anadido: '✓ 已添加！',
        detalles: '产品详情',
        comprar_ahora: '通过 WhatsApp 购买 ➔',
        carrito_titulo: '您的插件购物车',
        carrito_vacio: '购物车为空',
        total_estimado: '预估总计：',
        proceder_pago: '前往结账 ➔',
        seguir_comprando: '继续浏览'
    },
    ja: {
        inicio: 'ホーム',
        nosotros: '私たちについて',
        tienda: 'ストア',
        servicios: 'サービス',
        portafolio: '制作実績',
        blog: 'ブログ',
        contacto: 'お問い合わせ',
        cotizar: 'お見積もり',
        anadir_carrito: 'カートに追加',
        agregando: '追加中...',
        anadido: '✓ 追加完了！',
        detalles: '詳細を見る',
        comprar_ahora: 'WhatsAppで購入 ➔',
        carrito_titulo: 'ショッピングカート',
        carrito_vacio: 'カートは空です',
        total_estimado: '合計見積もり:',
        proceder_pago: 'レジに進む ➔',
        seguir_comprando: '買い物を続ける'
    }
};

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

            langBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            currentLang = lang;
            currentFlag = flag;
            localStorage.setItem('rew_lang', lang);
            localStorage.setItem('rew_flag', flag);

            updateTriggerLabel();
            applyNativeTranslations(lang);
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

    function applyNativeTranslations(lang) {
        const dict = UI_TRANSLATIONS[lang] || UI_TRANSLATIONS.es;

        // Translate Nav links
        const navLinks = document.querySelectorAll('.nav-menu > li > a');
        if (navLinks.length >= 6) {
            if (navLinks[0]) navLinks[0].childNodes[0].nodeValue = dict.inicio + ' ';
            if (navLinks[1]) navLinks[1].childNodes[0].nodeValue = dict.nosotros + ' ';
            if (navLinks[2]) navLinks[2].childNodes[0].nodeValue = dict.tienda + ' ';
            if (navLinks[4]) navLinks[4].childNodes[0].nodeValue = dict.portafolio + ' ';
            if (navLinks[5]) navLinks[5].childNodes[0].nodeValue = dict.blog + ' ';
            if (navLinks[6]) navLinks[6].childNodes[0].nodeValue = dict.contacto + ' ';
        }

        // Translate Add to Cart buttons
        document.querySelectorAll('.ajax-add-to-cart-form button[type="submit"]').forEach(btn => {
            if (!btn.disabled) {
                btn.innerHTML = `<span>${dict.anadir_carrito}</span>`;
            }
        });

        // Translate Drawer Title & Buttons
        const drawerTitle = document.querySelector('.cart-drawer-header h3');
        if (drawerTitle) drawerTitle.textContent = dict.carrito_titulo;

        const checkoutBtn = document.querySelector('.cart-drawer-footer .btn-primary');
        if (checkoutBtn) checkoutBtn.textContent = dict.proceder_pago;

        const continueBtn = document.querySelector('.cart-drawer-footer .btn-outline');
        if (continueBtn) continueBtn.textContent = dict.seguir_comprando;
    }

    // Apply initial states
    updateTriggerLabel();
    applyCurrencyPrices(currentCurrency);
    if (currentLang !== 'es') {
        applyNativeTranslations(currentLang);
    }

    langBtns.forEach(b => {
        if (b.getAttribute('data-lang') === currentLang) b.classList.add('active');
        else b.classList.remove('active');
    });
    currencyBtns.forEach(b => {
        if (b.getAttribute('data-currency') === currentCurrency) b.classList.add('active');
        else b.classList.remove('active');
    });
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
            if (totalUSD === 0 && totalCLP === 0) {
                baseCostEl.textContent = 'A evaluar / A medida';
            } else if (cur === 'CLP') {
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

    // Dynamic Custom Features Repeater (Max 10)
    const featuresList = document.querySelector('#customFeaturesList');
    const addFeatureBtn = document.querySelector('#addCustomFeatureBtn');
    const counterBadge = document.querySelector('#customFeatureCounterBadge');

    function updateFeatureRows() {
        if (!featuresList) return;
        const rows = featuresList.querySelectorAll('.custom-feature-row');
        const count = rows.length;

        if (counterBadge) {
            counterBadge.textContent = `${count} / 10 agregadas`;
        }

        rows.forEach((row, idx) => {
            const badge = row.querySelector('.feature-idx-badge');
            if (badge) badge.textContent = `#${idx + 1}`;

            const removeBtn = row.querySelector('.remove-feature-row-btn');
            if (removeBtn) {
                removeBtn.style.display = count > 1 ? 'inline-block' : 'none';
            }
        });

        if (addFeatureBtn) {
            if (count >= 10) {
                addFeatureBtn.disabled = true;
                addFeatureBtn.innerHTML = '<span>✕ Límite alcanzado (10/10)</span>';
            } else {
                addFeatureBtn.disabled = false;
                addFeatureBtn.innerHTML = '<span>➕ Añadir otra funcionalidad (+1)</span>';
            }
        }
    }

    if (addFeatureBtn && featuresList) {
        addFeatureBtn.addEventListener('click', () => {
            const currentRows = featuresList.querySelectorAll('.custom-feature-row');
            if (currentRows.length >= 10) return;

            const newRow = document.createElement('div');
            newRow.className = 'custom-feature-row';
            newRow.style.cssText = 'display: flex; align-items: center; gap: 10px; animation: fadeIn 0.2s ease;';
            newRow.innerHTML = `
                <span class="feature-idx-badge" style="background: var(--primary); color: #ffffff; font-weight: 800; font-size: 0.75rem; padding: 6px 10px; border-radius: 8px;">#${currentRows.length + 1}</span>
                <input type="text" name="custom_feature_items[]" maxlength="250" placeholder="Ej: Función #${currentRows.length + 1} (ej: Integración con pasarela local, reportería en PDF...)" 
                       style="flex-grow: 1; padding: 0.65rem 0.85rem; border: 1px solid var(--border-light); border-radius: 8px; font-size: 0.9rem; outline: none; background: #ffffff;">
                <button type="button" class="btn btn-outline btn-sm remove-feature-row-btn" style="padding: 0.5rem 0.75rem; color: #ef4444; border-color: #fecaca;" title="Eliminar función">✕</button>
            `;

            featuresList.appendChild(newRow);
            updateFeatureRows();

            const newInput = newRow.querySelector('input');
            if (newInput) newInput.focus();
        });

        featuresList.addEventListener('click', (e) => {
            if (e.target.closest('.remove-feature-row-btn')) {
                const row = e.target.closest('.custom-feature-row');
                if (row) {
                    row.remove();
                    updateFeatureRows();
                }
            }
        });

        updateFeatureRows();
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const submitBtn = this.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span>Generando cotización segura...</span>';
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
            } else if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<span>🚀 Enviar Cotización y Abrir WhatsApp (+56987261127)</span>';
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
            osc.frequency.setValueAtTime(587.33, ctx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(880, ctx.currentTime + 0.15);
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

/* ==========================================================================
   Instagram Dynamic Feed (Non-Blocking Lazy Fetcher)
   ========================================================================== */
function initInstagramFeed() {
    const grid = document.getElementById('instagramPostsGrid');
    if (!grid) return;

    const endpoint = grid.getAttribute('data-endpoint') || '/api/instagram/feed';
    let loaded = false;

    function fetchFeed() {
        if (loaded) return;
        loaded = true;

        fetch(endpoint)
            .then(res => res.json())
            .then(data => {
                if (data.success && data.posts && data.posts.length > 0) {
                    let html = '';
                    data.posts.forEach(post => {
                        html += `
                            <a href="${post.permalink}" target="_blank" rel="noopener noreferrer" class="ig-card" title="${post.caption}">
                                <img src="${post.image}" alt="Instagram Post @rew_chile" class="ig-card-img" loading="lazy">
                                <div class="ig-card-overlay">
                                    <div class="ig-card-caption">${post.caption}</div>
                                    <div class="ig-card-stats">
                                        <span>❤️ ${post.likes}</span>
                                        <span>💬 ${post.comments}</span>
                                    </div>
                                </div>
                            </a>
                        `;
                    });
                    grid.innerHTML = html;
                }
            })
            .catch(() => {});
    }

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    fetchFeed();
                    observer.unobserve(grid);
                }
            });
        }, { rootMargin: '200px' });
        observer.observe(grid);
    } else {
        setTimeout(fetchFeed, 1000);
    }
}

/* ==========================================================================
   Interactive Terminal Simulator
   ========================================================================== */
function initInteractiveTerminal() {
    const terminal = document.querySelector('.terminal-window');
    if (!terminal) return;

    const rerunBtn = document.getElementById('rerunTerminalBtn');
    const steps = [
        terminal.querySelector('.step-1'),
        terminal.querySelector('.step-2'),
        terminal.querySelector('.step-3'),
        terminal.querySelector('.step-4'),
        terminal.querySelector('.terminal-summary')
    ];

    let hasRun = false;

    function runSimulation() {
        steps.forEach(s => { if (s) s.style.display = 'none'; });

        setTimeout(() => { if (steps[0]) { steps[0].style.display = 'block'; steps[0].style.animation = 'fadeIn 0.3s ease'; } }, 600);
        setTimeout(() => { if (steps[1]) { steps[1].style.display = 'block'; steps[1].style.animation = 'fadeIn 0.3s ease'; } }, 1300);
        setTimeout(() => { if (steps[2]) { steps[2].style.display = 'block'; steps[2].style.animation = 'fadeIn 0.3s ease'; } }, 2000);
        setTimeout(() => { if (steps[3]) { steps[3].style.display = 'block'; steps[3].style.animation = 'fadeIn 0.3s ease'; } }, 2700);
        setTimeout(() => { if (steps[4]) { steps[4].style.display = 'block'; steps[4].style.animation = 'fadeIn 0.4s ease'; } }, 3400);
    }

    if (rerunBtn) {
        rerunBtn.addEventListener('click', runSimulation);
    }

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !hasRun) {
                    hasRun = true;
                    runSimulation();
                    observer.unobserve(terminal);
                }
            });
        }, { threshold: 0.3 });
        observer.observe(terminal);
    } else {
        runSimulation();
    }
}

/* ==========================================================================
   Cursor Spotlight Border Tracker (Linear / Vercel effect)
   ========================================================================== */
function initSpotlightCards() {
    const cards = document.querySelectorAll('.spotlight-card, .portfolio-card, .product-card, .feature-card-clean');
    cards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        });
    });
}
