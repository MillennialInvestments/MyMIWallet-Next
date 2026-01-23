-- Table: bf_aiops_usage
-- Sources: code: app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:39, app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:39, app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:40, app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:53, app/Database/Migrations/2026-01-15-000100_AddChatAndAiOpsUsageTables.php:54, app/Modules/AIOps/Models/AIOpsUsageModel.php:9, docs/aiops-budgeting.md:13, docs/aiops-budgeting.md:27, docs/ops/n8n-capabilities-for-mymiwallet.md:55, docs/ops/n8n-capabilities-for-mymiwallet.md:60, docs/ops/n8n-capabilities-for-mymiwallet.md:61, docs/ops/aiops-schema-endpoints-spec.md:7, docs/ops/aiops-schema-endpoints-spec.md:138, docs/ai-cost-controls.md:10, docs/ai-cost-controls.md:31, docs/emergency-playbook.md:18
CREATE TABLE IF NOT EXISTS `bf_aiops_usage` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_usage' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_aiops_usage` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_aiops_usage`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_usage'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_usage'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

