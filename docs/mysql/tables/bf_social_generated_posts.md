-- Table: bf_social_generated_posts
-- Sources: migrations: 2025-12-23-000001_CreateCommunityAndTemplateTables.php | code: app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:21, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:117, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:134, app/Models/SocialGeneratedPostModel.php:9, docs/automation/communities/post_generation_rules.md:9, docs/automation/communities/cron_plan.md:7, docs/communities/discord.md:56, docs/communities/youtube.md:60, docs/communities/twitch.md:54, docs/communities/facebook.md:54, docs/communities/linkedin.md:54, docs/communities/tiktok.md:54, docs/communities/x_twitter.md:53, docs/communities/stocktwits.md:52
CREATE TABLE IF NOT EXISTS `bf_social_generated_posts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `source_type` VARCHAR(50) NOT NULL,
  `source_id` INT(11) NOT NULL,
  `platform_id` INT(11) UNSIGNED NOT NULL,
  `community_id` INT(11) UNSIGNED NULL,
  `template_id` INT(11) UNSIGNED NOT NULL,
  `post_title` VARCHAR(255) NULL,
  `post_body` MEDIUMTEXT NOT NULL,
  `hashtags` TEXT NULL,
  `tickers` TEXT NULL,
  `cta_link` VARCHAR(255) NULL,
  `status` VARCHAR(25) NOT NULL DEFAULT 'draft',
  `posted_at` DATETIME NULL,
  `external_post_url` VARCHAR(255) NULL,
  `error` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `source_type_source_id` (`source_type`, `source_id`),
  FOREIGN KEY (`platform_id`) REFERENCES `bf_social_platforms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`community_id`) REFERENCES `bf_social_communities` (`id`) ON DELETE CASCADE ON UPDATE SET NULL,
  FOREIGN KEY (`template_id`) REFERENCES `bf_social_post_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'source_type');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `source_type` VARCHAR(50) NOT NULL', 'SELECT ''column source_type already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'source_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `source_id` INT(11) NOT NULL', 'SELECT ''column source_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'platform_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `platform_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column platform_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'community_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `community_id` INT(11) UNSIGNED NULL', 'SELECT ''column community_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'template_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `template_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column template_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'post_title');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `post_title` VARCHAR(255) NULL', 'SELECT ''column post_title already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'post_body');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `post_body` MEDIUMTEXT NOT NULL', 'SELECT ''column post_body already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'hashtags');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `hashtags` TEXT NULL', 'SELECT ''column hashtags already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'tickers');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `tickers` TEXT NULL', 'SELECT ''column tickers already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'cta_link');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `cta_link` VARCHAR(255) NULL', 'SELECT ''column cta_link already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `status` VARCHAR(25) NOT NULL DEFAULT ''draft''', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'posted_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `posted_at` DATETIME NULL', 'SELECT ''column posted_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'external_post_url');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `external_post_url` VARCHAR(255) NULL', 'SELECT ''column external_post_url already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'error');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `error` TEXT NULL', 'SELECT ''column error already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts' AND index_name = 'source_type_source_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_social_generated_posts` ADD INDEX `source_type_source_id` (`source_type`, `source_id`)', 'SELECT ''index source_type_source_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_social_generated_posts`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_social_generated_posts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

