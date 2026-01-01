# Dashlite sidebar toggle audit

Date: 2026-01-01

## Root cause
- Sidebar submenu anchors were marked with `data-bs-toggle="toggle"` / `data-bs-target="#sidebarSupportMenu"` in multiple dashboard sidebar templates (`app/Views/themes/dashboard/layouts/sidebar*.php`), so Bootstrap's generic toggle handler was also firing on `.nk-menu-toggle` clicks. That secondary handler consumed the click/bubble path and collapsed the sidebar immediately after `NioApp.TGL.ddmenu` ran, making submenus refuse to stay open.
- The same sidebar templates forced inline `style="display:none !important;"` on `.nk-menu-sub` elements, and `NioApp.CurrentLink` wrote inline `display:block` overrides when marking the current page (public/assets/js/scripts.js:222-235). The mix of inline overrides with class-driven activation led to inconsistent state across layouts and made class-based fixes harder to apply.
- A legacy jQuery block in `app/Views/themes/dashboard/layouts/custom-js.php` previously rebound `.nk-menu-toggle` clicks with `slideToggle` + document-level closers, competing with Dashlite’s delegate. That binding has been removed so the sidebar now relies on a single handler.
- Dashboard layout `js-links-10042025.php` loads both `assets/js/bundle.js` (Dashlite original) and `assets/js/scripts.js` (local shim). Although `NioApp.TGL.ddmenu` guards against duplicate binding, having two different Dashlite builds on the page increases the chance of conflicting menu behavior.

## Handlers located
- Primary Dashlite toggle wiring: `public/assets/js/scripts.js` lines 305-339 (`NioApp.TGL.ddmenu`) delegates clicks on `.nk-menu-toggle` and closes other open siblings when clicking outside.
- URL-highlighting helper that previously forced inline displays: `public/assets/js/scripts.js` lines 222-235 (`NioApp.CurrentLink`).
- Legacy (commented) jQuery slideUp close routine in vendor bundle: `public/assets/js/bundle.js` around line 7270 (commented `closeMenu`/`dropMenu` references).

## Other notes from the search set
- No additional `$(document).on('click', ...)` close handlers target the sidebar beyond the `NioApp.TGL.ddmenu` delegate noted above.
- No `.nk-menu-toggle` instances remain with `data-bs-toggle="collapse"` / `data-bs-toggle="offcanvas"`; all sidebar toggles were cleaned of `data-bs-*` hooks.
- Inline `style`-based show/hide attributes on `.nk-menu-sub` were removed from all dashboard sidebar templates.
