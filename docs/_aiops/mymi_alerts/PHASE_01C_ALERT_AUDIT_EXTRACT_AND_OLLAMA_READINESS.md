# Phase 01C — MyMI Alert Audit Extract + Ollama Readiness

Generated UTC: 2026-06-08T15:59:44Z
Branch: main
Commit: a271c0ae0 Register TBI CoinVault smoke command (#518)

## Objective

Extract actionable GTM findings from Phase 01B and verify whether local Ollama can participate in the next AIOps-only phase.

## Git Status

```text
 M writable/logs/emergency.log
?? docs/01_Systematic_Standup/
?? docs/_aiops/mymi_alerts/
```

## Existing MyMI / Alert / API Commands

```text
  aiops:alerts-clean                          Delete completed aiops
  aiops:solana-digest                         Summarize current
  aiops:api:schema                            Validate API endpoints
  aiops:alerts-check                          Fetch emails and queue
  aiops:alerts-health                         Run health checks on
  aiops:alerts-worker                         Process queued alert
  aiops:sql:check                             Validate
AIOps - Marketing
  aiops:email-scan                            Scan alerts mailbox
                                              generated trade
  alerts:fetch-raw-emails                     Fetch raw trade alert
                                              bf_investment_scraper
                                              upsert trade alerts.
  app:compat-audit                            Audit MyMI Wallet for
  coinvault:tbi-external-contribution-smoke   Validate MyMI
                                              MyMIDiscord.
                                              generate a MyMI Wallet
Marketing
  marketing:approve-generated                 Approve generated
                                              marketing content and
  marketing:audit:distribution                Audit marketing
  marketing:bluesky:healthcheck               Run Bluesky
                                              marketing
  marketing:daily-audit                       Daily marketing
  marketing:discord-activation                Send one-time Discord
                                              marketing stream
  marketing:discord:test-all-categories       Loop all configured
                                              marketing Discord
  marketing:discord:test-category             Send a
  marketing:distribute                        Distribute approved
                                              generated marketing
  marketing:distribution:assert-sql           Runs SQL-level anomaly
                                              marketing
  marketing:distribution:failure-inject-test  Dev-safe failure
  marketing:email:clean                       Moves already-ingested
  marketing:generate:package                  Generate a marketing
  marketing:mastodon:healthcheck              Run Mastodon
                                              marketing
  marketing:news:debug                        Diagnose marketing
  marketing:news:generate                     Generates clustered
                                              bf_marketing_temp_scraper
  marketing:news:imap-test                    Smoke test for
                                              marketing/news IMAP
  marketing:news:scrape                       Ingests alert/news
                                              bf_marketing_temp_scraper
  marketing:news:seed-test                    Insert synthetic rows
                                              bf_marketing_temp_scraper
  marketing:notification:test                 Test marketing
  marketing:pipeline                          Runs marketing
  marketing:process-notifications             Process pending
                                              marketing
                                              generate marketing
  marketing:promotions:audit                  Audit promotion source
  marketing:promotions:generate               Generate promotion
                                              finalized marketing
  marketing:promotions:test                   Run a chained smoke
  marketing:regression:smoke                  Runs full marketing
  marketing:retry-distribution                Retry failed marketing
  marketing:scraper:audit-emails              Audit recent trade and
                                              news emails against
                                              inventory MyMI Wallet
investments
  investments:economy:updateall               Fetch and store
  news:audit                                  Audit recent marketing
                                              news ingestion,
marketing
  marketing:automation:audit                  Verify marketing
  research:intelligence:signals               Generate trade-signal
  research:news:collect                       
  scanning:run                                Run MyMI liquidity +
```

## Extracted Alert-Related Files

```text

```text
app/Commands/DiscordCustomSend.php
app/Commands/Errors/DispatchAlerts.php
app/Commands/Marketing/DiscordActivationAnnouncement.php
app/Commands/Marketing/DiscordTestAllCategories.php
app/Commands/Marketing/DiscordTestCategory.php
app/Commands/Marketing/NewsDebug.php
app/Commands/Marketing/NewsGenerate.php
app/Commands/Marketing/NewsImapTest.php
app/Commands/Marketing/NewsScrape.php
app/Commands/Marketing/NewsSeedTest.php
app/Commands/NewsAudit.php
app/Commands/Research/DailyMarketReport.php
app/Commands/Research/FinancialNewsCollect.php
app/Commands/Research/MarketDataCompile.php
app/Commands/Research/WeeklyMarketReport.php
app/Commands/SolanaDigest.php
app/Config/DiscordHelp.php
app/Config/DiscordOps.php
app/Config/Discord.php
app/Config/MarketingDistribution.php
app/Config/Marketing.php
app/Config/NewsEmailServer.php
app/Database/Migrations/2006-04-18-000001_CreateFinancialNewsTable.php
app/Database/Migrations/2025-09-09-000010_CreatePredictionsMarkets.php
app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php
app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php
app/Database/Migrations/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php
app/Database/Migrations/2026-03-12-000100_CreateInvestmentForecastAccuracy.php
app/Database/Migrations/2026-03-19-000100_CreateMarketingVideoStudioTables.php
app/Database/Migrations/2026-03-20-000120_CreateTradeAlertScannerMeta.php
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php
app/Database/Migrations/2026-03-30-000400_AddTickerToProjects.php
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php
app/Database/Migrations/2026-04-05-000100_CreateMarketingNotificationPipelineTables.php
app/Database/Migrations/2026-04-09-120000_EnhanceMarketingGenerationPipeline.php
app/Database/Migrations/2026-04-09-130000_HardenMarketingNewsPipelineSchema.php
app/Database/Migrations/2026-04-12-120050_CreateMarketingDistributionTargets.php
app/Database/Migrations/2026-04-12-221500_AddExternalFieldsToMarketingDistributionTargets.php
app/Database/Migrations/2026-04-13-090000_AddDiscordCategoryFieldsToMarketingGeneratedContent.php
app/Database/Migrations/2026-04-13-120000_CreateDiscordOpsTables.php
app/Database/Migrations/2026-04-14-120000_RenameDiscordManualMessageRecipientFields.php
app/Database/Migrations/2026-04-19-000001_CreateMarketingPageSeoTable.php
app/Database/Migrations/2026-04-23-090000_HardenMarketingDistributionTargetsForReliability.php
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php
app/Database/Seeds/MarketingVideoStudioSeeder.php
app/Helpers/news_helper.php
app/Libraries/AlertChannelInterface.php
app/Libraries/AlertChannels/DiscordChannel.php
app/Libraries/AlertJobQueue.php
app/Libraries/AlertSourceInterface.php
app/Libraries/AlertSources/MarketAuxNewsSource.php
app/Libraries/ContentEngine/templates/discord.php
app/Libraries/DiscordAlert.php
app/Libraries/MarketNewsProvider.php
app/Libraries/MyMIAlerts.php
app/Libraries/MyMIDiscord.php
app/Libraries/MyMIInvestments.php
app/Libraries/MyMIMarketAux.php
app/Libraries/MyMIMarketData.php
app/Libraries/MyMIMarketing.php
app/Libraries/MyMINews.php
app/Libraries/MyMISnapTrader.php
app/Libraries/TradeAlertMailboxFetcher.php
app/Libraries/Trades/TradeEnhancements.php
app/Libraries/Traits/MarketingBatchTrait.php
app/Models/AlertJobModel.php
app/Models/AlertsModel.php
app/Models/DiscordAiMessageModel.php
app/Models/DiscordAiNoteModel.php
app/Models/DiscordAiSessionModel.php
app/Models/DiscordLinkModel.php
app/Models/DiscordManualMessageModel.php
app/Models/DiscordModel.php
app/Models/DiscordRelayAuditModel.php
app/Models/ErrorAlertEventModel.php
app/Models/ErrorAlertRuleModel.php
app/Models/Fin/TradeModel.php
app/Models/InvestmentForecastAccuracyModel.php
app/Models/InvestmentForecastHistoryModel.php
app/Models/InvestmentModel.php
app/Models/InvestmentPriceForecastModel.php
app/Models/InvestmentScannerLineageModel.php
app/Models/InvestmentTickerDailyCountModel.php
app/Models/MarketingDistributionTargetModel.php
app/Models/Marketing/EmailMarketingModel.php
app/Models/Marketing/MarketingPublishQueueModel.php
app/Models/Marketing/MarketingVideoAssetModel.php
app/Models/Marketing/MarketingVideoContentModel.php
app/Models/Marketing/MarketingVideoTemplateModel.php
app/Models/Marketing/MarketingVideoVersionModel.php
app/Models/MarketingModel.php
app/Models/MarketingNewsletterModel.php
app/Models/Predictions/MarketsModel.php
app/Models/Predictions/TradesModel.php
app/Models/TradeAlertScannerMetaModel.php
app/Modules/APIs/Controllers/AlertsAPIController.php
app/Modules/APIs/Controllers/AlertsPublicAPIController.php
app/Modules/APIs/Controllers/DiscordAPIController.php
app/Modules/APIs/Controllers/InvestmentsAPIController.php
app/Modules/APIs/Controllers/MarketingAPIController.php
app/Modules/APIs/Models/InvestmentsNewsModel.php
app/Modules/APIs/Models/InvestmentsTickersModel.php
app/Modules/APIs/Models/MarketingNewsContentModel.php
app/Modules/Blog/Controllers/NewsAndUpdates.php
app/Modules/Blog/Views/HowItWorks/Daily_Financial_News.php
app/Modules/Blog/Views/HowItWorks/Discord.php
app/Modules/Blog/Views/HowItWorks/Investment_Portfolio_Management.php
app/Modules/Blog/Views/Investing/Tips_For_Effective_Investment_Portfolio_Management.php
app/Modules/Exchange/Views/Solana/trade.php
app/Modules/Management/Controllers/AlertsAdminController.php
app/Modules/Management/Controllers/DiscordAdminController.php
app/Modules/Management/Controllers/InvestmentsAdminController.php
app/Modules/Management/Controllers/MarketingAdminController.php
app/Modules/Management/Controllers/MarketingController-07012024.php.tmp
app/Modules/Management/Controllers/MarketingController.11202024.php.tmp
app/Modules/Management/Documents/Marketing/MarketingOpRunbook.md
app/Modules/Management/Models/AlertPendingModel.php
app/Modules/Management/Views/Alerts/emails/trade_alerts.php
app/Modules/Management/Views/Alerts/form_fields/trade_alert_fields.php
app/Modules/Management/Views/Alerts/modals/addTrade.php
app/Modules/Management/Views/Alerts/modals/createTradeAlert.php
app/Modules/Management/Views/Alerts/modals/manageTradeAlert.php
app/Modules/Management/Views/Alerts/modals/viewTradeChart.php
app/Modules/Management/Views/Alerts/resources/market-data.php
app/Modules/Management/Views/Alerts/resources/sendDiscordAlert.php
app/Modules/Management/Views/Alerts/tradeAnalysis.php
app/Modules/Management/Views/Alerts/tradeDetails.php
app/Modules/Management/Views/Alerts/Trades.php
app/Modules/Management/Views/Assets/Applications/Approval/Market_Conversion.php
app/Modules/Management/Views/Investments/news.php
app/Modules/Management/Views/Marketing/Exchanges/includes/discord.php
app/Modules/Management/Views/Marketing/financialNews.php
app/Modules/Management/Views/Marketing/Marketing_Manager_10162023.php
app/Modules/Management/Views/Marketing/Marketing_Manager.php
app/Modules/Management/Views/Projects/index/investment_commitment.php
app/Modules/Management/Views/Web_Design/Infrastructure_Overview/Alerting_System/Breakout_Stock_Alerts.php
app/Modules/Management/Views/Web_Design/Infrastructure_Overview/Alerting_System/Instant_Buy_Alerts.php
app/Modules/Management/Views/Web_Design/Infrastructure_Overview/Alerting_System/Market_Movers.php
app/Modules/Management/Views/Web_Design/Infrastructure_Overview/Alerting_System/Targeting/Instant_Buy_Alerts.php
app/Modules/Management/Views/Web_Design/Infrastructure_Overview/Alerting_System/Targeting/Market_Movers.php
app/Modules/Management/Views/Web_Design/Test_Page/trade_tracker.php
app/Modules/Marketing_New/Models/MarketingModel.php
app/Modules/PropFirms/Models/PropTradeJournalModel.php
app/Modules/ScriptStudio/Views/marketplace.php
app/Modules/Support/Libraries/DiscordSupportNotifier.php
app/Modules/Support/Views/discord_onboarding.php
app/Modules/User/Controllers/AlertsController.php
app/Modules/User/Controllers/InvestmentsController.php
app/Modules/User/Controllers/TradeTracker.php
app/Modules/User/Views/Alerts/trades.php
app/Modules/User/Views/Investments/Add/Bond/trade.php
app/Modules/User/Views/Investments/Add/trade.php
app/Modules/User/Views/Investments/index/Investment_Calendar.php
app/Modules/User/Views/Investments/index/Investment_Research.php
app/Modules/User/Views/Investments/index/Investment_Tools.php
app/Modules/User/Views/Investments/index/Investment_Tools-sm.php
app/Modules/User/Views/Investments/index/Markets.php
app/Modules/User/Views/Investments/index/My_Alerts.php
app/Modules/User/Views/Investments/index/MyMI_News.php
app/Modules/User/Views/Investments/index/Recent_Trades.php
app/Modules/User/Views/Investments/index/Top_Trades.php
app/Modules/User/Views/Investments/resources/import_investments.php
app/Modules/User/Views/Investments/resources/manage_trade.php
app/Modules/User/Views/Investments/resources/market_news.php
app/Modules/User/Views/Investments/resources/mymi_news.php
app/Modules/User/Views/Investments/resources/set_alerts.php
app/Modules/User/Views/Investments/resources/share_trade.php
app/Modules/User/Views/Investments/resources/working/all_investments.php
app/Modules/User/Views/Investments/tradeTracker copy 2.php
app/Modules/User/Views/Investments/tradeTracker copy.php
app/Modules/User/Views/Investments/tradeTracker-full-functionality.php
app/Modules/User/Views/Investments/tradeTracker.php
app/Modules/User/Views/Investments/tradeTracker-working-12082024.php
app/Modules/User/Views/Knowledgebase/includes/Assets/mymi_marketplace.php
app/Modules/User/Views/Knowledgebase/Trade_Tracker.php
app/Modules/User/Views/Predictions/markets.php
app/Modules/User/Views/Projects/holdings/list_investments.php
app/Modules/User/Views/Projects/index/investment_commitment.php
app/Modules/User/Views/Referral_Program/Marketing_Affiliate_Program_Agreement.php
app/Modules/User/Views/Wallets/Add_Account/investment_fields.php
app/Modules/User/Views/Wallets/Details/investment_accounts.php
app/Modules/User/Views/Wallets/Edit_Account/investment_fields.php
app/Modules/User/Views/Wallets/index/investment_wallets.php
app/Modules/User/Views/Wallets/Link_Account/Import-Trades.php
app/Modules/User/Views/Wallets/Link_Account (Original)/Import-Trades.php
app/Modules/User/Views/Wallets/Link_Account (Original)/TD-Ameritrade.php
app/Modules/User/Views/Wallets/Link_Account (Original)/Trade-Import-Success.php
app/Modules/User/Views/Wallets/Link_Account (Original)/Upload-Trades.php
app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-07202022.php
app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-B.php
app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade.php
app/Modules/User/Views/Wallets/Link_Account/Trade-Import-Success.php
app/Modules/User/Views/Wallets/Link_Account/Upload-Trades.php
app/Modules/User/Views/Wallets/types/investment_wallets.php
app/Services/AlertService.php
app/Services/Discord/DiscordOpsRelayService.php
app/Services/Forecasting/MarketDataProviderInterface.php
app/Services/InvestmentService.php
app/Services/Marketing/Distribution/Adapters/DiscordDestinationAdapter.php
app/Services/Marketing/Distribution/DiscordMessageBuilder.php
app/Services/MarketingDistributionService.php
app/Services/Marketing/EmailMarketingService.php
app/Services/Marketing/MarketingNotificationService.php
app/Services/Marketing/MarketingVideoService.php
app/Services/MarketingNewsGenerateService.php
app/Services/MarketingNewsScrapeService.php
app/Services/MarketingNotificationService.php
app/Services/MarketingPackageService.php
app/Services/MarketingPipelineService.php
app/Services/MarketingScraper.php
app/Services/MarketingService.php
app/Services/MarketingStoryService.php
app/Services/Observability/ErrorAlertService.php
app/Services/Scanning/Providers/MarketDataProviderInterface.php
app/Services/Scanning/ScannerAlertBridge.php
app/Services/TradeAlertsIngest.php
app/Views/Auth/register/Discord.php
app/Views/emails/ai_ops_alert.php
app/Views/themes/public/how_it_works/alerts.php
app/Views/themes/public/previewAlert.orig.php
app/Views/themes/public/previewAlert.php
```

```

## Extracted Alert-Related Routes

```text

```text
| GET     | Alerts/Preview/([^/]+)                                                      | »                                              | \App\Modules\User\Controllers\AlertsController::preview/$1                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                         | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Preview/Alert/([^/]+)                                                       | »                                              | \App\Modules\User\Controllers\AlertsController::preview/$1                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Investments/News                                                            | »                                              | (Closure)                                                                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Purchase/MyMIGold                                                           | »                                              | (Closure)                                                                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck                         | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | How-It-Works/Purchase/MyMIGold                                              | »                                              | (Closure)                                                                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf                                   | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Discord/register                                                            | discord-register                               | \App\Controllers\AuthController::register                                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf no-cache                          | no-cache cspoff sessionTracker requestLifecycle observability jsonException toolbar                        |
| GET     | Discord/register/([^/]+)                                                    | discord-register-referral                      | \App\Controllers\AuthController::register/$1                                                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf no-cache                          | no-cache cspoff sessionTracker requestLifecycle observability jsonException toolbar                        |
| GET     | MyMI-Wallet                                                                 | mymi-wallet                                    | \App\Modules\User\Controllers\WalletsController::MyMIWallet                                           | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Trade-Tracker                                                               | mymi-trade-tracker                             | \App\Modules\User\Controllers\InvestmentsController::tradeTracker                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Trade-Tracker/getTradeData                                                  | get-trade-tracker-data                         | \App\Modules\User\Controllers\InvestmentsController::getTradeData                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | MyMI-Gold/Goals/([^/]+)                                                     | mymi-gold-daily-goals                          | \App\Modules\User\Controllers\DashboardController::goals                                              | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | API/mobile/investments                                                      | »                                              | \App\Modules\APIs\Controllers\MobileController::investments                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked apiToken                                           | apiToken cspoff sessionTracker requestLifecycle observability jsonException toolbar                        |
| GET     | API/mobile/alerts                                                           | »                                              | \App\Modules\APIs\Controllers\MobileController::alerts                                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked apiToken                                           | apiToken cspoff sessionTracker requestLifecycle observability jsonException toolbar                        |
| GET     | API/cronFetchAndGenerateNews                                                | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchAndGenerateNews                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getSymbolsByTradeType/([^/]+)                               | »                                              | \App\Modules\APIs\Controllers\APIController::getSymbolsByTradeType/$1                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getForecastDetails/([^/]+)                                  | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getForecastDetails/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getConfidenceHeatmap                                        | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getConfidenceHeatmap                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getTopConfidenceBySector                                    | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getTopConfidenceBySector                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getConfidenceDistribution                                   | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getConfidenceDistribution                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getForecastAccuracySummary                                  | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getForecastAccuracySummary                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/commandsCatalog                                                 | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::commandsCatalog                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/onboardingSteps                                                 | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::onboardingSteps                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/sharingGuide                                                    | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::sharingGuide                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/health                                                          | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::health                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/lookup/ticker                                                   | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::tickerLookup                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/lookup/crypto                                                   | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::cryptoLookup                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/lookup/quote                                                    | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::quoteLookup                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/process-queue                                                   | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::processQueue                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/coalesce-now                                                    | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::coalesceNow                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Management/distributeTodaysNewsContent                                  | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::distributeTodaysNewsContent                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/fetchAlphaVantageNewsForTradeAlerts                          | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::fetchAlphaVantageNewsForTradeAlerts            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/fetchNewsEmails                                              | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::fetchNewsEmails                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/generateCoffeeAndStocksNewsletter                            | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::generateCoffeeAndStocksNewsletter              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/fetchCoffeeAndStocksNewsletter                               | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::fetchCoffeeAndStocksNewsletter                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/runBackfillAlertsEmails                                      | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::runBackfillAlertsEmails                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/runBackfillMarketingEmails                                   | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::runBackfillMarketingEmails                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/getAlerts                                                    | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::getAlerts                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/getNews                                                      | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::getNews                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/processAllTradeAlerts                                        | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::processAllTradeAlerts                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/sendAllDiscordAlerts                                         | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::sendAllDiscordAlerts                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/updateMarketDataForAlerts                                    | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::updateMarketDataForAlerts                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/cronAnalyzeContent                                 | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronAnalyzeContent                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/cronFetchAndGenerateNews                           | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchAndGenerateNews                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/generateContent                                    | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchAndGenerateNews                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/cronFetchInbox                                     | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchInbox                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/cronFetchMarketingEmails                           | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::cronFetchMarketingEmails                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/generateContentDigestFromStored                    | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::generateContentDigestFromStored                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/generateContentFromScraper                         | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::generateContentFromScraper                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/generateDailyContentDigest                         | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::generateDailyContentDigest                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/Marketing/massResendActivationEmails                         | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::massResendActivationEmails                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/getSocialPlatforms                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getSocialPlatforms                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/getSocialCommunities                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getSocialCommunities                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/saveSocialCommunity                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::saveSocialCommunity                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/getPostTemplates                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getPostTemplates                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/savePostTemplate                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::savePostTemplate                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/generatePlatformPosts/([0-9]+)                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePlatformPosts/$1                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/generatePlatformPosts                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePlatformPosts                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/generateDailyCommunityPosts                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateDailyCommunityPosts                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/exportGeneratedPostJson/([0-9]+)                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::exportGeneratedPostJson/$1                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/generateRevenueDocs                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateRevenueDocs                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/cronGenerateDailyCommunityPosts                              | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronGenerateDailyCommunityPosts                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Management/cronQueueDistribution                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronQueueDistribution                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar                         |
| GET     | API/Alerts/ingestCsvSignals                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::ingestCsvSignals                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/signals                                                          | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getSignals                                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/signalFiles                                                      | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getSignalFiles                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/previewSignalFile/([0-9]+)                                       | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::previewSignalFile/$1                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/recalcSignalScores                                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::recalcSignalScores                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/addTradeAlert                                                    | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::addTradeAlert                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/backfillCategories                                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::backfillCategories                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/createTradeAlert/([^/]+)                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::addTradeAlert                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/createTradeAlert                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::addTradeAlert                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getFilteredAlerts                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getFilteredAlerts                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/scanner                                                          | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::scanner                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/fetchAutoGeneratedAnalysis                                       | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::fetchAutoGeneratedAnalysis                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/fetchEmailAlerts                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::fetchEmailAlerts                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/fetchMarketAuxNews/([^/]+)                                       | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::fetchMarketAuxNews/$1                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/forceFetchEmails                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::forceFetchEmails                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/forceFetchTickers                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::forceFetchTickers                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateMarketingForAlert/([0-9]+)                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateMarketingForAlert/$1                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateNow                                                      | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateNow                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateTradeAlertSummary                                        | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateTradeAlertSummary                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getEmaComparison/([^/]+)                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getEmaComparison/$1                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateAlertSocialCopy/([0-9]+)                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateAlertSocialCopy/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getFullMetrics                                                   | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getFullMetrics                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getLatestPrices                                                  | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getLatestPrices                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getTechnicalIndicators                                           | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getTechnicalIndicators                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/hideTradeAlert                                                   | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::hideTradeAlert                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/manageTradeAlert                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::manageTradeAlert                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/markAlertAsSentAndSendEmail/([^/]+)                              | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::markAlertAsSentAndSendEmail/$1                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/processAlerts                                                    | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processAlerts                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/processEmailAlerts                                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processEmailAlerts                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/processTradeAlerts                                               | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processTradeAlerts                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/processTradeBatch                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::processTradeBatch                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/sendAlert                                                        | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sendAlert                                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/sendDiscordAlerts                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sendDiscordAlerts                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/sendDiscordAlertsBySymbol/([^/]+)                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sendDiscordAlertsBySymbol/$1                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey                                            | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/storeMarketingContent                                            | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::storeMarketingContent                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateBatchPrices                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateBatchPrices                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateChartOverride                                              | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateChartOverride                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateExchange                                                   | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateExchange                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateStatus/([0-9]+)/(.*)                                       | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateStatus/$1/$2                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/updateTradeAlerts                                                | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::updateTradeAlerts                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/submitTradeAlert                                                 | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::submitTradeAlert                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/getTradeAlertDetails                                             | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::getTradeAlertDetails                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateVoiceoverScript                                          | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateVoiceoverScript                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateVoiceoverAndMarketingContent                             | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateVoiceoverAndMarketingContent               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateAndStoreVoiceover                                        | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateAndStoreVoiceover                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/generateSocialMediaPosts                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::generateSocialMediaPosts                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/postMarketingContentToSocials                                    | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::postMarketingContentToSocials                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/gen-keys                                                         | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::genKeys                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Alerts/sign                                                             | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::sign                                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Broker/investment-accounts                                              | »                                              | \App\Modules\APIs\Controllers\BrokerAPIController::investmentAccounts                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Broker/fetchPlaidInvestments/([^/]+)                                    | »                                              | \App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidInvestments/$1                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Broker/fetchPlaidInvestments                                            | »                                              | \App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidInvestments                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Budget/investment-accounts                                              | »                                              | \App\Modules\APIs\Controllers\BudgetAPIController::investmentAccounts                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments                                                             | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController:index                                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getInvestmentData/([^/]+)                                   | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getInvestmentData/$1                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/searchTickers                                               | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::searchTickers                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/news                                                        | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::listNews                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/news/([0-9]+)                                               | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getNews/$1                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Investments/getForecastHighlights                                       | »                                              | \App\Modules\APIs\Controllers\InvestmentsAPIController::getForecastHighlights                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronAnalyzeContent                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronAnalyzeContent                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronAutoPublishGroupedDigest                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronAutoPublishGroupedDigest                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronFetchAndGenerateNews                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronFetchAndGenerateNews                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronFetchInbox                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronFetchInbox                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronFetchMarketingEmails                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronFetchMarketingEmails                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/cronProcessSMSMarketingIdeas                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::cronProcessSMSMarketingIdeas                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/downloadVoiceover/(.*)                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::downloadVoiceover/$1                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/distributeHighScoreContent                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::distributeHighScoreContent                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/emailPostForApproval/([0-9]+)                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::emailPostForApproval/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchBufferPaginated                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchBufferPaginated                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchFinalizedSummariesBlock                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchFinalizedSummariesBlock                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchGeneratedSummaries                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchGeneratedSummaries                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchGeneratedSummariesBlock                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchGeneratedSummariesBlock                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchGeneratedSummariesJson                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchGeneratedSummariesJson                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getVideoContent/([0-9]+)                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getVideoContent/$1                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getVideoQueue                                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getVideoQueue                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateFromTicker                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromTicker                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateFromTopic                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromTopic                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateFromScrapedSource/([0-9]+)                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromScrapedSource/$1                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/exportVideoPackage/([0-9]+)                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::exportVideoPackage/$1                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getTemplates                                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getTemplates                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/saveTemplate                                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::saveTemplate                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/forceGenerateFromTemp                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::forceGenerateFromTemp                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/ForceGenerateFromTemp/([0-9]+)                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::ForceGenerateFromTemp/$1                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateCampaignContent                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateCampaignContent                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateDailyMarketCampaign                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateDailyMarketCampaign                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateCampaignStepContent                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateCampaignStepContent                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateContentFromScraper                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateContentFromScraper                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateContentDigestFromStored                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateContentDigestFromStored                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateDailyContentDigest                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateDailyContentDigest                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateKimiSummaries                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateKimiSummaries                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateKimiPosts                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateKimiPosts                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/GenerateFromSimilar/([0-9]+)                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromSimilar/$1                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateFromSimilar                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateFromSimilar                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateLivePreview                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateLivePreview                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generatePostsFromSummary/([0-9]+)                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePostsFromSummary/$1                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generatePostsFromSummary                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePostsFromSummary                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generatePostMediaContent                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generatePostMediaContent                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateScheduledPosts                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateScheduledPosts                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getCleanedScrapedContent                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getCleanedScrapedContent                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getScrapeDetails/([0-9]+)                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getScrapeDetails/$1                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateThreadFromSummary/([0-9]+)                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateThreadFromSummary/$1                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getContentPerformanceAnalytics                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getContentPerformanceAnalytics                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getGeneratedPostsPaginated                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getGeneratedPostsPaginated                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getStoryboardPackage/([0-9]+)                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getStoryboardPackage/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getTopGeneratedPosts                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getTopGeneratedPosts                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getTopKeywordChart/([0-9]+)                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getTopKeywordChart/$1                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/groupSimilarSummariesByCosine                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::groupSimilarSummariesByCosine                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/massResendActivationEmails                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::massResendActivationEmails                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/monitorKeywords                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::monitorKeywordsAndScrape                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/previewBufferItem/([0-9]+)                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::previewBufferItem/$1                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/previewPendingSummaries                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::previewPendingSummaries                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processMarketingTempEmails/([0-9]+)/([^/]+)/([0-9]+)          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processMarketingTempEmails/$1/$2/$3             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processMarketingTempEmails/([0-9]+)/([^/]+)                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processMarketingTempEmails/$1/$2                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/publishGroupedContentDraft                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::publishGroupedContentDraft                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/rankBufferPostsDaily                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::rankBufferPostsDaily                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runNewsScrape                                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runNewsScrape                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runNewsGenerate                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runNewsGenerate                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runNewsPipeline                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runNewsPipeline                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/reprocessIncompleteEmails                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::reprocessIncompleteEmails                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runContentGenerationBatch                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runContentGenerationBatch                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runKeywordBackfillBatch                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runKeywordBackfillBatch                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runKeywordEnrichment                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runKeywordEnrichment                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runScheduledTasks                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runScheduledTasks                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Search/([^/]+)/(.*)                                           | »                                              | \App\Modules\APIs\Controllers\ManagementController::index/$1/$2                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/sendWalkthroughEmails                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::sendWalkthroughEmails                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/scheduleApprovedPost/([0-9]+)                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::scheduleApprovedPost/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/schedulePost/(.*)/(.*)/(.*)                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::schedulePost/$1/$2/$3                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/sharePost/([0-9]+)/([^/]+)                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::sharePost/$1/$2                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Large-Content/Form                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::submitLargeContentForm                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Manual-Content/Form                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::shortLongContentForm                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/testGenerateDailyDigest                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::testGenerateDailyDigest                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/testGenerateFromTempEmail/([0-9]+)                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::testGenerateFromTempEmail/$1                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/testTfIdfEdgeCases                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::testTfIdfEdgeCases                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/testGenerateSummarizerHarness                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::testGenerateSummarizerHarness                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Timeline/([^/]+)                                              | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::timeline/$1                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Timeline                                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::viewTimelineGrouped                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/triggerBackfill                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::reprocessIncompleteEmails                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/triggerPostAutogenOnEmpty                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::triggerPostAutogenOnEmpty                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processPendingNotifications                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processPendingNotifications                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processPendingTempScraper                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processPendingTempScraper                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processPendingCampaigns                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processPendingCampaigns                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/processPendingGeneratedContent                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::processPendingGeneratedContent                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/distributionSummary                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::distributionSummary                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/distributionHistory/([0-9]+)                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::distributionHistory/$1                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/distributionFailedSummary                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::distributionFailedSummary                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/distributionChannelTotals                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::distributionChannelTotals                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/retryDistributionTargets                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::retryDistributionTargets                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/retryDistributionTargets/([0-9]+)                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::retryDistributionTargets/$1                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/runMarketingPipeline                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::runMarketingPipeline                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing                                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::index                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Add/([^/]+)                                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::add/$1                                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Approve-Content/([0-9]+)                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::approveContent/$1                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Blog-Creator                                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::blogCreator                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Blogs                                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::blogs                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Campaigns                                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::campaigns                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Content-Review                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::contentReview                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Content/Generator                                             | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::contentGenerator                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Content/Listing                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::contentListing                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Daily-Log                                                     | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::viewDailyLogs                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Edit-Content/([0-9]+)                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::editContent/$1                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Email/(.*)/(.*)                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::viewEmail/$1/$2                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/fetchEmails                                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::fetchEmails                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Financial-News                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::financialNews                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateContent                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateContent                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/generateNewsletter                                            | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateNewsletterContent                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getRecentScrapes                                              | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::getRecentScrapes                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Grouped-Content-Drafts                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::generateGroupedContentDrafts                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Ideas                                                         | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::ideas                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Post-Creator                                                  | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::postCreator                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/previewGeneratedPost/([0-9]+)                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::previewGeneratedPost/$1                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Promote                                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::promote                                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Promote/([^/]+)                                               | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::promote                                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Research                                                      | »                                              | \App\Modules\APIs\Controllers\AlertsAPIController::research                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/RunContentGeneration                                          | »                                              | \App\Modules\APIs\Controllers\Management\MarketingAPIController::runContentGeneration                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Quick-Scraper                                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::standaloneScrape                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Reject-Content/([0-9]+)                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::rejectContent/$1                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Schedule                                                      | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::schedule                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Schedule/([^/]+)                                              | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::schedule/$1                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/scheduleNewsletters                                           | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::scheduleNewsletterCampaign                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/submitDailyLog                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::submitDailyLog                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/sendNotification                                              | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::sendNotification                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/sendNewsletter                                                | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::sendScheduleNewsletter                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Communities                                                   | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::communities                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Test                                                          | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::test                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Twitter                                                       | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::twitterDashboard                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Video-Creator                                                 | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::videoCreator                                    | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/View-Email/([^/]+)/([^/]+)                                    | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::viewEmail/$1/$2                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/View-Grouped-Summaries                                        | »                                              | \App\Modules\APIs\Controllers\MarketingAPIController::View-Grouped-Summaries                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/MyMI-Gold/Tasks/Add                                           | »                                              | \App\Modules\APIs\Controllers\WalletsAPIController::addUserGoldTasks                                  | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Email-Templates/create                                        | »                                              | \App\Modules\APIs\Controllers\EmailTemplateController::create                                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Email-Queue                                                   | »                                              | \App\Modules\APIs\Controllers\EmailQueueController::index                                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/Email-Queue/create                                            | »                                              | \App\Modules\APIs\Controllers\EmailQueueController::create                                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getPlatforms                                                  | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::getPlatforms                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/getPlatformRules/([^/]+)                                      | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::getPlatformRules/$1                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Marketing/listSuggestions/([^/]+)/([^/]+)                               | »                                              | \App\Modules\APIs\Controllers\ManagementAPIController::listSuggestions/$1/$2                          | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Predictions/Markets                                                     | »                                              | \App\Modules\APIs\Controllers\PredictionsAPIController::markets                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
```

## Extracted Key Method / Table References

```text

```text
app/Controllers/BaseController.php:1556:            // Embeds (YouTube, TradingView, Clarity)
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:11:        if ($this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:14:            if (! $this->db->fieldExists('source', 'bf_investment_scraper')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:23:            if (! $this->db->fieldExists('account_type', 'bf_investment_scraper')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:32:            if (! $this->db->fieldExists('message_hash', 'bf_investment_scraper')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:42:                $this->forge->addColumn('bf_investment_scraper', $fields);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:45:            $this->addIndexIfMissing('bf_investment_scraper', 'idx_scraper_source_hash', ['source', 'message_hash']);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:48:        if ($this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:51:            if (! $this->db->fieldExists('source', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:60:            if (! $this->db->fieldExists('account_type', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:69:            if (! $this->db->fieldExists('broker_order_id', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:78:            if (! $this->db->fieldExists('execution_id', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:87:            if (! $this->db->fieldExists('filled_qty', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:96:            if (! $this->db->fieldExists('filled_price', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:105:            if (! $this->db->fieldExists('filled_at', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:112:            if (! $this->db->fieldExists('side', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:121:            if (! $this->db->fieldExists('notified_discord', 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:131:                $this->forge->addColumn('bf_investment_trade_alerts', $fields);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:134:            $this->addIndexIfMissing('bf_investment_trade_alerts', 'idx_trade_alerts_execution_id', ['execution_id'], true);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:135:            $this->addIndexIfMissing('bf_investment_trade_alerts', 'idx_trade_alerts_notified_discord', ['notified_discord']);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:141:        if ($this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:142:            $this->dropIndexIfExists('bf_investment_trade_alerts', 'idx_trade_alerts_execution_id');
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:143:            $this->dropIndexIfExists('bf_investment_trade_alerts', 'idx_trade_alerts_notified_discord');
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:156:            $existing = array_filter($columns, fn ($column) => $this->db->fieldExists($column, 'bf_investment_trade_alerts'));
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:158:                $this->forge->dropColumn('bf_investment_trade_alerts', $existing);
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:162:        if ($this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:163:            $this->dropIndexIfExists('bf_investment_scraper', 'idx_scraper_source_hash');
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:166:            $existing = array_filter($columns, fn ($column) => $this->db->fieldExists($column, 'bf_investment_scraper'));
app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:168:                $this->forge->dropColumn('bf_investment_scraper', $existing);
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:75:        if ($this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:87:                if (! $this->db->fieldExists($name, 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:88:                    $this->forge->addColumn('bf_investment_trade_alerts', [$name => $definition]);
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:93:                $this->db->query('CREATE INDEX latest_forecast_id ON bf_investment_trade_alerts (latest_forecast_id)');
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:112:        if ($this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:124:                if ($this->db->fieldExists($column, 'bf_investment_trade_alerts')) {
app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:125:                    $this->forge->dropColumn('bf_investment_trade_alerts', $column);
app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:75:                'occurrences' => ['type' => 'INT', 'unsigned' => true, 'default' => 0],
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:13:        if (! $this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:17:        $fields = $this->db->getFieldData('bf_investment_trade_alerts');
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:27:            $this->forge->addColumn('bf_investment_trade_alerts', [
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:32:                    'after' => 'notification_sent',
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:37:        $this->db->query("UPDATE bf_investment_trade_alerts SET source = 'scanner' WHERE source IS NULL OR source = ''");
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:40:            $this->db->query('ALTER TABLE bf_investment_trade_alerts ADD UNIQUE KEY uniq_ticker_status_source (ticker, status, source)');
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:48:        if (! $this->db->tableExists('bf_investment_trade_alerts')) {
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php:53:            $this->db->query('ALTER TABLE bf_investment_trade_alerts DROP INDEX uniq_ticker_status_source');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:11:        if (! $this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:15:        if (! $this->db->fieldExists('email_identifier', 'bf_investment_scraper')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:16:            $this->forge->addColumn('bf_investment_scraper', [
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:27:        if (! $this->indexExists('bf_investment_scraper', 'idx_scraper_email_identifier')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:28:            $this->db->query('CREATE INDEX `idx_scraper_email_identifier` ON `bf_investment_scraper` (`email_identifier`)');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:31:        $sourceHashUnique = $this->indexExists('bf_investment_scraper', 'uq_scraper_source_hash');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:32:        if (! $sourceHashUnique && $this->db->fieldExists('source', 'bf_investment_scraper') && $this->db->fieldExists('message_hash', 'bf_investment_scraper')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:34:                if ($this->indexExists('bf_investment_scraper', 'idx_scraper_source_hash')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:35:                    $this->db->query('DROP INDEX `idx_scraper_source_hash` ON `bf_investment_scraper`');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:38:                $this->db->query('CREATE UNIQUE INDEX `uq_scraper_source_hash` ON `bf_investment_scraper` (`source`, `message_hash`)');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:45:        if (! $this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:49:        if ($this->indexExists('bf_investment_scraper', 'uq_scraper_source_hash')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:50:            $this->db->query('DROP INDEX `uq_scraper_source_hash` ON `bf_investment_scraper`');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:53:        if ($this->indexExists('bf_investment_scraper', 'idx_scraper_email_identifier')) {
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:54:            $this->db->query('DROP INDEX `idx_scraper_email_identifier` ON `bf_investment_scraper`');
app/Database/Migrations/2026-03-21-000100_EnsureInvestmentScraperEmailDedupe.php:62:FROM `bf_investment_scraper`
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:11:        if (! $this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:17:        if (! $this->db->fieldExists('email_identifier', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:20:        if (! $this->db->fieldExists('email_sender', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:23:        if (! $this->db->fieldExists('source', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:26:        if (! $this->db->fieldExists('account_type', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:29:        if (! $this->db->fieldExists('email_type', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:32:        if (! $this->db->fieldExists('metadata', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:35:        if (! $this->db->fieldExists('created_on', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:38:        if (! $this->db->fieldExists('updated_at', 'bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:43:            $this->forge->addColumn('bf_investment_scraper', $fields);
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:46:        $this->addIndexIfMissing('bf_investment_scraper', 'idx_email_identifier', ['email_identifier']);
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:47:        $this->addIndexIfMissing('bf_investment_scraper', 'idx_status', ['status']);
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:48:        $this->addIndexIfMissing('bf_investment_scraper', 'idx_email_date', ['email_date']);
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:53:        if (! $this->db->tableExists('bf_investment_scraper')) {
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:57:        $this->dropIndexIfExists('bf_investment_scraper', 'idx_email_identifier');
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:58:        $this->dropIndexIfExists('bf_investment_scraper', 'idx_status');
app/Database/Migrations/2026-04-01-000200_EnsureInvestmentScraperRawEmailColumns.php:59:        $this->dropIndexIfExists('bf_investment_scraper', 'idx_email_date');
app/Database/Migrations/2026-04-11-120000_AddEmailQueueTrackingColumns.php:12:        $this->ensureColumns('bf_investment_scraper');
app/Libraries/Privacy/DataExportService.php:22:            'alerts'       => $this->db->table('bf_investment_trade_alerts')->where('user_id',$userId)
app/Libraries/Privacy/DataExportService.php:23:                                     ->select('id,ticker,status,occurrences,created_at,updated_at')
app/Libraries/MyMIAdvisor.php:112:        $chartUrl = $this->generateTradingViewChartUrl($symbol);
app/Libraries/MyMIAdvisor.php:470:    public function generateTradingViewChartUrl($symbol): string
app/Libraries/MyMIAdvisor.php:496:            'background_chart' => $this->generateTradingViewChartUrl($mediaPackage['ticker'] ?? 'AAPL'),
app/Libraries/MyMIAdvisor.php:611:            'chart_url' => $this->generateTradingViewChartUrl($symbol),
app/Libraries/test.txt:1268:                    $this->marketingModel->markTempScraperProcessed($recordId);
app/Libraries/test.txt:1313:                    $this->marketingModel->markTempScraperProcessed($recordId);
app/Libraries/test.txt:1656:                $this->marketingModel->markTempScraperProcessed($id);
app/Libraries/test.txt:1682:                        $this->marketingModel->markTempScraperProcessed($recordId);
app/Libraries/test.txt:1805:                        $this->marketingModel->markTempScraperProcessed($record['id']);
app/Libraries/test.txt:1910:            $this->marketingModel->markTempScraperProcessed($id);
app/Libraries/test.txt:3050:                $model->markTempRecordAsProcessed($record['id']);
app/Libraries/test.txt:3130:        $this->marketingModel->markEmailsAsProcessed(array_column($rawRecords, 'id'));
app/Libraries/test.txt:4782:            $processedEmailsToday = $this->marketingModel->getProcessedEmails(date('Y-m-d'));
app/Libraries/test.txt:4835:                        'status'            => 'In Review',
app/Libraries/test.txt:5079:    public function saveTradingViewChart($chartUrl, $ticker)
app/Libraries/test.txt:5847:     * @param array $tradeAlert A record from bf_investment_trade_alerts.
app/Libraries/test.txt:7095:                    $this->marketingModel->markTempScraperProcessed($record['id']);
app/Libraries/test.txt:7096:                    log_message('info', '✅ Processed and stored content for record ID ' . $record['id']);
app/Libraries/test.txt:8135:    public function getProcessedEmails($date = null)
app/Libraries/test.txt:8327:        return $this->where('status', 'In Review')->limit(50)->get()->getResultArray(); // Limit the results to prevent memory overload
app/Libraries/test.txt:8394:            ->where('status', 'In Review')
app/Libraries/test.txt:8404:            ->where('status', 'In Review')
app/Libraries/test.txt:8545:            ->where('status', 'In Review')
app/Libraries/test.txt:8920:                                'status' => 'In Review',
app/Libraries/test.txt:8931:                            if ($this->isEmailProcessed($data['email_identifier'])) {
app/Libraries/test.txt:8951:    public function isEmailProcessed($emailIdentifier)
app/Libraries/test.txt:8963:    public function markEmailsAsProcessed($ids = [])
app/Libraries/test.txt:8968:                ->update(['status' => 'Processed']);
app/Libraries/test.txt:8973:    public function markTempRecordAsProcessed($id)
app/Libraries/test.txt:8977:            ->update(['status' => 'Processed', 'updated_at' => date('Y-m-d H:i:s')]);
app/Libraries/test.txt:8980:    public function markTempScraperProcessed($id)
app/Libraries/test.txt:8984:            ->update(['status' => 'Processed']);
app/Libraries/MyMIAlerts.php:683:    protected function markEmailAsProcessed($imapStream, int $emailNumber): void
app/Libraries/MyMIAlerts.php:687:            if (@imap_mail_move($imapStream, (string) $emailNumber, 'Processed')) {
app/Libraries/MyMIAlerts.php:691:            log_message('warning', 'MyMIAlerts::markEmailAsProcessed failed: {msg}', ['msg' => $e->getMessage()]);
app/Libraries/MyMIAlerts.php:785:        foreach ($this->db->getFieldData('bf_investment_scraper') as $field) {
app/Libraries/MyMIAlerts.php:820:        if ($this->alertsModel->isEmailProcessed($identifier)) {
app/Libraries/MyMIAlerts.php:856:            'status'           => 'In Review',
app/Libraries/MyMIAlerts.php:945:            log_message('error', '❌ Failed to insert alert email into bf_investment_scraper.');
app/Libraries/MyMIAlerts.php:1172:    public function fetchAndStoreAlertsEmails()
app/Libraries/MyMIAlerts.php:1214:                    $this->markEmailAsProcessed($inbox, $emailNumber);
app/Libraries/MyMIAlerts.php:1220:                    $this->markEmailAsProcessed($inbox, $emailNumber);
app/Libraries/MyMIAlerts.php:1234:                $this->markEmailAsProcessed($inbox, $emailNumber);
app/Libraries/MyMIAlerts.php:1245:    // public function fetchAndStoreAlertsEmails()
app/Libraries/MyMIAlerts.php:1283:    //             if ($this->alertsModel->isEmailProcessed($emailIdentifier)) {
app/Libraries/MyMIAlerts.php:1311:    //                 'status'           => 'In Review',
app/Libraries/MyMIAlerts.php:1335:    //                 $existingAlert = $this->db->table('bf_investment_trade_alerts')
app/Libraries/MyMIAlerts.php:1337:    //                     ->where('status', 'In Review')
app/Libraries/MyMIAlerts.php:1344:    //                         'status' => 'In Review',
app/Libraries/MyMIAlerts.php:1382:    // public function fetchAndStoreAlertsEmails()
app/Libraries/MyMIAlerts.php:1419:    //             if ($this->alertsModel->isEmailProcessed($emailIdentifier)) {
app/Libraries/MyMIAlerts.php:1443:    //                 'status' => 'In Review',
app/Libraries/MyMIAlerts.php:1476:    //                         // ✅ If it exists, update occurrences and last updated time
app/Libraries/MyMIAlerts.php:1478:    //                             'occurrences'  => $existingAlert['occurrences'] + 1,
app/Libraries/MyMIAlerts.php:1483:    //                         // log_message('info', "🔄 Updated occurrence count for Ticker: {$symbol} (Now {$existingAlert['occurrences'] + 1})");
app/Libraries/MyMIAlerts.php:1489:    //                             'status'      => 'In Review',
app/Libraries/MyMIAlerts.php:1492:    //                             'occurrences' => 1
app/Libraries/MyMIAlerts.php:1499:    //                 log_message('error', '❌ Failed to insert email into `bf_investment_scraper`.');
app/Libraries/MyMIAlerts.php:1535:            $lastScraped = $this->db->table('bf_investment_alert_history')
app/Libraries/MyMIAlerts.php:1572:                if ($this->alertsModel->isEmailProcessed($emailIdentifier)) {
app/Libraries/MyMIAlerts.php:1593:                    'status' => 'In Review',
app/Libraries/MyMIAlerts.php:1608:            $this->db->table('bf_investment_alert_history')->insert([
app/Libraries/MyMIAlerts.php:1697:                        'status'           => 'In Review',
app/Libraries/MyMIAlerts.php:1907:            // Build a TradingView symbol safely: e.g., "NASDAQ:NVDA"
app/Libraries/MyMIAlerts.php:1946:        $row = $this->db->table('bf_investment_tickers')
app/Libraries/MyMIAlerts.php:1973:        $row = $this->db->table('bf_investment_tickers')
app/Libraries/MyMIAlerts.php:2109:    public function processScrapedSymbols(): bool
app/Libraries/MyMIAlerts.php:2113:        $processed = $this->alertsModel->processScrapedSymbols(function (string $text) {
app/Libraries/MyMIAlerts.php:2183:        $lastProcessed = $this->db->table('bf_investment_alert_history')
app/Libraries/MyMIAlerts.php:2190:        $lastTimestamp = $lastProcessed ? $lastProcessed->last_alert_processed : '1970-01-01 00:00:00';
app/Libraries/MyMIAlerts.php:2193:        $alerts = $this->db->table('bf_investment_trade_alerts')
app/Libraries/MyMIAlerts.php:2195:            ->where('status', 'In Review')
app/Libraries/MyMIAlerts.php:2209:            $this->db->table('bf_investment_trade_alerts')
app/Libraries/MyMIAlerts.php:2211:                ->update(['status' => 'Processed']);
app/Libraries/MyMIAlerts.php:2214:            $this->db->table('bf_investment_alert_history')->insert([
app/Libraries/MyMIAlerts.php:2230:        $pendingAlerts = $this->db->table('bf_investment_trade_alerts')
app/Libraries/MyMIAlerts.php:2250:                    $this->db->table('bf_investment_trade_alerts')
app/Libraries/MyMIAlerts.php:2256:                            'status' => 'Processed',
app/Libraries/MyMIAlerts.php:2273:    public function saveTradingViewChart($chartUrl, $ticker)
app/Libraries/MyMIAlerts.php:2304:    public function sendDiscordNotification($tradeAlert)
app/Libraries/MyMIAlerts.php:2306:        if (!empty($tradeAlert['notification_sent'])) {
app/Libraries/MyMIAlerts.php:2324:                log_message('warning', 'MyMIAlerts::sendDiscordNotification Kimi fallback: ' . $e->getMessage());
app/Libraries/MyMIAlerts.php:2345:        $this->alertsModel->updateMarketingContent($tradeAlert['id'], ['notification_sent' => 1]);
app/Libraries/MyMIAlerts.php:2495:    public function updateAlerts()
app/Libraries/MyMIAlerts.php:2510:        $this->debugLog("� MyMIAlerts L460 - Starting updateAlerts method...");
app/Libraries/MyMIAlerts.php:2527:                $this->debugLog("updateAlerts - skip unknown symbol {$sym}");
app/Libraries/MyMIAlerts.php:2539:                log_message('debug', "MyMIAlerts::updateAlerts L1489 - skip unknown symbol {$ticker}");
app/Libraries/MyMIAlerts.php:2569:                'occurrences'               => $alert['occurrences'] + 1
app/Libraries/MyMIAlerts.php:2594:        $this->debugLog("✅ updateAlerts method completed.");
app/Libraries/MyMIAlerts.php:2605:        $alerts = $this->db->table('bf_investment_trade_alerts')
app/Libraries/MyMIAlerts.php:2627:    // public function updateAlerts()
app/Libraries/Signals/MyMISignalIngestor.php:225:            if ($this->files->alreadyProcessed($path, $hash)) {
app/Libraries/MyMIMarketing.php:1154:            $processedEmailsToday = $this->marketingModel->getProcessedEmails(date('Y-m-d'));
app/Libraries/MyMIMarketing.php:1207:                        'status'            => 'In Review',
app/Libraries/MyMIMarketing.php:1532:    public function saveTradingViewChart($chartUrl, $ticker)
app/Libraries/MyMIMarketing.php:2414:    public function summarizeTradingViewFinancials($url)
app/Libraries/MyMIMarketing.php:2419:            throw new \Exception('Failed to load TradingView financials page.');
app/Libraries/MyMIMarketing.php:2582:     * @param array $tradeAlert A record from bf_investment_trade_alerts.
app/Libraries/MyMIMarketing.php:3202:                $alertsModel->markNewsAsProcessed((int) ($row['id'] ?? 0));
app/Libraries/MyMIMarketing.php:4504:                        'status'           => 'In Review',
app/Libraries/MyMIMarketing.php:5174:                    $this->marketingModel->markTempScraperProcessed($record['id']);
app/Libraries/MyMIMarketing.php:5175:                    log_message('info', '✅ Processed and stored content for record ID ' . $record['id']);
app/Libraries/TradeAlertMailboxFetcher.php:42:        $targetFolder = $this->cleanFolderName((string) ($options['target_folder'] ?? 'Processed'));
app/Libraries/TradeAlertMailboxFetcher.php:230:            'status' => 'In Review',
app/Models/AccountsModel.php:172:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AccountsModel.php:181:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AccountsModel.php:424:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/AccountsModel.php:433:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/SignalFilesModel.php:31:    public function alreadyProcessed(string $filePath, string $fileHash): bool
app/Models/AnalyticalModel.php:580:                            ->where('status', 'In Review')
app/Models/EsportsModel.php:168:    public function markWebhookProcessed(int $webhookId): bool
app/Models/AlertsModel.php:16:    protected $table       = 'bf_investment_trade_alerts';
app/Models/AlertsModel.php:31:        'active','status','occurrences','alert_count','distributed_count','created_on','created_by','updated_at','alert_created','send_alert','alert_sent',
app/Models/AlertsModel.php:34:        'financial_news','analysis_summary','tv_chart_type','tv_chart','display','notification_sent','submitted_date','last_updated','last_updated_time',
app/Models/AlertsModel.php:89:        $result = $this->db->table('bf_investment_trade_alerts')->insert($data);
app/Models/AlertsModel.php:111:                $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->update($tickerUpdate);
app/Models/AlertsModel.php:127:                $alertsUpdated = $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->update($alertsUpdate);
app/Models/AlertsModel.php:143:                $historyUpdated = $this->db->table('bf_investment_alert_history')->where('ticker', $symbol)->update($historyUpdate);
app/Models/AlertsModel.php:186:        $result = $this->db->table('bf_investment_trade_alerts')->where('id', $id)->update($data);
app/Models/AlertsModel.php:203:        $result = $this->db->table('bf_investment_trade_alerts')->where('id', $id)->delete();
app/Models/AlertsModel.php:220:        $builder = $db->table('bf_investment_tickers');
app/Models/AlertsModel.php:224:            log_message('info', "ensureTickerExists: {$symbol} already exists in bf_investment_tickers.");
app/Models/AlertsModel.php:273:        return (bool) $this->db->table('bf_investment_tickers')->select('symbol')->where('symbol', strtoupper($symbol))->get()->getRow();
app/Models/AlertsModel.php:411:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:450:        $activeTickers = $this->db->table('bf_investment_tickers')
app/Models/AlertsModel.php:486:                $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:513:                $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:530:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:540:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:550:        return $this->db->table('bf_investment_trade_alerts')->where('id', $id)->get()->getRowArray();
app/Models/AlertsModel.php:555:        $builder = $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->countAllResults();
app/Models/AlertsModel.php:561:        $builder = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:570:        $builder = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:580:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:590:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:591:            ->select('bf_investment_trade_alerts.*, bf_investment_tickers.exchange')
app/Models/AlertsModel.php:592:            ->join('bf_investment_tickers', 'bf_investment_tickers.symbol = bf_investment_trade_alerts.ticker', 'left')
app/Models/AlertsModel.php:593:            ->where('bf_investment_trade_alerts.ticker', $symbol)
app/Models/AlertsModel.php:594:            ->orderBy('bf_investment_trade_alerts.created_on', 'DESC')
app/Models/AlertsModel.php:601:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:611:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:621:        $builder = $this->db->table('bf_investment_alert_history');
app/Models/AlertsModel.php:638:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:648:        return $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->limit(20)->get();
app/Models/AlertsModel.php:653:        $builder = $this->db->table('bf_investment_trade_alerts');
app/Models/AlertsModel.php:655:        $hasTv = $this->hasColumn('bf_investment_trade_alerts', 'tv_symbol');
app/Models/AlertsModel.php:687:        $builder->where('status', 'In Review');
app/Models/AlertsModel.php:697:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:700:            ->where('notification_sent', 0)
app/Models/AlertsModel.php:707:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:716:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:753:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:996:            $tableName = 'bf_investment_trade_alerts';
app/Models/AlertsModel.php:1186:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1196:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1197:            ->where('status', 'In Review')
app/Models/AlertsModel.php:1210:        $builder = $this->db->table('bf_investment_alert_history')->where('send_alert', 1);
app/Models/AlertsModel.php:1236:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1245:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1254:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1265:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:1280:    public function getLastProcessedTradeAlert()
app/Models/AlertsModel.php:1282:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:1292:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1302:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1328:        $builder = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1385:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1387:            ->where('status', 'In Review')
app/Models/AlertsModel.php:1408:            if ($this->hasColumn('bf_investment_scraper', $column)) {
app/Models/AlertsModel.php:1413:        $builder = $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1415:            ->where('status', 'In Review');
app/Models/AlertsModel.php:1417:        if (! empty($sourceFilter) && $this->hasColumn('bf_investment_scraper', 'source')) {
app/Models/AlertsModel.php:1429:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1431:            ->where('status', 'In Review')
app/Models/AlertsModel.php:1441:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1443:            ->where('status', 'In Review')
app/Models/AlertsModel.php:1453:            return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1460:            return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1481:        $builder = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1503:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1515:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1542:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1572:        return $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRow();
app/Models/AlertsModel.php:1586:        $row = $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRowArray();
app/Models/AlertsModel.php:1596:        $row = $this->db->table('bf_investment_tickers')->where('symbol', strtoupper($symbol))->get()->getRowArray();
app/Models/AlertsModel.php:1613:        return $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRow();
app/Models/AlertsModel.php:1628:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1638:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1649:        return $this->db->table('bf_investment_trade_alerts')->where('alert_created', 1)->limit(20)->get()->getResultArray();
app/Models/AlertsModel.php:1654:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1656:            ->where('status', 'In Review')
app/Models/AlertsModel.php:1669:        return $this->db->table('bf_investment_trade_alerts')->where('id', $tradeID)->get()->getRowArray();
app/Models/AlertsModel.php:1674:        return $this->db->table('bf_investment_alert_history')
app/Models/AlertsModel.php:1690:            FROM bf_investment_alert_history h
app/Models/AlertsModel.php:1692:                SELECT DISTINCT ticker FROM bf_investment_alert_history
app/Models/AlertsModel.php:1705:            $first = $this->db->table('bf_investment_alert_history')->select('price')->where('ticker', $r['ticker'])->where('alerted_on', $r['first_date'])->get()->getRowArray();
app/Models/AlertsModel.php:1706:            $last  = $this->db->table('bf_investment_alert_history')->select('price')->where('ticker', $r['ticker'])->where('alerted_on', $r['last_date'])->get()->getRowArray();
app/Models/AlertsModel.php:1725:        $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1760:        $this->db->table('bf_investment_alert_history')->insert($snapshot);
app/Models/AlertsModel.php:1789:        $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->update($tickerUpdate);
app/Models/AlertsModel.php:1805:        $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->where('status', 'Opened')->update($alertsUpdate);
app/Models/AlertsModel.php:1821:        $this->db->table('bf_investment_alert_history')->where('ticker', $symbol)->where('status', 'Opened')->update($historyUpdate);
app/Models/AlertsModel.php:1843:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1855:        $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1863:        $existingTicker = $this->db->table('bf_investment_tickers')->where('symbol', $symbol)->get()->getRow();
app/Models/AlertsModel.php:1875:        return $this->db->table('bf_investment_tickers')->insert($data);
app/Models/AlertsModel.php:1888:        $existingAlert = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1895:            $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:1898:                    'occurrences'  => $existingAlert['occurrences'] + 1,
app/Models/AlertsModel.php:1904:            $tradeData['status']       = 'In Review';
app/Models/AlertsModel.php:1907:            $tradeData['occurrences']  = 1;
app/Models/AlertsModel.php:1909:            $result = $this->db->table('bf_investment_trade_alerts')->insert($tradeData);
app/Models/AlertsModel.php:1923:    public function isEmailProcessed($emailIdentifier)
app/Models/AlertsModel.php:1929:        if (! $this->hasColumn('bf_investment_scraper', 'email_identifier')) {
app/Models/AlertsModel.php:1930:            log_message('warning', 'Email identifier column missing from bf_investment_scraper; duplicate fallback will rely on message_hash.');
app/Models/AlertsModel.php:1934:        $exists = $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1950:        if (! $this->hasColumn('bf_investment_scraper', 'email_identifier')) {
app/Models/AlertsModel.php:1954:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1962:        if (! $this->hasColumn('bf_investment_scraper', 'message_hash') || ! $this->hasColumn('bf_investment_scraper', 'source')) {
app/Models/AlertsModel.php:1966:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:1975:        return (bool) $this->db->table('bf_investment_scraper')->insert($data);
app/Models/AlertsModel.php:1988:        return (bool) $this->db->table('bf_investment_scraper')->insert($safeData);
app/Models/AlertsModel.php:1999:        if ($identifier !== '' && $this->isEmailProcessed($identifier)) {
app/Models/AlertsModel.php:2022:        $table = 'bf_investment_scraper';
app/Models/AlertsModel.php:2043:        $row = $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:2089:    public function markScraperAlertProcessed($id)
app/Models/AlertsModel.php:2091:        return $this->db->table('bf_investment_scraper')->where('id', $id)->update(['status' => 'Processed']);
app/Models/AlertsModel.php:2096:        return $this->db->table('bf_investment_trade_alerts')->where('id', $alertId)->update(['notification_sent' => 1]);
app/Models/AlertsModel.php:2099:    public function markScraperRecordProcessed($id)
app/Models/AlertsModel.php:2101:        $existing = $this->db->table('bf_investment_scraper')->where('id', $id)->get()->getRow();
app/Models/AlertsModel.php:2106:        log_message('info', "✅ Marking scraper record ID $id as Processed.");
app/Models/AlertsModel.php:2107:        return $this->db->table('bf_investment_scraper')->where('id', $id)->update(['status' => 'Processed']);
app/Models/AlertsModel.php:2127:                'occurrences'      => 1,
app/Models/AlertsModel.php:2159:        $existingAlert = $this->db->table('bf_investment_trade_alerts')->where('ticker', $symbol)->get()->getRowArray();
app/Models/AlertsModel.php:2162:            $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2165:                    'occurrences'      => $existingAlert['occurrences'] + 1,
app/Models/AlertsModel.php:2171:            $this->db->table('bf_investment_trade_alerts')->insert([
app/Models/AlertsModel.php:2174:                'occurrences'      => 1,
app/Models/AlertsModel.php:2181:        $this->db->table('bf_investment_alert_history')->insert([
app/Models/AlertsModel.php:2271:        $builder     = $this->db->table('bf_investment_scraper');
app/Models/AlertsModel.php:2285:                    $alertsBuilder = $this->db->table('bf_investment_trade_alerts');
app/Models/AlertsModel.php:2290:                            'occurrences' => $existingAlert->occurrences + $symbolCounts[$symbol],
app/Models/AlertsModel.php:2295:                            'occurrences'=> $symbolCounts[$symbol],
app/Models/AlertsModel.php:2309:        return $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2327:                'occurrences'      => ($existing['occurrences'] ?? 1) + 1,
app/Models/AlertsModel.php:2336:            $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2351:            'occurrences'       => 1,
app/Models/AlertsModel.php:2361:        $this->db->table('bf_investment_trade_alerts')->insert($insert);
app/Models/AlertsModel.php:2409:        if ($this->hasColumn('bf_investment_alert_history', 'status') && isset($snapshot['status'])) {
app/Models/AlertsModel.php:2413:        if ($this->hasColumn('bf_investment_alert_history', 'category') && isset($snapshot['category'])) {
app/Models/AlertsModel.php:2417:        if ($this->hasColumn('bf_investment_alert_history', 'occurrences') && isset($snapshot['occurrences'])) {
app/Models/AlertsModel.php:2418:            $data['occurrences'] = $snapshot['occurrences'];
app/Models/AlertsModel.php:2421:        if ($this->hasColumn('bf_investment_alert_history', 'email_identifier') && isset($snapshot['email_identifier'])) {
app/Models/AlertsModel.php:2425:        if ($this->hasColumn('bf_investment_alert_history', 'trade_alert_id') && isset($snapshot['trade_alert_id'])) {
app/Models/AlertsModel.php:2429:        if ($this->hasColumn('bf_investment_alert_history', 'execution_id') && isset($snapshot['execution_id'])) {
app/Models/AlertsModel.php:2433:        if ($this->hasColumn('bf_investment_alert_history', 'created_on')) {
app/Models/AlertsModel.php:2438:            $this->db->table('bf_investment_alert_history')->insert($data);
app/Models/AlertsModel.php:2444:    public function processScrapedSymbols(?callable $symbolExtractor = null, ?string $sourceFilter = null, ?array &$report = null): bool
app/Models/AlertsModel.php:2489:        $record = $this->db->table('bf_investment_scraper')->where('id', $recordId)->get()->getRowArray();
app/Models/AlertsModel.php:2516:                $this->markScraperRecordProcessed($record['id']);
app/Models/AlertsModel.php:2522:                'status'            => 'In Review',
app/Models/AlertsModel.php:2542:                'notification_sent' => 0,
app/Models/AlertsModel.php:2556:                    'occurrences'      => 1,
app/Models/AlertsModel.php:2573:            $this->markScraperRecordProcessed($record['id']);
app/Models/AlertsModel.php:2582:            $this->markScraperRecordProcessed($record['id']);
app/Models/AlertsModel.php:2615:                'occurrences'      => $upserted['occurrences'] ?? 1,
app/Models/AlertsModel.php:2626:        $this->markScraperRecordProcessed($record['id']);
app/Models/AlertsModel.php:2731:            $existing = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2746:            $this->db->table('bf_investment_trade_alerts')->insert($payload);
app/Models/AlertsModel.php:2803:        return (bool) $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2811:        $pendingAlerts = $this->db->table('bf_investment_trade_alerts')
app/Models/AlertsModel.php:2812:            ->where('status', 'In Review')
app/Models/AlertsModel.php:2829:                    $this->db->table('bf_investment_trade_alerts')->where('id', $alert['id'])->update([
app/Models/AlertsModel.php:2833:                        'status'      => 'Processed',
app/Models/AlertsModel.php:2865:            $inserted = $this->db->table('bf_investment_scraper')->insert($emailData);
app/Models/AlertsModel.php:2879:        return $this->db->table('bf_investment_scraper')
app/Models/AlertsModel.php:2881:            ->where('status', 'In Review')
```

## Required GTM Tables

```text
bf_investment_scraper
bf_investment_trade_alerts
bf_investment_tickers
bf_investment_alert_history
```

## Existing AIOps SQL Check

```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-08 15:59:45 UTC+00:00

[Error]
Call to undefined method App\Commands\AIOps\SqlCheck::opt()
at APPPATH/Commands/AIOps/SqlCheck.php:27

Backtrace:
  1    SYSTEMPATH/CLI/Commands.php:74
       App\Commands\AIOps\SqlCheck()->run([])

  2    SYSTEMPATH/CLI/Console.php:47
       CodeIgniter\CLI\Commands()->run('aiops:sql:check', [])

  3    SYSTEMPATH/Boot.php:442
       CodeIgniter\CLI\Console()->run()

  4    SYSTEMPATH/Boot.php:166
       CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))

  5    ROOTPATH/spark:107
       CodeIgniter\Boot::bootSpark(Object(Config\Paths))

```

## Server Memory

```text
               total        used        free      shared  buff/cache   available
Mem:            12Gi       9.5Gi       417Mi        89Mi       2.1Gi       2.4Gi
Swap:             0B          0B          0B
```

## Largest Processes

```text
   PID   PPID %MEM   RSS CMD
 37976  37506  6.8 865444 /home/mymiteam/.vscode-server/cli/servers/Stable-f6cfa2ea2403534de03f069bdf160d06451ed282/server/node --dns-result-order=ipv4first /home/mymiteam/.vscode-server/cli/servers/Stable-f6cfa2ea2403534de03f069bdf160d06451ed282/server/out/bootstrap-fork --type=extensionHost --transformURIs --useHostProxy=false
453899  67644  6.7 845760 /home/timoteo2392/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/node --dns-result-order=ipv4first /home/timoteo2392/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/out/bootstrap-fork --type=extensionHost --transformURIs --useHostProxy=false
532579 456569  6.1 773524 /home/mymiteam/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/node /home/mymiteam/.vscode-server/extensions/ms-python.vscode-pylance-2026.2.1/dist/server.bundle.js --cancellationReceive=file:98687537da7b61ecbe69e8d6a951b0f6d7b7e7505a --node-ipc --clientProcessId=456569
 48448  37976  6.1 771528 /home/mymiteam/.vscode-server/cli/servers/Stable-f6cfa2ea2403534de03f069bdf160d06451ed282/server/node /home/mymiteam/.vscode-server/extensions/ms-python.vscode-pylance-2026.2.1/dist/server.bundle.js --cancellationReceive=file:a959a5d708fa24b9bdf3ad3667310e33a8664ce6a4 --node-ipc --clientProcessId=37976
456569 456069  5.4 690748 /home/mymiteam/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/node --dns-result-order=ipv4first /home/mymiteam/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/out/bootstrap-fork --type=extensionHost --transformURIs --useHostProxy=false
104450 103968  5.4 683356 /home/mymiteam/.vscode-server/cli/servers/Stable-0958016b2af9f09bb4257e0df4a95e2f90590f9f/server/node --dns-result-order=ipv4first /home/mymiteam/.vscode-server/cli/servers/Stable-0958016b2af9f09bb4257e0df4a95e2f90590f9f/server/out/bootstrap-fork --type=extensionHost --transformURIs --useHostProxy=false
 34762  34730  4.7 599712 /home/timoteo2392/.vscode-server/cli/servers/Stable-f6cfa2ea2403534de03f069bdf160d06451ed282/server/node --dns-result-order=ipv4first /home/timoteo2392/.vscode-server/cli/servers/Stable-f6cfa2ea2403534de03f069bdf160d06451ed282/server/out/bootstrap-fork --type=extensionHost --transformURIs --useHostProxy=false
492862 492840  4.5 567620 /home/timoteo2392/.vscode-server/cli/servers/Stable-0958016b2af9f09bb4257e0df4a95e2f90590f9f/server/node --dns-result-order=ipv4first /home/timoteo2392/.vscode-server/cli/servers/Stable-0958016b2af9f09bb4257e0df4a95e2f90590f9f/server/out/bootstrap-fork --type=extensionHost --transformURIs --useHostProxy=false
453910  67644  4.3 545428 /home/timoteo2392/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/node /home/timoteo2392/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/out/bootstrap-fork --type=fileWatcher
450258  67644  4.3 545088 /home/timoteo2392/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/node /home/timoteo2392/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/out/bootstrap-fork --type=fileWatcher
450246  67644  2.9 366148 /home/timoteo2392/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/node --dns-result-order=ipv4first /home/timoteo2392/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/out/bootstrap-fork --type=extensionHost --transformURIs --useHostProxy=false
450348 450246  1.6 210144 /home/timoteo2392/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/node /home/timoteo2392/.vscode-server/extensions/streetsidesoftware.code-spell-checker-4.5.6/packages/_server/dist/main.cjs --node-ipc --clientProcessId=450246
  3428      1  1.5 198252 /home/timoteo2392/Apps/Ollama/runtime/bin/ollama serve
453990 453899  1.5 194336 /home/timoteo2392/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/node /home/timoteo2392/.vscode-server/extensions/streetsidesoftware.code-spell-checker-4.5.6/packages/_server/dist/main.cjs --node-ipc --clientProcessId=453899
 67644  67640  1.1 148212 /home/timoteo2392/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/node /home/timoteo2392/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/out/server-main.js --connection-token=remotessh --accept-server-license-terms --log=trace --start-server --enable-remote-auto-shutdown --socket-path=/tmp/code-3066c806-4dcb-4a03-9dbe-0002ac3aa877
456247 456069  1.1 141656 /home/mymiteam/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/node /home/mymiteam/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/out/bootstrap-fork --type=fileWatcher
103968 103964  1.1 140764 /home/mymiteam/.vscode-server/cli/servers/Stable-0958016b2af9f09bb4257e0df4a95e2f90590f9f/server/node /home/mymiteam/.vscode-server/cli/servers/Stable-0958016b2af9f09bb4257e0df4a95e2f90590f9f/server/out/server-main.js --connection-token=remotessh --accept-server-license-terms --log=trace --start-server --enable-remote-auto-shutdown --socket-path=/tmp/code-7a67f02c-952d-4f17-a9d5-49293cdbd39b
492999 492862  1.0 137892 /home/timoteo2392/.vscode-server/cli/servers/Stable-0958016b2af9f09bb4257e0df4a95e2f90590f9f/server/node /home/timoteo2392/.vscode-server/extensions/streetsidesoftware.code-spell-checker-4.5.6/packages/_server/dist/main.cjs --node-ipc --clientProcessId=492862
   314      1  1.0 136336 /usr/sbin/apache2 -d /etc/apache2-apache2-vps33344 -k start
383736    314  1.0 133512 /usr/sbin/apache2 -d /etc/apache2-apache2-vps33344 -k start
 37767  37506  1.0 127620 /home/mymiteam/.vscode-server/cli/servers/Stable-f6cfa2ea2403534de03f069bdf160d06451ed282/server/node /home/mymiteam/.vscode-server/cli/servers/Stable-f6cfa2ea2403534de03f069bdf160d06451ed282/server/out/bootstrap-fork --type=fileWatcher
 35972  34762  0.9 125220 /home/timoteo2392/.vscode-server/cli/servers/Stable-f6cfa2ea2403534de03f069bdf160d06451ed282/server/node /home/timoteo2392/.vscode-server/extensions/streetsidesoftware.code-spell-checker-4.5.6/packages/_server/dist/main.cjs --node-ipc --clientProcessId=34762
 34730  34726  0.7 97392 /home/timoteo2392/.vscode-server/cli/servers/Stable-f6cfa2ea2403534de03f069bdf160d06451ed282/server/node /home/timoteo2392/.vscode-server/cli/servers/Stable-f6cfa2ea2403534de03f069bdf160d06451ed282/server/out/server-main.js --connection-token=remotessh --accept-server-license-terms --log=trace --agent-host-bridge-port=40167 --agent-host-bridge-host=127.0.0.1 --agent-host-bridge-connection-token=1793f872-e0ab-4524-bf91-42cceb4f8f68 --start-server --enable-remote-auto-shutdown --socket-path=/tmp/code-84ce7b3f-0be8-4269-b81e-8556575a18bf
456069 456065  0.7 90176 /home/mymiteam/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/node /home/mymiteam/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/out/server-main.js --connection-token=remotessh --accept-server-license-terms --log=trace --start-server --enable-remote-auto-shutdown --socket-path=/tmp/code-54b26844-71ac-496d-91f2-7b48fe756763
492840 492836  0.6 77052 /home/timoteo2392/.vscode-server/cli/servers/Stable-0958016b2af9f09bb4257e0df4a95e2f90590f9f/server/node /home/timoteo2392/.vscode-server/cli/servers/Stable-0958016b2af9f09bb4257e0df4a95e2f90590f9f/server/out/server-main.js --connection-token=remotessh --accept-server-license-terms --log=trace --start-server --enable-remote-auto-shutdown --socket-path=/tmp/code-90570b29-5964-4fa0-9030-459b4e56f5d2
 37506  37502  0.6 76764 /home/mymiteam/.vscode-server/cli/servers/Stable-f6cfa2ea2403534de03f069bdf160d06451ed282/server/node /home/mymiteam/.vscode-server/cli/servers/Stable-f6cfa2ea2403534de03f069bdf160d06451ed282/server/out/server-main.js --connection-token=remotessh --accept-server-license-terms --log=trace --agent-host-bridge-port=36423 --agent-host-bridge-host=127.0.0.1 --agent-host-bridge-connection-token=b2f72e70-a886-4c9c-aada-62e3a9e3bad3 --start-server --enable-remote-auto-shutdown --socket-path=/tmp/code-fc303e66-a4b0-450a-9983-2ac4567c65e6
104151 103968  0.5 70488 /home/mymiteam/.vscode-server/cli/servers/Stable-0958016b2af9f09bb4257e0df4a95e2f90590f9f/server/node /home/mymiteam/.vscode-server/cli/servers/Stable-0958016b2af9f09bb4257e0df4a95e2f90590f9f/server/out/bootstrap-fork --type=fileWatcher
456805 456569  0.5 65504 /home/mymiteam/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/node /home/mymiteam/.vscode-server/extensions/mtxr.sqltools-0.28.5/dist/languageserver.js --node-ipc --clientProcessId=456569
 67833  67644  0.5 63284 /home/timoteo2392/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/node /home/timoteo2392/.vscode-server/cli/servers/Stable-ce099c1ed25d9eb3076c11e4a280f3eb52b4fbeb/server/out/bootstrap-fork --type=ptyHost --logsPath /home/timoteo2392/.vscode-server/data/logs/20260607T143628
```

## Ollama Version / Models / Running Sessions

```text
/home/mymiteam/bin/ollama
ollama version is 0.22.1
Warning: client version is 0.15.6

--- ollama list ---
NAME                  ID              SIZE      MODIFIED           
qwen2.5-coder:7b      dae161e27b0e    4.7 GB    About a minute ago    
qwen2.5-coder:1.5b    d7372fd82851    986 MB    6 days ago            
qwen2.5-coder:0.5b    4ff64a7f502a    397 MB    3 weeks ago           

--- ollama ps ---
NAME    ID    SIZE    PROCESSOR    CONTEXT    UNTIL 
```

## Ollama Review

```text
Trying Ollama model: qwen2.5-coder:0.5b
[?2026h[?25l[1G⠙ [K[?25h[?2026l[?2026h[?25l[1G⠹ [K[?25h[?2026l[?2026h[?25l[1G⠹ [K[?25h[?2026l[?2026h[?25l[1G⠸ [K[?25h[?2026l[?2026h[?25l[1G⠼ [K[?25h[?2026l[?25l[?2026h[?25l[1G[K[?25h[?2026l[2K[1G[?25hError: 500 Internal Server Error: model requires more system memory (421.7 MiB) than is available (351.3 MiB)
FAILED_MODEL=qwen2.5-coder:0.5b

Trying Ollama model: qwen2.5-coder:1.5b
[?2026h[?25l[1G⠙ [K[?25h[?2026l[?2026h[?25l[1G⠙ [K[?25h[?2026l[?2026h[?25l[1G⠹ [K[?25h[?2026l[?2026h[?25l[1G⠼ [K[?25h[?2026l[?2026h[?25l[1G⠼ [K[?25h[?2026l[?2026h[?25l[1G⠦ [K[?25h[?2026l[?25l[?2026h[?25l[1G[K[?25h[?2026l[2K[1G[?25hError: 500 Internal Server Error: model requires more system memory (1.0 GiB) than is available (307.0 MiB)
FAILED_MODEL=qwen2.5-coder:1.5b

Trying Ollama model: qwen2.5-coder:3b
[?2026h[?25l[1Gpulling manifest ⠋ [K[?25h[?2026l[?2026h[?25l[1Gpulling manifest ⠙ [K[?25h[?2026l[?2026h[?25l[1Gpulling manifest ⠹ [K[?25h[?2026l[?2026h[?25l[1Gpulling manifest ⠸ [K[?25h[?2026l[?2026h[?25l[1Gpulling manifest ⠼ [K[?25h[?2026l[?2026h[?25l[1Gpulling manifest ⠴ [K[?25h[?2026l[?2026h[?25l[1Gpulling manifest [K
pulling 4a188102020e:   0% ▕                  ▏ 3.9 MB/1.9 GB                  [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:   1% ▕                  ▏  14 MB/1.9 GB                  [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:   2% ▕                  ▏  43 MB/1.9 GB                  [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:   4% ▕                  ▏  72 MB/1.9 GB                  [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:   5% ▕                  ▏  86 MB/1.9 GB                  [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:   6% ▕█                 ▏ 114 MB/1.9 GB                  [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:   7% ▕█                 ▏ 142 MB/1.9 GB                  [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:   8% ▕█                 ▏ 155 MB/1.9 GB                  [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  10% ▕█                 ▏ 183 MB/1.9 GB                  [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  11% ▕█                 ▏ 210 MB/1.9 GB                  [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  12% ▕██                ▏ 224 MB/1.9 GB                  [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  13% ▕██                ▏ 252 MB/1.9 GB  234 MB/s      7s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  14% ▕██                ▏ 279 MB/1.9 GB  234 MB/s      7s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  15% ▕██                ▏ 293 MB/1.9 GB  234 MB/s      6s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  17% ▕██                ▏ 320 MB/1.9 GB  234 MB/s      6s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  18% ▕███               ▏ 349 MB/1.9 GB  234 MB/s      6s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  19% ▕███               ▏ 363 MB/1.9 GB  234 MB/s      6s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  20% ▕███               ▏ 390 MB/1.9 GB  234 MB/s      6s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  21% ▕███               ▏ 405 MB/1.9 GB  234 MB/s      6s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  22% ▕████              ▏ 433 MB/1.9 GB  234 MB/s      6s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  24% ▕████              ▏ 461 MB/1.9 GB  234 MB/s      6s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  25% ▕████              ▏ 488 MB/1.9 GB  235 MB/s      6s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  26% ▕████              ▏ 502 MB/1.9 GB  235 MB/s      6s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  27% ▕████              ▏ 530 MB/1.9 GB  235 MB/s      5s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  28% ▕█████             ▏ 543 MB/1.9 GB  235 MB/s      5s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  30% ▕█████             ▏ 571 MB/1.9 GB  235 MB/s      5s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  31% ▕█████             ▏ 598 MB/1.9 GB  235 MB/s      5s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  32% ▕█████             ▏ 626 MB/1.9 GB  235 MB/s      5s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  33% ▕█████             ▏ 640 MB/1.9 GB  235 MB/s      5s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  35% ▕██████            ▏ 667 MB/1.9 GB  235 MB/s      5s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  36% ▕██████            ▏ 693 MB/1.9 GB  235 MB/s      5s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  37% ▕██████            ▏ 708 MB/1.9 GB  234 MB/s      5s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  38% ▕██████            ▏ 734 MB/1.9 GB  234 MB/s      5s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  39% ▕██████            ▏ 749 MB/1.9 GB  234 MB/s      5s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  40% ▕███████           ▏ 776 MB/1.9 GB  234 MB/s      4s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  42% ▕███████           ▏ 803 MB/1.9 GB  234 MB/s      4s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  43% ▕███████           ▏ 830 MB/1.9 GB  234 MB/s      4s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  44% ▕███████           ▏ 844 MB/1.9 GB  234 MB/s      4s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  45% ▕████████          ▏ 871 MB/1.9 GB  234 MB/s      4s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  46% ▕████████          ▏ 896 MB/1.9 GB  234 MB/s      4s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  47% ▕████████          ▏ 910 MB/1.9 GB  234 MB/s      4s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  49% ▕████████          ▏ 937 MB/1.9 GB  233 MB/s      4s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  50% ▕████████          ▏ 964 MB/1.9 GB  233 MB/s      4s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  51% ▕█████████         ▏ 977 MB/1.9 GB  233 MB/s      4s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  52% ▕█████████         ▏ 1.0 GB/1.9 GB  233 MB/s      3s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  54% ▕█████████         ▏ 1.0 GB/1.9 GB  233 MB/s      3s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  54% ▕█████████         ▏ 1.0 GB/1.9 GB  233 MB/s      3s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  56% ▕██████████        ▏ 1.1 GB/1.9 GB  233 MB/s      3s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  57% ▕██████████        ▏ 1.1 GB/1.9 GB  233 MB/s      3s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  58% ▕██████████        ▏ 1.1 GB/1.9 GB  233 MB/s      3s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  59% ▕██████████        ▏ 1.1 GB/1.9 GB  233 MB/s      3s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  61% ▕██████████        ▏ 1.2 GB/1.9 GB  233 MB/s      3s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  61% ▕███████████       ▏ 1.2 GB/1.9 GB  233 MB/s      3s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  63% ▕███████████       ▏ 1.2 GB/1.9 GB  233 MB/s      3s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  64% ▕███████████       ▏ 1.2 GB/1.9 GB  233 MB/s      2s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  65% ▕███████████       ▏ 1.3 GB/1.9 GB  233 MB/s      2s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  66% ▕███████████       ▏ 1.3 GB/1.9 GB  233 MB/s      2s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  68% ▕████████████      ▏ 1.3 GB/1.9 GB  233 MB/s      2s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  68% ▕████████████      ▏ 1.3 GB/1.9 GB  233 MB/s      2s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  70% ▕████████████      ▏ 1.3 GB/1.9 GB  233 MB/s      2s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  71% ▕████████████      ▏ 1.4 GB/1.9 GB  233 MB/s      2s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  72% ▕████████████      ▏ 1.4 GB/1.9 GB  233 MB/s      2s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  73% ▕█████████████     ▏ 1.4 GB/1.9 GB  232 MB/s      2s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  75% ▕█████████████     ▏ 1.4 GB/1.9 GB  232 MB/s      2s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  75% ▕█████████████     ▏ 1.5 GB/1.9 GB  232 MB/s      2s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  77% ▕█████████████     ▏ 1.5 GB/1.9 GB  232 MB/s      1s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  78% ▕█████████████     ▏ 1.5 GB/1.9 GB  232 MB/s      1s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  79% ▕██████████████    ▏ 1.5 GB/1.9 GB  232 MB/s      1s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  80% ▕██████████████    ▏ 1.6 GB/1.9 GB  232 MB/s      1s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  82% ▕██████████████    ▏ 1.6 GB/1.9 GB  232 MB/s      1s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  83% ▕██████████████    ▏ 1.6 GB/1.9 GB  232 MB/s      1s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  84% ▕███████████████   ▏ 1.6 GB/1.9 GB  232 MB/s      1s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  85% ▕███████████████   ▏ 1.6 GB/1.9 GB  232 MB/s      1s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  86% ▕███████████████   ▏ 1.7 GB/1.9 GB  232 MB/s      1s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  87% ▕███████████████   ▏ 1.7 GB/1.9 GB  232 MB/s      1s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  88% ▕███████████████   ▏ 1.7 GB/1.9 GB  232 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  89% ▕████████████████  ▏ 1.7 GB/1.9 GB  232 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  91% ▕████████████████  ▏ 1.8 GB/1.9 GB  232 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  92% ▕████████████████  ▏ 1.8 GB/1.9 GB  232 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  93% ▕████████████████  ▏ 1.8 GB/1.9 GB  232 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  94% ▕████████████████  ▏ 1.8 GB/1.9 GB  232 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  95% ▕█████████████████ ▏ 1.8 GB/1.9 GB  232 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  96% ▕█████████████████ ▏ 1.8 GB/1.9 GB  230 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  97% ▕█████████████████ ▏ 1.9 GB/1.9 GB  230 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  97% ▕█████████████████ ▏ 1.9 GB/1.9 GB  230 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  98% ▕█████████████████ ▏ 1.9 GB/1.9 GB  230 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  99% ▕█████████████████ ▏ 1.9 GB/1.9 GB  230 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  99% ▕█████████████████ ▏ 1.9 GB/1.9 GB  230 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e:  99% ▕█████████████████ ▏ 1.9 GB/1.9 GB  230 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕█████████████████ ▏ 1.9 GB/1.9 GB  230 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕█████████████████ ▏ 1.9 GB/1.9 GB  230 MB/s      0s[K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K[?25h[?2026l[?2026h[?25l[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K[?25h[?2026l[?2026h[?25l[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K[?25h[?2026l[?2026h[?25l[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K
pulling bb967eff3bda: 100% ▕██████████████████▏  487 B                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K
pulling bb967eff3bda: 100% ▕██████████████████▏  487 B                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K
pulling bb967eff3bda: 100% ▕██████████████████▏  487 B                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K
pulling bb967eff3bda: 100% ▕██████████████████▏  487 B                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K
pulling bb967eff3bda: 100% ▕██████████████████▏  487 B                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K
pulling bb967eff3bda: 100% ▕██████████████████▏  487 B                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K
pulling bb967eff3bda: 100% ▕██████████████████▏  487 B                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K
pulling bb967eff3bda: 100% ▕██████████████████▏  487 B                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K
pulling bb967eff3bda: 100% ▕██████████████████▏  487 B                         [K[?25h[?2026l[?2026h[?25l[A[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K
pulling bb967eff3bda: 100% ▕██████████████████▏  487 B                         [K
verifying sha256 digest ⠋ [K[?25h[?2026l[?2026h[?25l[A[A[A[A[A[A[1Gpulling manifest [K
pulling 4a188102020e: 100% ▕██████████████████▏ 1.9 GB                         [K
pulling 66b9ea09bd5b: 100% ▕██████████████████▏   68 B                         [K
pulling 1e65450c3067: 100% ▕██████████████████▏ 1.6 KB                         [K
pulling 45fc3ea7579a: 100% ▕██████████████████▏ 7.4 KB                         [K
pulling bb967eff3bda: 100% ▕██████████████████▏  487 B                         [K
verifying sha256 digest ⠙ [K[?25h[?2026l[?2026h[?25l[A[A[A[A[A[A[1Gpulling manifest [K
```
