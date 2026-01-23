-- Table: bf_esports_escrows
-- Sources: code: app/Models/EsportsModel.php:41, app/Models/EsportsModel.php:123, app/Models/EsportsModel.php:128, app/Models/EsportsModel.php:133, docs/exports_schema.md:91, docs/functional_inventory/docs_to_code_map.md:50, docs/functional_inventory/docs_to_code_map.md:51
-- Suspected columns: event_id
CREATE TABLE IF NOT EXISTS `bf_esports_escrows` (
  `event_id` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_esports_escrows' AND column_name = 'event_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_esports_escrows` ADD COLUMN `event_id` TEXT NULL', 'SELECT ''column event_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_esports_escrows`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_escrows'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_esports_escrows'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

