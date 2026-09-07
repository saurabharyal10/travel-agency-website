<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminUserSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(AllPackagesSeeder::class);
        $this->call(DestinationSeeder::class);
        $this->call(BlogPostSeeder::class);

        // Demo-only placeholder subscribers (@example.com). Remove this call
        // once the real data cleanup (task 7j) has run - see the seeder docblock.
        $this->call(NewsletterSubscriberSeeder::class);
    }
}
