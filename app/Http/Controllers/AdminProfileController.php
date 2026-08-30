<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Services\InstagramFeedService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AdminProfileController extends Controller
{
    /**
     * Muestra la vista de perfil de Álvaro para cambiar nombre, email y contraseña.
     */
    public function showProfile(): View
    {
        $user = Auth::user();

        return view('admin.profile', compact('user'));
    }

    /**
     * Actualiza el perfil de Álvaro (nombre, email y opcionalmente la contraseña).
     */
    public function updateProfile(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:150|unique:users,email,'.$user->id,
            'current_password' => 'nullable|required_with:password|string',
            'password' => 'nullable|min:8|confirmed',
        ]);

        if (! empty($validated['password'])) {
            if (! Hash::check($validated['current_password'], $user->password)) {
                return back()->withErrors(['current_password' => 'La contraseña actual no coincide.']);
            }
            $user->password = Hash::make($validated['password']);
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return back()->with('success', '¡Tu perfil ha sido actualizado exitosamente!');
    }

    /**
     * Muestra la vista de configuración de notificaciones, SMTP y feed de Instagram.
     */
    public function showSettings(InstagramFeedService $igService): View
    {
        $settings = [
            'notification_email' => Setting::get('notification_email', 'alvaro@rew.cl'),
            'notification_whatsapp' => Setting::get('notification_whatsapp', '+56987261127'),
            'smtp_host' => Setting::get('smtp_host', env('MAIL_HOST', 'smtp.mailtrap.io')),
            'smtp_port' => Setting::get('smtp_port', env('MAIL_PORT', '2525')),
            'smtp_username' => Setting::get('smtp_username', env('MAIL_USERNAME', '')),
            'smtp_password' => Setting::get('smtp_password', env('MAIL_PASSWORD', '')),
            'smtp_encryption' => Setting::get('smtp_encryption', env('MAIL_ENCRYPTION', 'tls')),
            'mail_from_address' => Setting::get('mail_from_address', env('MAIL_FROM_ADDRESS', 'alvaro@rew.cl')),
            'mail_from_name' => Setting::get('mail_from_name', env('MAIL_FROM_NAME', 'REW Chile')),
            'instagram_access_token' => Setting::get('instagram_access_token', env('INSTAGRAM_ACCESS_TOKEN', '')),
            'instagram_username' => Setting::get('instagram_username', env('INSTAGRAM_USERNAME', 'rew_chile')),
        ];

        $customPostsJson = Setting::get('instagram_posts_json');
        $customPosts = $customPostsJson ? json_decode($customPostsJson, true) : $igService->getFallbackFeed();

        return view('admin.settings', compact('settings', 'customPosts'));
    }

    /**
     * Guarda los parámetros de notificaciones, SMTP y feed de Instagram.
     */
    public function updateSettings(Request $request, InstagramFeedService $igService): RedirectResponse
    {
        $validated = $request->validate([
            'notification_email' => 'required|email',
            'notification_whatsapp' => 'required|string',
            'smtp_host' => 'required|string',
            'smtp_port' => 'required|numeric',
            'smtp_username' => 'nullable|string',
            'smtp_password' => 'nullable|string',
            'smtp_encryption' => 'nullable|string',
            'mail_from_address' => 'required|email',
            'mail_from_name' => 'required|string',
            'instagram_access_token' => 'nullable|string',
            'instagram_username' => 'nullable|string',
            'ig_posts' => 'nullable|array',
        ]);

        foreach ($validated as $key => $value) {
            if ($key === 'ig_posts') {
                continue;
            }

            $group = 'general';
            if (str_contains($key, 'smtp') || str_contains($key, 'mail')) {
                $group = 'smtp';
            } elseif (str_contains($key, 'notification')) {
                $group = 'notifications';
            } elseif (str_contains($key, 'instagram')) {
                $group = 'instagram';
            }

            Setting::set($key, $value ?? '', $group);
        }

        // Si se enviaron posts personalizados de Instagram
        if ($request->has('ig_posts')) {
            $formattedPosts = [];
            foreach ($request->input('ig_posts') as $p) {
                if (! empty($p['image']) || ! empty($p['caption'])) {
                    $formattedPosts[] = [
                        'id' => $p['id'] ?? 'ig_'.uniqid(),
                        'caption' => $p['caption'] ?? 'REW Chile',
                        'image' => $p['image'] ?? '/images/logo.webp',
                        'permalink' => $p['permalink'] ?? 'https://www.instagram.com/rew_chile/',
                        'type' => 'IMAGE',
                        'date' => $p['date'] ?? 'Reciente',
                        'likes' => (int) ($p['likes'] ?? rand(50, 150)),
                        'comments' => (int) ($p['comments'] ?? rand(5, 25)),
                    ];
                }
            }
            if (! empty($formattedPosts)) {
                $igService->saveCustomPosts($formattedPosts);
            }
        }

        // Limpiar caché de feed
        $igService->clearCache();

        return back()->with('success', '¡Configuración y Feed de Instagram actualizados exitosamente!');
    }

    /**
     * Prueba el envío de correo usando las credenciales SMTP configuradas.
     */
    public function testSmtp(Request $request): RedirectResponse
    {
        $testEmail = $request->input('test_email', Setting::get('notification_email', 'alvaro@rew.cl'));

        try {
            Config::set('mail.mailers.smtp.host', Setting::get('smtp_host', env('MAIL_HOST')));
            Config::set('mail.mailers.smtp.port', Setting::get('smtp_port', env('MAIL_PORT')));
            Config::set('mail.mailers.smtp.username', Setting::get('smtp_username', env('MAIL_USERNAME')));
            Config::set('mail.mailers.smtp.password', Setting::get('smtp_password', env('MAIL_PASSWORD')));
            Config::set('mail.mailers.smtp.encryption', Setting::get('smtp_encryption', env('MAIL_ENCRYPTION')));
            Config::set('mail.from.address', Setting::get('mail_from_address', 'alvaro@rew.cl'));
            Config::set('mail.from.name', Setting::get('mail_from_name', 'REW Chile'));

            Mail::raw("Este es un correo de prueba enviado desde tu Panel de Administración REW.\n\nFecha y hora: ".now()->format('d/m/Y H:i:s')."\nEstado: SMTP Funcionando al 100%.", function ($msg) use ($testEmail) {
                $msg->to($testEmail)->subject('✅ Prueba Exitosa de SMTP - REW Chile');
            });

            return back()->with('success', "¡Correo de prueba enviado con éxito a {$testEmail}!");
        } catch (\Exception $e) {
            return back()->withErrors(['smtp_error' => 'Error al conectar con el servidor SMTP: '.$e->getMessage()]);
        }
    }

    /**
     * Prueba la conexión del feed de Instagram en vivo.
     */
    public function testInstagram(Request $request, InstagramFeedService $igService): RedirectResponse
    {
        $token = $request->input('instagram_access_token');
        $result = $igService->testConnection($token);

        if ($result['success']) {
            return back()->with('success', $result['message']);
        }

        return back()->withErrors(['instagram_error' => $result['message']]);
    }
}
