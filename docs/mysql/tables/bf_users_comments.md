-- Table: bf_users_comments
-- Sources: code: app/Models/UserModel.php:76, app/Models/UserModel.php:133, app/Models/AlertsModel.php:724, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:90, docs/operations/05-database.md:26
-- Suspected columns: ticker, created_at
CREATE TABLE IF NOT EXISTS `bf_users_comments` (
  `ticker` TEXT NULL,
  `created_at` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_comments' AND column_name = 'ticker');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_comments` ADD COLUMN `ticker` TEXT NULL', 'SELECT ''column ticker already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_comments' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_comments` ADD COLUMN `created_at` TEXT NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_comments`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_comments'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_comments'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

