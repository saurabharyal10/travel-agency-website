<?php

namespace App\Filament\Resources\ActivityLogResource\Pages;

use App\Filament\Resources\ActivityLogResource;
use Rmsramos\Activitylog\Resources\ActivitylogResource\Pages\ListActivitylog as BaseListActivitylog;

class ListActivityLogs extends BaseListActivitylog
{
    protected static string $resource = ActivityLogResource::class;
}
