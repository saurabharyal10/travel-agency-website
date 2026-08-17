<section class="bg-background py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-3">
            <div class="space-y-14 lg:col-span-2">
                <x-package-detail-highlights :package="$package" />
                <x-package-detail-itinerary :package="$package" />
                <x-package-detail-gallery :package="$package" />
                <x-package-detail-inclusions :package="$package" />
            </div>

            <div>
                <x-package-detail-sidebar :package="$package" />
            </div>
        </div>
    </div>
</section>
