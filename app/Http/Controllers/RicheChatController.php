<?php

namespace App\Http\Controllers;

use App\Models\RicheKnowledgeBase;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RicheChatController extends Controller
{
    public function chat(Request $request)
    {
        $message = trim((string) ($request->input('message') ?? $request->json('message') ?? ''));
        if (empty($message)) {
            $raw = json_decode($request->getContent(), true);
            if (is_array($raw) && isset($raw['message'])) {
                $message = trim($raw['message']);
            }
        }
        if (empty($message)) {
            return response()->json(['reply' => 'Por favor escribe una consulta para poder ayudarte.']);
        }

        $groqApiKey = env('GROQ_API_KEY');

        // Obtener conocimiento dinámico configurado por Álvaro desde el panel /admin/riche
        $customKnowledge = RicheKnowledgeBase::where('is_active', true)->get()->map(function ($item) {
            return "- [{$item->category}] {$item->question_or_topic}: {$item->answer_or_content}";
        })->implode("\n");

        $basePrompt = Setting::get('riche_system_prompt', 'Eres Rich-E, el Asistente Virtual Oficial de REW (rew.cl), agencia de software y marketing digital en Chile liderada por el Ingeniero Informático Álvaro Valenzuela Valdés (+56987261127, alvaro@rew.cl). Responde de forma amable, tecnológica, concisa en español y motiva al usuario a cotizar su proyecto o escribir por WhatsApp.');

        $systemPrompt = $basePrompt."\n\nBase de Conocimiento Actualizada de REW:\n".$customKnowledge;

        if ($groqApiKey) {
            try {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer '.$groqApiKey,
                    'Content-Type' => 'application/json',
                ])->timeout(10)->post('https://api.groq.com/openai/v1/chat/completions', [
                    'model' => 'llama-3.3-70b-versatile',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => $systemPrompt,
                        ],
                        [
                            'role' => 'user',
                            'content' => $message,
                        ],
                    ],
                    'temperature' => 0.6,
                    'max_tokens' => 300,
                ]);

                if ($response->successful()) {
                    $json = $response->json();
                    $reply = $json['choices'][0]['message']['content'] ?? null;
                    if ($reply) {
                        return response()->json([
                            'success' => true,
                            'reply' => $reply,
                            'time' => now()->format('H:i'),
                        ]);
                    }
                }
            } catch (\Exception $e) {
                Log::warning('Groq API fallback triggered: '.$e->getMessage());
            }
        }

        // Motor RAG inteligente nativo de REW
        $reply = $this->localKnowledgeEngine($message);

        return response()->json([
            'success' => true,
            'reply' => $reply,
            'time' => now()->format('H:i'),
        ]);
    }

    private function localKnowledgeEngine(string $msg): string
    {
        $lower = mb_strtolower($msg, 'UTF-8');

        if (str_contains($lower, 'desarrollo') || str_contains($lower, 'proceso') || str_contains($lower, 'software') || str_contains($lower, 'laravel')) {
            return "En **REW**, el proceso de desarrollo de software es 100% ágil y liderado directamente por **Álvaro Valenzuela Valdés** (Ingeniero Informático):\n\n1️⃣ **Diagnóstico:** Analizamos requerimientos con herramientas como Clarity.\n2️⃣ **Arquitectura & UX/UI:** Diseñamos base de datos y prototipos navegables en Figma.\n3️⃣ **Desarrollo en Laravel:** Código limpio, escalable, con APIs seguras.\n4️⃣ **Lanzamiento & Soporte:** Despliegue con Core Web Vitals en verde.\n\n¿Te gustaría cotizar un sistema o app a medida? Puedes usar nuestro [Cotizador en Línea](/contacto) o escribir al WhatsApp **+56 9 8726 1127**.";
        }

        if (str_contains($lower, 'plugin') || str_contains($lower, 'tienda') || str_contains($lower, 'woocommerce') || str_contains($lower, 'rich-e')) {
            return "Nuestros plugins oficiales de WordPress con Inteligencia Artificial incluyen:\n\n• **Pack Chatbot E-Commerce Pro:** Licencia integral con RAG + WooCommerce Sync ($76 USD / $69.990 CLP).\n• **Rich-E Chatbot Assistant:** Asistente RAG para WordPress ($54 USD / $49.990 CLP).\n• **Addon WooCommerce Sync:** Sincronización de catálogo en el chat ($32 USD).\n• **REW Multi-Currency & Translator Pro:** Selector de divisas CLP/USD y traducción ($22 USD).\n\nPuedes verlos y probarlos en nuestra [Tienda Oficial](/tienda).";
        }

        if (str_contains($lower, 'seo') || str_contains($lower, 'posicionamiento') || str_contains($lower, 'google') || str_contains($lower, 'geo')) {
            return 'Nuestra estrategia SEO combina **SEO Técnico** (velocidad de carga, Core Web Vitals), **Contenido Semántico** y **GEO (Generative Engine Optimization)** mediante protocolos como `llms.txt` para que tu empresa sea recomendada por ChatGPT, Claude y Perplexity.';
        }

        if (str_contains($lower, 'precio') || str_contains($lower, 'cuanto cuesta') || str_contains($lower, 'cotizar') || str_contains($lower, 'valor')) {
            return 'Los plugins parten desde **$19.990 CLP ($22 USD)** y los sitios web corporativos desde **$790.000 CLP ($850 USD)**. Puedes calcular el costo exacto en segundos con nuestro [Cotizador Interactivo](/contacto).';
        }

        if (str_contains($lower, 'contacto') || str_contains($lower, 'whatsapp') || str_contains($lower, 'telefono') || str_contains($lower, 'alvaro') || str_contains($lower, 'correo')) {
            return "Puedes comunicarte directamente con **Álvaro Valenzuela Valdés**:\n\n📱 **WhatsApp:** [+56 9 8726 1127](https://api.whatsapp.com/send?phone=56987261127)\n✉️ **Correo:** [alvaro@rew.cl](mailto:alvaro@rew.cl)\n📍 Santiago, Chile.";
        }

        if (str_contains($lower, 'hola') || str_contains($lower, 'buenas') || str_contains($lower, 'saludos')) {
            return '¡Hola! 👋 Soy **Rich-E**, tu asistente de Inteligencia Artificial en **REW**. ¿En qué puedo ayudarte hoy? Puedes preguntarme sobre desarrollo de software, plugins para WooCommerce, precios o cotizar un proyecto.';
        }

        return 'Excelente consulta. En **REW** desarrollamos soluciones a medida con Laravel, tiendas WooCommerce y asistentes de IA. Puedes consultar el detalle en nuestra web o hablar directamente con Álvaro Valenzuela al WhatsApp **+56 9 8726 1127**.';
    }
}
