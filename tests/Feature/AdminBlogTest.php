<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminBlogTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_from_admin_blog(): void
    {
        $response = $this->get(route('admin.blog.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_admin_can_view_blog_index(): void
    {
        $admin = User::factory()->create();

        $post = Post::create([
            'title' => 'Artículo de Prueba REW Blog',
            'slug' => 'articulo-de-prueba-rew-blog',
            'excerpt' => 'Extracto de prueba para verificación de tests.',
            'content' => '<p>Contenido completo de prueba con arquitectura SEO.</p>',
            'author_name' => 'Álvaro Valenzuela Valdés',
            'category' => 'Integraciones & E-Commerce',
            'is_published' => true,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.blog.index'));
        $response->assertStatus(200);
        $response->assertSeeText('Gestor de Blog & Content Hub SEO');
        $response->assertSeeText('Artículo de Prueba REW Blog');
        $response->assertSeeText('Integraciones & E-Commerce');
    }

    public function test_admin_can_view_blog_create_page(): void
    {
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->get(route('admin.blog.create'));
        $response->assertStatus(200);
        $response->assertSee('Redactar Nuevo Artículo de Blog');
        $response->assertSee('REW SEO AI Pilot');
    }

    public function test_admin_can_store_new_blog_post(): void
    {
        $admin = User::factory()->create();

        $payload = [
            'title' => 'Cómo Sincronizar Bsale y WooCommerce sin Errores de Stock',
            'slug' => 'como-sincronizar-bsale-woocommerce-stock',
            'category' => 'Integraciones & E-Commerce',
            'author_name' => 'Álvaro Valenzuela Valdés',
            'excerpt' => 'Aprende las claves de sincronización en tiempo real.',
            'content' => '<h2>1. Fuente de Verdad</h2><p>Bsale manda sobre el stock y WooCommerce sobre las ventas.</p>',
            'meta_title' => 'Sincronizar Bsale y WooCommerce en Chile | REW',
            'meta_description' => 'Guía paso a paso para conectar Bsale con WooCommerce sin duplicar inventarios.',
            'is_published' => 1,
            'faq_questions' => ['¿Cómo se sincroniza?'],
            'faq_answers' => ['Mediante webhooks asíncronos en tiempo real.'],
        ];

        $response = $this->actingAs($admin)->post(route('admin.blog.store'), $payload);
        $response->assertRedirect(route('admin.blog.index'));

        $this->assertDatabaseHas('posts', [
            'slug' => 'como-sincronizar-bsale-woocommerce-stock',
            'category' => 'Integraciones & E-Commerce',
            'is_published' => 1,
        ]);

        $post = Post::where('slug', 'como-sincronizar-bsale-woocommerce-stock')->first();
        $this->assertNotNull($post);
        $this->assertIsArray($post->faq_schema);
        $this->assertCount(1, $post->faq_schema);
    }

    public function test_admin_can_view_blog_edit_page(): void
    {
        $admin = User::factory()->create();

        $post = Post::create([
            'title' => 'Post para Editar',
            'slug' => 'post-para-editar',
            'excerpt' => 'Extracto...',
            'content' => '<p>Contenido...</p>',
            'author_name' => 'Álvaro Valenzuela Valdés',
            'category' => 'Tecnología & Desarrollo',
            'is_published' => true,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.blog.edit', $post));
        $response->assertStatus(200);
        $response->assertSee('Editar Artículo de Blog');
        $response->assertSee('Post para Editar');
    }

    public function test_admin_can_update_blog_post(): void
    {
        $admin = User::factory()->create();

        $post = Post::create([
            'title' => 'Post Inicial',
            'slug' => 'post-inicial',
            'excerpt' => 'Extracto inicial',
            'content' => '<p>Contenido inicial</p>',
            'author_name' => 'Álvaro Valenzuela',
            'category' => 'Desarrollo Web',
            'is_published' => true,
        ]);

        $payload = [
            'title' => 'Post Actualizado y Optimizado',
            'slug' => 'post-inicial',
            'category' => 'Desarrollo Web',
            'author_name' => 'Álvaro Valenzuela Valdés',
            'excerpt' => 'Extracto nuevo',
            'content' => '<p>Contenido actualizado con más valor.</p>',
            'meta_title' => 'Post Actualizado | REW',
            'meta_description' => 'Descripción nueva para Google SERP.',
            'is_published' => 0,
        ];

        $response = $this->actingAs($admin)->put(route('admin.blog.update', $post), $payload);
        $response->assertRedirect(route('admin.blog.index'));

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Post Actualizado y Optimizado',
            'is_published' => 0,
        ]);
    }

    public function test_admin_can_toggle_publish_status(): void
    {
        $admin = User::factory()->create();

        $post = Post::create([
            'title' => 'Post para Alternar',
            'slug' => 'post-para-alternar',
            'excerpt' => 'Extracto...',
            'content' => '<p>Contenido...</p>',
            'author_name' => 'Álvaro Valenzuela Valdés',
            'category' => 'General',
            'is_published' => true,
        ]);

        $response = $this->actingAs($admin)->patch(route('admin.blog.toggle', $post));
        $response->assertRedirect();

        $post->refresh();
        $this->assertFalse($post->is_published);

        $response2 = $this->actingAs($admin)->patch(route('admin.blog.toggle', $post));
        $response2->assertRedirect();

        $post->refresh();
        $this->assertTrue($post->is_published);
    }

    public function test_admin_can_destroy_blog_post(): void
    {
        $admin = User::factory()->create();

        $post = Post::create([
            'title' => 'Post a Borrar',
            'slug' => 'post-a-borrar',
            'excerpt' => 'Extracto...',
            'content' => '<p>Contenido...</p>',
            'author_name' => 'Álvaro Valenzuela Valdés',
            'category' => 'General',
            'is_published' => true,
        ]);

        $response = $this->actingAs($admin)->delete(route('admin.blog.destroy', $post));
        $response->assertRedirect(route('admin.blog.index'));

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    public function test_admin_can_call_ai_generate_endpoint(): void
    {
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->postJson(route('admin.blog.ai-generate'), [
            'topic' => 'Cómo Integrar Bsale con WooCommerce en Chile',
            'action' => 'full',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'data' => [
                'title',
                'slug',
                'category',
                'excerpt',
                'content',
                'meta_title',
                'meta_description',
                'faqs',
            ],
        ]);
    }
}
