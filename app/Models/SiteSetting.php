<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteSetting extends Model
{
    protected $fillable = [
        'contact_address',
        'contact_phone',
        'whatsapp_link',
        'contact_email',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'tiktok_url',
        'footer_copyright_text',
        'tagline',
        'newsletter_blurb',
        'hours',
        'exclusive_offer_1_id',
        'exclusive_offer_2_id',
        'exclusive_offer_3_id',
    ];

    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1]);
    }

    public function exclusiveOffer1(): BelongsTo
    {
        return $this->belongsTo(Package::class, 'exclusive_offer_1_id');
    }

    public function exclusiveOffer2(): BelongsTo
    {
        return $this->belongsTo(Package::class, 'exclusive_offer_2_id');
    }

    public function exclusiveOffer3(): BelongsTo
    {
        return $this->belongsTo(Package::class, 'exclusive_offer_3_id');
    }

    /**
     * The hand-picked Exclusive Offers packages, in slot order (1-3), with any
     * empty or dangling slots skipped.
     */
    public function exclusiveOfferPackages(): Collection
    {
        $ids = array_filter([
            $this->exclusive_offer_1_id,
            $this->exclusive_offer_2_id,
            $this->exclusive_offer_3_id,
        ]);

        if (empty($ids)) {
            return new Collection;
        }

        $packages = Package::whereIn('id', $ids)->get()->keyBy('id');

        return (new Collection($ids))
            ->map(fn ($id) => $packages->get($id))
            ->filter()
            ->values();
    }
}
