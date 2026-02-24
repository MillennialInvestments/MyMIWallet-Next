# Scanner → Alerts Integration

This integration bridges `ScannerService` outputs into the existing trade-alert workflow.

## Signal Mapping

Scanner signals are mapped into `bf_investment_trade_alerts.category` as:

- `SHIFT` → `Momentum Shift`
- `H_SHIFT` → `Hard Shift`
- `LIQ_BREAK` → `Liquidity Break`
- `LIQ_SWEEP` → `Liquidity Sweep`

## Persistence Flow

1. Scanner writes rows into `bf_scanner_results`.
2. `ScannerAlertBridge::syncToAlerts()` upserts into `bf_investment_trade_alerts` using unique key `(ticker, status, source)` where `source='scanner'`.
3. Existing records increment `occurrences` and refresh snapshot fields.
4. Every sync writes a history snapshot into `bf_investment_alert_history`.

## Discord Notification Safety

`ScannerAlertBridge` checks `notification_sent` before dispatching Discord.

- `notification_sent = 0`: sends once via existing `MyMIAlerts::sendDiscordNotification()` flow.
- `notification_sent = 1`: skips dispatch to prevent duplicate notifications.

## API + Dashboard

- `GET /API/Alerts/scanner` returns scanner-source alerts only.
- Management alerts dashboard supports `source` filter (`manual`, `email`, `scanner`) and includes a **Scanner Signals** table.
- User alerts dashboard includes scanner signals filtered to symbols in `bf_users_watchlist`.
