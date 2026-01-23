-- Table: bf_ops_queue
-- Sources: migrations: 2026-01-15-000100_CreateOpsFoundation.php | code: app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:36, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:52, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:112, app/Models/OpsQueueModel.php:12, app/Libraries/Ops/OpsJobRegistry.php:492, app/Libraries/Ops/OpsJobRegistry.php:502, docs/codex/02_pr2_worker_and_registry.md:71, docs/codex/01_pr1_foundations.md:37, docs/codex/01_pr1_foundations.md:86, docs/codex/01_pr1_foundations.md:123, docs/codex/01_pr1_foundations.md:144, docs/ops/n8n_responsibilities.md:81, docs/health/modules/system_ops.md:62, docs/health/health_test_checklist.md:644
CREATE TABLE IF NOT EXISTS `bf_ops_queue` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_key` VARCHAR(150) NOT NULL,
  `payload_json` LONGTEXT NULL,
  `status` VARCHAR(50) NOT NULL DEFAULT 'pending',
  `attempts` INT(11) NOT NULL DEFAULT 0,
  `locked_until` DATETIME NULL,
  `last_error` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `job_key` (`job_key`),
  KEY `locked_until` (`locked_until`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_queue` ADD COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue' AND column_name = 'job_key');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_queue` ADD COLUMN `job_key` VARCHAR(150) NOT NULL', 'SELECT ''column job_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue' AND column_name = 'payload_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_queue` ADD COLUMN `payload_json` LONGTEXT NULL', 'SELECT ''column payload_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_queue` ADD COLUMN `status` VARCHAR(50) NOT NULL DEFAULT ''pending''', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue' AND column_name = 'attempts');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_queue` ADD COLUMN `attempts` INT(11) NOT NULL DEFAULT 0', 'SELECT ''column attempts already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue' AND column_name = 'locked_until');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_queue` ADD COLUMN `locked_until` DATETIME NULL', 'SELECT ''column locked_until already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue' AND column_name = 'last_error');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_queue` ADD COLUMN `last_error` LONGTEXT NULL', 'SELECT ''column last_error already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_queue` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_queue` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue' AND index_name = 'status');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ops_queue` ADD INDEX `status` (`status`)', 'SELECT ''index status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue' AND index_name = 'job_key');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ops_queue` ADD INDEX `job_key` (`job_key`)', 'SELECT ''index job_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue' AND index_name = 'locked_until');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ops_queue` ADD INDEX `locked_until` (`locked_until`)', 'SELECT ''index locked_until already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_ops_queue`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_queue'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

