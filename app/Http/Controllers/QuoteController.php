<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'company' => 'nullable|string|max:255',
            'service_type' => 'required|string',
            'project_description' => 'nullable|string',
            'estimated_budget_usd' => 'nullable|numeric',
            'estimated_budget_clp' => 'nullable|numeric',
            'preferred_contact_channel' => 'nullable|string',
            'selected_features' => 'nullable|array',
        ]);

        $quote = Quote::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'company' => $validated['company'] ?? null,
            'service_type' => $validated['service_type'],
            'project_description' => $validated['project_description'] ?? null,
            'estimated_budget_usd' => $validated['estimated_budget_usd'] ?? null,
            'estimated_budget_clp' => $validated['estimated_budget_clp'] ?? null,
            'preferred_contact_channel' => $validated['preferred_contact_channel'] ?? 'whatsapp',
            'metadata' => [
                'features' => $request->input('selected_features', []),
                'source' => $request->input('source', 'web_form'),
            ],
            'ip_address' => $request->ip(),
        ]);

        // Formatear mensaje para WhatsApp (+56987261127)
        $whatsappNumber = '56987261127';
        $msg = "🚀 *Nueva Cotización REW.cl* 🚀\n\n";
        $msg .= "👤 *Nombre:* {$quote->name}\n";
        $msg .= "📧 *Email:* {$quote->email}\n";
        $msg .= "📱 *Teléfono:* {$quote->phone}\n";
        if ($quote->company) {
            $msg .= "🏢 *Empresa:* {$quote->company}\n";
        }
        $msg .= "🛠️ *Servicio / Plugin:* {$quote->service_type}\n";
        if ($quote->estimated_budget_clp) {
            $msg .= '💰 *Presupuesto Estimado:* $'.number_format($quote->estimated_budget_clp, 0, ',', '.').' CLP ($'.number_format($quote->estimated_budget_usd, 0)." USD)\n";
        }
        if ($quote->project_description) {
            $msg .= "\n📝 *Detalle del Proyecto:*\n{$quote->project_description}\n";
        }
        $msg .= "\n---\nEnviado desde https://rew.cl";

        $whatsappUrl = "https://api.whatsapp.com/send?phone={$whatsappNumber}&text=".urlencode($msg);

        // Envío de correo a alvaro@rew.cl
        try {
            Mail::raw($msg, function ($message) use ($quote) {
                $message->to('alvaro@rew.cl')
                    ->subject("Nueva Cotización REW: {$quote->name} - {$quote->service_type}")
                    ->replyTo($quote->email, $quote->name);
            });
        } catch (\Exception $e) {
            Log::error('Error enviando correo de cotización: '.$e->getMessage());
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => '¡Cotización recibida con éxito! Te contactaremos a la brevedad.',
                'whatsapp_url' => $whatsappUrl,
                'quote_id' => $quote->id,
            ]);
        }

        return redirect()->away($whatsappUrl);
    }
}
