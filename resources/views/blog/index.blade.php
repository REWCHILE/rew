@extends('layouts.app')

@section('title', 'Blog de Tecnología, SEO, Chatbots & Marketing Digital | REW Chile')
@section('meta_description', 'Artículos técnicos, estrategias de redes sociales, desarrollo web en Laravel, integración de chatbots IA con RAG y marketing digital por Álvaro Valenzuela.')

@section('og_title', 'Blog de Tecnología, SEO, Chatbots & Marketing Digital | REW')
@section('og_description', 'Artículos técnicos y guías prácticas sobre desarrollo web, IA conversacional, redes sociales y posicionamiento en Google.')
@section('og_image', asset('images/logo.webp'))

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%); padding: 5rem 0;">
    <div class="container">
        <!-- Header -->
        <div style="text-align: center; max-width: 840px; margin: 0 auto 3.5rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.85rem;">Knowledge Hub & Estrategia</span>
            <h1 style="font-size: 3rem; margin-bottom: 1rem; line-height: 1.15;">Blog de Ingeniería, IA & Marketing Digital</h1>
            <p style="font-size: 1.15rem; color: var(--text-body); line-height: 1.6;">
                Compartimos guías prácticas sobre inteligencia artificial, desarrollo de software, redes sociales, horarios de publicación y posicionamiento web en Chile.
            </p>
        </div>

        <!-- Topic Cluster Filter Tabs -->
        <div style="display: flex; justify-content: center; gap: 8px; flex-wrap: wrap; margin-bottom: 3.5rem;">
            <a href="{{ route('blog.index') }}" 
               class="btn {{ empty($category) || $category === 'all' ? 'btn-primary' : 'btn-outline' }} btn-sm"
               style="border-radius: 9999px; padding: 0.5rem 1.25rem;">
                Todos los Artículos ({{ $totalCount }})
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('blog.index', ['category' => $cat]) }}" 
                   class="btn {{ $category === $cat ? 'btn-primary' : 'btn-outline' }} btn-sm"
                   style="border-radius: 9999px; padding: 0.5rem 1.25rem;">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <!-- Posts Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 2.25rem; margin-bottom: 4rem;">
            @foreach($posts as $post)
                <article class="card spotlight-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column; border-radius: var(--radius-lg); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    @if($post->featured_image)
                        <a href="{{ route('blog.show', $post->slug) }}" style="display: block; height: 210px; overflow: hidden; background: #090d16; position: relative;">
                            <img src="{{ $post->featured_image }}" 
                                 alt="{{ $post->title }}" 
                                 style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;"
                                 onmouseover="this.style.transform='scale(1.06)'"
                                 onmouseout="this.style.transform='scale(1)'"
                                 loading="lazy">
                        </a>
                    @endif
                    <div style="padding: 1.75rem; flex-grow: 1; display: flex; flex-direction: column;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.85rem; font-size: 0.8rem;">
                            <span class="badge badge-primary" style="font-size: 0.72rem;">{{ $post->category }}</span>
                            <span style="color: var(--text-muted); font-weight: 600;">⏱️ {{ $post->read_time_minutes }} min lectura</span>
                        </div>
                        
                        <h2 style="font-size: 1.3rem; font-weight: 800; margin-bottom: 0.75rem; line-height: 1.35;">
                            <a href="{{ route('blog.show', $post->slug) }}" style="color: var(--text-dark); text-decoration: none;">
                                {{ $post->title }}
                            </a>
                        </h2>
                        
                        <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin-bottom: 1.5rem; flex-grow: 1;">
                            {{ $post->excerpt }}
                        </p>
                        
                        <div style="padding-top: 1rem; border-top: 1px solid var(--border-light); display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 0.82rem; font-weight: 700; color: var(--text-dark);">
                                📅 {{ $post->created_at->format('d/m/Y') }}
                            </span>
                            <a href="{{ route('blog.show', $post->slug) }}" style="font-size: 0.88rem; font-weight: 800; color: var(--primary); text-decoration: none;">
                                Leer Artículo →
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div style="display: flex; justify-content: center;">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection
