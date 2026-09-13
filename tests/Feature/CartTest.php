<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_product_to_cart_ajax_returns_correct_totals(): void
    {
        $this->seed();

        $product = Product::where('slug', 'plugin-integracion-bsale-woocommerce')->first();
        if (! $product) {
            $product = Product::create([
                'name' => 'Plugin Bsale WooCommerce Sync Pro (Licencia Vitalicia)',
                'slug' => 'plugin-integracion-bsale-woocommerce',
                'sku' => 'rew-bsale-woo-lifetime',
                'price_usd' => 380.00,
                'price_clp' => 350000,
                'is_active' => true,
            ]);
        }

        $response = $this->postJson(route('cart.add'), [
            'product_slug' => $product->slug,
            'quantity' => 1,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'cart_count' => 1,
            'cart_total_usd' => 380,
            'cart_total_clp' => 350000,
        ]);

        // Verify session has cart
        $this->assertTrue(session()->has('cart'));
        $cart = session()->get('cart');
        $this->assertCount(1, $cart);
    }

    public function test_remove_product_from_cart_ajax_clears_totals(): void
    {
        $this->seed();

        $product = Product::where('slug', 'plugin-integracion-bsale-woocommerce')->first();
        if (! $product) {
            $product = Product::create([
                'name' => 'Plugin Bsale WooCommerce Sync Pro (Licencia Vitalicia)',
                'slug' => 'plugin-integracion-bsale-woocommerce',
                'sku' => 'rew-bsale-woo-lifetime',
                'price_usd' => 380.00,
                'price_clp' => 350000,
                'is_active' => true,
            ]);
        }

        // Add to cart first
        $this->postJson(route('cart.add'), [
            'product_slug' => $product->slug,
            'quantity' => 1,
        ]);

        // Remove from cart
        $response = $this->postJson(route('cart.remove'), [
            'product_id' => (string) $product->id,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'cart_count' => 0,
            'cart_total_usd' => 0,
            'cart_total_clp' => 0,
        ]);
    }

    public function test_set_currency_endpoint_updates_session(): void
    {
        $response = $this->postJson(route('currency.set'), [
            'currency' => 'USD',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'currency' => 'USD',
        ]);
        $this->assertEquals('USD', session()->get('currency'));
    }
}
