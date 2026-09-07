<x-layout :title="$page->title.' — TRAVEL.'">
    <x-navbar />

    <section class="border-b border-text-secondary/10 bg-background">
        <div class="mx-auto max-w-3xl px-6 py-12 sm:py-16 lg:px-8">
            <nav class="font-body text-xs text-text-secondary">
                <a href="{{ url('/') }}" class="hover:text-primary">Home</a>
                <span class="mx-2">/</span>
                <span class="font-body text-xs font-semibold uppercase tracking-wide text-text-secondary">Travel Info</span>
                <span class="mx-2">/</span>
                <span class="text-text-primary">{{ $page->title }}</span>
            </nav>

            <h1 class="mt-4 font-heading text-h2 font-bold leading-tight text-text-primary sm:text-h1">
                {{ $page->title }}
            </h1>
        </div>
    </section>

    <section class="bg-background py-12 sm:py-16">
        <div class="mx-auto max-w-3xl px-6 lg:px-8">
            @if ($page->content)
                <div class="
                    font-body text-base leading-relaxed text-text-primary
                    [&_h2]:mt-10 [&_h2]:font-heading [&_h2]:text-h4 [&_h2]:font-bold [&_h2]:text-text-primary
                    [&_h3]:mt-8 [&_h3]:font-heading [&_h3]:text-h5 [&_h3]:font-bold [&_h3]:text-text-primary
                    [&_p]:mt-5 [&_p]:leading-relaxed
                    [&_ul]:mt-5 [&_ul]:list-disc [&_ul]:space-y-2 [&_ul]:pl-6
                    [&_ol]:mt-5 [&_ol]:list-decimal [&_ol]:space-y-2 [&_ol]:pl-6
                    [&_a]:text-primary [&_a]:underline [&_a]:underline-offset-2
                    [&_strong]:font-semibold
                    [&_blockquote]:mt-5 [&_blockquote]:border-l-4 [&_blockquote]:border-primary [&_blockquote]:pl-4 [&_blockquote]:italic [&_blockquote]:text-text-secondary
                ">
                    {!! $page->content !!}
                </div>
            @endif

            <div class="mt-12 border-t border-text-secondary/10 pt-8">
                <p class="font-body text-sm text-text-secondary">
                    Still have a question we haven't covered?
                    <a href="{{ url('/contact') }}" class="font-semibold text-primary underline underline-offset-2 hover:text-primary/80">Get in touch</a>
                    and we'll help.
                </p>
            </div>
        </div>
    </section>

    <x-footer />
</x-layout>
