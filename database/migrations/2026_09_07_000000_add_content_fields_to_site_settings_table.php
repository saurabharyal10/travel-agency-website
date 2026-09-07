<?php

use App\Models\SiteSetting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Adds editable content fields to site_settings so the hero tagline,
     * newsletter blurb and (eventually) opening hours can be managed from the
     * "Manage Site Settings" admin page instead of being hardcoded in Blade.
     *
     * The backfill below copies the copy that is ALREADY live into the
     * singleton row so the frontend renders identically after this ships -
     * this is an invisible refactor, not a content change. It also clears the
     * two junk values a test left in the row (contact_email "travel@gmail.com",
     * footer_copyright_text "@saurabharyal").
     */
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->text('tagline')->nullable()->after('footer_copyright_text');
            $table->text('newsletter_blurb')->nullable()->after('tagline');
            $table->string('hours')->nullable()->after('newsletter_blurb');
        });

        SiteSetting::firstOrNew(['id' => 1])->forceFill([
            // Relocated verbatim from the Blade views:
            'tagline' => 'Explore Nepal & Beyond with Unforgettable Travel Experiences',
            'newsletter_blurb' => 'Stories from the trail, cultural insights, and early access to our seasonal departures.',
            'footer_copyright_text' => 'TRAVEL. All rights reserved.',
            // Known-good real contact values:
            'contact_address' => 'Kathmandu, Lazimpat, Nepal',
            'contact_phone' => '+971 58 187 5689',
            // Left blank on purpose - no real value yet:
            'hours' => null,
            'contact_email' => null,
        ])->save();
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['tagline', 'newsletter_blurb', 'hours']);
        });
    }
};
