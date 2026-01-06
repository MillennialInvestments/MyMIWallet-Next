# CI4 SSO Cookies

The CodeIgniter 4 auth stack now shares cookies across `*.mymiwallet.com` properties. This allows the primary app and chat frontend to recognize the same authenticated browser session.

## Cookie Settings
- **Domain:** `.mymiwallet.com` (shared across subdomains)
- **Path:** `/`
- **Secure:** `true` (HTTPS only)
- **SameSite:** `Lax` (allows top-level navigation between subdomains)
- **HttpOnly:** `true`

The CSRF cookie name remains `csrf_cookie_name`; the session cookie name remains `ci_session`.

## Deployment Note: Clear Old Cookies Once
Because the cookie domain changed from host-only to `.mymiwallet.com`, existing host-specific cookies may linger and conflict. After deployment:
1. Sign out of `mymiwallet.com` and `chat.mymiwallet.com`.
2. Clear cookies for both hosts (and any other `*.mymiwallet.com` host).
3. Sign back in.

This ensures the browser drops the old host-only cookies and keeps only the new domain-scoped ones.
