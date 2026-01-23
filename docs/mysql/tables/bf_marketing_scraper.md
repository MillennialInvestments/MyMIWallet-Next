-- Table: bf_marketing_scraper
-- Sources: code: app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:17, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:62, app/Models/AnalyticalModel.php:579, app/Models/MarketingModel.php:11, app/Models/MarketingModel.php:361, app/Models/MarketingModel.php:377, app/Models/MarketingModel.php:390, app/Models/MarketingModel.php:445, app/Models/MarketingModel.php:566, app/Models/MarketingModel.php:574, app/Models/MarketingModel.php:589, app/Models/MarketingModel.php:696, app/Models/MarketingModel.php:759, app/Models/MarketingModel.php:769, app/Models/MarketingModel.php:812, app/Models/MarketingModel.php:823, app/Models/MarketingModel.php:906, app/Models/MarketingModel.php:1001, app/Models/MarketingModel.php:1054, app/Models/MarketingModel.php:1073, app/Models/MarketingModel.php:1115, app/Models/MarketingModel.php:1133, app/Models/MarketingModel.php:1174, app/Models/MarketingModel.php:1253, app/Models/MarketingModel.php:1264, app/Models/MarketingModel.php:1428, app/Models/MarketingModel.php:1480, app/Models/MarketingModel.php:1674, app/Models/MarketingModel.php:1694, app/Models/MarketingModel.php:1705, app/Models/MarketingModel.php:1732, app/Models/MarketingModel.php:1743, app/Models/MarketingModel.php:1764, app/Models/MarketingModel.php:1791, app/Models/MarketingModel.php:1841, app/Models/MarketingModel.php:1948, app/Models/MarketingModel.php:2109, app/Models/MarketingModel.php:2190, app/Models/MarketingModel.php:2377, app/Models/MarketingModel.php:2449, app/Models/MarketingModel.php:2483, app/Models/MarketingModel.php:2496, app/Models/MarketingModel.php:2698, app/Modules/Marketing_New/Models/MarketingModel.php:9, app/Modules/Management/Views/Marketing/EmailDetail.php:2, app/Modules/Management/Controllers/MarketingController.php:1057, app/Modules/Management/Controllers/MarketingController.php:1072, app/Modules/Management/Controllers/MarketingController.php:1325, app/Modules/Management/Controllers/MarketingController.php:2602, app/Modules/Management/Controllers/MarketingController.php:2729, app/Modules/Management/Documents/Marketing/MarketingOpRunbook.md:3, app/Modules/Management/Documents/Marketing/MarketingOpRunbook.md:6, app/Modules/APIs/Controllers/AdvisorController.php:105, app/Modules/APIs/Controllers/MarketingController.php:2396, app/Modules/APIs/Controllers/MarketingController.php:2400, app/Modules/APIs/Controllers/ManagementController.php:1634, app/Modules/APIs/Controllers/ManagementController.php:1724, app/Modules/APIs/Controllers/ManagementController.php:1728, app/Commands/NewsAudit.php:423, app/Commands/NewsAudit.php:427, app/Commands/NewsAudit.php:455, app/Services/MarketingService.php:326, app/Services/MarketingService.php:382, app/Libraries/MyMIMarketing.php:3107, app/Libraries/MyMIMarketing.php:5392, app/Libraries/MyMIMarketing.php:5393, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:12, docs/functional_inventory/docs_to_code_map.md:26, docs/functional_inventory/docs_to_code_map.md:35, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:56, docs/functional_inventory/docs_to_code_map.md:57, docs/functional_inventory/docs_to_code_map.md:58, docs/functional_inventory/docs_to_code_map.md:59, docs/functional_inventory/docs_to_code_map.md:60, docs/functional_inventory/docs_to_code_map.md:61, docs/functional_inventory/docs_to_code_map.md:62, docs/functional_inventory/docs_to_code_map.md:63, docs/functional_inventory/docs_to_code_map.md:64, docs/functional_inventory/docs_to_code_map.md:65, docs/functional_inventory/docs_to_code_map.md:66, docs/functional_inventory/docs_to_code_map.md:67, docs/functional_inventory/docs_to_code_map.md:68, docs/functional_inventory/docs_to_code_map.md:69, docs/functional_inventory/docs_to_code_map.md:70, docs/functional_inventory/docs_to_code_map.md:71, docs/functional_inventory/docs_to_code_map.md:75, docs/functional_inventory/docs_to_code_map.md:89, docs/functional_inventory/docs_to_code_map.md:90, docs/discord/marketing_news_automation.md:7, docs/discord/marketing_news_automation.md:21, docs/discord/marketing_news_automation.md:52, docs/discord/marketing_news_automation.md:82, docs/discord/_inventory.md:20, docs/alerts/alerts_marketing_pipline.md:18, docs/alerts/alerts_marketing_pipline.md:23, docs/alerts/alerts_marketing_pipline.md:27, docs/operations/04-cron-automation.md:24, docs/operations/05-database.md:19, docs/operations/05-database.md:28, docs/OVERVIEW.md:176, docs/kimi-k2-integration.md:43, docs/kimi-k2-integration.md:57, docs/chatgpt/codex_executive_director/summary.md:36, docs/marketing/09-discord-coffee-and-stocks.md:41, docs/marketing/09-discord-coffee-and-stocks.md:128, docs/marketing/03-mymiexchange-solana.md:41, docs/marketing/03-mymiexchange-solana.md:95, docs/marketing/13-x-twitter-guide.md:41, docs/marketing/13-x-twitter-guide.md:95, docs/marketing/14-stocktwits-guide.md:41, docs/marketing/14-stocktwits-guide.md:94, docs/marketing/10-linkedin-groups-guide.md:41, docs/marketing/10-linkedin-groups-guide.md:93, docs/marketing/06-referrals-rewards.md:41, docs/marketing/06-referrals-rewards.md:98, docs/marketing/02-budgeting-and-investments-libraries.md:108, docs/marketing/01-mymi-gold-and-coin.md:50, docs/marketing/01-mymi-gold-and-coin.md:156, docs/marketing/04-mymialerts-premium.md:41, docs/marketing/04-mymialerts-premium.md:98, docs/marketing/05-memberships-and-custom-plans.md:41, docs/marketing/05-memberships-and-custom-plans.md:100, docs/marketing/_templates/CAMPAIGN_TEMPLATE.md:24, docs/marketing/11-facebook-groups-guide.md:41, docs/marketing/11-facebook-groups-guide.md:93, docs/marketing/15-youtube-guide.md:41, docs/marketing/15-youtube-guide.md:72, docs/marketing/15-youtube-guide.md:115, docs/marketing/12-discord-no-links-guide.md:41, docs/marketing/12-discord-no-links-guide.md:94, docs/marketing/07-myprojects-real-estate.md:41, docs/marketing/07-myprojects-real-estate.md:98, docs/marketing/08-mymi-apis-self-host.md:41, docs/marketing/08-mymi-apis-self-host.md:98, docs/marketing/16-tiktok-guide.md:41, docs/marketing/16-tiktok-guide.md:99, docs/health/modules/marketing.md:28, docs/health/modules/marketing.md:62, docs/health/modules/marketing.md:80, docs/health/modules/discord_zapier.md:44, docs/health/health_test_checklist.md:405, docs/health/health_test_checklist.md:441, docs/health/health_test_checklist.md:459, docs/health/health_test_checklist.md:477, docs/automation/communities/cron_plan.md:5
-- Suspected columns: id, source_id, hash, campaign
CREATE TABLE IF NOT EXISTS `bf_marketing_scraper` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `source_id` TEXT NULL,
  `hash` TEXT NULL,
  `campaign` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_scraper' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_marketing_scraper` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_scraper' AND column_name = 'source_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_marketing_scraper` ADD COLUMN `source_id` TEXT NULL', 'SELECT ''column source_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_scraper' AND column_name = 'hash');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_marketing_scraper` ADD COLUMN `hash` TEXT NULL', 'SELECT ''column hash already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_scraper' AND column_name = 'campaign');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_marketing_scraper` ADD COLUMN `campaign` TEXT NULL', 'SELECT ''column campaign already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_marketing_scraper`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_scraper'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_scraper'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

