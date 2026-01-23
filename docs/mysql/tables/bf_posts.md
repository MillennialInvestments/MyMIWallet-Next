-- Table: bf_posts
-- Sources: code: app/Services/SearchService.php:54, app/Services/SearchService.php:55
-- Suspected columns: status, title, created_at
CREATE TABLE IF NOT EXISTS `bf_posts` (
  `status` TEXT NULL,
  `title` TEXT NULL,
  `created_at` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_posts' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_posts` ADD COLUMN `status` TEXT NULL', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_posts' AND column_name = 'title');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_posts` ADD COLUMN `title` TEXT NULL', 'SELECT ''column title already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_posts' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_posts` ADD COLUMN `created_at` TEXT NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_posts`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_posts'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_posts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

