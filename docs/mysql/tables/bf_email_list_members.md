-- Table: bf_email_list_members
-- Sources: code: app/Models/EmailModel.php:25, app/Models/EmailModel.php:137, app/Models/EmailModel.php:175, app/Models/EmailModel.php:183, app/Models/EmailModel.php:243, app/Models/EmailModel.php:287, app/Models/EmailModel.php:302, app/Models/EmailModel.php:316, app/Models/EmailModel.php:321, app/Models/MarketingModel.php:1978, app/Models/MarketingModel.php:2359
CREATE TABLE IF NOT EXISTS `bf_email_list_members` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_email_list_members' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_email_list_members` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_email_list_members`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_list_members'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_list_members'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

