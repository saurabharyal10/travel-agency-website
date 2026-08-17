@php
    $stats = [
        ['value' => '150+', 'label' => 'Local Guides'],
        ['value' => '12k+', 'label' => 'Trees Planted'],
        ['value' => '25+', 'label' => 'Remote Schools'],
    ];
@endphp

<section class="bg-background py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-16">
            <div class="overflow-hidden rounded-2xl">
                <img
                    src="{{ asset('images/our_story_img.png') }}"
                    alt="Himalayan Heritage guide with local community"
                    class="h-full w-full object-cover"
                >
            </div>

            <div>
                <h2 class="font-heading text-h3 font-bold text-text-primary">Our Story</h2>

                <p class="mt-5 font-body text-sm text-text-secondary sm:text-base">
                    Himalayan Heritage began with a simple belief: that travel should leave a place better than it found it. What started as a handful of guided treks through the Annapurna foothills has grown into a network of local guides, homestays, and community partners across Nepal.
                </p>
                <p class="mt-4 font-body text-sm text-text-secondary sm:text-base">
                    Every itinerary we build is rooted in that same principle — real connection with the mountains and the people who call them home, without compromising on comfort, safety, or care.
                </p>

                <div class="mt-8 grid grid-cols-3 gap-6 border-t border-text-secondary/10 pt-8">
                    @foreach ($stats as $stat)
                        <div>
                            <span class="block font-heading text-h4 font-bold text-primary">{{ $stat['value'] }}</span>
                            <span class="mt-1 block font-body text-xs font-semibold uppercase tracking-wide text-text-secondary">{{ $stat['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
