@php
    $regions = [
        [
            'name' => 'Mustang',
            'tagline' => 'Ancient Kingdom, Untouched',
            'image' => 'images/regions/mustang.png',
        ],
        [
            'name' => 'Pokhara',
            'tagline' => 'Gateway to Annapurna',
            'image' => 'images/regions/pokhara.png',
        ],
        [
            'name' => 'Solu Khumbu',
            'tagline' => 'Home of Legends',
            'image' => 'images/regions/solu-khumbu.png',
        ],
        [
            'name' => 'Manaslu',
            'tagline' => 'Off the Beaten Path',
            'image' => 'images/regions/manaslu.png',
        ],
    ];
@endphp

<section class="bg-background py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-6 text-center lg:px-8">
        <h2 class="font-heading text-h3 font-bold text-primary sm:text-h2">The Regions</h2>
        <p class="mt-2 font-body text-sm text-text-secondary">Unexplored Corners</p>
    </div>

    <div class="mx-auto mt-12 grid max-w-7xl grid-cols-1 gap-6 px-6 sm:grid-cols-2 lg:px-8">
        @foreach ($regions as $region)
            <a href="#" class="group relative block aspect-[4/3] overflow-hidden rounded-2xl bg-text-secondary/10">
                @if (file_exists(public_path($region['image'])))
                    <img
                        src="{{ asset($region['image']) }}"
                        alt="{{ $region['name'] }}"
                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>

                    <div class="absolute bottom-6 left-6">
                        <h3 class="font-heading text-h4 font-bold text-white">{{ $region['name'] }}</h3>
                        <p class="mt-1 font-body text-xs font-semibold uppercase tracking-wide text-white/80">{{ $region['tagline'] }}</p>
                    </div>
                @else
                    <div class="flex h-full w-full flex-col items-center justify-center gap-2 border-2 border-dashed border-text-secondary/20">
                        <span class="font-body text-xs font-semibold uppercase tracking-wide text-text-secondary/60">Photo pending re-export</span>
                        <h3 class="font-heading text-h4 font-bold text-text-primary">{{ $region['name'] }}</h3>
                    </div>
                @endif
            </a>
        @endforeach
    </div>
</section>
