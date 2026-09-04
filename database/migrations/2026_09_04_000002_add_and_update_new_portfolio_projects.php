<?php

use App\Models\PortfolioProject;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $projects = [
            [
                'slug' => 'betsturf-racing-ai',
                'title' => 'BetsTurf - TurfMetrics Racing AI Platform',
                'client' => 'BetsTurf / TurfMetrics',
                'category' => 'FinTech, Hípica & Inteligencia Artificial',
                'project_date' => '2024-08-25',
                'summary' => 'Plataforma analítica avanzada para el turf e hípica internacional impulsada por Inteligencia Artificial y Machine Learning. Desarrollada en Laravel con paneles en tiempo real y modelos predictivos.',
                'full_description' => 'BetsTurf / TurfMetrics (betsturf.com) es una innovadora plataforma tecnológica que aplica Inteligencia Artificial y algoritmos de Machine Learning al análisis cuantitativo de carreras de caballos en los principales hipódromos del mundo. Diseñada sobre una robusta arquitectura en Laravel, la plataforma procesa grandes volúmenes de datos históricos, condiciones meteorológicas, estadísticas de jinetes y performances para proporcionar métricas predictivas y rankings de probabilidad en tiempo real, todo integrado en un dashboard oscuro de nivel institucional.',
                'status' => 'Finalizado',
                'project_url' => 'https://betsturf.com/',
                'technologies' => 'Laravel, PHP 8.3, Python, Machine Learning, Inteligencia Artificial, Algoritmos Predictivos, REST API, MySQL',
                'role' => 'Arquitectura de Software, Desarrollo en Laravel, Modelado de Datos & Machine Learning',
                'featured_image' => '/images/portfolio/betsturf.webp',
                'gallery' => [
                    '/images/portfolio/betsturf.webp',
                ],
                'results' => [
                    'Procesamiento y modelado de datos de carreras hípicas con algoritmos de Machine Learning',
                    'Arquitectura backend sólida, segura y escalable construida sobre Laravel',
                    'Panel analítico interactivo con visualización de datos y probabilidades en tiempo real',
                    'Plataforma internacional con usuarios activos en múltiples hipódromos del mundo',
                ],
                'is_featured' => true,
                'order' => 1,
                'meta_title' => 'BetsTurf - Plataforma Hípica con Laravel & Machine Learning | REW',
                'meta_description' => 'Desarrollo de plataforma analítica para hípica internacional con Laravel, IA y Machine Learning para BetsTurf por REW.',
            ],
            [
                'slug' => 'high-contrast-detailing',
                'title' => 'High Contrast Detailing Center',
                'client' => 'High Contrast Detailing Center (Chicureo, Colina)',
                'category' => 'Car Detailing & Plataformas Web',
                'project_date' => '2024-07-20',
                'summary' => 'Plataforma web premium para centro de car detailing automotriz de alta gama en Chicureo. Desarrollada en Laravel con catálogo interactivo de servicios, galerías de tratamiento cerámico y captación de clientes VIP.',
                'full_description' => 'Diseño y desarrollo web completo sobre Laravel para High Contrast Detailing Center (highcontrastdetailingcenter.cl), estudio líder en protección y restauración estética automotriz en Chicureo y Santiago. El sitio combina una estética oscura y sofisticada con una arquitectura robusta en Laravel, catálogo de servicios de pulido profesional, recubrimientos cerámicos Gtechniq 9H, detallado de interiores y protección de cristales, optimizado para posicionamiento SEO local y conversión inmediata.',
                'status' => 'Finalizado',
                'project_url' => 'https://highcontrastdetailingcenter.cl/',
                'technologies' => 'Laravel 11, Blade, PHP 8.3, TailwindCSS, JavaScript, SEO Local Chicureo',
                'role' => 'Diseño UI/UX, Desarrollo Full-Stack en Laravel & Posicionamiento SEO Local',
                'featured_image' => '/images/portfolio/high_contrast_detailing.webp',
                'gallery' => [
                    '/images/portfolio/high_contrast_detailing.webp',
                ],
                'results' => [
                    'Arquitectura moderna, escalable y segura desarrollada sobre Laravel',
                    'Diseño visual premium orientado a clientes del segmento automotriz de lujo',
                    'Posicionamiento orgánico destacado en Chicureo, Colina y sector oriente',
                    'Canal directo de cotización y agendamiento de turnos vía WhatsApp',
                ],
                'is_featured' => true,
                'order' => 2,
                'meta_title' => 'High Contrast Detailing Center - Plataforma Laravel | REW',
                'meta_description' => 'Desarrollo web en Laravel y diseño premium para High Contrast Detailing Center en Chicureo por REW.',
            ],
            [
                'slug' => 'gasfiter-certificado',
                'title' => 'Gasfiter Certificado SEC Chile',
                'client' => 'Gasfiter Certificado SEC Santiago',
                'category' => 'Plataformas Web & Servicios Técnicos',
                'project_date' => '2024-06-15',
                'summary' => 'Plataforma web de servicios de gasfitería autorizada SEC en Santiago. Programada a medida en PHP puro, JavaScript y CSS customizado, logrando un puntaje perfecto de 100/100 en Google PageSpeed Insights y máxima conversión a llamadas y WhatsApp.',
                'full_description' => 'Desarrollo de sitio web de alto rendimiento para Gasfiter Certificado SEC (gasfiter-certificado.cl). El proyecto fue construido desde cero con arquitectura ultra liviana en PHP nativo, CSS modular y JavaScript asíncrono sin dependencias externas pesadas. Diseñado específicamente para responder ante emergencias de filtraciones y gasfitería en Santiago, alcanzando la máxima calificación de 100/100 en Google PageSpeed Insights con tiempos de carga instantáneos inferiores a 400ms.',
                'status' => 'Finalizado',
                'project_url' => 'https://gasfiter-certificado.cl/',
                'technologies' => 'PHP Puro, JavaScript Vanilla, CSS3 Customizado, Google PageSpeed 100/100, SEO Local',
                'role' => 'Arquitectura de Software, Desarrollo Web Full Stack & Optimización PageSpeed 100',
                'featured_image' => '/images/portfolio/gasfiter_certificado.webp',
                'gallery' => [
                    '/images/portfolio/gasfiter_certificado.webp',
                ],
                'results' => [
                    'Score de 100/100 perfecto en Google PageSpeed Insights (Mobile & Desktop)',
                    'Tiempo de carga ultra rápido inferior a 400ms en redes móviles',
                    'Top rankings locales en Google para servicios de gasfitería en Santiago',
                    'Alta conversión de visitas a llamadas directas y chats de WhatsApp',
                ],
                'is_featured' => true,
                'order' => 3,
                'meta_title' => 'Gasfiter Certificado SEC Chile - PageSpeed 100 & PHP Puro | REW',
                'meta_description' => 'Desarrollo web en PHP puro con puntuación 100 en PageSpeed Insights para Gasfiter Certificado SEC Chile por REW.',
            ],
            [
                'slug' => 'instalgas-chile',
                'title' => 'InstalGas Chile - Servicios de Gas Autorizados SEC',
                'client' => 'InstalGas Chile',
                'category' => 'Plataformas Web & Servicios Técnicos',
                'project_date' => '2024-08-10',
                'summary' => 'Sitio web de servicios técnicos de gas e instalaciones autorizadas SEC. Desarrollado en PHP puro, JS y CSS customizado, logrando una calificación perfecta de 100/100 en Google PageSpeed Insights con carga ultra instantánea.',
                'full_description' => 'Desarrollo y optimización extrema de sitio web para InstalGas Chile (instalgaschile.cl), especialistas en emergencias de gas, detección de fugas e instalaciones certificadas SEC. La plataforma fue programada a mano en PHP limpio con CSS crítico en línea y JavaScript modular sin librerías externas, logrando una velocidad fulgurante de 100 puntos en Google PageSpeed Insights (Mobile y Desktop) con 0 CLS, permitiendo contactar un técnico en cuestión de segundos.',
                'status' => 'Finalizado',
                'project_url' => 'https://instalgaschile.cl/',
                'technologies' => 'PHP Nativo, Vanilla JavaScript, CSS3 Custom, PageSpeed Insights 100/100, Core Web Vitals',
                'role' => 'Arquitectura de Rendimiento, Programación Web a Medida & Optimización Extrema 100/100',
                'featured_image' => '/images/portfolio/instalgas_chile.webp',
                'gallery' => [
                    '/images/portfolio/instalgas_chile.webp',
                ],
                'results' => [
                    '100/100 en Google PageSpeed Insights en dispositivos móviles y de escritorio',
                    'First Contentful Paint (FCP) inferior a 350ms y 0 Cumulative Layout Shift',
                    'Estructura optimizada para campañas de Google Ads y llamadas de urgencia',
                    'Aumento de más del 300% en cotizaciones y llamadas directas',
                ],
                'is_featured' => true,
                'order' => 4,
                'meta_title' => 'InstalGas Chile - Web PageSpeed 100 & PHP Puro | REW',
                'meta_description' => 'Desarrollo de sitio web de máxima velocidad en PHP puro con 100/100 en PageSpeed Insights para InstalGas Chile por REW.',
            ],
        ];

        foreach ($projects as $proj) {
            PortfolioProject::updateOrCreate(
                ['slug' => $proj['slug']],
                $proj
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        PortfolioProject::whereIn('slug', [
            'betsturf-racing-ai',
            'high-contrast-detailing',
            'instalgas-chile',
        ])->delete();
    }
};
