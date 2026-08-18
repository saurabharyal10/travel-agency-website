<x-layout :title="($intent === 'book' ? 'Book' : 'Enquire').' - '.$package['title']">
    <x-navbar />

    <section class="bg-background py-16 sm:py-24">
        <div class="mx-auto max-w-2xl px-6 lg:px-8">
            <nav class="font-body text-xs text-text-secondary">
                <a href="{{ url('/') }}" class="hover:text-primary">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ route('packages.show', $package['slug']) }}" class="hover:text-primary">{{ $package['title'] }}</a>
                <span class="mx-2">/</span>
                <span class="text-text-primary">{{ $intent === 'book' ? 'Book Now' : 'Enquire' }}</span>
            </nav>

            <h1 class="mt-4 font-heading text-h3 font-bold text-text-primary sm:text-h2">
                {{ $intent === 'book' ? 'Request to Book' : 'Enquire About' }}: {{ $package['title'] }}
            </h1>
            <p class="mt-2 font-body text-sm text-text-secondary">
                {{ $package['duration'] }} &bull; {{ $package['category'] }} &mdash; fill in your details and our team will get back to you within 24 hours.
            </p>

            @if ($errors->any())
                <div class="mt-6 rounded-2xl border border-primary/20 bg-primary/5 p-4 font-body text-sm text-primary">
                    <ul class="list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('packages.enquire.store', $package['slug']) }}" class="mt-8 space-y-5 rounded-2xl border border-text-secondary/10 bg-white p-6 shadow-sm sm:p-8">
                @csrf

                <div>
                    <label for="name" class="block font-body text-sm font-semibold text-text-primary">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="mt-2 w-full rounded-lg border border-text-secondary/20 px-4 py-2.5 font-body text-sm text-text-primary focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                </div>

                <div>
                    <label for="email" class="block font-body text-sm font-semibold text-text-primary">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="mt-2 w-full rounded-lg border border-text-secondary/20 px-4 py-2.5 font-body text-sm text-text-primary focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                </div>

                <div>
                    <label for="phone" class="block font-body text-sm font-semibold text-text-primary">Phone Number <span class="font-normal text-text-secondary">(optional)</span></label>
                    <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                        class="mt-2 w-full rounded-lg border border-text-secondary/20 px-4 py-2.5 font-body text-sm text-text-primary focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                </div>

                <div>
                    <label for="message" class="block font-body text-sm font-semibold text-text-primary">Message</label>
                    <textarea name="message" id="message" rows="5" required
                        class="mt-2 w-full rounded-lg border border-text-secondary/20 px-4 py-2.5 font-body text-sm text-text-primary focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">{{ old('message', $intent === 'book' ? "I'd like to book the {$package['title']} package. Please let me know the next steps." : "I'd like to know more about the {$package['title']} package.") }}</textarea>
                </div>

                <button type="submit" class="w-full rounded-full bg-primary px-6 py-3 text-center font-body text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-primary/90">
                    {{ $intent === 'book' ? 'Submit Booking Request' : 'Send Enquiry' }}
                </button>
            </form>
        </div>
    </section>

    <x-footer />
</x-layout>
