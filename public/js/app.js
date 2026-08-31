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
    initAuditModal();
    initDesktopMegaMenu();
    initFaqAccordion();
    initSpeedBenchmarkRace();
    initHomeScrollAnimations();
});

/* ==========================================================================
   Desktop Mega Menu Hover Manager & Dynamic Spotlight Switcher
   ========================================================================== */
function initDesktopMegaMenu() {
    const dropdowns = document.querySelectorAll('.nav-item-dropdown');
    dropdowns.forEach(dropdown => {
        let timer = null;

        dropdown.addEventListener('mouseenter', () => {
            if (window.innerWidth < 992) return;
            if (timer) clearTimeout(timer);
            dropdown.classList.add('is-open');
        });

        dropdown.addEventListener('mouseleave', () => {
            if (window.innerWidth < 992) return;
            timer = setTimeout(() => {
                dropdown.classList.remove('is-open');
            }, 180);
        });
    });

    // Dynamic Spotlight on Service Card Hover
    const serviceCards = document.querySelectorAll('.mega-service-card-v2');
    const spotlightCard = document.getElementById('megaSpotlightCard');
    const spotlightImg = document.getElementById('megaSpotlightImg');
    const spotlightBadge = document.getElementById('megaSpotlightBadge');
    const spotlightTitle = document.getElementById('megaSpotlightTitle');
    const spotlightDesc = document.getElementById('megaSpotlightDesc');
    const spotlightBullets = document.getElementById('megaSpotlightBullets');
    const spotlightCta = document.getElementById('megaSpotlightCta');

    if (!spotlightCard || !serviceCards.length) return;

    function updateSpotlightFromCard(card) {
        if (!card) return;
        const badge = card.getAttribute('data-badge');
        const title = card.getAttribute('data-title');
        const desc = card.getAttribute('data-desc');
        const bulletsStr = card.getAttribute('data-bullets') || '';
        const img = card.getAttribute('data-img');
        const ctaUrl = card.getAttribute('data-cta-url');
        const ctaText = card.getAttribute('data-cta-text');

        spotlightCard.classList.add('spotlight-fading');

        setTimeout(() => {
            if (badge && spotlightBadge) spotlightBadge.textContent = badge;
            if (title && spotlightTitle) spotlightTitle.textContent = title;
            if (desc && spotlightDesc) spotlightDesc.textContent = desc;
            if (img && spotlightImg) spotlightImg.src = img;
            if (ctaUrl && spotlightCta) spotlightCta.href = ctaUrl;
            if (ctaText && spotlightCta) {
                spotlightCta.innerHTML = `<span>${ctaText}</span>`;
            }

            if (spotlightBullets && bulletsStr) {
                const bullets = bulletsStr.split('|');
                spotlightBullets.innerHTML = bullets.map(b => `<div>${b}</div>`).join('');
            }

            spotlightCard.classList.remove('spotlight-fading');
        }, 120);
    }

    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            if (window.innerWidth < 992) return;
            serviceCards.forEach(c => c.classList.remove('active'));
            card.classList.add('active');
            updateSpotlightFromCard(card);
        });
    });

    const megaContainer = document.querySelector('.mega-menu-container');
    if (megaContainer) {
        megaContainer.addEventListener('mouseleave', () => {
            const currentPageCard = document.querySelector('.mega-service-card-v2.current-page');
            if (currentPageCard) {
                serviceCards.forEach(c => c.classList.remove('active'));
                currentPageCard.classList.add('active');
                updateSpotlightFromCard(currentPageCard);
            }
        });
    }
}

/* ==========================================================================
   Mobile Navigation Off-Canvas Drawer (Left to Right)
   ========================================================================== */
function initMobileNav() {
    const openBtn = document.getElementById('mobileNavOpenBtn');
    const closeBtn = document.getElementById('mobileNavCloseBtn');
    const drawer = document.getElementById('mobileNavDrawer');
    const backdrop = document.getElementById('mobileNavBackdrop');
    const servicesToggle = document.getElementById('mobileServicesToggle');
    const servicesMenu = document.getElementById('mobileServicesMenu');

    if (!drawer) return;

    function openDrawer() {
        drawer.classList.add('is-open', 'open');
        if (backdrop) {
            backdrop.classList.add('is-open', 'active', 'open');
        }
        document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
        drawer.classList.remove('is-open', 'open');
        if (backdrop) {
            backdrop.classList.remove('is-open', 'active', 'open');
        }
        document.body.style.overflow = '';
    }

    if (openBtn) {
        openBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            openDrawer();
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', (e) => {
            e.preventDefault();
            closeDrawer();
        });
    }

    if (backdrop) {
        backdrop.addEventListener('click', (e) => {
            e.preventDefault();
            closeDrawer();
        });
    }

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && (drawer.classList.contains('is-open') || drawer.classList.contains('open'))) {
            closeDrawer();
        }
    });

    // Mobile Services Accordion Toggle
    if (servicesToggle && servicesMenu) {
        servicesToggle.addEventListener('click', (e) => {
            e.preventDefault();
            const isOpen = servicesMenu.classList.contains('is-open') || servicesMenu.classList.contains('open');
            if (isOpen) {
                servicesMenu.classList.remove('is-open', 'open');
                servicesToggle.classList.remove('open', 'is-open');
            } else {
                servicesMenu.classList.add('is-open', 'open');
                servicesToggle.classList.add('open', 'is-open');
            }
        });
    }

    // Auto-close drawer on clicking normal links
    drawer.querySelectorAll('a:not(#mobileServicesToggle)').forEach(link => {
        link.addEventListener('click', () => {
            closeDrawer();
        });
    });
}

function initHeaderScroll() {
    const header = document.querySelector('.site-header, .header-main, #siteHeader');
    const progressBar = document.getElementById('headerScrollProgress');
    if (!header) return;

    function handleScroll() {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;
        
        // Sticky Glass State
        if (scrollTop > 15) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        // Reading Scroll Progress Indicator
        if (progressBar) {
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            if (docHeight > 0) {
                const progressPercent = Math.min(Math.max((scrollTop / docHeight) * 100, 0), 100);
                progressBar.style.width = progressPercent + '%';
            }
        }
    }

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();
}

/* ==========================================================================
   Mobile Navigation Toggle & Bottom Sheet Drawer
   ========================================================================== */
function initMobileNav() {
    const openBtn = document.getElementById('mobileNavOpenBtn') || document.querySelector('.mobile-nav-toggle');
    const closeBtn = document.getElementById('mobileNavCloseBtn');
    const drawer = document.getElementById('mobileNavDrawer');
    const backdrop = document.getElementById('mobileNavBackdrop');
    const servicesToggle = document.getElementById('mobileServicesToggle');
    const servicesMenu = document.getElementById('mobileServicesMenu');

    if (!drawer) return;

    function openDrawer() {
        drawer.classList.add('is-open', 'open');
        if (backdrop) backdrop.classList.add('is-open', 'active');
        document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
        drawer.classList.remove('is-open', 'open');
        if (backdrop) backdrop.classList.remove('is-open', 'active');
        document.body.style.overflow = '';
    }

    if (openBtn) {
        openBtn.addEventListener('click', (e) => {
            e.preventDefault();
            openDrawer();
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', (e) => {
            e.preventDefault();
            closeDrawer();
        });
    }

    if (backdrop) {
        backdrop.addEventListener('click', () => {
            closeDrawer();
        });
    }

    if (servicesToggle && servicesMenu) {
        servicesToggle.addEventListener('click', (e) => {
            e.preventDefault();
            servicesMenu.classList.toggle('is-open');
            servicesToggle.classList.toggle('active');
        });
    }

    // Close on ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && drawer.classList.contains('open')) {
            closeDrawer();
        }
    });

    // Toggle Mobile Services Submenu Accordion
    if (servicesToggle && servicesMenu) {
        servicesToggle.addEventListener('click', (e) => {
            e.preventDefault();
            servicesToggle.classList.toggle('open');
            servicesMenu.classList.toggle('open');
        });
    }
}

/* ==========================================================================
   Shopping Cart Drawer & Global AJAX Add-to-Cart Manager
   ========================================================================== */
function initCartDrawer() {
    const overlay = document.querySelector('.cart-drawer-overlay');
    const drawer = document.querySelector('.cart-drawer');
    const triggers = document.querySelectorAll('.cart-trigger-btn, .open-cart-drawer');
    const closeBtns = document.querySelectorAll('.close-cart-drawer');

    function openCart() {
        if (overlay) overlay.classList.add('open');
        if (drawer) drawer.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeCart() {
        if (overlay) overlay.classList.remove('open');
        if (drawer) drawer.classList.remove('open');
        document.body.style.overflow = '';
    }

    triggers.forEach(btn => btn.addEventListener('click', (e) => {
        e.preventDefault();
        openCart();
    }));

    closeBtns.forEach(btn => btn.addEventListener('click', (e) => {
        e.preventDefault();
        closeCart();
    }));

    if (overlay) {
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) closeCart();
        });
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && drawer && drawer.classList.contains('open')) {
            closeCart();
        }
    });

    // Global Delegated Event for AJAX Add-to-Cart (Supports dynamically loaded infinite scroll cards)
    document.addEventListener('submit', async (e) => {
        const form = e.target.closest('.ajax-add-to-cart-form');
        if (!form) return;

        e.preventDefault();
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn ? submitBtn.innerHTML : '';
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span>⏳ Agregando...</span>';
        }

        try {
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const data = await response.json();
                if (submitBtn) {
                    submitBtn.innerHTML = '<span>✓ ¡Añadido!</span>';
                    setTimeout(() => {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                    }, 1800);
                }

                // Update cart count badge
                const countBadges = document.querySelectorAll('.cart-count-badge, .cart-count');
                if (data.cart_count !== undefined) {
                    countBadges.forEach(b => {
                        b.textContent = data.cart_count;
                        b.style.display = data.cart_count > 0 ? 'inline-flex' : 'none';
                    });
                }

                // Update drawer items if HTML provided
                if (data.drawer_html) {
                    const itemsContainer = document.querySelector('.cart-drawer-items');
                    if (itemsContainer) itemsContainer.innerHTML = data.drawer_html;
                }

                // Open cart drawer
                openCart();
            } else {
                form.submit();
            }
        } catch (err) {
            form.submit();
        }
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

/* ==========================================================================
   Google PageSpeed Live Audit Modal Handler
   ========================================================================== */
function initAuditModal() {
    const modal = document.getElementById('auditModalOverlay');
    const closeBtn = document.getElementById('closeAuditModalBtn');
    const openBtns = document.querySelectorAll('.open-audit-modal-btn');
    const form = document.getElementById('auditAnalysisForm');
    const loadingState = document.getElementById('auditLoadingState');
    const loadingMsg = document.getElementById('auditLoadingMsg');
    const resultsState = document.getElementById('auditResultsState');

    if (!modal) return;

    function openModal() {
        modal.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.remove('open');
        document.body.style.overflow = '';
    }

    openBtns.forEach(btn => btn.addEventListener('click', openModal));

    if (closeBtn) closeBtn.addEventListener('click', closeModal);

    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = document.getElementById('auditSubmitBtn');
            if (submitBtn) submitBtn.disabled = true;

            form.style.display = 'none';
            if (loadingState) loadingState.style.display = 'block';

            const msgs = [
                'Conectando con los servidores de tu sitio web...',
                'Midiendo First Contentful Paint (FCP) y Largest Contentful Paint (LCP)...',
                'Analizando tiempo de respuesta (TTFB) y compresión...',
                'Generando reporte de Core Web Vitals...'
            ];
            let msgIdx = 0;
            const msgTimer = setInterval(() => {
                msgIdx = (msgIdx + 1) % msgs.length;
                if (loadingMsg) loadingMsg.textContent = msgs[msgIdx];
            }, 1200);

            const formData = new FormData(this);

            fetch('/auditoria/analizar', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': getCsrfToken()
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                clearInterval(msgTimer);
                if (loadingState) loadingState.style.display = 'none';

                if (data.success) {
                    if (resultsState) resultsState.style.display = 'block';

                    const targetUrlEl = document.getElementById('auditTargetUrl');
                    if (targetUrlEl) targetUrlEl.textContent = data.website_url;

                    const mobNum = document.getElementById('mobileScoreNum');
                    const mobCircle = document.getElementById('mobileScoreCircle');
                    if (mobNum) mobNum.textContent = data.mobile_score;
                    if (mobCircle) {
                        mobCircle.className = 'score-circle-wrap ' + (data.mobile_score >= 90 ? 'score-green' : (data.mobile_score >= 50 ? 'score-orange' : 'score-red'));
                    }

                    const deskNum = document.getElementById('desktopScoreNum');
                    const deskCircle = document.getElementById('desktopScoreCircle');
                    if (deskNum) deskNum.textContent = data.desktop_score;
                    if (deskCircle) {
                        deskCircle.className = 'score-circle-wrap ' + (data.desktop_score >= 90 ? 'score-green' : (data.desktop_score >= 50 ? 'score-orange' : 'score-red'));
                    }

                    const lcpEl = document.getElementById('metricLcpVal');
                    const ttfbEl = document.getElementById('metricTtfbVal');
                    const clsEl = document.getElementById('metricClsVal');
                    if (lcpEl) lcpEl.textContent = data.lcp + 's';
                    if (ttfbEl) ttfbEl.textContent = data.ttfb + 'ms';
                    if (clsEl) clsEl.textContent = data.cls;

                    const listEl = document.getElementById('auditRecommendationsList');
                    if (listEl && data.recommendations) {
                        listEl.innerHTML = data.recommendations.map(r => `<li>${r}</li>`).join('');
                    }

                    const waBtn = document.getElementById('auditWhatsappCtaBtn');
                    if (waBtn && data.whatsapp_url) {
                        waBtn.href = data.whatsapp_url;
                    }
                } else {
                    alert(data.message || 'Error al analizar el sitio.');
                    form.style.display = 'block';
                    if (submitBtn) submitBtn.disabled = false;
                }
            })
            .catch(() => {
                clearInterval(msgTimer);
                if (loadingState) loadingState.style.display = 'none';
                form.style.display = 'block';
                if (submitBtn) submitBtn.disabled = false;
            });
        });
    }
}

/* ==========================================================================
   Interactive FAQ Accordion
   ========================================================================== */
function initFaqAccordion() {
    document.addEventListener('click', (e) => {
        const btn = e.target.closest('.faq-header-btn');
        if (!btn) return;

        const item = btn.closest('.faq-card-item');
        if (!item) return;

        const isOpen = item.classList.contains('is-open');

        // Close siblings within the same accordion group
        const parentList = item.closest('.faq-accordion-list') || item.parentElement;
        if (parentList) {
            parentList.querySelectorAll('.faq-card-item').forEach(other => {
                if (other !== item) other.classList.remove('is-open');
            });
        }

        if (isOpen) {
            item.classList.remove('is-open');
        } else {
            item.classList.add('is-open');
        }
    });
}

/* ==========================================================================
   Live Speed Benchmark Race Simulator (REW vs Standard Site)
   ========================================================================== */
function initSpeedBenchmarkRace() {
    const section = document.getElementById('speedRaceBenchmarkSection');
    if (!section) return;

    const replayBtn = document.getElementById('replaySpeedRaceBtn');
    const statusPillText = document.getElementById('speedRaceStatusText');
    
    // Slow elements
    const cardSlow = document.getElementById('benchmarkCardSlow');
    const timerSlow = document.getElementById('timerSlowVal');
    const barSlow = document.getElementById('raceBarSlow');
    const percentSlow = document.getElementById('slowLoadPercent');
    const msgSlow = document.getElementById('slowStepMsg');

    // Fast elements
    const cardFast = document.getElementById('benchmarkCardFast');
    const timerFast = document.getElementById('timerFastVal');
    const barFast = document.getElementById('raceBarFast');
    const percentFast = document.getElementById('fastLoadPercent');
    const msgFast = document.getElementById('fastStepMsg');

    let isRunning = false;
    let hasAutoRun = false;
    let fastAnimId = null;
    let slowAnimId = null;

    function runRace() {
        if (isRunning) return;
        isRunning = true;

        if (fastAnimId) cancelAnimationFrame(fastAnimId);
        if (slowAnimId) cancelAnimationFrame(slowAnimId);

        // Reset states
        if (cardFast) cardFast.classList.remove('winner-glow');
        if (timerFast) timerFast.textContent = '0.00s';
        if (timerSlow) timerSlow.textContent = '0.00s';
        if (barFast) barFast.style.width = '0%';
        if (barSlow) barSlow.style.width = '0%';
        if (percentFast) percentFast.textContent = '0%';
        if (percentSlow) percentSlow.textContent = '0%';
        if (msgFast) msgFast.textContent = '⚡ Solicitando contenido optimizado...';
        if (msgSlow) msgSlow.textContent = '⏳ Conectando a hosting compartido saturado...';
        if (statusPillText) statusPillText.textContent = '🏎️ ¡Carrera iniciada! Cargando ambas webs...';

        const raceStartTime = performance.now();
        const FAST_TARGET_TIME = 380; // 0.38s in ms
        const SLOW_TARGET_TIME = 4350; // 4.35s in ms

        // Fast Runner (REW)
        function stepFast(now) {
            const elapsed = now - raceStartTime;
            const progress = Math.min(elapsed / FAST_TARGET_TIME, 1);
            
            if (timerFast) {
                const currentSec = (Math.min(elapsed, FAST_TARGET_TIME) / 1000).toFixed(2);
                timerFast.textContent = currentSec + 's';
            }

            if (barFast) barFast.style.width = Math.round(progress * 100) + '%';
            if (percentFast) percentFast.textContent = Math.round(progress * 100) + '%';

            if (progress < 1) {
                if (progress > 0.4 && msgFast) msgFast.textContent = '⚡ Caché L1 + PHP 8.3 OPcache entregado...';
                fastAnimId = requestAnimationFrame(stepFast);
            } else {
                if (timerFast) timerFast.textContent = '0.38s ⚡';
                if (barFast) barFast.style.width = '100%';
                if (percentFast) percentFast.textContent = '100%';
                if (msgFast) msgFast.textContent = '🏆 ¡Carga Completa en 0.38s! Score 100/100';
                if (cardFast) cardFast.classList.add('winner-glow');
            }
        }

        // Slow Runner (Generic Site)
        function stepSlow(now) {
            const elapsed = now - raceStartTime;
            const progress = Math.min(elapsed / SLOW_TARGET_TIME, 1);

            if (timerSlow) {
                const currentSec = (Math.min(elapsed, SLOW_TARGET_TIME) / 1000).toFixed(2);
                timerSlow.textContent = currentSec + 's';
            }

            // Nonlinear sluggish progress with simulated lag stalls
            let visualPercent = 0;
            if (elapsed < 800) {
                visualPercent = (elapsed / 800) * 15;
                if (msgSlow) msgSlow.textContent = '⏳ Esperando respuesta del servidor (TTFB lento: 800ms)...';
            } else if (elapsed < 2200) {
                visualPercent = 15 + ((elapsed - 800) / 1400) * 30;
                if (msgSlow) msgSlow.textContent = '📦 Descargando 85 scripts JS y plugins pesados...';
            } else if (elapsed < 3600) {
                visualPercent = 45 + ((elapsed - 2200) / 1400) * 30;
                if (msgSlow) msgSlow.textContent = '⚠️ Bloqueo de renderizado por CSS sin minificar...';
            } else {
                visualPercent = 75 + ((elapsed - 3600) / 750) * 25;
                if (msgSlow) msgSlow.textContent = '❌ Finalizado en 4.35s (El 65% de clientes ya cerró la pestaña)';
            }

            if (barSlow) barSlow.style.width = Math.min(Math.round(visualPercent), 100) + '%';
            if (percentSlow) percentSlow.textContent = Math.min(Math.round(visualPercent), 100) + '%';

            if (progress < 1) {
                slowAnimId = requestAnimationFrame(stepSlow);
            } else {
                if (timerSlow) timerSlow.textContent = '4.35s 🐌';
                if (barSlow) barSlow.style.width = '100%';
                if (percentSlow) percentSlow.textContent = '100%';
                if (statusPillText) {
                    statusPillText.innerHTML = '🏆 <strong>Resultado:</strong> ¡REW ganó por <strong>3.97 segundos de ventaja</strong> (11.4x más veloz)!';
                }
                isRunning = false;
            }
        }

        fastAnimId = requestAnimationFrame(stepFast);
        slowAnimId = requestAnimationFrame(stepSlow);
    }

    // Scroll trigger with IntersectionObserver
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !hasAutoRun) {
                    hasAutoRun = true;
                    setTimeout(runRace, 300);
                }
            });
        }, { threshold: 0.25 });

        observer.observe(section);
    } else {
        runRace();
    }

    if (replayBtn) {
        replayBtn.addEventListener('click', () => {
            runRace();
        });
    }
}

/* ==========================================================================
   Home & Global Staggered Scroll Reveal Animations & Number Counters
   ========================================================================== */
function initHomeScrollAnimations() {
    const revealTargets = document.querySelectorAll('.service-card, .product-card, .portfolio-card, .process-step-card, .google-review-card, .reveal-on-scroll');
    
    revealTargets.forEach(el => {
        if (!el.classList.contains('reveal-on-scroll')) {
            el.classList.add('reveal-on-scroll');
        }
    });

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-revealed');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        revealTargets.forEach(el => observer.observe(el));
    } else {
        revealTargets.forEach(el => el.classList.add('is-revealed'));
    }

    // Number Counter Animation for Stats
    const counterElements = document.querySelectorAll('[data-counter]');
    if ('IntersectionObserver' in window && counterElements.length) {
        const counterObs = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.getAttribute('data-counter'), 10) || 0;
                    const prefix = el.getAttribute('data-counter-prefix') || '';
                    const suffix = el.getAttribute('data-counter-suffix') || '';
                    const duration = 1600;
                    const startTime = performance.now();

                    function animateCount(now) {
                        const elapsed = now - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        // Ease out cubic
                        const easeVal = 1 - Math.pow(1 - progress, 3);
                        const current = Math.floor(easeVal * target);

                        el.textContent = `${prefix}${current}${suffix}`;

                        if (progress < 1) {
                            requestAnimationFrame(animateCount);
                        } else {
                            el.textContent = `${prefix}${target}${suffix}`;
                        }
                    }

                    requestAnimationFrame(animateCount);
                    obs.unobserve(el);
                }
            });
        }, { threshold: 0.3 });

        counterElements.forEach(el => counterObs.observe(el));
    }
    // Touch Support for Mobile Portfolio Cards Auto-Scroll
    const portfolioCards = document.querySelectorAll('.portfolio-card, .portfolio-card-premium');
    portfolioCards.forEach(card => {
        card.addEventListener('touchstart', () => {
            card.classList.add('is-hovered');
        }, { passive: true });

        card.addEventListener('touchend', () => {
            setTimeout(() => {
                card.classList.remove('is-hovered');
            }, 2500);
        }, { passive: true });
    });
}
