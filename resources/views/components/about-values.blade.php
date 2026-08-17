@php
    $values = [
        [
            'icon' => 'guide',
            'title' => 'Expert Guides',
            'description' => 'Our team consists of IFMGA certified professionals with decades of high-altitude experience.',
        ],
        [
            'icon' => 'leaf',
            'title' => 'Responsible Travel',
            'description' => 'Every itinerary is carbon-offset and supports a local community micro-enterprise.',
        ],
        [
            'icon' => 'support',
            'title' => '24/7 Support',
            'description' => "Safety is our priority. Our mountain logistics team is on call around the clock.",
        ],
        [
            'icon' => 'comfort',
            'title' => 'Curated Comfort',
            'description' => 'We source the finest boutique lodges and luxury campsites in the most remote valleys.',
        ],
    ];
@endphp

<section class="bg-[#F2F0E9] py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-6 text-center lg:px-8">
        <h2 class="font-heading text-h3 font-bold text-text-primary">Built On Principles</h2>
        <div class="mx-auto mt-4 h-0.5 w-16 bg-primary"></div>

        <div class="mt-14 grid grid-cols-1 gap-8 text-left sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($values as $value)
                <div class="rounded-2xl bg-background p-6">
                    <span class="flex h-12 w-12 items-center justify-center rounded-full bg-primary/10 text-primary">
                        @switch($value['icon'])
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

                    <h3 class="mt-5 font-heading text-h6 font-bold text-text-primary">{{ $value['title'] }}</h3>
                    <p class="mt-2 font-body text-sm text-text-secondary">{{ $value['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
