-- Table: bf_marketing_schedule
-- Sources: code: app/Models/MarketingModel.php:105, app/Models/MarketingModel.php:232, app/Models/MarketingModel.php:1064, app/Models/MarketingModel.php:1233, app/Models/MarketingModel.php:1450, app/Models/MarketingModel.php:1611, app/Models/MarketingModel.php:2427, app/Models/MarketingModel.php:2437, app/Services/DripCampaignService.php:157
-- Suspected columns: id
CREATE TABLE IF NOT EXISTS `bf_marketing_schedule` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_schedule' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_marketing_schedule` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_marketing_schedule`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_schedule'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_schedule'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

