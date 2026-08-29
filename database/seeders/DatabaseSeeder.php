<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\PortfolioProject;
use App\Models\Service;
use App\Models\Post;
use Illuminate\Database\Seeder;

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
                    'Actualizaciones de Seguridad y Soporte Especializado REW'
                ],
                'requirements' => [
                    'WordPress 6.0 o superior',
                    'WooCommerce 8.0 o superior',
                    'PHP 8.1 / 8.2 / 8.3',
                    'API Key de tu proveedor de IA preferido (OpenAI, Anthropic, Google o Groq)'
                ],
                'faqs' => [
                    ['q' => '¿Qué modelos de Inteligencia Artificial soporta?', 'a' => 'Es compatible con OpenAI (GPT-4o, GPT-4o-mini), Anthropic (Claude 3.5 Sonnet), Google Gemini (1.5 Flash/Pro), Groq y DeepSeek. Tú usas tu propia API Key y pagas centavos por consumo real.'],
                    ['q' => '¿Cómo evita las alucinaciones en los precios y stock?', 'a' => 'Utiliza consultas vectoriales RAG en tiempo real directo a la base de datos de WooCommerce, asegurando que sólo informe precios, variaciones y stock 100% verídicos.'],
                    ['q' => '¿Incluye soporte en la instalación?', 'a' => 'Sí, el pack pro cuenta con soporte técnico prioritario guiado por el equipo de ingeniería de REW.']
                ],
                'is_featured' => true,
                'version' => '2.4.0',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2026/06/riche_product_mockup_1780448218998.jpg',
                'meta_title' => 'Pack Chatbot E-Commerce Pro – Licencia Anual | REW',
                'meta_description' => 'Asistente virtual de Inteligencia Artificial para WordPress y WooCommerce. Sincroniza catálogo, responde consultas 24/7 y aumenta ventas.'
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
                    'Marca blanca y modo privado'
                ],
                'requirements' => [
                    'WordPress 5.8+',
                    'PHP 7.4 a 8.3',
                    'Cualquier hosting estándar con cURL activado'
                ],
                'faqs' => [
                    ['q' => '¿Puedo cambiar la apariencia del chatbot?', 'a' => 'Totalmente. Puedes personalizar avatar, colores corporativos, tipografía, textos de bienvenida, sugerencias de preguntas rápidas y sonido.'],
                    ['q' => '¿Funciona en sitios en español e inglés?', 'a' => 'Detecta automáticamente el idioma del usuario y responde con fluidez nativa en más de 95 idiomas.']
                ],
                'is_featured' => true,
                'version' => '2.4.0',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2026/05/rich-e-main-logo.png',
                'meta_title' => 'Rich-E Chatbot Assistant para WordPress | REW',
                'meta_description' => 'El mejor chatbot de inteligencia artificial RAG para WordPress. Cero alucinaciones, respuestas instantáneas y captura de leads 24/7.'
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
                    'Compatible con pasarelas de pago Webpay Plus, MercadoPago, PayPal y Stripe'
                ],
                'requirements' => [
                    'Rich-E Chatbot Assistant activo',
                    'WooCommerce 7.0+'
                ],
                'faqs' => [
                    ['q' => '¿Qué ocurre si cambio el precio o stock de un producto?', 'a' => 'La IA consulta la base de datos de WooCommerce en vivo, por lo que el cambio se refleja inmediatamente en las respuestas del bot.']
                ],
                'is_featured' => true,
                'version' => '1.3.0',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2026/05/Gemini_Generated_Image_r9d696r9d696r9d6.png',
                'meta_title' => 'Addon WooCommerce Premium Sync para Chatbot IA | REW',
                'meta_description' => 'Sincroniza tu catálogo WooCommerce con Inteligencia Artificial. Cierra ventas automáticas en el chat.'
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
                    'Cero costos mensuales recurrentes de traducción externa'
                ],
                'requirements' => [
                    'WordPress 5.6+',
                    'WooCommerce 6.0+'
                ],
                'faqs' => [
                    ['q' => '¿Puedo cobrar en dólares en PayPal y en pesos chilenos en Webpay?', 'a' => 'Sí, el plugin detecta la pasarela y convierte la orden a la moneda correspondiente de forma transparente para el cliente.']
                ],
                'is_featured' => true,
                'version' => '1.1.0',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2026/06/product_banner_rew.png',
                'meta_title' => 'REW Multi-Currency & Translator Pro para WooCommerce',
                'meta_description' => 'Cambio de divisas CLP/USD en tiempo real y traducción multi-idioma para tiendas WooCommerce.'
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
                    'Control granular de categorías de blog a indexar'
                ],
                'requirements' => ['Rich-E Chatbot Assistant activo'],
                'faqs' => [
                    ['q' => '¿Indexa posts antiguos?', 'a' => 'Sí, cuenta con un botón de sincronización masiva con un clic.']
                ],
                'is_featured' => false,
                'version' => '1.2.0',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2026/05/blog-addon.png',
                'meta_title' => 'Addon Indexación Semántica de Blog | REW',
                'meta_description' => 'Convierte los artículos de tu blog en conocimiento de IA para tu chatbot de WordPress.'
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
                    'Actualización reactiva ante cambios'
                ],
                'requirements' => ['Rich-E Chatbot Assistant activo'],
                'faqs' => [
                    ['q' => '¿Funciona con ACF Pro?', 'a' => 'Sí, extrae texto, selectores, repetidores y campos estructurados.']
                ],
                'is_featured' => false,
                'version' => '1.2.0',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2026/05/license-pack.png',
                'meta_title' => 'Addon Integración de Custom Post Types (CPT) | REW',
                'meta_description' => 'Integra campos personalizados ACF y Custom Post Types en el conocimiento del chatbot.'
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
                    'Garantía de rendimiento y cero alucinaciones'
                ],
                'requirements' => ['Licencia activa de cualquier plugin REW'],
                'faqs' => [
                    ['q' => '¿Cuánto tarda la implementación?', 'a' => 'El setup inicial se completa en 24 a 48 horas hábiles.']
                ],
                'is_featured' => false,
                'version' => '1.0.0',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2026/05/support-addon.png',
                'meta_title' => 'Soporte Premium e Integración de IA | REW',
                'meta_description' => 'Acompañamiento e integración experta para soluciones de inteligencia artificial en WordPress.'
            ],
        ];

        foreach ($products as $prod) {
            Product::updateOrCreate(['slug' => $prod['slug']], $prod);
        }

        // 3. Proyectos del Portafolio
        $projects = [
            [
                'title' => 'Artífices TV',
                'slug' => 'artifices-tv',
                'client' => 'Artífices TV',
                'category' => 'Streaming & Media',
                'project_date' => '2024-06-05',
                'summary' => 'Plataforma web de streaming, conectividad y contenidos audiovisuales con diseño de vanguardia y experiencia inmersiva.',
                'full_description' => 'Se desarrolló el sitio web de Artífices TV desde cero en colaboración con diseño gráfico y estrategia de inbound marketing. El objetivo fue crear una plataforma atractiva, moderna y alineada con la identidad visual de la marca, asegurando una experiencia envolvente, rápida y funcional para los usuarios del ecosistema streaming.',
                'status' => 'Finalizado',
                'project_url' => 'https://artifices.tv/',
                'technologies' => 'WordPress, WooCommerce, Elementor, Photoshop, Adobe Illustrator, PHP',
                'role' => 'Desarrollo Web, Diseñador UX/UI, Estratega Inbound Marketing, Estrategia de Contenidos',
                'featured_image' => '/images/portfolio/artifices-tv-full.png',
                'gallery' => [
                    '/images/portfolio/artifices-tv-full.png',
                    'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-020-ARTIFICES-TV-–-EXPERTOS-EN-STREAMING-Y-CONECTIVIDAD-artifices.tv_.png'
                ],
                'results' => [
                    'Incremento del 180% en visualizaciones de stream',
                    'Diseño 100% responsivo y optimización de carga ultrarrápida',
                    'Arquitectura modular para nuevos lanzamientos'
                ],
                'is_featured' => true,
                'order' => 1,
                'meta_title' => 'Artífices TV - Caso de Éxito en Desarrollo Web | REW',
                'meta_description' => 'Diseño y desarrollo web para Artífices TV: plataforma moderna de streaming y conectividad creada por REW.'
            ],
            [
                'title' => 'CODIGO25',
                'slug' => 'codigo25',
                'client' => 'CODIGO 25',
                'category' => 'E-Commerce & Branding',
                'project_date' => '2024-04-12',
                'summary' => 'Plataforma e-commerce y marca digital para indumentaria y accesorios de profesionales.',
                'full_description' => 'Desarrollo integral de plataforma e-commerce con catálogo interactivo, integración de pasarelas de pago chilenas y flujo de compra optimizado para máxima conversión.',
                'status' => 'Finalizado',
                'project_url' => 'https://codigo25.cl/',
                'technologies' => 'WordPress, WooCommerce, Webpay Plus, CSS3, JavaScript',
                'role' => 'Desarrollo Web Full Stack, Optimización de Conversión, SEO On-Page',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-019-CODIGO-25-–-UNA-NUEVA-MARCA-PARA-PROFESIONALES-codigo25.cl_.png',
                'gallery' => [
                    'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-019-CODIGO-25-–-UNA-NUEVA-MARCA-PARA-PROFESIONALES-codigo25.cl_.png'
                ],
                'results' => [
                    'Tasa de conversión superior al 3.8%',
                    'Integración de pagos automatizada con Webpay y Transferencia'
                ],
                'is_featured' => true,
                'order' => 2,
                'meta_title' => 'CODIGO25 - Tienda Online y Branding | REW',
                'meta_description' => 'Desarrollo de e-commerce de alto rendimiento para CODIGO25.'
            ],
            [
                'title' => 'Cuarteto de Nos (Merch Oficial)',
                'slug' => 'cuarteto-de-nos',
                'client' => 'Cuarteto de Nos / Sotemono',
                'category' => 'E-Commerce Musical',
                'project_date' => '2023-11-20',
                'summary' => 'Tienda online oficial de merchandising para la reconocida banda internacional de rock Cuarteto de Nos.',
                'full_description' => 'Arquitectura para alta concurrencia durante fechas de conciertos y giras internacionales. Gestión de stock sincronizado, preventas exclusivas y experiencia de compra optimizada para móviles.',
                'status' => 'Finalizado',
                'project_url' => 'https://sotemono.com/',
                'technologies' => 'WordPress, WooCommerce, Cloudflare CDN, Redis Cache, Webpay Plus',
                'role' => 'Arquitectura Web, Optimización de Alto Tráfico, UX/UI',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-014-CUARTETO-DE-NOS-Cuarteto-de-Nos-Merch-Web-Oficial-sotemono.com_.png',
                'gallery' => [
                    'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-014-CUARTETO-DE-NOS-Cuarteto-de-Nos-Merch-Web-Oficial-sotemono.com_.png'
                ],
                'results' => [
                    'Capacidad para picos de más de 50.000 visitas simultáneas',
                    'Cero caídas durante lanzamientos de merchandising'
                ],
                'is_featured' => true,
                'order' => 3,
                'meta_title' => 'Cuarteto de Nos - Tienda Oficial de Merchandising | REW',
                'meta_description' => 'Desarrollo de tienda online para la banda internacional Cuarteto de Nos.'
            ],
            [
                'title' => 'Los Auténticos Decadentes (Merch Oficial)',
                'slug' => 'autenticos-decadentes',
                'client' => 'Los Auténticos Decadentes',
                'category' => 'E-Commerce Musical',
                'project_date' => '2023-09-15',
                'summary' => 'Tienda web oficial de merchandising para la emblemática banda Los Auténticos Decadentes.',
                'full_description' => 'Desarrollo de plataforma e-commerce con venta de indumentaria oficial, vinilos y accesorios con envíos a todo el territorio nacional e internacional.',
                'status' => 'Finalizado',
                'project_url' => 'https://sotemono.com/',
                'technologies' => 'WordPress, WooCommerce, Webpay Plus, MercadoPago',
                'role' => 'Desarrollo E-Commerce, UX/UI, Integración Logística',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-012-Los-Autenticos-Decadentes-–-Merch-Web-Oficial-sotemono.com_.png',
                'gallery' => [
                    'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-012-Los-Autenticos-Decadentes-–-Merch-Web-Oficial-sotemono.com_.png'
                ],
                'results' => [
                    'Venta masiva de colecciones especiales en giras',
                    'Logística automatizada con generación de etiquetas de envío'
                ],
                'is_featured' => true,
                'order' => 4,
                'meta_title' => 'Los Auténticos Decadentes - Merch Oficial | REW',
                'meta_description' => 'Plataforma oficial de merchandising para Los Auténticos Decadentes desarrollada por REW.'
            ],
            [
                'title' => 'Sotemono',
                'slug' => 'sotemono',
                'client' => 'Sotemono',
                'category' => 'E-Commerce & Hub de Artistas',
                'project_date' => '2023-08-10',
                'summary' => 'Plataforma matriz de merchandising oficial y producción para artistas y bandas internacionales.',
                'full_description' => 'Ecosistema multi-tienda que centraliza el catálogo, inventario y pasarelas de pago de diversos artistas latinoamericanos bajo una experiencia unificada.',
                'status' => 'Finalizado',
                'project_url' => 'https://sotemono.com/',
                'technologies' => 'WordPress, WooCommerce Multi-Store, PHP, Laravel Integrations',
                'role' => 'Líder de Desarrollo, Arquitectura de Sistemas, Inbound Marketing',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-010-HOME-Sotemono-Merch-Web-Oficial-sotemono.com_.png',
                'gallery' => [
                    'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-010-HOME-Sotemono-Merch-Web-Oficial-sotemono.com_.png'
                ],
                'results' => [
                    'Centralización de más de 10 bandas y artistas',
                    'Aumento del 220% en ventas consolidadas'
                ],
                'is_featured' => true,
                'order' => 5,
                'meta_title' => 'Sotemono - Plataforma de Merchandising de Artistas | REW',
                'meta_description' => 'Desarrollo de plataforma centralizada de merchandising para artistas musicales.'
            ],
            [
                'title' => 'Matías Chinaski (Merch Oficial)',
                'slug' => 'matias-chinaski',
                'client' => 'Matías Chinaski',
                'category' => 'E-Commerce Musical',
                'project_date' => '2023-05-18',
                'summary' => 'Tienda online oficial para el destacado artista y poeta urbano Matías Chinaski.',
                'full_description' => 'Diseño con estética underground y cuidada, venta de libros, vinilos, cassettes y prendas exclusivas.',
                'status' => 'Finalizado',
                'project_url' => 'https://sotemono.com/',
                'technologies' => 'WordPress, WooCommerce, Custom CSS, Webpay',
                'role' => 'Desarrollo Web, Diseño Gráfico, Estrategia Digital',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-016-Matias-Chinaski-–-Merch-Web-Oficial-sotemono.com_.png',
                'gallery' => [
                    'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-016-Matias-Chinaski-–-Merch-Web-Oficial-sotemono.com_.png'
                ],
                'results' => ['Sold-out de ediciones limitadas en menos de 48 horas'],
                'is_featured' => false,
                'order' => 6,
                'meta_title' => 'Matías Chinaski - Web y Tienda Oficial | REW',
                'meta_description' => 'Desarrollo web y tienda online para el artista Matías Chinaski.'
            ],
            [
                'title' => 'Barrio Bravo',
                'slug' => 'barrio-bravo',
                'client' => 'Barrio Bravo',
                'category' => 'Editorial & E-Commerce',
                'project_date' => '2023-03-22',
                'summary' => 'Tienda oficial para la icónica marca y proyecto literario futbolero Barrio Bravo.',
                'full_description' => 'Desarrollo de plataforma de venta para libros, pósters y colecciones con alta fidelización de comunidad lectora.',
                'status' => 'Finalizado',
                'project_url' => 'https://sotemono.com/',
                'technologies' => 'WordPress, WooCommerce, Elementor Pro',
                'role' => 'Desarrollo Web, Campañas Inbound Marketing',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-013-Barrio-Bravo-Merch-Oficial-2022-sotemono.com_.png',
                'gallery' => [
                    'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-013-Barrio-Bravo-Merch-Oficial-2022-sotemono.com_.png'
                ],
                'results' => ['Más de 10.000 ejemplares distribuidos a través de la web'],
                'is_featured' => false,
                'order' => 7,
                'meta_title' => 'Barrio Bravo - Tienda Oficial | REW',
                'meta_description' => 'Desarrollo de tienda online para el proyecto literario Barrio Bravo.'
            ],
            [
                'title' => 'Academiaflix',
                'slug' => 'academiaflix',
                'client' => 'Academiaflix',
                'category' => 'E-Learning & SaaS',
                'project_date' => '2023-01-14',
                'summary' => 'Plataforma de cursos online y suscripciones educativas con aula virtual y certificados.',
                'full_description' => 'Implementación de LMS escalable con pasarela de suscripciones mensuales, seguimiento de progreso y streaming de video protegido.',
                'status' => 'Finalizado',
                'project_url' => 'https://academiaflix.rew.cl/',
                'technologies' => 'WordPress, LearnDash, WooCommerce Subscriptions, Vimeo API',
                'role' => 'Arquitectura LMS, Desarrollo Web, Integración de Pasarelas',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-003-Academiaflix-academiaflix.rew_.cl_.png',
                'gallery' => [
                    'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-003-Academiaflix-academiaflix.rew_.cl_.png'
                ],
                'results' => ['Más de 1.500 alumnos activos capacitándose en línea'],
                'is_featured' => true,
                'order' => 8,
                'meta_title' => 'Academiaflix - Plataforma de Cursos Online | REW',
                'meta_description' => 'Desarrollo de plataforma educativa LMS para Academiaflix.'
            ],
            [
                'title' => 'JJ Estética',
                'slug' => 'jjestetica',
                'client' => 'JJ Estética Clínica',
                'category' => 'Salud & Estética',
                'project_date' => '2022-11-05',
                'summary' => 'Sitio corporativo y sistema de agendamiento online para clínica de estética integral.',
                'full_description' => 'Diseño limpio y minimalista con catálogo de tratamientos, testimonios, galería antes/después y módulo de reservas conectado a WhatsApp.',
                'status' => 'Finalizado',
                'project_url' => 'https://jjestetica.cl/',
                'technologies' => 'WordPress, Elementor, Booking System, WhatsApp API',
                'role' => 'Diseño UX/UI, Desarrollo Web, SEO Local',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-017-Home-JJ-ESTETICA-jjestetica.cl_.png',
                'gallery' => [
                    'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-017-Home-JJ-ESTETICA-jjestetica.cl_.png'
                ],
                'results' => ['Aumento del 140% en reservas de citas desde Google'],
                'is_featured' => false,
                'order' => 9,
                'meta_title' => 'JJ Estética - Clínica Estética Web | REW',
                'meta_description' => 'Desarrollo de sitio web corporativo y reservas para clínica JJ Estética.'
            ],
            [
                'title' => 'Otro Día en la Oficina',
                'slug' => 'otro-dia-en-la-oficina',
                'client' => 'Modelo Sapiens',
                'category' => 'Podcast & Media',
                'project_date' => '2022-08-30',
                'summary' => 'Plataforma de contenidos, episodios y recursos para comunidad de profesionales y emprendimiento.',
                'full_description' => 'Portal con reproductor de audio integrado, blog de liderazgo y formulario de suscripción a newsletter automatizada.',
                'status' => 'Finalizado',
                'project_url' => 'https://otrodiaenlaoficina.cl/',
                'technologies' => 'WordPress, Spotify API, Mailchimp, TailwindCSS',
                'role' => 'Desarrollo Web, Inbound Marketing, Integración Podcast',
                'featured_image' => 'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-018-Otro-dia-en-la-oficina-Modelo-Sapiens-otrodiaenlaoficina.cl_.png',
                'gallery' => [
                    'https://rew.cl/wp-content/uploads/2025/03/FireShot-Capture-018-Otro-dia-en-la-oficina-Modelo-Sapiens-otrodiaenlaoficina.cl_.png'
                ],
                'results' => ['Crecimiento de la comunidad a más de 5.000 suscriptores'],
                'is_featured' => false,
                'order' => 10,
                'meta_title' => 'Otro Día en la Oficina - Plataforma de Contenidos | REW',
                'meta_description' => 'Diseño y desarrollo web para la comunidad y podcast Otro Día en la Oficina.'
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
                    'Seguridad reforzada y certificados SSL automáticos'
                ],
                'process_steps' => [
                    ['step' => '1', 'title' => 'Diagnóstico & Estrategia', 'desc' => 'Estudiamos tu mercado, competencia y objetivos comerciales.'],
                    ['step' => '2', 'title' => 'Diseño UX/UI & Prototipo', 'desc' => 'Diseñamos la estructura visual y experiencia de usuario.'],
                    ['step' => '3', 'title' => 'Desarrollo & Optimización', 'desc' => 'Programamos con estándares limpios, SEO y máxima velocidad.'],
                    ['step' => '4', 'title' => 'Lanzamiento & Capacitación', 'desc' => 'Despliegue en producción, pruebas y entrega de manuales.']
                ],
                'meta_title' => 'Agencia de Diseño y Desarrollo Web en Chile | REW',
                'meta_description' => 'Desarrollo de sitios web profesionales, tiendas WooCommerce y landing pages de alta conversión en Chile.'
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
                    'Fábrica de software ágil con entregas por sprints'
                ],
                'process_steps' => [
                    ['step' => '1', 'title' => 'Levantamiento de Requerimientos', 'desc' => 'Mapeamos los flujos de negocio y arquitectura técnica.'],
                    ['step' => '2', 'title' => 'Diseño de Base de Datos y APIs', 'desc' => 'Estructura modular lista para escalar.'],
                    ['step' => '3', 'title' => 'Desarrollo Iterativo (Sprints)', 'desc' => 'Entregables funcionales con feedback constante.'],
                    ['step' => '4', 'title' => 'Hardening y Go-Live', 'desc' => 'Pruebas de carga, seguridad y despliegue continuo.']
                ],
                'meta_title' => 'Empresa de Desarrollo de Software a Medida en Chile | REW',
                'meta_description' => 'Desarrollo de software en Chile con Laravel, SaaS, sistemas a medida y automatización de procesos empresariales.'
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
                    'Optimización para IA (llms.txt, Schema JSON-LD y GEO)'
                ],
                'meta_title' => 'Agencia SEO en Chile | Posicionamiento Web Profesional | REW',
                'meta_description' => 'Especialistas en SEO técnico, contenido estratégico y posicionamiento web en Google para empresas y ecommerce en Chile.'
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
                    'Informes transparentes con métricas de costo por adquisición (CPA)'
                ],
                'meta_title' => 'Publicidad Digital y Google Ads en Chile | REW',
                'meta_description' => 'Gestión profesional de campañas en Google Ads, Meta Ads y estrategias de Inbound Marketing.'
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
                    'Soporte técnico prioritario y resolución de emergencias'
                ],
                'meta_title' => 'Planes de Mantenimiento Web y Soporte en Chile | REW',
                'meta_description' => 'Mantenimiento web profesional, respaldos diarios, seguridad y optimización de velocidad continua.'
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
                    'Desarrollo de plugins y hooks a medida'
                ],
                'meta_title' => 'Soporte Técnico Especializado en WordPress y WooCommerce | REW',
                'meta_description' => 'Servicio técnico especializado en WordPress en Chile. Solución de errores, migraciones y optimización.'
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
                    'Hand-off impecable listo para desarrollo'
                ],
                'meta_title' => 'Diseño UX/UI y Experiencia de Usuario en Chile | REW',
                'meta_description' => 'Servicios de diseño UX/UI, prototipado en Figma y sistemas de diseño centrados en conversión.'
            ],
        ];

        foreach ($services as $srv) {
            Service::updateOrCreate(['slug' => $srv['slug']], $srv);
        }

        // 5. Artículos de Blog
        $posts = [
            [
                'title' => 'Cómo integrar un Chatbot de IA con RAG en WordPress y WooCommerce sin Alucinaciones',
                'slug' => 'como-integrar-chatbot-ia-rag-wordpress-woocommerce',
                'excerpt' => 'Descubre cómo la arquitectura RAG (Retrieval-Augmented Generation) permite a los chatbots de WordPress consultar catálogos y documentos en tiempo real con 100% de precisión.',
                'content' => '<p>La inteligencia artificial ha evolucionado de simples respuestas predefinidas a asistentes contextuales capaces de cerrar ventas. En este artículo técnico, Álvaro Valenzuela Valdés explica cómo implementar <strong>Rich-E Chatbot</strong> para conectar tu catálogo WooCommerce con embeddings vectoriales, garantizando precios exactos y cero alucinaciones.</p>',
                'author_name' => 'Álvaro Valenzuela Valdés',
                'category' => 'Inteligencia Artificial',
                'read_time_minutes' => 6,
                'featured_image' => 'https://rew.cl/wp-content/uploads/2026/06/riche_product_mockup_1780448218998.jpg',
                'is_published' => true,
                'meta_title' => 'Chatbot de IA con RAG en WordPress | Guía Técnica REW',
                'meta_description' => 'Aprende a conectar IA con WooCommerce mediante arquitectura RAG para responder consultas y vender 24/7.'
            ],
            [
                'title' => 'GEO (Generative Engine Optimization): La evolución del SEO para la era de los LLMs',
                'slug' => 'geo-generative-engine-optimization-seo-para-llms',
                'excerpt' => 'El tráfico orgánico ya no proviene únicamente de las SERPs de Google: ChatGPT, Claude, Gemini y Perplexity están citando fuentes directamente. Aprende a optimizar con llms.txt.',
                'content' => '<p>El posicionamiento en buscadores está experimentando su mayor transformación en 20 años. En REW implementamos el protocolo <code>llms.txt</code> y datos estructurados JSON-LD enriquecidos para que los modelos de lenguaje reconozcan a tu empresa como la fuente de mayor autoridad en tu nicho.</p>',
                'author_name' => 'Álvaro Valenzuela Valdés',
                'category' => 'SEO & GEO',
                'read_time_minutes' => 7,
                'featured_image' => 'https://rew.cl/wp-content/uploads/2025/11/agencia-seo-chile-rew.jpg',
                'is_published' => true,
                'meta_title' => '¿Qué es GEO y cómo preparar tu web para ChatGPT y Perplexity? | REW',
                'meta_description' => 'Guía completa sobre Generative Engine Optimization (GEO) y cómo utilizar llms.txt para posicionar en IAs.'
            ],
            [
                'title' => 'Laravel vs WordPress: Cuándo elegir un Framework a Medida o un CMS para tu Proyecto',
                'slug' => 'laravel-vs-wordpress-cuando-elegir-cada-uno',
                'excerpt' => 'Analizamos el rendimiento, escalabilidad, costos de mantenimiento y flexibilidad de Laravel frente a WordPress para ayudarte a tomar la mejor decisión tecnológica.',
                'content' => '<p>Como desarrolladores de software e ingenieros informáticos en REW, trabajamos tanto con Laravel para plataformas complejas como con WordPress para sitios de contenidos ágiles. Comparamos los factores determinantes para seleccionar la arquitectura adecuada para tu negocio.</p>',
                'author_name' => 'Álvaro Valenzuela Valdés',
                'category' => 'Desarrollo de Software',
                'read_time_minutes' => 8,
                'featured_image' => 'https://rew.cl/wp-content/uploads/2025/11/empresa-desarrollo-software-chile-scaled.jpg',
                'is_published' => true,
                'meta_title' => 'Laravel vs WordPress: Guía de Arquitectura de Software | REW',
                'meta_description' => 'Comparativa técnica entre Laravel y WordPress para proyectos web empresariales.'
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(['slug' => $post['slug']], $post);
        }
    }
}
