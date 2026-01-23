-- Table: bf_auth_health_runs
-- Sources: migrations: 2026-02-25-000001_CreateAuthHealthRuns.php | code: app/Database/Migrations/2026-02-25-000001_CreateAuthHealthRuns.php:33, app/Database/Migrations/2026-02-25-000001_CreateAuthHealthRuns.php:38, app/Models/AuthHealthRunModel.php:11, docs/auth/auth_smoke.md:4, docs/auth/auth_smoke.md:8, docs/auth/auth_smoke.md:49
CREATE TABLE IF NOT EXISTS `bf_auth_health_runs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `run_at` DATETIME NOT NULL,
  `status` VARCHAR(10) NOT NULL,
  `score` INT(11) NOT NULL DEFAULT 0,
  `summary` VARCHAR(255) NOT NULL,
  `details_json` LONGTEXT NULL,
  `duration_ms` INT(11) NOT NULL DEFAULT 0,
  `server` VARCHAR(64) NOT NULL,
  `build_tag` VARCHAR(64) NULL,
  PRIMARY KEY (`id`),
  KEY `run_at` (`run_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_auth_health_runs' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_auth_health_runs` ADD COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_auth_health_runs' AND column_name = 'run_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_auth_health_runs` ADD COLUMN `run_at` DATETIME NOT NULL', 'SELECT ''column run_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_auth_health_runs' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_auth_health_runs` ADD COLUMN `status` VARCHAR(10) NOT NULL', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_auth_health_runs' AND column_name = 'score');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_auth_health_runs` ADD COLUMN `score` INT(11) NOT NULL DEFAULT 0', 'SELECT ''column score already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_auth_health_runs' AND column_name = 'summary');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_auth_health_runs` ADD COLUMN `summary` VARCHAR(255) NOT NULL', 'SELECT ''column summary already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_auth_health_runs' AND column_name = 'details_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_auth_health_runs` ADD COLUMN `details_json` LONGTEXT NULL', 'SELECT ''column details_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_auth_health_runs' AND column_name = 'duration_ms');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_auth_health_runs` ADD COLUMN `duration_ms` INT(11) NOT NULL DEFAULT 0', 'SELECT ''column duration_ms already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_auth_health_runs' AND column_name = 'server');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_auth_health_runs` ADD COLUMN `server` VARCHAR(64) NOT NULL', 'SELECT ''column server already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_auth_health_runs' AND column_name = 'build_tag');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_auth_health_runs` ADD COLUMN `build_tag` VARCHAR(64) NULL', 'SELECT ''column build_tag already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_auth_health_runs' AND index_name = 'run_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_auth_health_runs` ADD INDEX `run_at` (`run_at`)', 'SELECT ''index run_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_auth_health_runs`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_auth_health_runs'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_auth_health_runs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

