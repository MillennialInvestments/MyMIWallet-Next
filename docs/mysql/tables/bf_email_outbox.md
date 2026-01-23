-- Table: bf_email_outbox
-- Sources: migrations: 2026-03-05-000100_CreateEmailOutbox.php | code: app/Database/Migrations/2026-03-05-000100_CreateEmailOutbox.php:73, app/Database/Migrations/2026-03-05-000100_CreateEmailOutbox.php:78, app/Models/EmailOutboxModel.php:11
CREATE TABLE IF NOT EXISTS `bf_email_outbox` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NULL,
  `to_email` VARCHAR(190) NOT NULL,
  `subject` VARCHAR(190) NOT NULL,
  `type` VARCHAR(50) NOT NULL,
  `status` VARCHAR(20) NOT NULL DEFAULT 'queued',
  `error_message` VARCHAR(255) NULL,
  `provider` VARCHAR(50) NOT NULL DEFAULT 'smtp',
  `meta_json` TEXT NULL,
  `created_at` DATETIME NOT NULL,
  `sent_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type` (`type`),
  KEY `status` (`status`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD COLUMN `user_id` INT(11) UNSIGNED NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND column_name = 'to_email');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD COLUMN `to_email` VARCHAR(190) NOT NULL', 'SELECT ''column to_email already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND column_name = 'subject');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD COLUMN `subject` VARCHAR(190) NOT NULL', 'SELECT ''column subject already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND column_name = 'type');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD COLUMN `type` VARCHAR(50) NOT NULL', 'SELECT ''column type already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD COLUMN `status` VARCHAR(20) NOT NULL DEFAULT ''queued''', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND column_name = 'error_message');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD COLUMN `error_message` VARCHAR(255) NULL', 'SELECT ''column error_message already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND column_name = 'provider');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD COLUMN `provider` VARCHAR(50) NOT NULL DEFAULT ''smtp''', 'SELECT ''column provider already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND column_name = 'meta_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD COLUMN `meta_json` TEXT NULL', 'SELECT ''column meta_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD COLUMN `created_at` DATETIME NOT NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND column_name = 'sent_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD COLUMN `sent_at` DATETIME NULL', 'SELECT ''column sent_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND index_name = 'user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD INDEX `user_id` (`user_id`)', 'SELECT ''index user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND index_name = 'type');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD INDEX `type` (`type`)', 'SELECT ''index type already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND index_name = 'status');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD INDEX `status` (`status`)', 'SELECT ''index status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox' AND index_name = 'created_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_email_outbox` ADD INDEX `created_at` (`created_at`)', 'SELECT ''index created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_email_outbox`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

