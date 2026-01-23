-- Table: bf_users_anonymous
-- Sources: code: app/Models/UserModel.php:178
-- Suspected columns: ip_address
CREATE TABLE IF NOT EXISTS `bf_users_anonymous` (
  `ip_address` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_anonymous' AND column_name = 'ip_address');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_anonymous` ADD COLUMN `ip_address` TEXT NULL', 'SELECT ''column ip_address already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_anonymous`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_anonymous'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_anonymous'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

