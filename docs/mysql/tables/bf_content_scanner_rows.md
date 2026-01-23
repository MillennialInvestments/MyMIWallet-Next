-- Table: bf_content_scanner_rows
-- Sources: code: app/Models/ContentScannerRowModel.php:11, docs/content_engine/sql_patch_notes.md:7, docs/content_engine/security.md:6, docs/content_engine/json_contract.md:37, docs/content_engine/troubleshooting.md:15
-- Suspected columns: raw_json
CREATE TABLE IF NOT EXISTS `bf_content_scanner_rows` (
  `raw_json` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_content_scanner_rows' AND column_name = 'raw_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_content_scanner_rows` ADD COLUMN `raw_json` TEXT NULL', 'SELECT ''column raw_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_content_scanner_rows`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_content_scanner_rows'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_content_scanner_rows'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

