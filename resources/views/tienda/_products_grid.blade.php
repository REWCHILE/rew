@foreach($products as $prod)
    @php
        $prodUrl = ($prod->slug === 'plugin-integracion-bsale-woocommerce') 
            ? route('servicios.bsale-woocommerce') 
            : route('tienda.show', $prod->slug);
    @endphp
    <div class="card product-card product-card-item">
        <div class="product-img-wrap">
            @if($prod->badge)
                <div class="product-badge-top">
                    <span class="badge {{ (str_contains($prod->badge, 'OFERTA') || str_contains($prod->badge, 'LIFETIME') || str_contains($prod->badge, 'PAGO ÚNICO')) ? 'badge-gold' : 'badge-primary' }}">
                        {{ $prod->badge }}
                    </span>
                </div>
            @endif
            <a href="{{ $prodUrl }}">
                <img src="{{ Str::startsWith($prod->featured_image, 'http') ? $prod->featured_image : asset(ltrim($prod->featured_image, '/')) }}" alt="{{ $prod->name }}" class="product-img" loading="lazy">
            </a>
        </div>
        <div class="product-content">
            <div class="product-category">{{ str_replace('-', ' ', Str::title($prod->category_slug)) }}</div>
            <h3 class="product-title">
                <a href="{{ $prodUrl }}" style="color: inherit;">
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
