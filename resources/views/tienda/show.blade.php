@extends('layouts.app')

@section('title', $product->meta_title ?? $product->name . ' | REW Tienda')
@section('meta_description', $product->meta_description ?? $product->short_description)

@section('og_type', 'product')
@section('og_title', $product->name . ' (Licencia Oficial) | REW')
@section('og_description', $product->short_description)
@section('og_image', $product->featured_image)

@section('schema_json')
<script type="application/ld+json">
{
    "@@context": "https://schema.org/",
    "@@type": "Product",
    "name": "{{ $product->name }}",
    "image": "{{ $product->featured_image }}",
    "description": "{{ $product->short_description }}",
    "sku": "{{ $product->sku }}",
    "brand": {
        "@@type": "Brand",
        "name": "REW"
    },
    "offers": {
        "@@type": "Offer",
        "url": "{{ route('tienda.show', $product->slug) }}",
        "priceCurrency": "USD",
        "price": "{{ $product->price_usd }}",
        "availability": "https://schema.org/InStock",
        "seller": {
            "@@type": "Organization",
            "name": "REW"
        }
    }
}
</script>
@endsection

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%);">
    <div class="container">
        <!-- Breadcrumb -->
        <div style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}">Inicio</a> &nbsp;/&nbsp;
            <a href="{{ route('tienda.index') }}">Tienda</a> &nbsp;/&nbsp;
            <span style="color: var(--text-dark); font-weight: 600;">{{ $product->name }}</span>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1.15fr; gap: 3.5rem; align-items: flex-start; margin-bottom: 4rem;">
            <!-- Left: Product Image Showcase -->
            <div>
                <div class="card" style="padding: 2rem; background: #ffffff; text-align: center; border-radius: var(--radius-xl);">
                    @if($product->badge)
                        <div style="text-align: left; margin-bottom: 1rem;">
                            <span class="badge {{ str_contains($product->badge, 'OFERTA') ? 'badge-gold' : 'badge-primary' }}">
                                {{ $product->badge }}
                            </span>
                        </div>
                    @endif
                    <img src="{{ $product->featured_image }}" alt="{{ $product->name }}" style="max-height: 380px; margin: 0 auto; object-fit: contain;">
                </div>
            </div>

            <!-- Right: Product Info & Purchase Form -->
            <div>
                <span class="badge badge-primary" style="margin-bottom: 0.75rem;">{{ $product->category_slug }}</span>
                <h1 style="font-size: 2.4rem; margin-bottom: 1rem; line-height: 1.25;">{{ $product->name }}</h1>

                <div style="display: flex; align-items: baseline; gap: 1rem; margin-bottom: 1.5rem;">
                    <span class="price-current price-tag-dynamic" style="font-size: 2.4rem; color: var(--primary);" 
                          data-usd="{{ $product->price_usd }}" data-clp="{{ $product->price_clp }}">
                        ${{ number_format($product->price_usd, 0) }} USD
                    </span>
                    @if($product->original_price_usd)
                        <span class="price-original price-tag-dynamic" style="font-size: 1.3rem;"
                              data-usd="{{ $product->original_price_usd }}" data-clp="{{ $product->original_price_clp }}">
                            ${{ number_format($product->original_price_usd, 0) }} USD
                        </span>
                        <span class="badge badge-gold">{{ $product->discount_percentage }}% Dcto</span>
                    @endif
                </div>

                <p style="font-size: 1.05rem; color: var(--text-body); line-height: 1.6; margin-bottom: 2rem;">
                    {{ $product->short_description }}
                </p>

                <!-- Purchase Buttons -->
                <div class="card" style="padding: 1.75rem; background: var(--bg-alt); margin-bottom: 2rem;">
                    <form action="{{ route('cart.add') }}" method="POST" class="ajax-add-to-cart-form" style="margin-bottom: 1rem;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div style="display: flex; gap: 1rem; align-items: center;">
                            <div style="width: 80px;">
                                <input type="number" name="quantity" value="1" min="1" max="10" 
                                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-size: 1rem; text-align: center;">
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg" style="flex-grow: 1;">
                                <span>🛒 Añadir al Carrito</span>
                            </button>
                        </div>
                    </form>

                    <!-- Direct WhatsApp Buy -->
                    @php
                        $waText = "¡Hola Álvaro! Quiero comprar la licencia de *{$product->name}* (SKU: {$product->sku}) por \${$product->price_usd} USD.";
                    @endphp
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ urlencode($waText) }}" 
                       target="_blank" rel="noopener" class="btn btn-whatsapp" style="width: 100%; text-align: center;">
                        <span>💬 Comprar Directo por WhatsApp (+56987261127)</span>
                    </a>
                </div>

                <!-- Guarantee Box -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; font-size: 0.85rem; color: var(--text-muted);">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span>🔒</span> <span>Licencia Oficial REW 100% Segura</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span>⚡</span> <span>Actualizaciones y Soporte Directo</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Features & Tech Specs Tabs -->
        <div class="card" style="padding: 2.5rem; margin-bottom: 4rem;">
            <h2 style="font-size: 1.8rem; margin-bottom: 1.5rem;">Características & Especificaciones Técnicas</h2>
            
            <div style="margin-bottom: 2rem; font-size: 1.05rem; line-height: 1.7;">
                {!! nl2br(e($product->description)) !!}
            </div>

            @if($product->features)
                <h3 style="font-size: 1.3rem; margin-bottom: 1rem;">¿Qué incluye esta solución?</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1rem; margin-bottom: 2.5rem;">
                    @foreach($product->features as $feat)
                        <div style="display: flex; align-items: flex-start; gap: 10px; background: var(--bg-alt); padding: 1rem; border-radius: 8px;">
                            <span style="color: var(--primary); font-weight: 800; font-size: 1.1rem;">✓</span>
                            <span style="font-size: 0.95rem; color: var(--text-dark); font-weight: 600;">{{ $feat }}</span>
                        </div>
                    @endforeach
                </div>
            @endif

            @if($product->requirements)
                <h3 style="font-size: 1.3rem; margin-bottom: 1rem;">Requisitos de Sistema</h3>
                <div style="background: #fffbeb; border: 1px solid rgba(245, 158, 11, 0.3); border-radius: 10px; padding: 1.25rem; margin-bottom: 2.5rem;">
                    <ul style="padding-left: 1.5rem; margin: 0; color: #92400e; font-size: 0.95rem; line-height: 1.7;">
                        @foreach($product->requirements as $req)
                            <li>{{ $req }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($product->faqs)
                <h3 style="font-size: 1.3rem; margin-bottom: 1rem;">Preguntas Frecuentes</h3>
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    @foreach($product->faqs as $faq)
                        <div style="background: var(--bg-alt); border-radius: 10px; padding: 1.25rem; border: 1px solid var(--border-light);">
                            <h4 style="font-size: 1.05rem; margin-bottom: 0.5rem; color: var(--text-dark);">{{ $faq['q'] }}</h4>
                            <p style="font-size: 0.92rem; color: var(--text-muted); margin: 0; line-height: 1.5;">{{ $faq['a'] }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Related Products -->
        @if($relatedProducts->isNotEmpty())
            <div style="margin-bottom: 2rem;">
                <h3 style="font-size: 1.8rem; margin-bottom: 1.5rem;">Otros Plugins Recomendados</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
                    @foreach($relatedProducts as $rel)
                        <div class="card product-card">
                            <div class="product-img-wrap" style="height: 160px;">
                                <a href="{{ route('tienda.show', $rel->slug) }}">
                                    <img src="{{ $rel->featured_image }}" alt="{{ $rel->name }}" class="product-img" style="max-height: 120px;">
                                </a>
                            </div>
                            <div class="product-content">
                                <h4 style="font-size: 1.1rem; margin-bottom: 0.5rem;">
                                    <a href="{{ route('tienda.show', $rel->slug) }}">{{ $rel->name }}</a>
                                </h4>
                                <div class="product-pricing">
                                    <span class="price-current price-tag-dynamic" data-usd="{{ $rel->price_usd }}" data-clp="{{ $rel->price_clp }}">
                                        ${{ number_format($rel->price_usd, 0) }} USD
                                    </span>
                                </div>
                                <a href="{{ route('tienda.show', $rel->slug) }}" class="btn btn-outline btn-sm" style="width: 100%; text-align: center;">
                                    Ver Ficha Técnica
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
