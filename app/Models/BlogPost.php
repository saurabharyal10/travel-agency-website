<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'excerpt',
        'content',
        'image',
        'is_featured',
        'read_minutes',
        'published_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'read_minutes' => 'integer',
        'published_at' => 'datetime',
    ];
}
