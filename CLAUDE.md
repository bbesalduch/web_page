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
    ├── rooms/                     # Room detail pages
    └── images/rooms/              # Room photography
```

## Tech Stack

- **PHP 7.0+** (WordPress theme)
- **HTML5/CSS3/Vanilla JavaScript** (no jQuery)
- **Fonts:** Cormorant Garamond (headings) + Montserrat (body)
- **Design:** Dark theme with gold accents (#0a0a0a, #c9a962)

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

## Color Palette

- Primary Black: `#0a0a0a`
- Dark Background: `#1a1a1a`
- Accent Gold: `#c9a962`
- Light Gold: `#d4bc7c`
- Text Gray: `#888888`

## Important Notes

1. **Language:** All user-facing text is Spanish
2. **Security:** Theme sanitizes/escapes all data - maintain this
3. **Accessibility:** Preserve ARIA labels and keyboard navigation
4. **Performance:** Google Fonts preconnected, images lazy-loaded, JS in footer

## Git Info

- **Main Branch:** `claude/find-fix-bug-mkn2v2ji2v6szn1f-I2Z9c`
- **Repository:** https://github.com/bbesalduch/web_page.git
