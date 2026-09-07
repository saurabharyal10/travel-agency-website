<footer class="border-t border-text-secondary/10 bg-background">
    <div class="mx-auto max-w-7xl px-6 py-16 lg:px-8">
        <div class="grid grid-cols-2 gap-x-8 gap-y-12 lg:grid-cols-4">
            <div>
                <h3 class="font-body text-sm font-semibold uppercase tracking-wide text-text-primary">Company</h3>
                <p class="mt-4 font-body text-sm text-text-secondary">
                    A journey built around real guides, real communities, and trips across Nepal and beyond.
                </p>
                <ul class="mt-4 space-y-3">
                    <li><a href="{{ url('/about') }}" class="font-body text-sm text-text-secondary transition-colors hover:text-primary">About Our Journey</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-body text-sm font-semibold uppercase tracking-wide text-text-primary">Travel Info</h3>
                <ul class="mt-4 space-y-3">
                    <li><a href="{{ url('/contact') }}" class="font-body text-sm text-text-secondary transition-colors hover:text-primary">Visa Requirements</a></li>
                    <li><a href="{{ url('/contact') }}" class="font-body text-sm text-text-secondary transition-colors hover:text-primary">Insurance &amp; Safety</a></li>
                    <li><a href="{{ url('/contact') }}" class="font-body text-sm text-text-secondary transition-colors hover:text-primary">Common Questions</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-body text-sm font-semibold uppercase tracking-wide text-text-primary">Contact</h3>
                <ul class="mt-4 space-y-3">
                    <li class="flex items-start gap-2">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M12 21C12 21 19 14.6 19 9.5C19 5.35786 15.6421 2 11.5 2C7.35786 2 4 5.35786 4 9.5C4 14.6 12 21 12 21Z" stroke="currentColor" stroke-width="1.8" />
                            <circle cx="11.5" cy="9.5" r="2.5" stroke="currentColor" stroke-width="1.8" />
                        </svg>
                        <span class="font-body text-sm text-text-secondary">Kathmandu, Lazimpat, Nepal</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M4 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L14 13l5 2v4a2 2 0 0 1-2 2C9.163 21 3 14.837 3 7a2 2 0 0 1 1-3Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" />
                        </svg>
                        <span class="font-body text-sm text-text-secondary">+971 58 187 5689</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M4 20L5.6 15.6C4.6 13.9 4 12 4 10C4 5.6 8.4 2 12 2C15.6 2 20 5.6 20 10C20 14.4 15.6 18 12 18C10.4 18 8.9 17.6 7.6 16.9L4 20Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" />
                        </svg>
                        <span class="font-body text-sm text-text-secondary">WhatsApp Us</span>
                    </li>
                    <li>
                        <a href="{{ url('/contact') }}" class="font-body text-sm font-semibold text-primary transition-colors hover:text-primary/80">Send us a message</a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-body text-sm font-semibold uppercase tracking-wide text-text-primary">Follow Us</h3>
                {{-- Placeholder hrefs until real social accounts exist --}}
                <div class="mt-4 flex items-center gap-3">
                    <a href="#" aria-label="Instagram" class="flex h-9 w-9 items-center justify-center rounded-full border border-text-secondary/20 text-text-secondary transition-colors hover:border-primary hover:text-primary">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <rect x="3" y="3" width="18" height="18" rx="5" stroke="currentColor" stroke-width="1.6" />
                            <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.6" />
                            <circle cx="17.2" cy="6.8" r="1" fill="currentColor" />
                        </svg>
                    </a>
                    <a href="#" aria-label="Facebook" class="flex h-9 w-9 items-center justify-center rounded-full border border-text-secondary/20 text-text-secondary transition-colors hover:border-primary hover:text-primary">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M14 9h2.5V5.5H14c-1.93 0-3.5 1.57-3.5 3.5v2H8.5v3.5H10.5V21h3v-6.5h2.5l.5-3.5H13.5V9c0-.55.45-1 1-1Z" fill="currentColor" />
                        </svg>
                    </a>
                    <a href="#" aria-label="YouTube" class="flex h-9 w-9 items-center justify-center rounded-full border border-text-secondary/20 text-text-secondary transition-colors hover:border-primary hover:text-primary">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <rect x="3" y="6" width="18" height="12" rx="3" stroke="currentColor" stroke-width="1.6" />
                            <path d="M10.5 9.5v5l4.5-2.5-4.5-2.5Z" fill="currentColor" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-16 flex justify-center border-t border-text-secondary/10 pt-8">
            <p class="font-body text-xs text-text-secondary">
                &copy; {{ date('Y') }} {{ $settings?->footer_copyright_text ?? 'TRAVEL. All rights reserved.' }} &middot; Crafted by
                <a href="https://saurabh-aryal.com.np" target="_blank" rel="noopener" class="text-text-secondary/70 underline decoration-text-secondary/30 underline-offset-2 transition-colors hover:text-text-secondary hover:decoration-text-secondary">Saurabh Aryal</a>
            </p>
        </div>
    </div>
</footer>
