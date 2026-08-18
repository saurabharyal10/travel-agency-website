<x-layout :title="$post->title.' - Blog'">
    <x-navbar />
    <x-blog-post-hero :post="$post" />
    <x-blog-post-content :post="$post" />
    <x-footer />
</x-layout>
