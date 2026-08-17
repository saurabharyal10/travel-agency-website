<section class="relative flex h-[420px] w-full items-end overflow-hidden">
    <img
        src="{{ $package['image'] }}"
        alt="{{ $package['title'] }}"
        class="absolute inset-0 -z-10 h-full w-full object-cover"
    >
    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-black/85 via-black/30 to-black/10"></div>

    <div class="relative z-10 mx-auto w-full max-w-7xl px-6 pb-12 lg:px-8">
        <nav class="font-body text-xs text-white/70">
            <a href="{{ url('/') }}" class="hover:text-white">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ url('/packages') }}" class="hover:text-white">Packages</a>
            <span class="mx-2">/</span>
            <span class="text-white">{{ $package['title'] }}</span>
        </nav>

        <p class="mt-4 font-body text-xs font-semibold uppercase tracking-wide text-white/80">
            {{ $package['duration'] }} &bull; {{ $package['category'] }}
        </p>
        <h1 class="mt-2 font-heading text-h2 font-bold text-white sm:text-h1">{{ $package['title'] }}</h1>
    </div>
</section>
