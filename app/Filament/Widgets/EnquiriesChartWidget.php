<?php

namespace App\Filament\Widgets;

use App\Models\Enquiry;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class EnquiriesChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Enquiries — Last 14 Days';

    protected static ?string $maxHeight = '260px';

    protected int|string|array $columnSpan = 1;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $days = collect(range(13, 0))->map(fn (int $daysAgo) => Carbon::today()->subDays($daysAgo));

        $counts = Enquiry::query()
            ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->where('created_at', '>=', Carbon::today()->subDays(13))
            ->groupBy('day')
            ->pluck('total', 'day');

        return [
            'datasets' => [
                [
                    'label' => 'Enquiries',
                    'data' => $days->map(fn (Carbon $day) => (int) ($counts[$day->toDateString()] ?? 0))->all(),
                    'borderColor' => '#D91E18',
                    'backgroundColor' => 'rgba(217, 30, 24, 0.12)',
                    'fill' => true,
                    'tension' => 0.35,
                ],
            ],
            'labels' => $days->map(fn (Carbon $day) => $day->format('M j'))->all(),
        ];
    }
}
