<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminPortfolioController extends Controller
{
    /**
     * Listado general de proyectos de portafolio con filtros y estadísticas.
     */
    public function index(Request $request): View
    {
        $search = $request->query('q');
        $selectedCategory = $request->query('categoria', 'todos');
        $status = $request->query('status', 'all');

        $query = PortfolioProject::query();

        if (! empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('client', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('technologies', 'like', "%{$search}%")
                    ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        if ($selectedCategory && $selectedCategory !== 'todos') {
            $query->where('category', $selectedCategory);
        }

        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }

        // Orden: order ascendente, luego id descendente
        $projects = $query->orderBy('order', 'asc')->orderBy('id', 'desc')->paginate(15)->withQueryString();

        $stats = [
            'total' => PortfolioProject::count(),
            'featured' => PortfolioProject::where('is_featured', true)->count(),
            'categories' => PortfolioProject::distinct('category')->count('category'),
            'completed' => PortfolioProject::where('status', 'Finalizado')->count(),
        ];

        $categories = PortfolioProject::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('admin.portfolio.index', compact(
            'projects',
            'stats',
            'categories',
            'search',
            'selectedCategory',
            'status'
        ));
    }

    /**
     * Vista de creación de un nuevo proyecto.
     */
    public function create(): View
    {
        $categories = PortfolioProject::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->toArray();

        // Categorías sugeridas si no existen
        $defaultCategories = [
            'Plataformas Web & Software a Medida',
            'E-Commerce & Merch',
            'Web Corporativa & Turismo',
            'Inteligencia Artificial & FinTech',
            'Salud & Estética',
            'Streaming & Media',
        ];
        $allCategories = array_values(array_unique(array_merge($defaultCategories, $categories)));

        return view('admin.portfolio.create', compact('allCategories'));
    }

    /**
     * Guardar nuevo proyecto en base de datos.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolio_projects,slug',
            'client' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'project_date' => 'nullable|string|max:50',
            'summary' => 'required|string',
            'full_description' => 'nullable|string',
            'status' => 'required|string|max:50',
            'project_url' => 'nullable|url|max:255',
            'technologies' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'featured_image' => 'nullable|string|max:255',
            'image_file' => 'nullable|image|max:12288',
            'gallery' => 'nullable|array',
            'results' => 'nullable|array',
            'is_featured' => 'nullable|boolean',
            'order' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $slug = ! empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        // Asegurar unicidad de slug
        $originalSlug = $slug;
        $counter = 1;
        while (PortfolioProject::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }
        $validated['slug'] = $slug;

        // Manejar subida de archivo de imagen si se adjuntó
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $ext = $file->getClientOriginalExtension();
            $filename = "{$slug}.".$ext;
            $destinationPath = public_path('images/portfolio');
            if (! File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $validated['featured_image'] = "/images/portfolio/{$filename}";
        } elseif (empty($validated['featured_image'])) {
            $validated['featured_image'] = "/images/portfolio/{$slug}.webp";
        }

        // Limpiar arrays de resultados y galería
        $results = array_values(array_filter($request->input('results', []), fn ($r) => ! empty(trim((string) $r))));
        $gallery = array_values(array_filter($request->input('gallery', []), fn ($g) => ! empty(trim((string) $g))));

        if (empty($gallery) && ! empty($validated['featured_image'])) {
            $gallery = [$validated['featured_image']];
        }

        $validated['results'] = $results;
        $validated['gallery'] = $gallery;
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['order'] = (int) $request->input('order', 0);

        unset($validated['image_file']);

        $project = PortfolioProject::create($validated);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', "Proyecto «{$project->title}» creado exitosamente.");
    }

    /**
     * Vista de edición de un proyecto.
     */
    public function edit(PortfolioProject $project): View
    {
        $categories = PortfolioProject::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->toArray();

        $defaultCategories = [
            'Plataformas Web & Software a Medida',
            'E-Commerce & Merch',
            'Web Corporativa & Turismo',
            'Inteligencia Artificial & FinTech',
            'Salud & Estética',
            'Streaming & Media',
        ];
        $allCategories = array_values(array_unique(array_merge($defaultCategories, $categories)));

        return view('admin.portfolio.edit', compact('project', 'allCategories'));
    }

    /**
     * Actualizar proyecto existente.
     */
    public function update(Request $request, PortfolioProject $project): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => ['required', 'string', 'max:255', Rule::unique('portfolio_projects', 'slug')->ignore($project->id)],
            'client' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'project_date' => 'nullable|string|max:50',
            'summary' => 'required|string',
            'full_description' => 'nullable|string',
            'status' => 'required|string|max:50',
            'project_url' => 'nullable|url|max:255',
            'technologies' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'featured_image' => 'nullable|string|max:255',
            'image_file' => 'nullable|image|max:12288',
            'gallery' => 'nullable|array',
            'results' => 'nullable|array',
            'is_featured' => 'nullable|boolean',
            'order' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);

        // Manejar subida de archivo de imagen
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $ext = $file->getClientOriginalExtension();
            $filename = "{$validated['slug']}.".$ext;
            $destinationPath = public_path('images/portfolio');
            if (! File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $filename);
            $validated['featured_image'] = "/images/portfolio/{$filename}";
        }

        // Limpiar arrays de resultados y galería
        $results = array_values(array_filter($request->input('results', []), fn ($r) => ! empty(trim((string) $r))));
        $gallery = array_values(array_filter($request->input('gallery', []), fn ($g) => ! empty(trim((string) $g))));

        if (empty($gallery) && ! empty($validated['featured_image'])) {
            $gallery = [$validated['featured_image']];
        }

        $validated['results'] = $results;
        $validated['gallery'] = $gallery;
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['order'] = (int) $request->input('order', 0);

        unset($validated['image_file']);

        $project->update($validated);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', "Proyecto «{$project->title}» actualizado exitosamente.");
    }

    /**
     * Eliminar proyecto del portafolio.
     */
    public function destroy(PortfolioProject $project): RedirectResponse
    {
        $title = $project->title;
        $project->delete();

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', "Proyecto «{$title}» eliminado correctamente.");
    }

    /**
     * Endpoint AJAX para analizar una URL y capturar la página completa al 100%
     */
    public function analyzeAndCapture(Request $request): JsonResponse
    {
        $request->validate([
            'url' => 'required|url',
            'slug' => 'nullable|string',
        ]);

        $url = trim($request->input('url'));
        $slug = $request->input('slug') ? Str::slug($request->input('slug')) : '';

        if (empty($slug)) {
            $host = parse_url($url, PHP_URL_HOST) ?? 'proyecto';
            $slug = Str::slug(str_replace('www.', '', $host));
        }

        $scriptPath = base_path('scripts/capture_portfolio.js');
        if (! File::exists($scriptPath)) {
            return response()->json([
                'success' => false,
                'error' => 'No se encontró el script de captura en scripts/capture_portfolio.js',
            ], 500);
        }

        $nodeBinary = 'node';
        $cmd = sprintf(
            '%s %s %s %s 2>&1',
            escapeshellcmd($nodeBinary),
            escapeshellarg($scriptPath),
            escapeshellarg($url),
            escapeshellarg($slug)
        );

        $output = [];
        $returnCode = 0;
        exec($cmd, $output, $returnCode);
        $rawOutput = implode("\n", $output);

        // Buscar JSON en la salida
        $jsonStart = strpos($rawOutput, '{');
        $jsonEnd = strrpos($rawOutput, '}');

        if ($jsonStart !== false && $jsonEnd !== false && $jsonEnd >= $jsonStart) {
            $jsonStr = substr($rawOutput, $jsonStart, ($jsonEnd - $jsonStart) + 1);
            $data = json_decode($jsonStr, true);

            if (json_last_error() === JSON_ERROR_NONE && ! empty($data['success'])) {
                return response()->json($data);
            }

            if (! empty($data['error'])) {
                return response()->json([
                    'success' => false,
                    'error' => $data['error'],
                    'raw' => $rawOutput,
                ], 422);
            }
        }

        Log::error('Fallo en capture_portfolio.js: '.$rawOutput);

        return response()->json([
            'success' => false,
            'error' => 'No se pudo completar la captura automática. Verifica que la URL esté accesible y que Chrome esté disponible en el servidor.',
            'raw' => $rawOutput,
        ], 500);
    }
}
