<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Product::updateOrCreate(
            ['slug' => 'plugin-integracion-bsale-woocommerce'],
            [
                'name' => 'Plugin Bsale WooCommerce Sync Pro (Licencia Vitalicia)',
                'sku' => 'rew-bsale-woo-lifetime',
                'short_description' => 'Sincronización en tiempo real entre Bsale y WooCommerce. Stock multibodega, precios y emisión automática de boletas y facturas DTE ante el SII. Licencia vitalicia de un solo pago.',
                'description' => 'Conecta tu tienda WooCommerce con Bsale mediante API REST oficial con sincronización bidireccional inmediata. Descuenta inventario automáticamente en la sucursal asignada, sincroniza listas de precios y genera boletas y facturas electrónicas válidas ante el SII adjuntando el PDF al cliente. Licencia vitalicia (Lifetime) sin costos mensuales ni tarifas por documento emitido.',
                'price_usd' => 380.00,
                'price_clp' => 350000,
                'original_price_usd' => 480.00,
                'original_price_clp' => 450000,
                'badge' => 'PAGO ÚNICO • LIFETIME',
                'featured_image' => '/images/products/plugin_bsale_woocommerce.webp',
                'gallery' => null,
                'features' => [
                    'Licencia Vitalicia (Lifetime) – Un solo pago sin suscripciones ni mensualidades',
                    'Sincronización automática de stock multibodega en tiempo real',
                    'Emisión instantánea de Boletas y Facturas Electrónicas DTE ante el SII',
                    'Envío automático de PDF tributario adjunto en el correo de WooCommerce',
                    'Sincronización bidireccional de precios normales, ofertas y variaciones por SKU',
                    'Arquitectura asíncrona por colas para no ralentizar el checkout ni el sitio web',
                    'Compatible con Webpay Plus, Mercado Pago, Stripe y todas las pasarelas de pago',
                    'Soporte técnico directo e instalación asistida con Álvaro Valenzuela Valdés',
                ],
                'requirements' => [
                    'WordPress 5.8+ o superior',
                    'WooCommerce 6.0+ a 9.x',
                    'PHP 7.4 a 8.3',
                    'Plan activo en Bsale con acceso a API REST',
                ],
                'faqs' => [
                    [
                        'q' => '¿Tiene algún costo mensual o pago por cada boleta emitida?',
                        'a' => 'Cero. A diferencia de otras plataformas o servicios con cobro recurrente por documento, esta es una licencia vitalicia (Lifetime) de pago único de $350.000 CLP. Pagas una sola vez y el plugin es tuyo para siempre.',
                    ],
                    [
                        'q' => '¿Qué necesito para la instalación y puesta en marcha?',
                        'a' => 'Solo necesitas las credenciales o token API de tu cuenta Bsale y acceso a tu WordPress. El paquete incluye soporte y acompañamiento técnico directo de Álvaro Valenzuela Valdés para configurar bodegas, probar el entorno y verificar la emisión DTE.',
                    ],
                    [
                        'q' => '¿Cómo evita las sobreventas si tengo tiendas físicas?',
                        'a' => 'Si vendes un producto en tu sucursal física a través del punto de venta Bsale, el stock se actualiza en tiempo real en WooCommerce, impidiendo que clientes online compren mercadería ya vendida.',
                    ],
                ],
                'category_slug' => 'plugins-woocommerce',
                'is_featured' => true,
                'is_active' => true,
                'version' => '2.4.0',
                'meta_title' => 'Plugin Bsale WooCommerce Sync Pro (Licencia Vitalicia) | REW',
                'meta_description' => 'Sincroniza Bsale y WooCommerce en tiempo real. Stock multibodega, DTE SII automático y licencia vitalicia de un solo pago.',
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Keep product to avoid accidental data loss
    }
};
