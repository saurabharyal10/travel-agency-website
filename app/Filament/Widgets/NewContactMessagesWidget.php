<?php

namespace App\Filament\Widgets;

use App\Models\ContactMessage;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class NewContactMessagesWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Contact Messages', ContactMessage::where('created_at', '>=', now()->subDays(7))->count())
                ->description('Received in the last 7 days')
                ->color('warning'),
        ];
    }
}
