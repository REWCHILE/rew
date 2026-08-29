<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Categorías de Productos y Servicios
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type')->default('product'); // product, service, portfolio, blog
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 2. Plugins WordPress y Soluciones de Software
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price_usd', 10, 2);
            $table->integer('price_clp');
            $table->decimal('original_price_usd', 10, 2)->nullable();
            $table->integer('original_price_clp')->nullable();
            $table->string('badge')->nullable(); // e.g. -13%, -33%, Top Venta, Popular
            $table->string('featured_image')->nullable();
            $table->json('gallery')->nullable();
            $table->json('features')->nullable(); // Lista de características
            $table->json('requirements')->nullable(); // Requisitos técnicos (WP 6.x, PHP 8.x, WooCommerce)
            $table->json('faqs')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('docs_url')->nullable();
            $table->string('category_slug')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('version')->default('1.0.0');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });

        // 3. Proyectos del Portafolio
        Schema::create('portfolio_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client');
            $table->string('category'); // E-Commerce, Desarrollo Web, Streaming, Salud & Estética, SaaS
            $table->string('project_date')->nullable(); // e.g. 2024-06-05
            $table->text('summary');
            $table->longText('full_description')->nullable();
            $table->string('status')->default('Finalizado');
            $table->string('project_url')->nullable();
            $table->string('technologies'); // e.g. WordPress, WooCommerce, Elementor, Laravel
            $table->string('role'); // e.g. Desarrollo Web, Diseñador UX/UI, Inbound Marketing
            $table->string('featured_image');
            $table->json('gallery')->nullable();
            $table->json('results')->nullable(); // KPIs logrados: +150% ventas, etc.
            $table->boolean('is_featured')->default(false);
            $table->integer('order')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });

        // 4. Servicios Profesionales REW
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->text('tagline');
            $table->longText('description');
            $table->json('features')->nullable();
            $table->json('process_steps')->nullable();
            $table->json('faqs')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 5. Cotizaciones y Leads Multi-Canal
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('company')->nullable();
            $table->string('service_type'); // Desarrollo Web, Tienda Plugins, SEO, Software, etc.
            $table->text('project_description')->nullable();
            $table->decimal('estimated_budget_usd', 10, 2)->nullable();
            $table->integer('estimated_budget_clp')->nullable();
            $table->string('preferred_contact_channel')->default('whatsapp'); // whatsapp, email, phone
            $table->string('status')->default('pending'); // pending, contacted, closed
            $table->json('metadata')->nullable(); // carrito items, respuestas de cotizador
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });

        // 6. Artículos de Blog / Knowledge Hub
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->longText('content');
            $table->string('author_name')->default('Álvaro Valenzuela Valdés');
            $table->string('category')->default('Tecnología & Desarrollo');
            $table->string('featured_image')->nullable();
            $table->integer('read_time_minutes')->default(5);
            $table->boolean('is_published')->default(true);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('quotes');
        Schema::dropIfExists('services');
        Schema::dropIfExists('portfolio_projects');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
};
