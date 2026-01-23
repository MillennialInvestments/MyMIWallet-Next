-- Table: bf_social_post_templates
-- Sources: migrations: 2025-12-23-000001_CreateCommunityAndTemplateTables.php | code: app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:22, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:88, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:116, app/Models/SocialPostTemplateModel.php:9
CREATE TABLE IF NOT EXISTS `bf_social_post_templates` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `platform_id` INT(11) UNSIGNED NOT NULL,
  `template_key` VARCHAR(64) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `max_chars` INT(11) NULL,
  `hashtag_limit` INT(11) NULL,
  `supports_links` TINYINT(1) NOT NULL DEFAULT 1,
  `supports_mentions` TINYINT(1) NOT NULL DEFAULT 1,
  `supports_tickers` TINYINT(1) NOT NULL DEFAULT 1,
  `rules_json` TEXT NULL,
  `body_template` TEXT NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `platform_id_template_key` (`platform_id`, `template_key`),
  FOREIGN KEY (`platform_id`) REFERENCES `bf_social_platforms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_post_templates` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates' AND column_name = 'platform_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_post_templates` ADD COLUMN `platform_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column platform_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates' AND column_name = 'template_key');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_post_templates` ADD COLUMN `template_key` VARCHAR(64) NOT NULL', 'SELECT ''column template_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates' AND column_name = 'title');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_post_templates` ADD COLUMN `title` VARCHAR(255) NOT NULL', 'SELECT ''column title already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates' AND column_name = 'max_chars');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_post_templates` ADD COLUMN `max_chars` INT(11) NULL', 'SELECT ''column max_chars already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates' AND column_name = 'hashtag_limit');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_post_templates` ADD COLUMN `hashtag_limit` INT(11) NULL', 'SELECT ''column hashtag_limit already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates' AND column_name = 'supports_links');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_post_templates` ADD COLUMN `supports_links` TINYINT(1) NOT NULL DEFAULT 1', 'SELECT ''column supports_links already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates' AND column_name = 'supports_mentions');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_post_templates` ADD COLUMN `supports_mentions` TINYINT(1) NOT NULL DEFAULT 1', 'SELECT ''column supports_mentions already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates' AND column_name = 'supports_tickers');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_post_templates` ADD COLUMN `supports_tickers` TINYINT(1) NOT NULL DEFAULT 1', 'SELECT ''column supports_tickers already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates' AND column_name = 'rules_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_post_templates` ADD COLUMN `rules_json` TEXT NULL', 'SELECT ''column rules_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates' AND column_name = 'body_template');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_post_templates` ADD COLUMN `body_template` TEXT NOT NULL', 'SELECT ''column body_template already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_post_templates` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_post_templates` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates' AND index_name = 'platform_id_template_key');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_social_post_templates` ADD INDEX `platform_id_template_key` (`platform_id`, `template_key`)', 'SELECT ''index platform_id_template_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_social_post_templates`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_social_post_templates'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

