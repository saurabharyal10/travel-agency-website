<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Enquiry extends Model
{
    use LogsActivity;

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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable)
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
