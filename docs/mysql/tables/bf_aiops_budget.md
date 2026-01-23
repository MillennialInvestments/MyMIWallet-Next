-- Table: bf_aiops_budget
-- Sources: code: app/Modules/AIOps/Models/AIOpsBudgetModel.php:9, docs/ops/n8n-capabilities-for-mymiwallet.md:57, docs/ops/n8n-capabilities-for-mymiwallet.md:60, docs/ops/n8n-capabilities-for-mymiwallet.md:61, docs/ops/aiops-schema-endpoints-spec.md:25, docs/ops/aiops-schema-endpoints-spec.md:139
-- Suspected columns: used_usd
CREATE TABLE IF NOT EXISTS `bf_aiops_budget` (
  `used_usd` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_budget' AND column_name = 'used_usd');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_aiops_budget` ADD COLUMN `used_usd` TEXT NULL', 'SELECT ''column used_usd already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_aiops_budget`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_budget'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_budget'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

