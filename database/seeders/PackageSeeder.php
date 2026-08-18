<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PackageSeeder extends Seeder
{
    /**
     * One-time migration of the 6 packages that used to live in
     * resources/data/packages.php into the packages table.
     *
     * Images are copied from public/images/... into the "public" storage
     * disk (public/images/foo.png -> storage/app/public/foo.png), because
     * that's the disk Filament's FileUpload/ImageColumn resolve uploaded
     * paths against. Storing the original public/images path would leave
     * the admin thumbnail preview broken for these migrated rows.
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
                    'image' => $this->storeOnPublicDisk($package['image']),
                    'gallery' => array_map(fn (string $url) => $this->storeOnPublicDisk($url), $package['gallery']),
                    'highlights' => $package['highlights'],
                    'itinerary' => $package['itinerary'],
                    'inclusions' => $package['inclusions'],
                    'exclusions' => $package['exclusions'],
                    'is_active' => true,
                ]
            );
        }
    }

    private function storeOnPublicDisk(string $url): string
    {
        $publicRelativePath = ltrim(parse_url($url, PHP_URL_PATH), '/');
        $storageRelativePath = Str::after($publicRelativePath, 'images/');

        if (! Storage::disk('public')->exists($storageRelativePath)) {
            Storage::disk('public')->put(
                $storageRelativePath,
                file_get_contents(public_path($publicRelativePath))
            );
        }

        return $storageRelativePath;
    }
}
