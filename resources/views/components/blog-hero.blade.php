@props(['post' => null])

<section class="relative flex h-[550px] w-full items-end overflow-hidden">
    <img
        src="{{ $post?->image_url ?? asset('images/blog_page/hero-section_Image.png') }}"
        alt="{{ $post?->title ?? 'Misty mountain ridge at sunrise' }}"
        class="absolute inset-0 -z-10 h-full w-full object-cover"
    >
    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-black/90 via-black/40 to-black/10"></div>

    <div class="relative z-10 mx-auto w-full max-w-7xl px-6 pb-16 lg:px-8">
        @if ($post)
            <span class="rounded-full bg-primary px-3 py-1 font-body text-xs font-semibold uppercase tracking-wide text-white">
                Featured Story
            </span>

            <h1 class="mt-5 max-w-3xl font-heading text-h2 font-bold leading-tight text-white sm:text-h1">
                {{ $post->title }}
            </h1>

            <p class="mt-4 max-w-xl font-body text-sm text-white/80 sm:text-base">
                {{ $post->excerpt }}
            </p>

            <div class="mt-6 flex items-center gap-6">
                <a href="{{ route('blog.show', $post->slug) }}" class="rounded-md bg-primary px-8 py-3.5 font-body text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-primary/90">
                    Read Article
                </a>
                <span class="font-body text-xs font-semibold uppercase tracking-wide text-white/60">
                    {{ $post->published_at->format('M j, Y') }}
                    @if ($post->read_minutes)
                        &bull; {{ $post->read_minutes }} Min Read
                    @endif
                </span>
            </div>
        @else
            <h1 class="mt-5 max-w-3xl font-heading text-h2 font-bold leading-tight text-white sm:text-h1">
                New dispatches are on their way
            </h1>

            <p class="mt-4 max-w-xl font-body text-sm text-white/80 sm:text-base">
                Check back soon for field notes, trail guides, and stories from the mountains.
            </p>
        @endif
    </div>
</section>
