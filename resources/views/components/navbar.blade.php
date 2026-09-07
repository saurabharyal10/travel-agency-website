@php
    $navLink = fn (bool $active) => $active
        ? 'font-body text-sm font-medium text-primary'
        : 'font-body text-sm font-medium text-text-primary transition-colors hover:text-primary';

    $navItems = [
        ['label' => 'Home', 'url' => url('/'), 'active' => request()->is('/')],
        ['label' => 'Packages', 'url' => url('/packages'), 'active' => request()->is('packages*')],
        ['label' => 'Destinations', 'url' => url('/destinations'), 'active' => request()->is('destinations*')],
        ['label' => 'About Us', 'url' => url('/about'), 'active' => request()->is('about*')],
        ['label' => 'Blog', 'url' => url('/blog'), 'active' => request()->is('blog*')],
    ];
@endphp

<nav class="relative bg-background" data-mobile-nav>
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6 lg:px-8">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex shrink-0 items-center gap-2">
            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-primary">
                <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M3 17L9 8L13 14L16 10L21 17H3Z" fill="currentColor" />
                </svg>
            </span>
            <span class="font-heading text-xl font-bold tracking-wide text-text-primary">TRAVEL.</span>
        </a>

        <!-- Centered nav links (desktop) -->
        <ul class="absolute left-1/2 hidden -translate-x-1/2 items-center gap-10 md:flex">
            @foreach ($navItems as $item)
                <li>
                    <a href="{{ $item['url'] }}" class="{{ $navLink($item['active']) }}">{{ $item['label'] }}</a>
                </li>
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
