# Travel Agency Website — Project Status & Roadmap

> Last updated: covers everything through the homepage + core pages build, plus Task 1 of admin portal customization (panel path rename). Drop this in your repo root as `PROJECT_STATUS.md` and update it as you go — treat it as the single source of truth alongside `PROJECT_SPEC.md`.

---

## 1. Project Overview

**Client:** Nepal-based travel agency (business name not yet finalized — candidates included `diotravels.com`)
**Deadline:** 1 month from project kickoff
**Model:** Lead-generation (enquiry-based booking, no online payment/checkout)
**Designer:** Friend collaborating via Figma — [figma.com/design/7ZgnrRNGOduwJdzskamxvx/Travel](https://www.figma.com/design/7ZgnrRNGOduwJdzskamxvx/Travel)

---

## 2. Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 12.66 (PHP 8.2.12 — deliberately not Laravel 13, which needs PHP 8.3+) |
| Admin/CMS | Filament v3.3.54 |
| Frontend | Blade + Livewire 3.8.4 + Alpine.js + Tailwind CSS |
| Database | MySQL (MariaDB 10.4.32 via XAMPP locally) |
| Dev environment | Windows, XAMPP (PHP/MySQL), Composer 2.10.2, Node v24.19.0, VS Code + Claude Code CLI |
| Local project path | `E:\-- OnGoing Projects --\Travel_website` |
| Version control | [github.com/saurabharyal10/travel-agency-website](https://github.com/saurabharyal10/travel-agency-website) |
| Planned hosting | Cloudways (DigitalOcean-backed) |
| Planned domain registrar | Cloudflare Registrar |

---

## 3. Design Tokens (locked, confirmed from Figma)

```
Colors:
  primary:        #D91E18
  secondary:      #10542C
  text-primary:   #161C22
  text-secondary: #5D3F3B
  background:     #FDFCF8

Fonts:
  heading: 'Playfair Display', serif
  body:    'Inter', sans-serif

Font sizes:
  h1: 48px   h2: 40px   h3: 32px
  h4: 28px   h5: 24px   h6: 20px
```
All configured in `tailwind.config.js` as named theme values. Google Fonts loaded via preconnect in the main layout.

---

## 4. What's Been Built (public-facing site)

### Homepage (`/`)
Fully built and verified against Figma, section by section:
1. Navbar — logo badge, wordmark, nav links, "Plan My Trip" button, profile icon
2. Hero — mountain background, search bar (Destination/Activity/When), "Find Journeys" CTA
3. Curated Expeditions — 3 package cards, real Figma-exported images
4. Why Journey With Us — dark green band, guide portrait, 4-icon feature grid
5. The Regions — 2×2 image grid (Mustang, Pokhara, Solu Khumbu, Manaslu)
6. The Travel Post / Instagram — newsletter signup + 6-image Instagram grid
7. Explore Our Routes — map CTA band with adjusted overlay transparency
8. Footer — 4 columns (Company/Travel Info/Contact/Follow Us) + copyright bar

**Known minor gaps:** Instagram images are CSS-cropped from full post screenshots (not clean photo-only exports) — acceptable for now, could be improved later with cleaner Figma exports.

### Packages Listing (`/packages`)
- Banner: "EXPLORE THE HEIGHTS" / "Our Curated Journeys" (verified exact copy via Figma Dev Mode)
- Filter/sort bar, 3×2 card grid (badge, image, duration/category, title, description, price, Details button)
- Fake pagination and non-functional Sort By dropdown **removed** (were misleading UI with only 6 packages existing)
- 3 of 6 packages have placeholder images (Everest Base Camp, Annapurna Circuit, Langtang Valley) — intentionally left as-is since real package list/content is still pending client confirmation

### Package Detail (`/packages/{slug}`)
- Hero image, breadcrumb, category/duration/title
- Trip Highlights, Itinerary (day-by-day), Gallery, Inclusions/Exclusions (two-column checklist)
- Sticky sidebar: price, duration, category, "Book Now" / "Enquire" buttons
- 404 handling for unknown slugs
- Data lives in one shared file: `resources/data/packages.php`, used by both listing and detail routes
- **"Book Now" / "Enquire" buttons are currently placeholder links** — not yet wired to a real form/backend

### About (`/about`)
- Hero: "Since 2005" overline (corrected from an earlier "Since 2026" inconsistency), heading, body, "Explore Our Impact" / "Watch The Film" CTAs
- Our Story section with stats row (150+ Local Guides, 12k+ Trees Planted, 25+ Remote Schools)
- Our Values ("Built On Principles") — 4 value cards
- CTA banner: "Ready To Write Your Own Chapter?" / "Join us for a journey that goes beyond the summit. Discover the heart of the Himalayas." / "Begin Your Journey" button — **exact copy confirmed from Figma**

### Blog (`/blog`)
- 5 components: blog-hero, blog-stories, blog-featured, blog-archive, blog-cta
- Structure matches Figma (hero, "Latest Stories" grid, "The Himalayan Post" spotlight card, "From The Archive" section, closing CTA)
- **Card excerpt/meta text (dates, read times, author names, category tags) is placeholder copy** — could not be read from Figma's fine print, needs a real content pass before launch
- **All "Read More" / "Read Article" / "Explore Stories" links are placeholders** — individual blog post detail pages not yet built

### Filament Admin CMS (`/control_admin`, renamed from `/admin`)
**Correction (2026-08-17):** this section previously claimed Packages, Destinations, Enquiries, BlogPosts, Testimonials, TeamMembers, and SiteSettings resources already existed from the initial scaffold. That was inaccurate — `app/Filament/` did not exist before this session, and `app/Models/` only had `User.php`. The panel was a bare login with no resources. Packages content still lives only in the static `resources/data/packages.php` file, not the database.
- Only resource that actually exists: `ContactMessage` (built this session, see Task 2 below)

---

## 5. Known Open Items (not yet fixed)

- [ ] Footer contact number inconsistency: user provided `+971 58 187 5689` (UAE country code) but Figma's own footer design shows a `+977` (Nepal) placeholder — **needs client clarification on the real number**
- [ ] Blog card copy (dates, authors, excerpts) is placeholder — needs real content
- [ ] Individual blog post detail pages not built
- [ ] Package "Book Now" / "Enquire" buttons not wired to a real backend flow
- [ ] 3 of 6 packages using placeholder images/content pending client's final package list
- [ ] Instagram section images are cropped screenshots, not clean exports (cosmetic, low priority)

---

## 6. NEXT PHASE: Admin Portal Customization

### Key decision
**We are extending the existing Filament admin panel, not building a separate custom admin system from scratch.** Filament was chosen at project start specifically to avoid hand-building an admin dashboard — a parallel custom admin (e.g. styled like a generic "Material Dashboard" template) would duplicate existing work and slow the project down for no real benefit. Filament already provides: authenticated login, sidebar navigation, full CRUD, and a widget system for dashboard stats — everything needed.

### Planned changes

| # | Task | Status | Detail |
|---|---|---|---|
| 1 | Rename admin URL | ✅ Done | `/admin` → `/control_admin` via `->path('control_admin')` in `AdminPanelProvider.php`. Panel `id()` left as `admin` (internal only, not part of the URL) so existing `filament.admin.*` named routes are unaffected. Verified: old `/admin` now 404s, new `/control_admin` redirects to `/control_admin/login` (200, no console errors), caches cleared (`route:clear`, `config:clear`, `view:clear`, `filament:cache-components`) |
| 2 | New: Contact Messages resource | ✅ Done | `ContactMessage` model + migration (name, email, subject nullable, message, is_read boolean default false, timestamps) + `ContactMessageResource` (form + table with search/sort/read-status filter). Verified full CRUD (create, list, edit/toggle read, bulk delete) live in the panel |
| 3 | Build remaining resources | Not started (scope correction) | Packages, Destinations, Enquiries, BlogPosts, Testimonials, TeamMembers, SiteSettings do not exist yet — these need to be built from scratch, not "reviewed." Packages in particular needs a decision on whether to migrate off the static `resources/data/packages.php` file into the database |
| 4 | Dashboard widgets | Not started | Custom stat-card widgets: total active packages, new enquiries this week, new contact messages this week, total published blog posts |
| 5 | Custom brand theming | Not started | Apply site's color tokens (#D91E18 primary / #10542C secondary) and fonts to the Filament panel UI itself, so admin area feels cohesive with the public site rather than generic Filament styling |
| 6 | Admin Users (if needed) | Not started — needs client input | Manage staff/client login accounts to the panel, if client wants their own team members with access. **Do not build this speculatively — confirm with client first whether they want multiple admin accounts/roles at all before designing it.** |

### Execution order (planned)
1. ✅ Rename panel path (quick, low-risk, do first) — done
2. ✅ Build Contact Messages resource — done
3. Build remaining resources (Packages, Destinations, Enquiries, BlogPosts, Testimonials, TeamMembers, SiteSettings) — none exist yet, see correction above
4. Apply custom brand theming
5. Build dashboard widgets last (they depend on other modules' data to be meaningful)

---

## 7. Other Remaining Work (beyond admin portal)

- [ ] Individual blog post detail pages
- [ ] Real Enquiry/Contact form wiring (frontend forms → Filament CMS backend)
- [ ] Real package content once client confirms final package list
- [ ] Real footer contact info (pending client clarification)
- [ ] Domain purchase (pending client confirming business name)
- [ ] Cloudways hosting setup + deployment
- [ ] Security hardening: rate limiting on forms, Cloudflare Turnstile, forced HTTPS, 2FA on admin login
- [ ] Performance/Lighthouse pass, cross-browser/device testing
- [ ] Client CMS training + handover documentation

---

## 8. Working Notes / Lessons From This Build

- **Figma access:** There is no Figma MCP connection available — only the Chrome browser extension, used to open the Figma file directly and read design data via screenshots/zoom. It has been unreliable across sessions (dropped connections, canvas clicks landing on the wrong layer, occasional frozen tabs) — **time-box any single verification attempt to 2-3 tries**; if it's not working, fall back to asking the user to paste exact copy/values rather than looping or guessing.
- **Image workflow:** Images are manually exported from Figma by the user (select layer(s) → Export panel → PNG at 2-3x) and dropped into `public/images/` subfolders (e.g. `packages/`, `regions/`, `instagram/`, `blog_page/`). Claude Code identifies/renames and wires them in.
- **Commit cadence:** Commit and push happens at the end of a work session or major milestone, not after every small fix — this is a deliberate user preference, not an oversight.
- **Verification approach:** Claude Code has demonstrated it can open a real Chrome browser instance itself, render the live site, and visually compare it against the Figma reference screenshot — this is how navbar, hero, and other sections were pixel-verified against the design.
