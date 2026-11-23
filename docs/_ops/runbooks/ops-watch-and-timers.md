# Ops watch endpoint and ops job timers

These replace the four job-running MyMI n8n workflows (`docs/n8n/workflows/*.json`) and give the TBI AIOps n8n a read-only view of MyMI.

## Ops job timers

| Timer | When (Chicago) | Jobs (`php spark ops:job:run <job>`) |
| --- | --- | --- |
| `mymi-ops-daily` | 07:00 | `ops.health.check`, `ops.logs.triage_daily` |
| `mymi-ops-nightly` | 02:00 | `ops.routes.smoke_test`, `ops.security.headers_scan` |
| `mymi-ops-db-weekly` (opt-in) | Sun 03:00 | `ops.db.maintenance`: deletes ops queue rows older than 14 days and run rows older than 60 days, optimizes those two tables |

- The jobs run as `www-data` from `/apps/TBI/www/mymiwallet/current`.
- `ops:job:run` runs only the five jobs above. `ops.db.maintenance` also needs `--allow-db-maintenance`.
- Each result goes to `writable/ops/last-run/<job>.json`. Reports now go to `writable/ops/reports/<date>/`, because releases are read-only.
- `ops.health.check` no longer probes `aiops.mymiwallet.com`, the retired DreamHost n8n.

Install from the live release:

```bash
cd /apps/TBI/www/mymiwallet/current
sudo bash scripts/ops/systemd/install-mymi-ops-timers.sh
sudo bash scripts/ops/systemd/install-mymi-ops-timers.sh --apply
```

The first command previews and changes nothing. To add the weekly cleanup, also pass `--with-db-maintenance`. To undo, use `--remove`. Results are in `journalctl -u mymi-ops-daily -u mymi-ops-nightly`.

## `GET /API/Ops/watch-status`

This is a read-only snapshot for the TBI AIOps MCP tool `mymi_status`. It reports:
- the database ping;
- emergency.log counts for the last 15 minutes and 24 hours;
- today's CodeIgniter log counts and errors in the last hour;
- the last run of each job above;
- the docs gap count.

Messages are shortened, and emails, paths, long numbers and token-like strings are removed. It never runs spark or writes anything.

Auth is `Authorization: Bearer <MYMI_OPS_STATUS_TOKEN>`, GET only. The token must be at least 32 characters, and it opens no other route. timothyburks `ops/aiops/tbi-mymi-ops-token.sh apply` creates it in `shared/.env` and the MCP env without printing it. When the token is unset, the route answers 503.
