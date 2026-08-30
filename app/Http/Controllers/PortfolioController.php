<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
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
                'count' => PortfolioProject::where(fn ($q) => $q->where('category', 'like', '%E-Commerce%')->orWhere('category', 'like', '%Merch%'))->count(),
                'icon' => '🛍️',
            ],
            'web-corporativo' => [
                'name' => 'Web Corporativa & Turismo',
                'count' => PortfolioProject::where(fn ($q) => $q->where('category', 'like', '%Web%')->orWhere('category', 'like', '%Streaming%')->orWhere('category', 'like', '%Turismo%')->orWhere('category', 'like', '%Inmobiliaria%'))->count(),
                'icon' => '🌐',
            ],
            'software-edtech' => [
                'name' => 'Software a Medida & EdTech',
                'count' => PortfolioProject::where(fn ($q) => $q->where('category', 'like', '%Software%')->orWhere('category', 'like', '%EdTech%')->orWhere('category', 'like', '%Interactividad%'))->count(),
                'icon' => '💻',
            ],
            'ia-fintech' => [
                'name' => 'Inteligencia Artificial & FinTech',
                'count' => PortfolioProject::where(fn ($q) => $q->where('category', 'like', '%IA%')->orWhere('category', 'like', '%FinTech%')->orWhere('category', 'like', '%LLM%'))->count(),
                'icon' => '🤖',
            ],
        ];

        return view('portafolio.index', compact('projects', 'macroCategories', 'selectedCategory', 'search'));
    }

    public function show($slug)
    {
        $project = PortfolioProject::where('slug', $slug)->firstOrFail();
        $otherProjects = PortfolioProject::where('id', '!=', $project->id)->take(3)->get();

        return view('portafolio.show', compact('project', 'otherProjects'));
    }
}
