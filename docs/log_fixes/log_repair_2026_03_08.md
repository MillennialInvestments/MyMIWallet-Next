# Log Repair Report — 2026-03-08

## Errors discovered
- High-frequency 404 route misses for legacy and typo URLs under `Features`, `Premium-Features`, `Budget`, and `Management`.
- Static asset misses for `/index.php/images/*`.
- Warning: `MyMIWallets initialized without numeric user context`.
- Warning: `Patch generation returned empty diff`.
- Missing table references observed for `bf_squeeze_scorecards` and `ops_tasks`.
- Duplicate key insert pressure on `bf_investment_trade_alerts.uniq_ticker_status_source`.

## Files modified
- `app/Config/Routes.php`
- `public/.htaccess`
- `app/Services/Scanning/ScannerAlertBridge.php`
- `docs/sql/2026_03_08_log_fixes.sql`

## SQL executed
- See `docs/sql/2026_03_08_log_fixes.sql` for table create statements.

## Routes added
- `index.php/images/(:any)` redirect to `images/$1`.
- Redirects for:
  - `Premium-Features/Advanced-Charting`
  - `Premium-Features/Advanced-Trade-Tracker`
  - `Premium-Features/Wallets`
  - `Premium_Features/Brokerage-Integrations`
  - `Budget/Financial-Advisors`

## Controllers created
- None required in this pass (all targeted misses were resolved by route redirects to existing controllers).

## Remaining warnings
- `ops:commands:audit` still reports pre-existing command-rule violations unrelated to this patch.
- `ops:filesystem:lint` still reports numerous pre-existing repository-wide warnings/errors unrelated to this patch.
- `ops:logs:summarize` command alias is not registered; `logs:summarize` succeeds.
