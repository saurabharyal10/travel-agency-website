<div>
    <h2 class="font-heading text-h4 font-bold text-text-primary">Gallery</h2>

    <div class="mt-6 grid grid-cols-2 gap-3 sm:grid-cols-4">
        @foreach ($package['gallery'] as $photo)
            <div class="aspect-square overflow-hidden rounded-xl bg-text-secondary/10">
                <img
                    src="{{ $photo }}"
                    alt="{{ $package['title'] }} gallery photo"
                    class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                >
            </div>
        @endforeach
    </div>
</div>
