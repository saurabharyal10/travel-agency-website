<x-layout :title="$package['title'].' - Packages'">
    <x-navbar />
    <x-package-detail-hero :package="$package" />
    <x-package-detail-body :package="$package" />
    <x-footer />
</x-layout>
