@php
    // The four trekking regions spotlighted on the homepage. Which four is an
    // editorial choice (kept here as a slug list), but everything the cards
    // show - name, link target, tagline, photo - is pulled live from the
    // matching Destination record. An admin edit to a destination's slug,
    // name, tagline or image flows straight through to these cards and keeps
    // the "browse packages by destination" link correct with no code change.
    $featuredSlugs = ['mustang', 'pokhara', 'everest-solu-khumbu', 'manaslu'];

    $regions = \App\Models\Destination::whereIn('slug', $featuredSlugs)
        ->get()
        ->sortBy(fn ($destination) => array_search($destination->slug, $featuredSlugs))
        ->values();
@endphp

@if ($regions->isNotEmpty())
    <section class="bg-background py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-6 text-center lg:px-8">
            <h2 class="font-heading text-h3 font-bold text-primary sm:text-h2">The Regions</h2>
            <p class="mt-2 font-body text-sm text-text-secondary">Unexplored Corners</p>
        </div>

        <div class="mx-auto mt-12 grid max-w-7xl grid-cols-1 gap-6 px-6 sm:grid-cols-2 lg:px-8">
            @foreach ($regions as $region)
                <a href="{{ url('/packages?destination='.$region->slug) }}" class="group relative block aspect-[4/3] overflow-hidden rounded-2xl bg-text-secondary/10">
                    @if ($region->image_url)
                        <img
                            src="{{ $region->image_url }}"
                            alt="{{ $region->name }}"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>

                        <div class="absolute bottom-6 left-6">
                            <h3 class="font-heading text-h4 font-bold text-white">{{ $region->name }}</h3>
                            @if ($region->tagline)
                                <p class="mt-1 font-body text-xs font-semibold uppercase tracking-wide text-white/80">{{ $region->tagline }}</p>
                            @endif
                        </div>
                    @else
                        <div class="flex h-full w-full flex-col items-center justify-center gap-2 border-2 border-dashed border-text-secondary/20">
                            <span class="font-body text-xs font-semibold uppercase tracking-wide text-text-secondary/60">Photo pending</span>
                            <h3 class="font-heading text-h4 font-bold text-text-primary">{{ $region->name }}</h3>
                        </div>
                    @endif
                </a>
            @endforeach
        </div>
    </section>
@endif
