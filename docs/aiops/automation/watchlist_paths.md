# AIOps Watchlist Paths

The following paths should be monitored for automation changes and new AIOps tasks.

## Primary Paths
- `app/Modules/Marketing/**` (note: current repo uses `app/Modules/Marketing_New/**`)
- `app/Modules/APIs/Controllers/**` (marketing + alerts endpoints)
- `app/Modules/Management/**` (ops dashboards + cron endpoints)
- `app/Commands/**` (ops, aiops, marketing, maintenance commands)
- `app/Services/**` (scrapers, generators, distribution services)
- `docs/_aiops/**` (AIOps outputs)
- `aiops/*.php` (worker scripts)

## Related Paths
- `app/Libraries/**` (alert ingestion + marketing helpers)
- `docs/aiops/**` (automation docs)
