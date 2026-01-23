-- Table: bf_ai_usage
-- Sources: migrations: 2026-01-15-000100_CreateOpsFoundation.php | code: app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:89, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:104, app/Database/Migrations/2026-01-15-000100_CreateOpsFoundation.php:109, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:24, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:64, app/Models/AiUsageModel.php:11, docs/codex/01_pr1_foundations.md:57, docs/ops/n8n_responsibilities.md:83
CREATE TABLE IF NOT EXISTS `bf_ai_usage` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `subsystem` VARCHAR(150) NOT NULL,
  `action` VARCHAR(150) NULL,
  `user_id` BIGINT UNSIGNED NULL,
  `tokens_prompt` INT(11) NOT NULL DEFAULT 0,
  `tokens_completion` INT(11) NOT NULL DEFAULT 0,
  `cost_usd` DECIMAL(10,4) NOT NULL DEFAULT 0.0000,
  `meta_json` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `subsystem` (`subsystem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_usage' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_usage` ADD COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_usage' AND column_name = 'subsystem');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_usage` ADD COLUMN `subsystem` VARCHAR(150) NOT NULL', 'SELECT ''column subsystem already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_usage' AND column_name = 'action');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_usage` ADD COLUMN `action` VARCHAR(150) NULL', 'SELECT ''column action already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_usage' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_usage` ADD COLUMN `user_id` BIGINT UNSIGNED NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_usage' AND column_name = 'tokens_prompt');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_usage` ADD COLUMN `tokens_prompt` INT(11) NOT NULL DEFAULT 0', 'SELECT ''column tokens_prompt already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_usage' AND column_name = 'tokens_completion');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_usage` ADD COLUMN `tokens_completion` INT(11) NOT NULL DEFAULT 0', 'SELECT ''column tokens_completion already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_usage' AND column_name = 'cost_usd');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_usage` ADD COLUMN `cost_usd` DECIMAL(10,4) NOT NULL DEFAULT 0.0000', 'SELECT ''column cost_usd already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_usage' AND column_name = 'meta_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_usage` ADD COLUMN `meta_json` LONGTEXT NULL', 'SELECT ''column meta_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_usage' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_usage` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_usage' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_usage` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ai_usage' AND index_name = 'subsystem');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ai_usage` ADD INDEX `subsystem` (`subsystem`)', 'SELECT ''index subsystem already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_ai_usage`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_usage'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_usage'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

