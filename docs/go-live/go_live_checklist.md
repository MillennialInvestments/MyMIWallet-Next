# Go-Live Checklist (Primary)

Complete every section before promoting to production. Use the severity tags to prioritize blockers: **[P0]** must-pass to launch, **[P1]** should-pass with clear mitigations, **[P2]** minor gaps acceptable only with approval.

## 1) Platform Basics
- [ ] [P0] Home page renders with layout and assets
  **Where:** `/` → `Home::index`
  **Steps:** Load homepage on fresh session and via incognito; verify no forced `index.php` in URL.
  **Expected:** Page loads without PHP notices; nav and footer visible.
  **Confirm Logs:** `bf_error_logs` empty for route; browser console clean.
- [ ] [P1] Public marketing pages resolve
  **Where:** `/Corporate-Earnings`, `/Economic-Calendar`, `/Getting-Started`, `/Memberships`, `/Privacy-Policy`, `/Terms-Of-Service` → `Home::*`
  **Steps:** Hit each URL and navigate nested segments.
  **Expected:** Theme consistent; breadcrumbs/links valid.
  **Confirm Logs:** `bf_error_logs` shows no WARNING/ERROR for Home controller.
- [ ] [P1] Navigation links point to valid routes
  **Where:** Primary navbar/footer links to `/Blog/*`, `/Support`, `/login`, `/register`, `/Search`
  **Steps:** Click through; ensure 200/redirects, no 404.
  **Expected:** Links map to live routes; no `index.php` required.
  **Confirm Logs:** `bf_error_logs` and access logs free of 404 spikes.
- [ ] [P2] SEO basics present
  **Where:** Public pages, sitemap/robots if present
  **Steps:** View source to confirm `<title>`, meta description, canonical tags; check robots.txt.
  **Expected:** Titles/meta populated; robots allows prod crawling policy.
  **Confirm Logs:** `bf_error_logs` clean; optional lighthouse report stored.

## 2) Authentication + Account Lifecycle
- [ ] [P0] Register new user
  **Where:** `/register` → `AuthController::attemptRegister`
  **Steps:** Submit valid email/password; include referral path `/register/{ref}`.
  **Expected:** Account created; session/verification flow starts; no cache-key errors.
  **Confirm Logs:** `bf_error_logs` has no CRITICAL; auth audit entries recorded.
- [ ] [P0] Login
  **Where:** `/login` → `AuthController::attemptLogin`
  **Steps:** Sign in with valid credentials; check throttling response after repeated attempts.
  **Expected:** Successful login sets session; throttling still allows legitimate access.
  **Confirm Logs:** `bf_error_logs` silent; session logs show user ID.
- [ ] [P0] Password reset and activation
  **Where:** `/forgot-password`, `/reset-password`, `/activate-account` → `AuthController::*`
  **Steps:** Request reset email, follow token, complete reset; resend/activate flows.
  **Expected:** Emails sent via SMTP; tokens validated; login succeeds post-reset.
  **Confirm Logs:** Mail transport logs + `bf_error_logs` clear of warnings.
- [ ] [P1] Email verification (if enabled)
  **Where:** Activation endpoints above
  **Steps:** Complete activation link from email.
  **Expected:** User status flips to verified; gated pages accessible.
  **Confirm Logs:** `bf_error_logs` records INFO only; database status updated.
- [ ] [P1] Role and membership access
  **Where:** `/Account/*`, dashboards under `App\Modules\User` (login filter)
  **Steps:** Test free vs premium vs admin; validate restricted links hidden/blocked.
  **Expected:** Unauthorized roles redirected or receive 403 without leaking stack traces.
  **Confirm Logs:** `bf_error_logs` no permission errors; access logs show 302/403 as expected.
- [ ] [P1] Logout/session handling
  **Where:** `/logout` → `AuthController::logout`
  **Steps:** Log out, attempt to access `/Account`; verify session cookies cleared.
  **Expected:** Redirect to login; no stale sessions.
  **Confirm Logs:** `bf_error_logs` clean; session store shows removal.
- [ ] [P1] Abuse/rate limit sanity
  **Where:** Auth endpoints & API filters
  **Steps:** Attempt rapid login/registration to ensure throttling and cronKey filters hold.
  **Expected:** Rate limiting responses without impacting legit flows.
  **Confirm Logs:** `bf_error_logs` shows no flood of CRITICAL; web server logs show 429 when expected.

## 3) Core User Dashboards
- [ ] [P0] Dashboard loads without `index.php`
  **Where:** `/Account`, `/Account/Activity`, `/Profile/{id}`, `/Performance` → `DashboardController::*`
  **Steps:** Navigate while logged in; refresh pages.
  **Expected:** Layout renders; no CI_DEBUG output; login filter enforced.
  **Confirm Logs:** `bf_error_logs` empty; browser console clean.
- [ ] [P1] Widgets/APIs hydrate
  **Where:** Dashboard widgets hitting `BudgetController`/`InvestmentsController` JSON routes
  **Steps:** Inspect network calls; ensure 200 responses with expected JSON shape.
  **Expected:** Charts/tables populate; null-safe fallbacks for missing data.
  **Confirm Logs:** `bf_error_logs` lacks undefined index notices; API responses logged as INFO only.
- [ ] [P1] Error handling UX
  **Where:** Any dashboard error surfaces
  **Steps:** Simulate API failure (disable network or use bad query param).
  **Expected:** Friendly message, no raw stack trace, `bf_error_logs` captures context.
  **Confirm Logs:** Error entries recorded with DatabaseLoggerHandler; no fatal traces to browser.

## 4) Budget Module
- [ ] [P0] Add income/bills/credit/debt
  **Where:** `/Budget/*` APIs → `BudgetController::addLinkedAccount` equivalents & data routes
  **Steps:** Create income entry, bill, credit/debt account.
  **Expected:** Records saved; totals adjust in UI.
  **Confirm Logs:** `bf_error_logs` free of SQL/validation errors; DB shows inserts.
- [ ] [P1] Forecast and due date validation
  **Where:** Budget forecast generation routes (`BudgetController::trends`, `::cashFlow`)
  **Steps:** Trigger forecast; include invalid due_date to confirm validation.
  **Expected:** Forecast renders; invalid data rejected with user-friendly error.
  **Confirm Logs:** `bf_error_logs` no CRITICAL; validation warnings logged as INFO.
- [ ] [P1] Annual overview and summaries
  **Where:** `/Budget/net-worth`, `/Budget/cash-flow`, `/Budget/summary`
  **Steps:** Load summaries for test accounts with varied data.
  **Expected:** Charts load; pagination/filters work.
  **Confirm Logs:** `bf_error_logs` empty; API latency within expectations.
- [ ] [P1] Budget dashboard API responses
  **Where:** `/Budget/Data`, `/Budget/Credit`, `/Budget/Available`, `/Budget/Repayment`
  **Steps:** Call endpoints directly.
  **Expected:** JSON structures match UI contract; no 500s.
  **Confirm Logs:** `bf_error_logs` no missing index/undefined variable errors.

## 5) Investments + Watchlists
- [ ] [P0] Symbol search works
  **Where:** `/API/Investments/searchTickers`, `/Search` → `InvestmentsController::searchTickers`/`SearchController`
  **Steps:** Query stock, ETF, crypto symbols; ensure limit clamping.
  **Expected:** Results include source metadata; navigation routes to `/Investments/Symbol/{symbol}`.
  **Confirm Logs:** `bf_error_logs` free of API errors; rate limits respected.
- [ ] [P1] Watchlist add/remove
  **Where:** `/Investments` and related actions → `InvestmentsController::*`
  **Steps:** Add and remove symbols from watchlist; refresh page.
  **Expected:** Watchlist table updates; no duplicate entries.
  **Confirm Logs:** `bf_error_logs` clean; DB change confirmed.
- [ ] [P1] Insights gating
  **Where:** Watchlist “Insights” button (free vs premium)
  **Steps:** Test with free and premium accounts.
  **Expected:** Premium unlocks insights; free shows upgrade prompt without 403.
  **Confirm Logs:** `bf_error_logs` no permission errors.
- [ ] [P1] Prediction form pipeline
  **Where:** Prediction submission tied to watchlist storage
  **Steps:** Submit prediction; verify record stored to watchlist tables when enabled.
  **Expected:** Entry persisted; UI shows confirmation.
  **Confirm Logs:** `bf_error_logs` empty; DB rows present.

## 6) Alerts System (Trade Alerts)
- [ ] [P0] Email scrape populates staging table
  **Where:** `/API/Alerts/fetchEmailAlerts` → `AlertsController::fetchEmailAlerts`
  **Steps:** Trigger scrape; inspect `bf_investment_scraper` for new rows.
  **Expected:** Emails ingested with parsed tickers; invalid rows flagged.
  **Confirm Logs:** `bf_error_logs` shows no parsing failures; cron output captured.
- [ ] [P0] Processing moves to trade alerts
  **Where:** `/API/Alerts/processTradeAlerts`, `/API/Management/processAllTradeAlerts`
  **Steps:** Run processing after scrape.
  **Expected:** Records transition to `bf_investment_trade_alerts`; `processed` flags set to prevent duplicates.
  **Confirm Logs:** `bf_error_logs` clean; history tables populated.
- [ ] [P1] Ticker enrichment and history snapshots
  **Where:** `/API/Alerts/fetchMarketAuxNews/{symbol}`, `/API/Alerts/updateBatchPrices`
  **Steps:** Enrich an alert; verify `bf_investment_tickers` and `bf_investment_alert_history` updated.
  **Expected:** Snapshots stored; no missing ticker errors.
  **Confirm Logs:** `bf_error_logs` info-only; DB logger handler records success.
- [ ] [P1] Notification fan-out
  **Where:** `/API/Alerts/sendDiscordAlerts`, `/API/Management/sendAllDiscordAlerts`
  **Steps:** Send Discord notification for alert and ensure single delivery.
  **Expected:** Notification marked sent; `notified` flag set; no duplicates.
  **Confirm Logs:** `bf_error_logs` clean; Discord webhook response logged.
- [ ] [P1] Cron endpoints secured
  **Where:** `/API/Management/*` with `cronKey` filter
  **Steps:** Call without cronKey and expect rejection; call with cronKey succeeds.
  **Expected:** Unauthorized requests blocked; authorized runs complete.
  **Confirm Logs:** Access logs show 403 for missing cronKey; `bf_error_logs` free of leakage.

## 7) Marketing Automation
- [ ] [P0] Email scrape to temp scraper
  **Where:** `/API/Management/fetchEmailsToTempScraper` → `ManagementController::fetchEmailsToTempScraper`
  **Steps:** Run fetch; inspect `bf_marketing_temp_scraper` rows.
  **Expected:** Valid emails stored; invalid entries skipped (missing title/too short/heavy HTML).
  **Confirm Logs:** `bf_error_logs` clean; skipped counts noted.
- [ ] [P1] Summaries generation
  **Where:** `/API/Management/fetchLatestSummaries`, `/API/Management/generatePostsFromSummary/{id?}`
  **Steps:** Generate summaries and posts.
  **Expected:** `bf_marketing_scraper` populated; posts linked to summaries.
  **Confirm Logs:** `bf_error_logs` info-only; no null property warnings.
- [ ] [P1] Preview modal and live refresh
  **Where:** UI preview via `MarketingController::generateLivePreview`/`dynamicModalLoader`
  **Steps:** Open preview modal; test live refresh if enabled.
  **Expected:** Modal renders content; refresh updates without full page reload.
  **Confirm Logs:** Browser console clean; `bf_error_logs` empty.
- [ ] [P1] Distribution safety
  **Where:** `/API/Management/sendToZapierManually`, `/Marketing/schedulePost/*`
  **Steps:** Trigger Zapier and scheduling paths (admin only).
  **Expected:** Only admins can send; queues populated once.
  **Confirm Logs:** `bf_error_logs` free of permission errors; job logs show single enqueue.
- [ ] [P2] Backfill function
  **Where:** `ManagementController::reprocessIncompleteEmails` via cron/admin
  **Steps:** Run backfill; ensure no duplicate posts and temp rows cleared when completed.
  **Expected:** Backfill completes; idempotent runs safe.
  **Confirm Logs:** `bf_error_logs` info-only.

## 8) Exchange / Wallet Aggregation (If enabled)
- [ ] [P0] Plaid connect flow
  **Where:** `/Broker/fetchPlaidLinkToken`, `/Broker/linkPlaidAccount`
  **Steps:** Initiate Plaid Link; complete exchange tokens.
  **Expected:** Tokens stored securely; linked accounts appear in `/Broker/linked-accounts`.
  **Confirm Logs:** `bf_error_logs` free of token leakage; sensitive keys not echoed.
- [ ] [P1] Solana integration stability
  **Where:** Wallet aggregation services (Solana snapshot handlers)
  **Steps:** Sync wallet; monitor memory/HTTP 403 handling.
  **Expected:** No memory leak; 403 gracefully handled with fallback message.
  **Confirm Logs:** `bf_error_logs` empty; monitoring shows stable memory.
- [ ] [P1] Disabled exchange endpoints safe
  **Where:** `/Broker/*` & `/Wallets` when provider disabled
  **Steps:** Hit endpoints with provider turned off.
  **Expected:** Return safe errors without stack traces; UI shows “temporarily unavailable.”
  **Confirm Logs:** `bf_error_logs` info-level only; no CRITICAL.

## 9) Support + Custom Error Pages
- [ ] [P0] Error pages render
  **Where:** Force 403/404/500/504 via test routes or server rules
  **Steps:** Trigger each status page.
  **Expected:** Custom error pages render; auto-redirect to `/Support` after 5s works.
  **Confirm Logs:** `bf_error_logs` records event; no raw stack traces in browser.
- [ ] [P1] Support knowledge base
  **Where:** `/Support/Support/kb` and `/Support/Support/kb/{article}`
  **Steps:** Load articles and navigation.
  **Expected:** Pages load; login requirement enforced if configured.
  **Confirm Logs:** `bf_error_logs` clean; access logs no 404.
- [ ] [P1] Error alerting
  **Where:** Logging pipeline/Email alert hooks
  **Steps:** Trigger controlled warning; ensure email alert fires (if configured).
  **Expected:** Alert delivered once; no loops.
  **Confirm Logs:** `bf_error_logs` entry with correct level; mail transport log shows send.

## 10) Logging, Monitoring, and Diagnostics
- [ ] [P0] DatabaseLoggerHandler writing to `bf_error_logs`
  **Where:** Logging configuration
  **Steps:** Emit test warning from CLI/web.
  **Expected:** Entry written with context; no permission errors.
  **Confirm Logs:** Row appears in `bf_error_logs`; writable/logs also captures file output if configured.
- [ ] [P1] Log summarize command
  **Where:** `php spark logs:triage` or equivalent
  **Steps:** Run command in staging; review output.
  **Expected:** Completes successfully; highlights top errors.
  **Confirm Logs:** CLI output stored; `bf_error_logs` unchanged except intentional entry.
- [ ] [P1] Production-safe log level
  **Where:** `.env` (`CI_ENVIRONMENT=production`, `CI_DEBUG=false`, logger levels)
  **Steps:** Verify env values match prod readiness doc.
  **Expected:** Debug toolbar disabled; only warning+ logged.
  **Confirm Logs:** `bf_error_logs` normal volume; no debug traces.
- [ ] [P2] No alert loops
  **Where:** Error alert integrations (email/Discord)
  **Steps:** Confirm single notification per unique error hash.
  **Expected:** No repeat floods.
  **Confirm Logs:** Alert counts match events.

## 11) Performance + Scaling
- [ ] [P1] Pagination on heavy endpoints
  **Where:** Investments, alerts, marketing listings (`fetchGeneratedSummaries`, watchlists)
  **Steps:** Load high-volume datasets.
  **Expected:** Pagination present; response times acceptable.
  **Confirm Logs:** `bf_error_logs` free of timeout warnings; access logs show stable latency.
- [ ] [P1] Cron batching/queueing
  **Where:** `/API/Management/runCronManually`, `/API/Management/processQueuedEmails`, marketing cron tasks
  **Steps:** Run batch with sample data.
  **Expected:** Batches process within limits; queue depth monitored.
  **Confirm Logs:** Cron logs show batch sizes; `bf_error_logs` clean.
- [ ] [P1] External API rate limits
  **Where:** AlphaVantage and other providers (`fetchAlphaVantageNewsForTradeAlerts`, `InvestmentsController` data fetches)
  **Steps:** Run multiple sequential calls.
  **Expected:** Throttling respected; exponential backoff or caching active.
  **Confirm Logs:** `bf_error_logs` shows no 429 storms.
- [ ] [P2] Redis cache behavior (if enabled)
  **Where:** Cache-backed endpoints (wallet/budget snapshots)
  **Steps:** Confirm cache hits/misses and TTLs.
  **Expected:** Cache warms; fallback works when cache disabled.
  **Confirm Logs:** Cache metrics; `bf_error_logs` free of connection errors.

## 12) Security
- [ ] [P0] CSRF coverage
  **Where:** Web forms and `/API/*` routes with state changes
  **Steps:** Submit form without CSRF token (where applicable) to confirm rejection.
  **Expected:** CSRF tokens required; APIs secured via filters/headers.
  **Confirm Logs:** `bf_error_logs` notes CSRF mismatch; no successful unauthorized change.
- [ ] [P0] XSS and output escaping
  **Where:** User-generated content in dashboards, marketing previews, support articles
  **Steps:** Render HTML/script payloads in inputs.
  **Expected:** Output escaped; no script execution.
  **Confirm Logs:** `bf_error_logs` clean; browser console free of injected scripts.
- [ ] [P0] SQL injection protections
  **Where:** API endpoints with params (`getInvestmentData/{symbol}`, search)
  **Steps:** Submit SQL-like payloads.
  **Expected:** Parameters bound; no errors or data leaks.
  **Confirm Logs:** `bf_error_logs` clean; DB logs no malformed queries.
- [ ] [P1] Access control on `/API/*`
  **Where:** `/API/Management/*` (cronKey), `/API/Alerts/*`, `/API/Marketing/*`
  **Steps:** Attempt unauthorized calls.
  **Expected:** Requests blocked/logged; no data returned.
  **Confirm Logs:** `bf_error_logs` captures unauthorized attempts; access logs show 403.
- [ ] [P1] Secrets hygiene
  **Where:** Repo and `.env`
  **Steps:** Confirm no secrets committed; `.env` contains production keys securely.
  **Expected:** Git clean of secrets; `.env` readable only on server.
  **Confirm Logs:** Secret scan output; `bf_error_logs` free of credential warnings.

## 13) Deployment / Ops Readiness
- [ ] [P0] baseURL and HTTPS
  **Where:** `.env` (`app.baseURL`, `app.forceGlobalSecureRequests`)
  **Steps:** Validate URLs and HTTPS enforcement per `env_production_readiness.md`.
  **Expected:** Correct domain; HTTP redirects to HTTPS; no mixed content.
  **Confirm Logs:** Access logs show 301/308 redirects; `bf_error_logs` clean.
- [ ] [P0] SMTP, queue/cache, encryption keys
  **Where:** `.env` settings for mail, Redis, encryption keys
  **Steps:** Cross-check values; send test email; validate cache connectivity.
  **Expected:** Email delivered; queues/caches reachable; keys present.
  **Confirm Logs:** Mail logs success; `bf_error_logs` no connection errors.
- [ ] [P0] Maintenance mode toggle and banner plan
  **Where:** Deployment runbook
  **Steps:** Validate ability to enable maintenance and communicate to users.
  **Expected:** Toggle works; serving maintenance page without leaking stack traces.
  **Confirm Logs:** `bf_error_logs` clean; access logs show maintenance responses.
- [ ] [P0] Backup and rollback readiness
  **Where:** [`rollback_plan.md`](./rollback_plan.md)
  **Steps:** Confirm latest DB backups exist; capture app version snapshot before deploy.
  **Expected:** Rollback steps rehearsed; backups verified.
  **Confirm Logs:** Backup job logs; `bf_error_logs` no backup failures.
- [ ] [P1] DreamHost deployment constraints respected
  **Where:** DreamHost VPS docs
  **Steps:** Ensure no `sudo` required; nginx/php-fpm reload commands available.
  **Expected:** Deployment scripts use user-space commands only.
  **Confirm Logs:** Deployment logs show user-level reloads; no permission denials.
