<section class="relative isolate flex h-[420px] w-full items-end overflow-hidden bg-text-primary">
    @if ($post->image_url)
        <img
            src="{{ $post->image_url }}"
            alt="{{ $post->title }}"
            class="absolute inset-0 -z-10 h-full w-full object-cover"
        >
    @endif
    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-black/85 via-black/30 to-black/10"></div>

    <div class="relative z-10 mx-auto w-full max-w-3xl px-6 pb-12 lg:px-8">
        <nav class="font-body text-xs text-white/70">
            <a href="{{ url('/') }}" class="hover:text-white">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ url('/blog') }}" class="hover:text-white">Blog</a>
            <span class="mx-2">/</span>
            <span class="text-white">{{ $post->title }}</span>
        </nav>

        <p class="mt-4 flex items-center gap-2 font-body text-xs font-semibold uppercase tracking-wide text-white/80">
            @if ($post->category)
                <span class="rounded-full bg-primary px-3 py-1 text-white">{{ $post->category }}</span>
            @endif
            <span>{{ $post->published_at->format('M j, Y') }}</span>
            @if ($post->read_minutes)
                <span>&bull; {{ $post->read_minutes }} Min Read</span>
            @endif
        </p>
        <h1 class="mt-4 font-heading text-h2 font-bold leading-tight text-white sm:text-h1">{{ $post->title }}</h1>
    </div>
</section>
