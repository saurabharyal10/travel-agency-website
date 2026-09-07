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
        // Runs after AllPackagesSeeder + DestinationSeeder: promotes three
        // existing treks to type='trekking', adds the rest of the trekking
        // catalogue plus the Dubai / Chardham trips, and wires the
        // Exclusive Offers slots on Site Settings.
        $this->call(TrekkingPackagesSeeder::class);
        $this->call(BlogPostSeeder::class);
        $this->call(InfoPageSeeder::class);

        // NewsletterSubscriberSeeder is intentionally NOT called: its demo
        // @example.com rows were removed in the task 7j data cleanup. The
        // seeder file is kept for reference / re-seeding demo data on demand.
    }
}
