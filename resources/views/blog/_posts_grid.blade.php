@foreach($posts as $post)
    <article class="card spotlight-card post-card-item" style="padding: 0; overflow: hidden; display: flex; flex-direction: column; border-radius: var(--radius-lg); transition: transform 0.3s ease, box-shadow 0.3s ease;">
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
