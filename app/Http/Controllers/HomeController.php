<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $featuredSlugs = [
            'plugin-integracion-bsale-woocommerce',
            'rich-e-chatbot-assistant',
            'pack-chatbot-ecommerce-pro',
            'rew-multi-currency-translator-pro',
        ];

        $featuredProducts = Product::where('is_active', true)
            ->where('is_featured', true)
            ->get()
            ->sortBy(function ($product) use ($featuredSlugs) {
                $idx = array_search($product->slug, $featuredSlugs);

                return $idx !== false ? $idx : 999;
            })
            ->take(4)
            ->values();

        $featuredProjects = PortfolioProject::where('is_featured', true)->orderBy('order')->take(6)->get();
        $services = Service::orderBy('order')->get();
        $latestPosts = Post::where('is_published', true)->latest()->take(3)->get();

        return view('home', compact('featuredProducts', 'featuredProjects', 'services', 'latestPosts'));
    }

    public function nosotros()
    {
        $recentProjects = PortfolioProject::orderBy('order', 'asc')->get();

        return view('nosotros', compact('recentProjects'));
    }

    public function privacidad()
    {
        return view('legal.privacidad');
    }

    public function terminos()
    {
        return view('legal.terminos');
    }
}
