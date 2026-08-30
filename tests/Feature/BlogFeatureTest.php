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
    }
}
