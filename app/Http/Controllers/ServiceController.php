<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use App\Models\Product;
use App\Models\Service;

class ServiceController extends Controller
{
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $relatedProjects = PortfolioProject::take(3)->get();
        $relatedProducts = Product::where('is_active', true)->take(2)->get();

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
}
