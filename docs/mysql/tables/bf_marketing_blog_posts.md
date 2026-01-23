-- Table: bf_marketing_blog_posts
-- Sources: code: app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:12, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:46, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:47, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:48, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:51, app/Database/Migrations/2026-02-20-000001_AddStatusMetaExcerptColumns.php:61, app/Models/MarketingModel.php:202, app/Models/MarketingModel.php:214, app/Models/MarketingModel.php:616, app/Models/MarketingModel.php:638, app/Modules/Management/Controllers/MarketingController.php:1063, app/Modules/Management/Controllers/MarketingController.php:1089, app/Modules/Management/Controllers/MarketingController.php:1102
-- Suspected columns: slug
CREATE TABLE IF NOT EXISTS `bf_marketing_blog_posts` (
  `slug` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_blog_posts' AND column_name = 'slug');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_marketing_blog_posts` ADD COLUMN `slug` TEXT NULL', 'SELECT ''column slug already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_marketing_blog_posts`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_blog_posts'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_blog_posts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

