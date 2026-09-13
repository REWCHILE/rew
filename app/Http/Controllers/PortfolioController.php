<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $this->syncPortfolioIfOutdated();

        $selectedCategory = $request->query('categoria', 'todos');
        $search = $request->query('buscar');

        $query = PortfolioProject::orderBy('order');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('client', 'like', "%{$search}%")
                    ->orWhere('summary', 'like', "%{$search}%")
                    ->orWhere('technologies', 'like', "%{$search}%");
            });
        }

        if ($selectedCategory && $selectedCategory !== 'todos') {
            switch ($selectedCategory) {
                case 'ecommerce':
                    $query->where(function ($q) {
                        $q->where('category', 'like', '%E-Commerce%')
                            ->orWhere('category', 'like', '%Merch%')
                            ->orWhere('category', 'like', '%Moda%')
                            ->orWhere('category', 'like', '%Indumentaria%');
                    });
                    break;
                case 'web-corporativo':
                    $query->where(function ($q) {
                        $q->where('category', 'like', '%Web%')
                            ->orWhere('category', 'like', '%Streaming%')
                            ->orWhere('category', 'like', '%Salud%')
                            ->orWhere('category', 'like', '%Inmobiliaria%')
                            ->orWhere('category', 'like', '%Turismo%')
                            ->orWhere('category', 'like', '%Corporativo%');
                    });
                    break;
                case 'software-edtech':
                    $query->where(function ($q) {
                        $q->where('category', 'like', '%Software%')
                            ->orWhere('category', 'like', '%EdTech%')
                            ->orWhere('category', 'like', '%Learning%')
                            ->orWhere('category', 'like', '%Interactividad%')
                            ->orWhere('category', 'like', '%Servicios%');
                    });
                    break;
                case 'ia-fintech':
                    $query->where(function ($q) {
                        $q->where('category', 'like', '%Inteligencia Artificial%')
                            ->orWhere('category', 'like', '%IA%')
                            ->orWhere('category', 'like', '%FinTech%')
                            ->orWhere('category', 'like', '%LLM%');
                    });
                    break;
                default:
                    $query->where('category', $selectedCategory);
                    break;
            }
        }

        $projects = $query->get();

        // 4 Macro-filtros limpios y sofisticados (Limpieza visual cognitiva)
        $macroCategories = [
            'todos' => [
                'name' => 'Todos los Casos',
                'count' => PortfolioProject::count(),
                'icon' => '✨',
            ],
            'ecommerce' => [
                'name' => 'E-Commerce & Merch',
                'count' => PortfolioProject::where(fn ($q) => $q->where('category', 'like', '%E-Commerce%')
                    ->orWhere('category', 'like', '%Merch%')
                    ->orWhere('category', 'like', '%Moda%')
                    ->orWhere('category', 'like', '%Indumentaria%'))->count(),
                'icon' => '🛍️',
            ],
            'web-corporativo' => [
                'name' => 'Web Corporativa & Turismo',
                'count' => PortfolioProject::where(fn ($q) => $q->where('category', 'like', '%Web%')
                    ->orWhere('category', 'like', '%Streaming%')
                    ->orWhere('category', 'like', '%Salud%')
                    ->orWhere('category', 'like', '%Inmobiliaria%')
                    ->orWhere('category', 'like', '%Turismo%')
                    ->orWhere('category', 'like', '%Corporativo%'))->count(),
                'icon' => '🌐',
            ],
            'software-edtech' => [
                'name' => 'Software a Medida & EdTech',
                'count' => PortfolioProject::where(fn ($q) => $q->where('category', 'like', '%Software%')
                    ->orWhere('category', 'like', '%EdTech%')
                    ->orWhere('category', 'like', '%Learning%')
                    ->orWhere('category', 'like', '%Interactividad%')
                    ->orWhere('category', 'like', '%Servicios%'))->count(),
                'icon' => '💻',
            ],
            'ia-fintech' => [
                'name' => 'Inteligencia Artificial & FinTech',
                'count' => PortfolioProject::where(fn ($q) => $q->where('category', 'like', '%Inteligencia Artificial%')
                    ->orWhere('category', 'like', '%IA%')
                    ->orWhere('category', 'like', '%FinTech%')
                    ->orWhere('category', 'like', '%LLM%'))->count(),
                'icon' => '🤖',
            ],
        ];

        return view('portafolio.index', compact('projects', 'macroCategories', 'selectedCategory', 'search'));
    }

    public function show($slug)
    {
        $this->syncPortfolioIfOutdated();

        $project = PortfolioProject::where('slug', $slug)->firstOrFail();
        $otherProjects = PortfolioProject::where('id', '!=', $project->id)->take(3)->get();

        return view('portafolio.show', compact('project', 'otherProjects'));
    }

    /**
     * Auto-sincronización de proyectos en producción en caso de que la BD remota no haya ejecutado migraciones
     */
    protected function syncPortfolioIfOutdated(): void
    {
        $funktographer = PortfolioProject::where('slug', 'funktographer')->first();
        $prodoral = PortfolioProject::where('slug', 'prodoral-chile')->first();

        $mustSync = ! $funktographer
            || ! $prodoral
            || ! str_contains((string) $funktographer->full_description, '[funktographer.cl/links]');

        if (! $mustSync) {
            return;
        }

        $projects = [
            [
                'slug' => 'funktographer',
                'title' => 'Funktographer - Plataforma Audiovisual & Live Link Bio',
                'client' => 'Funktographer / Emmanuel Ramírez',
                'category' => 'Plataformas Web & Software a Medida',
                'project_date' => '2024-09-01',
                'summary' => 'Plataforma web con sistema autoadministrable desarrollado a medida en PHP para Emmanuel Ramírez "Funktographer". Incluye panel de gestión de proyectos, blog editorial, optimización SEO avanzada y módulo dinámico de Live Link Bio (funktographer.cl/links).',
                'full_description' => "Desarrollo de plataforma web corporativa y sistema autoadministrable customizado en PHP nativo para Emmanuel Ramírez \"Funktographer\" ([funktographer.cl](https://funktographer.cl/)), fotógrafo profesional y realizador audiovisual con destacada trayectoria en eventos corporativos, producciones gastronómicas y coberturas para marcas líderes como WEG, ORSAN, El Vitalicio y más.\n\nEl proyecto fue desarrollado desde cero bajo una arquitectura modular y personalizada que resuelve las necesidades operativas y de marketing del cliente:\n\n1. **Sistema Autoadministrable Custom en PHP**: Panel de control propio, seguro y ligero sin dependencias pesadas ni sobrecarga de plugins, permitiendo gestionar el portafolio de proyectos, coberturas fotográficas y artículos del blog con total independencia.\n2. **Módulo Live Link Bio Integrado ([funktographer.cl/links](https://funktographer.cl/links))**: Centralizador dinámico de enlaces estilo Link Bio alojado 100% en su propio dominio. Conecta a prospectos y clientes con cotizaciones directas a WhatsApp, canal de YouTube, portafolios en Behance y 500px, y muestra en tiempo real las últimas producciones publicadas.\n3. **Optimización SEO On-Page y Velocidad**: Marcado semántico estructurado Schema.org, metadatos optimizados para indexación en Google y tiempos de carga instantáneos en galerías de alta resolución sin degradar la calidad visual.",
                'status' => 'Finalizado',
                'project_url' => 'https://funktographer.cl/',
                'technologies' => 'PHP Nativo, MySQL, JavaScript Vanilla, CSS3 Custom, Panel Autoadministrable a Medida, Live Link Bio Engine, SEO Avanzado',
                'role' => 'Arquitectura Backend, Sistema Autoadministrable Custom, Live Link Bio Engine & SEO',
                'featured_image' => '/images/portfolio/funktographer.webp',
                'gallery' => [
                    '/images/portfolio/funktographer.webp',
                ],
                'results' => [
                    'Panel autoadministrable 100% a medida en PHP para gestión ágil de proyectos y blog',
                    'Módulo Live Link Bio propio (funktographer.cl/links) para centralizar tráfico desde Instagram',
                    'Carga ultrarrápida y optimizada para despliegue de imágenes y videos en alta fidelidad',
                    'Estructura SEO optimizada que impulsa la captación de clientes corporativos y gastronómicos',
                ],
                'is_featured' => true,
                'order' => 1,
                'meta_title' => 'Funktographer - Plataforma Autoadministrable PHP & Live Link Bio | REW',
                'meta_description' => 'Desarrollo de plataforma web autoadministrable en PHP, Live Link Bio dinámico y optimización SEO para Funktographer por REW.',
            ],
            [
                'slug' => 'prodoral-chile',
                'title' => 'Prodoral Chile - Sellado de Fugas de Gas & SEO',
                'client' => 'Prodoral Chile / Domingo Isaín Plaza Caamaño (SEC)',
                'category' => 'Plataformas Web & Servicios Técnicos',
                'project_date' => '2024-08-20',
                'summary' => 'Plataforma web de alto rendimiento programada a medida en PHP puro para Prodoral Chile y el instalador certificado SEC Domingo Plaza. Enfoque integral en posicionamiento SEO técnico y local para sellado de fugas de gas sin romper muros, Core Web Vitals en verde y máxima conversión a llamadas y WhatsApp 24/7.',
                'full_description' => "Desarrollo y optimización web sobre PHP nativo para Prodoral Chile ([prodoral.cl](https://prodoral.cl/)), especialistas líderes en el sellado no destructivo de microfugas de gas en redes interiores mediante el polímero alemán Prodoral R6-1, con certificación oficial de la Superintendencia de Electricidad y Combustibles (SEC).\n\nEl sitio web fue construido para responder de forma inmediata ante situaciones de emergencia y cortes de suministro:\n\n1. **Desarrollo en PHP Puro & Velocidad Extrema**: Código limpio sin frameworks pesados, con CSS modular y JavaScript asíncrono, logrando tiempos de carga inferiores a 400ms y puntajes sobresalientes en Core Web Vitals.\n2. **Estrategia SEO Técnico y Local**: Arquitectura optimizada para dominar las búsquedas orgánicas transaccionales en Google para Santiago y regiones (\"fugas de gas sin romper\", \"sellado de cañerías sin picar\", \"recuperación Sello Verde SEC\"), maximizando la captación de clientes particulares, comunidades de edificios y empresas.\n3. **Embudos de Conversión Inmediata 24/7**: Canales de contacto directos con botones de llamada de urgencia, chat directo a WhatsApp con mensaje contextualizado, verificación de licencia oficial SEC en tiempo real y descarga de ficha técnica alemana oficial de Prodoral R6-1.",
                'status' => 'Finalizado',
                'project_url' => 'https://prodoral.cl/',
                'technologies' => 'PHP Puro, Vanilla JavaScript, CSS3 Modular, SEO Técnico & Local, Core Web Vitals, Schema.org JSON-LD',
                'role' => 'Arquitectura de Rendimiento, Programación Web Full Stack en PHP & Estrategia SEO Técnico',
                'featured_image' => '/images/portfolio/prodoral.webp',
                'gallery' => [
                    '/images/portfolio/prodoral.webp',
                ],
                'results' => [
                    'Posicionamiento orgánico de alta visibilidad en Google para términos transaccionales de sellado de gas',
                    'Tiempos de carga ultrarrápidos inferiores a 400ms y máxima calificación en Core Web Vitals',
                    'Embudos de conversión de urgencia 24/7 con llamadas directas y WhatsApp sincronizado con el instalador SEC',
                    'Integración de validación de credenciales SEC y ficha técnica oficial alemana de Prodoral R6-1',
                ],
                'is_featured' => true,
                'order' => 2,
                'meta_title' => 'Prodoral Chile - Plataforma Web PHP & Posicionamiento SEO | REW',
                'meta_description' => 'Desarrollo web en PHP puro con estrategia de posicionamiento SEO técnico para Prodoral Chile: sellado de fugas de gas sin romper muros por REW.',
            ],
        ];

        foreach ($projects as $proj) {
            PortfolioProject::updateOrCreate(
                ['slug' => $proj['slug']],
                $proj
            );
        }
    }
}
