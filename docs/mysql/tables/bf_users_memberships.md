-- Table: bf_users_memberships
-- Sources: code: app/Models/DashboardModel.php:91, app/Models/DashboardModel.php:95, app/Models/DashboardModel.php:99, app/Models/MarketingModel.php:754, app/Modules/APIs/Controllers/ChatController.php:284, app/Modules/APIs/Controllers/ChatController.php:285, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:56, docs/functional_inventory/docs_to_code_map.md:57, docs/functional_inventory/docs_to_code_map.md:58, docs/functional_inventory/docs_to_code_map.md:59, docs/functional_inventory/docs_to_code_map.md:60, docs/functional_inventory/docs_to_code_map.md:61, docs/functional_inventory/docs_to_code_map.md:62, docs/functional_inventory/docs_to_code_map.md:63, docs/functional_inventory/docs_to_code_map.md:64, docs/functional_inventory/docs_to_code_map.md:65, docs/functional_inventory/docs_to_code_map.md:66, docs/functional_inventory/docs_to_code_map.md:67, docs/functional_inventory/docs_to_code_map.md:68, docs/functional_inventory/docs_to_code_map.md:69, docs/functional_inventory/docs_to_code_map.md:70, docs/functional_inventory/docs_to_code_map.md:71, docs/functional_inventory/docs_to_code_map.md:75, docs/OVERVIEW.md:176, docs/marketing/09-discord-coffee-and-stocks.md:41, docs/marketing/03-mymiexchange-solana.md:41, docs/marketing/13-x-twitter-guide.md:41, docs/marketing/14-stocktwits-guide.md:41, docs/marketing/10-linkedin-groups-guide.md:41, docs/marketing/06-referrals-rewards.md:41, docs/marketing/02-budgeting-and-investments-libraries.md:41, docs/marketing/02-budgeting-and-investments-libraries.md:60, docs/marketing/01-mymi-gold-and-coin.md:49, docs/marketing/01-mymi-gold-and-coin.md:75, docs/marketing/01-mymi-gold-and-coin.md:164, docs/marketing/04-mymialerts-premium.md:41, docs/marketing/05-memberships-and-custom-plans.md:41, docs/marketing/_templates/CAMPAIGN_TEMPLATE.md:26, docs/marketing/11-facebook-groups-guide.md:41, docs/marketing/15-youtube-guide.md:41, docs/marketing/12-discord-no-links-guide.md:41, docs/marketing/07-myprojects-real-estate.md:41, docs/marketing/08-mymi-apis-self-host.md:41, docs/marketing/16-tiktok-guide.md:41
-- Suspected columns: active, feature_level, feature_name, identifier, plan_limits
CREATE TABLE IF NOT EXISTS `bf_users_memberships` (
  `active` TEXT NULL,
  `feature_level` TEXT NULL,
  `feature_name` TEXT NULL,
  `identifier` TEXT NULL,
  `plan_limits` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_memberships' AND column_name = 'active');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_memberships` ADD COLUMN `active` TEXT NULL', 'SELECT ''column active already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_memberships' AND column_name = 'feature_level');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_memberships` ADD COLUMN `feature_level` TEXT NULL', 'SELECT ''column feature_level already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_memberships' AND column_name = 'feature_name');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_memberships` ADD COLUMN `feature_name` TEXT NULL', 'SELECT ''column feature_name already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_memberships' AND column_name = 'identifier');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_memberships` ADD COLUMN `identifier` TEXT NULL', 'SELECT ''column identifier already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_memberships' AND column_name = 'plan_limits');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_memberships` ADD COLUMN `plan_limits` TEXT NULL', 'SELECT ''column plan_limits already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_memberships`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_memberships'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_memberships'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

