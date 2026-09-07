<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            // Homepage "Exclusive Offers" strip - up to three hand-picked
            // packages, positioned 1-3. Curated from Manage Site Settings.
            foreach (['exclusive_offer_1_id', 'exclusive_offer_2_id', 'exclusive_offer_3_id'] as $column) {
                $table->foreignId($column)
                    ->nullable()
                    ->after('tiktok_url')
                    ->constrained('packages')
                    ->nullOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            foreach (['exclusive_offer_1_id', 'exclusive_offer_2_id', 'exclusive_offer_3_id'] as $column) {
                $table->dropForeign([$column]);
                $table->dropColumn($column);
            }
        });
    }
};
