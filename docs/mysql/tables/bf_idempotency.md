-- Table: bf_idempotency
-- Sources: code: app/Models/IdempotencyModel.php:8, docs/gap-audit/next-steps.md:67, docs/ops/runbooks/marketing-cron-playbook.md:23, docs/ops/runbooks/marketing-cron-playbook.md:30, docs/operations/04-cron-automation.md:15, docs/operations/04-cron-automation.md:15, docs/operations/04-cron-automation.md:16, docs/operations/04-cron-automation.md:24, docs/operations/04-cron-automation.md:36, docs/operations/04-cron-automation.md:50
-- Suspected columns: response_json
CREATE TABLE IF NOT EXISTS `bf_idempotency` (
  `response_json` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_idempotency' AND column_name = 'response_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_idempotency` ADD COLUMN `response_json` TEXT NULL', 'SELECT ''column response_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_idempotency`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_idempotency'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_idempotency'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

