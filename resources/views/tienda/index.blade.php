@extends('layouts.app')

@section('title', 'Tienda de Plugins WordPress & Chatbots IA | REW')
@section('meta_description', 'Comercialización oficial de plugins de WordPress, extensiones WooCommerce y asistentes de Inteligencia Artificial con RAG creados por REW.')

@section('og_title', 'Tienda de Plugins WordPress & Chatbots IA | REW')
@section('og_description', 'Descubre nuestros plugins profesionales para WordPress y WooCommerce: Rich-E Chatbot Assistant, Multi-Currency Pro y más.')
@section('og_image', asset('images/logo.webp'))

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
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem; margin-bottom: 3.5rem;">
                @foreach($products as $prod)
                    <div class="card product-card">
                        <div class="product-img-wrap">
                            @if($prod->badge)
                                <div class="product-badge-top">
                                    <span class="badge {{ str_contains($prod->badge, 'OFERTA') ? 'badge-gold' : 'badge-primary' }}">
                                        {{ $prod->badge }}
                                    </span>
                                </div>
                            @endif
                            <a href="{{ route('tienda.show', $prod->slug) }}">
                                <img src="{{ Str::startsWith($prod->featured_image, 'http') ? $prod->featured_image : asset(ltrim($prod->featured_image, '/')) }}" alt="{{ $prod->name }}" class="product-img" loading="lazy">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-category">{{ $prod->category_slug }}</div>
                            <h3 class="product-title">
                                <a href="{{ route('tienda.show', $prod->slug) }}" style="color: inherit;">
                                    {{ $prod->name }}
                                </a>
                            </h3>
                            <p class="product-desc">{{ $prod->short_description }}</p>

                            <div class="product-pricing">
                                <span class="price-current price-tag-dynamic" data-usd="{{ $prod->price_usd }}" data-clp="{{ $prod->price_clp }}">
                                    ${{ number_format($prod->price_usd, 0) }} USD
                                </span>
                                @if($prod->original_price_usd)
                                    <span class="price-original price-tag-dynamic" data-usd="{{ $prod->original_price_usd }}" data-clp="{{ $prod->original_price_clp }}">
                                        ${{ number_format($prod->original_price_usd, 0) }} USD
                                    </span>
                                @endif
                            </div>

                            <div class="product-actions">
                                <form action="{{ route('cart.add') }}" method="POST" class="ajax-add-to-cart-form" style="display: block;">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $prod->id }}">
                                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                                        <span>Añadir al Carrito</span>
                                    </button>
                                </form>
                                <a href="{{ route('tienda.show', $prod->slug) }}" class="btn btn-outline" title="Ver Detalles">
                                    <span>Detalles</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div style="display: flex; justify-content: center;">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
