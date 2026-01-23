-- Table: bf_ops_command_inbox
-- Sources: code: app/Models/OpsCommandInboxModel.php:9, app/Commands/OpsFetchCommands.php:13, docs/ops/control_plane_assumptions.md:27, docs/cron/jobs/ops_fetch_commands.md:4, docs/cron/jobs/ops_analyze_commands.md:17, docs/sql/mysql.md:51, docs/sql/mysql.md:53
-- Suspected columns: ai_summary
CREATE TABLE IF NOT EXISTS `bf_ops_command_inbox` (
  `ai_summary` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox' AND column_name = 'ai_summary');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_ops_command_inbox` ADD COLUMN `ai_summary` TEXT NULL', 'SELECT ''column ai_summary already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_ops_command_inbox`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

