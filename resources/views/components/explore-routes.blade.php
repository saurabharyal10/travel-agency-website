<section class="relative overflow-hidden bg-secondary py-24 sm:py-32">
    <img
        src="{{ asset('images/map-explore-routes.png') }}"
        alt=""
        class="absolute inset-0 h-full w-full object-cover"
        aria-hidden="true"
    >
    <div class="absolute inset-0 bg-secondary/55"></div>

    <div class="relative mx-auto max-w-2xl px-6 text-center lg:px-8">
        <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-full border border-white/40 text-white">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M12 21C12 21 19 14.6 19 9.5C19 5.35786 15.6421 2 11.5 2C7.35786 2 4 5.35786 4 9.5C4 14.6 12 21 12 21Z" stroke="currentColor" stroke-width="1.8" />
                <circle cx="11.5" cy="9.5" r="2.5" stroke="currentColor" stroke-width="1.8" />
            </svg>
        </span>

        <h2 class="mt-6 font-heading text-h3 font-bold text-white sm:text-h2">Explore Our Routes</h2>
        <p class="mt-3 font-body text-sm text-white/80 sm:text-base">
            Interactive maps of every major trail across Nepal, Bhutan, and Tibet.
        </p>

        <a href="{{ url('/packages') }}" class="mt-8 inline-block rounded-full border border-white px-8 py-3 font-body text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-white hover:text-secondary">
            Open Map Explorer
        </a>
    </div>
</section>
