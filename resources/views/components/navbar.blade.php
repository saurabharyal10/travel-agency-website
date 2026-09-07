@php
    $navLink = fn (bool $active) => $active
        ? 'font-body text-sm font-medium text-primary'
        : 'font-body text-sm font-medium text-text-primary transition-colors hover:text-primary';

    $packagesActive = request()->is('packages*');
    $destinationsActive = request()->is('destinations*');

    // Countries that have at least one destination flagged for the dropdown.
    $destinationCountries = \App\Models\Destination::query()
        ->where('is_featured', true)
        ->whereNotNull('country')
        ->where('country', '!=', '')
        ->distinct()
        ->orderBy('country')
        ->pluck('country');

    $navItems = [
        ['label' => 'Home', 'url' => url('/'), 'active' => request()->is('/')],
        [
            'label' => 'Packages',
            'url' => url('/packages'),
            'active' => $packagesActive,
            'children' => [
                ['label' => 'Trekking Packages', 'url' => url('/packages').'?type=trekking', 'active' => $packagesActive && request('type') === 'trekking'],
                ['label' => 'Travel Packages', 'url' => url('/packages').'?type=travel', 'active' => $packagesActive && request('type') === 'travel'],
            ],
        ],
        [
            'label' => 'Destinations',
            'url' => url('/destinations'),
            'active' => $destinationsActive,
            'children' => $destinationCountries
                ->map(fn (string $country) => [
                    'label' => $country,
                    'url' => url('/destinations').'?country='.urlencode($country),
                    'active' => $destinationsActive && request('country') === $country,
                ])
                ->all(),
        ],
        ['label' => 'About Us', 'url' => url('/about'), 'active' => request()->is('about*')],
        ['label' => 'Blog', 'url' => url('/blog'), 'active' => request()->is('blog*')],
    ];
@endphp

<nav class="relative z-30 bg-background" data-mobile-nav>
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6 lg:px-8">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex shrink-0 items-center gap-2">
            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-primary">
                <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M3 17L9 8L13 14L16 10L21 17H3Z" fill="currentColor" />
                </svg>
            </span>
            <span class="font-heading text-xl font-bold tracking-wide text-text-primary">{{ config('app.brand_name') }}</span>
        </a>

        <!-- Centered nav links (desktop) -->
        <ul class="absolute left-1/2 hidden -translate-x-1/2 items-center gap-10 md:flex">
            @foreach ($navItems as $item)
                @if (! empty($item['children']))
                    <li class="group relative">
                        <a href="{{ $item['url'] }}" class="{{ $navLink($item['active']) }} inline-flex items-center gap-1">
                            {{ $item['label'] }}
                            <svg class="h-3.5 w-3.5 transition-transform duration-150 group-hover:rotate-180" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <div class="invisible absolute left-1/2 top-full z-20 -translate-x-1/2 translate-y-1 pt-3 opacity-0 transition-all duration-150 group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100 group-hover:visible group-hover:translate-y-0 group-hover:opacity-100">
                            <ul class="max-h-[70vh] min-w-[13rem] overflow-y-auto rounded-xl border border-text-secondary/10 bg-background p-2 shadow-lg shadow-text-primary/5">
                                @foreach ($item['children'] as $child)
                                    <li>
                                        <a
                                            href="{{ $child['url'] }}"
                                            @class([
                                                'block rounded-lg px-3 py-2 font-body text-sm transition-colors',
                                                'text-primary' => $child['active'],
                                                'text-text-primary hover:bg-primary/5 hover:text-primary' => ! $child['active'],
                                            ])
                                        >{{ $child['label'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @else
                    <li>
                        <a href="{{ $item['url'] }}" class="{{ $navLink($item['active']) }}">{{ $item['label'] }}</a>
                    </li>
                @endif
            @endforeach
        </ul>

        <!-- Actions -->
        <div class="flex shrink-0 items-center gap-4">
            <a href="{{ url('/packages') }}" class="hidden rounded-md bg-primary px-6 py-2.5 font-body text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-primary/90 sm:inline-block">
                Plan My Trip
            </a>

            <!-- Hamburger (mobile) -->
            <button
                type="button"
                data-mobile-menu-button
                aria-controls="mobile-menu"
                aria-expanded="false"
                aria-label="Open menu"
                class="flex h-9 w-9 items-center justify-center rounded-md text-text-primary transition-colors hover:text-primary md:hidden"
            >
                <svg data-menu-icon-open class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                </svg>
                <svg data-menu-icon-close class="hidden h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile menu panel -->
    <div id="mobile-menu" data-mobile-menu hidden class="border-t border-text-secondary/10 bg-background md:hidden">
        <ul class="mx-auto flex max-w-7xl flex-col gap-1 px-6 py-4">
            @foreach ($navItems as $item)
                <li>
                    <a
                        href="{{ $item['url'] }}"
                        @class([
                            'block rounded-md px-3 py-3 font-body text-base font-medium transition-colors',
                            'text-primary' => $item['active'],
                            'text-text-primary hover:bg-primary/5 hover:text-primary' => ! $item['active'],
                        ])
                    >{{ $item['label'] }}</a>

                    @if (! empty($item['children']))
                        <ul class="mb-1 ml-3 border-l border-text-secondary/10 pl-3">
                            @foreach ($item['children'] as $child)
                                <li>
                                    <a
                                        href="{{ $child['url'] }}"
                                        @class([
                                            'block rounded-md px-3 py-2 font-body text-sm transition-colors',
                                            'text-primary' => $child['active'],
                                            'text-text-primary hover:bg-primary/5 hover:text-primary' => ! $child['active'],
                                        ])
                                    >{{ $child['label'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
            <li class="mt-2">
                <a href="{{ url('/packages') }}" class="block rounded-md bg-primary px-3 py-3 text-center font-body text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-primary/90">
                    Plan My Trip
                </a>
            </li>
        </ul>
    </div>
</nav>
