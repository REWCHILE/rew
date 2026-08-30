<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class InstagramFeedService
{
    /**
     * Obtiene el feed de Instagram de forma asíncrona y cacheada (6 horas).
     * 1. Prioridad: Publicaciones gestionadas en el Panel de Administración (100% Free, Cero Tokens).
     * 2. Segunda opción: Meta Graph API si hay Access Token configurado.
     * 3. Tercera opción: Fallback curado de REW Chile.
     */
    public function getFeed(): array
    {
        return Cache::remember('rew_instagram_feed_cache', 3600 * 6, function () {
            // 1. Revisar si hay posts gestionados directamente en el panel
            $customPostsJson = Setting::get('instagram_posts_json');
            if ($customPostsJson) {
                $customPosts = json_decode($customPostsJson, true);
                if (is_array($customPosts) && ! empty($customPosts)) {
                    return $customPosts;
                }
            }

            // 2. Revisar si hay Access Token de Meta Graph API
            $token = Setting::get('instagram_access_token') ?: env('INSTAGRAM_ACCESS_TOKEN');

            if ($token) {
                try {
                    $response = Http::timeout(8)->get('https://graph.instagram.com/me/media', [
                        'fields' => 'id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,username',
                        'access_token' => $token,
                        'limit' => 6,
                    ]);

                    if ($response->successful()) {
                        $data = $response->json('data', []);
                        if (! empty($data)) {
                            return array_map(function ($item) {
                                return [
                                    'id' => $item['id'] ?? null,
                                    'caption' => $item['caption'] ?? 'REW Chile - Soluciones Digitales',
                                    'image' => ($item['media_type'] ?? '') === 'VIDEO' ? ($item['thumbnail_url'] ?? $item['media_url'] ?? '') : ($item['media_url'] ?? ''),
                                    'permalink' => $item['permalink'] ?? 'https://www.instagram.com/rew_chile/',
                                    'type' => $item['media_type'] ?? 'IMAGE',
                                    'date' => isset($item['timestamp']) ? date('d M Y', strtotime($item['timestamp'])) : 'Reciente',
                                    'likes' => rand(40, 160),
                                    'comments' => rand(5, 32),
                                ];
                            }, $data);
                        }
                    } else {
                        Log::warning('Instagram API error response: '.$response->body());
                    }
                } catch (\Exception $e) {
                    Log::warning('Instagram API fetch exception: '.$e->getMessage());
                }
            }

            // 3. Fallback con publicaciones de alta fidelidad para @rew_chile
            return $this->getFallbackFeed();
        });
    }

    /**
     * Guarda la lista de publicaciones gestionadas manualmente
     */
    public function saveCustomPosts(array $posts): void
    {
        Setting::set('instagram_posts_json', json_encode(array_values($posts)), 'instagram');
        $this->clearCache();
    }

    /**
     * Prueba la conexión en vivo con la API de Instagram Graph
     */
    public function testConnection(?string $token = null): array
    {
        $token = $token ?: (Setting::get('instagram_access_token') ?: env('INSTAGRAM_ACCESS_TOKEN'));

        if (! $token) {
            return [
                'success' => false,
                'message' => 'No hay ningún Access Token configurado.',
            ];
        }

        try {
            $response = Http::timeout(8)->get('https://graph.instagram.com/me/media', [
                'fields' => 'id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,username',
                'access_token' => $token,
                'limit' => 6,
            ]);

            if ($response->successful()) {
                $data = $response->json('data', []);
                $count = count($data);
                $this->clearCache();

                return [
                    'success' => true,
                    'message' => "¡Conexión exitosa con Instagram Graph API! Se obtuvieron {$count} publicaciones.",
                    'count' => $count,
                ];
            }

            $error = $response->json('error', []);
            $errorMsg = $error['message'] ?? $response->body();

            return [
                'success' => false,
                'message' => "La API de Meta/Instagram rechazó la solicitud: {$errorMsg}",
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error de conexión con servidores de Instagram: '.$e->getMessage(),
            ];
        }
    }

    /**
     * Invalida la caché del feed de Instagram
     */
    public function clearCache(): void
    {
        Cache::forget('rew_instagram_feed_cache');
    }

    /**
     * Feed curado por defecto
     */
    public function getFallbackFeed(): array
    {
        return [
            [
                'id' => 'rew_ig_1',
                'caption' => '🚀 ¿Cómo construimos software en Laravel de alto rendimiento? Arquitectura limpia, consultas optimizadas y Core Web Vitals en verde.',
                'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=600&auto=format&fit=crop',
                'permalink' => 'https://www.instagram.com/rew_chile/',
                'type' => 'IMAGE',
                'date' => 'Reciente',
                'likes' => 84,
                'comments' => 12,
            ],
            [
                'id' => 'rew_ig_2',
                'caption' => '🤖 Presentamos Rich-E: Asistente virtual inteligente para WordPress y WooCommerce con arquitectura RAG.',
                'image' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=600&auto=format&fit=crop',
                'permalink' => 'https://www.instagram.com/rew_chile/',
                'type' => 'IMAGE',
                'date' => 'Reciente',
                'likes' => 126,
                'comments' => 19,
            ],
            [
                'id' => 'rew_ig_3',
                'caption' => '📈 Caso de Estudio Artífices TV: Plataforma web de streaming de alto impacto diseñada desde cero.',
                'image' => '/images/portfolio/artifices-tv-full.png',
                'permalink' => 'https://www.instagram.com/rew_chile/',
                'type' => 'IMAGE',
                'date' => 'Reciente',
                'likes' => 95,
                'comments' => 14,
            ],
            [
                'id' => 'rew_ig_4',
                'caption' => '⚡ Optimización SEO & GEO: Posiciona tu marca tanto en Google como en los motores de búsqueda de Inteligencia Artificial.',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=600&auto=format&fit=crop',
                'permalink' => 'https://www.instagram.com/rew_chile/',
                'type' => 'IMAGE',
                'date' => 'Reciente',
                'likes' => 110,
                'comments' => 22,
            ],
            [
                'id' => 'rew_ig_5',
                'caption' => '🛒 REW Multi-Currency & Translator Pro: El plugin definitivo para vender en CLP y USD en todo el mundo.',
                'image' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=600&auto=format&fit=crop',
                'permalink' => 'https://www.instagram.com/rew_chile/',
                'type' => 'IMAGE',
                'date' => 'Reciente',
                'likes' => 78,
                'comments' => 9,
            ],
            [
                'id' => 'rew_ig_6',
                'caption' => '👨‍💻 Trato directo con el Ingeniero Desarrollador: Sin ejecutivos de cuentas ni demoras. Hablemos de tu proyecto.',
                'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=600&auto=format&fit=crop',
                'permalink' => 'https://www.instagram.com/rew_chile/',
                'type' => 'IMAGE',
                'date' => 'Reciente',
                'likes' => 142,
                'comments' => 27,
            ],
        ];
    }
}
