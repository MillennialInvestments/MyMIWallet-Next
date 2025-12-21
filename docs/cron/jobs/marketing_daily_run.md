# marketing_daily_run

## Purpose
Trigger daily marketing content ingestion and distribution from cron with token protection.

## Schedule
06:30 daily.

## Entrypoint
`scripts/ops/run_cron_endpoint.sh` with `CRON_PATH=/API/Marketing/runDaily`

## Inputs
- `BASE_URL` (e.g., https://www.mymiwallet.com)
- `MYMI_CRON_TOKEN`

## Outputs
- JSON indicating HTTP status and response snippet.

## Failure modes
- Endpoint unreachable.
- Invalid cron token -> 401.
- Response not JSON.

## Logging locations
- stdout; optionally append to `CRON_LOG` path.

## Rollback
Re-run after fixing connectivity; no stateful changes happen here beyond marketing queue updates handled server-side.

## Manual run command (SSH-safe)
```bash
BASE_URL=https://www.mymiwallet.com CRON_PATH=/API/Marketing/runDaily \
  MYMI_CRON_TOKEN=*** bash scripts/ops/run_cron_endpoint.sh
```

## Security notes
- Uses Authorization: Bearer header only; avoid placing tokens in URLs or logs.
