<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_from_admin_pages(): void
    {
        $response = $this->get(route('admin.pages.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_admin_can_view_pages_monitor(): void
    {
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->get(route('admin.pages.index'));
        $response->assertStatus(200);
        $response->assertSeeText('Monitor de Páginas, SEO On-Page & PageSpeed');
        $response->assertSeeText('Integración Bsale + WooCommerce');
        $response->assertSeeText('Páginas Monitorizadas');
    }

    public function test_admin_can_analyze_single_page(): void
    {
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->postJson(route('admin.pages.analyze'), [
            'page_id' => 'bsale_woocommerce',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'audit' => [
                'page_id',
                'url',
                'path',
                'status_code',
                'ttfb_ms',
                'title',
                'description',
                'h1',
                'has_schema',
                'mobile_score',
                'desktop_score',
                'lcp',
            ],
            'message',
        ]);
    }
}
