# Batch 01 Findings — Global Layouts / Shared JS / Theme Loaders

## Files reviewed
All 51 files listed in Batch 01 of `docs/frontend/view_inventory_manifest.md`.

## Current behavior summary
- Dashboard and public themes both assemble script stacks through layout-level loaders.
- Dashboard uses `themes/dashboard/layouts/js-links.php` plus `custom-js.php` with conditional partial loaders.
- Public stack currently includes a mixed CDN/local script strategy with duplicate loading risk.
- Multiple legacy-candidate layout variants exist (`-10042025`, `_old`, date-stamped sidebars), indicating historical drift.

## UX issues
- Global inline alert-style clipboard helpers are disruptive (blocking alerts) and should migrate to toast notifications.
- Search/result UX in global scripts still uses tightly coupled selectors and hardcoded thresholds with no loading state.
- No central reusable loading/empty/error-state helper in global loaders.

## JS issues
- `window.CSRF_TOKEN` access in dashboard custom JS lacked guards.
- Duplicate/global `ajaxComplete` handlers could bind repeatedly under dynamic injection.
- Public `window.onload` assignment risked overriding other listeners.
- Public script loader duplicated `navbar-search.js` include.

## Performance issues
- Public loader currently mixes duplicate vendor sources (CDN + local) for jQuery/chart/plugin stack.
- Heavy global scripts are loaded even when page-level features are not used.

## Accessibility/usability issues
- Clipboard actions rely on `alert()` instead of accessible non-blocking status messaging.
- Scroll/link helpers and navbar behaviors lack reduced-motion/focus-friendly pathways.

## Recommended fixes
1. Create shared JS utilities in a common partial:
   - `safeBind` for delegated namespaced events.
   - `syncCsrfFromAjax` once-only binder.
   - `setButtonLoadingState` and toast abstraction.
2. Normalize public script stack to one canonical source per library.
3. Introduce `safeFetchJson` wrapper for response/content-type/error normalization.
4. Add guard-first initialization pattern for optional widgets (DataTables, ChartJS, AOS, tooltips).

## Fixes implemented now
- Added CSRF object guards before meta-token sync in dashboard custom JS.
- Converted global AJAX CSRF refresh bindings in dashboard/public loaders to namespaced `.off().on()` pattern.
- Removed duplicate `navbar-search.js` inclusion from public loader.
- Switched public `window.onload` handler to additive load listener with jQuery guard.

## Improvements deferred
- Full dedupe of public `js-links.php` vendor includes.
- Legacy loader archival/deprecation plan after usage tracing.
- Global helper extraction from inline layout scripts.

## Routes/endpoints needed
- None mandatory for Batch 01 fixes.
- Future: optional endpoint inventory for AJAX-heavy widgets in later batches.

## Reusable helper opportunities
- `window.MyMI.bindOnce(eventKey, binderFn)`
- `window.MyMI.csrf.refreshFromXhr(xhr)`
- `window.MyMI.ui.toast(type, message)`
- `window.MyMI.ui.withLoading(buttonEl, promise)`
- `window.MyMI.table.initOnce(selector, opts)`
- `window.MyMI.chart.replace(canvasId, config)`

## View scoring snapshot (Batch-level)
- Interactivity Potential: 4/5
- Current JS Stability: 2/5
- Real-Time UX Opportunity: 3/5
- Refactor Complexity: 3/5
- Risk of Regression: 3/5
