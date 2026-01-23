-- Table: bf_users_subscriptions
-- Sources: code: app/Models/UserModel.php:213, app/Models/UserModel.php:213, app/Models/UserModel.php:214, app/Models/AlertsModel.php:1576, app/Models/AlertsModel.php:1576, app/Models/AlertsModel.php:1577, app/Models/SubscribeModel.php:42
-- Suspected columns: user_id, tier
CREATE TABLE IF NOT EXISTS `bf_users_subscriptions` (
  `user_id` TEXT NULL,
  `tier` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_subscriptions' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_subscriptions` ADD COLUMN `user_id` TEXT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_subscriptions' AND column_name = 'tier');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_subscriptions` ADD COLUMN `tier` TEXT NULL', 'SELECT ''column tier already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_subscriptions`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_subscriptions'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_subscriptions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

