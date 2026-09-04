<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $currency = $this->getEffectiveCurrency();

        return view('carrito', compact('cart', 'currency'));
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('tienda.index')->with('info', 'Tu carrito está vacío. Añade un plugin para continuar.');
        }

        $currency = $this->getEffectiveCurrency();

        return view('checkout', compact('cart', 'currency'));
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $productSlug = $request->input('product_slug', $request->input('slug'));

        $product = null;
        if ($productId) {
            $product = Product::find($productId);
        }
        if (! $product && $productSlug) {
            $product = Product::where('slug', $productSlug)->first();
        }
        if (! $product && ($productSlug === 'plugin-integracion-bsale-woocommerce' || $productId == 9)) {
            $product = Product::updateOrCreate(
                ['slug' => 'plugin-integracion-bsale-woocommerce'],
                [
                    'name' => 'Plugin Bsale WooCommerce Sync Pro (Licencia Vitalicia)',
                    'sku' => 'rew-bsale-woo-lifetime',
                    'short_description' => 'Sincronización en tiempo real entre Bsale y WooCommerce. Stock multibodega, precios y emisión automática de boletas y facturas DTE ante el SII.',
                    'description' => 'Conecta tu tienda WooCommerce con Bsale mediante API REST oficial con sincronización bidireccional inmediata.',
                    'price_usd' => 380.00,
                    'price_clp' => 350000,
                    'original_price_usd' => 480.00,
                    'original_price_clp' => 450000,
                    'badge' => 'PAGO ÚNICO • LIFETIME',
                    'featured_image' => '/images/products/plugin_bsale_woocommerce.webp',
                    'is_featured' => true,
                    'is_active' => true,
                    'version' => '2.4.0',
                ]
            );
        }

        if (! $product) {
            $product = Product::findOrFail($productId);
        }

        $quantity = max(1, (int) $request->input('quantity', 1));
        $cart = session()->get('cart', []);

        $itemId = (string) $product->id;
        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] += $quantity;
        } else {
            $cart[$itemId] = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'sku' => $product->sku,
                'price_usd' => (float) $product->price_usd,
                'price_clp' => (int) $product->price_clp,
                'image' => $product->featured_image,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);
        $currency = $this->getEffectiveCurrency();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "«{$product->name}» se ha añadido al carrito.",
                'cart' => $cart,
                'cart_count' => count($cart),
                'cart_total_usd' => $this->calculateTotal($cart, 'USD'),
                'cart_total_clp' => $this->calculateTotal($cart, 'CLP'),
                'currency' => $currency,
            ]);
        }

        return redirect()->back()->with('success', "«{$product->name}» se ha añadido al carrito.");
    }

    public function remove(Request $request)
    {
        $productId = (string) $request->input('product_id');
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        $currency = $this->getEffectiveCurrency();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'cart' => $cart,
                'cart_count' => count($cart),
                'cart_total_usd' => $this->calculateTotal($cart, 'USD'),
                'cart_total_clp' => $this->calculateTotal($cart, 'CLP'),
                'currency' => $currency,
            ]);
        }

        return redirect()->back()->with('success', 'Producto eliminado del carrito.');
    }

    public function setCurrency(Request $request)
    {
        $currency = strtoupper($request->input('currency', 'CLP'));
        if (in_array($currency, ['USD', 'CLP'])) {
            session()->put('currency', $currency);
        }

        return response()->json([
            'success' => true,
            'currency' => $this->getEffectiveCurrency(),
        ]);
    }

    public function processCheckout(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'company' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'payment_method' => 'required|string',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('tienda.index');
        }

        $currency = $this->getEffectiveCurrency();
        $totalUsd = $this->calculateTotal($cart, 'USD');
        $totalClp = $this->calculateTotal($cart, 'CLP');

        $itemsList = '';
        foreach ($cart as $item) {
            $priceText = $currency === 'CLP'
                ? '$'.number_format($item['price_clp'], 0, ',', '.').' CLP'
                : '$'.number_format($item['price_usd'], 0).' USD';
            $itemsList .= "• {$item['name']} (x{$item['quantity']}) - {$priceText}\n";
        }

        $totalFormatted = $currency === 'CLP'
            ? '$'.number_format($totalClp, 0, ',', '.').' CLP'
            : '$'.number_format($totalUsd, 0).' USD';

        // Mensaje WhatsApp
        $whatsappNumber = '56987261127';
        $msg = "🛒 *Nuevo Pedido en Tienda REW* 🛒\n\n";
        $msg .= "👤 *Cliente:* {$validated['name']}\n";
        $msg .= "📧 *Email:* {$validated['email']}\n";
        $msg .= "📱 *Teléfono:* {$validated['phone']}\n";
        if (! empty($validated['company'])) {
            $msg .= "🏢 *Empresa:* {$validated['company']}\n";
        }
        $msg .= "💳 *Método de Pago:* {$validated['payment_method']}\n\n";
        $msg .= "*Productos Seleccionados:*\n{$itemsList}\n";
        $msg .= "💰 *TOTAL:* {$totalFormatted}\n";
        if (! empty($validated['notes'])) {
            $msg .= "\n📝 *Notas:* {$validated['notes']}\n";
        }
        $msg .= "\n---\nGenerado desde https://rew.cl/checkout";

        $whatsappUrl = "https://api.whatsapp.com/send?phone={$whatsappNumber}&text=".urlencode($msg);

        // Envío de correo a alvaro@rew.cl
        try {
            Mail::raw($msg, function ($message) use ($validated) {
                $message->to('alvaro@rew.cl')
                    ->subject("Nuevo Pedido Tienda REW: {$validated['name']}")
                    ->replyTo($validated['email'], $validated['name']);
            });
        } catch (\Exception $e) {
            Log::error('Error enviando correo de checkout: '.$e->getMessage());
        }

        // Limpiar carrito
        session()->forget('cart');

        return redirect()->away($whatsappUrl);
    }

    public function getEffectiveCurrency(): string
    {
        $currency = session()->get('currency');
        if ($currency && in_array(strtoupper($currency), ['CLP', 'USD'])) {
            return strtoupper($currency);
        }

        return (app()->getLocale() === 'es') ? 'CLP' : 'USD';
    }

    private function calculateTotal(array $cart, string $currency): float
    {
        $total = 0;
        foreach ($cart as $item) {
            $price = $currency === 'CLP' ? $item['price_clp'] : $item['price_usd'];
            $total += $price * $item['quantity'];
        }

        return $total;
    }
}
