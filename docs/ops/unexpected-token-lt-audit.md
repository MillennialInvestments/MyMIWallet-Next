# Unexpected `token '<'` Audit — October 2023

## Summary of Findings
- **Budget dashboard module script** relied on a hard-coded `/assets/...` path. On staging systems served from a subdirectory the request was routed through CodeIgniter and responded with the HTML login page, triggering `Unexpected token '<'` in the browser.
- **Gemini API controller** echoed raw JSON and accidentally referenced an undefined dynamic property. When CI4 emitted notices or middleware injected HTML, client-side code parsing `response.json()` failed with the same error signature.
- Several **front-end fetch handlers** blindly called `.json()` without validating the HTTP status or `Content-Type`, obscuring diagnostics when HTML error pages were returned.

## HTTP Checks
| URL | Status | Content-Type | Notes |
| --- | ------ | ------------- | ----- |
| `/assets/js/app/budget-dashboard.js` | 404 (before fix) | `text/html` | Route fallback returned dashboard HTML shell. |
| `/API/Users/Comments/Add` | 200 | `text/html` (when auth failed) | Login redirect rendered HTML consumed by `.json()`. |
| `/API/Alerts/fetchMarketAuxNews/{ticker}` | 302 → 200 | `text/html` | Auth redirect produced login page. |

## Remediations Applied
1. **Static asset routing**
   - Added an explicit `location /assets/` alias in `nginx/sites-available/mymiwallet.conf` to bypass PHP for JS/CSS payloads.
   - Normalised dashboard includes to use `base_url()` so URLs remain correct behind subdirectory deployments.
2. **JavaScript hardening**
   - Introduced a shared `safeFetchJson()` helper in user-facing views to inspect status codes and MIME types before parsing JSON, surfacing precise errors when HTML is encountered.
   - Added a development-only `dev-html-guard.js` script that scans loaded scripts and reports any that unexpectedly return HTML.
3. **API controller hygiene**
   - Refactored `GeminiController` to use typed properties and CI4's `$this->response->setJSON()`, eliminating raw `echo json_encode()` responses and dynamic property notices.

## Follow-up Recommendations
- Wire `public/assets/js/dev-html-guard.js` into local tooling only; do not ship to production.
- Expand the `safeFetchJson()` helper into a reusable module (e.g., Vite bundle) so other views can adopt it without duplication.
- Consider disabling auto-routing in `app/Config/Routes.php` once explicit routes cover all endpoints, further reducing the risk of assets flowing through controllers.
