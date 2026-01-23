-- Table: bf_social_distribution_queue
-- Sources: migrations: 2025-12-23-000001_CreateCommunityAndTemplateTables.php | code: app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:20, app/Database/Migrations/2025-12-23-000001_CreateCommunityAndTemplateTables.php:135, app/Models/SocialDistributionQueueModel.php:9, docs/automation/communities/distribution_matrix.md:14, docs/automation/communities/cron_plan.md:11, docs/communities/discord.md:56
CREATE TABLE IF NOT EXISTS `bf_social_distribution_queue` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `generated_post_id` INT(11) UNSIGNED NOT NULL,
  `channel_key` VARCHAR(50) NOT NULL,
  `payload_json` TEXT NOT NULL,
  `status` VARCHAR(25) NOT NULL DEFAULT 'pending',
  `attempts` INT(11) NOT NULL DEFAULT 0,
  `last_error` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`generated_post_id`) REFERENCES `bf_social_generated_posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_distribution_queue' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_distribution_queue` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_distribution_queue' AND column_name = 'generated_post_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_distribution_queue` ADD COLUMN `generated_post_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column generated_post_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_distribution_queue' AND column_name = 'channel_key');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_distribution_queue` ADD COLUMN `channel_key` VARCHAR(50) NOT NULL', 'SELECT ''column channel_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_distribution_queue' AND column_name = 'payload_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_distribution_queue` ADD COLUMN `payload_json` TEXT NOT NULL', 'SELECT ''column payload_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_distribution_queue' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_distribution_queue` ADD COLUMN `status` VARCHAR(25) NOT NULL DEFAULT ''pending''', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_distribution_queue' AND column_name = 'attempts');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_distribution_queue` ADD COLUMN `attempts` INT(11) NOT NULL DEFAULT 0', 'SELECT ''column attempts already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_distribution_queue' AND column_name = 'last_error');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_distribution_queue` ADD COLUMN `last_error` TEXT NULL', 'SELECT ''column last_error already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_distribution_queue' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_distribution_queue` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_social_distribution_queue' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_social_distribution_queue` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_social_distribution_queue`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_social_distribution_queue'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_social_distribution_queue'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

