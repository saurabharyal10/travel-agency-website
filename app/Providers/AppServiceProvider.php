<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
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
        $this->ensureStorageLinksExist();
    }

    /**
     * Self-heal the public/storage symlink on hosts with no shell/artisan
     * access (e.g. Wasmer's free tier). Mirrors `php artisan storage:link`,
     * but runs on boot so it's created on the first request/deploy instead
     * of requiring a manual command.
     */
    protected function ensureStorageLinksExist(): void
    {
        foreach (config('filesystems.links', []) as $link => $target) {
            if (File::exists($link)) {
                continue;
            }

            try {
                File::link($target, $link);
            } catch (\Throwable $e) {
                Log::warning("Could not create storage symlink [$link] -> [$target]: {$e->getMessage()}");
            }
        }
    }
}
