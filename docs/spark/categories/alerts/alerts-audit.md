# spark:alerts:audit

## Purpose
Audit recent scraped alert emails against generated trade alerts to catch missed or mismapped alerts.

## Usage
php spark alerts:audit

## Arguments
- None.

## What It Touches
- Database tables: `bf_investment_scraper` (read), `bf_investment_trade_alerts` (read), `bf_error_logs` (write)
- Files/directories: None
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (logs issues to `bf_error_logs`)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes
- Suggested schedule: Weekly or daily off-hours.

## Related Commands
- spark:alerts:parse-test
- spark:logs:summarize

## Failure Modes
- Missing or renamed columns in alert tables.
- Database connectivity issues.
- Error log insert failures (check `bf_error_logs`).

## Status
- Existing
