<?php

namespace App\Filament\Widgets;

use App\Models\BlogPost;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PublishedBlogPostsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Published Blog Posts', BlogPost::whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->count())
                ->description('Live on the site')
                ->descriptionIcon('heroicon-o-newspaper')
                ->color('secondary'),
        ];
    }
}
