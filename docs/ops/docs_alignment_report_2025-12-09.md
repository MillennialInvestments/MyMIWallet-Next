# /docs Alignment Report - 2025-12-09

## 1. Overview
- /docs Alignment Chat review performed by Codex. This snapshot inventories Markdown docs, maps them to code, and highlights implementation gaps.
- No CRITICAL or ERROR logs were surfaced in the summarized materials for this run (first time observed).

## 2. Docs Inventory Summary
- Total Markdown files discovered: 159.
- Breakdown by folder:
- CRON.md: 1
- OVERVIEW.md: 1
- README.md: 1
- adr: 2
- alerts: 1
- auctions: 2
- bitcoin-standardization.md: 1
- budget: 3
- budgeting: 2
- categorized: 1
- content_hub_inventory: 1
- csp-and-commondata.md: 1
- discord: 23
- discord_schema.sql.md: 1
- discord_seed.sql.md: 1
- esports_preflight.md: 1
- exports_schema.md: 1
- functional_inventory: 2
- hardening-playbook.md: 1
- logs: 2
- marketing: 21
- nginx: 6
- notes: 2
- operations: 12
- ops: 37
- page_seo: 1
- php-errors-playbook.md: 1
- predictions: 3
- repo-review.md: 1
- resolutions: 4
- search: 2
- security: 2
- syndication_inventory: 1
- tasks: 1
- user-guides: 13
- wallets: 3
- Master index: [docs/ops/docs_index.md](../ops/docs_index.md).

## 3. Alignment Summary
- Status counts: aligned=13, partial=104, missing=42.

| Doc | Mapped Modules/Routes | Status | Notes |
| --- | --- | --- | --- |
| docs/CRON.md | /API/Discord/process-queue, /dev/null | partial | Auto-evaluated via pattern scan |
| docs/OVERVIEW.md | App\Support\Http, /API/Alerts, /API/Bitcoin, ... | partial | Auto-evaluated via pattern scan |
| docs/README.md |  | partial | Auto-evaluated via pattern scan |
| docs/adr/0001-standards-and-response-contract.md | App\Support\Http | aligned | Auto-evaluated via pattern scan |
| docs/adr/_index.md |  | partial | Auto-evaluated via pattern scan |
| docs/alerts/alerts_marketing_pipline.md | /Libraries/MyMIAlerts, /email/social | partial | Auto-evaluated via pattern scan |
| docs/auctions/_index.md |  | partial | Auto-evaluated via pattern scan |
| docs/auctions/auction-schema.md |  | partial | Auto-evaluated via pattern scan |
| docs/bitcoin-standardization.md | /API/Bitcoin/broadcastSignedTx, /API/Bitcoin/buildUnsignedPsbt, /Dev/BitcoinTest, ... | partial | Auto-evaluated via pattern scan |
| docs/budget/UI-Suggestions.md | /browser/active | missing | Auto-evaluated via pattern scan |
| docs/budget/_index.md |  | partial | Auto-evaluated via pattern scan |
| docs/budget/budget-controller.md | App\Modules\User\Controllers\BudgetController, /API/Budget, /API/Budget/available, ... | partial | Auto-evaluated via pattern scan |
| docs/budgeting/_index.md |  | partial | Auto-evaluated via pattern scan |
| docs/budgeting/architecture.md | App\Modules\User\Controllers\BudgetController, App\Modules\User\Models\BudgetModel, App\Modules\User\Services\BudgetService, ... | partial | Auto-evaluated via pattern scan |
| docs/categorized/README.md |  | partial | Auto-evaluated via pattern scan |
| docs/content_hub_inventory/content_hub_inventory.md | App\Modules\User\Controllers\KnowledgebaseController, /Knowledge/AI-Insights-Vs-Manual-Research, /Knowledge/AI-Trade-Insights, ... | partial | Auto-evaluated via pattern scan |
| docs/csp-and-commondata.md | /debug/common-data/smoke | missing | Auto-evaluated via pattern scan |
| docs/discord/README.md |  | partial | Auto-evaluated via pattern scan |
| docs/discord/_index.md | /routes/tables/env | missing | Auto-evaluated via pattern scan |
| docs/discord/_inventory.md | /API/Alerts/sendDiscordAlerts, /API/Alerts/sendDiscordAlertsBySymbol, /API/Discord/feed/alerts-recent, ... | partial | Auto-evaluated via pattern scan |
| docs/discord/alerts_automation.md | /webhook/channel | partial | Auto-evaluated via pattern scan |
| docs/discord/discord_integration_overview.md | /Libraries/AlertChannels/DiscordChannel, /Libraries/MyMIAlerts, /Libraries/MyMIMarketing, ... | partial | Auto-evaluated via pattern scan |
| docs/discord/discord_schema_v3.sql.md | /block/mask | partial | Auto-evaluated via pattern scan |
| docs/discord/discord_seed_v3.sql.md |  | aligned | Auto-evaluated via pattern scan |
| docs/discord/discord_to_ci4_commands.md | /API/Alerts/getFilteredAlerts, /API/Discord/interactions, /API/Investments, ... | partial | Auto-evaluated via pattern scan |
| docs/discord/earnings_calendar_automation.md |  | aligned | Auto-evaluated via pattern scan |
| docs/discord/environments.md |  | aligned | Auto-evaluated via pattern scan |
| docs/discord/events_matrix.md |  | aligned | Auto-evaluated via pattern scan |
| docs/discord/marketing_news_automation.md | /semis/crypto/macro | partial | Auto-evaluated via pattern scan |
| docs/discord/mee6_and_mymi_automation.md | /2/3, /Basic/Premium/Gold, /Libraries/MyMIDiscord, ... | partial | Auto-evaluated via pattern scan |
| docs/discord/my_midiscord_server_setup_and_alert_routing.md | App\Libraries\MyMIDiscord, /API/Alerts/sendDiscordAlerts, /API/Alerts/sendDiscordAlertsBySymbol, ... | partial | Auto-evaluated via pattern scan |
| docs/discord/mysql_discord_schema.md |  | aligned | Auto-evaluated via pattern scan |
| docs/discord/operations_and_montioring.md |  | partial | Auto-evaluated via pattern scan |
| docs/discord/premium_flows_and_upsell.md |  | partial | Auto-evaluated via pattern scan |
| docs/discord/python_workers.md | /API/Discord/feed/alerts-recent, /API/Management/getAssets, /python/discord, ... | partial | Auto-evaluated via pattern scan |
| docs/discord/server_setup_and_alert_routing.md | App\Libraries\MyMIDiscord, /403/404, /Config/Discord, ... | partial | Auto-evaluated via pattern scan |
| docs/discord/server_setup_and_ci4_integration.md | /API/Alerts/sendDiscordAlerts, /API/Alerts/sendDiscordAlertsBySymbol, /API/Management/sendAllDiscordAlerts, ... | partial | Auto-evaluated via pattern scan |
| docs/discord/server_setup_support_category.md | /API/Discord, /Cryptos/Stocks, /DD/streams, ... | missing | Auto-evaluated via pattern scan |
| docs/discord/streaming_setup.md | /Support/Discord, /news/earnings | missing | Auto-evaluated via pattern scan |
| docs/discord/where_to_share_what.md | /2/3 | aligned | Auto-evaluated via pattern scan |
| docs/discord_schema.sql.md |  | partial | Auto-evaluated via pattern scan |
| docs/discord_seed.sql.md |  | aligned | Auto-evaluated via pattern scan |
| docs/esports_preflight.md | App\Database\Migrations\, App\Libraries\MyMIEsports, App\Libraries\MyMIEsportsStartGG, ... | partial | Auto-evaluated via pattern scan |
| docs/exports_schema.md |  | partial | Auto-evaluated via pattern scan |
| docs/functional_inventory/docs_to_code_map.md | App\Authentication\Passwords\CustomCompositionValidator, App\Config\Exceptions, App\Config\SiteSettings, ... | partial | Auto-evaluated via pattern scan |
| docs/functional_inventory/feature_inventory.md | App\Controllers\AuctionsController, App\Controllers\AuthController, App\Controllers\Debug, ... | partial | Auto-evaluated via pattern scan |
| docs/hardening-playbook.md | App\Support\Http, /API/Management, /bin/php-cs-fixer, ... | partial | Auto-evaluated via pattern scan |
| docs/logs/_index.md |  | partial | Auto-evaluated via pattern scan |
| docs/logs/log-2025-10-06.md | /Libraries/MyMIMarketing, /Modules/APIs/Controllers/ManagementController, /Modules/APIs/Controllers/MarketingController | partial | Auto-evaluated via pattern scan |
| docs/marketing/01-mymi-gold-and-coin.md | /Libraries/MyMIAlerts, /Libraries/MyMIMarketing, /Modules/Exchange/Solana, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/02-budgeting-and-investments-libraries.md | /Libraries/MyMIAlerts, /Libraries/MyMIMarketing, /Modules/Investments/Library, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/03-mymiexchange-solana.md | /Libraries/MyMIAlerts, /Libraries/MyMIMarketing, /Modules/Exchange/Controllers/Orders, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/04-mymialerts-premium.md | /Libraries/MyMIAlerts, /Libraries/MyMIMarketing, /Modules/Exchange/Solana, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/05-memberships-and-custom-plans.md | /Libraries/MyMIMarketing, /Modules/API, /Modules/Investments, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/06-referrals-rewards.md | /Libraries/MyMIMarketing, /Modules/Investments, /Modules/Memberships, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/07-myprojects-real-estate.md | /Libraries/MyMIMarketing, /Modules/Investments, /Modules/Memberships, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/08-mymi-apis-self-host.md | /Libraries/MyMIAlerts, /Libraries/MyMIMarketing, /Modules/API, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/09-discord-coffee-and-stocks.md | /Libraries/MyMIAlerts, /Libraries/MyMIMarketing, /Modules/Exchange, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/10-linkedin-groups-guide.md | /Libraries/MyMIMarketing, /Modules/Investments, /Modules/Memberships, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/11-facebook-groups-guide.md | /Libraries/MyMIMarketing, /Modules/Investments, /Modules/Referrals, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/12-discord-no-links-guide.md | /Libraries/MyMIMarketing, /Modules/Investments, /Modules/Memberships, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/13-x-twitter-guide.md | /Libraries/MyMIAlerts, /Libraries/MyMIMarketing, /Modules/Exchange, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/14-stocktwits-guide.md | /Libraries/MyMIAlerts, /Libraries/MyMIMarketing, /Modules/Exchange, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/15-youtube-guide.md | /Libraries/MyMIAlerts, /Libraries/MyMIMarketing, /Modules/Exchange, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/16-tiktok-guide.md | /Libraries/MyMIAlerts, /Libraries/MyMIMarketing, /Modules/Exchange, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/README.md | /management/marketing/campaigns, /management/marketing/compliance, /management/marketing/content-generator, ... | missing | Auto-evaluated via pattern scan |
| docs/marketing/_assets/README.md |  | partial | Auto-evaluated via pattern scan |
| docs/marketing/_index.md |  | partial | Auto-evaluated via pattern scan |
| docs/marketing/_templates/CAMPAIGN_TEMPLATE.md | /Libraries/MyMIAlerts, /Libraries/MyMIMarketing, /Modules/Exchange, ... | partial | Auto-evaluated via pattern scan |
| docs/marketing/index.md |  | partial | Auto-evaluated via pattern scan |
| docs/nginx/01-structure.md | /nginx/archive, /sites-available/mymiwallet | missing | Auto-evaluated via pattern scan |
| docs/nginx/README.md | /current/writable/cache, /nginx/conf/nginx, /nginx/mymiwallet | missing | Auto-evaluated via pattern scan |
| docs/nginx/_index.md | /nginx/README | missing | Auto-evaluated via pattern scan |
| docs/nginx/config-nginx.md | /home/mymiteam/nginx/conf/mime, /home/mymiteam/nginx/logs/access, /home/mymiteam/nginx/logs/error, ... | missing | Auto-evaluated via pattern scan |
| docs/nginx/mymiwallet.md | /home/mymiteam/mymiwallet/site/current/public, /home/mymiteam/nginx/fastcgi_params | missing | Auto-evaluated via pattern scan |
| docs/nginx/nginx.md | /home/mymiteam/nginx/conf/mime, /home/mymiteam/nginx/logs/access, /home/mymiteam/nginx/logs/error, ... | missing | Auto-evaluated via pattern scan |
| docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md | App\Modules\User\Controllers\AlertsController | partial | Auto-evaluated via pattern scan |
| docs/notes/2025-12-01-feature-corrections.md | /Goals/Daily, /Pro/Gold | partial | Auto-evaluated via pattern scan |
| docs/operations/01-foundation.md | App\Log\Handlers\DatabaseLoggerHandler, /Config/Logger, /Config/Routes, ... | partial | Auto-evaluated via pattern scan |
| docs/operations/01-foundation.report.md | /CSP/session, /Config/Exceptions, /Config/Logger, ... | partial | Auto-evaluated via pattern scan |
| docs/operations/02-libraries.md | App\Libraries\, /Libraries/MyMIAlerts, /Libraries/MyMIAlphaVantage, ... | partial | Auto-evaluated via pattern scan |
| docs/operations/03-controllers.md | /Config/Routes, /Modules/APIs/Controllers/AlertsController, /Modules/APIs/Controllers/InvestmentsController, ... | partial | Auto-evaluated via pattern scan |
| docs/operations/04-cron-automation.md | /Libraries/MyMIAlphaVantage, /Modules/APIs/Controllers/ManagementController, /Modules/APIs/Controllers/MarketingController, ... | partial | Auto-evaluated via pattern scan |
| docs/operations/05-database.md | /Libraries/MyMIMarketing, /Libraries/MyMIProjects, /Models/AlertsModel, ... | partial | Auto-evaluated via pattern scan |
| docs/operations/06-devops.md | /awk/php, /composer/git, /home/mymiteam, ... | missing | Auto-evaluated via pattern scan |
| docs/operations/07-marketing-growth.md | /Libraries/MyMIMarketing, /Modules/APIs/Controllers/ManagementController, /Modules/APIs/Controllers/MarketingController, ... | partial | Auto-evaluated via pattern scan |
| docs/operations/08-security-compliance.md | /Libraries/MyMIAlphaVantage, /Libraries/MyMIMarketing, /Views/errors/html/error_404, ... | partial | Auto-evaluated via pattern scan |
| docs/operations/09-frontend-ui.md | /404/500/504, /Config/Routes, /Support/Support, ... | partial | Auto-evaluated via pattern scan |
| docs/operations/10-roadmap.md | /Libraries/MyMIAnalytics, /Libraries/MyMIExchange, /Libraries/MyMIGold, ... | partial | Auto-evaluated via pattern scan |
| docs/operations/_index.md |  | partial | Auto-evaluated via pattern scan |
| docs/ops/01-foundation.report.md | /CSP/session, /Config/Exceptions, /Config/Logger, ... | partial | Auto-evaluated via pattern scan |
| docs/ops/01-psr4-autoload-audit.md | App\Database\Migrations\AddProjectsFundingPipeline, App\Database\Migrations\AntiAbuse, App\Database\Migrations\ApiKeysAndWebhooks, ... | partial | Auto-evaluated via pattern scan |
| docs/ops/500-audit.md | /API/Health, /Config/App, /Config/Auth, ... | partial | Auto-evaluated via pattern scan |
| docs/ops/502-playbook.md | /api/health, /deploy/rollback_to_release, /nginx/logs/error, ... | missing | Auto-evaluated via pattern scan |
| docs/ops/_index.md |  | partial | Auto-evaluated via pattern scan |
| docs/ops/_inventory.docs.toc.md | /nginx/README | missing | Auto-evaluated via pattern scan |
| docs/ops/_inventory.docs.tree.md | /adr/0001-standards-and-response-contract, /adr/_index, /auctions/_index, ... | missing | Auto-evaluated via pattern scan |
| docs/ops/auth/00-inventory.md | App\Controllers\AuthController, App\\Controllers\\AuthController, /API/Health, ... | partial | Auto-evaluated via pattern scan |
| docs/ops/auth/01-routing-and-filters.md | /Auth/link-robinhood, /Auth/link-snaptrade, /auth/link, ... | missing | Auto-evaluated via pattern scan |
| docs/ops/auth/02-config-audit.md | App\Authentication\Passwords\CustomCompositionValidator, /Config/App, /Config/Email, ... | partial | Auto-evaluated via pattern scan |
| docs/ops/auth/03-database.md | App\Entities\AuthEntity | partial | Auto-evaluated via pattern scan |
| docs/ops/auth/04-controller-contracts.md | /auth/src/Controllers/AuthController | partial | Auto-evaluated via pattern scan |
| docs/ops/auth/05-registration.md | /Apex/register/MYCODE, /username/password | missing | Auto-evaluated via pattern scan |
| docs/ops/auth/06-authentication.md | /auth/src/Config/Auth | missing | Auto-evaluated via pattern scan |
| docs/ops/auth/07-password-reset.md | /emails/forgot | missing | Auto-evaluated via pattern scan |
| docs/ops/auth/08-2fa.md |  | aligned | Auto-evaluated via pattern scan |
| docs/ops/auth/09-authorization.md | App\\Filters\\LoginFilter, App\\Filters\\PermissionFilter, App\\Libraries\\Auth\\Gate, ... | partial | Auto-evaluated via pattern scan |
| docs/ops/auth/10-social-oauth.md | /Auth/link-robinhood, /Auth/link-snaptrade, /auth/link, ... | missing | Auto-evaluated via pattern scan |
| docs/ops/auth/11-ux-and-csp.md | /Apex/register | aligned | Auto-evaluated via pattern scan |
| docs/ops/auth/12-logging-and-errors.md |  | partial | Auto-evaluated via pattern scan |
| docs/ops/auth/13-security-review.md |  | partial | Auto-evaluated via pattern scan |
| docs/ops/auth/14-acceptance-tests.md |  | partial | Auto-evaluated via pattern scan |
| docs/ops/auth/99-final-report.md | App\\Controllers\\AuthController, /Config/Email, /auth/src/Controllers/AuthController, ... | partial | Auto-evaluated via pattern scan |
| docs/ops/auth/CHANGELOG.md | App\Controllers\AuthController | missing | Auto-evaluated via pattern scan |
| docs/ops/auth_redirect_fix.md |  | partial | Auto-evaluated via pattern scan |
| docs/ops/backfill_emails.md | App\Database\Migrations, /API/Alerts/backfillEmailAlerts, /API/Management/backfillMarketingEmails, ... | partial | Auto-evaluated via pattern scan |
| docs/ops/docs_index.md | /adr/0001-standards-and-response-contract, /adr/_index, /alerts/alerts_marketing_pipline, ... | partial | Auto-evaluated via pattern scan |
| docs/ops/reviews/_index.md | App\\Libraries\\, App\\Models\\, App\\Modules\\ | partial | Auto-evaluated via pattern scan |
| docs/ops/runbooks/alphavantage-rotation-playbook.md | /API/Alerts/addTradeAlert, /API/Management/runCRONTasks, /Config/APIs | missing | Auto-evaluated via pattern scan |
| docs/ops/runbooks/database-log-review.md | /home/mymiteam/logs/db-review- | partial | Auto-evaluated via pattern scan |
| docs/ops/runbooks/devops-smoke-test.md | /_ops/opcache-reset, /home/mymiteam/logs/devops-smoke- | missing | Auto-evaluated via pattern scan |
| docs/ops/runbooks/env-baseline-keys.md | /home/mymiteam/mymiwallet/site/current | aligned | Auto-evaluated via pattern scan |
| docs/ops/runbooks/logger-repair.md | App\\Libraries\\, App\\Models\\, App\\Modules\\ | partial | Auto-evaluated via pattern scan |
| docs/ops/runbooks/marketing-cron-playbook.md | /API/Management/cronFetchAndGenerateNews, /API/Management/processAllTradeAlerts, /API/Management/sendAllDiscordAlerts, ... | missing | Auto-evaluated via pattern scan |
| docs/ops/runbooks/routes-audit-playbook.md | /API/Alerts/addTradeAlert, /API/Management/Run-CRON-Tasks, /Config/Routes, ... | partial | Auto-evaluated via pattern scan |
| docs/ops/runbooks/ui-error-uat.md | /Config/Routes, /Support/kb | aligned | Auto-evaluated via pattern scan |
| docs/ops/unexpected-token-lt-audit.md | /API/Alerts/fetchMarketAuxNews, /API/Users/Comments/Add, /Config/Routes, ... | partial | Auto-evaluated via pattern scan |
| docs/page_seo/page_seo_inventory.md | /Account/Activity, /Account/Billing, /Account/Connected-Accounts, ... | partial | Auto-evaluated via pattern scan |
| docs/php-errors-playbook.md | App\Config\Exceptions, App\Config\SiteSettings, App\Libraries\ProductionExceptionHandler, ... | partial | Auto-evaluated via pattern scan |
| docs/predictions/README.md | /API/Predictions, /Config/Predictions, /Config/Routes, ... | partial | Auto-evaluated via pattern scan |
| docs/predictions/_index.md |  | partial | Auto-evaluated via pattern scan |
| docs/predictions/mysql-migrations.md |  | partial | Auto-evaluated via pattern scan |
| docs/repo-review.md | /bin/phpstan, /bin/psalm, /dev/null | partial | Auto-evaluated via pattern scan |
| docs/resolutions/2025-10-07-psr4-fixes.md | App\Exceptions\Gateway\GatewayTimeoutException, /_quarantine/dupes | missing | Auto-evaluated via pattern scan |
| docs/resolutions/2025-10-09-docs-alignment-kickoff.md | /docs/tasks, /ops/_inventory, /ops/reviews | missing | Auto-evaluated via pattern scan |
| docs/resolutions/PR-128-resolution.md | /Config/Auth, /Config/Filters, /Config/Hybridauth | missing | Auto-evaluated via pattern scan |
| docs/resolutions/_index.md |  | partial | Auto-evaluated via pattern scan |
| docs/search/README.md | /API/Investments/searchTickers, /Investments/Symbol, /assets/js/navbar-search | missing | Auto-evaluated via pattern scan |
| docs/search/_index.md |  | partial | Auto-evaluated via pattern scan |
| docs/security/2025-10-remediation.md | /assets/build, /assets/js | missing | Auto-evaluated via pattern scan |
| docs/security/_index.md |  | partial | Auto-evaluated via pattern scan |
| docs/syndication_inventory/syndication_inventory.md | /Widgets/StockTwits, /Widgets/TradingView, /accounts/signup, ... | partial | Auto-evaluated via pattern scan |
| docs/tasks/_index.md |  | partial | Auto-evaluated via pattern scan |
| docs/user-guides/ci4/01_Overview.md | /images/ci4-dashboard | missing | Auto-evaluated via pattern scan |
| docs/user-guides/ci4/02_Alerts_Dashboard_Guide.md | /images/ci4-alerts | missing | Auto-evaluated via pattern scan |
| docs/user-guides/ci4/03_Marketing_Dashboard_Guide.md | /images/ci4-marketing | missing | Auto-evaluated via pattern scan |
| docs/user-guides/ci4/04_Earnings_Dashboard_Guide.md | /images/ci4-earnings | missing | Auto-evaluated via pattern scan |
| docs/user-guides/ci4/05_Investments_and_Portfolio_Guide.md | /images/ci4-portfolio | missing | Auto-evaluated via pattern scan |
| docs/user-guides/ci4/06_Account_Settings_and_Social_Media_Linking.md | /images/ci4-social | missing | Auto-evaluated via pattern scan |
| docs/user-guides/discord/00_Overview.md | /Investments/Marketing | missing | Auto-evaluated via pattern scan |
| docs/user-guides/discord/01_Getting_Started.md | /images/discord-linking | missing | Auto-evaluated via pattern scan |
| docs/user-guides/discord/02_Using_MyMI_Discord_Tools.md | /active/closed, /stop/targets, /target/stop, ... | missing | Auto-evaluated via pattern scan |
| docs/user-guides/discord/03_Trade_Alerts_in_Discord.md | /stop/status | missing | Auto-evaluated via pattern scan |
| docs/user-guides/discord/04_Marketing_News_Guide.md | /images/discord-news | missing | Auto-evaluated via pattern scan |
| docs/user-guides/discord/05_Earnings_Calendar_Guide.md | /images/discord-earnings | missing | Auto-evaluated via pattern scan |
| docs/user-guides/discord/06_System_Status_and_Operations.md |  | partial | Auto-evaluated via pattern scan |
| docs/wallets/_index.md |  | partial | Auto-evaluated via pattern scan |
| docs/wallets/wallets-index.md | /API/Wallets/summary, /Config/Routes, /accounts/positions, ... | partial | Auto-evaluated via pattern scan |
| docs/wallets/wallets_workflow.md | App\Libraries\MyMIWallets, App\Modules\User\Views\Wallets\index, /API/Wallets | aligned | Auto-evaluated via pattern scan |

## 4. Newly Created Docs
- docs/ops/runbooks/logger-repair.md — DRAFT stub for logger repair runbook.
- docs/ops/reviews/_index.md — DRAFT staging space for per-directory review notes.

## 5. Gaps & Recommendations
- Many docs map to modules or routes that are absent from the app namespace scan; prioritize verifying /API and controller routes documented in ops/operations files.
- Several docs reference bf_* database tables without matching schema strings in app migrations; plan migrations or schema docs to reconcile.
- Numerous marketing/Discord workflow docs lack concrete code hooks; align automation libraries or mark docs as deprecated.

## 6. Next Codex Tasks (Follow-Up)
- Implement migrations for documented but missing bf_* tables and columns after confirming data contracts.
- Enforce log_message() patterns in modules flagged as partial/missing to satisfy logging standards.
- Add unit/integration tests for APIs referenced in docs_to_code_map.md that lack code hits.
