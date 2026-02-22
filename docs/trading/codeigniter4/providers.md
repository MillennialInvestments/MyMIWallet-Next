# Providers

Fallback order:
1. AlphaVantage (primary; intraday + daily)
2. Finnhub (if configured)
3. Stooq (daily fallback)

Provider router reports:
- health status by provider
- provider used per symbol/timeframe
- fallback when rate-limited or invalid payloads

Rate limiting:
- AlphaVantage constrained to **75 req/min** via `RateLimiter`.
- Detects "Thank you for using Alpha Vantage" throttling note.

Caching TTL guidance:
- `1min`: 60-120s
- `5min`: 3-5m
- `15min`: 10-15m
- `1day`: 6-12h
