<div>
    <h2 class="font-heading text-h4 font-bold text-text-primary">Trip Highlights</h2>
    <p class="mt-3 font-body text-sm text-text-secondary">{{ $package['description'] }}</p>

    <ul class="mt-6 grid grid-cols-1 gap-3 sm:grid-cols-2">
        @foreach ($package['highlights'] as $highlight)
            <li class="flex items-start gap-2.5">
                <svg class="mt-0.5 h-4 w-4 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M5 13L9.5 17.5L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="font-body text-sm text-text-primary">{{ $highlight }}</span>
            </li>
        @endforeach
    </ul>
</div>
