@php
    $stories = [
        [
            'title' => 'The Ten Essentials Every Himalayan Trekker Packs',
            'excerpt' => 'From GPS units to headlamps, the gear our guides never leave base camp without.',
            'category' => 'Gear Guide',
            'meta' => 'Sep 12, 2025 &bull; 5 Min Read',
            'image' => 'all_stories_1.png',
            'featured' => false,
        ],
        [
            'title' => 'Prayer Wheels and Patience: A Morning in Bhutan',
            'excerpt' => 'Inside the quiet rituals of a Bhutanese dzong, where every turn of the wheel carries a wish.',
            'category' => 'Culture',
            'meta' => 'Sep 3, 2025 &bull; 6 Min Read',
            'image' => 'all_stories_2.png',
            'featured' => false,
        ],
        [
            'title' => 'Above the Valley: Pokhara at First Light',
            'excerpt' => 'How a terraced hillside above the Kathmandu valley became our favorite sunrise viewpoint.',
            'category' => 'Featured',
            'meta' => 'Aug 27, 2025 &bull; 4 Min Read',
            'image' => 'all_stories_3.png',
            'featured' => true,
        ],
    ];
@endphp

<section class="bg-background py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <h2 class="font-heading text-h3 font-bold text-text-primary sm:text-h2">Latest Stories</h2>
                <p class="mt-3 max-w-md font-body text-sm text-text-secondary">
                    Field notes, trail guides, and dispatches from the people who call these mountains home.
                </p>
            </div>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($stories as $story)
                <article>
                    <div class="relative aspect-[4/5] overflow-hidden rounded-2xl bg-text-secondary/10">
                        <img
                            src="{{ asset('images/blog_page/'.$story['image']) }}"
                            alt="{{ $story['title'] }}"
                            class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                        >

                        @if ($story['featured'])
                            <span class="absolute left-4 top-4 rounded-full bg-primary px-3 py-1 font-body text-xs font-semibold uppercase tracking-wide text-white">
                                Featured
                            </span>
                        @else
                            <span class="absolute left-4 top-4 rounded-full bg-white px-3 py-1 font-body text-xs font-semibold uppercase tracking-wide text-text-primary">
                                {{ $story['category'] }}
                            </span>
                        @endif
                    </div>

                    <p class="mt-5 font-body text-xs font-semibold uppercase tracking-wide text-text-secondary">
                        {!! $story['meta'] !!}
                    </p>
                    <h3 class="mt-2 font-heading text-h5 font-bold text-text-primary">{{ $story['title'] }}</h3>
                    <p class="mt-2 line-clamp-2 font-body text-sm text-text-secondary">{{ $story['excerpt'] }}</p>

                    <a href="#" class="mt-3 inline-flex items-center gap-1.5 font-body text-sm font-semibold uppercase tracking-wide text-primary transition-colors hover:text-primary/80">
                        Read More
                        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>
