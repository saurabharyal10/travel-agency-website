<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Local-dev convenience only. NEVER called by DatabaseSeeder or any
 * automated/Cloud deploy step — run explicitly when you want a throwaway
 * login:
 *
 *   php artisan db:seed --class=LocalTestUserSeeder
 *
 * Creates a user with the factory's default password ("password"), which
 * is fine for a local database but must never be run against production.
 */
class LocalTestUserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
