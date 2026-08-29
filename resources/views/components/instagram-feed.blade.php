<!-- Instagram Dynamic Feed Component (Async Non-Blocking) -->
<section class="section instagram-feed-section" style="background: #ffffff; border-top: 1px solid var(--border-light); padding: 4.5rem 0 3.5rem;">
    <div class="container">
        <!-- Instagram Header -->
        <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1.5rem; margin-bottom: 2.5rem;">
            <div style="display: flex; align-items: center; gap: 16px;">
                <a href="https://www.instagram.com/rew_chile/" target="_blank" rel="noopener noreferrer" class="instagram-avatar-ring">
                    <img src="{{ asset('images/logo.webp') }}" alt="REW Chile Instagram" class="instagram-avatar-img">
                </a>
                <div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <h3 style="font-size: 1.4rem; margin: 0; font-weight: 800; color: var(--text-dark);">
                            <a href="https://www.instagram.com/rew_chile/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: none;">@rew_chile</a>
                        </h3>
                        <span style="background: #e0e7ff; color: #4338ca; font-size: 0.72rem; font-weight: 800; padding: 2px 8px; border-radius: 9999px;">Oficial</span>
                    </div>
                    <p style="font-size: 0.88rem; color: var(--text-muted); margin: 2px 0 0 0;">
                        Desarrollo de Software en Laravel • Plugins WordPress con IA • SEO & Marketing en Chile
                    </p>
                </div>
            </div>

            <div>
                <a href="https://www.instagram.com/rew_chile/" target="_blank" rel="noopener noreferrer" class="btn btn-instagram">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                    <span>Seguir en Instagram ↗</span>
                </a>
            </div>
        </div>

        <!-- Dynamic Posts Grid Container -->
        <div class="instagram-posts-grid" id="instagramPostsGrid" data-endpoint="{{ route('instagram.feed') }}">
            <!-- Skeletons placeholders for 0 layout shift -->
            <div class="ig-skeleton-card"></div>
            <div class="ig-skeleton-card"></div>
            <div class="ig-skeleton-card"></div>
            <div class="ig-skeleton-card"></div>
            <div class="ig-skeleton-card"></div>
            <div class="ig-skeleton-card"></div>
        </div>
    </div>
</section>
