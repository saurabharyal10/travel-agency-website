<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            // Top-level split used by the navbar "Packages" dropdown. Distinct
            // from the free-text `category` tag (Trekking / Wildlife / ...).
            // Every existing package is a "travel" package; the trekking
            // catalogue is seeded separately (TrekkingPackagesSeeder).
            $table->enum('type', ['trekking', 'travel'])->default('travel')->after('category');
        });

        DB::table('packages')->update(['type' => 'travel']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
