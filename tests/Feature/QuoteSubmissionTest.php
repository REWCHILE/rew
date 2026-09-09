<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuoteSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_submit_quote_form_successfully(): void
    {
        $this->seed();

        $payload = [
            'name' => 'Juan Pérez',
            'email' => 'juan@gmail.com',
            'phone' => '+56 9 8765 4321',
            'service_type' => 'Desarrollo Web Corporativo',
            'features' => ['Pasarela Webpay Plus / MercadoPago'],
            'custom_feature_items' => ['Panel para vendedores', ''],
            'custom_features_description' => 'Necesito integración con ERP.',
            'project_description' => 'Plazo estimado: 1 mes.',
            'estimated_budget_usd' => 0,
            'estimated_budget_clp' => 0,
        ];

        $response = $this->postJson('/cotizar', $payload);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'message',
            'whatsapp_url',
            'quote_id',
        ]);

        $this->assertDatabaseHas('quotes', [
            'name' => 'Juan Pérez',
            'email' => 'juan@gmail.com',
            'phone' => '+56 9 8765 4321',
            'service_type' => 'Desarrollo Web Corporativo',
        ]);
    }

    public function test_can_submit_quote_form_via_regular_post(): void
    {
        $this->seed();

        $payload = [
            'name' => 'María Silva',
            'email' => 'maria@gmail.com',
            'phone' => '+5699887766',
            'service_type' => 'Software a Medida / SaaS Laravel',
            'estimated_budget_usd' => 0,
            'estimated_budget_clp' => 0,
        ];

        $response = $this->post('/cotizar', $payload);

        $response->assertRedirect();
        $this->assertStringContainsString('api.whatsapp.com', $response->headers->get('Location'));
    }

    public function test_quote_fails_if_honeypot_filled(): void
    {
        $this->seed();

        $payload = [
            'name' => 'Spam Bot',
            'email' => 'bot@gmail.com',
            'phone' => '+5699887766',
            'service_type' => 'Desarrollo Web Corporativo',
            'b_field_check_hp' => 'I am a bot',
        ];

        $response = $this->postJson('/cotizar', $payload);
        $response->assertStatus(400);
    }

    public function test_subagent_exact_payload(): void
    {
        $this->seed();

        $payload = [
            'service_type' => 'Software 100% Customizado en Laravel',
            'features' => ['Pasarela Webpay Plus / MercadoPago', 'Integración CRM y WhatsApp API'],
            'custom_feature_items' => ['Modulo de reportes exportables a PDF', ''],
            'name' => 'Carlos Prueba',
            'email' => 'carlos@empresa.com',
            'phone' => '+56912345678',
            'company' => 'Empresa Test',
        ];

        $response = $this->postJson('/cotizar', $payload);

        if ($response->status() !== 200) {
            dump($response->status(), $response->json());
        }

        $response->assertStatus(200);
    }
}
