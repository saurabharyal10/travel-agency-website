<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class PricingTier extends Model
{
    protected $table = 'package_pricing_tiers';

    protected $fillable = [
        'package_id',
        'pax_min',
        'pax_max',
        'price_per_person',
        'sort_order',
    ];

    protected $casts = [
        'price_per_person' => 'decimal:2',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => '$'.number_format((float) $this->price_per_person),
        );
    }

    protected function paxLabel(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->pax_max
                ? "{$this->pax_min}–{$this->pax_max} people"
                : "{$this->pax_min}+ people",
        );
    }
}
