@extends('layouts.app')

@section('title', 'Contacto & Cotizador Interactivo | REW Chile')
@section('meta_description', 'Cotiza tu proyecto de desarrollo web, software a medida o chatbot de IA en tiempo real. Envío directo a WhatsApp (+56987261127) y correo oficial.')

@section('og_title', 'Cotizador Interactivo & Contacto Directo | REW Chile')
@section('og_description', 'Calcula el presupuesto estimado para tu plataforma web o software a medida y conversa directamente con Álvaro Valenzuela Valdés.')
@section('og_image', asset('images/logo.webp'))

@section('content')
<section class="section" style="background: linear-gradient(180deg, #ffffff 0%, var(--bg-main) 100%);">
    <div class="container">
        <!-- Header -->
        <div style="text-align: center; max-width: 800px; margin: 0 auto 3.5rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Cotizador Inteligente & Asesoría</span>
            <h1 style="font-size: 3rem; margin-bottom: 1rem;">Calcula tu Presupuesto & Conversemos</h1>
            <p style="font-size: 1.15rem; color: var(--text-body);">
                Selecciona las características de tu proyecto para obtener una estimación en tiempo real y enviarla directamente al WhatsApp oficial o correo de <strong>Álvaro Valenzuela Valdés</strong>.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: 1.25fr 0.75fr; gap: 3.5rem; align-items: flex-start; margin-bottom: 4rem;">
            <!-- Left: Interactive Form -->
            <div class="card quote-calculator-card">
                <form id="quoteCalculatorForm" action="{{ route('cotizar.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="estimated_budget_usd" value="850">
                    <input type="hidden" name="estimated_budget_clp" value="790000">

                    <!-- Step 1: Service Type -->
                    <div style="margin-bottom: 2.5rem;">
                        <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 8px;">
                            <span style="color: var(--primary);">1.</span> Selecciona el Tipo de Proyecto
                        </h3>
                        <p style="font-size: 0.88rem; color: var(--text-muted); margin-bottom: 1.25rem;">Elige la base principal de lo que deseas construir.</p>

                        <div class="option-select-grid">
                            <label class="option-card selected">
                                <input type="radio" name="service_type" value="Desarrollo Web Corporativo" data-base-usd="850" data-base-clp="790000" checked>
                                <span class="option-title">🌐 Sitio Web Corporativo</span>
                                <span class="option-price-tag price-tag-dynamic" data-usd="850" data-clp="790000">Desde $850 USD</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" name="service_type" value="Tienda E-Commerce WooCommerce" data-base-usd="1200" data-base-clp="1100000">
                                <span class="option-title">🛒 Tienda E-Commerce</span>
                                <span class="option-price-tag price-tag-dynamic" data-usd="1200" data-clp="1100000">Desde $1.200 USD</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" name="service_type" value="Software a Medida / SaaS Laravel" data-base-usd="2400" data-base-clp="2200000">
                                <span class="option-title">💻 Software SaaS / Laravel</span>
                                <span class="option-price-tag price-tag-dynamic" data-usd="2400" data-clp="2200000">Desde $2.400 USD</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" name="service_type" value="Chatbot IA con RAG Empresarial" data-base-usd="950" data-base-clp="890000">
                                <span class="option-title">🤖 Chatbot IA con RAG</span>
                                <span class="option-price-tag price-tag-dynamic" data-usd="950" data-clp="890000">Desde $950 USD</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" name="service_type" value="Estrategia SEO & Posicionamiento" data-base-usd="650" data-base-clp="590000">
                                <span class="option-title">📈 Optimización SEO & GEO</span>
                                <span class="option-price-tag price-tag-dynamic" data-usd="650" data-clp="590000">Desde $650 USD</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" name="service_type" value="Mantenimiento & Soporte WordPress" data-base-usd="250" data-base-clp="220000">
                                <span class="option-title">🛡️ Mantenimiento Web</span>
                                <span class="option-price-tag price-tag-dynamic" data-usd="250" data-clp="220000">Desde $250 USD</span>
                            </label>
                        </div>
                    </div>

                    <!-- Step 2: Features Add-ons -->
                    <div style="margin-bottom: 2.5rem;">
                        <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 8px;">
                            <span style="color: var(--primary);">2.</span> Módulos y Funcionalidades Adicionales
                        </h3>
                        <p style="font-size: 0.88rem; color: var(--text-muted); margin-bottom: 1.25rem;">Selecciona los complementos necesarios.</p>

                        <div class="option-select-grid">
                            <label class="option-card">
                                <input type="checkbox" name="features[]" value="Pasarela Webpay Plus / MercadoPago" data-price-usd="200" data-price-clp="180000">
                                <span class="option-title">💳 Pasarelas de Pago</span>
                                <span class="option-price-tag price-tag-dynamic" data-usd="200" data-clp="180000">+$200 USD</span>
                            </label>

                            <label class="option-card">
                                <input type="checkbox" name="features[]" value="Multi-Moneda CLP/USD y Traductor" data-price-usd="150" data-price-clp="140000">
                                <span class="option-title">🌐 Multi-Moneda / Idiomas</span>
                                <span class="option-price-tag price-tag-dynamic" data-usd="150" data-clp="140000">+$150 USD</span>
                            </label>

                            <label class="option-card">
                                <input type="checkbox" name="features[]" value="Integración CRM y WhatsApp API" data-price-usd="250" data-price-clp="230000">
                                <span class="option-title">📱 CRM & WhatsApp API</span>
                                <span class="option-price-tag price-tag-dynamic" data-usd="250" data-clp="230000">+$250 USD</span>
                            </label>

                            <label class="option-card">
                                <input type="checkbox" name="features[]" value="Soporte Prioritario & Capacitación 1 a 1" data-price-usd="180" data-price-clp="160000">
                                <span class="option-title">👨‍🏫 Capacitación 1 a 1</span>
                                <span class="option-price-tag price-tag-dynamic" data-usd="180" data-clp="160000">+$180 USD</span>
                            </label>
                        </div>
                    </div>

                    <!-- Step 3: Contact Details -->
                    <div>
                        <h3 style="font-size: 1.3rem; margin-bottom: 1.25rem; display: flex; align-items: center; gap: 8px;">
                            <span style="color: var(--primary);">3.</span> Tus Datos de Contacto
                        </h3>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
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

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
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
                            <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 4px;">Describe brevemente tu idea u objetivos</label>
                            <textarea name="project_description" rows="3" placeholder="Cuéntanos sobre los plazos deseados, referencias o funcionalidades especiales..." 
                                      style="width: 100%; padding: 0.75rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-size: 0.95rem; outline: none; font-family: inherit;"></textarea>
                        </div>

                        <button type="submit" class="btn btn-gold btn-lg" style="width: 100%; font-size: 1.15rem;">
                            <span>🚀 Enviar Cotización y Abrir WhatsApp (+56987261127)</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Right: Real-time Budget Estimation Card -->
            <div style="position: sticky; top: 110px;">
                <div class="quote-estimate-summary">
                    <h3>Resumen del Presupuesto</h3>
                    
                    <div style="font-size: 0.9rem; color: #cbd5e1; line-height: 1.5; margin-bottom: 1rem;">
                        Esta es una estimación referencial basada en tus selecciones técnicas.
                    </div>

                    <div class="estimate-total-box">
                        <div style="font-size: 0.8rem; text-transform: uppercase; color: #cbd5e1; font-weight: 700;">Inversión Estimada:</div>
                        <div class="estimate-total-amount" id="calcEstimatedCost">$850 USD</div>
                    </div>

                    <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1.25rem; font-size: 0.85rem; color: #cbd5e1; display: flex; flex-direction: column; gap: 8px;">
                        <div>✓ Envío instantáneo a WhatsApp y Correo</div>
                        <div>✓ Facturación electrónica disponible</div>
                        <div>✓ Reunión técnica sin compromiso</div>
                    </div>
                </div>

                <!-- Direct Contact info -->
                <div class="card" style="margin-top: 1.5rem; padding: 1.5rem;">
                    <h4 style="font-size: 1.1rem; margin-bottom: 1rem;">Canales Directos</h4>
                    <div style="display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.9rem;">
                        <a href="https://api.whatsapp.com/send?phone=56987261127" target="_blank" rel="noopener" style="color: #25d366; font-weight: 700;">
                            💬 WhatsApp: +56 9 8726 1127
                        </a>
                        <a href="mailto:alvaro@rew.cl" style="color: var(--text-dark); font-weight: 600;">
                            ✉️ Email: alvaro@rew.cl
                        </a>
                        <div style="color: var(--text-muted);">
                            📍 Santiago de Chile
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
