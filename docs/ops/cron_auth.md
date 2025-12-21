# Cron Endpoint Auth

All cron-style HTTP endpoints must enforce a bearer token to prevent unauthenticated triggering.

## Contract
- Header: `Authorization: Bearer <MYMI_CRON_TOKEN>`
- Token source: `.env` variable `MYMI_CRON_TOKEN`.
- Response on failure: HTTP 401 with no body that leaks secrets.

## Implementation steps
1. Add a helper (`requireCronAuth`) or middleware that verifies the token from the Authorization header.
2. Apply to:
   - `/API/Management/runCronManually`
   - Existing marketing/alerts/digest trigger endpoints
   - Any new cron-like routes under `/API/*` or `/Management/*`
3. Do not log the token value; log only high-level failures.

## Smoke test
- Call endpoint with bad token -> expect 401.
- Call endpoint with correct token -> expect 200/JSON success.
