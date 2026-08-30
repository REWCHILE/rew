<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use App\Models\Product;
use App\Models\Service;

class ServiceController extends Controller
{
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->first();
        if (! $service) {
            $service = new Service([
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'slug' => $slug,
                'tagline' => 'Servicios de ingeniería, desarrollo de software y consultoría tecnológica por REW.',
                'description' => 'Servicios especializados de desarrollo tecnológico e integración en Chile.',
                'features' => ['Desarrollo a medida', 'Código 100% limpio', 'Soporte prioritario'],
            ]);
        }

        $relatedProjects = PortfolioProject::take(3)->get();
        $relatedProducts = Product::where('is_active', true)->take(2)->get();

        if (view()->exists('servicios.'.$slug)) {
            return view('servicios.'.$slug, compact('service', 'relatedProjects', 'relatedProducts'));
        }

        return view('servicios.show', compact('service', 'relatedProjects', 'relatedProducts'));
    }

    public function desarrolloWeb()
    {
        return $this->show('desarrollo-web');
    }

    public function desarrolloSoftwareChile()
    {
        return $this->show('desarrollo-de-software-chile');
    }

    public function optimizacionSeo()
    {
        return $this->show('optimizacion-seo');
    }

    public function publicidadDigital()
    {
        return $this->show('publicidad-digital');
    }

    public function mantenimientoWeb()
    {
        return $this->show('mantenimiento-web');
    }

    public function soporteWordpress()
    {
        return $this->show('soporte-wordpress');
    }

    public function disenoUxUi()
    {
        return $this->show('diseno-ux-ui');
    }

    public function integracionBsale()
    {
        return $this->show('integracion-bsale-woocommerce');
    }

    public function implementacionOdoo()
    {
        return $this->show('implementacion-odoo-chile');
    }

    public function softwareFactory()
    {
        return $this->show('software-factory-chile');
    }
}
