# Filters Smoke Test

Quick checks to confirm CI4 boots cleanly with the current filter set and that critical protections are enforced.

## Pre-flight

- Ensure `.env` has `CRON_KEY=` populated for CRON-protected routes.
- Optional: set `OBS_LOG=true` locally to see observability debug logs.

## CLI sanity

1) Validate filters compile and configuration parses:

```bash
php spark routes
```

2) Lint filters (runs fast and catches syntax issues):

```bash
for f in app/Filters/*.php; do php -l "$f"; done
```

## Runtime checks

- **CRON guard (should block without key)**
  - `curl -i http://localhost:8080/API/Management/Run-CRON-Tasks` → `403`
  - `curl -i -H "X-Cron-Key: $CRON_KEY" http://localhost:8080/API/Management/Run-CRON-Tasks` → expect `200`/controller response

- **Auth gate**
  - Visit `/` and `/login` to confirm no fatal errors.
  - Request an authenticated page (e.g., `/Dashboard`) while logged out → expect redirect to `/login`.
  - Request the same endpoint with `Accept: application/json` while logged out → expect `401` JSON from `AuthCheckFilter`.

- **Observability headers**
  - Any request should return `X-Request-Id`.
  - JSON requests should also return `X-Response-Time-ms`.

Record results in runbooks if something fails.
