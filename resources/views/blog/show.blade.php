@extends('layouts.app')

@section('title', Str::contains($post->meta_title ?? $post->title, 'REW') ? ($post->meta_title ?? $post->title) : ($post->meta_title ?? $post->title) . ' | REW Blog')
@section('meta_description', $post->meta_description ?? $post->excerpt)

@section('og_type', 'article')
@section('og_title', $post->meta_title ?? $post->title)
@section('og_description', $post->meta_description ?? $post->excerpt)
@section('og_image', !empty($post->featured_image) ? (Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset(ltrim($post->featured_image, '/'))) : asset('images/rew_og_card.png'))
@section('article_published_time', $post->created_at->toIso8601String())
@section('article_modified_time', $post->updated_at->toIso8601String())

@section('schema_json')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BlogPosting",
    "headline": "{{ $post->title }}",
    "image": "{{ !empty($post->featured_image) ? (Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset(ltrim($post->featured_image, '/'))) : asset('images/rew_og_card.png') }}",
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

@if(!empty($post->faq_schema) && is_array($post->faq_schema))
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "FAQPage",
    "mainEntity": [
        @foreach($post->faq_schema as $index => $faq)
        {
            "@@type": "Question",
            "name": "{{ addslashes($faq['question']) }}",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "{{ addslashes($faq['answer']) }}"
            }
        }{{ $loop->last ? '' : ',' }}
        @endforeach
    ]
}
</script>
@endif
@endsection

@push('styles')
<style>
    .prose-content h2 {
        font-size: clamp(1.5rem, 2.8vw, 2rem);
        font-weight: 800;
        color: var(--text-dark);
        margin: 3rem 0 1.25rem;
        line-height: 1.3;
        letter-spacing: -0.01em;
        border-bottom: 2px solid #f1f5f9;
        padding-bottom: 0.6rem;
    }
    .prose-content h3 {
        font-size: clamp(1.2rem, 2.2vw, 1.45rem);
        font-weight: 700;
        color: var(--text-dark);
        margin: 2.25rem 0 1rem;
        line-height: 1.35;
    }
    .prose-content p {
        margin-bottom: 1.4rem;
        color: #334155;
        font-size: 1.06rem;
        line-height: 1.85;
    }
    .prose-content ul, .prose-content ol {
        margin-bottom: 1.6rem;
        padding-left: 1.5rem;
    }
    .prose-content li {
        margin-bottom: 0.55rem;
        color: #334155;
        line-height: 1.75;
    }
    .prose-content strong {
        color: #0f172a;
        font-weight: 700;
    }
    .table-responsive-box {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin: 2.25rem 0;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }
    .custom-prose-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.94rem;
        text-align: left;
        background: #ffffff;
    }
    .custom-prose-table th {
        background: #0f172a;
        color: #ffffff;
        padding: 14px 18px;
        font-weight: 700;
        border-bottom: 2px solid #334155;
    }
    .custom-prose-table td {
        padding: 12px 18px;
        border-bottom: 1px solid #e2e8f0;
        color: #334155;
        vertical-align: middle;
    }
    .custom-prose-table tr:last-child td {
        border-bottom: none;
    }
    .custom-prose-table tr:nth-child(even) td {
        background: #f8fafc;
    }
    .custom-prose-table tr:hover td {
        background: #f1f5f9;
    }
    .quote-callout {
        border-left: 4px solid var(--primary);
        background: #f8fafc;
        padding: 1.35rem 1.6rem;
        margin: 2rem 0;
        border-radius: 0 12px 12px 0;
        font-style: italic;
        color: #1e293b;
        font-size: 1.05rem;
        border: 1px solid #e2e8f0;
        border-left: 4px solid var(--primary);
    }
    .checklist-card {
        background: #f8fafc;
        border: 1px solid #cbd5e1;
        border-radius: 12px;
        padding: 1.5rem 1.75rem;
        margin: 2rem 0;
    }
    .checklist-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 0.75rem;
        margin-top: 1rem;
    }
    .checklist-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.95rem;
        color: #1e293b;
        font-weight: 600;
    }
</style>
@endpush

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%); padding: 4.5rem 0;">
    <div class="container container-narrow">
        <!-- Breadcrumb -->
        <div style="margin-bottom: 2rem; font-size: 0.88rem; color: var(--text-muted); display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
            <a href="{{ route('home') }}" style="color: inherit; text-decoration: none;">Inicio</a>
            <span>/</span>
            <a href="{{ route('blog.index') }}" style="color: inherit; text-decoration: none;">Blog</a>
            <span>/</span>
            <a href="{{ route('blog.index', ['category' => $post->category]) }}" style="color: var(--primary); text-decoration: none; font-weight: 700;">{{ $post->category }}</a>
        </div>

        <!-- Article Header -->
        <div style="margin-bottom: 2.5rem;">
            <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 1.25rem; flex-wrap: wrap;">
                <span class="badge badge-primary">{{ $post->category }}</span>
                <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 600;">📅 Publicado el {{ $post->created_at->translatedFormat('d F, Y') }}</span>
                <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 600;">⏱️ {{ $post->read_time_minutes }} min de lectura</span>
            </div>
            
            <h1 style="font-size: 2.75rem; margin-bottom: 1.5rem; line-height: 1.2; letter-spacing: -0.02em; color: var(--text-dark);">
                {{ $post->title }}
            </h1>
            
            <p style="font-size: 1.15rem; color: var(--text-body); line-height: 1.7; font-style: italic; border-left: 3px solid var(--primary); padding-left: 1.25rem; margin: 0;">
                {{ $post->excerpt }}
            </p>
        </div>

        <!-- Featured Image -->
        @if($post->featured_image)
            <div class="card" style="padding: 0; overflow: hidden; margin-bottom: 3rem; border-radius: var(--radius-xl); box-shadow: var(--shadow-lg); background: #090d16;">
                <img src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset(ltrim($post->featured_image, '/')) }}" 
                     alt="{{ $post->title }}" 
                     style="width: 100%; max-height: 480px; object-fit: cover;">
            </div>
        @endif

        <!-- Main Article Content Body -->
        <div class="card" style="padding: 3rem; font-size: 1.08rem; line-height: 1.85; color: var(--text-body); margin-bottom: 3rem; border-radius: var(--radius-xl);">
            <div class="prose-content">
                {!! $post->content !!}
            </div>

            <!-- Commercial Inbound CTA Banner -->
            <x-blog-cta-banner :post="$post" />

            <!-- Interactive FAQ Section if present -->
            @if(!empty($post->faq_schema) && is_array($post->faq_schema))
                <div style="margin-top: 3.5rem; padding-top: 2.5rem; border-top: 2px solid var(--border-light);">
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 1.5rem;">
                        <span style="font-size: 1.5rem;">❓</span>
                        <h3 style="margin: 0; font-size: 1.6rem; color: var(--text-dark);">Preguntas Frecuentes (FAQ)</h3>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        @foreach($post->faq_schema as $faq)
                            <details style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1.25rem 1.5rem; cursor: pointer;">
                                <summary style="font-weight: 800; font-size: 1.05rem; color: var(--text-dark); list-style: none; display: flex; justify-content: space-between; align-items: center;">
                                    <span>{{ $faq['question'] }}</span>
                                    <span style="color: var(--primary); font-size: 1.2rem;">▾</span>
                                </summary>
                                <p style="margin: 1rem 0 0 0; font-size: 0.98rem; line-height: 1.7; color: #475569;">
                                    {{ $faq['answer'] }}
                                </p>
                            </details>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <!-- Author Profile Box -->
        <div class="card" style="padding: 2.25rem; display: flex; gap: 1.5rem; align-items: center; margin-bottom: 4rem; background: var(--bg-alt); border-radius: var(--radius-lg); flex-wrap: wrap;">
            <div style="width: 64px; height: 64px; border-radius: 50%; background: linear-gradient(135deg, #4f46e5, #7c3aed); color: #ffffff; display: flex; align-items: center; justify-content: center; font-size: 1.75rem; flex-shrink: 0;">
                👨‍💻
            </div>
            <div style="flex: 1; min-width: 260px;">
                <h3 style="font-size: 1.2rem; font-weight: 800; margin: 0 0 0.25rem 0; color: var(--text-dark);">
                    Escrito por {{ $post->author_name }}
                </h3>
                <p style="font-size: 0.9rem; color: var(--text-muted); line-height: 1.5; margin: 0 0 0.85rem 0;">
                    Ingeniero Informático, desarrollador de software y estratega de inbound marketing en Chile. Fundador y líder técnico de REW.
                </p>
                <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ rawurlencode('¡Hola Álvaro! Leí tu artículo sobre ' . $post->title . ' en REW.cl y me gustaría consultar sobre tus servicios.') }}" 
                   target="_blank" 
                   rel="noopener" 
                   class="btn btn-sm" 
                   style="background: #25d366; color: #ffffff; font-weight: 700; display: inline-flex; align-items: center; gap: 6px; text-decoration: none; border-radius: 8px;">
                    <span>💬</span> Hablar con el Ingeniero por WhatsApp (+56 9 8726 1127) →
                </a>
            </div>
        </div>

        <!-- Topic Cluster Related Articles -->
        @if($relatedPosts->isNotEmpty())
            <div style="margin-top: 4rem; border-top: 1px solid var(--border-light); padding-top: 3.5rem;">
                <div style="display: flex; align-items: flex-end; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
                    <div>
                        <span class="badge badge-gold" style="font-size: 0.72rem; margin-bottom: 0.5rem;">Estructura Paraguas & Topic Cluster</span>
                        <h3 style="font-size: 1.75rem; font-weight: 800; color: var(--text-dark); margin: 0;">
                            Artículos Relacionados en {{ $post->category }}
                        </h3>
                    </div>
                    <a href="{{ route('blog.index', ['category' => $post->category]) }}" style="font-size: 0.9rem; font-weight: 800; color: var(--primary); text-decoration: none;">
                        Ver todos en {{ $post->category }} →
                    </a>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem;">
                    @foreach($relatedPosts as $rec)
                        <div class="card spotlight-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column; border-radius: var(--radius-md);">
                            @if($rec->featured_image)
                                <a href="{{ route('blog.show', $rec->slug) }}" style="height: 140px; overflow: hidden; background: #090d16; display: block;">
                                    <img src="{{ Str::startsWith($rec->featured_image, 'http') ? $rec->featured_image : asset(ltrim($rec->featured_image, '/')) }}" 
                                         alt="{{ $rec->title }}" 
                                         style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;"
                                         onmouseover="this.style.transform='scale(1.06)'"
                                         onmouseout="this.style.transform='scale(1)'"
                                         loading="lazy">
                                </a>
                            @endif
                            <div style="padding: 1.25rem; flex-grow: 1; display: flex; flex-direction: column;">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem; font-size: 0.75rem;">
                                    <span class="badge badge-primary" style="font-size: 0.68rem; padding: 2px 6px;">{{ $rec->category }}</span>
                                    <span style="color: var(--text-muted);">⏱️ {{ $rec->read_time_minutes }} min</span>
                                </div>
                                <h4 style="font-size: 1rem; font-weight: 800; margin-bottom: 0.75rem; line-height: 1.4; flex-grow: 1;">
                                    <a href="{{ route('blog.show', $rec->slug) }}" style="color: var(--text-dark); text-decoration: none;">
                                        {{ $rec->title }}
                                    </a>
                                </h4>
                                <a href="{{ route('blog.show', $rec->slug) }}" style="font-size: 0.82rem; font-weight: 800; color: var(--primary); text-decoration: none;">
                                    Leer Guía →
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
