-- Table: bf_investment_signals
-- Sources: migrations: 2026-01-17-000001_CreateInvestmentSignalsTables.php | code: app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:57, app/Database/Migrations/2026-01-17-000001_CreateInvestmentSignalsTables.php:62, app/Models/SignalsModel.php:9
CREATE TABLE IF NOT EXISTS `bf_investment_signals` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `week_key` VARCHAR(8) NOT NULL,
  `signal_date` DATE NULL,
  `symbol` VARCHAR(16) NOT NULL,
  `category` VARCHAR(64) NOT NULL,
  `signal_type` VARCHAR(64) NOT NULL,
  `source` VARCHAR(32) NOT NULL DEFAULT 'csv',
  `source_file` VARCHAR(255) NULL,
  `row_hash` CHAR(64) NOT NULL,
  `score` INT UNSIGNED NOT NULL DEFAULT 50,
  `appearances` INT UNSIGNED NOT NULL DEFAULT 1,
  `metrics_json` TEXT NULL,
  `status` VARCHAR(16) NOT NULL DEFAULT 'new',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_signal_row` (`source_file`, `row_hash`),
  KEY `week_key_symbol` (`week_key`, `symbol`),
  KEY `category_signal_type` (`category`, `signal_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND column_name = 'week_key');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD COLUMN `week_key` VARCHAR(8) NOT NULL', 'SELECT ''column week_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND column_name = 'signal_date');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD COLUMN `signal_date` DATE NULL', 'SELECT ''column signal_date already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND column_name = 'symbol');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD COLUMN `symbol` VARCHAR(16) NOT NULL', 'SELECT ''column symbol already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND column_name = 'category');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD COLUMN `category` VARCHAR(64) NOT NULL', 'SELECT ''column category already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND column_name = 'signal_type');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD COLUMN `signal_type` VARCHAR(64) NOT NULL', 'SELECT ''column signal_type already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND column_name = 'source');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD COLUMN `source` VARCHAR(32) NOT NULL DEFAULT ''csv''', 'SELECT ''column source already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND column_name = 'source_file');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD COLUMN `source_file` VARCHAR(255) NULL', 'SELECT ''column source_file already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND column_name = 'row_hash');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD COLUMN `row_hash` CHAR(64) NOT NULL', 'SELECT ''column row_hash already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND column_name = 'score');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD COLUMN `score` INT UNSIGNED NOT NULL DEFAULT 50', 'SELECT ''column score already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND column_name = 'appearances');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD COLUMN `appearances` INT UNSIGNED NOT NULL DEFAULT 1', 'SELECT ''column appearances already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND column_name = 'metrics_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD COLUMN `metrics_json` TEXT NULL', 'SELECT ''column metrics_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD COLUMN `status` VARCHAR(16) NOT NULL DEFAULT ''new''', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND index_name = 'week_key_symbol');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD INDEX `week_key_symbol` (`week_key`, `symbol`)', 'SELECT ''index week_key_symbol already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND index_name = 'category_signal_type');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD INDEX `category_signal_type` (`category`, `signal_type`)', 'SELECT ''index category_signal_type already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals' AND index_name = 'uq_signal_row');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_investment_signals` ADD UNIQUE INDEX `uq_signal_row` (`source_file`, `row_hash`)', 'SELECT ''index uq_signal_row already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_investment_signals`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_signals'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

