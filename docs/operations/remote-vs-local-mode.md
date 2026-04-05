# Remote vs Local Mode Operations

## Goal
Operate MyMI Wallet with centralized AIOPS as the default control plane, while preserving optional local/internal fallbacks.

## AIOPS Modes

### Remote (default)
- `AIOPS_MODE=remote`
- `aiops:status` checks centralized AIOPS (`https://aiops.timothyburks.com`).
- Local embedded AIOPS runtime checks are not primary in this mode.

### Local (optional fallback)
- `AIOPS_MODE=local`
- Uses legacy local process/port checks for local service runtime debugging.

## Ollama Modes

### Remote (default)
- `OLLAMA_MODE=remote`
- Resolved URL defaults to `OLLAMA_BASE_URL`.

### Local/Internal fallback
- `OLLAMA_MODE=local` or explicit `prefer_internal=true`
- Resolved URL uses `OLLAMA_INTERNAL_BASE_URL`.

## Operational Commands

```bash
php spark cache:clear
php spark aiops:status
php spark ollama:health
php spark ollama:run --timeout=180 --file="./docs/_aiops/patch_jobs/20260403-104539-ingest-18/ollama_prompt.md"
```

## Safe Debug Logging
- Allowed: mode, endpoint URL, timeout, model, token budget, HTTP status.
- Not allowed: shared secrets, private tokens, full sensitive payloads.
