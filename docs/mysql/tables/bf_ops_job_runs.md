-- Table: bf_ops_job_runs
-- Sources: migrations: 2026-01-15-000100_CreateOpsFoundation.php, 2026-01-21-000110_AddOutputTextToOpsRuns.php | code: app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:54, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:75, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:111, app/Database/Migrations/2026-01-21-000110_AddOutputTextToOpsRuns.php:13, app/Database/Migrations/2026-01-21-000110_AddOutputTextToOpsRuns.php:25, app/Database/Migrations/2026-01-21-000110_AddOutputTextToOpsRuns.php:30, app/Database/Migrations/2026-01-21-000110_AddOutputTextToOpsRuns.php:34, app/Database/Migrations/2026-01-21-000110_AddOutputTextToOpsRuns.php:35, app/Models/OpsRunsModel.php:11, app/Libraries/Ops/OpsJobRegistry.php:492, app/Libraries/Ops/OpsJobRegistry.php:509, docs/codex/02_pr2_worker_and_registry.md:7, docs/codex/02_pr2_worker_and_registry.md:20, docs/codex/02_pr2_worker_and_registry.md:72, docs/codex/01_pr1_foundations.md:24, docs/codex/03_pr3_management_ui.md:39, docs/ops/n8n_responsibilities.md:82
CREATE TABLE IF NOT EXISTS `bf_ops_job_runs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_id` BIGINT UNSIGNED NOT NULL,
  `queue_id` BIGINT UNSIGNED NULL,
  `status` VARCHAR(50) NOT NULL DEFAULT 'running',
  `attempts` INT(11) NOT NULL DEFAULT 0,
  `payload_json` LONGTEXT NULL,
  `result_json` LONGTEXT NULL,
  `output_json` LONGTEXT NULL,
  `output_text` LONGTEXT NULL,
  `last_error` LONGTEXT NULL,
  `started_at` DATETIME NULL,
  `finished_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `job_id` (`job_id`),
  KEY `status` (`status`),
  KEY `started_at` (`started_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND column_name = 'job_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD COLUMN `job_id` BIGINT UNSIGNED NOT NULL', 'SELECT ''column job_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND column_name = 'queue_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD COLUMN `queue_id` BIGINT UNSIGNED NULL', 'SELECT ''column queue_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD COLUMN `status` VARCHAR(50) NOT NULL DEFAULT ''running''', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND column_name = 'attempts');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD COLUMN `attempts` INT(11) NOT NULL DEFAULT 0', 'SELECT ''column attempts already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND column_name = 'payload_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD COLUMN `payload_json` LONGTEXT NULL', 'SELECT ''column payload_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND column_name = 'result_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD COLUMN `result_json` LONGTEXT NULL', 'SELECT ''column result_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND column_name = 'output_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD COLUMN `output_json` LONGTEXT NULL', 'SELECT ''column output_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND column_name = 'output_text');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD COLUMN `output_text` LONGTEXT NULL', 'SELECT ''column output_text already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND column_name = 'last_error');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD COLUMN `last_error` LONGTEXT NULL', 'SELECT ''column last_error already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND column_name = 'started_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD COLUMN `started_at` DATETIME NULL', 'SELECT ''column started_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND column_name = 'finished_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD COLUMN `finished_at` DATETIME NULL', 'SELECT ''column finished_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND index_name = 'job_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD INDEX `job_id` (`job_id`)', 'SELECT ''index job_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND index_name = 'status');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD INDEX `status` (`status`)', 'SELECT ''index status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs' AND index_name = 'started_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ops_job_runs` ADD INDEX `started_at` (`started_at`)', 'SELECT ''index started_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_ops_job_runs`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_job_runs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

