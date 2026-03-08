# View JS Audit Log

## Status
- Total batches: 15
- Completed: 1
- In Progress: none
- Remaining: 02,03,04,05,06,07,08,09,10,11,12,13,14,15

## Last Completed Batch
- Batch 01 — Global Layouts / Shared JS / Theme Loaders

## Next Batch
- Batch 02 — Public Layouts / Home / Landing / Marketing Entry

## Batch History

### Batch 01
- Files reviewed: 51 (all `themes/dashboard/layouts`, `themes/public/layouts`, and `themes/dashboard/partials/custom-js` entries from the manifest).
- Issues found:
  - CSRF meta refresh scripts assumed `window.CSRF_TOKEN` was always present.
  - Global jQuery `ajaxComplete` handlers were vulnerable to duplicate binding when partials/scripts were injected more than once.
  - Public layout JS loaded `navbar-search.js` twice.
  - Public layout `window.onload` assignment risked clobbering other load listeners and assumed jQuery availability.
  - Duplicate library includes and mixed legacy/current loader files are still present (deferred for staged cleanup).
- Fixes applied:
  - Added guard checks before reading `window.CSRF_TOKEN` in dashboard custom JS loader.
  - Namespaced + de-duplicated `ajaxComplete` bindings in dashboard/public global JS loaders.
  - Removed duplicate `navbar-search.js` include in public JS links loader.
  - Replaced `window.onload = ...` with `window.addEventListener('load', ...)` and jQuery existence guard.
- Deferred improvements:
  - Consolidate public `js-links.php` duplicated CDN/local vendor loading.
  - Establish shared helpers (`safeBind`, `initDataTableOnce`, `safeFetchJson`, toast/loading-state helpers).
  - Deprecate legacy layout copies (`*-10042025.php`, `*_old.php`, `sidebar-*` variants) after usage tracing.
- Blockers:
  - No authoritative map yet of active vs archival layout variants routed by controllers.
