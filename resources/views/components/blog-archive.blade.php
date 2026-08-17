@php
    $archive = [
        [
            'title' => 'Prayer Flags at 18,000 Feet: Reaching Kala Patthar',
            'excerpt' => 'The final push above Gorak Shep, where the Khumbu unfolds beneath a wall of prayer flags.',
            'category' => 'Trail Notes',
            'meta' => 'Jun 14, 2025 &bull; 7 Min Read',
            'image' => 'archieve_stories_1.png',
        ],
        [
            'title' => 'The Guides Who Call Everest Home',
            'excerpt' => 'A portrait series on the Sherpa mountaineers whose knowledge keeps every expedition safe.',
            'category' => 'People',
            'meta' => 'May 30, 2025 &bull; 6 Min Read',
            'image' => 'archieve_stories_2.png',
        ],
    ];
@endphp

<section class="bg-background py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <h2 class="font-heading text-h3 font-bold text-text-primary sm:text-h2">From The Archive</h2>
        <p class="mt-3 max-w-md font-body text-sm text-text-secondary">
            Older dispatches worth revisiting, hand-picked from the journal.
        </p>

        <div class="mt-12 grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2">
            @foreach ($archive as $story)
                <article class="group">
                    <div class="relative aspect-[3/2] overflow-hidden rounded-2xl bg-text-secondary/10">
                        <img
                            src="{{ asset('images/blog_page/'.$story['image']) }}"
                            alt="{{ $story['title'] }}"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        >
                        <span class="absolute left-4 top-4 rounded-full bg-white px-3 py-1 font-body text-xs font-semibold uppercase tracking-wide text-text-primary">
                            {{ $story['category'] }}
                        </span>
                    </div>

                    <p class="mt-5 font-body text-xs font-semibold uppercase tracking-wide text-text-secondary">
                        {!! $story['meta'] !!}
                    </p>
                    <h3 class="mt-2 font-heading text-h5 font-bold text-text-primary">{{ $story['title'] }}</h3>
                    <p class="mt-2 font-body text-sm text-text-secondary">{{ $story['excerpt'] }}</p>

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
