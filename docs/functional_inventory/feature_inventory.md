# MyMI Wallet – Functionality Inventory

This document lists all known functionality in the MyMI Wallet CI4 application, grouped by module and route.

## Legend

- **Category**: Public, User Dashboard, Admin / Management, API / Backend, Auth / Onboarding, Support / Help
- **Status**: active, legacy, cron-only, experimental

---

## APIs Module

### API

- [ ] **API – Api**
  - **Route**: `/API`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\APIController::index`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API` via App\Modules\APIs\Controllers\APIController::index, providing backend data/services for API consumers.

- [ ] **API – Api**
  - **Route**: `/API`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\APIController::index`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API` via App\Modules\APIs\Controllers\APIController::index, providing backend data/services for API consumers.

- [ ] **API – Fetch Active Trade**
  - **Route**: `/API/Investments/fetchActiveTrades/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\API::fetchActiveTrade`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Investments/fetchActiveTrades/(:any)` via App\Modules\APIs\Controllers\API::fetchActiveTrade, providing backend data/services for API consumers.

- [ ] **API – Fetch Real Time Data**
  - **Route**: `/API/Investments/fetchRealTimeData/(:any)/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\API::fetchRealTimeData`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Investments/fetchRealTimeData/(:any)/(:any)` via App\Modules\APIs\Controllers\API::fetchRealTimeData, providing backend data/services for API consumers.

- [ ] **API – Get Symbols By Trade Type**
  - **Route**: `/API/Investments/getSymbolsByTradeType/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\API::getSymbolsByTradeType`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Investments/getSymbolsByTradeType/(:any)` via App\Modules\APIs\Controllers\API::getSymbolsByTradeType, providing backend data/services for API consumers.

- [ ] **API – Get Symbols By Trade Type**
  - **Route**: `/API/Investments/getSymbolsByTradeType/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\APIController::getSymbolsByTradeType`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Investments/getSymbolsByTradeType/(:segment)` via App\Modules\APIs\Controllers\APIController::getSymbolsByTradeType, providing backend data/services for API consumers.

- [ ] **API – Status**
  - **Route**: `/API/Status`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\APIController::status`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Status` via App\Modules\APIs\Controllers\APIController::status, providing backend data/services for API consumers.

- [ ] **API – Status**
  - **Route**: `/API/Status/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\APIController::status`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Status/(:segment)` via App\Modules\APIs\Controllers\APIController::status, providing backend data/services for API consumers.

### Alerts

- [ ] **Alerts – Generate Advisor Media From Alert**
  - **Route**: `/API/Alerts/API/Alerts/generateAdvisorMediaFromAlert`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::generateAdvisorMediaFromAlert`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Alerts/API/Alerts/generateAdvisorMediaFromAlert` via App\Modules\APIs\Controllers\AlertsController::generateAdvisorMediaFromAlert, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Generate Advisor Media From Alert**
  - **Route**: `/API/Alerts/API/Alerts/generateAdvisorMediaFromAlert/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::generateAdvisorMediaFromAlert`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Alerts/API/Alerts/generateAdvisorMediaFromAlert/(:num)` via App\Modules\APIs\Controllers\AlertsController::generateAdvisorMediaFromAlert, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Add Trade Alert**
  - **Route**: `/API/Alerts/addTradeAlert`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::addTradeAlert`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/addTradeAlert` via App\Modules\APIs\Controllers\AlertsController::addTradeAlert, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Backfill Categories**
  - **Route**: `/API/Alerts/backfillCategories`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::backfillCategories`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/backfillCategories` via App\Modules\APIs\Controllers\AlertsController::backfillCategories, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Add Trade Alert**
  - **Route**: `/API/Alerts/createTradeAlert`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::addTradeAlert`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/createTradeAlert` via App\Modules\APIs\Controllers\AlertsController::addTradeAlert, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Add Trade Alert**
  - **Route**: `/API/Alerts/createTradeAlert/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::addTradeAlert`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/createTradeAlert/(:segment)` via App\Modules\APIs\Controllers\AlertsController::addTradeAlert, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Fetch Auto Generated Analysis**
  - **Route**: `/API/Alerts/fetchAutoGeneratedAnalysis`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::fetchAutoGeneratedAnalysis`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/fetchAutoGeneratedAnalysis` via App\Modules\APIs\Controllers\AlertsController::fetchAutoGeneratedAnalysis, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Fetch Email Alerts**
  - **Route**: `/API/Alerts/fetchEmailAlerts`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::fetchEmailAlerts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/fetchEmailAlerts` via App\Modules\APIs\Controllers\AlertsController::fetchEmailAlerts, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Fetch Market Aux News**
  - **Route**: `/API/Alerts/fetchMarketAuxNews/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::fetchMarketAuxNews`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/fetchMarketAuxNews/(:segment)` via App\Modules\APIs\Controllers\AlertsController::fetchMarketAuxNews, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Force Fetch Emails**
  - **Route**: `/API/Alerts/forceFetchEmails`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::forceFetchEmails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/forceFetchEmails` via App\Modules\APIs\Controllers\AlertsController::forceFetchEmails, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Force Fetch Tickers**
  - **Route**: `/API/Alerts/forceFetchTickers`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::forceFetchTickers`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/forceFetchTickers` via App\Modules\APIs\Controllers\AlertsController::forceFetchTickers, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Gen Keys**
  - **Route**: `/API/Alerts/gen-keys`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::genKeys`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/gen-keys` via App\Modules\APIs\Controllers\AlertsController::genKeys, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Generate And Store Voiceover**
  - **Route**: `/API/Alerts/generateAndStoreVoiceover`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::generateAndStoreVoiceover`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/generateAndStoreVoiceover` via App\Modules\APIs\Controllers\AlertsController::generateAndStoreVoiceover, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Generate Now**
  - **Route**: `/API/Alerts/generateNow`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::generateNow`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/generateNow` via App\Modules\APIs\Controllers\AlertsController::generateNow, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Generate Social Media Posts**
  - **Route**: `/API/Alerts/generateSocialMediaPosts`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::generateSocialMediaPosts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/generateSocialMediaPosts` via App\Modules\APIs\Controllers\AlertsController::generateSocialMediaPosts, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Generate Trade Alert Summary**
  - **Route**: `/API/Alerts/generateTradeAlertSummary`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::generateTradeAlertSummary`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/generateTradeAlertSummary` via App\Modules\APIs\Controllers\AlertsController::generateTradeAlertSummary, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Generate Voiceover And Marketing Content**
  - **Route**: `/API/Alerts/generateVoiceoverAndMarketingContent`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::generateVoiceoverAndMarketingContent`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/generateVoiceoverAndMarketingContent` via App\Modules\APIs\Controllers\AlertsController::generateVoiceoverAndMarketingContent, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Generate Voiceover Script**
  - **Route**: `/API/Alerts/generateVoiceoverScript`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::generateVoiceoverScript`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/generateVoiceoverScript` via App\Modules\APIs\Controllers\AlertsController::generateVoiceoverScript, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Get Ema Comparison**
  - **Route**: `/API/Alerts/getEmaComparison/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::getEmaComparison`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/getEmaComparison/(:segment)` via App\Modules\APIs\Controllers\AlertsController::getEmaComparison, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Get Filtered Alerts**
  - **Route**: `/API/Alerts/getFilteredAlerts`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::getFilteredAlerts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/getFilteredAlerts` via App\Modules\APIs\Controllers\AlertsController::getFilteredAlerts, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Get Full Metrics**
  - **Route**: `/API/Alerts/getFullMetrics`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::getFullMetrics`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/getFullMetrics` via App\Modules\APIs\Controllers\AlertsController::getFullMetrics, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Get Latest Prices**
  - **Route**: `/API/Alerts/getLatestPrices`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::getLatestPrices`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/getLatestPrices` via App\Modules\APIs\Controllers\AlertsController::getLatestPrices, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Get Technical Indicators**
  - **Route**: `/API/Alerts/getTechnicalIndicators`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::getTechnicalIndicators`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/getTechnicalIndicators` via App\Modules\APIs\Controllers\AlertsController::getTechnicalIndicators, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Get Trade Alert Details**
  - **Route**: `/API/Alerts/getTradeAlertDetails`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::getTradeAlertDetails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/getTradeAlertDetails` via App\Modules\APIs\Controllers\AlertsController::getTradeAlertDetails, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Hide Trade Alert**
  - **Route**: `/API/Alerts/hideTradeAlert`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::hideTradeAlert`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/hideTradeAlert` via App\Modules\APIs\Controllers\AlertsController::hideTradeAlert, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Manage Trade Alert**
  - **Route**: `/API/Alerts/manageTradeAlert`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::manageTradeAlert`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/manageTradeAlert` via App\Modules\APIs\Controllers\AlertsController::manageTradeAlert, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Mark Alert As Sent And Send Email**
  - **Route**: `/API/Alerts/markAlertAsSentAndSendEmail/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::markAlertAsSentAndSendEmail`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/markAlertAsSentAndSendEmail/(:segment)` via App\Modules\APIs\Controllers\AlertsController::markAlertAsSentAndSendEmail, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Post Marketing Content To Socials**
  - **Route**: `/API/Alerts/postMarketingContentToSocials`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::postMarketingContentToSocials`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/postMarketingContentToSocials` via App\Modules\APIs\Controllers\AlertsController::postMarketingContentToSocials, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Process Alerts**
  - **Route**: `/API/Alerts/processAlerts`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::processAlerts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/processAlerts` via App\Modules\APIs\Controllers\AlertsController::processAlerts, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Process Email Alerts**
  - **Route**: `/API/Alerts/processEmailAlerts`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::processEmailAlerts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/processEmailAlerts` via App\Modules\APIs\Controllers\AlertsController::processEmailAlerts, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Process Trade Alerts**
  - **Route**: `/API/Alerts/processTradeAlerts`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::processTradeAlerts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/processTradeAlerts` via App\Modules\APIs\Controllers\AlertsController::processTradeAlerts, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Process Trade Batch**
  - **Route**: `/API/Alerts/processTradeBatch`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::processTradeBatch`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/processTradeBatch` via App\Modules\APIs\Controllers\AlertsController::processTradeBatch, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Send Alert**
  - **Route**: `/API/Alerts/sendAlert`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::sendAlert`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/sendAlert` via App\Modules\APIs\Controllers\AlertsController::sendAlert, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Send Discord Alerts**
  - **Route**: `/API/Alerts/sendDiscordAlerts`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::sendDiscordAlerts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/sendDiscordAlerts` via App\Modules\APIs\Controllers\AlertsController::sendDiscordAlerts, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Send Discord Alerts By Symbol**
  - **Route**: `/API/Alerts/sendDiscordAlertsBySymbol/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::sendDiscordAlertsBySymbol`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/sendDiscordAlertsBySymbol/(:segment)` via App\Modules\APIs\Controllers\AlertsController::sendDiscordAlertsBySymbol, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Sign**
  - **Route**: `/API/Alerts/sign`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::sign`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/sign` via App\Modules\APIs\Controllers\AlertsController::sign, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Store Marketing Content**
  - **Route**: `/API/Alerts/storeMarketingContent`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::storeMarketingContent`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/storeMarketingContent` via App\Modules\APIs\Controllers\AlertsController::storeMarketingContent, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Submit Trade Alert**
  - **Route**: `/API/Alerts/submitTradeAlert`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::submitTradeAlert`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/submitTradeAlert` via App\Modules\APIs\Controllers\AlertsController::submitTradeAlert, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Update Batch Prices**
  - **Route**: `/API/Alerts/updateBatchPrices`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::updateBatchPrices`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/updateBatchPrices` via App\Modules\APIs\Controllers\AlertsController::updateBatchPrices, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Update Chart Override**
  - **Route**: `/API/Alerts/updateChartOverride`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::updateChartOverride`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/updateChartOverride` via App\Modules\APIs\Controllers\AlertsController::updateChartOverride, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Update Exchange**
  - **Route**: `/API/Alerts/updateExchange`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::updateExchange`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/updateExchange` via App\Modules\APIs\Controllers\AlertsController::updateExchange, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Update Status**
  - **Route**: `/API/Alerts/updateStatus/(:num)/(:any)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::updateStatus`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/updateStatus/(:num)/(:any)` via App\Modules\APIs\Controllers\AlertsController::updateStatus, providing backend data/services for Alerts consumers.

- [ ] **Alerts – Update Trade Alerts**
  - **Route**: `/API/Alerts/updateTradeAlerts`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\AlertsController::updateTradeAlerts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Alerts/updateTradeAlerts` via App\Modules\APIs\Controllers\AlertsController::updateTradeAlerts, providing backend data/services for Alerts consumers.

### Auctions

- [ ] **Auctions – Refund Escrow**
  - **Route**: `/API/Auctions/escrow/refund/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\AuctionsController::refundEscrow`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Auctions/escrow/refund/(:num)` via App\Modules\APIs\Controllers\AuctionsController::refundEscrow, providing backend data/services for Auctions consumers.

- [ ] **Auctions – Release Escrow**
  - **Route**: `/API/Auctions/escrow/release/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\AuctionsController::releaseEscrow`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Auctions/escrow/release/(:num)` via App\Modules\APIs\Controllers\AuctionsController::releaseEscrow, providing backend data/services for Auctions consumers.

- [ ] **Auctions – Compute Fmv**
  - **Route**: `/API/Auctions/fmv`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\AuctionsController::computeFMV`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Auctions/fmv` via App\Modules\APIs\Controllers\AuctionsController::computeFMV, providing backend data/services for Auctions consumers.

- [ ] **Auctions – Settle**
  - **Route**: `/API/Auctions/settle/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\AuctionsController::settle`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Auctions/settle/(:num)` via App\Modules\APIs\Controllers\AuctionsController::settle, providing backend data/services for Auctions consumers.

- [ ] **Auctions – Top Up**
  - **Route**: `/API/Auctions/topup`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\AuctionsController::topUp`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Auctions/topup` via App\Modules\APIs\Controllers\AuctionsController::topUp, providing backend data/services for Auctions consumers.

### Bitcoin

- [ ] **Bitcoin – Broadcast Signed Tx**
  - **Route**: `/API/Bitcoin/broadcastSignedTx`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\BitcoinController::broadcastSignedTx`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Bitcoin/broadcastSignedTx` via App\Modules\APIs\Controllers\BitcoinController::broadcastSignedTx, providing backend data/services for Bitcoin consumers.

- [ ] **Bitcoin – Build Unsigned Psbt**
  - **Route**: `/API/Bitcoin/buildUnsignedPsbt`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\BitcoinController::buildUnsignedPsbt`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Bitcoin/buildUnsignedPsbt` via App\Modules\APIs\Controllers\BitcoinController::buildUnsignedPsbt, providing backend data/services for Bitcoin consumers.

### Broker

- [ ] **Broker – Add Linked Account**
  - **Route**: `/API/Broker/add-linked-account`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::addLinkedAccount`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/add-linked-account` via App\Modules\APIs\Controllers\BrokerController::addLinkedAccount, providing backend data/services for Broker consumers.

- [ ] **Broker – Available**
  - **Route**: `/API/Broker/available`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::available`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/available` via App\Modules\APIs\Controllers\BrokerController::available, providing backend data/services for Broker consumers.

- [ ] **Broker – Categories**
  - **Route**: `/API/Broker/categories`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::categories`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/categories` via App\Modules\APIs\Controllers\BrokerController::categories, providing backend data/services for Broker consumers.

- [ ] **Broker – Credit**
  - **Route**: `/API/Broker/credit`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::credit`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/credit` via App\Modules\APIs\Controllers\BrokerController::credit, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Accounts**
  - **Route**: `/API/Broker/fetchPlaidAccounts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidAccounts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidAccounts` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidAccounts, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Accounts**
  - **Route**: `/API/Broker/fetchPlaidAccounts/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidAccounts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidAccounts/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidAccounts, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Balances**
  - **Route**: `/API/Broker/fetchPlaidBalances`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidBalances`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidBalances` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidBalances, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Balances**
  - **Route**: `/API/Broker/fetchPlaidBalances`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidBalances`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidBalances` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidBalances, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Balances**
  - **Route**: `/API/Broker/fetchPlaidBalances/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidBalances`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidBalances/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidBalances, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Balances**
  - **Route**: `/API/Broker/fetchPlaidBalances/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidBalances`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidBalances/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidBalances, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Holdings**
  - **Route**: `/API/Broker/fetchPlaidHoldings`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidHoldings`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidHoldings` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidHoldings, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Holdings**
  - **Route**: `/API/Broker/fetchPlaidHoldings`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidHoldings`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidHoldings` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidHoldings, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Holdings**
  - **Route**: `/API/Broker/fetchPlaidHoldings/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidHoldings`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidHoldings/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidHoldings, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Holdings**
  - **Route**: `/API/Broker/fetchPlaidHoldings/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidHoldings`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidHoldings/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidHoldings, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Identity**
  - **Route**: `/API/Broker/fetchPlaidIdentity`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidIdentity`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidIdentity` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidIdentity, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Identity**
  - **Route**: `/API/Broker/fetchPlaidIdentity`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidIdentity`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidIdentity` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidIdentity, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Identity**
  - **Route**: `/API/Broker/fetchPlaidIdentity/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidIdentity`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidIdentity/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidIdentity, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Identity**
  - **Route**: `/API/Broker/fetchPlaidIdentity/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidIdentity`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidIdentity/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidIdentity, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Income**
  - **Route**: `/API/Broker/fetchPlaidIncome`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidIncome`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidIncome` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidIncome, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Income**
  - **Route**: `/API/Broker/fetchPlaidIncome`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidIncome`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidIncome` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidIncome, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Income**
  - **Route**: `/API/Broker/fetchPlaidIncome/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidIncome`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidIncome/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidIncome, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Income**
  - **Route**: `/API/Broker/fetchPlaidIncome/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidIncome`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidIncome/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidIncome, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Investments**
  - **Route**: `/API/Broker/fetchPlaidInvestments`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidInvestments`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidInvestments` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidInvestments, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Investments**
  - **Route**: `/API/Broker/fetchPlaidInvestments`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidInvestments`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidInvestments` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidInvestments, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Investments**
  - **Route**: `/API/Broker/fetchPlaidInvestments/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidInvestments`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidInvestments/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidInvestments, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Investments**
  - **Route**: `/API/Broker/fetchPlaidInvestments/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidInvestments`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidInvestments/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidInvestments, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Liabilities**
  - **Route**: `/API/Broker/fetchPlaidLiabilities`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidLiabilities`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidLiabilities` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidLiabilities, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Liabilities**
  - **Route**: `/API/Broker/fetchPlaidLiabilities`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidLiabilities`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidLiabilities` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidLiabilities, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Liabilities**
  - **Route**: `/API/Broker/fetchPlaidLiabilities/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidLiabilities`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidLiabilities/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidLiabilities, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Liabilities**
  - **Route**: `/API/Broker/fetchPlaidLiabilities/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidLiabilities`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidLiabilities/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidLiabilities, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Link Token**
  - **Route**: `/API/Broker/fetchPlaidLinkToken`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidLinkToken`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidLinkToken` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidLinkToken, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Link Token**
  - **Route**: `/API/Broker/fetchPlaidLinkToken/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidLinkToken`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidLinkToken/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidLinkToken, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Transactions**
  - **Route**: `/API/Broker/fetchPlaidTransactions`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidTransactions`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidTransactions` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidTransactions, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Transactions**
  - **Route**: `/API/Broker/fetchPlaidTransactions`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidTransactions`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidTransactions` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidTransactions, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Transactions**
  - **Route**: `/API/Broker/fetchPlaidTransactions/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidTransactions`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidTransactions/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidTransactions, providing backend data/services for Broker consumers.

- [ ] **Broker – Fetch Plaid Transactions**
  - **Route**: `/API/Broker/fetchPlaidTransactions/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::fetchPlaidTransactions`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchPlaidTransactions/(:segment)` via App\Modules\APIs\Controllers\BrokerController::fetchPlaidTransactions, providing backend data/services for Broker consumers.

- [ ] **Broker – Goals**
  - **Route**: `/API/Broker/goals`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::goals`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/goals` via App\Modules\APIs\Controllers\BrokerController::goals, providing backend data/services for Broker consumers.

- [ ] **Broker – Insights**
  - **Route**: `/API/Broker/insights`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::insights`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/insights` via App\Modules\APIs\Controllers\BrokerController::insights, providing backend data/services for Broker consumers.

- [ ] **Broker – Investment Accounts**
  - **Route**: `/API/Broker/investment-accounts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::investmentAccounts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/investment-accounts` via App\Modules\APIs\Controllers\BrokerController::investmentAccounts, providing backend data/services for Broker consumers.

- [ ] **Broker – Link Plaid Account**
  - **Route**: `/API/Broker/linkPlaidAccount`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::linkPlaidAccount`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Broker/linkPlaidAccount` via App\Modules\APIs\Controllers\BrokerController::linkPlaidAccount, providing backend data/services for Broker consumers.

- [ ] **Broker – Linked Accounts**
  - **Route**: `/API/Broker/linked-accounts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::linkedAccounts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/linked-accounts` via App\Modules\APIs\Controllers\BrokerController::linkedAccounts, providing backend data/services for Broker consumers.

- [ ] **Broker – Refresh Linked Account**
  - **Route**: `/API/Broker/refresh-linked-account/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::refreshLinkedAccount`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/refresh-linked-account/(:segment)` via App\Modules\APIs\Controllers\BrokerController::refreshLinkedAccount, providing backend data/services for Broker consumers.

- [ ] **Broker – Refresh Plaid Account**
  - **Route**: `/API/Broker/refreshPlaidAccount/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::refreshPlaidAccount`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/refreshPlaidAccount/(:segment)` via App\Modules\APIs\Controllers\BrokerController::refreshPlaidAccount, providing backend data/services for Broker consumers.

- [ ] **Broker – Remove Linked Account**
  - **Route**: `/API/Broker/remove-linked-account/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::removeLinkedAccount`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/remove-linked-account/(:segment)` via App\Modules\APIs\Controllers\BrokerController::removeLinkedAccount, providing backend data/services for Broker consumers.

- [ ] **Broker – Repayment**
  - **Route**: `/API/Broker/repayment`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::repayment`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/repayment` via App\Modules\APIs\Controllers\BrokerController::repayment, providing backend data/services for Broker consumers.

- [ ] **Broker – Savings Goals**
  - **Route**: `/API/Broker/savings-goals`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::savingsGoals`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/savings-goals` via App\Modules\APIs\Controllers\BrokerController::savingsGoals, providing backend data/services for Broker consumers.

- [ ] **Broker – Summary**
  - **Route**: `/API/Broker/summary`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::summary`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/summary` via App\Modules\APIs\Controllers\BrokerController::summary, providing backend data/services for Broker consumers.

- [ ] **Broker – Transactions**
  - **Route**: `/API/Broker/transactions`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::transactions`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/transactions` via App\Modules\APIs\Controllers\BrokerController::transactions, providing backend data/services for Broker consumers.

- [ ] **Broker – Unlink Plaid Account**
  - **Route**: `/API/Broker/unlinkPlaidAccount/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BrokerController::unlinkPlaidAccount`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/unlinkPlaidAccount/(:segment)` via App\Modules\APIs\Controllers\BrokerController::unlinkPlaidAccount, providing backend data/services for Broker consumers.

### Budget

- [ ] **Budget – Budgets**
  - **Route**: `/API/Broker/budgets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::budgets`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/budgets` via App\Modules\APIs\Controllers\BudgetController::budgets, providing backend data/services for Budget consumers.

- [ ] **Budget – Cash Flow**
  - **Route**: `/API/Broker/cash-flow`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::cashFlow`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/cash-flow` via App\Modules\APIs\Controllers\BudgetController::cashFlow, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Achrelationships**
  - **Route**: `/API/Broker/fetchRobinhoodACHRelationships`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodACHRelationships`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodACHRelationships` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodACHRelationships, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Achrelationships**
  - **Route**: `/API/Broker/fetchRobinhoodACHRelationships/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodACHRelationships`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodACHRelationships/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodACHRelationships, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Account Details**
  - **Route**: `/API/Broker/fetchRobinhoodAccountDetails/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodAccountDetails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodAccountDetails/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodAccountDetails, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Accounts**
  - **Route**: `/API/Broker/fetchRobinhoodAccounts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodAccounts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodAccounts` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodAccounts, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Crypto Order Details**
  - **Route**: `/API/Broker/fetchRobinhoodCrypto  OrderDetails/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoOrderDetails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodCrypto  OrderDetails/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoOrderDetails, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Crypto Accounts**
  - **Route**: `/API/Broker/fetchRobinhoodCryptoAccounts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoAccounts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodCryptoAccounts` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoAccounts, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Crypto Accounts**
  - **Route**: `/API/Broker/fetchRobinhoodCryptoAccounts/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoAccounts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodCryptoAccounts/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoAccounts, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Crypto Order Details**
  - **Route**: `/API/Broker/fetchRobinhoodCryptoOrderDetails`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoOrderDetails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodCryptoOrderDetails` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoOrderDetails, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Crypto Orders**
  - **Route**: `/API/Broker/fetchRobinhoodCryptoOrders`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoOrders`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodCryptoOrders` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoOrders, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Crypto Orders**
  - **Route**: `/API/Broker/fetchRobinhoodCryptoOrders/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoOrders`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodCryptoOrders/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoOrders, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Crypto Portfolio**
  - **Route**: `/API/Broker/fetchRobinhoodCryptoPortfolio`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoPortfolio`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodCryptoPortfolio` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoPortfolio, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Crypto Portfolio**
  - **Route**: `/API/Broker/fetchRobinhoodCryptoPortfolio/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoPortfolio`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodCryptoPortfolio/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoPortfolio, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Crypto Positions**
  - **Route**: `/API/Broker/fetchRobinhoodCryptoPositions`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoPositions`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodCryptoPositions` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoPositions, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Crypto Positions**
  - **Route**: `/API/Broker/fetchRobinhoodCryptoPositions/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoPositions`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodCryptoPositions/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoPositions, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Crypto Quotes**
  - **Route**: `/API/Broker/fetchRobinhoodCryptoQuotes`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoQuotes`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodCryptoQuotes` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoQuotes, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Crypto Quotes**
  - **Route**: `/API/Broker/fetchRobinhoodCryptoQuotes/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoQuotes`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodCryptoQuotes/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoQuotes, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Crypto Transactions**
  - **Route**: `/API/Broker/fetchRobinhoodCryptoTransactions`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoTransactions`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodCryptoTransactions` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoTransactions, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Crypto Transactions**
  - **Route**: `/API/Broker/fetchRobinhoodCryptoTransactions/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoTransactions`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodCryptoTransactions/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodCryptoTransactions, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Dividends**
  - **Route**: `/API/Broker/fetchRobinhoodDividends`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodDividends`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodDividends` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodDividends, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Dividends**
  - **Route**: `/API/Broker/fetchRobinhoodDividends/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodDividends`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodDividends/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodDividends, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Instruments**
  - **Route**: `/API/Broker/fetchRobinhoodInstruments`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodInstruments`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodInstruments` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodInstruments, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Instruments**
  - **Route**: `/API/Broker/fetchRobinhoodInstruments/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodInstruments`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodInstruments/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodInstruments, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Notifications**
  - **Route**: `/API/Broker/fetchRobinhoodNotifications`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodNotifications`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodNotifications` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodNotifications, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Notifications**
  - **Route**: `/API/Broker/fetchRobinhoodNotifications/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodNotifications`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodNotifications/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodNotifications, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Order Details**
  - **Route**: `/API/Broker/fetchRobinhoodOrderDetails`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodOrderDetails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodOrderDetails` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodOrderDetails, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Order Details**
  - **Route**: `/API/Broker/fetchRobinhoodOrderDetails/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodOrderDetails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodOrderDetails/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodOrderDetails, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Orders**
  - **Route**: `/API/Broker/fetchRobinhoodOrders`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodOrders`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodOrders` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodOrders, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Orders**
  - **Route**: `/API/Broker/fetchRobinhoodOrders/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodOrders`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodOrders/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodOrders, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Portfolio**
  - **Route**: `/API/Broker/fetchRobinhoodPortfolio`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodPortfolio`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodPortfolio` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodPortfolio, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Portfolio**
  - **Route**: `/API/Broker/fetchRobinhoodPortfolio/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodPortfolio`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodPortfolio/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodPortfolio, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Positions**
  - **Route**: `/API/Broker/fetchRobinhoodPositions`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodPositions`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodPositions` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodPositions, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Positions**
  - **Route**: `/API/Broker/fetchRobinhoodPositions/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodPositions`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodPositions/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodPositions, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Quotes**
  - **Route**: `/API/Broker/fetchRobinhoodQuotes`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodQuotes`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodQuotes` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodQuotes, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Quotes**
  - **Route**: `/API/Broker/fetchRobinhoodQuotes/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodQuotes`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodQuotes/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodQuotes, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Transaction History**
  - **Route**: `/API/Broker/fetchRobinhoodTransactionHistory`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodTransactionHistory`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodTransactionHistory` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodTransactionHistory, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Transaction History**
  - **Route**: `/API/Broker/fetchRobinhoodTransactionHistory/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodTransactionHistory`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodTransactionHistory/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodTransactionHistory, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Transfers**
  - **Route**: `/API/Broker/fetchRobinhoodTransfers`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodTransfers`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodTransfers` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodTransfers, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Transfers**
  - **Route**: `/API/Broker/fetchRobinhoodTransfers/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodTransfers`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodTransfers/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodTransfers, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Watchlist Items**
  - **Route**: `/API/Broker/fetchRobinhoodWatchlistItems`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodWatchlistItems`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodWatchlistItems` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodWatchlistItems, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Watchlist Items**
  - **Route**: `/API/Broker/fetchRobinhoodWatchlistItems/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodWatchlistItems`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodWatchlistItems/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodWatchlistItems, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Watchlists**
  - **Route**: `/API/Broker/fetchRobinhoodWatchlists`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodWatchlists`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodWatchlists` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodWatchlists, providing backend data/services for Budget consumers.

- [ ] **Budget – Fetch Robinhood Watchlists**
  - **Route**: `/API/Broker/fetchRobinhoodWatchlists/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodWatchlists`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/fetchRobinhoodWatchlists/(:segment)` via App\Modules\APIs\Controllers\BudgetController::fetchRobinhoodWatchlists, providing backend data/services for Budget consumers.

- [ ] **Budget – Net Worth**
  - **Route**: `/API/Broker/net-worth`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::netWorth`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/net-worth` via App\Modules\APIs\Controllers\BudgetController::netWorth, providing backend data/services for Budget consumers.

- [ ] **Budget – Trends**
  - **Route**: `/API/Broker/trends`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::trends`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Broker/trends` via App\Modules\APIs\Controllers\BudgetController::trends, providing backend data/services for Budget consumers.

- [ ] **Budget – Api Available Data**
  - **Route**: `/API/Budget/Available`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::apiAvailableData`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/Available` via App\Modules\APIs\Controllers\BudgetController::apiAvailableData, providing backend data/services for Budget consumers.

- [ ] **Budget – Api Credit Data**
  - **Route**: `/API/Budget/Credit`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::apiCreditData`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/Credit` via App\Modules\APIs\Controllers\BudgetController::apiCreditData, providing backend data/services for Budget consumers.

- [ ] **Budget – Api Budget Data**
  - **Route**: `/API/Budget/Data`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::apiBudgetData`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/Data` via App\Modules\APIs\Controllers\BudgetController::apiBudgetData, providing backend data/services for Budget consumers.

- [ ] **Budget – Api Repayment Summary**
  - **Route**: `/API/Budget/Repayment`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::apiRepaymentSummary`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/Repayment` via App\Modules\APIs\Controllers\BudgetController::apiRepaymentSummary, providing backend data/services for Budget consumers.

- [ ] **Budget – Add Linked Account**
  - **Route**: `/API/Budget/add-linked-account`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::addLinkedAccount`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/add-linked-account` via App\Modules\APIs\Controllers\BudgetController::addLinkedAccount, providing backend data/services for Budget consumers.

- [ ] **Budget – Available**
  - **Route**: `/API/Budget/available`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::available`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/available` via App\Modules\APIs\Controllers\BudgetController::available, providing backend data/services for Budget consumers.

- [ ] **Budget – Budgets**
  - **Route**: `/API/Budget/budgets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::budgets`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/budgets` via App\Modules\APIs\Controllers\BudgetController::budgets, providing backend data/services for Budget consumers.

- [ ] **Budget – Cash Flow**
  - **Route**: `/API/Budget/cash-flow`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::cashFlow`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/cash-flow` via App\Modules\APIs\Controllers\BudgetController::cashFlow, providing backend data/services for Budget consumers.

- [ ] **Budget – Categories**
  - **Route**: `/API/Budget/categories`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::categories`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/categories` via App\Modules\APIs\Controllers\BudgetController::categories, providing backend data/services for Budget consumers.

- [ ] **Budget – Credit**
  - **Route**: `/API/Budget/credit`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::credit`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/credit` via App\Modules\APIs\Controllers\BudgetController::credit, providing backend data/services for Budget consumers.

- [ ] **Budget – Get User Available Balances**
  - **Route**: `/API/Budget/getUserAvailableBalances`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::getUserAvailableBalances`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/getUserAvailableBalances` via App\Modules\APIs\Controllers\BudgetController::getUserAvailableBalances, providing backend data/services for Budget consumers.

- [ ] **Budget – Get User Budget Records**
  - **Route**: `/API/Budget/getUserBudgetRecords`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::getUserBudgetRecords`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/getUserBudgetRecords` via App\Modules\APIs\Controllers\BudgetController::getUserBudgetRecords, providing backend data/services for Budget consumers.

- [ ] **Budget – Get User Credit Balances**
  - **Route**: `/API/Budget/getUserCreditBalances`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::getUserCreditBalances`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/getUserCreditBalances` via App\Modules\APIs\Controllers\BudgetController::getUserCreditBalances, providing backend data/services for Budget consumers.

- [ ] **Budget – Get User Repayment Summary**
  - **Route**: `/API/Budget/getUserRepaymentSummary`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::getUserRepaymentSummary`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/getUserRepaymentSummary` via App\Modules\APIs\Controllers\BudgetController::getUserRepaymentSummary, providing backend data/services for Budget consumers.

- [ ] **Budget – Goals**
  - **Route**: `/API/Budget/goals`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::goals`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/goals` via App\Modules\APIs\Controllers\BudgetController::goals, providing backend data/services for Budget consumers.

- [ ] **Budget – Insights**
  - **Route**: `/API/Budget/insights`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::insights`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/insights` via App\Modules\APIs\Controllers\BudgetController::insights, providing backend data/services for Budget consumers.

- [ ] **Budget – Investment Accounts**
  - **Route**: `/API/Budget/investment-accounts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::investmentAccounts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/investment-accounts` via App\Modules\APIs\Controllers\BudgetController::investmentAccounts, providing backend data/services for Budget consumers.

- [ ] **Budget – Linked Accounts**
  - **Route**: `/API/Budget/linked-accounts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::linkedAccounts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/linked-accounts` via App\Modules\APIs\Controllers\BudgetController::linkedAccounts, providing backend data/services for Budget consumers.

- [ ] **Budget – Net Worth**
  - **Route**: `/API/Budget/net-worth`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::netWorth`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/net-worth` via App\Modules\APIs\Controllers\BudgetController::netWorth, providing backend data/services for Budget consumers.

- [ ] **Budget – Refresh Linked Account**
  - **Route**: `/API/Budget/refresh-linked-account/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::refreshLinkedAccount`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/refresh-linked-account/(:segment)` via App\Modules\APIs\Controllers\BudgetController::refreshLinkedAccount, providing backend data/services for Budget consumers.

- [ ] **Budget – Remove Linked Account**
  - **Route**: `/API/Budget/remove-linked-account/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::removeLinkedAccount`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/remove-linked-account/(:segment)` via App\Modules\APIs\Controllers\BudgetController::removeLinkedAccount, providing backend data/services for Budget consumers.

- [ ] **Budget – Repayment**
  - **Route**: `/API/Budget/repayment`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::repayment`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/repayment` via App\Modules\APIs\Controllers\BudgetController::repayment, providing backend data/services for Budget consumers.

- [ ] **Budget – Savings Goals**
  - **Route**: `/API/Budget/savings-goals`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::savingsGoals`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/savings-goals` via App\Modules\APIs\Controllers\BudgetController::savingsGoals, providing backend data/services for Budget consumers.

- [ ] **Budget – Summary**
  - **Route**: `/API/Budget/summary`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::summary`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/summary` via App\Modules\APIs\Controllers\BudgetController::summary, providing backend data/services for Budget consumers.

- [ ] **Budget – Transactions**
  - **Route**: `/API/Budget/transactions`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::transactions`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/transactions` via App\Modules\APIs\Controllers\BudgetController::transactions, providing backend data/services for Budget consumers.

- [ ] **Budget – Trends**
  - **Route**: `/API/Budget/trends`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\BudgetController::trends`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Budget/trends` via App\Modules\APIs\Controllers\BudgetController::trends, providing backend data/services for Budget consumers.

### Discord

- [ ] **Discord – Broadcast**
  - **Route**: `/API/Discord/broadcast`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\DiscordController::broadcast`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Discord/broadcast` via App\Modules\APIs\Controllers\DiscordController::broadcast, providing backend data/services for Discord consumers.

- [ ] **Discord – Coalesce Now**
  - **Route**: `/API/Discord/coalesce-now`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\DiscordController::coalesceNow`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Discord/coalesce-now` via App\Modules\APIs\Controllers\DiscordController::coalesceNow, providing backend data/services for Discord consumers.

- [ ] **Discord – Enqueue**
  - **Route**: `/API/Discord/enqueue`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\DiscordController::enqueue`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Discord/enqueue` via App\Modules\APIs\Controllers\DiscordController::enqueue, providing backend data/services for Discord consumers.

- [ ] **Discord – Health**
  - **Route**: `/API/Discord/health`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\DiscordController::health`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Discord/health` via App\Modules\APIs\Controllers\DiscordController::health, providing backend data/services for Discord consumers.

- [ ] **Discord – Process Queue**
  - **Route**: `/API/Discord/process-queue`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\DiscordController::processQueue`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Discord/process-queue` via App\Modules\APIs\Controllers\DiscordController::processQueue, providing backend data/services for Discord consumers.

- [ ] **Discord – Purge Dead**
  - **Route**: `/API/Discord/purge-dead`
  - **Methods**: `DELETE`
  - **Controller**: `App\Modules\APIs\Controllers\DiscordController::purgeDead`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles DELETE requests to `/API/Discord/purge-dead` via App\Modules\APIs\Controllers\DiscordController::purgeDead, providing backend data/services for Discord consumers.

- [ ] **Discord – Test**
  - **Route**: `/API/Discord/test`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\DiscordController::test`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Discord/test` via App\Modules\APIs\Controllers\DiscordController::test, providing backend data/services for Discord consumers.

### DripCampaign

- [ ] **DripCampaign – Enroll User**
  - **Route**: `/API/DripCampaign/Enroll/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\DripCampaignController::enrollUser`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/DripCampaign/Enroll/(:num)` via App\Modules\APIs\Controllers\DripCampaignController::enrollUser, providing backend data/services for DripCampaign consumers.

- [ ] **DripCampaign – Test Drip Cron**
  - **Route**: `/API/DripCampaign/TestCron`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\DripCampaignController::testDripCron`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/DripCampaign/TestCron` via App\Modules\APIs\Controllers\DripCampaignController::testDripCron, providing backend data/services for DripCampaign consumers.

- [ ] **DripCampaign – Click**
  - **Route**: `/API/DripCampaign/click/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\DripCampaignController::click`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/DripCampaign/click/(:segment)` via App\Modules\APIs\Controllers\DripCampaignController::click, providing backend data/services for DripCampaign consumers.

- [ ] **DripCampaign – Open**
  - **Route**: `/API/DripCampaign/open/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\DripCampaignController::open`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/DripCampaign/open/(:segment)` via App\Modules\APIs\Controllers\DripCampaignController::open, providing backend data/services for DripCampaign consumers.

- [ ] **DripCampaign – Process Batch**
  - **Route**: `/API/DripCampaign/processBatch`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\DripCampaignController::processBatch`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/DripCampaign/processBatch` via App\Modules\APIs\Controllers\DripCampaignController::processBatch, providing backend data/services for DripCampaign consumers.

### Email

- [ ] **Email – Auto Schedule Draft Campaigns**
  - **Route**: `/API/Email/autoScheduleDraftCampaigns`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::autoScheduleDraftCampaigns`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Email/autoScheduleDraftCampaigns` via App\Modules\APIs\Controllers\EmailController::autoScheduleDraftCampaigns, providing backend data/services for Email consumers.

- [ ] **Email – Cancel Scheduled Campaign**
  - **Route**: `/API/Email/cancelScheduledCampaign/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::cancelScheduledCampaign`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Email/cancelScheduledCampaign/(:num)` via App\Modules\APIs\Controllers\EmailController::cancelScheduledCampaign, providing backend data/services for Email consumers.

- [ ] **Email – Clone Campaign**
  - **Route**: `/API/Email/cloneCampaign/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::cloneCampaign`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Email/cloneCampaign/(:num)` via App\Modules\APIs\Controllers\EmailController::cloneCampaign, providing backend data/services for Email consumers.

- [ ] **Email – Create Draft Campaign**
  - **Route**: `/API/Email/createDraftCampaign`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::createDraftCampaign`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Email/createDraftCampaign` via App\Modules\APIs\Controllers\EmailController::createDraftCampaign, providing backend data/services for Email consumers.

- [ ] **Email – Delete Campaign**
  - **Route**: `/API/Email/deleteCampaign/(:num)`
  - **Methods**: `DELETE`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::deleteCampaign`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles DELETE requests to `/API/Email/deleteCampaign/(:num)` via App\Modules\APIs\Controllers\EmailController::deleteCampaign, providing backend data/services for Email consumers.

- [ ] **Email – Fetch Campaign Analytics**
  - **Route**: `/API/Email/fetchCampaignAnalytics`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::fetchCampaignAnalytics`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Email/fetchCampaignAnalytics` via App\Modules\APIs\Controllers\EmailController::fetchCampaignAnalytics, providing backend data/services for Email consumers.

- [ ] **Email – Fetch Queued Email By Id**
  - **Route**: `/API/Email/fetchQueuedEmailById/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::fetchQueuedEmailById`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Email/fetchQueuedEmailById/(:num)` via App\Modules\APIs\Controllers\EmailController::fetchQueuedEmailById, providing backend data/services for Email consumers.

- [ ] **Email – Fetch Queued Emails**
  - **Route**: `/API/Email/fetchQueuedEmails`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::fetchQueuedEmails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Email/fetchQueuedEmails` via App\Modules\APIs\Controllers\EmailController::fetchQueuedEmails, providing backend data/services for Email consumers.

- [ ] **Email – Get All Campaigns**
  - **Route**: `/API/Email/getAllCampaigns`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::getAllCampaigns`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Email/getAllCampaigns` via App\Modules\APIs\Controllers\EmailController::getAllCampaigns, providing backend data/services for Email consumers.

- [ ] **Email – Get Campaign Metrics**
  - **Route**: `/API/Email/getCampaignMetrics/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::getCampaignMetrics`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Email/getCampaignMetrics/(:num)` via App\Modules\APIs\Controllers\EmailController::getCampaignMetrics, providing backend data/services for Email consumers.

- [ ] **Email – Get Campaign Stats**
  - **Route**: `/API/Email/getCampaignStats/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::getCampaignStats`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Email/getCampaignStats/(:num)` via App\Modules\APIs\Controllers\EmailController::getCampaignStats, providing backend data/services for Email consumers.

- [ ] **Email – Get Email Queue Stats**
  - **Route**: `/API/Email/getEmailQueueStats`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::getEmailQueueStats`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Email/getEmailQueueStats` via App\Modules\APIs\Controllers\EmailController::getEmailQueueStats, providing backend data/services for Email consumers.

- [ ] **Email – Get Email Queue Trend**
  - **Route**: `/API/Email/getEmailQueueTrend`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::getEmailQueueTrend`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Email/getEmailQueueTrend` via App\Modules\APIs\Controllers\EmailController::getEmailQueueTrend, providing backend data/services for Email consumers.

- [ ] **Email – Process Scheduled Campaigns**
  - **Route**: `/API/Email/processScheduledCampaigns`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::processScheduledCampaigns`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Email/processScheduledCampaigns` via App\Modules\APIs\Controllers\EmailController::processScheduledCampaigns, providing backend data/services for Email consumers.

- [ ] **Email – Schedule Campaign Api**
  - **Route**: `/API/Email/scheduleCampaignApi/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::scheduleCampaignApi`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Email/scheduleCampaignApi/(:num)` via App\Modules\APIs\Controllers\EmailController::scheduleCampaignApi, providing backend data/services for Email consumers.

- [ ] **Email – Send Mass Test Campaign**
  - **Route**: `/API/Email/sendMassTestCampaign`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::sendMassTestCampaign`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Email/sendMassTestCampaign` via App\Modules\APIs\Controllers\EmailController::sendMassTestCampaign, providing backend data/services for Email consumers.

- [ ] **Email – Track Bounce Webhook**
  - **Route**: `/API/Email/trackBounceWebhook`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::trackBounceWebhook`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Email/trackBounceWebhook` via App\Modules\APIs\Controllers\EmailController::trackBounceWebhook, providing backend data/services for Email consumers.

- [ ] **Email – Unsubscribe**
  - **Route**: `/API/Email/unsubscribe/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EmailController::unsubscribe`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Email/unsubscribe/(:any)` via App\Modules\APIs\Controllers\EmailController::unsubscribe, providing backend data/services for Email consumers.

### Esports

- [ ] **Esports – Cancel Event**
  - **Route**: `/API/eSports/cancelEvent`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\EsportsController::cancelEvent`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/eSports/cancelEvent` via App\Modules\APIs\Controllers\EsportsController::cancelEvent, providing backend data/services for Esports consumers.

- [ ] **Esports – Create Event**
  - **Route**: `/API/eSports/createEvent`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\EsportsController::createEvent`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/eSports/createEvent` via App\Modules\APIs\Controllers\EsportsController::createEvent, providing backend data/services for Esports consumers.

- [ ] **Esports – Cron Process Jobs**
  - **Route**: `/API/eSports/cronProcessJobs`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\EsportsController::cronProcessJobs`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles POST requests to `/API/eSports/cronProcessJobs` via App\Modules\APIs\Controllers\EsportsController::cronProcessJobs, providing backend data/services for Esports consumers.

- [ ] **Esports – Get Event**
  - **Route**: `/API/eSports/event/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EsportsController::getEvent`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/eSports/event/(:num)` via App\Modules\APIs\Controllers\EsportsController::getEvent, providing backend data/services for Esports consumers.

- [ ] **Esports – List Events**
  - **Route**: `/API/eSports/events`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\EsportsController::listEvents`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/eSports/events` via App\Modules\APIs\Controllers\EsportsController::listEvents, providing backend data/services for Esports consumers.

- [ ] **Esports – Join Event**
  - **Route**: `/API/eSports/joinEvent`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\EsportsController::joinEvent`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/eSports/joinEvent` via App\Modules\APIs\Controllers\EsportsController::joinEvent, providing backend data/services for Esports consumers.

- [ ] **Esports – Lock Escrow**
  - **Route**: `/API/eSports/lockEscrow`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\EsportsController::lockEscrow`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/eSports/lockEscrow` via App\Modules\APIs\Controllers\EsportsController::lockEscrow, providing backend data/services for Esports consumers.

- [ ] **Esports – Receive Result Webhook**
  - **Route**: `/API/eSports/receiveResultWebhook`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\EsportsController::receiveResultWebhook`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/eSports/receiveResultWebhook` via App\Modules\APIs\Controllers\EsportsController::receiveResultWebhook, providing backend data/services for Esports consumers.

- [ ] **Esports – Settle Payouts**
  - **Route**: `/API/eSports/settlePayouts`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\EsportsController::settlePayouts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/eSports/settlePayouts` via App\Modules\APIs\Controllers\EsportsController::settlePayouts, providing backend data/services for Esports consumers.

### Health

- [ ] **Health – Health**
  - **Route**: `/API/Health`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\HealthController::index`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Health` via App\Modules\APIs\Controllers\HealthController::index, providing backend data/services for Health consumers.

- [ ] **Health – Health**
  - **Route**: `/API/Health`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\HealthController::index`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Health` via App\Modules\APIs\Controllers\HealthController::index, providing backend data/services for Health consumers.

### Investments

- [ ] **Investments – Get User Watchlist**
  - **Route**: `/API/Investments/GetUserWatchlist/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::getUserWatchlist`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Investments/GetUserWatchlist/(:any)` via App\Modules\APIs\Controllers\InvestmentsController::getUserWatchlist, providing backend data/services for Investments consumers.

- [ ] **Investments – Get User Watchlist**
  - **Route**: `/API/Investments/GetUserWatchlist/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::getUserWatchlist`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Investments/GetUserWatchlist/(:any)` via App\Modules\APIs\Controllers\InvestmentsController::getUserWatchlist, providing backend data/services for Investments consumers.

- [ ] **Investments – Search Ticker**
  - **Route**: `/API/Investments/Search/Ticker/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::searchTicker`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Investments/Search/Ticker/(:any)` via App\Modules\APIs\Controllers\InvestmentsController::searchTicker, providing backend data/services for Investments consumers.

- [ ] **Investments – Add New Trade To Watchlist**
  - **Route**: `/API/Investments/addNewTradeToWatchlist`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::addNewTradeToWatchlist`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Investments/addNewTradeToWatchlist` via App\Modules\APIs\Controllers\InvestmentsController::addNewTradeToWatchlist, providing backend data/services for Investments consumers.

- [ ] **Investments – Fetch Watchlist Prices**
  - **Route**: `/API/Investments/fetchWatchlistPrices/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::fetchWatchlistPrices`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Investments/fetchWatchlistPrices/(:any)` via App\Modules\APIs\Controllers\InvestmentsController::fetchWatchlistPrices, providing backend data/services for Investments consumers.

- [ ] **Investments – Get Investment Data**
  - **Route**: `/API/Investments/getInvestmentData/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::getInvestmentData`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Investments/getInvestmentData/(:segment)` via App\Modules\APIs\Controllers\InvestmentsController::getInvestmentData, providing backend data/services for Investments consumers.

- [ ] **Investments – Get Investment Data**
  - **Route**: `/API/Investments/getInvestmentData/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::getInvestmentData`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Investments/getInvestmentData/(:segment)` via App\Modules\APIs\Controllers\InvestmentsController::getInvestmentData, providing backend data/services for Investments consumers.

- [ ] **Investments – Get Symbols By Trade Type**
  - **Route**: `/API/Investments/getSymbolsByTradeType/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::getSymbolsByTradeType`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Investments/getSymbolsByTradeType/(:segment)` via App\Modules\APIs\Controllers\InvestmentsController::getSymbolsByTradeType, providing backend data/services for Investments consumers.

- [ ] **Investments – Refresh Active Trades Prices**
  - **Route**: `/API/Investments/refreshActiveTradesPrices/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::refreshActiveTradesPrices`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Investments/refreshActiveTradesPrices/(:any)` via App\Modules\APIs\Controllers\InvestmentsController::refreshActiveTradesPrices, providing backend data/services for Investments consumers.

- [ ] **Investments – Remove Trade From Watchlist**
  - **Route**: `/API/Investments/removeTradeFromWatchlist/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::removeTradeFromWatchlist`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Investments/removeTradeFromWatchlist/(:num)` via App\Modules\APIs\Controllers\InvestmentsController::removeTradeFromWatchlist, providing backend data/services for Investments consumers.

- [ ] **Investments – Update Trade Notes**
  - **Route**: `/API/Investments/updateTradeNotes`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::updateTradeNotes`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Investments/updateTradeNotes` via App\Modules\APIs\Controllers\InvestmentsController::updateTradeNotes, providing backend data/services for Investments consumers.

- [ ] **Investments – Update Trade Target Price**
  - **Route**: `/API/Investments/updateTradeTargetPrice`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::updateTradeTargetPrice`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Investments/updateTradeTargetPrice` via App\Modules\APIs\Controllers\InvestmentsController::updateTradeTargetPrice, providing backend data/services for Investments consumers.

- [ ] **Investments – Update Watchlist Order**
  - **Route**: `/API/Investments/updateWatchlistOrder`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::updateWatchlistOrder`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Investments/updateWatchlistOrder` via App\Modules\APIs\Controllers\InvestmentsController::updateWatchlistOrder, providing backend data/services for Investments consumers.

- [ ] **Investments – Update Watchlist Tags**
  - **Route**: `/API/Investments/updateWatchlistTags`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::updateWatchlistTags`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Investments/updateWatchlistTags` via App\Modules\APIs\Controllers\InvestmentsController::updateWatchlistTags, providing backend data/services for Investments consumers.

- [ ] **Investments – User Holdings**
  - **Route**: `/API/Investments/userHoldings/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::userHoldings`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Investments/userHoldings/(:any)` via App\Modules\APIs\Controllers\InvestmentsController::userHoldings, providing backend data/services for Investments consumers.

- [ ] **Investments – User Watchlist**
  - **Route**: `/API/Investments/userWatchlist/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\InvestmentsController::userWatchlist`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Investments/userWatchlist/(:any)` via App\Modules\APIs\Controllers\InvestmentsController::userWatchlist, providing backend data/services for Investments consumers.

### Management

- [ ] **Management – Run Cron Tasks**
  - **Route**: `/API/Management/Run-CRON-Tasks`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::Run_CRON_Tasks`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Management/Run-CRON-Tasks` via App\Modules\APIs\Controllers\ManagementController::Run_CRON_Tasks, providing backend data/services for Management consumers.

- [ ] **Management – Ajax Get Active Users**
  - **Route**: `/API/Management/ajaxGetActiveUsers`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::ajaxGetActiveUsers`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/ajaxGetActiveUsers` via App\Modules\APIs\Controllers\ManagementController::ajaxGetActiveUsers, providing backend data/services for Management consumers.

- [ ] **Management – Ajax Get Inactive Users**
  - **Route**: `/API/Management/ajaxGetInactiveUsers`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::ajaxGetInactiveUsers`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/ajaxGetInactiveUsers` via App\Modules\APIs\Controllers\ManagementController::ajaxGetInactiveUsers, providing backend data/services for Management consumers.

- [ ] **Management – Ban Unverified Users**
  - **Route**: `/API/Management/banUnverifiedUsers`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::banUnverifiedUsers`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/banUnverifiedUsers` via App\Modules\APIs\Controllers\ManagementController::banUnverifiedUsers, providing backend data/services for Management consumers.

- [ ] **Management – Check For Spam Users**
  - **Route**: `/API/Management/checkForSpamUsers`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::checkForSpamUsers`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/checkForSpamUsers` via App\Modules\APIs\Controllers\ManagementController::checkForSpamUsers, providing backend data/services for Management consumers.

- [ ] **Management – Distribute Todays News Content**
  - **Route**: `/API/Management/distributeTodaysNewsContent`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::distributeTodaysNewsContent`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/distributeTodaysNewsContent` via App\Modules\APIs\Controllers\ManagementController::distributeTodaysNewsContent, providing backend data/services for Management consumers.

- [ ] **Management – Distribute Todays News Content**
  - **Route**: `/API/Management/distributeTodaysNewsContent`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::distributeTodaysNewsContent`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/distributeTodaysNewsContent` via App\Modules\APIs\Controllers\ManagementController::distributeTodaysNewsContent, providing backend data/services for Management consumers.

- [ ] **Management – Export Post Json**
  - **Route**: `/API/Management/exportPostJson/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::exportPostJson`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/exportPostJson/(:num)` via App\Modules\APIs\Controllers\ManagementController::exportPostJson, providing backend data/services for Management consumers.

- [ ] **Management – Export Post Json**
  - **Route**: `/API/Management/exportPostJson/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::exportPostJson`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/exportPostJson/(:num)` via App\Modules\APIs\Controllers\ManagementController::exportPostJson, providing backend data/services for Management consumers.

- [ ] **Management – Fetch Alpha Vantage News For Trade Alerts**
  - **Route**: `/API/Management/fetchAlphaVantageNewsForTradeAlerts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::fetchAlphaVantageNewsForTradeAlerts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/fetchAlphaVantageNewsForTradeAlerts` via App\Modules\APIs\Controllers\ManagementController::fetchAlphaVantageNewsForTradeAlerts, providing backend data/services for Management consumers.

- [ ] **Management – Fetch Emails To Temp Scraper**
  - **Route**: `/API/Management/fetchEmailsToTempScraper`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::fetchEmailsToTempScraper`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/fetchEmailsToTempScraper` via App\Modules\APIs\Controllers\ManagementController::fetchEmailsToTempScraper, providing backend data/services for Management consumers.

- [ ] **Management – Fetch Latest Summaries**
  - **Route**: `/API/Management/fetchLatestSummaries`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::fetchLatestSummaries`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/fetchLatestSummaries` via App\Modules\APIs\Controllers\ManagementController::fetchLatestSummaries, providing backend data/services for Management consumers.

- [ ] **Management – Fetch Latest Summaries**
  - **Route**: `/API/Management/fetchLatestSummaries`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::fetchLatestSummaries`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/fetchLatestSummaries` via App\Modules\APIs\Controllers\ManagementController::fetchLatestSummaries, providing backend data/services for Management consumers.

- [ ] **Management – Fetch News Emails**
  - **Route**: `/API/Management/fetchNewsEmails`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::fetchNewsEmails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/fetchNewsEmails` via App\Modules\APIs\Controllers\ManagementController::fetchNewsEmails, providing backend data/services for Management consumers.

- [ ] **Management – Generate Posts From Summary**
  - **Route**: `/API/Management/generatePostsFromSummary`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::generatePostsFromSummary`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/generatePostsFromSummary` via App\Modules\APIs\Controllers\ManagementController::generatePostsFromSummary, providing backend data/services for Management consumers.

- [ ] **Management – Generate Posts From Summary**
  - **Route**: `/API/Management/generatePostsFromSummary/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::generatePostsFromSummary`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/generatePostsFromSummary/(:num)` via App\Modules\APIs\Controllers\ManagementController::generatePostsFromSummary, providing backend data/services for Management consumers.

- [ ] **Management – Generate Voice Script Manually**
  - **Route**: `/API/Management/generateVoiceScriptManually`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::generateVoiceScriptManually`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/generateVoiceScriptManually` via App\Modules\APIs\Controllers\ManagementController::generateVoiceScriptManually, providing backend data/services for Management consumers.

- [ ] **Management – Generate Voice Script Manually**
  - **Route**: `/API/Management/generateVoiceScriptManually`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::generateVoiceScriptManually`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/generateVoiceScriptManually` via App\Modules\APIs\Controllers\ManagementController::generateVoiceScriptManually, providing backend data/services for Management consumers.

- [ ] **Management – Get Alerts**
  - **Route**: `/API/Management/getAlerts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::getAlerts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/getAlerts` via App\Modules\APIs\Controllers\ManagementController::getAlerts, providing backend data/services for Management consumers.

- [ ] **Management – Get Alerts**
  - **Route**: `/API/Management/getAlerts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::getAlerts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/getAlerts` via App\Modules\APIs\Controllers\ManagementController::getAlerts, providing backend data/services for Management consumers.

- [ ] **Management – Get Assets**
  - **Route**: `/API/Management/getAssets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::getAssets`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/getAssets` via App\Modules\APIs\Controllers\ManagementController::getAssets, providing backend data/services for Management consumers.

- [ ] **Management – Get Assets**
  - **Route**: `/API/Management/getAssets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::getAssets`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/getAssets` via App\Modules\APIs\Controllers\ManagementController::getAssets, providing backend data/services for Management consumers.

- [ ] **Management – Get News**
  - **Route**: `/API/Management/getNews`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::getNews`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/getNews` via App\Modules\APIs\Controllers\ManagementController::getNews, providing backend data/services for Management consumers.

- [ ] **Management – Get News**
  - **Route**: `/API/Management/getNews`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::getNews`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/getNews` via App\Modules\APIs\Controllers\ManagementController::getNews, providing backend data/services for Management consumers.

- [ ] **Management – Get Referrals**
  - **Route**: `/API/Management/getReferrals`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::getReferrals`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/getReferrals` via App\Modules\APIs\Controllers\ManagementController::getReferrals, providing backend data/services for Management consumers.

- [ ] **Management – Get Referrals**
  - **Route**: `/API/Management/getReferrals`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::getReferrals`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/getReferrals` via App\Modules\APIs\Controllers\ManagementController::getReferrals, providing backend data/services for Management consumers.

- [ ] **Management – Get Support**
  - **Route**: `/API/Management/getSupport`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::getSupport`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/getSupport` via App\Modules\APIs\Controllers\ManagementController::getSupport, providing backend data/services for Management consumers.

- [ ] **Management – Get Support**
  - **Route**: `/API/Management/getSupport`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::getSupport`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/getSupport` via App\Modules\APIs\Controllers\ManagementController::getSupport, providing backend data/services for Management consumers.

- [ ] **Management – Get Users**
  - **Route**: `/API/Management/getUsers`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::getUsers`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/getUsers` via App\Modules\APIs\Controllers\ManagementController::getUsers, providing backend data/services for Management consumers.

- [ ] **Management – Get Users**
  - **Route**: `/API/Management/getUsers`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::getUsers`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/getUsers` via App\Modules\APIs\Controllers\ManagementController::getUsers, providing backend data/services for Management consumers.

- [ ] **Management – Process All Trade Alerts**
  - **Route**: `/API/Management/processAllTradeAlerts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::processAllTradeAlerts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/processAllTradeAlerts` via App\Modules\APIs\Controllers\ManagementController::processAllTradeAlerts, providing backend data/services for Management consumers.

- [ ] **Management – Process All Trade Alerts**
  - **Route**: `/API/Management/processAllTradeAlerts`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::processAllTradeAlerts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/processAllTradeAlerts` via App\Modules\APIs\Controllers\ManagementController::processAllTradeAlerts, providing backend data/services for Management consumers.

- [ ] **Management – Process Queued Emails**
  - **Route**: `/API/Management/processQueuedEmails`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::processQueuedEmails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/processQueuedEmails` via App\Modules\APIs\Controllers\ManagementController::processQueuedEmails, providing backend data/services for Management consumers.

- [ ] **Management – Resend Activation Emails Batch**
  - **Route**: `/API/Management/resendActivationEmailsBatch`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::resendActivationEmailsBatch`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/resendActivationEmailsBatch` via App\Modules\APIs\Controllers\ManagementController::resendActivationEmailsBatch, providing backend data/services for Management consumers.

- [ ] **Management – Resend Activation Emails Batch Queued**
  - **Route**: `/API/Management/resendActivationEmailsBatchQueued`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::resendActivationEmailsBatchQueued`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/resendActivationEmailsBatchQueued` via App\Modules\APIs\Controllers\ManagementController::resendActivationEmailsBatchQueued, providing backend data/services for Management consumers.

- [ ] **Management – Run Cron Manually**
  - **Route**: `/API/Management/runCronManually`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::runCronManually`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Management/runCronManually` via App\Modules\APIs\Controllers\ManagementController::runCronManually, providing backend data/services for Management consumers.

- [ ] **Management – Run Cron Manually**
  - **Route**: `/API/Management/runCronManually`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::runCronManually`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles POST requests to `/API/Management/runCronManually` via App\Modules\APIs\Controllers\ManagementController::runCronManually, providing backend data/services for Management consumers.

- [ ] **Management – Run Daily Alpha Vantage Data Pipeline**
  - **Route**: `/API/Management/runDailyAlphaVantageDataPipeline`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::runDailyAlphaVantageDataPipeline`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/runDailyAlphaVantageDataPipeline` via App\Modules\APIs\Controllers\ManagementController::runDailyAlphaVantageDataPipeline, providing backend data/services for Management consumers.

- [ ] **Management – Run Daily Alpha Vantage Data Pipeline**
  - **Route**: `/API/Management/runDailyAlphaVantageDataPipeline`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::runDailyAlphaVantageDataPipeline`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/runDailyAlphaVantageDataPipeline` via App\Modules\APIs\Controllers\ManagementController::runDailyAlphaVantageDataPipeline, providing backend data/services for Management consumers.

- [ ] **Management – Scrape And Generate Todays Story From Inbox**
  - **Route**: `/API/Management/scrapeAndGenerateTodaysStoryFromInbox`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::scrapeAndGenerateTodaysStoryFromInbox`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/scrapeAndGenerateTodaysStoryFromInbox` via App\Modules\APIs\Controllers\ManagementController::scrapeAndGenerateTodaysStoryFromInbox, providing backend data/services for Management consumers.

- [ ] **Management – Scrape And Generate Todays Story From Inbox**
  - **Route**: `/API/Management/scrapeAndGenerateTodaysStoryFromInbox`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::scrapeAndGenerateTodaysStoryFromInbox`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/scrapeAndGenerateTodaysStoryFromInbox` via App\Modules\APIs\Controllers\ManagementController::scrapeAndGenerateTodaysStoryFromInbox, providing backend data/services for Management consumers.

- [ ] **Management – Send All Discord Alerts**
  - **Route**: `/API/Management/sendAllDiscordAlerts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::sendAllDiscordAlerts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/sendAllDiscordAlerts` via App\Modules\APIs\Controllers\ManagementController::sendAllDiscordAlerts, providing backend data/services for Management consumers.

- [ ] **Management – Send All Discord Alerts**
  - **Route**: `/API/Management/sendAllDiscordAlerts`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::sendAllDiscordAlerts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/sendAllDiscordAlerts` via App\Modules\APIs\Controllers\ManagementController::sendAllDiscordAlerts, providing backend data/services for Management consumers.

- [ ] **Management – Send Test Activation Email**
  - **Route**: `/API/Management/sendTestActivationEmail`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::sendTestActivationEmail`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/sendTestActivationEmail` via App\Modules\APIs\Controllers\ManagementController::sendTestActivationEmail, providing backend data/services for Management consumers.

- [ ] **Management – Send To Zapier Manually**
  - **Route**: `/API/Management/sendToZapierManually`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::sendToZapierManually`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/sendToZapierManually` via App\Modules\APIs\Controllers\ManagementController::sendToZapierManually, providing backend data/services for Management consumers.

- [ ] **Management – Send To Zapier Manually**
  - **Route**: `/API/Management/sendToZapierManually`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::sendToZapierManually`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/sendToZapierManually` via App\Modules\APIs\Controllers\ManagementController::sendToZapierManually, providing backend data/services for Management consumers.

- [ ] **Management – Share Post**
  - **Route**: `/API/Management/sharePost/(:num)/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::sharePost`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/sharePost/(:num)/(:segment)` via App\Modules\APIs\Controllers\ManagementController::sharePost, providing backend data/services for Management consumers.

- [ ] **Management – Trigger Post Autogen On Empty**
  - **Route**: `/API/Management/triggerPostAutogenOnEmpty`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::triggerPostAutogenOnEmpty`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/triggerPostAutogenOnEmpty` via App\Modules\APIs\Controllers\ManagementController::triggerPostAutogenOnEmpty, providing backend data/services for Management consumers.

- [ ] **Management – Trigger Post Autogen On Empty**
  - **Route**: `/API/Management/triggerPostAutogenOnEmpty`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::triggerPostAutogenOnEmpty`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/triggerPostAutogenOnEmpty` via App\Modules\APIs\Controllers\ManagementController::triggerPostAutogenOnEmpty, providing backend data/services for Management consumers.

- [ ] **Management – Update Market Data For Alerts**
  - **Route**: `/API/Management/updateMarketDataForAlerts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::updateMarketDataForAlerts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Management/updateMarketDataForAlerts` via App\Modules\APIs\Controllers\ManagementController::updateMarketDataForAlerts, providing backend data/services for Management consumers.

- [ ] **Management – Search**
  - **Route**: `/API/Marketing/Search/(:segment)/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::index`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/Search/(:segment)/(:any)` via App\Modules\APIs\Controllers\ManagementController::index, providing backend data/services for Management consumers.

- [ ] **Management – Compose Post**
  - **Route**: `/API/Marketing/composePost`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::composePost`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/composePost` via App\Modules\APIs\Controllers\ManagementController::composePost, providing backend data/services for Management consumers.

- [ ] **Management – Delete Platform**
  - **Route**: `/API/Marketing/deletePlatform/(:num)`
  - **Methods**: `DELETE`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::deletePlatform`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles DELETE requests to `/API/Marketing/deletePlatform/(:num)` via App\Modules\APIs\Controllers\ManagementController::deletePlatform, providing backend data/services for Management consumers.

- [ ] **Management – Delete Platform Rule**
  - **Route**: `/API/Marketing/deletePlatformRule/(:num)`
  - **Methods**: `DELETE`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::deletePlatformRule`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles DELETE requests to `/API/Marketing/deletePlatformRule/(:num)` via App\Modules\APIs\Controllers\ManagementController::deletePlatformRule, providing backend data/services for Management consumers.

- [ ] **Management – Delete Suggestion**
  - **Route**: `/API/Marketing/deleteSuggestion/(:num)`
  - **Methods**: `DELETE`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::deleteSuggestion`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles DELETE requests to `/API/Marketing/deleteSuggestion/(:num)` via App\Modules\APIs\Controllers\ManagementController::deleteSuggestion, providing backend data/services for Management consumers.

- [ ] **Management – Delete Taxonomy**
  - **Route**: `/API/Marketing/deleteTaxonomy/(:num)`
  - **Methods**: `DELETE`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::deleteTaxonomy`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles DELETE requests to `/API/Marketing/deleteTaxonomy/(:num)` via App\Modules\APIs\Controllers\ManagementController::deleteTaxonomy, providing backend data/services for Management consumers.

- [ ] **Management – Get Platform Rules**
  - **Route**: `/API/Marketing/getPlatformRules/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::getPlatformRules`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/getPlatformRules/(:segment)` via App\Modules\APIs\Controllers\ManagementController::getPlatformRules, providing backend data/services for Management consumers.

- [ ] **Management – Get Platforms**
  - **Route**: `/API/Marketing/getPlatforms`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::getPlatforms`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/getPlatforms` via App\Modules\APIs\Controllers\ManagementController::getPlatforms, providing backend data/services for Management consumers.

- [ ] **Management – Get Posting Plan**
  - **Route**: `/API/Marketing/getPostingPlan`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::getPostingPlan`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/getPostingPlan` via App\Modules\APIs\Controllers\ManagementController::getPostingPlan, providing backend data/services for Management consumers.

- [ ] **Management – List Suggestions**
  - **Route**: `/API/Marketing/listSuggestions/(:segment)/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::listSuggestions`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/listSuggestions/(:segment)/(:segment)` via App\Modules\APIs\Controllers\ManagementController::listSuggestions, providing backend data/services for Management consumers.

- [ ] **Management – Save Platform**
  - **Route**: `/API/Marketing/savePlatform`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::savePlatform`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/savePlatform` via App\Modules\APIs\Controllers\ManagementController::savePlatform, providing backend data/services for Management consumers.

- [ ] **Management – Save Suggestion**
  - **Route**: `/API/Marketing/saveSuggestion`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::saveSuggestion`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/saveSuggestion` via App\Modules\APIs\Controllers\ManagementController::saveSuggestion, providing backend data/services for Management consumers.

- [ ] **Management – Save Taxonomy**
  - **Route**: `/API/Marketing/saveTaxonomy`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::saveTaxonomy`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/saveTaxonomy` via App\Modules\APIs\Controllers\ManagementController::saveTaxonomy, providing backend data/services for Management consumers.

- [ ] **Management – Search Taxonomy**
  - **Route**: `/API/Marketing/searchTaxonomy`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::searchTaxonomy`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/searchTaxonomy` via App\Modules\APIs\Controllers\ManagementController::searchTaxonomy, providing backend data/services for Management consumers.

- [ ] **Management – Upsert Platform Rule**
  - **Route**: `/API/Marketing/upsertPlatformRule`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ManagementController::upsertPlatformRule`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/upsertPlatformRule` via App\Modules\APIs\Controllers\ManagementController::upsertPlatformRule, providing backend data/services for Management consumers.

### Marketing

- [ ] **Marketing – Force Generate From Temp**
  - **Route**: `/API/Marketing/ForceGenerateFromTemp/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::ForceGenerateFromTemp`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/ForceGenerateFromTemp/(:num)` via App\Modules\APIs\Controllers\MarketingController::ForceGenerateFromTemp, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Generate From Similar**
  - **Route**: `/API/Marketing/GenerateFromSimilar/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::generateFromSimilar`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/GenerateFromSimilar/(:num)` via App\Modules\APIs\Controllers\MarketingController::generateFromSimilar, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Submit Large Content Form**
  - **Route**: `/API/Marketing/Large-Content/Form`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::submitLargeContentForm`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/Large-Content/Form` via App\Modules\APIs\Controllers\MarketingController::submitLargeContentForm, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Short Long Content Form**
  - **Route**: `/API/Marketing/Manual-Content/Form`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::shortLongContentForm`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/Manual-Content/Form` via App\Modules\APIs\Controllers\MarketingController::shortLongContentForm, providing backend data/services for Marketing consumers.

- [ ] **Marketing – View Timeline Grouped**
  - **Route**: `/API/Marketing/Timeline`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::viewTimelineGrouped`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/Timeline` via App\Modules\APIs\Controllers\MarketingController::viewTimelineGrouped, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Timeline**
  - **Route**: `/API/Marketing/Timeline/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::timeline`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/Timeline/(:segment)` via App\Modules\APIs\Controllers\MarketingController::timeline, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Approve Buffer Item**
  - **Route**: `/API/Marketing/approveBufferItem/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::approveBufferItem`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/approveBufferItem/(:num)` via App\Modules\APIs\Controllers\MarketingController::approveBufferItem, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Approve Post**
  - **Route**: `/API/Marketing/approvePost/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::approvePost`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/approvePost/(:num)` via App\Modules\APIs\Controllers\MarketingController::approvePost, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Auto Schedule Next Approved**
  - **Route**: `/API/Marketing/autoScheduleNextApproved`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::autoScheduleNextApproved`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/autoScheduleNextApproved` via App\Modules\APIs\Controllers\MarketingController::autoScheduleNextApproved, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Cron Analyze Content**
  - **Route**: `/API/Marketing/cronAnalyzeContent`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::cronAnalyzeContent`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Marketing/cronAnalyzeContent` via App\Modules\APIs\Controllers\MarketingController::cronAnalyzeContent, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Cron Auto Publish Grouped Digest**
  - **Route**: `/API/Marketing/cronAutoPublishGroupedDigest`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::cronAutoPublishGroupedDigest`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Marketing/cronAutoPublishGroupedDigest` via App\Modules\APIs\Controllers\MarketingController::cronAutoPublishGroupedDigest, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Cron Fetch And Generate News**
  - **Route**: `/API/Marketing/cronFetchAndGenerateNews`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::cronFetchAndGenerateNews`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Marketing/cronFetchAndGenerateNews` via App\Modules\APIs\Controllers\MarketingController::cronFetchAndGenerateNews, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Cron Fetch Inbox**
  - **Route**: `/API/Marketing/cronFetchInbox`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::cronFetchInbox`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Marketing/cronFetchInbox` via App\Modules\APIs\Controllers\MarketingController::cronFetchInbox, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Cron Fetch Marketing Emails**
  - **Route**: `/API/Marketing/cronFetchMarketingEmails`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::cronFetchMarketingEmails`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Marketing/cronFetchMarketingEmails` via App\Modules\APIs\Controllers\MarketingController::cronFetchMarketingEmails, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Cron Process Smsmarketing Ideas**
  - **Route**: `/API/Marketing/cronProcessSMSMarketingIdeas`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::cronProcessSMSMarketingIdeas`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Marketing/cronProcessSMSMarketingIdeas` via App\Modules\APIs\Controllers\MarketingController::cronProcessSMSMarketingIdeas, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Delete Scrape**
  - **Route**: `/API/Marketing/deleteScrape/(:num)`
  - **Methods**: `DELETE`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::deleteScrape`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles DELETE requests to `/API/Marketing/deleteScrape/(:num)` via App\Modules\APIs\Controllers\MarketingController::deleteScrape, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Distribute High Score Content**
  - **Route**: `/API/Marketing/distributeHighScoreContent`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::distributeHighScoreContent`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/distributeHighScoreContent` via App\Modules\APIs\Controllers\MarketingController::distributeHighScoreContent, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Download Voiceover**
  - **Route**: `/API/Marketing/downloadVoiceover/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::downloadVoiceover`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/downloadVoiceover/(:any)` via App\Modules\APIs\Controllers\MarketingController::downloadVoiceover, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Email Post For Approval**
  - **Route**: `/API/Marketing/emailPostForApproval/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::emailPostForApproval`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/emailPostForApproval/(:num)` via App\Modules\APIs\Controllers\MarketingController::emailPostForApproval, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Fetch Buffer Paginated**
  - **Route**: `/API/Marketing/fetchBufferPaginated`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::fetchBufferPaginated`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/fetchBufferPaginated` via App\Modules\APIs\Controllers\MarketingController::fetchBufferPaginated, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Fetch Finalized Summaries Block**
  - **Route**: `/API/Marketing/fetchFinalizedSummariesBlock`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::fetchFinalizedSummariesBlock`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/fetchFinalizedSummariesBlock` via App\Modules\APIs\Controllers\MarketingController::fetchFinalizedSummariesBlock, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Fetch Generated Summaries**
  - **Route**: `/API/Marketing/fetchGeneratedSummaries`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::fetchGeneratedSummaries`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/fetchGeneratedSummaries` via App\Modules\APIs\Controllers\MarketingController::fetchGeneratedSummaries, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Fetch Generated Summaries Block**
  - **Route**: `/API/Marketing/fetchGeneratedSummariesBlock`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::fetchGeneratedSummariesBlock`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/fetchGeneratedSummariesBlock` via App\Modules\APIs\Controllers\MarketingController::fetchGeneratedSummariesBlock, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Fetch Generated Summaries Json**
  - **Route**: `/API/Marketing/fetchGeneratedSummariesJson`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::fetchGeneratedSummariesJson`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/fetchGeneratedSummariesJson` via App\Modules\APIs\Controllers\MarketingController::fetchGeneratedSummariesJson, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Force Generate From Temp**
  - **Route**: `/API/Marketing/forceGenerateFromTemp`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::forceGenerateFromTemp`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/forceGenerateFromTemp` via App\Modules\APIs\Controllers\MarketingController::forceGenerateFromTemp, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Generate Campaign Content**
  - **Route**: `/API/Marketing/generateCampaignContent`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::generateCampaignContent`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Marketing/generateCampaignContent` via App\Modules\APIs\Controllers\MarketingController::generateCampaignContent, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Generate Campaign Step Content**
  - **Route**: `/API/Marketing/generateCampaignStepContent`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::generateCampaignStepContent`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Marketing/generateCampaignStepContent` via App\Modules\APIs\Controllers\MarketingController::generateCampaignStepContent, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Generate Content Digest From Stored**
  - **Route**: `/API/Marketing/generateContentDigestFromStored`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::generateContentDigestFromStored`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/generateContentDigestFromStored` via App\Modules\APIs\Controllers\MarketingController::generateContentDigestFromStored, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Generate Content From Scraper**
  - **Route**: `/API/Marketing/generateContentFromScraper`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::generateContentFromScraper`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/generateContentFromScraper` via App\Modules\APIs\Controllers\MarketingController::generateContentFromScraper, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Generate Daily Content Digest**
  - **Route**: `/API/Marketing/generateDailyContentDigest`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::generateDailyContentDigest`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/generateDailyContentDigest` via App\Modules\APIs\Controllers\MarketingController::generateDailyContentDigest, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Generate Daily Market Campaign**
  - **Route**: `/API/Marketing/generateDailyMarketCampaign`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::generateDailyMarketCampaign`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Marketing/generateDailyMarketCampaign` via App\Modules\APIs\Controllers\MarketingController::generateDailyMarketCampaign, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Generate From Similar**
  - **Route**: `/API/Marketing/generateFromSimilar`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::generateFromSimilar`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/generateFromSimilar` via App\Modules\APIs\Controllers\MarketingController::generateFromSimilar, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Generate Live Preview**
  - **Route**: `/API/Marketing/generateLivePreview`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::generateLivePreview`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/generateLivePreview` via App\Modules\APIs\Controllers\MarketingController::generateLivePreview, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Generate Post Media Content**
  - **Route**: `/API/Marketing/generatePostMediaContent`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::generatePostMediaContent`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/Marketing/generatePostMediaContent` via App\Modules\APIs\Controllers\MarketingController::generatePostMediaContent, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Generate Posts From Summary**
  - **Route**: `/API/Marketing/generatePostsFromSummary`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::generatePostsFromSummary`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/generatePostsFromSummary` via App\Modules\APIs\Controllers\MarketingController::generatePostsFromSummary, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Generate Posts From Summary**
  - **Route**: `/API/Marketing/generatePostsFromSummary/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::generatePostsFromSummary`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/generatePostsFromSummary/(:num)` via App\Modules\APIs\Controllers\MarketingController::generatePostsFromSummary, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Generate Scheduled Posts**
  - **Route**: `/API/Marketing/generateScheduledPosts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::generateScheduledPosts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/generateScheduledPosts` via App\Modules\APIs\Controllers\MarketingController::generateScheduledPosts, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Generate Thread From Summary**
  - **Route**: `/API/Marketing/generateThreadFromSummary/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::generateThreadFromSummary`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/generateThreadFromSummary/(:num)` via App\Modules\APIs\Controllers\MarketingController::generateThreadFromSummary, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Get Cleaned Scraped Content**
  - **Route**: `/API/Marketing/getCleanedScrapedContent`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::getCleanedScrapedContent`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/getCleanedScrapedContent` via App\Modules\APIs\Controllers\MarketingController::getCleanedScrapedContent, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Get Content Performance Analytics**
  - **Route**: `/API/Marketing/getContentPerformanceAnalytics`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::getContentPerformanceAnalytics`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/getContentPerformanceAnalytics` via App\Modules\APIs\Controllers\MarketingController::getContentPerformanceAnalytics, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Get Generated Posts Paginated**
  - **Route**: `/API/Marketing/getGeneratedPostsPaginated`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::getGeneratedPostsPaginated`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/getGeneratedPostsPaginated` via App\Modules\APIs\Controllers\MarketingController::getGeneratedPostsPaginated, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Get Scrape Details**
  - **Route**: `/API/Marketing/getScrapeDetails/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::getScrapeDetails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/getScrapeDetails/(:num)` via App\Modules\APIs\Controllers\MarketingController::getScrapeDetails, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Get Storyboard Package**
  - **Route**: `/API/Marketing/getStoryboardPackage/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::getStoryboardPackage`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/getStoryboardPackage/(:num)` via App\Modules\APIs\Controllers\MarketingController::getStoryboardPackage, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Get Top Generated Posts**
  - **Route**: `/API/Marketing/getTopGeneratedPosts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::getTopGeneratedPosts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/getTopGeneratedPosts` via App\Modules\APIs\Controllers\MarketingController::getTopGeneratedPosts, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Get Top Keyword Chart**
  - **Route**: `/API/Marketing/getTopKeywordChart/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::getTopKeywordChart`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/getTopKeywordChart/(:num)` via App\Modules\APIs\Controllers\MarketingController::getTopKeywordChart, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Group Similar Summaries By Cosine**
  - **Route**: `/API/Marketing/groupSimilarSummariesByCosine`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::groupSimilarSummariesByCosine`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/groupSimilarSummariesByCosine` via App\Modules\APIs\Controllers\MarketingController::groupSimilarSummariesByCosine, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Mass Resend Activation Emails**
  - **Route**: `/API/Marketing/massResendActivationEmails`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::massResendActivationEmails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/massResendActivationEmails` via App\Modules\APIs\Controllers\MarketingController::massResendActivationEmails, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Monitor Keywords And Scrape**
  - **Route**: `/API/Marketing/monitorKeywords`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::monitorKeywordsAndScrape`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/monitorKeywords` via App\Modules\APIs\Controllers\MarketingController::monitorKeywordsAndScrape, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Preview Buffer Item**
  - **Route**: `/API/Marketing/previewBufferItem/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::previewBufferItem`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/previewBufferItem/(:num)` via App\Modules\APIs\Controllers\MarketingController::previewBufferItem, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Preview Pending Summaries**
  - **Route**: `/API/Marketing/previewPendingSummaries`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::previewPendingSummaries`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/previewPendingSummaries` via App\Modules\APIs\Controllers\MarketingController::previewPendingSummaries, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Process Marketing Temp Emails**
  - **Route**: `/API/Marketing/processMarketingTempEmails/(:num)/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::processMarketingTempEmails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/processMarketingTempEmails/(:num)/(:segment)` via App\Modules\APIs\Controllers\MarketingController::processMarketingTempEmails, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Process Marketing Temp Emails**
  - **Route**: `/API/Marketing/processMarketingTempEmails/(:num)/(:segment)/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::processMarketingTempEmails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/processMarketingTempEmails/(:num)/(:segment)/(:num)` via App\Modules\APIs\Controllers\MarketingController::processMarketingTempEmails, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Publish Grouped Content Draft**
  - **Route**: `/API/Marketing/publishGroupedContentDraft`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::publishGroupedContentDraft`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/publishGroupedContentDraft` via App\Modules\APIs\Controllers\MarketingController::publishGroupedContentDraft, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Rank Buffer Posts Daily**
  - **Route**: `/API/Marketing/rankBufferPostsDaily`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::rankBufferPostsDaily`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/rankBufferPostsDaily` via App\Modules\APIs\Controllers\MarketingController::rankBufferPostsDaily, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Reject Buffer Item**
  - **Route**: `/API/Marketing/rejectBufferItem/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::rejectBufferItem`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/rejectBufferItem/(:num)` via App\Modules\APIs\Controllers\MarketingController::rejectBufferItem, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Reprocess Incomplete Emails**
  - **Route**: `/API/Marketing/reprocessIncompleteEmails`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::reprocessIncompleteEmails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/reprocessIncompleteEmails` via App\Modules\APIs\Controllers\MarketingController::reprocessIncompleteEmails, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Run Content Generation Batch**
  - **Route**: `/API/Marketing/runContentGenerationBatch`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::runContentGenerationBatch`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/runContentGenerationBatch` via App\Modules\APIs\Controllers\MarketingController::runContentGenerationBatch, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Run Keyword Backfill Batch**
  - **Route**: `/API/Marketing/runKeywordBackfillBatch`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::runKeywordBackfillBatch`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/runKeywordBackfillBatch` via App\Modules\APIs\Controllers\MarketingController::runKeywordBackfillBatch, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Run Keyword Enrichment**
  - **Route**: `/API/Marketing/runKeywordEnrichment`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::runKeywordEnrichment`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/runKeywordEnrichment` via App\Modules\APIs\Controllers\MarketingController::runKeywordEnrichment, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Run Scheduled Tasks**
  - **Route**: `/API/Marketing/runScheduledTasks`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::runScheduledTasks`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/runScheduledTasks` via App\Modules\APIs\Controllers\MarketingController::runScheduledTasks, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Schedule Approved Post**
  - **Route**: `/API/Marketing/scheduleApprovedPost/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::scheduleApprovedPost`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/scheduleApprovedPost/(:num)` via App\Modules\APIs\Controllers\MarketingController::scheduleApprovedPost, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Schedule Post**
  - **Route**: `/API/Marketing/schedulePost/(:any)/(:any)/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::schedulePost`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/schedulePost/(:any)/(:any)/(:any)` via App\Modules\APIs\Controllers\MarketingController::schedulePost, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Send Walkthrough Emails**
  - **Route**: `/API/Marketing/sendWalkthroughEmails`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::sendWalkthroughEmails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/sendWalkthroughEmails` via App\Modules\APIs\Controllers\MarketingController::sendWalkthroughEmails, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Share Post**
  - **Route**: `/API/Marketing/sharePost/(:num)/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::sharePost`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/sharePost/(:num)/(:segment)` via App\Modules\APIs\Controllers\MarketingController::sharePost, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Submit Large Content**
  - **Route**: `/API/Marketing/submitLargeContent`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::submitLargeContent`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/submitLargeContent` via App\Modules\APIs\Controllers\MarketingController::submitLargeContent, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Submit Manual Content**
  - **Route**: `/API/Marketing/submitManualContent`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::submitManualContent`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/submitManualContent` via App\Modules\APIs\Controllers\MarketingController::submitManualContent, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Test Generate Daily Digest**
  - **Route**: `/API/Marketing/testGenerateDailyDigest`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::testGenerateDailyDigest`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/testGenerateDailyDigest` via App\Modules\APIs\Controllers\MarketingController::testGenerateDailyDigest, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Test Generate From Temp Email**
  - **Route**: `/API/Marketing/testGenerateFromTempEmail/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::testGenerateFromTempEmail`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/testGenerateFromTempEmail/(:num)` via App\Modules\APIs\Controllers\MarketingController::testGenerateFromTempEmail, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Test Generate Summarizer Harness**
  - **Route**: `/API/Marketing/testGenerateSummarizerHarness`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::testGenerateSummarizerHarness`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/testGenerateSummarizerHarness` via App\Modules\APIs\Controllers\MarketingController::testGenerateSummarizerHarness, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Test Tf Idf Edge Cases**
  - **Route**: `/API/Marketing/testTfIdfEdgeCases`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::testTfIdfEdgeCases`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/testTfIdfEdgeCases` via App\Modules\APIs\Controllers\MarketingController::testTfIdfEdgeCases, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Reprocess Incomplete Emails**
  - **Route**: `/API/Marketing/triggerBackfill`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::reprocessIncompleteEmails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/triggerBackfill` via App\Modules\APIs\Controllers\MarketingController::reprocessIncompleteEmails, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Trigger Post Autogen On Empty**
  - **Route**: `/API/Marketing/triggerPostAutogenOnEmpty`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::triggerPostAutogenOnEmpty`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Marketing/triggerPostAutogenOnEmpty` via App\Modules\APIs\Controllers\MarketingController::triggerPostAutogenOnEmpty, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Update Campaign Links**
  - **Route**: `/API/Marketing/updateCampaignLinks`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::updateCampaignLinks`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/updateCampaignLinks` via App\Modules\APIs\Controllers\MarketingController::updateCampaignLinks, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Update Campaign Message Field**
  - **Route**: `/API/Marketing/updateCampaignMessageField`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::updateCampaignMessageField`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/updateCampaignMessageField` via App\Modules\APIs\Controllers\MarketingController::updateCampaignMessageField, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Update Insight**
  - **Route**: `/API/Marketing/updateInsight`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::updateInsight`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/updateInsight` via App\Modules\APIs\Controllers\MarketingController::updateInsight, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Update Platform Toggle**
  - **Route**: `/API/Marketing/updatePlatformToggle/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::updatePlatformToggle`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/updatePlatformToggle/(:num)` via App\Modules\APIs\Controllers\MarketingController::updatePlatformToggle, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Update Post Schedule**
  - **Route**: `/API/Marketing/updatePostSchedule/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::updatePostSchedule`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/updatePostSchedule/(:num)` via App\Modules\APIs\Controllers\MarketingController::updatePostSchedule, providing backend data/services for Marketing consumers.

- [ ] **Marketing – Validate Symbol**
  - **Route**: `/API/Marketing/validateSymbol`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\MarketingController::validateSymbol`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Marketing/validateSymbol` via App\Modules\APIs\Controllers\MarketingController::validateSymbol, providing backend data/services for Marketing consumers.

### Ops

- [ ] **Ops – Opcache Reset**
  - **Route**: `/API/Ops/OPcacheReset`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\OpsController::opcacheReset`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Ops/OPcacheReset` via App\Modules\APIs\Controllers\OpsController::opcacheReset, providing backend data/services for Ops consumers.

- [ ] **Ops – Opcache Reset**
  - **Route**: `/API/Ops/OPcacheReset`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\OpsController::opcacheReset`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Ops/OPcacheReset` via App\Modules\APIs\Controllers\OpsController::opcacheReset, providing backend data/services for Ops consumers.

### Predictions

- [ ] **Predictions – Predictions**
  - **Route**: `/API/Predictions`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::index`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Predictions` via App\Modules\APIs\Controllers\PredictionsController::index, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cancel Order**
  - **Route**: `/API/Predictions/CancelOrder`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cancelOrder`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Predictions/CancelOrder` via App\Modules\APIs\Controllers\PredictionsController::cancelOrder, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Distribute Fees**
  - **Route**: `/API/Predictions/Cron/Distribute-Fees`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronDistributeFees`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Distribute-Fees` via App\Modules\APIs\Controllers\PredictionsController::cronDistributeFees, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Expire Markets**
  - **Route**: `/API/Predictions/Cron/Expire-Markets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronExpireMarkets`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Expire-Markets` via App\Modules\APIs\Controllers\PredictionsController::cronExpireMarkets, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Fetch Market Data**
  - **Route**: `/API/Predictions/Cron/Fetch-Market-Data`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronFetchMarketData`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Fetch-Market-Data` via App\Modules\APIs\Controllers\PredictionsController::cronFetchMarketData, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Fetch User Data**
  - **Route**: `/API/Predictions/Cron/Fetch-User-Data`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronFetchUserData`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Fetch-User-Data` via App\Modules\APIs\Controllers\PredictionsController::cronFetchUserData, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Lock**
  - **Route**: `/API/Predictions/Cron/Lock`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::lock`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Lock` via App\Modules\APIs\Controllers\PredictionsController::lock, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Process Expired Markets**
  - **Route**: `/API/Predictions/Cron/Process-Expired-Markets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronProcessExpiredMarkets`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Process-Expired-Markets` via App\Modules\APIs\Controllers\PredictionsController::cronProcessExpiredMarkets, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Process Settled Markets**
  - **Route**: `/API/Predictions/Cron/Process-Settled-Markets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronProcessSettledMarkets`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Process-Settled-Markets` via App\Modules\APIs\Controllers\PredictionsController::cronProcessSettledMarkets, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Process User Fees**
  - **Route**: `/API/Predictions/Cron/Process-User-Fees`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronProcessUserFees`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Process-User-Fees` via App\Modules\APIs\Controllers\PredictionsController::cronProcessUserFees, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Process User Leaderboard**
  - **Route**: `/API/Predictions/Cron/Process-User-Leaderboard`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronProcessUserLeaderboard`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Process-User-Leaderboard` via App\Modules\APIs\Controllers\PredictionsController::cronProcessUserLeaderboard, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Process User Notifications**
  - **Route**: `/API/Predictions/Cron/Process-User-Notifications`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronProcessUserNotifications`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Process-User-Notifications` via App\Modules\APIs\Controllers\PredictionsController::cronProcessUserNotifications, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Process User Orders**
  - **Route**: `/API/Predictions/Cron/Process-User-Orders`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronProcessUserOrders`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Process-User-Orders` via App\Modules\APIs\Controllers\PredictionsController::cronProcessUserOrders, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Process User Pn L**
  - **Route**: `/API/Predictions/Cron/Process-User-PnL`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronProcessUserPnL`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Process-User-PnL` via App\Modules\APIs\Controllers\PredictionsController::cronProcessUserPnL, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Process User Positions**
  - **Route**: `/API/Predictions/Cron/Process-User-Positions`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronProcessUserPositions`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Process-User-Positions` via App\Modules\APIs\Controllers\PredictionsController::cronProcessUserPositions, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Process User Rankings**
  - **Route**: `/API/Predictions/Cron/Process-User-Rankings`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronProcessUserRankings`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Process-User-Rankings` via App\Modules\APIs\Controllers\PredictionsController::cronProcessUserRankings, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Process User Settlements**
  - **Route**: `/API/Predictions/Cron/Process-User-Settlements`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronProcessUserSettlements`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Process-User-Settlements` via App\Modules\APIs\Controllers\PredictionsController::cronProcessUserSettlements, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Process User Stakes**
  - **Route**: `/API/Predictions/Cron/Process-User-Stakes`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronProcessUserStakes`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Process-User-Stakes` via App\Modules\APIs\Controllers\PredictionsController::cronProcessUserStakes, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Process User Stats**
  - **Route**: `/API/Predictions/Cron/Process-User-Stats`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronProcessUserStats`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Process-User-Stats` via App\Modules\APIs\Controllers\PredictionsController::cronProcessUserStats, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Rebalance Odds**
  - **Route**: `/API/Predictions/Cron/Rebalance`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::rebalanceOdds`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Rebalance` via App\Modules\APIs\Controllers\PredictionsController::rebalanceOdds, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Settle Markets**
  - **Route**: `/API/Predictions/Cron/Settle-Markets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronSettleMarkets`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Settle-Markets` via App\Modules\APIs\Controllers\PredictionsController::cronSettleMarkets, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Unlock**
  - **Route**: `/API/Predictions/Cron/Unlock`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::unlock`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Unlock` via App\Modules\APIs\Controllers\PredictionsController::unlock, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Update Market Prices**
  - **Route**: `/API/Predictions/Cron/Update-Market-Prices`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronUpdateMarketPrices`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Update-Market-Prices` via App\Modules\APIs\Controllers\PredictionsController::cronUpdateMarketPrices, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Update Market States**
  - **Route**: `/API/Predictions/Cron/Update-Market-States`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronUpdateMarketStates`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Update-Market-States` via App\Modules\APIs\Controllers\PredictionsController::cronUpdateMarketStates, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Update User Fees**
  - **Route**: `/API/Predictions/Cron/Update-User-Fees`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserFees`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Update-User-Fees` via App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserFees, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Update User Leaderboard**
  - **Route**: `/API/Predictions/Cron/Update-User-Leaderboard`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserLeaderboard`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Update-User-Leaderboard` via App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserLeaderboard, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Update User Notifications**
  - **Route**: `/API/Predictions/Cron/Update-User-Notifications`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserNotifications`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Update-User-Notifications` via App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserNotifications, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Update User Pn L**
  - **Route**: `/API/Predictions/Cron/Update-User-PnL`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserPnL`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Update-User-PnL` via App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserPnL, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Update User Positions**
  - **Route**: `/API/Predictions/Cron/Update-User-Positions`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserPositions`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Update-User-Positions` via App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserPositions, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Update User Rankings**
  - **Route**: `/API/Predictions/Cron/Update-User-Rankings`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserRankings`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Update-User-Rankings` via App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserRankings, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Update User Stakes**
  - **Route**: `/API/Predictions/Cron/Update-User-Stakes`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserStakes`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Update-User-Stakes` via App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserStakes, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cron Update User Stats**
  - **Route**: `/API/Predictions/Cron/Update-User-Stats`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserStats`
  - **Category**: API / Backend
  - **Status**: cron-only
  - **Description**: Handles GET requests to `/API/Predictions/Cron/Update-User-Stats` via App\Modules\APIs\Controllers\PredictionsController::cronUpdateUserStats, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Latest**
  - **Route**: `/API/Predictions/Latest`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::latest`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Predictions/Latest` via App\Modules\APIs\Controllers\PredictionsController::latest, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Add Liquidity**
  - **Route**: `/API/Predictions/Liquidity/Add`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::addLiquidity`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Predictions/Liquidity/Add` via App\Modules\APIs\Controllers\PredictionsController::addLiquidity, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Remove Liquidity**
  - **Route**: `/API/Predictions/Liquidity/Remove`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::removeLiquidity`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Predictions/Liquidity/Remove` via App\Modules\APIs\Controllers\PredictionsController::removeLiquidity, providing backend data/services for Predictions consumers.

- [ ] **Predictions – View**
  - **Route**: `/API/Predictions/Market/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::view`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Predictions/Market/(:num)` via App\Modules\APIs\Controllers\PredictionsController::view, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Markets**
  - **Route**: `/API/Predictions/Markets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::markets`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Predictions/Markets` via App\Modules\APIs\Controllers\PredictionsController::markets, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Create Market**
  - **Route**: `/API/Predictions/Markets/Create`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::createMarket`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Predictions/Markets/Create` via App\Modules\APIs\Controllers\PredictionsController::createMarket, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Settle**
  - **Route**: `/API/Predictions/Markets/Settle/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::settle`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Predictions/Markets/Settle/(:num)` via App\Modules\APIs\Controllers\PredictionsController::settle, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Cancel Order**
  - **Route**: `/API/Predictions/Orders/Cancel`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::cancelOrder`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Predictions/Orders/Cancel` via App\Modules\APIs\Controllers\PredictionsController::cancelOrder, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Place Order**
  - **Route**: `/API/Predictions/Orders/Place`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::placeOrder`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Predictions/Orders/Place` via App\Modules\APIs\Controllers\PredictionsController::placeOrder, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Place Order**
  - **Route**: `/API/Predictions/PlaceOrder`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::placeOrder`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Predictions/PlaceOrder` via App\Modules\APIs\Controllers\PredictionsController::placeOrder, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Portfolio**
  - **Route**: `/API/Predictions/Portfolio`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::portfolio`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Predictions/Portfolio` via App\Modules\APIs\Controllers\PredictionsController::portfolio, providing backend data/services for Predictions consumers.

- [ ] **Predictions – Settlements**
  - **Route**: `/API/Predictions/Settlements`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\PredictionsController::settlements`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Predictions/Settlements` via App\Modules\APIs\Controllers\PredictionsController::settlements, providing backend data/services for Predictions consumers.

### Projects

- [ ] **Projects – Check Threshold**
  - **Route**: `/API/Management/Projects/checkThreshold/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ProjectsController::checkThreshold`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/Projects/checkThreshold/(:num)` via App\Modules\APIs\Controllers\ProjectsController::checkThreshold, providing backend data/services for Projects consumers.

- [ ] **Projects – Create Quarterly Distribution**
  - **Route**: `/API/Management/Projects/createQuarterlyDistribution/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ProjectsController::createQuarterlyDistribution`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/Projects/createQuarterlyDistribution/(:num)` via App\Modules\APIs\Controllers\ProjectsController::createQuarterlyDistribution, providing backend data/services for Projects consumers.

- [ ] **Projects – Fetch Project Emails**
  - **Route**: `/API/Management/Projects/fetchInbox`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ProjectsController::fetchProjectEmails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/Projects/fetchInbox` via App\Modules\APIs\Controllers\ProjectsController::fetchProjectEmails, providing backend data/services for Projects consumers.

- [ ] **Projects – Launch Private Auction**
  - **Route**: `/API/Management/Projects/launchPrivateAuction/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ProjectsController::launchPrivateAuction`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/Projects/launchPrivateAuction/(:num)` via App\Modules\APIs\Controllers\ProjectsController::launchPrivateAuction, providing backend data/services for Projects consumers.

- [ ] **Projects – Mark Funded**
  - **Route**: `/API/Management/Projects/markFunded/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ProjectsController::markFunded`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/Projects/markFunded/(:num)` via App\Modules\APIs\Controllers\ProjectsController::markFunded, providing backend data/services for Projects consumers.

- [ ] **Projects – Open Commitments**
  - **Route**: `/API/Management/Projects/openCommitments/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ProjectsController::openCommitments`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/Projects/openCommitments/(:num)` via App\Modules\APIs\Controllers\ProjectsController::openCommitments, providing backend data/services for Projects consumers.

- [ ] **Projects – Parse Project Emails**
  - **Route**: `/API/Management/Projects/parseInbox`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ProjectsController::parseProjectEmails`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/Projects/parseInbox` via App\Modules\APIs\Controllers\ProjectsController::parseProjectEmails, providing backend data/services for Projects consumers.

- [ ] **Projects – Process Monthly Withdrawals**
  - **Route**: `/API/Management/Projects/processMonthlyWithdrawals/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ProjectsController::processMonthlyWithdrawals`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/Projects/processMonthlyWithdrawals/(:num)` via App\Modules\APIs\Controllers\ProjectsController::processMonthlyWithdrawals, providing backend data/services for Projects consumers.

- [ ] **Projects – Promote Lead**
  - **Route**: `/API/Management/Projects/promoteLead/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ProjectsController::promoteLead`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/Projects/promoteLead/(:num)` via App\Modules\APIs\Controllers\ProjectsController::promoteLead, providing backend data/services for Projects consumers.

- [ ] **Projects – Run Payouts**
  - **Route**: `/API/Management/Projects/runPayouts/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ProjectsController::runPayouts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/Projects/runPayouts/(:num)` via App\Modules\APIs\Controllers\ProjectsController::runPayouts, providing backend data/services for Projects consumers.

- [ ] **Projects – Settle Private Auction**
  - **Route**: `/API/Management/Projects/settlePrivateAuction/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ProjectsController::settlePrivateAuction`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/Projects/settlePrivateAuction/(:num)` via App\Modules\APIs\Controllers\ProjectsController::settlePrivateAuction, providing backend data/services for Projects consumers.

- [ ] **Projects – Update Project**
  - **Route**: `/API/Management/Projects/updateProject/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ProjectsController::updateProject`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Management/Projects/updateProject/(:num)` via App\Modules\APIs\Controllers\ProjectsController::updateProject, providing backend data/services for Projects consumers.

### Referral

- [ ] **Referral – Bulk Delete**
  - **Route**: `/API/Referrals/bulk-delete`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ReferralController::bulkDelete`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Referrals/bulk-delete` via App\Modules\APIs\Controllers\ReferralController::bulkDelete, providing backend data/services for Referral consumers.

- [ ] **Referral – Bulk Update Status**
  - **Route**: `/API/Referrals/bulk-update-status`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\ReferralController::bulkUpdateStatus`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Referrals/bulk-update-status` via App\Modules\APIs\Controllers\ReferralController::bulkUpdateStatus, providing backend data/services for Referral consumers.

### Search

- [ ] **Search – Search**
  - **Route**: `/Search`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\SearchController::index`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/Search` via App\Modules\APIs\Controllers\SearchController::index, providing backend data/services for Search consumers.

### Solana

- [ ] **Solana – Get Assets Data**
  - **Route**: `/API/Solana/getAssetsData`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::getAssetsData`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Solana/getAssetsData` via App\Modules\APIs\Controllers\SolanaController::getAssetsData, providing backend data/services for Solana consumers.

- [ ] **Solana – Get Coin Amount**
  - **Route**: `/API/Solana/getCoinAmount/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::getCoinAmount`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Solana/getCoinAmount/(:segment)` via App\Modules\APIs\Controllers\SolanaController::getCoinAmount, providing backend data/services for Solana consumers.

- [ ] **Solana – Get Exchange Price**
  - **Route**: `/API/Solana/getExchangePrice/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::getExchangePrice`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Solana/getExchangePrice/(:segment)` via App\Modules\APIs\Controllers\SolanaController::getExchangePrice, providing backend data/services for Solana consumers.

- [ ] **Solana – Get Market Price**
  - **Route**: `/API/Solana/getMarketPrice`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::getMarketPrice`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Solana/getMarketPrice` via App\Modules\APIs\Controllers\SolanaController::getMarketPrice, providing backend data/services for Solana consumers.

- [ ] **Solana – Get**
  - **Route**: `/API/Solana/getMarketPrice/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::get`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Solana/getMarketPrice/(:segment)` via App\Modules\APIs\Controllers\SolanaController::get, providing backend data/services for Solana consumers.

- [ ] **Solana – Get Token Price**
  - **Route**: `/API/Solana/getTokenPrice/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::getTokenPrice`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Solana/getTokenPrice/(:segment)` via App\Modules\APIs\Controllers\SolanaController::getTokenPrice, providing backend data/services for Solana consumers.

- [ ] **Solana – Health**
  - **Route**: `/API/Solana/health`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::health`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Solana/health` via App\Modules\APIs\Controllers\SolanaController::health, providing backend data/services for Solana consumers.

- [ ] **Solana – Provision Default Wallet**
  - **Route**: `/API/Solana/provisionDefaultWallet`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::provisionDefaultWallet`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Solana/provisionDefaultWallet` via App\Modules\APIs\Controllers\SolanaController::provisionDefaultWallet, providing backend data/services for Solana consumers.

- [ ] **Solana – Swap**
  - **Route**: `/API/Solana/swap/execute`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::swap`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Solana/swap/execute` via App\Modules\APIs\Controllers\SolanaController::swap, providing backend data/services for Solana consumers.

- [ ] **Solana – Quote**
  - **Route**: `/API/Solana/swap/quote`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::quote`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Solana/swap/quote` via App\Modules\APIs\Controllers\SolanaController::quote, providing backend data/services for Solana consumers.

- [ ] **Solana – Create Token**
  - **Route**: `/API/Solana/token/create`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::createToken`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Solana/token/create` via App\Modules\APIs\Controllers\SolanaController::createToken, providing backend data/services for Solana consumers.

- [ ] **Solana – Mint**
  - **Route**: `/API/Solana/token/mint`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::mint`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Solana/token/mint` via App\Modules\APIs\Controllers\SolanaController::mint, providing backend data/services for Solana consumers.

- [ ] **Solana – Transfer**
  - **Route**: `/API/Solana/transfer`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::transfer`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Solana/transfer` via App\Modules\APIs\Controllers\SolanaController::transfer, providing backend data/services for Solana consumers.

- [ ] **Solana – Update Solana Prices**
  - **Route**: `/API/Solana/updatePrices`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::updateSolanaPrices`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Solana/updatePrices` via App\Modules\APIs\Controllers\SolanaController::updateSolanaPrices, providing backend data/services for Solana consumers.

- [ ] **Solana – Update Solana Tokens**
  - **Route**: `/API/Solana/updateTokens`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::updateSolanaTokens`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Solana/updateTokens` via App\Modules\APIs\Controllers\SolanaController::updateSolanaTokens, providing backend data/services for Solana consumers.

- [ ] **Solana – Get Balance**
  - **Route**: `/API/Solana/wallet/(:segment)/balance`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::getBalance`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Solana/wallet/(:segment)/balance` via App\Modules\APIs\Controllers\SolanaController::getBalance, providing backend data/services for Solana consumers.

- [ ] **Solana – Get Token Accounts**
  - **Route**: `/API/Solana/wallet/(:segment)/tokens`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\SolanaController::getTokenAccounts`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Solana/wallet/(:segment)/tokens` via App\Modules\APIs\Controllers\SolanaController::getTokenAccounts, providing backend data/services for Solana consumers.

### Support

- [ ] **Support – Kb**
  - **Route**: `/API/Support/Support/kb`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\SupportController::kb`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Support/Support/kb` via App\Modules\APIs\Controllers\SupportController::kb, providing backend data/services for Support consumers.

- [ ] **Support – Kb Article**
  - **Route**: `/API/Support/Support/kb/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\SupportController::kbArticle`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Support/Support/kb/(:segment)` via App\Modules\APIs\Controllers\SupportController::kbArticle, providing backend data/services for Support consumers.

### User

- [ ] **User – Add Comment**
  - **Route**: `/API/User/Comments/Add`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\APIs\Controllers\UserController::addComment`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/API/User/Comments/Add` via App\Modules\APIs\Controllers\UserController::addComment, providing backend data/services for User consumers.

### Wallets

- [ ] **Wallets – Wallets**
  - **Route**: `/API/Wallets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::index`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Wallets` via App\Modules\APIs\Controllers\WalletsController::index, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Wallets**
  - **Route**: `/API/Wallets/(:segment)/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::index`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Wallets/(:segment)/(:segment)` via App\Modules\APIs\Controllers\WalletsController::index, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Update Bank**
  - **Route**: `/API/Wallets/Banking/Update/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::updateBank`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Wallets/Banking/Update/(:num)` via App\Modules\APIs\Controllers\WalletsController::updateBank, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Create**
  - **Route**: `/API/Wallets/Create`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::create`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Wallets/Create` via App\Modules\APIs\Controllers\WalletsController::create, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Update Credit**
  - **Route**: `/API/Wallets/Credit/Update/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::updateCredit`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Wallets/Credit/Update/(:num)` via App\Modules\APIs\Controllers\WalletsController::updateCredit, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Update Crypto**
  - **Route**: `/API/Wallets/Crypto/Update/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::updateCrypto`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Wallets/Crypto/Update/(:num)` via App\Modules\APIs\Controllers\WalletsController::updateCrypto, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Update Debt**
  - **Route**: `/API/Wallets/Debt/Update/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::updateDebt`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Wallets/Debt/Update/(:num)` via App\Modules\APIs\Controllers\WalletsController::updateDebt, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Update Investment**
  - **Route**: `/API/Wallets/Investments/Update/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::updateInvestment`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Wallets/Investments/Update/(:num)` via App\Modules\APIs\Controllers\WalletsController::updateInvestment, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Link Robinhood**
  - **Route**: `/API/Wallets/Link-Robinhood`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::linkRobinhood`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Wallets/Link-Robinhood` via App\Modules\APIs\Controllers\WalletsController::linkRobinhood, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Link Snap Trade**
  - **Route**: `/API/Wallets/Link-Snaptrade`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::linkSnapTrade`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Wallets/Link-Snaptrade` via App\Modules\APIs\Controllers\WalletsController::linkSnapTrade, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Plaid Config Debug**
  - **Route**: `/API/Wallets/Plaid/Config-Debug`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::plaidConfigDebug`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Wallets/Plaid/Config-Debug` via App\Modules\APIs\Controllers\WalletsController::plaidConfigDebug, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Plaid Env**
  - **Route**: `/API/Wallets/Plaid/Env`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::plaidEnv`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Wallets/Plaid/Env` via App\Modules\APIs\Controllers\WalletsController::plaidEnv, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Plaid Exchange**
  - **Route**: `/API/Wallets/Plaid/Exchange`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::plaidExchange`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Wallets/Plaid/Exchange` via App\Modules\APIs\Controllers\WalletsController::plaidExchange, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Plaid Link Token**
  - **Route**: `/API/Wallets/Plaid/Link-Token`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::plaidLinkToken`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Wallets/Plaid/Link-Token` via App\Modules\APIs\Controllers\WalletsController::plaidLinkToken, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Plaid Oauth Return**
  - **Route**: `/API/Wallets/Plaid/OAuth-Return`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::plaidOAuthReturn`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Wallets/Plaid/OAuth-Return` via App\Modules\APIs\Controllers\WalletsController::plaidOAuthReturn, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Plaid Webhook**
  - **Route**: `/API/Wallets/Plaid/Webhook`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::plaidWebhook`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Wallets/Plaid/Webhook` via App\Modules\APIs\Controllers\WalletsController::plaidWebhook, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Get Snap Trade Connect Url**
  - **Route**: `/API/Wallets/Snaptrade/Connect-URL`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::getSnapTradeConnectUrl`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/API/Wallets/Snaptrade/Connect-URL` via App\Modules\APIs\Controllers\WalletsController::getSnapTradeConnectUrl, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Unlink**
  - **Route**: `/API/Wallets/Unlink/(:num)`
  - **Methods**: `DELETE`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::unlink`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles DELETE requests to `/API/Wallets/Unlink/(:num)` via App\Modules\APIs\Controllers\WalletsController::unlink, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Update**
  - **Route**: `/API/Wallets/Update/(:num)`
  - **Methods**: `PUT`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::update`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles PUT requests to `/API/Wallets/Update/(:num)` via App\Modules\APIs\Controllers\WalletsController::update, providing backend data/services for Wallets consumers.

- [ ] **Wallets – Providers**
  - **Route**: `/API/Wallets/providers`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\APIs\Controllers\WalletsController::providers`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/API/Wallets/providers` via App\Modules\APIs\Controllers\WalletsController::providers, providing backend data/services for Wallets consumers.


## Advertise Module

### Features

- [ ] **Features – Features**
  - **Route**: `/Features`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Advertise\Controllers\Features::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Features` via App\Modules\Advertise\Controllers\Features::index, sharing public-facing marketing or content.

- [ ] **Features – Brokerage Integrations**
  - **Route**: `/Features/Brokerage-Integrations`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Advertise\Controllers\Features::BrokerageIntegrations`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Features/Brokerage-Integrations` via App\Modules\Advertise\Controllers\Features::BrokerageIntegrations, sharing public-facing marketing or content.

### HowItWorks

- [ ] **HowItWorks – My Migold**
  - **Route**: `/Features/MyMI-Gold`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Advertise\Controllers\HowItWorks::MyMIGold`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Features/MyMI-Gold` via App\Modules\Advertise\Controllers\HowItWorks::MyMIGold, sharing public-facing marketing or content.


## Api Module

### Health

- [ ] **Health – Health**
  - **Route**: `/api/health`
  - **Methods**: `GET`
  - **Controller**: `Api\HealthController::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/api/health` via Api\HealthController::index, sharing public-facing marketing or content.


## AuctionsController Module

### Auctions

- [ ] **Auctions – Auctions**
  - **Route**: `/Auctions`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuctionsController::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Auctions` via App\Controllers\AuctionsController::index, sharing public-facing marketing or content.

- [ ] **Auctions – Bid**
  - **Route**: `/Auctions/Bid/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuctionsController::bid`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles POST requests to `/Auctions/Bid/(:num)` via App\Controllers\AuctionsController::bid, sharing public-facing marketing or content.

- [ ] **Auctions – Create**
  - **Route**: `/Auctions/Create`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuctionsController::create`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles POST requests to `/Auctions/Create` via App\Controllers\AuctionsController::create, sharing public-facing marketing or content.

- [ ] **Auctions – Item**
  - **Route**: `/Auctions/Item/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuctionsController::item`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Auctions/Item/(:num)` via App\Controllers\AuctionsController::item, sharing public-facing marketing or content.

- [ ] **Auctions – Poll**
  - **Route**: `/Auctions/Poll/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuctionsController::poll`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Auctions/Poll/(:num)` via App\Controllers\AuctionsController::poll, sharing public-facing marketing or content.


## AuthController Module

### Auth

- [ ] **Auth – Register**
  - **Route**: `/(:any)/register`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::register`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/(:any)/register` via App\Controllers\AuthController::register, handling account access and activation.

- [ ] **Auth – Attempt Register**
  - **Route**: `/(:any)/register`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuthController::attemptRegister`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles POST requests to `/(:any)/register` via App\Controllers\AuthController::attemptRegister, handling account access and activation.

- [ ] **Auth – Register**
  - **Route**: `/(:any)/register/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::register`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/(:any)/register/(:segment)` via App\Controllers\AuthController::register, handling account access and activation.

- [ ] **Auth – Attempt Register**
  - **Route**: `/(:any)/register/(:segment)`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuthController::attemptRegister`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles POST requests to `/(:any)/register/(:segment)` via App\Controllers\AuthController::attemptRegister, handling account access and activation.

- [ ] **Auth – Link Robinhood**
  - **Route**: `/Auth/link-robinhood`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuthController::linkRobinhood`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles POST requests to `/Auth/link-robinhood` via App\Controllers\AuthController::linkRobinhood, handling account access and activation.

- [ ] **Auth – Link Snap Trade**
  - **Route**: `/Auth/link-snaptrade`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuthController::linkSnapTrade`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles POST requests to `/Auth/link-snaptrade` via App\Controllers\AuthController::linkSnapTrade, handling account access and activation.

- [ ] **Auth – Activate Account**
  - **Route**: `/activate`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::activateAccount`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/activate` via App\Controllers\AuthController::activateAccount, handling account access and activation.

- [ ] **Auth – Activate Account**
  - **Route**: `/activate-account`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::activateAccount`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/activate-account` via App\Controllers\AuthController::activateAccount, handling account access and activation.

- [ ] **Auth – Activate Account**
  - **Route**: `/activate-account`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuthController::activateAccount`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles POST requests to `/activate-account` via App\Controllers\AuthController::activateAccount, handling account access and activation.

- [ ] **Auth – Activate Account**
  - **Route**: `/activate-account/(:segment)`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuthController::activateAccount`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles POST requests to `/activate-account/(:segment)` via App\Controllers\AuthController::activateAccount, handling account access and activation.

- [ ] **Auth – Link Provider**
  - **Route**: `/auth/link/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::linkProvider`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/auth/link/(:segment)` via App\Controllers\AuthController::linkProvider, handling account access and activation.

- [ ] **Auth – Redirect To Provider**
  - **Route**: `/auth/provider/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::redirectToProvider`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/auth/provider/(:segment)` via App\Controllers\AuthController::redirectToProvider, handling account access and activation.

- [ ] **Auth – Handle Provider Callback**
  - **Route**: `/auth/provider/(:segment)/callback`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::handleProviderCallback`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/auth/provider/(:segment)/callback` via App\Controllers\AuthController::handleProviderCallback, handling account access and activation.

- [ ] **Auth – Unlink Provider**
  - **Route**: `/auth/unlink/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::unlinkProvider`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/auth/unlink/(:segment)` via App\Controllers\AuthController::unlinkProvider, handling account access and activation.

- [ ] **Auth – Attempt Forgot**
  - **Route**: `/forgot`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuthController::attemptForgot`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles POST requests to `/forgot` via App\Controllers\AuthController::attemptForgot, handling account access and activation.

- [ ] **Auth – Forgot Password**
  - **Route**: `/forgot-password`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::forgotPassword`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/forgot-password` via App\Controllers\AuthController::forgotPassword, handling account access and activation.

- [ ] **Auth – Get2 Faqrcode**
  - **Route**: `/get2FAQRCode`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuthController::get2FAQRCode`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles POST requests to `/get2FAQRCode` via App\Controllers\AuthController::get2FAQRCode, handling account access and activation.

- [ ] **Auth – Login**
  - **Route**: `/login`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::login`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/login` via App\Controllers\AuthController::login, handling account access and activation.

- [ ] **Auth – Attempt Login**
  - **Route**: `/login`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuthController::attemptLogin`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles POST requests to `/login` via App\Controllers\AuthController::attemptLogin, handling account access and activation.

- [ ] **Auth – Logout**
  - **Route**: `/logout`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::logout`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/logout` via App\Controllers\AuthController::logout, handling account access and activation.

- [ ] **Auth – Logout**
  - **Route**: `/logout`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuthController::logout`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles POST requests to `/logout` via App\Controllers\AuthController::logout, handling account access and activation.

- [ ] **Auth – Register**
  - **Route**: `/register`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::register`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/register` via App\Controllers\AuthController::register, handling account access and activation.

- [ ] **Auth – Attempt Register**
  - **Route**: `/register`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuthController::attemptRegister`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles POST requests to `/register` via App\Controllers\AuthController::attemptRegister, handling account access and activation.

- [ ] **Auth – Register**
  - **Route**: `/register/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::register`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/register/(:segment)` via App\Controllers\AuthController::register, handling account access and activation.

- [ ] **Auth – Resend Activate Account**
  - **Route**: `/resend-activate-account`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::resendActivateAccount`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/resend-activate-account` via App\Controllers\AuthController::resendActivateAccount, handling account access and activation.

- [ ] **Auth – Resend Activation**
  - **Route**: `/resend-activation`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::resendActivation`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/resend-activation` via App\Controllers\AuthController::resendActivation, handling account access and activation.

- [ ] **Auth – Resend Activation Code**
  - **Route**: `/resend-activation`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuthController::resendActivationCode`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles POST requests to `/resend-activation` via App\Controllers\AuthController::resendActivationCode, handling account access and activation.

- [ ] **Auth – Reset Password**
  - **Route**: `/reset-password`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::resetPassword`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/reset-password` via App\Controllers\AuthController::resetPassword, handling account access and activation.

- [ ] **Auth – Attempt Reset**
  - **Route**: `/reset-password`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuthController::attemptReset`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles POST requests to `/reset-password` via App\Controllers\AuthController::attemptReset, handling account access and activation.

- [ ] **Auth – Create Temp User**
  - **Route**: `/test-create-user`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\AuthController::createTempUser`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles GET requests to `/test-create-user` via App\Controllers\AuthController::createTempUser, handling account access and activation.

- [ ] **Auth – Verify2 Facode**
  - **Route**: `/verify2FACode`
  - **Methods**: `POST`
  - **Controller**: `App\Controllers\AuthController::verify2FACode`
  - **Category**: Auth / Onboarding
  - **Status**: active
  - **Description**: Handles POST requests to `/verify2FACode` via App\Controllers\AuthController::verify2FACode, handling account access and activation.


## Blog Module

### Announcements

- [ ] **Announcements – Announcements**
  - **Route**: `/Announcements`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\AnnouncementsController::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Announcements` via App\Modules\Blog\Controllers\AnnouncementsController::index, sharing public-facing marketing or content.

### Blog

- [ ] **Blog – Blog**
  - **Route**: `/Blog`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\BlogController::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog` via App\Modules\Blog\Controllers\BlogController::index, sharing public-facing marketing or content.

- [ ] **Blog – View Blog**
  - **Route**: `/Blog/Post/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\BlogController::viewBlog`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/Post/(:segment)` via App\Modules\Blog\Controllers\BlogController::viewBlog, sharing public-facing marketing or content.

### Earnings

- [ ] **Earnings – Earnings**
  - **Route**: `/Blog/Earnings`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\EarningsController::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/Earnings` via App\Modules\Blog\Controllers\EarningsController::index, sharing public-facing marketing or content.

- [ ] **Earnings – View By Date**
  - **Route**: `/Blog/Earnings/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\EarningsController::viewByDate`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/Earnings/(:segment)` via App\Modules\Blog\Controllers\EarningsController::viewByDate, sharing public-facing marketing or content.

- [ ] **Earnings – View By Date**
  - **Route**: `/Blog/Earnings/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\EarningsController::viewByDate`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/Earnings/(:segment)` via App\Modules\Blog\Controllers\EarningsController::viewByDate, sharing public-facing marketing or content.

- [ ] **Earnings – Test**
  - **Route**: `/Blog/Earnings/Test`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\EarningsController::test`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/Earnings/Test` via App\Modules\Blog\Controllers\EarningsController::test, sharing public-facing marketing or content.

### HowItWorks

- [ ] **HowItWorks – How It Works**
  - **Route**: `/How-It-Works`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\HowItWorksController::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/How-It-Works` via App\Modules\Blog\Controllers\HowItWorksController::index, sharing public-facing marketing or content.

- [ ] **HowItWorks – How It Works**
  - **Route**: `/How-It-Works`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\HowItWorks::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/How-It-Works` via App\Modules\Blog\Controllers\HowItWorks::index, sharing public-facing marketing or content.

- [ ] **HowItWorks – Daily Financial News**
  - **Route**: `/How-It-Works/Daily-Financial-News`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\HowItWorksController::DailyFinancialNews`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/How-It-Works/Daily-Financial-News` via App\Modules\Blog\Controllers\HowItWorksController::DailyFinancialNews, sharing public-facing marketing or content.

- [ ] **HowItWorks – Determine Your Financial Goals**
  - **Route**: `/How-It-Works/Determining-Your-Financial-Goals`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\HowItWorksController::DetermineYourFinancialGoals`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/How-It-Works/Determining-Your-Financial-Goals` via App\Modules\Blog\Controllers\HowItWorksController::DetermineYourFinancialGoals, sharing public-facing marketing or content.

- [ ] **HowItWorks – Determine Your Financial Goals**
  - **Route**: `/How-It-Works/Determining-Your-Financial-Goals`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\HowItWorksController::DetermineYourFinancialGoals`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/How-It-Works/Determining-Your-Financial-Goals` via App\Modules\Blog\Controllers\HowItWorksController::DetermineYourFinancialGoals, sharing public-facing marketing or content.

- [ ] **HowItWorks – Investment Portfolio Management**
  - **Route**: `/How-It-Works/Investment-Portfolio-Management`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\HowItWorksController::InvestmentPortfolioManagement`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/How-It-Works/Investment-Portfolio-Management` via App\Modules\Blog\Controllers\HowItWorksController::InvestmentPortfolioManagement, sharing public-facing marketing or content.

- [ ] **HowItWorks – My Migold**
  - **Route**: `/How-It-Works/MyMI-Gold`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\HowItWorksController::MyMIGold`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/How-It-Works/MyMI-Gold` via App\Modules\Blog\Controllers\HowItWorksController::MyMIGold, sharing public-facing marketing or content.

- [ ] **HowItWorks – My Migold**
  - **Route**: `/How-It-Works/MyMI-Gold`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\HowItWorksController::MyMIGold`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/How-It-Works/MyMI-Gold` via App\Modules\Blog\Controllers\HowItWorksController::MyMIGold, sharing public-facing marketing or content.

- [ ] **HowItWorks – Personal Budgeting**
  - **Route**: `/How-It-Works/Personal-Budgeting`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\HowItWorksController::PersonalBudgeting`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/How-It-Works/Personal-Budgeting` via App\Modules\Blog\Controllers\HowItWorksController::PersonalBudgeting, sharing public-facing marketing or content.

- [ ] **HowItWorks – Personal Budgeting**
  - **Route**: `/How-It-Works/Personal-Budgeting`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\HowItWorksController::PersonalBudgeting`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/How-It-Works/Personal-Budgeting` via App\Modules\Blog\Controllers\HowItWorksController::PersonalBudgeting, sharing public-facing marketing or content.

- [ ] **HowItWorks – Purchase My Migold**
  - **Route**: `/How-It-Works/Purchase-MyMI-Gold`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\HowItWorksController::PurchaseMyMIGold`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/How-It-Works/Purchase-MyMI-Gold` via App\Modules\Blog\Controllers\HowItWorksController::PurchaseMyMIGold, sharing public-facing marketing or content.

- [ ] **HowItWorks – Purchase My Migold**
  - **Route**: `/How-It-Works/Purchase/MyMIGold`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\HowItWorksController::PurchaseMyMIGold`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/How-It-Works/Purchase/MyMIGold` via App\Modules\Blog\Controllers\HowItWorksController::PurchaseMyMIGold, sharing public-facing marketing or content.

- [ ] **HowItWorks – Registering An Account**
  - **Route**: `/How-It-Works/Registering-An-Account`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\HowItWorksController::RegisteringAnAccount`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/How-It-Works/Registering-An-Account` via App\Modules\Blog\Controllers\HowItWorksController::RegisteringAnAccount, sharing public-facing marketing or content.

- [ ] **HowItWorks – Registering An Account**
  - **Route**: `/How-It-Works/Registering-An-Account`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\HowItWorksController::RegisteringAnAccount`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/How-It-Works/Registering-An-Account` via App\Modules\Blog\Controllers\HowItWorksController::RegisteringAnAccount, sharing public-facing marketing or content.

### IRS

- [ ] **IRS – Irsexpanded Home Energy Tax Credits**
  - **Route**: `/Blog/IRS/IRS-Expanded-Home-Energy-Tax-Credits`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\IRSController::IRSExpandedHomeEnergyTaxCredits`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/IRS/IRS-Expanded-Home-Energy-Tax-Credits` via App\Modules\Blog\Controllers\IRSController::IRSExpandedHomeEnergyTaxCredits, sharing public-facing marketing or content.

### Investing

- [ ] **Investing – Irs**
  - **Route**: `/Blog/IRS`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\InvestingController::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/IRS` via App\Modules\Blog\Controllers\InvestingController::index, sharing public-facing marketing or content.

- [ ] **Investing – Investing**
  - **Route**: `/Blog/Investing`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\InvestingController::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/Investing` via App\Modules\Blog\Controllers\InvestingController::index, sharing public-facing marketing or content.

- [ ] **Investing – The Beginners Guide To Option Trading**
  - **Route**: `/Blog/Investing/The-Beginners-Guide-To-Option-Trading`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\InvestingController::TheBeginnersGuideToOptionTrading`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/Investing/The-Beginners-Guide-To-Option-Trading` via App\Modules\Blog\Controllers\InvestingController::TheBeginnersGuideToOptionTrading, sharing public-facing marketing or content.

- [ ] **Investing – The Fundamentals Of Investing**
  - **Route**: `/Blog/Investing/The-Fundamentals-Of-Investing`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\InvestingController::TheFundamentalsOfInvesting`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/Investing/The-Fundamentals-Of-Investing` via App\Modules\Blog\Controllers\InvestingController::TheFundamentalsOfInvesting, sharing public-facing marketing or content.

- [ ] **Investing – Tips For Effective Investment Portfolio Management**
  - **Route**: `/Blog/Investing/Tips-For-Effective-Investment-Portfolio-Management`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\InvestingController::TipsForEffectiveInvestmentPortfolioManagement`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/Investing/Tips-For-Effective-Investment-Portfolio-Management` via App\Modules\Blog\Controllers\InvestingController::TipsForEffectiveInvestmentPortfolioManagement, sharing public-facing marketing or content.

### NewsAndUpdates

- [ ] **NewsAndUpdates – News And Updates**
  - **Route**: `/Blog/News-And-Updates`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\NewsAndUpdates::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/News-And-Updates` via App\Modules\Blog\Controllers\NewsAndUpdates::index, sharing public-facing marketing or content.

- [ ] **NewsAndUpdates – Integrating With Plaid**
  - **Route**: `/Blog/News-And-Updates/Integrating-With-Plaid`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\NewsAndUpdates::IntegratingWithPlaid`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/News-And-Updates/Integrating-With-Plaid` via App\Modules\Blog\Controllers\NewsAndUpdates::IntegratingWithPlaid, sharing public-facing marketing or content.

- [ ] **NewsAndUpdates – The Roadmap To The Future Of Finance**
  - **Route**: `/Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\NewsAndUpdates::TheRoadmapToTheFutureOfFinance`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance` via App\Modules\Blog\Controllers\NewsAndUpdates::TheRoadmapToTheFutureOfFinance, sharing public-facing marketing or content.

### PersonalBudgeting

- [ ] **PersonalBudgeting – Personal Budgeting**
  - **Route**: `/Blog/Personal-Budgeting`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\PersonalBudgetingController::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/Personal-Budgeting` via App\Modules\Blog\Controllers\PersonalBudgetingController::index, sharing public-facing marketing or content.

- [ ] **PersonalBudgeting – The Importance Of Personal Financial Budgeting**
  - **Route**: `/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\PersonalBudgetingController::TheImportanceOfPersonalFinancialBudgeting`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/Personal-Budgeting/The-Importance-of-Personal-Financial-Budgeting` via App\Modules\Blog\Controllers\PersonalBudgetingController::TheImportanceOfPersonalFinancialBudgeting, sharing public-facing marketing or content.

### Subscribe

- [ ] **Subscribe – Subscribe**
  - **Route**: `/Subscribe`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\SubscribeController::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Subscribe` via App\Modules\Blog\Controllers\SubscribeController::index, sharing public-facing marketing or content.

- [ ] **Subscribe – Daily Financial News**
  - **Route**: `/Subscribe/Daily-Financial-News`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\SubscribeController::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Subscribe/Daily-Financial-News` via App\Modules\Blog\Controllers\SubscribeController::index, sharing public-facing marketing or content.

- [ ] **Subscribe – Submit**
  - **Route**: `/Subscribe/Submit`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\SubscribeController::submit`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Subscribe/Submit` via App\Modules\Blog\Controllers\SubscribeController::submit, sharing public-facing marketing or content.

### Updates

- [ ] **Updates – News And Updates**
  - **Route**: `/Blog/News-And-Updates`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\UpdatesController::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/News-And-Updates` via App\Modules\Blog\Controllers\UpdatesController::index, sharing public-facing marketing or content.

- [ ] **Updates – Integrating With Plaid**
  - **Route**: `/Blog/News-And-Updates/Integrating-With-Plaid`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\UpdatesController::IntegratingWithPlaid`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/News-And-Updates/Integrating-With-Plaid` via App\Modules\Blog\Controllers\UpdatesController::IntegratingWithPlaid, sharing public-facing marketing or content.

- [ ] **Updates – The Roadmap To The Future Of Finance**
  - **Route**: `/Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Blog\Controllers\UpdatesController::TheRoadmapToTheFutureOfFinance`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Blog/News-And-Updates/The-Roadmap-To-The-Future-Of-Finance` via App\Modules\Blog\Controllers\UpdatesController::TheRoadmapToTheFutureOfFinance, sharing public-facing marketing or content.


## Debug Module

### CommonData

- [ ] **CommonData – Smoke**
  - **Route**: `/debug/common-data/smoke`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Debug\CommonDataController::smoke`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/debug/common-data/smoke` via App\Controllers\Debug\CommonDataController::smoke, sharing public-facing marketing or content.

### Debug

- [ ] **Debug – Whoami**
  - **Route**: `/Debug/whoami`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Debug::whoami`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Debug/whoami` via App\Controllers\Debug::whoami, sharing public-facing marketing or content.


## Dev Module

### BitcoinTest

- [ ] **BitcoinTest – Bitcoin Test**
  - **Route**: `/Dev/BitcoinTest`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Dev\BitcoinTest::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Dev/BitcoinTest` via App\Controllers\Dev\BitcoinTest::index, sharing public-facing marketing or content.


## Exchange Module

### DigiByte

- [ ] **DigiByte – Connect Wallet**
  - **Route**: `/Exchange/DigiByte/connectWallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\DigiByteController::connectWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/DigiByte/connectWallet` via App\Modules\Exchange\Controllers\DigiByteController::connectWallet, helping signed-in users work within the DigiByte tools.

- [ ] **DigiByte – Create Wallet**
  - **Route**: `/Exchange/DigiByte/createWallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\DigiByteController::createWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/DigiByte/createWallet` via App\Modules\Exchange\Controllers\DigiByteController::createWallet, helping signed-in users work within the DigiByte tools.

- [ ] **DigiByte – Disconnect Wallet**
  - **Route**: `/Exchange/DigiByte/disconnectWallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\DigiByteController::disconnectWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/DigiByte/disconnectWallet` via App\Modules\Exchange\Controllers\DigiByteController::disconnectWallet, helping signed-in users work within the DigiByte tools.

- [ ] **DigiByte – Fetch Frontend Data**
  - **Route**: `/Exchange/DigiByte/fetchFrontendData`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\DigiByteController::fetchFrontendData`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/DigiByte/fetchFrontendData` via App\Modules\Exchange\Controllers\DigiByteController::fetchFrontendData, helping signed-in users work within the DigiByte tools.

- [ ] **DigiByte – Get Assets**
  - **Route**: `/Exchange/DigiByte/getAssets`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\DigiByteController::getAssets`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/DigiByte/getAssets` via App\Modules\Exchange\Controllers\DigiByteController::getAssets, helping signed-in users work within the DigiByte tools.

- [ ] **DigiByte – Provision Default Wallet**
  - **Route**: `/Exchange/DigiByte/provisionDefaultWallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\DigiByteController::provisionDefaultWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/DigiByte/provisionDefaultWallet` via App\Modules\Exchange\Controllers\DigiByteController::provisionDefaultWallet, helping signed-in users work within the DigiByte tools.

- [ ] **DigiByte – Refresh Wallet**
  - **Route**: `/Exchange/DigiByte/refreshWallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\DigiByteController::refreshWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/DigiByte/refreshWallet` via App\Modules\Exchange\Controllers\DigiByteController::refreshWallet, helping signed-in users work within the DigiByte tools.

### Exchange

- [ ] **Exchange – Exchange**
  - **Route**: `/Exchange`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Exchange\Controllers\ExchangeController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Exchange` via App\Modules\Exchange\Controllers\ExchangeController::index, helping signed-in users work within the Exchange tools.

### MetaMask

- [ ] **MetaMask – Meta Mask**
  - **Route**: `/Exchange/MetaMask`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Exchange/MetaMask` via App\Modules\Exchange\Controllers\MetaMaskController::index, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Call Contract Function**
  - **Route**: `/Exchange/MetaMask/callContractFunction`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::callContractFunction`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/callContractFunction` via App\Modules\Exchange\Controllers\MetaMaskController::callContractFunction, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Connect Wallet**
  - **Route**: `/Exchange/MetaMask/connectWallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::connectWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/connectWallet` via App\Modules\Exchange\Controllers\MetaMaskController::connectWallet, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Deploy Contract**
  - **Route**: `/Exchange/MetaMask/deployContract`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::deployContract`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/deployContract` via App\Modules\Exchange\Controllers\MetaMaskController::deployContract, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Disconnect Wallet**
  - **Route**: `/Exchange/MetaMask/disconnectWallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::disconnectWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/disconnectWallet` via App\Modules\Exchange\Controllers\MetaMaskController::disconnectWallet, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Estimate Transaction Fee**
  - **Route**: `/Exchange/MetaMask/estimateTransactionFee`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::estimateTransactionFee`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/estimateTransactionFee` via App\Modules\Exchange\Controllers\MetaMaskController::estimateTransactionFee, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Generate Wallet**
  - **Route**: `/Exchange/MetaMask/generateWallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::generateWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/generateWallet` via App\Modules\Exchange\Controllers\MetaMaskController::generateWallet, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Get Assets**
  - **Route**: `/Exchange/MetaMask/getAssets`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::getAssets`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/getAssets` via App\Modules\Exchange\Controllers\MetaMaskController::getAssets, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Get Balance**
  - **Route**: `/Exchange/MetaMask/getBalance`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::getBalance`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/getBalance` via App\Modules\Exchange\Controllers\MetaMaskController::getBalance, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Get Current Block**
  - **Route**: `/Exchange/MetaMask/getCurrentBlock`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::getCurrentBlock`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/getCurrentBlock` via App\Modules\Exchange\Controllers\MetaMaskController::getCurrentBlock, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Get Network Status**
  - **Route**: `/Exchange/MetaMask/getNetworkStatus`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::getNetworkStatus`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/getNetworkStatus` via App\Modules\Exchange\Controllers\MetaMaskController::getNetworkStatus, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Get Transaction Status**
  - **Route**: `/Exchange/MetaMask/getTransactionStatus`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::getTransactionStatus`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/getTransactionStatus` via App\Modules\Exchange\Controllers\MetaMaskController::getTransactionStatus, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Refresh Wallet**
  - **Route**: `/Exchange/MetaMask/refreshWallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::refreshWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/refreshWallet` via App\Modules\Exchange\Controllers\MetaMaskController::refreshWallet, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Send Asset**
  - **Route**: `/Exchange/MetaMask/sendAsset`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::sendAsset`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/sendAsset` via App\Modules\Exchange\Controllers\MetaMaskController::sendAsset, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Sign Transaction**
  - **Route**: `/Exchange/MetaMask/signTransaction`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::signTransaction`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/signTransaction` via App\Modules\Exchange\Controllers\MetaMaskController::signTransaction, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Validate Address**
  - **Route**: `/Exchange/MetaMask/validateAddress`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::validateAddress`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/validateAddress` via App\Modules\Exchange\Controllers\MetaMaskController::validateAddress, helping signed-in users work within the MetaMask tools.

- [ ] **MetaMask – Verify Signature**
  - **Route**: `/Exchange/MetaMask/verifySignature`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\MetaMaskController::verifySignature`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/MetaMask/verifySignature` via App\Modules\Exchange\Controllers\MetaMaskController::verifySignature, helping signed-in users work within the MetaMask tools.

### Solana

- [ ] **Solana – Solana**
  - **Route**: `/Exchange/Solana`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Exchange/Solana` via App\Modules\Exchange\Controllers\SolanaController::index, helping signed-in users work within the Solana tools.

- [ ] **Solana – Assets**
  - **Route**: `/Exchange/Solana/Assets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::assets`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Exchange/Solana/Assets` via App\Modules\Exchange\Controllers\SolanaController::assets, helping signed-in users work within the Solana tools.

- [ ] **Solana – Create**
  - **Route**: `/Exchange/Solana/Create`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::create`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Exchange/Solana/Create` via App\Modules\Exchange\Controllers\SolanaController::create, helping signed-in users work within the Solana tools.

- [ ] **Solana – Create**
  - **Route**: `/Exchange/Solana/Create/Wallet`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::create`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Exchange/Solana/Create/Wallet` via App\Modules\Exchange\Controllers\SolanaController::create, helping signed-in users work within the Solana tools.

- [ ] **Solana – Create**
  - **Route**: `/Exchange/Solana/Create/Wallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::create`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Solana/Create/Wallet` via App\Modules\Exchange\Controllers\SolanaController::create, helping signed-in users work within the Solana tools.

- [ ] **Solana – Import**
  - **Route**: `/Exchange/Solana/Import`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::import`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Exchange/Solana/Import` via App\Modules\Exchange\Controllers\SolanaController::import, helping signed-in users work within the Solana tools.

- [ ] **Solana – Import Wallet**
  - **Route**: `/Exchange/Solana/Import/Wallet`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::importWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Exchange/Solana/Import/Wallet` via App\Modules\Exchange\Controllers\SolanaController::importWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Import Wallet**
  - **Route**: `/Exchange/Solana/Import/Wallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::importWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Solana/Import/Wallet` via App\Modules\Exchange\Controllers\SolanaController::importWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Coin Swap**
  - **Route**: `/Exchange/Solana/Swap`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::coinSwap`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Exchange/Solana/Swap` via App\Modules\Exchange\Controllers\SolanaController::coinSwap, helping signed-in users work within the Solana tools.

- [ ] **Solana – Test Page**
  - **Route**: `/Exchange/Solana/Test-Page`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::testPage`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Exchange/Solana/Test-Page` via App\Modules\Exchange\Controllers\SolanaController::testPage, helping signed-in users work within the Solana tools.

- [ ] **Solana – Connect Wallet**
  - **Route**: `/Exchange/Solana/Wallet/Connect`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::connectWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Solana/Wallet/Connect` via App\Modules\Exchange\Controllers\SolanaController::connectWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Disconnect Wallet**
  - **Route**: `/Exchange/Solana/Wallet/Disconnect`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::disconnectWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Solana/Wallet/Disconnect` via App\Modules\Exchange\Controllers\SolanaController::disconnectWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Disconnect Wallet**
  - **Route**: `/Exchange/Solana/Wallet/Disconnect/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::disconnectWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Exchange/Solana/Wallet/Disconnect/(:segment)` via App\Modules\Exchange\Controllers\SolanaController::disconnectWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Execute Swap**
  - **Route**: `/Exchange/Solana/Wallet/Execute-Swap`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::executeSwap`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Exchange/Solana/Wallet/Execute-Swap` via App\Modules\Exchange\Controllers\SolanaController::executeSwap, helping signed-in users work within the Solana tools.

- [ ] **Solana – Execute Swap**
  - **Route**: `/Exchange/Solana/Wallet/Execute-Swap`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::executeSwap`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Solana/Wallet/Execute-Swap` via App\Modules\Exchange\Controllers\SolanaController::executeSwap, helping signed-in users work within the Solana tools.

- [ ] **Solana – Refresh Wallet**
  - **Route**: `/Exchange/Solana/Wallet/Refresh`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::refreshWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Solana/Wallet/Refresh` via App\Modules\Exchange\Controllers\SolanaController::refreshWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Verify Wallet Ownership**
  - **Route**: `/Exchange/Solana/Wallet/Verify-Ownership`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::verifyWalletOwnership`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Exchange/Solana/Wallet/Verify-Ownership` via App\Modules\Exchange\Controllers\SolanaController::verifyWalletOwnership, helping signed-in users work within the Solana tools.

- [ ] **Solana – Verify Wallet Ownership**
  - **Route**: `/Exchange/Solana/Wallet/Verify-Ownership`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::verifyWalletOwnership`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Solana/Wallet/Verify-Ownership` via App\Modules\Exchange\Controllers\SolanaController::verifyWalletOwnership, helping signed-in users work within the Solana tools.

- [ ] **Solana – View Assets**
  - **Route**: `/Exchange/Solana/Wallet/ViewAssets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::viewAssets`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Exchange/Solana/Wallet/ViewAssets` via App\Modules\Exchange\Controllers\SolanaController::viewAssets, helping signed-in users work within the Solana tools.

- [ ] **Solana – View Assets**
  - **Route**: `/Exchange/Solana/Wallet/ViewAssets`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::viewAssets`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Solana/Wallet/ViewAssets` via App\Modules\Exchange\Controllers\SolanaController::viewAssets, helping signed-in users work within the Solana tools.

- [ ] **Solana – Create Solana Wallet**
  - **Route**: `/Exchange/Solana/createSolanaWallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::createSolanaWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Solana/createSolanaWallet` via App\Modules\Exchange\Controllers\SolanaController::createSolanaWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Fetch Frontend Data**
  - **Route**: `/Exchange/Solana/fetchFrontendData`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::fetchFrontendData`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Solana/fetchFrontendData` via App\Modules\Exchange\Controllers\SolanaController::fetchFrontendData, helping signed-in users work within the Solana tools.

- [ ] **Solana – Provision Default Wallet**
  - **Route**: `/Exchange/Solana/provisionDefaultWallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::provisionDefaultWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Solana/provisionDefaultWallet` via App\Modules\Exchange\Controllers\SolanaController::provisionDefaultWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Update Solana Prices**
  - **Route**: `/Exchange/Solana/updatePrices`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::updateSolanaPrices`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Solana/updatePrices` via App\Modules\Exchange\Controllers\SolanaController::updateSolanaPrices, helping signed-in users work within the Solana tools.

- [ ] **Solana – Update Solana Tokens**
  - **Route**: `/Exchange/Solana/updateTokens`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::updateSolanaTokens`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Solana/updateTokens` via App\Modules\Exchange\Controllers\SolanaController::updateSolanaTokens, helping signed-in users work within the Solana tools.

- [ ] **Solana – Connect Wallet**
  - **Route**: `/Exchange/Wallet/Connect/MetaMask`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::connectWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Wallet/Connect/MetaMask` via App\Modules\Exchange\Controllers\SolanaController::connectWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Connect Wallet**
  - **Route**: `/Exchange/Wallet/Connect/Phantom`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::connectWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Wallet/Connect/Phantom` via App\Modules\Exchange\Controllers\SolanaController::connectWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Connect Wallet**
  - **Route**: `/Exchange/Wallet/Connect/Solflare`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::connectWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Wallet/Connect/Solflare` via App\Modules\Exchange\Controllers\SolanaController::connectWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Connect Wallet**
  - **Route**: `/Exchange/Wallet/Connect/TrustWallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::connectWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Wallet/Connect/TrustWallet` via App\Modules\Exchange\Controllers\SolanaController::connectWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Disconnect Wallet**
  - **Route**: `/Exchange/Wallet/Disconnect/MetaMask`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::disconnectWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Wallet/Disconnect/MetaMask` via App\Modules\Exchange\Controllers\SolanaController::disconnectWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Disconnect Wallet**
  - **Route**: `/Exchange/Wallet/Disconnect/Phantom`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::disconnectWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Wallet/Disconnect/Phantom` via App\Modules\Exchange\Controllers\SolanaController::disconnectWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Disconnect Wallet**
  - **Route**: `/Exchange/Wallet/Disconnect/Solflare`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::disconnectWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Wallet/Disconnect/Solflare` via App\Modules\Exchange\Controllers\SolanaController::disconnectWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Disconnect Wallet**
  - **Route**: `/Exchange/Wallet/Disconnect/TrustWallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::disconnectWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Wallet/Disconnect/TrustWallet` via App\Modules\Exchange\Controllers\SolanaController::disconnectWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Refresh Wallet**
  - **Route**: `/Exchange/Wallet/Refresh/MetaMask`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::refreshWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Wallet/Refresh/MetaMask` via App\Modules\Exchange\Controllers\SolanaController::refreshWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Refresh Wallet**
  - **Route**: `/Exchange/Wallet/Refresh/Phantom`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::refreshWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Wallet/Refresh/Phantom` via App\Modules\Exchange\Controllers\SolanaController::refreshWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Refresh Wallet**
  - **Route**: `/Exchange/Wallet/Refresh/Solflare`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::refreshWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Wallet/Refresh/Solflare` via App\Modules\Exchange\Controllers\SolanaController::refreshWallet, helping signed-in users work within the Solana tools.

- [ ] **Solana – Refresh Wallet**
  - **Route**: `/Exchange/Wallet/Refresh/TrustWallet`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Exchange\Controllers\SolanaController::refreshWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Exchange/Wallet/Refresh/TrustWallet` via App\Modules\Exchange\Controllers\SolanaController::refreshWallet, helping signed-in users work within the Solana tools.


## Health Module

### Health

- [ ] **Health – Health**
  - **Route**: `/health`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Health::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/health` via App\Controllers\Health::index, sharing public-facing marketing or content.

- [ ] **Health – Status**
  - **Route**: `/status`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Health::status`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/status` via App\Controllers\Health::status, sharing public-facing marketing or content.


## Home Module

### Home

- [ ] **Home – Home**
  - **Route**: `/`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Home::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/` via App\Controllers\Home::index, sharing public-facing marketing or content.

- [ ] **Home – Apex Referral**
  - **Route**: `/Apex/Referral`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Home::apexReferral`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Apex/Referral` via App\Controllers\Home::apexReferral, sharing public-facing marketing or content.

- [ ] **Home – Apex Referral**
  - **Route**: `/Apex/Referral/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Home::apexReferral`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Apex/Referral/(:segment)` via App\Controllers\Home::apexReferral, sharing public-facing marketing or content.

- [ ] **Home – Corporate Earnings**
  - **Route**: `/Corporate-Earnings`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Home::corporateEarnings`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Corporate-Earnings` via App\Controllers\Home::corporateEarnings, sharing public-facing marketing or content.

- [ ] **Home – Corporate Earnings**
  - **Route**: `/Corporate-Earnings/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Home::corporateEarnings`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Corporate-Earnings/(:segment)` via App\Controllers\Home::corporateEarnings, sharing public-facing marketing or content.

- [ ] **Home – Economic Calendar**
  - **Route**: `/Economic-Calendar`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Home::economicCalendar`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Economic-Calendar` via App\Controllers\Home::economicCalendar, sharing public-facing marketing or content.

- [ ] **Home – Economic Calendar Content**
  - **Route**: `/Economic-Calendar/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Home::economicCalendarContent`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Economic-Calendar/(:segment)` via App\Controllers\Home::economicCalendarContent, sharing public-facing marketing or content.

- [ ] **Home – Getting Started**
  - **Route**: `/Getting-Started`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Home::gettingStarted`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Getting-Started` via App\Controllers\Home::gettingStarted, sharing public-facing marketing or content.

- [ ] **Home – Getting Started**
  - **Route**: `/Getting-Started/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Home::gettingStarted`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Getting-Started/(:segment)` via App\Controllers\Home::gettingStarted, sharing public-facing marketing or content.

- [ ] **Home – Getting Started**
  - **Route**: `/Getting-Started/(:segment)/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Home::gettingStarted`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Getting-Started/(:segment)/(:segment)` via App\Controllers\Home::gettingStarted, sharing public-facing marketing or content.

- [ ] **Home – Memberships**
  - **Route**: `/Memberships`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Home::memberships`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Memberships` via App\Controllers\Home::memberships, sharing public-facing marketing or content.

- [ ] **Home – Memberships**
  - **Route**: `/Memberships/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Home::memberships`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Memberships/(:segment)` via App\Controllers\Home::memberships, sharing public-facing marketing or content.

- [ ] **Home – Preview Alert**
  - **Route**: `/Preview/Alert/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Home::previewAlert`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Preview/Alert/(:segment)` via App\Controllers\Home::previewAlert, sharing public-facing marketing or content.

- [ ] **Home – Privacy Policy**
  - **Route**: `/Privacy-Policy`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Home::privacyPolicy`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Privacy-Policy` via App\Controllers\Home::privacyPolicy, sharing public-facing marketing or content.

- [ ] **Home – Terms Of Service**
  - **Route**: `/Terms-Of-Service`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Home::termsOfService`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/Terms-Of-Service` via App\Controllers\Home::termsOfService, sharing public-facing marketing or content.


## Management Module

### Admin

- [ ] **Admin – Admin**
  - **Route**: `/Management/Admin`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\AdminController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Admin` via App\Modules\Management\Controllers\AdminController::index, supporting staff workflows for Admin.

### Alerts

- [ ] **Alerts – Alerts**
  - **Route**: `/Management/Alerts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\AlertsController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Alerts` via App\Modules\Management\Controllers\AlertsController::index, supporting staff workflows for Alerts.

- [ ] **Alerts – Add**
  - **Route**: `/Management/Alerts/Add/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\AlertsController::add`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Alerts/Add/(:segment)` via App\Modules\Management\Controllers\AlertsController::add, supporting staff workflows for Alerts.

- [ ] **Alerts – Advisor Media**
  - **Route**: `/Management/Alerts/Advisor/Media`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\AlertsController::advisorMedia`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Alerts/Advisor/Media` via App\Modules\Management\Controllers\AlertsController::advisorMedia, supporting staff workflows for Alerts.

- [ ] **Alerts – Audit Email Scraper**
  - **Route**: `/Management/Alerts/Audit/Emails`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\Management\Controllers\AlertsController::auditEmailScraper`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Management/Alerts/Audit/Emails` via App\Modules\Management\Controllers\AlertsController::auditEmailScraper, supporting staff workflows for Alerts.

- [ ] **Alerts – Stock Overview**
  - **Route**: `/Management/Alerts/Crypto/(:segment)/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `Management\AlertsController::stockOverview`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Alerts/Crypto/(:segment)/(:segment)` via Management\AlertsController::stockOverview, supporting staff workflows for Alerts.

- [ ] **Alerts – Fetch Ticker Details**
  - **Route**: `/Management/Alerts/Fetch/Ticker/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\AlertsController::fetchTickerDetails`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Alerts/Fetch/Ticker/(:segment)` via App\Modules\Management\Controllers\AlertsController::fetchTickerDetails, supporting staff workflows for Alerts.

- [ ] **Alerts – Import Tickers**
  - **Route**: `/Management/Alerts/Import/Tickers`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\AlertsController::importTickers`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Alerts/Import/Tickers` via App\Modules\Management\Controllers\AlertsController::importTickers, supporting staff workflows for Alerts.

- [ ] **Alerts – Stock Overview**
  - **Route**: `/Management/Alerts/Stock/(:segment)/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `Management\AlertsController::stockOverview`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Alerts/Stock/(:segment)/(:segment)` via Management\AlertsController::stockOverview, supporting staff workflows for Alerts.

- [ ] **Alerts – Fetch Data**
  - **Route**: `/Management/Alerts/Tasks/fetchAlerts`
  - **Methods**: `GET`
  - **Controller**: `Management\AlertsController::fetchData`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Alerts/Tasks/fetchAlerts` via Management\AlertsController::fetchData, supporting staff workflows for Alerts.

- [ ] **Alerts – Test**
  - **Route**: `/Management/Alerts/Test`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\AlertsController::test`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Alerts/Test` via App\Modules\Management\Controllers\AlertsController::test, supporting staff workflows for Alerts.

- [ ] **Alerts – Test Email**
  - **Route**: `/Management/Alerts/Test-Alert-Email`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\AlertsController::testEmail`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Alerts/Test-Alert-Email` via App\Modules\Management\Controllers\AlertsController::testEmail, supporting staff workflows for Alerts.

- [ ] **Alerts – Send Test Email**
  - **Route**: `/Management/Alerts/Test-Email`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\AlertsController::sendTestEmail`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Alerts/Test-Email` via App\Modules\Management\Controllers\AlertsController::sendTestEmail, supporting staff workflows for Alerts.

- [ ] **Alerts – Trades**
  - **Route**: `/Management/Alerts/Trades`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\AlertsController::trades`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Alerts/Trades` via App\Modules\Management\Controllers\AlertsController::trades, supporting staff workflows for Alerts.

- [ ] **Alerts – Add Trade Alert**
  - **Route**: `/Management/Alerts/addTradeAlert`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\AlertsController::addTradeAlert`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Alerts/addTradeAlert` via App\Modules\Management\Controllers\AlertsController::addTradeAlert, supporting staff workflows for Alerts.

- [ ] **Alerts – Fetch Data**
  - **Route**: `/Management/Alerts/fetchData`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\AlertsController::fetchData`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Alerts/fetchData` via App\Modules\Management\Controllers\AlertsController::fetchData, supporting staff workflows for Alerts.

- [ ] **Alerts – Research**
  - **Route**: `/Management/Marketing/Research`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\AlertsController::research`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Research` via App\Modules\Management\Controllers\AlertsController::research, supporting staff workflows for Alerts.

### Assets

- [ ] **Assets – Assets**
  - **Route**: `/Management/Assets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\AssetsController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Assets` via App\Modules\Management\Controllers\AssetsController::index, supporting staff workflows for Assets.

### Blogger

- [ ] **Blogger – Blogger**
  - **Route**: `/Management/Marketing/Blogger`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\Marketing\BloggerController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Blogger` via App\Modules\Management\Controllers\Marketing\BloggerController::index, supporting staff workflows for Blogger.

- [ ] **Blogger – Generate**
  - **Route**: `/Management/Marketing/Blogger/generate`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\Marketing\BloggerController::generate`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Marketing/Blogger/generate` via App\Modules\Management\Controllers\Marketing\BloggerController::generate, supporting staff workflows for Blogger.

- [ ] **Blogger – Preview**
  - **Route**: `/Management/Marketing/Blogger/preview/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\Marketing\BloggerController::preview`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Blogger/preview/(:segment)` via App\Modules\Management\Controllers\Marketing\BloggerController::preview, supporting staff workflows for Blogger.

- [ ] **Blogger – Repurpose**
  - **Route**: `/Management/Marketing/Blogger/repurpose`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\Marketing\BloggerController::repurpose`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Marketing/Blogger/repurpose` via App\Modules\Management\Controllers\Marketing\BloggerController::repurpose, supporting staff workflows for Blogger.

- [ ] **Blogger – Save**
  - **Route**: `/Management/Marketing/Blogger/save`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\Marketing\BloggerController::save`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Marketing/Blogger/save` via App\Modules\Management\Controllers\Marketing\BloggerController::save, supporting staff workflows for Blogger.

- [ ] **Blogger – Schedule**
  - **Route**: `/Management/Marketing/Blogger/schedule`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\Marketing\BloggerController::schedule`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Marketing/Blogger/schedule` via App\Modules\Management\Controllers\Marketing\BloggerController::schedule, supporting staff workflows for Blogger.

### Budgeting

- [ ] **Budgeting – Budgeting**
  - **Route**: `/Management/Budgeting`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\BudgetingController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Budgeting` via App\Modules\Management\Controllers\BudgetingController::index, supporting staff workflows for Budgeting.

### Budgets

- [ ] **Budgets – Budgets**
  - **Route**: `/Management/Budgets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\BudgetsController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Budgets` via App\Modules\Management\Controllers\BudgetsController::index, supporting staff workflows for Budgets.

### Development

- [ ] **Development – Development**
  - **Route**: `/Management/Development`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\DevelopmentController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Development` via App\Modules\Management\Controllers\DevelopmentController::index, supporting staff workflows for Development.

### Discord

- [ ] **Discord – Discord**
  - **Route**: `/Management/Discord`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\DiscordController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Discord` via App\Modules\Management\Controllers\DiscordController::index, supporting staff workflows for Discord.

- [ ] **Discord – Delete Discord Channel**
  - **Route**: `/Management/Discord/Discord/Channels/Delete`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\DiscordController::deleteDiscordChannel`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Discord/Discord/Channels/Delete` via App\Modules\Management\Controllers\DiscordController::deleteDiscordChannel, supporting staff workflows for Discord.

- [ ] **Discord – Save Discord Channel**
  - **Route**: `/Management/Discord/Discord/Channels/Save`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\DiscordController::saveDiscordChannel`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Discord/Discord/Channels/Save` via App\Modules\Management\Controllers\DiscordController::saveDiscordChannel, supporting staff workflows for Discord.

- [ ] **Discord – Delete Discord Policy**
  - **Route**: `/Management/Discord/Discord/Policies/Delete`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\DiscordController::deleteDiscordPolicy`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Discord/Discord/Policies/Delete` via App\Modules\Management\Controllers\DiscordController::deleteDiscordPolicy, supporting staff workflows for Discord.

- [ ] **Discord – Save Discord Policy**
  - **Route**: `/Management/Discord/Discord/Policies/Save`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\DiscordController::saveDiscordPolicy`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Discord/Discord/Policies/Save` via App\Modules\Management\Controllers\DiscordController::saveDiscordPolicy, supporting staff workflows for Discord.

- [ ] **Discord – Delete Discord Subscription**
  - **Route**: `/Management/Discord/Discord/Subscriptions/Delete`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\DiscordController::deleteDiscordSubscription`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Discord/Discord/Subscriptions/Delete` via App\Modules\Management\Controllers\DiscordController::deleteDiscordSubscription, supporting staff workflows for Discord.

- [ ] **Discord – Save Discord Subscription**
  - **Route**: `/Management/Discord/Discord/Subscriptions/Save`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\DiscordController::saveDiscordSubscription`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Discord/Discord/Subscriptions/Save` via App\Modules\Management\Controllers\DiscordController::saveDiscordSubscription, supporting staff workflows for Discord.

- [ ] **Discord – Delete Discord Template**
  - **Route**: `/Management/Discord/Discord/Templates/Delete`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\DiscordController::deleteDiscordTemplate`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Discord/Discord/Templates/Delete` via App\Modules\Management\Controllers\DiscordController::deleteDiscordTemplate, supporting staff workflows for Discord.

- [ ] **Discord – Save Discord Template**
  - **Route**: `/Management/Discord/Discord/Templates/Save`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\DiscordController::saveDiscordTemplate`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Discord/Discord/Templates/Save` via App\Modules\Management\Controllers\DiscordController::saveDiscordTemplate, supporting staff workflows for Discord.

### DripCampaign

- [ ] **DripCampaign – Drip Campaigns**
  - **Route**: `/Management/Drip-Campaigns`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\DripCampaignController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Drip-Campaigns` via App\Modules\Management\Controllers\DripCampaignController::index, supporting staff workflows for DripCampaign.

- [ ] **DripCampaign – View Steps**
  - **Route**: `/Management/Drip-Campaigns/(:num)/Steps`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\DripCampaignController::viewSteps`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Drip-Campaigns/(:num)/Steps` via App\Modules\Management\Controllers\DripCampaignController::viewSteps, supporting staff workflows for DripCampaign.

- [ ] **DripCampaign – Add Step**
  - **Route**: `/Management/Drip-Campaigns/(:num)/Steps/Add`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\Management\Controllers\DripCampaignController::addStep`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Management/Drip-Campaigns/(:num)/Steps/Add` via App\Modules\Management\Controllers\DripCampaignController::addStep, supporting staff workflows for DripCampaign.

- [ ] **DripCampaign – Create**
  - **Route**: `/Management/Drip-Campaigns/Create`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\Management\Controllers\DripCampaignController::create`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Management/Drip-Campaigns/Create` via App\Modules\Management\Controllers\DripCampaignController::create, supporting staff workflows for DripCampaign.

### Email

- [ ] **Email – Email**
  - **Route**: `/Management/Email`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\EmailController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Email` via App\Modules\Management\Controllers\EmailController::index, supporting staff workflows for Email.

- [ ] **Email – Add Member**
  - **Route**: `/Management/Email/addMember`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\EmailController::addMember`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Email/addMember` via App\Modules\Management\Controllers\EmailController::addMember, supporting staff workflows for Email.

- [ ] **Email – Auto Schedule Drafts**
  - **Route**: `/Management/Email/autoScheduleDrafts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\EmailController::autoScheduleDrafts`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Email/autoScheduleDrafts` via App\Modules\Management\Controllers\EmailController::autoScheduleDrafts, supporting staff workflows for Email.

- [ ] **Email – Auto Schedule Logs**
  - **Route**: `/Management/Email/autoScheduleLogs`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\EmailController::autoScheduleLogs`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Email/autoScheduleLogs` via App\Modules\Management\Controllers\EmailController::autoScheduleLogs, supporting staff workflows for Email.

- [ ] **Email – Campaign Stats**
  - **Route**: `/Management/Email/campaignStats/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\EmailController::campaignStats`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Email/campaignStats/(:num)` via App\Modules\Management\Controllers\EmailController::campaignStats, supporting staff workflows for Email.

- [ ] **Email – Campaigns**
  - **Route**: `/Management/Email/campaigns`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\EmailController::campaigns`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Email/campaigns` via App\Modules\Management\Controllers\EmailController::campaigns, supporting staff workflows for Email.

- [ ] **Email – Create List**
  - **Route**: `/Management/Email/createList`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\EmailController::createList`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Email/createList` via App\Modules\Management\Controllers\EmailController::createList, supporting staff workflows for Email.

- [ ] **Email – Edit Campaign**
  - **Route**: `/Management/Email/editCampaign/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\EmailController::editCampaign`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Email/editCampaign/(:num)` via App\Modules\Management\Controllers\EmailController::editCampaign, supporting staff workflows for Email.

- [ ] **Email – Preview Queued Email**
  - **Route**: `/Management/Email/previewQueuedEmail/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\EmailController::previewQueuedEmail`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Email/previewQueuedEmail/(:num)` via App\Modules\Management\Controllers\EmailController::previewQueuedEmail, supporting staff workflows for Email.

- [ ] **Email – Queued**
  - **Route**: `/Management/Email/queued`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\EmailController::queued`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Email/queued` via App\Modules\Management\Controllers\EmailController::queued, supporting staff workflows for Email.

- [ ] **Email – Schedule Campaign**
  - **Route**: `/Management/Email/scheduleCampaign/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\EmailController::scheduleCampaign`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Email/scheduleCampaign/(:num)` via App\Modules\Management\Controllers\EmailController::scheduleCampaign, supporting staff workflows for Email.

- [ ] **Email – Schedule Campaign Submit**
  - **Route**: `/Management/Email/scheduleCampaignSubmit/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\EmailController::scheduleCampaignSubmit`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Email/scheduleCampaignSubmit/(:num)` via App\Modules\Management\Controllers\EmailController::scheduleCampaignSubmit, supporting staff workflows for Email.

- [ ] **Email – Send Campaign**
  - **Route**: `/Management/Email/sendCampaign`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\EmailController::sendCampaign`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Email/sendCampaign` via App\Modules\Management\Controllers\EmailController::sendCampaign, supporting staff workflows for Email.

- [ ] **Email – Update Campaign**
  - **Route**: `/Management/Email/updateCampaign/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\EmailController::updateCampaign`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Email/updateCampaign/(:num)` via App\Modules\Management\Controllers\EmailController::updateCampaign, supporting staff workflows for Email.

- [ ] **Email – Email**
  - **Route**: `/Management/Marketing/Email`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\EmailController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Email` via App\Modules\Management\Controllers\EmailController::index, supporting staff workflows for Email.

### EmailQueue

- [ ] **EmailQueue – Email Queue**
  - **Route**: `/Management/Marketing/Email-Queue`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\EmailQueueController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Email-Queue` via App\Modules\Management\Controllers\EmailQueueController::index, supporting staff workflows for EmailQueue.

- [ ] **EmailQueue – Create**
  - **Route**: `/Management/Marketing/Email-Queue/create`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\EmailQueueController::create`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Email-Queue/create` via App\Modules\Management\Controllers\EmailQueueController::create, supporting staff workflows for EmailQueue.

- [ ] **EmailQueue – Process Queue**
  - **Route**: `/Management/Marketing/Email-Queue/processQueue`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\EmailQueueController::processQueue`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Marketing/Email-Queue/processQueue` via App\Modules\Management\Controllers\EmailQueueController::processQueue, supporting staff workflows for EmailQueue.

- [ ] **EmailQueue – Store**
  - **Route**: `/Management/Marketing/Email-Queue/store`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\EmailQueueController::store`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Marketing/Email-Queue/store` via App\Modules\Management\Controllers\EmailQueueController::store, supporting staff workflows for EmailQueue.

### EmailTemplate

- [ ] **EmailTemplate – Create**
  - **Route**: `/Management/Marketing/Email-Templates/create`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\EmailTemplateController::create`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Email-Templates/create` via App\Modules\Management\Controllers\EmailTemplateController::create, supporting staff workflows for EmailTemplate.

- [ ] **EmailTemplate – Store**
  - **Route**: `/Management/Marketing/Email-Templates/store`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\EmailTemplateController::store`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Marketing/Email-Templates/store` via App\Modules\Management\Controllers\EmailTemplateController::store, supporting staff workflows for EmailTemplate.

### Exchange

- [ ] **Exchange – Exchange**
  - **Route**: `/Management/Exchange`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\ExchangeController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Exchange` via App\Modules\Management\Controllers\ExchangeController::index, supporting staff workflows for Exchange.

### Finance

- [ ] **Finance – Finance**
  - **Route**: `/Management/Finance`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\FinanceController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Finance` via App\Modules\Management\Controllers\FinanceController::index, supporting staff workflows for Finance.

### HR

- [ ] **HR – Hr**
  - **Route**: `/Management/HR`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\HRController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/HR` via App\Modules\Management\Controllers\HRController::index, supporting staff workflows for HR.

### HowTos

- [ ] **HowTos – How Tos**
  - **Route**: `/Management/How-Tos`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\HowTosController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/How-Tos` via App\Modules\Management\Controllers\HowTosController::index, supporting staff workflows for HowTos.

- [ ] **HowTos – Employee Account Setup**
  - **Route**: `/Management/How-Tos/Employees/Account-Setup`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\HowTosController::employeeAccountSetup`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/How-Tos/Employees/Account-Setup` via App\Modules\Management\Controllers\HowTosController::employeeAccountSetup, supporting staff workflows for HowTos.

- [ ] **HowTos – Employee Email Setup**
  - **Route**: `/Management/How-Tos/Employees/Email-Setup`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\HowTosController::employeeEmailSetup`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/How-Tos/Employees/Email-Setup` via App\Modules\Management\Controllers\HowTosController::employeeEmailSetup, supporting staff workflows for HowTos.

### Management

- [ ] **Management – Management**
  - **Route**: `/Management`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\ManagementController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management` via App\Modules\Management\Controllers\ManagementController::index, supporting staff workflows for Management.

### Marketing

- [ ] **Marketing – Marketing**
  - **Route**: `/Management/Marketing`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing` via App\Modules\Management\Controllers\MarketingController::index, supporting staff workflows for Marketing.

- [ ] **Marketing – Add Subscriber**
  - **Route**: `/Management/Marketing/Add-Subscriber`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::addSubscriber`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Marketing/Add-Subscriber` via App\Modules\Management\Controllers\MarketingController::addSubscriber, supporting staff workflows for Marketing.

- [ ] **Marketing – Add**
  - **Route**: `/Management/Marketing/Add/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::add`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Management/Marketing/Add/(:segment)` via App\Modules\Management\Controllers\MarketingController::add, supporting staff workflows for Marketing.

- [ ] **Marketing – Approve Content**
  - **Route**: `/Management/Marketing/Approve-Content/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::approveContent`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Approve-Content/(:num)` via App\Modules\Management\Controllers\MarketingController::approveContent, supporting staff workflows for Marketing.

- [ ] **Marketing – Blog Creator**
  - **Route**: `/Management/Marketing/Blog-Creator`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::blogCreator`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Blog-Creator` via App\Modules\Management\Controllers\MarketingController::blogCreator, supporting staff workflows for Marketing.

- [ ] **Marketing – Blogs**
  - **Route**: `/Management/Marketing/Blogs`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::blogs`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Blogs` via App\Modules\Management\Controllers\MarketingController::blogs, supporting staff workflows for Marketing.

- [ ] **Marketing – Campaigns**
  - **Route**: `/Management/Marketing/Campaigns`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::campaigns`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Campaigns` via App\Modules\Management\Controllers\MarketingController::campaigns, supporting staff workflows for Marketing.

- [ ] **Marketing – Content Review**
  - **Route**: `/Management/Marketing/Content-Review`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::contentReview`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Content-Review` via App\Modules\Management\Controllers\MarketingController::contentReview, supporting staff workflows for Marketing.

- [ ] **Marketing – Content Generator**
  - **Route**: `/Management/Marketing/Content/Generator`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::contentGenerator`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Content/Generator` via App\Modules\Management\Controllers\MarketingController::contentGenerator, supporting staff workflows for Marketing.

- [ ] **Marketing – Content Listing**
  - **Route**: `/Management/Marketing/Content/Listing`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::contentListing`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Content/Listing` via App\Modules\Management\Controllers\MarketingController::contentListing, supporting staff workflows for Marketing.

- [ ] **Marketing – View Daily Logs**
  - **Route**: `/Management/Marketing/Daily-Log`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::viewDailyLogs`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Daily-Log` via App\Modules\Management\Controllers\MarketingController::viewDailyLogs, supporting staff workflows for Marketing.

- [ ] **Marketing – Edit Content**
  - **Route**: `/Management/Marketing/Edit-Content/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::editContent`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Edit-Content/(:num)` via App\Modules\Management\Controllers\MarketingController::editContent, supporting staff workflows for Marketing.

- [ ] **Marketing – View Email**
  - **Route**: `/Management/Marketing/Email/(:any)/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::viewEmail`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Email/(:any)/(:any)` via App\Modules\Management\Controllers\MarketingController::viewEmail, supporting staff workflows for Marketing.

- [ ] **Marketing – Exchange**
  - **Route**: `/Management/Marketing/Exchange`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Exchange` via App\Modules\Management\Controllers\MarketingController::index, supporting staff workflows for Marketing.

- [ ] **Marketing – Edit**
  - **Route**: `/Management/Marketing/Exchange/Edit/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::edit`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Management/Marketing/Exchange/Edit/(:segment)` via App\Modules\Management\Controllers\MarketingController::edit, supporting staff workflows for Marketing.

- [ ] **Marketing – Top Communities**
  - **Route**: `/Management/Marketing/Exchange/Top-Communities`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::topCommunities`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Exchange/Top-Communities` via App\Modules\Management\Controllers\MarketingController::topCommunities, supporting staff workflows for Marketing.

- [ ] **Marketing – Top Communities**
  - **Route**: `/Management/Marketing/Exchange/Top-Communities/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::topCommunities`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Exchange/Top-Communities/(:segment)` via App\Modules\Management\Controllers\MarketingController::topCommunities, supporting staff workflows for Marketing.

- [ ] **Marketing – Financial News**
  - **Route**: `/Management/Marketing/Financial-News`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::financialNews`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Financial-News` via App\Modules\Management\Controllers\MarketingController::financialNews, supporting staff workflows for Marketing.

- [ ] **Marketing – Generate Grouped Content Drafts**
  - **Route**: `/Management/Marketing/Grouped-Content-Drafts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::generateGroupedContentDrafts`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Grouped-Content-Drafts` via App\Modules\Management\Controllers\MarketingController::generateGroupedContentDrafts, supporting staff workflows for Marketing.

- [ ] **Marketing – Ideas**
  - **Route**: `/Management/Marketing/Ideas`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::ideas`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Ideas` via App\Modules\Management\Controllers\MarketingController::ideas, supporting staff workflows for Marketing.

- [ ] **Marketing – Post Creator**
  - **Route**: `/Management/Marketing/Post-Creator`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::postCreator`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Post-Creator` via App\Modules\Management\Controllers\MarketingController::postCreator, supporting staff workflows for Marketing.

- [ ] **Marketing – Promote**
  - **Route**: `/Management/Marketing/Promote`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::promote`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Promote` via App\Modules\Management\Controllers\MarketingController::promote, supporting staff workflows for Marketing.

- [ ] **Marketing – Promote**
  - **Route**: `/Management/Marketing/Promote/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::promote`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Promote/(:segment)` via App\Modules\Management\Controllers\MarketingController::promote, supporting staff workflows for Marketing.

- [ ] **Marketing – Publish Blog**
  - **Route**: `/Management/Marketing/PublishBlog/(:num)`
  - **Methods**: `POST`
  - **Controller**: `Management\MarketingController::publishBlog`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Marketing/PublishBlog/(:num)` via Management\MarketingController::publishBlog, supporting staff workflows for Marketing.

- [ ] **Marketing – Standalone Scrape**
  - **Route**: `/Management/Marketing/Quick-Scraper`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::standaloneScrape`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Quick-Scraper` via App\Modules\Management\Controllers\MarketingController::standaloneScrape, supporting staff workflows for Marketing.

- [ ] **Marketing – Reject Content**
  - **Route**: `/Management/Marketing/Reject-Content/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::rejectContent`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Reject-Content/(:num)` via App\Modules\Management\Controllers\MarketingController::rejectContent, supporting staff workflows for Marketing.

- [ ] **Marketing – Run Content Generation**
  - **Route**: `/Management/Marketing/RunContentGeneration`
  - **Methods**: `GET`
  - **Controller**: `Management\MarketingController::runContentGeneration`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/RunContentGeneration` via Management\MarketingController::runContentGeneration, supporting staff workflows for Marketing.

- [ ] **Marketing – Save Content Edit**
  - **Route**: `/Management/Marketing/Save-Content-Edit/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::saveContentEdit`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Marketing/Save-Content-Edit/(:num)` via App\Modules\Management\Controllers\MarketingController::saveContentEdit, supporting staff workflows for Marketing.

- [ ] **Marketing – Schedule**
  - **Route**: `/Management/Marketing/Schedule`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::schedule`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Schedule` via App\Modules\Management\Controllers\MarketingController::schedule, supporting staff workflows for Marketing.

- [ ] **Marketing – Schedule**
  - **Route**: `/Management/Marketing/Schedule/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::schedule`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Schedule/(:segment)` via App\Modules\Management\Controllers\MarketingController::schedule, supporting staff workflows for Marketing.

- [ ] **Marketing – Scrape Link**
  - **Route**: `/Management/Marketing/Scrape-Link`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::scrapeLink`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Marketing/Scrape-Link` via App\Modules\Management\Controllers\MarketingController::scrapeLink, supporting staff workflows for Marketing.

- [ ] **Marketing – Test**
  - **Route**: `/Management/Marketing/Test`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::test`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Test` via App\Modules\Management\Controllers\MarketingController::test, supporting staff workflows for Marketing.

- [ ] **Marketing – Twitter Dashboard**
  - **Route**: `/Management/Marketing/Twitter`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::twitterDashboard`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Twitter` via App\Modules\Management\Controllers\MarketingController::twitterDashboard, supporting staff workflows for Marketing.

- [ ] **Marketing – Video Creator**
  - **Route**: `/Management/Marketing/Video-Creator`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::videoCreator`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/Video-Creator` via App\Modules\Management\Controllers\MarketingController::videoCreator, supporting staff workflows for Marketing.

- [ ] **Marketing – View Email**
  - **Route**: `/Management/Marketing/View-Email/(:segment)/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::viewEmail`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/View-Email/(:segment)/(:segment)` via App\Modules\Management\Controllers\MarketingController::viewEmail, supporting staff workflows for Marketing.

- [ ] **Marketing – View-Grouped-Summaries**
  - **Route**: `/Management/Marketing/View-Grouped-Summaries`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::View-Grouped-Summaries`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/View-Grouped-Summaries` via App\Modules\Management\Controllers\MarketingController::View-Grouped-Summaries, supporting staff workflows for Marketing.

- [ ] **Marketing – Fetch Emails**
  - **Route**: `/Management/Marketing/fetchEmails`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::fetchEmails`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/fetchEmails` via App\Modules\Management\Controllers\MarketingController::fetchEmails, supporting staff workflows for Marketing.

- [ ] **Marketing – Fetch Missing Logos**
  - **Route**: `/Management/Marketing/fetchMissingLogos`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::fetchMissingLogos`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Marketing/fetchMissingLogos` via App\Modules\Management\Controllers\MarketingController::fetchMissingLogos, supporting staff workflows for Marketing.

- [ ] **Marketing – Generate Automated Content**
  - **Route**: `/Management/Marketing/generateAutomatedContent`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::generateAutomatedContent`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Marketing/generateAutomatedContent` via App\Modules\Management\Controllers\MarketingController::generateAutomatedContent, supporting staff workflows for Marketing.

- [ ] **Marketing – Generate Content**
  - **Route**: `/Management/Marketing/generateContent`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::generateContent`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/generateContent` via App\Modules\Management\Controllers\MarketingController::generateContent, supporting staff workflows for Marketing.

- [ ] **Marketing – Generate Daily Content Digest**
  - **Route**: `/Management/Marketing/generateDailyContentDigest`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::generateDailyContentDigest`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/generateDailyContentDigest` via App\Modules\Management\Controllers\MarketingController::generateDailyContentDigest, supporting staff workflows for Marketing.

- [ ] **Marketing – Generate Newsletter Content**
  - **Route**: `/Management/Marketing/generateNewsletter`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::generateNewsletterContent`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/generateNewsletter` via App\Modules\Management\Controllers\MarketingController::generateNewsletterContent, supporting staff workflows for Marketing.

- [ ] **Marketing – Get Recent Scrapes**
  - **Route**: `/Management/Marketing/getRecentScrapes`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::getRecentScrapes`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/getRecentScrapes` via App\Modules\Management\Controllers\MarketingController::getRecentScrapes, supporting staff workflows for Marketing.

- [ ] **Marketing – Preview Generated Post**
  - **Route**: `/Management/Marketing/previewGeneratedPost/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::previewGeneratedPost`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/previewGeneratedPost/(:num)` via App\Modules\Management\Controllers\MarketingController::previewGeneratedPost, supporting staff workflows for Marketing.

- [ ] **Marketing – Schedule Newsletter Campaign**
  - **Route**: `/Management/Marketing/scheduleNewsletters`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::scheduleNewsletterCampaign`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/scheduleNewsletters` via App\Modules\Management\Controllers\MarketingController::scheduleNewsletterCampaign, supporting staff workflows for Marketing.

- [ ] **Marketing – Send Schedule Newsletter**
  - **Route**: `/Management/Marketing/sendNewsletter`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::sendScheduleNewsletter`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/sendNewsletter` via App\Modules\Management\Controllers\MarketingController::sendScheduleNewsletter, supporting staff workflows for Marketing.

- [ ] **Marketing – Send Notification**
  - **Route**: `/Management/Marketing/sendNotification`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::sendNotification`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/sendNotification` via App\Modules\Management\Controllers\MarketingController::sendNotification, supporting staff workflows for Marketing.

- [ ] **Marketing – Submit Daily Log**
  - **Route**: `/Management/Marketing/submitDailyLog`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\MarketingController::submitDailyLog`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Marketing/submitDailyLog` via App\Modules\Management\Controllers\MarketingController::submitDailyLog, supporting staff workflows for Marketing.

### Operations

- [ ] **Operations – Operations**
  - **Route**: `/Management/Operations`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\OperationsController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Operations` via App\Modules\Management\Controllers\OperationsController::index, supporting staff workflows for Operations.

### Partners

- [ ] **Partners – Partners**
  - **Route**: `/Management/Partners`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\PartnersController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Partners` via App\Modules\Management\Controllers\PartnersController::index, supporting staff workflows for Partners.

### Projects

- [ ] **Projects – Projects**
  - **Route**: `/Management/Projects`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\ProjectsController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Projects` via App\Modules\Management\Controllers\ProjectsController::index, supporting staff workflows for Projects.

- [ ] **Projects – Approve Project**
  - **Route**: `/Management/Projects/Approve/(:segment)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\ProjectsController::approveProject`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Projects/Approve/(:segment)` via App\Modules\Management\Controllers\ProjectsController::approveProject, supporting staff workflows for Projects.

- [ ] **Projects – Approve Project**
  - **Route**: `/Management/Projects/Edit/(:segment)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\ProjectsController::approveProject`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Projects/Edit/(:segment)` via App\Modules\Management\Controllers\ProjectsController::approveProject, supporting staff workflows for Projects.

- [ ] **Projects – Real Estate Quick Intake**
  - **Route**: `/Management/Projects/Quick-Intake`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\ProjectsController::realEstateQuickIntake`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Projects/Quick-Intake` via App\Modules\Management\Controllers\ProjectsController::realEstateQuickIntake, supporting staff workflows for Projects.

- [ ] **Projects – Real Estate Quick Submit**
  - **Route**: `/Management/Projects/Quick-Intake`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\ProjectsController::realEstateQuickSubmit`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Projects/Quick-Intake` via App\Modules\Management\Controllers\ProjectsController::realEstateQuickSubmit, supporting staff workflows for Projects.

- [ ] **Projects – Reject Project**
  - **Route**: `/Management/Projects/Reject/(:segment)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\ProjectsController::rejectProject`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Projects/Reject/(:segment)` via App\Modules\Management\Controllers\ProjectsController::rejectProject, supporting staff workflows for Projects.

### Referrals

- [ ] **Referrals – Referrals**
  - **Route**: `/Management/Referrals`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\ReferralsController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Referrals` via App\Modules\Management\Controllers\ReferralsController::index, supporting staff workflows for Referrals.

### Security

- [ ] **Security – Security**
  - **Route**: `/Management/Security`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\SecurityController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Security` via App\Modules\Management\Controllers\SecurityController::index, supporting staff workflows for Security.

### Services

- [ ] **Services – Services**
  - **Route**: `/Management/Services`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\ServicesController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Services` via App\Modules\Management\Controllers\ServicesController::index, supporting staff workflows for Services.

### Users

- [ ] **Users – Users**
  - **Route**: `/Management/Users`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\UsersController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Users` via App\Modules\Management\Controllers\UsersController::index, supporting staff workflows for Users.

- [ ] **Users – Profile**
  - **Route**: `/Management/Users/Profile/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\UsersController::profile`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Users/Profile/(:segment)` via App\Modules\Management\Controllers\UsersController::profile, supporting staff workflows for Users.

- [ ] **Users – Ajax Block User**
  - **Route**: `/Management/Users/ajaxBlockUser/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\Management\Controllers\UsersController::ajaxBlockUser`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Management/Users/ajaxBlockUser/(:segment)` via App\Modules\Management\Controllers\UsersController::ajaxBlockUser, supporting staff workflows for Users.

- [ ] **Users – Ajax Bulk Ban Users**
  - **Route**: `/Management/Users/ajaxBulkBanUsers`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\Management\Controllers\UsersController::ajaxBulkBanUsers`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Management/Users/ajaxBulkBanUsers` via App\Modules\Management\Controllers\UsersController::ajaxBulkBanUsers, supporting staff workflows for Users.

### Wallets

- [ ] **Wallets – Add User Gold Tasks**
  - **Route**: `/Management/Marketing/MyMI-Gold/Tasks/Add`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\Management\Controllers\WalletsController::addUserGoldTasks`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Management/Marketing/MyMI-Gold/Tasks/Add` via App\Modules\Management\Controllers\WalletsController::addUserGoldTasks, supporting staff workflows for Wallets.

- [ ] **Wallets – Wallets**
  - **Route**: `/Management/Wallets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\WalletsController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Wallets` via App\Modules\Management\Controllers\WalletsController::index, supporting staff workflows for Wallets.

- [ ] **Wallets – Email User About Issue**
  - **Route**: `/Management/Wallets/EmailUserAboutIssue/(:num)/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Management\Controllers\WalletsController::emailUserAboutIssue`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles POST requests to `/Management/Wallets/EmailUserAboutIssue/(:num)/(:num)` via App\Modules\Management\Controllers\WalletsController::emailUserAboutIssue, supporting staff workflows for Wallets.

- [ ] **Wallets – Reconcile**
  - **Route**: `/Management/Wallets/Reconcile`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\WalletsController::reconcile`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Wallets/Reconcile` via App\Modules\Management\Controllers\WalletsController::reconcile, supporting staff workflows for Wallets.

### WebDesign

- [ ] **WebDesign – Web Design**
  - **Route**: `/Management/Web-Design`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Management\Controllers\WebDesignController::index`
  - **Category**: Admin / Management
  - **Status**: active
  - **Description**: Handles GET requests to `/Management/Web-Design` via App\Modules\Management\Controllers\WebDesignController::index, supporting staff workflows for WebDesign.


## Ops Module

### Ops

- [ ] **Ops – Opcache Reset**
  - **Route**: `/_ops/opcache-reset`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\Ops::opcacheReset`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/_ops/opcache-reset` via App\Controllers\Ops::opcacheReset, sharing public-facing marketing or content.


## Predictions Module

### Predictions

- [ ] **Predictions – Predictions**
  - **Route**: `/Predictions`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Predictions\Controllers\PredictionsController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Predictions` via App\Modules\Predictions\Controllers\PredictionsController::index, helping signed-in users work within the Predictions tools.

- [ ] **Predictions – Cancel Order**
  - **Route**: `/Predictions/CancelOrder`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Predictions\Controllers\PredictionsController::cancelOrder`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Predictions/CancelOrder` via App\Modules\Predictions\Controllers\PredictionsController::cancelOrder, helping signed-in users work within the Predictions tools.

- [ ] **Predictions – View**
  - **Route**: `/Predictions/Market/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Predictions\Controllers\PredictionsController::view`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Predictions/Market/(:num)` via App\Modules\Predictions\Controllers\PredictionsController::view, helping signed-in users work within the Predictions tools.

- [ ] **Predictions – Markets**
  - **Route**: `/Predictions/Markets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Predictions\Controllers\PredictionsController::markets`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Predictions/Markets` via App\Modules\Predictions\Controllers\PredictionsController::markets, helping signed-in users work within the Predictions tools.

- [ ] **Predictions – Place Order**
  - **Route**: `/Predictions/PlaceOrder`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Predictions\Controllers\PredictionsController::placeOrder`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Predictions/PlaceOrder` via App\Modules\Predictions\Controllers\PredictionsController::placeOrder, helping signed-in users work within the Predictions tools.

- [ ] **Predictions – Portfolio**
  - **Route**: `/Predictions/Portfolio`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Predictions\Controllers\PredictionsController::portfolio`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Predictions/Portfolio` via App\Modules\Predictions\Controllers\PredictionsController::portfolio, helping signed-in users work within the Predictions tools.

- [ ] **Predictions – Settlements**
  - **Route**: `/Predictions/Settlements`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Predictions\Controllers\PredictionsController::settlements`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Predictions/Settlements` via App\Modules\Predictions\Controllers\PredictionsController::settlements, helping signed-in users work within the Predictions tools.


## ScriptStudio Module

### ScriptStudio

- [ ] **ScriptStudio – Script Studio**
  - **Route**: `/ScriptStudio`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\ScriptStudio\Controllers\ScriptStudioController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/ScriptStudio` via App\Modules\ScriptStudio\Controllers\ScriptStudioController::index, helping signed-in users work within the ScriptStudio tools.

- [ ] **ScriptStudio – Create**
  - **Route**: `/ScriptStudio/Create`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\ScriptStudio\Controllers\ScriptStudioController::create`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/ScriptStudio/Create` via App\Modules\ScriptStudio\Controllers\ScriptStudioController::create, helping signed-in users work within the ScriptStudio tools.

- [ ] **ScriptStudio – Edit**
  - **Route**: `/ScriptStudio/Edit/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\ScriptStudio\Controllers\ScriptStudioController::edit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/ScriptStudio/Edit/(:num)` via App\Modules\ScriptStudio\Controllers\ScriptStudioController::edit, helping signed-in users work within the ScriptStudio tools.

- [ ] **ScriptStudio – Export**
  - **Route**: `/ScriptStudio/Export/(:num)/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\ScriptStudio\Controllers\ScriptStudioController::export`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/ScriptStudio/Export/(:num)/(:segment)` via App\Modules\ScriptStudio\Controllers\ScriptStudioController::export, helping signed-in users work within the ScriptStudio tools.

- [ ] **ScriptStudio – Marketplace**
  - **Route**: `/ScriptStudio/Marketplace`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\ScriptStudio\Controllers\ScriptStudioController::marketplace`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/ScriptStudio/Marketplace` via App\Modules\ScriptStudio\Controllers\ScriptStudioController::marketplace, helping signed-in users work within the ScriptStudio tools.

- [ ] **ScriptStudio – Preview**
  - **Route**: `/ScriptStudio/Preview/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\ScriptStudio\Controllers\ScriptStudioController::preview`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/ScriptStudio/Preview/(:num)` via App\Modules\ScriptStudio\Controllers\ScriptStudioController::preview, helping signed-in users work within the ScriptStudio tools.

- [ ] **ScriptStudio – Store**
  - **Route**: `/ScriptStudio/Store`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\ScriptStudio\Controllers\ScriptStudioController::store`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/ScriptStudio/Store` via App\Modules\ScriptStudio\Controllers\ScriptStudioController::store, helping signed-in users work within the ScriptStudio tools.

- [ ] **ScriptStudio – Update**
  - **Route**: `/ScriptStudio/Update/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\ScriptStudio\Controllers\ScriptStudioController::update`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/ScriptStudio/Update/(:num)` via App\Modules\ScriptStudio\Controllers\ScriptStudioController::update, helping signed-in users work within the ScriptStudio tools.


## ServiceWorker Module

### ServiceWorker

- [ ] **ServiceWorker – Sw.Js**
  - **Route**: `/sw.js`
  - **Methods**: `GET`
  - **Controller**: `App\Controllers\ServiceWorker::index`
  - **Category**: Public
  - **Status**: active
  - **Description**: Handles GET requests to `/sw.js` via App\Controllers\ServiceWorker::index, sharing public-facing marketing or content.


## Support Module

### Support

- [ ] **Support – Support**
  - **Route**: `/Support`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Support\Controllers\SupportController::index`
  - **Category**: Support / Help
  - **Status**: active
  - **Description**: Handles GET requests to `/Support` via App\Modules\Support\Controllers\SupportController::index, delivering support content and intake.

- [ ] **Support – Article**
  - **Route**: `/Support/Article/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Support\Controllers\SupportController::article`
  - **Category**: Support / Help
  - **Status**: active
  - **Description**: Handles GET requests to `/Support/Article/(:segment)` via App\Modules\Support\Controllers\SupportController::article, delivering support content and intake.

- [ ] **Support – Faq**
  - **Route**: `/Support/FAQ`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Support\Controllers\SupportController::faq`
  - **Category**: Support / Help
  - **Status**: active
  - **Description**: Handles GET requests to `/Support/FAQ` via App\Modules\Support\Controllers\SupportController::faq, delivering support content and intake.

- [ ] **Support – Feedback**
  - **Route**: `/Support/Feedback`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\Support\Controllers\SupportController::feedback`
  - **Category**: Support / Help
  - **Status**: active
  - **Description**: Handles POST requests to `/Support/Feedback` via App\Modules\Support\Controllers\SupportController::feedback, delivering support content and intake.

- [ ] **Support – Test**
  - **Route**: `/Support/Test`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Support\Controllers\SupportController::test`
  - **Category**: Support / Help
  - **Status**: active
  - **Description**: Handles GET requests to `/Support/Test` via App\Modules\Support\Controllers\SupportController::test, delivering support content and intake.

- [ ] **Support – Send Test Email**
  - **Route**: `/Support/Test-Email`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\Support\Controllers\SupportController::sendTestEmail`
  - **Category**: Support / Help
  - **Status**: active
  - **Description**: Handles GET requests to `/Support/Test-Email` via App\Modules\Support\Controllers\SupportController::sendTestEmail, delivering support content and intake.


## System Module

### Health

- [ ] **Health – Diag**
  - **Route**: `/system/diag`
  - **Methods**: `GET`
  - **Controller**: `System\HealthController::diag`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/system/diag` via System\HealthController::diag, providing backend data/services for Health consumers.

- [ ] **Health – Healthz**
  - **Route**: `/system/healthz`
  - **Methods**: `GET`
  - **Controller**: `System\HealthController::healthz`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/system/healthz` via System\HealthController::healthz, providing backend data/services for Health consumers.

### Utility

- [ ] **Utility – Login**
  - **Route**: `/Login`
  - **Methods**: `GET`
  - **Controller**: `closure`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/Login` via closure handler, providing backend data/services for Utility consumers.

- [ ] **Utility – Debug**
  - **Route**: `/debug`
  - **Methods**: `POST`
  - **Controller**: `closure`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles POST requests to `/debug` via closure handler, providing backend data/services for Utility consumers.

- [ ] **Utility – Health**
  - **Route**: `/health`
  - **Methods**: `GET`
  - **Controller**: `closure`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/health` via closure handler, providing backend data/services for Utility consumers.

- [ ] **Utility – Healthz**
  - **Route**: `/healthz`
  - **Methods**: `GET`
  - **Controller**: `closure`
  - **Category**: API / Backend
  - **Status**: active
  - **Description**: Handles GET requests to `/healthz` via closure handler, providing backend data/services for Utility consumers.


## User Module

### Account

- [ ] **Account – Create Link Token**
  - **Route**: `/Accounts/createLinkToken`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\AccountController::createLinkToken`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Accounts/createLinkToken` via App\Modules\User\Controllers\AccountController::createLinkToken, helping signed-in users work within the Account tools.

### Advisor

- [ ] **Advisor – Advisors**
  - **Route**: `/Advisors`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\AdvisorController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Advisors` via App\Modules\User\Controllers\AdvisorController::index, helping signed-in users work within the Advisor tools.

### Alerts

- [ ] **Alerts – Alerts**
  - **Route**: `/Alerts`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\AlertsController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Alerts` via App\Modules\User\Controllers\AlertsController::index, helping signed-in users work within the Alerts tools.

### Budget

- [ ] **Budget – Budget**
  - **Route**: `/Budget`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Budget` via App\Modules\User\Controllers\BudgetController::index, helping signed-in users work within the Budget tools.

- [ ] **Budget – Account Manager**
  - **Route**: `/Budget/Account-Manager`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::accountManager`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Account-Manager` via App\Modules\User\Controllers\BudgetController::accountManager, helping signed-in users work within the Budget tools.

- [ ] **Budget – Account Manager**
  - **Route**: `/Budget/Account-Manager`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::accountManager`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Budget/Account-Manager` via App\Modules\User\Controllers\BudgetController::accountManager, helping signed-in users work within the Budget tools.

- [ ] **Budget – Add**
  - **Route**: `/Budget/Add`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::add`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Add` via App\Modules\User\Controllers\BudgetController::add, helping signed-in users work within the Budget tools.

- [ ] **Budget – Add**
  - **Route**: `/Budget/Add/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::add`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Add/(:segment)` via App\Modules\User\Controllers\BudgetController::add, helping signed-in users work within the Budget tools.

- [ ] **Budget – Approve Recurring Schedule**
  - **Route**: `/Budget/Approve-Recurring-Schedule/(:num)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::approveRecurringSchedule`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Approve-Recurring-Schedule/(:num)` via App\Modules\User\Controllers\BudgetController::approveRecurringSchedule, helping signed-in users work within the Budget tools.

- [ ] **Budget – Cancel Account**
  - **Route**: `/Budget/Cancel-Account/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::cancelAccount`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Cancel-Account/(:segment)` via App\Modules\User\Controllers\BudgetController::cancelAccount, helping signed-in users work within the Budget tools.

- [ ] **Budget – Edit**
  - **Route**: `/Budget/Copy`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::edit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Copy` via App\Modules\User\Controllers\BudgetController::edit, helping signed-in users work within the Budget tools.

- [ ] **Budget – Edit**
  - **Route**: `/Budget/Copy/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::edit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Copy/(:segment)` via App\Modules\User\Controllers\BudgetController::edit, helping signed-in users work within the Budget tools.

- [ ] **Budget – Delete Account**
  - **Route**: `/Budget/Delete-Account`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::deleteAccount`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Delete-Account` via App\Modules\User\Controllers\BudgetController::deleteAccount, helping signed-in users work within the Budget tools.

- [ ] **Budget – Delete Account**
  - **Route**: `/Budget/Delete-Account/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::deleteAccount`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Delete-Account/(:segment)` via App\Modules\User\Controllers\BudgetController::deleteAccount, helping signed-in users work within the Budget tools.

- [ ] **Budget – Details**
  - **Route**: `/Budget/Details`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::details`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Details` via App\Modules\User\Controllers\BudgetController::details, helping signed-in users work within the Budget tools.

- [ ] **Budget – Details**
  - **Route**: `/Budget/Details/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::details`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Details/(:segment)` via App\Modules\User\Controllers\BudgetController::details, helping signed-in users work within the Budget tools.

- [ ] **Budget – Edit**
  - **Route**: `/Budget/Edit`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::edit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Edit` via App\Modules\User\Controllers\BudgetController::edit, helping signed-in users work within the Budget tools.

- [ ] **Budget – Edit**
  - **Route**: `/Budget/Edit/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::edit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Edit/(:segment)` via App\Modules\User\Controllers\BudgetController::edit, helping signed-in users work within the Budget tools.

- [ ] **Budget – Edit**
  - **Route**: `/Budget/Edit/(:segment)/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::edit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Edit/(:segment)/(:segment)` via App\Modules\User\Controllers\BudgetController::edit, helping signed-in users work within the Budget tools.

- [ ] **Budget – Account Overview**
  - **Route**: `/Budget/Expenses`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::accountOverview`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Expenses` via App\Modules\User\Controllers\BudgetController::accountOverview, helping signed-in users work within the Budget tools.

- [ ] **Budget – Financial Analysis**
  - **Route**: `/Budget/Financial-Analysis`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::financialAnalysis`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Financial-Analysis` via App\Modules\User\Controllers\BudgetController::financialAnalysis, helping signed-in users work within the Budget tools.

- [ ] **Budget – Financial Forecaster**
  - **Route**: `/Budget/Financial-Forecaster`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::financialForecaster`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Financial-Forecaster` via App\Modules\User\Controllers\BudgetController::financialForecaster, helping signed-in users work within the Budget tools.

- [ ] **Budget – Forecast**
  - **Route**: `/Budget/Forecast`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::forecast`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Budget/Forecast` via App\Modules\User\Controllers\BudgetController::forecast, helping signed-in users work within the Budget tools.

- [ ] **Budget – Forecast**
  - **Route**: `/Budget/Forecast/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::forecast`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Budget/Forecast/(:segment)` via App\Modules\User\Controllers\BudgetController::forecast, helping signed-in users work within the Budget tools.

- [ ] **Budget – History**
  - **Route**: `/Budget/History`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::history`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/History` via App\Modules\User\Controllers\BudgetController::history, helping signed-in users work within the Budget tools.

- [ ] **Budget – History**
  - **Route**: `/Budget/History/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::history`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/History/(:segment)` via App\Modules\User\Controllers\BudgetController::history, helping signed-in users work within the Budget tools.

- [ ] **Budget – Account Overview**
  - **Route**: `/Budget/Income`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::accountOverview`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Income` via App\Modules\User\Controllers\BudgetController::accountOverview, helping signed-in users work within the Budget tools.

- [ ] **Budget – Last Month**
  - **Route**: `/Budget/Last-Month`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::lastMonth`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Budget/Last-Month` via App\Modules\User\Controllers\BudgetController::lastMonth, helping signed-in users work within the Budget tools.

- [ ] **Budget – Last Month**
  - **Route**: `/Budget/Last-Month/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::lastMonth`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Budget/Last-Month/(:segment)` via App\Modules\User\Controllers\BudgetController::lastMonth, helping signed-in users work within the Budget tools.

- [ ] **Budget – Next Month**
  - **Route**: `/Budget/Next-Month`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::nextMonth`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Budget/Next-Month` via App\Modules\User\Controllers\BudgetController::nextMonth, helping signed-in users work within the Budget tools.

- [ ] **Budget – Next Month**
  - **Route**: `/Budget/Next-Month/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::nextMonth`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Budget/Next-Month/(:segment)` via App\Modules\User\Controllers\BudgetController::nextMonth, helping signed-in users work within the Budget tools.

- [ ] **Budget – Edit**
  - **Route**: `/Budget/Recurring-Account/Edit/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::edit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Recurring-Account/Edit/(:segment)` via App\Modules\User\Controllers\BudgetController::edit, helping signed-in users work within the Budget tools.

- [ ] **Budget – Recurring Schedule**
  - **Route**: `/Budget/Recurring-Account/Schedule`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::recurringSchedule`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Recurring-Account/Schedule` via App\Modules\User\Controllers\BudgetController::recurringSchedule, helping signed-in users work within the Budget tools.

- [ ] **Budget – Recurring Schedule**
  - **Route**: `/Budget/Recurring-Account/Schedule/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::recurringSchedule`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Recurring-Account/Schedule/(:segment)` via App\Modules\User\Controllers\BudgetController::recurringSchedule, helping signed-in users work within the Budget tools.

- [ ] **Budget – Search**
  - **Route**: `/Budget/Search/(:any)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Budget/Search/(:any)` via App\Modules\User\Controllers\BudgetController::index, helping signed-in users work within the Budget tools.

- [ ] **Budget – Settings**
  - **Route**: `/Budget/Settings/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::settings`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Settings/(:segment)` via App\Modules\User\Controllers\BudgetController::settings, helping signed-in users work within the Budget tools.

- [ ] **Budget – Paid**
  - **Route**: `/Budget/Status/Paid/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::paid`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Status/Paid/(:segment)` via App\Modules\User\Controllers\BudgetController::paid, helping signed-in users work within the Budget tools.

- [ ] **Budget – Unpaid**
  - **Route**: `/Budget/Status/Unpaid/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::unpaid`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Budget/Status/Unpaid/(:segment)` via App\Modules\User\Controllers\BudgetController::unpaid, helping signed-in users work within the Budget tools.

- [ ] **Budget – This Month**
  - **Route**: `/Budget/This-Month`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::thisMonth`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Budget/This-Month` via App\Modules\User\Controllers\BudgetController::thisMonth, helping signed-in users work within the Budget tools.

- [ ] **Budget – This Month**
  - **Route**: `/Budget/This-Month/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\BudgetController::thisMonth`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Budget/This-Month/(:segment)` via App\Modules\User\Controllers\BudgetController::thisMonth, helping signed-in users work within the Budget tools.

### Dashboard

- [ ] **Dashboard – Account**
  - **Route**: `/Account`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::account`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Account` via App\Modules\User\Controllers\DashboardController::account, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Activity**
  - **Route**: `/Account/Activity`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::activity`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Account/Activity` via App\Modules\User\Controllers\DashboardController::activity, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Billing**
  - **Route**: `/Account/Billing`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::billing`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Account/Billing` via App\Modules\User\Controllers\DashboardController::billing, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Connected Accounts**
  - **Route**: `/Account/Connected-Accounts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::connectedAccounts`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Account/Connected-Accounts` via App\Modules\User\Controllers\DashboardController::connectedAccounts, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Notifications**
  - **Route**: `/Account/Notifications`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::notifications`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Account/Notifications` via App\Modules\User\Controllers\DashboardController::notifications, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Security**
  - **Route**: `/Account/Security`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::Security`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Account/Security` via App\Modules\User\Controllers\DashboardController::Security, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Social Media**
  - **Route**: `/Account/Social-Media`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::SocialMedia`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Account/Social-Media` via App\Modules\User\Controllers\DashboardController::SocialMedia, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Dashboard**
  - **Route**: `/Dashboard`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Dashboard` via App\Modules\User\Controllers\DashboardController::index, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Loading Screen**
  - **Route**: `/Dashboard/LoadingScreen`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::LoadingScreen`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Dashboard/LoadingScreen` via App\Modules\User\Controllers\DashboardController::LoadingScreen, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Load Modal Content**
  - **Route**: `/Dashboard/Transaction-Modal/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::loadModalContent`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Dashboard/Transaction-Modal/(:segment)` via App\Modules\User\Controllers\DashboardController::loadModalContent, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Load Modal Content**
  - **Route**: `/Dashboard/Transaction-Modal/(:segment)/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::loadModalContent`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Dashboard/Transaction-Modal/(:segment)/(:segment)` via App\Modules\User\Controllers\DashboardController::loadModalContent, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Load Modal Content**
  - **Route**: `/Dashboard/Transaction-Modal/(:segment)/(:segment)/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::loadModalContent`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Dashboard/Transaction-Modal/(:segment)/(:segment)/(:segment)` via App\Modules\User\Controllers\DashboardController::loadModalContent, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Load Modal Content**
  - **Route**: `/Dashboard/Transaction-Modal/(:segment)/(:segment)/(:segment)/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::loadModalContent`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Dashboard/Transaction-Modal/(:segment)/(:segment)/(:segment)/(:segment)` via App\Modules\User\Controllers\DashboardController::loadModalContent, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Load Modal Content**
  - **Route**: `/Dashboard/Transaction-Modal/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::loadModalContent`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Dashboard/Transaction-Modal/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)` via App\Modules\User\Controllers\DashboardController::loadModalContent, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Load Modal Content**
  - **Route**: `/Dashboard/Transaction-Modal/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::loadModalContent`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Dashboard/Transaction-Modal/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)/(:segment)` via App\Modules\User\Controllers\DashboardController::loadModalContent, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Check Onboarding Status**
  - **Route**: `/Dashboard/checkOnboardingStatus`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::checkOnboardingStatus`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Dashboard/checkOnboardingStatus` via App\Modules\User\Controllers\DashboardController::checkOnboardingStatus, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Complete Onboarding Step**
  - **Route**: `/Dashboard/completeOnboardingStep/(:segment)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::completeOnboardingStep`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Dashboard/completeOnboardingStep/(:segment)` via App\Modules\User\Controllers\DashboardController::completeOnboardingStep, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Onboarding**
  - **Route**: `/Dashboard/onboarding`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::onboarding`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Dashboard/onboarding` via App\Modules\User\Controllers\DashboardController::onboarding, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Goals**
  - **Route**: `/MyMI-Gold/Goals/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::goals`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/MyMI-Gold/Goals/(:segment)` via App\Modules\User\Controllers\DashboardController::goals, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Performance**
  - **Route**: `/Performance`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::performance`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Performance` via App\Modules\User\Controllers\DashboardController::performance, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Profile**
  - **Route**: `/Profile/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::profile`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Profile/(:segment)` via App\Modules\User\Controllers\DashboardController::profile, helping signed-in users work within the Dashboard tools.

- [ ] **Dashboard – Schedule**
  - **Route**: `/Schedule`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\DashboardController::schedule`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Schedule` via App\Modules\User\Controllers\DashboardController::schedule, helping signed-in users work within the Dashboard tools.

### Institutes

- [ ] **Institutes – Institutes**
  - **Route**: `/Institutes`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\InstitutesController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Institutes` via App\Modules\User\Controllers\InstitutesController::index, helping signed-in users work within the Institutes tools.

### Investment

- [ ] **Investment – Get Goals**
  - **Route**: `/Investments/Goals`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\InvestmentController::getGoals`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Investments/Goals` via App\Modules\User\Controllers\InvestmentController::getGoals, helping signed-in users work within the Investment tools.

- [ ] **Investment – Create Goal**
  - **Route**: `/Investments/Goals`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentController::createGoal`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Investments/Goals` via App\Modules\User\Controllers\InvestmentController::createGoal, helping signed-in users work within the Investment tools.

- [ ] **Investment – Create Goal**
  - **Route**: `/Investments/Goals/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\InvestmentController::createGoal`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Investments/Goals/(:num)` via App\Modules\User\Controllers\InvestmentController::createGoal, helping signed-in users work within the Investment tools.

- [ ] **Investment – Update Goal**
  - **Route**: `/Investments/Goals/(:num)`
  - **Methods**: `PUT`
  - **Controller**: `App\Modules\User\Controllers\InvestmentController::updateGoal`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles PUT requests to `/Investments/Goals/(:num)` via App\Modules\User\Controllers\InvestmentController::updateGoal, helping signed-in users work within the Investment tools.

- [ ] **Investment – Delete Goal**
  - **Route**: `/Investments/Goals/(:num)`
  - **Methods**: `PUT`
  - **Controller**: `App\Modules\User\Controllers\InvestmentController::deleteGoal`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles PUT requests to `/Investments/Goals/(:num)` via App\Modules\User\Controllers\InvestmentController::deleteGoal, helping signed-in users work within the Investment tools.

- [ ] **Investment – Get Strategies**
  - **Route**: `/Investments/Strategies`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\InvestmentController::getStrategies`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Investments/Strategies` via App\Modules\User\Controllers\InvestmentController::getStrategies, helping signed-in users work within the Investment tools.

- [ ] **Investment – Create Strategy**
  - **Route**: `/Investments/Strategies`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentController::createStrategy`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Investments/Strategies` via App\Modules\User\Controllers\InvestmentController::createStrategy, helping signed-in users work within the Investment tools.

- [ ] **Investment – Delete Goal**
  - **Route**: `/Investments/Strategies/(:num)`
  - **Methods**: `DELETE`
  - **Controller**: `App\Modules\User\Controllers\InvestmentController::deleteGoal`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles DELETE requests to `/Investments/Strategies/(:num)` via App\Modules\User\Controllers\InvestmentController::deleteGoal, helping signed-in users work within the Investment tools.

- [ ] **Investment – Get Strategy**
  - **Route**: `/Investments/Strategies/(:num)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\InvestmentController::getStrategy`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Investments/Strategies/(:num)` via App\Modules\User\Controllers\InvestmentController::getStrategy, helping signed-in users work within the Investment tools.

- [ ] **Investment – Update Strategy**
  - **Route**: `/Investments/Strategies/(:num)`
  - **Methods**: `PUT`
  - **Controller**: `App\Modules\User\Controllers\InvestmentController::updateStrategy`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles PUT requests to `/Investments/Strategies/(:num)` via App\Modules\User\Controllers\InvestmentController::updateStrategy, helping signed-in users work within the Investment tools.

### Investments

- [ ] **Investments – Investments**
  - **Route**: `/Investments`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Investments` via App\Modules\User\Controllers\InvestmentsController::index, helping signed-in users work within the Investments tools.

- [ ] **Investments – Account Manager**
  - **Route**: `/Investments/Account-Manager`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::accountManager`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Investments/Account-Manager` via App\Modules\User\Controllers\InvestmentsController::accountManager, helping signed-in users work within the Investments tools.

- [ ] **Investments – Add**
  - **Route**: `/Investments/Add`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::add`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Investments/Add` via App\Modules\User\Controllers\InvestmentsController::add, helping signed-in users work within the Investments tools.

- [ ] **Investments – Add**
  - **Route**: `/Investments/Add/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::add`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Investments/Add/(:segment)` via App\Modules\User\Controllers\InvestmentsController::add, helping signed-in users work within the Investments tools.

- [ ] **Investments – Auto Save**
  - **Route**: `/Investments/Autosave`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::autoSave`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Investments/Autosave` via App\Modules\User\Controllers\InvestmentsController::autoSave, helping signed-in users work within the Investments tools.

- [ ] **Investments – Crypto Overview**
  - **Route**: `/Investments/Crypto-Overview`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::cryptoOverview`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Investments/Crypto-Overview` via App\Modules\User\Controllers\InvestmentsController::cryptoOverview, helping signed-in users work within the Investments tools.

- [ ] **Investments – Economic Data**
  - **Route**: `/Investments/Economic-Data`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::economicData`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Investments/Economic-Data` via App\Modules\User\Controllers\InvestmentsController::economicData, helping signed-in users work within the Investments tools.

- [ ] **Investments – Market News**
  - **Route**: `/Investments/Market-News`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::marketNews`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Investments/Market-News` via App\Modules\User\Controllers\InvestmentsController::marketNews, helping signed-in users work within the Investments tools.

- [ ] **Investments – My Minews**
  - **Route**: `/Investments/MyMI-News`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::MyMINews`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Investments/MyMI-News` via App\Modules\User\Controllers\InvestmentsController::MyMINews, helping signed-in users work within the Investments tools.

- [ ] **Investments – My Miresearch**
  - **Route**: `/Investments/MyMI-Research`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::MyMIResearch`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Investments/MyMI-Research` via App\Modules\User\Controllers\InvestmentsController::MyMIResearch, helping signed-in users work within the Investments tools.

- [ ] **Investments – Overview**
  - **Route**: `/Investments/Overview`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::overview`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Investments/Overview` via App\Modules\User\Controllers\InvestmentsController::overview, helping signed-in users work within the Investments tools.

- [ ] **Investments – Retirement**
  - **Route**: `/Investments/Retirement`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::retirement`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Investments/Retirement` via App\Modules\User\Controllers\InvestmentsController::retirement, helping signed-in users work within the Investments tools.

- [ ] **Investments – Save**
  - **Route**: `/Investments/Save`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::save`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Investments/Save` via App\Modules\User\Controllers\InvestmentsController::save, helping signed-in users work within the Investments tools.

- [ ] **Investments – Services**
  - **Route**: `/Investments/Services`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::services`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Investments/Services` via App\Modules\User\Controllers\InvestmentsController::services, helping signed-in users work within the Investments tools.

- [ ] **Investments – Stock Overview**
  - **Route**: `/Investments/Stock-Overview`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::stockOverview`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Investments/Stock-Overview` via App\Modules\User\Controllers\InvestmentsController::stockOverview, helping signed-in users work within the Investments tools.

- [ ] **Investments – Test**
  - **Route**: `/Investments/Test`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::test`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Investments/Test` via App\Modules\User\Controllers\InvestmentsController::test, helping signed-in users work within the Investments tools.

- [ ] **Investments – Watchlist**
  - **Route**: `/Investments/Watchlist`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::watchlist`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Investments/Watchlist` via App\Modules\User\Controllers\InvestmentsController::watchlist, helping signed-in users work within the Investments tools.

- [ ] **Investments – My Investments**
  - **Route**: `/My-Investments`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/My-Investments` via App\Modules\User\Controllers\InvestmentsController::index, helping signed-in users work within the Investments tools.

- [ ] **Investments – My Trades**
  - **Route**: `/My-Trades`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/My-Trades` via App\Modules\User\Controllers\InvestmentsController::index, helping signed-in users work within the Investments tools.

- [ ] **Investments – Trade Tracker**
  - **Route**: `/Trade-Tracker`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::tradeTracker`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Trade-Tracker` via App\Modules\User\Controllers\InvestmentsController::tradeTracker, helping signed-in users work within the Investments tools.

- [ ] **Investments – Get Trade Data**
  - **Route**: `/Trade-Tracker/getTradeData`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::getTradeData`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Trade-Tracker/getTradeData` via App\Modules\User\Controllers\InvestmentsController::getTradeData, helping signed-in users work within the Investments tools.

- [ ] **Investments – Save Trade Data**
  - **Route**: `/Trade-Tracker/saveTradeData`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\User\Controllers\InvestmentsController::saveTradeData`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Trade-Tracker/saveTradeData` via App\Modules\User\Controllers\InvestmentsController::saveTradeData, helping signed-in users work within the Investments tools.

### Knowledgebase

- [ ] **Knowledgebase – Knowledgebase**
  - **Route**: `/Knowledgebase`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\KnowledgebaseController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Knowledgebase` via App\Modules\User\Controllers\KnowledgebaseController::index, helping signed-in users work within the Knowledgebase tools.

- [ ] **Knowledgebase – Account Billing**
  - **Route**: `/Knowledgebase/Account-And-Billing`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\KnowledgebaseController::accountBilling`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Knowledgebase/Account-And-Billing` via App\Modules\User\Controllers\KnowledgebaseController::accountBilling, helping signed-in users work within the Knowledgebase tools.

- [ ] **Knowledgebase – Assets**
  - **Route**: `/Knowledgebase/Assets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\KnowledgebaseController::assets`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Knowledgebase/Assets` via App\Modules\User\Controllers\KnowledgebaseController::assets, helping signed-in users work within the Knowledgebase tools.

- [ ] **Knowledgebase – Integrating Wallets**
  - **Route**: `/Knowledgebase/Integrating-Wallets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\KnowledgebaseController::integratingWallets`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Knowledgebase/Integrating-Wallets` via App\Modules\User\Controllers\KnowledgebaseController::integratingWallets, helping signed-in users work within the Knowledgebase tools.

- [ ] **Knowledgebase – Investor Profile**
  - **Route**: `/Knowledgebase/Investor-Profile`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\KnowledgebaseController::investorProfile`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Knowledgebase/Investor-Profile` via App\Modules\User\Controllers\KnowledgebaseController::investorProfile, helping signed-in users work within the Knowledgebase tools.

- [ ] **Knowledgebase – Kycverification**
  - **Route**: `/Knowledgebase/KYC-Verification`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\KnowledgebaseController::KYCVerification`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Knowledgebase/KYC-Verification` via App\Modules\User\Controllers\KnowledgebaseController::KYCVerification, helping signed-in users work within the Knowledgebase tools.

- [ ] **Knowledgebase – Partnerships**
  - **Route**: `/Knowledgebase/MyMI-Partnerships`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\KnowledgebaseController::partnerships`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Knowledgebase/MyMI-Partnerships` via App\Modules\User\Controllers\KnowledgebaseController::partnerships, helping signed-in users work within the Knowledgebase tools.

- [ ] **Knowledgebase – Promoted Articles**
  - **Route**: `/Knowledgebase/Promoted-Articles`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\KnowledgebaseController::promotedArticles`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Knowledgebase/Promoted-Articles` via App\Modules\User\Controllers\KnowledgebaseController::promotedArticles, helping signed-in users work within the Knowledgebase tools.

- [ ] **Knowledgebase – Technical Support**
  - **Route**: `/Knowledgebase/Technical-Support`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\KnowledgebaseController::technicalSupport`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Knowledgebase/Technical-Support` via App\Modules\User\Controllers\KnowledgebaseController::technicalSupport, helping signed-in users work within the Knowledgebase tools.

- [ ] **Knowledgebase – Trade Tracker**
  - **Route**: `/Knowledgebase/Trade-Tracker`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\KnowledgebaseController::tradeTracker`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Knowledgebase/Trade-Tracker` via App\Modules\User\Controllers\KnowledgebaseController::tradeTracker, helping signed-in users work within the Knowledgebase tools.

- [ ] **Knowledgebase – Tutorials**
  - **Route**: `/Knowledgebase/Tutorials`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\KnowledgebaseController::tutorials`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Knowledgebase/Tutorials` via App\Modules\User\Controllers\KnowledgebaseController::tutorials, helping signed-in users work within the Knowledgebase tools.

- [ ] **Knowledgebase – Types Of Accounts**
  - **Route**: `/Knowledgebase/Types-Of-Accounts`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\KnowledgebaseController::typesOfAccounts`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Knowledgebase/Types-Of-Accounts` via App\Modules\User\Controllers\KnowledgebaseController::typesOfAccounts, helping signed-in users work within the Knowledgebase tools.

### Projects

- [ ] **Projects – Projects**
  - **Route**: `/Projects`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\ProjectsController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Projects` via App\Modules\User\Controllers\ProjectsController::index, helping signed-in users work within the Projects tools.

- [ ] **Projects – Accept Private Allocation**
  - **Route**: `/Projects/Accept-Private-Allocation/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\User\Controllers\ProjectsController::acceptPrivateAllocation`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Projects/Accept-Private-Allocation/(:num)` via App\Modules\User\Controllers\ProjectsController::acceptPrivateAllocation, helping signed-in users work within the Projects tools.

- [ ] **Projects – Commit**
  - **Route**: `/Projects/Commit/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\User\Controllers\ProjectsController::commit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Projects/Commit/(:num)` via App\Modules\User\Controllers\ProjectsController::commit, helping signed-in users work within the Projects tools.

- [ ] **Projects – My Commitments**
  - **Route**: `/Projects/My/Commitments`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\ProjectsController::myCommitments`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Projects/My/Commitments` via App\Modules\User\Controllers\ProjectsController::myCommitments, helping signed-in users work within the Projects tools.

- [ ] **Projects – Request Monthly Withdrawal**
  - **Route**: `/Projects/Request-Monthly-Withdrawal/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\User\Controllers\ProjectsController::requestMonthlyWithdrawal`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Projects/Request-Monthly-Withdrawal/(:num)` via App\Modules\User\Controllers\ProjectsController::requestMonthlyWithdrawal, helping signed-in users work within the Projects tools.

- [ ] **Projects – View**
  - **Route**: `/Projects/View/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\ProjectsController::view`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Projects/View/(:segment)` via App\Modules\User\Controllers\ProjectsController::view, helping signed-in users work within the Projects tools.

- [ ] **Projects – Withdraw Commit**
  - **Route**: `/Projects/Withdraw-Commit/(:num)`
  - **Methods**: `POST`
  - **Controller**: `App\Modules\User\Controllers\ProjectsController::withdrawCommit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles POST requests to `/Projects/Withdraw-Commit/(:num)` via App\Modules\User\Controllers\ProjectsController::withdrawCommit, helping signed-in users work within the Projects tools.

### Referral

- [ ] **Referral – My Referrals**
  - **Route**: `/My-Referrals`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\ReferralController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/My-Referrals` via App\Modules\User\Controllers\ReferralController::index, helping signed-in users work within the Referral tools.

- [ ] **Referral – Referrals**
  - **Route**: `/Referrals`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\ReferralController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Referrals` via App\Modules\User\Controllers\ReferralController::index, helping signed-in users work within the Referral tools.

- [ ] **Referral – Create**
  - **Route**: `/Referrals/Create`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\ReferralController::create`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Referrals/Create` via App\Modules\User\Controllers\ReferralController::create, helping signed-in users work within the Referral tools.

- [ ] **Referral – Send Referral Email**
  - **Route**: `/Referrals/sendReferralEmail`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\ReferralController::sendReferralEmail`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Referrals/sendReferralEmail` via App\Modules\User\Controllers\ReferralController::sendReferralEmail, helping signed-in users work within the Referral tools.

### Search

- [ ] **Search – Search**
  - **Route**: `/Search`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\SearchController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Search` via App\Modules\User\Controllers\SearchController::index, helping signed-in users work within the Search tools.

- [ ] **Search – Search**
  - **Route**: `/Search/(:segment)`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\SearchController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Search/(:segment)` via App\Modules\User\Controllers\SearchController::index, helping signed-in users work within the Search tools.

### Wallets

- [ ] **Wallets – My Miwallet**
  - **Route**: `/MyMI-Wallet`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::MyMIWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/MyMI-Wallet` via App\Modules\User\Controllers\WalletsController::MyMIWallet, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Wallets**
  - **Route**: `/Wallets`
  - **Methods**: `GET`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET requests to `/Wallets` via App\Modules\User\Controllers\WalletsController::index, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Account Manager**
  - **Route**: `/Wallets/Account-Manager`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::accountManager`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Account-Manager` via App\Modules\User\Controllers\WalletsController::accountManager, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Add**
  - **Route**: `/Wallets/Add`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::add`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Add` via App\Modules\User\Controllers\WalletsController::add, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Add**
  - **Route**: `/Wallets/Add/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::add`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Add/(:segment)` via App\Modules\User\Controllers\WalletsController::add, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Add Fetch**
  - **Route**: `/Wallets/Add/(:segment)/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::addFetch`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Add/(:segment)/(:segment)` via App\Modules\User\Controllers\WalletsController::addFetch, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Create Banke Account**
  - **Route**: `/Wallets/Add/Bank-Account`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::createBankeAccount`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Add/Bank-Account` via App\Modules\User\Controllers\WalletsController::createBankeAccount, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Attach Account**
  - **Route**: `/Wallets/Attach-Account`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::attachAccount`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Attach-Account` via App\Modules\User\Controllers\WalletsController::attachAccount, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Attach Account**
  - **Route**: `/Wallets/Attach-Account/(:segment)/(:segment)/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::attachAccount`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Attach-Account/(:segment)/(:segment)/(:segment)` via App\Modules\User\Controllers\WalletsController::attachAccount, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Banking**
  - **Route**: `/Wallets/Banking`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::banking`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Banking` via App\Modules\User\Controllers\WalletsController::banking, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Add Account**
  - **Route**: `/Wallets/Banking/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::addAccount`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Banking/(:segment)` via App\Modules\User\Controllers\WalletsController::addAccount, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Add**
  - **Route**: `/Wallets/Banking/Add/Account/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::add`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Banking/Add/Account/(:segment)` via App\Modules\User\Controllers\WalletsController::add, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Details**
  - **Route**: `/Wallets/Banking/Details/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::details`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Banking/Details/(:segment)` via App\Modules\User\Controllers\WalletsController::details, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Edit**
  - **Route**: `/Wallets/Banking/Edit/Account/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::edit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Banking/Edit/Account/(:segment)` via App\Modules\User\Controllers\WalletsController::edit, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Checking**
  - **Route**: `/Wallets/Checking`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Checking` via App\Modules\User\Controllers\WalletsController::index, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Coin Swap**
  - **Route**: `/Wallets/Coin-Swap`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::coinSwap`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Coin-Swap` via App\Modules\User\Controllers\WalletsController::coinSwap, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Coin Swap**
  - **Route**: `/Wallets/Coin-Swap/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::coinSwap`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Coin-Swap/(:segment)` via App\Modules\User\Controllers\WalletsController::coinSwap, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Complete Purchase**
  - **Route**: `/Wallets/Complete/Purchase`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::completePurchase`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Complete/Purchase` via App\Modules\User\Controllers\WalletsController::completePurchase, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Confirm Deposit**
  - **Route**: `/Wallets/Confirm-Deposit`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::confirmDeposit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Confirm-Deposit` via App\Modules\User\Controllers\WalletsController::confirmDeposit, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Generate Wallet**
  - **Route**: `/Wallets/Create`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::generateWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Create` via App\Modules\User\Controllers\WalletsController::generateWallet, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Credit**
  - **Route**: `/Wallets/Credit`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Credit` via App\Modules\User\Controllers\WalletsController::index, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Details**
  - **Route**: `/Wallets/Credit/Details/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::details`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Credit/Details/(:segment)` via App\Modules\User\Controllers\WalletsController::details, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Edit**
  - **Route**: `/Wallets/Credit/Edit/Account/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::edit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Credit/Edit/Account/(:segment)` via App\Modules\User\Controllers\WalletsController::edit, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Debt**
  - **Route**: `/Wallets/Debt`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Debt` via App\Modules\User\Controllers\WalletsController::index, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Details**
  - **Route**: `/Wallets/Debt/Details/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::details`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Debt/Details/(:segment)` via App\Modules\User\Controllers\WalletsController::details, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Edit**
  - **Route**: `/Wallets/Debt/Edit/Account/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::edit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Debt/Edit/Account/(:segment)` via App\Modules\User\Controllers\WalletsController::edit, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Delete**
  - **Route**: `/Wallets/Delete/(:segment)/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::delete`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Delete/(:segment)/(:segment)` via App\Modules\User\Controllers\WalletsController::delete, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Deposit**
  - **Route**: `/Wallets/Deposit`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::deposit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Deposit` via App\Modules\User\Controllers\WalletsController::deposit, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Deposit**
  - **Route**: `/Wallets/Deposit/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::deposit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Deposit/(:segment)` via App\Modules\User\Controllers\WalletsController::deposit, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Deposit Complete**
  - **Route**: `/Wallets/Deposit/Complete`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::depositComplete`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Deposit/Complete` via App\Modules\User\Controllers\WalletsController::depositComplete, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Deposit Complete**
  - **Route**: `/Wallets/Deposit/Complete/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::depositComplete`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Deposit/Complete/(:segment)` via App\Modules\User\Controllers\WalletsController::depositComplete, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Add Deposit Fetch**
  - **Route**: `/Wallets/Deposit/Fetch`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::addDepositFetch`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Deposit/Fetch` via App\Modules\User\Controllers\WalletsController::addDepositFetch, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Deposit**
  - **Route**: `/Wallets/Deposit/Funds`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::deposit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Deposit/Funds` via App\Modules\User\Controllers\WalletsController::deposit, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Details**
  - **Route**: `/Wallets/Details`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::details`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Details` via App\Modules\User\Controllers\WalletsController::details, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Edit**
  - **Route**: `/Wallets/Edit`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::edit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Edit` via App\Modules\User\Controllers\WalletsController::edit, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Edit**
  - **Route**: `/Wallets/Edit/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::edit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Edit/(:segment)` via App\Modules\User\Controllers\WalletsController::edit, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Edit**
  - **Route**: `/Wallets/Edit/(:segment)/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::edit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Edit/(:segment)/(:segment)` via App\Modules\User\Controllers\WalletsController::edit, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Feature Manager**
  - **Route**: `/Wallets/Feature-Manager`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::featureManager`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Feature-Manager` via App\Modules\User\Controllers\WalletsController::featureManager, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Generate Wallet**
  - **Route**: `/Wallets/Generate-Wallet`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::generateWallet`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Generate-Wallet` via App\Modules\User\Controllers\WalletsController::generateWallet, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Details**
  - **Route**: `/Wallets/Investment/Details/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::details`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Investment/Details/(:segment)` via App\Modules\User\Controllers\WalletsController::details, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Edit**
  - **Route**: `/Wallets/Investment/Edit/Account/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::edit`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Investment/Edit/Account/(:segment)` via App\Modules\User\Controllers\WalletsController::edit, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Investments**
  - **Route**: `/Wallets/Investments`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::index`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Investments` via App\Modules\User\Controllers\WalletsController::index, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Link Account**
  - **Route**: `/Wallets/Link-Account`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::linkAccount`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Link-Account` via App\Modules\User\Controllers\WalletsController::linkAccount, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Link Account**
  - **Route**: `/Wallets/Link-Account/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::linkAccount`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Link-Account/(:segment)` via App\Modules\User\Controllers\WalletsController::linkAccount, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Link Account**
  - **Route**: `/Wallets/Link-Account/(:segment)/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::linkAccount`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Link-Account/(:segment)/(:segment)` via App\Modules\User\Controllers\WalletsController::linkAccount, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Link Account Success**
  - **Route**: `/Wallets/Link-Account/Success`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::linkAccountSuccess`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Link-Account/Success` via App\Modules\User\Controllers\WalletsController::linkAccountSuccess, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Link Account Success**
  - **Route**: `/Wallets/Link-Account/Success/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::linkAccountSuccess`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Link-Account/Success/(:segment)` via App\Modules\User\Controllers\WalletsController::linkAccountSuccess, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Wallet Manager**
  - **Route**: `/Wallets/Manager`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::walletManager`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Manager` via App\Modules\User\Controllers\WalletsController::walletManager, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Purchase**
  - **Route**: `/Wallets/Purchase`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::purchase`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Purchase` via App\Modules\User\Controllers\WalletsController::purchase, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Purchase Manager**
  - **Route**: `/Wallets/Purchase-Manager`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::purchaseManager`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Purchase-Manager` via App\Modules\User\Controllers\WalletsController::purchaseManager, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Purchase**
  - **Route**: `/Wallets/Purchase/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::purchase`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Purchase/(:segment)` via App\Modules\User\Controllers\WalletsController::purchase, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Purchase Complete**
  - **Route**: `/Wallets/Purchase/(:segment)/Complete`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::purchaseComplete`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Purchase/(:segment)/Complete` via App\Modules\User\Controllers\WalletsController::purchaseComplete, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Purchase Complete**
  - **Route**: `/Wallets/Purchase/Complete/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::purchaseComplete`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Purchase/Complete/(:segment)` via App\Modules\User\Controllers\WalletsController::purchaseComplete, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Purchase Complete**
  - **Route**: `/Wallets/Purchase/Complete/(:segment)/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::purchaseComplete`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Purchase/Complete/(:segment)/(:segment)` via App\Modules\User\Controllers\WalletsController::purchaseComplete, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Purchase**
  - **Route**: `/Wallets/Purchase/Memberships/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::purchase`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Purchase/Memberships/(:segment)` via App\Modules\User\Controllers\WalletsController::purchase, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Purchase**
  - **Route**: `/Wallets/Purchase/Memberships/(:segment)/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::purchase`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Purchase/Memberships/(:segment)/(:segment)` via App\Modules\User\Controllers\WalletsController::purchase, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Customize Membership**
  - **Route**: `/Wallets/Purchase/Memberships/Customize`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::customizeMembership`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Purchase/Memberships/Customize` via App\Modules\User\Controllers\WalletsController::customizeMembership, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Purchase Membership Success**
  - **Route**: `/Wallets/Purchase/Memberships/Success`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::purchaseMembershipSuccess`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Purchase/Memberships/Success` via App\Modules\User\Controllers\WalletsController::purchaseMembershipSuccess, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Purchase Membership Success**
  - **Route**: `/Wallets/Purchase/Memberships/Success`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::purchaseMembershipSuccess`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Purchase/Memberships/Success` via App\Modules\User\Controllers\WalletsController::purchaseMembershipSuccess, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Purchase My Migold**
  - **Route**: `/Wallets/Purchase/MyMI-Gold`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::purchaseMyMIGold`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Purchase/MyMI-Gold` via App\Modules\User\Controllers\WalletsController::purchaseMyMIGold, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Security Violation**
  - **Route**: `/Wallets/Purchase/MyMIGold/Security/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::securityViolation`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Purchase/MyMIGold/Security/(:segment)` via App\Modules\User\Controllers\WalletsController::securityViolation, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Transfer Funds**
  - **Route**: `/Wallets/Transfer-Funds`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::transferFunds`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Transfer-Funds` via App\Modules\User\Controllers\WalletsController::transferFunds, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Wallet Generator**
  - **Route**: `/Wallets/Wallet-Generator`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::walletGenerator`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Wallet-Generator` via App\Modules\User\Controllers\WalletsController::walletGenerator, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Wallet Selections**
  - **Route**: `/Wallets/Wallet-Selection`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::walletSelections`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Wallet-Selection` via App\Modules\User\Controllers\WalletsController::walletSelections, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Wallet Transaction**
  - **Route**: `/Wallets/Wallet-Transaction/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::walletTransaction`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Wallet-Transaction/(:segment)` via App\Modules\User\Controllers\WalletsController::walletTransaction, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Wallet Transaction**
  - **Route**: `/Wallets/Wallet-Transactions`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::walletTransaction`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Wallet-Transactions` via App\Modules\User\Controllers\WalletsController::walletTransaction, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Handle My Migpay Pal Callback**
  - **Route**: `/Wallets/Wallets/MyMIGPayPalCallback`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::handleMyMIGPayPalCallback`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Wallets/MyMIGPayPalCallback` via App\Modules\User\Controllers\WalletsController::handleMyMIGPayPalCallback, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Withdraw**
  - **Route**: `/Wallets/Withdraw`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::withdraw`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Withdraw` via App\Modules\User\Controllers\WalletsController::withdraw, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Withdraw**
  - **Route**: `/Wallets/Withdraw/(:segment)`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::withdraw`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Withdraw/(:segment)` via App\Modules\User\Controllers\WalletsController::withdraw, helping signed-in users work within the Wallets tools.

- [ ] **Wallets – Add Withdraw Fetch**
  - **Route**: `/Wallets/Withdraw/Fetch`
  - **Methods**: `GET|POST`
  - **Controller**: `App\Modules\User\Controllers\WalletsController::addWithdrawFetch`
  - **Category**: User Dashboard
  - **Status**: active
  - **Description**: Handles GET and POST requests to `/Wallets/Withdraw/Fetch` via App\Modules\User\Controllers\WalletsController::addWithdrawFetch, helping signed-in users work within the Wallets tools.