# Spark Known Issues

This document captures Spark-related known issues observed in the 2026-02-01 command audit run. These are tracked so operators can distinguish environmental failures from command regressions.

## External Health Checks
- **MarketAux**: Returned HTTP 404 during `ops:app:update` external checks (treated as warning unless `--strict` is set).
- **CoinGecko**: Returned HTTP 403 during `ops:app:update` external checks (treated as warning unless `--strict` is set).

## Internal Health Checks
- **system/healthz**: Returned HTTP 403 during `ops:app:update` internal checks (treated as warning unless `--strict` is set).
- **API/Health**: Returned HTTP 502 during `ops:app:update` internal checks (treated as warning unless `--strict` is set).

## Notes
- The external checks above are susceptible to rate limiting and upstream outages. Review service credentials and quota before enabling `--strict`.
- Internal check failures typically indicate route-level auth gates or temporary backend instability. Validate with `php spark routes:auth-audit` and review application logs.
