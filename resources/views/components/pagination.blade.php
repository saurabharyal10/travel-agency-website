@props(['paginator'])

@if ($paginator->hasPages())
    <nav class="mt-12 flex items-center justify-center gap-2" aria-label="Pagination">
        @if ($paginator->onFirstPage())
            <span class="rounded-full px-4 py-2 font-body text-xs font-semibold uppercase tracking-wide text-text-secondary/40">
                Prev
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="rounded-full px-4 py-2 font-body text-xs font-semibold uppercase tracking-wide text-text-secondary transition-colors hover:text-primary">
                Prev
            </a>
        @endif

        <div class="flex items-center gap-1">
            @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
                @if ($page === $paginator->currentPage())
                    <span class="flex h-9 w-9 items-center justify-center rounded-full bg-primary font-body text-xs font-semibold text-white">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}" class="flex h-9 w-9 items-center justify-center rounded-full font-body text-xs font-semibold text-text-secondary transition-colors hover:bg-primary/10 hover:text-primary">
                        {{ $page }}
                    </a>
                @endif
            @endforeach
        </div>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="rounded-full px-4 py-2 font-body text-xs font-semibold uppercase tracking-wide text-text-secondary transition-colors hover:text-primary">
                Next
            </a>
        @else
            <span class="rounded-full px-4 py-2 font-body text-xs font-semibold uppercase tracking-wide text-text-secondary/40">
                Next
            </span>
        @endif
    </nav>
@endif
