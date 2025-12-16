# Routes Audit

Audit date: $(date -I)

## API Routes (app/Config/Routes.php)

### /API
| Path | Verbs | Controller::method | Notes |
| --- | --- | --- | --- |
| /API | GET, POST | APIController::index | Canonical API index. |
| /API/Status | GET, POST | APIController::status | Status alias; segment variant handles additional context. |
| /API/Status/{segment} | GET, POST | APIController::status | Segment forwarded as parameter. |
| /API/Health | GET | HealthController::index | Health probe. |
| /API/Ops/OPcacheReset | GET | OpsController::opcacheReset | OPCache reset (header protected). |
| /API/Alerts/backfillEmailAlerts | POST | AlertsController::backfillEmailAlerts | Email backfill worker. |
| /API/cronFetchAndGenerateNews | GET | ManagementController::cronFetchAndGenerateNews | Legacy alias for marketing cron. |
| /API/Management/backfillMarketingEmails | POST | ManagementController::backfillMarketingEmails | Admin filtered. |
| /API/Discord/completeOnboardingStep | POST | DiscordController::completeOnboardingStep | Public Discord helper. |

### /API/AI
| Path | Verbs | Controller::method | Notes |
| --- | --- | --- | --- |
| /API/AI/Chat | POST | AIController::postChat | |
| /API/AI/Notes | GET | AIController::listNotes | |
| /API/AI/LinkSettings | POST | AIController::updateLinkSettings | |

### /API/Management (cronKey filter)
| Path | Verbs | Controller::method | Notes |
| --- | --- | --- | --- |
| /API/Management/Run-CRON-Tasks | GET | ManagementController::Run_CRON_Tasks | Requires cronKey. |
| /API/Management/ajaxGetActiveUsers | GET | ManagementController::ajaxGetActiveUsers | |
| /API/Management/ajaxGetInactiveUsers | GET | ManagementController::ajaxGetInactiveUsers | |
| /API/Management/checkForSpamUsers | GET | ManagementController::checkForSpamUsers | |
| /API/Management/distributeTodaysNewsContent | GET | ManagementController::distributeTodaysNewsContent | Required endpoint present. |
| /API/Management/exportWeeklyWatchlistCSV | GET | ManagementController::exportWeeklyWatchlistCSV | |
| /API/Management/exportPostJson/{id} | GET | ManagementController::exportPostJson | Required endpoint present. |
| /API/Management/fetchAlphaVantageNewsForTradeAlerts | GET | ManagementController::fetchAlphaVantageNewsForTradeAlerts | Required endpoint present. |
| /API/Management/fetchEmailsToTempScraper | GET | ManagementController::fetchEmailsToTempScraper | |
| /API/Management/fetchLatestSummaries | GET | ManagementController::fetchLatestSummaries | |
| /API/Management/fetchNewsEmails | GET | ManagementController::fetchNewsEmails | Required endpoint present. |
| /API/Management/generatePostsFromSummary/{id?} | GET | ManagementController::generatePostsFromSummary | Required endpoint present. |
| /API/Management/generateCoffeeAndStocksNewsletter | GET | ManagementController::generateCoffeeAndStocksNewsletter | |
| /API/Management/fetchCoffeeAndStocksNewsletter | GET | ManagementController::fetchCoffeeAndStocksNewsletter | |
| /API/Management/generateWeeklyStreamData | GET | ManagementController::generateWeeklyStreamData | |
| /API/Management/saveCoffeeAndStocksNewsletter | POST | ManagementController::saveCoffeeAndStocksNewsletter | |
| /API/Management/generateVoiceScriptManually | GET | ManagementController::generateVoiceScriptManually | Required endpoint present. |
| /API/Management/runBackfillAlertsEmails | GET | ManagementController::runBackfillAlertsEmails | |
| /API/Management/runBackfillMarketingEmails | GET | ManagementController::runBackfillMarketingEmails | |
| /API/Management/getUsers | GET | ManagementController::getUsers | |
| /API/Management/getAlerts | GET | ManagementController::getAlerts | |
| /API/Management/getReferrals | GET | ManagementController::getReferrals | |
| /API/Management/getAssets | GET | ManagementController::getAssets | |
| /API/Management/getNews | GET | ManagementController::getNews | |
| /API/Management/getSupport | GET | ManagementController::getSupport | |
| /API/Management/processAllTradeAlerts | GET | ManagementController::processAllTradeAlerts | Required endpoint present. |
| /API/Management/runCronManually | GET | ManagementController::runCronManually | Required endpoint present. |
| /API/Management/runDailyAlphaVantageDataPipeline | GET | ManagementController::runDailyAlphaVantageDataPipeline | Required endpoint present. |
| /API/Management/scrapeAndGenerateTodaysStoryFromInbox | GET | ManagementController::scrapeAndGenerateTodaysStoryFromInbox | Required endpoint present. |
| /API/Management/sendAllDiscordAlerts | GET | ManagementController::sendAllDiscordAlerts | Required endpoint present. |
| /API/Management/sendToZapierManually | GET | ManagementController::sendToZapierManually | Required endpoint present. |
| /API/Management/sharePost/{id}/{platform} | GET | ManagementController::sharePost | Required endpoint present. |
| /API/Management/triggerPostAutogenOnEmpty | GET | ManagementController::triggerPostAutogenOnEmpty | Required fallback present. |
| /API/Management/updateMarketDataForAlerts | GET | ManagementController::updateMarketDataForAlerts | Required endpoint present. |
| /API/Management/Advisor/generateNow | POST | AdvisorController::generateNow | |
| /API/Management/Projects/... | POST | ProjectsController methods | Project utility routes. |

### /API/Alerts
Large set retained; key trade/marketing endpoints map to AlertsController public methods (see controller inventory for coverage). No duplicate prefixes remain.

### /API/Marketing
MarketingController routes are consolidated under a single group (automation + UI helpers) and now include the former content dashboard endpoints so there are no parallel /Marketing groups inside /API.

### /API/Investments (normalized)
| Path | Verbs | Controller::method | Notes |
| --- | --- | --- | --- |
| /API/Investments | GET | InvestmentsController::index | New canonical index; replaces unused mixed mappings. |
| /API/Investments/getSymbolsByTradeType/{segment} | GET | InvestmentsController::getSymbolsByTradeType | |
| /API/Investments/getInvestmentData/{segment} | GET | InvestmentsController::getInvestmentData | |
| /API/Investments/fetchActiveTrades | GET | InvestmentsController::fetchActiveTrades | Newly exposed existing method. |
| /API/Investments/fetchMonthAndInsightsData | GET | InvestmentsController::fetchMonthAndInsightsData | Newly exposed existing method. |
| /API/Investments/searchTickers | GET | InvestmentsController::searchTickers | Matches public method signature. |
| /API/Investments/news | GET | InvestmentsController::listNews | |
| /API/Investments/news/{id} | GET | InvestmentsController::getNews | |
| /API/Investments/news | POST | InvestmentsController::createNews | |
| /API/Investments/news/{id} | POST | InvestmentsController::updateNews | |
| /API/Investments/news/{id} | DELETE | InvestmentsController::deleteNews | |
| /API/Investments/validateSymbol | POST | InvestmentsController::validateSymbol | |

## Web/Marketing Content

### Marketing (API group)
Single group handles marketing automations; no duplicate /Marketing groups found elsewhere in Routes.php.

### Blog & Content
* /Blog (BlogController::index) with nested /Earnings, /Investing, /IRS, /News-And-Updates, /Personal-Budgeting groups — no duplicate prefixes detected. /Blog/News-And-Updates now maps to NewsAndUpdates::* to stay aligned with the controller name.

### Support
* /Support/Support/kb and /Support/Support/kb/{segment} point to SupportController knowledge base.

## Findings
* Duplicate Investments mappings removed and replaced with methods that exist in InvestmentsController.
* Required Management endpoints from the missing list are present under the /API/Management group.
* /Marketing routes are unified under one group in app/Config/Routes.php; the redundant /Blog/News-And-Updates group was removed in favor of the canonical nested blog mapping.
