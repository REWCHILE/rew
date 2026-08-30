@extends('admin.layout')

@section('title', 'Leads & Cotizaciones | REW CRM')

@section('content')
<!-- Page Header -->
<div class="crm-header">
    <div>
        <h1 class="crm-title">Dashboard de Leads & Cotizaciones</h1>
        <p class="crm-subtitle">
            Seguimiento en tiempo real de clientes interesados en auditorías SEO, desarrollo Laravel a medida y plugins.
        </p>
    </div>
    <div>
        <a href="{{ route('contacto') }}" target="_blank" class="crm-btn crm-btn-secondary">
            <span>⚡</span> Probar Cotizador Público ↗
        </a>
    </div>
</div>

<!-- 1. KPI Stats Grid -->
<div class="crm-stats-grid">
    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: var(--crm-primary-light); color: var(--crm-primary);">
            📊
        </div>
        <div>
            <div class="stat-lbl">Total Leads</div>
            <div class="stat-val">{{ $stats['total'] }}</div>
        </div>
    </div>

    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: var(--crm-emerald-light); color: var(--crm-emerald);">
            ⚡
        </div>
        <div>
            <div class="stat-lbl">Optimización</div>
            <div class="stat-val" style="color: #059669;">{{ $stats['optimizacion'] }}</div>
        </div>
    </div>

    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: var(--crm-gold-light); color: #d97706;">
            🚀
        </div>
        <div>
            <div class="stat-lbl">Desarrollo Web</div>
            <div class="stat-val" style="color: #d97706;">{{ $stats['desarrollo'] }}</div>
        </div>
    </div>

    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: var(--crm-purple-light); color: #7e22ce;">
            🛒
        </div>
        <div>
            <div class="stat-lbl">Tienda & Plugins</div>
            <div class="stat-val" style="color: #7e22ce;">{{ $stats['tienda'] }}</div>
        </div>
    </div>

    <div class="crm-stat-card">
        <div class="stat-icon-wrap" style="background: #dcfce7; color: #166534;">
            💰
        </div>
        <div>
            <div class="stat-lbl">Ventas Cerradas</div>
            <div class="stat-val" style="color: #166534;">{{ $stats['closed_won'] }}</div>
        </div>
    </div>
</div>

<!-- 2. Segmentation Tabs -->
<div class="crm-tabs-bar">
    <a href="{{ route('admin.leads.index', ['tab' => 'todos', 'status' => $status, 'q' => $search]) }}" 
       class="crm-tab-link {{ $tab === 'todos' ? 'active' : '' }}">
        <span>📋</span> Todos los Leads <span class="tab-counter">{{ $stats['total'] }}</span>
    </a>
    <a href="{{ route('admin.leads.index', ['tab' => 'optimizacion', 'status' => $status, 'q' => $search]) }}" 
       class="crm-tab-link {{ $tab === 'optimizacion' ? 'active' : '' }}">
        <span>⚡</span> Optimización (Auditoría) <span class="tab-counter">{{ $stats['optimizacion'] }}</span>
    </a>
    <a href="{{ route('admin.leads.index', ['tab' => 'desarrollo', 'status' => $status, 'q' => $search]) }}" 
       class="crm-tab-link {{ $tab === 'desarrollo' ? 'active' : '' }}">
        <span>🚀</span> Desarrollo (Software & Web) <span class="tab-counter">{{ $stats['desarrollo'] }}</span>
    </a>
    <a href="{{ route('admin.leads.index', ['tab' => 'tienda', 'status' => $status, 'q' => $search]) }}" 
       class="crm-tab-link {{ $tab === 'tienda' ? 'active' : '' }}">
        <span>🛒</span> Tienda & Plugins <span class="tab-counter">{{ $stats['tienda'] }}</span>
    </a>
</div>

<!-- 3. Search & Filter Bar -->
<div class="crm-controls-card">
    <form method="GET" action="{{ route('admin.leads.index') }}" class="crm-controls-inner">
        <input type="hidden" name="tab" value="{{ $tab }}">
        
        <div class="crm-search-wrapper">
            <span class="crm-search-icon">🔍</span>
            <input type="text" name="q" value="{{ $search }}" placeholder="Buscar por cliente, correo, empresa o web..." class="crm-search-input">
        </div>

        <div style="display: flex; align-items: center; gap: 0.75rem; flex-wrap: wrap;">
            <select name="status" class="crm-select-filter" onchange="this.form.submit()">
                <option value="all" {{ $status === 'all' ? 'selected' : '' }}>Todos los Estados</option>
                <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>🟡 Pendientes ({{ $stats['pending'] }})</option>
                <option value="contacted" {{ $status === 'contacted' ? 'selected' : '' }}>🔵 Contactados ({{ $stats['contacted'] }})</option>
                <option value="evaluating" {{ $status === 'evaluating' ? 'selected' : '' }}>🟣 En Evaluación ({{ $stats['evaluating'] }})</option>
                <option value="closed_won" {{ $status === 'closed_won' ? 'selected' : '' }}>🟢 Venta Cerrada ({{ $stats['closed_won'] }})</option>
                <option value="closed_lost" {{ $status === 'closed_lost' ? 'selected' : '' }}>🔴 Descartados</option>
            </select>

            <button type="submit" class="crm-btn crm-btn-secondary">
                Filtrar
            </button>

            @if($search || $status !== 'all')
                <a href="{{ route('admin.leads.index', ['tab' => $tab]) }}" class="crm-btn crm-btn-secondary" style="color: var(--crm-danger);">
                    Limpiar
                </a>
            @endif
        </div>
    </form>
</div>

<!-- 4. Leads Data Table -->
<div class="crm-table-container">
    @if($leads->count() > 0)
        <table class="crm-table">
            <thead>
                <tr>
                    <th>ID & Fecha</th>
                    <th>Cliente</th>
                    <th>Tipo de Lead</th>
                    <th>Detalle / Requerimiento</th>
                    <th>Presupuesto</th>
                    <th>Estado Pipeline</th>
                    <th style="text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leads as $lead)
                    <tr>
                        <!-- ID & Fecha -->
                        <td style="white-space: nowrap;">
                            <strong style="color: #0f172a; font-size: 0.95rem;">#{{ $lead->id }}</strong>
                            <div style="font-size: 0.75rem; color: var(--crm-text-muted); margin-top: 2px;">
                                {{ $lead->created_at->format('d/m/Y') }}<br>
                                {{ $lead->created_at->format('H:i') }} hrs
                            </div>
                        </td>

                        <!-- Cliente -->
                        <td>
                            <div class="crm-client-cell">
                                <div class="crm-client-avatar">
                                    {{ strtoupper(substr($lead->name, 0, 2)) }}
                                </div>
                                <div>
                                    <div class="crm-client-name">{{ $lead->name }}</div>
                                    @if($lead->company)
                                        <div class="crm-client-company">🏢 {{ $lead->company }}</div>
                                    @endif
                                    <div class="crm-client-contact">
                                        <a href="mailto:{{ $lead->email }}">✉️ {{ $lead->email }}</a>
                                        <a href="tel:{{ $lead->phone }}">📱 {{ $lead->phone }}</a>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Tipo de Lead -->
                        <td>
                            @if(str_contains($lead->service_type, 'Auditoría') || str_contains($lead->service_type, 'Optimización'))
                                <span class="badge-service badge-service-seo">⚡ Optimización SEO</span>
                            @elseif(str_contains($lead->service_type, 'Customizado') || str_contains($lead->service_type, 'Software'))
                                <span class="badge-service badge-service-custom">⚙️ Custom Laravel</span>
                            @elseif(str_contains($lead->service_type, 'Plugin') || str_contains($lead->service_type, 'Tienda'))
                                <span class="badge-service badge-service-tienda">🛒 Tienda & Plugins</span>
                            @else
                                <span class="badge-service badge-service-default">💼 {{ $lead->service_type }}</span>
                            @endif
                        </td>

                        <!-- Detalle / Requerimiento -->
                        <td style="max-width: 320px;">
                            @if(isset($lead->metadata['website_url']))
                                <div style="font-weight: 700; margin-bottom: 4px;">
                                    🌐 <a href="{{ $lead->metadata['website_url'] }}" target="_blank" rel="noopener" style="color: var(--crm-primary); text-decoration: underline;">
                                        {{ $lead->metadata['website_url'] }}
                                    </a>
                                </div>
                                <div style="display: flex; gap: 6px; font-size: 0.75rem; flex-wrap: wrap;">
                                    <span style="background: #f1f5f9; padding: 2px 6px; border-radius: 4px; color: #334155; font-weight: 600;">
                                        📱 Móvil: <strong>{{ $lead->metadata['mobile_score'] ?? '-' }}/100</strong>
                                    </span>
                                    <span style="background: #f1f5f9; padding: 2px 6px; border-radius: 4px; color: #334155; font-weight: 600;">
                                        💻 Desktop: <strong>{{ $lead->metadata['desktop_score'] ?? '-' }}/100</strong>
                                    </span>
                                </div>
                            @else
                                <div style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; font-size: 0.82rem; color: #334155; line-height: 1.4;">
                                    {{ $lead->project_description ?? 'Sin descripción adicional' }}
                                </div>
                            @endif
                        </td>

                        <!-- Presupuesto -->
                        <td style="white-space: nowrap;">
                            @if($lead->estimated_budget_clp && $lead->estimated_budget_clp > 0)
                                <strong style="color: #059669; font-size: 0.95rem;">${{ number_format($lead->estimated_budget_clp, 0, ',', '.') }} CLP</strong>
                                <div style="font-size: 0.75rem; color: var(--crm-text-muted);">
                                    (${{ number_format($lead->estimated_budget_usd, 0) }} USD)
                                </div>
                            @else
                                <span style="font-size: 0.8rem; color: var(--crm-text-muted); font-style: italic;">A evaluar</span>
                            @endif
                        </td>

                        <!-- Estado Pipeline (Interactive AJAX Dropdown) -->
                        <td>
                            <select class="crm-status-badge-select status-{{ $lead->status }}" data-id="{{ $lead->id }}">
                                <option value="pending" {{ $lead->status === 'pending' ? 'selected' : '' }}>🟡 Pendiente</option>
                                <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>🔵 Contactado</option>
                                <option value="evaluating" {{ $lead->status === 'evaluating' ? 'selected' : '' }}>🟣 En Evaluación</option>
                                <option value="closed_won" {{ $lead->status === 'closed_won' ? 'selected' : '' }}>🟢 Venta Cerrada</option>
                                <option value="closed_lost" {{ $lead->status === 'closed_lost' ? 'selected' : '' }}>🔴 Descartado</option>
                            </select>
                        </td>

                        <!-- Acciones Rápidas -->
                        <td style="text-align: right; white-space: nowrap;">
                            <div style="display: inline-flex; gap: 6px; align-items: center;">
                                @php
                                    $cleanPhone = preg_replace('/[^0-9]/', '', $lead->phone);
                                    $waGreeting = "¡Hola {$lead->name}! Te saluda Álvaro Valenzuela de REW.cl. Recibí tu solicitud sobre {$lead->service_type} y me gustaría coordinar contigo los detalles.";
                                @endphp
                                
                                <a href="https://api.whatsapp.com/send?phone={{ $cleanPhone }}&text={{ rawurlencode($waGreeting) }}" 
                                   target="_blank" 
                                   rel="noopener" 
                                   class="crm-btn-wa" 
                                   title="Abrir WhatsApp directo con el cliente">
                                    <span>💬</span> WhatsApp
                                </a>

                                <button type="button" class="crm-btn-icon view-lead-modal-btn" data-id="{{ $lead->id }}" title="Ver Ficha y Métricas Completas">
                                    🔍
                                </button>

                                <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este Lead del sistema?')" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="crm-btn-icon crm-btn-icon-danger" title="Eliminar Lead">
                                        ✕
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div style="padding: 1.25rem 1.5rem; border-top: 1px solid var(--crm-border); background: #ffffff;">
            {{ $leads->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 4.5rem 2rem; color: var(--crm-text-muted);">
            <div style="font-size: 3rem; margin-bottom: 0.75rem;">📭</div>
            <h3 style="font-size: 1.2rem; color: #0f172a; margin: 0 0 0.5rem 0; font-weight: 800;">No hay leads en esta sección</h3>
            <p style="font-size: 0.9rem; margin: 0; max-width: 420px; margin: 0 auto;">
                Cuando los clientes coticen en el sitio o soliciten auditorías de velocidad, aparecerán aquí automáticamente.
            </p>
        </div>
    @endif
</div>

<!-- 5. Lead Detail Inspection Modal -->
<div class="crm-modal-overlay" id="leadDetailModal">
    <div class="crm-modal">
        <div class="crm-modal-header">
            <h3 class="crm-modal-title">🔍 Ficha de Oportunidad de Negocio</h3>
            <button type="button" class="crm-modal-close" id="closeLeadDetailModalBtn">✕</button>
        </div>
        <div class="crm-modal-body" id="leadDetailContent">
            <div style="text-align: center; padding: 2.5rem; color: var(--crm-text-muted);">
                Cargando información del lead...
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        // 1. Status Dropdown AJAX Change
        document.querySelectorAll('.crm-status-badge-select').forEach(select => {
            select.addEventListener('change', function() {
                const leadId = this.getAttribute('data-id');
                const newStatus = this.value;
                
                // Update CSS class for badge color
                this.className = `crm-status-badge-select status-${newStatus}`;

                fetch(`/admin/leads/${leadId}/status`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ status: newStatus })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        this.style.boxShadow = '0 0 0 3px rgba(16, 185, 129, 0.4)';
                        setTimeout(() => { this.style.boxShadow = ''; }, 1200);
                    }
                })
                .catch(err => {
                    console.error('Error actualizando estado:', err);
                });
            });
        });

        // 2. View Lead Full Details Modal
        const detailModal = document.getElementById('leadDetailModal');
        const detailContent = document.getElementById('leadDetailContent');
        const closeBtn = document.getElementById('closeLeadDetailModalBtn');

        document.querySelectorAll('.view-lead-modal-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const leadId = this.getAttribute('data-id');
                detailModal.classList.add('open');
                detailContent.innerHTML = '<div style="text-align:center; padding: 2.5rem; color: var(--crm-text-muted);">Cargando ficha del cliente...</div>';

                fetch(`/admin/leads/${leadId}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        const l = data.lead;
                        let metadataHtml = '';

                        if (l.metadata) {
                            if (l.metadata.website_url) {
                                metadataHtml += `
                                    <div style="background: #f8fafc; padding: 1rem; border-radius: 12px; margin-bottom: 1.25rem; border: 1px solid var(--crm-border);">
                                        <div style="font-size: 0.82rem; font-weight: 800; text-transform: uppercase; color: var(--crm-primary); margin-bottom: 6px;">🌐 Reporte de Auditoría PageSpeed</div>
                                        <div style="font-weight: 700; margin-bottom: 6px;">
                                            <a href="${l.metadata.website_url}" target="_blank" style="color: var(--crm-primary); text-decoration: underline;">${l.metadata.website_url} ↗</a>
                                        </div>
                                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; font-size: 0.85rem; color: #334155; margin-top: 8px;">
                                            <div>📱 Score Móvil: <strong>${l.metadata.mobile_score || '-'}/100</strong></div>
                                            <div>💻 Score Desktop: <strong>${l.metadata.desktop_score || '-'}/100</strong></div>
                                            <div>⚡ LCP: <strong>${l.metadata.lcp || '-'}s</strong></div>
                                            <div>⏱️ TTFB: <strong>${l.metadata.ttfb || '-'}ms</strong></div>
                                        </div>
                                    </div>
                                `;
                            }
                            if (l.metadata.custom_items && l.metadata.custom_items.length > 0) {
                                metadataHtml += `
                                    <div style="margin-bottom: 1.25rem;">
                                        <div style="font-size: 0.82rem; font-weight: 800; text-transform: uppercase; color: #0f172a; margin-bottom: 6px;">⚙️ Módulos Personalizados Requeridos (${l.metadata.custom_items.length}):</div>
                                        <ul style="margin: 0; padding-left: 1.25rem; font-size: 0.88rem; color: #334155; line-height: 1.6;">
                                            ${l.metadata.custom_items.map(ci => `<li>${ci}</li>`).join('')}
                                        </ul>
                                    </div>
                                `;
                            }
                            if (l.metadata.features && l.metadata.features.length > 0) {
                                metadataHtml += `
                                    <div style="margin-bottom: 1.25rem;">
                                        <div style="font-size: 0.82rem; font-weight: 800; text-transform: uppercase; color: #0f172a; margin-bottom: 6px;">🧩 Características Seleccionadas:</div>
                                        <div style="font-size: 0.88rem; color: #334155;">${l.metadata.features.join(', ')}</div>
                                    </div>
                                `;
                            }
                        }

                        let budgetHtml = 'A evaluar';
                        if (l.estimated_budget_clp && l.estimated_budget_clp > 0) {
                            budgetHtml = `$${new Intl.NumberFormat('es-CL').format(l.estimated_budget_clp)} CLP ($${l.estimated_budget_usd} USD)`;
                        }

                        detailContent.innerHTML = `
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.25rem; font-size: 0.9rem;">
                                <div><span style="color: var(--crm-text-muted);">Cliente:</span><br><strong>${l.name}</strong></div>
                                <div><span style="color: var(--crm-text-muted);">Empresa:</span><br><strong>${l.company || 'No especificada'}</strong></div>
                                <div><span style="color: var(--crm-text-muted);">Email:</span><br><a href="mailto:${l.email}" style="color: var(--crm-primary); font-weight: 600;">${l.email}</a></div>
                                <div><span style="color: var(--crm-text-muted);">Teléfono:</span><br><a href="tel:${l.phone}" style="color: var(--crm-primary); font-weight: 600;">${l.phone}</a></div>
                                <div><span style="color: var(--crm-text-muted);">Fecha Solicitud:</span><br><strong>${data.formatted_date}</strong></div>
                                <div><span style="color: var(--crm-text-muted);">Presupuesto Estimado:</span><br><strong style="color: #059669;">${budgetHtml}</strong></div>
                            </div>
                            
                            <hr style="border: 0; border-top: 1px solid var(--crm-border); margin: 1.25rem 0;">
                            
                            ${metadataHtml}
                            
                            <div style="margin-bottom: 1.5rem;">
                                <div style="font-size: 0.82rem; font-weight: 800; text-transform: uppercase; color: #0f172a; margin-bottom: 6px;">📝 Mensaje / Descripción del Proyecto:</div>
                                <div style="background: #f8fafc; padding: 1rem; border-radius: 10px; font-size: 0.88rem; color: #334155; line-height: 1.6; white-space: pre-wrap; border: 1px solid var(--crm-border);">${l.project_description || 'Sin notas adicionales'}</div>
                            </div>

                            <div style="display: flex; justify-content: flex-end; gap: 0.75rem; align-items: center;">
                                <a href="https://api.whatsapp.com/send?phone=${data.clean_phone}&text=${encodeURIComponent('¡Hola ' + l.name + '! Te saluda Álvaro Valenzuela de REW.cl. Recibí tu solicitud y me gustaría coordinar los detalles contigo.')}" 
                                   target="_blank" 
                                   class="crm-btn-wa" 
                                   style="padding: 0.65rem 1.25rem; font-size: 0.88rem;">
                                    <span>💬</span> Iniciar Conversación por WhatsApp
                                </a>
                            </div>
                        `;
                    }
                })
                .catch(err => {
                    detailContent.innerHTML = '<div style="color: var(--crm-danger); text-align: center; padding: 2rem;">Error al cargar los detalles del lead.</div>';
                });
            });
        });

        if (closeBtn) closeBtn.addEventListener('click', () => detailModal.classList.remove('open'));
        detailModal.addEventListener('click', (e) => { if (e.target === detailModal) detailModal.classList.remove('open'); });
    });
</script>
@endsection
