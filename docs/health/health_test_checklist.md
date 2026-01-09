# Health Tests & Logging Coverage Checklist

This checklist is **evidence-based**: every item references real files, methods, and tables found in the repo. Use this as the blueprint for Spark health tests.

## Auth & Account Lifecycle

✅ Health Test: `php spark auth:health-registration`
Priority: P0
Feature: Registration & onboarding bootstrap
Primary Entry Point(s):
- `app/Controllers/AuthController.php::attemptRegister()`
- `app/Models/UserModel.php::_provisionDefaultSolana()`
Dependencies:
- DB: `users`, `bf_user_sessions` (session tracking), `bf_role_user` (group assignment)
- Services: `AuthAuditService`, `OnboardingProgressService`
- Email: activator email flow (`service('activator')` in `AuthController`)
What it should verify (checklist):
- Step 1: Create a test user payload and invoke registration logic (or simulate a registration transaction).
- Step 2: Verify insert into `users` and group assignment execution.
- Step 3: Confirm onboarding record creation (via `OnboardingProgressService`).
- Step 4: Validate default Solana provisioning path is reachable (no fatal errors).
What it should log: ENV, Steps, Assertions, Summary; include user_id, username, email hash, onboarding status.
Failure modes to detect: validation errors, group insert failures, activation email send failures, default Solana provisioning errors.
Where to implement: `app/Commands/AuthRegistrationHealth.php` (new), reuse `AuthController`/`UserModel` methods.
Suggested command name: `auth:health-registration`
Expected log file: `writable/logs/health_auth.log`

✅ Health Test: `php spark auth:health-activation`
Priority: P0
Feature: Activation / verification
Primary Entry Point(s):
- `app/Controllers/AuthController.php::activateAccount()`
- `app/Controllers/AuthController.php::resendRegistrationActivation()`
Dependencies:
- DB: `users`
- Email: activation email flow (`service('activator')`)
What it should verify (checklist):
- Step 1: Locate an inactive user with activation hash.
- Step 2: Run activation flow and verify `users.active` flips to true.
- Step 3: Validate resend activation path handles throttle and email dispatch.
What it should log: activation status, resend status, throttler decision.
Failure modes to detect: missing activation hash, mail send failures, throttler blocking.
Where to implement: `app/Commands/AuthActivationHealth.php` (new).
Suggested command name: `auth:health-activation`
Expected log file: `writable/logs/health_auth.log`

✅ Health Test: `php spark auth:health-login`
Priority: P0
Feature: Login + session setup
Primary Entry Point(s):
- `app/Controllers/AuthController.php::attemptLogin()`
Dependencies:
- DB: `users`
- Session: `CodeIgniter\Session`
What it should verify (checklist):
- Step 1: Attempt login with a known test user.
- Step 2: Confirm `logged_in()` and `session('user_id')` are set.
- Step 3: Confirm onboarding login mark (`OnboardingProgressService::markVerifiedLogin`).
What it should log: login identifier, user_id, session keys set.
Failure modes to detect: bad credentials, missing session persistence, missing onboarding updates.
Where to implement: `app/Commands/AuthLoginHealth.php` (new).
Suggested command name: `auth:health-login`
Expected log file: `writable/logs/health_auth.log`

✅ Health Test: `php spark auth:health-password-reset`
Priority: P1
Feature: Password reset flow
Primary Entry Point(s):
- `app/Controllers/AuthController.php::attemptForgot()`
- `app/Controllers/AuthController.php::attemptReset()`
- `app/Models/UserModel.php::logResetAttempt()`
Dependencies:
- DB: `users`, `bf_password_reset_attempts`
- Email: reset email dispatch
What it should verify (checklist):
- Step 1: Request reset token for a known user.
- Step 2: Validate reset hash persists and `logResetAttempt` writes.
- Step 3: Apply reset using token and verify password hash change.
What it should log: reset request status, token generation, reset success.
Failure modes to detect: token not stored, email not sent, reset token expired.
Where to implement: `app/Commands/AuthPasswordResetHealth.php` (new).
Suggested command name: `auth:health-password-reset`
Expected log file: `writable/logs/health_auth.log`

✅ Health Test: `php spark auth:health-sessions`
Priority: P1
Feature: Session persistence + revoke flow
Primary Entry Point(s):
- `app/Modules/User/Controllers/AccountController.php::sessions()`
- `app/Modules/User/Controllers/AccountController.php::revokeSession()`
- `app/Models/UserSessionModel.php::isRevoked()`
Dependencies:
- DB: `bf_user_sessions`
What it should verify (checklist):
- Step 1: Insert a dummy session row for a test user.
- Step 2: Load sessions list and confirm entry is visible.
- Step 3: Revoke session and confirm `revoked` flag is true.
What it should log: session_id, revoked status, affected rows.
Failure modes to detect: missing session rows, revoke update failures.
Where to implement: `app/Commands/AuthSessionHealth.php` (new).
Suggested command name: `auth:health-sessions`
Expected log file: `writable/logs/health_auth.log`

✅ Health Test: `php spark auth:health-permissions`
Priority: P1
Feature: Role/permission integrity
Primary Entry Point(s):
- `app/Models/RoleModel.php`
- `app/Models/PermissionModel.php`
- `app/Models/RoleUserModel.php`
- `app/Models/PermissionRoleModel.php`
Dependencies:
- DB: `bf_roles`, `bf_permissions`, `bf_role_user`, `bf_permission_role`
What it should verify (checklist):
- Step 1: Fetch a known role and permission by slug.
- Step 2: Validate role-user and permission-role joins exist for a test user.
- Step 3: Confirm authorization checks do not throw.
What it should log: role slug, permission slug, join counts.
Failure modes to detect: missing roles, broken joins, permission lookup failures.
Where to implement: `app/Commands/AuthPermissionHealth.php` (new).
Suggested command name: `auth:health-permissions`
Expected log file: `writable/logs/health_auth.log`

✅ Health Test: `php spark auth:health-spam-check`
Priority: P2
Feature: Spam/suspicious account detection
Primary Entry Point(s):
- `app/Libraries/MyMIUser.php::findPotentialSpamUsers()`
- `app/Modules/APIs/Controllers/ManagementController.php::checkForSpamUsers()`
Dependencies:
- DB: `users`
What it should verify (checklist):
- Step 1: Run the spam detection helper.
- Step 2: Confirm it returns a list without error.
- Step 3: Validate response payload shape.
What it should log: count of flagged users, sample IDs (masked).
Failure modes to detect: unexpected exceptions while scanning users.
Where to implement: `app/Commands/AuthSpamHealth.php` (new).
Suggested command name: `auth:health-spam-check`
Expected log file: `writable/logs/health_auth.log`

## Budget System

✅ Health Test: `php spark budget:health-forecast`
Priority: P0
Feature: Add income + forecast generation
Primary Entry Point(s):
- `app/Modules/User/Controllers/BudgetController.php::add()`
- `app/Services/BudgetService.php::forecastBasedOnTrends()`
- `app/Models/BudgetModel.php::buildForecast()`
Dependencies:
- DB: `bf_users_budgeting`
What it should verify (checklist):
- Step 1: Insert a budget income record (or simulate insert) for a test user.
- Step 2: Run forecast generation for 12 months.
- Step 3: Validate forecast rows and totals > 0.
What it should log: user_id, record_id, forecast rows, totals.
Failure modes to detect: missing budget rows, empty forecast, invalid date math.
Where to implement: `app/Commands/BudgetForecastHealth.php` (new).
Suggested command name: `budget:health-forecast`
Expected log file: `writable/logs/health_budget.log`

✅ Health Test: `php spark budget:health-repayment`
Priority: P0
Feature: Credit/debt repayment calculations
Primary Entry Point(s):
- `app/Services/BudgetService.php::calculateRepaymentSchedules()`
- `app/Services/BudgetService.php::buildRepaymentSnapshot()`
- `app/Modules/User/Controllers/BudgetController.php::repayment()`
Dependencies:
- DB: `bf_users_budgeting`
What it should verify (checklist):
- Step 1: Load credit accounts for a test user.
- Step 2: Compute repayment schedules and verify expected shape.
- Step 3: Confirm API response shape for repayment summary.
What it should log: number of accounts, strategy used, schedule totals.
Failure modes to detect: missing credit accounts, null schedule results.
Where to implement: `app/Commands/BudgetRepaymentHealth.php` (new).
Suggested command name: `budget:health-repayment`
Expected log file: `writable/logs/health_budget.log`

✅ Health Test: `php spark budget:health-recurring`
Priority: P1
Feature: Recurring schedules + projection
Primary Entry Point(s):
- `app/Modules/User/Controllers/BudgetController.php::recurringSchedule()`
- `app/Modules/User/Controllers/BudgetController.php::approveRecurringSchedule()`
- `app/Services/BudgetService.php::forecastRecurringSchedule()`
Dependencies:
- DB: `bf_users_budgeting`
What it should verify (checklist):
- Step 1: Load a recurring account record.
- Step 2: Run forecastRecurringSchedule for 12 months.
- Step 3: Confirm schedule entries are ordered and future-dated.
What it should log: account_id, schedule_count, next_due_date.
Failure modes to detect: missing recurring config, invalid dates, empty schedules.
Where to implement: `app/Commands/BudgetRecurringHealth.php` (new).
Suggested command name: `budget:health-recurring`
Expected log file: `writable/logs/health_budget.log`

✅ Health Test: `php spark budget:health-dashboard-api`
Priority: P0
Feature: Budget dashboard API endpoints
Primary Entry Point(s):
- `app/Modules/APIs/Controllers/BudgetController.php::apiBudgetData()`
- `app/Modules/APIs/Controllers/BudgetController.php::apiCreditData()`
- `app/Modules/APIs/Controllers/BudgetController.php::apiAvailableData()`
- `app/Modules/APIs/Controllers/BudgetController.php::apiRepaymentSummary()`
Dependencies:
- DB: `bf_users_budgeting`
- Cache: CodeIgniter cache (used in rememberUserData)
What it should verify (checklist):
- Step 1: Call each API method for a test user.
- Step 2: Validate response `status` and non-empty `data`.
- Step 3: Validate `fromCache` toggles as expected.
What it should log: endpoint name, status, payload keys, cache hit.
Failure modes to detect: auth guard failures, empty payloads, cache exceptions.
Where to implement: `app/Commands/BudgetApiHealth.php` (new).
Suggested command name: `budget:health-dashboard-api`
Expected log file: `writable/logs/health_budget.log`

## Investments System

✅ Health Test: `php spark invest:health-watchlist`
Priority: P1
Feature: Symbol search / add watchlist
Primary Entry Point(s):
- `app/Modules/User/Controllers/InvestmentsController.php::addWatchlist()`
- `app/Models/InvestmentModel.php::addToWatchlist()`
Dependencies:
- DB: `bf_users_watchlist`
What it should verify (checklist):
- Step 1: Add a known symbol to watchlist.
- Step 2: Confirm insert into `bf_users_watchlist`.
- Step 3: Validate duplicate handling.
What it should log: user_id, symbol, insert status.
Failure modes to detect: duplicate insert failures, invalid symbol normalization.
Where to implement: `app/Commands/InvestWatchlistHealth.php` (new).
Suggested command name: `invest:health-watchlist`
Expected log file: `writable/logs/health_invest.log`

✅ Health Test: `php spark invest:health-quotes`
Priority: P0
Feature: Price fetch + caching
Primary Entry Point(s):
- `app/Libraries/MyMIInvestments.php::getMarketQuoteSafe()`
- `app/Libraries/MyMIAlphaVantage.php::getAlphaVantageResponse()`
Dependencies:
- Cache: CodeIgniter cache
- Env: `ALPHA_VANTAGE_API_KEYS`, `ALPHA_VANTAGE_API_KEY*`
What it should verify (checklist):
- Step 1: Fetch a market quote for a known symbol.
- Step 2: Confirm response contains price > 0 or explicit dummy fallback.
- Step 3: Validate cache save + read path.
What it should log: symbol, source (alpha/cache/dummy), cache hit.
Failure modes to detect: rate limit reached, missing API keys, null responses.
Where to implement: `app/Commands/InvestQuoteHealth.php` (new).
Suggested command name: `invest:health-quotes`
Expected log file: `writable/logs/health_invest.log`

✅ Health Test: `php spark invest:health-portfolio`
Priority: P1
Feature: Portfolio performance evaluation
Primary Entry Point(s):
- `app/Services/InvestmentService.php::getInvestmentData()`
- `app/Modules/User/Controllers/InvestmentsController.php::getInvestmentPerformance()`
- `app/Models/InvestmentModel.php`
Dependencies:
- DB: `bf_users_trades`
What it should verify (checklist):
- Step 1: Load user portfolio rows.
- Step 2: Compute totals and performance metrics.
- Step 3: Validate non-empty overview payload.
What it should log: trade count, total value, performance summary.
Failure modes to detect: empty portfolio when trades exist, invalid numeric casts.
Where to implement: `app/Commands/InvestPortfolioHealth.php` (new).
Suggested command name: `invest:health-portfolio`
Expected log file: `writable/logs/health_invest.log`

✅ Health Test: `php spark invest:health-predictions-cron`
Priority: P1
Feature: Predictions pipeline (cron health)
Primary Entry Point(s):
- `app/Modules/APIs/Controllers/PredictionsController.php::cronFetchMarketData()`
- `app/Modules/APIs/Controllers/PredictionsController.php::cronUpdateMarketPrices()`
Dependencies:
- DB: predictions tables created by `app/Database/Migrations/2025-09-09-0000*_CreatePredictions*.php`
What it should verify (checklist):
- Step 1: Call a lightweight cron method in dry-run mode.
- Step 2: Validate response payload and timing.
- Step 3: Confirm job logging occurs when enabled.
What it should log: cron name, records processed, duration.
Failure modes to detect: missing tables, cron auth token missing, silent no-op.
Where to implement: `app/Commands/InvestPredictionsHealth.php` (new).
Suggested command name: `invest:health-predictions-cron`
Expected log file: `writable/logs/health_invest.log`

## Alerts System (Trade Alerts)

✅ Health Test: `php spark alerts:health-scrape-email`
Priority: P0
Feature: Email scrape → `bf_investment_scraper` insert
Primary Entry Point(s):
- `app/Libraries/MyMIAlerts.php::fetchAndStoreAlertsEmails()`
- `app/Models/AlertsModel.php::storeEmails()`
Dependencies:
- DB: `bf_investment_scraper`
- Email inbox access (via configured email services)
What it should verify (checklist):
- Step 1: Fetch latest alert emails (dry-run allowed).
- Step 2: Insert at least one record into `bf_investment_scraper`.
- Step 3: Validate duplicate detection using email identifier.
What it should log: fetched count, inserted count, skipped count.
Failure modes to detect: email fetch failure, insert failure, duplicates not detected.
Where to implement: `app/Commands/AlertsScrapeHealth.php` (new).
Suggested command name: `alerts:health-scrape-email`
Expected log file: `writable/logs/health_alerts.log`

✅ Health Test: `php spark alerts:health-parse-symbols`
Priority: P0
Feature: Parse symbols → trade alerts upsert
Primary Entry Point(s):
- `app/Models/AlertsModel.php::processScrapedSymbols()`
- `app/Models/AlertsModel.php::parseEmailForTradeAlert()`
- `app/Modules/APIs/Controllers/AlertsController.php::processAlerts()`
Dependencies:
- DB: `bf_investment_scraper`, `bf_investment_trade_alerts`
What it should verify (checklist):
- Step 1: Take a known scraper record and parse symbols.
- Step 2: Upsert into `bf_investment_trade_alerts`.
- Step 3: Mark scraper record as processed.
What it should log: scraper_id, symbols parsed, alert insert/update count.
Failure modes to detect: no symbols detected, partial updates, scraper record not marked processed.
Where to implement: `app/Commands/AlertsParseHealth.php` (new).
Suggested command name: `alerts:health-parse-symbols`
Expected log file: `writable/logs/health_alerts.log`

✅ Health Test: `php spark alerts:health-market-refresh`
Priority: P1
Feature: Market data refresh for alerts
Primary Entry Point(s):
- `app/Modules/APIs/Controllers/AlertsController.php::updateTradeAlerts()`
- `app/Models/AlertsModel.php::batchInsertMarketData()`
Dependencies:
- DB: `bf_investment_trade_alerts`, `bf_investment_tickers`
- API: AlphaVantage (via `MyMIAlphaVantage`)
What it should verify (checklist):
- Step 1: Select active tickers for refresh.
- Step 2: Fetch market data for a capped batch.
- Step 3: Update price/volume fields in trade alerts.
What it should log: symbols processed, api status, updated row counts.
Failure modes to detect: rate-limit notice, missing API key, batch update failures.
Where to implement: `app/Commands/AlertsMarketRefreshHealth.php` (new).
Suggested command name: `alerts:health-market-refresh`
Expected log file: `writable/logs/health_alerts.log`

✅ Health Test: `php spark alerts:health-discord-notify`
Priority: P1
Feature: Discord notification send (dry-run)
Primary Entry Point(s):
- `app/Libraries/MyMIAlerts.php::sendDiscordNotification()`
- `app/Modules/APIs/Controllers/DiscordController.php::processQueue()`
Dependencies:
- DB: `bf_discord_queue`, `bf_discord_templates`, `bf_discord_channels`
- Env: `CRON_SHARED_KEY` for queue processing
What it should verify (checklist):
- Step 1: Enqueue a sample alert notification.
- Step 2: Process queue in dry-run (no webhook send) or sandbox channel.
- Step 3: Confirm queue status transitions.
What it should log: queue_id, channel_key, status transitions.
Failure modes to detect: missing templates, dedupe blocking, webhook failures.
Where to implement: `app/Commands/AlertsDiscordHealth.php` (new).
Suggested command name: `alerts:health-discord-notify`
Expected log file: `writable/logs/health_alerts.log`

## Marketing System

✅ Health Test: `php spark marketing:health-inbox`
Priority: P0
Feature: Email scrape → `bf_marketing_temp_scraper`
Primary Entry Point(s):
- `app/Modules/APIs/Controllers/MarketingController.php::cronFetchInbox()`
- `app/Modules/APIs/Controllers/MarketingController.php::cronFetchMarketingEmails()`
- `app/Libraries/MyMIMarketing.php::fetchAndStoreEmails()`
Dependencies:
- DB: `bf_marketing_temp_scraper`
- Email inbox access (news/marketing inbox)
What it should verify (checklist):
- Step 1: Fetch latest emails from configured inbox.
- Step 2: Insert new rows into `bf_marketing_temp_scraper`.
- Step 3: Log counts and skipped rows.
What it should log: inbox source, fetched count, inserted count.
Failure modes to detect: mailbox auth failures, insert failures, missing inbox config.
Where to implement: `app/Commands/MarketingInboxHealth.php` (new).
Suggested command name: `marketing:health-inbox`
Expected log file: `writable/logs/health_marketing.log`

✅ Health Test: `php spark marketing:health-summarize`
Priority: P1
Feature: Summarize temp → final scraper
Primary Entry Point(s):
- `app/Libraries/MyMIMarketing.php::generateFromTempScraper()`
- `app/Models/MarketingModel.php::insertFinalScraper()`
Dependencies:
- DB: `bf_marketing_temp_scraper`, `bf_marketing_scraper`
What it should verify (checklist):
- Step 1: Load a temp scraper record.
- Step 2: Generate summary and insert into final scraper table.
- Step 3: Mark temp record processed (if applicable).
What it should log: temp_id, final_id, summary length, keywords count.
Failure modes to detect: missing content, summary generation errors, duplicate final inserts.
Where to implement: `app/Commands/MarketingSummarizeHealth.php` (new).
Suggested command name: `marketing:health-summarize`
Expected log file: `writable/logs/health_marketing.log`

✅ Health Test: `php spark marketing:health-tfidf`
Priority: P1
Feature: Keyword extraction TF-IDF pipeline
Primary Entry Point(s):
- `app/Modules/APIs/Controllers/ManagementController.php::testTfIdfPipeline()`
- `app/Libraries/MyMIMarketing.php::summarizeText()`
Dependencies:
- PHP-ML TF-IDF transformer (`Phpml\FeatureExtraction\TfIdfTransformer`)
What it should verify (checklist):
- Step 1: Run TF-IDF pipeline on sample inputs.
- Step 2: Verify keywords returned for valid input.
- Step 3: Confirm pipeline skips invalid/empty inputs.
What it should log: sample index, summary length, keyword count.
Failure modes to detect: TF-IDF exceptions, empty keyword results, invalid input handling.
Where to implement: `app/Commands/MarketingTfIdfHealth.php` (new).
Suggested command name: `marketing:health-tfidf`
Expected log file: `writable/logs/health_marketing.log`

✅ Health Test: `php spark marketing:health-post-gen`
Priority: P1
Feature: Post generation from summary
Primary Entry Point(s):
- `app/Modules/APIs/Controllers/ManagementController.php::generatePostsFromSummary()`
- `app/Libraries/MyMIMarketing.php::generateSocialPosts()`
Dependencies:
- DB: `bf_marketing_scraper`
What it should verify (checklist):
- Step 1: Load a summary record.
- Step 2: Generate platform posts and update record.
- Step 3: Validate posts JSON structure.
What it should log: summary_id, platforms generated, payload size.
Failure modes to detect: missing summary record, invalid JSON, empty post content.
Where to implement: `app/Commands/MarketingPostGenHealth.php` (new).
Suggested command name: `marketing:health-post-gen`
Expected log file: `writable/logs/health_marketing.log`

✅ Health Test: `php spark marketing:health-zapier`
Priority: P1
Feature: Zapier share (dry-run)
Primary Entry Point(s):
- `app/Services/ZapierService.php::sendApprovedPostsToZapier()`
Dependencies:
- Env: `ZAPIER_APPROVED_WEBHOOK`, `OPENAI_API_KEY`
- DB: `bf_marketing_scraper`
What it should verify (checklist):
- Step 1: Load approved posts ready for distribution.
- Step 2: Validate Zapier webhook URL format.
- Step 3: Send payload in dry-run or test endpoint.
What it should log: record id, webhook status, response code.
Failure modes to detect: missing webhook URL, 4xx responses, OpenAI fallback errors.
Where to implement: `app/Commands/MarketingZapierHealth.php` (new).
Suggested command name: `marketing:health-zapier`
Expected log file: `writable/logs/health_marketing.log`

✅ Health Test: `php spark marketing:health-discord-share`
Priority: P2
Feature: Discord post distribution from approved content
Primary Entry Point(s):
- `app/Modules/APIs/Controllers/MarketingController.php::approveBufferItem()`
- `app/Libraries/MyMIMarketing.php::distributeContent()`
Dependencies:
- DB: `bf_marketing_scraper`
- Discord queue tables (via `MyMIDiscord`)
What it should verify (checklist):
- Step 1: Select an approved post.
- Step 2: Generate Discord content payload.
- Step 3: Enqueue or send in dry-run mode.
What it should log: post id, channel, queue status.
Failure modes to detect: missing templates, empty Discord payloads.
Where to implement: `app/Commands/MarketingDiscordHealth.php` (new).
Suggested command name: `marketing:health-discord-share`
Expected log file: `writable/logs/health_marketing.log`

## External Integrations

✅ Health Test: `php spark integrations:health-alphavantage`
Priority: P0
Feature: AlphaVantage connectivity + rate-limit detection
Primary Entry Point(s):
- `app/Libraries/MyMIAlphaVantage.php::getAlphaVantageResponse()`
- `app/Libraries/MyMIAlphaVantage.php::hasRateLimitCapacity()`
Dependencies:
- Env: `ALPHA_VANTAGE_API_KEYS`, `ALPHA_VANTAGE_API_KEY*`
- Cache: CodeIgniter cache (rate limiter)
What it should verify (checklist):
- Step 1: Ensure API keys are loaded.
- Step 2: Make a lightweight AlphaVantage request.
- Step 3: Detect and log rate-limit notices.
What it should log: key count, response status, rate-limit flag.
Failure modes to detect: missing keys, rate-limit errors, malformed responses.
Where to implement: `app/Commands/IntegrationsAlphaVantageHealth.php` (new).
Suggested command name: `integrations:health-alphavantage`
Expected log file: `writable/logs/health_integrations.log`

✅ Health Test: `php spark integrations:health-marketaux`
Priority: P1
Feature: MarketAux request
Primary Entry Point(s):
- `app/Libraries/MyMIMarketAux.php::fetchMarketData()`
Dependencies:
- Env: `MARKETAUX_API_KEY`
What it should verify (checklist):
- Step 1: Call `fetchMarketData()` for a sample symbol.
- Step 2: Validate price/open/high/low fields.
- Step 3: Log API errors and null responses.
What it should log: symbol, response size, error messages.
Failure modes to detect: missing API key, empty data payload, HTTP errors.
Where to implement: `app/Commands/IntegrationsMarketAuxHealth.php` (new).
Suggested command name: `integrations:health-marketaux`
Expected log file: `writable/logs/health_integrations.log`

✅ Health Test: `php spark integrations:health-solana`
Priority: P1
Feature: Solana RPC connectivity
Primary Entry Point(s):
- `app/Services/SolanaService.php::getNetworkStatus()`
- `app/Services/SolanaService.php::getBalanceLamports()`
Dependencies:
- Env: `SOLANA_RPC_PRIMARY`, `SOLANA_RPC_FALLBACKS`, `SOLANA_WS_PRIMARY`, `SOLANA_COMMITMENT`
What it should verify (checklist):
- Step 1: Check network status (slot/version).
- Step 2: Fetch balance for a known address in dry-run.
- Step 3: Validate circuit-breaker handling when endpoints fail.
What it should log: endpoint used, slot, status, circuit state.
Failure modes to detect: RPC 403/timeout, circuit open, empty balances.
Where to implement: `app/Commands/IntegrationsSolanaHealth.php` (new).
Suggested command name: `integrations:health-solana`
Expected log file: `writable/logs/health_integrations.log`

✅ Health Test: `php spark integrations:health-discord-webhook`
Priority: P1
Feature: Discord webhook send (dry-run)
Primary Entry Point(s):
- `app/Libraries/MyMIDiscord.php::sendWebhookMessage()`
Dependencies:
- Env: Discord webhook URL (from config/env)
What it should verify (checklist):
- Step 1: Build a minimal Discord payload.
- Step 2: Send to webhook endpoint in dry-run or test channel.
- Step 3: Confirm response success code.
What it should log: webhook URL (masked), status code, response body size.
Failure modes to detect: invalid webhook URL, 4xx/5xx responses.
Where to implement: `app/Commands/IntegrationsDiscordHealth.php` (new).
Suggested command name: `integrations:health-discord-webhook`
Expected log file: `writable/logs/health_integrations.log`

✅ Health Test: `php spark integrations:health-smtp`
Priority: P1
Feature: Email SMTP connectivity (safe mode)
Primary Entry Point(s):
- `app/Services/MailService.php::send()`
- `app/Libraries/Mail/SmtpProvider.php`
Dependencies:
- Env: `mail.driver`, `mail.provider`, `email.protocol`, `mail.from.email`, `mail.from.name`
- DB: `bf_mail_queue` (when queueing)
What it should verify (checklist):
- Step 1: Resolve SMTP provider from env.
- Step 2: Run a `send()` in dry-run or queue-only mode.
- Step 3: Verify queue insertion or provider response.
What it should log: provider name, queue status, error details.
Failure modes to detect: missing SMTP config, connection refused, send errors.
Where to implement: `app/Commands/IntegrationsSmtpHealth.php` (new).
Suggested command name: `integrations:health-smtp`
Expected log file: `writable/logs/health_integrations.log`

## System Ops & Safety

✅ Health Test: `php spark system:health-core`
Priority: P0
Feature: Database + cache connectivity
Primary Entry Point(s):
- `app/Controllers/System/HealthController.php::databaseCheck()`
- `app/Controllers/System/HealthController.php::cacheCheck()`
Dependencies:
- DB: primary connection
- Cache: configured handler (`app/Config/Cache.php`)
What it should verify (checklist):
- Step 1: Connect to DB and run `SELECT 1`.
- Step 2: Execute cache write/read round-trip.
- Step 3: Return overall status.
What it should log: db status, cache status, duration.
Failure modes to detect: DB unreachable, cache write failures.
Where to implement: `app/Commands/SystemCoreHealth.php` (new).
Suggested command name: `system:health-core`
Expected log file: `writable/logs/health_system.log`

✅ Health Test: `php spark system:health-logs`
Priority: P0
Feature: Error logger table insert test
Primary Entry Point(s):
- `app/Commands/LogHealthcheck.php::run()`
Dependencies:
- DB: `bf_error_logs`
- File logs: `writable/logs/`
What it should verify (checklist):
- Step 1: Emit log markers to file.
- Step 2: Confirm file size increases.
- Step 3: Confirm `bf_error_logs` receives new row.
What it should log: marker id, file log status, db rows count.
Failure modes to detect: log handler misconfig, DB table missing, write permission errors.
Where to implement: `app/Commands/LogHealthcheck.php` (already exists).
Suggested command name: `logs:healthcheck`
Expected log file: `writable/logs/log-YYYY-MM-DD.php`

✅ Health Test: `php spark system:health-writable`
Priority: P1
Feature: Writable storage permissions
Primary Entry Point(s):
- `WRITEPATH` checks (any Spark command)
Dependencies:
- Filesystem: `writable/`, `writable/logs/`, `writable/uploads/`
What it should verify (checklist):
- Step 1: Create and delete a temp file under `WRITEPATH`.
- Step 2: Confirm log file overwrite behavior for health logs.
- Step 3: Validate directory permissions.
What it should log: paths tested, write/delete result.
Failure modes to detect: permission denied, disk full.
Where to implement: `app/Commands/SystemWritableHealth.php` (new).
Suggested command name: `system:health-writable`
Expected log file: `writable/logs/health_system.log`

✅ Health Test: `php spark system:health-ops-queue`
Priority: P1
Feature: Ops queue processing
Primary Entry Point(s):
- `app/Commands/OpsWork.php::run()`
- `app/Libraries/Ops/OpsJobRegistry.php`
Dependencies:
- DB: `bf_ops_jobs`, `bf_ops_queue`, `bf_ops_runs`
What it should verify (checklist):
- Step 1: Enqueue a lightweight ops job.
- Step 2: Run `ops:work` with limit=1 in dry-run.
- Step 3: Confirm run status recorded.
What it should log: job_key, queue_id, run status.
Failure modes to detect: unknown job key, run record failures, retries stuck.
Where to implement: `app/Commands/SystemOpsQueueHealth.php` (new).
Suggested command name: `system:health-ops-queue`
Expected log file: `writable/logs/health_system.log`

✅ Health Test: `php spark system:health-cron-endpoints`
Priority: P1
Feature: Cron endpoint access & auth
Primary Entry Point(s):
- `app/Modules/APIs/Controllers/AlertsController.php::processAlerts()`
- `app/Modules/APIs/Controllers/DiscordController.php::processQueue()`
- `app/Modules/APIs/Controllers/MarketingController.php::cronFetchInbox()`
Dependencies:
- Env: `CRON_SHARED_KEY`
- Filesystem: `writable/cron_locks/`
What it should verify (checklist):
- Step 1: Call cron endpoints with valid token.
- Step 2: Confirm lock file handling for alerts.
- Step 3: Validate JSON response status.
What it should log: endpoint name, auth status, lock file state.
Failure modes to detect: missing cron token, lock file stuck, endpoint 403.
Where to implement: `app/Commands/SystemCronHealth.php` (new).
Suggested command name: `system:health-cron-endpoints`
Expected log file: `writable/logs/health_system.log`

## Next Implementation Order (Priority)

**P0 (Critical revenue/security)**
1. `auth:health-registration`
2. `auth:health-activation`
3. `auth:health-login`
4. `budget:health-forecast`
5. `budget:health-repayment`
6. `budget:health-dashboard-api`
7. `alerts:health-scrape-email`
8. `alerts:health-parse-symbols`
9. `integrations:health-alphavantage`
10. `system:health-core`
11. `system:health-logs`
12. `marketing:health-inbox`

**P1 (High operational leverage)**
1. `auth:health-password-reset`
2. `auth:health-sessions`
3. `auth:health-permissions`
4. `budget:health-recurring`
5. `invest:health-watchlist`
6. `invest:health-portfolio`
7. `invest:health-predictions-cron`
8. `alerts:health-market-refresh`
9. `alerts:health-discord-notify`
10. `marketing:health-summarize`
11. `marketing:health-tfidf`
12. `marketing:health-post-gen`
13. `marketing:health-zapier`
14. `integrations:health-marketaux`
15. `integrations:health-solana`
16. `integrations:health-discord-webhook`
17. `integrations:health-smtp`
18. `system:health-writable`
19. `system:health-ops-queue`
20. `system:health-cron-endpoints`

**P2 (Nice-to-have / visibility)**
1. `auth:health-spam-check`
2. `marketing:health-discord-share`
