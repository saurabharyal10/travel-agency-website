@php
    $badgeStyles = [
        'featured' => 'bg-primary text-white',
        'best_price' => 'bg-secondary text-white',
        'sold_out' => 'bg-text-primary/80 text-white',
    ];

    $badgeLabels = [
        'featured' => 'Featured',
        'best_price' => 'Best Price',
        'sold_out' => 'Sold Out',
    ];

    $isSoldOut = $package['badge'] === 'sold_out';
@endphp

<div class="sticky top-8 rounded-2xl border border-text-secondary/10 bg-white p-6 shadow-sm">
    @if ($package['badge'])
        <span class="inline-block rounded-full px-3 py-1 font-body text-xs font-semibold uppercase tracking-wide {{ $badgeStyles[$package['badge']] }}">
            {{ $badgeLabels[$package['badge']] }}
        </span>
    @endif

    <div class="mt-4">
        <span class="block font-body text-xs text-text-secondary">Starting from</span>
        <span class="font-heading text-3xl font-bold text-text-primary">{{ $package['price'] }}</span>
        <span class="font-body text-sm text-text-secondary"> / person</span>
    </div>

    <dl class="mt-6 space-y-3 border-t border-text-secondary/10 pt-6">
        <div class="flex items-center justify-between">
            <dt class="font-body text-sm text-text-secondary">Duration</dt>
            <dd class="font-body text-sm font-semibold text-text-primary">{{ $package['duration'] }}</dd>
        </div>
        <div class="flex items-center justify-between">
            <dt class="font-body text-sm text-text-secondary">Category</dt>
            <dd class="font-body text-sm font-semibold text-text-primary">{{ $package['category'] }}</dd>
        </div>
    </dl>

    @if ($isSoldOut)
        <button type="button" disabled class="mt-6 w-full cursor-not-allowed rounded-full bg-text-secondary/20 px-6 py-3 font-body text-sm font-semibold uppercase tracking-wide text-text-secondary">
            Sold Out
        </button>
    @else
        <a href="#" class="mt-6 block w-full rounded-full bg-primary px-6 py-3 text-center font-body text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-primary/90">
            Book Now
        </a>
    @endif

    <a href="#" class="mt-3 block w-full rounded-full border border-text-secondary/20 px-6 py-3 text-center font-body text-sm font-semibold uppercase tracking-wide text-text-primary transition-colors hover:border-primary hover:text-primary">
        Enquire
    </a>
</div>
