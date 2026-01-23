-- Table: bf_social_communities
-- Sources: migrations: 2025-12-23-000001_CreateCommunityAndTemplateTables.php | code: app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:23, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:65, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:115, app/Models/SocialCommunityModel.php:9
CREATE TABLE IF NOT EXISTS `bf_social_communities` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `platform_id` INT(11) UNSIGNED NOT NULL,
  `community_name` VARCHAR(150) NOT NULL,
  `community_type` VARCHAR(50) NOT NULL,
  `community_url` VARCHAR(255) NOT NULL,
  `join_url` VARCHAR(255) NOT NULL,
  `invite_code` VARCHAR(100) NULL,
  `is_primary` TINYINT(1) NOT NULL DEFAULT 0,
  `status` VARCHAR(50) NOT NULL DEFAULT 'active',
  `notes` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`platform_id`) REFERENCES `bf_social_platforms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_communities` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities' AND column_name = 'platform_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_communities` ADD COLUMN `platform_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column platform_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities' AND column_name = 'community_name');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_communities` ADD COLUMN `community_name` VARCHAR(150) NOT NULL', 'SELECT ''column community_name already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities' AND column_name = 'community_type');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_communities` ADD COLUMN `community_type` VARCHAR(50) NOT NULL', 'SELECT ''column community_type already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities' AND column_name = 'community_url');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_communities` ADD COLUMN `community_url` VARCHAR(255) NOT NULL', 'SELECT ''column community_url already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities' AND column_name = 'join_url');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_communities` ADD COLUMN `join_url` VARCHAR(255) NOT NULL', 'SELECT ''column join_url already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities' AND column_name = 'invite_code');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_communities` ADD COLUMN `invite_code` VARCHAR(100) NULL', 'SELECT ''column invite_code already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities' AND column_name = 'is_primary');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_communities` ADD COLUMN `is_primary` TINYINT(1) NOT NULL DEFAULT 0', 'SELECT ''column is_primary already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_communities` ADD COLUMN `status` VARCHAR(50) NOT NULL DEFAULT ''active''', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities' AND column_name = 'notes');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_communities` ADD COLUMN `notes` TEXT NULL', 'SELECT ''column notes already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_communities` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_communities` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_social_communities`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_social_communities'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

