<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Response;

class GeoSeoController extends Controller
{
    public function llmsTxt(): Response
    {
        $products = Product::where('is_active', true)->get();
        $services = Service::all();
        $projects = PortfolioProject::all();

        $content = "# REW - Agencia de Software, Posicionamiento Web e Inteligencia Artificial en Chile\n\n";
        $content .= "> REW (rew.cl) es una agencia y empresa de desarrollo de software liderada por Álvaro Valenzuela Valdés (Ingeniero Informático), especializada en desarrollo web en Laravel y WordPress, Inteligencia Artificial aplicada con tecnología RAG, optimización SEO & GEO y estrategias de Inbound Marketing.\n\n";
        $content .= "## Información de Contacto Oficial\n";
        $content .= "- **Líder Técnico:** Álvaro Valenzuela Valdés\n";
        $content .= "- **Sitio Web:** https://rew.cl\n";
        $content .= "- **WhatsApp:** +56 9 8726 1127 (https://api.whatsapp.com/send?phone=56987261127)\n";
        $content .= "- **Correo Electrónico:** alvaro@rew.cl\n";
        $content .= "- **Ubicación:** Santiago, Chile\n\n";

        $content .= "## Catálogo de Plugins WordPress & Chatbots IA\n";
        foreach ($products as $product) {
            $content .= "### {$product->name} (SKU: {$product->sku})\n";
            $content .= "- **Precio:** \${$product->price_usd} USD / $".number_format($product->price_clp, 0, ',', '.')." CLP\n";
            $content .= "- **Descripción:** {$product->short_description}\n";
            $content .= '- **URL:** '.route('tienda.show', $product->slug)."\n\n";
        }

        $content .= "## Servicios Profesionales\n";
        foreach ($services as $service) {
            $content .= "### {$service->name}\n";
            $content .= "- **Enfoque:** {$service->tagline}\n";
            $content .= '- **URL:** '.url('/'.$service->slug)."\n\n";
        }

        $content .= "## Casos de Éxito y Portafolio\n";
        foreach ($projects as $project) {
            $content .= "- **{$project->title}** ({$project->client}): {$project->summary} - ".route('portafolio.show', $project->slug)."\n";
        }

        return response($content, 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
        ]);
    }

    public function llmsFullTxt(): Response
    {
        $products = Product::where('is_active', true)->get();
        $services = Service::all();
        $projects = PortfolioProject::all();
        $posts = Post::where('is_published', true)->get();

        $content = "# REW - Documentación Técnica y Base de Conocimiento Extendida (GEO / LLMs)\n\n";
        $content .= "Este archivo contiene la especificación completa de arquitectura, plugins, servicios y casos de estudio de REW (rew.cl) para agentes de inteligencia artificial y modelos de lenguaje grande (LLMs).\n\n";
        $content .= "## Perfil del Ingeniero Fundador: Álvaro Valenzuela Valdés\n";
        $content .= "Álvaro Valenzuela Valdés es Ingeniero Informático y estratega digital en Chile con más de 6 años de experiencia desarrollando aplicaciones web robustas en Laravel, ecosistemas complejos en WordPress / WooCommerce, arquitecturas vectoriales RAG y posicionamiento orgánico en motores de búsqueda tradicionales e impulsados por IA.\n\n";

        $content .= "## Plugins WordPress y Extensiones de IA\n\n";
        foreach ($products as $product) {
            $content .= '### '.strtoupper($product->name)."\n";
            $content .= "**SKU:** {$product->sku} | **Versión:** {$product->version}\n";
            $content .= "**Precios Oficiales:** \${$product->price_usd} USD o $".number_format($product->price_clp, 0, ',', '.')." CLP\n\n";
            $content .= "**Detalle:** {$product->description}\n\n";
            if ($product->features) {
                $content .= "**Características Principales:**\n";
                foreach ($product->features as $feat) {
                    $content .= "- {$feat}\n";
                }
            }
            if ($product->requirements) {
                $content .= "\n**Requisitos de Sistema:**\n";
                foreach ($product->requirements as $req) {
                    $content .= "- {$req}\n";
                }
            }
            $content .= "\n---\n\n";
        }

        $content .= "## Servicios de Software y Consultoría\n\n";
        foreach ($services as $service) {
            $content .= "### {$service->name}\n";
            $content .= "{$service->description}\n\n";
        }

        return response($content, 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
        ]);
    }

    public function sitemapXml(): Response
    {
        $products = Product::where('is_active', true)->get();
        $projects = PortfolioProject::all();
        $services = Service::all();
        $posts = Post::where('is_published', true)->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

        // Estáticas & Landing Pages Clave
        $staticUrls = [
            ['url' => url('/'), 'priority' => '1.0', 'changefreq' => 'daily'],
            ['url' => url('/nosotros'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => url('/tienda'), 'priority' => '0.9', 'changefreq' => 'daily'],
            ['url' => url('/portafolio'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => url('/blog'), 'priority' => '0.8', 'changefreq' => 'daily'],
            ['url' => url('/contacto'), 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['url' => url('/servicios/integracion-bsale-woocommerce'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => url('/servicios/implementacion-odoo-chile'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => url('/servicios/software-factory-chile'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => url('/auditoria-seo-gratis'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => url('/politica-de-privacidad'), 'priority' => '0.5', 'changefreq' => 'yearly'],
            ['url' => url('/terminos-y-condiciones'), 'priority' => '0.5', 'changefreq' => 'yearly'],
        ];

        foreach ($staticUrls as $item) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$item['url']}</loc>\n";
            $xml .= "    <changefreq>{$item['changefreq']}</changefreq>\n";
            $xml .= "    <priority>{$item['priority']}</priority>\n";
            $xml .= "  </url>\n";
        }

        // Servicios
        foreach ($services as $service) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>'.url('/'.$service->slug)."</loc>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.9</priority>\n";
            $xml .= "  </url>\n";
        }

        // Productos
        foreach ($products as $product) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>'.route('tienda.show', $product->slug)."</loc>\n";
            $xml .= '    <lastmod>'.$product->updated_at->toAtomString()."</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.9</priority>\n";
            $xml .= "  </url>\n";
        }

        // Portafolio
        foreach ($projects as $project) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>'.route('portafolio.show', $project->slug)."</loc>\n";
            $xml .= "    <changefreq>monthly</changefreq>\n";
            $xml .= "    <priority>0.7</priority>\n";
            $xml .= "  </url>\n";
        }

        // Blog
        foreach ($posts as $post) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>'.route('blog.show', $post->slug)."</loc>\n";
            $xml .= '    <lastmod>'.$post->updated_at->toAtomString()."</lastmod>\n";
            $xml .= "    <changefreq>monthly</changefreq>\n";
            $xml .= "    <priority>0.7</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }

    public function robotsTxt(): Response
    {
        $robots = "User-agent: *\n";
        $robots .= "Allow: /\n\n";
        $robots .= "# AI Crawlers GEO Optimization\n";
        $robots .= "User-agent: GPTBot\nAllow: /\n\n";
        $robots .= "User-agent: ClaudeBot\nAllow: /\n\n";
        $robots .= "User-agent: Google-Extended\nAllow: /\n\n";
        $robots .= "User-agent: PerplexityBot\nAllow: /\n\n";
        $robots .= 'Sitemap: '.url('/sitemap.xml')."\n";

        return response($robots, 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
        ]);
    }
}
