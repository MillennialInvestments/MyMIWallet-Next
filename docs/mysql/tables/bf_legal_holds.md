-- Table: bf_legal_holds
-- Sources: code: app/Modules/Admin/Controllers/PrivacyController.php:25
-- Suspected columns: user_id
CREATE TABLE IF NOT EXISTS `bf_legal_holds` (
  `user_id` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_legal_holds' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_legal_holds` ADD COLUMN `user_id` TEXT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_legal_holds`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_legal_holds'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_legal_holds'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

