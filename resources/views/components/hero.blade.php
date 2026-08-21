@php
    $activities = \App\Models\Package::where('is_active', true)
        ->whereNotNull('category')
        ->distinct()
        ->orderBy('category')
        ->pluck('category');

    $destinationNames = \App\Models\Destination::orderBy('name')->pluck('name');
@endphp

<section class="relative isolate flex min-h-[95vh] w-full items-end overflow-hidden">
    <img
        src="https://images.unsplash.com/photo-1544735716-392fe2489ffa?q=80&w=2400&auto=format&fit=crop"
        alt="Himalayan mountain range at sunrise"
        class="absolute inset-0 -z-10 h-full w-full object-cover"
    >
    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-black/85 via-black/35 to-black/10"></div>

    <div class="relative z-10 mx-auto w-full max-w-7xl px-6 pb-20 pt-40 lg:px-8">
        <p class="font-body text-sm font-semibold uppercase tracking-[0.25em] text-white/90">
            Your Journey Begins Here
        </p>

        <h1 class="mt-4 max-w-3xl font-heading text-4xl font-bold leading-tight text-white sm:text-5xl md:text-6xl">
            Explore Nepal &amp; Beyond with Unforgettable Travel Experiences
        </h1>

        <!-- Search bar -->
        <form method="GET" action="{{ url('/packages') }}" class="mt-10 flex w-full max-w-4xl flex-col gap-1 rounded-3xl bg-white p-2 shadow-xl sm:flex-row sm:items-center sm:rounded-full sm:gap-0">
            <!-- Destination -->
            <div class="flex flex-1 items-center gap-3 rounded-full px-5 py-3">
                <svg class="h-5 w-5 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M12 21C12 21 19 14.6 19 9.5C19 5.35786 15.6421 2 11.5 2C7.35786 2 4 5.35786 4 9.5C4 14.6 12 21 12 21Z" stroke="currentColor" stroke-width="1.8" />
                    <circle cx="11.5" cy="9.5" r="2.5" stroke="currentColor" stroke-width="1.8" />
                </svg>
                <div class="flex-1 text-left">
                    <label for="hero-destination" class="block font-body text-xs font-semibold uppercase tracking-wide text-text-primary">Destination</label>
                    <input
                        type="text"
                        id="hero-destination"
                        name="destination"
                        value="{{ request('destination') }}"
                        placeholder="Where to?"
                        list="hero-destination-options"
                        class="block w-full border-0 p-0 font-body text-sm text-text-secondary placeholder:text-text-secondary focus:outline-none focus:ring-0"
                    >
                    <datalist id="hero-destination-options">
                        @foreach ($destinationNames as $name)
                            <option value="{{ $name }}"></option>
                        @endforeach
                    </datalist>
                </div>
            </div>

            <div class="hidden h-8 w-px shrink-0 bg-text-secondary/15 sm:block"></div>

            <!-- Activity -->
            <div class="flex flex-1 items-center gap-3 rounded-full px-5 py-3">
                <svg class="h-5 w-5 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M13.5 5.5C14.6046 5.5 15.5 4.60457 15.5 3.5C15.5 2.39543 14.6046 1.5 13.5 1.5C12.3954 1.5 11.5 2.39543 11.5 3.5C11.5 4.60457 12.3954 5.5 13.5 5.5Z" fill="currentColor" />
                    <path d="M6 22L9 15L11.5 17L14 22M9 15L11 10L15 9M11 10L8.5 6.5L4 8M15 9L18 12L22 11" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex-1 text-left">
                    <label for="hero-activity" class="block font-body text-xs font-semibold uppercase tracking-wide text-text-primary">Activity</label>
                    <select
                        id="hero-activity"
                        name="activity"
                        class="block w-full border-0 bg-transparent p-0 font-body text-sm text-text-secondary focus:outline-none focus:ring-0"
                    >
                        <option value="">Any Activity</option>
                        @foreach ($activities as $activity)
                            <option value="{{ $activity }}" @selected(request('activity') === $activity)>{{ $activity }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="hidden h-8 w-px shrink-0 bg-text-secondary/15 sm:block"></div>

            <!-- When -->
            <div class="flex flex-1 items-center gap-3 rounded-full px-5 py-3">
                <svg class="h-5 w-5 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.8" />
                    <path d="M3 9.5H21" stroke="currentColor" stroke-width="1.8" />
                    <path d="M8 3V6.5M16 3V6.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                </svg>
                <div class="flex-1 text-left">
                    <label for="hero-when" class="block font-body text-xs font-semibold uppercase tracking-wide text-text-primary">When</label>
                    <input
                        type="text"
                        id="hero-when"
                        name="when"
                        value="{{ request('when') }}"
                        placeholder="e.g. Mar–May"
                        class="block w-full border-0 p-0 font-body text-sm text-text-secondary placeholder:text-text-secondary focus:outline-none focus:ring-0"
                    >
                </div>
            </div>

            <button type="submit" class="mt-1 flex shrink-0 items-center justify-center gap-2 rounded-full bg-primary px-8 py-4 font-body text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-primary/90 sm:mt-0">
                Find Journeys
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </form>
    </div>
</section>
