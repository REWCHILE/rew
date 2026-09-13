<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\RewSeoPilotService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminBlogController extends Controller
{
    /**
     * Listado general de artículos de blog con filtros, buscador y estadísticas.
     */
    public function index(Request $request): View
    {
        $search = $request->query('q');
        $selectedCategory = $request->query('categoria', 'todos');
        $status = $request->query('status', 'all');

        $query = Post::query();

        if (! empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($selectedCategory && $selectedCategory !== 'todos') {
            $query->where('category', $selectedCategory);
        }

        if ($status && $status !== 'all') {
            if ($status === 'published') {
                $query->where('is_published', true);
            } elseif ($status === 'draft') {
                $query->where('is_published', false);
            }
        }

        $posts = $query->latest('id')->paginate(15)->withQueryString();

        $stats = [
            'total' => Post::count(),
            'published' => Post::where('is_published', true)->count(),
            'drafts' => Post::where('is_published', false)->count(),
            'categories' => Post::distinct('category')->count('category'),
        ];

        $categories = Post::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('admin.blog.index', compact(
            'posts',
            'stats',
            'categories',
            'search',
            'selectedCategory',
            'status'
        ));
    }

    /**
     * Formulario de creación de un nuevo artículo.
     */
    public function create(): View
    {
        $existingCategories = Post::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->toArray();

        $defaultCategories = [
            'Integraciones & E-Commerce',
            'Desarrollo Web & CMS',
            'Arquitectura de Software & APIs',
            'SEO & Posicionamiento en Google',
            'Inteligencia Artificial & Automatización',
            'Tecnología & Negocios Chile',
        ];

        $allCategories = array_values(array_unique(array_merge($defaultCategories, $existingCategories)));

        return view('admin.blog.create', compact('allCategories'));
    }

    /**
     * Guardar un nuevo artículo en la base de datos.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'category' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'read_time_minutes' => 'nullable|integer|min:1|max:120',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|string|max:255',
            'image_file' => 'nullable|image|max:12288',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_published' => 'nullable|boolean',
            'faq_questions' => 'nullable|array',
            'faq_answers' => 'nullable|array',
        ]);

        $slug = ! empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        $originalSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }
        $validated['slug'] = $slug;

        // Subida de imagen destacada
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $ext = $file->getClientOriginalExtension();
            $filename = "{$slug}-".time().".{$ext}";
            $destinationPath = public_path('images/blog');
            if (! File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $validated['featured_image'] = "/images/blog/{$filename}";
        } elseif (empty($validated['featured_image'])) {
            $validated['featured_image'] = '/images/blog/default.webp';
        }

        // Estructurar Schema FAQs
        $faqSchema = [];
        $questions = $request->input('faq_questions', []);
        $answers = $request->input('faq_answers', []);
        if (is_array($questions) && is_array($answers)) {
            foreach ($questions as $i => $q) {
                $qText = trim((string) $q);
                $aText = trim((string) ($answers[$i] ?? ''));
                if (! empty($qText) && ! empty($aText)) {
                    $faqSchema[] = [
                        'question' => $qText,
                        'answer' => $aText,
                    ];
                }
            }
        }
        $validated['faq_schema'] = ! empty($faqSchema) ? $faqSchema : null;

        // Estimación automática de tiempo de lectura si no se provee
        if (empty($validated['read_time_minutes'])) {
            $wordCount = str_word_count(strip_tags($validated['content']));
            $validated['read_time_minutes'] = max(1, (int) ceil($wordCount / 200));
        }

        $validated['is_published'] = $request->boolean('is_published', true);

        unset($validated['image_file'], $validated['faq_questions'], $validated['faq_answers']);

        $post = Post::create($validated);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', "Artículo «{$post->title}» creado exitosamente.");
    }

    /**
     * Formulario de edición de un artículo.
     */
    public function edit(Post $post): View
    {
        $existingCategories = Post::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->toArray();

        $defaultCategories = [
            'Integraciones & E-Commerce',
            'Desarrollo Web & CMS',
            'Arquitectura de Software & APIs',
            'SEO & Posicionamiento en Google',
            'Inteligencia Artificial & Automatización',
            'Tecnología & Negocios Chile',
        ];

        $allCategories = array_values(array_unique(array_merge($defaultCategories, $existingCategories)));

        return view('admin.blog.edit', compact('post', 'allCategories'));
    }

    /**
     * Actualizar un artículo existente.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug,'.$post->id,
            'category' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'read_time_minutes' => 'nullable|integer|min:1|max:120',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|string|max:255',
            'image_file' => 'nullable|image|max:12288',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_published' => 'nullable|boolean',
            'faq_questions' => 'nullable|array',
            'faq_answers' => 'nullable|array',
        ]);

        $slug = ! empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        $originalSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }
        $validated['slug'] = $slug;

        // Subida de nueva imagen destacada
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $ext = $file->getClientOriginalExtension();
            $filename = "{$slug}-".time().".{$ext}";
            $destinationPath = public_path('images/blog');
            if (! File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $validated['featured_image'] = "/images/blog/{$filename}";
        }

        // Estructurar Schema FAQs
        $faqSchema = [];
        $questions = $request->input('faq_questions', []);
        $answers = $request->input('faq_answers', []);
        if (is_array($questions) && is_array($answers)) {
            foreach ($questions as $i => $q) {
                $qText = trim((string) $q);
                $aText = trim((string) ($answers[$i] ?? ''));
                if (! empty($qText) && ! empty($aText)) {
                    $faqSchema[] = [
                        'question' => $qText,
                        'answer' => $aText,
                    ];
                }
            }
        }
        $validated['faq_schema'] = ! empty($faqSchema) ? $faqSchema : null;

        if (empty($validated['read_time_minutes'])) {
            $wordCount = str_word_count(strip_tags($validated['content']));
            $validated['read_time_minutes'] = max(1, (int) ceil($wordCount / 200));
        }

        $validated['is_published'] = $request->boolean('is_published');

        unset($validated['image_file'], $validated['faq_questions'], $validated['faq_answers']);

        $post->update($validated);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', "Artículo «{$post->title}» actualizado exitosamente.");
    }

    /**
     * Alternar estado de publicación (Borrador / Publicado).
     */
    public function togglePublish(Post $post): RedirectResponse
    {
        $post->update([
            'is_published' => ! $post->is_published,
        ]);

        $statusText = $post->is_published ? 'Publicado' : 'Borrador';

        return back()->with('success', "El artículo «{$post->title}» ahora está en estado: {$statusText}.");
    }

    /**
     * Eliminar un artículo de blog.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $title = $post->title;
        $post->delete();

        return redirect()
            ->route('admin.blog.index')
            ->with('success', "Artículo «{$title}» eliminado correctamente.");
    }

    /**
     * REW SEO AI Pilot: Generador inteligente de artículos, FAQs y meta tags.
     */
    public function aiGenerate(Request $request, RewSeoPilotService $pilot): JsonResponse
    {
        $topic = (string) $request->input('topic', '');
        $action = (string) $request->input('action', 'full');

        if (empty(trim($topic))) {
            return response()->json([
                'success' => false,
                'error' => 'Por favor ingresa un tema válido.',
            ], 422);
        }

        try {
            $data = $pilot->generate($topic, $action);

            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Error al generar contenido con IA: '.$e->getMessage(),
            ], 500);
        }
    }
}
