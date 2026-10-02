# How it works
1. Scheduled ops job `alerts.process` and API endpoints (`Alerts/scanner`, `ingestCsvSignals`, `processTradeAlerts`, `recalcSignalScores`, `fetchMarketAuxNews`) produce alerts into `bf_investment_trade_alerts`.
2. Market data fetched by AlertsModel (AlphaVantage, TwelveData, Polygon fallbacks).
3. A member opens Alerts; `premium_guard('alerts.trade_alerts')` calls `PremiumEntitlementService::resolve()` which reads `bf_users_subscriptions` / user flags.
4. Non-entitled users are denied (403 JSON for API/AJAX, redirect otherwise).
5. Delivery today: web pages, email and Discord processors (per-subscriber routing unverified).
Unverified: refresh cadence, stale-data banner, history retention.
