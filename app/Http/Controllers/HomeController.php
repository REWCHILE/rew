<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PortfolioProject;
use App\Models\Service;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_active', true)->where('is_featured', true)->take(4)->get();
        $featuredProjects = PortfolioProject::where('is_featured', true)->orderBy('order')->take(6)->get();
        $services = Service::orderBy('order')->get();
        $latestPosts = Post::where('is_published', true)->latest()->take(3)->get();

        return view('home', compact('featuredProducts', 'featuredProjects', 'services', 'latestPosts'));
    }

    public function nosotros()
    {
        return view('nosotros');
    }
}
