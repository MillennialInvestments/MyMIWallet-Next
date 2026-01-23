-- Table: bf_ai_ops_usage
-- Sources: migrations: 2026-01-01-000001_CreateAiOpsTables.php | code: app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:45, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:60, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:91, app/Libraries/AiOps/AiOpsManager.php:181, app/Libraries/AiOps/AiOpsManager.php:281, app/Libraries/AiOps/AiOpsManager.php:310, app/Libraries/AiOps/AiOpsManager.php:315, app/Libraries/AiOps/AiOpsManager.php:385, docs/ai-ops/README.md:52, docs/ai-ops/observability-policy.md:11, docs/aiops/README.md:9
CREATE TABLE IF NOT EXISTS `bf_ai_ops_usage` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `month_key` CHAR(7) NOT NULL,
  `subsystem` VARCHAR(64) NOT NULL,
  `runs` INT NOT NULL DEFAULT 0,
  `runtime_seconds` INT NOT NULL DEFAULT 0,
  `requests` INT NOT NULL DEFAULT 0,
  `cache_hits` INT NOT NULL DEFAULT 0,
  `errors` INT NOT NULL DEFAULT 0,
  `capacity_used` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `month_key_subsystem` (`month_key`, `subsystem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_usage` ADD COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage' AND column_name = 'month_key');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_usage` ADD COLUMN `month_key` CHAR(7) NOT NULL', 'SELECT ''column month_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage' AND column_name = 'subsystem');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_usage` ADD COLUMN `subsystem` VARCHAR(64) NOT NULL', 'SELECT ''column subsystem already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage' AND column_name = 'runs');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_usage` ADD COLUMN `runs` INT NOT NULL DEFAULT 0', 'SELECT ''column runs already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage' AND column_name = 'runtime_seconds');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_usage` ADD COLUMN `runtime_seconds` INT NOT NULL DEFAULT 0', 'SELECT ''column runtime_seconds already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage' AND column_name = 'requests');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_usage` ADD COLUMN `requests` INT NOT NULL DEFAULT 0', 'SELECT ''column requests already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage' AND column_name = 'cache_hits');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_usage` ADD COLUMN `cache_hits` INT NOT NULL DEFAULT 0', 'SELECT ''column cache_hits already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage' AND column_name = 'errors');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_usage` ADD COLUMN `errors` INT NOT NULL DEFAULT 0', 'SELECT ''column errors already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage' AND column_name = 'capacity_used');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_usage` ADD COLUMN `capacity_used` DECIMAL(10,2) NOT NULL DEFAULT 0', 'SELECT ''column capacity_used already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_usage` ADD COLUMN `updated_at` DATETIME NOT NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage' AND index_name = 'month_key_subsystem');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ai_ops_usage` ADD UNIQUE INDEX `month_key_subsystem` (`month_key`, `subsystem`)', 'SELECT ''index month_key_subsystem already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_ai_ops_usage`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_usage'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

