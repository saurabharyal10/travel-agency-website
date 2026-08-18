<x-layout title="Contact Us">
    <x-navbar />

    <section class="bg-background py-16 sm:py-24">
        <div class="mx-auto max-w-2xl px-6 lg:px-8">
            <nav class="font-body text-xs text-text-secondary">
                <a href="{{ url('/') }}" class="hover:text-primary">Home</a>
                <span class="mx-2">/</span>
                <span class="text-text-primary">Contact</span>
            </nav>

            <h1 class="mt-4 font-heading text-h3 font-bold text-text-primary sm:text-h2">Get in Touch</h1>
            <p class="mt-2 font-body text-sm text-text-secondary">
                Have a question about a trip, a booking, or anything else? Send us a message and our team will get back to you within 24 hours.
            </p>

            @if (session('contact_sent'))
                <div class="mt-6 rounded-2xl border border-secondary/20 bg-secondary/5 p-4 font-body text-sm text-secondary">
                    Thanks! Your message has been sent — we'll be in touch within 24 hours.
                </div>
            @endif

            @if ($errors->any())
                <div class="mt-6 rounded-2xl border border-primary/20 bg-primary/5 p-4 font-body text-sm text-primary">
                    <ul class="list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}" class="mt-8 space-y-5 rounded-2xl border border-text-secondary/10 bg-white p-6 shadow-sm sm:p-8">
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
                    <label for="subject" class="block font-body text-sm font-semibold text-text-primary">Subject <span class="font-normal text-text-secondary">(optional)</span></label>
                    <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                        class="mt-2 w-full rounded-lg border border-text-secondary/20 px-4 py-2.5 font-body text-sm text-text-primary focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                </div>

                <div>
                    <label for="message" class="block font-body text-sm font-semibold text-text-primary">Message</label>
                    <textarea name="message" id="message" rows="5" required
                        class="mt-2 w-full rounded-lg border border-text-secondary/20 px-4 py-2.5 font-body text-sm text-text-primary focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="w-full rounded-full bg-primary px-6 py-3 text-center font-body text-sm font-semibold uppercase tracking-wide text-white transition-colors hover:bg-primary/90">
                    Send Message
                </button>
            </form>
        </div>
    </section>

    <x-footer />
</x-layout>
