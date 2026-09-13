<?php

use App\Models\Post;
use App\Services\RewSeoPilotService;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $pilot = new RewSeoPilotService;
        $data = $pilot->generate('Cómo integrar Bsale con WooCommerce en Chile: stock, precios y facturación SII', 'full');

        $slug = 'como-integrar-bsale-con-woocommerce';

        $post = Post::updateOrCreate(
            ['slug' => $slug],
            [
                'title' => 'Cómo Integrar Bsale con WooCommerce en Chile: Sincronización de Stock, Precios y Boletas SII Sin Pagar Mensualidades',
                'excerpt' => $data['excerpt'] ?? 'Aprende cómo conectar Bsale y WooCommerce mediante arquitectura Single Source of Truth para eliminar errores de stock y facturación del SII sin mensualidades.',
                'content' => $data['content'] ?? '',
                'author_name' => 'Álvaro Valenzuela Valdés',
                'category' => 'Integraciones & E-Commerce',
                'featured_image' => '/images/blog/integracion-bsale-woocommerce.webp',
                'read_time_minutes' => 9,
                'is_published' => true,
                'meta_title' => 'Integración Bsale con WooCommerce en Chile | Stock y DTE | REW',
                'meta_description' => 'Guía paso a paso para sincronizar Bsale con WooCommerce: stock en tiempo real, emisión de boletas/facturas SII y ahorro de cobros mensuales.',
                'faq_schema' => $data['faqs'] ?? null,
            ]
        );

        // Actualizar posts_export.json para persistencia
        $exportPath = database_path('seeders/posts_export.json');
        if (file_exists($exportPath)) {
            $postsData = json_decode(file_get_contents($exportPath), true);
            if (is_array($postsData)) {
                $exists = false;
                foreach ($postsData as $idx => $item) {
                    if (($item['slug'] ?? '') === $slug) {
                        $postsData[$idx] = array_merge($item, $post->toArray());
                        $exists = true;
                        break;
                    }
                }
                if (! $exists) {
                    $postsData[] = $post->toArray();
                }
                file_put_contents($exportPath, json_encode($postsData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Post::where('slug', 'como-integrar-bsale-con-woocommerce')->delete();
    }
};
