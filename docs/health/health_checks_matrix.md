# Health Checks Matrix

This matrix maps API endpoints and public service methods to proposed health check types and strategies. Status is defaulted to **Planned**; update as implementations land.

## API Endpoints

| Endpoint / Function | Domain | Type | Method | Side effects | Dry-run | Required env keys | Expected output | Status |
| --- | --- | --- | --- | --- | --- | --- | --- | --- |
| `GET healthz` → `System\HealthController::healthz` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Docs/index` → `DocsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Docs/view` → `DocsController::view` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /` → `Home::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /sw.js` → `ServiceWorker::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Apex/Referral` → `Home::apexReferral` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Apex/Referral/(:segment)` → `Home::apexReferral/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Corporate-Earnings` → `Home::corporateEarnings` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Corporate-Earnings/(:segment)` → `Home::corporateEarnings/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Economic-Calendar` → `Home::economicCalendar` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Economic-Calendar/(:segment)` → `Home::economicCalendarContent/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Getting-Started/(:segment)/(:segment)` → `Home::gettingStarted` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Getting-Started/(:segment)` → `Home::gettingStarted` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Getting-Started` → `Home::gettingStarted` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Memberships` → `Home::memberships` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Memberships/(:segment)` → `Home::memberships` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Alerts/Preview/(:segment)` → `AlertsController::preview/$1` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Preview/Alert/(:segment)` → `AlertsController::preview/$1` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Privacy-Policy` → `Home::privacyPolicy` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Sector/(:segment)` → `Home::sector/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Terms-Of-Service` → `Home::termsOfService` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /resend-activation` → `AuthController::resendActivation` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST /resend-activation` → `AuthController::resendActivationCode` | auth | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Dev/BitcoinTest` → `App\Controllers\Dev\BitcoinTest::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Debug/whoami` → `Debug::whoami` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Debug/auth-audit-cache` → `Debug::authAuditCacheSelfTest` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET debug/common-data/smoke` → `CommonDataController::smoke` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET health` → `Health::index` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET status` → `Health::status` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET api/health` → `Api\\HealthController::index` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET api/admin/chat-usage` → `Api\\AdminChatUsageController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET _ops/opcache-reset` → `Ops::opcacheReset` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET login` → `AuthController::login` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST login` → `AuthController::attemptLogin` | auth | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET logout` → `AuthController::logout` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST logout` → `AuthController::logout` | auth | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET register` → `AuthController::register` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST register` → `AuthController::attemptRegister` | auth | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET register/success` → `AuthController::registerSuccess` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST register/resend-activation` → `AuthController::resendRegistrationActivation` | auth | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET test-create-user` → `AuthController::createTempUser` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Auth/link-robinhood` → `AuthController::linkRobinhood` | auth | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Auth/link-snaptrade` → `AuthController::linkSnapTrade` | auth | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET register/(:segment)` → `AuthController::register/$1` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET (:any)/register` → `AuthController::register` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET (:any)/register/(:segment)` → `AuthController::register/$2` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST (:any)/register` → `AuthController::attemptRegister` | auth | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST (:any)/register/(:segment)` → `AuthController::attemptRegister` | auth | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET activate` → `AuthController::activateAccount` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET activate-account` → `AuthController::activateAccount` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST activate-account` → `AuthController::activateAccount` | auth | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST activate-account/(:segment)` → `AuthController::activateAccount` | auth | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET resend-activate-account` → `AuthController::resendActivateAccount` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET forgot-password` → `AuthController::forgotPassword` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET reset-password` → `AuthController::resetPassword` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST forgot` → `AuthController::attemptForgot` | auth | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST reset-password` → `AuthController::attemptReset` | auth | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST get2FAQRCode` → `AuthController::get2FAQRCode` | auth | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST verify2FACode` → `AuthController::verify2FACode` | auth | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET auth/provider/(:segment)` → `AuthController::redirectToProvider/$1` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET auth/provider/(:segment)/callback` → `AuthController::handleProviderCallback/$1` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET auth/link/(:segment)` → `AuthController::linkProvider/$1` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET auth/unlink/(:segment)` → `AuthController::unlinkProvider/$1` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Account` → `DashboardController::account` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Account/Activity` → `DashboardController::activity` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Account/Billing` → `DashboardController::billing` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Account/Connected-Accounts` → `DashboardController::connectedAccounts` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Account/Notifications` → `DashboardController::notifications` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Account/Security` → `DashboardController::Security` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Account/Social-Media` → `DashboardController::SocialMedia` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Accounts/createLinkToken` → `AccountController::createLinkToken` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Search` → `SearchController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Search/(:segment)` → `SearchController::index/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /MyMI-Wallet` → `WalletsController::MyMIWallet` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Profile/(:segment)` → `DashboardController::profile/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Performance` → `DashboardController::performance` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Schedule` → `DashboardController::schedule` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Trade-Tracker` → `InvestmentsController::tradeTracker` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET /Trade-Tracker/getTradeData` → `InvestmentsController::getTradeData` | invest | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST /Trade-Tracker/saveTradeData` → `InvestmentsController::saveTradeData` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET /MyMI-Gold/Goals/(:segment)` → `DashboardController::goals` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Advisor//` → `AdvisorController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Advisor/generateInsight` → `AdvisorController::generateAdvisorInsight` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Advisor/generateStoryboard` → `AdvisorController::generateNewsStoryboard` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Advisor/tradeAnalysis/(:num)` → `AdvisorController::generateTradeAnalysis/$1` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API//` → `APIController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API//` → `APIController::index` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Status` → `APIController::status` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Status/(:segment)` → `APIController::status` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Health` → `HealthController::index` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Ops/status` → `OpsController::status` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Ops/dispatch` → `OpsController::dispatch` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Ops/ingestReport` → `OpsController::ingestReport` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Ops/reports/latest` → `OpsController::latestReport` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Ops/OPcacheReset` → `OpsController::opcacheReset` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/AiOps/status` → `AiOpsController::status` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/AiOps/toggle` → `AiOpsController::toggle` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/AiOps/run` → `AiOpsController::run` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/AiOps/receiveResult` → `AiOpsController::receiveResult` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/AIOps/health` → `AIOpsController::health` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/AIOps/policy/check` → `AIOpsController::policyCheck` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/AIOps/usage/log` → `AIOpsController::logUsage` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/AIOps/cache/store` → `AIOpsController::cacheStore` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/AIOps/cache/get` → `AIOpsController::cacheGet` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/AIOps/test/policy` → `AIOpsController::testPolicy` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/AIOps/toggle` → `AIOpsController::toggle` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Alerts/backfillEmailAlerts` → `AlertsController::backfillEmailAlerts` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/cronFetchAndGenerateNews` → `ManagementController::cronFetchAndGenerateNews` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/backfillMarketingEmails` → `ManagementController::backfillMarketingEmails` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Discord/completeOnboardingStep` → `DiscordController::completeOnboardingStep` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Status/(:segment)` → `APIController::status` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Investments/getSymbolsByTradeType/(:segment)` → `APIController::getSymbolsByTradeType/$1` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/AI/Chat` → `AIController::postChat` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/AI/Notes` → `AIController::listNotes` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/AI/LinkSettings` → `AIController::updateLinkSettings` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Chat/me` → `ChatController::me` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Chat/tool` → `ChatController::tool` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/Run-CRON-Tasks` → `ManagementController::Run_CRON_Tasks` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/ajaxGetActiveUsers` → `ManagementController::ajaxGetActiveUsers` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/ajaxGetInactiveUsers` → `ManagementController::ajaxGetInactiveUsers` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/checkForSpamUsers` → `ManagementController::checkForSpamUsers` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/distributeTodaysNewsContent` → `ManagementController::distributeTodaysNewsContent` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/exportWeeklyWatchlistCSV` → `ManagementController::exportWeeklyWatchlistCSV` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/exportPostJson/(:num)` → `ManagementController::exportPostJson/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/fetchAlphaVantageNewsForTradeAlerts` → `ManagementController::fetchAlphaVantageNewsForTradeAlerts` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/fetchEmailsToTempScraper` → `ManagementController::fetchEmailsToTempScraper` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/fetchLatestSummaries` → `ManagementController::fetchLatestSummaries` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/fetchNewsEmails` → `ManagementController::fetchNewsEmails` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/generatePostsFromSummary/(:num)` → `ManagementController::generatePostsFromSummary/$1` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/generatePostsFromSummary` → `ManagementController::generatePostsFromSummary` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/generateCoffeeAndStocksNewsletter` → `ManagementController::generateCoffeeAndStocksNewsletter` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/fetchCoffeeAndStocksNewsletter` → `ManagementController::fetchCoffeeAndStocksNewsletter` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/generateWeeklyStreamData` → `ManagementController::generateWeeklyStreamData` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/saveCoffeeAndStocksNewsletter` → `ManagementController::saveCoffeeAndStocksNewsletter` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/generateVoiceScriptManually` → `ManagementController::generateVoiceScriptManually` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/runBackfillAlertsEmails` → `ManagementController::runBackfillAlertsEmails` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/runBackfillMarketingEmails` → `ManagementController::runBackfillMarketingEmails` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/getUsers` → `ManagementController::getUsers` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/getAlerts` → `ManagementController::getAlerts` | alerts | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/getReferrals` → `ManagementController::getReferrals` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/getAssets` → `ManagementController::getAssets` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/getNews` → `ManagementController::getNews` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/getSupport` → `ManagementController::getSupport` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/processAllTradeAlerts` → `ManagementController::processAllTradeAlerts` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/runCronManually` → `ManagementController::runCronManually` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/runDailyAlphaVantageDataPipeline` → `ManagementController::runDailyAlphaVantageDataPipeline` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/scrapeAndGenerateTodaysStoryFromInbox` → `ManagementController::scrapeAndGenerateTodaysStoryFromInbox` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/sendAllDiscordAlerts` → `ManagementController::sendAllDiscordAlerts` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/sendToZapierManually` → `ManagementController::sendToZapierManually` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/sharePost/(:num)/(:segment)` → `ManagementController::sharePost/$1/$2` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/triggerPostAutogenOnEmpty` → `ManagementController::triggerPostAutogenOnEmpty` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/updateMarketDataForAlerts` → `ManagementController::updateMarketDataForAlerts` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/getSocialPlatforms` → `MarketingController::getSocialPlatforms` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/getSocialCommunities` → `MarketingController::getSocialCommunities` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Management/saveSocialCommunity` → `MarketingController::saveSocialCommunity` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/getPostTemplates` → `MarketingController::getPostTemplates` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Management/savePostTemplate` → `MarketingController::savePostTemplate` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/generatePlatformPosts/(:num)` → `MarketingController::generatePlatformPosts/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/generatePlatformPosts` → `MarketingController::generatePlatformPosts` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/generateDailyCommunityPosts` → `MarketingController::generateDailyCommunityPosts` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/exportGeneratedPostJson/(:num)` → `MarketingController::exportGeneratedPostJson/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/generateRevenueDocs` → `MarketingController::generateRevenueDocs` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/cronGenerateDailyCommunityPosts` → `MarketingController::cronGenerateDailyCommunityPosts` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/cronQueueDistribution` → `MarketingController::cronQueueDistribution` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Advisor/generateNow` → `AdvisorController::generateNow` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Projects/fetchInbox` → `ProjectsController::fetchProjectEmails` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Projects/parseInbox` → `ProjectsController::parseProjectEmails` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Projects/promoteLead/(:num)` → `ProjectsController::promoteLead/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Projects/updateProject/(:num)` → `ProjectsController::updateProject/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Projects/openCommitments/(:num)` → `ProjectsController::openCommitments/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Projects/checkThreshold/(:num)` → `ProjectsController::checkThreshold/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Projects/launchPrivateAuction/(:num)` → `ProjectsController::launchPrivateAuction/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Projects/settlePrivateAuction/(:num)` → `ProjectsController::settlePrivateAuction/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Projects/markFunded/(:num)` → `ProjectsController::markFunded/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Projects/createQuarterlyDistribution/(:num)` → `ProjectsController::createQuarterlyDistribution/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Projects/runPayouts/(:num)` → `ProjectsController::runPayouts/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Projects/processMonthlyWithdrawals/(:num)` → `ProjectsController::processMonthlyWithdrawals/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Referrals/bulk-update-status` → `ReferralController::bulkUpdateStatus` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Referrals/bulk-delete` → `ReferralController::bulkDelete` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/Chat/Usage` → `ChatUsageController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Chat/Settings` → `ChatUsageController::saveSettings` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Chat/ResetUser` → `ChatUsageController::resetUser` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/Ops//` → `OpsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/Ops/ajaxStatus` → `OpsController::ajaxStatus` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/Ops/ajaxDispatch` → `OpsController::ajaxDispatch` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/addTradeAlert` → `AlertsController::addTradeAlert` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/backfillCategories` → `AlertsController::backfillCategories` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/createTradeAlert/(:segment)` → `AlertsController::addTradeAlert` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/createTradeAlert` → `AlertsController::addTradeAlert` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/getFilteredAlerts` → `AlertsController::getFilteredAlerts` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/fetchAutoGeneratedAnalysis` → `AlertsController::fetchAutoGeneratedAnalysis` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/fetchEmailAlerts` → `AlertsController::fetchEmailAlerts` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Alerts/fetchMarketAuxNews/(:segment)` → `AlertsController::fetchMarketAuxNews/$1` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/forceFetchEmails` → `AlertsController::forceFetchEmails` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/forceFetchTickers` → `AlertsController::forceFetchTickers` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/generateMarketingForAlert/(:num)` → `AlertsController::generateMarketingForAlert/$1` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Alerts/Alerts/generateAdvisorMediaFromAlert/(:num)` → `AlertsController::generateAdvisorMediaFromAlert/$1` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Alerts/Alerts/generateAdvisorMediaFromAlert` → `AlertsController::generateAdvisorMediaFromAlert` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/generateNow` → `AlertsController::generateNow` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/generateTradeAlertSummary` → `AlertsController::generateTradeAlertSummary` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/getEmaComparison/(:segment)` → `AlertsController::getEmaComparison/$1` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Alerts/generateAlertSocialCopy/(:num)` → `AlertsController::generateAlertSocialCopy/$1` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/getFullMetrics` → `AlertsController::getFullMetrics` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/getLatestPrices` → `AlertsController::getLatestPrices` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/getTechnicalIndicators` → `AlertsController::getTechnicalIndicators` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/hideTradeAlert` → `AlertsController::hideTradeAlert` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/manageTradeAlert` → `AlertsController::manageTradeAlert` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/markAlertAsSentAndSendEmail/(:segment)` → `AlertsController::markAlertAsSentAndSendEmail/$1` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/processAlerts` → `AlertsController::processAlerts` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/processEmailAlerts` → `AlertsController::processEmailAlerts` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/processTradeAlerts` → `AlertsController::processTradeAlerts` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/processTradeBatch` → `AlertsController::processTradeBatch` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/sendAlert` → `AlertsController::sendAlert` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/sendDiscordAlerts` → `AlertsController::sendDiscordAlerts` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/sendDiscordAlertsBySymbol/(:segment)` → `AlertsController::sendDiscordAlertsBySymbol/$1` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/storeMarketingContent` → `AlertsController::storeMarketingContent` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/updateBatchPrices` → `AlertsController::updateBatchPrices` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/updateChartOverride` → `AlertsController::updateChartOverride` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/updateExchange` → `AlertsController::updateExchange` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/updateStatus/(:num)/(:any)` → `AlertsController::updateStatus/$1/$2` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/updateTradeAlerts` → `AlertsController::updateTradeAlerts` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/submitTradeAlert` → `AlertsController::submitTradeAlert` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/getTradeAlertDetails` → `AlertsController::getTradeAlertDetails` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/generateVoiceoverScript` → `AlertsController::generateVoiceoverScript` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/generateVoiceoverAndMarketingContent` → `AlertsController::generateVoiceoverAndMarketingContent` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/generateAndStoreVoiceover` → `AlertsController::generateAndStoreVoiceover` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/generateSocialMediaPosts` → `AlertsController::generateSocialMediaPosts` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/postMarketingContentToSocials` → `AlertsController::postMarketingContentToSocials` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/gen-keys` → `AlertsController::genKeys` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Alerts/sign` → `AlertsController::sign` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Auctions/fmv` → `AuctionsController::computeFMV` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Auctions/settle/(:num)` → `AuctionsController::settle/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Auctions/escrow/release/(:num)` → `AuctionsController::releaseEscrow/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Auctions/escrow/refund/(:num)` → `AuctionsController::refundEscrow/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Auctions/topup` → `AuctionsController::topUp` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/summary` → `BrokerController::summary` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/credit` → `BrokerController::credit` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/available` → `BrokerController::available` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/repayment` → `BrokerController::repayment` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/categories` → `BrokerController::categories` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/transactions` → `BrokerController::transactions` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/goals` → `BrokerController::goals` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/insights` → `BrokerController::insights` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/trends` → `BudgetController::trends` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/net-worth` → `BudgetController::netWorth` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/cash-flow` → `BudgetController::cashFlow` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/budgets` → `BudgetController::budgets` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/savings-goals` → `BrokerController::savingsGoals` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/investment-accounts` → `BrokerController::investmentAccounts` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/linked-accounts` → `BrokerController::linkedAccounts` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/add-linked-account` → `BrokerController::addLinkedAccount` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/remove-linked-account/(:segment)` → `BrokerController::removeLinkedAccount/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/refresh-linked-account/(:segment)` → `BrokerController::refreshLinkedAccount/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidLinkToken/(:segment)` → `BrokerController::fetchPlaidLinkToken/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidLinkToken` → `BrokerController::fetchPlaidLinkToken` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Broker/linkPlaidAccount` → `BrokerController::linkPlaidAccount` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/unlinkPlaidAccount/(:segment)` → `BrokerController::unlinkPlaidAccount/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/refreshPlaidAccount/(:segment)` → `BrokerController::refreshPlaidAccount/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidAccounts/(:segment)` → `BrokerController::fetchPlaidAccounts/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidAccounts` → `BrokerController::fetchPlaidAccounts` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidTransactions/(:segment)` → `BrokerController::fetchPlaidTransactions/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidTransactions` → `BrokerController::fetchPlaidTransactions` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidBalances/(:segment)` → `BrokerController::fetchPlaidBalances/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidBalances` → `BrokerController::fetchPlaidBalances` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidIncome/(:segment)` → `BrokerController::fetchPlaidIncome/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidIncome` → `BrokerController::fetchPlaidIncome` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidLiabilities/(:segment)` → `BrokerController::fetchPlaidLiabilities/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidLiabilities` → `BrokerController::fetchPlaidLiabilities` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidIdentity/(:segment)` → `BrokerController::fetchPlaidIdentity/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidIdentity` → `BrokerController::fetchPlaidIdentity` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidInvestments/(:segment)` → `BrokerController::fetchPlaidInvestments/$1` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidInvestments` → `BrokerController::fetchPlaidInvestments` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidHoldings/(:segment)` → `BrokerController::fetchPlaidHoldings/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchPlaidHoldings` → `BrokerController::fetchPlaidHoldings` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodAccounts` → `BudgetController::fetchRobinhoodAccounts` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodAccountDetails/(:segment)` → `BudgetController::fetchRobinhoodAccountDetails/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodPositions/(:segment)` → `BudgetController::fetchRobinhoodPositions/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodPositions` → `BudgetController::fetchRobinhoodPositions` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodPortfolio/(:segment)` → `BudgetController::fetchRobinhoodPortfolio/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodPortfolio` → `BudgetController::fetchRobinhoodPortfolio` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodWatchlists/(:segment)` → `BudgetController::fetchRobinhoodWatchlists/$1` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodWatchlists` → `BudgetController::fetchRobinhoodWatchlists` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodOrders/(:segment)` → `BudgetController::fetchRobinhoodOrders/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodOrders` → `BudgetController::fetchRobinhoodOrders` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodOrderDetails/(:segment)` → `BudgetController::fetchRobinhoodOrderDetails/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodOrderDetails` → `BudgetController::fetchRobinhoodOrderDetails` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodInstruments/(:segment)` → `BudgetController::fetchRobinhoodInstruments/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodInstruments` → `BudgetController::fetchRobinhoodInstruments` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodQuotes/(:segment)` → `BudgetController::fetchRobinhoodQuotes/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodQuotes` → `BudgetController::fetchRobinhoodQuotes` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodDividends/(:segment)` → `BudgetController::fetchRobinhoodDividends/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodDividends` → `BudgetController::fetchRobinhoodDividends` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodTransfers/(:segment)` → `BudgetController::fetchRobinhoodTransfers/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodTransfers` → `BudgetController::fetchRobinhoodTransfers` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodWatchlistItems/(:segment)` → `BudgetController::fetchRobinhoodWatchlistItems/$1` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodWatchlistItems` → `BudgetController::fetchRobinhoodWatchlistItems` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodTransactionHistory/(:segment)` → `BudgetController::fetchRobinhoodTransactionHistory/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodTransactionHistory` → `BudgetController::fetchRobinhoodTransactionHistory` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodNotifications/(:segment)` → `BudgetController::fetchRobinhoodNotifications/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodNotifications` → `BudgetController::fetchRobinhoodNotifications` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodACHRelationships/(:segment)` → `BudgetController::fetchRobinhoodACHRelationships/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodACHRelationships` → `BudgetController::fetchRobinhoodACHRelationships` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodCryptoAccounts/(:segment)` → `BudgetController::fetchRobinhoodCryptoAccounts/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodCryptoAccounts` → `BudgetController::fetchRobinhoodCryptoAccounts` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodCryptoPositions/(:segment)` → `BudgetController::fetchRobinhoodCryptoPositions/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodCryptoPositions` → `BudgetController::fetchRobinhoodCryptoPositions` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodCryptoPortfolio/(:segment)` → `BudgetController::fetchRobinhoodCryptoPortfolio/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodCryptoPortfolio` → `BudgetController::fetchRobinhoodCryptoPortfolio` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodCryptoOrders/(:segment)` → `BudgetController::fetchRobinhoodCryptoOrders/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodCryptoOrders` → `BudgetController::fetchRobinhoodCryptoOrders` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodCryptoOrderDetails/(:segment)` → `BudgetController::fetchRobinhoodCryptoOrderDetails/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodCryptoOrderDetails` → `BudgetController::fetchRobinhoodCryptoOrderDetails` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodCryptoTransactions/(:segment)` → `BudgetController::fetchRobinhoodCryptoTransactions/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodCryptoTransactions` → `BudgetController::fetchRobinhoodCryptoTransactions` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodCryptoQuotes/(:segment)` → `BudgetController::fetchRobinhoodCryptoQuotes/$1` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Broker/fetchRobinhoodCryptoQuotes` → `BudgetController::fetchRobinhoodCryptoQuotes` | budget | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/summary` → `BudgetController::summary` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/credit` → `BudgetController::credit` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/available` → `BudgetController::available` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/repayment` → `BudgetController::repayment` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/categories` → `BudgetController::categories` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/transactions` → `BudgetController::transactions` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/goals` → `BudgetController::goals` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/insights` → `BudgetController::insights` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/trends` → `BudgetController::trends` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/net-worth` → `BudgetController::netWorth` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/cash-flow` → `BudgetController::cashFlow` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/budgets` → `BudgetController::budgets` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/savings-goals` → `BudgetController::savingsGoals` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/investment-accounts` → `BudgetController::investmentAccounts` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/linked-accounts` → `BudgetController::linkedAccounts` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/add-linked-account` → `BudgetController::addLinkedAccount` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/remove-linked-account/(:segment)` → `BudgetController::removeLinkedAccount/$1` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/refresh-linked-account/(:segment)` → `BudgetController::refreshLinkedAccount/$1` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/Data` → `BudgetController::apiBudgetData` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/Credit` → `BudgetController::apiCreditData` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/Available` → `BudgetController::apiAvailableData` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/Repayment` → `BudgetController::apiRepaymentSummary` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/getUserBudgetRecords` → `BudgetController::getUserBudgetRecords` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/getUserCreditBalances` → `BudgetController::getUserCreditBalances` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/getUserAvailableBalances` → `BudgetController::getUserAvailableBalances` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Budget/getUserRepaymentSummary` → `BudgetController::getUserRepaymentSummary` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/ContentEngine/ingestScanner` → `ContentEngineController::ingestScanner` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/ContentEngine/processIngest/(:num)` → `ContentEngineController::processIngest/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/ContentEngine/topIdeas` → `ContentEngineController::topIdeas` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/ContentEngine/posts` → `ContentEngineController::posts` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/ContentEngine/posts/(:num)` → `ContentEngineController::posts/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/ContentEngine/approvePost/(:num)` → `ContentEngineController::approvePost/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/ContentEngine/sendPost/(:num)` → `ContentEngineController::sendPost/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/ContentEngine/runDaily` → `ContentEngineController::runDaily` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Discord/commandsCatalog` → `DiscordController::commandsCatalog` | integrations | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Discord/onboardingSteps` → `DiscordController::onboardingSteps` | integrations | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Discord/sharingGuide` → `DiscordController::sharingGuide` | integrations | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Discord/enqueue` → `DiscordController::enqueue` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Discord/broadcast` → `DiscordController::broadcast` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Discord/interactions` → `DiscordController::handleInteraction` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Discord/messageHook` → `DiscordController::messageHook` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Discord/webhook` → `DiscordController::webhookProxy` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Discord/createLinkToken` → `DiscordController::createLinkToken` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Discord/process-queue` → `DiscordController::processQueue` | integrations | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Discord/coalesce-now` → `DiscordController::coalesceNow` | integrations | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `DELETE API/Discord/purge-dead` → `DiscordController::purgeDead` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Discord/health` → `DiscordController::health` | integrations | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Discord/test` → `DiscordController::test` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/DripCampaign/click/(:segment)` → `DripCampaignController::click/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/DripCampaign/Enroll/(:num)` → `DripCampaignController::enrollUser/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/DripCampaign/open/(:segment)` → `DripCampaignController::open/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/DripCampaign/processBatch` → `DripCampaignController::processBatch` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/DripCampaign/TestCron` → `DripCampaignController::testDripCron` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Email/autoScheduleDraftCampaigns` → `EmailController::autoScheduleDraftCampaigns` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Email/cloneCampaign/(:num)` → `EmailController::cloneCampaign/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Email/createDraftCampaign` → `EmailController::createDraftCampaign` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Email/scheduleCampaignApi/(:num)` → `EmailController::scheduleCampaignApi/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Email/cancelScheduledCampaign/(:num)` → `EmailController::cancelScheduledCampaign/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `DELETE API/Email/deleteCampaign/(:num)` → `EmailController::deleteCampaign/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Email/fetchCampaignAnalytics` → `EmailController::fetchCampaignAnalytics` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Email/fetchQueuedEmails` → `EmailController::fetchQueuedEmails` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Email/fetchQueuedEmailById/(:num)` → `EmailController::fetchQueuedEmailById/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Email/getAllCampaigns` → `EmailController::getAllCampaigns` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Email/getCampaignMetrics/(:num)` → `EmailController::getCampaignMetrics/$1` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Email/getCampaignStats/(:num)` → `EmailController::getCampaignStats/$1` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Email/getEmailQueueStats` → `EmailController::getEmailQueueStats` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Email/getEmailQueueTrend` → `EmailController::getEmailQueueTrend` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Email/processScheduledCampaigns` → `EmailController::processScheduledCampaigns` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Email/sendMassTestCampaign` → `EmailController::sendMassTestCampaign` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Email/trackBounceWebhook` → `EmailController::trackBounceWebhook` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Email/unsubscribe/(:any)` → `EmailController::unsubscribe/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/eSports/createEvent` → `EsportsController::createEvent` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/eSports/joinEvent` → `EsportsController::joinEvent` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/eSports/lockEscrow` → `EsportsController::lockEscrow` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/eSports/cancelEvent` → `EsportsController::cancelEvent` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/eSports/receiveResultWebhook` → `EsportsController::receiveResultWebhook` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/eSports/settlePayouts` → `EsportsController::settlePayouts` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/eSports/cronProcessJobs` → `EsportsController::cronProcessJobs` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/eSports/event/(:num)` → `EsportsController::getEvent/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/eSports/events` → `EsportsController::listEvents` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Investments//` → `InvestmentsController::index` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Investments/getSymbolsByTradeType/(:segment)` → `InvestmentsController::getSymbolsByTradeType/$1` | invest | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Investments/getInvestmentData/(:segment)` → `InvestmentsController::getInvestmentData/$1` | invest | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Investments/searchTickers` → `InvestmentsController::searchTickers` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Investments/news` → `InvestmentsController::listNews` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Investments/news/(:num)` → `InvestmentsController::getNews/$1` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Investments/news` → `InvestmentsController::createNews` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Investments/news/(:num)` → `InvestmentsController::updateNews/$1` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `DELETE API/Investments/news/(:num)` → `InvestmentsController::deleteNews/$1` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Investments/validateSymbol` → `InvestmentsController::validateSymbol` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/banUnverifiedUsers` → `ManagementController::banUnverifiedUsers` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/processQueuedEmails` → `ManagementController::processQueuedEmails` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/resendActivationEmailsBatch` → `ManagementController::resendActivationEmailsBatch` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/resendActivationEmailsBatchQueued` → `ManagementController::resendActivationEmailsBatchQueued` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/sendTestActivationEmail` → `ManagementController::sendTestActivationEmail` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/saveSuggestion` → `ManagementController::saveSuggestion` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/SMTP/test` → `App\\Modules\\Management\\Controllers\\SmtpTestController::probe` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/approvePost/(:num)` → `MarketingController::approvePost/$1` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/approveBufferItem/(:num)` → `MarketingController::approveBufferItem/$1` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/autoScheduleNextApproved` → `MarketingController::autoScheduleNextApproved` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/cronAnalyzeContent` → `MarketingController::cronAnalyzeContent` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/cronAutoPublishGroupedDigest` → `MarketingController::cronAutoPublishGroupedDigest` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/cronFetchAndGenerateNews` → `MarketingController::cronFetchAndGenerateNews` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/cronFetchInbox` → `MarketingController::cronFetchInbox` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/cronFetchMarketingEmails` → `MarketingController::cronFetchMarketingEmails` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/cronProcessSMSMarketingIdeas` → `MarketingController::cronProcessSMSMarketingIdeas` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `DELETE API/Marketing/deleteScrape/(:num)` → `MarketingController::deleteScrape/$1` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/downloadVoiceover/(:any)` → `MarketingController::downloadVoiceover/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/distributeHighScoreContent` → `MarketingController::distributeHighScoreContent` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/emailPostForApproval/(:num)` → `MarketingController::emailPostForApproval/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/fetchBufferPaginated` → `MarketingController::fetchBufferPaginated` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/fetchFinalizedSummariesBlock` → `MarketingController::fetchFinalizedSummariesBlock` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/fetchGeneratedSummaries` → `MarketingController::fetchGeneratedSummaries` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/fetchGeneratedSummariesBlock` → `MarketingController::fetchGeneratedSummariesBlock` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/fetchGeneratedSummariesJson` → `MarketingController::fetchGeneratedSummariesJson` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/forceGenerateFromTemp` → `MarketingController::forceGenerateFromTemp` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/ForceGenerateFromTemp/(:num)` → `MarketingController::ForceGenerateFromTemp/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Marketing/generateCampaignContent` → `MarketingController::generateCampaignContent` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Marketing/generateDailyMarketCampaign` → `MarketingController::generateDailyMarketCampaign` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Marketing/generateCampaignStepContent` → `MarketingController::generateCampaignStepContent` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/generateContentFromScraper` → `MarketingController::generateContentFromScraper` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/generateContentDigestFromStored` → `MarketingController::generateContentDigestFromStored` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/generateDailyContentDigest` → `MarketingController::generateDailyContentDigest` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/generateKimiSummaries` → `MarketingController::generateKimiSummaries` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/generateKimiPosts` → `MarketingController::generateKimiPosts` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/GenerateFromSimilar/(:num)` → `MarketingController::generateFromSimilar/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/generateFromSimilar` → `MarketingController::generateFromSimilar` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/generateLivePreview` → `MarketingController::generateLivePreview` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/generatePostsFromSummary/(:num)` → `MarketingController::generatePostsFromSummary/$1` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/generatePostsFromSummary` → `MarketingController::generatePostsFromSummary` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Marketing/generatePostMediaContent` → `MarketingController::generatePostMediaContent` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/generateScheduledPosts` → `MarketingController::generateScheduledPosts` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/getCleanedScrapedContent` → `MarketingController::getCleanedScrapedContent` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/getScrapeDetails/(:num)` → `MarketingController::getScrapeDetails/$1` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/generateThreadFromSummary/(:num)` → `MarketingController::generateThreadFromSummary/$1` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/getContentPerformanceAnalytics` → `MarketingController::getContentPerformanceAnalytics` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/getGeneratedPostsPaginated` → `MarketingController::getGeneratedPostsPaginated` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/getStoryboardPackage/(:num)` → `MarketingController::getStoryboardPackage/$1` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/getTopGeneratedPosts` → `MarketingController::getTopGeneratedPosts` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/getTopKeywordChart/(:num)` → `MarketingController::getTopKeywordChart/$1` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/groupSimilarSummariesByCosine` → `MarketingController::groupSimilarSummariesByCosine` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/massResendActivationEmails` → `MarketingController::massResendActivationEmails` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/monitorKeywords` → `MarketingController::monitorKeywordsAndScrape` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/previewBufferItem/(:num)` → `MarketingController::previewBufferItem/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/previewPendingSummaries` → `MarketingController::previewPendingSummaries` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/processMarketingTempEmails/(:num)/(:segment)/(:num)` → `MarketingController::processMarketingTempEmails/$1/$2/$3` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/processMarketingTempEmails/(:num)/(:segment)` → `MarketingController::processMarketingTempEmails/$1/$2` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/publishGroupedContentDraft` → `MarketingController::publishGroupedContentDraft` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/rankBufferPostsDaily` → `MarketingController::rankBufferPostsDaily` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/reprocessIncompleteEmails` → `MarketingController::reprocessIncompleteEmails` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/rejectBufferItem/(:num)` → `MarketingController::rejectBufferItem/$1` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/runContentGenerationBatch` → `MarketingController::runContentGenerationBatch` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/runKeywordBackfillBatch` → `MarketingController::runKeywordBackfillBatch` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/runKeywordEnrichment` → `MarketingController::runKeywordEnrichment` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/runScheduledTasks` → `MarketingController::runScheduledTasks` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Search/(:segment)/(:any)` → `ManagementController::index/$1/$2` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/sendWalkthroughEmails` → `MarketingController::sendWalkthroughEmails` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/scheduleApprovedPost/(:num)` → `MarketingController::scheduleApprovedPost/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/schedulePost/(:any)/(:any)/(:any)` → `MarketingController::schedulePost/$1/$2/$3` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/sharePost/(:num)/(:segment)` → `MarketingController::sharePost/$1/$2` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Large-Content/Form` → `MarketingController::submitLargeContentForm` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/submitLargeContent` → `MarketingController::submitLargeContent` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Manual-Content/Form` → `MarketingController::shortLongContentForm` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/submitManualContent` → `MarketingController::submitManualContent` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/testGenerateDailyDigest` → `MarketingController::testGenerateDailyDigest` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/testGenerateFromTempEmail/(:num)` → `MarketingController::testGenerateFromTempEmail/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/testTfIdfEdgeCases` → `MarketingController::testTfIdfEdgeCases` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/testGenerateSummarizerHarness` → `MarketingController::testGenerateSummarizerHarness` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Timeline/(:segment)` → `MarketingController::timeline/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Timeline` → `MarketingController::viewTimelineGrouped` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/triggerBackfill` → `MarketingController::reprocessIncompleteEmails` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/triggerPostAutogenOnEmpty` → `MarketingController::triggerPostAutogenOnEmpty` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/updateCampaignLinks` → `MarketingController::updateCampaignLinks` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/updateInsight` → `MarketingController::updateInsight` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/updateCampaignMessageField` → `MarketingController::updateCampaignMessageField` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/updatePostSchedule/(:num)` → `MarketingController::updatePostSchedule/$1` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/updatePlatformToggle/(:num)` → `MarketingController::updatePlatformToggle/$1` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/validateSymbol` → `MarketingController::validateSymbol` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing//` → `MarketingController::index` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Marketing/Add/(:segment)` → `MarketingController::add/$1` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'POST' API/Marketing/Add-Subscriber` → `MarketingController::addSubscriber` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Approve-Content/(:num)` → `MarketingController::approveContent/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Blog-Creator` → `MarketingController::blogCreator` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Blogs` → `MarketingController::blogs` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Campaigns` → `MarketingController::campaigns` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Content-Review` → `MarketingController::contentReview` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Content/Generator` → `MarketingController::contentGenerator` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Content/Listing` → `MarketingController::contentListing` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Daily-Log` → `MarketingController::viewDailyLogs` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Edit-Content/(:num)` → `MarketingController::editContent/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Email/(:any)/(:any)` → `MarketingController::viewEmail/$1/$2` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/fetchEmails` → `MarketingController::fetchEmails` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/fetchMissingLogos` → `MarketingController::fetchMissingLogos` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Financial-News` → `MarketingController::financialNews` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/generateAutomatedContent` → `MarketingController::generateAutomatedContent` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/generateContent` → `MarketingController::generateContent` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/generateNewsletter` → `MarketingController::generateNewsletterContent` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/getRecentScrapes` → `MarketingController::getRecentScrapes` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Grouped-Content-Drafts` → `MarketingController::generateGroupedContentDrafts` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Ideas` → `MarketingController::ideas` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Post-Creator` → `MarketingController::postCreator` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/previewGeneratedPost/(:num)` → `MarketingController::previewGeneratedPost/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Promote` → `MarketingController::promote` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Promote/(:segment)` → `MarketingController::promote` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/PublishBlog/(:num)` → `Management\MarketingController::publishBlog/$1` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Research` → `AlertsController::research` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/RunContentGeneration` → `Management\MarketingController::runContentGeneration` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Quick-Scraper` → `MarketingController::standaloneScrape` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Reject-Content/(:num)` → `MarketingController::rejectContent/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/Save-Content-Edit/(:num)` → `MarketingController::saveContentEdit/$1` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Schedule` → `MarketingController::schedule` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Schedule/(:segment)` → `MarketingController::schedule/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/scheduleNewsletters` → `MarketingController::scheduleNewsletterCampaign` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/submitDailyLog` → `MarketingController::submitDailyLog` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/Scrape-Link` → `MarketingController::scrapeLink` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/sendNotification` → `MarketingController::sendNotification` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/sendNewsletter` → `MarketingController::sendScheduleNewsletter` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Communities` → `MarketingController::communities` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Test` → `MarketingController::test` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Twitter` → `MarketingController::twitterDashboard` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Video-Creator` → `MarketingController::videoCreator` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/View-Email/(:segment)/(:segment)` → `MarketingController::viewEmail/$1/$2` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/View-Grouped-Summaries` → `MarketingController::View-Grouped-Summaries` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/Marketing/MyMI-Gold/Tasks/Add` → `WalletsController::addUserGoldTasks` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Email-Templates/create` → `EmailTemplateController::create` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing//Email-Templates/store` → `EmailTemplateController::store` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Email-Queue` → `EmailQueueController::index` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/Email-Queue/create` → `EmailQueueController::create` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/Email-Queue/store` → `EmailQueueController::store` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/Email-Queue/processQueue` → `EmailQueueController::processQueue` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/getPlatforms` → `ManagementController::getPlatforms` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/savePlatform` → `ManagementController::savePlatform` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `DELETE API/Marketing/deletePlatform/(:num)` → `ManagementController::deletePlatform/$1` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/getPlatformRules/(:segment)` → `ManagementController::getPlatformRules/$1` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/upsertPlatformRule` → `ManagementController::upsertPlatformRule` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `DELETE API/Marketing/deletePlatformRule/(:num)` → `ManagementController::deletePlatformRule/$1` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/searchTaxonomy` → `ManagementController::searchTaxonomy` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/saveTaxonomy` → `ManagementController::saveTaxonomy` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `DELETE API/Marketing/deleteTaxonomy/(:num)` → `ManagementController::deleteTaxonomy/$1` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Marketing/listSuggestions/(:segment)/(:segment)` → `ManagementController::listSuggestions/$1/$2` | marketing | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/saveSuggestion` → `ManagementController::saveSuggestion` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `DELETE API/Marketing/deleteSuggestion/(:num)` → `ManagementController::deleteSuggestion/$1` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/getPostingPlan` → `ManagementController::getPostingPlan` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Marketing/composePost` → `ManagementController::composePost` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions//` → `PredictionsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Liquidity/Add` → `PredictionsController::addLiquidity` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Liquidity/Remove` → `PredictionsController::removeLiquidity` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Markets` → `PredictionsController::markets` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Market/(:num)` → `PredictionsController::view/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Markets/Create` → `PredictionsController::createMarket` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Markets/Settle/(:num)` → `PredictionsController::settle/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Orders/Place` → `PredictionsController::placeOrder` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Orders/Cancel` → `PredictionsController::cancelOrder` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Portfolio` → `PredictionsController::portfolio` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Settlements` → `PredictionsController::settlements` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Predictions/PlaceOrder` → `PredictionsController::placeOrder` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Predictions/CancelOrder` → `PredictionsController::cancelOrder` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Distribute-Fees` → `PredictionsController::cronDistributeFees` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Fetch-Market-Data` → `PredictionsController::cronFetchMarketData` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Fetch-User-Data` → `PredictionsController::cronFetchUserData` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Settle-Markets` → `PredictionsController::cronSettleMarkets` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Expire-Markets` → `PredictionsController::cronExpireMarkets` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Update-Market-Prices` → `PredictionsController::cronUpdateMarketPrices` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Update-Market-States` → `PredictionsController::cronUpdateMarketStates` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Update-User-Positions` → `PredictionsController::cronUpdateUserPositions` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Update-User-Stakes` → `PredictionsController::cronUpdateUserStakes` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Update-User-Fees` → `PredictionsController::cronUpdateUserFees` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Update-User-PnL` → `PredictionsController::cronUpdateUserPnL` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Update-User-Rankings` → `PredictionsController::cronUpdateUserRankings` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Update-User-Leaderboard` → `PredictionsController::cronUpdateUserLeaderboard` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Update-User-Stats` → `PredictionsController::cronUpdateUserStats` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Update-User-Notifications` → `PredictionsController::cronUpdateUserNotifications` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Process-Expired-Markets` → `PredictionsController::cronProcessExpiredMarkets` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Process-Settled-Markets` → `PredictionsController::cronProcessSettledMarkets` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Process-User-Orders` → `PredictionsController::cronProcessUserOrders` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Process-User-Positions` → `PredictionsController::cronProcessUserPositions` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Process-User-Stakes` → `PredictionsController::cronProcessUserStakes` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Process-User-Fees` → `PredictionsController::cronProcessUserFees` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Process-User-PnL` → `PredictionsController::cronProcessUserPnL` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Process-User-Rankings` → `PredictionsController::cronProcessUserRankings` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Process-User-Leaderboard` → `PredictionsController::cronProcessUserLeaderboard` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Process-User-Stats` → `PredictionsController::cronProcessUserStats` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Process-User-Notifications` → `PredictionsController::cronProcessUserNotifications` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Process-User-Settlements` → `PredictionsController::cronProcessUserSettlements` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Lock` → `PredictionsController::lock` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Rebalance` → `PredictionsController::rebalanceOdds` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Cron/Unlock` → `PredictionsController::unlock` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Predictions/Latest` → `PredictionsController::latest` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Solana/getMarketPrice/(:segment)` → `SolanaController::get/$1` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Solana/getCoinAmount/(:segment)` → `SolanaController::getCoinAmount/$1` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Solana/getMarketPrice` → `SolanaController::getMarketPrice` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Solana/getTokenPrice/(:segment)` → `SolanaController::getTokenPrice/$1` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Solana/getExchangePrice/(:segment)` → `SolanaController::getExchangePrice/$1` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Solana/getAssetsData` → `SolanaController::getAssetsData` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Solana/provisionDefaultWallet` → `SolanaController::provisionDefaultWallet` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Solana/updatePrices` → `SolanaController::updateSolanaPrices` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Solana/updateTokens` → `SolanaController::updateSolanaTokens` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Solana/health` → `SolanaController::health` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Solana/wallet/(:segment)/balance` → `SolanaController::getBalance/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Solana/wallet/(:segment)/tokens` → `SolanaController::getTokenAccounts/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Solana/transfer` → `SolanaController::transfer` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Solana/swap/quote` → `SolanaController::quote` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Solana/swap/execute` → `SolanaController::swap` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Solana/token/create` → `SolanaController::createToken` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Solana/token/mint` → `SolanaController::mint` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Support/kb` → `SupportController::kb` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Support/kb/(:segment)` → `SupportController::kbArticle/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Wallets//` → `WalletsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Wallets/summary` → `WalletsController::summary` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Wallets/providers` → `WalletsController::providers` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Wallets/Create` → `WalletsController::create` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `PUT API/Wallets/Update/(:num)` → `WalletsController::update/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `DELETE API/Wallets/Unlink/(:num)` → `WalletsController::unlink/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Wallets/Link-Robinhood` → `WalletsController::linkRobinhood` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Wallets/Link-Snaptrade` → `WalletsController::linkSnapTrade` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Wallets/Snaptrade/Connect-URL` → `WalletsController::getSnapTradeConnectUrl` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Wallets/Banking/Update/(:num)` → `WalletsController::updateBank/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Wallets/Credit/Update/(:num)` → `WalletsController::updateCredit/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Wallets/Debt/Update/(:num)` → `WalletsController::updateDebt/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Wallets/Investments/Update/(:num)` → `WalletsController::updateInvestment/$1` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Wallets/Crypto/Update/(:num)` → `WalletsController::updateCrypto/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Wallets/Plaid/Config-Debug` → `WalletsController::plaidConfigDebug` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Wallets/Plaid/Env` → `WalletsController::plaidEnv` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Wallets/Plaid/OAuth-Return` → `WalletsController::plaidOAuthReturn` | auth | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Wallets/Plaid/Webhook` → `WalletsController::plaidWebhook` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Wallets/Plaid/Link-Token` → `WalletsController::plaidLinkToken` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Wallets/Plaid/Exchange` → `WalletsController::plaidExchange` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Wallets//(:segment)/(:segment)` → `WalletsController::index/$1/$2` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' API/User/Comments/Add` → `UserController::addComment` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog//` → `BlogController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/Post/(:segment)` → `BlogController::viewBlog/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/Earnings//` → `EarningsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/Earnings/Test` → `EarningsController::test` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/Earnings/(:segment)` → `EarningsController::viewByDate` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/Earnings/(:segment)` → `EarningsController::viewByDate` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/Investing//` → `InvestingController::index` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/Investing/The-Beginners-Guide-To-Option-Trading` → `InvestingController::TheBeginnersGuideToOptionTrading` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/Investing/The-Fundamentals-Of-Investing` → `InvestingController::TheFundamentalsOfInvesting` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/Investing/Tips-For-Effective-Investment-Portfolio-Management` → `InvestingController::TipsForEffectiveInvestmentPortfolioManagement` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/IRS//` → `InvestingController::index` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/IRS/IRS-Expanded-Home-Energy-Tax-Credits` → `IRSController::IRSExpandedHomeEnergyTaxCredits` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/News-And-Updates//` → `UpdatesController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/News-And-Updates//` → `NewsAndUpdates::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/News-And-Updates/Integrating-With-Plaid` → `NewsAndUpdates::IntegratingWithPlaid` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance` → `NewsAndUpdates::TheRoadmapToTheFutureOfFinance` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/Personal-Budgeting//` → `PersonalBudgetingController::index` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting` → `PersonalBudgetingController::TheImportanceOfPersonalFinancialBudgeting` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Dashboard//` → `DashboardController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Dashboard/Transaction-Modal/(:segment)` → `DashboardController::loadModalContent/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Dashboard/Transaction-Modal/(:segment)/(:segment)` → `DashboardController::loadModalContent/$1/$2` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Dashboard/Transaction-Modal/(:segment)/(:segment)/(:segment)` → `DashboardController::loadModalContent/$1/$2/$3` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Dashboard/Transaction-Modal/(:segment)/(:segment)/(:segment)/(:segment)` → `DashboardController::loadModalContent/$1/$2/$3/$4` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Dashboard/Transaction-Modal/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)` → `DashboardController::loadModalContent/$1/$2/$3/$4/$5` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Dashboard/Transaction-Modal/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)` → `DashboardController::loadModalContent/$1/$2/$3/$4/$5/$6` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Dashboard/LoadingScreen` → `DashboardController::LoadingScreen` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Dashboard/onboarding` → `DashboardController::onboarding` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Dashboard/checkOnboardingStatus` → `DashboardController::checkOnboardingStatus` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Dashboard/completeOnboardingStep/(:segment)` → `DashboardController::completeOnboardingStep/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Dashboard/onboarding/progress` → `OnboardingWalkthroughController::progress` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Dashboard/onboarding/profile` → `OnboardingWalkthroughController::saveProfile` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Dashboard/onboarding/budget-income` → `OnboardingWalkthroughController::saveBudgetIncome` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Dashboard/onboarding/credit-debt` → `OnboardingWalkthroughController::saveCreditDebt` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Dashboard/onboarding/recurring-expense` → `OnboardingWalkthroughController::saveRecurringExpense` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Dashboard/onboarding/watchlist` → `OnboardingWalkthroughController::saveWatchlist` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Management//` → `ManagementController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/AiOps` → `AiOpsManagementController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Ops` → `OpsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Ops/ajaxStatus` → `OpsController::ajaxStatus` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Ops/ajaxDispatch` → `OpsController::ajaxDispatch` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Admin//` → `AdminController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts//` → `AlertsController::index` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts/Add/(:segment)` → `AlertsController::add` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts/addTradeAlert` → `AlertsController::addTradeAlert` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts/Advisor/Media` → `AlertsController::advisorMedia` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Alerts/Generate-Advisor-Package` → `AlertsController::generateAdvisorPackage` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts/Crypto/(:segment)/(:segment)` → `Management\AlertsController::stockOverview/$1/$2` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Management/Alerts/Audit/Emails` → `AlertsController::auditEmailScraper` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts/fetchData` → `AlertsController::fetchData` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts/Fetch/Ticker/(:segment)` → `AlertsController::fetchTickerDetails/$1` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts/Import/Tickers` → `AlertsController::importTickers` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts/Stock/(:segment)/(:segment)` → `Management\AlertsController::stockOverview/$1/$2` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts/Tasks/fetchAlerts` → `Management\AlertsController::fetchData` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts/Submit/TradingView` → `AlertsController::submitTradingView` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts/Test` → `AlertsController::test` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts/Test-Alert-Email` → `AlertsController::testEmail` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts/Test-Email` → `AlertsController::sendTestEmail` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts/Trades` → `AlertsController::trades` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Alerts/Top-Performance/Weekly` → `AlertsController::topPerformanceWeekly` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Assets//` → `AssetsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Budgets//` → `BudgetsController::index` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Budgeting//` → `BudgetingController::index` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Development//` → `DevelopmentController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Discord//` → `DiscordController::index` | integrations | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Discord/Discord/Channels/Save` → `DiscordController::saveDiscordChannel` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Discord/Discord/Channels/Delete` → `DiscordController::deleteDiscordChannel` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Discord/Discord/Templates/Save` → `DiscordController::saveDiscordTemplate` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Discord/Discord/Templates/Delete` → `DiscordController::deleteDiscordTemplate` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Discord/Discord/Subscriptions/Save` → `DiscordController::saveDiscordSubscription` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Discord/Discord/Subscriptions/Delete` → `DiscordController::deleteDiscordSubscription` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Discord/Discord/Policies/Save` → `DiscordController::saveDiscordPolicy` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Discord/Discord/Policies/Delete` → `DiscordController::deleteDiscordPolicy` | integrations | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Drip-Campaigns//` → `DripCampaignController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Management/Drip-Campaigns/Create` → `DripCampaignController::create` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Drip-Campaigns/(:num)/Steps` → `DripCampaignController::viewSteps/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Management/Drip-Campaigns/(:num)/Steps/Add` → `DripCampaignController::addStep/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Email//` → `EmailController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Email/addMember` → `EmailController::addMember` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Email/autoScheduleDrafts` → `EmailController::autoScheduleDrafts` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Email/autoScheduleLogs` → `EmailController::autoScheduleLogs` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Email/campaigns` → `EmailController::campaigns` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Email/campaignStats/(:num)` → `EmailController::campaignStats/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Email/createList` → `EmailController::createList` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Email/editCampaign/(:num)` → `EmailController::editCampaign/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Email/previewQueuedEmail/(:num)` → `EmailController::previewQueuedEmail/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Email/queued` → `EmailController::queued` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Email/sendCampaign` → `EmailController::sendCampaign` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Email/scheduleCampaign/(:num)` → `EmailController::scheduleCampaign/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Email/scheduleCampaignSubmit/(:num)` → `EmailController::scheduleCampaignSubmit/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Email/updateCampaign/(:num)` → `EmailController::updateCampaign/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Exchange//` → `ExchangeController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Finance//` → `FinanceController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/How-Tos//` → `HowTosController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/How-Tos/Employees/Account-Setup` → `HowTosController::employeeAccountSetup` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/How-Tos/Employees/Email-Setup` → `HowTosController::employeeEmailSetup` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/HR//` → `HRController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Investments//` → `InvestmentsController::index` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Investments/News` → `InvestmentsController::newsIndex` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Marketing/Email//` → `EmailController::index` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Marketing/Exchange//` → `MarketingController::index` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Management/Marketing/Exchange/Edit/(:segment)` → `MarketingController::edit/$1` | marketing | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Marketing/Exchange/Top-Communities` → `MarketingController::topCommunities` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Marketing/Exchange/Top-Communities/(:segment)` → `MarketingController::topCommunities/$1` | marketing | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Operations//` → `OperationsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Partners//` → `PartnersController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Projects//` → `ProjectsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Projects/Approve/(:segment)` → `ProjectsController::approveProject/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Projects/Edit/(:segment)` → `ProjectsController::approveProject/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Projects/Reject/(:segment)` → `ProjectsController::rejectProject/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Projects/Quick-Intake` → `ProjectsController::realEstateQuickIntake` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Projects/Quick-Intake` → `ProjectsController::realEstateQuickSubmit` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Referrals//` → `ReferralsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Security//` → `SecurityController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Services//` → `ServicesController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Users//` → `UsersController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Users/Profile/(:segment)` → `UsersController::profile` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Management/Users/ajaxBlockUser/(:segment)` → `UsersController::ajaxBlockUser` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Management/Users/ajaxBulkBanUsers` → `UsersController::ajaxBulkBanUsers` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Wallets//` → `WalletsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Wallets/Reconcile` → `WalletsController::reconcile` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Management/Wallets/EmailUserAboutIssue/(:num)/(:num)` → `WalletsController::emailUserAboutIssue/$1/$2` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Web-Design//` → `WebDesignController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Search//` → `SearchController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Advisor//` → `AdvisorController::index` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Advisors//` → `AdvisorController::index` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Alerts//` → `AlertsController::index` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Alerts//Trades` → `AlertsController::trades` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Auctions//` → `AuctionsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Auctions/Item/(:num)` → `AuctionsController::item/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Auctions/Create` → `AuctionsController::create` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Auctions/Bid/(:num)` → `AuctionsController::bid/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Auctions/Poll/(:num)` → `AuctionsController::poll/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Budget//` → `BudgetController::index` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Budget/Search/(:any)` → `BudgetController::index` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Budget/This-Month` → `BudgetController::thisMonth` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Budget/This-Month/(:segment)` → `BudgetController::thisMonth/$1` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Budget/Last-Month` → `BudgetController::lastMonth` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Budget/Last-Month/(:segment)` → `BudgetController::lastMonth/$1` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Budget/Next-Month` → `BudgetController::nextMonth` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Budget/Next-Month/(:segment)` → `BudgetController::nextMonth/$1` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Budget/Account-Manager` → `BudgetController::accountManager` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Account-Manager` → `BudgetController::accountManager` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Add` → `BudgetController::add` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Add/(:segment)` → `BudgetController::add/$1` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Approve-Recurring-Schedule/(:num)` → `BudgetController::approveRecurringSchedule/$1` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Cancel-Account/(:segment)` → `BudgetController::cancelAccount/$1` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Copy` → `BudgetController::edit` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Copy/(:segment)` → `BudgetController::edit/$1` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Delete-Account` → `BudgetController::deleteAccount` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Delete-Account/(:segment)` → `BudgetController::deleteAccount/$1` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Details` → `BudgetController::details` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Details/(:segment)` → `BudgetController::details/$1` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Edit` → `BudgetController::edit` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Edit/(:segment)` → `BudgetController::edit/$1` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Edit/(:segment)/(:segment)` → `BudgetController::edit/$1/$2` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Expenses` → `BudgetController::accountOverview` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Financial-Analysis` → `BudgetController::financialAnalysis` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Financial-Forecaster` → `BudgetController::financialForecaster` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Budget/Forecast` → `BudgetController::forecast` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Budget/Forecast/(:segment)` → `BudgetController::forecast/$1` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/History` → `BudgetController::history` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/History/(:segment)` → `BudgetController::history` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Income` → `BudgetController::accountOverview` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Recurring-Account/Schedule` → `BudgetController::recurringSchedule/$1` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Recurring-Account/Schedule/(:segment)` → `BudgetController::recurringSchedule/$1` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Recurring-Account/Edit/(:segment)` → `BudgetController::edit/$1` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Settings/(:segment)` → `BudgetController::settings/$1` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Status/Paid/(:segment)` → `BudgetController::paid/$1` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Budget/Status/Unpaid/(:segment)` → `BudgetController::unpaid/$1` | budget | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Exchange/` → `ExchangeController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/DigiByte/fetchFrontendData` → `DigiByteController::fetchFrontendData` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/DigiByte/provisionDefaultWallet` → `DigiByteController::provisionDefaultWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/DigiByte/disconnectWallet` → `DigiByteController::disconnectWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/DigiByte/refreshWallet` → `DigiByteController::refreshWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/DigiByte/getAssets` → `DigiByteController::getAssets` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/DigiByte/createWallet` → `DigiByteController::createWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/DigiByte/connectWallet` → `DigiByteController::connectWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Exchange/MetaMask/` → `MetaMaskController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/connectWallet` → `MetaMaskController::connectWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/disconnectWallet` → `MetaMaskController::disconnectWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/refreshWallet` → `MetaMaskController::refreshWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/getAssets` → `MetaMaskController::getAssets` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/generateWallet` → `MetaMaskController::generateWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/signTransaction` → `MetaMaskController::signTransaction` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/verifySignature` → `MetaMaskController::verifySignature` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/sendAsset` → `MetaMaskController::sendAsset` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/getTransactionStatus` → `MetaMaskController::getTransactionStatus` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/getBalance` → `MetaMaskController::getBalance` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/validateAddress` → `MetaMaskController::validateAddress` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/getCurrentBlock` → `MetaMaskController::getCurrentBlock` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/estimateTransactionFee` → `MetaMaskController::estimateTransactionFee` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/getNetworkStatus` → `MetaMaskController::getNetworkStatus` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/deployContract` → `MetaMaskController::deployContract` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/MetaMask/callContractFunction` → `MetaMaskController::callContractFunction` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Exchange/Solana/` → `SolanaController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Exchange/Solana/Test-Page` → `SolanaController::testPage` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Exchange/Solana/Assets` → `SolanaController::assets` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Exchange/Solana/Create` → `SolanaController::create` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Exchange/Solana/Wallet/Disconnect/(:segment)` → `SolanaController::disconnectWallet/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Exchange/Solana/Import` → `SolanaController::import` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Exchange/Solana/Swap` → `SolanaController::coinSwap` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Exchange/Solana/Create/Wallet` → `SolanaController::create` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Solana/Create/Wallet` → `SolanaController::create` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Solana/createSolanaWallet` → `SolanaController::createSolanaWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Solana/fetchFrontendData` → `SolanaController::fetchFrontendData` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Solana/provisionDefaultWallet` → `SolanaController::provisionDefaultWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Exchange/Solana/Import/Wallet` → `SolanaController::importWallet` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Solana/Import/Wallet` → `SolanaController::importWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Solana/updatePrices` → `SolanaController::updateSolanaPrices` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Solana/updateTokens` → `SolanaController::updateSolanaTokens` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Exchange/Solana/Wallet/Verify-Ownership` → `SolanaController::verifyWalletOwnership` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Solana/Wallet/Verify-Ownership` → `SolanaController::verifyWalletOwnership` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Exchange/Solana/Wallet/Execute-Swap` → `SolanaController::executeSwap` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Solana/Wallet/Execute-Swap` → `SolanaController::executeSwap` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Exchange/Solana/Wallet/ViewAssets` → `SolanaController::viewAssets` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Solana/Wallet/ViewAssets` → `SolanaController::viewAssets` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Solana/Wallet/Connect` → `SolanaController::connectWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Solana/Wallet/Disconnect` → `SolanaController::disconnectWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Solana/Wallet/Refresh` → `SolanaController::refreshWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Wallet/Connect/MetaMask` → `SolanaController::connectWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Wallet/Disconnect/MetaMask` → `SolanaController::disconnectWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Wallet/Refresh/MetaMask` → `SolanaController::refreshWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Wallet/Connect/Solflare` → `SolanaController::connectWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Wallet/Disconnect/Solflare` → `SolanaController::disconnectWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Wallet/Refresh/Solflare` → `SolanaController::refreshWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Wallet/Connect/Phantom` → `SolanaController::connectWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Wallet/Disconnect/Phantom` → `SolanaController::disconnectWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Wallet/Refresh/Phantom` → `SolanaController::refreshWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Wallet/Connect/TrustWallet` → `SolanaController::connectWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Wallet/Disconnect/TrustWallet` → `SolanaController::disconnectWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Exchange/Wallet/Refresh/TrustWallet` → `SolanaController::refreshWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Institutes//` → `InstitutesController::index` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' My-Investments` → `App\Modules\User\Controllers\InvestmentsController::index` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' My-Trades` → `App\Modules\User\Controllers\InvestmentsController::index` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Investments//` → `InvestmentsController::index` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Investments/Account-Manager` → `InvestmentsController::accountManager` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Investments/Add` → `InvestmentsController::add` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Investments/Add/(:segment)` → `InvestmentsController::add` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Investments/Autosave` → `InvestmentsController::autoSave` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Investments/Overview` → `InvestmentsController::overview` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Investments/Retirement` → `InvestmentsController::retirement` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Investments/Save` → `InvestmentsController::save` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Investments/Services` → `InvestmentsController::services` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Investments/Test` → `InvestmentsController::test` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Investments/Watchlist` → `InvestmentsController::watchlist` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Investments/Strategies` → `InvestmentController::getStrategies` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Investments/Strategies` → `InvestmentController::createStrategy` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Investments/Strategies/(:num)` → `InvestmentController::getStrategy/$1` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `PUT Investments/Strategies/(:num)` → `InvestmentController::updateStrategy/$1` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `DELETE Investments/Strategies/(:num)` → `InvestmentController::deleteGoal/$1` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Investments/Goals` → `InvestmentController::getGoals` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Investments/Goals` → `InvestmentController::createGoal` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Investments/Goals/(:num)` → `InvestmentController::createGoal/$1` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `PUT Investments/Goals/(:num)` → `InvestmentController::updateGoal/$1` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `PUT Investments/Goals/(:num)` → `InvestmentController::deleteGoal/$1` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Investments/Crypto-Overview` → `InvestmentsController::cryptoOverview` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Investments/Economic-Data` → `InvestmentsController::economicData` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Investments/Market-News` → `InvestmentsController::marketNews` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Investments/MyMI-News` → `InvestmentsController::MyMINews` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Investments/MyMI-Research` → `InvestmentsController::MyMIResearch` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Investments/Stock-Overview` → `InvestmentsController::stockOverview` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Predictions//` → `PredictionsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Predictions/Markets` → `PredictionsController::markets` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Predictions/Market/(:num)` → `PredictionsController::view/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Predictions/Portfolio` → `PredictionsController::portfolio` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Predictions/Settlements` → `PredictionsController::settlements` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Predictions/PlaceOrder` → `PredictionsController::placeOrder` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Predictions/CancelOrder` → `PredictionsController::cancelOrder` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Projects//` → `ProjectsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Projects/View/(:segment)` → `ProjectsController::view/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Projects/Commit/(:num)` → `ProjectsController::commit/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Projects/Withdraw-Commit/(:num)` → `ProjectsController::withdrawCommit/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Projects/My/Commitments` → `ProjectsController::myCommitments` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Projects/Request-Monthly-Withdrawal/(:num)` → `ProjectsController::requestMonthlyWithdrawal/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Projects/Accept-Private-Allocation/(:num)` → `ProjectsController::acceptPrivateAllocation/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Announcements//` → `AnnouncementsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio//` → `ScriptStudioController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio/Marketplace` → `ScriptStudioController::marketplace` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio/Create` → `ScriptStudioController::create` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST ScriptStudio/Store` → `ScriptStudioController::store` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio/Edit/(:num)` → `ScriptStudioController::edit/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST ScriptStudio/Update/(:num)` → `ScriptStudioController::update/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio/Preview/(:num)` → `ScriptStudioController::preview/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio/Export/(:num)/(:segment)` → `ScriptStudioController::export/$1/$2` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET How-It-Works//` → `HowItWorksController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET How-It-Works/budgeting` → `HowItWorksController::budgeting` | budget | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET How-It-Works/investing` → `HowItWorksController::investing` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET How-It-Works/crypto` → `HowItWorksController::crypto` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET How-It-Works/alerts` → `HowItWorksController::alerts` | alerts | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET How-It-Works/projects` → `HowItWorksController::projects` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET How-It-Works/security` → `HowItWorksController::security` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET How-It-Works/pricing` → `HowItWorksController::pricing` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET How-It-Works/(:any)` → `HowItWorksController::show/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Support//` → `SupportController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Support/Article/(:segment)` → `SupportController::article/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Support/Discord` → `SupportController::discordOnboarding` | integrations | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Support/FAQ` → `SupportController::faq` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Support/Feedback` → `SupportController::feedback` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Support/Test` → `SupportController::test` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Support/Test-Email` → `SupportController::sendTestEmail` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET How-It-Works` → `HowItWorksController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET How-It-Works/Discord` → `HowItWorksController::discord` | integrations | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET How-It-Works/Streaming` → `HowItWorksController::streaming` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET How-It-Works/(:segment)` → `HowItWorksController::show/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' My-Referrals//` → `ReferralController::index` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Referrals//` → `ReferralController::index` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Referrals/Create` → `ReferralController::create` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Referrals/sendReferralEmail` → `ReferralController::sendReferralEmail` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Wallets//` → `WalletsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/All` → `WalletsController::all` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Account-Manager` → `WalletsController::accountManager` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Add` → `WalletsController::add` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Add/(:segment)` → `WalletsController::add/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Add/(:segment)/(:segment)` → `WalletsController::addFetch/$1/$2` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Add/Bank-Account` → `WalletsController::createBankeAccount` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Attach-Account` → `WalletsController::attachAccount` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Attach-Account/(:segment)/(:segment)/(:segment)` → `WalletsController::attachAccount/$1/$2/$3` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Bank` → `WalletsController::bank` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Banking` → `WalletsController::banking` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Banking/Add/Account/(:segment)` → `WalletsController::add` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Banking/(:segment)` → `WalletsController::addAccount` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Banking/Details/(:segment)` → `WalletsController::details/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Banking/Edit/Account/(:segment)` → `WalletsController::editBankAccount/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Checking` → `WalletsController::checking` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Create` → `WalletsController::generateWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Credit/Edit/Account/(:segment)` → `WalletsController::editCreditAccount/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Crypto` → `WalletsController::crypto` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Checking` → `WalletsController::index` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Create` → `WalletsController::generateWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Credit` → `WalletsController::index` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Credit/Details/(:segment)` → `WalletsController::details/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Credit/Edit/Account/(:segment)` → `WalletsController::edit/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Coin-Swap` → `WalletsController::coinSwap` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Coin-Swap/(:segment)` → `WalletsController::coinSwap/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Complete/Purchase` → `WalletsController::completePurchase` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Confirm-Deposit` → `WalletsController::confirmDeposit` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Debt` → `WalletsController::debt` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Debt/Details/(:segment)` → `WalletsController::details/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Debt/Edit/Account/(:segment)` → `WalletsController::editDebtAccount/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Delete/(:segment)/(:segment)` → `WalletsController::delete/$1/$2` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Deposit` → `WalletsController::deposit` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Deposit/Fetch` → `WalletsController::addDepositFetch` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Deposit/Complete` → `WalletsController::depositComplete` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Deposit/Complete/(:segment)` → `WalletsController::depositComplete/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Deposit/(:segment)` → `WalletsController::deposit/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Deposit/Funds` → `WalletsController::deposit` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Details` → `WalletsController::details` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Edit` → `WalletsController::edit` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Edit/(:segment)` → `WalletsController::edit/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Edit/(:segment)/(:segment)` → `WalletsController::edit/$1/$2` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Feature-Manager` → `WalletsController::featureManager` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Generate-Wallet` → `WalletsController::generateWallet` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Investments` → `WalletsController::investments` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Investment/Details/(:segment)` → `WalletsController::details/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Investment/Edit/Account/(:segment)` → `WalletsController::editInvestAccount/$1` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Link-Account` → `WalletsController::linkAccount` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Link-Account/(:segment)` → `WalletsController::linkAccount/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Link-Account/(:segment)/(:segment)` → `WalletsController::linkAccount/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Link-Account/Success` → `WalletsController::linkAccountSuccess` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Link-Account/Success/(:segment)` → `WalletsController::linkAccountSuccess/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Manager` → `WalletsController::walletManager` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Wallets/MyMIGPayPalCallback` → `WalletsController::handleMyMIGPayPalCallback` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Purchase` → `WalletsController::purchase` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Purchase-Manager` → `WalletsController::purchaseManager` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Purchase/(:segment)` → `WalletsController::purchase` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Purchase/Memberships/Customize` → `WalletsController::customizeMembership` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Purchase/Memberships/Success` → `WalletsController::purchaseMembershipSuccess` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Purchase/Memberships/Success` → `WalletsController::purchaseMembershipSuccess` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Purchase/Memberships/(:segment)` → `WalletsController::purchase` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Purchase/Memberships/(:segment)/(:segment)` → `WalletsController::purchase` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Purchase/(:segment)/Complete` → `WalletsController::purchaseComplete` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Purchase/Complete/(:segment)` → `WalletsController::purchaseComplete/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Purchase/Complete/(:segment)/(:segment)` → `WalletsController::purchaseComplete/$1/$2` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Purchase/MyMI-Gold` → `WalletsController::purchaseMyMIGold` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Purchase/MyMIGold/Security/(:segment)` → `WalletsController::securityViolation` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Transfer-Funds` → `WalletsController::transferFunds` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Wallet-Generator` → `WalletsController::walletGenerator` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Wallet-Selection` → `WalletsController::walletSelections` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Wallet-Transactions` → `WalletsController::walletTransaction` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Wallet-Transaction/(:segment)` → `WalletsController::walletTransaction/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Withdraw` → `WalletsController::withdraw` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Withdraw/(:segment)` → `WalletsController::withdraw/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Wallets/Withdraw/Fetch` → `WalletsController::addWithdrawFetch` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Features//` → `Features::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Features/Brokerage-Integrations` → `Features::BrokerageIntegrations` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Features/MyMI-Gold` → `HowItWorks::MyMIGold` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Knowledgebase//` → `KnowledgebaseController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Knowledgebase/Account-And-Billing` → `KnowledgebaseController::accountBilling` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Knowledgebase/Assets` → `KnowledgebaseController::assets` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Knowledgebase/Integrating-Wallets` → `KnowledgebaseController::integratingWallets` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Knowledgebase/Investor-Profile` → `KnowledgebaseController::investorProfile` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Knowledgebase/KYC-Verification` → `KnowledgebaseController::KYCVerification` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Knowledgebase/MyMI-Partnerships` → `KnowledgebaseController::partnerships` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Knowledgebase/Promoted-Articles` → `KnowledgebaseController::promotedArticles` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Knowledgebase/Technical-Support` → `KnowledgebaseController::technicalSupport` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Knowledgebase/Trade-Tracker` → `KnowledgebaseController::tradeTracker` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Knowledgebase/Tutorials` → `KnowledgebaseController::tutorials` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Knowledgebase/Types-Of-Accounts` → `KnowledgebaseController::typesOfAccounts` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Knowledgebase/(:any)` → `KnowledgebaseController::show/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Subscribe//` → `SubscribeController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Subscribe//Daily-Financial-News` → `SubscribeController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Subscribe/Submit` → `SubscribeController::submit` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Bitcoin/buildUnsignedPsbt` → `App\Modules\APIs\Controllers\BitcoinController::buildUnsignedPsbt` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Bitcoin/broadcastSignedTx` → `App\Modules\APIs\Controllers\BitcoinController::broadcastSignedTx` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET system/healthz` → `System\HealthController::healthz` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET system/diag` → `System\HealthController::diag` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Support/FAQ` → `App\\Modules\\Support\\Controllers\\Support::faq` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Blog/Investing` → `App\\Modules\\Blog\\Controllers\\InvestingController::index` | invest | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/runCronManually` → `ManagementController::runCronManually` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/runDailyAlphaVantageDataPipeline` → `ManagementController::runDailyAlphaVantageDataPipeline` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/triggerPostAutogenOnEmpty` → `ManagementController::triggerPostAutogenOnEmpty` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/exportPostJson/(:num)` → `ManagementController::exportPostJson/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/logHealthcheck` → `ManagementController::logHealthcheck` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/generateVoiceScriptManually` → `ManagementController::generateVoiceScriptManually` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/processAllTradeAlerts` → `ManagementController::processAllTradeAlerts` | invest | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/distributeTodaysNewsContent` → `ManagementController::distributeTodaysNewsContent` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/sendAllDiscordAlerts` → `ManagementController::sendAllDiscordAlerts` | alerts | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/sendToZapierManually` → `ManagementController::sendToZapierManually` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST API/Management/scrapeAndGenerateTodaysStoryFromInbox` → `ManagementController::scrapeAndGenerateTodaysStoryFromInbox` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/fetchLatestSummaries` → `ManagementController::fetchLatestSummaries` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/getUsers` → `ManagementController::getUsers` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/getAlerts` → `ManagementController::getAlerts` | alerts | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/getAssets` → `ManagementController::getAssets` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/getNews` → `ManagementController::getNews` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/getReferrals` → `ManagementController::getReferrals` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET API/Management/getSupport` → `ManagementController::getSupport` | system | route | Contract | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Tax//` → `Tax::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Tax/create` → `Tax::create` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Tax/edit/(:num)` → `Tax::edit/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Tax/view/(:num)` → `Tax::view/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Tax/preview/(:num)` → `Tax::preview/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST Tax/ajax/saveLine` → `Tax::ajaxSaveLine` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `POST Tax/ajax/saveAllocation` → `Tax::ajaxSaveAllocation` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Tax/ajax/recalc/(:num)` → `Tax::ajaxRecalc/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Tax/export/json/(:num)` → `Tax::exportJson/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Tax/export/csv/(:num)` → `Tax::exportCsv/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Admin/Tax//` → `TaxConfig::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Admin/Tax/Templates` → `TaxConfig::templates` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Admin/Tax/Templates/edit/(:num)` → `TaxConfig::editTemplate/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Admin/Tax/Jurisdictions` → `TaxConfig::jurisdictions` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET Admin/Tax/Rates` → `TaxConfig::rates` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Admin/Tax/Rates/create` → `TaxConfig::createRate` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `'GET', 'POST' Admin/Tax/Rates/edit/(:num)` → `TaxConfig::editRate/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET blog//` → `BlogController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET blog/post/(:any)` → `BlogController::post/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET blog//` → `BlogController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET blog/post/(:any)` → `BlogController::post/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET blog//` → `BlogController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET blog/post/(:any)` → `BlogController::post/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET blog//` → `Blog::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Docs` → `DocsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Docs/browse/(:any)` → `DocsController::browse/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Docs/view/(:any)` → `DocsController::view/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio//` → `ScriptStudioController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio/Marketplace` → `ScriptStudioController::marketplace` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio/Create` → `ScriptStudioController::create` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST ScriptStudio/Store` → `ScriptStudioController::store` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio/Edit/(:num)` → `ScriptStudioController::edit/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST ScriptStudio/Update/(:num)` → `ScriptStudioController::update/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio/Preview/(:num)` → `ScriptStudioController::preview/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio/Export/(:num)/(:any)` → `ScriptStudioController::export/$1/$2` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET blog//` → `Blog::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Docs` → `DocsController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Docs/browse/(:any)` → `DocsController::browse/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET Management/Docs/view/(:any)` → `DocsController::view/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio//` → `ScriptStudioController::index` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio/Marketplace` → `ScriptStudioController::marketplace` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio/Create` → `ScriptStudioController::create` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST ScriptStudio/Store` → `ScriptStudioController::store` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio/Edit/(:num)` → `ScriptStudioController::edit/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `POST ScriptStudio/Update/(:num)` → `ScriptStudioController::update/$1` | system | route | Write+Cleanup | yes | Y (if implemented) | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio/Preview/(:num)` → `ScriptStudioController::preview/$1` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |
| `GET ScriptStudio/Export/(:num)/(:any)` → `ScriptStudioController::export/$1/$2` | system | route | Smoke | none | N | - | JSON `status` + `data`/`message` | Planned |

## Services / Libraries / Commands

| Function | Domain | Type | Method | Side effects | Dry-run | Required env keys | Expected output | Status |
| --- | --- | --- | --- | --- | --- | --- | --- | --- |
| `app/Libraries/WebSocketHandler.php:10::onOpen(ConnectionInterface $conn)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/WebSocketHandler.php:14::onMessage(ConnectionInterface $from, $msg)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/WebSocketHandler.php:19::onClose(ConnectionInterface $conn)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/WebSocketHandler.php:23::onError(ConnectionInterface $conn, \Exception $e)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyRouter.php:11::handle($uri)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITrustWallet.php:14::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITrustWallet.php:35::connect(array $opts = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITrustWallet.php:44::challenge(string $chain)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITrustWallet.php:57::verify(string $chain, string $address, string $signature)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITrustWallet.php:100::disconnect()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITrustWallet.php:105::getBalance(string $address, ?string $mint = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITrustWallet.php:110::getTokenAccounts(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITrustWallet.php:115::transfer(string $from, string $to, string $amount, array $opts = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITrustWallet.php:120::swap(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITrustWallet.php:125::getQuote(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITrustWallet.php:130::getPrice(string $symbolOrMint)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITrustWallet.php:135::createToken(array $spec)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITrustWallet.php:140::mintTo(string $mint, string $dest, string $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/SiteSettingsOverride.php:10::__construct(private ?BaseConnection $db = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/SiteSettingsOverride.php:15::apply(SiteSettings $settings)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/SiteSettingsOverride.php:31::save(string $key, string $value, ?int $userId = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/FRED.php:19::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/FRED.php:41::fetchData($series_id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/FRED.php:80::fetchSeriesInfo($series_id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/FRED.php:105::searchSeries($keywords)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/FRED.php:130::fetchCategorySeries($category_id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/FRED.php:155::fetchSeriesUpdates($limit = 10)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/FRED.php:181::fetchCategoryChildren($category_id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/FRED.php:206::fetchSeriesReleases($series_id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/FRED.php:231::getCategory($category_id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/FRED.php:256::fetchReleaseSeries($release_id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/FRED.php:281::fetchReleaseSources($release_id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/FRED.php:306::fetchSeriesTags($series_id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/FRED.php:331::fetchSeriesRelatedTags($series_id, $tag_names)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/FRED.php:357::fetchReleaseTables($release_id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIJupiter.php:10::__construct(?JupiterService $service = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIJupiter.php:15::quote(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIJupiter.php:20::swap(array $payload)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIJupiter.php:25::prices(array $ids)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIJupiter.php:30::tokenList()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertJobQueue.php:12::__construct(?AlertJobModel $model = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertJobQueue.php:19::enqueue(string $type, array $payload = [], string $status = 'pending')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertJobQueue.php:24::reserve(string $type, ?int $limit = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertJobQueue.php:35::markComplete(array $job)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertJobQueue.php:40::markFailed(array $job, string $error)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertJobQueue.php:46::process(string $type, callable $handler, ?int $limit = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertJobQueue.php:78::getBatchSize()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertJobQueue.php:83::getMaxAttempts()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:39::allowedStates(bool $publicOnly = false)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:44::allowedModes()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:52::ensureEligibleUser(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:78::listMarkets(array $filters=[], int $limit=50, int $offset=0)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:83::getMarket(int $marketId, bool $withOptions=true)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:101::createMarket(array $payload, int $adminUserId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:134::lockMarket(int $marketId, int $adminUserId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:143::cancelMarket(int $marketId, int $adminUserId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:166::rebalanceOdds(int $marketId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:186::addLiquidity(array $payload, int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:221::placeOrder(array $order, int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:307::cancelOrder(int $orderId, int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:315::settleMarket(int $marketId, int $resolverUserId, int $winningOptionId, string $note='')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:345::queuePayouts(int $marketId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:350::processPayout(int $payoutId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:368::debitStake(int $userId, string $asset, float $amount, string $reason)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPredictions.php:374::creditPayout(int $userId, string $asset, float $amount, string $reason)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISports.php:19::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISports.php:45::fetchNFLPlayerStats($teamId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISports.php:81::calculateNFLPlayerAverages($playerStats)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISports.php:132::fetchNBAPlayerStats($teamId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISports.php:143::calculateNBAPlayerAverages($playerStats)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISports.php:174::getAggregatedGameData($selectedDate)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:225::needsSymbolRefresh(string $symbol, ?string $lastUpdated, int $ttlMinutes = 15)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:240::refreshSymbolData(string $symbol, ?array $existingAlert = null)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:285::buildHeadlineStats(?array $alert)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:304::getActiveSources()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:318::getDeliveryChannels()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:713::ingestEmailPayload(array $payload)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:910::enrichTradeAlertsBySymbol(string $symbol)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:957::extractSymbolsFromText($text)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1005::fetchAlphaVantageNews($ticker)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1043::fetchAlphaVantageNewsForTradeAlerts()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1064::fetchAndStoreAlertsEmails()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1399::fetchAndStoreEmails()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1504::backfillAlertsEmails(int $daysBack = 30, ?int $maxEmails = null)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1619::fetchEmailAlerts()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1655::fetchMarketData($symbol)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1683::getAlphaVantageQuote($symbol)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1705::getAlertInfo()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1729::getMarketData(string $symbol)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1769::getPendingTradeAlerts()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1808::getAlertStats()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1823::getTickerDetails(string $symbol)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1876::getUserInformation($cuID)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1956::isDuplicate($hash)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:1991::processScrapedSymbols()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2008::fetchBatchMarketData(array $tickers)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2060::processTradeAlerts()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2107::processTradeAlertsInBatches($batchSize = 50)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2155::saveTradingViewChart($chartUrl, $ticker)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2186::sendDiscordNotification($tradeAlert)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2257::generateAlertCommentaryWithKimi(array $alert)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2279::generateAlertSocialCopyWithKimi(array $alert)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2301::sendDiscordTradeAlert($tradeAlert, $tier)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2346::sendZapierTradeAlert($tradeAlert)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2368::updateAlerts()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2474::updateLastTradeAlerts($limit = 50)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2555::getRealtimeQuote(string $symbol, string $exchange)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2561::getCompanyProfile(string $symbol, string $exchange)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2566::getKeyStats(string $symbol, string $exchange)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2571::getPerformanceStats(string $symbol, string $exchange)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2576::getValuationStats(string $symbol, string $exchange)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2581::getTopInstitutionalHolders(string $symbol, string $exchange)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2586::getInsiderTrades(string $symbol, string $exchange)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2591::getPeers(string $symbol, string $exchange)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2596::getHeldByEtfs(string $symbol, string $exchange)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2601::getCommentsForSymbol(string $symbol)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2606::getRecentSecFilings(string $symbol, string $exchange)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2616::getOpenAlertsSummaryForAI(int $userId)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2647::getHeadlineNews(string $symbol, string $exchange)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlerts.php:2652::getMarketAuxNewsForSymbol(string $symbol)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertChannelInterface.php:6::deliver(array $alert)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertChannelInterface.php:7::getName()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:30::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:36::connectWallet()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:46::disconnectWallet()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:54::refreshWallet()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:62::getAssets($publicKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:89::generateWallet()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:99::signTransaction($transaction, $privateKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:106::verifySignature($transaction, $signature, $publicKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:113::sendAsset($privateKey, $fromAddress, $toAddress, $assetId, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:128::getTransactionStatus($transactionId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:133::getBalance($address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:138::validateAddress($address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:143::getCurrentBlock()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:148::estimateTransactionFee()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:155::getNetworkStatus()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:162::deployContract($contractCode, $constructorParameters)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:172::callContractFunction($contractAddress, $functionName, $parameters)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:180::connect(array $opts = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:190::challenge()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:203::verify(string $address, string $signature)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMetaMask.php:227::signAndSendTx(array $payload)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIManage.php:15::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:34::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:63::getBrokerCredential(?int $userId, string $broker)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:84::getCurrentUser()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:98::getCurrentUserId()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:116::defaultUserAccountInfo()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:150::isPremiumUser(?int $userId = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:181::findPotentialSpamUsers()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:196::getDefaultWalletInfo($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:282::getUserAssetSummary($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:314::getUserByUsername($username)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:322::getUserDefaultWalletForExisting($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:449::getUserFinancialAssessment($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:538::getUserInformation($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:614::getUserNonCreditWallets($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:619::hasBrokerLinked(?int $userId, string $broker)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:630::isAdmin($cuID = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:648::isObfuscatedEmail($email)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUser.php:662::setBrokerCredential(?int $userId, string $broker, array $credentials)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISimulator.php:14::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISimulator.php:26::simulateInvestmentScenarios($userId, $preferences)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISimulator.php:118::generateFinancialReports($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISimulator.php:189::performRiskAnalysis($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISimulator.php:314::generateInvestmentInsights($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISimulator.php:339::fetchRealTimeData($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISimulator.php:356::generateTaxReports($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISimulator.php:394::generateRiskManagementTools($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFractalAnalyzer.php:17::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFractalAnalyzer.php:25::analyzeFractalPatterns($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFractalAnalyzer.php:40::analyze($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFractalAnalyzer.php:47::analyzeGrowthMetrics($portfolio)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFractalAnalyzer.php:88::analyzeFractalRisk($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFractalAnalyzer.php:197::analyzeCrossAssetFractalRisk($symbols)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFractalAnalyzer.php:209::fetchHistoricalFractalData($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFractalAnalyzer.php:218::compareFractalPatterns($symbol1, $symbol2)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:41::__construct()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:85::buildPortfolioLight(int $userId, array $opts = [])` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:235::portfolioForUser(int $userId)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:281::allUserInvestmentsInfo($cuID)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:334::fetchRealTimeStockData($symbol)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:372::fetchStockData($symbol)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:651::getInvestmentDashboard($cuID)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:691::getInvestmentInsights($topic = null, $complexityLevel = null)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:718::getTopHeldSymbols($limit = 10)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:726::performVolatilityAnalysis($userInvestments)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:811::performARIMAForecast($timeSeriesData)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:872::generateTaxReport($cuID)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:905::sendAlertNotifications()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1023::calculateTaxLiability($cuID)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1051::generateRiskManagementTools($cuID)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1092::performStressTesting($userInvestments)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1178::getEconomicData()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1195::searchEconomicSeries($searchText)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1211::fetchSeriesUpdates($limit = 5)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1227::summarizeEconomicDataNotes($notes, $length = 120)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1250::getSymbolsByTradeType()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1257::getBondSymbols()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1262::getCommoditySymbols()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1267::getCryptoSymbols()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1272::getCryptoAssetSymbols()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1277::getETFSymbols()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1282::getForeignStockSymbols()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1287::getForexSymbols()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1292::getInternationalBondSymbols()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1297::getOptionSymbols()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1302::getMutualFundSymbols()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1307::getPreciousMetalSymbols()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1312::getRealEstateSymbols()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1317::getUserWatchlist($cuID)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1326::getUserStrategies($userId)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1334::createStrategy($data)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1340::updateStockData($symbol)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1384::getStrategyById($id)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1392::updateStrategy($id, $data)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1399::deleteStrategy($id)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1406::getUserGoals($userId)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1414::createGoal($data)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1420::getGoalById($id)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1428::updateGoal($id, $data)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1435::deleteGoal($id)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1444::cryptoOverview()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1452::economicData()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1460::marketNews()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1468::MyMINews()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1476::MyMIResearch()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1484::stockOverview()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1492::getAlertsByUserAccess($cuID)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1501::getInvestmentTools()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1509::getUserPortfolio($cuID)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1539::calculateProfitLoss($investmentRecords)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1595::calculateAssetAllocation($investmentRecords)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1710::calculateGrowthMetrics($investmentRecords)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1789::generateFinancialReports($cuID)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1823::simulateMarketScenario($symbol, $scenario)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1889::retrieveExpertInsights($topic, $complexityLevel)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1914::retrieveGeneralInsights($cuID)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1934::getUserRetirementPlans($userId)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1946::trackRetirementProgress($planId, $progressAmount)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInvestments.php:1967::getRetirementSummary($userId)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPhantom.php:18::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPhantom.php:39::connect(array $opts = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPhantom.php:48::challenge()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPhantom.php:60::verify(string $address, string $signature)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPhantom.php:80::disconnect()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPhantom.php:85::getBalance(string $address, ?string $mint = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPhantom.php:90::getTokenAccounts(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPhantom.php:95::transfer(string $from, string $to, string $amount, array $opts = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPhantom.php:100::swap(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPhantom.php:105::getQuote(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPhantom.php:110::getPrice(string $symbolOrMint)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPhantom.php:115::createToken(array $spec)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPhantom.php:120::mintTo(string $mint, string $dest, string $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolflare.php:14::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolflare.php:34::connect(array $opts = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolflare.php:43::challenge()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolflare.php:55::verify(string $address, string $signature)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolflare.php:75::disconnect()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolflare.php:80::getBalance(string $address, ?string $mint = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolflare.php:85::getTokenAccounts(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolflare.php:90::transfer(string $from, string $to, string $amount, array $opts = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolflare.php:95::swap(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolflare.php:100::getQuote(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolflare.php:105::getPrice(string $symbolOrMint)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolflare.php:110::createToken(array $spec)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolflare.php:115::mintTo(string $mint, string $dest, string $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/HtmlFormatter.php:7::format($html)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/HtmlFormatter.php:27::formatHTMLToBootstrap($html)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISupport.php:22::getArticle(string $slug)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFacebook.php:13::__construct($accessToken)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFacebook.php:34::publishPost($targetId, $message, $additionalData = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFacebook.php:47::uploadMedia($targetId, $mediaUrl)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFacebook.php:68::sendMessage($recipientId, $message)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFacebook.php:100::createEvent($pageId, $eventDetails)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFacebook.php:111::getEvents($pageId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFacebook.php:132::createPoll($groupId, $question, $options)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIOnboarding.php:22::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIOnboarding.php:38::ensureDefaultWallets(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIOnboarding.php:75::requiresKycFor(string $action)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIOnboarding.php:81::checkOnboardingStatus($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIOnboarding.php:87::sendOnboardingReminderEmails()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIOnboarding.php:132::completeStep($userId, $step)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMICryptoPanic.php:10::__construct(?CryptoPanicService $service = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMICryptoPanic.php:15::latest(array $params = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMICryptoPanic.php:20::search(string $query)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIReferrals.php:25::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIReferrals.php:43::allUserReferralInfo($cuID, $cuReferrerCode)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIReferrals.php:72::commissionPerUser($cuID, $cuReferrerCode)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIReferrals.php:82::activatePayments($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIReferrals.php:91::history($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIReferrals.php:100::paymentHistory($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWalletConnect.php:10::__construct(?WalletConnect $cfg = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWalletConnect.php:15::getConfig()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInfura.php:10::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInfura.php:15::getEthBalance(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:20::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:59::hasRateLimitCapacity(int $needed = 1)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:67::didHitRateLimit()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:398::cacheTechnicalIndicators(string $symbol, string $exchange = 'NASDAQ', int $ttl = 3600)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:442::detectGoldenCross(string $symbol, string $interval = 'daily')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:460::fetchADX(string $symbol, string $interval = 'daily', int $timePeriod = 14)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:482::fetchBatchTechnicalData(array $symbols, string $interval = 'daily')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:522::fetchCCI(string $symbol, string $interval = 'daily', int $timePeriod = 20)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:557::fetchEMAs($symbol, $interval = 'daily', $periods = [9, 21, 34, 48, 100, 200])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:588::fetchMFI(string $symbol, string $interval = 'daily', int $timePeriod = 14)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:610::fetchMOM(string $symbol, string $interval = 'daily', int $timePeriod = 10)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:632::fetchOBV(string $symbol, string $interval = 'daily')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:653::fetchROC(string $symbol, string $interval = 'daily', int $timePeriod = 10)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:675::fetchSMAs($symbol, $interval = 'daily', $periods = [50, 200])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:706::fetchSTOCH(string $symbol, string $interval = 'daily')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:730::fetchWILLR(string $symbol, string $interval = 'daily', int $timePeriod = 14)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:752::getAllTechnicalIndicators(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:766::getAllTimeHigh(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:790::getBatchPrices(array $symbols)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:847::getCurrentPrice(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:899::getGlobalQuoteDetailed(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:944::getEmaComparison(string $symbol, array $periods = [3, 8, 13, 34, 48])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:980::getTechnicalIndicators($symbol, $exchange)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:1022::getMovingAveragesByTimeframe(string $symbol, array $timeframes = ['5min', '15min', '30min', '60min', '240min', 'daily'])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:1059::getTechnicalMetrics(string $symbol, string $exchange = 'NASDAQ')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAlphaVantage.php:1081::isProUser()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisor.php:19::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisor.php:29::getCachedAdvisorMedia(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisor.php:61::generateAdvisorMediaPackage($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisor.php:161::generateFromAdvisorPick(array $recommendation)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisor.php:190::generateAdvisorNotes($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisor.php:256::suggestTrades($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisor.php:280::generateVoiceoverScriptFromSummary(string $summary)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisor.php:301::generateVoiceoverAudio($script, $filename)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisor.php:323::generateVoiceoverWithElevenLabs($text, $filename, $voiceIdOverride = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisor.php:447::generateSentimentTag($text)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisor.php:470::generateTradingViewChartUrl($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisor.php:475::exportCapCutJsonTemplate($mediaPackage)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisor.php:505::packageAdvisorMediaAsZip($mediaPackage)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisor.php:558::prepareAdvisorMediaPackage($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMomentum.php:24::__construct(ConnectionInterface $db = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMomentum.php:30::analyzeMomentum($symbol, $days = 21)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMomentum.php:51::scoreTradeOpportunity(string $symbol, int $days = 5, int $tradeId = null, string $context = 'default')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGold.php:25::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGold.php:54::mints()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGold.php:60::metadata()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGold.php:73::balance(string $address, string $chain)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGold.php:108::getOrderInformation($orderID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGold.php:120::getCoinValue()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGold.php:126::getCoinInfo()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGold.php:171::getUserCoinTotal($cuID = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGold.php:223::getUserLastOrder($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGold.php:270::getUserLastCompletedOrder($orderID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGold.php:326::purchaseBaseCrypto($usdAmount, $cryptoSymbol = 'BTC')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGold.php:332::convertToMyMIGold($btcAmount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGold.php:338::creditUserAccount($userId, $myMIGoldAmount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFinnhub.php:15::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFinnhub.php:28::getCompanyNews(string $symbol, string $from, string $to)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFinnhub.php:40::getGeneralNews(string $category = 'general')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFinnhub.php:50::getNewsSentiment(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFinnhub.php:60::latestCryptoNews(int $limit = 20)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIFinnhub.php:93::marketSnapshot(array $symbols)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInstitutes.php:12::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInstitutes.php:17::registerInstitute($data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInstitutes.php:22::getInstitute($id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInstitutes.php:27::updateInstitute($id, $data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInstitutes.php:32::deleteInstitute($id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInstitutes.php:37::getAllInstitutes()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIInstitutes.php:42::getInstitutesBySpecialty($specialty)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiCostControls.php:17::__construct(?BaseConnection $db = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiCostControls.php:25::monthKey(?string $date = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiCostControls.php:32::getChatPlanLimit(?string $plan)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiCostControls.php:43::getWorkflowLimit(?string $workflowIdOrSlug)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiCostControls.php:58::fetchChatUsage(int $userId, ?string $month = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiCostControls.php:84::incrementChatUsage(int $userId, int $tokens, float $usd, ?string $plan = null, ?string $email = null, ?string $month = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiCostControls.php:116::resetChatUsage(int $userId, ?string $month = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiCostControls.php:140::getChatUsageSummary(?string $month = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiCostControls.php:193::fetchWorkflowUsage($workflowId, ?string $month = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiCostControls.php:217::incrementWorkflowUsage($workflowId, ?string $workflowSlug, float $usd, ?string $month = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiCostControls.php:276::chatRuntimeConfig()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiCostControls.php:281::persistChatRuntimeConfig(array $config)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPlaid.php:19::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPlaid.php:68::createLinkToken(int $userId, string $clientName = 'MyMI Wallet')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPlaid.php:92::exchangePublicToken(string $publicToken)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPlaid.php:102::getAccountsWithBalances(string $accessToken)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPlaid.php:113::envInfo()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketAux.php:13::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketAux.php:43::fetchMarketData(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketAux.php:77::fetchTechnicalMetric(string $symbol, string $metric)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketAux.php:89::fetchCCI(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketAux.php:90::fetchOBV(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketAux.php:91::fetchADX(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketAux.php:92::fetchWILLR(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketAux.php:93::fetchMFI(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketAux.php:94::fetchMOM(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketAux.php:95::fetchROC(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketAux.php:96::fetchSTOCH(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDashboard.php:40::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDashboard.php:60::dashboardInfo($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDashboard.php:82::getAllTokensByBlock($exchange)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDashboard.php:93::getTokenDetails($exchange, $symbol = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDashboard.php:101::getTokenDetailsByID($exchange, $tokenID = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDashboard.php:109::getCryptoAccount($cuID, $exchange = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDashboard.php:145::getFeatures()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDashboard.php:153::getUpcomingEconomicEvents()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDashboard.php:158::getTransactions($cuID, $exchange, $publicKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDashboard.php:168::getTransactionsBySymbol($cuID, $exchange, $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDashboard.php:190::processGoalData($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDashboard.php:198::getExecutiveDashboardSummary(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/LogTriage.php:44::__construct(string $date, ?string $override)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/LogTriage.php:52::resolveLogFile()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/LogTriage.php:66::parseLog(string $file)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/LogTriage.php:94::groupAndCount(array $entries)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/LogTriage.php:117::scorePriority(array $grouped)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/LogTriage.php:136::ensureReportDirs()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/LogTriage.php:143::writeJson(array $scored)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/LogTriage.php:153::writeMarkdown(array $scored)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/LogTriage.php:176::appendFixSummary(string $mdPath, array $results)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/LogTriage.php:191::hasCritical(array $scored)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/LogTriage.php:199::applyKnownFixes(array $scored)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGemini.php:18::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGemini.php:27::getQuote(array $p)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGemini.php:34::trade(array $p)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGemini.php:39::price(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGemini.php:45::balances(string $accountId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGemini.php:89::placeOrder($symbol, $amount, $price, $side)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGemini.php:102::getBalances()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGemini.php:107::getMarketPrice($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGemini.php:112::subscribeToMarketData($symbols)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGemini.php:117::withdrawToAddress($currency, $address, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGemini.php:127::getDepositAddress($currency)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGemini.php:132::getOrderStatus($orderId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGemini.php:141::cancelOrder($orderId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIGemini.php:150::getTradeHistory($symbol, $since = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBirdeye.php:10::__construct(?BirdeyeService $service = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBirdeye.php:15::getPrice(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBirdeye.php:21::getTokenInfo(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/CryptoCurrencyInterface.php:16::connect(array $opts = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/CryptoCurrencyInterface.php:17::disconnect()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/CryptoCurrencyInterface.php:18::getBalance(string $address, ?string $mint = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/CryptoCurrencyInterface.php:20::getTokenAccounts(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/CryptoCurrencyInterface.php:21::transfer(string $from, string $to, string $amount, array $opts = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/CryptoCurrencyInterface.php:22::swap(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/CryptoCurrencyInterface.php:23::getQuote(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/CryptoCurrencyInterface.php:24::getPrice(string $symbolOrMint)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/CryptoCurrencyInterface.php:25::createToken(array $spec)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUsers.php:33::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUsers.php:70::userAccountInfo($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUsers.php:183::defaultUserAccountInfo()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUsers.php:211::getDefaultWalletInfo($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUsers.php:283::getUserInformation($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUsers.php:356::getUserDefaultWalletForExisting($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUsers.php:479::getUserFinancialAssessment($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIUsers.php:570::getUserAssetSummary($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/DocsIndex.php:9::__construct(?string $baseDir = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/DocsIndex.php:19::scan()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/DocsIndex.php:50::getContents(string $relativePath)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertSourceInterface.php:11::fetch()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBudget.php:34::__construct()` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBudget.php:83::allUserBudgetInfo($cuID)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBudget.php:660::getIncomeAccountSummary($cuID)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBudget.php:698::getBudgetRecordsIsDebt($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBudget.php:703::getExpenseAccountSummary($cuID)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBudget.php:733::getDebtAccountSummary($cuID)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBudget.php:752::getTotalAccountBalance($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBudget.php:775::getUserBudget($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBudget.php:933::getUserBudgetRecord($cuID, $accountID)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBudget.php:977::getUserRelatedBudgetRecords($cuID, $accountName)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBudget.php:982::getUserBudgetAccounts($cuID)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBudget.php:992::getUserRiskProfile(int $userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBudget.php:1006::getUserRiskProfileSafe($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBudget.php:1028::getFirstBudgetAccount($cuID)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBudget.php:1046::getForecastForUser(int $userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallet.php:27::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallet.php:43::getUserCryptoWallets($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallet.php:48::getUserInvestWallets($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallet.php:53::getDefaultWalletInfo($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallet.php:201::getWalletSummaries($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallet.php:228::getWalletData($cuID, $walletID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallet.php:235::getTotalWalletValue($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallet.php:244::getWalletTotals($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallet.php:269::getTotalOpenValue($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallet.php:322::getTotalWalletPercentage($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallet.php:328::getLastActivity($cuID, $walletID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallet.php:373::getWalletsByUser($userID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallet.php:378::getTradesByUser($userID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallet.php:383::updateAssetApprovalStatus($appID, $assetStatus)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMICoinGecko.php:10::__construct(?CoinGeckoService $service = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMICoinGecko.php:15::getPrice(string $id, string $vs = 'usd')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMICoinGecko.php:21::getCoinInfo(string $id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:45::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:98::addMetadata($tokenAddress, $metadata)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:117::getUserSolana(?int $cuID = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:165::getSolanaTokens()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:201::generateWallet()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:216::signTransaction($transaction, $privateKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:222::verifySignature($transaction, $signature, $publicKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:255::sendAsset($privateKey, $fromAddress, $toAddress, $assetId, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:267::getTransactionStatus($transactionId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:289::validateAddress($address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:294::getCurrentBlock()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:330::generateSolanaKeypair()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:361::estimateTransactionFee()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:366::getNetworkStatus()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:388::deployContract($contractCode, $constructorParameters)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:397::callContractFunction($contractAddress, $functionName, $parameters)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:411::createDefaultSolanaWallet(int $cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:438::getUserDefaultSolana($cuID = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:475::provisionDefaultPublicAddress(int $cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:502::getMarketPrice()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:532::getSolanaPrice()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:568::getSolanaMarketData()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:649::getAssetByID($assetID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:654::getAssets($publicKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:669::getTransactions(int $cuID, ?string $address = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:717::saveTransactions($publicKey, $cuID, $userEmail)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:898::createSPLToken($privateKey, $decimals = 9)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:923::mintTokens($privateKey, $mintAddress, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:948::connectSolflareWallet()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:952::connectPhantomWallet()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:956::sendJsonRpcRequest($method, $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:989::connect(array $opts = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:997::disconnect()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:1006::getBalance(string $address, ?string $mint = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:1014::getBalanceDetailed(string $address, ?string $mint = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:1062::getTokenAccounts(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:1067::transfer(string $from, string $to, string $amount, array $opts = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:1072::getQuote(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:1077::swap(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:1082::getPrice(string $symbolOrMint)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:1087::createToken(array $spec)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISolana.php:1092::mintTo(string $mint, string $dest, string $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/GitHelper.php:23::pushRepo($repoKey = 'media', $customMessage = null, $author = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/GitHelper.php:52::previewDiff($repoKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/GitHelper.php:64::revertLastCommit($repoKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/GitHelper.php:78::createBranch($repoKey, $branchName)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/GitHelper.php:92::runBackgroundCommit($repoKey, $customMessage = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/GitHelper.php:164::listRepos()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/GitHelper.php:169::isGitRepo($path)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:25::ingestEmailLead(array $email)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:51::parseLeadRecord(int $inboxId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:81::promoteLeadToProject(int $inboxId, array $overrides = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:129::openCommitments(int $projectId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:134::recordCommitment(int $projectId, int $userId, float $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:164::totalCommitted(int $projectId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:190::hasMetThreshold(int $projectId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:199::createAssetToken(int $projectId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:230::launchPrivateAuction(int $projectId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:280::settlePrivateAuction(int $projectId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:333::markFunded(int $projectId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:338::createQuarterlyDistribution(int $projectId, string $periodStart, string $periodEnd, float $gross, float $net)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:355::calculateHolderShares(int $projectId, string $tokenSymbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:376::runPayouts(int $distributionId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:397::requestMonthlyWithdrawal(int $projectId, int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:432::processMonthlyWithdrawals(int $projectId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:633::getProjectFullDetails(int $projectId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:638::getUserProjects(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:643::getUserProjectHoldings(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:648::getUserCommitments(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:658::getUserDistributions(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:663::commitToProject(int $userId, int $projectId, float $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIProjects.php:668::distributeRevenue(int $projectId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/ProductionExceptionHandler.disabled.php:10::handle(Throwable $exception, int $statusCode)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAssets.php:16::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAssets.php:25::createDigiAsset()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAssets.php:39::listDigiAssets()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAssets.php:44::listTradableAssets()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAssets.php:49::getDigiAsset($assetID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAssets.php:57::getAssetPrice($assetID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAssets.php:68::createAuction($assetID, $startPrice, $minIncrement)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAssets.php:77::placeBid($auctionID, $userID, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAssets.php:90::endAuction($auctionID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISettings.php:19::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISettings.php:28::userSettings()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISettings.php:46::getUserBudgetSettings($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISettings.php:58::getUserActivity($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISettings.php:64::isSolanaEnabled()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISettings.php:69::isEthereumEnabled()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISettings.php:74::isDexScanningEnabled()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISettings.php:79::isCexTradingEnabled()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIESportsStartGG.php:6::verifySignature(array $headers, string $payload)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIESportsStartGG.php:29::parseEventPayload(string $payload)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIESportsStartGG.php:58::getWinners(array $payload)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIESports.php:29::initEscrowOnSolana(array $event)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIESports.php:52::lockEntryEscrow(array $entry)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIESports.php:75::releaseEscrowOnSettle(array $event, array $winners)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIESports.php:99::computeFeeSplit(array $event)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIESports.php:121::verifyWebhookSignature(array $headers, string $rawBody)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIESports.php:164::applyDisputeFreeze(int $eventId, string $reason)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchangeAdapter.php:10::__construct(private ?MyMIExchange $exchange = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchangeAdapter.php:15::createAsset(string $symbol, string $name, int $supply, array $meta = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchangeAdapter.php:35::mintToUser(string $assetId, int $userId, float $tokens)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchangeAdapter.php:45::debitUserFiatOrStable(int $userId, float $amount, string $memo)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchangeAdapter.php:59::creditUserFiatOrStable(int $userId, float $amount, string $memo)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchangeAdapter.php:73::createPrivateAuction(string $assetId, array $whitelistUserIds, float $price, DateTime $endsAt)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchangeAdapter.php:97::settleAuction(string $auctionId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchangeAdapter.php:107::getCurrentPrice(string $assetId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisors.php:12::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisors.php:17::registerAdvisor($data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisors.php:22::getAdvisor($id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisors.php:27::updateAdvisor($id, $data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisors.php:32::deleteAdvisor($id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisors.php:37::getAllAdvisors()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAdvisors.php:42::getAdvisorsBySpecialty($specialty)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBlogger.php:11::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBlogger.php:17::composeBrief(array $seed)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBlogger.php:43::generateCampaignContent(array $brief)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBlogger.php:53::generateForChannel(string $channel, array $brief)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBlogger.php:61::renderPrompt(string $channel, array $brief)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBlogger.php:74::normalizeBlock(string $channel, array $brief, string $html)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBlogger.php:96::repurpose(array $block, string $targetChannel)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDiscord.php:15::__construct()` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDiscord.php:25::dispatch(string $eventKey, array $data)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDiscord.php:56::enqueuePlain(string $channelKey, string $content, array $context = [])` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDiscord.php:80::notifyLiquidityScan(array $payload)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDiscord.php:115::renderTemplate(string $templateKey, array $data)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDiscord.php:139::sendWebhookMessage(string $webhookUrl, array $payload, string $channelKey = 'news_webhook')` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDiscord.php:286::processQueue(int $limit = 25)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDiscord.php:543::apiGet(string $endpoint)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDiscord.php:700::trackOnboardingStep(string $discordUserId, string $stepKey)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/KimiSuggestions.php:9::__construct(?string $baseDir = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/KimiSuggestions.php:17::saveSuggestion(string $title, string $body, ?string $category = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:19::__construct($provider = null, ?EthereumServices $eth = null, ?CacheInterface $cache = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:27::normalizeAddress(?string $maybe)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:32::isValidChecksum(string $addr)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:40::getBalance(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:48::getTransactions(string $address, int $limit = 100)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:53::getGasPrice()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:64::getTxStatus(string $hash)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:70::generateWallet()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:78::signTransaction($transaction, $privateKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:84::sendAsset($privateKey, $fromAddress, $toAddress, $assetId, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:96::initContract($abi, $contractAddress)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:101::callContractFunction($functionName, $params = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:109::deployERC20Token($privateKey, $initialSupply, $tokenName, $decimalUnits, $tokenSymbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:125::deployERC721Token($privateKey, $tokenName, $tokenSymbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:141::transferERC20Token($contractAddress, $fromPrivateKey, $toAddress, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:157::getERC20TokenBalance($contractAddress, $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:164::setEthPrice($price)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:169::setAnnualCosts($costs)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:174::setReturnRate($rate)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:179::calculateRequiredETH()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:184::calculateDailyRequiredETH()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:191::getAnnualCosts()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:196::getEthPrice()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIEthereum.php:201::getReturnRate()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:33::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:38::user($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:39::beta($beta)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:40::type($type)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:41::id($typeId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:42::controller($controller)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:43::method($method)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:44::url($url)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:45::fullUrl($fullUrl)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:46::token($token)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:47::comment($comment)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:48::dateRange($from, $to)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:50::log()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:70::logFromMessage($level, $message, $context = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:94::lastLog()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:96::getNum()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:97::get()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:98::removeLog()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:100::getIds()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMILogger.php:130::flushParameters()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:19::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:27::reporting($cuID = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:267::getCurrentBalance(int $userId, string $mode = 'net-liquid')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:314::get_user_activity($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:319::get_users_activity()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:324::targets()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:377::get_pending_assets()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:383::get_pending_asset_by_id($appID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:401::get_active_services()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:406::get_approved_assets()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:411::get_pending_partner_assets()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:417::get_approved_partner_assets()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:422::migrate_asset_request_info($appID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:427::get_total_transactions()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:432::get_total_amount()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:503::get_last_total_amount()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:508::get_pending_support($department)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:513::get_complete_support($department)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:518::get_total_active_wallets()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:523::get_total_default_wallets()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:528::get_total_wallet_transactions()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:533::get_total_trades_tracked()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:538::get_pending_users()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:543::get_active_users()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:548::get_inactive_users()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:553::get_pending_partners()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:558::get_active_partners()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:563::get_inactive_partners()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAnalytics.php:568::get_department_tasks($department, $tasks)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:56::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:161::connector(string $name)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:187::getAssets()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:196::getSolanaTokens()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:203::createTradingPair($baseToken, $quoteToken)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:212::executeTrade($pairId, $fromAddress, $toAddress, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:222::getNetworkStatus()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:229::approvedAssets()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:243::getLargeTransactions()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:257::getSuspiciousTransactions()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:262::getSuspiciousTransactionCount()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:267::flagTransactionAsSuspicious($transactionId, $reason, $reportedBy)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:272::getMarketSummaries($market_pair, $market)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:298::getUserExchange_info($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:339::getUserAssetSummary($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:371::forChain(string $chain)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:383::balance(string $address, string $chain = 'solana')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:388::quote(array $params, string $chain = 'solana')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:393::swap(array $params, string $chain = 'solana')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIExchange.php:398::transfer(string $from, string $to, string $amount, array $opts = [], string $chain = 'solana')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/SitemapGenerator.php:22::__construct(RouteCollection $routes, SitemapConfig $config, array $providers = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/SitemapGenerator.php:34::collectStaticFromRoutes()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/SitemapGenerator.php:58::collectFromProviders()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/SitemapGenerator.php:76::normalizeAndDeduplicate(array $urls)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/SitemapGenerator.php:109::build()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/SitemapGenerator.php:123::writeSitemapFiles(array $urls)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/SitemapGenerator.php:206::writeRobots()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/SitemapGenerator.php:220::pingSearchEngines()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/SitemapGenerator.php:238::ping()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAssistant.php:43::chat(array $payload)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAssistant.php:93::getNotesForUser(?int $userId, ?string $discordUserId = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAssistant.php:99::ensureSessionKey(?int $userId, ?string $discordUserId = null, ?string $channelId = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIAssistant.php:126::saveNote(array $payload)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/BaseLoader.php:69::commonData()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISEC.php:14::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISEC.php:24::filings(string $ticker, int $limit = 20)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISEC.php:146::getCikFromSymbol($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISEC.php:177::getSECData(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISEC.php:192::getSecFilingsByCik($cik)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISEC.php:199::parseFilings($data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISEC.php:222::getInsiderTransactions($cik)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISEC.php:229::getInstitutionalOwnership($cik)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISEC.php:245::getFinancialReports($cik)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:81::__construct()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:205::generateSummaryWithKimi(array $records)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:234::generateSocialPostsWithKimi(array $summaries)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:263::generateEmailDraftsWithKimi(array $summaries)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:289::generateMarketingFromAlert(array $alert)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:358::marketing()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:365::assignMarketingTask($task_info)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:380::assignTopicsToArticles($articleGroup)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:391::autoDistributeHighRelevanceSummaries($minScore = 75)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:407::autoSendToZapier($minScore = 75)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:418::backfillMissingSummaries($limit = 20)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:498::calculateCosineSimilarity($text1, $text2)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:580::checkPlagiarismRisk(string $sourceText, string $generatedText)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:599::cleanHtmlSummaryPreview($text)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:610::cleanTitle(string $rawTitle)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:646::convertToUtf8($content)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:652::convertUrlsToLinks($text)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:659::decodeMimeHeaderSafe($string)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:669::debugTopKeywords($id)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:688::department()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:703::distributeGroupedContent(int $campaignId)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:746::distributeTradeAlert($alert, $action = 'BUY')` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:757::enqueueEmailJob($emailData)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:764::enrichTradeAlertsBySymbol(string $symbol)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:833::exportCapCutJsonTemplate($mediaPackage)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:859::exportVisualPackage($id)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:872::extractFeaturesWithPhpMl($content)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:897::extractHashtags(string $text)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:924::extractKeywords(array $sentences, array $fallback = [], array $alertContext = [])` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1087::extractSubtopics(string $text)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1101::fetchAndStoreEmails($emailType)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1257::fetchRecentFinancialNews(string $symbol)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1301::formatBlogPost(string $headline, string $summary)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1310::formatEmailBlast(string $headline, string $summary)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1321::formatSocialPost(string $headline, string $summary, string $platform = 'generic')` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1337::formatDiscordPost(string $headline, string $summary)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1372::notifyModerators(array $post)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1392::reprocessIncompleteEmails()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1469::sanitizeRawEmailContent($content)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1490::sanitizeSummary($summary)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1504::saveTemporaryScrapedData($data)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1509::saveTradingViewChart($chartUrl, $ticker)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1545::scanMediaRepoForNewFiles()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1576::scoreKeywordRelevance(string $keyword, string $summary)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1590::scrapeAndGenerateContent($accountid, $category, $platform = null)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1640::scrapeTokenContent($tokenInfo)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1815::sendMediaToZapier($media)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1839::sendScheduledPosts()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1848::sendWalkthroughInviteToActiveUsers()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1866::sendZapierTradeAlert($tradeAlert)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1888::smartSearchWithThrottle(string $query)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:1957::standaloneScrapeWebsite($url)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2013::spellCheckAndRefine(string $text)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2058::splitIntoSentences(string $content)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2119::summarize($text, $method = 'textrank', $charLimit = 500)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2129::summarizeContent($content, $minLength = 300, $maxLength = 100000, $depth = 0)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2199::summarizeContentByKeyword(string $keyword)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2204::summarizeContentFromHtml($html)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2325::summarizeContentTextRank($content)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2334::summarizeText($text)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2391::summarizeTradingViewFinancials($url)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2462::generateBlogContent(array $tradeAlert)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2482::generateEmailContent(array $tradeAlert)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2505::generateGroupedBlogAndEmailDrafts(array $groupedLabeledSummaries)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2535::generateGroupLabelsFromTFIDF(array $groupedSummaries)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2562::generateRandomMarketingContent(array $tradeAlert)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2644::generateTimelineData($articles)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2656::generateStoryboardFromSummary(array $summary)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2676::generateVoiceoverMp3FromText($text)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2711::generateVoiceoverScript()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2737::generateVoiceoverScriptFromSummary(string $summary)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2763::generateTradeAlertEmailContent(array $tradeAlert)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2820::generateTradeAlertBlogContent(array $tradeAlert)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2854::generateTradeAlertVoiceoverScriptContent(array $tradeAlert)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2885::generateTradeAlertRandomMarketingContent(array $tradeAlert)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2930::getBlogPosts()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2943::getCampaigns()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2949::getCampaignByID($campaignID)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2955::getCampaignsBySchedId($sched_id)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2970::getDripCampaignInfo()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2980::getFeatures()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:2989::getKeywordCandidates()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:3000::getManagementTeam()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:3009::generateCTA($summary)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:3014::generateContentAndInsert(array $record)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:3074::generateContentForAllScrapedRecords(array $records)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:3122::promoteInvestmentNewsToMarketingScraper(?string $sinceDate = null)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:3222::generateContentForZapier($platform, $contentData)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:3233::generateContentFromRaw(array $emailRecord)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:3308::classifyNewsCategory(array $newsRow)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:3372::extractSymbolsFromText(string $text)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:3388::generateHeadline($input)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:3536::collectDailyCampaignData(array $options = [])` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:3729::buildDailyCampaignPlaybook(array $data, array $options = [])` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4079::generateDailyCampaignPackage(array $options = [])` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4098::generateUnifiedSocialPosts(string $summary, array $keywords = [], array $platforms = [])` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4145::getFinalizedContent($limit = 10)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4156::getScrapesByKeyword($keyword)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4174::getTimelineGroupedByTopic()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4193::getTopKeywordScores($content, $max = 10)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4285::groupSimilarSummariesByCosine(array $summaries)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4370::isDifferentDay($dateString)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4395::backfillMarketingEmails(int $daysBack = 30, ?int $maxEmails = null)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4527::insertFinalScraper($record, $summary)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4589::isEmailAlreadyHandled(string $identifier)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4645::searchWithBing(string $query)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4672::searchWithGoogle(string $query)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4694::seoCheck()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4722::social_media()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4758::testMarketingSummarizer($limit = 10)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4797::tokenizeWithNlpTools($content)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4805::getPageHeaders()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4844::getPageHeadersByName($pageName)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4883::postToDiscord($message)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4910::postToFacebookPage($pageId, $message)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4927::postToFacebookGroup($groupId, $message)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:4944::sendNotification($type, $viewPath, $data, $targetGroup = null, $socialMedia = [])` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5020::postToSocialMedia($content)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5050::fetchTweets($query, $count = 100)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5094::generateContentFromTweets($tweets)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5124::generateFallbackSummary(string $content)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5136::generateFromTempScraper($limit = 5)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5165::postToTwitter($content)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5229::distributeContent(string $platform, string $message)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5254::distributeContentToSocialMedia($content)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5282::generateAdvisorMediaPackage($userId)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5302::generateAndPostContent()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5335::generateMarketingContent()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5374::logContentError($recordId, $reason)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5408::generateContentFromData($title, $content, $tags)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5417::generateContentFromScrapedData($scrapedData, $platform = null)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5471::generateContentFromSummary(array $summary)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5493::generateContentFromLargeText($content, $tags)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5550::generateCampaignContent(array $campaign)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5650::generateCampaignStepContent(array $step)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5754::generateCanvaVideo()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5789::generateEnhancedContent($voiceScript)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5819::generatePostsFromSummaryAuto(string $summary, array $keywords)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5853::generatePlatformContent($summary, $keywords, $platforms = [])` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5860::generateSocialPost(array $summary)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5908::generateSummaryFromAlert(array $alert)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:5988::generateTikTokScript($summary, $keywords, $mediaAssets = [])` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:6000::generateYouTubeScript($summary, $keywords, $mediaAssets = [])` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:6012::generateVoiceoverAudio($text, $filename)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:6048::generateStockInformation($cuID)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:6147::getRecentPosts($limit = 5)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:6153::cronFetchAndGenerateNews(int $limit = 25)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:6242::pullFinancialNews()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:6263::rankBufferCandidates()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:6287::rankNewsArticles()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:6319::summarizeMultipleArticles(array $articles)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:6346::getPostingPlan(string $platformKey, string $contentType, array $tickers = [], array $keywords = [])` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:6435::composePost(string $platformKey, string $contentType, string $baseCopy, array $tickers = [], array $topicKeywords = [])` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketing.php:6462::buildWeeklyWatchlistNewsletter(string $weekStartDate)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISnapTrader.php:100::createConnectLink(string $userId, array $options = [])` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISnapTrader.php:120::getAuthorizations(string $userId, array $params = [])` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISnapTrader.php:133::listAccounts(string $userId, array $params = [])` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISnapTrader.php:143::getPositions(string $userId, string $authorizationId, array $params = [])` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISnapTrader.php:170::placeEquityOrder(array $order)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISnapTrader.php:181::cancelEquityOrder(string $userId, string $authorizationId, string $orderId)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISnapTrader.php:195::getEquityOrder(string $userId, string $authorizationId, string $orderId)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISnapTrader.php:222::placeOptionsOrder(array $order)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISnapTrader.php:231::cancelOptionsOrder(string $userId, string $authorizationId, string $orderId)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISnapTrader.php:244::getOptionsOrder(string $userId, string $authorizationId, string $orderId)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISnapTrader.php:255::debugConfig()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISnapTrader.php:265::setTimeout(int $s)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISnapTrader.php:266::setBase(string $b)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/ExchangeConnectorInterface.php:6::getQuote(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/ExchangeConnectorInterface.php:7::trade(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/ExchangeConnectorInterface.php:8::price(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/ExchangeConnectorInterface.php:9::balances(string $accountId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/FMVEngine.php:10::estimate(string $title)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITwitter.php:10::__construct($bearerToken)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITwitter.php:15::getTweet($tweetId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITwitter.php:21::postTweet($tweetContent)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITwitter.php:28::deleteTweet($tweetId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITwitter.php:34::getUserByUsername($username)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITwitter.php:40::followUser($followerId, $targetUserId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMITwitter.php:47::unfollowUser($followerId, $targetUserId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMINews.php:19::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMINews.php:35::fetchPreMarketNews()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMINews.php:46::fetchMarketCloseNews()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMINews.php:83::fetchTopMarketAuxNews($limit = 10)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMINews.php:121::headlinesForSymbols(array $symbols, int $limit = 20)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMINews.php:132::headlinesForChains(array $chains, int $limit = 20)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMINews.php:137::isNewsAlertEmail(string $subject)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/KimiClient.php:15::__construct(?Client $http = null, ?KimiConfig $config = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/KimiClient.php:42::chat(array $messages, array $tools = [], ?array $toolChoice = null, array $options = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/KimiClient.php:70::simple(string $instruction, string $input)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/CrudCacheInvalidator.php:19::__construct(?CacheInterface $cache = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/CrudCacheInvalidator.php:29::clear(array $tags)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/CryptoHelper.php:11::encrypt(string $plaintext, int $version = self::VERSION_XCHACHA20)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/CryptoHelper.php:34::decrypt(string $ciphertext, string $nonce, int $version = self::VERSION_XCHACHA20)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/WebSocketClient.php:12::__construct($host, $port)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/WebSocketClient.php:18::connect()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/WebSocketClient.php:25::sendMessage($message)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/WebSocketClient.php:35::close()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMINotifications.php:18::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMINotifications.php:31::subscribe($subscriptionData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMINotifications.php:43::sendNotification($title, $body, $image = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMINotifications.php:77::sendWebSocketNotification($message, $category = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMINotifications.php:93::unsubscribe($endpoint)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMINotifications.php:103::forUser(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMINotifications.php:118::forChain(int $userId, string $chain)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMICoin.php:22::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMICoin.php:38::getCoinValue()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMICoin.php:47::getCoinInfo()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMICoin.php:68::getUserCoinTotal($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPump.php:17::__construct($baseUri, $accessToken)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPump.php:25::postMessage($content)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPump.php:47::getActivityStream()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPump.php:61::authenticate($clientId, $clientSecret, $redirectUri, $code)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPump.php:86::topTokens(string $chain = 'solana', int $limit = 50)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIPump.php:122::tokenDetails(string $chain, string $idOrMint)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDigibyte.php:14::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDigibyte.php:27::getUserDigiByte(?int $cuID = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDigibyte.php:54::getTransactions(?int $cuID = null, ?string $address = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDigibyte.php:70::getDGBPrice()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDigibyte.php:75::generateWallet()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDigibyte.php:87::publicKeyToAddress($publicKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDigibyte.php:95::signTransaction($transaction, $privateKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDigibyte.php:101::verifySignature($transaction, $signature, $publicKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDigibyte.php:106::sendAsset($privateKey, $fromAddress, $toAddress, $assetId, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDigibyte.php:120::getTransactionStatus($transactionId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDigibyte.php:125::getBalance($address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDigibyte.php:130::validateAddress($address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDigibyte.php:135::getCurrentBlock()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDigibyte.php:140::estimateTransactionFee()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDigibyte.php:145::getNetworkStatus()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/ScrapemaxClient.php:20::__construct(string $baseUri, string $apiKey, ?ClientInterface $http = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/ScrapemaxClient.php:37::scrape(array $payload)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/EmailManager.php:9::__construct()` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/EmailManager.php:13::addEmailToList($email, $tier)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/EmailManager.php:25::removeEmailFromList($email, $tier)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:24::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:33::encryptData($data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:39::decryptData($data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:45::maskData($data, $visibleCount = 4)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:52::purgeOldApiRequests($interval = '1 YEAR')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:59::logActivity($message, $level = 'info')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:79::checkCompliance($data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:88::accessControlCheck($role_required)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:96::auditLog($action, $status, $additional_info = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:109::generate2faSecret()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:115::verify2faCode($code, $secret)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:121::validatePasswordStrength($password)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:136::anonymizeData($data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:142::sanitizeHeaders($header_data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:147::validateFileUpload($file_data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:155::fileUploadSecurity($file_data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:164::generateSecurityQuestions()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:170::verifySecurityAnswers($answers)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:182::logApiRequest($request_data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:188::logApiResponse($response_data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:194::logError($error_data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:199::checkSessionTimeout()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:206::checkBruteForce($ip_address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:213::xssFilter($data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:218::sqlInjectionPrevention($data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:223::contentValidation($data, $rules)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:233::headerInjectionPrevention($header_data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:238::outputEncoding($data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:243::setSecurityHeaders()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:250::hashPassword($password)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:255::generatePasswordResetToken($user_id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:264::trackUserActivity($user_id, $activity)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:274::manage2fa($user_id, $enable)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:281::manageSecurityQuestions($user_id, $questions_and_answers)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:295::redactData($data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:307::incidentResponse($incident_data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:313::performSecurityAudit()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:323::manageCors($domains)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:335::rateLimitActions($user_id, $action)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:341::analyzeUserAgent($user_agent)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:347::sendSecurityNotification($type, $message)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:352::validateInput($input, $pattern)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:357::rotateEncryptionKeys()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:366::getActiveEncryptionKey()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:378::verifyDigitalSignature($data, $signature, $publicKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:384::secureDeleteFile($filePath)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:393::getSecurityTrainingContent()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:400::logTrainingCompletion($userId, $module)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:406::analyzeUserBehavior($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:412::getDeviceFingerprint($request)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:418::logSensitiveOperation($userId, $operation, $details)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:424::getSecurityQuestionnaire()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:430::evaluateSecurityQuestionnaireResponses($responses)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:436::runSecurityScan()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:442::assessThirdPartyServiceSecurity($serviceId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:448::monitorDataTransfer($data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:454::detectPhishingAttempt($email, $url)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:460::performMobileSecurityChecks($deviceInfo)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:466::encryptMessage($message, $recipientPublicKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:472::decryptMessage($encryptedMessage, $privateKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:478::getSecurityDashboardData()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:484::initiateIncidentResponse($incidentDetails)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:490::checkComplianceStandards($standards)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:496::getThreatIntelligenceData()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMISecurity.php:569::csrfTokenProvider()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:34::__construct(?string $apiKey = null, ?string $seedB64 = null, ?string $base = null, int $timeout = 30)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:82::generateKeyPair()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:94::sign(string $privateKeyB64, string $message)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:110::buildMessage(string $apiKey, string $timestamp, string $path, string $method, ?string $minifiedJsonBody = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:118::headers(string $apiKey, string $timestamp, string $signatureB64)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:159::request(string $method, string $path, ?array $json = null, array $extraHeaders = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:183::getAccount()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:190::getTradingPairs(array $symbols = [], ?int $limit = null, ?string $cursor = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:202::getHoldings(array $assetCodes = [], ?int $limit = null, ?string $cursor = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:214::getBestBidAsk(array $symbols = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:224::getEstimatedPrice(string $symbol, string $side, string $quantityCsv)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:244::getOrders(array $filters = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:252::getOrder(string $orderId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:259::cancelOrder(string $orderId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:276::placeOrder(array $order)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:285::placeMarketBuy(string $symbol, string $assetQty, ?string $clientOrderId = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:296::placeMarketSell(string $symbol, string $assetQty, ?string $clientOrderId = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:307::placeLimit(string $side, string $symbol, string $assetQty, string $limitPrice, string $tif = 'gtc', ?string $clientOrderId = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:332::debugConfig()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:342::getQuote(array $p)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:351::trade(array $p)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:356::price(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:363::balances(string $accountId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:370::setApiKey(string $apiKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:371::setSeed(string $seedB64)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:372::setBase(string $base)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRobinhood.php:373::setTimeout(int $s)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketData.php:17::__construct(?CacheInterface $cache = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketData.php:23::fetchLatestNews($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketData.php:43::getPriceSOLFromJupiter(string $mint)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketData.php:50::getPriceFromBirdeye(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketData.php:57::getPriceDGBFromCoingecko()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketData.php:64::getPriceBTCFromCoingecko()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketData.php:71::price(string $symbol, ?string $chain = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIMarketData.php:96::snapshot(string $symbol, ?string $chain = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDexScreener.php:18::__construct(ConnectionInterface &$db)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDexScreener.php:26::getDexInfo()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDexScreener.php:35::topTokens(string $chain = 'solana', int $limit = 50)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDexScreener.php:71::tokenDetails(string $chain, string $idOrMint)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDexScreener.php:99::getLiquidityPools()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDexScreener.php:106::getTokenMarketData($tokenAddress)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDexScreener.php:112::getAvailableTokens()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDexScreener.php:119::getTokenPrice($tokenAddress)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIDexScreener.php:126::updateSolanaTokenPrices()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRaydium.php:14::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRaydium.php:35::getQuote(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRaydium.php:46::swap(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRaydium.php:52::getPools()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRaydium.php:63::getLiquidity(string $poolId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRaydium.php:71::topTokens(string $chain = 'solana', int $limit = 50)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIRaydium.php:103::tokenDetails(string $chain, string $mintOrId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBitcoin.php:24::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBitcoin.php:35::injectScripts()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBitcoin.php:60::getUserBitcoin(?int $cuID = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBitcoin.php:89::getBTCPrice()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBitcoin.php:98::normalizeAddress(?string $maybe)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBitcoin.php:113::isValidBitcoinAddress(string $addr)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBitcoin.php:122::getBalance(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBitcoin.php:160::getTransactions(string $address, int $limit = 100)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBitcoin.php:194::buildUnsignedPsbt(array $inputs, array $outputs, string $network = 'mainnet')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBitcoin.php:205::broadcastSignedTransaction(string $hex, string $network = 'mainnet')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIBitcoin.php:216::looksLikeBech32(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallets.php:25::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallets.php:49::getUserWalletInformation()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallets.php:55::getUserWallets($userId = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallets.php:95::getUserBankAccounts($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallets.php:205::reconcileUserWallets(int $userId, bool $logSummary = true)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallets.php:302::getTotalWalletValue()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallets.php:309::getWalletTotals()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallets.php:333::getTotalOpenValue($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallets.php:373::getWalletInfo($cuID, $walletID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallets.php:447::getWalletInformation($walletID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallets.php:462::getTotalWalletPercentage($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallets.php:475::getLastActivity($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallets.php:496::getWalletsByUser($userID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallets.php:500::getTradesByUser($userID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/MyMIWallets.php:505::updateAssetApprovalStatus($appID, $assetStatus)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Introspection/SupportScanner.php:23::__construct(?string $appPath = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Introspection/SupportScanner.php:33::scan()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Introspection/SupportScanner.php:194::writeManifest(array $manifest)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Introspection/SupportScanner.php:206::writeInventory(array $manifest)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertSources/ThinkOrSwimEmailSource.php:9::__construct(private ?AlertsModel $alertsModel = null)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertSources/ThinkOrSwimEmailSource.php:14::fetch()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertSources/MarketAuxNewsSource.php:9::__construct(private ?MyMIMarketing $marketing = null)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertSources/MarketAuxNewsSource.php:14::fetch()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertSources/ManualEntrySource.php:9::__construct(private ?AlertsModel $alertsModel = null)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertSources/ManualEntrySource.php:14::fetch()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Traits/TextProcessor.php:10::cleanTitle(string $rawTitle)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Traits/TextProcessor.php:27::extractKeywords($text)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Traits/TextProcessor.php:67::formatHashtags(array $keywords)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Traits/TextProcessor.php:127::summarizeText($text)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Traits/MarketingBatchTrait.php:5::processBatchRecords(array $records, $insertCallback, $onFail = null)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Ops/OpsReportWriter.php:9::write(string $jobKey, string $markdown, ?string $dateString = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Ops/OpsJobRegistry.php:19::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Ops/OpsJobRegistry.php:27::register(string $jobKey, callable $handler)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Ops/OpsJobRegistry.php:35::all()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Ops/OpsJobRegistry.php:43::dispatch(string $jobKey, array $payload = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Resilience/CircuitBreaker.php:19::allow()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Resilience/CircuitBreaker.php:33::recordSuccess()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Resilience/CircuitBreaker.php:52::recordFailure()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Privacy/DataErasureService.php:8::__construct(private BaseConnection $db)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Privacy/DataErasureService.php:10::pseudonymizeUser(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Privacy/DataExportService.php:8::__construct(private BaseConnection $db)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Privacy/DataExportService.php:11::exportUser(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/ContentEngine/DistributionService.php:17::__construct(?ContentEngineConfig $config = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/ContentEngine/DistributionService.php:24::send(int $postId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/ContentEngine/ScannerIngestService.php:21::__construct(?ContentEngineConfig $config = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/ContentEngine/ScannerIngestService.php:32::ingest(array $payload, string $source = 'manual_chatgpt')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/ContentEngine/ScannerScoringService.php:20::__construct(?ContentEngineConfig $config = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/ContentEngine/ScannerScoringService.php:31::scoreIngest(int $ingestId, bool $force = false)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/ContentEngine/PostDraftService.php:18::__construct(?ContentEngineConfig $config = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/ContentEngine/PostDraftService.php:28::generateDrafts(int $ingestId, array $ideas)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/OllamaClient.php:11::__construct(?string $baseUrl = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/OllamaClient.php:16::generate(string $model, string $prompt, array $options = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/AiOpsManager.php:18::__construct(?BaseConnection $db = null, ?SiteSettings $settings = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/AiOpsManager.php:26::getMonthKey(?DateTime $date = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/AiOpsManager.php:36::canRun(string $subsystem, string $jobKey, array $context = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/AiOpsManager.php:77::assertCanRun(string $subsystem, array $context = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/AiOpsManager.php:85::startRun(string $jobKey, string $subsystem, array $meta = [], ?int $createdBy = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/AiOpsManager.php:105::finishRun(int $runId, string $status, string $message = '', array $meta = [], ?int $runtimeSeconds = null, int $requests = 0, int $cacheHits = 0, int $errors = 0)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/AiOpsManager.php:173::getUsageSummary(?string $monthKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/AiOpsManager.php:210::getRecentRuns(int $limit = 20)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/AiOpsManager.php:223::getRecentEvents(int $limit = 50)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/AiOpsManager.php:236::logEvent(string $subsystem, string $eventType, string $message = '', array $meta = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/CodexClient.php:11::__construct(?AiOpsManager $manager = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/CodexClient.php:23::run(string $subsystem, array $payload, callable $executor)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/ChatGptClient.php:13::__construct(?AiOpsManager $manager = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AiOps/ChatGptClient.php:25::run(string $subsystem, array $payload, callable $executor)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertsChannels/ZapierChannel.php:9::__construct(private ?CURLRequest $client = null, private ?string $webhookUrl = null)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertsChannels/ZapierChannel.php:15::getName()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertsChannels/ZapierChannel.php:20::deliver(array $alert)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertsChannels/EmailChannel.php:8::__construct(private $mailer = null)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertsChannels/EmailChannel.php:13::getName()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertsChannels/EmailChannel.php:18::deliver(array $alert)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertsChannels/DiscordChannel.php:8::__construct(private $client = null)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertsChannels/DiscordChannel.php:13::getName()` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/AlertsChannels/DiscordChannel.php:18::deliver(array $alert)` | alerts | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Abuse/RateLimiter.php:8::__construct(private BaseConnection $db)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Abuse/RateLimiter.php:15::attempt(string $scope, string $key, int $limit, int $perSeconds, int $blockSecondsOnExceed = 0)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Notifications/PushService.php:12::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Notifications/PushService.php:38::sendToUser(int $userId, array $payload)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Mail/SmtpProvider.php:7::send(array $payload)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Mail/MailProviderInterface.php:11::send(array $payload)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Libraries/Mail/PostmarkProvider.php:7::send(array $payload)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AuthAuditService.php:22::__construct(?string $supportEmail = null, ?string $supportName = null)` | auth | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AuthAuditService.php:31::notifyRegistrationAttempt(?string $email, ?RequestInterface $request = null)` | auth | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AuthAuditService.php:66::notifyRegistrationResult(?string $email, string $status, ?RequestInterface $request = null, ?Throwable $exception = null, ?array $context = null)` | auth | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AuthAuditService.php:193::debugCacheRoundTrip(string $email, string $ip)` | auth | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletSummaryCalculator.php:13::calculate(array $balances, array $signals = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SearchService.php:9::__construct(private BaseConnection $db)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SearchService.php:17::search(string $q, array $types = [], int $limit = 20, int $offset = 0)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/UserService.php:23::__construct($siteSettings, $cuID, RequestInterface $request)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/UserService.php:38::commonData()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/UserService.php:187::userAccountData()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/UserService.php:231::getUserLoginActivity($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SocialPostFormatter.php:16::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SocialPostFormatter.php:29::format(string $platformKey, array $input)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/CurrencyService.php:24::convert($amount, $fromCurrency, $toCurrency, $date = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/CurrencyService.php:30::getExchangeRate($fromCurrency, $toCurrency, $date = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/CurrencyService.php:116::updateRates()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/CurrencyService.php:137::logConversion($userId, $fromCurrency, $toCurrency, $amount, $rate)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:21::__construct()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:51::distributeContent($platform, $message)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:72::extractTopKeywords($summary)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:76::fetchUnprocessedEmailSummaries()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:80::getEmailRecordById($id)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:86::getFeatures()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:91::gatherKeywordBasedContent($keywords)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:105::generateContentFromPost($title, $content, $tags)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:116::generateFinalContentFromTemp()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:164::generatePlatformPosts($content)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:169::getManagementTeam()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:174::getMarketingData($accountid, $category, $platform)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:192::getPromotionalBanners($userId)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:199::regeneratePostsFromEmailId($id)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:217::sanitizeAndSummarize($content)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:266::storeGeneratedPostsForDashboard($posts)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:283::sendWalkthroughInviteToActiveUsers()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:307::storeScrapedContent($content)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:318::generateDailyMarketCampaign(array $options = [])` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:323::generatePlatformPostPackFromSummary(int $summaryId)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingService.php:379::generateDailyCommunityPosts(int $limit = 5)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MailService.php:15::__construct(?MailProviderInterface $provider = null, ?MailQueueModel $queue = null)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MailService.php:56::send(string $to, string $subject, string $html, array $opts = [])` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MailService.php:112::queue(string $module, string $to, string $subject, string $html, array $opts = [])` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MailService.php:131::processQueue(int $limit = 25)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletSummaryService.php:39::buildSummary(int $userId, bool $forceRefresh = false)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MarketingScraper.php:11::queueLink(string $url, array $meta = [])` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/CoinGeckoService.php:9::__construct(?\Config\CoinGecko $cfg = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/CoinGeckoService.php:36::simplePrice(array $ids, array $vs)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/CoinGeckoService.php:56::coinInfo(string $id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/IntakeRouter.php:8::dispatch(array $payload)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/OpsCommandService.php:13::__construct(?OpsCommandInboxModel $inbox = null, ?ProjectTaskRegistryModel $registry = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/OpsCommandService.php:19::createTaskFromPlan(array $plan)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/OpsCommandService.php:31::listInbox(array $filters = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/OpsCommandService.php:46::getInboxItem(int $id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/OpsCommandService.php:51::markStatus(int $id, string $status, array $meta = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/OpsCommandService.php:56::appendSecurityFlag(int $id, string $flagKey, array $details = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/OpsCommandService.php:61::upsertAnalysis(int $id, array $analysis)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EthereumServices.php:23::__construct(?Client $client = null, ?CacheInterface $cache = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EthereumServices.php:66::normalizeAddress($maybe)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EthereumServices.php:85::toChecksum(string $addr)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EthereumServices.php:96::isValidChecksum(string $addr)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EthereumServices.php:102::getBalance(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EthereumServices.php:129::getTransactions(string $address, int $limit = 100)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EthereumServices.php:143::tokenBalance(string $contract, string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EthereumServices.php:162::sendRawTransaction(string $signedHex)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EthereumServices.php:177::generateAddressForUser(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AuctionService.php:7::planSeries(int $projectId, int $tokenId, int $buckets, int $bucketSize, float $p0, float $targetUSD)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AuctionService.php:29::seedSeries(array $rows)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AuctionService.php:37::placeBid(int $auctionId, int $projectId, int $tokenId, int $userId, float $quotedPrice, int $requestedUnits)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AuctionService.php:55::settleAuction(int $auctionId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ForecastingService.php:13::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ForecastingService.php:18::forecastBudget($userId, $years)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ForecastingService.php:24::getProjectedInvestments($userId, $years)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ForecastingService.php:30::calculateInflationImpact($userId, $years)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:22::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:37::getUserReferralData($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:129::getUserReferralLink($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:138::generateReferralLinks($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:163::calculateCommissions($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:180::getCommissionPercentage($cuID, $referrerCode)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:218::getReferralActivity($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:226::processReferralPayments($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:367::getCommissionHistory($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:375::getReferralEarningsBreakdown($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:380::storeReferral($referralData, $subscriberData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:396::getUserNameByID($userID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:409::getPreGeneratedMessages($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:464::getNonResponsiveInvites()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:472::sendFollowUpEmails()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:509::getReferralSuccess($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ReferralService.php:523::getPendingReferrals()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:25::__construct(LoggerInterface $logger, WalletModel $walletModel)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:45::prepareAccountData(array $payload, string $type)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:129::addBankWallet(array $accountData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:192::addCreditWallet($accountData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:247::addDebtWallet($accountData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:303::addInvestmentWallet($accountData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:355::addCryptoWallet($accountData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:403::addWallet($walletData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:411::deleteBankWallet($walletId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:426::deleteCreditWallet($walletId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:441::deleteDebtWallet($walletId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:456::deleteInvestmentWallet($walletId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:471::deleteCryptoWallet($walletId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:499::softDeleteWallet(string $type, int $id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:517::deleteWallet($accountId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:530::editWallet($accountId, $walletData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:535::logWalletDeletion($userId, $walletId, $accountType)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:568::getUserWallets($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:601::processTransaction($transactionData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:607::getWalletTransactionHistory($walletId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:613::generateWallet($userId, $walletData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:619::customizeWallet($userId, $walletId, $customizationData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:625::copyWallet($walletId, $newWalletData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:631::prepareWalletData($json)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:681::validateRequiredFields($data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:699::notifyUser($userId, $message)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:706::reverseTransaction($transactionId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:719::getConversionRate($fromCurrency, $toCurrency)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:726::safeTransaction($operation, $walletId, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:745::depositFunds($walletId, $amount, $currency = 'USD')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:768::withdrawFunds($walletId, $amount, $currency = 'USD')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:787::logTransaction($type, $walletId, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:799::validateTransactionLimits($walletId, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:808::logAuditTrail($userId, $walletId, $action, $details)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:823::initiateWithdrawalWith2FA($walletId, $amount, $currency = 'USD')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:847::handleCurrencyConversion($amount, $fromCurrency, $toCurrency)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:854::getLiveConversionRate($fromCurrency, $toCurrency)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:870::detectFraud($walletId, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:900::generateComplianceReport($walletId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:917::notifyForLargeTransaction($walletId, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:932::upsertProviderWallet(int $userId, string $provider, string $label, array $credentials = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:1012::editBankWallet(int $id, array $data, array $ctx = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:1028::editCreditWallet(int $id, array $data, array $ctx = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:1044::editDebtWallet(int $id, array $data, array $ctx = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:1060::editInvestmentWallet(int $id, array $data, array $ctx = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WalletService.php:1076::editCryptoWallet(int $id, array $data, array $ctx = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/CommonDataService.php:16::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/CommonDataService.php:25::getCommonData($cuID, $siteSettings, $request)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ZapierService.php:14::__construct()` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ZapierService.php:21::sendApprovedPostsToZapier()` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AlphaVantagePipelineService.php:26::enqueue(array $symbols = [], ?string $apiKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AlphaVantagePipelineService.php:42::run(array $symbols = [], ?string $apiKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:30::definePlan(array $plan, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:39::listPlans()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:48::subscribe(int $userId, string $planId, array $opts = [], ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:57::cancelSubscription(int $subscriptionId, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:66::getSubscription(int $subscriptionId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:75::listSubscriptions(array $filters = [], int $page = 1, int $perPage = 50)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:84::recordUsage(int $userId, string $metric, float $qty, array $tags = [], ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:93::invoiceNow(int $userId, array $lines, array $opts = [], ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:102::refund(int $invoiceId, float $amount, string $reason, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:111::configureSplit(string $context, int $contextId, array $splits, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:120::payout(int $walletIdOrUserId, string $chain, string $dest, float $amount, array $opts = [], ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:129::ledgerEntries(array $filters = [], int $page = 1, int $perPage = 100)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:138::kpis(array $range)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:150::calculateDistribution(float $netAmount, array $ownerships)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:178::recordEvent(int $projectId, float $amount, string $currency, string $source, string $note = '')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RevenueService.php:191::runDistribution(int $eventId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AlphaVantageService.php:8::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AlphaVantageService.php:13::getOverview($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AlphaVantageService.php:19::getQuote($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AlphaVantageService.php:25::getNewsSentiment($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BlockchainService.php:15::__construct(ConnectionInterface $db)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BlockchainService.php:147::getTokenPrice($blockchain, $tokenAddress)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BlockchainService.php:155::swapTokens($blockchain, $fromToken, $toToken, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BlockchainService.php:163::getLiquidityPools($blockchain)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/InfuraService.php:9::__construct(?Infura $cfg = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/InfuraService.php:40::rpc(string $method, array $params = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/InfuraService.php:51::getBalance(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DashboardService.php:12::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DashboardService.php:17::getPromotionalBanners($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DashboardService.php:24::getDashboardInfo($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/CashAppService.php:17::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/CashAppService.php:31::payViaCashApp($cuID, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TradeAlertsIngest.php:11::ingestQuick(string $symbol, string $side, array $meta = [])` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/InvestmentService.php:19::__construct()` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/InvestmentService.php:40::calculateRiskExposure($userId)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/InvestmentService.php:48::fetchRealTimeData($symbol)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/InvestmentService.php:54::getCustomAlerts($userId)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/InvestmentService.php:59::getInvestmentDashboard($cuID)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/InvestmentService.php:71::getInvestmentData($cuID)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/InvestmentService.php:124::getMarketNews($cuID)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/InvestmentService.php:130::getSymbolsByTradeType($tradeType)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/InvestmentService.php:135::getUserInvestments($userId)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/InvestmentService.php:143::getUserInvestmentSummary($userId)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/InvestmentService.php:149::setCustomAlert($userId, $alertData)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/InvestmentService.php:155::trackInvestmentReturns($userId, $investmentId)` | invest | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/JupiterService.php:9::__construct(?Jupiter $cfg = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/JupiterService.php:45::quote(array $q)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/JupiterService.php:62::swap(array $payload)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/JupiterService.php:71::prices(array $ids)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/JupiterService.php:88::tokenList()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PayPalService.php:24::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PayPalService.php:49::createPayment($amount, $nonce, $orderId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PayPalService.php:75::generateClientToken()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PayPalService.php:87::refundPayment($transactionId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PayPalService.php:103::voidTransaction($transactionId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PayPalService.php:132::getTransactionStatus($transactionId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:14::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:21::getAccountInfo($accountId, $accountType)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:27::editBankAccount($accountId, $data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:33::editCreditAccount($accountId, $data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:39::editDebtAccount($accountId, $data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:45::editInvestmentAccount($accountId, $data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:51::getUserBankAccounts($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:57::getUserCryptoAccounts($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:63::getUserDebtAccounts($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:69::getUserInvestAccounts($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:75::getWalletTransactions($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:81::getTotalDebt($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:107::getTotalInvestments($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:122::getUserCreditAccounts($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:128::getUserCreditLimit($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:142::getTotalCreditAvailable($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:161::getUserPortfolioSummary($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/AccountService.php:183::updateAccount($accountId, $accountType, $data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BufferSchedulerService.php:12::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BufferSchedulerService.php:18::rankBufferPosts()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BufferSchedulerService.php:35::promoteScheduledPosts()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BufferSchedulerService.php:60::getSmartScheduleTime($base = null, $gapMinutes = 20)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/CryptoPanicService.php:9::__construct(?CryptoPanic $cfg = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/CryptoPanicService.php:45::latest(array $params = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RecurringService.php:11::generateRecurringSchedule($accountDetails, $startDate, $endDate)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:29::createOrAttachToken(array $spec, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:38::updateToken(int $tokenId, array $patch, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:47::getToken(int $tokenId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:56::findByChainAddress(string $chain, string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:65::logoUpload(int $tokenId, UploadedFile $file, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:74::mint(string $chain, string $mint, string $dest, string $amount, array $opts, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:83::burn(string $chain, string $mint, string $amount, array $opts, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:92::airdrop(string $chain, string $mint, array $recipients, array $opts, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:101::quoteSwap(string $chain, array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:110::executeSwap(string $chain, array $execution, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:119::defineVesting(int $tokenId, array $schedules, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:128::vestingStatus(int $tokenId, array $filters = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:137::submitForListing(array $payload, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:146::topPerformers(array $filters = [], int $limit = 50)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:154::createToken(int $projectId, array $data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TokenService.php:166::createForProject(int $projectId, string $symbol, int $totalSupply, array $config)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SupportService.php:18::sendEmail(array $data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SupportService.php:45::sendToDiscord(string $channelKey, string $message)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SupportService.php:66::prepareCommonData(array $userAccount, array $siteSettings)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SupportService.php:91::sendConfirmationEmail(array $data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SupportService.php:109::sendSupportConfirmationEmail(array $data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SupportService.php:127::sendGeneralNotificationEmail(array $data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SupportService.php:142::recordFeedback(string $slug, bool $helpful, ?string $note = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DebtManagementService.php:13::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DebtManagementService.php:18::getUserDebtSummary($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DebtManagementService.php:23::calculateRepaymentOptions($userId, $debtId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DebtManagementService.php:36::trackDebtRepayment($userId, $debtId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DebtManagementService.php:41::generateDebtRepaymentPlan($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:18::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:48::getStockCandles(string $symbol, string $resolution, int $from, int $to)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:58::getAggregateIndicator(string $symbol, string $resolution)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:66::getBasicFinancials(string $symbol, string $metric = 'all')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:74::getCompanyEarnings(string $symbol, int $limit = 5)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:82::getEarningsEstimates(string $symbol, string $frequency = 'quarterly')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:90::getExecutives(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:97::getCompanyNews(string $symbol, string $from, string $to)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:106::getPeers(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:113::getCompanyProfile(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:120::getRevenueEstimates(string $symbol, string $frequency = 'quarterly')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:130::getFinancials(string $symbol, string $statement = 'bs', string $frequency = 'annual')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:139::getFinancialsReported(string $symbol, string $frequency = 'annual')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:147::getDividends(string $symbol, string $from, string $to)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:156::getIpoCalendar(string $from, string $to)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:166::getNewsSentiment(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:173::getPriceTarget(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:180::getRecommendationTrends(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:187::getSupportResistance(string $symbol, string $resolution)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:197::getCovidData()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:202::getEconomicData(string $indicator)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:209::getSocialSentiment(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:216::getPatternRecognition(string $symbol, string $resolution)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:224::getTranscripts(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:231::getTranscriptById(string $id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:238::getUpgradeDowngradeHistory(string $symbol, string $from, string $to)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:247::getOpenEstimates(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:255::getStockTick(string $symbol, string $date, int $limit, int $skip)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:265::getQuote(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:273::getIndicesConstituents(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:280::getIndicesHistoricalConstituents(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:288::getRevenueBreakdown(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:295::getEarningsCalendar(string $from, string $to, ?string $symbol = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:304::getPressReleases(string $symbol, string $from, string $to)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:313::getSimilarityIndex(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:320::getInvestmentThemes(string $theme)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:327::getSupplyChainRelationships(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:334::getInsiderTransactions(string $symbol, string $from, string $to)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:343::getInternationalFilings(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:350::getFilingsSentiment(string $id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:357::getCompanyEsgScore(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:364::getCompanyEarningsQualityScore(string $symbol, string $frequency = 'quarterly')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:372::getCompanyEbitdaEstimates(string $symbol, string $frequency = 'quarterly')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:380::getCompanyEbitEstimates(string $symbol, string $frequency = 'quarterly')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:389::getUsptoPatentData(string $symbol, string $from, string $to)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:398::getVisaApplicationData(string $symbol, string $from, string $to)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:408::symbolSearch(string $query)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:418::getStockSplits(string $symbol, string $from, string $to)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:454::getForexRates(string $currency)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:465::getEtfCountryExposure(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:476::getMutualFundCountryExposure(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/FinnhubService.php:487::getCryptoProfile(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ExchangeService.php:13::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ExchangeService.php:21::getExchanges()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RealEstateIngestService.php:8::queue(int $id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/RealEstateIngestService.php:10::runIngest(int $id)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/GooglePayService.php:16::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/GooglePayService.php:26::payViaGooglePay($cuID, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/OnboardingProgressService.php:13::__construct(?ConnectionInterface $db = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/OnboardingProgressService.php:18::ensureRecord(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/OnboardingProgressService.php:50::markVerifiedLogin(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/OnboardingProgressService.php:67::shouldTriggerWalkthrough(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/OnboardingProgressService.php:78::markWalkthroughStarted(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/OnboardingProgressService.php:91::markStep(int $userId, string $stage, string $step, bool $status = true)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/OnboardingProgressService.php:101::computeProgress(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/OnboardingProgressService.php:131::getSteps(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ApplePayService.php:14::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ApplePayService.php:24::payViaApplePay($cuID, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/GoalTrackingService.php:13::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/GoalTrackingService.php:19::createGoal($userId, $goalData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/GoalTrackingService.php:26::getUserGoals($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/GoalTrackingService.php:32::updateGoalProgress($userId, $goalId, $progress)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/GoalTrackingService.php:42::deleteGoal($goalId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/GoalTrackingService.php:48::evaluateGoals($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/GoalTrackingService.php:61::getGoalsByStatus($userId, $status)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/GoalTrackingService.php:67::getCompletedGoals($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/GoalTrackingService.php:73::getGoalsByCategory($userId, $category)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/GoalTrackingService.php:79::completeGoal($userId, $goalId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/GoalTrackingService.php:90::getPendingGoals($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PythonService.php:20::__construct($pythonPath = '/usr/bin/python3', $flaskUrl = 'http://127.0.0.1:5000')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PythonService.php:34::runScript($scriptPath, $args = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PythonService.php:55::callFlaskService($endpoint, $data = [], $method = 'POST')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PythonService.php:86::runScriptToFile($scriptPath, $outputFile, $args = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PythonService.php:112::readFileOutput($filePath)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PythonService.php:133::writeTempFile($data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PythonService.php:149::deleteTempFile($filePath)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PythonService.php:162::runFullProcess($scriptPath, $args = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PlaidService.php:22::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PlaidService.php:35::exchangePublicToken($public_token)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PlaidService.php:50::createLinkToken($user_id, $client_name)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PlaidService.php:71::getAccountInfo($accessToken)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PlaidService.php:83::getTransactions($accessToken, $startDate, $endDate)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PlaidService.php:95::getBalance($accessToken)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PlaidService.php:107::createACHTransfer($accessToken, $amount, $account_id, $recipientName)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PlaidService.php:131::getInstitutions($count = 10, $offset = 0)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PlaidService.php:143::setWebhook($accessToken, $webhookUrl)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/PlaidService.php:155::getInvestmentHoldings($accessToken)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BirdeyeService.php:9::__construct(?Birdeye $cfg = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BirdeyeService.php:45::price(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BirdeyeService.php:62::tokenInfo(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TechnicalSnapshotService.php:18::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TechnicalSnapshotService.php:30::getActiveAlertSymbols()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TechnicalSnapshotService.php:38::captureSnapshot(string $symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TechnicalSnapshotService.php:93::runDailySnapshot(array $symbols)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TransactionService.php:15::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TransactionService.php:21::logTransaction($type, $transactionID, $userID, $amount, $status)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TransactionService.php:40::getTransactionData($transactionID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TransactionService.php:46::completeDeposit($transactionID, $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TransactionService.php:64::reverseTransaction($transactionID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TransactionService.php:81::processBatchTransactions($transactions)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TransactionService.php:100::detectFraud($transactionID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TransactionService.php:132::getUserTransactionHistory($userID, $limit = 100, $offset = 0)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/TransactionService.php:141::validateTransaction($transactionID, $businessRules = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BitcoinService.php:9::__construct(?Bitcoin $cfg = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BitcoinService.php:37::isValidAddress(string $addr)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BitcoinService.php:42::getBalance(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BitcoinService.php:47::getUtxos(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BitcoinService.php:52::broadcast(string $rawHex)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BitcoinService.php:62::buildUnsignedPsbt(array $inputs, array $outputs, string $network = 'mainnet')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BitcoinService.php:72::broadcastRawTransaction(string $hex, string $network = 'mainnet')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MailChimpService.php:15::__construct()` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MailChimpService.php:22::addSubscriber($email, $firstName, $lastName)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MailChimpService.php:43::createCampaign($subject, $previewText, $fromName, $replyTo, $contentHtml)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MailChimpService.php:84::sendCampaign($campaignId)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BloggerService.php:6::composeAndGenerate(array $payload)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BloggerService.php:15::repurpose(array $block, string $channel)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EtherscanService.php:9::__construct(?Etherscan $cfg = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EtherscanService.php:41::gasPrice()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EtherscanService.php:53::txStatus(string $txhash)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:36::__construct(?int $userId = null)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:54::setUserId(?int $userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:156::normalizeBudgetRecord(array|BudgetRecord $record, ?int $userId = null)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:190::prepareAccountPayload(int $userId, array $input)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:231::resolveDesignatedDate(?string $rawDate)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:282::getInitialBankBalance(int $userId, ?string $asOf = null, ?int $accountId = null)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:310::normalizeDebtAccount(array|DebtAccount $debt)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:333::getRecentMonthlyAverages(int $userId, int $months = 3)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:372::summarizeCashFlow(iterable $records, array $debts = [], float $reserveRequirement = 0.0)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:426::projectDebtRepayment(array $debts, float $additionalPayment = 0.0, int $maxMonths = 600)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:532::buildForecast(int $userId, int $months, array $opt = [])` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:581::resolvePeriodWindow(?string $from = null, ?string $to = null)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:900::buildBudgetSummary(int $userId, array $options = [])` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:963::buildCreditBreakdown(int $userId, ?array $prefetchedAccounts = null)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1040::buildAvailableSnapshot(int $userId, array $options = [])` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1070::buildRepaymentSnapshot(int $userId, array $options = [])` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1148::buildCategoryVariance(int $userId, array $options = [])` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1230::addAccount($accountData)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1234::approveRecurringSchedule($accountID, $formData)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1285::bulkDelete($ids)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1290::bulkUpdateStatus($ids, $status)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1294::calculateDebtPayoff($totalDebt, $interestRate, $monthlyPayment)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1315::calculateDebtRepayment($totalDebt, $interestRate, $monthlyPayment)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1333::calculateForecastData($budgetData, $years)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1368::calculateMonthlyData($budgetData)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1396::calculateRepaymentSchedules($creditAccounts)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1457::calculateVariance($budgetData, $actualData)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1467::cancelAccount($accountId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1471::cancelSubaccount($accountId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1475::createSavingsGoal($userId, $goalName, $targetAmount, $targetDate)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1486::checkForOverspending($userId, $categoryBudgets)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1499::copyAccount($accountData)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1503::estimateTaxes($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1521::forecastBasedOnTrends($userId, $forecastPeriod)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1572::forecastRecurringSchedule($recurringSchedule, $designatedDate)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1678::generateRecurringSchedule($accountID, $intervals, $designatedDate, $netAmount, $grossAmount, $accountName, $accountType, $sourceType)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1886::getActiveUserBudgetRecords($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1892::getAvailableBalances($repaymentSchedules)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1900::getBudgetRecordsIsDebt($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1905::getCashFlowProjections($userId, $months = 12)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1922::getCompletedGoals($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1934::getCurrentBalances($creditAccounts)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1942::getDebtAccountSummary($cuID)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1953::getExpenseAccountSummary($cuID)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1965::getFinancialAnalysisData($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1969::getForecastDataForUser(int $userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1982::getFormattedTotalBalance($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1986::getIncomeAccountSummary($cuID)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:1998::getRecurringAccountDetails($userId, $accountId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2003::getRecurringAccountInfo($userId, $accountId = null)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2050::getRepaymentSummary($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2065::getSpendingByCategory($userId, $startDate, $endDate)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2078::getSourceRecords($userId, $budgetType)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2083::getThisMonthsIncome($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2088::getTotalAccountBalance($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2112::getTotalAvailableBalance($debtAccounts)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2131::getUserBankAccounts($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2136::getUserBudget($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2275::getUserBudgetRecord($cuID, $accountID)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2320::getUserBudgetRecords($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2324::getUserCreditAccounts($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2328::getUserRelatedBudgetRecords($userId, $accountName)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2333::getUserDebtAccounts($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2343::markAsPaid($accountID)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2396::markAsUnpaid($accountID)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2450::prepareAccountData($json, $userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2513::recordPayment($accountId, $amount, $isCredit = false)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2527::trackInvestmentGrowth($initialInvestment, $monthlyContribution, $growthRate, $years)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2547::updateAccount($accountId, $accountData)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2551::updateSavingsProgress($goalId, $amount)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2565::getUserFinancialSummary($userId)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2574::getMonthlySummary(int $userId, string $start, string $end)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/BudgetService.php:2588::getMonthlyTransactions(int $userId, string $start, string $end, ?string $type = null)` | budget | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/NotificationService.php:13::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/NotificationService.php:18::sendGoalCompletionNotification($userId, $goalId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/NotificationService.php:28::sendBudgetLimitAlert($userId, $budgetCategory)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/NotificationService.php:34::sendUpcomingPaymentReminder($userId, $paymentId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/NotificationService.php:40::sendMonthlySummary($userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DigiByteService.php:9::__construct(?DigiByte $cfg = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DigiByteService.php:41::isValidAddress(string $addr)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DigiByteService.php:46::getBalance(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DigiByteService.php:60::getUtxos(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DigiByteService.php:66::broadcast(string $rawHex)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MetaService.php:15::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MetaService.php:31::getSeoData($uri = null, ?string $pageName = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MetaService.php:132::getBySlugOrFallback(string $slug)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/MetaService.php:211::getStructuredData(array $seoData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EmailService.php:11::__construct()` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EmailService.php:16::getActiveLists()` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EmailService.php:22::getAvailableCampaigns()` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/EmailService.php:34::queueCampaignToList($campaignId, $listId)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DripCampaignService.php:14::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DripCampaignService.php:20::enrollUserInCampaign($userId, $triggerEvent)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DripCampaignService.php:48::processDueEmails()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DripCampaignService.php:60::processSpecificUserDrip($userId, $campaignId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DripCampaignService.php:128::scheduleDripEmailForUser(array $emailData)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/DripCampaignService.php:160::sendDripEmail($userId, $campaignId, $step)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:31::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:63::getBalance(string $address, ?string $mint = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:76::transfer(string $from, string $to, string $amount, array $opts = [])` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:81::getQuote(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:88::swap(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:95::getPrice(string $symbolOrMint)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:103::createToken(array $spec)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:108::mintTo(string $mint, string $dest, string $amount)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:113::getBalanceLamports(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:125::getTokenAccounts(string $owner)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:162::getSolanaTokens(?string $address = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:176::getNetworkStatus()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:230::getSolanaData(string $address)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:287::getSolanaPrice()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:414::generateAddressForUser(int $userId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:446::generateNewKeypair()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:521::b58encodeFromBinary(string $bin)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:554::isValidPublicKey(string $addr)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:560::normalizeAddress($maybe)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:626::getSignaturesForAddress(string $address, int $limit = 100)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:705::isNetworkDegraded()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SolanaService.php:728::getSafeNetworkStatus()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:31::createProject(array $data, int $ownerId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:40::updateProject(int $projectId, array $patch, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:49::archiveProject(int $projectId, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:58::getProject(int $projectId, ?int $actorId = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:67::listProjects(array $filters, ?int $actorId = null, int $page = 1, int $perPage = 25)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:76::addMilestone(int $projectId, array $milestone, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:85::completeMilestone(int $projectId, int $milestoneId, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:94::addTask(int $projectId, array $task, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:103::updateTask(int $projectId, int $taskId, array $patch, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:112::attachWallet(int $projectId, string $chain, string $address, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:121::primaryWallet(int $projectId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:130::fundingStatus(int $projectId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:139::provisionProjectToken(int $projectId, array $spec, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:148::tokenDistribution(int $projectId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:157::generateLaunchCampaign(int $projectId, array $inputs, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:166::publishUpdates(int $projectId, array $updates, int $actorId, ?string $idempotencyKey = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:175::analytics(int $projectId, array $range)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:186::createAsset(int $projectId, array $data)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/ProjectsService.php:201::getAssets(int $projectId)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SearchRotationService.php:9::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SearchRotationService.php:14::getTopLinks(string $keyword)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/SearchRotationService.php:53::scheduleEnrichmentForKeywords()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WeeklyStreamService.php:17::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WeeklyStreamService.php:24::generateWeeklyWatchlistSnapshot(?string $weekStartDate = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/WeeklyStreamService.php:96::getDefaultWeekStart()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/APIs/AlphaVantageService.php:29::makeAlphaVantageAPICall($params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/APIs/AlphaVantageService.php:65::getStockData($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/APIs/AlphaVantageService.php:72::getCryptoData($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/APIs/AlphaVantageService.php:79::getForexData($fromCurrency, $toCurrency)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/APIs/AlphaVantageService.php:86::getMutualFundData($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/APIs/AlphaVantageService.php:93::getETFs($symbol)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/APIs/AlphaVantageService.php:99::searchSymbols($keywords)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/Marketing/EmailMarketingService.php:17::__construct()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/Marketing/EmailMarketingService.php:27::processPdfContent($file)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/Marketing/EmailMarketingService.php:42::createCampaign(array $data)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/Marketing/EmailMarketingService.php:48::scheduleCampaign(int $campaignId, string $datetime)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/Marketing/EmailMarketingService.php:55::queueEmail(int $campaignId, string $subject, string $content)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/Marketing/EmailMarketingService.php:72::processQueue()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/Marketing/EmailMarketingService.php:99::trackEmailOpen(int $emailId)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/Marketing/EmailMarketingService.php:105::getTemplates()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Services/Marketing/EmailMarketingService.php:111::saveTemplate(array $data)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/TestEmail.php:14::run(array $params)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/LogSummarize.php:19::run(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/DiscordList.php:13::run(array $params)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/RevenueStreamsScan.php:39::run(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/OpsWork.php:31::run(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/OpsFetchCommands.php:28::run(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/MailSend.php:16::run(array $params)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/DiscordTest.php:13::run(array $params)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/DiscordProcessQueue.php:14::run(array $params)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/ContentIngestSample.php:20::run(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/DiscordTestLiquidity.php:13::run(array $params)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/WalletsWarmSummaryCache.php:19::run(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/AiOpsSeed.php:16::run(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/ContentEngineSmoke.php:21::run(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/CodexReview.php:14::run(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/GapTrackerSync.php:18::run(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/MailTest.php:14::run(array $params)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/LogHealthcheck.php:16::run(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/OpsAnalyzeCommands.php:29::run(array $params)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Commands/DiscordWireCheck.php:15::run(array $params)` | integrations | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/Marketing_New/Libraries/WebScraper.php:13::__construct()` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/Marketing_New/Libraries/WebScraper.php:18::scrapeWebsite($url)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/Marketing_New/Libraries/ContentGenerator.php:7::generateBlogPost($data)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/Marketing_New/Libraries/ContentGenerator.php:16::generateFromEmail($email)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/Marketing_New/Libraries/ContentGenerator.php:25::generateSocialMediaContent($data)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/Marketing_New/Libraries/ContentGenerator.php:44::generateNotifications($data)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/Marketing_New/Libraries/HtmlFormatter.php:6::format($html)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/Marketing_New/Libraries/HtmlFormatter.php:26::formatHTMLToBootstrap($html)` | marketing | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/User/Libraries/DashboardLibrary.php:14::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/User/Libraries/DashboardLibrary.php:20::getDashboardInfo($cuID)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/ScriptStudio/Libraries/ScriptEngine.php:6::convertToPineScript(string $code)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/ScriptStudio/Libraries/ScriptEngine.php:16::convertToThinkScript(string $code)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/ScriptStudio/Libraries/ScriptEngine.php:28::buildEmulatedCode(?string $language, ?string $code)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/ScriptStudio/Libraries/ScriptEngine.php:40::normalizeTags(string|array|null $tags)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/ScriptStudio/Libraries/ScriptEngine.php:65::tagsToArray(string|array|null $tags)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/ScriptStudio/Libraries/ScriptEngine.php:83::tagsToString(string|array|null $tags)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/ScriptStudio/Libraries/ScriptEngine.php:88::renderMarkdown(?string $markdown)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/AIOps/Services/AIOpsGuardrailService.php:30::__construct()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/AIOps/Services/AIOpsGuardrailService.php:43::tablesAvailable()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/AIOps/Services/AIOpsGuardrailService.php:63::validateRecord(?string $title, ?string $content)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/AIOps/Services/AIOpsGuardrailService.php:75::hashContent(string $title, string $content, string $sourceType = '', string $sourceId = '')` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/AIOps/Services/AIOpsGuardrailService.php:82::generateCacheKey(string $scope, string $contentHash)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/AIOps/Services/AIOpsGuardrailService.php:87::getTodayBudgetSummary()` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/AIOps/Services/AIOpsGuardrailService.php:120::isHardStopReached(array $budget)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/AIOps/Services/AIOpsGuardrailService.php:127::maybeSend80PercentAlert(array $budget, ?string $subsystem = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/AIOps/Services/AIOpsGuardrailService.php:165::checkCache(string $cacheKey)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/AIOps/Services/AIOpsGuardrailService.php:170::storeCache(string $cacheKey, string $scope, string $sourceHash, array $payload, ?int $ttlSeconds = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/AIOps/Services/AIOpsGuardrailService.php:191::checkDedupe(string $hash)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/AIOps/Services/AIOpsGuardrailService.php:196::touchDedupe(string $hash, string $sourceType, $sourceId = null)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/AIOps/Services/AIOpsGuardrailService.php:220::checkWorkflowBudget(?string $workflowId, ?string $workflowSlug, ?float $estimatedCost)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |
| `app/Modules/AIOps/Services/AIOpsGuardrailService.php:252::logUsage(array $payload)` | system | service | Smoke | unknown | N | - | No fatal errors | Planned |

## Integrations (Targeted Checks)

| Integration | Domain | Type | Method | Side effects | Dry-run | Required env keys | Expected output | Status |
| --- | --- | --- | --- | --- | --- | --- | --- | --- |
| AlphaVantage | integrations | integration | Contract | none | Y | `ALPHA_VANTAGE_API_KEYS` | JSON payload or rate-limit notice | Planned |
| MarketAux | integrations | integration | Contract | none | Y | `MARKETAUX_API_KEY` | JSON payload | Planned |
| Solana RPC | integrations | integration | Smoke | none | Y | `SOLANA_RPC_PRIMARY` | Slot/version or error | Planned |
| Discord Webhook | integrations | integration | Smoke | yes | Y | webhook URL | 200/204 response | Planned |
| Zapier Webhook | integrations | integration | Smoke | yes | Y | `ZAPIER_APPROVED_WEBHOOK` | 2xx response | Planned |
| SMTP | integrations | integration | Smoke | yes | Y | `mail.provider` / SMTP config | ok or error | Planned |