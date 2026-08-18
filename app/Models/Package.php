<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
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
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'gallery' => 'array',
        'highlights' => 'array',
        'itinerary' => 'array',
        'inclusions' => 'array',
        'exclusions' => 'array',
        'is_active' => 'boolean',
    ];

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
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
            get: fn () => $this->image ? asset($this->image) : null,
        );
    }

    protected function galleryUrls(): Attribute
    {
        return Attribute::make(
            get: fn () => collect($this->gallery ?? [])->map(fn (string $path) => asset($path))->all(),
        );
    }
}
