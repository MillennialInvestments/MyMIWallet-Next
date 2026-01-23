-- Table: bf_assets
-- Sources: code: app/Services/SearchService.php:44, app/Services/SearchService.php:45, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:90, docs/operations/05-database.md:22, docs/operations/05-database.md:22, docs/operations/05-database.md:22, docs/operations/05-database.md:31, docs/OVERVIEW.md:120
-- Suspected columns: name, created_at
CREATE TABLE IF NOT EXISTS `bf_assets` (
  `name` TEXT NULL,
  `created_at` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_assets' AND column_name = 'name');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_assets` ADD COLUMN `name` TEXT NULL', 'SELECT ''column name already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_assets' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_assets` ADD COLUMN `created_at` TEXT NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_assets`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_assets'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_assets'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

