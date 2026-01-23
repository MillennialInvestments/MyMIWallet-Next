-- Table: bf_content_posts
-- Sources: code: app/Models/ContentPostModel.php:11, docs/content_engine/sql_patch_notes.md:9, docs/content_engine/security.md:11, docs/content_engine/overview.md:37, docs/content_engine/troubleshooting.md:15, docs/content_engine/troubleshooting.md:20
-- Suspected columns: last_error
CREATE TABLE IF NOT EXISTS `bf_content_posts` (
  `last_error` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_content_posts' AND column_name = 'last_error');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_content_posts` ADD COLUMN `last_error` TEXT NULL', 'SELECT ''column last_error already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_content_posts`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_content_posts'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_content_posts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

