<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->query('categoria');
        $search = $request->query('buscar');
        $sort = $request->query('orden', 'destacados');

        $query = Product::where('is_active', true);

        if ($selectedCategory && $selectedCategory !== 'todos') {
            $query->where('category_slug', $selectedCategory);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        switch ($sort) {
            case 'precio-menor':
                $query->orderBy('price_usd', 'asc');
                break;
            case 'precio-mayor':
                $query->orderBy('price_usd', 'desc');
                break;
            case 'recientes':
                $query->latest();
                break;
            default:
                $query->orderByDesc('is_featured')->latest();
                break;
        }

        $products = $query->paginate(9)->withQueryString();

        if ($request->ajax() || $request->query('ajax')) {
            return response()->json([
                'html' => view('tienda._products_grid', compact('products'))->render(),
                'hasMore' => $products->hasMorePages(),
                'nextPageUrl' => $products->nextPageUrl(),
                'currentPage' => $products->currentPage(),
                'total' => $products->total(),
            ]);
        }

        $categories = Category::all();

        return view('tienda.index', compact('products', 'categories', 'selectedCategory', 'search', 'sort'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('id', '!=', $product->id)
            ->where('category_slug', $product->category_slug)
            ->take(3)
            ->get();

        if ($relatedProducts->isEmpty()) {
            $relatedProducts = Product::where('id', '!=', $product->id)->take(3)->get();
        }

        return view('tienda.show', compact('product', 'relatedProducts'));
    }

    // Rutas directas para compatibilidad SEO 1:1 con Google & Landing Page Comercial
    public function chatbotIaWordpress()
    {
        return view('landing.rich-e-chatbot');
    }

    public function asistenteVirtualWoocommerce()
    {
        return $this->show('addon-woocommerce-premium-sync');
    }

    public function richEChatbotIaWordpress()
    {
        return view('landing.rich-e-chatbot');
    }
}
