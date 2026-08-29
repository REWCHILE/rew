<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CRM Leads & Cotizaciones | Panel de Administración REW</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=Fira+Code:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        :root {
            --crm-bg: #f8fafc;
            --crm-card: #ffffff;
            --crm-border: #e2e8f0;
            --crm-text: #0f172a;
            --crm-muted: #64748b;
        }
        body { background: var(--crm-bg); color: var(--crm-text); font-family: 'Plus Jakarta Sans', sans-serif; margin: 0; padding: 0; }
        .admin-nav { background: #0f172a; padding: 14px 28px; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .admin-brand { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .admin-logo-text { font-size: 1.3rem; font-weight: 900; color: #ffc800; letter-spacing: 1px; }
        .admin-badge { background: rgba(79, 70, 229, 0.3); color: #818cf8; font-size: 0.72rem; font-weight: 800; padding: 3px 8px; border-radius: 6px; }
        
        .crm-container { max-width: 1400px; margin: 0 auto; padding: 2.5rem 1.5rem; }
        
        /* Stats Grid */
        .crm-stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.25rem; margin-bottom: 2.5rem; }
        .crm-stat-card { background: var(--crm-card); border: 1px solid var(--crm-border); border-radius: 16px; padding: 1.25rem 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.03); display: flex; align-items: center; gap: 16px; }
        .stat-icon-wrap { width: 50px; height: 50px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; }
        .stat-val { font-size: 1.8rem; font-weight: 900; line-height: 1; color: #0f172a; margin-top: 2px; }
        .stat-lbl { font-size: 0.8rem; font-weight: 700; color: var(--crm-muted); text-transform: uppercase; letter-spacing: 0.5px; }
        
        /* Tabs Bar */
        .crm-tabs-bar { display: flex; align-items: center; gap: 8px; border-bottom: 2px solid var(--crm-border); margin-bottom: 1.5rem; overflow-x: auto; padding-bottom: 2px; }
        .crm-tab-link { padding: 10px 20px; font-weight: 800; font-size: 0.92rem; text-decoration: none; color: var(--crm-muted); border-radius: 10px 10px 0 0; display: inline-flex; align-items: center; gap: 8px; transition: all 0.2s ease; border-bottom: 3px solid transparent; margin-bottom: -3px; }
        .crm-tab-link:hover { color: var(--primary); background: rgba(79, 70, 229, 0.04); }
        .crm-tab-link.active { color: var(--primary); border-bottom-color: var(--primary); background: rgba(79, 70, 229, 0.06); }
        .tab-counter { background: #e2e8f0; color: #334155; font-size: 0.72rem; padding: 2px 7px; border-radius: 9999px; font-weight: 800; }
        .crm-tab-link.active .tab-counter { background: var(--primary); color: #ffffff; }

        /* Filter Controls */
        .crm-controls { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 1.5rem; }
        .crm-search-input { padding: 9px 16px; border: 1px solid var(--crm-border); border-radius: 10px; font-size: 0.9rem; width: 320px; outline: none; background: #ffffff; }
        .crm-status-filter { padding: 9px 14px; border: 1px solid var(--crm-border); border-radius: 10px; font-size: 0.88rem; outline: none; font-weight: 700; background: #ffffff; }

        /* Table Design */
        .crm-table-card { background: #ffffff; border: 1px solid var(--crm-border); border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.04); }
        .crm-table { width: 100%; border-collapse: collapse; text-align: left; font-size: 0.88rem; }
        .crm-table th { background: #f1f5f9; padding: 14px 18px; font-weight: 800; font-size: 0.75rem; text-transform: uppercase; color: #475569; letter-spacing: 0.5px; border-bottom: 1px solid var(--crm-border); }
        .crm-table td { padding: 16px 18px; border-bottom: 1px solid var(--crm-border); vertical-align: middle; }
        .crm-table tr:hover { background: #f8fafc; }
        
        /* Status Badges & Dropdown */
        .status-select { padding: 4px 10px; border-radius: 9999px; font-weight: 800; font-size: 0.75rem; border: none; cursor: pointer; outline: none; }
        .status-pending { background: #fef3c7; color: #92400e; }
        .status-contacted { background: #e0e7ff; color: #4338ca; }
        .status-evaluating { background: #f3e8ff; color: #6b21a8; }
        .status-closed_won { background: #d1fae5; color: #065f46; }
        .status-closed_lost { background: #fee2e2; color: #991b1b; }

        /* Action Buttons */
        .crm-btn-wa { background: #25d366; color: #ffffff; border-radius: 8px; padding: 6px 12px; font-weight: 800; font-size: 0.8rem; text-decoration: none; display: inline-flex; align-items: center; gap: 4px; }
        .crm-btn-wa:hover { background: #20ba5a; color: #ffffff; }
        .crm-btn-action { background: #f1f5f9; border: 1px solid #cbd5e1; border-radius: 8px; padding: 6px 10px; font-size: 0.8rem; font-weight: 700; color: #334155; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; }
        .crm-btn-action:hover { background: #e2e8f0; }

        /* Detail Modal */
        .lead-detail-modal-overlay { position: fixed; inset: 0; background: rgba(15,23,42,0.8); backdrop-filter: blur(6px); z-index: 3000; display: none; align-items: center; justify-content: center; padding: 1.5rem; }
        .lead-detail-modal-overlay.open { display: flex; }
        .lead-detail-modal { background: #ffffff; border-radius: 20px; max-width: 680px; width: 100%; max-height: 90vh; overflow-y: auto; box-shadow: 0 25px 60px rgba(0,0,0,0.5); }
    </style>
</head>
<body>

    <!-- Admin Navigation Bar -->
    <header class="admin-nav">
        <div style="display: flex; align-items: center; gap: 20px;">
            <a href="{{ route('admin.leads.index') }}" class="admin-brand">
                <img src="{{ asset('images/logo.webp') }}" alt="REW" style="height: 32px; width: auto;">
                <span class="admin-logo-text">REW CRM</span>
            </a>
            <span class="admin-badge">LEADS & COTIZACIONES</span>
        </div>

        <div style="display: flex; align-items: center; gap: 12px;">
            <a href="{{ route('home') }}" target="_blank" class="crm-btn-action" style="background: rgba(255,255,255,0.1); color: #ffffff; border-color: rgba(255,255,255,0.2);">
                🌐 Ver Sitio Web (Público) ↗
            </a>
            <span style="color: #94a3b8; font-size: 0.85rem; font-weight: 700;">
                👨‍💻 Álvaro Valenzuela
            </span>
        </div>
    </header>

    <main class="crm-container">
        <!-- Top Heading -->
        <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 2rem;">
            <div>
                <h1 style="font-size: 1.85rem; font-weight: 900; margin: 0; color: #0f172a;">
                    Dashboard de Leads & Oportunidades
                </h1>
                <p style="color: var(--crm-muted); font-size: 0.95rem; margin: 4px 0 0 0;">
                    Seguimiento en tiempo real de clientes que solicitan auditorías, software customizado y cotizaciones.
                </p>
            </div>
            <div style="display: flex; gap: 8px;">
                <a href="{{ route('contacto') }}" target="_blank" class="btn btn-outline btn-sm">
                    <span>+ Probar Cotizador Público</span>
                </a>
            </div>
        </div>

        <!-- 1. Stats Cards Grid -->
        <div class="crm-stats-grid">
            <div class="crm-stat-card">
                <div class="stat-icon-wrap" style="background: #e0e7ff; color: #4338ca;">📊</div>
                <div>
                    <div class="stat-lbl">Total Leads</div>
                    <div class="stat-val">{{ $stats['total'] }}</div>
                </div>
            </div>

            <div class="crm-stat-card">
                <div class="stat-icon-wrap" style="background: #ecfdf5; color: #059669;">⚡</div>
                <div>
                    <div class="stat-lbl">Leads Optimización</div>
                    <div class="stat-val" style="color: #059669;">{{ $stats['optimizacion'] }}</div>
                </div>
            </div>

            <div class="crm-stat-card">
                <div class="stat-icon-wrap" style="background: #fef3c7; color: #d97706;">🚀</div>
                <div>
                    <div class="stat-lbl">Leads Desarrollo</div>
                    <div class="stat-val" style="color: #d97706;">{{ $stats['desarrollo'] }}</div>
                </div>
            </div>

            <div class="crm-stat-card">
                <div class="stat-icon-wrap" style="background: #f3e8ff; color: #7e22ce;">🛒</div>
                <div>
                    <div class="stat-lbl">Leads Tienda / Plugins</div>
                    <div class="stat-val" style="color: #7e22ce;">{{ $stats['tienda'] }}</div>
                </div>
            </div>

            <div class="crm-stat-card">
                <div class="stat-icon-wrap" style="background: #d1fae5; color: #065f46;">💰</div>
                <div>
                    <div class="stat-lbl">Ventas Cerradas</div>
                    <div class="stat-val" style="color: #065f46;">{{ $stats['closed_won'] }}</div>
                </div>
            </div>
        </div>

        <!-- 2. Tabs Bar (Segmentación Clave Solicitada por Álvaro) -->
        <div class="crm-tabs-bar">
            <a href="{{ route('admin.leads.index', ['tab' => 'todos', 'status' => $status, 'q' => $search]) }}" 
               class="crm-tab-link {{ $tab === 'todos' ? 'active' : '' }}">
                📋 Todos los Leads <span class="tab-counter">{{ $stats['total'] }}</span>
            </a>
            <a href="{{ route('admin.leads.index', ['tab' => 'optimizacion', 'status' => $status, 'q' => $search]) }}" 
               class="crm-tab-link {{ $tab === 'optimizacion' ? 'active' : '' }}">
                ⚡ Leads Optimización (Auditoría) <span class="tab-counter">{{ $stats['optimizacion'] }}</span>
            </a>
            <a href="{{ route('admin.leads.index', ['tab' => 'desarrollo', 'status' => $status, 'q' => $search]) }}" 
               class="crm-tab-link {{ $tab === 'desarrollo' ? 'active' : '' }}">
                🚀 Leads Desarrollo (Software & Web) <span class="tab-counter">{{ $stats['desarrollo'] }}</span>
            </a>
            <a href="{{ route('admin.leads.index', ['tab' => 'tienda', 'status' => $status, 'q' => $search]) }}" 
               class="crm-tab-link {{ $tab === 'tienda' ? 'active' : '' }}">
                🛒 Leads Tienda & Plugins <span class="tab-counter">{{ $stats['tienda'] }}</span>
            </a>
        </div>

        <!-- 3. Filter Controls -->
        <form method="GET" action="{{ route('admin.leads.index') }}" class="crm-controls">
            <input type="hidden" name="tab" value="{{ $tab }}">
            <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                <input type="text" name="q" value="{{ $search }}" placeholder="Buscar por nombre, email, empresa, URL..." class="crm-search-input">
                <select name="status" class="crm-status-filter" onchange="this.form.submit()">
                    <option value="all" {{ $status === 'all' ? 'selected' : '' }}>Todos los Estados</option>
                    <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>🟡 Pendientes ({{ $stats['pending'] }})</option>
                    <option value="contacted" {{ $status === 'contacted' ? 'selected' : '' }}>🔵 Contactados ({{ $stats['contacted'] }})</option>
                    <option value="evaluating" {{ $status === 'evaluating' ? 'selected' : '' }}>🟣 En Evaluación ({{ $stats['evaluating'] }})</option>
                    <option value="closed_won" {{ $status === 'closed_won' ? 'selected' : '' }}>🟢 Venta Cerrada ({{ $stats['closed_won'] }})</option>
                    <option value="closed_lost" {{ $status === 'closed_lost' ? 'selected' : '' }}>🔴 Descartados</option>
                </select>
                <button type="submit" class="crm-btn-action">Filtrar</button>
                @if($search || $status !== 'all')
                    <a href="{{ route('admin.leads.index', ['tab' => $tab]) }}" class="crm-btn-action" style="color: #ef4444;">Limpiar Filtros</a>
                @endif
            </div>
        </form>

        <!-- 4. Leads Table -->
        <div class="crm-table-card">
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
                                <td>
                                    <strong>#{{ $lead->id }}</strong><br>
                                    <span style="font-size: 0.75rem; color: var(--crm-muted);">
                                        {{ $lead->created_at->format('d/m/Y') }}<br>
                                        {{ $lead->created_at->format('H:i') }}
                                    </span>
                                </td>
                                <td>
                                    <div style="font-weight: 800; color: #0f172a;">{{ $lead->name }}</div>
                                    @if($lead->company)
                                        <div style="font-size: 0.78rem; color: #4338ca; font-weight: 700;">🏢 {{ $lead->company }}</div>
                                    @endif
                                    <div style="font-size: 0.78rem; color: var(--crm-muted); margin-top: 2px;">
                                        ✉️ {{ $lead->email }}<br>
                                        📱 {{ $lead->phone }}
                                    </div>
                                </td>
                                <td>
                                    @if(str_contains($lead->service_type, 'Auditoría') || str_contains($lead->service_type, 'Optimización'))
                                        <span class="badge" style="background: #ecfdf5; color: #065f46; font-weight: 800;">⚡ Optimización</span>
                                    @elseif(str_contains($lead->service_type, 'Customizado') || str_contains($lead->service_type, 'Software'))
                                        <span class="badge" style="background: #fef3c7; color: #92400e; font-weight: 800;">⚙️ Custom Laravel</span>
                                    @else
                                        <span class="badge badge-primary">{{ $lead->service_type }}</span>
                                    @endif
                                </td>
                                <td style="max-width: 300px;">
                                    @if(isset($lead->metadata['website_url']))
                                        <div style="font-weight: 800; color: #0f172a; margin-bottom: 4px;">
                                            🌐 <a href="{{ $lead->metadata['website_url'] }}" target="_blank" rel="noopener" style="color: #4f46e5; text-decoration: underline;">
                                                {{ $lead->metadata['website_url'] }}
                                            </a>
                                        </div>
                                        <div style="font-size: 0.78rem; color: #475569;">
                                            📱 Móvil: <strong>{{ $lead->metadata['mobile_score'] ?? '-' }}/100</strong> | 
                                            💻 Desktop: <strong>{{ $lead->metadata['desktop_score'] ?? '-' }}/100</strong>
                                        </div>
                                    @else
                                        <div style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; font-size: 0.82rem; color: #334155;">
                                            {{ $lead->project_description ?? 'Sin descripción adicional' }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if($lead->estimated_budget_clp && $lead->estimated_budget_clp > 0)
                                        <strong style="color: #059669;">${{ number_format($lead->estimated_budget_clp, 0, ',', '.') }} CLP</strong><br>
                                        <span style="font-size: 0.75rem; color: var(--crm-muted);">(${{ number_format($lead->estimated_budget_usd, 0) }} USD)</span>
                                    @else
                                        <span style="font-size: 0.78rem; color: var(--crm-muted); font-style: italic;">A evaluar</span>
                                    @endif
                                </td>
                                <td>
                                    <select class="status-select status-{{ $lead->status }}" data-id="{{ $lead->id }}">
                                        <option value="pending" {{ $lead->status === 'pending' ? 'selected' : '' }}>🟡 Pendiente</option>
                                        <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>🔵 Contactado</option>
                                        <option value="evaluating" {{ $lead->status === 'evaluating' ? 'selected' : '' }}>🟣 En Evaluación</option>
                                        <option value="closed_won" {{ $lead->status === 'closed_won' ? 'selected' : '' }}>🟢 Venta Cerrada</option>
                                        <option value="closed_lost" {{ $lead->status === 'closed_lost' ? 'selected' : '' }}>🔴 Descartado</option>
                                    </select>
                                </td>
                                <td style="text-align: right;">
                                    <div style="display: inline-flex; gap: 6px; align-items: center;">
                                        <!-- WhatsApp Direct Action -->
                                        @php
                                            $cleanPhone = preg_replace('/[^0-9]/', '', $lead->phone);
                                            $waGreeting = "¡Hola {$lead->name}! Te saluda Álvaro Valenzuela de REW.cl. Recibí tu solicitud sobre {$lead->service_type} y me gustaría coordinar contigo los detalles.";
                                        @endphp
                                        <a href="https://api.whatsapp.com/send?phone={{ $cleanPhone }}&text={{ rawurlencode($waGreeting) }}" 
                                           target="_blank" 
                                           rel="noopener" 
                                           class="crm-btn-wa" 
                                           title="Hablar por WhatsApp con el Cliente">
                                            💬 WhatsApp
                                        </a>

                                        <!-- View Full Details Modal -->
                                        <button type="button" class="crm-btn-action view-lead-modal-btn" data-id="{{ $lead->id }}" title="Ver Ficha Completa">
                                            🔍
                                        </button>

                                        <!-- Delete -->
                                        <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este Lead?')" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="crm-btn-action" style="color: #ef4444;" title="Eliminar Lead">
                                                ✕
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div style="padding: 1.25rem 1.5rem; border-top: 1px solid var(--crm-border);">
                    {{ $leads->links() }}
                </div>
            @else
                <div style="text-align: center; padding: 4rem 2rem; color: var(--crm-muted);">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">📭</div>
                    <h3 style="font-size: 1.2rem; color: #0f172a; margin: 0 0 0.5rem 0;">No hay leads en esta sección</h3>
                    <p style="font-size: 0.9rem; margin: 0;">Cuando los clientes coticen o soliciten auditorías, aparecerán aquí automáticamente.</p>
                </div>
            @endif
        </div>
    </main>

    <!-- Full Lead Detail Inspection Modal -->
    <div class="lead-detail-modal-overlay" id="leadDetailModal">
        <div class="lead-detail-modal">
            <div style="background: #0f172a; padding: 1.25rem 1.5rem; color: #ffffff; display: flex; justify-content: space-between; align-items: center; border-radius: 20px 20px 0 0;">
                <h3 style="margin: 0; font-size: 1.15rem; font-weight: 800;">📄 Ficha Completa del Lead</h3>
                <button type="button" id="closeLeadDetailModalBtn" style="background: none; border: none; color: #ffffff; font-size: 1.4rem; cursor: pointer;">✕</button>
            </div>
            <div style="padding: 1.75rem;" id="leadDetailContent">
                <div style="text-align: center; padding: 2rem;">Cargando detalles...</div>
            </div>
        </div>
    </div>

    <!-- Scripts for Live Status AJAX & Modal -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            // 1. Status Dropdown Live Change
            document.querySelectorAll('.status-select').forEach(select => {
                select.addEventListener('change', function() {
                    const leadId = this.getAttribute('data-id');
                    const newStatus = this.value;
                    this.className = `status-select status-${newStatus}`;

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
                            // Flash feedback
                            this.style.boxShadow = '0 0 10px rgba(16, 185, 129, 0.6)';
                            setTimeout(() => { this.style.boxShadow = ''; }, 1000);
                        }
                    });
                });
            });

            // 2. View Modal Detail
            const detailModal = document.getElementById('leadDetailModal');
            const detailContent = document.getElementById('leadDetailContent');
            const closeBtn = document.getElementById('closeLeadDetailModalBtn');

            document.querySelectorAll('.view-lead-modal-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const leadId = this.getAttribute('data-id');
                    detailModal.classList.add('open');
                    detailContent.innerHTML = '<div style="text-align:center; padding: 2rem;">Cargando...</div>';

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
                                        <div style="background: #f8fafc; padding: 12px; border-radius: 10px; margin-bottom: 12px; border: 1px solid #e2e8f0;">
                                            <strong>🌐 Sitio Web Auditado:</strong> <a href="${l.metadata.website_url}" target="_blank">${l.metadata.website_url}</a><br>
                                            <strong>📱 Score Móvil:</strong> ${l.metadata.mobile_score || '-'}/100<br>
                                            <strong>💻 Score Desktop:</strong> ${l.metadata.desktop_score || '-'}/100<br>
                                            <strong>⚡ LCP:</strong> ${l.metadata.lcp || '-'}s | <strong>TTFB:</strong> ${l.metadata.ttfb || '-'}ms
                                        </div>
                                    `;
                                }
                                if (l.metadata.custom_items && l.metadata.custom_items.length > 0) {
                                    metadataHtml += `
                                        <div style="margin-bottom: 12px;">
                                            <strong>⚙️ Funcionalidades a Medida (${l.metadata.custom_items.length}):</strong>
                                            <ul style="margin: 6px 0; padding-left: 20px;">
                                                ${l.metadata.custom_items.map(ci => `<li>${ci}</li>`).join('')}
                                            </ul>
                                        </div>
                                    `;
                                }
                                if (l.metadata.features && l.metadata.features.length > 0) {
                                    metadataHtml += `
                                        <div style="margin-bottom: 12px;">
                                            <strong>🧩 Módulos Seleccionados:</strong> ${l.metadata.features.join(', ')}
                                        </div>
                                    `;
                                }
                            }

                            detailContent.innerHTML = `
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 16px;">
                                    <div><strong>Cliente:</strong> ${l.name}</div>
                                    <div><strong>Empresa:</strong> ${l.company || 'No especificada'}</div>
                                    <div><strong>Email:</strong> <a href="mailto:${l.email}">${l.email}</a></div>
                                    <div><strong>Teléfono:</strong> <a href="tel:${l.phone}">${l.phone}</a></div>
                                    <div><strong>Fecha:</strong> ${data.formatted_date}</div>
                                    <div><strong>Tipo:</strong> ${l.service_type}</div>
                                </div>
                                <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 16px 0;">
                                ${metadataHtml}
                                <div style="margin-bottom: 16px;">
                                    <strong>📝 Mensaje / Descripción Completa:</strong>
                                    <div style="background: #f1f5f9; padding: 12px; border-radius: 8px; font-size: 0.88rem; white-space: pre-wrap; margin-top: 6px;">${l.project_description || 'Sin notas'}</div>
                                </div>
                                <div style="text-align: right;">
                                    <a href="https://api.whatsapp.com/send?phone=${data.clean_phone}" target="_blank" class="crm-btn-wa" style="padding: 8px 16px; font-size: 0.9rem;">
                                        💬 Abrir WhatsApp con ${l.name}
                                    </a>
                                </div>
                            `;
                        }
                    });
                });
            });

            if (closeBtn) closeBtn.addEventListener('click', () => detailModal.classList.remove('open'));
            detailModal.addEventListener('click', (e) => { if (e.target === detailModal) detailModal.classList.remove('open'); });
        });
    </script>
</body>
</html>
