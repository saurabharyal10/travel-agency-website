@if ($package->faqs->isNotEmpty())
    <div>
        <h2 class="font-heading text-h4 font-bold text-text-primary">Frequently Asked Questions</h2>

        <div class="mt-6 divide-y divide-text-secondary/10 rounded-2xl border border-text-secondary/10 bg-white">
            @foreach ($package->faqs as $faq)
                <details class="group p-5">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 font-body text-sm font-semibold text-text-primary marker:content-none">
                        {{ $faq->question }}
                        <svg class="h-4 w-4 shrink-0 text-primary transition-transform duration-200 group-open:rotate-45" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </summary>
                    <p class="mt-3 font-body text-sm leading-relaxed text-text-secondary">{{ $faq->answer }}</p>
                </details>
            @endforeach
        </div>
    </div>
@endif
