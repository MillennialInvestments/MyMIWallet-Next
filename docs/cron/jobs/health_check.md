# health_check

## Purpose
Baseline platform health smoke (PHP, DB connectivity ping if configured) from phone-safe SSH.

## Schedule
Every 30 minutes via cron (stagger with other jobs by a few seconds).

## Entrypoint
`scripts/ops/health_check.sh`

## Inputs
- Optional `TARGET_URL` for HTTP health endpoint.
- Optional `DB_PING=1` to include mysqli ping (requires configured `.env`).

## Outputs
- Single JSON object with uptime, disk, and optional HTTP status.

## Failure modes
- IMAP/HTTP host unreachable.
- Missing env for DB ping.
- JSON parse errors if external commands fail.

## Logging locations
- CLI stdout (captured by cron email if configured).
- Append-only JSON lines if `HEALTH_LOG` path is provided.

## Rollback
Not applicable; rerun after fixing env or connectivity.

## Manual run command (SSH-safe)
```bash
bash scripts/ops/health_check.sh
```

## Security notes
- No secrets echoed; ensure `TARGET_URL` omits tokens.
- Keep permissions 700/740 on script if possible.
