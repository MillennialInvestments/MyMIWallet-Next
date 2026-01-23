-- Table: bf_email_drip_campaign_steps
-- Sources: code: app/Models/DripCampaignModel.php:24, app/Models/DripCampaignModel.php:62, app/Models/DripCampaignModel.php:82, app/Models/DripCampaignModel.php:89, app/Models/MarketingModel.php:477, app/Models/MarketingModel.php:491, app/Models/MarketingModel.php:505, app/Models/MarketingModel.php:520
CREATE TABLE IF NOT EXISTS `bf_email_drip_campaign_steps` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_drip_campaign_steps' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_drip_campaign_steps` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_email_drip_campaign_steps`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_drip_campaign_steps'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_drip_campaign_steps'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

