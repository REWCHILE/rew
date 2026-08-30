<?php

namespace App\Http\Controllers;

use App\Models\RicheKnowledgeBase;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminRicheController extends Controller
{
    /**
     * Muestra la lista de preguntas, respuestas y parámetros de Rich-E.
     */
    public function index(Request $request): View
    {
        $category = $request->query('category', 'all');
        $query = RicheKnowledgeBase::orderBy('order')->latest();

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        $items = $query->paginate(20)->withQueryString();
        $categories = RicheKnowledgeBase::select('category')->distinct()->pluck('category');

        $systemPrompt = Setting::get('riche_system_prompt', 'Eres Rich-E, el Asistente Virtual Oficial de REW (rew.cl), una agencia chilena de desarrollo de software a medida en Laravel, tiendas WooCommerce de alta conversión, posicionamiento SEO/GEO y plugins de IA. Estás liderado por el Ingeniero Informático Álvaro Valenzuela Valdés. Tu tono es profesional, tecnológico, amigable, claro y orientado a asesorar y cerrar ventas.');

        return view('admin.riche.index', compact('items', 'categories', 'category', 'systemPrompt'));
    }

    /**
     * Guarda un nuevo conocimiento o FAQ para Rich-E.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'question_or_topic' => 'required|string|max:255',
            'answer_or_content' => 'required|string',
            'category' => 'required|string|max:80',
            'order' => 'nullable|integer',
        ]);

        RicheKnowledgeBase::create([
            'question_or_topic' => $validated['question_or_topic'],
            'answer_or_content' => $validated['answer_or_content'],
            'category' => $validated['category'],
            'order' => $validated['order'] ?? 0,
            'is_active' => true,
        ]);

        return back()->with('success', '¡Nuevo conocimiento agregado a la base de Rich-E!');
    }

    /**
     * Actualiza un conocimiento existente de Rich-E.
     */
    public function update(Request $request, RicheKnowledgeBase $item): RedirectResponse
    {
        $validated = $request->validate([
            'question_or_topic' => 'required|string|max:255',
            'answer_or_content' => 'required|string',
            'category' => 'required|string|max:80',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $item->update([
            'question_or_topic' => $validated['question_or_topic'],
            'answer_or_content' => $validated['answer_or_content'],
            'category' => $validated['category'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return back()->with('success', '¡Conocimiento de Rich-E actualizado con éxito!');
    }

    /**
     * Actualiza el System Prompt principal de Rich-E.
     */
    public function updatePrompt(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'riche_system_prompt' => 'required|string',
        ]);

        Setting::set('riche_system_prompt', $validated['riche_system_prompt'], 'riche');

        return back()->with('success', '¡Instrucciones del Sistema (System Prompt) de Rich-E actualizadas!');
    }

    /**
     * Elimina un conocimiento.
     */
    public function destroy(RicheKnowledgeBase $item): RedirectResponse
    {
        $item->delete();

        return back()->with('success', 'Conocimiento eliminado de la base de Rich-E.');
    }
}
