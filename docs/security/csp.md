# Content Security Policy (CSP) — Nonce-First Standard

## Overview
MyMI Wallet enforces CSP via a single, per-request nonce generated in `BaseController::initController()` and injected into all view data as `$cspNonce`. Inline scripts/styles **must** use this nonce, and inline event handlers or `style=""` attributes are prohibited. The CSP header is emitted exclusively by `BaseController` to avoid conflicting definitions.

## Nonce lifecycle
- **Generation:** `BaseController::initController()` generates a nonce once per request using `bin2hex(random_bytes(16))` and stores it in `$cspNonce`.
- **View exposure:** `$cspNonce` is available to all views via the renderer data payload.
- **Usage:** Inline `<script>` and `<style>` blocks must include `nonce="<?= esc($cspNonce) ?>"`.

## Authoritative CSP header (strict mode)
`BaseController::applyCspStrict()` emits:

```
default-src 'self' data: blob:
base-uri 'self'
frame-ancestors 'self'
script-src 'self' 'nonce-{nonce}' https://code.jquery.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://www.googletagmanager.com https://s3.tradingview.com https://connect.facebook.net https://unpkg.com https://www.clarity.ms https://scripts.clarity.ms
style-src 'self' 'nonce-{nonce}' https://fonts.googleapis.com https://cdn.jsdelivr.net https://unpkg.com
img-src 'self' data: https:
font-src 'self' https://fonts.gstatic.com data:
connect-src 'self' https://www.googletagmanager.com https://www.google-analytics.com https://s3.tradingview.com https://www.tradingview.com https://connect.facebook.net https://www.clarity.ms https://scripts.clarity.ms
frame-src 'self' https://cdn.plaid.com https://www.youtube.com https://www.tradingview.com https://s.tradingview.com https://www.google.com https://www.clarity.ms https://scripts.clarity.ms
manifest-src 'self'
worker-src 'self' blob:
object-src 'none'
form-action 'self'
upgrade-insecure-requests
```

`{nonce}` is the single request nonce.

## Permissive mode
Permissive mode still requires nonces for inline scripts/styles and keeps the same CDN allowlist. **`unsafe-inline` is not permitted** in any mode.

## CDN allowlist and justification
The following external domains remain in CSP to support existing analytics and widget integrations:
- `https://code.jquery.com` — legacy jQuery scripts still referenced in layout bundles.
- `https://cdn.jsdelivr.net` / `https://cdnjs.cloudflare.com` / `https://unpkg.com` — vendor assets used across public layouts.
- `https://www.googletagmanager.com` / `https://www.google-analytics.com` — analytics.
- `https://connect.facebook.net` — Meta Pixel.
- `https://s3.tradingview.com` / `https://www.tradingview.com` — TradingView widgets.
- `https://www.clarity.ms` / `https://scripts.clarity.ms` — Microsoft Clarity.

If a CDN dependency is removed or replaced by a self-hosted asset, update the CSP allowlist accordingly.

## CSP regression guardrails
- **Command:** `php spark security:csp:audit`
- **CI script:** `scripts/lint_csp.sh`

These checks fail when inline scripts/styles lack a nonce, when inline event handlers are present, when `style=""` attributes appear in layouts/partials, or when `unsafe-inline` appears in the CSP header.

### Exclusions
Email templates under `app/Views/emails` are excluded from CSP audit since they are rendered for email clients and require inline styles.

## Implementation notes
- **No inline handlers:** use `addEventListener` in nonce-protected scripts or external JS files.
- **No `style=""` attributes:** move styles to CSS files or inline `<style nonce="...">` blocks.
- **External scripts:** do **not** add a nonce to `<script src="...">` tags; rely on CSP allowlists.
