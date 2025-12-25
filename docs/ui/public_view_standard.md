# Public View Standard

## Reference pages used
- `app/Controllers/Home::index()` renders `themes/public/home` through `renderTheme()` with `layout => 'public'`, `pageName`, and `pageTitle` to feed the SEO helpers and layout wrapper.
- `app/Controllers/Home::terms()` renders `themes/public/termsOfService` the same way, showing how simple content pages ride the public layout.
- `app/Views/themes/public/gettingStarted.php` demonstrates the expected Bootstrap sections (breadcrumb, hero text, containers/rows/cols) while relying on the layout for header/nav/footer.

## Layout and inclusion pattern
- Controllers call `$this->renderTheme('themes/public/<view>', $data)`; the helper wraps the content in `themes/public/layouts/index`.
- The layout injects header metadata, scripts, styles, and site navigation via `themes/public/layouts/header`, `_sitenav`, and `footer`. View files **must not** include their own `<html>`/`<body>` tags.
- Pass `layout => 'public'`, `pageName`, and `pageTitle` in `$data` so `metadata-information.php` can derive SEO values.

## View conventions
- Keep views as content partials: containers/rows/cols only, no duplicate headers or footers.
- Use Bootstrap 4.6 grid and utilities already present in public pages (`container`, `row`, `col-*`, `py-*`, `my-*`, `text-*`, `btn`, `card`, etc.).
- Compose sections with reusable includes via `view('themes/public/...')` where helpful (e.g., shared nav or CTA snippets).
- Favor semantic structure: hero/banner, informative blocks, CTAs, and FAQs mirroring existing public page flow.

## Assets and links
- Use `site_url()` for internal routes and `base_url()` for static assets (images, JS/CSS). Avoid hard-coded domain strings.
- Keep inline styles/scripts minimal; if added, respect `$nonce` attributes (`$nonce['style']`, `$nonce['script']`).

## Data keys commonly used
- `layout` (`'public'`), `pageName` (readable name for SEO lookup), `pageTitle` (full title string).
- Optional: `meta` array if a controller wants to override title/description/canonical; otherwise the MetaService applies defaults.

## QA checklist for new public views
- Renders through `renderTheme()` so the public layout provides header/nav/footer.
- Uses Bootstrap grid/utilities for responsive blocks.
- Internal links call `site_url()`; assets call `base_url()`.
- No reliance on authenticated session data; safe for guests.
- Minimal inline CSS/JS with CSP nonces when needed.
