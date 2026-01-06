# CSRF Login Fix

## Root Cause Checklist
- CSRF filter must be active globally with `API/*` and `api/*` exempt.
- Login form must include `<?= csrf_field() ?>` and post to `POST /login`.
- CSRF cookie domain must match the app domain (`.mymiwallet.com`) and be served over HTTPS.
- Token regeneration per request can cause stale tokens during redirects; we now keep a stable token on login.

## Required Form Changes
The login view at `app/Views/Auth/login.php` already posts to `site_url('login')` with `method="post"` and includes `<?= csrf_field() ?>`. If the form is ever refactored, keep the CSRF hidden input inside the `<form>` element (or include the token in any AJAX payload).

## CSRF Configuration Updates
- `app/Config/Filters.php`: CSRF enabled globally with exceptions for `API/*` and `api/*`.
- `app/Config/Security.php`: `public bool $regenerate = false;` to avoid per-request token churn on login. `public bool $redirect = true;` preserves user-friendly redirects after failures.
- `app/Config/App.php`: Cookies scoped to `.mymiwallet.com`, `Secure=true`, `SameSite='Lax'` to avoid mixed host cookies that can trigger token mismatches.

## Verification Steps
1. **Page load:** `GET /login` loads and renders the CSRF hidden field.
2. **Happy path:** Submit valid credentials from the login form; expect a successful session and redirect (Dashboard).
3. **Failure path:** Manually POST `/login` without the CSRF token; expect a CSRF failure.
4. **Logs:** No `CodeIgniter\Security\Exceptions\SecurityException` for legitimate browser submissions. Login-specific CSRF debug logs appear only in non-production environments when a CSRF check fails.
5. **Regression:** Other POST forms remain CSRF-protected; API routes under `API/*` or `api/*` remain exempt.
