<?php

namespace Tests\Feature;

use App\Models\PortfolioProject;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPortfolioTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_from_admin_portfolio(): void
    {
        $response = $this->get(route('admin.portfolio.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_admin_can_view_portfolio_dashboard(): void
    {
        $this->seed();
        $admin = User::factory()->create();

        $project = PortfolioProject::first();

        $response = $this->actingAs($admin)->get(route('admin.portfolio.index'));
        $response->assertStatus(200);
        $response->assertSeeText('Gestor de Portafolio & Casos de Éxito');
        $response->assertSee('Total Proyectos');
        if ($project) {
            $response->assertSee($project->title);
        }
    }

    public function test_admin_can_view_create_page(): void
    {
        $this->seed();
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->get(route('admin.portfolio.create'));
        $response->assertStatus(200);
        $response->assertSee('Crear Nuevo Caso de Portafolio');
        $response->assertSeeText('Analizador de Páginas & Captura Inteligente 100%');
    }

    public function test_admin_can_store_new_portfolio_project(): void
    {
        $this->seed();
        $admin = User::factory()->create();

        $payload = [
            'title' => 'Proyecto Test Agencia REW',
            'slug' => 'proyecto-test-rew',
            'client' => 'Cliente Test',
            'category' => 'Web Corporativa & Turismo',
            'project_date' => '2026-09-13',
            'summary' => 'Resumen de prueba para el nuevo caso de estudio.',
            'full_description' => 'Descripción detallada en **Markdown** con [enlace](https://ejemplo.cl).',
            'status' => 'Finalizado',
            'project_url' => 'https://ejemplo.cl',
            'technologies' => 'Laravel, PHP 8.3, Tailwind CSS',
            'role' => 'Desarrollo Web & SEO',
            'featured_image' => '/images/portfolio/proyecto-test-rew.webp',
            'results' => ['Aumento del 200% en visitas', 'Conversión optimizada'],
            'is_featured' => 1,
            'order' => 5,
        ];

        $response = $this->actingAs($admin)->post(route('admin.portfolio.store'), $payload);
        $response->assertRedirect(route('admin.portfolio.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('portfolio_projects', [
            'slug' => 'proyecto-test-rew',
            'client' => 'Cliente Test',
            'is_featured' => true,
        ]);
    }

    public function test_admin_can_view_edit_page_and_update_project(): void
    {
        $this->seed();
        $admin = User::factory()->create();

        $project = PortfolioProject::firstOrFail();

        $editResponse = $this->actingAs($admin)->get(route('admin.portfolio.edit', $project));
        $editResponse->assertStatus(200);
        $editResponse->assertSee($project->title);

        $updateResponse = $this->actingAs($admin)->put(route('admin.portfolio.update', $project), [
            'title' => 'Título Actualizado por Admin',
            'slug' => $project->slug,
            'client' => 'Cliente Actualizado',
            'category' => $project->category,
            'project_date' => '2026-09-13',
            'summary' => 'Resumen actualizado.',
            'full_description' => 'Contenido actualizado.',
            'status' => 'Finalizado',
            'project_url' => 'https://rew.cl',
            'technologies' => 'PHP, Laravel',
            'role' => 'Líder Técnico',
            'featured_image' => $project->featured_image,
            'results' => ['Resultado actualizado'],
            'is_featured' => 0,
            'order' => 10,
        ]);

        $updateResponse->assertRedirect(route('admin.portfolio.index'));
        $this->assertDatabaseHas('portfolio_projects', [
            'id' => $project->id,
            'title' => 'Título Actualizado por Admin',
            'client' => 'Cliente Actualizado',
        ]);
    }

    public function test_admin_can_delete_project(): void
    {
        $this->seed();
        $admin = User::factory()->create();

        $project = PortfolioProject::create([
            'title' => 'Proyecto Para Borrar',
            'slug' => 'proyecto-para-borrar',
            'client' => 'Cliente Temporal',
            'category' => 'E-Commerce & Merch',
            'summary' => 'Para eliminar',
            'technologies' => 'PHP',
            'role' => 'Dev',
            'featured_image' => '/images/logo.webp',
            'status' => 'Finalizado',
        ]);

        $response = $this->actingAs($admin)->delete(route('admin.portfolio.destroy', $project));
        $response->assertRedirect(route('admin.portfolio.index'));

        $this->assertDatabaseMissing('portfolio_projects', [
            'id' => $project->id,
        ]);
    }

    public function test_checkout_processes_with_bank_transfer(): void
    {
        $this->seed();

        $product = Product::first();
        if (! $product) {
            $product = Product::create([
                'name' => 'Plugin Test',
                'slug' => 'plugin-test',
                'sku' => 'rew-test',
                'price_usd' => 100,
                'price_clp' => 90000,
                'is_active' => true,
            ]);
        }

        // Add to session cart
        $cart = [
            (string) $product->id => [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price_usd' => 100,
                'price_clp' => 90000,
                'quantity' => 1,
            ],
        ];
        session(['cart' => $cart]);

        $response = $this->withSession(['cart' => $cart])->post(route('checkout.process'), [
            'name' => 'Comprador Test',
            'email' => 'comprador@test.cl',
            'phone' => '+56912345678',
            'payment_method' => 'Transferencia Bancaria Directa (Chile)',
        ]);

        // Successfully redirected to WhatsApp URL
        $response->assertRedirect();
        $this->assertStringContainsString('api.whatsapp.com', $response->headers->get('Location'));
    }
}
