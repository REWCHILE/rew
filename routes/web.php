<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GeoSeoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\RicheChatController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

// 1. Institucional & Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/nosotros', [HomeController::class, 'nosotros'])->name('nosotros');

// 2. Tienda de Plugins WordPress & Chatbots IA
Route::get('/tienda', [ShopController::class, 'index'])->name('tienda.index');
Route::get('/producto/{slug}', [ShopController::class, 'show'])->name('tienda.show');

// Rutas Directas / Legacy para Compatibilidad SEO 1:1 con Google
Route::get('/chatbot-ia-wordpress', [ShopController::class, 'chatbotIaWordpress'])->name('legacy.chatbot-ia');
Route::get('/asistente-virtual-woocommerce', [ShopController::class, 'asistenteVirtualWoocommerce'])->name('legacy.asistente-woo');
Route::get('/rich-e-chatbot-ia-wordpress', [ShopController::class, 'richEChatbotIaWordpress'])->name('legacy.rich-e-pack');

// 3. Portafolio Web & Casos de Éxito
Route::get('/portafolio', [PortfolioController::class, 'index'])->name('portafolio.index');
Route::get('/portafolio-web', [PortfolioController::class, 'index']);
Route::get('/portafolio/{slug}', [PortfolioController::class, 'show'])->name('portafolio.show');

// 4. Servicios Profesionales REW
Route::get('/desarrollo-web', [ServiceController::class, 'desarrolloWeb'])->name('servicios.desarrollo-web');
Route::get('/desarrollo-de-software-chile', [ServiceController::class, 'desarrolloSoftwareChile'])->name('servicios.software-chile');
Route::get('/optimizacion-seo', [ServiceController::class, 'optimizacionSeo'])->name('servicios.seo');
Route::get('/publicidad-digital', [ServiceController::class, 'publicidadDigital'])->name('servicios.publicidad');
Route::get('/mantenimiento-web', [ServiceController::class, 'mantenimientoWeb'])->name('servicios.mantenimiento');
Route::get('/soporte-wordpress', [ServiceController::class, 'soporteWordpress'])->name('servicios.soporte-wordpress');
Route::get('/diseno-ux-ui', [ServiceController::class, 'disenoUxUi'])->name('servicios.diseno-ux-ui');

// 5. Blog & Knowledge Hub
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// 6. Contacto & Cotizador Interactivo (Blindado con Rate Limiting)
Route::get('/contacto', [QuoteController::class, 'index'])->name('contacto');
Route::post('/cotizar', [QuoteController::class, 'store'])->middleware('throttle:15,1')->name('cotizar.store');

// 7. Carrito de Compras & Checkout
Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');
Route::post('/carrito/agregar', [CartController::class, 'add'])->name('cart.add');
Route::post('/carrito/eliminar', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/currency', [CartController::class, 'setCurrency'])->name('currency.set');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout.index');
Route::post('/checkout', [CartController::class, 'processCheckout'])->name('checkout.process');

// 8. Rich-E AI Agent Endpoint (Blindado con Rate Limiting)
Route::post('/api/riche/chat', [RicheChatController::class, 'chat'])->middleware('throttle:30,1')->name('riche.chat');

// 9. Instagram Feed Endpoint (Async Cached Feed)
Route::get('/api/instagram/feed', [InstagramController::class, 'feed'])->name('instagram.feed');

// 10. GEO & SEO (Machine Readable / AI Agents)
Route::get('/llms.txt', [GeoSeoController::class, 'llmsTxt']);
Route::get('/llms-full.txt', [GeoSeoController::class, 'llmsFullTxt']);
Route::get('/sitemap.xml', [GeoSeoController::class, 'sitemapXml']);
Route::get('/robots.txt', [GeoSeoController::class, 'robotsTxt']);
