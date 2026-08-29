@extends('layouts.app')

@section('title', 'Blog de Tecnología, SEO e Inteligencia Artificial | REW')
@section('meta_description', 'Artículos técnicos, guías de desarrollo web en Laravel, integración de chatbots IA con RAG y optimización SEO por Álvaro Valenzuela Valdés.')

@section('og_title', 'Blog de Tecnología, SEO e Inteligencia Artificial | REW')
@section('og_description', 'Artículos técnicos y guías prácticas sobre desarrollo web, IA conversacional y posicionamiento en Google.')
@section('og_image', asset('images/logo.webp'))

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%);">
    <div class="container">
        <!-- Header -->
        <div style="text-align: center; max-width: 800px; margin: 0 auto 4rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Knowledge Hub</span>
            <h1 style="font-size: 3rem; margin-bottom: 1rem;">Blog & Artículos Técnicos</h1>
            <p style="font-size: 1.15rem; color: var(--text-body);">
                Compartimos aprendizajes, arquitecturas de software, análisis SEO y estrategias de inteligencia artificial aplicada.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 2.5rem; margin-bottom: 4rem;">
            @foreach($posts as $post)
                <div class="card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                    @if($post->featured_image)
                        <div style="height: 220px; overflow: hidden; background: #0f172a;">
                            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    @endif
                    <div style="padding: 1.75rem; flex-grow: 1; display: flex; flex-direction: column;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem; font-size: 0.8rem;">
                            <span class="badge badge-primary">{{ $post->category }}</span>
                            <span style="color: var(--text-muted);">⏱️ {{ $post->read_time_minutes }} min lectura</span>
                        </div>
                        <h2 style="font-size: 1.35rem; font-weight: 800; margin-bottom: 0.75rem; line-height: 1.35;">
                            <a href="{{ route('blog.show', $post->slug) }}" style="color: inherit;">
                                {{ $post->title }}
                            </a>
                        </h2>
                        <p style="color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem; flex-grow: 1;">
                            {{ $post->excerpt }}
                        </p>
                        <div style="padding-top: 1rem; border-top: 1px solid var(--border-light); display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 0.82rem; font-weight: 700; color: var(--text-dark);">✍️ {{ $post->author_name }}</span>
                            <a href="{{ route('blog.show', $post->slug) }}" style="font-size: 0.88rem; font-weight: 700; color: var(--primary);">Leer Artículo →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="display: flex; justify-content: center;">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection
