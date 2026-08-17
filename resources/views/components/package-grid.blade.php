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
        <div class="border-b border-text-secondary/10 pb-6">
            <p class="font-body text-sm text-text-secondary">
                Showing {{ count($packages) }} curated journeys in Nepal
            </p>
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
    </div>
</section>
