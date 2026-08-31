@extends('layouts.app')

@section('title', '🤖 ¿Por qué perder ventas mientras duermes? | Rich-E: Chatbot IA para WordPress & WooCommerce')
@section('meta_description', '🔥 Conecta la Inteligencia Artificial a tu catálogo sin alucinaciones. Respuestas en milisegundos, recomendaciones y cierre de ventas automático 24/7 con Rich-E.')

@section('og_title', '🤖 ¿Por qué perder ventas mientras duermes? | Rich-E Chatbot IA para WordPress & WooCommerce')
@section('og_description', '🔥 Asistente de IA con arquitectura RAG para WooCommerce: Aprende de tus productos, resuelve dudas técnicas 24/7 y cierra ventas automáticas.')
@section('og_image', asset('images/products/riche_hero_banner.webp'))

@section('schema_json')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "SoftwareApplication",
    "name": "Rich-E WordPress AI Chatbot Assistant",
    "operatingSystem": "WordPress 5.6+, WooCommerce 6.0+",
    "applicationCategory": "BusinessApplication",
    "image": "{{ asset('images/products/riche_hero_banner.webp') }}",
    "offers": {
        "@@type": "Offer",
        "price": "43.00",
        "priceCurrency": "USD",
        "availability": "https://schema.org/InStock",
        "seller": {
            "@@type": "Organization",
            "name": "REW",
            "url": "https://rew.cl"
        }
    },
    "aggregateRating": {
        "@@type": "AggregateRating",
        "ratingValue": "4.9",
        "reviewCount": "48"
    },
    "author": {
        "@@type": "Person",
        "name": "Álvaro Valenzuela Valdés",
        "jobTitle": "Ingeniero de Software y Creador de Rich-E"
    }
}
</script>
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "FAQPage",
    "mainEntity": [
        {
            "@@type": "Question",
            "name": "¿Cómo evita Rich-E las alucinaciones en precios y stock de WooCommerce?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Rich-E utiliza arquitectura RAG (Retrieval-Augmented Generation) que consulta la base de datos de productos en tiempo real mediante embeddings vectoriales, garantizando que el bot nunca invente precios, descuentos o productos que no existen en tu inventario."
            }
        },
        {
            "@@type": "Question",
            "name": "¿Necesito pagar mensualidades caras a plataformas externas?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "No. Rich-E es un plugin de WordPress de pago único o licencia anual. Puedes conectarlo con la API de Groq (completamente gratuita y ultrarrápida a 300 tokens/s) o con OpenAI pagando solo fracciones de centavos de dólar por uso real."
            }
        },
        {
            "@@type": "Question",
            "name": "¿Es compatible con temas de WordPress, Elementor y Divi?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Sí, Rich-E es 100% compatible con cualquier tema de WordPress, builders como Elementor, Divi, Bricks, Gutenberg y pasarelas de pago como Webpay Plus, Mercado Pago y Stripe."
            }
        }
    ]
}
</script>
@endsection

@section('content')
<!-- 1. HERO SECTION -->
<section class="section" style="background: linear-gradient(180deg, #090d16 0%, #0f172a 50%, #1e1b4b 100%); color: #ffffff; padding-top: clamp(3rem, 6vw, 5rem); padding-bottom: clamp(3rem, 6vw, 6rem); overflow: hidden; position: relative;">
    <!-- Ambient Glow Backgrounds -->
    <div style="position: absolute; top: -10%; left: 50%; transform: translateX(-50%); width: 700px; height: 500px; background: radial-gradient(circle, rgba(99, 102, 241, 0.25) 0%, rgba(0, 0, 0, 0) 70%); pointer-events: none; z-index: 0;"></div>
    <div style="position: absolute; bottom: 0; right: 0; width: 500px; height: 400px; background: radial-gradient(circle, rgba(245, 158, 11, 0.15) 0%, rgba(0, 0, 0, 0) 70%); pointer-events: none; z-index: 0;"></div>

    <div class="container" style="position: relative; z-index: 1;">
        <div style="display: grid; grid-template-columns: 1.15fr 1fr; gap: clamp(2rem, 4vw, 4rem); align-items: center;">
            <!-- Left Hero Content -->
            <div>
                <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(99, 102, 241, 0.15); border: 1px solid rgba(129, 140, 248, 0.4); padding: 6px 16px; border-radius: 999px; font-size: 0.85rem; font-weight: 700; color: #a5b4fc; margin-bottom: 1.5rem; backdrop-filter: blur(8px);">
                    <span>🤖</span> Agente de Inteligencia Artificial RAG para WordPress & WooCommerce
                </div>

                <h1 style="font-size: clamp(2.2rem, 4.5vw, 3.4rem); font-weight: 900; line-height: 1.15; margin-bottom: 1.25rem; letter-spacing: -0.02em; color: #ffffff;">
                    El Asistente de IA que <span style="background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 50%, #f97316 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Atiende, Asesora y Vende</span> en tu Tienda 24/7
                </h1>

                <p style="font-size: clamp(1rem, 2vw, 1.15rem); color: #cbd5e1; line-height: 1.65; margin-bottom: 2rem;">
                    Entrena a <strong>Rich-E</strong> con tu sitio web, catálogo de WooCommerce, entradas de blog y documentos PDF. Respuestas precisas en menos de <strong>300ms</strong> con arquitectura RAG sin alucinaciones.
                </p>

                <!-- Key Metrics Badges -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 12px; margin-bottom: 2.25rem;">
                    <div style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); padding: 12px; border-radius: 12px; text-align: center;">
                        <div style="font-size: 1.4rem; font-weight: 900; color: #34d399;">< 300ms</div>
                        <div style="font-size: 0.75rem; color: #94a3b8;">Latencia Ultra Rápida</div>
                    </div>
                    <div style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); padding: 12px; border-radius: 12px; text-align: center;">
                        <div style="font-size: 1.4rem; font-weight: 900; color: #fbbf24;">0%</div>
                        <div style="font-size: 0.75rem; color: #94a3b8;">Cero Alucinaciones</div>
                    </div>
                    <div style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); padding: 12px; border-radius: 12px; text-align: center;">
                        <div style="font-size: 1.4rem; font-weight: 900; color: #60a5fa;">+340%</div>
                        <div style="font-size: 0.75rem; color: #94a3b8;">Conversión en Ventas</div>
                    </div>
                    <div style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); padding: 12px; border-radius: 12px; text-align: center;">
                        <div style="font-size: 1.4rem; font-weight: 900; color: #c084fc;">24/7</div>
                        <div style="font-size: 0.75rem; color: #94a3b8;">Atención Sin Pausa</div>
                    </div>
                </div>

                <!-- CTAs -->
                <div style="display: flex; gap: 12px; flex-wrap: wrap; align-items: center;">
                    <a href="#planes" class="btn btn-gold btn-lg" style="font-weight: 800; padding: 0.9rem 1.75rem; font-size: 1.05rem; box-shadow: 0 10px 25px -5px rgba(245, 158, 11, 0.4);">
                        <span>🛒 Adquirir Licencia Oficial</span>
                    </a>
                    <a href="#simulador" class="btn btn-outline" style="color: #ffffff; border-color: rgba(255, 255, 255, 0.3); padding: 0.9rem 1.5rem; font-size: 1.05rem; background: rgba(255, 255, 255, 0.05);">
                        <span>⚡ Probar Simulador en Vivo</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ urlencode('¡Hola Álvaro! Quiero cotizar la implementación de Rich-E Chatbot IA para mi sitio web.') }}" 
                       target="_blank" rel="noopener" class="btn btn-whatsapp" style="padding: 0.9rem 1.4rem; font-size: 1.05rem;">
                        <span>💬 WhatsApp Directo</span>
                    </a>
                </div>
            </div>

            <!-- Right Hero Artwork -->
            <div style="position: relative; text-align: center;">
                <div style="position: relative; display: inline-block; width: 100%; max-width: 540px;">
                    <div style="border-radius: 24px; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7), 0 0 40px rgba(99, 102, 241, 0.3); border: 1px solid rgba(255, 255, 255, 0.15); background: #0f172a;">
                        <img src="{{ asset('images/products/riche_hero_banner.webp') }}" 
                             alt="Rich-E WordPress AI Chatbot Agent" 
                             style="width: 100%; height: auto; display: block; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. SIMULADOR INTERACTIVO RAG EN VIVO -->
<section id="simulador" class="section" style="background: #0f172a; color: #ffffff; padding: 4.5rem 0; border-top: 1px solid rgba(255, 255, 255, 0.08); border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
    <div class="container" style="max-width: 1000px;">
        <div style="text-align: center; margin-bottom: 3rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Simulador en Vivo</span>
            <h2 style="font-size: clamp(1.8rem, 3.5vw, 2.5rem); margin-bottom: 1rem; color: #ffffff;">Experimenta el Poder de la Arquitectura RAG</h2>
            <p style="color: #94a3b8; font-size: 1.05rem; max-width: 650px; margin: 0 auto;">
                Haz clic en cualquiera de las consultas típicas para ver cómo <strong>Rich-E</strong> busca en el catálogo, extrae el stock real y recomienda productos listos para comprar.
            </p>
        </div>

        <div class="card" style="background: #1e293b; border: 1px solid #334155; border-radius: 20px; padding: clamp(1.25rem, 3vw, 2rem); box-shadow: 0 20px 40px rgba(0,0,0,0.4);">
            <!-- Suggested Questions Pills -->
            <div style="margin-bottom: 1.5rem;">
                <div style="font-size: 0.82rem; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.75rem;">
                    💡 Preguntas Rápidas de Prueba:
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 8px;" id="simulatorQuestions">
                    <button type="button" class="sim-btn" onclick="runSimPrompt(0)" style="background: rgba(99, 102, 241, 0.15); border: 1px solid #4f46e5; color: #c7d2fe; padding: 8px 14px; border-radius: 999px; font-size: 0.85rem; cursor: pointer; text-align: left;">
                        👟 "¿Tienen zapatillas de running talla 42 en stock?"
                    </button>
                    <button type="button" class="sim-btn" onclick="runSimPrompt(1)" style="background: rgba(245, 158, 11, 0.15); border: 1px solid #d97706; color: #fde68a; padding: 8px 14px; border-radius: 999px; font-size: 0.85rem; cursor: pointer; text-align: left;">
                        📦 "¿Cuánto demora el despacho a Concepción?"
                    </button>
                    <button type="button" class="sim-btn" onclick="runSimPrompt(2)" style="background: rgba(16, 185, 129, 0.15); border: 1px solid #059669; color: #a7f3d0; padding: 8px 14px; border-radius: 999px; font-size: 0.85rem; cursor: pointer; text-align: left;">
                        ⚡ "¿Cómo se conecta con la API de Groq gratis?"
                    </button>
                    <button type="button" class="sim-btn" onclick="runSimPrompt(3)" style="background: rgba(168, 85, 247, 0.15); border: 1px solid #9333ea; color: #e9d5ff; padding: 8px 14px; border-radius: 999px; font-size: 0.85rem; cursor: pointer; text-align: left;">
                        💳 "¿Aceptan Webpay Plus y pago en dólares?"
                    </button>
                </div>
            </div>

            <!-- Simulated Chat Window -->
            <div style="background: #090d16; border-radius: 16px; border: 1px solid #1e293b; overflow: hidden; display: flex; flex-direction: column; min-height: 380px;">
                <!-- Header -->
                <div style="background: #0f172a; padding: 12px 18px; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #1e293b;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <img src="{{ asset('images/riche-avatar.png') }}" alt="Rich-E" style="width: 34px; height: 34px; border-radius: 50%; background: #fbbf24; padding: 2px;">
                        <div>
                            <div style="font-size: 0.95rem; font-weight: 800; color: #ffffff;">Rich-E Assistant</div>
                            <div style="font-size: 0.72rem; color: #34d399; display: flex; align-items: center; gap: 4px;">
                                <span style="width: 6px; height: 6px; background: #34d399; border-radius: 50%; display: inline-block;"></span>
                                Conectado a Catálogo WooCommerce (Groq LLaMA 3.3 70B)
                            </div>
                        </div>
                    </div>
                    <span style="font-size: 0.75rem; color: #64748b;">Simulador RAG</span>
                </div>

                <!-- Messages Container -->
                <div id="simChatBody" style="padding: 1.25rem; flex-grow: 1; display: flex; flex-direction: column; gap: 1rem; overflow-y: auto;">
                    <div style="display: flex; gap: 10px; align-items: flex-start;">
                        <img src="{{ asset('images/riche-avatar.png') }}" alt="Rich-E" style="width: 30px; height: 30px; border-radius: 50%; background: #fbbf24; padding: 2px; flex-shrink: 0;">
                        <div style="background: #1e293b; padding: 12px 16px; border-radius: 14px 14px 14px 2px; font-size: 0.92rem; line-height: 1.5; color: #e2e8f0; max-width: 85%;">
                            ¡Hola! 👋 Soy <strong>Rich-E</strong>, tu asistente de IA para WordPress. Estoy conectado a la base de datos de productos en tiempo real. Selecciona una pregunta arriba para probar mi velocidad y precisión.
                        </div>
                    </div>
                </div>

                <!-- Footer Bar -->
                <div style="background: #0f172a; padding: 12px; border-top: 1px solid #1e293b; display: flex; gap: 8px;">
                    <input type="text" id="simCustomInput" placeholder="Escribe tu consulta de prueba..." 
                           style="flex-grow: 1; background: #1e293b; border: 1px solid #334155; color: #ffffff; padding: 10px 16px; border-radius: 8px; font-size: 0.9rem; outline: none;"
                           onkeypress="if(event.key==='Enter') runSimCustom();">
                    <button type="button" onclick="runSimCustom()" class="btn btn-primary btn-sm" style="padding: 0 18px;">
                        <span>Enviar</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. COMPARATIVA: TRADICIONAL VS CHATGPT VS RICH-E RAG -->
<section class="section" style="background: #ffffff; padding: 5rem 0;">
    <div class="container">
        <div style="text-align: center; max-width: 750px; margin: 0 auto 3.5rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Ventaja Competitiva</span>
            <h2 style="font-size: clamp(2rem, 4vw, 2.75rem); color: var(--text-dark); margin-bottom: 1rem;">
                ¿Por Qué los Chatbots Antiguos Ya No Funcionan?
            </h2>
            <p style="color: var(--text-body); font-size: 1.1rem;">
                Los clientes no quieren navegar menús rígidos ni recibir respuestas inventadas. Quieren respuestas instantáneas y enlaces exactos a sus productos.
            </p>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; min-width: 650px; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.06); border: 1px solid var(--border-light);">
                <thead>
                    <tr style="background: #0f172a; color: #ffffff; text-align: left;">
                        <th style="padding: 18px 20px; font-size: 1rem;">Característica</th>
                        <th style="padding: 18px 20px; font-size: 1rem; color: #94a3b8;">Chatbots de Reglas (ManyChat / Tidio)</th>
                        <th style="padding: 18px 20px; font-size: 1rem; color: #f87171;">ChatGPT Estándar (Sin RAG)</th>
                        <th style="padding: 18px 20px; font-size: 1.1rem; color: #fbbf24; background: #1e1b4b;">⚡ Rich-E AI Agent</th>
                    </tr>
                </thead>
                <tbody style="font-size: 0.95rem;">
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 16px 20px; font-weight: 700;">Consulta de Stock y Precios en Tiempo Real</td>
                        <td style="padding: 16px 20px; color: #dc2626;">❌ Rígido y manual</td>
                        <td style="padding: 16px 20px; color: #dc2626;">❌ Alucina datos antiguos</td>
                        <td style="padding: 16px 20px; color: #059669; font-weight: 700; background: #f5f3ff;">✅ Consulta directa a WooCommerce</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f1f5f9; background: #f8fafc;">
                        <td style="padding: 16px 20px; font-weight: 700;">Latencia y Velocidad de Respuesta</td>
                        <td style="padding: 16px 20px;">Instantáneo pero limitado</td>
                        <td style="padding: 16px 20px;">Lento (2 - 5 segundos)</td>
                        <td style="padding: 16px 20px; color: #059669; font-weight: 700; background: #f5f3ff;">✅ Ultrarrápido (< 300ms con Groq)</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 16px 20px; font-weight: 700;">Añadir al Carrito y Checkout Directo</td>
                        <td style="padding: 16px 20px; color: #dc2626;">❌ No disponible</td>
                        <td style="padding: 16px 20px; color: #dc2626;">❌ No disponible</td>
                        <td style="padding: 16px 20px; color: #059669; font-weight: 700; background: #f5f3ff;">✅ Integrado con 1 Clic</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f1f5f9; background: #f8fafc;">
                        <td style="padding: 16px 20px; font-weight: 700;">Costos Mensuales Recurrentes</td>
                        <td style="padding: 16px 20px; color: #dc2626;">Suscripción cara ($30-$100/mes)</td>
                        <td style="padding: 16px 20px;">Suscripción API externa</td>
                        <td style="padding: 16px 20px; color: #059669; font-weight: 700; background: #f5f3ff;">✅ Licencia Anual o Vitalicia (Cero mensualidad)</td>
                    </tr>
                    <tr>
                        <td style="padding: 16px 20px; font-weight: 700;">Privacidad y Soberanía de Datos</td>
                        <td style="padding: 16px 20px;">En servidores de terceros</td>
                        <td style="padding: 16px 20px;">En servidores de OpenAI</td>
                        <td style="padding: 16px 20px; color: #059669; font-weight: 700; background: #f5f3ff;">✅ Base de datos en tu propio hosting</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- 4. CARACTERÍSTICAS PRINCIPALES -->
<section class="section" style="background: var(--bg-main); padding: 5rem 0;">
    <div class="container">
        <div style="text-align: center; max-width: 700px; margin: 0 auto 3.5rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Capacidades de Vanguardia</span>
            <h2 style="font-size: clamp(2rem, 4vw, 2.75rem); color: var(--text-dark); margin-bottom: 1rem;">
                Todo lo que Rich-E Hace por tu Negocio
            </h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem;">
            <!-- Feature 1 -->
            <div class="card" style="padding: 2rem; background: #ffffff; border-radius: 16px;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">🛍️</div>
                <h3 style="font-size: 1.3rem; margin-bottom: 0.75rem; color: var(--text-dark);">Sincronización WooCommerce en Vivo</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6;">
                    Indexa productos, precios, categorías, atributos y stock disponible. Rich-E sugiere variantes exactas y genera enlaces de compra instantáneos.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="card" style="padding: 2rem; background: #ffffff; border-radius: 16px;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">📚</div>
                <h3 style="font-size: 1.3rem; margin-bottom: 0.75rem; color: var(--text-dark);">Indexación de Blog, Páginas y PDFs</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6;">
                    Convierte tus manuales técnicos, preguntas frecuentes y artículos de blog en memoria vectorial para responder dudas complejas al instante.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="card" style="padding: 2rem; background: #ffffff; border-radius: 16px;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">⚡</div>
                <h3 style="font-size: 1.3rem; margin-bottom: 0.75rem; color: var(--text-dark);">Multi-LLM Ultra Rápido (Groq & OpenAI)</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6;">
                    Elige entre Groq (LLaMA 3.3 a 300 tokens/s gratis), OpenAI GPT-4o, Claude 3.5 o DeepSeek V3 según tus preferencias de costo y velocidad.
                </p>
            </div>

            <!-- Feature 4 -->
            <div class="card" style="padding: 2rem; background: #ffffff; border-radius: 16px;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">🎨</div>
                <h3 style="font-size: 1.3rem; margin-bottom: 0.75rem; color: var(--text-dark);">Personalización Visual y Tono de Voz</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6;">
                    Ajusta los colores corporativos, logotipo, saludo de bienvenida y define directrices estrictas para que el bot hable exactamente como tu marca.
                </p>
            </div>

            <!-- Feature 5 -->
            <div class="card" style="padding: 2rem; background: #ffffff; border-radius: 16px;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">📱</div>
                <h3 style="font-size: 1.3rem; margin-bottom: 0.75rem; color: var(--text-dark);">Derivación Inteligente a WhatsApp</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6;">
                    Cuando un cliente solicita atención personalizada o una cotización compleja, Rich-E genera un enlace directo a WhatsApp con el resumen de la charla.
                </p>
            </div>

            <!-- Feature 6 -->
            <div class="card" style="padding: 2rem; background: #ffffff; border-radius: 16px;">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">🛡️</div>
                <h3 style="font-size: 1.3rem; margin-bottom: 0.75rem; color: var(--text-dark);">Soporte y Garantía Oficial REW</h3>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6;">
                    Desarrollado y respaldado directamente por Álvaro Valenzuela e ingenieros chilenos de REW. Actualizaciones continuas y soporte garantizado.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 5. TABLA DE PLANES Y PRECIOS -->
<section id="planes" class="section" style="background: #ffffff; padding: 5rem 0;">
    <div class="container">
        <div style="text-align: center; max-width: 750px; margin: 0 auto 3.5rem;">
            <span class="badge badge-gold" style="margin-bottom: 0.75rem;">Licenciamiento Transparente</span>
            <h2 style="font-size: clamp(2rem, 4vw, 2.75rem); color: var(--text-dark); margin-bottom: 1rem;">
                Elige el Plan Ideal para tu Tienda
            </h2>
            <p style="color: var(--text-body); font-size: 1.1rem;">
                Sin costos ocultos ni mensualidades excesivas. Compra tu licencia oficial y actívala en minutos.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; align-items: stretch;">
            <!-- Plan 1: Core Anual -->
            <div class="card product-card" style="padding: 2.25rem; display: flex; flex-direction: column; justify-content: space-between; border-radius: 20px;">
                <div>
                    <span class="badge badge-primary" style="margin-bottom: 1rem;">LICENCIA ANUAL</span>
                    <h3 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 0.5rem;">Rich-E Core</h3>
                    <p style="color: var(--text-muted); font-size: 0.88rem; margin-bottom: 1.5rem;">Para sitios web y catálogos que desean atención de IA 24/7.</p>
                    
                    <div style="margin-bottom: 1.5rem;">
                        <span class="price-tag-dynamic" data-usd="43" data-clp="39990" style="font-size: 2.2rem; font-weight: 900; color: var(--primary);">
                            $43 USD
                        </span>
                        <span style="font-size: 0.85rem; color: var(--text-muted);">/ año</span>
                    </div>

                    <ul style="list-style: none; padding: 0; margin: 0 0 2rem 0; display: flex; flex-direction: column; gap: 10px; font-size: 0.9rem; color: var(--text-dark);">
                        <li>✓ 1 Dominio de WordPress activo</li>
                        <li>✓ Motor RAG para catálogos y páginas</li>
                        <li>✓ Conexión con Groq y OpenAI</li>
                        <li>✓ Widget flotante 100% personalizable</li>
                        <li>✓ 1 Año de actualizaciones y parches</li>
                    </ul>
                </div>

                <div>
                    <form action="{{ route('cart.add') }}" method="POST" class="ajax-add-to-cart-form" style="margin-bottom: 0.75rem;">
                        @csrf
                        <input type="hidden" name="product_id" value="2">
                        <button type="submit" class="btn btn-outline" style="width: 100%; font-weight: 800;">
                            <span>Añadir al Carrito</span>
                        </button>
                    </form>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ urlencode('Hola Álvaro, quiero comprar la licencia anual de Rich-E Core ($39.990 CLP).') }}" 
                       target="_blank" rel="noopener" class="btn btn-whatsapp btn-sm" style="width: 100%; text-align: center;">
                        Comprar por WhatsApp
                    </a>
                </div>
            </div>

            <!-- Plan 2: Pack E-Commerce Pro (Destacado) -->
            <div class="card product-card" style="padding: 2.25rem; display: flex; flex-direction: column; justify-content: space-between; border-radius: 20px; border: 2px solid #4f46e5; box-shadow: 0 20px 35px -5px rgba(79, 70, 229, 0.25); position: relative; background: #ffffff;">
                <div style="position: absolute; top: -14px; left: 50%; transform: translateX(-50%);">
                    <span class="badge badge-gold" style="font-size: 0.82rem; padding: 6px 16px; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">🔥 MÁS POPULAR</span>
                </div>

                <div>
                    <span class="badge badge-primary" style="margin-bottom: 1rem; margin-top: 0.5rem;">PACK COMPLETO</span>
                    <h3 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 0.5rem;">Pack E-Commerce Pro</h3>
                    <p style="color: var(--text-muted); font-size: 0.88rem; margin-bottom: 1.5rem;">El combo definitivo para maximizar ventas en WooCommerce.</p>
                    
                    <div style="margin-bottom: 1.5rem;">
                        <span class="price-tag-dynamic" data-usd="87" data-clp="79990" style="font-size: 2.2rem; font-weight: 900; color: #4f46e5;">
                            $87 USD
                        </span>
                        <span style="font-size: 0.85rem; color: var(--text-muted);">/ año</span>
                    </div>

                    <ul style="list-style: none; padding: 0; margin: 0 0 2rem 0; display: flex; flex-direction: column; gap: 10px; font-size: 0.9rem; color: var(--text-dark);">
                        <li>✓ <strong>Plugin Core Rich-E Chatbot</strong></li>
                        <li>✓ <strong>Addon WooCommerce Premium Sync</strong></li>
                        <li>✓ <strong>Addon Indexación Semántica de Blog</strong></li>
                        <li>✓ <strong>Soporte e Instalación Remota 1 a 1</strong></li>
                        <li>✓ Ingeniería de System Prompts optimizada</li>
                    </ul>
                </div>

                <div>
                    <form action="{{ route('cart.add') }}" method="POST" class="ajax-add-to-cart-form" style="margin-bottom: 0.75rem;">
                        @csrf
                        <input type="hidden" name="product_id" value="1">
                        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; font-weight: 800;">
                            <span>🛒 Añadir Pack al Carrito</span>
                        </button>
                    </form>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ urlencode('Hola Álvaro, quiero comprar el Pack E-Commerce Pro de Rich-E ($79.990 CLP).') }}" 
                       target="_blank" rel="noopener" class="btn btn-whatsapp btn-sm" style="width: 100%; text-align: center;">
                        Comprar Pack por WhatsApp
                    </a>
                </div>
            </div>

            <!-- Plan 3: Licencia Vitalicia -->
            <div class="card product-card" style="padding: 2.25rem; display: flex; flex-direction: column; justify-content: space-between; border-radius: 20px;">
                <div>
                    <span class="badge badge-gold" style="margin-bottom: 1rem;">PAGO ÚNICO</span>
                    <h3 style="font-size: 1.4rem; color: var(--text-dark); margin-bottom: 0.5rem;">Licencia Vitalicia (Lifetime)</h3>
                    <p style="color: var(--text-muted); font-size: 0.88rem; margin-bottom: 1.5rem;">Para agencias y desarrolladores que quieren pagar una sola vez.</p>
                    
                    <div style="margin-bottom: 1.5rem;">
                        <span class="price-tag-dynamic" data-usd="850" data-clp="799990" style="font-size: 2.2rem; font-weight: 900; color: #d97706;">
                            $850 USD
                        </span>
                        <span style="font-size: 0.85rem; color: var(--text-muted);">/ único</span>
                    </div>

                    <ul style="list-style: none; padding: 0; margin: 0 0 2rem 0; display: flex; flex-direction: column; gap: 10px; font-size: 0.9rem; color: var(--text-dark);">
                        <li>✓ <strong>Actualizaciones de por vida</strong></li>
                        <li>✓ Sin pagos anuales ni renovaciones</li>
                        <li>✓ Acceso a todos los addons futuros</li>
                        <li>✓ Canal VIP directo con Álvaro Valenzuela</li>
                        <li>✓ Soporte prioritario permanente</li>
                    </ul>
                </div>

                <div>
                    <form action="{{ route('cart.add') }}" method="POST" class="ajax-add-to-cart-form" style="margin-bottom: 0.75rem;">
                        @csrf
                        <input type="hidden" name="product_id" value="3">
                        <button type="submit" class="btn btn-gold" style="width: 100%; font-weight: 800;">
                            <span>Añadir Lifetime al Carrito</span>
                        </button>
                    </form>
                    <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ urlencode('Hola Álvaro, quiero comprar la Licencia Vitalicia de Rich-E ($799.990 CLP).') }}" 
                       target="_blank" rel="noopener" class="btn btn-whatsapp btn-sm" style="width: 100%; text-align: center;">
                        Comprar Lifetime por WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. PREGUNTAS FRECUENTES (FAQ) -->
<section class="section" style="background: var(--bg-alt); padding: 5rem 0;">
    <div class="container" style="max-width: 850px;">
        <div style="text-align: center; margin-bottom: 3.5rem;">
            <span class="badge badge-primary" style="margin-bottom: 0.75rem;">Dudas Frecuentes</span>
            <h2 style="font-size: clamp(2rem, 4vw, 2.6rem); color: var(--text-dark); margin-bottom: 1rem;">
                Preguntas Frecuentes sobre Rich-E
            </h2>
        </div>

        <div style="display: flex; flex-direction: column; gap: 1rem;">
            <div class="card" style="padding: 1.5rem; background: #ffffff; border-radius: 12px;">
                <h4 style="font-size: 1.1rem; color: var(--text-dark); margin-bottom: 0.5rem;">¿Cómo se conecta con la IA y qué costos tiene el consumo?</h4>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    Rich-E se conecta directamente mediante API. Recomendamos <strong>Groq</strong> porque ofrece una capa gratuita sumamente generosa a 300 tokens/s. Si prefieres OpenAI, el consumo con modelos como <code>gpt-4o-mini</code> cuesta apenas unos pocos centavos de dólar por cada mil consultas.
                </p>
            </div>

            <div class="card" style="padding: 1.5rem; background: #ffffff; border-radius: 12px;">
                <h4 style="font-size: 1.1rem; color: var(--text-dark); margin-bottom: 0.5rem;">¿Qué pasa si mi tienda tiene cientos o miles de productos?</h4>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    Rich-E cuenta con un indexador en lotes optimizado para catálogos masivos. Guarda los embeddings en caché vectorial de tu base de datos para que las búsquedas no ralenticen tu servidor.
                </p>
            </div>

            <div class="card" style="padding: 1.5rem; background: #ffffff; border-radius: 12px;">
                <h4 style="font-size: 1.1rem; color: var(--text-dark); margin-bottom: 0.5rem;">¿Cómo recibo el plugin y cómo se activa la licencia?</h4>
                <p style="color: var(--text-body); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    Al completar la compra, recibirás de forma instantánea el archivo <code>.zip</code> descargable y tu clave de licencia alfanumérica por correo electrónico y WhatsApp para activarlo en tu panel de WordPress.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 7. CTA FINAL -->
<section class="section" style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%); color: #ffffff; text-align: center; padding: 5rem 0;">
    <div class="container" style="max-width: 700px;">
        <span class="badge badge-gold" style="margin-bottom: 1rem;">Empieza Hoy Mismo</span>
        <h2 style="font-size: clamp(2rem, 4.5vw, 3rem); font-weight: 900; color: #ffffff; margin-bottom: 1rem;">
            Lleva tu Tienda WordPress al Siguiente Nivel con Inteligencia Artificial
        </h2>
        <p style="font-size: 1.15rem; color: #cbd5e1; line-height: 1.6; margin-bottom: 2.5rem;">
            Atiende a tus prospectos en el momento exacto en que están listos para comprar. Cero esperas, cero alucinaciones.
        </p>
        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
            <a href="#planes" class="btn btn-gold btn-lg" style="font-weight: 800; padding: 1rem 2rem; font-size: 1.1rem;">
                <span>🛒 Adquirir Licencia Oficial</span>
            </a>
            <a href="https://api.whatsapp.com/send?phone=56987261127&text={{ urlencode('Hola Álvaro, quiero que me ayudes a configurar Rich-E en mi tienda online.') }}" 
               target="_blank" rel="noopener" class="btn btn-whatsapp btn-lg" style="font-weight: 800; padding: 1rem 2rem; font-size: 1.1rem;">
                <span>💬 Hablar con Álvaro Valenzuela</span>
            </a>
        </div>
    </div>
</section>

<!-- Simulator Script -->
<script>
const simData = [
    {
        q: '¿Tienen zapatillas de running talla 42 en stock?',
        a: '¡Sí, por supuesto! 🏃‍♂️ Encontramos disponibles las <strong>Zapatillas Pro Ultra Cushion (Talla 42)</strong> por <strong>$49.990 CLP</strong>. Contamos con 4 unidades en stock para despacho hoy mismo.<br><br><div style="background:#1e293b; border:1px solid #334155; padding:10px; border-radius:8px; display:flex; justify-content:space-between; align-items:center; margin-top:8px;"><span>👟 <strong>Pro Ultra Cushion</strong> - $49.990</span><a href="#planes" class="btn btn-gold btn-sm" style="font-size:0.78rem;">Añadir al Carrito</a></div>'
    },
    {
        q: '¿Cuánto demora el despacho a Concepción?',
        a: '📦 Para la <strong>Región del Biobío (Concepción)</strong>, los despachos realizados antes de las 14:00 hrs se entregan en <strong>24 a 48 horas hábiles</strong> a través de Starken o Chilexpress con número de seguimiento en tiempo real.'
    },
    {
        q: '¿Cómo se conecta con la API de Groq gratis?',
        a: '⚡ ¡Es súper fácil! Solo ingresas a <a href="https://console.groq.com" target="_blank" rel="noopener" style="color:#60a5fa; text-decoration:underline;">console.groq.com</a>, creas una clave API gratuita en 10 segundos, la pegas en la configuración de <strong>Rich-E</strong> en WordPress y seleccionas <code>LLaMA 3.3 70B</code>. ¡Tendrás respuestas en menos de 300ms a costo $0!'
    },
    {
        q: '¿Aceptan Webpay Plus y pago en dólares?',
        a: '🇨🇱 🌎 ¡Sí! Aceptamos pagos en <strong>Pesos Chilenos (CLP)</strong> a través de <strong>Transbank Webpay Plus</strong> y tarjetas de débito/crédito nacionales, y pagos internacionales en <strong>USD</strong> mediante <strong>PayPal y Stripe</strong>.'
    }
];

function runSimPrompt(index) {
    const item = simData[index];
    renderSimMessage(item.q, item.a);
}

function runSimCustom() {
    const input = document.getElementById('simCustomInput');
    const val = input.value.trim();
    if (!val) return;
    
    input.value = '';
    const answer = '🔍 Analizando base de conocimiento vectorial... <strong>Rich-E</strong> puede responder con exactitud sobre tu catálogo de WooCommerce, políticas de envío y garantías. <br><br>💡 <em>¡Prueba instalando Rich-E en tu WordPress para conectar tus datos reales!</em>';
    renderSimMessage(val, answer);
}

function renderSimMessage(userQ, botA) {
    const body = document.getElementById('simChatBody');
    
    // User bubble
    const userDiv = document.createElement('div');
    userDiv.style.cssText = 'display:flex; justify-content:flex-end;';
    userDiv.innerHTML = `<div style="background:#4f46e5; color:#ffffff; padding:10px 16px; border-radius:14px 14px 2px 14px; font-size:0.92rem; max-width:80%;">${userQ}</div>`;
    body.appendChild(userDiv);
    
    // Scroll
    body.scrollTop = body.scrollHeight;
    
    // Bot typing simulation
    setTimeout(() => {
        const botDiv = document.createElement('div');
        botDiv.style.cssText = 'display:flex; gap:10px; align-items:flex-start;';
        botDiv.innerHTML = `
            <img src="{{ asset('images/riche-avatar.png') }}" alt="Rich-E" style="width:30px; height:30px; border-radius:50%; background:#fbbf24; padding:2px; flex-shrink:0;">
            <div style="background:#1e293b; padding:12px 16px; border-radius:14px 14px 14px 2px; font-size:0.92rem; line-height:1.5; color:#e2e8f0; max-width:85%;">
                ${botA}
            </div>
        `;
        body.appendChild(botDiv);
        body.scrollTop = body.scrollHeight;
    }, 350);
}
</script>
@endsection
