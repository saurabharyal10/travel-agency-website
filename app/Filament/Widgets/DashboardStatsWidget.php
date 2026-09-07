<?php

namespace App\Filament\Widgets;

use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\Enquiry;
use App\Models\Package;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Active Packages', Package::where('is_active', true)->count())
                ->description('Currently active travel packages')
                ->descriptionIcon('heroicon-o-globe-alt')
                ->color('primary'),

            Stat::make('New Contact Messages', ContactMessage::where('created_at', '>=', now()->subDays(7))->count())
                ->description('Received in the last 7 days')
                ->descriptionIcon('heroicon-o-envelope')
                ->color('primary'),

            Stat::make('New Enquiries', Enquiry::where('created_at', '>=', now()->subDays(7))->count())
                ->description('Received in the last 7 days')
                ->descriptionIcon('heroicon-o-chat-bubble-left-right')
                ->color('secondary'),

            Stat::make('Published Blog Posts', BlogPost::whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->count())
                ->description('Live on the site')
                ->descriptionIcon('heroicon-o-newspaper')
                ->color('secondary'),
        ];
    }
}
