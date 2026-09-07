import './bootstrap';

// Mobile navigation toggle (no framework — the public site loads no Alpine).
function initMobileNav() {
    const nav = document.querySelector('[data-mobile-nav]');
    if (!nav) return;

    const button = nav.querySelector('[data-mobile-menu-button]');
    const menu = nav.querySelector('[data-mobile-menu]');
    const iconOpen = nav.querySelector('[data-menu-icon-open]');
    const iconClose = nav.querySelector('[data-menu-icon-close]');
    if (!button || !menu) return;

    const setOpen = (open) => {
        menu.hidden = !open;
        button.setAttribute('aria-expanded', open ? 'true' : 'false');
        button.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
        iconOpen?.classList.toggle('hidden', open);
        iconClose?.classList.toggle('hidden', !open);
    };

    button.addEventListener('click', () => setOpen(menu.hidden));

    // Close when a link is tapped.
    menu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => setOpen(false));
    });

    // Close on Escape.
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !menu.hidden) setOpen(false);
    });

    // Reset when resizing up to the desktop breakpoint (md = 768px).
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768 && !menu.hidden) setOpen(false);
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMobileNav);
} else {
    initMobileNav();
}
