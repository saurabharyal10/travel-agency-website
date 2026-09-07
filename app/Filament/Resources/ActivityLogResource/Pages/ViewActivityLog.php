<?php

namespace App\Filament\Resources\ActivityLogResource\Pages;

use App\Filament\Resources\ActivityLogResource;
use Rmsramos\Activitylog\Resources\ActivitylogResource\Pages\ViewActivitylog as BaseViewActivitylog;

class ViewActivityLog extends BaseViewActivitylog
{
    public static function getResource(): string
    {
        return ActivityLogResource::class;
    }
}
