<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->environment('production') || request()->isSecure() || request()->header('X-Forwarded-Proto') === 'https') {
            URL::forceScheme('https');
        }

        // Auto-sync static assets (js/app.js, css/app.css) to public_html in cPanel / LiteSpeed hosting
        $possibleRoots = array_filter([
            $_SERVER['DOCUMENT_ROOT'] ?? null,
            dirname(base_path()).'/public_html',
            base_path('public_html'),
        ]);

        $localPublic = realpath(public_path());

        foreach ($possibleRoots as $docRoot) {
            $realDocRoot = realpath($docRoot);
            if ($realDocRoot && $realDocRoot !== $localPublic && is_dir($realDocRoot)) {
                $assets = ['js/app.js', 'css/app.css'];
                foreach ($assets as $assetRel) {
                    $src = public_path($assetRel);
                    $dest = $realDocRoot.DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $assetRel);
                    if (file_exists($src)) {
                        $needsCopy = ! file_exists($dest) ||
                                     filesize($src) !== filesize($dest) ||
                                     filemtime($src) > filemtime($dest);
                        if ($needsCopy) {
                            $dir = dirname($dest);
                            if (! is_dir($dir)) {
                                @mkdir($dir, 0755, true);
                            }
                            @copy($src, $dest);
                        }
                    }
                }
            }
        }
    }
}
