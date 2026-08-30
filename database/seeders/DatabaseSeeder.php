<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\PortfolioProject;
use App\Models\Post;
use App\Models\Product;
use App\Models\RicheKnowledgeBase;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Categorías de Plugins
        $categories = [
            ['name' => 'AI Chatbots', 'slug' => 'ai-chatbots', 'description' => 'Asistentes de Inteligencia Artificial para WordPress y WooCommerce con arquitectura RAG.', 'icon' => 'bot'],
            ['name' => 'Chatbots & IA', 'slug' => 'chatbots-ia', 'description' => 'Soluciones integrales de IA y procesamiento de lenguaje natural.', 'icon' => 'cpu'],
            ['name' => 'Addons', 'slug' => 'addons', 'description' => 'Módulos y complementos de expansión para el ecosistema Rich-E Chatbot.', 'icon' => 'puzzle'],
            ['name' => 'Licencias', 'slug' => 'licencias', 'description' => 'Licenciamiento anual oficial con actualizaciones y soporte directo de ingenieros REW.', 'icon' => 'key'],
            ['name' => 'Plugins WooCommerce', 'slug' => 'plugins-woocommerce', 'description' => 'Plugins de alta conversión, multi-moneda, traductor y sincronización e-commerce.', 'icon' => 'shopping-cart'],
            ['name' => 'Servicios', 'slug' => 'servicios', 'description' => 'Configuración experta, entrenamiento de modelos RAG y soporte prioritario.', 'icon' => 'wrench'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }

        // 2. Plugins WordPress
        $products = [
            [
                'name' => 'Pack Chatbot E-Commerce Pro – Licencia Anual',
                'slug' => 'pack-chatbot-ecommerce-pro',
                'sku' => 'rich-e-pack-ecommerce-pro',
                'badge' => '-13% OFERTA',
                'category_slug' => 'chatbots-ia',
                'price_usd' => 76.00,
                'price_clp' => 69990,
                'original_price_usd' => 86.00,
                'original_price_clp' => 79990,
                'short_description' => 'Lleva la atención al cliente y las ventas de tu tienda al siguiente nivel con el paquete completo de IA autónomo para WordPress y WooCommerce.',
                'description' => 'El paquete definitivo para automatizar tu comercio electrónico. Incluye el motor central Rich-E Chatbot con tecnología RAG, el addon de sincronización en tiempo real para WooCommerce, indexador semántico y soporte prioritario.',
                'features' => [
                    'Motor Rich-E AI Chatbot Full License (1 Año)',
                    'Addon WooCommerce Premium Sync integrado',
                    'Tecnología RAG Nativa (Aprende de PDFs, URLs y Catálogo)',
                    'Soporte Multi-Modelo (ChatGPT-4o, Claude 3.5, Gemini 1.5, DeepSeek, Groq)',
                    'Recomendador Inteligente de Productos en el Chat con Carrito Directo',
                    'Cero Alucinaciones con Directrices Estrictas de Negocio',
                    'Actualizaciones de Seguridad y Soporte Especializado REW',
                ],
                'requirements' => [
                    'WordPress 6.0 o superior',
                    'WooCommerce 8.0 o superior',
                    'PHP 8.1 / 8.2 / 8.3',
                    'API Key de tu proveedor de IA preferido (OpenAI, Anthropic, Google o Groq)',
                ],
                'faqs' => [
                    ['q' => '¿Qué modelos de Inteligencia Artificial soporta?', 'a' => 'Es compatible con OpenAI (GPT-4o, GPT-4o-mini), Anthropic (Claude 3.5 Sonnet), Google Gemini (1.5 Flash/Pro), Groq y DeepSeek. Tú usas tu propia API Key y pagas centavos por consumo real.'],
                    ['q' => '¿Cómo evita las alucinaciones en los precios y stock?', 'a' => 'Utiliza consultas vectoriales RAG en tiempo real directo a la base de datos de WooCommerce, asegurando que sólo informe precios, variaciones y stock 100% verídicos.'],
                    ['q' => '¿Incluye soporte en la instalación?', 'a' => 'Sí, el pack pro cuenta con soporte técnico prioritario guiado por el equipo de ingeniería de REW.'],
                ],
                'is_featured' => true,
                'version' => '2.4.0',
                'featured_image' => '/images/products/pack_chatbot_ecommerce.webp',
                'meta_title' => 'Pack Chatbot E-Commerce Pro – Licencia Anual | REW',
                'meta_description' => 'Asistente virtual de Inteligencia Artificial para WordPress y WooCommerce. Sincroniza catálogo, responde consultas 24/7 y aumenta ventas.',
            ],
            [
                'name' => 'Rich-E Chatbot Assistant (Licencia Anual)',
                'slug' => 'rich-e-chatbot-assistant',
                'sku' => 'rich-e-licencia-anual',
                'badge' => 'MÁS VENDIDO',
                'category_slug' => 'licencias',
                'price_usd' => 54.00,
                'price_clp' => 49990,
                'original_price_usd' => null,
                'original_price_clp' => null,
                'short_description' => 'Eleva tu soporte técnico y multiplica tus conversiones con el mejor chatbot de IA con tecnología RAG para WordPress.',
                'description' => 'Rich-E Chatbot Assistant es la solución de IA conversacional líder para sitios corporativos y profesionales en WordPress. Lee automáticamente tus páginas, artículos y documentos para responder como un consultor experto de tu marca.',
                'features' => [
                    'Indexación RAG automática de contenido del sitio',
                    'Subida de documentos PDF y manuales de producto',
                    'Widget flotante 100% personalizable (colores, avatar, mensajes, posición)',
                    'Formulario de captura de Leads integrado',
                    'Historial de conversaciones y métricas de interacción',
                    'Compatible con Elementor, Divi, Gutenberg y cualquier tema WordPress',
                    'Marca blanca y modo privado',
                ],
                'requirements' => [
                    'WordPress 5.8+',
                    'PHP 7.4 a 8.3',
                    'Cualquier hosting estándar con cURL activado',
                ],
                'faqs' => [
                    ['q' => '¿Puedo cambiar la apariencia del chatbot?', 'a' => 'Totalmente. Puedes personalizar avatar, colores corporativos, tipografía, textos de bienvenida, sugerencias de preguntas rápidas y sonido.'],
                    ['q' => '¿Funciona en sitios en español e inglés?', 'a' => 'Detecta automáticamente el idioma del usuario y responde con fluidez nativa en más de 95 idiomas.'],
                ],
                'is_featured' => true,
                'version' => '2.4.0',
                'featured_image' => '/images/products/riche_chatbot_assistant.webp',
                'meta_title' => 'Rich-E Chatbot Assistant para WordPress | REW',
                'meta_description' => 'El mejor chatbot de inteligencia artificial RAG para WordPress. Cero alucinaciones, respuestas instantáneas y captura de leads 24/7.',
            ],
            [
                'name' => 'Addon: WooCommerce Premium Sync (Licencia Anual)',
                'slug' => 'addon-woocommerce-premium-sync',
                'sku' => 'rich-e-addon-woocommerce',
                'badge' => 'ADDON OFICIAL',
                'category_slug' => 'addons',
                'price_usd' => 32.00,
                'price_clp' => 29990,
                'original_price_usd' => null,
                'original_price_clp' => null,
                'short_description' => 'Convierte a tu chatbot en un asistente de ventas WooCommerce experto. Sincroniza stock, precios, variaciones y botones de compra en el chat.',
                'description' => 'Extensión oficial para Rich-E Chatbot que conecta la IA con el cerebro de tu tienda WooCommerce. Entiende tallas, colores, atributos personalizados, calcula carritos y añade productos en un clic sin salir de la conversación.',
                'features' => [
                    'Sincronización en tiempo real de catálogo completo',
                    'Soporte nativo para productos simples y variables',
                    'Botón interactivo de Compra / Añadir al carrito en el chat',
                    'Detección inteligente de stock y rangos de precio',
                    'Recomendaciones cruzadas (Cross-selling y Up-selling)',
                    'Compatible con pasarelas de pago Webpay Plus, MercadoPago, PayPal y Stripe',
                ],
                'requirements' => [
                    'Rich-E Chatbot Assistant activo',
                    'WooCommerce 7.0+',
                ],
                'faqs' => [
                    ['q' => '¿Qué ocurre si cambio el precio o stock de un producto?', 'a' => 'La IA consulta la base de datos de WooCommerce en vivo, por lo que el cambio se refleja inmediatamente en las respuestas del bot.'],
                ],
                'is_featured' => true,
                'version' => '1.3.0',
                'featured_image' => '/images/products/addon_woocommerce_sync.webp',
                'meta_title' => 'Addon WooCommerce Premium Sync para Chatbot IA | REW',
                'meta_description' => 'Sincroniza tu catálogo WooCommerce con Inteligencia Artificial. Cierra ventas automáticas en el chat.',
            ],
            [
                'name' => 'REW Multi-Currency & Translator Pro',
                'slug' => 'rew-multi-currency-translator-pro',
                'sku' => 'rew-mc-translator-pro',
                'badge' => '-33% OFERTA',
                'category_slug' => 'plugins-woocommerce',
                'price_usd' => 22.00,
                'price_clp' => 19990,
                'original_price_usd' => 32.00,
                'original_price_clp' => 29990,
                'short_description' => 'El plugin definitivo todo-en-uno para WooCommerce: selector de divisa CLP / USD en tiempo real, vinculación automática de idioma y traducción instantánea.',
                'description' => 'Permite a tus clientes cambiar de divisa (CLP / USD) en tiempo real con tasas de cambio actualizadas, fuerza divisas específicas según la pasarela de pago seleccionada (por ejemplo Webpay en CLP y PayPal en USD), y traduce tu web al instante de forma 100% gratuita y marca blanca.',
                'features' => [
                    'Conversor de divisas instantáneo CLP / USD / EUR / BRL',
                    'Forzado inteligente de divisa según pasarela de pago',
                    'Integración de traducción multi-idioma (ES, EN, PT, FR, DE, IT, ZH, JA)',
                    'Widget flotante elegante y personalizable en esquinas',
                    'Compatibilidad total con WooCommerce, Webpay Plus y Stripe',
                    'Cero costos mensuales recurrentes de traducción externa',
                ],
                'requirements' => [
                    'WordPress 5.6+',
                    'WooCommerce 6.0+',
                ],
                'faqs' => [
                    ['q' => '¿Puedo cobrar en dólares en PayPal y en pesos chilenos en Webpay?', 'a' => 'Sí, el plugin detecta la pasarela y convierte la orden a la moneda correspondiente de forma transparente para el cliente.'],
                ],
                'is_featured' => true,
                'version' => '1.1.0',
                'featured_image' => '/images/products/rew_multi_currency_pro.webp',
                'meta_title' => 'REW Multi-Currency & Translator Pro para WooCommerce',
                'meta_description' => 'Cambio de divisas CLP/USD en tiempo real y traducción multi-idioma para tiendas WooCommerce.',
            ],
            [
                'name' => 'Addon: Indexación Semántica de Blog (Licencia Anual)',
                'slug' => 'addon-indexacion-semantica-de-blog-licencia-anual',
                'sku' => 'rich-e-addon-blog',
                'badge' => 'ADDON',
                'category_slug' => 'addons',
                'price_usd' => 22.00,
                'price_clp' => 19990,
                'original_price_usd' => null,
                'original_price_clp' => null,
                'short_description' => 'Permite al chatbot responder dudas de tus clientes basándose en el contenido de tus entradas de blog y páginas institucionales.',
                'description' => 'Transforma tus artículos técnicos, guías y casos de estudio en conocimiento instantáneo para el bot. Almacena embeddings semánticos para citar artículos relevantes en cada respuesta.',
                'features' => [
                    'Indexación automática al publicar o actualizar entradas',
                    'Búsqueda semántica por similitud vectorial',
                    'Enlaces de referencia automáticos hacia los artículos en las respuestas',
                    'Control granular de categorías de blog a indexar',
                ],
                'requirements' => ['Rich-E Chatbot Assistant activo'],
                'faqs' => [
                    ['q' => '¿Indexa posts antiguos?', 'a' => 'Sí, cuenta con un botón de sincronización masiva con un clic.'],
                ],
                'is_featured' => false,
                'version' => '1.2.0',
                'featured_image' => '/images/products/addon_blog_indexing.webp',
                'meta_title' => 'Addon Indexación Semántica de Blog | REW',
                'meta_description' => 'Convierte los artículos de tu blog en conocimiento de IA para tu chatbot de WordPress.',
            ],
            [
                'name' => 'Addon: Integración de Custom Post Types (CPT) (Licencia Anual)',
                'slug' => 'addon-integracion-de-custom-post-types-cpt-licencia-anual',
                'sku' => 'rich-e-addon-cpt',
                'badge' => 'ADDON',
                'category_slug' => 'addons',
                'price_usd' => 22.00,
                'price_clp' => 19990,
                'original_price_usd' => null,
                'original_price_clp' => null,
                'short_description' => 'Extiende el conocimiento del bot indexando portafolios, testimonios, eventos, propiedades inmobiliarias y cualquier post type personalizado.',
                'description' => 'Ideal para sitios inmobiliarios, directorios, eventos y agencias que utilizan Advanced Custom Fields (ACF), JetEngine o Custom Post Types UI.',
                'features' => [
                    'Soporte completo para campos personalizados ACF y JetEngine',
                    'Indexación de propiedades, vehículos, eventos y cursos',
                    'Filtros personalizados por taxonomía',
                    'Actualización reactiva ante cambios',
                ],
                'requirements' => ['Rich-E Chatbot Assistant activo'],
                'faqs' => [
                    ['q' => '¿Funciona con ACF Pro?', 'a' => 'Sí, extrae texto, selectores, repetidores y campos estructurados.'],
                ],
                'is_featured' => false,
                'version' => '1.2.0',
                'featured_image' => '/images/products/addon_custom_post_types.webp',
                'meta_title' => 'Addon Integración de Custom Post Types (CPT) | REW',
                'meta_description' => 'Integra campos personalizados ACF y Custom Post Types en el conocimiento del chatbot.',
            ],
            [
                'name' => 'Addon: Soporte Premium e Integración (Anual)',
                'slug' => 'addon-soporte-premium-e-integracion-anual',
                'sku' => 'rich-e-servicio-soporte',
                'badge' => 'SERVICIO REW',
                'category_slug' => 'servicios',
                'price_usd' => 43.00,
                'price_clp' => 39990,
                'original_price_usd' => null,
                'original_price_clp' => null,
                'short_description' => 'Acceso directo a ingenieros de software de REW para configurar e integrar tu base de datos y optimizar los system prompts de la IA.',
                'description' => 'Delega la configuración e ingeniería de prompts en los creadores de Rich-E. Optimizamos el vector store, configuramos webhooks y garantizamos que el tono de respuesta represente fielmente tu marca.',
                'features' => [
                    'Sesión 1 a 1 de configuración remota',
                    'Ingeniería de System Prompts y Directrices personalizadas',
                    'Depuración y limpieza de base de datos de conocimiento',
                    'Canal directo de WhatsApp con ingenieros de REW',
                    'Garantía de rendimiento y cero alucinaciones',
                ],
                'requirements' => ['Licencia activa de cualquier plugin REW'],
                'faqs' => [
                    ['q' => '¿Cuánto tarda la implementación?', 'a' => 'El setup inicial se completa en 24 a 48 horas hábiles.'],
                ],
                'is_featured' => false,
                'version' => '1.0.0',
                'featured_image' => '/images/products/addon_support_integration.webp',
                'meta_title' => 'Soporte Premium e Integración de IA | REW',
                'meta_description' => 'Acompañamiento e integración experta para soluciones de inteligencia artificial en WordPress.',
            ],
            [
                'name' => 'Licencia Vitalicia Rich-E Chatbot (Lifetime Unlimited)',
                'slug' => 'licencia-vitalicia-rich-e-chatbot',
                'sku' => 'rich-e-lifetime-unlimited',
                'badge' => 'PAGO ÚNICO',
                'category_slug' => 'licencias',
                'price_usd' => 850.00,
                'price_clp' => 799990,
                'original_price_usd' => 1200.00,
                'original_price_clp' => 1100000,
                'short_description' => 'Pago único de por vida. Activa Rich-E en dominios ilimitados, con acceso a todos los addons actuales y futuros de forma vitalicia.',
                'description' => 'La inversión definitiva para agencias, empresas de software y tiendas que buscan automatización de IA perpetua sin cuotas mensuales ni renovaciones anuales. Incluye actualizaciones de por vida y canal prioritario VIP con el equipo de ingeniería.',
                'features' => [
                    'Licencia vitalicia sin fecha de expiración',
                    'Dominios ilimitados',
                    'Acceso a todos los addons futuros incluidos sin costo extra',
                    'Canal VIP directo por WhatsApp con Álvaro Valenzuela',
                    'Soporte técnico prioritario permanente',
                    'Garantía de rendimiento y actualizaciones continuas',
                ],
                'requirements' => ['WordPress 5.8+', 'PHP 7.4 a 8.3'],
                'faqs' => [
                    ['q' => '¿Tiene algún costo de renovación futuro?', 'a' => 'Cero. Pagas una sola vez y recibes soporte y todas las actualizaciones de por vida.'],
                ],
                'is_featured' => true,
                'version' => '2.4.0',
                'featured_image' => '/images/products/riche_lifetime_license.webp',
                'meta_title' => 'Licencia Vitalicia Rich-E Chatbot (Lifetime) | REW',
                'meta_description' => 'Compra la licencia vitalicia de Rich-E Chatbot para WordPress. Pago único, dominios ilimitados y soporte perpetuo.',
            ],
        ];

        foreach ($products as $prod) {
            Product::updateOrCreate(['slug' => $prod['slug']], $prod);
        }

        // 3. Proyectos del Portafolio
        // Limpiar registros antiguos o con slugs obsoletos para evitar duplicados
        PortfolioProject::whereIn('slug', ['autenticos-decadentes', 'codigo25', 'jjestetica', 'venta-de-paltas'])->delete();

        $projects = [
            0 => [
                'title' => 'Artífices TV',
                'slug' => 'artifices-tv',
                'client' => 'Artífices TV',
                'category' => 'Streaming & Media',
                'project_date' => '2024-06-05',
                'summary' => 'Plataforma web de streaming, conectividad y contenidos audiovisuales con diseño de vanguardia y experiencia inmersiva.',
                'full_description' => 'Desarrollo de sitio web corporativo elaborado en WordPress con Elementor para Artífices TV (artifices.tv). Plataforma enfocada en servicios de transmisión en vivo de alta definición, conectividad satelital y coberturas de eventos masivos creada desde la idea y requerimientos del cliente.',
                'status' => 'Finalizado',
                'project_url' => 'https://artifices.tv/',
                'technologies' => 'WordPress, Elementor, PHP, CSS3, Inbound Marketing',
                'role' => 'Desarrollo Web Full Stack, Diseñador UX/UI, Optimización de Rendimiento',
                'featured_image' => '/images/portfolio/artifices_tv.webp',
                'gallery' => [
                    0 => '/images/portfolio/artifices_tv.webp',
                ],
                'results' => [
                    0 => 'Incremento del 180% en visualizaciones de stream',
                    1 => 'Diseño 100% responsivo y optimización de carga ultrarrápida',
                    2 => 'Arquitectura modular para nuevos lanzamientos',
                ],
                'is_featured' => true,
                'order' => 1,
                'meta_title' => 'Artífices TV - Caso de Éxito en Desarrollo Web | REW',
                'meta_description' => 'Diseño y desarrollo web para Artífices TV: plataforma moderna de streaming y conectividad creada por REW.',
            ],
            1 => [
                'title' => 'CODIGO 25',
                'slug' => 'codigo-25',
                'client' => 'CODIGO 25',
                'category' => 'Indumentaria & Vestuario Profesional',
                'project_date' => '2024-04-12',
                'summary' => 'Tienda online de indumentaria corporativa y técnica con pasarelas de pago y logística de envíos integrada.',
                'full_description' => 'Desarrollo de e-commerce en WordPress con WooCommerce y Elementor para CODIGO 25 (codigo25.cl). Implementación de pasarela de pago Transbank Webpay Plus, cotizador dinámico de bordados/estampados y módulo de despachos automatizado según las especificaciones del cliente.',
                'status' => 'Finalizado',
                'project_url' => 'https://codigo25.cl/',
                'technologies' => 'WordPress, WooCommerce, Elementor, Webpay Plus, PHP, CSS3',
                'role' => 'Desarrollo E-Commerce, Integración de Pasarelas y Envíos, Sistema Customizado',
                'featured_image' => '/images/portfolio/codigo_25.webp',
                'gallery' => [
                    0 => '/images/portfolio/codigo_25.webp',
                ],
                'results' => [
                    0 => 'Tasa de conversión superior al 3.8%',
                    1 => 'Integración de pagos automatizada con Webpay y Transferencia',
                ],
                'is_featured' => true,
                'order' => 2,
                'meta_title' => 'CODIGO 25 - Tienda Online y Branding | REW',
                'meta_description' => 'Desarrollo de e-commerce de alto rendimiento para CODIGO 25.',
            ],
            2 => [
                'title' => 'Cuarteto de Nos (Merch Oficial)',
                'slug' => 'cuarteto-de-nos',
                'client' => 'Cuarteto de Nos / Sotemono Merch',
                'category' => 'E-Commerce Musical',
                'project_date' => '2024-06-10',
                'summary' => 'Tienda online oficial de merchandising internacional para la icónica banda de rock Cuarteto de Nos, con venta global en múltiples divisas.',
                'full_description' => 'Desarrollo de plataforma e-commerce de alto rendimiento para el merchandising oficial de la banda internacional Cuarteto de Nos (gestionado por Sotemono). La tienda fue construida con arquitectura escalable capaz de soportar picos masivos de tráfico durante lanzamientos de giras y álbumes, pasarelas de pago internacionales y nacionales (Webpay Plus, Mercado Pago, PayPal, Stripe), selector de divisas en tiempo real y logística automatizada de despachos internacionales.',
                'status' => 'Finalizado',
                'project_url' => 'https://sotemono.com/cuarteto-de-nos/',
                'technologies' => 'WordPress, WooCommerce, PHP, JavaScript, Webpay Plus, Mercado Pago, Stripe, Cloudflare CDN, Caching de Alto Rendimiento',
                'role' => 'Desarrollo E-Commerce Full Stack, Optimización para Picos de Tráfico, Pasarelas Multi-Moneda, Logística de Despacho',
                'featured_image' => '/images/portfolio/cuarteto_de_nos.webp',
                'gallery' => [
                    0 => '/images/portfolio/cuarteto_de_nos.webp',
                ],
                'results' => [
                    0 => 'Capacidad para soportar más de 25.000 usuarios concurrentes durante aperturas de giras',
                    1 => 'Reducción del tiempo de checkout a menos de 45 segundos',
                    2 => 'Venta y despacho automatizado a más de 12 países en Latinoamérica y España',
                ],
                'is_featured' => true,
                'order' => 3,
                'meta_title' => 'Cuarteto de Nos - Tienda Oficial de Merchandising | REW',
                'meta_description' => 'Desarrollo de tienda online para la banda internacional Cuarteto de Nos.',
            ],
            3 => [
                'title' => 'Los Auténticos Decadentes (Merch Oficial)',
                'slug' => 'los-autenticos-decadentes',
                'client' => 'Los Auténticos Decadentes / Sotemono Merch',
                'category' => 'E-Commerce Musical',
                'project_date' => '2024-01-10',
                'summary' => 'Tienda online oficial internacional de merchandising para la legendaria banda argentina Los Auténticos Decadentes.',
                'full_description' => 'Desarrollo de tienda virtual de alta demanda para la gira y merchandising oficial de Los Auténticos Decadentes (sotemono.com). Arquitectura WooCommerce con caché perimetral Cloudflare, pagos multi-divisa (Mercado Pago, PayPal, Stripe) y logística automatizada para despachos masivos.',
                'status' => 'Finalizado',
                'project_url' => 'https://sotemono.com/',
                'technologies' => 'WordPress, WooCommerce, Mercado Pago, PayPal, Stripe, Cloudflare CDN, PHP',
                'role' => 'Desarrollo E-Commerce Internacional, Alta Disponibilidad, Pasarelas de Pago Globales',
                'featured_image' => '/images/portfolio/los_autenticos_decadentes.webp',
                'gallery' => [
                    0 => '/images/portfolio/los_autenticos_decadentes.webp',
                ],
                'results' => [
                    0 => 'Venta masiva de colecciones especiales en giras',
                    1 => 'Logística automatizada con generación de etiquetas de envío',
                ],
                'is_featured' => true,
                'order' => 4,
                'meta_title' => 'Los Auténticos Decadentes - Tienda Oficial | REW',
                'meta_description' => 'Desarrollo de tienda online oficial para Los Auténticos Decadentes por REW.',
            ],
            4 => [
                'title' => 'JJ Estética',
                'slug' => 'jj-estetica',
                'client' => 'JJ Estética Chile',
                'category' => 'Salud, Belleza & Bienestar',
                'project_date' => '2024-03-25',
                'summary' => 'Sitio web profesional para centro de medicina estética y tratamientos faciales con reserva de horas online.',
                'full_description' => 'Desarrollo web corporativo para JJ Estética (jjestetica.cl). Presentación elegante de catálogo de tratamientos, testimonios, cotizador interactivo y vinculación directa con WhatsApp para agendamiento médico.',
                'status' => 'Finalizado',
                'project_url' => 'https://jjestetica.cl/',
                'technologies' => 'WordPress, Elementor Pro, UI/UX Design, PHP, WhatsApp Business API',
                'role' => 'Diseño y Desarrollo Web, Optimización Mobile, Sistema de Agendamiento Online',
                'featured_image' => '/images/portfolio/jj_estetica.webp',
                'gallery' => [
                    0 => '/images/portfolio/jj_estetica.webp',
                ],
                'results' => [
                    0 => 'Aumento del 120% en solicitudes de evaluación estética',
                    1 => 'Carga optimizada en dispositivos móviles menores a 1.2s',
                ],
                'is_featured' => true,
                'order' => 5,
                'meta_title' => 'JJ Estética - Sitio Web Corporativo | REW',
                'meta_description' => 'Desarrollo web corporativo para centro de medicina estética JJ Estética.',
            ],
            5 => [
                'title' => 'Sotemono Merch',
                'slug' => 'sotemono',
                'client' => 'Sotemono Merch Chile',
                'category' => 'E-Commerce & Moda',
                'project_date' => '2024-05-01',
                'summary' => 'Plataforma hub matriz de e-commerce y distribución de merchandising para bandas y marcas en Chile.',
                'full_description' => 'Desarrollo de plataforma central de e-commerce para Sotemono (sotemono.com). Gestiona catálogos multi-marca de bandas de rock y artistas urbanos, control centralizado de inventario, pasarelas Webpay Plus, Mercado Pago y despachos globales.',
                'status' => 'Finalizado',
                'project_url' => 'https://sotemono.com/',
                'technologies' => 'WordPress, WooCommerce, Webpay Plus, Mercado Pago, Stripe, PHP',
                'role' => 'Desarrollo E-Commerce Hub, Gestión Multi-Catálogo, Integración Pasarelas',
                'featured_image' => '/images/portfolio/sotemono.webp',
                'gallery' => [
                    0 => '/images/portfolio/sotemono.webp',
                ],
                'results' => [
                    0 => 'Centralización de más de 10 tiendas de merchandising en un solo sistema',
                    1 => 'Control de inventario unificado para producción y preventa',
                ],
                'is_featured' => true,
                'order' => 6,
                'meta_title' => 'Sotemono Merch - Plataforma E-Commerce | REW',
                'meta_description' => 'Desarrollo de plataforma matriz de e-commerce para Sotemono Merch por REW.',
            ],
            6 => [
                'title' => 'Papel Seda',
                'slug' => 'papel-seda',
                'client' => 'Papel Seda Chile',
                'category' => 'E-Commerce & Packaging',
                'project_date' => '2024-04-10',
                'summary' => 'E-commerce especializado en papel de seda y packaging de calidad con gestión de inventario personalizada y pasarelas de pago.',
                'full_description' => 'Desarrollo de tienda online WooCommerce para Papel Seda (papelseda.cl). Se implementó pasarela de pago Transbank Webpay Plus, sistema de gestión de inventario y pedidos customizado, optimización de velocidad y servicio de soporte y mantenimiento mensual continuo.',
                'status' => 'Finalizado',
                'project_url' => 'https://papelseda.cl/',
                'technologies' => 'WordPress, WooCommerce, PHP, Webpay Plus, JavaScript, Gestión de Inventario a Medida',
                'role' => 'Desarrollo E-Commerce Full Stack, Integración de Pasarelas, Gestión de Inventario Customizada, Mantenimiento Mensual',
                'featured_image' => '/images/portfolio/papel_seda.webp',
                'gallery' => [
                    0 => '/images/portfolio/papel_seda.webp',
                ],
                'results' => [
                    0 => 'Gestión automatizada de pedidos y stock en tiempo real',
                    1 => 'Soporte técnico mensual y disponibilidad del 99.9%',
                ],
                'is_featured' => true,
                'order' => 7,
                'meta_title' => 'Papel Seda - Tienda E-Commerce y Gestión de Inventario | REW',
                'meta_description' => 'Desarrollo de e-commerce y sistema de inventario a medida para Papel Seda por REW.',
            ],
            7 => [
                'title' => 'Patagonia Shelter',
                'slug' => 'patagonia-shelter',
                'client' => 'Patagonia Shelter Chile',
                'category' => 'Turismo & E-Commerce',
                'project_date' => '2024-03-15',
                'summary' => 'Sitio web corporativo y plataforma de reservas de alojamiento de montaña en la Patagonia elaborado con WordPress y Elementor.',
                'full_description' => 'Sitio web corporativo elaborado con WordPress y Elementor para Patagonia Shelter (patagoniashelter.com). La plataforma integra sistema de reservas en tiempo real para refugios y domos, pasarelas de pago automatizadas en CLP y USD (Webpay Plus, PayPal), mapas interactivos de senderos y optimización SEO para turismo internacional.',
                'status' => 'Finalizado',
                'project_url' => 'https://patagoniashelter.com/',
                'technologies' => 'WordPress, Elementor, WooCommerce, Booking Engine, Webpay Plus, PayPal, JavaScript, SEO Internacional',
                'role' => 'Desarrollo Web Full Stack, Sistema de Reservas, Integración de Pasarelas, SEO Internacional',
                'featured_image' => '/images/portfolio/patagonia_shelter.webp',
                'gallery' => [
                    0 => '/images/portfolio/patagonia_shelter.webp',
                ],
                'results' => [
                    0 => 'Aumento del 210% en reservas directas sin comisiones de OTAs',
                    1 => 'Carga en menos de 1.4s optimizada para usuarios de todo el mundo',
                ],
                'is_featured' => true,
                'order' => 8,
                'meta_title' => 'Patagonia Shelter - Caso de Éxito en Desarrollo Web | REW',
                'meta_description' => 'Desarrollo de plataforma de reservas y e-commerce turístico para Patagonia Shelter en Chile por REW.',
            ],
            8 => [
                'title' => 'Mercado Patache',
                'slug' => 'mercado-patache',
                'client' => 'Mercado Patache',
                'category' => 'E-Commerce Gourmet',
                'project_date' => '2024-05-12',
                'summary' => 'Tienda online de productos gourmet y alimentos selectos con plataforma WooCommerce propia y campañas de Google & Meta Ads.',
                'full_description' => 'Desarrollo de tienda online WooCommerce propia para Mercado Patache (mercadopatache.com). Incluye catálogo con cálculo de peso y despacho por zonas, integración de pagos online, soporte y mantención técnica mensual continua, junto con gestión estratégica de pauta publicitaria en Google Ads y Meta Ads.',
                'status' => 'Finalizado',
                'project_url' => 'https://mercadopatache.com/',
                'technologies' => 'WordPress, WooCommerce, Google Ads, Meta Ads, Webpay Plus, PHP, CSS3',
                'role' => 'Desarrollo E-Commerce, Integración de Pagos, Mantención Mensual, Estrategia Google Ads & Meta Ads',
                'featured_image' => '/images/portfolio/mercado_patache.webp',
                'gallery' => [
                    0 => '/images/portfolio/mercado_patache.webp',
                ],
                'results' => [
                    0 => 'ROAS de 4.2x en campañas de Google Ads y Meta Ads',
                    1 => 'Mantención mensual activa sin interrupciones operacionales',
                ],
                'is_featured' => true,
                'order' => 9,
                'meta_title' => 'Mercado Patache - E-Commerce Gourmet y Marketing Digital | REW',
                'meta_description' => 'Desarrollo de tienda WooCommerce propia y pauta digital para Mercado Patache por REW.',
            ],
            9 => [
                'title' => 'Cumbres de Frutillar',
                'slug' => 'cumbres-de-frutillar',
                'client' => 'Cumbres de Frutillar Inmobiliaria',
                'category' => 'Inmobiliaria & Loteos',
                'project_date' => '2024-02-20',
                'summary' => 'Sitio web corporativo inmobiliario con diseño a medida en Elementor y captación de leads mediante Meta Ads y Google Ads.',
                'full_description' => 'Diseño y desarrollo web a medida para el proyecto inmobiliario Cumbres de Frutillar (cumbresdefrutillar.cl) en el sur de Chile. Desarrollado en WordPress con Elementor, integración de planos interactivos de parcelas, formularios de cotización rápida y gestión completa de campañas publicitarias en Meta Ads y Google Ads.',
                'status' => 'Finalizado',
                'project_url' => 'https://cumbresdefrutillar.cl/',
                'technologies' => 'WordPress, Elementor, Meta Ads, Google Ads, UI/UX Design, PHP',
                'role' => 'Diseño UX/UI a Medida, Desarrollo Web, Integración de Leads, Gestión de Pauta Publicitaria Meta & Google Ads',
                'featured_image' => '/images/portfolio/cumbres_de_frutillar.webp',
                'gallery' => [
                    0 => '/images/portfolio/cumbres_de_frutillar.webp',
                ],
                'results' => [
                    0 => 'Más de 450 prospectos calificados captados en el primer trimestre',
                    1 => 'Diseño visual a medida destacando el entorno natural de Frutillar',
                ],
                'is_featured' => true,
                'order' => 10,
                'meta_title' => 'Cumbres de Frutillar - Diseño Web Inmobiliario y Ads | REW',
                'meta_description' => 'Diseño web a medida y campañas de Google/Meta Ads para Cumbres de Frutillar por REW.',
            ],
            10 => [
                'title' => 'Barrio Bravo (Merch Oficial)',
                'slug' => 'barrio-bravo',
                'client' => 'Barrio Bravo / Sotemono Merch',
                'category' => 'E-Commerce & Cultura',
                'project_date' => '2024-03-01',
                'summary' => 'Tienda online oficial para la comunidad Barrio Bravo con envíos internacionales DHL y pagos multi-divisa.',
                'full_description' => 'Desarrollo de e-commerce WooCommerce customizado para la venta del merchandising y libros oficiales de Barrio Bravo (sotemono.com). Integración de pagos con Mercado Pago y PayPal, conversor de moneda y cálculo automatizado de envíos internacionales con DHL Express.',
                'status' => 'Finalizado',
                'project_url' => 'https://sotemono.com/',
                'technologies' => 'WordPress, WooCommerce, Mercado Pago, PayPal, DHL Express API, PHP, JavaScript',
                'role' => 'Desarrollo E-Commerce Customizado, Integración Mercado Pago & PayPal, Envíos Internacionales DHL',
                'featured_image' => '/images/portfolio/barrio_bravo.webp',
                'gallery' => [
                    0 => '/images/portfolio/barrio_bravo.webp',
                ],
                'results' => [
                    0 => 'Envíos internacionales automatizados a más de 15 países con DHL',
                    1 => 'Integración de pasarelas locales e internacionales sin fricción',
                ],
                'is_featured' => true,
                'order' => 11,
                'meta_title' => 'Barrio Bravo Merch Oficial - Tienda Online Internacional | REW',
                'meta_description' => 'Desarrollo de tienda WooCommerce con envíos internacionales DHL para Barrio Bravo por REW.',
            ],
            11 => [
                'title' => 'Matías Chinaski (Merch Oficial)',
                'slug' => 'matias-chinaski',
                'client' => 'Matías Chinaski / Sotemono Merch',
                'category' => 'E-Commerce & Música Urbana',
                'project_date' => '2024-04-18',
                'summary' => 'Plataforma de venta oficial de merchandising y música para el destacado artista chileno Matías Chinaski.',
                'full_description' => 'Desarrollo de tienda online WooCommerce customizada para Matías Chinaski (sotemono.com). Soporta lanzamientos de stock limitado (drops), pasarelas de pago Mercado Pago y PayPal, y cálculo de tarifas de courier internacional DHL en tiempo real.',
                'status' => 'Finalizado',
                'project_url' => 'https://sotemono.com/',
                'technologies' => 'WordPress, WooCommerce, Mercado Pago, PayPal, DHL Express, JavaScript, CSS3',
                'role' => 'Desarrollo E-Commerce Customizado, Integración Mercado Pago & PayPal, Envíos Internacionales DHL',
                'featured_image' => '/images/portfolio/matias_chinaski.webp',
                'gallery' => [
                    0 => '/images/portfolio/matias_chinaski.webp',
                ],
                'results' => [
                    0 => 'Agotamiento de drops en menos de 2 horas con tráfico concurrente',
                    1 => 'Cero fallas en procesamiento de pagos transfronterizos',
                ],
                'is_featured' => true,
                'order' => 12,
                'meta_title' => 'Matías Chinaski Merch Oficial - E-Commerce | REW',
                'meta_description' => 'Tienda WooCommerce personalizada con envíos DHL para Matías Chinaski por REW.',
            ],
            12 => [
                'title' => 'Academiaflix (UDD)',
                'slug' => 'academiaflix',
                'client' => 'Universidad del Desarrollo (UDD) / Academiaflix',
                'category' => 'EdTech & E-Learning',
                'project_date' => '2023-11-15',
                'summary' => 'Plataforma educativa con WooCommerce conectada bidireccionalmente con Salesforce y el sistema integrado de la UDD.',
                'full_description' => 'Desarrollo e integración tecnológica para Academiaflix (academiaflix.rew.cl / UDD). Conexión de catálogo de cursos y suscripciones WooCommerce con Salesforce CRM y APIs institucionales de la Universidad del Desarrollo para sincronización instantánea de alumnos, matrículas y certificados.',
                'status' => 'Finalizado',
                'project_url' => 'https://academiaflix.rew.cl/',
                'technologies' => 'WordPress, WooCommerce, Salesforce REST API, Sistema Integrado UDD, PHP, Webhooks',
                'role' => 'Arquitectura de Software, Conexión WooCommerce + Salesforce, Integración Sistema UDD',
                'featured_image' => '/images/portfolio/academiaflix.webp',
                'gallery' => [
                    0 => '/images/portfolio/academiaflix.webp',
                ],
                'results' => [
                    0 => 'Sincronización automática de matrículas en Salesforce en menos de 3 segundos',
                    1 => 'Acceso unificado para miles de estudiantes universitarios',
                ],
                'is_featured' => true,
                'order' => 13,
                'meta_title' => 'Academiaflix - Integración WooCommerce, Salesforce y UDD | REW',
                'meta_description' => 'Integración tecnológica de WooCommerce con Salesforce y sistema UDD para Academiaflix por REW.',
            ],
            13 => [
                'title' => 'Otro Día en la Oficina (Modelo Sapiens)',
                'slug' => 'otro-dia-en-la-oficina',
                'client' => 'Modelo Sapiens / Otro Día en la Oficina',
                'category' => 'Desarrollo de Software & Interactividad',
                'project_date' => '2023-08-20',
                'summary' => 'Aplicación web interactiva desarrollada a medida en CodeIgniter con simulación de piano dinámico accionado con el teclado.',
                'full_description' => 'Desarrollo de software y frontend interactivo a medida en CodeIgniter para la obra y propuesta "Otro Día en la Oficina" (otrodiaenlaoficina.cl) de Modelo Sapiens. Incluye sintetizador y piano interactivo accionado mediante las teclas del teclado físico del usuario con animación fluida en Canvas/JavaScript, todo customizado desde la idea que entregó el cliente.',
                'status' => 'Finalizado',
                'project_url' => 'https://otrodiaenlaoficina.cl/',
                'technologies' => 'CodeIgniter (PHP), Web Audio API, JavaScript ES6, HTML5 Canvas, CSS3 Avanzado',
                'role' => 'Desarrollo de Software en CodeIgniter, Programación de Piano Dinámico Interactivo con Teclado, Desarrollo Customizado',
                'featured_image' => '/images/portfolio/otro_dia_en_la_oficina.webp',
                'gallery' => [
                    0 => '/images/portfolio/otro_dia_en_la_oficina.webp',
                ],
                'results' => [
                    0 => 'Experiencia artística sonora 100% interactiva sin dependencias pesadas',
                    1 => 'Respuesta sonora en tiempo real con latencia inferior a 15ms',
                ],
                'is_featured' => true,
                'order' => 14,
                'meta_title' => 'Otro Día en la Oficina - Software Interactivo CodeIgniter | REW',
                'meta_description' => 'Desarrollo de aplicación web con piano dinámico interactivo en CodeIgniter por REW.',
            ],
        ];

        foreach ($projects as $proj) {
            PortfolioProject::updateOrCreate(['slug' => $proj['slug']], $proj);
        }

        // 4. Servicios Profesionales
        $services = [
            [
                'name' => 'Desarrollo Web Profesional',
                'slug' => 'desarrollo-web',
                'icon' => 'globe',
                'tagline' => 'Sitios web modernos, veloces y diseñados estratégicamente para convertir visitantes en clientes.',
                'description' => 'En REW creamos sitios web corporativos, landing pages de alta conversión y tiendas WooCommerce a medida. Cada proyecto combina arquitectura técnica de alto rendimiento, optimización SEO desde la primera línea de código y diseño centrado en el usuario.',
                'features' => [
                    'Diseño 100% responsivo y adaptado a móviles y tablets',
                    'Velocidad de carga extrema (Core Web Vitals en verde)',
                    'Panel de administración intuitivo y fácil de gestionar',
                    'Integración con WhatsApp, formularios inteligentes y CRM',
                    'Seguridad reforzada y certificados SSL automáticos',
                ],
                'process_steps' => [
                    ['step' => '1', 'title' => 'Diagnóstico & Estrategia', 'desc' => 'Estudiamos tu mercado, competencia y objetivos comerciales.'],
                    ['step' => '2', 'title' => 'Diseño UX/UI & Prototipo', 'desc' => 'Diseñamos la estructura visual y experiencia de usuario.'],
                    ['step' => '3', 'title' => 'Desarrollo & Optimización', 'desc' => 'Programamos con estándares limpios, SEO y máxima velocidad.'],
                    ['step' => '4', 'title' => 'Lanzamiento & Capacitación', 'desc' => 'Despliegue en producción, pruebas y entrega de manuales.'],
                ],
                'meta_title' => 'Agencia de Diseño y Desarrollo Web en Chile | REW',
                'meta_description' => 'Desarrollo de sitios web profesionales, tiendas WooCommerce y landing pages de alta conversión en Chile.',
            ],
            [
                'name' => 'Desarrollo de Software en Chile',
                'slug' => 'desarrollo-de-software-chile',
                'icon' => 'terminal',
                'tagline' => 'Plataformas web a medida, SaaS, sistemas de gestión e integraciones API con Laravel.',
                'description' => 'Como empresa de desarrollo de software liderada por ingenieros informáticos, diseñamos y construimos sistemas robustos, escalables y seguros para automatizar procesos, digitalizar operaciones y crear nuevos modelos de negocio digitales.',
                'features' => [
                    'Sistemas ERP, CRM y portales internos a medida',
                    'Desarrollo de plataformas SaaS con suscripciones',
                    'Integración de APIs bancarias, logísticas y pasarelas de pago',
                    'Arquitectura en Laravel, bases de datos relacionales y microservicios',
                    'Fábrica de software ágil con entregas por sprints',
                ],
                'process_steps' => [
                    ['step' => '1', 'title' => 'Levantamiento de Requerimientos', 'desc' => 'Mapeamos los flujos de negocio y arquitectura técnica.'],
                    ['step' => '2', 'title' => 'Diseño de Base de Datos y APIs', 'desc' => 'Estructura modular lista para escalar.'],
                    ['step' => '3', 'title' => 'Desarrollo Iterativo (Sprints)', 'desc' => 'Entregables funcionales con feedback constante.'],
                    ['step' => '4', 'title' => 'Hardening y Go-Live', 'desc' => 'Pruebas de carga, seguridad y despliegue continuo.'],
                ],
                'meta_title' => 'Empresa de Desarrollo de Software a Medida en Chile | REW',
                'meta_description' => 'Desarrollo de software en Chile con Laravel, SaaS, sistemas a medida y automatización de procesos empresariales.',
            ],
            [
                'name' => 'SEO: Posicionamiento en Google & GEO',
                'slug' => 'optimizacion-seo',
                'icon' => 'trending-up',
                'tagline' => 'Posiciona tu empresa en los primeros lugares de Google y en motores de búsqueda de IA.',
                'description' => 'Agencia SEO en Chile orientada a resultados comerciales reales. Optimizamos tu arquitectura técnica, generamos contenido semántico estratégico y preparamos tu sitio para GEO (Generative Engine Optimization para ChatGPT, Claude y Gemini).',
                'features' => [
                    'Auditoría SEO técnica completa y corrección de errores de rastreo',
                    'Investigación de palabras clave con intención transaccional',
                    'Optimización On-Page y contenido semántico estructurado',
                    'Estrategia de Link Building ético y autoridad de dominio',
                    'Optimización para IA (llms.txt, Schema JSON-LD y GEO)',
                ],
                'meta_title' => 'Agencia SEO en Chile | Posicionamiento Web Profesional | REW',
                'meta_description' => 'Especialistas en SEO técnico, contenido estratégico y posicionamiento web en Google para empresas y ecommerce en Chile.',
            ],
            [
                'name' => 'Publicidad Digital & Inbound Marketing',
                'slug' => 'publicidad-digital',
                'icon' => 'target',
                'tagline' => 'Campañas de alto rendimiento en Google Ads y Meta Ads combinadas con embudos inbound.',
                'description' => 'Maximizamos el retorno de inversión (ROAS) de tu presupuesto publicitario mediante segmentación avanzada, copy persuasivo, diseño de anuncios de alto impacto y páginas de aterrizaje optimizadas para convertir clics en clientes.',
                'features' => [
                    'Campañas en Google Search, Display, YouTube y Performance Max',
                    'Anuncios en Meta Ads (Instagram y Facebook con segmentación láser)',
                    'Embudos de venta automatizados y retargeting inteligente',
                    'Medición precisa de conversiones y analítica con Google Analytics 4',
                    'Informes transparentes con métricas de costo por adquisición (CPA)',
                ],
                'meta_title' => 'Publicidad Digital y Google Ads en Chile | REW',
                'meta_description' => 'Gestión profesional de campañas en Google Ads, Meta Ads y estrategias de Inbound Marketing.',
            ],
            [
                'name' => 'Mantenimiento & Rendimiento Web',
                'slug' => 'mantenimiento-web',
                'icon' => 'shield-check',
                'tagline' => 'Tu sitio web seguro, actualizado y funcionando a máxima velocidad las 24 horas del día.',
                'description' => 'Planes integrales de mantenimiento preventivo y correctivo para empresas que no pueden permitirse caídas, fallos de seguridad o lentitud en sus plataformas digitales.',
                'features' => [
                    'Monitoreo de uptime y disponibilidad 24/7',
                    'Copias de seguridad diarias automatizadas en la nube',
                    'Actualización segura de plugins, temas y núcleo',
                    'Optimización continua de velocidad y base de datos',
                    'Soporte técnico prioritario y resolución de emergencias',
                ],
                'meta_title' => 'Planes de Mantenimiento Web y Soporte en Chile | REW',
                'meta_description' => 'Mantenimiento web profesional, respaldos diarios, seguridad y optimización de velocidad continua.',
            ],
            [
                'name' => 'Soporte Especializado WordPress',
                'slug' => 'soporte-wordpress',
                'icon' => 'layers',
                'tagline' => 'Expertos en WordPress y WooCommerce para resolver problemas complejos y escalar tu web.',
                'description' => 'Diagnóstico y reparación de errores críticos (pantalla blanca, conflictos de plugins, errores de base de datos), migración segura entre servidores y desarrollo de funcionalidades personalizadas.',
                'features' => [
                    'Resolución de errores de plugins y compatibilidad PHP',
                    'Desinfección de malware y blindaje de seguridad',
                    'Migraciones sin tiempo de inactividad entre servidores',
                    'Optimización de WooCommerce para catálogos masivos',
                    'Desarrollo de plugins y hooks a medida',
                ],
                'meta_title' => 'Soporte Técnico Especializado en WordPress y WooCommerce | REW',
                'meta_description' => 'Servicio técnico especializado en WordPress en Chile. Solución de errores, migraciones y optimización.',
            ],
            [
                'name' => 'Diseño UX / UI y Prototipado',
                'slug' => 'diseno-ux-ui',
                'icon' => 'figma',
                'tagline' => 'Diseños de interfaz intuitivos, modernos y validados para maximizar la satisfacción del usuario.',
                'description' => 'Diseñamos experiencias digitales memorables que combinan belleza estética, usabilidad rigurosa y psicología del consumidor para aumentar la retención y la tasa de conversión de tus productos digitales.',
                'features' => [
                    'Investigación de usuarios, mapas de empatía y user journeys',
                    'Wireframes interactivos y prototipos navegables en Figma',
                    'Sistemas de diseño consistentes (Design Systems)',
                    'Diseño responsive y pruebas de usabilidad',
                    'Hand-off impecable listo para desarrollo',
                ],
                'meta_title' => 'Diseño UX/UI y Experiencia de Usuario en Chile | REW',
                'meta_description' => 'Servicios de diseño UX/UI, prototipado en Figma y sistemas de diseño centrados en conversión.',
            ],
        ];

        foreach ($services as $srv) {
            Service::updateOrCreate(['slug' => $srv['slug']], $srv);
        }

        // 5. Artículos de Blog / Knowledge Hub
        $postsExportFile = __DIR__.'/posts_export.json';
        if (file_exists($postsExportFile)) {
            $posts = json_decode(file_get_contents($postsExportFile), true);
            foreach ($posts as $post) {
                unset($post['id'], $post['created_at'], $post['updated_at']);
                Post::updateOrCreate(['slug' => $post['slug']], $post);
            }
        }

        // 7. Administrador Oficial (Álvaro Valenzuela)
        User::updateOrCreate(
            ['email' => 'alvaro@rew.cl'],
            [
                'name' => 'Álvaro Valenzuela Valdés',
                'password' => Hash::make('AdminRew2026!'),
                'email_verified_at' => now(),
            ]
        );

        // 8. Parámetros de Notificaciones y SMTP por defecto
        Setting::set('notification_email', 'alvaro@rew.cl', 'notifications');
        Setting::set('notification_whatsapp', '+56987261127', 'notifications');
        Setting::set('smtp_host', env('MAIL_HOST', 'smtp.mailtrap.io'), 'smtp');
        Setting::set('smtp_port', env('MAIL_PORT', '2525'), 'smtp');
        Setting::set('smtp_username', env('MAIL_USERNAME', ''), 'smtp');
        Setting::set('smtp_password', env('MAIL_PASSWORD', ''), 'smtp');
        Setting::set('smtp_encryption', env('MAIL_ENCRYPTION', 'tls'), 'smtp');
        Setting::set('mail_from_address', 'alvaro@rew.cl', 'smtp');
        Setting::set('mail_from_name', 'REW Chile', 'smtp');

        // 9. Base de Conocimiento de Rich-E AI (Entrenamiento RAG editable)
        $knowledgeItems = [
            [
                'question_or_topic' => '¿Quién lidera REW y cómo es la atención?',
                'answer_or_content' => 'REW es una agencia chilena de software e ingeniería web liderada por Álvaro Valenzuela Valdés, Ingeniero Informático y Desarrollador con más de 6 años de experiencia. El trato es 100% directo con el Ingeniero Desarrollador, sin ejecutivos intermediarios ni demoras.',
                'category' => 'Empresa',
                'order' => 1,
            ],
            [
                'question_or_topic' => '¿Qué servicios ofrece REW?',
                'answer_or_content' => 'Ofrecemos 5 servicios principales: 1) Desarrollo de Software a Medida en Laravel y Vue/Blade; 2) Diseño Web & WooCommerce de alta conversión; 3) Optimización SEO y GEO (posicionamiento para Google y motores de IA como ChatGPT y Perplexity); 4) Publicidad Digital Inbound y Performance; 5) Mantenimiento y Soporte Especializado en WordPress.',
                'category' => 'Servicios',
                'order' => 2,
            ],
            [
                'question_or_topic' => '¿Qué es el plugin Rich-E Chatbot?',
                'answer_or_content' => 'Rich-E es nuestro asistente virtual inteligente con arquitectura RAG para WordPress y WooCommerce. Se entrena con los productos y FAQs de la tienda para responder consultas en lenguaje natural 24/7, recomendar productos y aumentar las ventas.',
                'category' => 'Plugins',
                'order' => 3,
            ],
            [
                'question_or_topic' => '¿Cuáles son los precios de los proyectos?',
                'answer_or_content' => 'Todos los precios mostrados en el cotizador son referenciales y se adaptan al alcance técnico del cliente. Sitios corporativos desde $350.000 CLP ($380 USD), tiendas e-commerce desde $550.000 CLP ($590 USD) y software a medida en Laravel a evaluar según requerimientos.',
                'category' => 'Precios',
                'order' => 4,
            ],
            [
                'question_or_topic' => '¿Cómo contactar para una cotización inmediata?',
                'answer_or_content' => 'Puedes escribirnos directamente a WhatsApp al +56 9 8726 1127 o al correo alvaro@rew.cl para agendar una reunión técnica o recibir una propuesta formal.',
                'category' => 'Contacto',
                'order' => 5,
            ],
        ];

        foreach ($knowledgeItems as $ki) {
            RicheKnowledgeBase::updateOrCreate(
                ['question_or_topic' => $ki['question_or_topic']],
                $ki
            );
        }
    }
}
