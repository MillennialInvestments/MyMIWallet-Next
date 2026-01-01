# Operations Runbook

## Daily
- Run **Gap Tracker Sync** (`php spark gap:sync --limit=25`) to keep CSV enriched.
- Review AI Ops dashboard usage and resolve any errors/events.

## Weekly
- Perform deeper scans (Semgrep/PHPStan/PHPUnit) via `tools/aiops/run_semgrep.sh`, `run_phpstan.sh`, `run_phpunit.sh` triggered from n8n.
- Re-seed caps if needed and archive reports in `docs/gap_tracker/reports/`.

## Incident Response
- **80% capacity:**
  - Investigate subsystem driving usage.
  - Pause non-critical jobs via dashboard toggles.
  - Increase cache TTLs and batch sizes.
- **100% lockout:**
  - Confirm cap settings, enable `aiOpsAllowOverride` temporarily for critical runs.
  - Scale hardware or adjust caps; document in events log.
  - Notify stakeholders via alert email and incident channel.
