<?php

namespace App\Filament\Widgets;

use App\Models\Enquiry;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class NewEnquiriesWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Enquiries', Enquiry::where('created_at', '>=', now()->subDays(7))->count())
                ->description('Received in the last 7 days')
                ->color('primary'),
        ];
    }
}
