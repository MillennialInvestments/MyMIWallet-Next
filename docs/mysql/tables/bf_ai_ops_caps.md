-- Table: bf_ai_ops_caps
-- Sources: migrations: 2026-01-01-000001_CreateAiOpsTables.php | code: app/Database/Seeds/AiOpsSeeder.php:12, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:11, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:24, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:93, app/Modules/APIs/Controllers/AiOpsController.php:26, app/Modules/APIs/Controllers/AiOpsController.php:26, app/Commands/AiOpsSeed.php:19, app/Libraries/AiOps/AiOpsManager.php:180, app/Libraries/AiOps/AiOpsManager.php:265, app/Libraries/AiOps/AiOpsManager.php:383, docs/ai-ops/README.md:33, docs/ai-ops/README.md:52, docs/ai-ops/cost-budget.md:23, docs/ai-ops/observability-policy.md:13
CREATE TABLE IF NOT EXISTS `bf_ai_ops_caps` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `subsystem` VARCHAR(64) NOT NULL,
  `cap_type` VARCHAR(24) NOT NULL DEFAULT 'CAPACITY',
  `cap_value` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `reset_period` VARCHAR(16) NOT NULL DEFAULT 'MONTHLY',
  `is_enabled` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subsystem` (`subsystem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_caps' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_caps` ADD COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_caps' AND column_name = 'subsystem');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_caps` ADD COLUMN `subsystem` VARCHAR(64) NOT NULL', 'SELECT ''column subsystem already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_caps' AND column_name = 'cap_type');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_caps` ADD COLUMN `cap_type` VARCHAR(24) NOT NULL DEFAULT ''CAPACITY''', 'SELECT ''column cap_type already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_caps' AND column_name = 'cap_value');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_caps` ADD COLUMN `cap_value` DECIMAL(10,2) NOT NULL DEFAULT 0', 'SELECT ''column cap_value already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_caps' AND column_name = 'reset_period');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_caps` ADD COLUMN `reset_period` VARCHAR(16) NOT NULL DEFAULT ''MONTHLY''', 'SELECT ''column reset_period already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_caps' AND column_name = 'is_enabled');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_caps` ADD COLUMN `is_enabled` TINYINT(1) NOT NULL DEFAULT 1', 'SELECT ''column is_enabled already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_caps' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_caps` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_caps' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_caps` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_caps' AND index_name = 'subsystem');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ai_ops_caps` ADD UNIQUE INDEX `subsystem` (`subsystem`)', 'SELECT ''index subsystem already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_ai_ops_caps`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_caps'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_caps'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

