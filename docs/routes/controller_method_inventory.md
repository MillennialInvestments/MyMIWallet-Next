+96
-0

# Controller Method Inventory

Inventory date: $(date -I)

## App\\Modules\\APIs\\Controllers\\ManagementController

Public methods observed (via grep). Methods with active routes under `/API/Management` are marked **[routed]**.

- _remap (internal)
- saveSuggestion — no explicit route under /API/Management (only Marketing group uses saveSuggestion) → **unrouted**
- Run_CRON_Tasks — **[routed]** `/API/Management/Run-CRON-Tasks`
- runCRONTasks — **[routed]** via Run_CRON_Tasks alias
- generateWeeklyStreamData — **[routed]** `/API/Management/generateWeeklyStreamData`
- backfillMarketingEmails — **[routed]** `/API/Management/backfillMarketingEmails`
- runBackfillAlertsEmails — **[routed]** `/API/Management/runBackfillAlertsEmails`
- runBackfillMarketingEmails — **[routed]** `/API/Management/runBackfillMarketingEmails`
- exportWeeklyWatchlistCSV — **[routed]** `/API/Management/exportWeeklyWatchlistCSV`
- generateCoffeeAndStocksNewsletter — **[routed]** `/API/Management/generateCoffeeAndStocksNewsletter`
- fetchCoffeeAndStocksNewsletter — **[routed]** `/API/Management/fetchCoffeeAndStocksNewsletter`
- saveCoffeeAndStocksNewsletter — **[routed]** `/API/Management/saveCoffeeAndStocksNewsletter`
- ajaxGetActiveUsers — **[routed]** `/API/Management/ajaxGetActiveUsers`
- ajaxGetInactiveUsers — **[routed]** `/API/Management/ajaxGetInactiveUsers`
- banUnverifiedUsers — **[routed]** `/API/Management/banUnverifiedUsers`
- checkForSpamUsers — **[routed]** `/API/Management/checkForSpamUsers`
- cronAnalyzeContent — **[routed]** `/API/Management/cronAnalyzeContent`
- cronFetchAndGenerateNews — **[routed]** `/API/cronFetchAndGenerateNews`
- cronFetchInbox — **[routed]** `/API/Management/cronFetchInbox`
- cronFetchMarketingEmails — **[routed]** `/API/Management/cronFetchMarketingEmails`
- cronFetchAndStoreEmails — **unrouted** (consider adding if used)
- distributeTodaysNewsContent — **[routed]** `/API/Management/distributeTodaysNewsContent`
- exportPostJson — **[routed]** `/API/Management/exportPostJson/{id}`
- fetchAlphaVantageNewsForTradeAlerts — **[routed]** `/API/Management/fetchAlphaVantageNewsForTradeAlerts`
- fetchEmailsToTempScraper — **[routed]** `/API/Management/fetchEmailsToTempScraper`
- fetchNewsEmails — **[routed]** `/API/Management/fetchNewsEmails`
- forceFetchEmails — **unrouted** (helper)
- generateContentDigestFromStored — **unrouted**
- generateContentFromScraper — **unrouted**
- generateDailyContentDigest — **unrouted** (marketing cron wrapper handles)
- generateRankedMarketingContent — **unrouted**
- getBalanceSheet/getCashFlowStatement/getCompanyOverview/getEarningsCalendar/getFixedWindowAnalytics/getIncomeStatement/getInsiderTransactions/getNewsSentiment/getSlidingWindowAnalytics — **unrouted** analytics helpers
- generatePostsFromSummary — **[routed]** `/API/Management/generatePostsFromSummary/{id}` and `/API/Management/generatePostsFromSummary`
- testTfIdfPipeline — **unrouted** (dev)
- generateTodaysNewsSummary — **unrouted**
- generateTodaysStory — **unrouted**
- generateVoiceScriptManually — **[routed]** `/API/Management/generateVoiceScriptManually`
- getAlerts/getAssets/getNews/getReferrals/getSupport/getUsers — **[routed]** under respective `/API/Management/get*` paths
- massResendActivationEmails — **[routed]** `/API/Management/massResendActivationEmails`
- processAllTradeAlerts — **[routed]** `/API/Management/processAllTradeAlerts`
- processAndGenerateMarketingContent — **unrouted**
- processQueuedEmails — **[routed]** `/API/Management/processQueuedEmails`
- processTempEmailsToScraper — **unrouted**
- reprocessIncompleteEmails — **unrouted**
- resendActivationEmailsBatch — **[routed]** `/API/Management/resendActivationEmailsBatch`
- resendActivationEmailsBatchQueued — **[routed]** `/API/Management/resendActivationEmailsBatchQueued`
- runCronManually — **[routed]** `/API/Management/runCronManually`
- runDailyAlphaVantageDataPipeline — **[routed]** `/API/Management/runDailyAlphaVantageDataPipeline`
- sendTestActivationEmail — **[routed]** `/API/Management/sendTestActivationEmail`
- sendToZapierManually — **[routed]** `/API/Management/sendToZapierManually`
- scrapeAndGenerateTodaysStoryFromInbox — **[routed]** `/API/Management/scrapeAndGenerateTodaysStoryFromInbox`
- sharePost — **[routed]** `/API/Management/sharePost/{id}/{platform}`
- sendAllDiscordAlerts — **[routed]** `/API/Management/sendAllDiscordAlerts`
- unsubscribe — **unrouted** (email helper)
- updateMarketDataForAlerts — **[routed]** `/API/Management/updateMarketDataForAlerts`

## App\\Modules\\APIs\\Controllers\\AlertsController
Large surface area; all public methods have at least one route in the `/API/Alerts` group. No methods were identified without a route. Parameterized routes use `(:segment)` for tickers and `(:num)` for IDs; signature mismatches were not observed in this pass.

## App\\Modules\\APIs\\Controllers\\MarketingController
All public methods listed below are routed through the `/API/Marketing` group unless noted.

- generateKimiSummaries, generateKimiPosts, approveBufferItem, autoScheduleNextApproved, cronAnalyzeContent, cronAutoPublishGroupedDigest, cronEnrichTradeAlerts, cronFetchAndGenerateNews, cronFetchInbox, cronFetchMarketingEmails, cronProcessSMSMarketingIdeas, cronDistributeApprovedContent, deleteScrape, distributeHighScoreContent, downloadVoiceover, emailPostForApproval, exportBufferPosts, exportGroupedSummariesCSV, fetchBufferPaginated, fetchFinalizedContent, fetchFinalizedSummariesBlock, fetchGeneratedSummaries, fetchGeneratedSummariesBlock, fetchGeneratedSummariesJson, forceGenerateFromTemp, generateAdvisorMediaOnDemand, generateCampaignContent, generateDailyMarketCampaign, generateCampaignStepContent, generateContentFromScraper, generateContentDigestFromStored, generateDailyContentDigest, generateFromSimilar, generateLivePreview, generatePostsFromSummary, getPlatforms, savePlatform, deletePlatform, getPlatformRules, upsertPlatformRule, deletePlatformRule, searchTaxonomy, saveTaxonomy, deleteTaxonomy, listSuggestions, saveSuggestion, deleteSuggestion, getPostingPlan, composePost, generatePostMediaContent, getGeneratedPostsPaginated, generateScheduledPosts, generateSummaryFromGoogleSearch, generateThreadFromSummary, generateVoiceScriptManually, getCleanedScrapedContent, getContentPerformanceAnalytics, getScrapeDetails, getStoryboardPackage, getTopGeneratedPosts, getTopKeywordChart, groupSimilarSummariesByCosine, massResendActivationEmails, monitorKeywordsAndScrape, processMarketingTempEmails, publishGroupedContentDraft, rankBufferPostsDaily, regenerateMissingPostContent, rejectBufferItem, reprocessIncompleteEmails, runBackfillForTempEmails, runContentGenerationBatch, runEnrichTradeAlerts, runKeywordBackfillBatch, runKeywordEnrichment, runScheduledDistribution, scheduleApprovedPost, schedulePost, sendWalkthroughEmails, shareGroupedSummaries, sharePost, smartSearch, submitLargeContent, testGenerateDailyDigest, testGenerateFromTempEmail, testGenerateSummarizerHarness, testTfIdfEdgeCases, timeline, triggerPostAutogenOnEmpty, updateBufferScheduleInterval, updateCampaignLinks, updateCampaignMessageField, updateInsight, updatePlatformToggle, updatePostSchedule, viewTimelineGrouped.

No unrouted public methods were detected for MarketingController.

## App\\Modules\\APIs\\Controllers\\InvestmentsController

Public methods and route coverage after normalization:

- __construct, commonData (internal helpers) — unrouted
- index — **[routed]** `/API/Investments`
- getSymbolsByTradeType — **[routed]** `/API/Investments/getSymbolsByTradeType/{segment}`
- getInvestmentData — **[routed]** `/API/Investments/getInvestmentData/{segment}`
- fetchActiveTrades — **[routed]** `/API/Investments/fetchActiveTrades`
- fetchMonthAndInsightsData — **[routed]** `/API/Investments/fetchMonthAndInsightsData`
- searchTickers — **[routed]** `/API/Investments/searchTickers`
- listNews — **[routed]** `/API/Investments/news`
- getNews — **[routed]** `/API/Investments/news/{id}`
- createNews — **[routed]** `/API/Investments/news` (POST)
- updateNews — **[routed]** `/API/Investments/news/{id}` (POST)
- deleteNews — **[routed]** `/API/Investments/news/{id}` (DELETE)
- validateSymbol — **[routed]** `/API/Investments/validateSymbol` (POST)

## Web-Facing Content Controllers

- BlogController, EarningsController, InvestingController, IRSController, UpdatesController, PersonalBudgetingController — routed under `/Blog` and nested groups; no duplicates detected.
- SupportController — routed via `/Support/Support/kb` and `/Support/Support/kb/{article}`.