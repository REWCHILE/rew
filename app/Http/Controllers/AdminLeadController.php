<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminLeadController extends Controller
{
    /**
     * Panel CRM de Gestión de Leads & Cotizaciones de REW
     */
    public function index(Request $request): View
    {
        $tab = $request->query('tab', 'todos');
        $status = $request->query('status', 'all');
        $search = $request->query('q');

        $query = Quote::latest();

        // 1. Filtro por Pestañas Principales
        if ($tab === 'optimizacion') {
            $query->where(function ($q) {
                $q->where('service_type', 'like', '%Auditoría%')
                    ->orWhere('service_type', 'like', '%Optimización%')
                    ->orWhere('service_type', 'like', '%Velocidad%');
            });
        } elseif ($tab === 'desarrollo') {
            $query->where(function ($q) {
                $q->where('service_type', 'like', '%Desarrollo%')
                    ->orWhere('service_type', 'like', '%Software%')
                    ->orWhere('service_type', 'like', '%Customizado%')
                    ->orWhere('service_type', 'like', '%Laravel%')
                    ->orWhere('service_type', 'like', '%Web%');
            });
        } elseif ($tab === 'tienda') {
            $query->where(function ($q) {
                $q->where('service_type', 'like', '%Plugin%')
                    ->orWhere('service_type', 'like', '%Tienda%')
                    ->orWhere('service_type', 'like', '%WooCommerce%')
                    ->orWhere('service_type', 'like', '%Carrito%');
            });
        }

        // 2. Filtro por Estado
        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }

        // 3. Buscador por texto
        if (! empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%")
                    ->orWhere('project_description', 'like', "%{$search}%");
            });
        }

        $leads = $query->paginate(20)->withQueryString();

        // Métricas Globales para el Dashboard
        $stats = [
            'total' => Quote::count(),
            'optimizacion' => Quote::where('service_type', 'like', '%Auditoría%')
                ->orWhere('service_type', 'like', '%Optimización%')
                ->orWhere('service_type', 'like', '%Velocidad%')->count(),
            'desarrollo' => Quote::where('service_type', 'like', '%Desarrollo%')
                ->orWhere('service_type', 'like', '%Software%')
                ->orWhere('service_type', 'like', '%Customizado%')
                ->orWhere('service_type', 'like', '%Laravel%')
                ->orWhere('service_type', 'like', '%Web%')->count(),
            'tienda' => Quote::where('service_type', 'like', '%Plugin%')
                ->orWhere('service_type', 'like', '%Tienda%')
                ->orWhere('service_type', 'like', '%WooCommerce%')->count(),
            'pending' => Quote::where('status', 'pending')->count(),
            'contacted' => Quote::where('status', 'contacted')->count(),
            'evaluating' => Quote::where('status', 'evaluating')->count(),
            'closed_won' => Quote::where('status', 'closed_won')->count(),
        ];

        return view('admin.leads.index', compact('leads', 'stats', 'tab', 'status', 'search'));
    }

    /**
     * Actualiza el estado del Lead de forma instantánea vía AJAX o formulario
     */
    public function updateStatus(Request $request, Quote $lead): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,contacted,evaluating,closed_won,closed_lost',
        ]);

        $lead->update([
            'status' => $validated['status'],
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Estado del Lead actualizado con éxito.',
                'status' => $lead->status,
            ]);
        }

        return back()->with('success', "Estado del Lead #{$lead->id} actualizado a {$lead->status}.");
    }

    /**
     * Muestra el detalle completo del Lead en formato JSON para el modal de inspección
     */
    public function show(Quote $lead): JsonResponse
    {
        return response()->json([
            'success' => true,
            'lead' => $lead,
            'formatted_date' => $lead->created_at->format('d/m/Y H:i'),
            'clean_phone' => preg_replace('/[^0-9]/', '', $lead->phone),
        ]);
    }

    /**
     * Elimina un Lead
     */
    public function destroy(Quote $lead): RedirectResponse
    {
        $lead->delete();

        return back()->with('success', "Lead #{$lead->id} eliminado correctamente.");
    }
}
