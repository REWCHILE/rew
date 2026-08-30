@extends('admin.layout')

@section('title', 'Mantenedor Asistente Rich-E AI | REW CRM')

@section('content')
<!-- Page Header -->
<div class="crm-header">
    <div>
        <h1 class="crm-title">Mantenedor del Asistente Virtual Rich-E</h1>
        <p class="crm-subtitle">
            Entrena a Rich-E con la base de conocimiento RAG, servicios, políticas y precios de tu agencia para asesorar a prospectos 24/7.
        </p>
    </div>
    <div>
        <button type="button" class="crm-btn crm-btn-primary" id="openNewKnowledgeModalBtn">
            <span>➕</span> Añadir Conocimiento a Rich-E
        </button>
    </div>
</div>

<!-- 1. System Prompt Maestro Editor -->
<div class="crm-card-panel" style="margin-bottom: 2rem;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem; flex-wrap: wrap; gap: 0.5rem;">
        <div>
            <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0; display: flex; align-items: center; gap: 8px;">
                🧠 System Prompt Maestro de Rich-E
            </h3>
            <p style="font-size: 0.85rem; color: var(--crm-text-muted); margin: 4px 0 0 0;">
                Define la personalidad, tono consultivo, directrices de ventas y directivas que la IA asume en cada chat.
            </p>
        </div>
        <span style="font-size: 0.75rem; background: var(--crm-primary-light); color: var(--crm-primary); font-weight: 700; padding: 4px 8px; border-radius: 6px;">
            Modo RAG Activo
        </span>
    </div>

    <form action="{{ route('admin.riche.prompt') }}" method="POST">
        @csrf
        <div class="crm-form-group">
            <textarea name="riche_system_prompt" rows="5" required 
                      class="crm-form-control" 
                      style="font-family: 'Fira Code', monospace; font-size: 0.86rem; line-height: 1.6; background: #0f172a; color: #38bdf8; border-color: #334155;">{{ old('riche_system_prompt', $systemPrompt) }}</textarea>
            <span class="crm-form-help">Tip: Especifica que siempre ofrezca agendar por WhatsApp con Álvaro (+56987261127).</span>
        </div>
        
        <div style="text-align: right;">
            <button type="submit" class="crm-btn crm-btn-secondary crm-btn-sm" style="font-weight: 800;">
                <span>💾</span> Guardar System Prompt
            </button>
        </div>
    </form>
</div>

<!-- 2. Knowledge Items Table -->
<div class="crm-card-panel">
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 1.5rem;">
        <div>
            <h3 style="font-size: 1.2rem; font-weight: 800; color: #0f172a; margin: 0;">
                📚 Base de Conocimiento RAG ({{ $items->total() }})
            </h3>
            <p style="font-size: 0.85rem; color: var(--crm-text-muted); margin: 2px 0 0 0;">
                Tópicos y respuestas que el chatbot consulta para responder sin alucinaciones.
            </p>
        </div>

        <!-- Category Filter Tabs -->
        <div style="display: flex; gap: 6px; flex-wrap: wrap;">
            <a href="{{ route('admin.riche.index', ['category' => 'all']) }}" 
               class="crm-tab-link {{ $category === 'all' ? 'active' : '' }}" style="padding: 0.4rem 0.85rem; font-size: 0.8rem;">
                Todos
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('admin.riche.index', ['category' => $cat]) }}" 
                   class="crm-tab-link {{ $category === $cat ? 'active' : '' }}" style="padding: 0.4rem 0.85rem; font-size: 0.8rem;">
                    {{ $cat }}
                </a>
            @endforeach
        </div>
    </div>

    <div class="crm-table-container" style="box-shadow: none; border-radius: 12px;">
        <table class="crm-table">
            <thead>
                <tr>
                    <th style="width: 140px;">Categoría</th>
                    <th style="width: 260px;">Pregunta / Tópico</th>
                    <th>Respuesta / Información Asignada</th>
                    <th style="width: 100px; text-align: center;">Estado</th>
                    <th style="width: 110px; text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        <td>
                            <span class="badge-service badge-service-default" style="font-size: 0.72rem;">
                                {{ $item->category }}
                            </span>
                        </td>
                        <td style="font-weight: 700; color: #0f172a;">
                            {{ $item->question_or_topic }}
                        </td>
                        <td style="color: #334155; line-height: 1.5; font-size: 0.86rem;">
                            {{ $item->answer_or_content }}
                        </td>
                        <td style="text-align: center; white-space: nowrap;">
                            @if($item->is_active)
                                <span style="background: #dcfce7; color: #166534; font-weight: 700; font-size: 0.75rem; padding: 3px 8px; border-radius: 9999px;">
                                    ● Activo
                                </span>
                            @else
                                <span style="background: #f1f5f9; color: #64748b; font-weight: 700; font-size: 0.75rem; padding: 3px 8px; border-radius: 9999px;">
                                    ○ Inactivo
                                </span>
                            @endif
                        </td>
                        <td style="text-align: right; white-space: nowrap;">
                            <div style="display: inline-flex; gap: 6px;">
                                <button type="button" class="crm-btn-icon edit-knowledge-btn" 
                                        data-id="{{ $item->id }}"
                                        data-question="{{ $item->question_or_topic }}"
                                        data-answer="{{ $item->answer_or_content }}"
                                        data-category="{{ $item->category }}"
                                        data-order="{{ $item->order }}"
                                        data-active="{{ $item->is_active ? '1' : '0' }}"
                                        title="Editar Conocimiento">
                                    ✏️
                                </button>
                                <form action="{{ route('admin.riche.destroy', $item->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este conocimiento de Rich-E?')" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="crm-btn-icon crm-btn-icon-danger" title="Eliminar">
                                        ✕
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 3.5rem 2rem; color: var(--crm-text-muted);">
                            No hay conocimientos registrados en esta categoría.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 1.5rem;">
        {{ $items->links() }}
    </div>
</div>

<!-- Modal: Crear / Editar Conocimiento -->
<div class="crm-modal-overlay" id="knowledgeModal">
    <div class="crm-modal">
        <div class="crm-modal-header">
            <h3 class="crm-modal-title" id="knowledgeModalTitle">➕ Añadir Conocimiento a Rich-E</h3>
            <button type="button" class="crm-modal-close" id="closeKnowledgeModalBtn">✕</button>
        </div>

        <form id="knowledgeModalForm" action="{{ route('admin.riche.store') }}" method="POST" class="crm-modal-body">
            @csrf
            <div id="methodSpoof"></div>

            <div class="crm-form-group">
                <label class="crm-form-label">Categoría *</label>
                <input type="text" name="category" id="kModalCategory" list="catList" required placeholder="Servicios, Precios, Tiempos, Empresa..." class="crm-form-control">
                <datalist id="catList">
                    <option value="Servicios">
                    <option value="Precios">
                    <option value="Tiempos de Entrega">
                    <option value="Empresa">
                    <option value="Plugins & IA">
                    <option value="Contacto">
                </datalist>
            </div>

            <div class="crm-form-group">
                <label class="crm-form-label">Pregunta / Tópico de Entrada del Cliente *</label>
                <input type="text" name="question_or_topic" id="kModalQuestion" required placeholder="Ej: ¿Cuáles son los precios de los sitios web?" class="crm-form-control">
            </div>

            <div class="crm-form-group">
                <label class="crm-form-label">Respuesta / Contenido que Rich-E debe entregar *</label>
                <textarea name="answer_or_content" id="kModalAnswer" rows="4" required placeholder="Escribe la respuesta exacta o las instrucciones de asesoría que debe dar el bot..." class="crm-form-control" style="line-height: 1.5;"></textarea>
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; background: #f8fafc; padding: 0.85rem 1rem; border-radius: 10px; border: 1px solid var(--crm-border);">
                <label style="display: flex; align-items: center; gap: 8px; font-size: 0.88rem; font-weight: 700; color: #1e293b; cursor: pointer; margin: 0;">
                    <input type="checkbox" name="is_active" id="kModalActive" value="1" checked style="accent-color: var(--crm-primary); width: 18px; height: 18px;">
                    Conocimiento Activo para Rich-E
                </label>

                <div style="display: flex; align-items: center; gap: 8px;">
                    <label style="font-size: 0.82rem; font-weight: 700; color: #475569; margin: 0;">Orden:</label>
                    <input type="number" name="order" id="kModalOrder" value="0" class="crm-form-control" style="width: 70px; padding: 4px 8px;">
                </div>
            </div>

            <div style="text-align: right;">
                <button type="submit" class="crm-btn crm-btn-primary">
                    <span>💾</span> Guardar Conocimiento
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('knowledgeModal');
        const openBtn = document.getElementById('openNewKnowledgeModalBtn');
        const closeBtn = document.getElementById('closeKnowledgeModalBtn');
        const form = document.getElementById('knowledgeModalForm');
        const modalTitle = document.getElementById('knowledgeModalTitle');
        const methodSpoof = document.getElementById('methodSpoof');

        const catInput = document.getElementById('kModalCategory');
        const qInput = document.getElementById('kModalQuestion');
        const aInput = document.getElementById('kModalAnswer');
        const orderInput = document.getElementById('kModalOrder');
        const activeInput = document.getElementById('kModalActive');

        if (openBtn) {
            openBtn.addEventListener('click', () => {
                form.action = "{{ route('admin.riche.store') }}";
                methodSpoof.innerHTML = '';
                modalTitle.textContent = '➕ Añadir Conocimiento a Rich-E';
                catInput.value = '';
                qInput.value = '';
                aInput.value = '';
                orderInput.value = '0';
                activeInput.checked = true;
                modal.classList.add('open');
            });
        }

        document.querySelectorAll('.edit-knowledge-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                form.action = `/admin/riche/${id}`;
                methodSpoof.innerHTML = '<input type="hidden" name="_method" value="PUT">';
                modalTitle.textContent = '✏️ Editar Conocimiento de Rich-E';
                catInput.value = this.getAttribute('data-category');
                qInput.value = this.getAttribute('data-question');
                aInput.value = this.getAttribute('data-answer');
                orderInput.value = this.getAttribute('data-order');
                activeInput.checked = this.getAttribute('data-active') === '1';
                modal.classList.add('open');
            });
        });

        if (closeBtn) closeBtn.addEventListener('click', () => modal.classList.remove('open'));
        modal.addEventListener('click', (e) => { if (e.target === modal) modal.classList.remove('open'); });
    });
</script>
@endsection
