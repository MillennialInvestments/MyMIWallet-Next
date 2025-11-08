# Phase 10 — Social / OAuth Providers
- **Timestamp:** 2025-10-09 19:00 UTC
- **Environment:** DreamHost VPS (Nginx, PHP 8.2, MySQL)

## Provider Configuration
| Provider | Enabled | Credentials Source | Scope |
| --- | --- | --- | --- |
| Google | true | `env('hybridauth.google.client_id')` / `env('hybridauth.google.client_secret')` | `email profile` |
| GitHub | true | `env('hybridauth.github.client_id')` / `env('hybridauth.github.client_secret')` | `user:email` |
| LinkedIn | false | Env placeholders configured but disabled | `r_liteprofile r_emailaddress` |

- Ensure DreamHost environment exports the expected variables; otherwise Hybridauth will throw runtime exceptions during redirect.

## Routes & Callbacks
- Redirect: `/auth/provider/{provider}`
- Callback: `/auth/provider/{provider}/callback`
- Link/Unlink: `/auth/link/{provider}`, `/auth/unlink/{provider}`
- Callback URL registered with providers must be `https://www.mymiwallet.com/auth/provider/{provider}/callback`.

## Account Linking
- `handleProviderCallback()` looks up users by verified email, falls back to provider identifier, and inserts into `auth_identities` if new.
- `linkProvider()` and `unlinkProvider()` require authenticated session; ensure UI exposes these only inside account security settings.
- `ensureIdentityLink()` stores provider email (if present) and timestamp.

## Security Considerations
- Hybridauth uses PHP sessions; confirm DreamHost session storage (files) is performant enough for OAuth flows.
- CSRF: Hybridauth manages state internally. Ensure `/auth/provider/*` routes remain excluded from `authcheck` filter to avoid forced redirects.
- Logging: Add info-level logs when linking/unlinking providers for auditing.

## Robinhood / SnapTrade
- `/Auth/link-robinhood` and `/Auth/link-snaptrade` currently return stubbed JSON. Document production integration requirements (API keys, OAuth flows) before go-live.

## Follow-Up Actions
1. Verify environment variables on staging/prod and rotate credentials regularly.
2. Expand CSP (`connect-src`) to allow provider domains if using XHR-based SDKs.
3. Implement UI messaging covering provider errors (e.g., user cancels authorization).
4. Add integration tests or manual checklist ensuring account linking prevents duplicate provider entries.
