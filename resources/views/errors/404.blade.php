<x-layout title="Page Not Found — TRAVEL.">
    <x-navbar />

    <section class="flex min-h-[60vh] items-center bg-background py-20 sm:py-28">
        <div class="mx-auto w-full max-w-2xl px-6 text-center lg:px-8">
            <p class="font-heading text-6xl font-bold text-primary sm:text-7xl">404</p>

            <h1 class="mt-4 font-heading text-h3 font-bold text-text-primary sm:text-h2">
                This trail doesn't lead anywhere
            </h1>

            <p class="mt-4 font-body text-sm text-text-secondary sm:text-base">
                The page you're looking for has moved or never existed. Let's get you back on the map.
            </p>

            <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                <a href="{{ url('/') }}" class="rounded-md bg-primary px-8 py-3.5 font-body text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-primary/90">
                    Back to Home
                </a>
                <a href="{{ url('/packages') }}" class="rounded-md border border-text-secondary/20 px-8 py-3.5 font-body text-sm font-semibold uppercase tracking-wide text-text-primary transition-colors hover:border-primary hover:text-primary">
                    Browse Journeys
                </a>
            </div>
        </div>
    </section>

    <x-footer />
</x-layout>
