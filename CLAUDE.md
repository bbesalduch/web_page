# CLAUDE.md - Hotel Can Quetglas Web Project

## Project Overview

**Type:** WordPress Theme + Static HTML Preview
**Name:** Hotel Can Quetglas
**Purpose:** Boutique hotel website for a modernist palace in Palma de Mallorca, Spain

Dual-structure project:
- `canquetglas/` - Production WordPress theme
- `preview/` - Static HTML preview/mockup version

## Directory Structure

```
├── canquetglas/                    # WordPress Theme
│   ├── assets/js/main.js          # Frontend JavaScript
│   ├── page-templates/            # Custom page templates
│   ├── functions.php              # Theme initialization
│   ├── style.css                  # Main stylesheet
│   └── single-room.php            # Room detail template
│
└── preview/                        # Static HTML Preview
    ├── index.html                 # Homepage
    ├── contact.html               # Contact page
    ├── hotel.html                 # About the hotel (with image slider)
    ├── location.html              # Location & surroundings
    ├── wellness.html              # Wellness & spa
    ├── breakfast.html             # Breakfast page (buffet & à la carte)
    ├── snackbar.html              # Snack bar / pool bar page
    ├── cookie-policy.html         # Cookie policy page
    ├── rooms/                     # Room detail pages
    │   ├── deluxe.html
    │   ├── deluxe-premium.html
    │   ├── deluxe-terrace.html
    │   ├── standard-terrace.html
    │   └── suite.html
    ├── js/
    │   ├── chatbot.js             # AI chatbot (Google Gemini)
    │   ├── booking-popup.js       # Booking modal functionality
    │   └── cookies.js             # Cookie consent management
    ├── images/                    # Site images
    │   ├── rooms/                 # Room photography
    │   ├── hotel/                 # Hotel page images (facade, salon, pool)
    │   ├── breakfast/             # Breakfast page images
    │   └── snackbar/              # Snack bar page images
    └── videos/                    # Video content (hero, amenities)
```

## Tech Stack

- **PHP 7.0+** (WordPress theme)
- **HTML5/CSS3/Vanilla JavaScript** (no jQuery)
- **Fonts:** Cormorant Garamond (headings) + Montserrat (body)
- **Design:** Light cream theme with brown accents (modernist boutique style)

## Custom Post Types

- **Rooms (habitaciones):** Hotel rooms with meta fields (size, capacity, bed type, price, features)
- **Gallery (galería):** Photo gallery with category filtering

## Development Commands

```bash
# WordPress setup - copy theme to wp-content/themes/
cp -r canquetglas /path/to/wordpress/wp-content/themes/

# Preview static version
open preview/index.html
```

## Code Conventions

### PHP
- Sanitize inputs: `sanitize_text_field()`, `sanitize_email()`
- Escape outputs: `esc_html()`, `esc_url()`, `esc_attr()`
- Text domain: `'canquetglas'` for all localization
- Nonce verification for AJAX requests

### JavaScript
- IIFE pattern with strict mode
- `addEventListener()` with passive listeners
- ARIA labels for accessibility

### CSS
- CSS variables in `:root` for colors/spacing
- Mobile-first responsive design
- Semantic class naming

## Key Files

| File | Purpose |
|------|---------|
| `functions.php` | Theme setup, custom post types, AJAX handlers |
| `style.css` | All styles including responsive breakpoints |
| `assets/js/main.js` | Navigation, gallery, forms, animations |
| `front-page.php` | Homepage template |
| `single-room.php` | Individual room display |

### Preview JavaScript Files

| File | Purpose |
|------|---------|
| `js/chatbot.js` | AI-powered chatbot using Google Gemini API |
| `js/booking-popup.js` | Modal for room booking integration |
| `js/cookies.js` | GDPR cookie consent banner and management |

## Color Palette

- Cream Background: `#f7f3ed`
- Cream Dark: `#ebe5db`
- White: `#ffffff`
- Black (text): `#1a1a1a`
- Dark: `#2d2d2d`
- Gray: `#6b6b6b`
- Gray Light: `#9a9a9a`
- Accent Brown: `#8b7355`
- Accent Light: `#a08b6f`

## API Integrations

### Google Gemini Chatbot
- **API:** Google Generative AI (Gemini 2.0 Flash)
- **File:** `preview/js/chatbot.js`
- **Features:**
  - Floating chat widget on all pages
  - Hotel-specific knowledge base
  - Multilingual support (Spanish primary)
  - Conversation history within session

### Booking Integration
- **File:** `preview/js/booking-popup.js`
- **Purpose:** Modal popup for room reservations

## Important Notes

1. **Language:** All user-facing text is Spanish
2. **Security:** Theme sanitizes/escapes all data - maintain this
3. **Accessibility:** Preserve ARIA labels and keyboard navigation
4. **Performance:** Google Fonts preconnected, images lazy-loaded, JS in footer
5. **GDPR Compliance:** Cookie consent required before tracking (see `cookies.js`)
6. **API Keys:** Chatbot API key is embedded in `chatbot.js` - consider environment variables for production

## Git Info

- **Repository:** https://github.com/bbesalduch/web_page.git
- **Primary Branch:** `main` (or `master`)

## UI Components

### Side Menu (Mobile Navigation)
- Consistent across all pages (index.html is the reference)
- Uses `transform: translateX()` animation
- Structure: `<ul class="side-menu-nav">` directly (not wrapped in div)
- Close button uses SVG icon, not `&times;`
- Submenus use `max-height` transition for smooth animation

### Header
- Fixed position with blur backdrop on scroll
- Centered logo
- Language dropdown on desktop
- Hamburger menu toggle for mobile

## Recent Features

- **AI Chatbot:** Google Gemini-powered assistant for guest inquiries
- **Booking Popup:** Modal for room reservations
- **Cookie Consent:** GDPR-compliant cookie banner
- **Video Content:** Hero videos for homepage and amenities sections
- **Consistent Side Menu:** Unified navigation across all pages
- **Breakfast Page:** Dedicated page for breakfast services (buffet & à la carte)
- **Snack Bar Page:** Pool bar menu and tapas offerings
- **Hotel Page Slider:** Professional photography slider with optimized images
- **Multi-language Support:** EN, ES, DE, SV translations on all pages

## Image Optimization

Images are optimized using ImageMagick for web performance:
- **Hero/Slider images:** 1920x1080px, 85% quality
- **Feature images:** 900x700px, 85% quality
- **Full-height images:** Maintain aspect ratio, max 800px width

Optimized hotel images stored in `images/hotel/`:
- `slider-1-tiles.jpg` - Modernist Art Nouveau tiles
- `slider-2-salon.jpg` - Historic salon with fireplace
- `slider-3-terrace.jpg` - Mediterranean terrace
- `slider-4-poolside.jpg` - Pool area with loungers
- `fachada-full.jpg` - Full facade view (vertical)
- `salon-optimized.jpg` - Salon for heritage section
