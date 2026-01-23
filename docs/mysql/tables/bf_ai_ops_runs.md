-- Table: bf_ai_ops_runs
-- Sources: migrations: 2026-01-01-000001_CreateAiOpsTables.php | code: app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:26, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:43, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:92, app/Libraries/AiOps/AiOpsManager.php:92, app/Libraries/AiOps/AiOpsManager.php:111, app/Libraries/AiOps/AiOpsManager.php:121, app/Libraries/AiOps/AiOpsManager.php:216, app/Libraries/AiOps/AiOpsManager.php:384, docs/aiops/README.md:9
CREATE TABLE IF NOT EXISTS `bf_ai_ops_runs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_key` VARCHAR(64) NOT NULL,
  `subsystem` VARCHAR(64) NOT NULL,
  `status` VARCHAR(16) NOT NULL,
  `started_at` DATETIME NOT NULL,
  `finished_at` DATETIME NULL,
  `runtime_seconds` INT NULL,
  `message` TEXT NULL,
  `meta_json` LONGTEXT NULL,
  `created_by` BIGINT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `job_key_started_at` (`job_key`, `started_at`),
  KEY `subsystem_started_at` (`subsystem`, `started_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_runs` ADD COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs' AND column_name = 'job_key');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_runs` ADD COLUMN `job_key` VARCHAR(64) NOT NULL', 'SELECT ''column job_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs' AND column_name = 'subsystem');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_runs` ADD COLUMN `subsystem` VARCHAR(64) NOT NULL', 'SELECT ''column subsystem already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_runs` ADD COLUMN `status` VARCHAR(16) NOT NULL', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs' AND column_name = 'started_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_runs` ADD COLUMN `started_at` DATETIME NOT NULL', 'SELECT ''column started_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs' AND column_name = 'finished_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_runs` ADD COLUMN `finished_at` DATETIME NULL', 'SELECT ''column finished_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs' AND column_name = 'runtime_seconds');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_runs` ADD COLUMN `runtime_seconds` INT NULL', 'SELECT ''column runtime_seconds already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs' AND column_name = 'message');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_runs` ADD COLUMN `message` TEXT NULL', 'SELECT ''column message already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs' AND column_name = 'meta_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_runs` ADD COLUMN `meta_json` LONGTEXT NULL', 'SELECT ''column meta_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs' AND column_name = 'created_by');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_runs` ADD COLUMN `created_by` BIGINT NULL', 'SELECT ''column created_by already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_runs` ADD COLUMN `created_at` DATETIME NOT NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs' AND index_name = 'job_key_started_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ai_ops_runs` ADD INDEX `job_key_started_at` (`job_key`, `started_at`)', 'SELECT ''index job_key_started_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs' AND index_name = 'subsystem_started_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ai_ops_runs` ADD INDEX `subsystem_started_at` (`subsystem`, `started_at`)', 'SELECT ''index subsystem_started_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_ai_ops_runs`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_runs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

