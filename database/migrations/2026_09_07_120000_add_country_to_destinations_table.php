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
        Schema::table('destinations', function (Blueprint $table) {
            // Groups the navbar "Destinations" dropdown by country. The dropdown
            // itself is filtered to is_featured rows (left untouched here - all
            // 18 existing rows stay featured; the client curates from there).
            $table->string('country')->nullable()->after('name');
        });

        // Backfill country for the current 18 destinations. Each is confidently
        // inferable from its name/region; nothing is left for manual entry.
        $countries = [
            'kathmandu-valley' => 'Nepal',
            'pokhara' => 'Nepal',
            'chitwan' => 'Nepal',
            'mustang' => 'Nepal',
            'manaslu' => 'Nepal',
            'everest-solu-khumbu' => 'Nepal',
            'nagarkot' => 'Nepal',
            'chandragiri-hills' => 'Nepal',
            'bardia-national-park' => 'Nepal',
            'rara-lake' => 'Nepal',
            'ilam-tea-hills' => 'Nepal',
            'langtang-valley' => 'Nepal',
            'char-dham-yatra' => 'India',
            'maldives' => 'Maldives',
            'bali' => 'Indonesia',
            'thailand-bangkok-phuket' => 'Thailand',
            'dubai-uae' => 'United Arab Emirates',
            'singapore' => 'Singapore',
        ];

        foreach ($countries as $slug => $country) {
            DB::table('destinations')->where('slug', $slug)->update(['country' => $country]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn('country');
        });
    }
};
