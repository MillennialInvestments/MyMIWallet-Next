-- Table: bf_marketing_temp_scraper
-- Sources: code: app/Models/AlertsModel.php:177, app/Models/MarketingModel.php:704, app/Models/MarketingModel.php:712, app/Models/MarketingModel.php:728, app/Models/MarketingModel.php:933, app/Models/MarketingModel.php:943, app/Models/MarketingModel.php:1124, app/Models/MarketingModel.php:1165, app/Models/MarketingModel.php:1197, app/Models/MarketingModel.php:1238, app/Models/MarketingModel.php:1291, app/Models/MarketingModel.php:1310, app/Models/MarketingModel.php:1319, app/Models/MarketingModel.php:1394, app/Models/MarketingModel.php:1440, app/Models/MarketingModel.php:1488, app/Models/MarketingModel.php:1533, app/Models/MarketingModel.php:1579, app/Models/MarketingModel.php:1593, app/Models/MarketingModel.php:1713, app/Models/MarketingModel.php:1846, app/Models/MarketingModel.php:1955, app/Models/MarketingModel.php:2017, app/Models/MarketingModel.php:2026, app/Models/MarketingModel.php:2033, app/Models/MarketingModel.php:2161, app/Models/MarketingModel.php:2200, app/Models/MarketingModel.php:2208, app/Models/MarketingModel.php:2213, app/Models/MarketingModel.php:2268, app/Models/MarketingModel.php:2283, app/Models/MarketingModel.php:2289, app/Models/MarketingModel.php:2404, app/Modules/Marketing_New/Models/MarketingModel.php:21, app/Modules/Management/Views/Marketing/EmailDetail.php:2, app/Modules/Management/Controllers/MarketingController.php:1962, app/Modules/APIs/Controllers/ManagementController.php:783, app/Modules/APIs/Controllers/ManagementController.php:896, app/Modules/APIs/Controllers/ManagementController.php:897, app/Modules/APIs/Controllers/ManagementController.php:1647, app/Modules/APIs/Controllers/ManagementController.php:1702, app/Commands/NewsAudit.php:378, app/Commands/NewsAudit.php:382, app/Commands/NewsAudit.php:410, app/Libraries/MyMIMarketing.php:3079, docs/gap-audit/gap_report.md:27, docs/functional_inventory/docs_to_code_map.md:12, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:35, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:57, docs/functional_inventory/docs_to_code_map.md:75, docs/functional_inventory/docs_to_code_map.md:89, docs/functional_inventory/docs_to_code_map.md:90, docs/functional_inventory/docs_to_code_map.md:126, docs/ops/runbooks/database-log-review.md:18, docs/discord/marketing_news_automation.md:7, docs/discord/marketing_news_automation.md:51, docs/discord/marketing_news_automation.md:82, docs/discord/_inventory.md:20, docs/alerts/alerts_marketing_pipline.md:13, docs/operations/04-cron-automation.md:23, docs/operations/05-database.md:18, docs/operations/05-database.md:28, docs/operations/05-database.md:35, docs/kimi-k2-integration.md:99, docs/chatgpt/codex_executive_director/summary.md:34, docs/marketing/02-budgeting-and-investments-libraries.md:41, docs/marketing/_templates/CAMPAIGN_TEMPLATE.md:24, docs/health/modules/marketing.md:5, docs/health/modules/marketing.md:11, docs/health/modules/marketing.md:28, docs/health/health_test_checklist.md:380, docs/health/health_test_checklist.md:386, docs/health/health_test_checklist.md:390, docs/health/health_test_checklist.md:405
-- Suspected columns: id, email_hash
CREATE TABLE IF NOT EXISTS `bf_marketing_temp_scraper` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_hash` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_temp_scraper' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_marketing_temp_scraper` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_temp_scraper' AND column_name = 'email_hash');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_marketing_temp_scraper` ADD COLUMN `email_hash` TEXT NULL', 'SELECT ''column email_hash already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_marketing_temp_scraper`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_temp_scraper'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_temp_scraper'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

