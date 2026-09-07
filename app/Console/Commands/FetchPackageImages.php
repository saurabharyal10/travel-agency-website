<?php

namespace App\Console\Commands;

use App\Models\Package;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Storage;

/**
 * ONE-OFF content tool. Pulls real hero photos for the packages that were
 * seeded with "NEEDS REAL PHOTO" placeholders (see TrekkingPackagesSeeder)
 * from the Pexels API and drops them into the public disk.
 *
 * Not scheduled, not called by any seeder. Run by hand:
 *   php artisan packages:fetch-images
 *   php artisan packages:fetch-images --force
 *   php artisan packages:fetch-images --force --only=gosaikunda-trek --only=mardi-himal-trek
 *
 * Each target has a list of queries tried in order plus a set of "prefer"
 * keywords; the first landscape result whose Pexels alt-text / slug mentions
 * one of those keywords wins. If nothing matches, the first landscape result
 * of the first query that returned anything is used and flagged LOOSE.
 *
 * A Pexels photo id already assigned to another package (tracked in
 * storage/app/pexels-sources.json) is never re-used, so no two packages end
 * up with the same picture.
 *
 * Pexels licence allows free commercial reuse with no attribution required;
 * the photographer + photo URL are printed anyway so a bad match can be
 * swapped out by hand.
 */
class FetchPackageImages extends Command
{
    protected $signature = 'packages:fetch-images
                            {--force : Re-fetch even for packages whose image file already exists on disk}
                            {--only=* : Restrict to these package slugs (repeatable)}
                            {--quality=82 : WebP quality 1-100 used when a converter is available}';

    protected $description = 'One-off: fetch real package hero photos from the Pexels API into storage/app/public/packages';

    private const MANIFEST = 'pexels-sources.json';

    /**
     * slug => ['queries' => string[], 'prefer' => string[]].
     * Queries are tried in order; `prefer` keywords (lower-case) are matched
     * against each result's alt-text and Pexels URL slug.
     */
    private const TARGETS = [
        'annapurna-base-camp' => [
            'queries' => [
                'Annapurna Base Camp Nepal',
                'Annapurna Sanctuary Machapuchare',
                'Annapurna Base Camp trek Nepal mountains',
            ],
            'prefer' => ['annapurna', 'machapuchare', 'machhapuchhre', 'sanctuary', 'abc'],
        ],
        'tilicho-lake-trek' => [
            'queries' => [
                'Tilicho Lake Nepal',
                'Tilicho Lake Manang Annapurna',
                'Tilicho Base Camp Nepal',
            ],
            'prefer' => ['tilicho', 'manang', 'khangsar'],
        ],
        'mardi-himal-trek' => [
            'queries' => [
                'Mardi Himal viewpoint Annapurna',
                'Mardi Himal base camp Nepal',
                'Mardi Himal trek Nepal',
                'Mardi Himal high camp',
            ],
            'prefer' => ['mardi', 'machapuchare', 'machhapuchhre', 'fishtail'],
        ],
        'poon-hill-trek' => [
            'queries' => [
                'Poon Hill sunrise Nepal',
                'Poon Hill Ghorepani Annapurna Dhaulagiri',
                'Ghandruk Annapurna Nepal',
            ],
            'prefer' => ['poon hill', 'poon-hill', 'poonhill', 'ghorepani', 'ghandruk', 'dhaulagiri'],
        ],
        'gosaikunda-trek' => [
            'queries' => [
                'Gosaikunda lake Langtang Nepal',
                'Gosaikunda trek Nepal pilgrimage lake',
                'Gosaikunda',
                'Langtang National Park alpine lake Nepal',
            ],
            'prefer' => ['gosaikunda', 'gosainkunda', 'gosaikund', 'langtang', 'laurebina', 'lauribina', 'rasuwa'],
        ],
        'dubai-city-escape' => [
            'queries' => [
                'Dubai skyline sunset',
                'Dubai Burj Khalifa skyline',
            ],
            'prefer' => ['dubai', 'burj'],
        ],
        'chardham-yatra' => [
            'queries' => [
                'Kedarnath temple Himalaya',
                'Kedarnath Badrinath Himalaya temple',
                'Badrinath temple Uttarakhand',
            ],
            'prefer' => ['kedarnath', 'badrinath', 'char dham', 'chardham', 'yamunotri', 'gangotri', 'uttarakhand'],
        ],
    ];

    public function handle(): int
    {
        $key = config('services.pexels.key');

        if (blank($key)) {
            $this->error('PEXELS_API_KEY is not set. Add it to .env, then `php artisan config:clear`.');

            return self::FAILURE;
        }

        $targets = self::TARGETS;
        $only = array_filter((array) $this->option('only'));
        if ($only) {
            $unknown = array_diff($only, array_keys(self::TARGETS));
            if ($unknown) {
                $this->warn('Unknown slug(s) ignored: '.implode(', ', $unknown));
            }
            $targets = array_intersect_key(self::TARGETS, array_flip($only));
            if (! $targets) {
                $this->error('Nothing to do - none of the --only slugs are known.');

                return self::FAILURE;
            }
        }

        $converter = $this->webpConverter();
        $this->line($converter
            ? "WebP conversion via <info>{$converter}</info>."
            : '<comment>No WebP converter (GD / ffmpeg) available - images will be saved as .jpg and the package row repointed.</comment>');

        $disk = Storage::disk('public');
        $manifest = $this->readManifest();
        $done = [];
        $skipped = [];

        foreach ($targets as $slug => $spec) {
            $this->newLine();
            $this->line("<info>{$slug}</info>");

            // Photo ids already assigned to *other* packages - never re-use them.
            $takenIds = collect($manifest)
                ->reject(fn ($m, $s) => $s === $slug)
                ->pluck('photo_id')
                ->filter()
                ->all();

            $package = Package::where('slug', $slug)->first();

            if (! $package) {
                $skipped[$slug] = 'no package row with that slug';
                $this->warn('  skipped - no package row');

                continue;
            }

            $current = (string) $package->image;
            $hasReal = $current !== ''
                && ! str_contains($current, '_placeholder')
                && $disk->exists($current);

            if ($hasReal && ! $this->option('force')) {
                $skipped[$slug] = "already has {$current} (use --force to replace)";
                $this->line("  <comment>already set: {$current} - skipping</comment>");

                continue;
            }

            $pick = $this->pickPhoto($key, $spec, $takenIds, $skipped, $slug);
            if (! $pick) {
                continue;
            }

            $photo = $pick['photo'];
            $src = $photo['src']['large2x'] ?? $photo['src']['large'] ?? $photo['src']['original'] ?? null;
            if (! $src) {
                $skipped[$slug] = 'result had no usable src URL';
                $this->warn('  skipped - no src URL on the match');

                continue;
            }

            $this->line(sprintf('  %s: Pexels #%d  %dx%d  by %s  (query: "%s")',
                $pick['exact'] ? 'match' : 'LOOSE match',
                $photo['id'], $photo['width'], $photo['height'],
                $photo['photographer'] ?? '?', $pick['query']));
            $this->line("  <comment>{$photo['url']}</comment>");
            if (! empty($photo['alt'])) {
                $this->line("  alt: \"{$photo['alt']}\"");
            }

            $download = Http::timeout(30)->get($src);
            if ($download->failed()) {
                $skipped[$slug] = "image download HTTP {$download->status()}";
                $this->warn("  skipped - download failed ({$download->status()})");

                continue;
            }

            [$ext, $bytes] = $this->encode($download->body(), $converter, (int) $this->option('quality'));
            $relPath = "packages/{$slug}.{$ext}";

            $disk->put($relPath, $bytes);

            // Repoint the row and clear any now-stale sibling file for this slug.
            foreach (['webp', 'jpg', 'jpeg', 'png'] as $other) {
                $sibling = "packages/{$slug}.{$other}";
                if ($sibling !== $relPath && $disk->exists($sibling)) {
                    $disk->delete($sibling);
                }
            }
            $package->update(['image' => $relPath]);

            $kb = number_format(strlen($bytes) / 1024);
            $this->info("  saved  storage/app/public/{$relPath}  ({$kb} KB)");

            $manifest[$slug] = [
                'photo_id' => $photo['id'],
                'photographer' => $photo['photographer'] ?? null,
                'pexels_url' => $photo['url'] ?? null,
                'query' => $pick['query'],
                'alt' => $photo['alt'] ?? null,
                'exact' => $pick['exact'],
                'fetched_at' => now()->toIso8601String(),
            ];
            $this->writeManifest($manifest);

            $done[$slug] = [
                'path' => $relPath,
                'exact' => $pick['exact'],
                'photo_id' => $photo['id'],
                'photographer' => $photo['photographer'] ?? null,
                'pexels_url' => $photo['url'] ?? null,
            ];
        }

        $this->newLine();
        $this->line(str_repeat('-', 64));
        $this->info(sprintf('Fetched %d of %d', count($done), count($targets)));
        foreach ($done as $slug => $meta) {
            $tag = $meta['exact'] ? '' : '  <comment>[LOOSE - review]</comment>';
            $this->line("  [ok] {$slug} -> {$meta['path']}  (Pexels #{$meta['photo_id']} by {$meta['photographer']}){$tag}");
        }

        if ($skipped) {
            $this->newLine();
            $this->warn('Needs a manual pick (nothing was written for these):');
            foreach ($skipped as $slug => $why) {
                $this->line("  - {$slug}: {$why}");
            }
        }

        return self::SUCCESS;
    }

    /**
     * Try each query in order; prefer a result whose alt-text / URL slug
     * mentions one of the target keywords.
     *
     * @param  array{queries: string[], prefer: string[]}  $spec
     * @param  list<int>  $takenIds  photo ids already used by other packages
     * @param  array<string, string>  $skipped
     * @return array{photo: array<string, mixed>, query: string, exact: bool}|null
     */
    private function pickPhoto(string $key, array $spec, array $takenIds, array &$skipped, string $slug): ?array
    {
        $prefer = array_filter(array_map('strtolower', $spec['prefer'] ?? []));
        $fallback = null;
        $fallbackQuery = null;

        foreach ($spec['queries'] as $query) {
            $resp = Http::withHeaders(['Authorization' => $key])
                ->acceptJson()
                ->get('https://api.pexels.com/v1/search', [
                    'query' => $query,
                    'per_page' => 8,
                    'orientation' => 'landscape',
                ]);

            if ($resp->failed()) {
                $this->line("  \"{$query}\" -> HTTP {$resp->status()}");

                continue;
            }

            $photos = collect($resp->json('photos', []))
                ->filter(fn ($p) => ($p['width'] ?? 0) > ($p['height'] ?? 0) && ($p['width'] ?? 0) >= 1200)
                ->reject(fn ($p) => in_array($p['id'] ?? null, $takenIds, true))
                ->values();

            if ($photos->isEmpty()) {
                $this->line("  \"{$query}\" -> no usable landscape results");

                continue;
            }

            $hit = $photos->first(function (array $p) use ($prefer): bool {
                $hay = strtolower(($p['alt'] ?? '').' '.($p['url'] ?? ''));
                foreach ($prefer as $token) {
                    if (str_contains($hay, $token)) {
                        return true;
                    }
                }

                return false;
            });

            if ($hit) {
                $this->line("  \"{$query}\" -> keyword match ({$photos->count()} candidates)");

                return ['photo' => $hit, 'query' => $query, 'exact' => true];
            }

            $this->line("  \"{$query}\" -> {$photos->count()} results, none mention ".implode(' / ', $prefer));

            if (! $fallback) {
                $fallback = $photos->first();
                $fallbackQuery = $query;
            }
        }

        if ($fallback) {
            return ['photo' => $fallback, 'query' => (string) $fallbackQuery, 'exact' => false];
        }

        $skipped[$slug] = 'no usable landscape result across all queries - pick one manually';
        $this->warn('  skipped - no usable landscape result');

        return null;
    }

    /**
     * Convert JPEG bytes to WebP when possible, otherwise pass the JPEG through.
     *
     * @return array{0: string, 1: string} [extension, bytes]
     */
    private function encode(string $jpeg, ?string $converter, int $quality): array
    {
        $quality = max(1, min(100, $quality));

        if ($converter === 'gd') {
            $image = @imagecreatefromstring($jpeg);
            if ($image !== false) {
                ob_start();
                imagewebp($image, null, $quality);
                $webp = (string) ob_get_clean();
                imagedestroy($image);
                if ($webp !== '') {
                    return ['webp', $webp];
                }
            }
        }

        if ($converter === 'ffmpeg') {
            $in = tempnam(sys_get_temp_dir(), 'pxl').'.jpg';
            $out = tempnam(sys_get_temp_dir(), 'pxl').'.webp';
            file_put_contents($in, $jpeg);

            try {
                $result = Process::timeout(60)->run([
                    'ffmpeg', '-y', '-hide_banner', '-loglevel', 'error',
                    '-i', $in, '-c:v', 'libwebp', '-quality', (string) $quality, $out,
                ]);

                if ($result->successful() && is_file($out) && filesize($out) > 0) {
                    return ['webp', (string) file_get_contents($out)];
                }
            } finally {
                @unlink($in);
                @unlink($out);
            }
        }

        return ['jpg', $jpeg];
    }

    /** @return array<string, array<string, mixed>> */
    private function readManifest(): array
    {
        $local = Storage::disk('local');
        if (! $local->exists(self::MANIFEST)) {
            return [];
        }

        return json_decode((string) $local->get(self::MANIFEST), true) ?: [];
    }

    /** @param  array<string, array<string, mixed>>  $manifest */
    private function writeManifest(array $manifest): void
    {
        ksort($manifest);
        Storage::disk('local')->put(
            self::MANIFEST,
            json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES).PHP_EOL,
        );
    }

    /** @return 'gd'|'ffmpeg'|null */
    private function webpConverter(): ?string
    {
        if (function_exists('imagewebp') && function_exists('imagecreatefromstring')) {
            return 'gd';
        }

        try {
            if (Process::run(['ffmpeg', '-version'])->successful()) {
                return 'ffmpeg';
            }
        } catch (\Throwable) {
            // ffmpeg not on PATH
        }

        return null;
    }
}
