@php
    $instagramPosts = collect([1, 2, 3, 4])
        ->map(fn ($i) => "images/instagram/{$i}.png")
        ->filter(fn ($path) => file_exists(public_path($path)));
@endphp

<section class="bg-background py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-16 lg:grid-cols-2">
            <div>
                <h2 class="font-heading text-h3 font-bold text-text-primary sm:text-h2">The Travel Post</h2>
                <p class="mt-4 max-w-md font-body text-sm text-text-secondary">
                    Stories from the trail, cultural insights, and early access to our seasonal departures.
                </p>

                <form class="mt-8 flex max-w-md flex-col gap-3 sm:flex-row">
                    <label for="newsletter-email" class="sr-only">Email address</label>
                    <input
                        id="newsletter-email"
                        type="email"
                        placeholder="Your email address"
                        class="w-full rounded-full border border-text-secondary/20 bg-white px-5 py-3 font-body text-sm text-text-primary placeholder:text-text-secondary/60 focus:border-secondary focus:outline-none"
                    >
                    <button type="submit" class="shrink-0 rounded-full bg-secondary px-6 py-3 font-body text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-secondary/90">
                        Subscribe
                    </button>
                </form>
            </div>

            <div>
                <div class="flex items-baseline justify-between">
                    <span class="font-body text-xs font-semibold uppercase tracking-wide text-text-secondary">On Instagram</span>
                    <a href="#" class="font-body text-sm font-semibold text-primary">@travel</a>
                </div>

                <div class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-4">
                    @foreach ($instagramPosts as $post)
                        <div class="aspect-[3/2] overflow-hidden rounded-xl bg-text-secondary/10">
                            <img
                                src="{{ asset($post) }}"
                                alt="Instagram post"
                                class="h-full w-full object-cover object-top transition-transform duration-500 hover:scale-105"
                            >
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
