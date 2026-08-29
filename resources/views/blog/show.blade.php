@extends('layouts.app')

@section('title', ($post->meta_title ?? $post->title) . ' | REW')
@section('meta_description', $post->meta_description ?? $post->excerpt)

@section('og_type', 'article')
@section('og_title', $post->title)
@section('og_description', $post->excerpt)
@section('og_image', $post->featured_image ?? asset('images/logo.webp'))
@section('article_published_time', $post->created_at->toIso8601String())
@section('article_modified_time', $post->updated_at->toIso8601String())

@section('schema_json')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BlogPosting",
    "headline": "{{ $post->title }}",
    "image": "{{ $post->featured_image ?? asset('images/logo.webp') }}",
    "author": {
        "@@type": "Person",
        "name": "{{ $post->author_name }}"
    },
    "publisher": {
        "@@type": "Organization",
        "name": "REW",
        "logo": {
            "@@type": "ImageObject",
            "url": "{{ asset('images/logo.webp') }}"
        }
    },
    "datePublished": "{{ $post->created_at->toIso8601String() }}",
    "dateModified": "{{ $post->updated_at->toIso8601String() }}",
    "description": "{{ $post->excerpt }}"
}
</script>
@endsection

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%);">
    <div class="container container-narrow">
        <!-- Breadcrumb -->
        <div style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted);">
            <a href="{{ route('home') }}">Inicio</a> &nbsp;/&nbsp;
            <a href="{{ route('blog.index') }}">Blog</a> &nbsp;/&nbsp;
            <span style="color: var(--text-dark); font-weight: 600;">{{ $post->title }}</span>
        </div>

        <div style="margin-bottom: 2rem;">
            <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 1rem;">
                <span class="badge badge-primary">{{ $post->category }}</span>
                <span style="font-size: 0.85rem; color: var(--text-muted);">Publicado el {{ $post->created_at->translatedFormat('d F, Y') }}</span>
                <span style="font-size: 0.85rem; color: var(--text-muted);">• {{ $post->read_time_minutes }} min de lectura</span>
            </div>
            <h1 style="font-size: 2.8rem; margin-bottom: 1.5rem; line-height: 1.2;">{{ $post->title }}</h1>
            <p style="font-size: 1.2rem; color: var(--text-body); line-height: 1.6; font-style: italic;">
                {{ $post->excerpt }}
            </p>
        </div>

        @if($post->featured_image)
            <div class="card" style="padding: 0; overflow: hidden; margin-bottom: 3rem; border-radius: var(--radius-xl);">
                <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" style="width: 100%; max-height: 480px; object-fit: cover;">
            </div>
        @endif

        <div class="card" style="padding: 3rem; font-size: 1.1rem; line-height: 1.8; color: var(--text-body); margin-bottom: 3rem;">
            {!! $post->content !!}
        </div>

        <!-- Author Box -->
        <div class="card" style="padding: 2rem; display: flex; gap: 1.5rem; align-items: center; margin-bottom: 4rem; background: var(--bg-alt);">
            <div style="font-size: 3rem;">👨‍💻</div>
            <div>
                <h3 style="font-size: 1.2rem; margin-bottom: 0.25rem;">Escrito por {{ $post->author_name }}</h3>
                <p style="font-size: 0.9rem; color: var(--text-muted); line-height: 1.5; margin-bottom: 0.75rem;">
                    Ingeniero Informático, desarrollador de software y estratega de inbound marketing en Chile. Fundador de REW.
                </p>
                <a href="https://api.whatsapp.com/send?phone=56987261127" target="_blank" rel="noopener" style="font-size: 0.85rem; font-weight: 700; color: #25d366;">
                    Contactar a Álvaro por WhatsApp (+56 9 8726 1127) →
                </a>
            </div>
        </div>

        <!-- Recent Posts -->
        @if($recentPosts->isNotEmpty())
            <div>
                <h3 style="font-size: 1.6rem; margin-bottom: 1.5rem;">Artículos Relacionados</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
                    @foreach($recentPosts as $rec)
                        <div class="card" style="padding: 1.5rem;">
                            <span class="badge badge-primary" style="margin-bottom: 0.5rem;">{{ $rec->category }}</span>
                            <h4 style="font-size: 1.1rem; margin-bottom: 0.5rem;">
                                <a href="{{ route('blog.show', $rec->slug) }}">{{ $rec->title }}</a>
                            </h4>
                            <a href="{{ route('blog.show', $rec->slug) }}" style="font-size: 0.85rem; font-weight: 700;">Leer →</a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
