<div>
    <h2 class="font-heading text-h4 font-bold text-text-primary">Itinerary</h2>

    <div class="mt-6 space-y-0">
        @foreach ($package['itinerary'] as $stop)
            <div class="relative flex gap-5 pb-8 last:pb-0">
                <div class="flex flex-col items-center">
                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-primary font-body text-xs font-bold text-white">
                        {{ $stop['day'] }}
                    </span>
                    @if (!$loop->last)
                        <span class="mt-1 w-px flex-1 bg-text-secondary/20"></span>
                    @endif
                </div>

                <div class="pb-1">
                    <p class="font-body text-xs font-semibold uppercase tracking-wide text-text-secondary">Day {{ $stop['day'] }}</p>
                    <h3 class="mt-1 font-heading text-h6 font-bold text-text-primary">{{ $stop['title'] }}</h3>
                    <p class="mt-1.5 font-body text-sm text-text-secondary">{{ $stop['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
