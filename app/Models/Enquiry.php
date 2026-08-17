<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    public const STATUSES = [
        'new' => 'New',
        'contacted' => 'Contacted',
        'converted' => 'Converted',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'package_id',
        'message',
        'status',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
