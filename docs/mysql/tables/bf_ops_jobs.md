-- Table: bf_ops_jobs
-- Sources: migrations: 2026-01-15-000100_CreateOpsFoundation.php | code: app/Database/Seeds/OpsJobsSeeder.php:93, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:19, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:34, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:113, app/Models/OpsJobsModel.php:11, docs/codex/01_pr1_foundations.md:14, docs/codex/01_pr1_foundations.md:26, docs/codex/01_pr1_foundations.md:67, docs/health/modules/system_ops.md:62, docs/health/health_test_checklist.md:644
CREATE TABLE IF NOT EXISTS `bf_ops_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_key` VARCHAR(150) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `handler` VARCHAR(255) NULL,
  `max_attempts` INT(11) NOT NULL DEFAULT 3,
  `is_enabled` TINYINT(1) NOT NULL DEFAULT 1,
  `last_run_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_key` (`job_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_jobs' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_jobs` ADD COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_jobs' AND column_name = 'job_key');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_jobs` ADD COLUMN `job_key` VARCHAR(150) NOT NULL', 'SELECT ''column job_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_jobs' AND column_name = 'name');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_jobs` ADD COLUMN `name` VARCHAR(255) NOT NULL', 'SELECT ''column name already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_jobs' AND column_name = 'description');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_jobs` ADD COLUMN `description` TEXT NULL', 'SELECT ''column description already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_jobs' AND column_name = 'handler');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_jobs` ADD COLUMN `handler` VARCHAR(255) NULL', 'SELECT ''column handler already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_jobs' AND column_name = 'max_attempts');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_jobs` ADD COLUMN `max_attempts` INT(11) NOT NULL DEFAULT 3', 'SELECT ''column max_attempts already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_jobs' AND column_name = 'is_enabled');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_jobs` ADD COLUMN `is_enabled` TINYINT(1) NOT NULL DEFAULT 1', 'SELECT ''column is_enabled already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_jobs' AND column_name = 'last_run_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_jobs` ADD COLUMN `last_run_at` DATETIME NULL', 'SELECT ''column last_run_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_jobs' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_jobs` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_jobs' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_jobs` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ops_jobs' AND index_name = 'job_key');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ops_jobs` ADD UNIQUE INDEX `job_key` (`job_key`)', 'SELECT ''index job_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_ops_jobs`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_jobs'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_jobs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

