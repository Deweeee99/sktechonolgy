<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // Tambahkan baris ini

class AppServiceProvider extends ServiceProvider
{
    // ... method register() ...

    public function boot(): void
    {
        // Memaksa Laravel menggunakan HTTPS jika proxy meneruskan header HTTPS
        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
            URL::forceScheme('https');
        }
    }
}