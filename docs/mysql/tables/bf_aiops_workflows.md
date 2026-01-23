-- Table: bf_aiops_workflows
-- Sources: code: app/Modules/AIOps/Models/AIOpsWorkflowsModel.php:9, docs/ops/n8n-capabilities-for-mymiwallet.md:56, docs/ops/n8n-capabilities-for-mymiwallet.md:62, docs/ops/n8n-capabilities-for-mymiwallet.md:63, docs/ops/aiops-schema-endpoints-spec.md:38
-- Suspected columns: enabled, slug
CREATE TABLE IF NOT EXISTS `bf_aiops_workflows` (
  `enabled` TEXT NULL,
  `slug` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflows' AND column_name = 'enabled');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_aiops_workflows` ADD COLUMN `enabled` TEXT NULL', 'SELECT ''column enabled already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflows' AND column_name = 'slug');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_aiops_workflows` ADD COLUMN `slug` TEXT NULL', 'SELECT ''column slug already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_aiops_workflows`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflows'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_workflows'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

