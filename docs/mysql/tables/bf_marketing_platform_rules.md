-- Table: bf_marketing_platform_rules
-- Sources: code: app/Models/MarketingModel.php:2573, app/Models/MarketingModel.php:2597, app/Models/MarketingModel.php:2605
-- Suspected columns: id
CREATE TABLE IF NOT EXISTS `bf_marketing_platform_rules` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_platform_rules' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_marketing_platform_rules` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_marketing_platform_rules`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_platform_rules'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_platform_rules'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

