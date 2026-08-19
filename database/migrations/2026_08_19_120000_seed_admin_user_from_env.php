<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Seeds the admin user from ADMIN_SEED_EMAIL / ADMIN_SEED_PASSWORD so a
     * host with no shell/artisan access (e.g. Wasmer's free tier, which only
     * runs `php artisan migrate` after each deploy) still ends up with a
     * working admin login. Only creates the user if that email doesn't
     * already exist — running this migration a second time is a no-op, and
     * since Laravel only ever runs a given migration once, changing
     * ADMIN_SEED_PASSWORD later won't retroactively update it here.
     */
    public function up(): void
    {
        $email = env('ADMIN_SEED_EMAIL');
        $password = env('ADMIN_SEED_PASSWORD');

        if (! $email || ! $password) {
            return;
        }

        if (User::where('email', $email)->exists()) {
            return;
        }

        User::create([
            'name' => 'Admin',
            'email' => $email,
            'password' => $password,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
