-- Table: bf_email_user_drip_progress
-- Sources: code: app/Models/DripCampaignModel.php:29, app/Models/DripCampaignModel.php:97, app/Models/DripCampaignModel.php:107, app/Models/DripCampaignModel.php:169
CREATE TABLE IF NOT EXISTS `bf_email_user_drip_progress` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_user_drip_progress' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_user_drip_progress` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_email_user_drip_progress`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_user_drip_progress'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_user_drip_progress'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

