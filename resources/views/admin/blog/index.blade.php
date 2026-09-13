@extends('admin.layout')

@section('title', 'Blog & Artículos SEO | REW CRM')

@section('content')
<!-- Page Header -->
<div class="crm-header">
    <div>
        <h1 class="crm-title">Gestor de Blog & Content Hub SEO</h1>
        <p class="crm-subtitle">
            Administra los artículos de autoridad técnica, clusters temáticos para Google Chile, schemas FAQ y posicionamiento orgánico.
        </p>
    </div>
    <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
        <a href="{{ route('blog.index') }}" target="_blank" class="crm-btn crm-btn-secondary">
            <span>🌐</span> Ver Blog Público ↗
        </a>
        <a href="{{ route('admin.blog.create') }}" class="crm-btn crm-btn-primary">
            <span>✍️</span> Redactar Nuevo Artículo
        </a>
    </div>
</div>

<!-- 1. KPI Stats Grid -->
<div class="crm-stats-grid">
    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: var(--crm-primary-light); color: var(--crm-primary);">
            📰
        </div>
        <div>
            <div class="stat-lbl">Total Artículos</div>
            <div class="stat-val">{{ $stats['total'] }}</div>
        </div>
    </div>

    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: var(--crm-emerald-light); color: #059669;">
            ✅
        </div>
        <div>
            <div class="stat-lbl">Publicados en Vivo</div>
            <div class="stat-val" style="color: #059669;">{{ $stats['published'] }}</div>
        </div>
    </div>

    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: var(--crm-gold-light); color: #d97706;">
            📝
        </div>
        <div>
            <div class="stat-lbl">Borradores Privados</div>
            <div class="stat-val" style="color: #d97706;">{{ $stats['drafts'] }}</div>
        </div>
    </div>

    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: var(--crm-purple-light); color: #7e22ce;">
            🏷️
        </div>
        <div>
            <div class="stat-lbl">Categorías / Clusters</div>
            <div class="stat-val" style="color: #7e22ce;">{{ $stats['categories'] }}</div>
        </div>
    </div>
</div>

<!-- 2. Search & Filters Panel -->
<div class="crm-card-panel" style="margin-bottom: 1.5rem; padding: 1.25rem 1.5rem;">
    <form method="GET" action="{{ route('admin.blog.index') }}" style="display: flex; flex-wrap: wrap; gap: 1rem; align-items: center; justify-content: space-between;">
        <div style="display: flex; gap: 0.75rem; flex: 1; min-width: 280px; align-items: center;">
            <div style="position: relative; flex: 1;">
                <input type="text" name="q" value="{{ $search }}" placeholder="Buscar por título, slug, extracto o contenido..." 
                       class="crm-form-control" style="padding-left: 2.25rem; font-size: 0.9rem;">
                <span style="position: absolute; left: 0.75rem; top: 50%; transform: translateY(-50%); color: var(--crm-text-light);">🔍</span>
            </div>
            @if($search || $selectedCategory !== 'todos' || $status !== 'all')
                <a href="{{ route('admin.blog.index') }}" class="crm-btn crm-btn-secondary crm-btn-sm" title="Limpiar Filtros">
                    ✕ Limpiar
                </a>
            @endif
        </div>

        <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
            <div>
                <select name="categoria" onchange="this.form.submit()" class="crm-form-control" style="font-size: 0.85rem; padding: 0.5rem 1rem;">
                    <option value="todos" {{ $selectedCategory === 'todos' ? 'selected' : '' }}>Todas las Categorías</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ $selectedCategory === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <select name="status" onchange="this.form.submit()" class="crm-form-control" style="font-size: 0.85rem; padding: 0.5rem 1rem;">
                    <option value="all" {{ $status === 'all' ? 'selected' : '' }}>Todos los Estados</option>
                    <option value="published" {{ $status === 'published' ? 'selected' : '' }}>Publicados</option>
                    <option value="draft" {{ $status === 'draft' ? 'selected' : '' }}>Borradores</option>
                </select>
            </div>

            <button type="submit" class="crm-btn crm-btn-secondary" style="font-size: 0.85rem; padding: 0.5rem 1rem;">
                Filtrar
            </button>
        </div>
    </form>
</div>

<!-- 3. Blog Articles Table Panel -->
<div class="crm-card-panel" style="padding: 0; overflow: hidden;">
    <div style="padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--crm-border); display: flex; align-items: center; justify-content: space-between;">
        <h3 style="font-size: 1.1rem; font-weight: 800; color: #0f172a; margin: 0;">
            Listado de Artículos ({{ $posts->total() }})
        </h3>
        <span style="font-size: 0.82rem; color: var(--crm-text-muted);">
            Mostrando {{ $posts->firstItem() ?? 0 }}-{{ $posts->lastItem() ?? 0 }} de {{ $posts->total() }}
        </span>
    </div>

    @if($posts->isEmpty())
        <div style="padding: 3rem 1.5rem; text-align: center; color: var(--crm-text-muted);">
            <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">📰</div>
            <h4 style="font-size: 1.1rem; color: #0f172a; margin-bottom: 0.25rem;">No se encontraron artículos</h4>
            <p style="font-size: 0.9rem; margin-bottom: 1.5rem;">No hay artículos que coincidan con los filtros seleccionados.</p>
            <a href="{{ route('admin.blog.create') }}" class="crm-btn crm-btn-primary crm-btn-sm">
                Redactar Nuevo Artículo
            </a>
        </div>
    @else
        <div style="overflow-x: auto;">
            <table class="crm-table">
                <thead>
                    <tr>
                        <th style="width: 70px; text-align: center;">Portada</th>
                        <th>Artículo & Detalles</th>
                        <th>Categoría / Cluster</th>
                        <th style="width: 90px; text-align: center;">Lectura</th>
                        <th style="width: 100px; text-align: center;">SEO FAQs</th>
                        <th style="width: 130px; text-align: center;">Estado</th>
                        <th style="width: 130px; text-align: right;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $p)
                        <tr>
                            <!-- Thumbnail -->
                            <td style="text-align: center; vertical-align: middle;">
                                <div style="width: 52px; height: 52px; border-radius: 8px; overflow: hidden; background: #0f172a; border: 1px solid var(--crm-border); display: inline-flex; align-items: center; justify-content: center;">
                                    @php
                                        $imgUrl = $p->featured_image ?: '/images/logo.webp';
                                    @endphp
                                    <img src="{{ $imgUrl }}" alt="{{ $p->title }}" 
                                         onerror="this.src='/images/logo.webp'"
                                         style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </td>

                            <!-- Title & Info -->
                            <td>
                                <div style="font-weight: 800; font-size: 0.95rem; color: #0f172a; margin-bottom: 2px;">
                                    <a href="{{ route('admin.blog.edit', $p) }}" style="color: inherit; text-decoration: none;">
                                        {{ $p->title }}
                                    </a>
                                </div>
                                <div style="font-size: 0.82rem; color: var(--crm-text-muted); display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                                    <span><strong>Autor:</strong> {{ $p->author_name }}</span>
                                    <span>•</span>
                                    <span style="font-family: 'Fira Code', monospace; font-size: 0.76rem; background: #f1f5f9; padding: 1px 5px; border-radius: 4px;">/blog/{{ $p->slug }}</span>
                                    <span>•</span>
                                    <span>{{ $p->created_at ? $p->created_at->format('d/m/Y') : '—' }}</span>
                                </div>
                            </td>

                            <!-- Category -->
                            <td>
                                <span style="font-size: 0.8rem; font-weight: 700; color: #334155; background: #f8fafc; border: 1px solid #e2e8f0; padding: 3px 8px; border-radius: 6px; display: inline-block;">
                                    {{ $p->category }}
                                </span>
                            </td>

                            <!-- Read Time -->
                            <td style="text-align: center; font-size: 0.85rem; color: var(--crm-text-muted); font-weight: 600;">
                                ⏱️ {{ $p->read_time_minutes }}m
                            </td>

                            <!-- FAQ Schema Count -->
                            <td style="text-align: center;">
                                @php
                                    $faqCount = is_array($p->faq_schema) ? count($p->faq_schema) : 0;
                                @endphp
                                @if($faqCount > 0)
                                    <span style="background: #eef2ff; color: #4338ca; font-size: 0.78rem; font-weight: 800; padding: 3px 8px; border-radius: 6px; display: inline-flex; align-items: center; gap: 4px;" title="Incluye Schema.org FAQPage">
                                        <span>❓</span> {{ $faqCount }} FAQs
                                    </span>
                                @else
                                    <span style="color: #94a3b8; font-size: 0.8rem;">—</span>
                                @endif
                            </td>

                            <!-- Status & Quick Toggle -->
                            <td style="text-align: center;">
                                <form action="{{ route('admin.blog.toggle', $p) }}" method="POST" style="margin: 0; display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    @if($p->is_published)
                                        <button type="submit" class="crm-btn-tag" style="background: var(--crm-emerald-light); color: #059669; border: 1px solid #a7f3d0; cursor: pointer;" title="Haz clic para pasar a Borrador">
                                            ✅ Publicado
                                        </button>
                                    @else
                                        <button type="submit" class="crm-btn-tag" style="background: #f1f5f9; color: #64748b; border: 1px solid #cbd5e1; cursor: pointer;" title="Haz clic para Publicar en vivo">
                                            📝 Borrador
                                        </button>
                                    @endif
                                </form>
                            </td>

                            <!-- Actions -->
                            <td style="text-align: right;">
                                <div style="display: inline-flex; align-items: center; gap: 6px;">
                                    <!-- Public Link -->
                                    <a href="{{ route('blog.show', $p->slug) }}" target="_blank" 
                                       class="crm-btn-icon" title="Ver en Blog Público">
                                        👁️
                                    </a>

                                    <!-- Edit -->
                                    <a href="{{ route('admin.blog.edit', $p) }}" 
                                       class="crm-btn-icon" title="Editar Artículo">
                                        ✏️
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('admin.blog.destroy', $p) }}" method="POST" 
                                          onsubmit="return confirm('¿Estás seguro de eliminar el artículo «{{ addslashes($p->title) }}»? Esta acción no se puede deshacer.');" 
                                          style="display: inline; margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="crm-btn-icon delete-btn" title="Eliminar Artículo">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($posts->hasPages())
            <div style="padding: 1.25rem 1.5rem; border-top: 1px solid var(--crm-border); display: flex; justify-content: center;">
                {{ $posts->links() }}
            </div>
        @endif
    @endif
</div>
@endsection
