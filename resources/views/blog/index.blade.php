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

        <!-- Posts Grid Container -->
        <div id="blogPostsGrid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 2.25rem; margin-bottom: 2.5rem;">
            @include('blog._posts_grid', ['posts' => $posts])
        </div>

        <!-- Infinite Scroll Loading Sentinel & UI State -->
        <div id="blogInfiniteSentinel" 
             data-next-url="{{ $posts->nextPageUrl() }}" 
             data-has-more="{{ $posts->hasMorePages() ? '1' : '0' }}"
             style="text-align: center; padding: 2rem 0; min-height: 80px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
            
            <div id="blogLoadingSpinner" style="display: none; align-items: center; gap: 12px; background: #ffffff; padding: 12px 24px; border-radius: 9999px; border: 1px solid var(--border-light); box-shadow: var(--shadow-md);">
                <div class="spinner-ring" style="width: 22px; height: 22px; border: 3px solid rgba(79, 70, 229, 0.2); border-top-color: var(--primary); border-radius: 50%; animation: spin 0.75s linear infinite;"></div>
                <span style="font-weight: 700; font-size: 0.95rem; color: var(--text-dark);">Cargando más artículos...</span>
            </div>

            <div id="blogEndMessage" style="{{ $posts->hasMorePages() ? 'display: none;' : 'display: block;' }} color: var(--text-muted); font-size: 0.92rem; font-weight: 600; background: #f8fafc; padding: 10px 20px; border-radius: 9999px; border: 1px solid var(--border-light);">
                ✨ Has explorado todos los artículos disponibles ({{ $totalCount }})
            </div>
        </div>
    </div>
</section>

<style>
@keyframes spin {
    to { transform: rotate(360deg); }
}
.post-card-item.fade-in-entry {
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
    const grid = document.getElementById('blogPostsGrid');
    const sentinel = document.getElementById('blogInfiniteSentinel');
    const spinner = document.getElementById('blogLoadingSpinner');
    const endMsg = document.getElementById('blogEndMessage');

    if (!sentinel || !grid) return;

    let isLoading = false;
    let nextUrl = sentinel.getAttribute('data-next-url');
    let hasMore = sentinel.getAttribute('data-has-more') === '1';

    if (!hasMore) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !isLoading && hasMore && nextUrl) {
                loadMorePosts();
            }
        });
    }, {
        rootMargin: '300px 0px',
        threshold: 0.01
    });

    observer.observe(sentinel);

    async function loadMorePosts() {
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
                
                const newCards = tempDiv.querySelectorAll('.post-card-item');
                newCards.forEach((card, i) => {
                    card.classList.add('fade-in-entry');
                    card.style.animationDelay = `${i * 0.06}s`;
                    grid.appendChild(card);
                });
            }

            hasMore = data.hasMore;
            nextUrl = data.nextPageUrl;
            sentinel.setAttribute('data-has-more', hasMore ? '1' : '0');
            sentinel.setAttribute('data-next-url', nextUrl || '');

            if (!hasMore) {
                observer.unobserve(sentinel);
                endMsg.style.display = 'block';
            }
        } catch (error) {
            console.error('Error cargando más artículos:', error);
        } finally {
            isLoading = false;
            spinner.style.display = 'none';
        }
    }
});
</script>
@endpush
@endsection
