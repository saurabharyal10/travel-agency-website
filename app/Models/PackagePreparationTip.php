<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackagePreparationTip extends Model
{
    protected $fillable = [
        'package_id',
        'category',
        'content',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
