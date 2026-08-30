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
}
