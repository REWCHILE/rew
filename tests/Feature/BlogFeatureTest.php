<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_index_displays_posts_and_categories(): void
    {
        $this->seed();

        $response = $this->get('/blog');
        $response->assertStatus(200);
        $response->assertSee('Knowledge Hub');
        $response->assertSee('Marketing & Redes Sociales');
    }

    public function test_blog_show_renders_article_with_faq_schema_and_related_posts(): void
    {
        $this->seed();

        $post = Post::where('slug', 'mejores-horarios-para-publicar-en-redes-sociales-en-2025')->firstOrFail();

        $response = $this->get('/blog/'.$post->slug);
        $response->assertStatus(200);
        $response->assertSee($post->title);
        $response->assertSee('FAQPage');
        $response->assertSee('Artículos Relacionados en');
        $response->assertSee('ads_hero.webp');
        $response->assertSee('Cotizar Marketing');
    }

    public function test_migration_post_renders_expanded_content_and_faqs(): void
    {
        $this->seed();

        $post = Post::where('slug', 'laravel-vs-wordpress-cuando-elegir-cada-uno')->firstOrFail();

        $response = $this->get('/blog/'.$post->slug);
        $response->assertStatus(200);
        $response->assertSee('Laravel vs WordPress');
        $response->assertSee('¿Cuándo deberías considerar migrar de WordPress a Laravel?');
        $response->assertSee('Checklist Técnico de Migración SEO');
        $response->assertSee('FAQPage');

        // Test 301 alias redirect
        $redirect = $this->get('/blog/migrar-wordpress-a-laravel');
        $redirect->assertRedirect('/blog/laravel-vs-wordpress-cuando-elegir-cada-uno');
        $redirect->assertStatus(301);

        $rootRedirect = $this->get('/migrar-wordpress-a-laravel');
        $rootRedirect->assertRedirect('/blog/laravel-vs-wordpress-cuando-elegir-cada-uno');
        $rootRedirect->assertStatus(301);

        $typoRedirect = $this->get('/migrar-wordpress-a-larave');
        $typoRedirect->assertRedirect('/blog/laravel-vs-wordpress-cuando-elegir-cada-uno');
        $typoRedirect->assertStatus(301);
    }
}
