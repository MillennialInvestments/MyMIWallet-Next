# AIOPS Centralized Integration (Primary Control Plane)

## Architecture
MyMI Wallet is configured to treat centralized AIOPS as the primary orchestration layer:

1. MyMI Wallet calls centralized AIOPS.
2. Centralized AIOPS orchestrates model/workflow behavior.
3. AIOPS calls centralized or internal Ollama as needed.

MyMI Wallet **must not** assume a repo-local embedded AIOPS runtime as the primary architecture.

## Required Environment Variables

```dotenv
AIOPS_MODE=remote
AIOPS_BASE_URL=https://aiops.timothyburks.com
AIOPS_APP_KEY=mymiwallet
AIOPS_SHARED_SECRET=replace-with-64-char-random-hex
AIOPS_REQUEST_TIMEOUT=30
```

## Request Authentication Headers
When calling centralized AIOPS, clients send:

- `X-App-Key`
- `X-App-Timestamp`
- `X-App-Signature`

The signature is HMAC-based and generated with `AIOPS_SHARED_SECRET`.

## Status/Health Behavior
- In `AIOPS_MODE=remote`, `aiops:status` checks remote health endpoints (`/health`, fallback `/status`).
- In `AIOPS_MODE=local`, legacy local process checks are still available for troubleshooting.

## Security Notes
- Never log `AIOPS_SHARED_SECRET`.
- Keep debug logging focused on non-secret context (mode, URL, timeout, response status).
