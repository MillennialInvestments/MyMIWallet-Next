# 040 — Repository Health + Docs Sync (MyMI Wallet)

## Health dimensions
- Spark command registry integrity.
- Runtime logging visibility.
- Route/controller/view integrity.
- Security baseline checks.

## Docs synchronization rules
- Keep `_aiops/reports` as machine output.
- Keep `_aiops/instructions` as human/operator guidance.
- Ensure docs state matches current command inventory.

## Suggested check suite
```bash
php spark master:run-all
php spark aiops:health:full
php spark logs:doctor
php spark routes:reconcile
```
