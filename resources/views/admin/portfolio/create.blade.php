@extends('admin.layout')

@section('title', 'Nuevo Caso de Portafolio | REW CRM')

@section('content')
<!-- Header -->
<div class="crm-header">
    <div>
        <a href="{{ route('admin.portfolio.index') }}" class="crm-btn crm-btn-secondary crm-btn-sm" style="margin-bottom: 0.75rem; display: inline-flex;">
            ← Volver al Listado
        </a>
        <h1 class="crm-title">Crear Nuevo Caso de Portafolio</h1>
        <p class="crm-subtitle">
            Ingresa la información del proyecto o utiliza el analizador inteligente para capturar la web completa en WebP y auto-rellenar datos.
        </p>
    </div>
</div>

<!-- 1. Smart URL Analyzer & Full-Page Screenshot Tool -->
<div class="crm-card-panel" style="margin-bottom: 2rem; border-left: 4px solid var(--crm-primary); background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);">
    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem; margin-bottom: 1rem;">
        <div>
            <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0; display: flex; align-items: center; gap: 8px;">
                🚀 Analizador de Páginas & Captura Inteligente 100%
            </h3>
            <p style="font-size: 0.85rem; color: var(--crm-text-muted); margin: 4px 0 0 0;">
                Ingresa la URL del sitio web. El motor desplazará la página completa, cargará todas las imágenes lazy-load y animaciones, y generará la captura vertical WebP optimizada.
            </p>
        </div>
        <span style="font-size: 0.75rem; background: var(--crm-primary-light); color: var(--crm-primary); font-weight: 800; padding: 4px 10px; border-radius: 6px;">
            Full-Page WebP Engine 2.0
        </span>
    </div>

    <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
        <div style="flex: 1; min-width: 280px; position: relative;">
            <input type="url" id="analyzerUrlInput" placeholder="https://ejemplo.cl" 
                   class="crm-form-control" style="font-size: 0.95rem; padding: 0.75rem 1rem;">
        </div>
        <button type="button" id="startAnalyzerBtn" class="crm-btn crm-btn-primary" style="padding: 0.75rem 1.25rem; font-weight: 800; white-space: nowrap;">
            <span>🔍</span> Analizar y Capturar Pantalla WebP
        </button>
    </div>

    <!-- Status / Loading Indicator -->
    <div id="analyzerStatusBox" style="display: none; margin-top: 1rem; padding: 1rem; border-radius: 8px; font-size: 0.88rem; background: #eef2ff; border: 1px solid #c7d2fe; color: #3730a3;">
        <div style="display: flex; align-items: center; gap: 10px;">
            <span class="analyzer-spinner" style="font-size: 1.2rem; display: inline-block; animation: spin 1s linear infinite;">⏳</span>
            <div id="analyzerStatusMsg" style="font-weight: 600;">Iniciando navegador headless y conectando con el sitio...</div>
        </div>
    </div>
</div>

<!-- 2. Main Form -->
<form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem; align-items: start;">
        <!-- Left Column: Details -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            
            <!-- General Info Panel -->
            <div class="crm-card-panel">
                <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0 0 1.25rem 0; padding-bottom: 0.75rem; border-bottom: 1px solid var(--crm-border);">
                    1. Información General del Proyecto
                </h3>

                <div class="crm-form-group">
                    <label class="crm-form-label">Título del Proyecto *</label>
                    <input type="text" name="title" id="projectTitle" value="{{ old('title') }}" required 
                           placeholder="Ej: Prodoral Chile - Sellado de Fugas de Gas & SEO" 
                           class="crm-form-control @error('title') is-invalid @enderror">
                    @error('title') <span class="crm-form-error">{{ $message }}</span> @enderror
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="crm-form-group">
                        <label class="crm-form-label">Slug (URL amigable)</label>
                        <input type="text" name="slug" id="projectSlug" value="{{ old('slug') }}" 
                               placeholder="prodoral-chile" 
                               class="crm-form-control @error('slug') is-invalid @enderror">
                        <span class="crm-form-help">Se generará automáticamente si lo dejas vacío.</span>
                        @error('slug') <span class="crm-form-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="crm-form-group">
                        <label class="crm-form-label">Cliente / Marca *</label>
                        <input type="text" name="client" id="projectClient" value="{{ old('client') }}" required 
                               placeholder="Ej: Prodoral Chile / Domingo Plaza" 
                               class="crm-form-control @error('client') is-invalid @enderror">
                        @error('client') <span class="crm-form-error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="crm-form-group">
                        <label class="crm-form-label">Categoría *</label>
                        <input type="text" name="category" id="projectCategory" list="categoriesList" value="{{ old('category', 'Plataformas Web & Software a Medida') }}" required 
                               class="crm-form-control @error('category') is-invalid @enderror">
                        <datalist id="categoriesList">
                            @foreach($allCategories as $cat)
                                <option value="{{ $cat }}"></option>
                            @endforeach
                        </datalist>
                        @error('category') <span class="crm-form-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="crm-form-group">
                        <label class="crm-form-label">Estado *</label>
                        <select name="status" id="projectStatus" class="crm-form-control">
                            <option value="Finalizado" {{ old('status') === 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                            <option value="En Desarrollo" {{ old('status') === 'En Desarrollo' ? 'selected' : '' }}>En Desarrollo</option>
                            <option value="En Pausa" {{ old('status') === 'En Pausa' ? 'selected' : '' }}>En Pausa</option>
                        </select>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="crm-form-group">
                        <label class="crm-form-label">URL del Proyecto en Vivo</label>
                        <input type="url" name="project_url" id="projectUrl" value="{{ old('project_url') }}" 
                               placeholder="https://prodoral.cl/" 
                               class="crm-form-control @error('project_url') is-invalid @enderror">
                        @error('project_url') <span class="crm-form-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="crm-form-group">
                        <label class="crm-form-label">Fecha del Proyecto</label>
                        <input type="date" name="project_date" id="projectDate" value="{{ old('project_date', date('Y-m-d')) }}" 
                               class="crm-form-control">
                    </div>
                </div>
            </div>

            <!-- Content & Technical Narrative -->
            <div class="crm-card-panel">
                <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0 0 1.25rem 0; padding-bottom: 0.75rem; border-bottom: 1px solid var(--crm-border);">
                    2. Narrativa Técnica & Contenido
                </h3>

                <div class="crm-form-group">
                    <label class="crm-form-label">Rol Desempeñado por REW *</label>
                    <input type="text" name="role" id="projectRole" value="{{ old('role') }}" required 
                           placeholder="Ej: Arquitectura Backend, Programación Web Full Stack en PHP & Estrategia SEO Técnico" 
                           class="crm-form-control @error('role') is-invalid @enderror">
                    @error('role') <span class="crm-form-error">{{ $message }}</span> @enderror
                </div>

                <div class="crm-form-group">
                    <label class="crm-form-label">Tecnologías Utilizadas (separadas por coma) *</label>
                    <input type="text" name="technologies" id="projectTechs" value="{{ old('technologies') }}" required 
                           placeholder="Ej: PHP Puro, Vanilla JavaScript, CSS3 Modular, SEO Técnico & Local, Core Web Vitals" 
                           class="crm-form-control @error('technologies') is-invalid @enderror">
                    @error('technologies') <span class="crm-form-error">{{ $message }}</span> @enderror
                </div>

                <div class="crm-form-group">
                    <label class="crm-form-label">Resumen Ejecutivo (Summary) *</label>
                    <textarea name="summary" id="projectSummary" rows="3" required 
                              placeholder="Breve resumen de 2-3 líneas para la tarjeta del portafolio y vista previa rápida..."
                              class="crm-form-control @error('summary') is-invalid @enderror">{{ old('summary') }}</textarea>
                    @error('summary') <span class="crm-form-error">{{ $message }}</span> @enderror
                </div>

                <div class="crm-form-group">
                    <div style="display: flex; justify-content: space-between; align-items: baseline;">
                        <label class="crm-form-label">Descripción Detallada del Caso de Estudio</label>
                        <span style="font-size: 0.78rem; color: var(--crm-text-muted);">Soporta Markdown: **negrita**, [enlace](https://...), 1. Listas</span>
                    </div>
                    <textarea name="full_description" id="projectDescription" rows="8" 
                              style="font-family: inherit; line-height: 1.6;"
                              placeholder="Describe el desafío del cliente, la solución técnica desarrollada por REW y los resultados..."
                              class="crm-form-control @error('full_description') is-invalid @enderror">{{ old('full_description') }}</textarea>
                    @error('full_description') <span class="crm-form-error">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Results & KPIs Repeater -->
            <div class="crm-card-panel">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <div>
                        <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0;">
                            3. Resultados Clave / KPIs Logrados
                        </h3>
                        <p style="font-size: 0.82rem; color: var(--crm-text-muted); margin: 2px 0 0 0;">
                            Puntos clave que destacan el impacto en ventas, velocidad o captación de prospectos.
                        </p>
                    </div>
                    <button type="button" id="addResultBtn" class="crm-btn crm-btn-secondary crm-btn-sm" style="font-weight: 700;">
                        ➕ Añadir Resultado
                    </button>
                </div>

                <div id="resultsContainer" style="display: flex; flex-direction: column; gap: 0.75rem;">
                    @php
                        $oldResults = old('results', [
                            'Incremento notable en tráfico orgánico y captación de prospectos calificados',
                            'Optimización integral de tiempos de carga con Core Web Vitals en verde'
                        ]);
                    @endphp
                    @foreach($oldResults as $index => $res)
                        <div class="result-row" style="display: flex; gap: 0.5rem; align-items: center;">
                            <span style="color: #059669; font-weight: 800; font-size: 1rem;">✓</span>
                            <input type="text" name="results[]" value="{{ $res }}" placeholder="Ej: Reducción del tiempo de carga a menos de 400ms" 
                                   class="crm-form-control" style="font-size: 0.88rem;">
                            <button type="button" class="remove-row-btn crm-btn-icon delete-btn" title="Eliminar este resultado">
                                ✕
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- SEO Meta Tags -->
            <div class="crm-card-panel">
                <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0 0 1.25rem 0; padding-bottom: 0.75rem; border-bottom: 1px solid var(--crm-border);">
                    4. Metadatos SEO para Google
                </h3>

                <div class="crm-form-group">
                    <label class="crm-form-label">Meta Title</label>
                    <input type="text" name="meta_title" id="projectMetaTitle" value="{{ old('meta_title') }}" 
                           placeholder="Ej: Prodoral Chile - Plataforma Web PHP & Posicionamiento SEO | REW" 
                           class="crm-form-control">
                </div>

                <div class="crm-form-group">
                    <label class="crm-form-label">Meta Description</label>
                    <textarea name="meta_description" id="projectMetaDescription" rows="2" 
                              placeholder="Descripción optimizada para el snippet de Google (150-160 caracteres)..."
                              class="crm-form-control">{{ old('meta_description') }}</textarea>
                </div>
            </div>

        </div>

        <!-- Right Column: Featured Image & Publishing Controls -->
        <div style="display: flex; flex-direction: column; gap: 1.5rem; position: sticky; top: 90px;">
            
            <!-- Publish Actions Card -->
            <div class="crm-card-panel">
                <h4 style="font-size: 1rem; font-weight: 800; color: #0f172a; margin: 0 0 1rem 0;">
                    Publicación & Visibilidad
                </h4>

                <div style="margin-bottom: 1.25rem;">
                    <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-weight: 700; font-size: 0.92rem; color: #0f172a;">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: var(--crm-primary);">
                        <span>⭐ Destacar en Home</span>
                    </label>
                    <span style="display: block; font-size: 0.78rem; color: var(--crm-text-muted); margin-left: 26px; margin-top: 2px;">
                        Aparecerá en el slider principal y carrusel de casos de éxito.
                    </span>
                </div>

                <div class="crm-form-group" style="margin-bottom: 1.5rem;">
                    <label class="crm-form-label">Orden de Visualización (#)</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}" class="crm-form-control" style="width: 100px;">
                    <span class="crm-form-help">Menor número aparece primero (ej. 1, 2, 3).</span>
                </div>

                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <button type="submit" class="crm-btn crm-btn-primary" style="width: 100%; justify-content: center; font-weight: 800; padding: 0.85rem;">
                        <span>💾</span> Guardar Caso en Portafolio
                    </button>
                    <a href="{{ route('admin.portfolio.index') }}" class="crm-btn crm-btn-secondary" style="width: 100%; justify-content: center;">
                        Cancelar
                    </a>
                </div>
            </div>

            <!-- Image Card -->
            <div class="crm-card-panel">
                <h4 style="font-size: 1rem; font-weight: 800; color: #0f172a; margin: 0 0 1rem 0;">
                    Captura Destacada (WebP)
                </h4>

                <!-- Mockup Preview Frame -->
                <div id="imagePreviewContainer" style="width: 100%; height: 260px; border-radius: 10px; overflow: hidden; background: #0f172a; border: 2px solid var(--crm-border); margin-bottom: 1rem; position: relative; display: flex; align-items: center; justify-content: center;">
                    <img id="imagePreviewEl" src="{{ old('featured_image', '/images/logo.webp') }}" 
                         alt="Vista Previa"
                         style="width: 100%; height: 100%; object-fit: cover; object-position: top; transition: all 0.3s ease;">
                    <div style="position: absolute; bottom: 8px; right: 8px; background: rgba(15, 23, 42, 0.85); color: #ffffff; font-size: 0.72rem; padding: 3px 8px; border-radius: 4px; font-weight: 700;">
                        Vista Previa
                    </div>
                </div>

                <div class="crm-form-group">
                    <label class="crm-form-label">Ruta de Imagen Destacada</label>
                    <input type="text" name="featured_image" id="projectFeaturedImage" 
                           value="{{ old('featured_image') }}" 
                           placeholder="/images/portfolio/proyecto.webp" 
                           class="crm-form-control">
                    <span class="crm-form-help">Se auto-completa al analizar la web o subir archivo.</span>
                </div>

                <div class="crm-form-group" style="margin-bottom: 0;">
                    <label class="crm-form-label">O Subir Archivo Manualmente</label>
                    <input type="file" name="image_file" id="manualImageFileInput" accept="image/*" class="crm-form-control" style="font-size: 0.85rem;">
                </div>
            </div>

        </div>
    </div>
</form>

@endsection

@section('scripts')
<style>
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. URL Analyzer Trigger
    var startBtn = document.getElementById('startAnalyzerBtn');
    var urlInput = document.getElementById('analyzerUrlInput');
    var statusBox = document.getElementById('analyzerStatusBox');
    var statusMsg = document.getElementById('analyzerStatusMsg');

    startBtn.addEventListener('click', function() {
        var url = urlInput.value.trim();
        if (!url) {
            alert('Por favor ingresa una URL válida (ej: https://cliente.cl)');
            urlInput.focus();
            return;
        }

        startBtn.disabled = true;
        startBtn.innerHTML = '<span>⏳</span> Analizando & Capturando...';
        statusBox.style.display = 'block';
        statusBox.style.background = '#eef2ff';
        statusBox.style.borderColor = '#c7d2fe';
        statusBox.style.color = '#3730a3';
        statusMsg.textContent = 'Iniciando navegador headless. Desplazando de arriba hacia abajo para activar imágenes lazy-load y capturar en alta resolución...';

        var slug = document.getElementById('projectSlug').value.trim();

        fetch("{{ route('admin.portfolio.analyze') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                url: url,
                slug: slug
            })
        })
        .then(function(res) {
            return res.json();
        })
        .then(function(data) {
            startBtn.disabled = false;
            startBtn.innerHTML = '<span>🔍</span> Analizar y Capturar Pantalla WebP';

            if (!data.success) {
                statusBox.style.background = '#fef2f2';
                statusBox.style.borderColor = '#fecaca';
                statusBox.style.color = '#991b1b';
                statusMsg.textContent = '❌ ' + (data.error || 'Ocurrió un error al analizar la página.');
                return;
            }

            statusBox.style.background = '#ecfdf5';
            statusBox.style.borderColor = '#a7f3d0';
            statusBox.style.color = '#065f46';
            statusMsg.innerHTML = '✅ <strong>¡Captura y análisis completados con éxito!</strong> Captura vertical WebP guardada y campos pre-llenados automáticamente.';

            // Pre-fill form fields
            if (data.title) {
                document.getElementById('projectTitle').value = data.title;
                if (!document.getElementById('projectMetaTitle').value) {
                    document.getElementById('projectMetaTitle').value = data.title + ' | REW';
                }
            }
            if (data.slug) {
                document.getElementById('projectSlug').value = data.slug;
            }
            if (data.client) {
                document.getElementById('projectClient').value = data.client;
            }
            if (data.category_suggestion) {
                document.getElementById('projectCategory').value = data.category_suggestion;
            }
            if (data.technologies) {
                document.getElementById('projectTechs').value = data.technologies;
            }
            if (data.description) {
                document.getElementById('projectSummary').value = data.description;
                if (!document.getElementById('projectMetaDescription').value) {
                    document.getElementById('projectMetaDescription').value = data.description.substring(0, 160);
                }
            }
            if (data.url) {
                document.getElementById('projectUrl').value = data.url;
            }
            if (data.featured_image) {
                document.getElementById('projectFeaturedImage').value = data.featured_image;
                var preview = document.getElementById('imagePreviewEl');
                preview.src = data.featured_image + '?v=' + Date.now();
            }

            // If empty description, put template
            var descBox = document.getElementById('projectDescription');
            if (!descBox.value && data.title) {
                descBox.value = "Desarrollo y optimización web para " + data.client + " (" + data.url + ").\n\n" +
                                "1. **Arquitectura y Rendimiento**: Implementación de código optimizado para carga instantánea.\n" +
                                "2. **SEO & Conversión**: Estructuración técnica orientada a maximizar conversiones y captación de clientes.\n" +
                                "3. **Diseño Responsivo**: Experiencia fluida adaptable a dispositivos móviles y escritorio.";
            }
        })
        .catch(function(err) {
            startBtn.disabled = false;
            startBtn.innerHTML = '<span>🔍</span> Analizar y Capturar Pantalla WebP';
            statusBox.style.background = '#fef2f2';
            statusBox.style.borderColor = '#fecaca';
            statusBox.style.color = '#991b1b';
            statusMsg.textContent = '❌ Error de conexión: ' + err.message;
        });
    });

    // 2. Dynamic Results / KPIs Repeater
    var addResultBtn = document.getElementById('addResultBtn');
    var resultsContainer = document.getElementById('resultsContainer');

    addResultBtn.addEventListener('click', function() {
        var row = document.createElement('div');
        row.className = 'result-row';
        row.style.cssText = 'display: flex; gap: 0.5rem; align-items: center;';
        row.innerHTML = `
            <span style="color: #059669; font-weight: 800; font-size: 1rem;">✓</span>
            <input type="text" name="results[]" value="" placeholder="Ej: Aumento del 120% en tasa de contacto" 
                   class="crm-form-control" style="font-size: 0.88rem;">
            <button type="button" class="remove-row-btn crm-btn-icon delete-btn" title="Eliminar este resultado">
                ✕
            </button>
        `;
        resultsContainer.appendChild(row);
        bindRemoveButtons();
    });

    function bindRemoveButtons() {
        document.querySelectorAll('.remove-row-btn').forEach(function(btn) {
            btn.onclick = function() {
                var row = this.closest('.result-row');
                if (document.querySelectorAll('.result-row').length > 1) {
                    row.remove();
                } else {
                    row.querySelector('input').value = '';
                }
            };
        });
    }
    bindRemoveButtons();

    // 3. Local file preview
    var fileInput = document.getElementById('manualImageFileInput');
    var previewEl = document.getElementById('imagePreviewEl');
    fileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                previewEl.src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    // 4. Featured image text input change preview
    var featuredInput = document.getElementById('projectFeaturedImage');
    featuredInput.addEventListener('input', function() {
        if (this.value) {
            previewEl.src = this.value;
        }
    });
});
</script>
@endsection
