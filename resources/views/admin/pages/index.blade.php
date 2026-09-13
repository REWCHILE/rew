@extends('admin.layout')

@section('title', 'Páginas & SEO Performance | REW CRM')

@section('content')
<!-- Page Header -->
<div class="crm-header">
    <div>
        <h1 class="crm-title">Monitor de Páginas, SEO On-Page & PageSpeed</h1>
        <p class="crm-subtitle">
            Audita en tiempo real el estado de meta etiquetas, títulos para SERP, encabezados H1, schemas JSON-LD y métricas de rendimiento Core Web Vitals.
        </p>
    </div>
    <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
        <button type="button" class="crm-btn crm-btn-primary" onclick="auditAllPages()" id="btnAuditAll">
            <span>⚡</span> Auditar Todas las Páginas en Lote
        </button>
    </div>
</div>

<!-- 1. KPI Stats Grid -->
<div class="crm-stats-grid">
    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: var(--crm-primary-light); color: var(--crm-primary);">
            📑
        </div>
        <div>
            <div class="stat-lbl">Páginas Monitorizadas</div>
            <div class="stat-val">{{ $stats['total'] }}</div>
        </div>
    </div>

    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: var(--crm-emerald-light); color: #059669;">
            ✅
        </div>
        <div>
            <div class="stat-lbl">Páginas Auditadas</div>
            <div class="stat-val" style="color: #059669;" id="statAuditedVal">{{ $stats['audited'] }}</div>
        </div>
    </div>

    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: var(--crm-gold-light); color: #d97706;">
            ⏳
        </div>
        <div>
            <div class="stat-lbl">Auditorías Pendientes</div>
            <div class="stat-val" style="color: #d97706;" id="statPendingVal">{{ $stats['pending'] }}</div>
        </div>
    </div>

    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: #fee2e2; color: #dc2626;">
            🎯
        </div>
        <div>
            <div class="stat-lbl">Prioridad Alta / Crítica</div>
            <div class="stat-val" style="color: #dc2626;">{{ $stats['high_priority'] }}</div>
        </div>
    </div>
</div>

<!-- 2. Search & Filters Panel -->
<div class="crm-card-panel" style="margin-bottom: 1.5rem; padding: 1.25rem 1.5rem;">
    <form method="GET" action="{{ route('admin.pages.index') }}" style="display: flex; flex-wrap: wrap; gap: 1rem; align-items: center; justify-content: space-between;">
        <div style="display: flex; gap: 0.75rem; flex: 1; min-width: 280px; align-items: center;">
            <div style="position: relative; flex: 1;">
                <input type="text" name="q" value="{{ $search }}" placeholder="Buscar página por nombre, ruta o categoría..." 
                       class="crm-form-control" style="padding-left: 2.25rem; font-size: 0.9rem;">
                <span style="position: absolute; left: 0.75rem; top: 50%; transform: translateY(-50%); color: var(--crm-text-light);">🔍</span>
            </div>
            @if($search || $categoryFilter !== 'todos')
                <a href="{{ route('admin.pages.index') }}" class="crm-btn crm-btn-secondary crm-btn-sm" title="Limpiar Filtros">
                    ✕ Limpiar
                </a>
            @endif
        </div>

        <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
            <div>
                <select name="categoria" onchange="this.form.submit()" class="crm-form-control" style="font-size: 0.85rem; padding: 0.5rem 1rem;">
                    <option value="todos" {{ $categoryFilter === 'todos' ? 'selected' : '' }}>Todas las Categorías</option>
                    @foreach($allCategories as $cat)
                        <option value="{{ $cat }}" {{ $categoryFilter === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="crm-btn crm-btn-secondary" style="font-size: 0.85rem; padding: 0.5rem 1rem;">
                Filtrar
            </button>
        </div>
    </form>
</div>

<!-- Global Progress Bar for Batch Audits -->
<div id="batchProgressBarWrap" style="display: none; margin-bottom: 1.5rem; background: #ffffff; border: 1px solid var(--crm-border); border-radius: 12px; padding: 1.25rem;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
        <strong id="batchProgressLabel" style="font-size: 0.9rem; color: var(--crm-primary);">Iniciando auditoría masiva...</strong>
        <span id="batchProgressPercent" style="font-size: 0.85rem; font-weight: 800; color: #0f172a;">0%</span>
    </div>
    <div style="width: 100%; height: 8px; background: #e2e8f0; border-radius: 4px; overflow: hidden;">
        <div id="batchProgressBar" style="width: 0%; height: 100%; background: linear-gradient(90deg, #4f46e5, #06b6d4); transition: width 0.3s ease;"></div>
    </div>
</div>

<!-- 3. Pages Table Panel -->
<div class="crm-card-panel" style="padding: 0; overflow: hidden;">
    <div style="padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--crm-border); display: flex; align-items: center; justify-content: space-between;">
        <h3 style="font-size: 1.1rem; font-weight: 800; color: #0f172a; margin: 0;">
            Páginas del Sitio Web ({{ count($enrichedPages) }})
        </h3>
        <span style="font-size: 0.82rem; color: var(--crm-text-muted);">
            Monitoreo activo para Google Chile
        </span>
    </div>

    <div style="overflow-x: auto;">
        <table class="crm-table">
            <thead>
                <tr>
                    <th style="min-width: 220px;">Página & Ruta</th>
                    <th style="width: 130px;">Categoría</th>
                    <th style="min-width: 250px;">Diagnóstico On-Page SEO</th>
                    <th style="width: 130px; text-align: center;">PageSpeed</th>
                    <th style="width: 100px; text-align: center;">TTFB / LCP</th>
                    <th style="width: 140px; text-align: center;">Última Auditoría</th>
                    <th style="width: 120px; text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enrichedPages as $p)
                    @php
                        $audit = $p['audit'];
                    @endphp
                    <tr id="page_row_{{ $p['id'] }}" data-page-id="{{ $p['id'] }}">
                        <!-- Page & Path -->
                        <td>
                            <div style="font-weight: 800; font-size: 0.95rem; color: #0f172a; margin-bottom: 2px;">
                                <a href="{{ $p['path'] }}" target="_blank" style="color: inherit; text-decoration: none;">
                                    {{ $p['name'] }}
                                </a>
                            </div>
                            <div style="font-size: 0.8rem; color: var(--crm-text-muted); display: flex; align-items: center; gap: 6px; flex-wrap: wrap;">
                                <span style="font-family: 'Fira Code', monospace; font-size: 0.76rem; background: #f1f5f9; padding: 1px 6px; border-radius: 4px;">
                                    {{ $p['path'] }}
                                </span>
                                @if(str_contains($p['priority'], 'Crítica'))
                                    <span style="background: #fef3c7; color: #b45309; font-size: 0.72rem; font-weight: 800; padding: 2px 6px; border-radius: 4px;">
                                        ⭐ {{ $p['priority'] }}
                                    </span>
                                @elseif(str_contains($p['priority'], 'Alta'))
                                    <span style="background: var(--crm-primary-light); color: var(--crm-primary); font-size: 0.72rem; font-weight: 800; padding: 2px 6px; border-radius: 4px;">
                                        🔥 Alta
                                    </span>
                                @endif
                            </div>
                        </td>

                        <!-- Category -->
                        <td>
                            <span style="font-size: 0.78rem; font-weight: 700; color: #334155; background: #f8fafc; border: 1px solid #e2e8f0; padding: 3px 8px; border-radius: 6px; display: inline-block;">
                                {{ $p['category'] }}
                            </span>
                        </td>

                        <!-- SEO Diagnostic -->
                        <td id="seo_cell_{{ $p['id'] }}">
                            @if($audit)
                                <div style="display: flex; flex-direction: column; gap: 4px;">
                                    <div style="font-size: 0.82rem; display: flex; align-items: center; gap: 6px;">
                                        <strong style="color: #0f172a;">Title:</strong>
                                        <span style="color: #475569; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 220px;" title="{{ $audit['title'] }}">
                                            {{ $audit['title'] ?: '⚠️ Sin Title' }}
                                        </span>
                                        <span style="font-size: 0.72rem; font-weight: 700; color: {{ $audit['title_length'] >= 30 && $audit['title_length'] <= 65 ? '#059669' : '#dc2626' }};">
                                            ({{ $audit['title_length'] }} car.)
                                        </span>
                                    </div>
                                    <div style="font-size: 0.82rem; display: flex; align-items: center; gap: 6px;">
                                        <strong style="color: #0f172a;">Desc:</strong>
                                        <span style="color: #475569; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 220px;" title="{{ $audit['description'] }}">
                                            {{ $audit['description'] ?: '⚠️ Sin Meta Description' }}
                                        </span>
                                        <span style="font-size: 0.72rem; font-weight: 700; color: {{ $audit['description_length'] >= 70 && $audit['description_length'] <= 165 ? '#059669' : '#dc2626' }};">
                                            ({{ $audit['description_length'] }} car.)
                                        </span>
                                    </div>
                                    <div style="font-size: 0.78rem; color: var(--crm-text-muted); display: flex; gap: 6px; align-items: center;">
                                        <span>H1: {{ $audit['h1'] ? '✅' : '❌' }}</span>
                                        <span>•</span>
                                        <span>Schema: {{ $audit['has_schema'] ? '✅ (' . implode(', ', array_slice($audit['schemas'] ?? [], 0, 2)) . ')' : '❌' }}</span>
                                    </div>
                                </div>
                            @else
                                <span style="font-size: 0.82rem; color: #94a3b8; font-style: italic;">Pendiente de auditoría...</span>
                            @endif
                        </td>

                        <!-- PageSpeed Score -->
                        <td style="text-align: center;" id="speed_cell_{{ $p['id'] }}">
                            @if($audit && isset($audit['mobile_score']))
                                <div style="display: inline-flex; flex-direction: column; align-items: center; gap: 2px;">
                                    <div style="font-size: 1.15rem; font-weight: 900; color: {{ $audit['mobile_score'] >= 85 ? '#059669' : ($audit['mobile_score'] >= 60 ? '#d97706' : '#dc2626') }};">
                                        {{ $audit['mobile_score'] }}<span style="font-size: 0.75rem; color: #94a3b8;">/100</span>
                                    </div>
                                    <span style="font-size: 0.7rem; color: #64748b; font-weight: 700;">
                                        Desktop: {{ $audit['desktop_score'] }}
                                    </span>
                                </div>
                            @else
                                <span style="font-size: 0.85rem; color: #cbd5e1;">—</span>
                            @endif
                        </td>

                        <!-- Core Web Vitals (TTFB / LCP) -->
                        <td style="text-align: center;" id="cwv_cell_{{ $p['id'] }}">
                            @if($audit)
                                <div style="font-size: 0.82rem; font-weight: 700; color: #0f172a;">
                                    {{ $audit['lcp'] }}s
                                </div>
                                <div style="font-size: 0.75rem; color: var(--crm-text-muted);">
                                    {{ $audit['ttfb_ms'] }}ms TTFB
                                </div>
                            @else
                                <span style="font-size: 0.85rem; color: #cbd5e1;">—</span>
                            @endif
                        </td>

                        <!-- Last Audit Date -->
                        <td style="text-align: center; font-size: 0.8rem; color: var(--crm-text-muted);" id="date_cell_{{ $p['id'] }}">
                            {{ $audit['formatted_date'] ?? 'No auditada' }}
                        </td>

                        <!-- Actions -->
                        <td style="text-align: right;">
                            <div style="display: inline-flex; align-items: center; gap: 6px;">
                                <!-- Single Audit Button -->
                                <button type="button" onclick="auditSinglePage('{{ $p['id'] }}')" 
                                        class="crm-btn-icon" id="btn_audit_{{ $p['id'] }}" title="Auditar esta página en vivo">
                                    ⚡
                                </button>

                                <!-- Public View Link -->
                                <a href="{{ $p['path'] }}" target="_blank" 
                                   class="crm-btn-icon" title="Ver Página en Vivo">
                                    👁️
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
async function auditSinglePage(pageId) {
    const btn = document.getElementById(`btn_audit_${pageId}`);
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = '⏳';
    }

    try {
        const res = await fetch("{{ route('admin.pages.analyze') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ page_id: pageId })
        });

        const data = await res.json();
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = '⚡';
        }

        if (data.success && data.audit) {
            updateRowUi(pageId, data.audit);
            updateGlobalKpis();
        } else {
            alert('Error en la auditoría: ' + (data.error || 'Ocurrió un problema.'));
        }
    } catch (e) {
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = '⚡';
        }
        alert('Error al conectar con el servidor: ' + e.message);
    }
}

function updateRowUi(pageId, audit) {
    // 1. Update SEO Diagnostic cell
    const seoCell = document.getElementById(`seo_cell_${pageId}`);
    if (seoCell) {
        const titleColor = (audit.title_length >= 30 && audit.title_length <= 65) ? '#059669' : '#dc2626';
        const descColor = (audit.description_length >= 70 && audit.description_length <= 165) ? '#059669' : '#dc2626';
        const schemaNames = (audit.schemas || []).slice(0, 2).join(', ');

        seoCell.innerHTML = `
            <div style="display: flex; flex-direction: column; gap: 4px;">
                <div style="font-size: 0.82rem; display: flex; align-items: center; gap: 6px;">
                    <strong style="color: #0f172a;">Title:</strong>
                    <span style="color: #475569; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 220px;" title="${escapeHtml(audit.title)}">
                        ${escapeHtml(audit.title) || '⚠️ Sin Title'}
                    </span>
                    <span style="font-size: 0.72rem; font-weight: 700; color: ${titleColor};">
                        (${audit.title_length} car.)
                    </span>
                </div>
                <div style="font-size: 0.82rem; display: flex; align-items: center; gap: 6px;">
                    <strong style="color: #0f172a;">Desc:</strong>
                    <span style="color: #475569; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 220px;" title="${escapeHtml(audit.description)}">
                        ${escapeHtml(audit.description) || '⚠️ Sin Meta Description'}
                    </span>
                    <span style="font-size: 0.72rem; font-weight: 700; color: ${descColor};">
                        (${audit.description_length} car.)
                    </span>
                </div>
                <div style="font-size: 0.78rem; color: var(--crm-text-muted); display: flex; gap: 6px; align-items: center;">
                    <span>H1: ${audit.h1 ? '✅' : '❌'}</span>
                    <span>•</span>
                    <span>Schema: ${audit.has_schema ? '✅ (' + schemaNames + ')' : '❌'}</span>
                </div>
            </div>
        `;
    }

    // 2. Update PageSpeed cell
    const speedCell = document.getElementById(`speed_cell_${pageId}`);
    if (speedCell) {
        const scoreColor = audit.mobile_score >= 85 ? '#059669' : (audit.mobile_score >= 60 ? '#d97706' : '#dc2626');
        speedCell.innerHTML = `
            <div style="display: inline-flex; flex-direction: column; align-items: center; gap: 2px;">
                <div style="font-size: 1.15rem; font-weight: 900; color: ${scoreColor};">
                    ${audit.mobile_score}<span style="font-size: 0.75rem; color: #94a3b8;">/100</span>
                </div>
                <span style="font-size: 0.7rem; color: #64748b; font-weight: 700;">
                    Desktop: ${audit.desktop_score}
                </span>
            </div>
        `;
    }

    // 3. Update CWV cell
    const cwvCell = document.getElementById(`cwv_cell_${pageId}`);
    if (cwvCell) {
        cwvCell.innerHTML = `
            <div style="font-size: 0.82rem; font-weight: 700; color: #0f172a;">
                ${audit.lcp}s
            </div>
            <div style="font-size: 0.75rem; color: var(--crm-text-muted);">
                ${audit.ttfb_ms}ms TTFB
            </div>
        `;
    }

    // 4. Update Date cell
    const dateCell = document.getElementById(`date_cell_${pageId}`);
    if (dateCell) {
        dateCell.textContent = audit.formatted_date || 'Reciente';
    }
}

function updateGlobalKpis() {
    let audited = 0;
    const rows = document.querySelectorAll('tr[data-page-id]');
    rows.forEach(r => {
        const speed = r.querySelector('[id^="speed_cell_"]');
        if (speed && speed.textContent.includes('/100')) {
            audited++;
        }
    });

    const auditedEl = document.getElementById('statAuditedVal');
    const pendingEl = document.getElementById('statPendingVal');
    if (auditedEl) auditedEl.textContent = audited;
    if (pendingEl) pendingEl.textContent = Math.max(0, rows.length - audited);
}

// Batch Auditing
async function auditAllPages() {
    const rows = Array.from(document.querySelectorAll('tr[data-page-id]'));
    if (!rows.length) return;

    const btn = document.getElementById('btnAuditAll');
    const barWrap = document.getElementById('batchProgressBarWrap');
    const bar = document.getElementById('batchProgressBar');
    const label = document.getElementById('batchProgressLabel');
    const percent = document.getElementById('batchProgressPercent');

    btn.disabled = true;
    barWrap.style.display = 'block';

    for (let i = 0; i < rows.length; i++) {
        const pageId = rows[i].getAttribute('data-page-id');
        const progress = Math.round(((i) / rows.length) * 100);
        bar.style.width = `${progress}%`;
        percent.textContent = `${progress}%`;
        label.textContent = `Auditando página ${i + 1} de ${rows.length}: ${pageId}...`;

        await auditSinglePage(pageId);
    }

    bar.style.width = '100%';
    percent.textContent = '100%';
    label.textContent = '✅ ¡Todas las páginas han sido auditadas con éxito!';
    btn.disabled = false;

    setTimeout(() => {
        barWrap.style.display = 'none';
    }, 4000);
}

function escapeHtml(str) {
    if (!str) return '';
    return str.toString()
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
}
</script>
@endsection
