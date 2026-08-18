@php
    $facts = array_filter([
        'Trip Grade' => $package['trip_grade'],
        'Group Size' => $package['group_size_label'],
        'Best Season' => $package['best_season'],
        'Meals' => $package['meals_note'],
        'Accommodation' => $package['accommodation_note'],
    ]);
@endphp

@if (count($facts))
    <div class="mb-14 flex flex-wrap gap-x-10 gap-y-4 rounded-2xl border border-text-secondary/10 bg-white px-6 py-5">
        @foreach ($facts as $label => $value)
            <div>
                <p class="font-body text-xs font-semibold uppercase tracking-wide text-text-secondary">{{ $label }}</p>
                <p class="mt-1 font-body text-sm font-semibold text-text-primary">{{ $value }}</p>
            </div>
        @endforeach
    </div>
@endif
