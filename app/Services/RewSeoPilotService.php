<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RewSeoPilotService
{
    /**
     * Generar contenido inteligente según la acción solicitada.
     */
    public function generate(string $topic, string $action = 'full'): array
    {
        $topic = trim($topic);

        // 1. Intentar generación a través de APIs de IA (Groq / OpenAI / xAI) si hay API key configurada
        $aiResult = $this->callAiApi($topic, $action);
        if ($aiResult !== null) {
            return $aiResult;
        }

        // 2. Motor nativo de respaldo inteligente (Fallback determinista con arquitectura REW)
        return $this->localGenerationEngine($topic, $action);
    }

    /**
     * Llamar a la API externa de IA (Groq por defecto debido a su ultra-baja latencia y gratuidad/rendimiento).
     */
    protected function callAiApi(string $topic, string $action): ?array
    {
        $groqKey = env('GROQ_API_KEY') ?: Setting::get('groq_api_key');
        $openaiKey = env('OPENAI_API_KEY') ?: Setting::get('openai_api_key');

        $systemPrompt = <<<'PROMPT'
Eres "REW SEO AI Pilot", un arquitecto de software senior y especialista en SEO técnico para Google Chile (E-E-A-T), trabajando para la agencia REW (rew.cl) liderada por el Ingeniero Informático Álvaro Valenzuela Valdés.
Tu objetivo es redactar contenido técnico impecable, libre de texto de relleno ("fluff"), con fundamentos de ingeniería, tablas comparativas, llamadas a la acción comerciales y schemas de datos estructurados.
Siempre respondes ÚNICAMENTE en formato JSON válido sin markdown circundante.
PROMPT;

        $userPrompt = match ($action) {
            'faqs' => "Genera exactamente 5 preguntas frecuentes de alto valor para usuarios y Google Schema FAQPage sobre el tema: '{$topic}'.\nDevuelve JSON: {\"faqs\": [{\"question\": \"...\", \"answer\": \"...\"}]}",
            'seo' => "Genera un Título H1 persuasivo, un Meta Title (máx 60 caracteres terminando en ' | REW') y una Meta Description (máx 155 caracteres) con intención de búsqueda comercial en Chile para: '{$topic}'.\nDevuelve JSON: {\"title\": \"...\", \"meta_title\": \"...\", \"meta_description\": \"...\"}",
            'outline' => "Genera un esquema estructurado de encabezados H2 y H3 para un artículo técnico sobre: '{$topic}'.\nDevuelve JSON: {\"outline\": [\"H2: ...\", \"H3: ...\"]}",
            default => "Genera un artículo técnico completo para el blog de REW sobre: '{$topic}'.
Debe incluir:
- title: H1 claro y atractivo
- slug: slug amigable
- category: categoría profesional adecuada (e.g. Integraciones & E-Commerce, Desarrollo Web & CMS, Arquitectura de Software & APIs, SEO & Posicionamiento en Google)
- excerpt: extracto persuasivo de 2-3 líneas
- content: cuerpo HTML completo con párrafos, encabezados <h2> y <h3>, tabla comparativa en formato <table>, y caja de llamada a la acción con enlaces a /servicios/integracion-bsale-woocommerce o /contacto y WhatsApp (+56 9 8726 1127).
- meta_title: máx 60 caracteres terminando en ' | REW'
- meta_description: máx 155 caracteres para Google
- faqs: array de 4 a 5 preguntas y respuestas concretas para Google FAQPage Schema.
Devuelve ÚNICAMENTE el JSON estructurado."
        };

        if ($groqKey) {
            try {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer '.$groqKey,
                    'Content-Type' => 'application/json',
                ])->timeout(25)->post('https://api.groq.com/openai/v1/chat/completions', [
                    'model' => 'llama-3.3-70b-versatile',
                    'messages' => [
                        ['role' => 'system', 'content' => $systemPrompt],
                        ['role' => 'user', 'content' => $userPrompt],
                    ],
                    'response_format' => ['type' => 'json_object'],
                    'temperature' => 0.4,
                ]);

                if ($response->successful()) {
                    $json = $response->json();
                    $content = $json['choices'][0]['message']['content'] ?? null;
                    if ($content) {
                        $parsed = json_decode($content, true);
                        if (is_array($parsed)) {
                            return $parsed;
                        }
                    }
                }
            } catch (\Exception $e) {
                Log::warning('RewSeoPilotService Groq API Error: '.$e->getMessage());
            }
        }

        if ($openaiKey) {
            try {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer '.$openaiKey,
                    'Content-Type' => 'application/json',
                ])->timeout(25)->post('https://api.openai.com/v1/chat/completions', [
                    'model' => 'gpt-4o-mini',
                    'messages' => [
                        ['role' => 'system', 'content' => $systemPrompt],
                        ['role' => 'user', 'content' => $userPrompt],
                    ],
                    'response_format' => ['type' => 'json_object'],
                    'temperature' => 0.4,
                ]);

                if ($response->successful()) {
                    $json = $response->json();
                    $content = $json['choices'][0]['message']['content'] ?? null;
                    if ($content) {
                        $parsed = json_decode($content, true);
                        if (is_array($parsed)) {
                            return $parsed;
                        }
                    }
                }
            } catch (\Exception $e) {
                Log::warning('RewSeoPilotService OpenAI API Error: '.$e->getMessage());
            }
        }

        return null;
    }

    /**
     * Motor local especializado con plantillas de ingeniería para Bsale, WooCommerce, SEO y Software en Chile.
     */
    protected function localGenerationEngine(string $topic, string $action): array
    {
        $isBsale = str_contains(mb_strtolower($topic), 'bsale') || str_contains(mb_strtolower($topic), 'stock');

        if ($action === 'faqs') {
            if ($isBsale) {
                return [
                    'faqs' => [
                        [
                            'question' => '¿Cómo evita la integración entre Bsale y WooCommerce los quiebres de stock?',
                            'answer' => 'La integración establece a Bsale como la "Fuente Única de Verdad" (Single Source of Truth). Cada vez que se registra una venta en la tienda física o en WooCommerce, los webhooks sincronizan el stock en milisegundos, reservando inventario automáticamente.',
                        ],
                        [
                            'question' => '¿Qué documento tributario emite Bsale al comprar en WooCommerce?',
                            'answer' => 'El conector permite emitir Boletas Electrónicas afectas o exentas y Facturas Electrónicas de forma 100% automática y validada ante el Servicio de Impuestos Internos (SII), enviando el PDF y XML al correo del cliente.',
                        ],
                        [
                            'question' => '¿Por qué elegir un plugin de pago único de $350.000 CLP en lugar de un SaaS mensual?',
                            'answer' => 'Los servicios SaaS cobran entre $35.000 y $70.000 CLP mensuales para siempre ($420.000 a $840.000 anuales). El conector de REW requiere un solo pago de $350.000 CLP, es de tu propiedad, se aloja en tu servidor y no tiene límite de productos ni de transacciones.',
                        ],
                        [
                            'question' => '¿Es compatible con WooCommerce HPOS (High-Performance Order Storage)?',
                            'answer' => 'Sí, el software de REW está programado bajo estándares modernos de PHP 8.3 y cuenta con soporte nativo para WooCommerce HPOS y hooks asíncronos.',
                        ],
                        [
                            'question' => '¿Quién realiza la instalación y configuración del conector?',
                            'answer' => 'El equipo de ingeniería de REW liderado por Álvaro Valenzuela Valdés realiza la instalación, mapeo de sucursales, lista de precios y pruebas en staging antes de pasar a producción.',
                        ],
                    ],
                ];
            }

            return [
                'faqs' => [
                    [
                        'question' => "¿Cómo ayuda esta solución a mejorar las ventas online para '{$topic}'?",
                        'answer' => 'Permite optimizar los tiempos de respuesta, garantizar alta disponibilidad y ofrecer una experiencia de usuario fluida sin fricciones.',
                    ],
                    [
                        'question' => '¿Qué tecnologías se utilizan en la implementación?',
                        'answer' => 'Desarrollamos con PHP 8.3, Laravel, APIs RESTful y arquitecturas seguras preparadas para soportar alto tráfico.',
                    ],
                    [
                        'question' => '¿Se incluye soporte técnico y garantía?',
                        'answer' => 'Sí, todos nuestros desarrollos incluyen garantía de funcionamiento y soporte directo con ingenieros de software.',
                    ],
                ],
            ];
        }

        if ($action === 'seo') {
            if ($isBsale) {
                return [
                    'title' => 'Cómo Integrar Bsale con WooCommerce en Chile: Stock, Precios y Boletas SII',
                    'meta_title' => 'Integración Bsale con WooCommerce en Chile | Stock y DTE | REW',
                    'meta_description' => 'Aprende cómo sincronizar Bsale con WooCommerce paso a paso: evita quiebres de inventario, automatiza boletas/facturas SII y elimina pagos mensuales recurrentes.',
                ];
            }

            $cleanTitle = Str::limit($topic, 55);

            return [
                'title' => $topic,
                'meta_title' => "{$cleanTitle} | REW",
                'meta_description' => "Guía especializada de ingeniería sobre {$topic}. Conoce la metodología, mejores prácticas y recomendaciones de REW Chile.",
            ];
        }

        // Artículo completo predeterminado de alta conversión técnica
        $title = $isBsale
            ? 'Cómo Integrar Bsale con WooCommerce en Chile: Sincronización de Stock, Precios y Boletas SII Sin Pagar Mensualidades'
            : "Guía Definitiva: {$topic} para Empresas en Chile";

        $slug = Str::slug($title);
        $category = $isBsale ? 'Integraciones & E-Commerce' : 'Desarrollo Web & CMS';

        $excerpt = $isBsale
            ? '¿Tus vendedores físicos y tu tienda online compiten por el mismo inventario? Conoce cómo implementar una arquitectura Single Source of Truth entre Bsale y WooCommerce para eliminar errores de stock y facturación del SII.'
            : "Análisis técnico profundo sobre {$topic}: arquitectura, consideraciones clave de implementación y cómo optimizar resultados para el mercado chileno.";

        $content = $isBsale ? $this->getBsaleArticleHtml() : $this->getGenericArticleHtml($topic);

        $faqs = [
            [
                'question' => '¿Quién es la Fuente de Verdad (Single Source of Truth) en la integración?',
                'answer' => 'Bsale actúa como la fuente de verdad maestra para stock, precios y documentos tributarios SII, mientras que WooCommerce actúa como el canal de ventas digital que refleja los datos en tiempo real.',
            ],
            [
                'question' => '¿Qué costos asociados tiene la integración con REW?',
                'answer' => 'El plugin de REW tiene un costo único de $350.000 CLP (o $390 USD para clientes internacionales) con licencia de por vida, sin mensualidades ni comisiones por venta.',
            ],
            [
                'question' => '¿Qué ocurre si se agota un producto en una sucursal física?',
                'answer' => 'El webhook de Bsale notifica al conector de WooCommerce en segundos y descuenta el stock disponible para evitar que un comprador online adquiera un producto ya vendido.',
            ],
            [
                'question' => '¿Se emiten facturas además de boletas electrónicas?',
                'answer' => 'Sí, el conector captura el RUT y Razón Social ingresados por el comprador en el checkout y genera la Factura Electrónica en Bsale sincronizada con el SII.',
            ],
        ];

        return [
            'title' => $title,
            'slug' => $slug,
            'category' => $category,
            'excerpt' => $excerpt,
            'content' => $content,
            'meta_title' => 'Integración Bsale con WooCommerce en Chile | Stock y DTE | REW',
            'meta_description' => 'Guía paso a paso para sincronizar Bsale con WooCommerce: stock en tiempo real, emisión de boletas/facturas SII y ahorro de cobros mensuales.',
            'faqs' => $faqs,
        ];
    }

    /**
     * Plantilla maestra de artículo técnico sobre Bsale + WooCommerce.
     */
    protected function getBsaleArticleHtml(): string
    {
        return <<<'HTML'
<p class="lead" style="font-size: 1.15rem; line-height: 1.8; color: var(--text-dark); margin-bottom: 2rem;">
    Uno de los dolores de cabeza más frecuentes en las empresas chilenas que crecen en comercio electrónico es el temido <strong>descalce de inventario</strong>: un cliente compra el último producto disponible en tu tienda online a las 15:30 horas, pero ese mismo artículo ya había sido vendido 10 minutos antes en la caja física de tu sucursal. El resultado: cancelaciones forzadas, reclamos ante el SERNAC y una pésima reputación de marca.
</p>

<div style="background: linear-gradient(135deg, rgba(79, 70, 229, 0.08) 0%, rgba(14, 165, 233, 0.08) 100%); border-left: 4px solid var(--primary); padding: 1.5rem; border-radius: 0 12px 12px 0; margin-bottom: 2.5rem;">
    <strong style="color: var(--text-dark); font-size: 1.05rem;">💡 El Concepto Clave de Ingeniería:</strong>
    <p style="margin: 0.5rem 0 0 0; font-size: 0.95rem; color: #334155; line-height: 1.6;">
        Para resolver este problema de raíz no se requieren "parches temporales" ni planillas Excel: se necesita una arquitectura con <strong>Fuente Única de Verdad (Single Source of Truth)</strong>. En esta guía te explicamos cómo conectar <a href="/servicios/integracion-bsale-woocommerce" style="color: var(--primary); font-weight: 700; text-decoration: underline;">Bsale con WooCommerce</a> de manera profesional y sin pagar mensualidades abusivas a plataformas intermediarias.
    </p>
</div>

<h2>1. ¿Por qué Fallan las Integraciones Tradicionales?</h2>
<p>
    La mayoría de las tiendas WooCommerce en Chile cometen el error de intentar sincronizaciones bidireccionales "totales" mediante conectores genéricos basados en Zapier o Make. Esta aproximación suele fallar por tres motivos técnicos:
</p>
<ul style="line-height: 1.8; margin-bottom: 2rem;">
    <li><strong>Condiciones de Carrera (Race Conditions):</strong> Si WooCommerce y Bsale intentan actualizarse mutuamente al mismo tiempo, los datos de stock pueden sobrescribirse con valores desactualizados.</li>
    <li><strong>Latencia Excesiva:</strong> Los sondeos por temporizador (cron jobs cada 30 o 60 minutos) dejan ventanas temporales de hasta una hora donde los clientes pueden comprar stock inexistente.</li>
    <li><strong>Costos Recurrentes Elevados:</strong> Los conectores SaaS cobran suscripciones de entre $35.000 y $80.000 CLP mensuales más costos por volumen de pedidos, lo que encarece la operación del e-commerce año tras año.</li>
</ul>

<h2>2. Arquitectura de Fuente Única de Verdad (Single Source of Truth)</h2>
<p>
    La ingeniería correcta define con total claridad qué sistema manda sobre cada dato:
</p>

<table style="width: 100%; border-collapse: collapse; margin: 2rem 0; font-size: 0.95rem; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden;">
    <thead>
        <tr style="background: #0f172a; color: #ffffff;">
            <th style="padding: 14px; text-align: left; width: 30%;">Variable del Negocio</th>
            <th style="padding: 14px; text-align: left; width: 35%; background: #4f46e5; color: #ffffff;">Bsale ERP (Fuente Maestra)</th>
            <th style="padding: 14px; text-align: left; width: 35%;">WooCommerce (Canal de Venta)</th>
        </tr>
    </thead>
    <tbody>
        <tr style="border-bottom: 1px solid #e2e8f0; background: #ffffff;">
            <td style="padding: 14px;"><strong>Stock Disponible</strong></td>
            <td style="padding: 14px; font-weight: 700; color: #059669;">Controla todas las bodegas y sucursales</td>
            <td style="padding: 14px; color: #64748b;">Reflejo automático en tiempo real</td>
        </tr>
        <tr style="border-bottom: 1px solid #e2e8f0; background: #f8fafc;">
            <td style="padding: 14px;"><strong>Precios y Promociones</strong></td>
            <td style="padding: 14px; font-weight: 700; color: #059669;">Lista de precios oficial del sistema</td>
            <td style="padding: 14px; color: #64748b;">Actualización de ofertas en el catálogo</td>
        </tr>
        <tr style="border-bottom: 1px solid #e2e8f0; background: #ffffff;">
            <td style="padding: 14px;"><strong>Facturación SII (DTE)</strong></td>
            <td style="padding: 14px; font-weight: 700; color: #059669;">Emisión y timbrado ante el SII</td>
            <td style="padding: 14px; color: #64748b;">Captura RUT y Razón Social en checkout</td>
        </tr>
        <tr style="background: #f8fafc;">
            <td style="padding: 14px;"><strong>Experiencia del Comprador</strong></td>
            <td style="padding: 14px; color: #64748b;">Gestión interna de despacho</td>
            <td style="padding: 14px; font-weight: 700; color: #4f46e5;">Diseño UX/UI, pasarelas Webpay y checkout</td>
        </tr>
    </tbody>
</table>

<h2>3. Paso a Paso: Cómo Funciona la Sincronización</h2>
<ol style="padding-left: 1.5rem; line-height: 1.8; margin-bottom: 2.5rem;">
    <li><strong>Paso 1 - Compra en WooCommerce:</strong> El cliente paga su pedido mediante Webpay Plus, Mercado Pago o transferencia bancaria.</li>
    <li><strong>Paso 2 - Evento Webhook Inmediato:</strong> WooCommerce despacha un webhook cifrado hacia la API de Bsale con el detalle de los SKU adquiridos.</li>
    <li><strong>Paso 3 - Reserva de Inventario en Bsale:</strong> Bsale descuenta inmediatamente las unidades de la bodega configurada para venta web.</li>
    <li><strong>Paso 4 - Generación de DTE:</strong> Según la preferencia del cliente, se genera automáticamente la Boleta Electrónica o la Factura con validación del RUT.</li>
    <li><strong>Paso 5 - Retorno al Comprador:</strong> El cliente recibe en su correo el comprobante oficial del SII y el enlace para seguimiento del despacho.</li>
</ol>

<h2>4. ¿Por Qué un Conector de Pago Único es Superior a un SaaS?</h2>
<p>
    En el mercado chileno existen múltiples empresas que cobran suscripciones mensuales recurrentes por conectar tu tienda a Bsale. Si calculas el costo a 3 años, habrás gastado más de <strong>$1.500.000 a $2.500.000 CLP</strong> solo en mantener activo un conector externo.
</p>
<p>
    En <strong>REW Chile</strong> desarrollamos una solución de ingeniería con un modelo transparente:
</p>
<ul style="line-height: 1.8; margin-bottom: 2rem;">
    <li><strong>Pago Único ($350.000 CLP):</strong> Sin cobros mensuales ocultos, sin comisiones por porcentaje de venta ni límites artificiales de productos.</li>
    <li><strong>Código en tu Servidor:</strong> El plugin se aloja directamente en tu instalación de WordPress, garantizando velocidad y soberanía sobre tus datos comerciales.</li>
    <li><strong>Soporte Técnico Directo:</strong> Asesoría e instalación realizada por ingenieros informáticos expertos en la API de Bsale y WooCommerce.</li>
</ul>

<!-- Banner CTA Comercial -->
<div style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%); color: #ffffff; border-radius: 16px; padding: 2.5rem; margin: 3.5rem 0; text-align: center; border: 1px solid rgba(255,255,255,0.15); box-shadow: 0 20px 35px -10px rgba(15, 23, 42, 0.4);">
    <span style="background: rgba(245, 158, 11, 0.2); border: 1px solid #f59e0b; color: #fbbf24; font-size: 0.8rem; font-weight: 800; padding: 4px 14px; border-radius: 9999px; display: inline-block; margin-bottom: 1rem;">
        🚀 SERVICIO OFICIAL REW CHILE
    </span>
    <h3 style="color: #ffffff; font-size: 1.9rem; margin-top: 0; margin-bottom: 1rem; font-weight: 900;">
        Automatiza tu E-Commerce con la Integración Bsale + WooCommerce
    </h3>
    <p style="color: #cbd5e1; font-size: 1.05rem; max-width: 650px; margin: 0 auto 2rem; line-height: 1.7;">
        Deja de perder horas cuadrando inventarios a mano. Conecta tu tienda WooCommerce con Bsale de forma robusta, emite boletas automáticas y escala tus ventas online.
    </p>
    <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
        <a href="/servicios/integracion-bsale-woocommerce" class="btn btn-gold" style="font-weight: 800; padding: 1rem 2rem; font-size: 1rem;">
            Ver Detalles de la Integración ($350.000 CLP) →
        </a>
        <a href="https://api.whatsapp.com/send?phone=56987261127&text=Hola%20Álvaro,%20leí%20el%20artículo%20de%20integración%20Bsale%20WooCommerce%20y%20quiero%20cotizar." target="_blank" rel="noopener" class="btn btn-whatsapp" style="font-weight: 800; padding: 1rem 2rem; font-size: 1rem;">
            💬 Conversar por WhatsApp (+56 9 8726 1127)
        </a>
    </div>
</div>
HTML;
    }

    /**
     * Plantilla genérica de artículo técnico estructurado.
     */
    protected function getGenericArticleHtml(string $topic): string
    {
        return <<<HTML
<p class="lead" style="font-size: 1.15rem; line-height: 1.8; color: var(--text-dark); margin-bottom: 2rem;">
    En el ecosistema tecnológico actual de Chile, abordar de forma adecuada <strong>{$topic}</strong> es un factor determinante para la competitividad, velocidad y escalabilidad de cualquier organización moderna.
</p>

<h2>1. Fundamentos Técnicos y Estado del Arte</h2>
<p>
    Implementar soluciones robustas requiere analizar la arquitectura subyacente, la compatibilidad con los sistemas existentes y el impacto directo en la experiencia de usuario y conversiones del negocio.
</p>

<h2>2. Metodología de Implementación de REW</h2>
<p>
    En REW seguimos un ciclo ágil de ingeniería de software estructurado en 4 fases:
</p>
<ol style="line-height: 1.8; margin-bottom: 2rem;">
    <li><strong>Diagnóstico & Requerimientos:</strong> Auditoría técnica y análisis de datos en vivo.</li>
    <li><strong>Arquitectura & Diseño:</strong> Definición de modelos de datos, APIs y flujo UX.</li>
    <li><strong>Desarrollo & Pruebas:</strong> Código limpio en PHP 8.3 / Laravel y pruebas en entorno de staging.</li>
    <li><strong>Despliegue & Monitoreo:</strong> Lanzamiento a producción con métricas Core Web Vitals en verde.</li>
</ol>

<h2>3. Conclusiones y Próximos Pasos</h2>
<p>
    Si tu empresa busca implementar una solución a medida con respaldo de ingeniería senior, en REW te ayudamos a materializar tu proyecto con soporte cercano y garantía técnica.
</p>

<!-- Call to Action -->
<div style="background: #0f172a; color: #ffffff; border-radius: 14px; padding: 2rem; margin: 3rem 0; text-align: center;">
    <h3 style="color: #ffffff; font-size: 1.5rem; margin-top: 0; margin-bottom: 0.75rem;">¿Tienes un proyecto en mente?</h3>
    <p style="color: #cbd5e1; margin-bottom: 1.5rem;">Conversemos sobre tus requerimientos y diseñemos la mejor solución para tu empresa.</p>
    <a href="/contacto" class="btn btn-gold" style="font-weight: 800; padding: 0.85rem 1.75rem;">Cotizar Proyecto en REW →</a>
</div>
HTML;
    }
}
