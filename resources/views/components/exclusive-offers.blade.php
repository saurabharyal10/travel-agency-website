@php
    $offers = \App\Models\SiteSetting::current()->exclusiveOfferPackages();
@endphp

@if ($offers->isNotEmpty())
    <section class="bg-background pt-20 sm:pt-28">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="flex flex-col items-start justify-between gap-6 sm:flex-row sm:items-end">
                <div>
                    <span class="inline-flex items-center rounded-full bg-primary/10 px-3 py-1 font-body text-xs font-semibold uppercase tracking-wide text-primary">
                        Exclusive Offers
                    </span>
                    <h2 class="mt-3 font-heading text-h3 font-bold text-text-primary sm:text-h2">Hand-Picked This Season</h2>
                    <p class="mt-3 max-w-md font-body text-sm text-text-secondary">
                        A short list of trips we're especially proud of right now — limited departures, personally arranged.
                    </p>
                </div>
            </div>

            <div class="mt-12 grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($offers as $offer)
                    <article>
                        <div class="relative aspect-[4/5] overflow-hidden rounded-2xl bg-text-secondary/10">
                            <img
                                src="{{ $offer->image_url }}"
                                alt="{{ $offer->title }}"
                                class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                            >

                            <span class="absolute left-4 top-4 rounded-full bg-primary px-3 py-1 font-body text-xs font-semibold uppercase tracking-wide text-white">
                                Exclusive
                            </span>

                            <span class="absolute right-4 top-4 rounded-full bg-white px-3 py-1 font-body text-xs font-semibold text-text-primary">
                                From {{ $offer->formatted_price }}
                            </span>

                            <span class="absolute bottom-4 left-4 rounded-full bg-black/60 px-3 py-1 font-body text-xs font-semibold uppercase tracking-wide text-white">
                                {{ $offer->duration }}
                            </span>
                        </div>

                        <h3 class="mt-5 font-heading text-h5 font-bold text-text-primary">{{ $offer->title }}</h3>
                        <p class="mt-2 line-clamp-1 font-body text-sm text-text-secondary">{{ $offer->description }}</p>

                        <a href="{{ route('packages.show', $offer->slug) }}" class="mt-3 inline-flex items-center gap-1.5 font-body text-sm font-semibold uppercase tracking-wide text-primary transition-colors hover:text-primary/80">
                            View Journey
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif
