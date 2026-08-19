<?php

namespace App\Filament\Widgets;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Str;
use Spatie\Activitylog\Models\Activity;

class RecentActivityWidget extends BaseWidget
{
    protected static ?string $heading = 'Recent Activity';

    protected int|string|array $columnSpan = 1;

    public function table(Table $table): Table
    {
        return $table
            ->query(Activity::query()->latest('created_at')->limit(10))
            ->paginated(false)
            ->columns([
                TextColumn::make('event')
                    ->label('Event')
                    ->badge()
                    ->formatStateUsing(fn (?string $state) => $state ? ucfirst($state) : '-')
                    ->color(fn (?string $state) => match ($state) {
                        'created' => 'secondary',
                        'updated' => 'primary',
                        default => 'gray',
                    }),
                TextColumn::make('subject_type')
                    ->label('Subject')
                    ->formatStateUsing(fn (?string $state, Activity $record) => $state
                        ? Str::of($state)->afterLast('\\')->headline().' #'.$record->subject_id
                        : '-'),
                TextColumn::make('causer.name')
                    ->label('User')
                    ->default('System'),
                TextColumn::make('created_at')
                    ->label('When')
                    ->since(),
            ]);
    }
}
