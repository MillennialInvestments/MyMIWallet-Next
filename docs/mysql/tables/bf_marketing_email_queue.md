-- Table: bf_marketing_email_queue
-- Sources: code: app/Models/CampaignModel.php:126, app/Models/CampaignModel.php:135, app/Models/CampaignModel.php:148, app/Models/CampaignModel.php:156, app/Models/EmailModel.php:30, app/Models/EmailModel.php:106, app/Models/EmailModel.php:115, app/Models/EmailModel.php:126, app/Models/EmailModel.php:130, app/Models/EmailModel.php:141, app/Models/EmailModel.php:158, app/Models/EmailModel.php:192, app/Models/EmailModel.php:202, app/Models/EmailModel.php:210, app/Models/EmailModel.php:228, app/Models/EmailModel.php:251, app/Models/EmailModel.php:268, app/Models/EmailModel.php:273, app/Models/MarketingModel.php:1104, app/Models/MarketingModel.php:1602, app/Models/MarketingModel.php:1990, app/Models/MarketingModel.php:1998, app/Models/MarketingModel.php:2056, app/Models/Marketing/EmailQueueModel.php:10, app/Services/EmailService.php:62
CREATE TABLE IF NOT EXISTS `bf_marketing_email_queue` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_email_queue' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_marketing_email_queue` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_marketing_email_queue`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_email_queue'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_email_queue'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

