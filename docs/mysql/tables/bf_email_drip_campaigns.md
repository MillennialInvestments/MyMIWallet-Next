-- Table: bf_email_drip_campaigns
-- Sources: code: app/Models/DripCampaignModel.php:11, app/Models/MarketingModel.php:416, app/Models/MarketingModel.php:431, app/Models/MarketingModel.php:462
CREATE TABLE IF NOT EXISTS `bf_email_drip_campaigns` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_drip_campaigns' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_drip_campaigns` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_email_drip_campaigns`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_drip_campaigns'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_drip_campaigns'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

