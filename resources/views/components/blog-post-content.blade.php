<section class="bg-background py-16 sm:py-20">
    <div class="mx-auto max-w-3xl px-6 lg:px-8">
        <p class="font-body text-lg text-text-secondary sm:text-xl">
            {{ $post->excerpt }}
        </p>

        @if ($post->content)
            <div class="
                mt-8 font-body text-base leading-relaxed text-text-primary
                [&_h2]:mt-10 [&_h2]:font-heading [&_h2]:text-h4 [&_h2]:font-bold [&_h2]:text-text-primary
                [&_h3]:mt-8 [&_h3]:font-heading [&_h3]:text-h5 [&_h3]:font-bold [&_h3]:text-text-primary
                [&_p]:mt-5 [&_p]:leading-relaxed
                [&_ul]:mt-5 [&_ul]:list-disc [&_ul]:space-y-2 [&_ul]:pl-6
                [&_ol]:mt-5 [&_ol]:list-decimal [&_ol]:space-y-2 [&_ol]:pl-6
                [&_a]:text-primary [&_a]:underline [&_a]:underline-offset-2
                [&_strong]:font-semibold
                [&_blockquote]:mt-5 [&_blockquote]:border-l-4 [&_blockquote]:border-primary [&_blockquote]:pl-4 [&_blockquote]:italic [&_blockquote]:text-text-secondary
                [&_img]:mt-6 [&_img]:rounded-2xl
            ">
                {!! $post->content !!}
            </div>
        @endif

        <div class="mt-12 border-t border-text-secondary/10 pt-8">
            <a href="{{ url('/blog') }}" class="inline-flex items-center gap-1.5 font-body text-sm font-semibold uppercase tracking-wide text-primary transition-colors hover:text-primary/80">
                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M19 12H5M5 12L11 6M5 12L11 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Back to Blog
            </a>
        </div>
    </div>
</section>
