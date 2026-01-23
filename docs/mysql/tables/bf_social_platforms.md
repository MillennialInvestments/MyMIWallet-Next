-- Table: bf_social_platforms
-- Sources: migrations: 2025-12-23-000001_CreateCommunityAndTemplateTables.php | code: app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:24, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:44, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:64, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:87, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:114, app/Models/SocialPlatformModel.php:9
CREATE TABLE IF NOT EXISTS `bf_social_platforms` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `platform_key` VARCHAR(32) NOT NULL,
  `display_name` VARCHAR(100) NOT NULL,
  `base_url` VARCHAR(255) NULL,
  `supports_groups` TINYINT(1) NOT NULL DEFAULT 0,
  `supports_short_video` TINYINT(1) NOT NULL DEFAULT 0,
  `supports_long_video` TINYINT(1) NOT NULL DEFAULT 0,
  `supports_live` TINYINT(1) NOT NULL DEFAULT 0,
  `supports_polls` TINYINT(1) NOT NULL DEFAULT 0,
  `supports_threads` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_platforms` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms' AND column_name = 'platform_key');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_platforms` ADD COLUMN `platform_key` VARCHAR(32) NOT NULL', 'SELECT ''column platform_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms' AND column_name = 'display_name');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_platforms` ADD COLUMN `display_name` VARCHAR(100) NOT NULL', 'SELECT ''column display_name already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms' AND column_name = 'base_url');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_platforms` ADD COLUMN `base_url` VARCHAR(255) NULL', 'SELECT ''column base_url already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms' AND column_name = 'supports_groups');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_platforms` ADD COLUMN `supports_groups` TINYINT(1) NOT NULL DEFAULT 0', 'SELECT ''column supports_groups already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms' AND column_name = 'supports_short_video');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_platforms` ADD COLUMN `supports_short_video` TINYINT(1) NOT NULL DEFAULT 0', 'SELECT ''column supports_short_video already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms' AND column_name = 'supports_long_video');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_platforms` ADD COLUMN `supports_long_video` TINYINT(1) NOT NULL DEFAULT 0', 'SELECT ''column supports_long_video already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms' AND column_name = 'supports_live');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_platforms` ADD COLUMN `supports_live` TINYINT(1) NOT NULL DEFAULT 0', 'SELECT ''column supports_live already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms' AND column_name = 'supports_polls');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_platforms` ADD COLUMN `supports_polls` TINYINT(1) NOT NULL DEFAULT 0', 'SELECT ''column supports_polls already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms' AND column_name = 'supports_threads');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_platforms` ADD COLUMN `supports_threads` TINYINT(1) NOT NULL DEFAULT 0', 'SELECT ''column supports_threads already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_platforms` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_platforms` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_social_platforms`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_social_platforms'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

