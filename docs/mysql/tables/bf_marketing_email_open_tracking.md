-- Table: bf_marketing_email_open_tracking
-- Sources: code: app/Models/CampaignModel.php:131, app/Models/CampaignModel.php:152, app/Models/EmailModel.php:111, app/Models/EmailModel.php:134
CREATE TABLE IF NOT EXISTS `bf_marketing_email_open_tracking` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_email_open_tracking' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_marketing_email_open_tracking` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_marketing_email_open_tracking`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_email_open_tracking'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_email_open_tracking'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

