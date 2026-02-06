# bf_investment_trade_alerts

## Source
- Migration: _None_
- Model:
- Code references: app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:48, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:51, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:60, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:69, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:78, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:87, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:96, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:105, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:112, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:121, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:131, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:134, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:135, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:141, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:142, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:143, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:156, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:158, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:75, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:87, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:88, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:93, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:112, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:124, app/Database/Migrations/2026-03-10-000100_CreateInvestmentForecastingTables.php:125, app/Libraries/Privacy/DataExportService.php:22, app/Libraries/MyMIMarketing.php:2559, app/Libraries/MyMIAlerts.php:1285, app/Libraries/MyMIAlerts.php:2139, app/Libraries/MyMIAlerts.php:2155, app/Libraries/MyMIAlerts.php:2176, app/Libraries/MyMIAlerts.php:2196, app/Libraries/MyMIAlerts.php:2551, app/Models/AccountsModel.php:172, app/Models/AccountsModel.php:181, app/Models/AccountsModel.php:424, app/Models/AccountsModel.php:433, app/Models/AlertsModel.php:15, app/Models/AlertsModel.php:88, app/Models/AlertsModel.php:126, app/Models/AlertsModel.php:185, app/Models/AlertsModel.php:202, app/Models/AlertsModel.php:470, app/Models/AlertsModel.php:497, app/Models/AlertsModel.php:524, app/Models/AlertsModel.php:534, app/Models/AlertsModel.php:539, app/Models/AlertsModel.php:545, app/Models/AlertsModel.php:554, app/Models/AlertsModel.php:564, app/Models/AlertsModel.php:574, app/Models/AlertsModel.php:575, app/Models/AlertsModel.php:576, app/Models/AlertsModel.php:577, app/Models/AlertsModel.php:578, app/Models/AlertsModel.php:585, app/Models/AlertsModel.php:595, app/Models/AlertsModel.php:632, app/Models/AlertsModel.php:637, app/Models/AlertsModel.php:639, app/Models/AlertsModel.php:681, app/Models/AlertsModel.php:691, app/Models/AlertsModel.php:700, app/Models/AlertsModel.php:737, app/Models/AlertsModel.php:973, app/Models/AlertsModel.php:975, app/Models/AlertsModel.php:1028, app/Models/AlertsModel.php:1179, app/Models/AlertsModel.php:1189, app/Models/AlertsModel.php:1229, app/Models/AlertsModel.php:1238, app/Models/AlertsModel.php:1247, app/Models/AlertsModel.php:1295, app/Models/AlertsModel.php:1321, app/Models/AlertsModel.php:1422, app/Models/AlertsModel.php:1434, app/Models/AlertsModel.php:1446, app/Models/AlertsModel.php:1453, app/Models/AlertsModel.php:1473, app/Models/AlertsModel.php:1500, app/Models/AlertsModel.php:1586, app/Models/AlertsModel.php:1596, app/Models/AlertsModel.php:1607, app/Models/AlertsModel.php:1627, app/Models/AlertsModel.php:1683, app/Models/AlertsModel.php:1763, app/Models/AlertsModel.php:1801, app/Models/AlertsModel.php:1813, app/Models/AlertsModel.php:1846, app/Models/AlertsModel.php:1853, app/Models/AlertsModel.php:1867, app/Models/AlertsModel.php:1969, app/Models/AlertsModel.php:2032, app/Models/AlertsModel.php:2035, app/Models/AlertsModel.php:2044, app/Models/AlertsModel.php:2158, app/Models/AlertsModel.php:2182, app/Models/AlertsModel.php:2209, app/Models/AlertsModel.php:2231, app/Models/AlertsModel.php:2545, app/Models/AlertsModel.php:2560, app/Models/AlertsModel.php:2617, app/Models/AlertsModel.php:2625, app/Models/AlertsModel.php:2643, app/Models/AlertsModel.php:2753, app/Models/AlertsModel.php:2769, app/Models/AlertsModel.php:2775, app/Models/AlertsModel.php:2779, app/Models/AlertsModel.php:2796, app/Models/AlertsModel.php:2855, app/Models/AlertsModel.php:2876, app/Models/AlertsModel.php:2884, app/Models/AlertsModel.php:2912, app/Models/AlertsModel.php:2913, app/Models/AlertsModel.php:3040, app/Models/AlertsModel.php:3078, app/Models/AlertsModel.php:3090, app/Models/AlertsModel.php:3101, app/Models/AlertsModel.php:3116, app/Models/AlertsModel.php:3187, app/Models/AlertsModel.php:3516, app/Models/AlertsModel.php:3579, app/Models/AlertsModel.php:3614, app/Models/AlertsModel.php:3634, app/Models/MarketingModel.php:554, app/Models/MarketingModel.php:882, app/Models/MarketingModel.php:1278, app/Models/MyMICoinModel.php:101, app/Models/MyMICoinModel.php:108, app/Models/MyMICoinModel.php:249, app/Models/MyMICoinModel.php:256, app/Models/WalletModel.php:496, app/Models/WalletModel.php:505, app/Models/InvestmentModel.php:497, app/Models/InvestmentModel.php:1166, app/Models/InvestmentModel.php:1195, app/Models/InvestmentModel.php:1211, app/Models/InvestmentModel.php:1593, app/Views/themes/dashboard/partials/custom-js/tradingview.php:8, app/Modules/APIs/Controllers/AlertsController.php:200, app/Modules/APIs/Controllers/AlertsController.php:663, app/Modules/APIs/Controllers/AlertsController.php:2145, app/Modules/APIs/Controllers/AlertsController.php:2161, app/Modules/APIs/Controllers/ChatController.php:199, app/Modules/APIs/Controllers/ChatController.php:200, app/Modules/Management/Controllers/AlertsController.php:591, app/Modules/Management/Controllers/AlertsController.php:622, app/Modules/Management/Controllers/AlertsController.php:1287, app/Services/SearchService.php:64, app/Services/SearchService.php:65, app/Services/WeeklyStreamService.php:145, app/Services/WeeklyStreamService.php:151, app/Services/WalletSummaryService.php:174, app/Services/WalletSummaryService.php:176, app/Commands/AlertsAudit.php:41, app/Commands/AlertsAudit.php:395, app/Commands/Scrapers/EmailScraperAudit.php:25, docs/discord/discord_integration_overview.md:10, docs/discord/discord_integration_overview.md:37, docs/discord/earnings_calendar_automation.md:24, docs/discord/server_setup_and_alert_routing.md:183, docs/discord/_inventory.md:16, docs/marketing/01-mymi-gold-and-coin.md:51, docs/marketing/03-mymiexchange-solana.md:41, docs/marketing/04-mymialerts-premium.md:41, docs/marketing/08-mymi-apis-self-host.md:41, docs/marketing/09-discord-coffee-and-stocks.md:41, docs/marketing/13-x-twitter-guide.md:41, docs/marketing/14-stocktwits-guide.md:41, docs/marketing/14-stocktwits-guide.md:94, docs/marketing/15-youtube-guide.md:41, docs/marketing/16-tiktok-guide.md:41, docs/marketing/_templates/CAMPAIGN_TEMPLATE.md:25, docs/operations/05-database.md:15, docs/operations/05-database.md:27, docs/operations/04-cron-automation.md:25, docs/OVERVIEW.md:176, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:12, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:28, docs/functional_inventory/docs_to_code_map.md:32, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:56, docs/functional_inventory/docs_to_code_map.md:58, docs/functional_inventory/docs_to_code_map.md:59, docs/functional_inventory/docs_to_code_map.md:63, docs/functional_inventory/docs_to_code_map.md:64, docs/functional_inventory/docs_to_code_map.md:68, docs/functional_inventory/docs_to_code_map.md:69, docs/functional_inventory/docs_to_code_map.md:70, docs/functional_inventory/docs_to_code_map.md:71, docs/functional_inventory/docs_to_code_map.md:75, docs/functional_inventory/docs_to_code_map.md:83, docs/functional_inventory/docs_to_code_map.md:89, docs/functional_inventory/docs_to_code_map.md:90, docs/alerts/alerts_marketing_pipline.md:14, docs/alerts/alerts_marketing_pipline.md:28, docs/alerts/thinkorswim_broker_ingestion.md:4, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:17, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:31, docs/chatgpt/codex_executive_director/summary.md:28, docs/chatgpt/mymi_alert_system/summary.md:75, docs/chatgpt/mymi_alert_system/summary.md:96, docs/chatgpt/mymi_alert_system/summary.md:147, docs/chatgpt/mymi_alert_system/inventory.md:103, docs/chatgpt/mymi_alert_system/standards.md:117, docs/codex/reviews/Spark-Analysis-2026-02-01.md:586, docs/codex/reviews/Spark-Analysis-2026-02-01.md:592, docs/gap-audit/gap_report.md:27, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:98, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:98, docs/aiops/migration_model_audit.md:66, docs/aiops/migration_model_audit.md:209, docs/aiops/migration_model_audit.md:222, docs/_aiops/doc-change-log.md:1526, docs/health/health_test_checklist.md:327, docs/health/health_test_checklist.md:330, docs/health/health_test_checklist.md:345, docs/health/modules/alerts.md:27, docs/health/modules/alerts.md:45, docs/forecasting/01_data_flow.md:14, docs/forecasting/01_data_flow.md:37, docs/forecasting/05_confidence_scoring.md:35, docs/forecasting/06_database_schema.md:8, docs/forecasting/06_database_schema.md:52, docs/forecasting/07_integration_points.md:20, docs/forecasting/08_ui_and_dashboard.md:7, docs/forecasting/advanced_forecasting_overview.md:12, docs/spark/categories/alerts/alerts-audit.md:13, docs/spark/categories/forecasting/forecasts-refresh.md:13, docs/spark/categories/users/wallets-warm-summary-cache.md:13, docs/dashboards/AlertsController.md:26, docs/dashboards/DashboardController.md:26, docs/dashboards/InvestmentsController.md:30, docs/dashboards/README.md:22

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_trade_alerts` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `active` int NULL DEFAULT 1,
  `status` varchar(128) NOT NULL DEFAULT 'Opened',
  `occurrences` int NULL DEFAULT 1,
  `alert_count` int NULL DEFAULT 0,
  `distributed_count` int NULL DEFAULT 0,
  `created_on` varchar(128) NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_at` varchar(256) NULL DEFAULT NULL,
  `date` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `display` varchar(128) NULL DEFAULT 'Yes',
  `alert_created` tinyint(1) NOT NULL DEFAULT 0,
  `send_alert` tinyint(1) NOT NULL DEFAULT 0,
  `alert_sent` tinyint(1) NOT NULL DEFAULT 0,
  `submitted_date` varchar(128) NULL DEFAULT NULL,
  `time` varchar(128) NULL DEFAULT NULL,
  `category` varchar(128) NULL DEFAULT 'Other',
  `title` varchar(255) NULL DEFAULT NULL,
  `summary` text NULL DEFAULT NULL,
  `keywords` text NULL DEFAULT NULL,
  `tag` varchar(128) NULL DEFAULT NULL,
  `class` varchar(128) NULL DEFAULT NULL,
  `segment` varchar(128) NULL DEFAULT NULL,
  `trade_type` varchar(45) NULL DEFAULT 'N/A',
  `alert_priority` varchar(128) NULL DEFAULT 'Normal',
  `analysis_summary` text NULL DEFAULT NULL,
  `market_session` varchar(128) NULL DEFAULT NULL,
  `market_sentiment` varchar(128) NULL DEFAULT 'N/A',
  `type` varchar(128) NULL DEFAULT NULL,
  `free` varchar(128) NOT NULL DEFAULT 'No',
  `basic` varchar(128) NULL DEFAULT NULL,
  `premium` varchar(128) NULL DEFAULT NULL,
  `gold` varchar(128) NULL DEFAULT NULL,
  `ticker` varchar(128) NULL DEFAULT NULL,
  `direction` varchar(16) NULL DEFAULT 'Long',
  `exchange` varchar(128) NULL DEFAULT NULL,
  `market_data_status` varchar(32) NULL DEFAULT 'pending',
  `company` text NULL DEFAULT NULL,
  `open` decimal(10,2) NULL DEFAULT NULL,
  `high` decimal(10,2) NULL DEFAULT NULL,
  `high52` decimal(10,2) NULL DEFAULT NULL,
  `low` decimal(10,2) NULL DEFAULT NULL,
  `low52` decimal(10,2) NULL DEFAULT NULL,
  `price` decimal(10,2) NULL DEFAULT NULL,
  `volume` bigint NULL DEFAULT NULL,
  `volume_actual` bigint NULL DEFAULT NULL,
  `ema5` varchar(45) NULL DEFAULT NULL,
  `ema8` varchar(45) NULL DEFAULT NULL,
  `ema13` varchar(45) NULL DEFAULT NULL,
  `ema34` varchar(45) NULL DEFAULT NULL,
  `ema48` varchar(45) NULL DEFAULT NULL,
  `off_high` decimal(10,2) NULL DEFAULT NULL,
  `off_high52` decimal(10,2) NULL DEFAULT NULL,
  `off_low` decimal(10,2) NULL DEFAULT NULL,
  `off_low52` decimal(10,2) NULL DEFAULT NULL,
  `latest_trading_day` date NULL DEFAULT NULL,
  `previous_close` decimal(10,2) NULL DEFAULT NULL,
  `change` decimal(10,2) NULL DEFAULT NULL,
  `market_cap` varchar(20) NULL DEFAULT NULL,
  `change_percent` varchar(20) NULL DEFAULT NULL,
  `link` varchar(256) NOT NULL DEFAULT 'N/A',
  `current_price` varchar(128) NULL DEFAULT NULL,
  `potential_price` varchar(32) NULL DEFAULT NULL,
  `differential` varchar(32) NULL DEFAULT NULL,
  `potential_gain` varchar(32) NULL DEFAULT NULL,
  `stop_loss_percent` varchar(32) NULL DEFAULT NULL,
  `stop_loss_differential` varchar(32) NULL DEFAULT NULL,
  `stop_loss` varchar(32) NULL DEFAULT NULL,
  `support` varchar(128) NULL DEFAULT NULL,
  `entry_price` decimal(10,2) NULL DEFAULT NULL,
  `max_entry` varchar(128) NULL DEFAULT NULL,
  `price_high` varchar(32) NULL DEFAULT 0.00,
  `percent_change` int NULL DEFAULT NULL,
  `trailing_stop_target` decimal(5,2) NULL DEFAULT NULL,
  `trailing_stop_percent` decimal(5,2) NULL DEFAULT NULL,
  `target_price` decimal(10,2) NULL DEFAULT NULL,
  `locked_profit_stop` decimal(10,2) NULL DEFAULT NULL,
  `last_updated` varchar(128) NULL DEFAULT NULL,
  `last_updated_time` varchar(128) NULL DEFAULT NULL,
  `last_marketed_at` datetime NULL DEFAULT NULL,
  `marketing_status` varchar(32) NULL DEFAULT 'pending',
  `distribution_channels` text NULL DEFAULT NULL,
  `updated_stop_loss_differential` varchar(128) NULL DEFAULT NULL,
  `updated_stop_loss` varchar(128) NULL DEFAULT NULL,
  `closing_date` varchar(128) NULL DEFAULT NULL,
  `closing_time` varchar(128) NULL DEFAULT NULL,
  `details` text NULL DEFAULT NULL,
  `updated_details` text NULL DEFAULT NULL,
  `closing_details` text NULL DEFAULT NULL,
  `financial_news` text NULL DEFAULT NULL,
  `video_link` varchar(256) NULL DEFAULT 'N/A',
  `send_msg` varchar(128) NULL DEFAULT NULL,
  `expdate` varchar(128) NULL DEFAULT NULL,
  `option_type` varchar(128) NULL DEFAULT NULL,
  `expiration` varchar(128) NULL DEFAULT NULL,
  `option_price` varchar(128) NULL DEFAULT NULL,
  `strike` varchar(128) NULL DEFAULT NULL,
  `chart_image` varchar(512) NULL DEFAULT NULL,
  `watchlist` varchar(128) NULL DEFAULT NULL,
  `tv_title` varchar(60) NULL DEFAULT NULL,
  `tv_chart` varchar(256) NULL DEFAULT NULL,
  `tv_chart_type` varchar(20) NULL DEFAULT NULL,
  `tv_description` text NULL DEFAULT NULL,
  `notification_sent` tinyint NULL DEFAULT 0,
  `trade_description` text NULL DEFAULT NULL,
  `trade_chart_link` varchar(255) NULL DEFAULT NULL,
  `ema_3_8` varchar(10) NULL DEFAULT NULL,
  `ema_8_13` varchar(10) NULL DEFAULT NULL,
  `ema_13_34` varchar(10) NULL DEFAULT NULL,
  `ema_34_48` varchar(10) NULL DEFAULT NULL,
  `ema_consensus` int NULL DEFAULT NULL,
  `ema_9` varchar(10) NULL DEFAULT NULL,
  `ema_21` varchar(10) NULL DEFAULT NULL,
  `ema_34` varchar(10) NULL DEFAULT NULL,
  `ema_48` varchar(10) NULL DEFAULT NULL,
  `ema_100` varchar(10) NULL DEFAULT NULL,
  `ema_200` varchar(10) NULL DEFAULT NULL,
  `ema_3` decimal(10,4) NULL DEFAULT NULL,
  `ema_8` decimal(10,4) NULL DEFAULT NULL,
  `ema_13` decimal(10,4) NULL DEFAULT NULL,
  `sma_50` decimal(10,4) NULL DEFAULT NULL,
  `sma_200` decimal(10,4) NULL DEFAULT NULL,
  `macd` decimal(10,4) NULL DEFAULT NULL,
  `rsi` decimal(10,4) NULL DEFAULT NULL,
  `modified_on` datetime NULL DEFAULT NULL,
  `source` varchar(32) NULL DEFAULT NULL,
  `account_type` varchar(16) NULL DEFAULT NULL,
  `broker_order_id` varchar(64) NULL DEFAULT NULL,
  `execution_id` char(64) NULL DEFAULT NULL,
  `filled_qty` decimal(18,8) NULL DEFAULT NULL,
  `filled_price` decimal(18,8) NULL DEFAULT NULL,
  `filled_at` datetime NULL DEFAULT NULL,
  `side` enum('BUY','SELL') NULL DEFAULT NULL,
  `notified_discord` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- active int NULL
- status varchar(128) NOT NULL
- occurrences int NULL
- alert_count int NULL
- distributed_count int NULL
- created_on varchar(128) NULL
- created_by int NULL
- updated_at varchar(256) NULL
- date datetime NULL
- display varchar(128) NULL
- alert_created tinyint(1) NOT NULL
- send_alert tinyint(1) NOT NULL
- alert_sent tinyint(1) NOT NULL
- submitted_date varchar(128) NULL
- time varchar(128) NULL
- category varchar(128) NULL
- title varchar(255) NULL
- summary text NULL
- keywords text NULL
- tag varchar(128) NULL
- class varchar(128) NULL
- segment varchar(128) NULL
- trade_type varchar(45) NULL
- alert_priority varchar(128) NULL
- analysis_summary text NULL
- market_session varchar(128) NULL
- market_sentiment varchar(128) NULL
- type varchar(128) NULL
- free varchar(128) NOT NULL
- basic varchar(128) NULL
- premium varchar(128) NULL
- gold varchar(128) NULL
- ticker varchar(128) NULL
- direction varchar(16) NULL
- exchange varchar(128) NULL
- market_data_status varchar(32) NULL
- company text NULL
- open decimal(10,2) NULL
- high decimal(10,2) NULL
- high52 decimal(10,2) NULL
- low decimal(10,2) NULL
- low52 decimal(10,2) NULL
- price decimal(10,2) NULL
- volume bigint NULL
- volume_actual bigint NULL
- ema5 varchar(45) NULL
- ema8 varchar(45) NULL
- ema13 varchar(45) NULL
- ema34 varchar(45) NULL
- ema48 varchar(45) NULL
- off_high decimal(10,2) NULL
- off_high52 decimal(10,2) NULL
- off_low decimal(10,2) NULL
- off_low52 decimal(10,2) NULL
- latest_trading_day date NULL
- previous_close decimal(10,2) NULL
- change decimal(10,2) NULL
- market_cap varchar(20) NULL
- change_percent varchar(20) NULL
- link varchar(256) NOT NULL
- current_price varchar(128) NULL
- potential_price varchar(32) NULL
- differential varchar(32) NULL
- potential_gain varchar(32) NULL
- stop_loss_percent varchar(32) NULL
- stop_loss_differential varchar(32) NULL
- stop_loss varchar(32) NULL
- support varchar(128) NULL
- entry_price decimal(10,2) NULL
- max_entry varchar(128) NULL
- price_high varchar(32) NULL
- percent_change int NULL
- trailing_stop_target decimal(5,2) NULL
- trailing_stop_percent decimal(5,2) NULL
- target_price decimal(10,2) NULL
- locked_profit_stop decimal(10,2) NULL
- last_updated varchar(128) NULL
- last_updated_time varchar(128) NULL
- last_marketed_at datetime NULL
- marketing_status varchar(32) NULL
- distribution_channels text NULL
- updated_stop_loss_differential varchar(128) NULL
- updated_stop_loss varchar(128) NULL
- closing_date varchar(128) NULL
- closing_time varchar(128) NULL
- details text NULL
- updated_details text NULL
- closing_details text NULL
- financial_news text NULL
- video_link varchar(256) NULL
- send_msg varchar(128) NULL
- expdate varchar(128) NULL
- option_type varchar(128) NULL
- expiration varchar(128) NULL
- option_price varchar(128) NULL
- strike varchar(128) NULL
- chart_image varchar(512) NULL
- watchlist varchar(128) NULL
- tv_title varchar(60) NULL
- tv_chart varchar(256) NULL
- tv_chart_type varchar(20) NULL
- tv_description text NULL
- notification_sent tinyint NULL
- trade_description text NULL
- trade_chart_link varchar(255) NULL
- ema_3_8 varchar(10) NULL
- ema_8_13 varchar(10) NULL
- ema_13_34 varchar(10) NULL
- ema_34_48 varchar(10) NULL
- ema_consensus int NULL
- ema_9 varchar(10) NULL
- ema_21 varchar(10) NULL
- ema_34 varchar(10) NULL
- ema_48 varchar(10) NULL
- ema_100 varchar(10) NULL
- ema_200 varchar(10) NULL
- ema_3 decimal(10,4) NULL
- ema_8 decimal(10,4) NULL
- ema_13 decimal(10,4) NULL
- sma_50 decimal(10,4) NULL
- sma_200 decimal(10,4) NULL
- macd decimal(10,4) NULL
- rsi decimal(10,4) NULL
- modified_on datetime NULL
- source varchar(32) NULL
- account_type varchar(16) NULL
- broker_order_id varchar(64) NULL
- execution_id char(64) NULL
- filled_qty decimal(18,8) NULL
- filled_price decimal(18,8) NULL
- filled_at datetime NULL
- side enum('BUY','SELL') NULL
- notified_discord tinyint(1) NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_trade_alerts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trade_alerts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trade_alerts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

