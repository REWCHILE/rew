<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->query('categoria', 'todos');

        $query = PortfolioProject::orderBy('order');

        if ($selectedCategory && $selectedCategory !== 'todos') {
            $query->where('category', $selectedCategory);
        }

        $projects = $query->get();
        $categories = PortfolioProject::distinct()->pluck('category');

        return view('portafolio.index', compact('projects', 'categories', 'selectedCategory'));
    }

    public function show($slug)
    {
        $project = PortfolioProject::where('slug', $slug)->firstOrFail();
        $otherProjects = PortfolioProject::where('id', '!=', $project->id)->take(3)->get();

        return view('portafolio.show', compact('project', 'otherProjects'));
    }
}
