<style>
/* ==========================================================================
   CART DRAWER BULLETPROOF OVERRIDE (Self-contained, immune to LiteSpeed static cache)
   ========================================================================== */
.cart-drawer-overlay {
    position: fixed !important;
    inset: 0 !important;
    background: rgba(15, 23, 42, 0.65) !important;
    backdrop-filter: blur(8px) !important;
    -webkit-backdrop-filter: blur(8px) !important;
    z-index: 99990 !important;
    opacity: 0 !important;
    visibility: hidden !important;
    transition: opacity 0.35s ease, visibility 0.35s ease !important;
}

.cart-drawer-overlay.open {
    opacity: 1 !important;
    visibility: visible !important;
}

.cart-drawer {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    right: auto !important;
    width: 420px !important;
    max-width: 92vw !important;
    height: 100vh !important;
    height: 100dvh !important;
    background: #ffffff !important;
    box-shadow: 15px 0 45px rgba(0, 0, 0, 0.3) !important;
    z-index: 100000 !important;
    display: flex !important;
    flex-direction: column !important;
    transform: translateX(-100%) !important;
    transition: transform 0.38s cubic-bezier(0.16, 1, 0.3, 1) !important;
    will-change: transform !important;
}

.cart-drawer-overlay.open .cart-drawer,
.cart-drawer.open {
    transform: translateX(0) !important;
}

.cart-drawer-header {
    padding: 1.25rem 1.5rem !important;
    border-bottom: 1px solid #e2e8f0 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    background: #ffffff !important;
    flex-shrink: 0 !important;
    z-index: 2 !important;
}

.close-cart-drawer {
    background: #f8fafc !important;
    border: 1px solid #cbd5e1 !important;
    border-radius: 8px !important;
    padding: 6px 12px !important;
    font-size: 1.25rem !important;
    font-weight: 700 !important;
    color: #0f172a !important;
    cursor: pointer !important;
    transition: all 0.2s ease !important;
    line-height: 1 !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
}

.close-cart-drawer:hover {
    background: #e2e8f0 !important;
    color: #0284c7 !important;
    transform: scale(1.08) !important;
}

.cart-drawer-items {
    flex-grow: 1 !important;
    overflow-y: auto !important;
    padding: 1.25rem 1.5rem !important;
    display: flex !important;
    flex-direction: column !important;
    gap: 1rem !important;
}

.cart-drawer-footer {
    padding: 1.25rem 1.5rem !important;
    border-top: 1px solid #e2e8f0 !important;
    background: #f8fafc !important;
    flex-shrink: 0 !important;
}

.cart-drawer-total {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    margin-bottom: 1rem !important;
    font-weight: 700 !important;
    font-size: 1.05rem !important;
}

.cart-drawer-total-amount {
    font-size: 1.35rem !important;
    font-weight: 900 !important;
    color: var(--primary, #0284c7) !important;
}
</style>

<div class="cart-drawer-overlay">
    <div class="cart-drawer">
        <div class="cart-drawer-header">
            <div style="display: flex; align-items: center; gap: 8px;">
                <span style="font-size: 1.3rem;">🛒</span>
                <h3 style="font-size: 1.15rem; font-weight: 800; margin: 0; color: #0f172a;">Tu Carrito de Plugins</h3>
            </div>
            <button type="button" class="btn btn-sm btn-outline close-cart-drawer" title="Cerrar Carrito" aria-label="Cerrar Carrito">✕</button>
        </div>

        <div class="cart-drawer-items">
            @php 
                $cart = session('cart', []); 
                $cartCurrency = session('currency', (app()->getLocale() === 'es') ? 'CLP' : 'USD');
            @endphp
            @if(empty($cart))
                <div class="text-center py-5" style="text-align: center; padding: 3rem 1rem; color: #64748b;">
                    <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">🛒</div>
                    <p style="font-weight: 600;">Tu carrito está vacío</p>
                    <a href="{{ route('tienda.index') }}" class="btn btn-primary btn-sm close-cart-drawer" style="margin-top: 1rem;">Explorar Tienda</a>
                </div>
            @else
                @foreach($cart as $item)
                    <div class="cart-item" style="display: flex; gap: 12px; align-items: center; padding: 12px 0; border-bottom: 1px solid #f1f5f9;">
                        <img src="{{ !empty($item['image']) ? (Str::startsWith($item['image'], 'http') || Str::startsWith($item['image'], 'data:') ? $item['image'] : asset(ltrim($item['image'], '/'))) : asset('images/logo.webp') }}" alt="{{ $item['name'] }}" class="cart-item-img" style="width: 55px; height: 55px; object-fit: contain; background: #0f172a; padding: 4px; border-radius: 8px; flex-shrink: 0;">
                        <div class="cart-item-info" style="flex: 1; min-width: 0;">
                            <h5 class="cart-item-title" style="font-size: 0.92rem; font-weight: 700; margin: 0 0 4px 0; color: #0f172a; line-height: 1.3;">{{ $item['name'] }}</h5>
                            <div class="cart-item-price price-tag-dynamic" data-usd="{{ $item['price_usd'] * $item['quantity'] }}" data-clp="{{ $item['price_clp'] * $item['quantity'] }}" style="font-size: 0.88rem; font-weight: 800; color: #0284c7;">
                                @if($cartCurrency === 'CLP')
                                    ${{ number_format($item['price_clp'] * $item['quantity'], 0, ',', '.') }} CLP <span style="color: #64748b; font-weight: 500;">(x{{ $item['quantity'] }})</span>
                                @else
                                    ${{ number_format($item['price_usd'] * $item['quantity'], 0) }} USD <span style="color: #64748b; font-weight: 500;">(x{{ $item['quantity'] }})</span>
                                @endif
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline remove-from-cart-btn" data-id="{{ $item['id'] }}" title="Eliminar" style="padding: 4px 8px; font-size: 0.85rem; border-radius: 6px; cursor: pointer; border: 1px solid #e2e8f0; background: #ffffff;">✕</button>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="cart-drawer-footer">
            <div class="cart-drawer-total">
                <span>Total Estimado:</span>
                <span class="cart-drawer-total-amount price-tag-dynamic" 
                      data-usd="{{ collect($cart)->sum(fn($i) => $i['price_usd'] * $i['quantity']) }}" 
                      data-clp="{{ collect($cart)->sum(fn($i) => $i['price_clp'] * $i['quantity']) }}">
                    @if($cartCurrency === 'CLP')
                        ${{ number_format(collect($cart)->sum(fn($i) => $i['price_clp'] * $i['quantity']), 0, ',', '.') }} CLP
                    @else
                        ${{ number_format(collect($cart)->sum(fn($i) => $i['price_usd'] * $i['quantity']), 0) }} USD
                    @endif
                </span>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem;">
                <a href="{{ route('cart.index') }}" class="btn btn-outline" style="text-align: center;">Ver Carrito</a>
                <a href="{{ route('checkout.index') }}" class="btn btn-primary" style="text-align: center;">Comprar / Cotizar</a>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    function getEffectiveCurrency() {
        var storedCur = localStorage.getItem('rew_currency');
        var storedLang = localStorage.getItem('rew_lang') || 'es';
        if (storedCur && (storedCur === 'CLP' || storedCur === 'USD')) {
            return storedCur;
        }
        return (storedLang === 'es') ? 'CLP' : 'USD';
    }

    function syncDrawerPrices() {
        var cur = getEffectiveCurrency();
        document.querySelectorAll('.cart-drawer .price-tag-dynamic').forEach(function(el) {
            var usd = el.getAttribute('data-usd');
            var clp = el.getAttribute('data-clp');
            if (cur === 'CLP' && clp) {
                el.textContent = '$' + parseInt(clp).toLocaleString('es-CL') + ' CLP';
            } else if (usd) {
                el.textContent = '$' + parseInt(usd).toLocaleString('en-US') + ' USD';
            }
        });
    }

    function initCartDrawerSelf() {
        var overlay = document.querySelector('.cart-drawer-overlay');
        var drawer = document.querySelector('.cart-drawer');
        var openBtns = document.querySelectorAll('.open-cart-drawer, .cart-trigger-btn');
        var closeBtns = document.querySelectorAll('.close-cart-drawer');

        function open() {
            syncDrawerPrices();
            if (overlay) overlay.classList.add('open');
            if (drawer) drawer.classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function close() {
            if (overlay) overlay.classList.remove('open');
            if (drawer) drawer.classList.remove('open');
            document.body.style.overflow = '';
        }

        openBtns.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                open();
            });
        });

        closeBtns.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                close();
            });
        });

        if (overlay) {
            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) close();
            });
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && overlay && overlay.classList.contains('open')) {
                close();
            }
        });

        window.openCartDrawer = open;
        window.closeCartDrawer = close;
        window.syncDrawerPrices = syncDrawerPrices;

        // Remove item buttons inside drawer
        document.querySelectorAll('.cart-drawer .remove-from-cart-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var prodId = this.getAttribute('data-id');
                var fd = new FormData();
                fd.append('product_id', prodId);

                var csrfMeta = document.querySelector('meta[name="csrf-token"]');
                var token = csrfMeta ? csrfMeta.getAttribute('content') : '';

                fetch('/carrito/eliminar', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: fd
                })
                .then(function(res) { return res.json(); })
                .then(function(data) {
                    if (data.success) {
                        window.location.reload();
                    }
                });
            });
        });

        // Delegate for AJAX add to cart forms
        document.addEventListener('submit', function(e) {
            var form = e.target.closest('.ajax-add-to-cart-form');
            if (!form) return;

            e.preventDefault();
            var submitBtn = form.querySelector('button[type="submit"]');
            var origHtml = submitBtn ? submitBtn.innerHTML : '';
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span>⏳ Agregando...</span>';
            }

            var formData = new FormData(form);
            var actionUrl = form.getAttribute('action') || '/carrito/agregar';

            var csrfMeta = document.querySelector('meta[name="csrf-token"]');
            var token = csrfMeta ? csrfMeta.getAttribute('content') : '';

            fetch(actionUrl, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: formData
            })
            .then(function(res) {
                if (!res.ok) {
                    form.submit();
                    return;
                }
                return res.json();
            })
            .then(function(data) {
                if (data && data.success) {
                    if (submitBtn) {
                        submitBtn.innerHTML = '<span>✓ ¡Añadido!</span>';
                        setTimeout(function() {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = origHtml;
                        }, 2000);
                    }
                    window.location.reload();
                }
            })
            .catch(function(err) {
                form.submit();
            });
        });

        // Sync initially
        syncDrawerPrices();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCartDrawerSelf);
    } else {
        initCartDrawerSelf();
    }

    window.addEventListener('currencyChanged', syncDrawerPrices);
})();
</script>
