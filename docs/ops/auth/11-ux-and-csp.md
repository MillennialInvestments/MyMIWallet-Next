# Phase 11 — UX Integration & CSP/CSRF
- **Timestamp:** 2025-10-09 19:00 UTC
- **Environment:** DreamHost VPS (Nginx, PHP 8.2, MySQL)

## DashLite Integration
- Auth views extend `Auth/layout.php`, which loads DashLite styles/scripts. Ensure layout includes the same header/footer partials as main site.
- `_message_block` partial renders flash messages in Bootstrap alerts. Confirm error/success classes align with DashLite theme.
- Registration view splits marketing content vs. form when hitting `/Apex/register/*`. Keep marketing partials up-to-date.

## CSP Requirements
- Current CSP in `Config\\App` restricts `script-src`, `style-src`, `img-src`, and `connect-src` to `'self'`.
- To display inline QR codes for 2FA, add `'data:'` to `CSPImgSrc` and optionally `'https://chart.googleapis.com'` (if using Google Charts) after review.
- OAuth provider SDKs (if added) may require `connect-src` entries such as `https://accounts.google.com`.
- Consider enabling a dedicated CSP filter with nonce injection if inline scripts/styles remain necessary.

## CSRF Coverage
- CSRF token rendered via `csrf_field()` helper in registration, login, forgot, reset, and resend forms.
- Filters configuration now ensures CSRF filter runs before auth POST routes. Validate SPA/Ajax flows include header `X-CSRF-TOKEN` if using JSON endpoints.
- Cookie-based CSRF tokens expire after 5 minutes; long-lived forms should periodically refresh token via Ajax endpoint.

## Accessibility & UX Notes
- Ensure form labels match `for` attributes (verified in `register_form.php`).
- Provide password complexity hints sourced from `lang('Auth.passwordComplexity')` to reduce failed submissions.
- Add loading states for OAuth redirects and 2FA verification buttons.

## Follow-Up Actions
1. Update CSP arrays in `Config\\App` and document required domains/hashes once 2FA/OAuth finalized.
2. Audit `Auth/layout.php` for inline scripts/styles; convert to external assets or add nonce management.
3. Run accessibility scan (Lighthouse) on `/login` and `/register` to capture contrast and ARIA issues.
