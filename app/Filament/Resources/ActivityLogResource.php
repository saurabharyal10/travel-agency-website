<?php

namespace App\Filament\Resources;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Str;
use Rmsramos\Activitylog\Resources\ActivitylogResource as BaseActivitylogResource;

/**
 * Thin override of the rmsramos/activitylog resource:
 *
 *  - The Event filter now only lists real model events (Created / Updated /
 *    Deleted). The base resource maps every distinct `event` value - including
 *    the NULL that our auth-event rows ("logged in" etc.) carry - through
 *    __('activitylog::action.event.'.$value), and for NULL that produced the
 *    raw, untranslated key "activitylog::action.event." in the dropdown.
 *  - The Properties column is explicitly kept hidden-by-default (still
 *    toggleable via the Columns menu). Its inline HTML before/after diff is
 *    useful for a deep dive but makes the table unreadable at a glance.
 */
class ActivityLogResource extends BaseActivitylogResource
{
    public static function getEventFilterComponent(): SelectFilter
    {
        return SelectFilter::make('event')
            ->label(__('activitylog::tables.filters.event.label'))
            ->options(
                static::getModel()::query()
                    ->whereNotNull('event')
                    ->where('event', '!=', '')
                    ->distinct()
                    ->orderBy('event')
                    ->pluck('event', 'event')
                    ->mapWithKeys(fn (string $value) => [$value => Str::headline($value)])
                    ->all()
            );
    }

    public static function getPropertiesColumnComponent(): Column
    {
        return ViewColumn::make('properties')
            ->searchable()
            ->label(__('activitylog::tables.columns.properties.label'))
            ->view('activitylog::filament.tables.columns.activity-logs-properties')
            ->toggleable(isToggledHiddenByDefault: true);
    }
}
