@props(['destinations'])

<section class="bg-background pb-24 sm:pb-28">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="border-b border-text-secondary/10 pb-6 pt-16">
            <p class="font-body text-sm text-text-secondary">
                Showing {{ $destinations->total() }} destinations
            </p>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($destinations as $destination)
                <article>
                    <div class="relative aspect-[4/3] overflow-hidden rounded-2xl bg-text-secondary/10">
                        @if ($destination->image_url)
                            <img
                                src="{{ $destination->image_url }}"
                                alt="{{ $destination->name }}"
                                class="h-full w-full object-cover"
                            >
                        @else
                            <div class="flex h-full w-full items-center justify-center border-2 border-dashed border-text-secondary/20">
                                <span class="font-body text-xs font-semibold uppercase tracking-wide text-text-secondary/60">No photo yet</span>
                            </div>
                        @endif
                    </div>

                    <h3 class="mt-5 font-heading text-h5 font-bold text-text-primary">{{ $destination->name }}</h3>

                    @if ($destination->tagline)
                        <p class="mt-1 font-body text-xs font-semibold uppercase tracking-wide text-text-secondary">{{ $destination->tagline }}</p>
                    @endif

                    @if ($destination->description)
                        <p class="mt-2 line-clamp-2 font-body text-sm text-text-secondary">{{ $destination->description }}</p>
                    @endif

                    @if ($destination->packages_count > 0)
                        <a href="{{ url('/packages?destination='.$destination->slug) }}" class="mt-3 inline-block font-body text-xs font-semibold uppercase tracking-wide text-primary hover:text-primary/80">
                            {{ $destination->packages_count }} {{ Str::plural('package', $destination->packages_count) }} available
                        </a>
                    @endif
                </article>
            @empty
                <p class="font-body text-sm text-text-secondary">No destinations have been added yet. Check back soon.</p>
            @endforelse
        </div>

        <x-pagination :paginator="$destinations" />
    </div>
</section>
