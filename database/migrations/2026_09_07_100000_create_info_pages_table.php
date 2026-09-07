<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Simple CMS-managed content pages ("Info Pages") - Visa Requirements,
     * Insurance & Safety, Common Questions, and any similar page added later
     * from the admin panel. Served publicly at /info/{slug}.
     */
    public function up(): void
    {
        Schema::create('info_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('info_pages');
    }
};
