# MYMI-GTM-041: Certify Market Research Data & News Freshness

## Status
READY / CERTIFIED.

- **PR:** (Pending merge)
- **Completed UTC:** 2026-11-16T20:25:00Z
- **Domain:** Core financial journeys (W3)
- **Gate:** None required

## Summary of Changes
- **Market Data Freshness Evaluation Service (`App\Services\MarketDataFreshnessService`):**
  - Implemented `evaluateSymbolFreshness(string $symbol, int $maxAgeSeconds = 3600)` with bounded `limit(1)` queries against `bf_market_snapshots` and secondary fallback `bf_investment_technical_snapshots`. Normalized symbols to uppercase and gracefully handles missing/stale/future timestamps.
  - Implemented batch quote evaluation `evaluateQuotesFreshness(array $symbols = [], int $maxAgeSeconds = 3600)` across standard default symbols (`SPY`, `QQQ`, `BTC`, `ETH`, `SOL`, `DXY`, `VIX`) with aggregated health counts (`fresh_count`, `stale_count`, `missing_count`, `is_healthy`).
  - Implemented news and research feed freshness evaluation `evaluateNewsFreshness(int $maxAgeSeconds = 86400)` with bounded queries across `bf_financial_news`, `bf_marketing_market_feed_items`, and `bf_marketing_news_content`, with defensive table-existence guards.
  - Implemented upstream API key readiness auditor `evaluateKeyReadiness()` inspecting credential presence across AlphaVantage, MarketAux, FRED, Birdeye, CoinGecko, NewsAPI, and Finnhub from `env()` and config sources, strictly omitting raw secret values to prevent credential leakage.
  - Implemented tiered price resolution `resolveSafePrice(string $symbol, float $fallbackPrice = 0.0, int $maxAgeSeconds = 3600)` ensuring safe application-level fallbacks when market data is stale or upstream feeds are down.
  - Implemented unified platform health evaluation `getSystemDataFreshnessSummary()` combining quotes, news feeds, and API credentials into `HEALTHY`, `DEGRADED`, or `CRITICAL` statuses.
- **Spark Command (`App\Commands\Market\MarketFreshnessAudit`):**
  - Created `php spark market:freshness:audit` supporting `--json`, `--symbols`, and `--max-age` flags.
  - Extends `SafeBaseCommand` with zero illegal constructors, zero untyped property violations, and registered in `app/Config/Commands.php` and `app/Config/Console.php`.
  - Exits with `EXIT_SUCCESS` (0) when system status is HEALTHY or DEGRADED, and `EXIT_ERROR` (1) when CRITICAL.
- **Unit & Certification Suite (`tests/unit/Market/MarketDataFreshnessTest.php`):**
  - 12 comprehensive unit tests (99 assertions) covering quote evaluation, stale quote detection, multi-source fallback, batch aggregation, news feed evaluation, secret leakage prevention, safe price resolution with tiered fallbacks, and Spark CLI command execution.
  - Full test teardown clean-up ensuring zero database pollution across shared test runners.

## Test Verification
- Unit Test: `vendor/bin/phpunit tests/unit/Market/MarketDataFreshnessTest.php` (12 tests, 99 assertions PASS).
- Full Unit Suite: `vendor/bin/phpunit --testsuite unit` (471 tests, 2342 assertions PASS).
- Auth Smoke Suite: `vendor/bin/phpunit --testsuite auth-smoke` (20 tests, 89 assertions PASS).
- Form Certification Smoke: `bash tests/smoke/form-certification-smoke.sh` (293 PASS, 22 FAIL - Ratchet Preserved).
- Spark Command Rules Audit: `php spark ops:commands:audit --json` (0 violations).
- Model Limit Audit: `php spark ops:model-limit:audit` (0 new violations).

## Risks & Rollback
- Risk: Very low. Read-only audit service and command with safe fallback pricing; no modifications to existing runtime write transactions or schema structures.
- Rollback: Revert PR commit on `main`.
