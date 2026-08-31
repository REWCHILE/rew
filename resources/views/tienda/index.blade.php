@extends('layouts.app')

@section('title', '🛒 Plugins WordPress & Chatbots IA con Tecnología RAG en Chile | REW Tienda')
@section('meta_description', '🤖 Automatiza tus ventas, añade pagos multi-moneda y potencia tu WooCommerce con plugins desarrollados por ingenieros chilenos. Soporte directo y licencias oficiales.')

@section('og_title', '🛒 Plugins WordPress & Chatbots de IA para E-Commerce | REW Tienda')
@section('og_description', '🔥 Dispara las conversiones de tu tienda online con Rich-E Chatbot, Multi-Currency Pro y plugins diseñados para vender 24/7 sin fricciones.')
@section('og_image', asset('images/products/pack_chatbot_ecommerce.webp'))

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%);">
    <div class="container">
        <!-- Header -->
        <div style="text-align: center; max-width: 800px; margin: 0 auto 3rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Ecosistema Oficial REW</span>
            <h1 style="font-size: 3rem; margin-bottom: 1rem;">Tienda de Plugins WordPress & Soluciones IA</h1>
            <p style="font-size: 1.15rem; color: var(--text-body);">
                Herramientas probadas para potenciar tu comercio electrónico, automatizar la atención a clientes y escalar tus conversiones.
            </p>
        </div>

        <!-- Filter & Search Toolbar -->
        <div class="card" style="padding: 1.5rem; margin-bottom: 3rem; box-shadow: var(--shadow-sm);">
            <div class="shop-toolbar" style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1.5rem;">
                <!-- Category Pills -->
                <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                    <a href="{{ route('tienda.index') }}" 
                       class="badge {{ empty($selectedCategory) || $selectedCategory === 'todos' ? 'badge-primary' : 'badge-pill-glow' }}" 
                       style="text-decoration: none; padding: 8px 16px; font-size: 0.85rem;">
                        Todos ({{ \App\Models\Product::count() }})
                    </a>
                    @foreach($categories as $cat)
                        @php $catCount = \App\Models\Product::where('category_slug', $cat->slug)->count(); @endphp
                        <a href="{{ route('tienda.index', ['categoria' => $cat->slug]) }}" 
                           class="badge {{ $selectedCategory === $cat->slug ? 'badge-primary' : 'badge-pill-glow' }}" 
                           style="text-decoration: none; padding: 8px 16px; font-size: 0.85rem;">
                            {{ $cat->name }} ({{ $catCount }})
                        </a>
                    @endforeach
                </div>

                <!-- Search & Sort Controls -->
                <form action="{{ route('tienda.index') }}" method="GET" class="shop-search-form" style="display: flex; gap: 10px; flex-wrap: wrap;">
                    @if($selectedCategory)
                        <input type="hidden" name="categoria" value="{{ $selectedCategory }}">
                    @endif
                    <input type="text" name="buscar" value="{{ $search }}" placeholder="Buscar plugin..." class="shop-search-input"
                           style="padding: 0.65rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-size: 0.95rem; outline: none;">
                    <select name="orden" onchange="this.form.submit()" class="shop-sort-select"
                            style="padding: 0.65rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-size: 0.95rem; background: #ffffff; outline: none; cursor: pointer;">
                        <option value="destacados" {{ $sort === 'destacados' ? 'selected' : '' }}>Destacados</option>
                        <option value="precio-menor" {{ $sort === 'precio-menor' ? 'selected' : '' }}>Precio: Menor a Mayor</option>
                        <option value="precio-mayor" {{ $sort === 'precio-mayor' ? 'selected' : '' }}>Precio: Mayor a Menor</option>
                        <option value="recientes" {{ $sort === 'recientes' ? 'selected' : '' }}>Más Recientes</option>
                    </select>
                </form>
            </div>
        </div>

        <!-- Products Grid -->
        @if($products->isEmpty())
            <div class="card text-center py-5" style="text-align: center; padding: 4rem 2rem;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">🔍</div>
                <h3 style="font-size: 1.4rem; margin-bottom: 0.5rem;">No se encontraron plugins con ese criterio</h3>
                <p style="color: var(--text-muted); margin-bottom: 1.5rem;">Prueba con otros términos de búsqueda o selecciona otra categoría.</p>
                <a href="{{ route('tienda.index') }}" class="btn btn-primary btn-sm">Ver Todos los Plugins</a>
            </div>
        @else
            <!-- Products Grid Container -->
            <div id="shopProductsGrid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 2.5rem;">
                @include('tienda._products_grid', ['products' => $products])
            </div>

            <!-- Infinite Scroll Loading Sentinel & UI State -->
            <div id="shopInfiniteSentinel" 
                 data-next-url="{{ $products->nextPageUrl() }}" 
                 data-has-more="{{ $products->hasMorePages() ? '1' : '0' }}"
                 style="text-align: center; padding: 2rem 0; min-height: 80px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                
                <div id="shopLoadingSpinner" style="display: none; align-items: center; gap: 12px; background: #ffffff; padding: 12px 24px; border-radius: 9999px; border: 1px solid var(--border-light); box-shadow: var(--shadow-md);">
                    <div class="spinner-ring" style="width: 22px; height: 22px; border: 3px solid rgba(79, 70, 229, 0.2); border-top-color: var(--primary); border-radius: 50%; animation: spin 0.75s linear infinite;"></div>
                    <span style="font-weight: 700; font-size: 0.95rem; color: var(--text-dark);">Cargando más plugins...</span>
                </div>

                <div id="shopEndMessage" style="{{ $products->hasMorePages() ? 'display: none;' : 'display: block;' }} color: var(--text-muted); font-size: 0.92rem; font-weight: 600; background: #f8fafc; padding: 10px 20px; border-radius: 9999px; border: 1px solid var(--border-light);">
                    ✨ Has llegado al final del catálogo de plugins
                </div>
            </div>
        @endif
    </div>
</section>

<style>
@keyframes spin {
    to { transform: rotate(360deg); }
}
.product-card-item.fade-in-entry {
    animation: fadeInCard 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
@keyframes fadeInCard {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const grid = document.getElementById('shopProductsGrid');
    const sentinel = document.getElementById('shopInfiniteSentinel');
    const spinner = document.getElementById('shopLoadingSpinner');
    const endMsg = document.getElementById('shopEndMessage');

    if (!sentinel || !grid) return;

    let isLoading = false;
    let nextUrl = sentinel.getAttribute('data-next-url');
    let hasMore = sentinel.getAttribute('data-has-more') === '1';

    if (!hasMore) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !isLoading && hasMore && nextUrl) {
                loadMoreProducts();
            }
        });
    }, {
        rootMargin: '300px 0px',
        threshold: 0.01
    });

    observer.observe(sentinel);

    async function loadMoreProducts() {
        if (isLoading || !nextUrl) return;
        isLoading = true;
        spinner.style.display = 'inline-flex';

        try {
            const separator = nextUrl.includes('?') ? '&' : '?';
            const fetchUrl = `${nextUrl}${separator}ajax=1`;
            
            const response = await fetch(fetchUrl, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) throw new Error('Network error');

            const data = await response.json();

            if (data.html) {
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = data.html;
                
                const newCards = tempDiv.querySelectorAll('.product-card-item');
                newCards.forEach((card, i) => {
                    card.classList.add('fade-in-entry');
                    card.style.animationDelay = `${i * 0.06}s`;
                    grid.appendChild(card);
                });

                // Trigger currency update event for dynamically loaded price tags
                window.dispatchEvent(new CustomEvent('currency:refresh'));
            }

            hasMore = data.hasMore;
            nextUrl = data.nextPageUrl;
            sentinel.setAttribute('data-has-more', hasMore ? '1' : '0');
            sentinel.setAttribute('data-next-url', nextUrl || '');

            if (!hasMore) {
                observer.unobserve(sentinel);
                if (endMsg) endMsg.style.display = 'block';
            }
        } catch (error) {
            console.error('Error cargando más productos:', error);
        } finally {
            isLoading = false;
            spinner.style.display = 'none';
        }
    }
});
</script>
@endpush
@endsection
