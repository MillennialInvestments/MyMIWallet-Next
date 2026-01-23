-- Table: bf_esports_payouts
-- Sources: code: app/Models/EsportsModel.php:178, app/Models/EsportsModel.php:184, app/Models/EsportsModel.php:193, app/Models/EsportsModel.php:202, app/Models/EsportsModel.php:215, app/Models/EsportsModel.php:225, docs/exports_schema.md:107, docs/functional_inventory/docs_to_code_map.md:50, docs/functional_inventory/docs_to_code_map.md:51
-- Suspected columns: event_id, id
CREATE TABLE IF NOT EXISTS `bf_esports_payouts` (
  `event_id` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_esports_payouts' AND column_name = 'event_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_esports_payouts` ADD COLUMN `event_id` TEXT NULL', 'SELECT ''column event_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_esports_payouts' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_esports_payouts` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_esports_payouts`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_payouts'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_payouts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

