<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $this->seed();
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_desarrollo_web_service_page_returns_successful_response(): void
    {
        $this->seed();
        $response = $this->get('/desarrollo-web');

        $response->assertStatus(200);
        $response->assertSee('Desarrollo Web Chile');
        $response->assertSee('Plan Emprende');
        $response->assertSee('Plan Empresa');
        $response->assertSee('Plan eCommerce');
    }

    public function test_desarrollo_software_service_page_returns_successful_response(): void
    {
        $this->seed();
        $response = $this->get('/desarrollo-de-software-chile');

        $response->assertStatus(200);
        $response->assertSee('Empresa de Desarrollo de Software en Chile');
        $response->assertSee('Servicios de Software a Medida');
        $response->assertSee('Por Qué Elegir a REW');
    }

    public function test_optimizacion_seo_service_page_returns_successful_response(): void
    {
        $this->seed();
        $response = $this->get('/optimizacion-seo');

        $response->assertStatus(200);
        $response->assertSee('Agencia SEO en Chile');
        $response->assertSee('Servicios SEO que Ofrecemos en Chile');
        $response->assertSee('Auditoría SEO Profesional');
    }

    public function test_publicidad_digital_service_page_returns_successful_response(): void
    {
        $this->seed();
        $response = $this->get('/publicidad-digital');

        $response->assertStatus(200);
        $response->assertSee('Publicidad Digital en Chile');
        $response->assertSee('Google Ads');
        $response->assertSee('Meta Ads');
        $response->assertSee('¿Cómo Trabajamos en REW?');
    }

    public function test_mantenimiento_web_service_page_returns_successful_response(): void
    {
        $this->seed();
        $response = $this->get('/mantenimiento-web');

        $response->assertStatus(200);
        $response->assertSee('Mantenimiento Web Profesional en Chile');
        $response->assertSee('Actualizaciones de WordPress');
        $response->assertSee('¿Por Qué es Crucial el Mantenimiento Web Preventivo?');
    }

    public function test_soporte_wordpress_service_page_returns_successful_response(): void
    {
        $this->seed();
        $response = $this->get('/soporte-wordpress');

        $response->assertStatus(200);
        $response->assertSee('Soporte WordPress en Chile');
        $response->assertSee('Pantalla Blanca (WSOD) y Error 500');
        $response->assertSeeText('Fallos en WooCommerce & Webpay');
    }

    public function test_portfolio_index_shows_new_projects(): void
    {
        $this->seed();
        $response = $this->get('/portafolio');

        $response->assertStatus(200);
        $response->assertSee('Domingo Isaín');
        $response->assertSee('Gasfiter Certificado SEC Chile');
        $response->assertSee('Monarch Trading AI');
    }

    public function test_portfolio_project_detail_pages_return_successful_response(): void
    {
        $this->seed();

        $this->get('/portafolio/domingo-isain')->assertStatus(200)->assertSee('Domingo Isaín');
        $this->get('/portafolio/gasfiter-certificado')->assertStatus(200)->assertSee('Gasfiter Certificado SEC Chile');
        $this->get('/portafolio/gasfiter-autorizado')->assertStatus(200)->assertSee('Gasfiter Autorizado Chile');
        $this->get('/portafolio/bastian-selah')->assertStatus(200)->assertSee('Bastián Selah');
        $this->get('/portafolio/venta-de-paltas')->assertStatus(200)->assertSee('Venta de Paltas Chile');
        $this->get('/portafolio/monarch-trading-ai')->assertStatus(200)->assertSee('Monarch Trading AI');
    }
}
