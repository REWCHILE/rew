@extends('admin.layout')

@section('title', 'Portafolio & Casos de Éxito | REW CRM')

@section('content')
<!-- Page Header -->
<div class="crm-header">
    <div>
        <h1 class="crm-title">Gestor de Portafolio & Casos de Éxito</h1>
        <p class="crm-subtitle">
            Administra los proyectos de la agencia, actualiza narrativas técnicas, capturas WebP y casos destacados.
        </p>
    </div>
    <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
        <a href="{{ route('portafolio.index') }}" target="_blank" class="crm-btn crm-btn-secondary">
            <span>🌐</span> Ver Portafolio Público ↗
        </a>
        <a href="{{ route('admin.portfolio.create') }}" class="crm-btn crm-btn-primary">
            <span>➕</span> Nuevo Proyecto
        </a>
    </div>
</div>

<!-- 1. KPI Stats Grid -->
<div class="crm-stats-grid">
    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: var(--crm-primary-light); color: var(--crm-primary);">
            💼
        </div>
        <div>
            <div class="stat-lbl">Total Proyectos</div>
            <div class="stat-val">{{ $stats['total'] }}</div>
        </div>
    </div>

    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: var(--crm-gold-light); color: #d97706;">
            ⭐
        </div>
        <div>
            <div class="stat-lbl">Destacados en Home</div>
            <div class="stat-val" style="color: #d97706;">{{ $stats['featured'] }}</div>
        </div>
    </div>

    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: var(--crm-purple-light); color: #7e22ce;">
            🏷️
        </div>
        <div>
            <div class="stat-lbl">Categorías Activas</div>
            <div class="stat-val" style="color: #7e22ce;">{{ $stats['categories'] }}</div>
        </div>
    </div>

    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: var(--crm-emerald-light); color: var(--crm-emerald);">
            ✅
        </div>
        <div>
            <div class="stat-lbl">Casos Finalizados</div>
            <div class="stat-val" style="color: #059669;">{{ $stats['completed'] }}</div>
        </div>
    </div>
</div>

<!-- 2. Search & Filters Panel -->
<div class="crm-card-panel" style="margin-bottom: 1.5rem; padding: 1.25rem 1.5rem;">
    <form method="GET" action="{{ route('admin.portfolio.index') }}" style="display: flex; flex-wrap: wrap; gap: 1rem; align-items: center; justify-content: space-between;">
        <div style="display: flex; gap: 0.75rem; flex: 1; min-width: 280px; align-items: center;">
            <div style="position: relative; flex: 1;">
                <input type="text" name="q" value="{{ $search }}" placeholder="Buscar por título, cliente, tecnología o slug..." 
                       class="crm-form-control" style="padding-left: 2.25rem; font-size: 0.9rem;">
                <span style="position: absolute; left: 0.75rem; top: 50%; transform: translateY(-50%); color: var(--crm-text-light);">🔍</span>
            </div>
            @if($search || $selectedCategory !== 'todos' || $status !== 'all')
                <a href="{{ route('admin.portfolio.index') }}" class="crm-btn crm-btn-secondary crm-btn-sm" title="Limpiar Filtros">
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
                    <option value="Finalizado" {{ $status === 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                    <option value="En Desarrollo" {{ $status === 'En Desarrollo' ? 'selected' : '' }}>En Desarrollo</option>
                </select>
            </div>

            <button type="submit" class="crm-btn crm-btn-secondary" style="font-size: 0.85rem; padding: 0.5rem 1rem;">
                Filtrar
            </button>
        </div>
    </form>
</div>

<!-- 3. Projects Table Panel -->
<div class="crm-card-panel" style="padding: 0; overflow: hidden;">
    <div style="padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--crm-border); display: flex; align-items: center; justify-content: space-between;">
        <h3 style="font-size: 1.1rem; font-weight: 800; color: #0f172a; margin: 0;">
            Listado de Proyectos ({{ $projects->total() }})
        </h3>
        <span style="font-size: 0.82rem; color: var(--crm-text-muted);">
            Mostrando {{ $projects->firstItem() ?? 0 }}-{{ $projects->lastItem() ?? 0 }} de {{ $projects->total() }}
        </span>
    </div>

    @if($projects->isEmpty())
        <div style="padding: 3rem 1.5rem; text-align: center; color: var(--crm-text-muted);">
            <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">📂</div>
            <h4 style="font-size: 1.1rem; color: #0f172a; margin-bottom: 0.25rem;">No se encontraron proyectos</h4>
            <p style="font-size: 0.9rem; margin-bottom: 1.5rem;">No hay proyectos que coincidan con los filtros seleccionados.</p>
            <a href="{{ route('admin.portfolio.create') }}" class="crm-btn crm-btn-primary crm-btn-sm">
                Crear Nuevo Proyecto
            </a>
        </div>
    @else
        <div style="overflow-x: auto;">
            <table class="crm-table">
                <thead>
                    <tr>
                        <th style="width: 70px; text-align: center;">Captura</th>
                        <th>Proyecto & Cliente</th>
                        <th>Categoría</th>
                        <th>Tecnologías</th>
                        <th style="width: 100px; text-align: center;">Estado</th>
                        <th style="width: 80px; text-align: center;">Orden</th>
                        <th style="width: 130px; text-align: right;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $p)
                        <tr>
                            <!-- Thumbnail -->
                            <td style="text-align: center; vertical-align: middle;">
                                <div style="width: 52px; height: 52px; border-radius: 8px; overflow: hidden; background: #0f172a; border: 1px solid var(--crm-border); display: inline-flex; align-items: center; justify-content: center;">
                                    @php
                                        $imgUrl = $p->featured_image ?: '/images/logo.webp';
                                    @endphp
                                    <img src="{{ $imgUrl }}" alt="{{ $p->title }}" 
                                         onerror="this.src='/images/logo.webp'"
                                         style="width: 100%; height: 100%; object-fit: cover; object-position: top;">
                                </div>
                            </td>

                            <!-- Title & Client -->
                            <td>
                                <div style="font-weight: 800; font-size: 0.95rem; color: #0f172a; margin-bottom: 2px;">
                                    <a href="{{ route('admin.portfolio.edit', $p) }}" style="color: inherit; text-decoration: none;">
                                        {{ $p->title }}
                                    </a>
                                    @if($p->is_featured)
                                        <span title="Destacado en Home" style="color: #f59e0b; margin-left: 4px; font-size: 0.9rem;">⭐</span>
                                    @endif
                                </div>
                                <div style="font-size: 0.82rem; color: var(--crm-text-muted); display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                                    <span><strong>Cliente:</strong> {{ $p->client }}</span>
                                    <span>•</span>
                                    <span style="font-family: 'Fira Code', monospace; font-size: 0.76rem; background: #f1f5f9; padding: 1px 5px; border-radius: 4px;">/{{ $p->slug }}</span>
                                    @if($p->project_url)
                                        <span>•</span>
                                        <a href="{{ $p->project_url }}" target="_blank" style="color: var(--crm-primary); text-decoration: none; font-weight: 600; font-size: 0.78rem;" title="Visitar Sitio Web en Vivo">
                                            Sitio Web ↗
                                        </a>
                                    @endif
                                </div>
                            </td>

                            <!-- Category -->
                            <td>
                                <span style="font-size: 0.8rem; font-weight: 700; color: #334155; background: #f8fafc; border: 1px solid #e2e8f0; padding: 3px 8px; border-radius: 6px; display: inline-block;">
                                    {{ $p->category }}
                                </span>
                            </td>

                            <!-- Technologies -->
                            <td>
                                <div style="font-size: 0.78rem; color: var(--crm-text-muted); max-width: 260px; line-height: 1.3; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $p->technologies }}">
                                    {{ $p->technologies }}
                                </div>
                            </td>

                            <!-- Status -->
                            <td style="text-align: center;">
                                @if($p->status === 'Finalizado')
                                    <span style="background: var(--crm-emerald-light); color: #059669; font-size: 0.75rem; font-weight: 800; padding: 3px 8px; border-radius: 6px;">
                                        Finalizado
                                    </span>
                                @else
                                    <span style="background: var(--crm-primary-light); color: var(--crm-primary); font-size: 0.75rem; font-weight: 800; padding: 3px 8px; border-radius: 6px;">
                                        {{ $p->status }}
                                    </span>
                                @endif
                            </td>

                            <!-- Order -->
                            <td style="text-align: center; font-weight: 700; color: #64748b; font-size: 0.88rem;">
                                #{{ $p->order }}
                            </td>

                            <!-- Actions -->
                            <td style="text-align: right;">
                                <div style="display: inline-flex; align-items: center; gap: 6px;">
                                    <!-- Public Link -->
                                    <a href="{{ route('portafolio.show', $p->slug) }}" target="_blank" 
                                       class="crm-btn-icon" title="Ver en Portafolio Público">
                                        👁️
                                    </a>

                                    <!-- Edit -->
                                    <a href="{{ route('admin.portfolio.edit', $p) }}" 
                                       class="crm-btn-icon" title="Editar Proyecto">
                                        ✏️
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('admin.portfolio.destroy', $p) }}" method="POST" 
                                          onsubmit="return confirm('¿Estás seguro de eliminar «{{ addslashes($p->title) }}»? Esta acción no se puede deshacer.');" 
                                          style="display: inline; margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="crm-btn-icon delete-btn" title="Eliminar Proyecto">
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

        @if($projects->hasPages())
            <div style="padding: 1.25rem 1.5rem; border-top: 1px solid var(--crm-border); display: flex; justify-content: center;">
                {{ $projects->links() }}
            </div>
        @endif
    @endif
</div>
@endsection
