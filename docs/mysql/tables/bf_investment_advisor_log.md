-- Table: bf_investment_advisor_log
-- Sources: code: app/Libraries/MyMIAdvisor.php:32, app/Libraries/MyMIAdvisor.php:67, app/Libraries/MyMIAdvisor.php:561, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:83, docs/functional_inventory/docs_to_code_map.md:87, docs/operations/02-libraries.md:23, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:39, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:42, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:59, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:96, docs/notes/2025-11-23-alerts-preview-lazy-refresh-and-advisor-errors.md:102
-- Suspected columns: voiceover_error
CREATE TABLE IF NOT EXISTS `bf_investment_advisor_log` (
  `voiceover_error` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_advisor_log' AND column_name = 'voiceover_error');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_advisor_log` ADD COLUMN `voiceover_error` TEXT NULL', 'SELECT ''column voiceover_error already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_investment_advisor_log`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_advisor_log'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_advisor_log'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

