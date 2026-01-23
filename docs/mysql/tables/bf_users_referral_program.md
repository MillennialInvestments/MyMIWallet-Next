-- Table: bf_users_referral_program
-- Sources: code: app/Models/ReferralModel.php:10, app/Modules/User/Views/Referral_Program/New_Affiliate_Procedure.php:8, app/Modules/User/Views/Referral_Program/Application_Manager.php:26, app/Modules/User/Views/Referral_Program/New_Affiliate_Information/Setup_Procedure.php:8, app/Modules/User/Views/Referral_Program/New_Affiliate_Information/user_fields.php:23, app/Modules/User/Views/Referral_Program/Users.php:14
CREATE TABLE IF NOT EXISTS `bf_users_referral_program` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_referral_program' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_referral_program` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_referral_program`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_referral_program'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_referral_program'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

