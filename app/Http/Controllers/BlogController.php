<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Listado del Blog con soporte para categorías, paginación y scroll infinito
     */
    public function index(Request $request): View|JsonResponse
    {
        $category = $request->query('category');
        $query = Post::where('is_published', true)->latest();

        if (! empty($category) && $category !== 'all') {
            $query->where('category', $category);
        }

        $posts = $query->paginate(9)->withQueryString();

        if ($request->ajax() || $request->query('ajax')) {
            return response()->json([
                'html' => view('blog._posts_grid', compact('posts'))->render(),
                'hasMore' => $posts->hasMorePages(),
                'nextPageUrl' => $posts->nextPageUrl(),
                'currentPage' => $posts->currentPage(),
                'total' => $posts->total(),
            ]);
        }

        // Categorías activas con conteo
        $categories = Post::where('is_published', true)
            ->select('category')
            ->groupBy('category')
            ->pluck('category');

        $totalCount = Post::where('is_published', true)->count();

        return view('blog.index', compact('posts', 'categories', 'category', 'totalCount'));
    }

    /**
     * Vista de un artículo individual con Topic Cluster e Interlinking
     */
    public function show(string $slug): View
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();

        // 1. Obtener artículos relacionados del MISMO cluster / categoría
        $relatedPosts = Post::where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->where('is_published', true)
            ->latest()
            ->take(4)
            ->get();

        // Si hay menos de 4 en la misma categoría, rellenar con los más recientes de otros clusters
        if ($relatedPosts->count() < 4) {
            $existingIds = $relatedPosts->pluck('id')->push($post->id);
            $fallbackPosts = Post::whereNotIn('id', $existingIds)
                ->where('is_published', true)
                ->latest()
                ->take(4 - $relatedPosts->count())
                ->get();
            $relatedPosts = $relatedPosts->merge($fallbackPosts);
        }

        return view('blog.show', compact('post', 'relatedPosts'));
    }

    /**
     * Redirección permanente 301 para URLs históricas de WordPress con estructura /YYYY/MM/DD/slug/
     */
    public function legacyDateRedirect(string $year, string $month, string $day, string $slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ($post) {
            return redirect()->route('blog.show', $post->slug, 301);
        }

        // Búsqueda por similitud de slug
        $cleanSlug = trim(preg_replace('/[^a-z0-9\-]/i', '', $slug));
        $fuzzyPost = Post::where('slug', 'like', "%{$cleanSlug}%")->first();
        if ($fuzzyPost) {
            return redirect()->route('blog.show', $fuzzyPost->slug, 301);
        }

        return redirect()->route('blog.index', [], 301);
    }
}
