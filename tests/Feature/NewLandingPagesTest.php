<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewLandingPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_bsale_woocommerce_page_returns_ok(): void
    {
        $response = $this->get('/servicios/integracion-bsale-woocommerce');
        $response->assertStatus(200);
        $response->assertSee('Bsale');
        $response->assertSee('WooCommerce');
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
}
