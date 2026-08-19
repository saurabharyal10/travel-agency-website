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
     * access (e.g. Wasmer's free tier). Mirrors `php artisan storage:link
     * --relative`, but runs on boot so it's created on the first
     * request/deploy instead of requiring a manual command. Relative
     * (e.g. "../storage/app/public") rather than absolute because Wasmer's
     * packaging validator rejects symlinks that point outside the volume
     * via an absolute path.
     */
    protected function ensureStorageLinksExist(): void
    {
        foreach (config('filesystems.links', []) as $link => $target) {
            if (File::exists($link)) {
                continue;
            }

            try {
                File::link($this->relativeSymlinkTarget($target, $link), $link);
            } catch (\Throwable $e) {
                Log::warning("Could not create storage symlink [$link] -> [$target]: {$e->getMessage()}");
            }
        }
    }

    /**
     * Compute $target as a path relative to dirname($link), so the created
     * symlink stays relative instead of embedding an absolute path.
     */
    protected function relativeSymlinkTarget(string $target, string $link): string
    {
        $linkParts = array_values(array_filter(explode('/', str_replace('\\', '/', dirname($link)))));
        $targetParts = array_values(array_filter(explode('/', str_replace('\\', '/', $target))));

        $i = 0;
        while ($i < count($linkParts) && $i < count($targetParts) && $linkParts[$i] === $targetParts[$i]) {
            $i++;
        }

        $upSegments = array_fill(0, count($linkParts) - $i, '..');
        $downSegments = array_slice($targetParts, $i);

        return implode('/', array_merge($upSegments, $downSegments));
    }
}
