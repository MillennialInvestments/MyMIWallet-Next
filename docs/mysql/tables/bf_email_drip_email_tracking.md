-- Table: bf_email_drip_email_tracking
-- Sources: code: app/Models/DripCampaignModel.php:37, app/Models/DripCampaignModel.php:41, app/Models/DripCampaignModel.php:54, app/Models/DripCampaignModel.php:114, app/Models/DripCampaignModel.php:126, app/Models/DripCampaignModel.php:137, app/Models/DripCampaignModel.php:147, app/Models/DripCampaignModel.php:161
CREATE TABLE IF NOT EXISTS `bf_email_drip_email_tracking` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_drip_email_tracking' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_drip_email_tracking` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_email_drip_email_tracking`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_drip_email_tracking'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_drip_email_tracking'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

