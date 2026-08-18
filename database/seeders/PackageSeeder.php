<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * One-time migration of the 6 packages that used to live in
     * resources/data/packages.php into the packages table.
     */
    public function run(): void
    {
        $packages = require resource_path('data/packages.php');

        foreach ($packages as $package) {
            Package::updateOrCreate(
                ['slug' => $package['slug']],
                [
                    'title' => $package['title'],
                    'category' => $package['category'],
                    'duration' => $package['duration'],
                    'description' => $package['description'],
                    'price' => (float) preg_replace('/[^0-9.]/', '', $package['price']),
                    'badge' => $package['badge'],
                    'image' => $this->relativePath($package['image']),
                    'gallery' => array_map(fn (string $url) => $this->relativePath($url), $package['gallery']),
                    'highlights' => $package['highlights'],
                    'itinerary' => $package['itinerary'],
                    'inclusions' => $package['inclusions'],
                    'exclusions' => $package['exclusions'],
                    'is_active' => true,
                ]
            );
        }
    }

    private function relativePath(string $url): string
    {
        return ltrim(parse_url($url, PHP_URL_PATH), '/');
    }
}
