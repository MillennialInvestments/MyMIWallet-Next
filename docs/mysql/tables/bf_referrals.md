-- Table: bf_referrals
-- Sources: code: docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:56, docs/functional_inventory/docs_to_code_map.md:57, docs/functional_inventory/docs_to_code_map.md:59, docs/functional_inventory/docs_to_code_map.md:60, docs/functional_inventory/docs_to_code_map.md:61, docs/functional_inventory/docs_to_code_map.md:62, docs/functional_inventory/docs_to_code_map.md:63, docs/functional_inventory/docs_to_code_map.md:65, docs/functional_inventory/docs_to_code_map.md:66, docs/functional_inventory/docs_to_code_map.md:67, docs/functional_inventory/docs_to_code_map.md:68, docs/functional_inventory/docs_to_code_map.md:75, docs/OVERVIEW.md:176, docs/marketing/13-x-twitter-guide.md:53, docs/marketing/10-linkedin-groups-guide.md:41, docs/marketing/06-referrals-rewards.md:36, docs/marketing/06-referrals-rewards.md:41, docs/marketing/06-referrals-rewards.md:98, docs/marketing/02-budgeting-and-investments-libraries.md:64, docs/marketing/01-mymi-gold-and-coin.md:52, docs/marketing/01-mymi-gold-and-coin.md:64, docs/marketing/04-mymialerts-premium.md:41, docs/marketing/04-mymialerts-premium.md:53, docs/marketing/05-memberships-and-custom-plans.md:41, docs/marketing/05-memberships-and-custom-plans.md:54, docs/marketing/_templates/CAMPAIGN_TEMPLATE.md:26, docs/marketing/11-facebook-groups-guide.md:41, docs/marketing/12-discord-no-links-guide.md:41, docs/marketing/07-myprojects-real-estate.md:54, docs/marketing/08-mymi-apis-self-host.md:54
-- Suspected columns: status, reward_days, partner_pct
CREATE TABLE IF NOT EXISTS `bf_referrals` (
  `status` TEXT NULL,
  `reward_days` TEXT NULL,
  `partner_pct` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_referrals' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_referrals` ADD COLUMN `status` TEXT NULL', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_referrals' AND column_name = 'reward_days');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_referrals` ADD COLUMN `reward_days` TEXT NULL', 'SELECT ''column reward_days already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_referrals' AND column_name = 'partner_pct');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_referrals` ADD COLUMN `partner_pct` TEXT NULL', 'SELECT ''column partner_pct already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_referrals`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_referrals'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_referrals'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

