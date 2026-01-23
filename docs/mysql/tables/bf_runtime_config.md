-- Table: bf_runtime_config
-- Sources: migrations: 2026-01-15-000100_CreateOpsFoundation.php | code: app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:77, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:87, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:110, app/Models/RuntimeConfigModel.php:11, docs/codex/01_pr1_foundations.md:49, docs/ops/n8n_responsibilities.md:80
CREATE TABLE IF NOT EXISTS `bf_runtime_config` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `config_key` VARCHAR(191) NOT NULL,
  `config_value` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `config_key` (`config_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_runtime_config' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_runtime_config` ADD COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_runtime_config' AND column_name = 'config_key');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_runtime_config` ADD COLUMN `config_key` VARCHAR(191) NOT NULL', 'SELECT ''column config_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_runtime_config' AND column_name = 'config_value');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_runtime_config` ADD COLUMN `config_value` LONGTEXT NULL', 'SELECT ''column config_value already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_runtime_config' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_runtime_config` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_runtime_config' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_runtime_config` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_runtime_config' AND index_name = 'config_key');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_runtime_config` ADD INDEX `config_key` (`config_key`)', 'SELECT ''index config_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_runtime_config`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_runtime_config'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_runtime_config'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

