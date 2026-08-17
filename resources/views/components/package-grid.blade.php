@php
    $packages = require resource_path('data/packages.php');

    $badgeStyles = [
        'featured' => 'bg-primary text-white',
        'best_price' => 'bg-secondary text-white',
        'sold_out' => 'bg-text-primary/80 text-white',
    ];

    $badgeLabels = [
        'featured' => 'Featured',
        'best_price' => 'Best Price',
        'sold_out' => 'Sold Out',
    ];
@endphp

<section class="bg-background pb-24 sm:pb-28">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="flex flex-col items-start justify-between gap-4 border-b border-text-secondary/10 pb-6 sm:flex-row sm:items-center">
            <p class="font-body text-sm text-text-secondary">
                Showing {{ count($packages) }} curated journeys in Nepal
            </p>

            <div class="flex items-center gap-3">
                <label for="package-sort" class="font-body text-xs font-semibold uppercase tracking-wide text-text-secondary">Sort by</label>
                <select
                    id="package-sort"
                    class="rounded-full border border-text-secondary/20 bg-white px-4 py-2 font-body text-sm text-text-primary focus:border-secondary focus:outline-none"
                >
                    <option>Most Popular</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Duration</option>
                </select>
            </div>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($packages as $package)
                <article>
                    <div class="relative aspect-[4/3] overflow-hidden rounded-2xl bg-text-secondary/10">
                        <img
                            src="{{ $package['image'] }}"
                            alt="{{ $package['title'] }}"
                            class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                        >

                        @if ($package['badge'])
                            <span class="absolute left-4 top-4 rounded-full px-3 py-1 font-body text-xs font-semibold uppercase tracking-wide {{ $badgeStyles[$package['badge']] }}">
                                {{ $badgeLabels[$package['badge']] }}
                            </span>
                        @endif
                    </div>

                    <p class="mt-5 font-body text-xs font-semibold uppercase tracking-wide text-text-secondary">
                        {{ $package['duration'] }} &bull; {{ $package['category'] }}
                    </p>
                    <h3 class="mt-2 font-heading text-h5 font-bold text-text-primary">{{ $package['title'] }}</h3>
                    <p class="mt-2 line-clamp-2 font-body text-sm text-text-secondary">{{ $package['description'] }}</p>

                    <div class="mt-4 flex items-center justify-between">
                        <div>
                            <span class="block font-body text-xs text-text-secondary">Starting from</span>
                            <span class="font-heading text-lg font-bold text-text-primary">{{ $package['price'] }}</span>
                        </div>
                        <a href="{{ url('/packages/'.$package['slug']) }}" class="rounded-full bg-primary px-5 py-2.5 font-body text-xs font-semibold uppercase tracking-wide text-white transition-colors hover:bg-primary/90">
                            Details
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-16 flex items-center justify-center gap-2">
            <button type="button" aria-label="Previous page" class="flex h-10 w-10 items-center justify-center rounded-full border border-text-secondary/20 text-text-primary transition-colors hover:border-primary hover:text-primary">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M19 12H5M5 12L11 6M5 12L11 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>

            @foreach ([1, 2, 3, 4] as $page)
                <button
                    type="button"
                    class="flex h-10 w-10 items-center justify-center rounded-full font-body text-sm font-semibold transition-colors {{ $page === 1 ? 'bg-primary text-white' : 'text-text-primary hover:bg-text-secondary/10' }}"
                >
                    {{ $page }}
                </button>
            @endforeach

            <button type="button" aria-label="Next page" class="flex h-10 w-10 items-center justify-center rounded-full border border-text-secondary/20 text-text-primary transition-colors hover:border-primary hover:text-primary">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>
</section>
