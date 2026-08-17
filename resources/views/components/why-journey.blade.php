@php
    $features = [
        [
            'icon' => 'guide',
            'title' => 'Expert Guides',
            'description' => 'Certified locals with decades of mountain wisdom and safety training.',
        ],
        [
            'icon' => 'leaf',
            'title' => 'Responsible Travel',
            'description' => 'Carbon-neutral expeditions that give back to remote mountain communities.',
        ],
        [
            'icon' => 'support',
            'title' => '24/7 Support',
            'description' => 'Constant communication and backup via satellite across all routes.',
        ],
        [
            'icon' => 'comfort',
            'title' => 'Curated Comfort',
            'description' => 'The best available lodges and luxury base camps at every altitude.',
        ],
    ];
@endphp

<section class="bg-secondary py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="grid grid-cols-1 items-center gap-16 lg:grid-cols-2">
            <div class="relative mx-auto aspect-square w-full max-w-md">
                <img
                    src="{{ asset('images/why-journey-guide.png') }}"
                    alt="Himalayan Heritage trekking guide"
                    class="h-full w-full rounded-3xl object-cover shadow-xl"
                >
            </div>

            <div>
                <h2 class="font-heading text-h3 font-bold text-white sm:text-h2">Why Journey With Us?</h2>
                <p class="mt-4 max-w-lg font-body text-white/70">
                    We don't just organize trips, we foster connections between people, cultures, and the earth. Our heritage is rooted in these mountains.
                </p>

                <div class="mt-10 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2">
                    @foreach ($features as $feature)
                        <div>
                            <span class="flex h-11 w-11 items-center justify-center rounded-full bg-white/10 text-white">
                                @switch($feature['icon'])
                                    @case('guide')
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path d="M3 20L9 8L13 15L16 10L21 20H3Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
                                        </svg>
                                        @break
                                    @case('leaf')
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path d="M5 19C5 19 4 12 9 8C14 4 20 4 20 4C20 4 20 10 16 14C12 18 5 19 5 19Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
                                            <path d="M5 19C5 19 7 15 11 12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                        </svg>
                                        @break
                                    @case('support')
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path d="M4 13C4 8.02944 8.02944 4 13 4C17.9706 4 22 8.02944 22 13V16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                            <rect x="2" y="13" width="5" height="7" rx="1.5" stroke="currentColor" stroke-width="1.8" />
                                            <rect x="17" y="13" width="5" height="7" rx="1.5" stroke="currentColor" stroke-width="1.8" />
                                            <path d="M19 20C19 21.1046 18.1046 22 17 22H14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                        </svg>
                                        @break
                                    @case('comfort')
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path d="M3 19V7C3 6.44772 3.44772 6 4 6H12C12.5523 6 13 6.44772 13 7V13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M3 13H20C20.5523 13 21 13.4477 21 14V19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M3 19H21M6 19V16.5C6 15.9477 6.44772 15.5 7 15.5H9C9.55228 15.5 10 15.9477 10 16.5V19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        @break
                                @endswitch
                            </span>
                            <h3 class="mt-4 font-heading text-h6 font-bold text-white">{{ $feature['title'] }}</h3>
                            <p class="mt-1.5 font-body text-sm text-white/70">{{ $feature['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
