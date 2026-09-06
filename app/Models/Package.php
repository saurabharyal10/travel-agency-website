<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Package extends Model
{
    use LogsActivity;

    protected $fillable = [
        'destination_id',
        'title',
        'slug',
        'category',
        'duration',
        'description',
        'price',
        'badge',
        'image',
        'gallery',
        'highlights',
        'itinerary',
        'inclusions',
        'exclusions',
        'is_active',
        'trip_grade',
        'group_size_min',
        'group_size_max',
        'best_season',
        'meals_note',
        'accommodation_note',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'gallery' => 'array',
        'highlights' => 'array',
        'itinerary' => 'array',
        'inclusions' => 'array',
        'exclusions' => 'array',
        'is_active' => 'boolean',
        'group_size_min' => 'integer',
        'group_size_max' => 'integer',
    ];

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function pricingTiers()
    {
        return $this->hasMany(PricingTier::class)->orderBy('sort_order');
    }

    public function faqs()
    {
        return $this->hasMany(PackageFaq::class)->orderBy('sort_order');
    }

    public function preparationTips()
    {
        return $this->hasMany(PackagePreparationTip::class);
    }

    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => '$'.number_format((float) $this->price),
        );
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image ? asset('storage/'.$this->image) : null,
        );
    }

    protected function galleryUrls(): Attribute
    {
        return Attribute::make(
            get: fn () => collect($this->gallery ?? [])->map(fn (string $path) => asset('storage/'.$path))->all(),
        );
    }

    protected function groupSizeLabel(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->group_size_min && $this->group_size_max) {
                    return "{$this->group_size_min}–{$this->group_size_max} people";
                }

                if ($this->group_size_min) {
                    return "{$this->group_size_min}+ people";
                }

                if ($this->group_size_max) {
                    return "Up to {$this->group_size_max} people";
                }

                return null;
            },
        );
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable)
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
