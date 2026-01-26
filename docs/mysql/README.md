# MyMI Wallet – Database Schema Contract

This directory is the authoritative contract for MyMI Wallet MySQL tables.
Schema drift is detected by `php spark db:inventory` and resolved by documented SQL in these files.

## Commands
- `php spark db:inventory` – scan code + migrations, compare with live DB, and write reports.
- `php spark db:apply-docs` – compile SQL from docs and apply safely.
- `php spark db:apply-docs --dry-run` – compile SQL without executing.

## Artifacts
- `docs/mysql/tables/*.md` – table contracts with SQL and verification.
- `docs/mysql/adjustments/adjustment_log_YYYY-MM-DD.md` – drift summary.
- `writable/db_inventory/inventory.json` – machine-readable status.
- `writable/db_inventory/report.md` – human-readable report.
- `writable/db_inventory/compiled_adjustments.sql` – SQL compiled from docs.
- `writable/db_inventory/apply_YYYY-MM-DD_HHMMSS.log` – apply run log.

## CI / CRON
Use `php spark db:inventory` in CI and enforce alignment with:
```bash
jq -e '.status=="aligned"' writable/db_inventory/inventory.json || exit 1
```

DreamHost compatibility: TCP MySQL only, no sockets, no sudo, no composer.

