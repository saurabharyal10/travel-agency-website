@php
    $expeditions = [
        [
            'title' => 'Pokhara',
            'description' => 'The ultimate pilgrimage for mountain lovers through the Annapurna foothills and turquoise lakes.',
            'duration' => '6 Days',
            'price' => '$1,650',
            'featured' => true,
            'image' => asset('images/packages/pokhara.png'),
        ],
        [
            'title' => 'Chitwan Safari',
            'description' => 'Explore the sub-tropical jungles and encounter the endangered one-horned rhino.',
            'duration' => '3 Days',
            'price' => '$950',
            'featured' => false,
            'image' => asset('images/packages/chitwan-safari.png'),
        ],
        [
            'title' => 'Mustang',
            'description' => 'Discover the forbidden kingdom of Lo, a pocket of Tibetan culture hidden beyond the Himalaya.',
            'duration' => '8 Days',
            'price' => '$1,850',
            'featured' => false,
            'image' => asset('images/packages/mustang.png'),
        ],
    ];
@endphp

<section class="bg-background py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="flex flex-col items-start justify-between gap-6 sm:flex-row sm:items-end">
            <div>
                <h2 class="font-heading text-h3 font-bold text-text-primary sm:text-h2">Curated Expeditions</h2>
                <p class="mt-3 max-w-md font-body text-sm text-text-secondary">
                    Rare experiences designed for the conscious traveler. From high-altitude challenges to serene cultural immersions.
                </p>
            </div>

            <div class="flex shrink-0 items-center gap-3">
                <button type="button" aria-label="Previous expedition" class="flex h-11 w-11 items-center justify-center rounded-full border border-text-secondary/20 text-text-primary transition-colors hover:border-primary hover:text-primary">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M19 12H5M5 12L11 6M5 12L11 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button type="button" aria-label="Next expedition" class="flex h-11 w-11 items-center justify-center rounded-full border border-text-secondary/20 text-text-primary transition-colors hover:border-primary hover:text-primary">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($expeditions as $expedition)
                <article>
                    <div class="relative aspect-[4/5] overflow-hidden rounded-2xl bg-text-secondary/10">
                        <img
                            src="{{ $expedition['image'] }}"
                            alt="{{ $expedition['title'] }}"
                            class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                        >

                        @if ($expedition['featured'])
                            <span class="absolute left-4 top-4 rounded-full bg-primary px-3 py-1 font-body text-xs font-semibold uppercase tracking-wide text-white">
                                Featured
                            </span>
                        @endif

                        <span class="absolute right-4 top-4 rounded-full bg-white px-3 py-1 font-body text-xs font-semibold text-text-primary">
                            From {{ $expedition['price'] }}
                        </span>

                        <span class="absolute bottom-4 left-4 rounded-full bg-black/60 px-3 py-1 font-body text-xs font-semibold uppercase tracking-wide text-white">
                            {{ $expedition['duration'] }}
                        </span>
                    </div>

                    <h3 class="mt-5 font-heading text-h5 font-bold text-text-primary">{{ $expedition['title'] }}</h3>
                    <p class="mt-2 line-clamp-1 font-body text-sm text-text-secondary">{{ $expedition['description'] }}</p>

                    <a href="#" class="mt-3 inline-flex items-center gap-1.5 font-body text-sm font-semibold uppercase tracking-wide text-primary transition-colors hover:text-primary/80">
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
