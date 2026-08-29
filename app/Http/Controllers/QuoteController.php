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
        // 1. Bot Honeypot Protection (Blindaje anti-spammers y bots)
        if (! empty($request->input('b_field_check_hp'))) {
            return response()->json(['success' => false, 'message' => 'Solicitud rechazada.'], 400);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email:rfc,dns|max:150',
            'phone' => ['required', 'string', 'max:40', 'regex:/^[0-9\+\-\s\(\)]+$/'],
            'company' => 'nullable|string|max:150',
            'service_type' => 'required|string|max:120',
            'project_description' => 'nullable|string|max:2000',
            'custom_features_description' => 'nullable|string|max:2000',
            'custom_feature_items' => 'nullable|array|max:10',
            'custom_feature_items.*' => 'nullable|string|max:255',
            'estimated_budget_usd' => 'nullable|numeric|max:999999',
            'estimated_budget_clp' => 'nullable|numeric|max:999999999',
            'preferred_contact_channel' => 'nullable|string|max:30',
            'features' => 'nullable',
        ]);

        // 2. Sanitización estricta contra XSS / Injection
        $name = strip_tags(trim($validated['name']));
        $email = filter_var(trim($validated['email']), FILTER_SANITIZE_EMAIL);
        $phone = strip_tags(trim($validated['phone']));
        $company = ! empty($validated['company']) ? strip_tags(trim($validated['company'])) : null;
        $serviceType = strip_tags(trim($validated['service_type']));
        $projDesc = ! empty($validated['project_description']) ? strip_tags(trim($validated['project_description'])) : null;
        $customDesc = ! empty($validated['custom_features_description']) ? strip_tags(trim($validated['custom_features_description'])) : null;

        // Procesar hasta 10 funcionalidades dinámicas agregadas por el cliente
        $customItems = [];
        if (! empty($request->input('custom_feature_items'))) {
            $rawItems = array_slice((array) $request->input('custom_feature_items'), 0, 10);
            foreach ($rawItems as $item) {
                $cleaned = strip_tags(trim((string) $item));
                if (! empty($cleaned)) {
                    $customItems[] = $cleaned;
                }
            }
        }

        $selectedFeatures = $request->input('features', []);
        if (is_string($selectedFeatures)) {
            $selectedFeatures = [strip_tags(trim($selectedFeatures))];
        } elseif (is_array($selectedFeatures)) {
            $selectedFeatures = array_map(fn ($f) => strip_tags(trim((string) $f)), $selectedFeatures);
        } else {
            $selectedFeatures = [];
        }

        // Construir detalle completo para la base de datos
        $fullDescription = $projDesc ?? '';
        if ($customDesc) {
            $fullDescription .= ($fullDescription ? "\n\n" : '')."💡 Resumen General de Funcionalidades:\n".$customDesc;
        }
        if (! empty($customItems)) {
            $fullDescription .= ($fullDescription ? "\n\n" : '').'⚙️ Lista de Funcionalidades a Medida (1 a '.count($customItems)."):\n";
            foreach ($customItems as $idx => $ci) {
                $fullDescription .= ($idx + 1).". {$ci}\n";
            }
        }

        $quote = Quote::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'company' => $company,
            'service_type' => $serviceType,
            'project_description' => $fullDescription ?: null,
            'estimated_budget_usd' => $validated['estimated_budget_usd'] ?? null,
            'estimated_budget_clp' => $validated['estimated_budget_clp'] ?? null,
            'preferred_contact_channel' => $validated['preferred_contact_channel'] ?? 'whatsapp',
            'metadata' => [
                'features' => $selectedFeatures,
                'custom_items' => $customItems,
                'custom_features_desc' => $customDesc,
                'source' => strip_tags((string) $request->input('source', 'web_form')),
            ],
            'ip_address' => $request->ip(),
        ]);

        // 3. Formatear mensaje para WhatsApp (+56987261127)
        $whatsappNumber = '56987261127';
        $msg = "🚀 *Nueva Cotización REW.cl* 🚀\n\n";
        $msg .= "👤 *Nombre:* {$quote->name}\n";
        $msg .= "📧 *Email:* {$quote->email}\n";
        $msg .= "📱 *Teléfono:* {$quote->phone}\n";
        if ($quote->company) {
            $msg .= "🏢 *Empresa:* {$quote->company}\n";
        }
        $msg .= "🛠️ *Tipo de Proyecto:* {$quote->service_type}\n";

        if (! empty($selectedFeatures)) {
            $msg .= '🧩 *Módulos Base:* '.implode(', ', $selectedFeatures)."\n";
        }

        if (! empty($customItems)) {
            $msg .= "\n⚙️ *Funcionalidades a Medida Solicitadas (".count($customItems)."):*\n";
            foreach ($customItems as $idx => $ci) {
                $msg .= '• *[#'.($idx + 1)."]* {$ci}\n";
            }
        }

        if ($customDesc) {
            $msg .= "\n💡 *Detalles Adicionales:* {$customDesc}\n";
        }

        if ($quote->estimated_budget_clp && $quote->estimated_budget_clp > 0) {
            $msg .= "\n💰 *Presupuesto Referencial:* $".number_format($quote->estimated_budget_clp, 0, ',', '.').' CLP ($'.number_format($quote->estimated_budget_usd, 0)." USD) _(Sujeto a evaluación técnica)_\n";
        } else {
            $msg .= "\n💰 *Presupuesto:* A evaluar según requerimientos técnicos\n";
        }

        if ($projDesc) {
            $msg .= "\n📝 *Comentarios del Cliente:*\n{$projDesc}\n";
        }
        $msg .= "\n---\nEnviado seguro desde https://rew.cl (Precios referenciales sujetos a evaluación)";

        $whatsappUrl = "https://api.whatsapp.com/send?phone={$whatsappNumber}&text=".rawurlencode($msg);

        // Envío de correo HTML completo a alvaro@rew.cl
        try {
            Mail::send('emails.new-quote', ['quote' => $quote], function ($message) use ($quote) {
                $message->to('alvaro@rew.cl', 'Álvaro Valenzuela')
                    ->subject("🚀 Nueva Cotización REW: {$quote->name} - {$quote->service_type}")
                    ->replyTo($quote->email, $quote->name);
            });
        } catch (\Exception $e) {
            Log::error('Error enviando correo de cotización: '.$e->getMessage());
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => '¡Cotización registrada con éxito! Redirigiendo a WhatsApp...',
                'whatsapp_url' => $whatsappUrl,
                'quote_id' => $quote->id,
            ]);
        }

        return redirect()->away($whatsappUrl);
    }
}
