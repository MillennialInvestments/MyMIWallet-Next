# Spark Command & Control System (DreamHost VPS)

This directory documents the DreamHost-safe CI4 Spark operations framework implemented for AIOps.

## Safety model
- No sudo required.
- No systemd control.
- Read-only probes where host logs/config are accessible.
- Writes only under `docs/_aiops/*` and CI4 writable paths.
- Every command supports `--json` and `--dry-run`.

## Command set
- `ops:healthcheck`
- `ops:nginx:status`
- `ops:php:fpm:health`
- `ops:filesystem:scan`
- `logs:scan`
- `logs:summarize`
- `logs:watch`
- `email:healthcheck`
- `email:queue:scan`
- `email:test`
- `dreamhost:email:list`
- `dreamhost:email:audit`
- `dreamhost:dns:verify`
- `dreamhost:limits`
- `ops:self-heal`
- `ops:report`

## AIOps integration points
- JSON artifacts: `docs/_aiops/**/report-YYYY-MM-DD.json`
- Markdown summaries: `docs/_aiops/**/report-YYYY-MM-DD.md`
- Dashboard source: `docs/_aiops/dashboard/tiles.json`
- PR automation hint source: `docs/_aiops/reports/report-YYYY-MM-DD.json`
