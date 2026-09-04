<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewLandingPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_bsale_woocommerce_page_returns_ok(): void
    {
        $this->seed();
        $response = $this->get('/servicios/integracion-bsale-woocommerce');
        $response->assertStatus(200);
        $response->assertSee('Bsale');
        $response->assertSee('WooCommerce');
        $response->assertSee('Plugin Bsale WooCommerce Sync Pro');
        $response->assertSee('350.000');
        $response->assertSee('LIFETIME');
    }

    public function test_bsale_plugin_product_page_returns_ok(): void
    {
        $this->seed();
        $response = $this->get('/producto/plugin-integracion-bsale-woocommerce');
        $response->assertStatus(200);
        $response->assertSee('Plugin Bsale WooCommerce Sync Pro');
        $response->assertSee('350.000');
    }

    public function test_odoo_erp_page_returns_ok(): void
    {
        $response = $this->get('/servicios/implementacion-odoo-chile');
        $response->assertStatus(200);
        $response->assertSee('Odoo ERP');
        $response->assertSee('Facturación Electrónica');
    }

    public function test_software_factory_page_returns_ok(): void
    {
        $response = $this->get('/servicios/software-factory-chile');
        $response->assertStatus(200);
        $response->assertSee('Software Factory');
        $response->assertSee('Laravel');
    }

    public function test_seo_audit_landing_returns_ok(): void
    {
        $response = $this->get('/auditoria-seo-gratis');
        $response->assertStatus(200);
        $response->assertSee('Auditoría');
    }

    public function test_privacy_and_terms_pages_return_ok(): void
    {
        $privacy = $this->get('/politica-de-privacidad');
        $privacy->assertStatus(200);
        $privacy->assertSee('Política de Privacidad');

        $terms = $this->get('/terminos-y-condiciones');
        $terms->assertStatus(200);
        $terms->assertSee('Términos y Condiciones');
    }

    public function test_legacy_wordpress_and_date_urls(): void
    {
        $this->seed();

        $res1 = $this->get('/integracion-api-wordpress');
        $res1->assertStatus(301);

        $res2 = $this->get('/desarrollo-odoo-chile');
        $res2->assertStatus(301);

        $res3 = $this->get('/portafolio/patagonia-shelter');
        $res3->assertStatus(200);
        $res3->assertSee('Patagonia Shelter');

        $resCuarteto = $this->get('/portafolio/cuarteto-de-nos');
        $resCuarteto->assertStatus(200);
        $resCuarteto->assertSee('Cuarteto de Nos');

        $res4 = $this->get('/2025/12/17/agregar-boton-whatsapp-wordpress');
        $res4->assertStatus(301);

        $res5 = $this->get('/2025/05/01/la-computacion-cuantica');
        $res5->assertStatus(301);

        $res6 = $this->get('/2026/05/31/entrenando-bot-wordpress-pdfs-urls-rag');
        $res6->assertStatus(301);

        $res7 = $this->get('/2025/05/01/guia-completa-de-marketing-digital-2025');
        $res7->assertStatus(301);

        $res8 = $this->get('/2026/05/31/configurar-chat-bot-ia-wordpress-rapido');
        $res8->assertStatus(301);

        $res9 = $this->get('/2026/05/31/chatbot-para-wordpress-ia-groq-vs-openai');
        $res9->assertStatus(301);

        $res10 = $this->get('/2025/05/02/mejores-horarios-para-publicar-en-redes-sociales-en-2025');
        $res10->assertStatus(301);

        $res11 = $this->get('/2025/05/02/redes-sociales-en-chile-uso-tendencias-y-plataformas-favoritas-2025');
        $res11->assertStatus(301);
    }

    public function test_riche_landing_page_returns_ok(): void
    {
        $this->seed();

        $landing = $this->get('/chatbot-ia-wordpress');
        $landing->assertStatus(200);
        $landing->assertSee('Rich-E AI');
        $landing->assertSee('Simulador en Vivo');
        $landing->assertSee('RAG');

        $alias = $this->get('/producto/chatbot-ia-wordpress');
        $alias->assertStatus(200);
        $alias->assertSee('Rich-E');
    }

    public function test_custom_ocean_404_page(): void
    {
        $response = $this->get('/ruta-inexistente-que-genera-404');
        $response->assertStatus(404);
        $response->assertSee('Naufragio Digital');
        $response->assertSee('Wilson 2.0');
        $response->assertSee('Puerto Seguro');
    }

    public function test_new_deepseek_and_llm_blog_posts_return_ok(): void
    {
        $this->seed();

        $post1 = $this->get('/blog/deepseek-y-llama-wordpress-respuestas-instantaneas');
        $post1->assertStatus(200);
        $post1->assertSee('DeepSeek');
        $post1->assertSee('Llama 3.3');

        $redirect1 = $this->get('/2026/05/31/deepseek-y-llama-wordpress-respuestas-instantaneas');
        $redirect1->assertStatus(301);

        $post2 = $this->get('/blog/que-es-un-llm-valor-humanidad-negocios');
        $post2->assertStatus(200);
        $post2->assertSee('Large Language Model');
        $post2->assertSee('Transformer');
    }

    public function test_add_bsale_plugin_to_cart_via_ajax_and_checkout(): void
    {
        $this->seed();

        // 1. Add via AJAX
        $response = $this->postJson('/carrito/agregar', [
            'product_slug' => 'plugin-integracion-bsale-woocommerce',
            'quantity' => 1,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'cart_count' => 1,
            'cart_total_clp' => 350000,
            'cart_total_usd' => 380,
        ]);

        // 2. View cart page
        $cartPage = $this->get('/carrito');
        $cartPage->assertStatus(200);
        $cartPage->assertSee('Plugin Bsale WooCommerce Sync Pro');
        $cartPage->assertSee('350.000');

        // 3. View checkout page with CLP default
        $checkoutPage = $this->get('/checkout');
        $checkoutPage->assertStatus(200);
        $checkoutPage->assertSee('350.000');
        $checkoutPage->assertSee('Webpay Plus');

        // 4. Switch currency to USD
        $curResponse = $this->postJson('/currency', ['currency' => 'USD']);
        $curResponse->assertStatus(200);
        $curResponse->assertJson(['success' => true, 'currency' => 'USD']);

        // 5. Verify checkout in USD
        $checkoutUsd = $this->get('/checkout');
        $checkoutUsd->assertStatus(200);
        $checkoutUsd->assertSee('380');
        $checkoutUsd->assertSee('PayPal');
    }
}
