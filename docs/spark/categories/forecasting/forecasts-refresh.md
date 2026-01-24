# spark:forecasts:refresh

## Purpose
Refresh forecasts for open alerts, either inline or via queued jobs.

## Usage
php spark forecasts:refresh [limit]

## Arguments
- limit (int) – Maximum alerts/jobs to process (default: 50, max 200).

## What It Touches
- Database tables: `bf_investment_trade_alerts`, `bf_investment_price_forecasts`, `bf_investment_forecast_jobs`, `bf_investment_forecast_history`
- Files/directories: None
- Cache: Forecast caches (`forecast_highlights`, latest forecast keys)
- External APIs: Market data provider (e.g., Alpha Vantage/MarketAux depending on config)

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (forecast updates, job status)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes
- Suggested schedule: Daily or hourly depending on alert volume.

## Related Commands
- spark:alerts:audit

## Failure Modes
- Market data provider rate limits.
- Database update failures for forecast tables.

## Status
- Existing
