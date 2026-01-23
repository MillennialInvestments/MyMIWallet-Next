-- Table: bf_marketing_campaigns
-- Sources: code: app/Models/CampaignModel.php:9, app/Models/CampaignModel.php:71, app/Models/CampaignModel.php:82, app/Models/CampaignModel.php:178, app/Models/AnalyticalModel.php:130, app/Models/AnalyticalModel.php:145, app/Models/EmailModel.php:46, app/Models/EmailModel.php:53, app/Models/EmailModel.php:89, app/Models/EmailModel.php:98, app/Models/EmailModel.php:295, app/Models/MarketingModel.php:93, app/Models/MarketingModel.php:401, app/Models/MarketingModel.php:540, app/Models/MarketingModel.php:664, app/Models/MarketingModel.php:671, app/Models/MarketingModel.php:778, app/Models/MarketingModel.php:2243, app/Models/Marketing/EmailMarketingModel.php:10, app/Services/EmailService.php:25
CREATE TABLE IF NOT EXISTS `bf_marketing_campaigns` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_campaigns' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_marketing_campaigns` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_marketing_campaigns`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_campaigns'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_campaigns'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

