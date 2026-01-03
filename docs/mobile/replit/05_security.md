# Security, Auth, and Networking

## Token strategy
- **Preferred:** Bearer JWTs (short-lived) with refresh token endpoint.
- **Storage:** Use `expo-secure-store` (or Keychain/Keystore) in production; default scaffold uses in-memory token store for dev. Avoid AsyncStorage for access tokens when possible.
- **Rotation:** Auto-refresh when 401/419 occurs. SDK supports a `refreshToken` call (see `missing_endpoints.md` stub) and retries once after refresh.

## CSRF & CORS
- **CORS:** Allow `Origin: https://<replit-domain>` and `https://*.repl.co` in CI4. Permit headers: `Authorization, Content-Type, X-Request-Id, X-Client-Version`. Methods: `GET, POST, PUT, PATCH, DELETE, OPTIONS`. Respond to OPTIONS with 200.
- **CSRF:** Disable CSRF for API routes or require a double-submit token header. Since mobile uses bearer tokens, CSRF checks should be bypassed for `/API/*` groups.

## Rate limiting
- Apply lightweight rate limits per IP/user for login/register (e.g., 5/minute) and for marketing summary fetches (e.g., 60/minute). CI4 filters or a proxy (Nginx limit_req) are sufficient.

## Logging & observability
- SDK sends `X-Request-Id` and `X-Client-Version` headers. CI4 should log them to correlate client errors.
- For PII, avoid logging payload bodies on auth endpoints. Redact tokens and emails.
- Optional Sentry hook: set `SENTRY_DSN` in Replit; wire the DSN in `mobile/src/hooks/useErrorLogger.ts`.

## Transport
- Enforce HTTPS for all mobile requests; reject plain HTTP in production (SDK can enforce via config).
- Set `Strict-Transport-Security` on CI4 fronting Nginx.

## Refresh & logout flow
1. Mobile calls `/API/Auth/login` to receive `{ accessToken, refreshToken, expiresIn }`.
2. SDK stores tokens; attaches bearer to subsequent calls.
3. On `401`, SDK attempts one `refreshToken` call; on failure, it clears tokens and redirects to Login.
4. Logout clears tokens locally and (optional) calls `/API/Auth/logout` to revoke server-side sessions.

## CI4 headers to enforce
- `Access-Control-Allow-Origin: https://<replit-domain>` (or wildcard for dev only).
- `Access-Control-Allow-Headers: Authorization, Content-Type, X-Request-Id, X-Client-Version`.
- `Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS`.
- `Access-Control-Allow-Credentials: true` **only** if you keep session cookies; otherwise omit.

## Session vs. token
- **Current state:** Budget endpoints rely on `$this->auth->check()` (session). Mobile should not rely on cookies; add token-based auth (see stubs) or adapt CI4 auth to accept bearer tokens and map them to a user.
- **If you must keep sessions:** consider issuing `SameSite=None; Secure` cookies and enabling CORS with credentials, but beware of CSRF complexity. Token flow is recommended for mobile.
