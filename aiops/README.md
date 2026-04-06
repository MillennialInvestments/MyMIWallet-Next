# AIOPS (Lean Control Plane API)

AIOPS is the **primary control plane** for CodeIgniter 4 applications (MyMI Wallet and related apps).

## Stage Goal

This stage ships the leanest workable API surface so DreamHost endpoints like:

- `GET /api/health`
- `GET /api/status`

return stable JSON for CI4 health checks and orchestration.

## Architecture (Current)

1. CI4 apps call AIOPS.
2. AIOPS coordinates internal automation/services.
3. Ollama remains **internal-first** and lean.

At this stage, we **do not require public `/api/*` exposure** on `ollama.timothyburks.com`.

## Future Option (Only If Needed)

If external/public Ollama API access is needed later, add a DreamHost **Proxy Server** in front of internal Ollama. Until that requirement exists, keep Ollama internal.

## Run

```bash
cd aiops
npm run start:api
```

Or with the combined startup script:

```bash
cd aiops
npm run start:aiops
```

## Logs

- AIOPS API log: `aiops/logs/bridge.log`
- n8n log: `aiops/logs/n8n.log`

## Health Check Examples

```bash
curl -sS http://127.0.0.1:8500/api/health
curl -sS http://127.0.0.1:8500/api/status
```

Expected behavior:

- `ok: true`
- clear status markers (`healthy`, `ready`)
- metadata (`component`, `timestamp`, `uptimeSeconds`)
