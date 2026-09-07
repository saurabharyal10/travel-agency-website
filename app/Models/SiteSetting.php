<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'footer_copyright_text',
        'tagline',
        'newsletter_blurb',
        'hours',
    ];

    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1]);
    }
}
