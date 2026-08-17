<nav class="relative bg-background">
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

        <!-- Centered nav links -->
        @php
            $navLink = fn (bool $active) => $active
                ? 'font-body text-sm font-medium text-primary'
                : 'font-body text-sm font-medium text-text-primary transition-colors hover:text-primary';
        @endphp
        <ul class="absolute left-1/2 hidden -translate-x-1/2 items-center gap-10 md:flex">
            <li>
                <a href="{{ url('/') }}" class="{{ $navLink(request()->is('/')) }}">Home</a>
            </li>
            <li>
                <a href="{{ url('/packages') }}" class="{{ $navLink(request()->is('packages*')) }}">Packages</a>
            </li>
            <li>
                <a href="{{ url('/about') }}" class="{{ $navLink(request()->is('about*')) }}">About Us</a>
            </li>
            <li>
                <a href="{{ url('/blog') }}" class="{{ $navLink(request()->is('blog*')) }}">Blog</a>
            </li>
        </ul>

        <!-- Actions -->
        <div class="flex shrink-0 items-center gap-4">
            <a href="#" class="rounded-md bg-primary px-6 py-2.5 font-body text-sm font-semibold tracking-wide text-white uppercase transition-colors hover:bg-primary/90">
                Plan My Trip
            </a>
            <button type="button" class="flex h-9 w-9 items-center justify-center rounded-full bg-primary text-white transition-colors hover:bg-primary/90" aria-label="Profile">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" fill="currentColor" />
                    <path d="M4 19.5C4 15.9101 7.58172 13 12 13C16.4183 13 20 15.9101 20 19.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                </svg>
            </button>
        </div>
    </div>
</nav>
