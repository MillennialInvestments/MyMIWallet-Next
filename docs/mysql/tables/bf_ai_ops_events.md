-- Table: bf_ai_ops_events
-- Sources: migrations: 2026-01-01-000001_CreateAiOpsTables.php | code: app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:62, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:74, app/Database/Migrations/2026-01-01-000001_CreateAiOpsTables.php:90, app/Libraries/AiOps/AiOpsManager.php:229, app/Libraries/AiOps/AiOpsManager.php:242, app/Libraries/AiOps/AiOpsManager.php:373, app/Libraries/AiOps/AiOpsManager.php:386, docs/ai-ops/observability-policy.md:6
CREATE TABLE IF NOT EXISTS `bf_ai_ops_events` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `subsystem` VARCHAR(64) NOT NULL,
  `event_type` VARCHAR(64) NOT NULL,
  `message` TEXT NULL,
  `meta_json` LONGTEXT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subsystem_created_at` (`subsystem`, `created_at`),
  KEY `event_type_created_at` (`event_type`, `created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_events' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_events` ADD COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_events' AND column_name = 'subsystem');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_events` ADD COLUMN `subsystem` VARCHAR(64) NOT NULL', 'SELECT ''column subsystem already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_events' AND column_name = 'event_type');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_events` ADD COLUMN `event_type` VARCHAR(64) NOT NULL', 'SELECT ''column event_type already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_events' AND column_name = 'message');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_events` ADD COLUMN `message` TEXT NULL', 'SELECT ''column message already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_events' AND column_name = 'meta_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_events` ADD COLUMN `meta_json` LONGTEXT NULL', 'SELECT ''column meta_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_events' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ai_ops_events` ADD COLUMN `created_at` DATETIME NOT NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_events' AND index_name = 'subsystem_created_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ai_ops_events` ADD INDEX `subsystem_created_at` (`subsystem`, `created_at`)', 'SELECT ''index subsystem_created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_events' AND index_name = 'event_type_created_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_ai_ops_events` ADD INDEX `event_type_created_at` (`event_type`, `created_at`)', 'SELECT ''index event_type_created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_ai_ops_events`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_events'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ai_ops_events'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

