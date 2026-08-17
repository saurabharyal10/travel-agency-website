<x-layout title="Theme Test">
    <x-navbar />

    <div class="min-h-screen bg-background p-10">
        <h1 class="text-primary">Discover Your Next Journey</h1>
        <p class="font-body text-text-secondary mt-4 max-w-xl">
            This is body text set in Inter, the typeface used throughout the site for
            paragraphs, labels, and general content. It should read as a clean,
            neutral sans-serif alongside the Playfair Display headings above.
        </p>

        <div class="mt-10 flex flex-wrap gap-4">
            <div class="bg-primary text-white rounded-lg px-6 py-4 w-48">
                <p class="font-body text-sm">primary</p>
                <p class="font-body text-sm">#D91E18</p>
            </div>
            <div class="bg-secondary text-white rounded-lg px-6 py-4 w-48">
                <p class="font-body text-sm">secondary</p>
                <p class="font-body text-sm">#10542C</p>
            </div>
            <div class="bg-white border border-text-secondary/20 text-text-primary rounded-lg px-6 py-4 w-48">
                <p class="font-body text-sm">text-primary</p>
                <p class="font-body text-sm">#161C22</p>
            </div>
            <div class="bg-white border border-text-secondary/20 text-text-secondary rounded-lg px-6 py-4 w-48">
                <p class="font-body text-sm">text-secondary</p>
                <p class="font-body text-sm">#5D3F3B</p>
            </div>
        </div>

        <div class="mt-10 space-y-2">
            <h2>Heading 2 &mdash; 40px Playfair Display</h2>
            <h3>Heading 3 &mdash; 32px Playfair Display</h3>
            <h4>Heading 4 &mdash; 28px Playfair Display</h4>
            <h5>Heading 5 &mdash; 24px Playfair Display</h5>
            <h6>Heading 6 &mdash; 20px Playfair Display</h6>
        </div>
    </div>
</x-layout>
