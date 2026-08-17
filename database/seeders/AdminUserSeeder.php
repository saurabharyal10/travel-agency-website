<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the default local-dev admin account for the /control_admin panel.
     *
     * DEV-ONLY CREDENTIALS — admin@admin.com / admin123.
     * These are intentionally weak and predictable for local development convenience.
     * This account (and password) MUST be changed/rotated before production deployment.
     * See PROJECT_STATUS.md's Known Open Items for tracking.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => 'admin123',
            ]
        );
    }
}
