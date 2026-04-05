# Centralized AIOPS Remote Health/Status Contract

This document defines the app-to-AIOPS contract used by MyMI Wallet when `AIOPS_MODE=remote`.

## Purpose

MyMI Wallet now uses centralized AIOPS (`https://aiops.timothyburks.com`) and must not assume a local repo runtime for status checks in remote mode.

## Environment variables

- `AIOPS_MODE`
  - `remote`: Use centralized AIOPS health/status endpoint.
  - `local`: Use legacy local n8n/bridge checks.
- `AIOPS_BASE_URL` (example: `https://aiops.timothyburks.com`)
- `AIOPS_REQUEST_TIMEOUT` (seconds)
- `AIOPS_APP_KEY` (app identifier; example: `mymiwallet`)
- `AIOPS_SHARED_SECRET` (per-app shared secret for HMAC request signatures)

### Shared secret guidance

- Generate `AIOPS_SHARED_SECRET` separately **per app** using a cryptographically secure random value.
- Recommended command: `openssl rand -hex 32`.
- Do **not** use CI4 key generators (`keys:generate` or `keys:generate-ci4`) for AIOPS shared secrets.

## Endpoint behavior

### Primary endpoint

- `GET {AIOPS_BASE_URL}/health`

### Fallback endpoint

- `GET {AIOPS_BASE_URL}/status`
- Used only when `/health` returns HTTP 404.

## Required request headers

- `Accept: application/json`
- `X-App-Key: {AIOPS_APP_KEY}`
- `X-App-Timestamp: {unix_timestamp}`
- `X-App-Signature: {hmac_sha256(AIOPS_APP_KEY + "." + timestamp, AIOPS_SHARED_SECRET)}`

## Expected response shape

AIOPS should return HTTP `2xx` when healthy.

Example:

```json
{
  "ok": true,
  "status": "healthy",
  "services": {
    "n8n": "running",
    "bridge": "running"
  },
  "timestamp": "2026-04-05T00:00:00Z"
}
```

The MyMI Wallet side treats any non-2xx response as degraded and includes the decoded payload in status output for debugging.

## Mode-specific behavior in MyMI Wallet

### `AIOPS_MODE=remote`

- `php spark aiops:status` performs remote health/status calls.
- Does **not** inspect local files like `aiops/runtime/n8n.log`.
- Does **not** inspect legacy bridge scripts like `aiops/bridge-8500.js`.
- Local start/stop/restart lifecycle actions for `aiops.n8n` are blocked by default unless explicitly enabled.

### `AIOPS_MODE=local`

- Legacy local checks remain available for local runtime usage.
- Optional local auto-restart remains opt-in.

## Debug logging emitted

When status/health checks run, logs include:

- Resolved AIOPS URL
- Mode
- App key
- Remote health response (HTTP code + body/decoded payload)
