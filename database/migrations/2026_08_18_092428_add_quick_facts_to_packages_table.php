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
        Schema::table('packages', function (Blueprint $table) {
            $table->string('trip_grade')->nullable();
            $table->integer('group_size_min')->nullable();
            $table->integer('group_size_max')->nullable();
            $table->string('best_season')->nullable();
            $table->string('meals_note')->nullable();
            $table->string('accommodation_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn([
                'trip_grade',
                'group_size_min',
                'group_size_max',
                'best_season',
                'meals_note',
                'accommodation_note',
            ]);
        });
    }
};
