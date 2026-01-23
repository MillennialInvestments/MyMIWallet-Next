-- Table: bf_chat_tool_runs
-- Sources: migrations: 2026-01-15-000100_CreateChatToolRuns.php | code: app/Database/Migrations/2026-01-15-000100_CreateChatToolRuns.php:26, app/Database/Migrations/2026-01-15-000100_CreateChatToolRuns.php:31, app/Models/ChatToolRunModel.php:11, docs/chat/DEPLOYMENT.md:24, docs/chat/README.md:31, docs/chat/OPS.md:14, docs/chat/ARCHITECTURE.md:21, docs/chat/CI4_INTEGRATION.md:56, docs/chat/CI4_INTEGRATION.md:61
CREATE TABLE IF NOT EXISTS `bf_chat_tool_runs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `mode` VARCHAR(25) NOT NULL,
  `tool` VARCHAR(100) NOT NULL,
  `request_json` LONGTEXT NULL,
  `response_json` LONGTEXT NULL,
  `status` VARCHAR(20) NOT NULL DEFAULT 'success',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_tool` (`user_id`, `tool`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_tool_runs' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_tool_runs` ADD COLUMN `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_tool_runs' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_tool_runs` ADD COLUMN `user_id` BIGINT UNSIGNED NOT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_tool_runs' AND column_name = 'mode');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_tool_runs` ADD COLUMN `mode` VARCHAR(25) NOT NULL', 'SELECT ''column mode already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_tool_runs' AND column_name = 'tool');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_tool_runs` ADD COLUMN `tool` VARCHAR(100) NOT NULL', 'SELECT ''column tool already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_tool_runs' AND column_name = 'request_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_tool_runs` ADD COLUMN `request_json` LONGTEXT NULL', 'SELECT ''column request_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_tool_runs' AND column_name = 'response_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_tool_runs` ADD COLUMN `response_json` LONGTEXT NULL', 'SELECT ''column response_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_tool_runs' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_tool_runs` ADD COLUMN `status` VARCHAR(20) NOT NULL DEFAULT ''success''', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_tool_runs' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_tool_runs` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_chat_tool_runs' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_chat_tool_runs` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_chat_tool_runs' AND index_name = 'user_id_tool');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_chat_tool_runs` ADD INDEX `user_id_tool` (`user_id`, `tool`)', 'SELECT ''index user_id_tool already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_chat_tool_runs`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_chat_tool_runs'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_chat_tool_runs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

