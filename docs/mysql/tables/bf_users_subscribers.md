-- Table: bf_users_subscribers
-- Sources: code: app/Models/ReferralModel.php:243, app/Models/SubscribeModel.php:57, app/Models/SubscribeModel.php:64, app/Models/EmailModel.php:306, app/Models/EmailModel.php:330, app/Models/EmailModel.php:335, app/Models/MarketingModel.php:111, app/Models/MarketingModel.php:1969, app/Models/MarketingModel.php:2006, app/Models/MarketingModel.php:2363
CREATE TABLE IF NOT EXISTS `bf_users_subscribers` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_subscribers' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_subscribers` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_subscribers`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_subscribers'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_subscribers'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

