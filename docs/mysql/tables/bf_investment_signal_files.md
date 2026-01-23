-- Table: bf_investment_signal_files
-- Sources: migrations: 2026-01-17-000001_CreateInvestmentSignalsTables.php | code: app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:32, app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:63, app/Models/SignalFilesModel.php:9
CREATE TABLE IF NOT EXISTS `bf_investment_signal_files` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `week_key` VARCHAR(8) NOT NULL,
  `file_date` DATE NULL,
  `file_path` VARCHAR(255) NOT NULL,
  `file_name` VARCHAR(190) NOT NULL,
  `category` VARCHAR(64) NULL,
  `signal_type` VARCHAR(64) NULL,
  `file_hash` CHAR(64) NOT NULL,
  `rows_total` INT UNSIGNED NOT NULL DEFAULT 0,
  `rows_inserted` INT UNSIGNED NOT NULL DEFAULT 0,
  `rows_skipped` INT UNSIGNED NOT NULL DEFAULT 0,
  `processed_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_signal_file_path_hash` (`file_path`, `file_hash`),
  KEY `week_key` (`week_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND column_name = 'week_key');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD COLUMN `week_key` VARCHAR(8) NOT NULL', 'SELECT ''column week_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND column_name = 'file_date');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD COLUMN `file_date` DATE NULL', 'SELECT ''column file_date already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND column_name = 'file_path');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD COLUMN `file_path` VARCHAR(255) NOT NULL', 'SELECT ''column file_path already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND column_name = 'file_name');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD COLUMN `file_name` VARCHAR(190) NOT NULL', 'SELECT ''column file_name already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND column_name = 'category');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD COLUMN `category` VARCHAR(64) NULL', 'SELECT ''column category already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND column_name = 'signal_type');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD COLUMN `signal_type` VARCHAR(64) NULL', 'SELECT ''column signal_type already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND column_name = 'file_hash');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD COLUMN `file_hash` CHAR(64) NOT NULL', 'SELECT ''column file_hash already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND column_name = 'rows_total');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD COLUMN `rows_total` INT UNSIGNED NOT NULL DEFAULT 0', 'SELECT ''column rows_total already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND column_name = 'rows_inserted');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD COLUMN `rows_inserted` INT UNSIGNED NOT NULL DEFAULT 0', 'SELECT ''column rows_inserted already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND column_name = 'rows_skipped');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD COLUMN `rows_skipped` INT UNSIGNED NOT NULL DEFAULT 0', 'SELECT ''column rows_skipped already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND column_name = 'processed_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD COLUMN `processed_at` DATETIME NULL', 'SELECT ''column processed_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND index_name = 'week_key');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD INDEX `week_key` (`week_key`)', 'SELECT ''index week_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files' AND index_name = 'uq_signal_file_path_hash');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_investment_signal_files` ADD UNIQUE INDEX `uq_signal_file_path_hash` (`file_path`, `file_hash`)', 'SELECT ''index uq_signal_file_path_hash already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_investment_signal_files`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signal_files'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

