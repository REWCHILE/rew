<?php

use App\Http\Controllers\AdminLeadController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminRicheController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\AuthController;
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
Route::get('/integracion-api-wordpress', fn () => redirect()->route('servicios.software-chile', [], 301));
Route::get('/desarrollo-odoo-chile', fn () => redirect()->route('servicios.odoo-chile', [], 301));

// 3. Portafolio Web & Casos de Éxito
Route::get('/portafolio', [PortfolioController::class, 'index'])->name('portafolio.index');
Route::get('/portafolio-web', [PortfolioController::class, 'index']);
Route::get('/portafolio/{slug}', [PortfolioController::class, 'show'])->name('portafolio.show');

// 4. Servicios Profesionales REW
Route::get('/servicios', fn () => redirect('/#servicios'))->name('servicios.index');
Route::get('/desarrollo-web', [ServiceController::class, 'desarrolloWeb'])->name('servicios.desarrollo-web');
Route::get('/desarrollo-de-software-chile', [ServiceController::class, 'desarrolloSoftwareChile'])->name('servicios.software-chile');
Route::get('/optimizacion-seo', [ServiceController::class, 'optimizacionSeo'])->name('servicios.seo');
Route::get('/publicidad-digital', [ServiceController::class, 'publicidadDigital'])->name('servicios.publicidad');
Route::get('/mantenimiento-web', [ServiceController::class, 'mantenimientoWeb'])->name('servicios.mantenimiento');
Route::get('/soporte-wordpress', [ServiceController::class, 'soporteWordpress'])->name('servicios.soporte-wordpress');
Route::get('/diseno-ux-ui', [ServiceController::class, 'disenoUxUi'])->name('servicios.diseno-ux-ui');

// Nuevas Landing Pages Comerciales de Alta Conversión (GSC Boost)
Route::get('/servicios/integracion-bsale-woocommerce', [ServiceController::class, 'integracionBsale'])->name('servicios.bsale-woocommerce');
Route::get('/integracion-bsale-woocommerce', [ServiceController::class, 'integracionBsale']);
Route::get('/servicios/implementacion-odoo-chile', [ServiceController::class, 'implementacionOdoo'])->name('servicios.odoo-chile');
Route::get('/implementacion-odoo-chile', [ServiceController::class, 'implementacionOdoo']);
Route::get('/servicios/software-factory-chile', [ServiceController::class, 'softwareFactory'])->name('servicios.software-factory');
Route::get('/software-factory-chile', [ServiceController::class, 'softwareFactory']);

// Herramienta de Auditoría SEO Gratuita (Diagnóstico en Vivo)
Route::get('/auditoria-seo-gratis', [AuditController::class, 'landing'])->name('auditoria.landing');

// Páginas Legales & Confianza Institucional (Privacidad y Términos)
Route::get('/politica-de-privacidad', [HomeController::class, 'privacidad'])->name('legal.privacidad');
Route::get('/privacidad', [HomeController::class, 'privacidad']);
Route::get('/terminos-y-condiciones', [HomeController::class, 'terminos'])->name('legal.terminos');
Route::get('/terminos', [HomeController::class, 'terminos']);

// 5. Blog & Knowledge Hub
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Redirección de Rutas Históricas de Blog con fechas WordPress /YYYY/MM/DD/slug/
Route::get('/{year}/{month}/{day}/{slug}', [BlogController::class, 'legacyDateRedirect'])
    ->where(['year' => '[0-9]{4}', 'month' => '[0-9]{2}', 'day' => '[0-9]{2}']);

// 6. Contacto & Cotizador Interactivo (Blindado con Rate Limiting)
Route::get('/contacto', [QuoteController::class, 'index'])->name('contacto');
Route::post('/cotizar', [QuoteController::class, 'store'])->middleware('throttle:15,1')->name('cotizar.store');
Route::post('/auditoria/analizar', [AuditController::class, 'analyze'])->middleware('throttle:10,1')->name('auditoria.analyze');

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

// 11. Autenticación & Control de Acceso
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 12. Panel de Administración Seguro de REW (Protegido por Middleware Auth)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.leads.index'));

    // Leads & Cotizaciones CRM
    Route::get('/leads', [AdminLeadController::class, 'index'])->name('leads.index');
    Route::patch('/leads/{lead}/status', [AdminLeadController::class, 'updateStatus'])->name('leads.updateStatus');
    Route::get('/leads/{lead}', [AdminLeadController::class, 'show'])->name('leads.show');
    Route::delete('/leads/{lead}', [AdminLeadController::class, 'destroy'])->name('leads.destroy');

    // Mi Perfil
    Route::get('/perfil', [AdminProfileController::class, 'showProfile'])->name('profile.index');
    Route::put('/perfil', [AdminProfileController::class, 'updateProfile'])->name('profile.update');

    // Configuración & SMTP
    Route::get('/configuracion', [AdminProfileController::class, 'showSettings'])->name('settings.index');
    Route::post('/configuracion', [AdminProfileController::class, 'updateSettings'])->name('settings.update');
    Route::post('/configuracion/test-smtp', [AdminProfileController::class, 'testSmtp'])->name('settings.test-smtp');
    Route::post('/configuracion/test-instagram', [AdminProfileController::class, 'testInstagram'])->name('settings.test-instagram');

    // Mantenedor Rich-E AI
    Route::get('/riche', [AdminRicheController::class, 'index'])->name('riche.index');
    Route::post('/riche', [AdminRicheController::class, 'store'])->name('riche.store');
    Route::put('/riche/{item}', [AdminRicheController::class, 'update'])->name('riche.update');
    Route::post('/riche/prompt', [AdminRicheController::class, 'updatePrompt'])->name('riche.prompt');
    Route::delete('/riche/{item}', [AdminRicheController::class, 'destroy'])->name('riche.destroy');
});
