-- Table: bf_users_referrals
-- Sources: code: app/Models/ReferralModel.php:79, app/Models/ReferralModel.php:94, app/Models/ReferralModel.php:111, app/Models/ReferralModel.php:126, app/Models/ReferralModel.php:149, app/Models/ReferralModel.php:166, app/Models/ReferralModel.php:237, app/Models/ReferralModel.php:302, app/Services/ReferralService.php:525
CREATE TABLE IF NOT EXISTS `bf_users_referrals` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_referrals' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_referrals` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_referrals`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_referrals'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_referrals'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

