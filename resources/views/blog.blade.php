<x-layout title="Blog">
    <x-navbar />
    <x-blog-hero :post="$featuredPost" />
    <x-blog-stories :stories="$stories" />
    <x-blog-featured />
    <x-blog-archive :archive="$archive" />
    <x-blog-cta />
    <x-footer />
</x-layout>
