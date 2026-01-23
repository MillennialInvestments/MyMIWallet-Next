-- Table: bf_aiops_workflow_usage
-- Sources: migrations: 2026-01-15-000100_AddChatAndAiOpsUsageTables.php | code: app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:26, app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:36, app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:57, app/Modules/AIOps/Models/AIOpsWorkflowUsageModel.php:9, docs/aiops-budgeting.md:12, docs/aiops-budgeting.md:27, docs/ai-cost-controls.md:10, docs/ai-cost-controls.md:31, docs/ai-cost-controls.md:42, docs/emergency-playbook.md:18
CREATE TABLE IF NOT EXISTS `bf_aiops_workflow_usage` (
  `workflow_id` VARCHAR(64) NOT NULL,
  `workflow_slug` VARCHAR(190) NULL,
  `month` CHAR(7) NOT NULL,
  `usd_used` DECIMAL(10,4) NOT NULL DEFAULT 0,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`workflow_id`, `month`),
  KEY `workflow_slug` (`workflow_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflow_usage' AND column_name = 'workflow_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_aiops_workflow_usage` ADD COLUMN `workflow_id` VARCHAR(64) NOT NULL', 'SELECT ''column workflow_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflow_usage' AND column_name = 'workflow_slug');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_aiops_workflow_usage` ADD COLUMN `workflow_slug` VARCHAR(190) NULL', 'SELECT ''column workflow_slug already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflow_usage' AND column_name = 'month');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_aiops_workflow_usage` ADD COLUMN `month` CHAR(7) NOT NULL', 'SELECT ''column month already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflow_usage' AND column_name = 'usd_used');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_aiops_workflow_usage` ADD COLUMN `usd_used` DECIMAL(10,4) NOT NULL DEFAULT 0', 'SELECT ''column usd_used already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflow_usage' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_aiops_workflow_usage` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflow_usage' AND index_name = 'workflow_slug');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_aiops_workflow_usage` ADD INDEX `workflow_slug` (`workflow_slug`)', 'SELECT ''index workflow_slug already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_aiops_workflow_usage`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflow_usage'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflow_usage'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

