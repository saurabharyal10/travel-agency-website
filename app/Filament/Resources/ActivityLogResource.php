<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityLogResource\Pages;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Rmsramos\Activitylog\Resources\ActivitylogResource as BaseActivitylogResource;

/**
 * Thin override of the rmsramos/activitylog resource, wired via
 * ActivitylogPlugin::resource().
 *
 * Only reason it exists: the Event filter. The base resource builds its options
 * from every distinct `event` value and matches with a plain `where('event', …)`.
 * Our auth-event rows ("logged in" / "logged out") store `event = NULL`, which
 * (a) surfaced the raw translation key "activitylog::action.event." as an option
 * and (b) could never be matched by an equals filter. This version lists the
 * real events plus an "Other" option that filters on `whereNull('event')`.
 *
 * NOTE: the base resource's own List/View page classes hard-code the base
 * resource class, so this subclass MUST also override getPages() with pages that
 * point back here - otherwise none of the overrides below are ever reached.
 */
class ActivityLogResource extends BaseActivitylogResource
{
    /**
     * Sentinel option value for "activity with no model event" (auth events).
     */
    public const EVENT_NONE = '__none__';

    public static function getEventFilterComponent(): SelectFilter
    {
        return SelectFilter::make('event')
            ->label(__('activitylog::tables.filters.event.label'))
            ->options(function (): array {
                $options = static::getModel()::query()
                    ->whereNotNull('event')
                    ->where('event', '!=', '')
                    ->distinct()
                    ->orderBy('event')
                    ->pluck('event')
                    ->mapWithKeys(fn (string $event) => [$event => Str::headline($event)])
                    ->all();

                if (static::getModel()::query()->whereNull('event')->exists()) {
                    $options[self::EVENT_NONE] = __('activitylog::action.event.'); // "Other"
                }

                return $options;
            })
            ->query(function (Builder $query, array $data): Builder {
                $value = $data['value'] ?? null;

                return match (true) {
                    blank($value)              => $query,
                    $value === self::EVENT_NONE => $query->whereNull('event'),
                    default                    => $query->where('event', $value),
                };
            });
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivityLogs::route('/'),
            'view'  => Pages\ViewActivityLog::route('/{record}'),
        ];
    }
}
