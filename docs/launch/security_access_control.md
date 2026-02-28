# Security / Access Control Audit

- Source inventory: `docs/functional_inventory/feature_inventory.csv` and route filter checks in `app/Config/Routes.php`.
- `/API/*` routes inventoried: **479**.
- Classification counts:
  - PUBLIC_SAFE: 379
  - AUTH_USER: 0
  - ADMIN_ONLY: 0
  - INTERNAL_CRON: 100

## Route protection evidence
- `/API/Management/*` is wrapped in `filter => cronKey` (including `runCronManually`, `processAllTradeAlerts`, `export*`, `send*`, `distribute*`, `trigger*`, scrape/update jobs).
- `Mdit/admin/*` routes require `authcheck` + `permission:mdit.admin`.
- Auth/session protected user APIs are under login/auth filters in route groups.

## Known-danger endpoints check
- `runCronManually` -> `/API/Management/runCronManually` in cronKey group.
- `processAllTradeAlerts` -> `/API/Management/processAllTradeAlerts` in cronKey group.
- `export*` -> `/API/Management/exportPostJson/(:num)` in cronKey group.
- `send*` / `distribute*` / `trigger*` / scrape / market updates are all under `/API/Management/*` and inherit cronKey.

## Result
- **PASS** for launch gate condition: no confirmed unprotected ADMIN_ONLY/INTERNAL_CRON endpoints in current route definitions.
- Residual risk: classification is route-driven and should still be verified with active token tests in staging.
