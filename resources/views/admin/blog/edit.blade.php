@extends('admin.layout')

@section('title', 'Editar Artículo: ' . $post->title . ' | REW CRM')

@section('content')
<!-- Header -->
<div class="crm-header">
    <div>
        <a href="{{ route('admin.blog.index') }}" class="crm-btn crm-btn-secondary crm-btn-sm" style="margin-bottom: 0.75rem; display: inline-flex;">
            ← Volver al Listado de Blog
        </a>
        <h1 class="crm-title">Editar Artículo de Blog</h1>
        <p class="crm-subtitle">
            Actualiza el contenido técnico, enlaces internos del cluster, FAQ schemas y meta tags para posicionar en Google Chile.
        </p>
    </div>
    <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
        <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="crm-btn crm-btn-secondary">
            <span>🌐</span> Ver en Blog Público ↗
        </a>
        <button type="button" class="crm-btn crm-btn-primary" onclick="openAiPilotModal()" style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); border: none; box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);">
            <span>✨</span> REW SEO AI Pilot
        </button>
    </div>
</div>

<!-- Main Form -->
<form action="{{ route('admin.blog.update', $post) }}" method="POST" enctype="multipart/form-data" id="blogForm">
    @csrf
    @method('PUT')

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem; align-items: start;">
        <!-- Left Column: Main Content & Schema -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            
            <!-- 1. Principal Information -->
            <div class="crm-card-panel">
                <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0 0 1.25rem 0; padding-bottom: 0.75rem; border-bottom: 1px solid var(--crm-border);">
                    1. Contenido Principal del Artículo
                </h3>

                <div class="crm-form-group">
                    <label class="crm-form-label">Título del Artículo (H1) *</label>
                    <input type="text" name="title" id="postTitle" value="{{ old('title', $post->title) }}" required 
                           class="crm-form-control @error('title') is-invalid @enderror">
                    @error('title') <span class="crm-form-error">{{ $message }}</span> @enderror
                </div>

                <div style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 1rem;">
                    <div class="crm-form-group">
                        <label class="crm-form-label">Slug (URL amigable)</label>
                        <input type="text" name="slug" id="postSlug" value="{{ old('slug', $post->slug) }}" 
                               class="crm-form-control @error('slug') is-invalid @enderror">
                        <span class="crm-form-help">URL pública: /blog/<code>{{ $post->slug }}</code></span>
                        @error('slug') <span class="crm-form-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="crm-form-group">
                        <label class="crm-form-label">Categoría / Cluster Temático *</label>
                        <input type="text" name="category" id="postCategory" list="categoriesList" 
                               value="{{ old('category', $post->category) }}" required 
                               class="crm-form-control @error('category') is-invalid @enderror">
                        <datalist id="categoriesList">
                            @foreach($allCategories as $cat)
                                <option value="{{ $cat }}"></option>
                            @endforeach
                        </datalist>
                        @error('category') <span class="crm-form-error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 1rem;">
                    <div class="crm-form-group">
                        <label class="crm-form-label">Autor *</label>
                        <input type="text" name="author_name" id="postAuthor" 
                               value="{{ old('author_name', $post->author_name) }}" required 
                               class="crm-form-control @error('author_name') is-invalid @enderror">
                        @error('author_name') <span class="crm-form-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="crm-form-group">
                        <label class="crm-form-label">Tiempo Estimado de Lectura (minutos)</label>
                        <input type="number" name="read_time_minutes" id="postReadTime" min="1" max="120"
                               value="{{ old('read_time_minutes', $post->read_time_minutes) }}" 
                               class="crm-form-control @error('read_time_minutes') is-invalid @enderror">
                        <span class="crm-form-help">Si lo dejas vacío, se calcula automáticamente (~200 palabras/min).</span>
                        @error('read_time_minutes') <span class="crm-form-error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="crm-form-group">
                    <label class="crm-form-label">Extracto / Resumen Ejecutivo *</label>
                    <textarea name="excerpt" id="postExcerpt" rows="3" required 
                              class="crm-form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt', $post->excerpt) }}</textarea>
                    @error('excerpt') <span class="crm-form-error">{{ $message }}</span> @enderror
                </div>

                <!-- Formatting Toolbar for Content -->
                <div class="crm-form-group">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                        <label class="crm-form-label" style="margin-bottom: 0;">Cuerpo Completo del Artículo (HTML / Rich Text) *</label>
                        <div style="display: flex; gap: 4px; flex-wrap: wrap;">
                            <button type="button" class="crm-btn crm-btn-secondary crm-btn-sm" onclick="insertTag('<h2>', '</h2>')" title="Encabezado H2">H2</button>
                            <button type="button" class="crm-btn crm-btn-secondary crm-btn-sm" onclick="insertTag('<h3>', '</h3>')" title="Sub-encabezado H3">H3</button>
                            <button type="button" class="crm-btn crm-btn-secondary crm-btn-sm" onclick="insertTag('<strong>', '</strong>')" title="Negrita"><b>B</b></button>
                            <button type="button" class="crm-btn crm-btn-secondary crm-btn-sm" onclick="insertTag('<em>', '</em>')" title="Cursiva"><i>I</i></button>
                            <button type="button" class="crm-btn crm-btn-secondary crm-btn-sm" onclick="insertLink()" title="Enlace">🔗</button>
                            <button type="button" class="crm-btn crm-btn-secondary crm-btn-sm" onclick="insertTable()" title="Insertar Tabla">📊</button>
                            <button type="button" class="crm-btn crm-btn-secondary crm-btn-sm" onclick="insertCtaBox()" title="Caja CTA Comercial">🎯 CTA</button>
                        </div>
                    </div>
                    <textarea name="content" id="postContent" rows="22" required 
                              style="font-family: 'Fira Code', monospace; font-size: 0.88rem; line-height: 1.6;"
                              class="crm-form-control @error('content') is-invalid @enderror">{{ old('content', $post->content) }}</textarea>
                    @error('content') <span class="crm-form-error">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- 2. Schema.org FAQs Builder -->
            <div class="crm-card-panel">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem; padding-bottom: 0.75rem; border-bottom: 1px solid var(--crm-border);">
                    <div>
                        <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0;">
                            2. Preguntas Frecuentes & Schema.org (FAQPage)
                        </h3>
                        <p style="font-size: 0.85rem; color: var(--crm-text-muted); margin: 4px 0 0 0;">
                            Google muestra estas preguntas directamente en los resultados de búsqueda (Rich Snippets).
                        </p>
                    </div>
                    <button type="button" class="crm-btn crm-btn-secondary crm-btn-sm" onclick="addFaqRow()">
                        <span>➕</span> Agregar FAQ
                    </button>
                </div>

                <div id="faqContainer" style="display: flex; flex-direction: column; gap: 1rem;">
                    <!-- Pre-populated via JS -->
                </div>
            </div>

            <!-- 3. SEO Meta Tags & Google SERP Preview -->
            <div class="crm-card-panel">
                <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0 0 1.25rem 0; padding-bottom: 0.75rem; border-bottom: 1px solid var(--crm-border);">
                    3. Optimización SEO & Vista Previa en Google
                </h3>

                <div class="crm-form-group">
                    <div style="display: flex; justify-content: space-between;">
                        <label class="crm-form-label">Meta Title (Título para Google) *</label>
                        <span id="metaTitleCount" style="font-size: 0.78rem; color: var(--crm-text-muted);">0 / 60 caracteres</span>
                    </div>
                    <input type="text" name="meta_title" id="metaTitle" value="{{ old('meta_title', $post->meta_title) }}" 
                           class="crm-form-control @error('meta_title') is-invalid @enderror">
                    @error('meta_title') <span class="crm-form-error">{{ $message }}</span> @enderror
                </div>

                <div class="crm-form-group">
                    <div style="display: flex; justify-content: space-between;">
                        <label class="crm-form-label">Meta Description (Descripción en Google) *</label>
                        <span id="metaDescCount" style="font-size: 0.78rem; color: var(--crm-text-muted);">0 / 160 caracteres</span>
                    </div>
                    <textarea name="meta_description" id="metaDesc" rows="3" 
                              class="crm-form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description', $post->meta_description) }}</textarea>
                    @error('meta_description') <span class="crm-form-error">{{ $message }}</span> @enderror
                </div>

                <!-- Google SERP Snippet Preview -->
                <div style="margin-top: 1.5rem; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 1.25rem; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
                    <div style="font-size: 0.75rem; text-transform: uppercase; font-weight: 800; color: #64748b; margin-bottom: 0.75rem; letter-spacing: 0.05em;">
                        🔍 Vista Previa en Resultados de Búsqueda Google
                    </div>
                    <div style="font-family: Arial, sans-serif;">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                            <img src="{{ asset('images/logo.webp') }}" alt="REW" style="width: 18px; height: 18px; border-radius: 50%;">
                            <div style="font-size: 0.82rem; color: #202124; line-height: 1.2;">
                                <div>REW Chile</div>
                                <div style="font-size: 0.75rem; color: #4d5156;">https://rew.cl › blog › <span id="previewSlug">{{ $post->slug }}</span></div>
                            </div>
                        </div>
                        <div id="previewTitle" style="color: #1a0dab; font-size: 1.15rem; line-height: 1.3; font-weight: 400; cursor: pointer; text-decoration: none; margin-bottom: 4px;">
                            {{ $post->meta_title ?: $post->title }}
                        </div>
                        <div id="previewDesc" style="color: #4d5156; font-size: 0.88rem; line-height: 1.4;">
                            {{ $post->meta_description ?: Str::limit(strip_tags($post->excerpt), 155) }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column: Publishing, Media & AI Pilot -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            
            <!-- Publishing Actions -->
            <div class="crm-card-panel" style="position: sticky; top: 85px; z-index: 10;">
                <h3 style="font-size: 1.1rem; font-weight: 800; color: #0f172a; margin: 0 0 1rem 0; padding-bottom: 0.5rem; border-bottom: 1px solid var(--crm-border);">
                    Publicación & Guardado
                </h3>

                <div style="margin-bottom: 1.25rem;">
                    <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.95rem; font-weight: 700; color: #0f172a;">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }} 
                               style="width: 18px; height: 18px; accent-color: var(--crm-primary);">
                        <span>Artículo publicado en vivo</span>
                    </label>
                    <p style="font-size: 0.8rem; color: var(--crm-text-muted); margin: 4px 0 0 28px;">
                        Estado actual: <strong>{{ $post->is_published ? 'En vivo' : 'Borrador privado' }}</strong>
                    </p>
                </div>

                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <button type="submit" class="crm-btn crm-btn-primary" style="width: 100%; justify-content: center; padding: 0.85rem; font-size: 1rem; font-weight: 800;">
                        <span>💾</span> Actualizar Artículo
                    </button>
                    <a href="{{ route('admin.blog.index') }}" class="crm-btn crm-btn-secondary" style="width: 100%; justify-content: center;">
                        Volver sin Guardar
                    </a>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="crm-card-panel">
                <h3 style="font-size: 1.1rem; font-weight: 800; color: #0f172a; margin: 0 0 1rem 0; padding-bottom: 0.5rem; border-bottom: 1px solid var(--crm-border);">
                    Imagen Destacada (Portada)
                </h3>

                <div class="crm-form-group">
                    <label class="crm-form-label">Subir Nueva Imagen (Reemplazar)</label>
                    <input type="file" name="image_file" id="imageFileInput" accept="image/*" class="crm-form-control" onchange="previewImage(this)">
                </div>

                <div class="crm-form-group">
                    <label class="crm-form-label">O URL de Imagen Actual</label>
                    <input type="text" name="featured_image" id="featuredImageUrl" value="{{ old('featured_image', $post->featured_image) }}" 
                           class="crm-form-control" oninput="updateImageFromUrl(this.value)">
                </div>

                <div style="margin-top: 1rem; text-align: center;">
                    <div style="font-size: 0.78rem; font-weight: 700; color: #64748b; margin-bottom: 6px;">Vista Previa de Portada:</div>
                    <div style="width: 100%; height: 160px; border-radius: 8px; overflow: hidden; background: #0f172a; border: 1px solid var(--crm-border); display: flex; align-items: center; justify-content: center;">
                        <img id="imagePreview" src="{{ $post->featured_image ?: '/images/logo.webp' }}" alt="{{ $post->title }}" 
                             onerror="this.src='/images/logo.webp'"
                             style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
            </div>

            <!-- REW SEO AI Pilot Mini Card -->
            <div class="crm-card-panel" style="background: linear-gradient(180deg, #f8fafc 0%, #eef2ff 100%); border: 1px solid #c7d2fe;">
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 0.75rem;">
                    <span style="font-size: 1.4rem;">✨</span>
                    <h4 style="font-size: 1rem; font-weight: 800; color: #3730a3; margin: 0;">REW SEO AI Pilot</h4>
                </div>
                <p style="font-size: 0.82rem; color: #4338ca; line-height: 1.5; margin-bottom: 1rem;">
                    ¿Quieres enriquecer este artículo con FAQs adicionales, mejorar el CTR de los meta tags o añadir secciones técnicas?
                </p>
                <button type="button" class="crm-btn crm-btn-secondary" onclick="openAiPilotModal()" style="width: 100%; justify-content: center; background: #ffffff; color: #4338ca; border-color: #c7d2fe; font-weight: 700;">
                    Consultar a la IA ↗
                </button>
            </div>

        </div>
    </div>
</form>

<!-- Modal: REW SEO AI Pilot Assistant -->
<div id="aiPilotModal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.75); z-index: 9999; backdrop-filter: blur(4px); align-items: center; justify-content: center; padding: 1.5rem;">
    <div style="background: #ffffff; width: 100%; max-width: 680px; border-radius: 16px; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25); overflow: hidden; display: flex; flex-direction: column; max-height: 90vh;">
        <!-- Modal Header -->
        <div style="padding: 1.25rem 1.5rem; background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); color: #ffffff; display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <span style="font-size: 1.5rem;">🚀</span>
                <div>
                    <h3 style="margin: 0; font-size: 1.15rem; font-weight: 800; color: #ffffff;">REW SEO AI Pilot</h3>
                    <p style="margin: 0; font-size: 0.8rem; color: #e0e7ff;">Optimización Asistida por IA</p>
                </div>
            </div>
            <button type="button" onclick="closeAiPilotModal()" style="background: none; border: none; color: #ffffff; font-size: 1.5rem; cursor: pointer; padding: 0 4px; line-height: 1;">✕</button>
        </div>

        <!-- Modal Body -->
        <div style="padding: 1.5rem; overflow-y: auto; display: flex; flex-direction: column; gap: 1.25rem;">
            <div>
                <label class="crm-form-label">Tema o Enfoque</label>
                <input type="text" id="aiTopicInput" class="crm-form-control" value="{{ $post->title }}">
            </div>

            <div>
                <label class="crm-form-label">Acción deseada</label>
                <select id="aiActionType" class="crm-form-control">
                    <option value="faqs">Generar 5 Preguntas Frecuentes Clave para Schema.org</option>
                    <option value="seo">Optimizar Título H1, Meta Title y Meta Description</option>
                    <option value="outline">Generar Estructura / Temario H2 y H3</option>
                    <option value="full">Reescribir / Regenerar Artículo Completo</option>
                </select>
            </div>

            <div id="aiStatusBox" style="display: none; padding: 1rem; border-radius: 8px; background: #eef2ff; border: 1px solid #c7d2fe; color: #3730a3; font-size: 0.88rem;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <span style="animation: spin 1s linear infinite; display: inline-block;">⏳</span>
                    <span id="aiStatusMsg">Procesando con REW SEO AI Pilot...</span>
                </div>
            </div>

            <div id="aiResultPreviewBox" style="display: none;">
                <label class="crm-form-label">Resultado Generado</label>
                <div id="aiResultText" style="max-height: 220px; overflow-y: auto; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1rem; font-size: 0.85rem; font-family: monospace; white-space: pre-wrap;"></div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div style="padding: 1rem 1.5rem; background: #f8fafc; border-top: 1px solid var(--crm-border); display: flex; justify-content: flex-end; gap: 0.75rem;">
            <button type="button" class="crm-btn crm-btn-secondary" onclick="closeAiPilotModal()">Cerrar</button>
            <button type="button" id="aiGenerateBtn" class="crm-btn crm-btn-primary" onclick="runAiPilot()" style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); border: none;">
                <span>✨</span> Generar con IA
            </button>
            <button type="button" id="aiApplyBtn" class="crm-btn crm-btn-primary" style="display: none; background: #059669; border: none;" onclick="applyAiResults()">
                <span>📥</span> Aplicar al Formulario
            </button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
let faqCounter = 0;
let lastAiData = null;

// Initial FAQs load from Database
const initialFaqs = @json($post->faq_schema ?? []);

if (Array.isArray(initialFaqs) && initialFaqs.length > 0) {
    initialFaqs.forEach(f => {
        addFaqRow(f.question || '', f.answer || '');
    });
}

// Slug and Meta inputs
const titleInput = document.getElementById('postTitle');
const slugInput = document.getElementById('postSlug');
const metaTitleInput = document.getElementById('metaTitle');
const metaDescInput = document.getElementById('metaDesc');
const excerptInput = document.getElementById('postExcerpt');
const previewTitle = document.getElementById('previewTitle');
const previewDesc = document.getElementById('previewDesc');
const previewSlug = document.getElementById('previewSlug');
const metaTitleCount = document.getElementById('metaTitleCount');
const metaDescCount = document.getElementById('metaDescCount');

slugInput.addEventListener('input', function() {
    previewSlug.textContent = this.value || 'articulo';
});

metaTitleInput.addEventListener('input', updateMetaCounts);
metaDescInput.addEventListener('input', updateMetaCounts);

function updateMetaCounts() {
    const titleVal = metaTitleInput.value;
    const descVal = metaDescInput.value;

    metaTitleCount.textContent = `${titleVal.length} / 60 caracteres`;
    metaTitleCount.style.color = titleVal.length > 60 ? '#dc2626' : 'var(--crm-text-muted)';
    previewTitle.textContent = titleVal || titleInput.value;

    metaDescCount.textContent = `${descVal.length} / 160 caracteres`;
    metaDescCount.style.color = descVal.length > 160 ? '#dc2626' : 'var(--crm-text-muted)';
    previewDesc.textContent = descVal || excerptInput.value;
}

// Image Preview Helper
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
            document.getElementById('featuredImageUrl').value = '';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function updateImageFromUrl(url) {
    if (url && url.trim()) {
        document.getElementById('imagePreview').src = url.trim();
    }
}

// FAQ Dynamic Rows
function addFaqRow(question = '', answer = '') {
    const container = document.getElementById('faqContainer');
    const rowId = `faq_row_${faqCounter++}`;
    
    const div = document.createElement('div');
    div.id = rowId;
    div.style.cssText = 'background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1rem; position: relative;';
    div.innerHTML = `
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
            <strong style="font-size: 0.85rem; color: #4338ca;">❓ Pregunta Frecuente #${container.children.length + 1}</strong>
            <button type="button" onclick="document.getElementById('${rowId}').remove()" style="background: none; border: none; color: #ef4444; font-size: 0.82rem; font-weight: 700; cursor: pointer;">✕ Eliminar</button>
        </div>
        <div style="margin-bottom: 0.5rem;">
            <input type="text" name="faq_questions[]" value="${escapeHtml(question)}" placeholder="Ej: ¿Cómo se sincroniza el stock con Bsale?" class="crm-form-control" style="font-size: 0.88rem; font-weight: 600;" required>
        </div>
        <div>
            <textarea name="faq_answers[]" rows="2" placeholder="Respuesta técnica clara y directa que responderá la duda del cliente..." class="crm-form-control" style="font-size: 0.85rem;" required>${escapeHtml(answer)}</textarea>
        </div>
    `;
    container.appendChild(div);
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

// Content Formatting Helpers
function insertTag(openTag, closeTag) {
    const textarea = document.getElementById('postContent');
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const selected = textarea.value.substring(start, end) || 'Texto aquí';
    const replacement = `${openTag}${selected}${closeTag}`;
    textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(end);
    textarea.focus();
    textarea.setSelectionRange(start + openTag.length, start + openTag.length + selected.length);
}

function insertLink() {
    const url = prompt('Ingresa la URL del enlace:', 'https://rew.cl/servicios/integracion-bsale-woocommerce');
    if (url) {
        insertTag(`<a href="${url}" style="color: var(--primary); font-weight: 700; text-decoration: underline;">`, '</a>');
    }
}

function insertTable() {
    const tableHtml = `
<table style="width: 100%; border-collapse: collapse; margin: 2rem 0; font-size: 0.95rem; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden;">
    <thead>
        <tr style="background: #0f172a; color: #ffffff;">
            <th style="padding: 12px; text-align: left;">Dimensión</th>
            <th style="padding: 12px; text-align: left;">Bsale ERP</th>
            <th style="padding: 12px; text-align: left;">WooCommerce</th>
        </tr>
    </thead>
    <tbody>
        <tr style="border-bottom: 1px solid #e2e8f0;">
            <td style="padding: 12px;"><strong>Control de Stock</strong></td>
            <td style="padding: 12px; color: #059669; font-weight: 700;">Fuente de Verdad Maestra</td>
            <td style="padding: 12px;">Reflejo en tiempo real</td>
        </tr>
        <tr>
            <td style="padding: 12px;"><strong>Facturación SII</strong></td>
            <td style="padding: 12px; color: #059669; font-weight: 700;">Emisión automática de DTE</td>
            <td style="padding: 12px;">Punto de captura de pago</td>
        </tr>
    </tbody>
</table>
`;
    const textarea = document.getElementById('postContent');
    textarea.value += tableHtml;
}

function insertCtaBox() {
    const ctaHtml = `
<div style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%); color: #ffffff; border-radius: 16px; padding: 2rem; margin: 3rem 0; text-align: center; border: 1px solid rgba(255,255,255,0.15);">
    <h3 style="color: #ffffff; font-size: 1.6rem; margin-top: 0; margin-bottom: 0.75rem;">¿Necesitas integrar Bsale con tu tienda WooCommerce?</h3>
    <p style="color: #cbd5e1; font-size: 1rem; max-width: 600px; margin: 0 auto 1.5rem;">Evita quiebres de stock, automatiza boletas y facturas del SII con soporte de ingeniería especializada en Chile.</p>
    <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
        <a href="/servicios/integracion-bsale-woocommerce" class="btn btn-gold" style="font-weight: 800; padding: 0.85rem 1.75rem;">Ver Integración Bsale WooCommerce →</a>
        <a href="https://api.whatsapp.com/send?phone=56987261127&text=Hola%20Álvaro,%20leí%20su%20artículo%20sobre%20Bsale%20y%20WooCommerce%20y%20quiero%20cotizar." target="_blank" class="btn btn-whatsapp" style="font-weight: 800; padding: 0.85rem 1.75rem;">WhatsApp (+56 9 8726 1127)</a>
    </div>
</div>
`;
    const textarea = document.getElementById('postContent');
    textarea.value += ctaHtml;
}

// AI Pilot Modal Logic
function openAiPilotModal() {
    const modal = document.getElementById('aiPilotModal');
    modal.style.display = 'flex';
}

function closeAiPilotModal() {
    document.getElementById('aiPilotModal').style.display = 'none';
}

async function runAiPilot() {
    const topic = document.getElementById('aiTopicInput').value;
    const action = document.getElementById('aiActionType').value;
    const statusBox = document.getElementById('aiStatusBox');
    const previewBox = document.getElementById('aiResultPreviewBox');
    const resultText = document.getElementById('aiResultText');
    const genBtn = document.getElementById('aiGenerateBtn');
    const applyBtn = document.getElementById('aiApplyBtn');

    if (!topic.trim()) {
        alert('Por favor ingresa un tema para el artículo.');
        return;
    }

    statusBox.style.display = 'block';
    previewBox.style.display = 'none';
    applyBtn.style.display = 'none';
    genBtn.disabled = true;

    try {
        const res = await fetch("{{ route('admin.blog.ai-generate') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ topic, action })
        });

        const data = await res.json();
        statusBox.style.display = 'none';
        genBtn.disabled = false;

        if (data.success) {
            lastAiData = data;
            previewBox.style.display = 'block';
            resultText.textContent = JSON.stringify(data.content || data, null, 2);
            applyBtn.style.display = 'inline-flex';
        } else {
            alert('Error al generar: ' + (data.error || 'Intenta de nuevo'));
        }
    } catch (e) {
        statusBox.style.display = 'none';
        genBtn.disabled = false;
        alert('Error de conexión con el motor de IA: ' + e.message);
    }
}

function applyAiResults() {
    if (!lastAiData || !lastAiData.data) {
        closeAiPilotModal();
        return;
    }

    const d = lastAiData.data;
    if (d.title) {
        titleInput.value = d.title;
    }
    if (d.category) {
        document.getElementById('postCategory').value = d.category;
    }
    if (d.excerpt) {
        excerptInput.value = d.excerpt;
    }
    if (d.content) {
        document.getElementById('postContent').value = d.content;
    }
    if (d.meta_title) {
        metaTitleInput.value = d.meta_title;
    }
    if (d.meta_description) {
        metaDescInput.value = d.meta_description;
    }
    if (d.faqs && Array.isArray(d.faqs)) {
        d.faqs.forEach(f => {
            addFaqRow(f.question, f.answer);
        });
    }

    updateMetaCounts();
    closeAiPilotModal();
    alert('✨ ¡Contenido generado por REW SEO AI Pilot aplicado con éxito!');
}

// Initialize counts
updateMetaCounts();
</script>
@endsection
