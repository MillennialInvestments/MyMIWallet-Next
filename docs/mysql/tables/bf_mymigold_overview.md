-- Table: bf_mymigold_overview
-- Sources: code: app/Models/MyMIGoldModel.php:8, app/Models/MyMIGoldModel.php:43, app/Models/MyMIGoldModel.php:82, app/Models/ExchangeModel.php:231, app/Models/ExchangeModel.php:276, app/Modules/User/Views/Wallets/Feature_Manager.php:128, app/Modules/User/Views/Wallets/Purchase_Coins_Transaction.php:72, app/Modules/User/Views/Wallets/Purchase_Coins_Transaction.php:100, app/Modules/User/Views/Wallets/Purchase_Manager.php:114
CREATE TABLE IF NOT EXISTS `bf_mymigold_overview` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_mymigold_overview' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_mymigold_overview` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_mymigold_overview`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_mymigold_overview'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_mymigold_overview'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

