@extends('layouts.app')

@section('title', '💬 Cotiza tu Proyecto Web o Software en Minutos | Trato Directo con Álvaro Valenzuela')
@section('meta_description', '⚡ Obtén un estimado de presupuesto en tiempo real y chatea directamente con el ingeniero desarrollador sin ejecutivos intermediarios ni demoras.')

@section('og_title', '💬 Cotiza tu Proyecto Web o Software en Minutos | REW Chile')
@section('og_description', '⚡ Calcula el presupuesto de tu web, software en Laravel o plugin WooCommerce y agenda reunión técnica directa con Álvaro Valenzuela.')
@section('og_image', asset('images/rew_og_card.png'))

@section('content')
<!-- Page Header -->
<section style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%); padding: 4rem 0 2rem;">
    <div class="container text-center">
        <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Evaluación & Asesoría Técnica</span>
        <h1 style="font-size: 3rem; margin-bottom: 1rem;">Cotiza tu Proyecto a Medida</h1>
        <p style="font-size: 1.15rem; color: var(--text-muted); max-width: 750px; margin: 0 auto 1.5rem;">
            Selecciona el tipo de proyecto y los módulos que necesitas. Coordinamos una sesión técnica directa con <strong>Álvaro Valenzuela Valdés</strong> para evaluar tu requerimiento y entregarte una propuesta formal.
        </p>
        
        <div style="display: inline-flex; align-items: center; gap: 8px; background: #e0e7ff; border: 1px solid #6366f1; color: #3730a3; padding: 8px 16px; border-radius: 9999px; font-size: 0.85rem; font-weight: 700;">
            <span>⚡ Propuesta técnica personalizada y cotización a medida sin compromiso.</span>
        </div>
    </div>
</section>

<!-- Interactive Step-by-Step Quote Form -->
<section class="section" style="padding-top: 1.5rem;">
    <div class="container">
        <div class="grid-2col-sidebar">
            <!-- Left: Steps Container -->
            <div class="card" style="padding: clamp(1.25rem, 3vw, 2.5rem);">
                <form id="quoteCalculatorForm" action="{{ route('cotizar.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="estimated_budget_usd" id="hidden_budget_usd" value="0">
                    <input type="hidden" name="estimated_budget_clp" id="hidden_budget_clp" value="0">

                    <!-- Step 1: Service Type -->
                    <div style="margin-bottom: 2.5rem;">
                        <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 8px;">
                            <span style="color: var(--primary);">1.</span> Selecciona el Tipo de Proyecto
                        </h3>
                        <p style="font-size: 0.88rem; color: var(--text-muted); margin-bottom: 1.25rem;">Elige la base principal de lo que deseas construir.</p>

                        <div class="option-select-grid">
                            <label class="option-card selected">
                                <input type="radio" name="service_type" value="Desarrollo Web Corporativo" checked>
                                <span class="option-title">🌐 Sitio Web Corporativo</span>
                                <span class="badge-mini badge-blue" style="font-size: 0.72rem; padding: 2px 8px; border-radius: 9999px;">Web Corporativa</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" name="service_type" value="Tienda E-Commerce WooCommerce">
                                <span class="option-title">🛒 Tienda E-Commerce</span>
                                <span class="badge-mini badge-green" style="font-size: 0.72rem; padding: 2px 8px; border-radius: 9999px;">Ventas Online</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" name="service_type" value="Software a Medida / SaaS Laravel">
                                <span class="option-title">💻 Software SaaS / Laravel</span>
                                <span class="badge-mini badge-purple" style="font-size: 0.72rem; padding: 2px 8px; border-radius: 9999px;">Arquitectura Propietaria</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" name="service_type" value="Chatbot IA con RAG Empresarial">
                                <span class="option-title">🤖 Chatbot IA con RAG</span>
                                <span class="badge-mini badge-pink" style="font-size: 0.72rem; padding: 2px 8px; border-radius: 9999px;">IA Generativa</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" name="service_type" value="Estrategia SEO & Posicionamiento">
                                <span class="option-title">📈 Optimización SEO & GEO</span>
                                <span class="badge-mini badge-teal" style="font-size: 0.72rem; padding: 2px 8px; border-radius: 9999px;">Top 1 Google</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" name="service_type" value="Mantenimiento & Soporte WordPress">
                                <span class="option-title">🛡️ Mantenimiento Web</span>
                                <span class="badge-mini badge-amber" style="font-size: 0.72rem; padding: 2px 8px; border-radius: 9999px;">Soporte & SLA</span>
                            </label>

                            <!-- NEW CUSTOMIZADO OPTION -->
                            <label class="option-card" style="border-color: var(--accent-gold); background: rgba(255, 200, 0, 0.05);">
                                <input type="radio" name="service_type" value="Software 100% Customizado en Laravel">
                                <span class="option-title" style="color: #b45309; font-weight: 800;">⚙️ Proyecto 100% Customizado</span>
                                <span class="badge badge-gold" style="font-size: 0.72rem; padding: 2px 8px; border-radius: 9999px;">Alcance a Medida</span>
                            </label>
                        </div>
                    </div>

                    <!-- Anti-Bot Honeypot Field (Invisible for humans, traps bots) -->
                    <input type="text" name="b_field_check_hp" style="display:none !important; position:absolute; left:-9999px;" tabindex="-1" autocomplete="off" aria-hidden="true">

                    <!-- Step 2: Features Add-ons & Dynamic Custom Modules -->
                    <div style="margin-bottom: 2.5rem;">
                        <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 8px;">
                            <span style="color: var(--primary);">2.</span> Módulos y Funcionalidades
                        </h3>
                        <p style="font-size: 0.88rem; color: var(--text-muted); margin-bottom: 1.25rem;">
                            Selecciona los módulos predefinidos y añade tus propias funcionalidades personalizadas (hasta 10).
                        </p>

                        <div class="option-select-grid" style="margin-bottom: 1.5rem;">
                            <label class="option-card">
                                <input type="checkbox" name="features[]" value="Pasarela Webpay Plus / MercadoPago">
                                <span class="option-title">💳 Pasarelas de Pago (Webpay/Stripe)</span>
                                <span class="badge-mini badge-blue" style="font-size: 0.72rem; padding: 2px 8px; border-radius: 9999px;">Integración</span>
                            </label>

                            <label class="option-card">
                                <input type="checkbox" name="features[]" value="Multi-Moneda CLP/USD y Traductor">
                                <span class="option-title">🌐 Multi-Moneda / Idiomas</span>
                                <span class="badge-mini badge-purple" style="font-size: 0.72rem; padding: 2px 8px; border-radius: 9999px;">Internacional</span>
                            </label>

                            <label class="option-card">
                                <input type="checkbox" name="features[]" value="Integración CRM y WhatsApp API">
                                <span class="option-title">📱 CRM & WhatsApp API</span>
                                <span class="badge-mini badge-green" style="font-size: 0.72rem; padding: 2px 8px; border-radius: 9999px;">Automatización</span>
                            </label>

                            <label class="option-card">
                                <input type="checkbox" name="features[]" value="Panel de Control & Roles en Laravel">
                                <span class="option-title">🛡️ Panel de Control & Roles</span>
                                <span class="badge-mini badge-teal" style="font-size: 0.72rem; padding: 2px 8px; border-radius: 9999px;">Seguridad</span>
                            </label>

                            <label class="option-card">
                                <input type="checkbox" name="features[]" value="Facturación Electrónica SII / APIs">
                                <span class="option-title">⚡ Facturación SII / APIs</span>
                                <span class="badge-mini badge-amber" style="font-size: 0.72rem; padding: 2px 8px; border-radius: 9999px;">DTE / Conectividad</span>
                            </label>

                            <label class="option-card">
                                <input type="checkbox" name="features[]" value="Soporte Prioritario & Capacitación 1 a 1">
                                <span class="option-title">👨‍🏫 Capacitación 1 a 1</span>
                                <span class="badge-mini badge-pink" style="font-size: 0.72rem; padding: 2px 8px; border-radius: 9999px;">Acompañamiento</span>
                            </label>
                        </div>

                        <!-- Dynamic Interactive Custom Features Repeater (Max 10) -->
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); border-radius: 16px; padding: clamp(1rem, 2.5vw, 1.5rem); margin-bottom: 1.5rem; box-shadow: var(--shadow-sm);">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem; flex-wrap: wrap; gap: 8px;">
                                <div>
                                    <h4 style="font-size: 1rem; margin: 0; font-weight: 800; color: var(--text-dark); display: flex; align-items: center; gap: 8px;">
                                        <span>⚙️ Funcionalidades Personalizadas a Medida</span>
                                    </h4>
                                    <p style="font-size: 0.8rem; color: var(--text-muted); margin: 2px 0 0 0;">
                                        Escribe cada función o módulo que deseas que desarrollemos en tu software (hasta 10 funciones).
                                    </p>
                                </div>
                                <span id="customFeatureCounterBadge" class="badge badge-primary" style="font-size: 0.78rem;">
                                    1 / 10 agregadas
                                </span>
                            </div>

                            <!-- List of Dynamic Inputs -->
                            <div id="customFeaturesList" style="display: flex; flex-direction: column; gap: 10px; margin-bottom: 1rem;">
                                <div class="custom-feature-row" style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                                    <span class="feature-idx-badge" style="background: var(--primary); color: #ffffff; font-weight: 800; font-size: 0.75rem; padding: 6px 10px; border-radius: 8px;">#1</span>
                                    <input type="text" name="custom_feature_items[]" maxlength="250" placeholder="Ej: Panel para vendedores con cálculo automático de comisiones..." 
                                           style="flex: 1; min-width: 200px; padding: 0.65rem 0.85rem; border: 1px solid var(--border-light); border-radius: 8px; font-size: 0.9rem; outline: none; background: #ffffff;">
                                    <button type="button" class="btn btn-outline btn-sm remove-feature-row-btn" style="padding: 0.5rem 0.75rem; color: #ef4444; border-color: #fecaca; display: none;" title="Eliminar función">✕</button>
                                </div>
                            </div>

                            <!-- Add More Button -->
                            <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
                                <button type="button" id="addCustomFeatureBtn" class="btn btn-outline btn-sm" style="border-style: dashed; border-color: var(--primary); color: var(--primary); font-weight: 700; background: rgba(79, 70, 229, 0.04);">
                                    <span>➕ Añadir otra funcionalidad (+1)</span>
                                </button>
                                <span style="font-size: 0.75rem; color: var(--text-muted);">
                                    🛡️ Sanitización y blindaje de seguridad activo
                                </span>
                            </div>
                        </div>

                        <!-- General Project Requirements / Context Box -->
                        <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: 12px; padding: 1.25rem;">
                            <label style="display: block; font-size: 0.9rem; font-weight: 700; color: var(--text-dark); margin-bottom: 4px;">
                                📝 Contexto general o requerimientos adicionales (Opcional)
                            </label>
                            <textarea name="custom_features_description" rows="2" 
                                      placeholder="Cuéntanos más sobre tu industria, integraciones deseadas o modelo de negocio..." 
                                      style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-light); border-radius: 8px; font-size: 0.9rem; outline: none; font-family: inherit;"></textarea>
                        </div>
                    </div>

                    <!-- Step 3: Contact Details -->
                    <div>
                        <h3 style="font-size: 1.3rem; margin-bottom: 1.25rem; display: flex; align-items: center; gap: 8px;">
                            <span style="color: var(--primary);">3.</span> Tus Datos de Contacto
                        </h3>

                        <div class="grid-form-2col" style="margin-bottom: 1rem;">
                            <div>
                                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 4px;">Nombre y Apellido *</label>
                                <input type="text" name="name" required placeholder="Ej: Álvaro Valenzuela" 
                                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-size: 0.95rem; outline: none;">
                            </div>
                            <div>
                                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 4px;">Correo Electrónico *</label>
                                <input type="email" name="email" required placeholder="tu@empresa.cl" 
                                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-size: 0.95rem; outline: none;">
                            </div>
                        </div>

                        <div class="grid-form-2col" style="margin-bottom: 1rem;">
                            <div>
                                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 4px;">Teléfono / WhatsApp *</label>
                                <input type="tel" name="phone" required placeholder="+56 9 8726 1127" 
                                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-size: 0.95rem; outline: none;">
                            </div>
                            <div>
                                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 4px;">Empresa / Marca (Opcional)</label>
                                <input type="text" name="company" placeholder="Nombre de tu empresa" 
                                       style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-size: 0.95rem; outline: none;">
                            </div>
                        </div>

                        <div style="margin-bottom: 1.5rem;">
                            <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 4px;">Detalles u observaciones adicionales</label>
                            <textarea name="project_description" rows="2" placeholder="Plazos deseados, estado actual o comentarios..." 
                                      style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-size: 0.95rem; outline: none; font-family: inherit;"></textarea>
                        </div>

                        <button type="submit" class="btn btn-gold btn-lg" style="width: 100%; font-size: 1.15rem;">
                            <span>🚀 Enviar Cotización y Abrir WhatsApp (+56987261127)</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Right: Selected Scope & Technical Proposal Card -->
            <div style="position: sticky; top: 110px;">
                <div class="quote-estimate-summary">
                    <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Evaluación Técnica</span>
                    <h3>Resumen de Requerimientos</h3>
                    
                    <div style="font-size: 0.88rem; color: #cbd5e1; line-height: 1.5; margin-bottom: 1.25rem;">
                        Elaboramos una propuesta técnica formal y cronograma de entrega según la arquitectura y módulos que selecciones.
                    </div>

                    <div class="estimate-total-box" style="border: 1px solid rgba(255, 255, 255, 0.15); background: rgba(15, 23, 42, 0.6); padding: 1.25rem; border-radius: 12px; margin: 1.25rem 0;">
                        <div style="font-size: 0.75rem; text-transform: uppercase; color: #94a3b8; font-weight: 700; margin-bottom: 4px;">Proyecto Principal:</div>
                        <div id="summarySelectedService" style="font-size: 1.05rem; font-weight: 800; color: #ffffff; margin-bottom: 0.85rem; line-height: 1.3;">🌐 Sitio Web Corporativo</div>
                        
                        <div style="font-size: 0.75rem; text-transform: uppercase; color: #94a3b8; font-weight: 700; margin-bottom: 4px;">Módulos Base:</div>
                        <div id="summaryFeaturesCount" style="font-size: 0.9rem; font-weight: 700; color: #38bdf8; margin-bottom: 0.5rem;">0 módulos seleccionados</div>

                        <div style="font-size: 0.75rem; text-transform: uppercase; color: #94a3b8; font-weight: 700; margin-bottom: 4px;">Funcionalidades Personalizadas:</div>
                        <div id="summaryCustomFeaturesCount" style="font-size: 0.85rem; color: #e2e8f0; font-weight: 600;">1 función personalizada agregada</div>

                        <div style="margin-top: 1rem; padding-top: 0.75rem; border-top: 1px solid rgba(255, 255, 255, 0.1); display: flex; align-items: center; justify-content: space-between;">
                            <span style="font-size: 0.75rem; text-transform: uppercase; color: #cbd5e1; font-weight: 700;">Presupuesto:</span>
                            <span class="badge badge-gold" style="font-size: 0.78rem; font-weight: 800;">A Medida / Sin Costo</span>
                        </div>
                    </div>

                    <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1.25rem; font-size: 0.85rem; color: #cbd5e1; display: flex; flex-direction: column; gap: 8px;">
                        <div>✓ Trato directo con Álvaro Valenzuela Valdés</div>
                        <div>✓ Propuesta técnica detallada y formal</div>
                        <div>✓ Facturación electrónica SII para empresas</div>
                        <div>✓ Sesión de evaluación técnica inicial sin costo</div>
                    </div>
                </div>

                <!-- Direct Contact info -->
                <div class="card" style="margin-top: 1.5rem; padding: 1.5rem;">
                    <h4 style="font-size: 1.1rem; margin-bottom: 1rem;">Canales Directos</h4>
                    <div style="display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.9rem;">
                        <a href="https://api.whatsapp.com/send?phone=56987261127" target="_blank" rel="noopener noreferrer" style="color: #25d366; font-weight: 700; display: flex; align-items: center; gap: 8px;">
                            <span>📱 WhatsApp: +56 9 8726 1127</span>
                        </a>
                        <a href="mailto:alvaro@rew.cl" style="color: var(--primary); font-weight: 700; display: flex; align-items: center; gap: 8px;">
                            <span>✉️ Correo: alvaro@rew.cl</span>
                        </a>
                        <a href="https://www.linkedin.com/in/%C3%A1lvaro-valenzuela-vald%C3%A9s-584065281/" target="_blank" rel="noopener noreferrer" style="color: #0a66c2; font-weight: 700; display: flex; align-items: center; gap: 8px;">
                            <span>💼 LinkedIn: Álvaro Valenzuela</span>
                        </a>
                        <div style="color: var(--text-muted); font-size: 0.85rem; margin-top: 4px;">
                            📍 Santiago, Región Metropolitana, Chile
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
