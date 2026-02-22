# Cron

Command:

```bash
php spark scanning:run --timeframe=1min --source=watchlist --limit=200
```

Lifecycle:
- creates job row
- resolves symbols
- fetches candles via provider router + caching
- computes signals
- inserts scanner results
- updates job status and provider summary

Recommended scheduling:
- intraday: every 1-5 minutes based on timeframe
- daily: once after market close
