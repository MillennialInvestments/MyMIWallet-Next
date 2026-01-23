-- Table: bf_investment_trade_alerts
-- Sources: code: app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:48, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:51, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:60, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:69, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:78, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:87, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:96, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:105, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:112, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:121, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:131, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:134, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:135, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:141, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:142, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:143, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:156, app/Database/Migrations/2026-02-15-000200_AddBrokerExecutionFields.php:158, app/Views/themes/dashboard/partials/custom-js/tradingview.php:8, app/Models/AccountsModel.php:172, app/Models/AccountsModel.php:181, app/Models/AccountsModel.php:424, app/Models/AccountsModel.php:433, app/Models/WalletModel.php:496, app/Models/WalletModel.php:505, app/Models/AlertsModel.php:15, app/Models/AlertsModel.php:86, app/Models/AlertsModel.php:124, app/Models/AlertsModel.php:183, app/Models/AlertsModel.php:200, app/Models/AlertsModel.php:468, app/Models/AlertsModel.php:495, app/Models/AlertsModel.php:522, app/Models/AlertsModel.php:532, app/Models/AlertsModel.php:537, app/Models/AlertsModel.php:543, app/Models/AlertsModel.php:552, app/Models/AlertsModel.php:562, app/Models/AlertsModel.php:572, app/Models/AlertsModel.php:573, app/Models/AlertsModel.php:574, app/Models/AlertsModel.php:575, app/Models/AlertsModel.php:576, app/Models/AlertsModel.php:583, app/Models/AlertsModel.php:593, app/Models/AlertsModel.php:630, app/Models/AlertsModel.php:635, app/Models/AlertsModel.php:637, app/Models/AlertsModel.php:679, app/Models/AlertsModel.php:689, app/Models/AlertsModel.php:698, app/Models/AlertsModel.php:735, app/Models/AlertsModel.php:971, app/Models/AlertsModel.php:973, app/Models/AlertsModel.php:1026, app/Models/AlertsModel.php:1177, app/Models/AlertsModel.php:1187, app/Models/AlertsModel.php:1227, app/Models/AlertsModel.php:1236, app/Models/AlertsModel.php:1245, app/Models/AlertsModel.php:1293, app/Models/AlertsModel.php:1319, app/Models/AlertsModel.php:1420, app/Models/AlertsModel.php:1432, app/Models/AlertsModel.php:1444, app/Models/AlertsModel.php:1451, app/Models/AlertsModel.php:1471, app/Models/AlertsModel.php:1498, app/Models/AlertsModel.php:1584, app/Models/AlertsModel.php:1594, app/Models/AlertsModel.php:1605, app/Models/AlertsModel.php:1625, app/Models/AlertsModel.php:1681, app/Models/AlertsModel.php:1761, app/Models/AlertsModel.php:1799, app/Models/AlertsModel.php:1811, app/Models/AlertsModel.php:1844, app/Models/AlertsModel.php:1851, app/Models/AlertsModel.php:1864, app/Models/AlertsModel.php:1964, app/Models/AlertsModel.php:2027, app/Models/AlertsModel.php:2030, app/Models/AlertsModel.php:2039, app/Models/AlertsModel.php:2153, app/Models/AlertsModel.php:2177, app/Models/AlertsModel.php:2204, app/Models/AlertsModel.php:2224, app/Models/AlertsModel.php:2504, app/Models/AlertsModel.php:2519, app/Models/AlertsModel.php:2576, app/Models/AlertsModel.php:2584, app/Models/AlertsModel.php:2602, app/Models/AlertsModel.php:2712, app/Models/AlertsModel.php:2728, app/Models/AlertsModel.php:2734, app/Models/AlertsModel.php:2738, app/Models/AlertsModel.php:2755, app/Models/AlertsModel.php:2814, app/Models/AlertsModel.php:2835, app/Models/AlertsModel.php:2843, app/Models/AlertsModel.php:2871, app/Models/AlertsModel.php:2872, app/Models/AlertsModel.php:2999, app/Models/AlertsModel.php:3037, app/Models/AlertsModel.php:3049, app/Models/AlertsModel.php:3060, app/Models/AlertsModel.php:3075, app/Models/AlertsModel.php:3146, app/Models/AlertsModel.php:3475, app/Models/AlertsModel.php:3538, app/Models/AlertsModel.php:3573, app/Models/AlertsModel.php:3593, app/Models/MarketingModel.php:554, app/Models/MarketingModel.php:882, app/Models/MarketingModel.php:1278, app/Models/InvestmentModel.php:497, app/Models/InvestmentModel.php:1166, app/Models/InvestmentModel.php:1195, app/Models/InvestmentModel.php:1211, app/Models/InvestmentModel.php:1593, app/Models/MyMICoinModel.php:101, app/Models/MyMICoinModel.php:108, app/Models/MyMICoinModel.php:249, app/Models/MyMICoinModel.php:256, app/Modules/Management/Controllers/AlertsController.php:588, app/Modules/Management/Controllers/AlertsController.php:619, app/Modules/Management/Controllers/AlertsController.php:1284, app/Modules/APIs/Controllers/ChatController.php:198, app/Modules/APIs/Controllers/ChatController.php:199, app/Modules/APIs/Controllers/AlertsController.php:199, app/Modules/APIs/Controllers/AlertsController.php:662, app/Modules/APIs/Controllers/AlertsController.php:2144, app/Modules/APIs/Controllers/AlertsController.php:2160, app/Commands/AlertsAudit.php:34, app/Commands/AlertsAudit.php:372, app/Services/WalletSummaryService.php:174, app/Services/WalletSummaryService.php:176, app/Services/SearchService.php:64, app/Services/SearchService.php:65, app/Services/WeeklyStreamService.php:145, app/Services/WeeklyStreamService.php:151, app/Libraries/MyMIMarketing.php:2559, app/Libraries/Privacy/DataExportService.php:22, app/Libraries/MyMIAlerts.php:1285, app/Libraries/MyMIAlerts.php:2139, app/Libraries/MyMIAlerts.php:2155, app/Libraries/MyMIAlerts.php:2176, app/Libraries/MyMIAlerts.php:2196, app/Libraries/MyMIAlerts.php:2551, docs/gap-audit/gap_report.md:27, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:12, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:28, docs/functional_inventory/docs_to_code_map.md:32, docs/functional_inventory/docs_to_code_map.md:42, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:56, docs/functional_inventory/docs_to_code_map.md:58, docs/functional_inventory/docs_to_code_map.md:59, docs/functional_inventory/docs_to_code_map.md:63, docs/functional_inventory/docs_to_code_map.md:64, docs/functional_inventory/docs_to_code_map.md:68, docs/functional_inventory/docs_to_code_map.md:69, docs/functional_inventory/docs_to_code_map.md:70, docs/functional_inventory/docs_to_code_map.md:71, docs/functional_inventory/docs_to_code_map.md:75, docs/functional_inventory/docs_to_code_map.md:83, docs/functional_inventory/docs_to_code_map.md:89, docs/functional_inventory/docs_to_code_map.md:90, docs/discord/earnings_calendar_automation.md:24, docs/discord/discord_integration_overview.md:10, docs/discord/discord_integration_overview.md:37, docs/discord/server_setup_and_alert_routing.md:183, docs/discord/_inventory.md:16, docs/alerts/thinkorswim_broker_ingestion.md:4, docs/alerts/alerts_marketing_pipline.md:14, docs/alerts/alerts_marketing_pipline.md:28, docs/operations/04-cron-automation.md:25, docs/operations/05-database.md:15, docs/operations/05-database.md:27, docs/OVERVIEW.md:176, docs/chatgpt/mymi_alert_system/summary.md:75, docs/chatgpt/mymi_alert_system/summary.md:96, docs/chatgpt/mymi_alert_system/summary.md:147, docs/chatgpt/mymi_alert_system/standards.md:117, docs/chatgpt/mymi_alert_system/inventory.md:103, docs/chatgpt/codex_executive_director/summary.md:28, docs/marketing/09-discord-coffee-and-stocks.md:41, docs/marketing/03-mymiexchange-solana.md:41, docs/marketing/13-x-twitter-guide.md:41, docs/marketing/14-stocktwits-guide.md:41, docs/marketing/14-stocktwits-guide.md:94, docs/marketing/01-mymi-gold-and-coin.md:51, docs/marketing/04-mymialerts-premium.md:41, docs/marketing/_templates/CAMPAIGN_TEMPLATE.md:25, docs/marketing/15-youtube-guide.md:41, docs/marketing/08-mymi-apis-self-host.md:41, docs/marketing/16-tiktok-guide.md:41, docs/health/modules/alerts.md:27, docs/health/modules/alerts.md:45, docs/health/health_test_checklist.md:327, docs/health/health_test_checklist.md:330, docs/health/health_test_checklist.md:345, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:17, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:31
-- Suspected columns: ticker, id, created_on, alert_created, status, user_id, created_at
CREATE TABLE IF NOT EXISTS `bf_investment_trade_alerts` (
  `ticker` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_on` TEXT NULL,
  `alert_created` TEXT NULL,
  `status` TEXT NULL,
  `user_id` TEXT NULL,
  `created_at` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trade_alerts' AND column_name = 'ticker');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_trade_alerts` ADD COLUMN `ticker` TEXT NULL', 'SELECT ''column ticker already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trade_alerts' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_trade_alerts` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trade_alerts' AND column_name = 'created_on');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_trade_alerts` ADD COLUMN `created_on` TEXT NULL', 'SELECT ''column created_on already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trade_alerts' AND column_name = 'alert_created');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_trade_alerts` ADD COLUMN `alert_created` TEXT NULL', 'SELECT ''column alert_created already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trade_alerts' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_trade_alerts` ADD COLUMN `status` TEXT NULL', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trade_alerts' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_trade_alerts` ADD COLUMN `user_id` TEXT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trade_alerts' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_trade_alerts` ADD COLUMN `created_at` TEXT NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_investment_trade_alerts`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trade_alerts'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trade_alerts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

