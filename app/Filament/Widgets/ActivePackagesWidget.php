<?php

namespace App\Filament\Widgets;

use App\Models\Package;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ActivePackagesWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Active Packages', Package::where('is_active', true)->count())
                ->description('Currently active travel packages')
                ->color('success'),
        ];
    }
}
