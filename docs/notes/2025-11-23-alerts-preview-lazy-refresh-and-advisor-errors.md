# Daily Notes — 2025-11-23

## 1. What We Worked On Today

### 1.1 Lazy-loaded Alert Preview (`Preview/Alert/{symbol}`)

- Designed a **lazy-load / on-demand** flow for symbol previews:
  - When a user visits `Preview/Alert/{symbol}`, we:
    - Resolve the latest trade alert for that ticker.
    - Call a new `MyMIAlerts::refreshSymbolSnapshotIfStale()` method.
    - Only hit external APIs (AlphaVantage, MarketAux, fundamentals, ownership, SEC, etc.) if the data is **stale**.
  - All **view data** for the Preview page should come from the **database**, not directly from raw API responses.

- Planned controller changes:
  - `App\Modules\User\Controllers\AlertsController::preview($symbol)` becomes the canonical entry point for `Preview/Alert/{symbol}`.
  - It:
    - Looks up the latest alert in `bf_investment_trade_alerts`.
    - Calls `MyMIAlerts::refreshSymbolSnapshotIfStale($symbol, $exchange, $latestAlert)`.
    - Reloads normalized data from `AlertsModel` and passes it to the existing `Alerts/preview` view.

- Planned library changes:
  - `MyMIAlerts` becomes the **refresh engine**, with methods like:
    - `refreshSymbolSnapshotIfStale($symbol, $exchange, $latestAlert)`
    - `fetchQuoteFromApi()`, `fetchFundamentalsFromApi()`, `fetchOwnershipFromApi()`, `fetchInsidersFromApi()`, `fetchSecFilingsFromApi()`, `fetchHeadlineNewsFromApi()`
  - All external API calls are **centralized** here, with rate limiting and TTL-based caching.

- Planned model changes:
  - `AlertsModel` gains methods to:
    - Fetch the latest alert for a symbol.
    - Track last API refresh timestamps.
    - Write quote + fundamentals snapshots into `bf_investment_trade_alerts`, `bf_investment_tickers`, and `bf_investment_alert_history`.
    - Persist symbol-level stats, ownership, insider trades, SEC filings, and news.

### 1.2 Advisor / Momentum / Voiceover Pipeline

- Confirmed `MyMIAdvisor::generateAdvisorMediaPackage()` is being called from `Management/Alerts` index to:
  - Generate an advisor summary script.
  - Attempt a voiceover via ElevenLabs.
  - Insert a log row into `bf_investment_advisor_log` with:
    - `summary`, `script`, `voiceover_url`, **`voiceover_error`**, `media_json_url`, `chart_url`, `score`, `risk_rating`, `flag_opportunity`, `ticker`, etc.
- Discovered schema mismatch:
  - Log shows: `Unknown column 'voiceover_error' in 'field list'` when inserting into `bf_investment_advisor_log`.
  - This causes a `DatabaseException` and then a memory exhaustion in the error handler.

### 1.3 Wallet & User Context

- Logs show `MyMIWallets::getUserWallets` being called with `user=76.234.126.68` (an IP address) instead of a numeric user ID:
  - This indicates a mismatch between `$cuID` / session user ID and the value being passed into the wallets layer.
  - Needs a review so all wallet calls consistently use the **actual user ID**.

---

## 2. Errors Observed Today

### 2.1 Advisor Log / Voiceover Column

- Error:
  - `mysqli_sql_exception: Unknown column 'voiceover_error' in 'field list'`
  - Occurs during insert into `bf_investment_advisor_log` from `MyMIAdvisor::generateAdvisorMediaPackage()`.
- Impact:
  - Breaks `Management/Alerts` index.
  - Triggers a `DatabaseException` → error view → memory exhaustion from large stack trace.

### 2.2 ElevenLabs Credentials

- Warnings:
  - `MyMIAdvisor::generateVoiceoverWithElevenLabs - API key or voice ID missing.`
  - `Unable to generate audio: Missing ElevenLabs API credentials.`
- Behavior:
  - Advisor pipeline correctly **skips audio generation** when credentials are missing, but still tries to log a `voiceover_error` into a non-existent column.

### 2.3 AlphaVantage / Backfill / Momentum

- Repeated warnings:
  - `⚠️ No history found for THIS / OUTER / CSWI / IGT / ... Consider triggering backfill.`
  - `🔄 Trying AlphaVantage for {symbol}...`
  - `insertAlertSnapshot - skipped: No valid price for {symbol}`
  - `MyMIMomentum::scoreTradeOpportunity - skipped invalid price for {symbol}`
- Observations:
  - Some "symbols" are likely invalid (e.g. `THIS`, `OUTER`, single-letter codes).
  - The system is repeatedly:
    - Detecting "no history."
    - Trying AlphaVantage.
    - Skipping snapshot due to no valid price.
  - This wastes API calls, adds log noise, and could contribute to performance and memory pressure.

---

## 3. Next Steps / Open Tasks

- [ ] Implement and wire `AlertsController::preview($symbol)` → `MyMIAlerts::refreshSymbolSnapshotIfStale()`.
- [ ] Extend `MyMIAlerts` and `AlertsModel` as per design to:
  - [ ] Cache quotes + fundamentals per symbol with TTL.
  - [ ] Write snapshots into `bf_investment_alert_history`.
  - [ ] Update shared ticker metadata in `bf_investment_tickers`.
- [ ] Fix `bf_investment_advisor_log` schema vs `MyMIAdvisor` insert (add `voiceover_error` column or adjust insert).
- [ ] Add symbol validation and retry limits for the backfill / AlphaVantage pipeline to avoid endless retries with invalid tickers.
- [ ] Fix `MyMIWallets::getUserWallets` calls so they always use a numeric user ID instead of an IP address.

## 4. Fixes Implemented Today

- Added a migration for `bf_investment_advisor_log.voiceover_error` and aligned the advisor voiceover flow to store the reason when audio is skipped.
- Softened ElevenLabs handling to avoid API calls when credentials are missing and return structured results for logging.
- Introduced symbol validation + throttled backfill attempts before calling AlphaVantage or inserting snapshots; guard against invalid prices before momentum scoring.
- Hardened wallet lookups to require a numeric user ID and log any non-numeric callers instead of using an IP address.