# Sidebar toggle changelog

## 2026-01-01
- Files modified:  
  - `public/assets/js/sidebar-menu-fix.js` (new capture-phase submenu handler with debug logging guard)  
  - `public/assets/js/scripts.js` (removed inline submenu display writes in `NioApp.CurrentLink`)  
  - `public/assets/css/inline-fixes.css` (class-driven submenu visibility defaults)  
  - `app/Views/themes/dashboard/layouts/custom-js.php` (removed legacy jQuery sidebar toggle binding)  
  - Dashboard sidebar templates (`app/Views/themes/dashboard/layouts/sidebar*.php`) to strip inline `style="display:none !important;"` and `data-bs-toggle`/`data-bs-target` on `.nk-menu-toggle`.  
  - Dashboard JS bundles (`app/Views/themes/dashboard/layouts/js-links*.php`) to load the fix once and expose `window.MYMI_DEBUG_SIDEBAR`.
- Removed: inline submenu show/hide attributes and Bootstrap `data-bs-*` hooks from sidebar toggles that were causing Bootstrap to fight Dashlite's menu toggler.
- Added: a single-source delegated toggle handler (`sidebar-menu-fix.js`), a CSP-friendly debug flag (`window.MYMI_DEBUG_SIDEBAR`), and CSS guards to keep submenu visibility class-driven.
- How to test:
  1. Hard-refresh any dashboard page to ensure the new script loads.
  2. Click “Purchase Now!” (or any `.nk-menu-toggle`): submenu opens and stays open.
  3. Click the same toggle again: submenu closes.
  4. Click a different submenu: the previous one closes when siblings are present.
  5. Narrow the viewport or use mobile emulation: the sidebar still collapses/expands as before.
  6. Click inside submenu items: the submenu remains open (no premature close).
