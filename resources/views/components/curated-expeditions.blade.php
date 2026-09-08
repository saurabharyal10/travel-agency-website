@php
    $expeditions = \App\Models\Package::where('is_active', true)
        ->orderByRaw("CASE WHEN badge = 'featured' THEN 0 ELSE 1 END")
        ->orderBy('id')
        ->take(3)
        ->get();
@endphp

<section class="bg-background py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div>
            <h2 class="font-heading text-h3 font-bold text-text-primary sm:text-h2">Curated Expeditions</h2>
            <p class="mt-3 max-w-md font-body text-sm text-text-secondary">
                Rare experiences designed for the conscious traveler. From high-altitude challenges to serene cultural immersions.
            </p>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($expeditions as $expedition)
                <article>
                    <div class="relative aspect-[4/5] overflow-hidden rounded-2xl bg-text-secondary/10">
                        <img
                            src="{{ $expedition->image_url }}"
                            alt="{{ $expedition->title }}"
                            class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                        >

                        @if ($expedition->badge === 'featured')
                            <span class="absolute left-4 top-4 rounded-full bg-primary px-3 py-1 font-body text-xs font-semibold uppercase tracking-wide text-white">
                                Featured
                            </span>
                        @endif

                        <span class="absolute right-4 top-4 rounded-full bg-white px-3 py-1 font-body text-xs font-semibold text-text-primary">
                            From {{ $expedition->formatted_price }}
                        </span>

                        <span class="absolute bottom-4 left-4 rounded-full bg-black/60 px-3 py-1 font-body text-xs font-semibold uppercase tracking-wide text-white">
                            {{ $expedition->duration }}
                        </span>
                    </div>

                    <h3 class="mt-5 font-heading text-h5 font-bold text-text-primary">{{ $expedition->title }}</h3>
                    <p class="mt-2 line-clamp-1 font-body text-sm text-text-secondary">{{ $expedition->description }}</p>

                    <a href="{{ route('packages.show', $expedition->slug) }}" class="mt-3 inline-flex items-center gap-1.5 font-body text-sm font-semibold uppercase tracking-wide text-primary transition-colors hover:text-primary/80">
                        View Journeys
                        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>
