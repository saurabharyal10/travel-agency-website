<div class="grid grid-cols-1 gap-10 sm:grid-cols-2">
    <div>
        <h2 class="font-heading text-h5 font-bold text-text-primary">What's Included</h2>
        <ul class="mt-4 space-y-2.5">
            @foreach ($package['inclusions'] as $item)
                <li class="flex items-start gap-2.5">
                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-secondary" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M5 13L9.5 17.5L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="font-body text-sm text-text-primary">{{ $item }}</span>
                </li>
            @endforeach
        </ul>
    </div>

    <div>
        <h2 class="font-heading text-h5 font-bold text-text-primary">What's Not Included</h2>
        <ul class="mt-4 space-y-2.5">
            @foreach ($package['exclusions'] as $item)
                <li class="flex items-start gap-2.5">
                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-text-secondary/60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M6 6L18 18M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="font-body text-sm text-text-primary">{{ $item }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
