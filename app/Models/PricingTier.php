<?php

namespace App\Models;

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
}
