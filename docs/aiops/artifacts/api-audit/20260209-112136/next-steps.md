# API Audit Next Steps (Untouched Endpoints)

Artifact scope: `docs/aiops/artifacts/api-audit/20260209-112136`

This document lists the **next endpoint batches to fix** after the controllers already touched in the previous pass (`AI/Notes`, `AIOps/health`, `AiOps/status`, `Docs`, `Search`, `ContentEngine posts/topIdeas`, `Investments index`).

## Current snapshot

- Total failed in audit: **161** (all 502)
- Already touched in prior pass: **9 routes**
- Remaining failed routes to remediate: **152**

## Priority plan (recommended order)

## Wave 1 — Public + Auth UX critical (fast wins)

These should fail gracefully or return stable JSON quickly:

1. `GET /API/Health`
2. `GET /API/Health/spark`
3. `GET /API/Support/kb`
4. `GET /API/Chat/me`
5. `GET /API/Budget/Available`
6. `GET /API/Budget/Data`
7. `GET /API/Budget/Credit`
8. `GET /API/Budget/Repayment`

**Goal:** enforce 200/401/403/500 JSON (no 502), verify user context and null-safe service calls.

---

## Wave 2 — Internal token / cron-protected APIs

These should be intentionally unreachable without CLI/internal token and return 403/401 instead of crashing:

1. `GET /API/Alerts/signalFiles`
2. `GET /API/Alerts/signals`
3. `GET /API/Alerts/ingestCsvSignals`
4. `GET /API/Alerts/recalcSignalScores`
5. `GET /API/Discord/coalesce-now`
6. `GET /API/Discord/commandsCatalog`
7. `GET /API/Discord/health`
8. `GET /API/Discord/onboardingSteps`
9. `GET /API/Discord/process-queue`
10. `GET /API/Discord/sharingGuide`
11. `GET /API/DripCampaign/processBatch`
12. `GET /API/Email/autoScheduleDraftCampaigns`
13. `GET /API/Email/processScheduledCampaigns`
14. `GET /API/Email/sendMassTestCampaign`
15. `GET /API/Email/trackBounceWebhook`

**Goal:** add top-of-method guard (`is_cli()` or `internalToken->allowed()`), add structured logs for blocked requests.

---

## Wave 3 — Wallets + Solana dependency-heavy APIs

Likely to fail due to provider/env/service wiring; should degrade safely:

1. `GET /API/Wallets`
2. `GET /API/Wallets/providers`
3. `GET /API/Wallets/summary`
4. `GET /API/Wallets/Plaid/Config-Debug`
5. `GET /API/Wallets/Plaid/Env`
6. `GET /API/Wallets/Plaid/Link-Token`
7. `GET /API/Wallets/Plaid/OAuth-Return`
8. `GET /API/Wallets/Plaid/Webhook`
9. `GET /API/Solana/getAssetsData`
10. `GET /API/Solana/getMarketPrice`
11. `GET /API/Solana/provisionDefaultWallet`
12. `GET /API/Solana/updatePrices`
13. `GET /API/Solana/updateTokens`

**Goal:** null-safe external provider calls; if provider unavailable, return clear 500 JSON (`Service unavailable`) + log context.

---

## Wave 4 — Management + Marketing (largest cluster)

These dominate remaining failures and should be processed in small route families:

### Management (sample high-priority)
- `GET /API/Management/banUnverifiedUsers`
- `GET /API/Management/distributeTodaysNewsContent`
- `GET /API/Management/fetchEmailsToTempScraper`
- `GET /API/Management/fetchNewsEmails`
- `GET /API/Management/generateVoiceScriptManually`
- `GET /API/Management/getUsers`
- `GET /API/Management/getAssets`
- `GET /API/Management/getAlerts`
- `GET /API/Management/processQueuedEmails`
- `GET /API/Management/runCronManually`

### Marketing (sample high-priority)
- `GET /API/Marketing/cronAnalyzeContent`
- `GET /API/Marketing/cronFetchAndGenerateNews`
- `GET /API/Marketing/cronFetchInbox`
- `GET /API/Marketing/cronFetchMarketingEmails`
- `GET /API/Marketing/generateContentFromScraper`
- `GET /API/Marketing/generateDailyContentDigest`
- `GET /API/Marketing/getContentPerformanceAnalytics`
- `GET /API/Marketing/massResendActivationEmails`
- `GET /API/Marketing/triggerPostAutogenOnEmpty`
- `GET /API/Marketing/Timeline`

**Goal:** convert cron/internal routes to intentional forbidden responses when called externally; cap payloads/batch size in HTTP context.

---

## Wave 5 — Predictions and Ops control-plane

### Predictions (cron and market lifecycle)
- `GET /API/Predictions/Markets/Create`
- `GET /API/Predictions/Orders/Place`
- `GET /API/Predictions/Orders/Cancel`
- `GET /API/Predictions/Liquidity/Add`
- `GET /API/Predictions/Liquidity/Remove`
- `GET /API/Predictions/Cron/Lock`
- `GET /API/Predictions/Cron/Unlock`
- `GET /API/Predictions/Cron/Rebalance`
- `GET /API/Predictions/Cron/Settle-Markets`
- `GET /API/Predictions/Cron/Update-Market-States`

### Ops
- `GET /API/Ops/status`
- `GET /API/Ops/reports/latest`

**Goal:** strict CLI/internal token guard + deterministic JSON replies for control-plane endpoints.

---

## Suggested implementation checklist per endpoint

1. Confirm route -> controller -> method is valid and case-safe.
2. Add correct guard first:
   - Internal/Cron: CLI or internal token.
   - Auth API: ensure user ID exists, return 401 if not.
3. Wrap body in `try/catch (\Throwable $e)`.
4. Log with route + message context.
5. Return intentional response code (200/401/403/404/500/501).
6. For expensive jobs in HTTP: apply safe limits (`limit`, `batchSize`) and short-circuit if absent.

## Route family counts (remaining failed endpoints)

- Marketing: 42
- Predictions: 35
- Management: 23
- Email: 9
- Wallets: 8
- Discord: 6
- Investments: 6
- Solana: 5
- Alerts: 4
- Budget: 4
- Health: 2
- Ops: 2
- Other minor groups: remainder

These counts are intended to help schedule the next remediation waves in manageable PRs.
