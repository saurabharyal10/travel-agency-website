<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the default local-dev admin account for the /control_admin panel.
     *
     * Credentials come from ADMIN_SEED_EMAIL / ADMIN_SEED_PASSWORD in .env
     * (gitignored) so no real or default credential value is ever committed
     * to source control. The fallbacks below only apply if those env vars
     * are unset, and remain intentionally weak/predictable for local dev.
     * This account (and password) MUST be changed/rotated before production
     * deployment. See PROJECT_STATUS.md's Known Open Items for tracking.
     */
    public function run(): void
    {
        $email = env('ADMIN_SEED_EMAIL', 'admin@admin.com');
        $password = env('ADMIN_SEED_PASSWORD', 'admin123');

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Admin',
                'password' => $password,
            ]
        );
    }
}
